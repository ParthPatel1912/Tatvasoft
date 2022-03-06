<?php require '/tatvasoft/Project/PHP/views/message_error.php' ?>

<?php 
class ContactController{
    function __construct()
    {
        include('models/Contact.php');
        $this->model = new ContactModel();
        if(!isset($_SESSION))
        {
            session_start();
        } 
    }

    public function Insert_Contact()
    {
        $base_url = '?controller=Helperland&function=Contact';
        if (isset($_POST)){
            $FirstName =  trim($_POST['FirstName']);
            $LastName =  trim($_POST['LastName']);
            $Email = trim($_POST['Email']);
            $Subject = trim($_POST['Subject']);
            $PhoneNumber = trim($_POST['PhoneNumber']);
            $Message = trim($_POST['Message']);

            $error = "";

            if($FirstName == "") {
                $error .= "<li>Please enter first name.</li>";
                
            }
            elseif(!preg_match("/^[a-zA-Z]*$/",$FirstName)){
                $error .= "<li>Please enter first name without space.</li>";
            }
            if($LastName == "") {
                $error .= "<li>Please enter last name.</li>";
            }
            elseif(!preg_match("/^[a-zA-Z]*$/",$LastName)){
                $error .= "<li>Please enter last name without space.</li>";
            }
            if($Email == ""){
                $error .= "<li>Please enter email address.</li>";
            } 
            else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $Email)){
                $error .= '<li>Enter a valid email.</li>';
            }
            if($PhoneNumber == "") {
                $error .= "<li>Please enter phone number.</li>";
            }
            else if(strlen($PhoneNumber)<10){
                $error .= "<li>Phone number shoud be 10 digit.</li>";
            }
            else if(strlen($PhoneNumber)>10){
                $error .= "<li>Phone number shoud be 10 digit.</li>";
            }
            if($Message == ""){
                $error .= "<li>Please enter message.</li>";
            }
            
            if($error != ""){
                
                flash('contact',$error);
                redirect($base_url);
            }
            else{
                $array = [
                    'Name' => $FirstName . " " . $LastName,
                    'Email' => $Email,
                    'Subject' => $Subject,
                    'PhoneNumber' => $PhoneNumber,
                    'Message' => $Message
                ];

                ?>

                    <script>
                        $(document).ready(function() {
                            $("#iframeloading").show();   
                        });
                    </script>

                <?php

                $result = $this->model->insert_contact('contactus', $array);

                ?>

                    <script>
                        $(document).ready(function() {
                            $("#iframeloading").hide();   
                        });
                    </script>

                <?php
                
                if ($result) {
                    $_SESSION['message_title'] = "Message Sent Succesfully";
                    $_SESSION['message_text'] = "";
                    $_SESSION['message_icon'] = "success";
                } 
                else {
                    $_SESSION['message_title'] = "Your Message is not Sent";
                    $_SESSION['message_text'] = "Please Try Again";
                    $_SESSION['message_icon'] = "error";
                }
                header('Location: ' . $base_url);
            }
        }
        else{
            $_SESSION['message_title'] = "Your Message is not Sent";
            $_SESSION['message_text'] = "Please Try Again";
            $_SESSION['message_icon'] = "error";
            header('Location: ' . $base_url);
        }
    }
}

?>