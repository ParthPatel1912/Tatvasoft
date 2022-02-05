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
}

?>