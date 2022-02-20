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

    function checkZipcode($table,$Zipcode){
        $sql_query = "SELECT * FROM $table WHERE ZipcodeValue = '$Zipcode'";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();
        $count = $statement->rowcount();
        
        return $count;
    }

    function findCityUsingZipcode($table,$Zipcode){
        $sql_query = "SELECT * FROM $table
            left OUTER JOIN city
            on city.CityId = zipcode.CityId
            WHERE zipcode.ZipcodeValue = $Zipcode";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $CityName = $row['CityName'];
        $StateId = $row['StateId'];
        $CityId = $row['CityId'];
        
        return array($CityId,$CityName,$StateId);
    }

    function ListAddress($table,$UserId){
        $sql_query = "SELECT AddressId,UserId,AddressLine1,AddressLine2,PostalCode,Mobile,useraddress.CityId,useraddress.StateId,city.CityName,state.StateName 
        FROM $table 
        LEFT OUTER JOIN city
        on city.CityId = $table.CityId
        LEFT OUTER JOIN state
        on state.StateId = $table.StateId
        WHERE useraddress.UserId = $UserId";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();

        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $row;
    }

    function AddAddress($table,$array){
        $sql_query = "INSERT INTO $table (UserId, AddressLine1, AddressLine2, CityId, StateId, PostalCode, Mobile) 
        VALUES (:UserId, :AddressLine1, :AddressLine2, :CityId, :StateId, :PostalCode, :Mobile)";
        $statement = $this->conn->prepare($sql_query);
        $count = $statement->execute($array);

        return $count;
    }

    function SelectFavouriteServiceProvider($table,$UserId){
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

    function InsertServiceRequest($table,$array){
        $sql_query = "INSERT INTO $table(UserId, ServiceStartDate, SelectTime, TotalHour, ZipCode, ServiceHourlyRate, ServiceHours, ExtraHours, SubTotal, Discount, TotalCost, Comments, PaymentTransactionRefNo, PaymentDue, ExtraServicesCount, HasPets, Status, CreatedDate, ModifiedDate, ModifiedBy, RefundedAmount, PaymentDone, RecordVersion, Bed, Bath) 
                    VALUES (:UserId, :ServiceStartDate, :SelectTime, :TotalHour, :ZipCode, :ServiceHourlyRate, :ServiceHours, :ExtraHours, :SubTotal, :Discount, :TotalCost, :Comments, :PaymentTransactionRefNo, :PaymentDue, :ExtraServicesCount, :HasPets, :Status, now(), now(), :UserId, :RefundedAmount, :PaymentDone, :RecordVersion, :Bed, :Bath)";

        $statement = $this->conn->prepare($sql_query);
        $statement->execute($array);
        $ServiceRequestId = $this->conn->lastInsertId();

        return $ServiceRequestId;
    }

    function InsertAddressIdByServiceRequestId($table,$ServiceRequestId,$AddressId){
        $sql_query = "INSERT INTO $table (ServiceRequestId,AddressId)
                    VALUES ($ServiceRequestId,$AddressId)"; 
        $statement = $this->conn->prepare($sql_query);
        $statement->execute();
    }

    function InsertExtraServiceByServiceRequesstId($table,$ServiceRequestId,$ServiceExtra){
        
        foreach($ServiceExtra as $array){
            $sql_query = "INSERT INTO $table (`ServiceRequestId`, `ServiceExtra`) 
            VALUES ($ServiceRequestId,'$array')";
            $statement = $this->conn->prepare($sql_query);
            $statement->execute();   
        }
    }

    function ActiveServiceProviderList($table){
        $sql_query = "SELECT * FROM $table WHERE UserTypeId = 2 AND `IsActive`='Yes'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $result  = $statement->fetchAll(PDO::FETCH_ASSOC);
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

    function GetUserDetails($table,$UserId){
        $sql_query = "SELECT * FROM $table WHERE UserId = $UserId";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $result  = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function GetUserAddress($table,$AddressId){
        $sql_query = "SELECT AddressId,UserId,AddressLine1,AddressLine2,PostalCode,Mobile,useraddress.CityId,useraddress.StateId,city.CityName,state.StateName 
        FROM $table 
        LEFT OUTER JOIN city
        on city.CityId = $table.CityId
        LEFT OUTER JOIN state
        on state.StateId = $table.StateId
        WHERE $table.AddressId = '$AddressId'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $result  = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>