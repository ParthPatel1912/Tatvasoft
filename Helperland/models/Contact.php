<?php 

class ContactModel{

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

    function insert_contact($table,$array){
        $sql_query = "INSERT INTO $table(Name, Email, Subject, PhoneNumber, Message, CreatedOn)
        VALUES (:Name, :Email, :Subject, :PhoneNumber, :Message, now())";
        $statement= $this->conn->prepare($sql_query);
        $result = $statement->execute($array);

        if ($result) {
            $_SESSION['status_msg'] = "Message Sent Succesfully";
            $_SESSION['status_txt'] = "";
            $_SESSION['status'] = "success";
        } 
        else {
            $_SESSION['status_msg'] = "Your Message is not Sent";
            $_SESSION['status_txt'] = "Please Try Again";
            $_SESSION['status'] = "error";
        }
        return array($_SESSION['status_msg'], $_SESSION['status_txt'], $_SESSION['status']);
    }
}

?>