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

    public function insert_customer($table,$array)
    {
        $sql_query = "INSERT INTO $table (FirstName, LastName, Email, Password, Mobile, UserTypeId, IsRegisteredUser, CreatedDate, ModifiedDate, ModifiedBy, IsActive, Resetkey, Status) 
        VALUES (:FirstName, :LastName, :EmailAddress, :Password, :PhoneNumber, :UserTypeId, :IsRegisteredUser, now(), now(), '', :IsActive, :Resetkey, :Status)";
        $statement = $this->conn->prepare($sql_query);
        $result = $statement->execute($array);

        if ($result) {
            $_SESSION['status_msg'] = "Your Account has been Created";
            $_SESSION['status_txt'] = "Please Verify Your Email";
            $_SESSION['status'] = "success";
        } else {
            $_SESSION['status_msg'] = "Your Account is not Created";
            $_SESSION['status_txt'] = "Please Try Again";
            $_SESSION['status'] = "alert";
        }
        return array($_SESSION['status_msg'], $_SESSION['status_txt'], $_SESSION['status']);
    }

    public function CheckLogin($table, $EmailAddress, $Password)
    {
        $base_urlCoustomer = "?controller=Helperland&function=ServiceHistory";
        $base_urlService = "?controller=Helperland&function=UpcomingServices";
        $base_urlAdmin = "?controller=Helperland&function=UserManagement";
        $base_urlLoginModal = $_SESSION['base_url'].'#LoginModal';
        
        $sql_query = "select * from $table where Email = '$EmailAddress' and Password = '$Password'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $count = $statement->rowCount();
        $FirstName = $row['FirstName'];
        $LastName = $row['LastName'];
        $Name = $FirstName . " " . $LastName;
        $UserTypeId = $row['UserTypeId'];

        if ($count == 1){

        //if (password_verify($Password, $row['Password'])) {

            if($UserTypeId == 1){
                $_SESSION['user_msg'] = "Welcome, Admin";
                $_SESSION['user_txt'] = $Name;
                $_SESSION['user_status'] = "success";
                header('Location: '. $base_urlAdmin);
            }
            else if($UserTypeId == 2){
                $_SESSION['user_msg'] = "Welcome, Service Provider";
                $_SESSION['user_txt'] = $Name;
                $_SESSION['user_status'] = "success";
                header('Location: '. $base_urlService);
            }
            else{
                $_SESSION['user_msg'] = "Welcome, Coustomer";
                $_SESSION['user_txt'] = $Name;
                $_SESSION['user_status'] = "success";
                header('Location: '. $base_urlCoustomer);
            }
        }

        else {

            $_SESSION['user_msg'] = "User does not exists";
            $_SESSION['user_txt'] = "Please Enter Valid User";
            $_SESSION['user_status'] = "error";
            header('Location: '. $base_urlLoginModal);

            // $_SESSION['user_notexist'] = "User does not exists";
            // $_SESSION['user_error'] = "Please Enter Valid User";
        }

        return array($_SESSION['user_msg'], $_SESSION['user_txt'], $_SESSION['user_status']);

        // return array($_SESSION['user_msg'], $_SESSION['user_txt'], $_SESSION['user_status'],$_SESSION['user_notexist'],$_SESSION['user_error']);
    }

    public function CheckEmailPassword($table, $EmailAddress, $Password)
    {
        $sql_query = "select * from $table where Email = '$EmailAddress' and Password = '$Password'";
        $statement =  $this->conn->prepare($sql_query);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $count = $statement->rowCount();

        return $count;
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
        $sql_query = "select * from $table where Email = '$EmailAddress'";
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

    public function ResetPassword($table, $array)
    {
        $sql_query = "UPDATE $table SET Password= :Password, ModifiedDate = now() WHERE Resetkey = :Resetkey";
        $statement = $this->conn->prepare($sql_query);
        $result = $statement->execute($array);

        if ($result) {
            $_SESSION['status_msg'] = "Password Updated Successfully";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "success";
        } else {
            $_SESSION['status_msg'] = "Password Not Updated. Please Try Again. ";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "warning";
        }
        
        return array($_SESSION['status_msg'], $_SESSION['status_txt'], $_SESSION['status']);

    }
}

?>