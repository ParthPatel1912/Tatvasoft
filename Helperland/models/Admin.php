<?php 

class AdminModel{

    function __construct()
    {
        try{
            $servername = "localhost:3306";
            $dbname = "helperland";
            $username = "root";
            $password = "";

            $this->conn = new PDO(
                "mysql:host=$servername; dbname=helperland",
                $username, $password
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
       }catch(PDOException $e){
                echo $e->getMessage();
       }
    }

    function ListAllRequest($table)
    {
        $sql_query = "SELECT 
                    *,$table.Status as ServiceStatus
                FROM $table
                left outer join user
                    on user.UserId = $table.UserId
                LEFT OUTER JOIN servicerequestaddress
                    ON servicerequestaddress.ServiceRequestId = $table.ServiceRequestId
                ORDER BY $table.ServiceRequestId DESC";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    function GetUserDetails($table,$UserId)
    {
        $sql_query = "SELECT * FROM $table WHERE UserId = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function GetSPRattings($table,$ServiceProviderId)
    {
        $sql_query = "SELECT * FROM $table WHERE RatingTo = $ServiceProviderId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $count = $statement->rowCount();
        $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return array($result,$count);
    }

    function AllUser($table)
    {
        $sql_query = "SELECT *,CONCAT(`FirstName`,' ',`LastName`) AS UserName from $table";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    function AllUserDetails($table,$UserId)
    {
        $sql_query = "SELECT
        $table.UserId,
        $table.UserTypeId,
        CONCAT(`FirstName`, ' ', `LastName`) AS UserName,
        useraddress.PostalCode,
        $table.Status,
        $table.IsActive
        FROM
            $table
        LEFT OUTER JOIN useraddress ON useraddress.UserId = $table.UserId
        WHERE
            $table.UserId = $UserId
            LIMIT 1";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    function SearchedRequestList($table,$condition)
    {
        $sql_query = "SELECT 
                    *,$table.Status as ServiceStatus
                FROM $table
                left outer join user
                    on user.UserId = $table.UserId
                LEFT OUTER JOIN servicerequestaddress
                    ON servicerequestaddress.ServiceRequestId = $table.ServiceRequestId
                $condition
                ORDER BY $table.ServiceRequestId DESC";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    function SearchServiceRequestList($table,$sid,$uid,$spid,$states,$Pincode,$fromdate,$todate)
    {
        $sql_query = "SELECT 
                    *,$table.Status as ServiceStatus
                FROM $table
                left outer join user
                    on user.UserId = $table.UserId
                LEFT OUTER JOIN servicerequestaddress
                    ON servicerequestaddress.ServiceRequestId = $table.ServiceRequestId
                WHERE $table.ServiceRequestId LIKE '%$sid%' AND $table.UserId LIKE '%$uid%' AND $table.ServiceProviderId LIKE '%$spid%' AND $table.Status LIKE '%$states%' AND $table.ZipCode LIKE '%$Pincode%'
                        AND(STR_TO_DATE(servicerequest.ServiceStartDate,'%d-%m-%Y') BETWEEN '$fromdate' AND '$todate')
                ORDER BY $table.ServiceRequestId DESC";

        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    function SearchUserManageList($table,$username,$userrole,$mobilenumber,$postal,$email,$Fromdate,$Todate)
    {
        $sql_query = "SELECT *,CONCAT(`FirstName`,' ',`LastName`) AS UserName from $table
            WHERE $table.UserId LIKE '%$username%' AND $table.UserTypeId LIKE '%$userrole%' AND $table.Mobile LIKE '%$mobilenumber%' AND $table.ZipCode LIKE '%$postal%' AND $table.Email LIKE '%$email%' AND $table.CreatedDate BETWEEN '$Fromdate' AND '$Todate'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    function DeactivateUser($table,$uid)
    {
        $sql_query = "UPDATE $table SET IsActive = 'No', Status = 'Accept' WHERE UserId = $uid";
        $statement =  $this->conn->prepare($sql_query);
        $result = $statement->execute();

        return $result;
    }

    function ActivateUser($table,$uid)
    {
        $sql_query = "UPDATE $table SET IsActive = 'Yes', Status = 'New' WHERE UserId = $uid";
        $statement =  $this->conn->prepare($sql_query);
        $result = $statement->execute();

        return $result;
    }

    function DetailofServiceRequest($table,$ServiceRequestId)
    {
        $sql_query = "SELECT * FROM $table
        LEFT OUTER JOIN servicerequestaddress
        ON servicerequestaddress.ServiceRequestId = $table.ServiceRequestId
        WHERE $table.ServiceRequestId = $ServiceRequestId";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();

        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $row;
    }

    function findCityUsingZipcode($table,$Zipcode)
    {
        $sql_query = "SELECT * FROM $table
            left OUTER JOIN city
            on city.CityId = zipcode.CityId
            LEFT OUTER JOIN state
            on state.StateId = city.StateId
            WHERE zipcode.ZipcodeValue = $Zipcode";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $CityName = $row['CityName'];
        $CityId = $row['CityId'];
        $StateName = $row['StateName'];
        
        return array($CityId,$CityName,$StateName);
    }

    function updateDateTime($table,$array,$serviceRequestId)
    {
        $sql_query = "UPDATE $table SET ServiceStartDate = :dateNew, SelectTime = :newAdminTime, HasIssue = :rescheduleComment WHERE ServiceRequestId = $serviceRequestId";
        $statement =  $this->conn->prepare($sql_query);
        $result = $statement->execute($array);

        return $result;
    }

    function updateServiceAddress($table,$array,$serviceRequestId,$zipcode)
    {
        $sql_query = "UPDATE $table SET AddressLine1 = :addressline1, AddressLine2 = :addressline2, PostalCode = :zipcode, City = :cityname, State = :statename WHERE ServiceRequestId = $serviceRequestId";
        $statement =  $this->conn->prepare($sql_query);
        $result = $statement->execute($array);

        $sql_query3 = "UPDATE servicerequest SET ZipCode= $zipcode WHERE servicerequest.ServiceRequestId = $serviceRequestId";
        $statement3 = $this->conn->prepare($sql_query3);
        $statement3->execute();

        return $result;
    }

    function UpdateRefundAmount($table,$serviceRequestId,$refunamount,$refundComment)
    {
        $sql_query = "UPDATE $table SET RefundedAmount = $refunamount, Status = 'Refunded', HasIssue = '$refundComment' WHERE $table.ServiceRequestId = $serviceRequestId";
        $statement =  $this->conn->prepare($sql_query);
        $result = $statement->execute();

        return $result;
    }

    function GetServiceHistoryUser($table,$serviceid)
    {
        $sql_query = "SELECT * FROM $table WHERE ServiceRequestId = $serviceid" ;
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function cancelationService($table,$serviceRequestId,$UserId)
    {
        $sql_query = "UPDATE $table SET Status = 'Cancelled', ModifiedDate = now(), ModifiedBy= $UserId WHERE ServiceRequestId = $serviceRequestId";
        $statement =  $this->conn->prepare($sql_query);
        $result = $statement->execute();

        return $result;
    }

    function GetUsersServiceproviderList($table,$ServiceProvider){
        $ListServiceProvider = array();
        foreach($ServiceProvider as $array){
            $sql_query = "SELECT * FROM $table WHERE UserId = {$array}";
            $statement =  $this->conn->prepare($sql_query);
            $statement->execute();
            $result  = $statement->fetch(PDO::FETCH_ASSOC);
            array_push($ListServiceProvider,$result);
        }
        return $ListServiceProvider;
    }

    function ActiveServiceProviderList($table){
        $sql_query = "SELECT * FROM $table WHERE UserTypeId = 2 AND `IsActive`='Yes'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>