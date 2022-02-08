<?php 

class BookserviceController{
    function __construct()
    {
        include('models/Book.php');
        $this->model = new BookModel();
        if(!isset($_SESSION))
        {
            session_start();
        }
    }
}

?>