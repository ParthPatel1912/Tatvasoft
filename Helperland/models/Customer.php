<?php 

class CustomerModel{

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

    function CheckUser($table,$UserID)
    {
        $sql_query = "SELECT * FROM $table WHERE UserId = $UserID";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function ListAddress($table,$UserId){
        $sql_query = "SELECT AddressId,UserId,AddressLine1,AddressLine2,PostalCode,Mobile,useraddress.CityId,useraddress.StateId,city.CityName,state.StateName 
        FROM $table 
        LEFT OUTER JOIN city
        on city.CityId = $table.CityId
        LEFT OUTER JOIN state
        on state.StateId = city.StateId
        WHERE useraddress.UserId = $UserId
        AND IsDeleted = 0";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();

        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $row;
    }

    public function FindAdsressByAddressId($table,$AddressId)
    {
        $sql_query = "SELECT * from $table WHERE addressid = $AddressId";
        $statement= $this->conn->prepare($sql_query);
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

    function checkZipcode($table,$Zipcode){
        $sql_query = "SELECT * FROM $table WHERE ZipcodeValue = '$Zipcode'";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();
        $count = $statement->rowcount();
        
        return $count;
    }

    function updateUser($table,$array,$UserId){
        $sql_query = "UPDATE $table SET FirstName = :FirstName, LastName = :LastName, Mobile = :PhoneNumber, DateOfBirth = :dob, LanguageId = :Language, ModifiedDate = now()
                    WHERE UserId = $UserId";
        $statement= $this->conn->prepare($sql_query);
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

    function AddAddress($table,$array){
        $sql_query = "INSERT INTO $table (UserId, AddressLine1, AddressLine2, CityId, StateId, PostalCode, Mobile) 
        VALUES (:UserId, :AddressLine1, :AddressLine2, :CityId, :StateId, :PostalCode, :Mobile)";
        $statement = $this->conn->prepare($sql_query);
        $count = $statement->execute($array);

        return $count;
    }

    function DeleteAddress($table,$AddressId){
        $sql_query = "UPDATE $table SET IsDeleted = 1 WHERE AddressId = $AddressId";
        $statement = $this->conn->prepare($sql_query);
        $count = $statement->execute();

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

    function ListCustomerServiceDashboard($table,$UserId)
    {
        $sql_query = "SELECT ServiceRequestId,ServiceStartDate,SelectTime,TotalHour,ServiceProviderId,TotalCost,Status FROM $table
        WHERE UserId = $UserId";
        $statement= $this->conn->prepare($sql_query);
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
        WHERE $table.ServiceRequestId = $ServiceRequestId";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();

        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $row;
    }

    function GetServiceHistoryUser($table,$serviceid)
    {
        $sql_query = "SELECT * FROM $table WHERE ServiceRequestId = $serviceid" ;
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function GetServiceProviderNameByServiceRequest($table,$serviceid)
    {
        $sql_query = "SELECT user.FirstName,user.LastName FROM $table
        LEFT OUTER JOIN user
        on $table.UserId = user.UserId
        WHERE $table.ServiceRequestId  = $serviceid" ;
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function GetUserDetails($table,$UserId){
        $sql_query = "SELECT * FROM $table WHERE UserId = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    function UpdateServiceTime($table,$array,$ServiceRequestId){
        $sql_query = "UPDATE $table SET SelectTime = :newtime, ModifiedDate = now() ,ModifiedBy= :modifiedby , RecordVersion= :recordversion, Status= :status WHERE ServiceRequestId = $ServiceRequestId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute($array);
        $count = $statement->rowCount();
        return $count;
      
    }

    function CancelService($table,$array,$ServiceRequestId){
        $sql_query = "UPDATE $table SET HasIssue = :hasissue, ModifiedDate = now() ,ModifiedBy= :modifiedby , RecordVersion= :recordversion, Status= :status WHERE ServiceRequestId = $ServiceRequestId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute($array);
        $count = $statement->rowCount();
        return $count;
      
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

    function CountRating($table,$ServiceProviderId){
        $sql_query = "SELECT * FROM $table WHERE ServiceRequestId = $ServiceProviderId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $count = $statement->rowCount();
        $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return array($result,$count);
    }

    function InsertRating($table,$array)
    {
        $sql_query = "INSERT INTO $table (ServiceRequestId, RatingFrom, RatingTo, Ratings, Comments, RatingDate, OnTimeArrival, Friendly, QualityOfService) 
                    VALUES (:ServiceRequestId, :ratingfrom, :ratingto, :Ratings, :rateComment, now(), :OnTimeArrival, :Friendly, :QualityOfService)";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute($array);
        $count = $statement->rowCount();
        return $count;
    }

    function GetSPRattings($table,$ServiceProviderId){
        $sql_query = "SELECT * FROM $table WHERE RatingTo = $ServiceProviderId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $count = $statement->rowCount();
        $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return array($result,$count);
    }

    function ListFavourite($table,$UserId)
    {
        $sql_query = "SELECT * FROM $table WHERE UserId = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();

        $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function updateIsfavourite($table,$IsFavourite,$FavouriteBlockId)
    {
        $sql_query = "UPDATE $table SET IsFavorite = $IsFavourite WHERE FavouriteBlockId = $FavouriteBlockId";
        $statement =  $this->conn->prepare($sql_query);
        $result = $statement->execute();

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