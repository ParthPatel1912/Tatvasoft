<?php 

class UserModel{

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

    public function checkEmail($table,$EmailAddress)
    {
        $sql_query = "SELECT * FROM $table WHERE Email = '$EmailAddress'";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();
        $count = $statement->rowCount();

        return $count;
    }

    public function insert_user($table,$array)
    {
        $sql_query = "INSERT INTO $table (FirstName, LastName, Email, Password, Mobile, UserTypeId, IsRegisteredUser, CreatedDate, ModifiedDate, ModifiedBy, IsActive, Resetkey, Status) 
        VALUES (:FirstName, :LastName, :EmailAddress, :Password, :PhoneNumber, :UserTypeId, :IsRegisteredUser, now(), now(), '', :IsActive, :Resetkey, :Status)";
        $statement = $this->conn->prepare($sql_query);
        $count = $statement->execute($array);

        return $count;
    }

    public function CheckLogin($table, $EmailAddress, $Password)
    {
        $sql_query = "SELECT * FROM $table WHERE Email = '$EmailAddress'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $count = $statement->rowCount();
        $FirstName = $row['FirstName'];
        $LastName = $row['LastName'];
        $Name = $FirstName . " " . $LastName;
        $_SESSION['UserName'] = $Name;
        $UserTypeId = $row['UserTypeId'];
        $IsActive = $row['IsActive'];

        if ($count == 1){

            if (password_verify($Password, $row['Password'])) {

                return array($count,$UserTypeId,$Name,$IsActive);
            }
        }

        else {

            return array($count,$UserTypeId,$Name,$IsActive);
        }
    }

    public function CheckEmailPassword($table, $EmailAddress, $Password)
    {
        $sql_query = "SELECT * FROM $table WHERE Email = '$EmailAddress'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $count = $statement->rowCount();

        if ($count == 1) {
            if (password_verify($Password, $row['Password'])) {
                return $count;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }

        
    }

    public function checkEmailForgot($table,$EmailAddress)
    {
        $sql_query = "SELECT * FROM $table WHERE Email = '$EmailAddress'";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();
        $count = $statement->rowCount();

        return $count;
    }

    public function forgot($table, $EmailAddress)
    {
        $sql_query = "SELECT * FROM $table WHERE Email = '$EmailAddress' AND IsActive = 'Yes'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $count = $statement->rowCount();
        $FirstName = $row['FirstName'];
        $LastName = $row['LastName'];
        $Name = $FirstName . " " . $LastName;
        $Resetkey = $row['Resetkey'];

        return array($count,$Name,$Resetkey);
    }

    public function ResetPassword($table, $array, $Resetkey)
    {
        $sql_query = "SELECT * FROM $table WHERE Resetkey = '$Resetkey' AND IsActive = 'Yes'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $count = $statement->rowCount();

        if($count == 1){

            $sql_query_2 = "UPDATE $table SET Password= :Password, ModifiedDate = now() WHERE Resetkey = :Resetkey AND IsActive='Yes' ";
            $statement_2 = $this->conn->prepare($sql_query_2);
            $result = $statement_2->execute($array);

            $Resetkeynew = bin2hex(random_bytes(15));
            $sql_query_3 = "UPDATE $table SET Resetkey= '$Resetkeynew' WHERE Resetkey = '$Resetkey'";
            $statement_3 =  $this->conn->prepare($sql_query_3);
            $statement_3->execute();

            return $result;
        }
        else{
            return 0;
        }
    }

    public function ActivationAccount($table,$Resetkey)
    {

        $sql_query = "SELECT * FROM $table WHERE Resetkey = '$Resetkey' AND IsActive = 'No'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $count = $statement->rowCount();

        if($count == 1){
            $sql_query = "UPDATE $table SET IsActive = 'Yes' WHERE Resetkey='$Resetkey'";
            $statement =  $this->conn->prepare($sql_query);
            $result = $statement->execute();
            
            $Resetkeynew = bin2hex(random_bytes(15));
            $sql_query_3 = "UPDATE $table SET Resetkey= '$Resetkeynew' WHERE Resetkey = '$Resetkey'";
            $statement_3 =  $this->conn->prepare($sql_query_3);
            $statement_3->execute();

            return $result;
        }
        else{
            return 0;
        }
    }
}

?>