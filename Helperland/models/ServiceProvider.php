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

    function CheckUser($table,$UserID)
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
                        WHERE $table.UserId = 3";
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

}

?>