<?php 

class HelperlandController{
    function __construct()
    {
        include('models/Helperland.php');
        $this->model = new HelperlandModel();
    }
    
    public function Helperland()
    {
        // require('views/HomePage.php');
        header('location: views/HomePage.php');
    }

    public function Insert_ContactUs()
    {
        if (isset($_POST)){
            $base_url = 'http://localhost:8088/views/Contact.php';
            $FirstName =  $_POST['FirstName'];
            $LastName =  $_POST['LastName'];
            $array = [
                'Name' => $FirstName . " " . $LastName,
                'Email' => $_POST['Email'],
                'Subject' => $_POST['Subject'],
                'PhoneNumber' => $_POST['PhoneNumber'],
                'Message' => $_POST['Message'],
                'CreatedOn' => date('Y-m-d H:i:s')
            ];
            $this->model->insert_contactUs('contactus', $array);
            header('Location: ' . $base_url);
        }
        else{
            echo 'Error Occurring in Data';
        }
    }
}

?>