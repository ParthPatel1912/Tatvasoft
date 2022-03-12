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
<title>Service Rating</title>

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
                    Service Schedule
                </div>
                <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=ServiceHistoryforSP"?>"
                        class="style-none text-white border-0">Service History</a>
                </div>
                <div class="side-menu-item side-menu-item-active">
                    <a href="<?= $base_url."?controller=Helperland&function=ServiceProviderRating"?>"
                        class="style-none text-white border-0">My Ratings</a>
                </div>
                <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=BlockCustomer"?>"
                        class="style-none text-white border-0">Block Customer</a>
                </div>
            </div>
            <div class="col-md-8 table-responsive-lg table-responsive-md table-responsive-sm table-responsive">
                <!-- <div id="SPrating" class="container"> -->
                <!-- <div class="row p-2 mb-3" style="border:1px solid grey">
                        <div class="col-md-3 mb-2">
                            <span class="font-bold">@item.ServiceRequestID </span> <br />
                            <span class="font-bold"> @item.CustomerName </span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div><img src="../assets/img/calendar2.png"><b>@item.ServiceDate</b> </div>
                            <div><img src="../assets/img/layer-14.png"> 12:00 - 18:00 </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <span class="font-bold">Ratings </span><br />
                            <div>

                                <img src="../assets/img/yellow-small-star.png" class="service-history-star-icon">
                                <span>Very Good </span>
                            </div>
                        </div>
                        <hr class="mt-2" />
                        <div class="col-md-12">
                            <span class="font-bold"> Customer Comments: </span> @item.Comments
                        </div>
                    </div>
                    <div class="row p-2 mb-3" style="border:1px solid grey">
                        <div class="col-md-3 mb-2">
                            <span class="font-bold">@item.ServiceRequestID </span> <br />
                            <span class="font-bold"> @item.CustomerName </span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div><img src="../assets/img/calendar2.png"><b>@item.ServiceDate</b> </div>
                            <div><img src="../assets/img/layer-14.png"> 12:00 - 18:00 </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <span class="font-bold">Ratings </span><br />
                            <div>

                                <img src="../assets/img/yellow-small-star.png" class="service-history-star-icon">
                                <span>Very Good </span>
                            </div>
                        </div>
                        <hr class="mt-2" />
                        <div class="col-md-12">
                            <span class="font-bold"> Customer Comments: </span> @item.Comments
                        </div>
                    </div> -->
                <!-- </div> -->
                <table id="sp-rating" class="container table-responsive-lg table-responsive-md table-responsive-sm table-responsive" style="width:100%; border:0; border-collapse: separate;">

                    <thead>
                    </thead>

                    <tbody id="SPrating" class="container">
                        
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php';?>