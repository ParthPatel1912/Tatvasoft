<?php

class ServiceSchedulingController{
    function __construct()
    {
        include('../models/ServiceProvider.php');
        $this->model = new ServiceProviderModel();
        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    public function getScheduleDetail(){
        $UserId = $_SESSION['UserId'];
        $result = $this->model->ServiceSchedule('servicerequest', $UserId);
        return $result;
    }
}

?>