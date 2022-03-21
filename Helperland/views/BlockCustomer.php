<?php 
        include 'header_notification.php';

        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=UpcomingServices";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=UpcomingServices";
        }
    ?>
    <title>Service History</title>

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
                    <div class="side-menu-item">
                        <a href="<?= $base_url."?controller=Helperland&function=ServiceScheduling"?>"
                                        class="style-none text-white">
                            Service Schedule
                        </a>
                    </div>
                    <div class="side-menu-item">
                       <a href="<?= $base_url."?controller=Helperland&function=ServiceHistoryforSP"?>" class="style-none text-white border-0">Service History</a> 
                    </div>
                    <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=ServiceProviderRating"?>" class="style-none text-white border-0">My Ratings</a>
                    </div>
                    <div class="side-menu-item side-menu-item-active">
                    Block Customer
                    </div>
                </div>
                <div class="row col-md-8 table-responsive-lg table-responsive-md table-responsive-sm table-responsive" id="blockCoustomer">
                    <!-- <div class="col-md-3">
                        <div class="favourite-border text-center">
                            <div class="btn round">
                                <img src="../assets/img/cap.png" width="75%" alt="" class="">
                                <label class="mt-5"><b>ppp</b></label>
                            </div>
                            <div class="mt-3 mb-3">
                                <input type="button" class="btn lite-red btn-sm rounded-pill" value="Block">
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php';?>