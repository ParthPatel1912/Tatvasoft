<?php 

class HelperlandController{
    function __construct()
    {
        include('models/Helperland.php');
        $this->model = new HelperlandModel();
        if(!isset($_SESSION))
        {
            session_start();
        }
    }
    
    public function Helperland()
    {
        // require('views/HomePage.php');
        header('location: views/HomePage.php');
    }

    public function About()
    {
        header('Location: views/About.php');
    }

    public function BookService()
    {
        header('Location: views/BookService.php');
    }

    public function Contact()
    {
        header('Location: views/Contact.php');
    }

    public function CreateAccount()
    {
        header('Location: views/CreateAccount.php');
    }

    public function FAQ()
    {
        header('Location: views/FAQ.php');
    }

    public function HomePage()
    {
        header('Location: views/HomePage.php');
    }

    public function Prices()
    {
        header('Location: views/Prices.php');
    }

    public function ServiceHistory()
    {
        header('Location: views/ServiceHistory.php');
    }

    public function ServiceProvider()
    {
        header('Location: views/ServiceProvider.php');
    }

    public function ServiceRequets()
    {
        header('Location: views/ServiceRequets.php');
    }

    public function UpcomingServices()
    {
        header('Location: views/UpcomingServices.php');
    }

    public function UserManagement()
    {
        header('Location: views/UserManagement.php');
    }

    public function CustomerServiceDashboard()
    {
        header('Location: views/CustomerServiceDashboard.php');
    }

    public function CustomerSetting()
    {
        header('Location: views/CustomerSetting.php');
    }

    public function FavouriteProns()
    {
        header('Location: views/FavouriteProns.php');
    }

    public function ServiceProviderSetting()
    {
        header('Location: views/ServiceProviderSetting.php');
    }

    public function BookServiceCheckLogin()
    {
        $base_urlLoginModal = '?controller=Helperland&function=HomePage#LoginModal';
        $base_url = '?controller=Helperland&function=BookService';
        if(!isset($_SESSION['UserName'])){
            echo "Login not-success";
            // $_SESSION['message_title'] = "Please Login now";
            // $_SESSION['message_text'] = "";
            // $_SESSION['message_icon'] = "error";
            // header('Location: ' . $base_urlLoginModal);
        }

        if(isset($_SESSION['UserName'])){
            echo "Login successfull";
            // header('Location: ' . $base_url);
        }
    }

    public function LoginServiceProvider()
    {
        $base_urlLoginModal = '?controller=Helperland&function=HomePage#LoginModal';
        $base_url = '?controller=Helperland&function=UpcomingServices';
        if(!isset($_SESSION['UserName'])){
            $_SESSION['message_title'] = "Please Login now";
            $_SESSION['message_text'] = "";
            $_SESSION['message_icon'] = "error";
            header('Location: ' . $base_urlLoginModal);
        }

        if(isset($_SESSION['UserName'])){
            header('Location: ' . $base_url);
        }
    }
}

?>