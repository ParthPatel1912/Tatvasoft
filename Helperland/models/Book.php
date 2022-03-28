<?php 

class BookModel{

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

    function checkZipcode($table,$Zipcode)
    {
        $sql_query = "SELECT * FROM $table WHERE ZipcodeValue = '$Zipcode'";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();
        $count = $statement->rowcount();
        
        return $count;
    }

    function findCityUsingZipcode($table,$Zipcode)
    {
        $sql_query = "SELECT * FROM $table
            left OUTER JOIN city
            on city.CityId = zipcode.CityId
            left outer join state
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

    function ListAddress($table,$UserId)
    {
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

    function AddAddress($table,$array)
    {
        $sql_query = "INSERT INTO $table (UserId, AddressLine1, AddressLine2, CityId, StateId, PostalCode, Mobile) 
        VALUES (:UserId, :AddressLine1, :AddressLine2, :CityId, :StateId, :PostalCode, :Mobile)";
        $statement = $this->conn->prepare($sql_query);
        $count = $statement->execute($array);

        return $count;
    }

    function UpdateZipcodebyUserId($table,$PostalCode, $UserId)
    {
        $sql_query = "UPDATE $table SET ZipCode = $PostalCode WHERE $table.UserId = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
    }

    function SelectFavouriteServiceProvider($table,$UserId)
    {
        $sql_query = "SELECT $table.FavouriteBlockId,$table.UserId,$table.IsFavorite,$table.IsBlocked,user.FirstName,user.LastName,$table.TargetUserId
        FROM $table
        LEFT OUTER JOIN user
        ON $table.TargetUserId = user.UserId
        where $table.UserId = $UserId
        AND $table.IsFavorite = 1";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();

        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $row;
    }

    function InsertServiceRequest($table,$array)
    {
        $sql_query = "INSERT INTO $table(UserId, ServiceStartDate, SelectTime, TotalHour, ZipCode, ServiceHourlyRate, ServiceHours, ExtraHours, SubTotal, Discount, TotalCost, Comments, PaymentTransactionRefNo, PaymentDue, ExtraServicesCount, HasPets, Status, CreatedDate, ModifiedDate, ModifiedBy, RefundedAmount, PaymentDone, RecordVersion, Bed, Bath, FavouriteServiceProviderId) 
                    VALUES (:UserId, :ServiceStartDate, :SelectTime, :TotalHour, :ZipCode, :ServiceHourlyRate, :ServiceHours, :ExtraHours, :SubTotal, :Discount, :TotalCost, :Comments, :PaymentTransactionRefNo, :PaymentDue, :ExtraServicesCount, :HasPets, :Status, now(), now(), :UserId, :RefundedAmount, :PaymentDone, :RecordVersion, :Bed, :Bath, :Favourite)";

        $statement = $this->conn->prepare($sql_query);
        $statement->execute($array);
        $ServiceRequestId = $this->conn->lastInsertId();

        return $ServiceRequestId;
    }

    function InsertAddressIdByServiceRequestId($table,$ServiceRequestId,$AddressId)
    {

        $sql_query = "SELECT AddressId,useraddress.UserId,user.Email,AddressLine1,AddressLine2,PostalCode,useraddress.Mobile,useraddress.CityId,useraddress.StateId,city.CityName,state.StateName 
        FROM useraddress 
        LEFT OUTER JOIN user
        on user.UserId = useraddress.UserId
        LEFT OUTER JOIN city
        on city.CityId = useraddress.CityId
        LEFT OUTER JOIN state
        on state.StateId = city.StateId
        WHERE useraddress.AddressId = $AddressId
        AND useraddress.IsDeleted = 0";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $result  = $statement->fetch(PDO::FETCH_ASSOC);

        $AddressLine1 = $result['AddressLine1'];
        $AddressLine2 = $result['AddressLine2'];
        $CityName = $result['CityName'];
        $PostalCode = $result['PostalCode'];
        $StateName = $result['StateName'];
        $Mobile = $result['Mobile'];
        $Email = $result['Email'];
        
        $sql_query2 = "INSERT INTO $table (ServiceRequestId,AddressId,AddressLine1,AddressLine2,City,State,PostalCode,Mobile,Email)
                    VALUES ($ServiceRequestId,$AddressId,'$AddressLine1','$AddressLine2','$CityName','$StateName','$PostalCode','$Mobile','$Email')";
        $statement2 = $this->conn->prepare($sql_query2);
        $statement2->execute();

        $sql_query3 = "UPDATE servicerequest SET ZipCode= $PostalCode WHERE servicerequest.ServiceRequestId = $ServiceRequestId";
        $statement3 = $this->conn->prepare($sql_query3);
        $statement3->execute();
    }

    function InsertExtraServiceByServiceRequesstId($table,$ServiceRequestId,$ServiceExtra)
    {
        
        // foreach($ServiceExtra as $array){
            $sql_query = "INSERT INTO $table (ServiceRequestId, ServiceExtra) 
            VALUES ($ServiceRequestId,'$ServiceExtra')";
            $statement = $this->conn->prepare($sql_query);
            $statement->execute();
        // }
    }

    function ActiveServiceProviderList($table)
    {
        $sql_query = "SELECT * FROM $table WHERE UserTypeId = 2 AND `IsActive`='Yes'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function GetUsersServiceproviderList($table,$ServiceProvider)
    {
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

    function GetUserDetails($table,$UserId)
    {
        $sql_query = "SELECT * FROM $table WHERE UserId = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $result  = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function GetUserAddress($table,$AddressId)
    {
        $sql_query = "SELECT AddressId,UserId,AddressLine1,AddressLine2,PostalCode,Mobile,useraddress.CityId,useraddress.StateId,city.CityName,state.StateName 
        FROM $table 
        LEFT OUTER JOIN city
        on city.CityId = $table.CityId
        LEFT OUTER JOIN state
        on state.StateId = city.StateId
        WHERE $table.AddressId = '$AddressId'
        AND IsDeleted = 0";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $result  = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function ListBlocked($table,$UserId)
    {
        $sql_query = "SELECT * FROM $table WHERE TargetUserId = $UserId AND IsBlocked = '1'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();

        $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>