<?php 

class ServiceProviderModel{
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

    function CheckUser($table,$UserId)
    {
        $sql_query = "SELECT
                            USER.UserId,
                            FirstName,
                            LastName,
                            user.Email,
                            user.Mobile,
                            user.UserTypeId,
                            Gender,
                            DateOfBirth,
                            UserProfilePicture,
                            user.ZipCode,
                            LanguageId,
                            IsActive,
                            useraddress.AddressLine1,
                            useraddress.AddressLine2,
                            useraddress.CityId,
                            useraddress.StateId,
                            useraddress.PostalCode,
                            useraddress.AddressId
                        FROM
                            $table
                        LEFT OUTER JOIN useraddress ON useraddress.UserId = $table.UserId
                        WHERE $table.UserId = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function findCityUsingZipcode($table,$Zipcode){
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
        $StateId = $row['StateId'];
        
        return array($CityId,$CityName,$StateId);
    }

    public function FindAdsressByAddressId($table,$AddressId)
    {
        $sql_query = "SELECT * from $table WHERE addressid = $AddressId";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();

        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $row;
    }

    function updateUser($table,$array,$UserId){
        $sql_query = "UPDATE $table SET FirstName = :FirstName, LastName = :LastName, Mobile = :PhoneNumber, DateOfBirth = :dob, LanguageId = :Language, Gender = :gender, UserProfilePicture = :profilephoto, ModifiedDate = now()
                    WHERE UserId = $UserId";
        $statement= $this->conn->prepare($sql_query);
        $count = $statement->execute($array);

        return $count;
    }

    function AddAddress($table,$array,$UserId){
        $sql_query = "INSERT INTO $table (UserId, AddressLine1, AddressLine2, CityId, StateId, PostalCode, Mobile) 
        VALUES ($UserId, :AddressLine1, :AddressLine2, :CityId, :StateId, :PostalCode, :Mobile)";
        $statement = $this->conn->prepare($sql_query);
        $count = $statement->execute($array);

        return $count;
    }

    function UpdateAddressbyUserId($table,$array,$UserId, $AddressId){
        $sql_query = "UPDATE $table SET AddressLine1 = :AddressLine1 ,AddressLine2 = :AddressLine2 , CityId = :CityId, StateId = :StateId, PostalCode = :PostalCode , Mobile = :Mobile 
        WHERE UserId = $UserId AND AddressId = $AddressId";
        $statement = $this->conn->prepare($sql_query);
        $count = $statement->execute($array);

        return $count;
    }

    function UpdatePassword($table, $OldPassword, $NewPassword, $UserId)
    {
        $sql_query = "SELECT * FROM $table WHERE UserId = '$UserId' AND IsActive = 'Yes'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $count = $statement->rowCount();

        if ($count == 1){

            if (password_verify($OldPassword, $row['Password'])) {

                $sql_query_2 = "UPDATE $table SET Password= '$NewPassword', ModifiedDate = now() WHERE UserId = '$UserId' AND IsActive='Yes' ";
                $statement_2 = $this->conn->prepare($sql_query_2);
                $result = $statement_2->execute();
                return $result;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }

    function findFavouriteSPservicerequest($table)
    {
        $sql_query = "SELECT 
                    *
                FROM $table
                WHERE $table.Status NOT IN ('Completed','Cancelled')";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    function NewServiceList($table)
    {
        $sql_query = "SELECT 
                    $table.ServiceRequestId,
                    ServiceStartDate,
                    SelectTime,
                    TotalHour,
                    ServiceProviderId,
                    TotalCost,
                    servicerequest.Status,
                    user.FirstName,
                    user.LastName,
                    AddressLine1, 
                    AddressLine2, 
                    City, 
                    State,
                    PostalCode
                FROM $table
                left outer join user
                    on user.UserId = $table.UserId
                LEFT OUTER JOIN servicerequestaddress
                    ON servicerequestaddress.ServiceRequestId = $table.ServiceRequestId
                WHERE $table.Status NOT IN ('Completed','Cancelled','Approved')";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    function NewServiceListByFavouriteSP($table,$UserId)
    {
        $sql_query = "SELECT 
                    $table.ServiceRequestId,
                    ServiceStartDate,
                    SelectTime,
                    TotalHour,
                    ServiceProviderId,
                    TotalCost,
                    servicerequest.Status,
                    user.FirstName,
                    user.LastName,
                    AddressLine1, 
                    AddressLine2, 
                    City, 
                    State,
                    PostalCode
                FROM $table
                left outer join user
                    on user.UserId = $table.Userid
                LEFT OUTER JOIN servicerequestaddress
                    ON servicerequestaddress.ServiceRequestId = $table.ServiceRequestId
                WHERE $table.Status NOT IN ('Completed','Cancelled','Approved')
                AND ($table.FavouriteServiceProviderId LIKE '%$UserId%'
                    OR $table.FavouriteServiceProviderId is NULL
                    OR $table.FavouriteServiceProviderId = '')";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    function DetailofServiceRequest($table,$ServiceRequestId)
    {
        $sql_query = "SELECT * FROM $table
        LEFT OUTER JOIN servicerequestextra
        ON servicerequestextra.ServiceRequestId = $table.ServiceRequestId
        LEFT OUTER JOIN servicerequestaddress
        ON servicerequestaddress.ServiceRequestId = $table.ServiceRequestId
        LEFT OUTER JOIN user
        ON user.UserId = $table.UserId
        WHERE $table.ServiceRequestId = $ServiceRequestId";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();

        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $row;
    }

    function findAppovedRequestByDateSP($table,$StartDate,$UserId)
    {
        $sql_query = "SELECT
                    *
                FROM
                    $table
                WHERE
                    $table.ServiceStartDate = '$StartDate'
                    AND $table.Status = 'Approved'
                    AND $table.ServiceProviderId = $UserId";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();

        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $row;
    }

    function checkForAppovalByTime($table,$ServiceRequestId,$StartDate,$StartTime,$EndTime)
    {
        $sql_query = "SELECT
                            *
                        FROM
                            $table
                        WHERE
                            $table.ServiceStartDate = '$StartDate'
                        AND $table.SelectTime NOT BETWEEN $StartTime AND $EndTime
                        AND $table.Status in ('Pending','Reschedule')
                        AND $table.ServiceRequestId = $ServiceRequestId";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();

        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $row;
    }

    function approveNewRequest($table,$ServiceRequestId,$UserId,$recordVersion)
    {
        $sql_query = "UPDATE $table SET ServiceProviderId = $UserId, Status = 'Approved', ModifiedDate = now(), ModifiedBy = $UserId, RecordVersion = $recordVersion
        WHERE ServiceRequestId = $ServiceRequestId";
        $statement= $this->conn->prepare($sql_query);
        $count = $statement->execute();

        return $count;
    }

    function GetUserDetails($table,$UserId){
        $sql_query = "SELECT * FROM $table WHERE UserId = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    // public function CancelPastRequests()
    // {
    //     $sql_query = "WHERE DATE(ModifiedDate) = DATE(NOW() - INTERVAL 1 DAY);";
    // }

    function listUpcomming($table,$UserId)
    {
        $sql_query = "SELECT 
                    $table.ServiceRequestId,
                    ServiceStartDate,
                    SelectTime,
                    TotalHour,
                    ServiceProviderId,
                    TotalCost,
                    servicerequest.Status,
                    user.FirstName,
                    user.LastName,
                    AddressLine1, 
                    AddressLine2, 
                    City, 
                    State,
                    PostalCode
                FROM $table
                left outer join user
                    on user.UserId = $table.UserId
                LEFT OUTER JOIN servicerequestaddress
                    ON servicerequestaddress.ServiceRequestId = $table.ServiceRequestId
                WHERE $table.Status = 'Approved'
                AND $table.ServiceProviderId = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    function CancelServicePending($table,$ServiceRequestId,$UserId,$recordVersion,$status)
    {
        $sql_query = "UPDATE $table SET Status = '$status', ServiceProviderId = null, ModifiedDate = now() ,ModifiedBy = $UserId , RecordVersion= $recordVersion WHERE ServiceRequestId = $ServiceRequestId";
        $statement = $this->conn->prepare($sql_query);
        $row = $statement->execute();
        return $row;

    }

    function CancelService($table,$ServiceRequestId,$serproviderId,$UserId,$recordVersion,$status)
    {
        $sql_query = "UPDATE $table SET Status = '$status', ServiceProviderId = $serproviderId, ModifiedDate = now() ,ModifiedBy = $UserId , RecordVersion= $recordVersion WHERE ServiceRequestId = $ServiceRequestId";
        $statement = $this->conn->prepare($sql_query);
        $row = $statement->execute();
        return $row;

    }

    function CompleteService($table,$ServiceRequestId,$UserId,$recordVersion,$status)
    {
        $sql_query = "UPDATE $table SET Status = '$status', ModifiedDate = now() ,ModifiedBy= $UserId , RecordVersion= $recordVersion WHERE ServiceRequestId = $ServiceRequestId";
        $statement = $this->conn->prepare($sql_query);
        $row = $statement->execute();
        return $row;

    }

    function GetSPRattings($table,$UserId){
        $sql_query = "SELECT *,$table.Comments as comment FROM $table 
                        left outer join user
                            on user.UserId = $table.RatingFrom
                        left outer join servicerequest
                            on servicerequest.ServiceRequestId = $table.ServiceRequestId
                        WHERE RatingTo = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function ListFavourite($table,$UserId,$coustomerId)
    {
        $sql_query = "SELECT * FROM $table WHERE TargetUserId = $UserId AND UserId = $coustomerId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();

        $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function insertfavouriteblock($table,$coustomerId,$UserId)
    {
        $sql_query = "INSERT INTO $table (UserId, TargetUserId, IsFavorite, IsBlocked) VALUES ($coustomerId,$UserId,0,0)";
        $statement = $this->conn->prepare($sql_query);
        $statement->execute();
    }

    function listServiceHistory($table,$UserId)
    {
        $sql_query = "SELECT 
                    $table.ServiceRequestId,
                    ServiceStartDate,
                    SelectTime,
                    TotalHour,
                    ServiceProviderId,
                    TotalCost,
                    servicerequest.Status,
                    user.FirstName,
                    user.LastName,
                    AddressLine1, 
                    AddressLine2, 
                    City, 
                    State,
                    PostalCode
                FROM $table
                left outer join user
                    on user.UserId = $table.UserId
                LEFT OUTER JOIN servicerequestaddress
                    ON servicerequestaddress.ServiceRequestId = $table.ServiceRequestId
                WHERE $table.Status = 'Completed'
                AND $table.ServiceProviderId = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    function ListBlock($table,$UserId)
    {
        $sql_query = "SELECT * FROM $table WHERE UserId = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();

        $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function updateIsblock($table,$IsBlocked,$FavouriteBlockId)
    {
        $sql_query = "UPDATE $table SET IsBlocked = $IsBlocked WHERE FavouriteBlockId = $FavouriteBlockId";
        $statement =  $this->conn->prepare($sql_query);
        $result = $statement->execute();

        return $result;
    }

}

?>