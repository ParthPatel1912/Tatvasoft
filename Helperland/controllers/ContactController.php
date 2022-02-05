<?php require '/tatvasoft/Project/PHP/views/message_error.php' ?>

<?php 
class ContactController{
    function __construct()
    {
        include('models/Contact.php');
        $this->model = new ContactModel();
        session_start();
    }

    public function Insert_Contact()
    {
        $base_url = 'http://localhost:8088/?controller=Helperland&function=Contact';
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
            if($LastName == "") {
                $error .= "<li>Please enter last name.</li>";
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
                $result = $this->model->insert_contact('contactus', $array);
                $_SESSION['status_msg'] = $result[0];
                $_SESSION['status_txt'] = $result[1]; 
                $_SESSION['status'] = $result[2];
                header('Location: ' . $base_url);
            }
        }
        else{
            $_SESSION['status_msg'] = "Your Message is not Sent";
            $_SESSION['status_txt'] = "Please Try Again";
            $_SESSION['status'] = "error";
            header('Location: ' . $base_url);
        }
    }
}

?>