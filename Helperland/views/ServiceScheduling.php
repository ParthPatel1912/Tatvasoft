<?php 
        include 'header_notification.php';

        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=ServiceScheduling";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=ServiceScheduling";
        }
    ?>
    <title>Service Schedule</title>

<?php
include '../controllers/Calender.php';
include '../controllers/ServiceSchedulingController.php';
$calendar = new Calendar();
$schedule = new ServiceSchedulingController();
$result = $schedule->getScheduleDetail();
foreach($result as $val){
    $id = $val['ServiceRequestId'];
    $date = $val['ServiceStartDate'];
    $calendar->add_event('Service: '.$id, $date , 1, 'green');
}
?>

<section id="Upcoming-service-welcome">
    <div class="container">
        <div class="row text-center">
            <h1> Welcome, <b>
            <?php 
                if (isset($_SESSION['UserName'])) { 
                    echo $_SESSION['UserName'];   
                }
                else{
                    echo 'Service Provider';
                }
            ?>
            </b></h1>
        </div>
    </div>
</section>

<section id="Upcoming-service-list">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-2 service-menu">
                    <div class="side-menu-item">
                        
                            Dashboard
                    </div>
                    <div class="side-menu-item">
                        <a href="<?= $base_url."?controller=Helperland&function=NewServiceRequests"?>"
                            class="style-none text-white">
                            New Service
                        </a>
                    </div>
                    <div class="side-menu-item">
                        <a href="<?= $base_url."?controller=Helperland&function=UpcomingServices"?>"
                                class="style-none text-white">
                            Upcoming Services
                        </a>
                    </div>
                    <div class="side-menu-item side-menu-item-active">
                        Service Schedule
                    </div>
                    <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=ServiceHistoryforSP"?>" class="style-none text-white border-0">Service History</a> 
                    </div>
                    <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=ServiceProviderRating"?>" class="style-none text-white border-0">My Ratings</a>
                    </div>
                    <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=BlockCustomer"?>" class="style-none text-white border-0">Block Customer</a>
                    </div>
                </div>
                <div class="col-md-8 table-responsive-lg table-responsive-md table-responsive-sm table-responsive">
                    <div class="dov-content">
                        <?= $calendar ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'footer.php';?>