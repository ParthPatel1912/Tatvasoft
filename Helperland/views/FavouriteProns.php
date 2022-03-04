<?php 
        include 'header_notification.php';
        
        if(isset($_SESSION['base_url'])){
            $_SESSION['base_url'] = "";
            $_SESSION['base_url'] = "?controller=Helperland&function=CustomerServiceDashboard";
        }
        else{
            $_SESSION['base_url'] = "?controller=Helperland&function=CustomerServiceDashboard";
        }
    ?>
<title>Favourite Prons</title>

<section id="service-history-welcome">
    <div class="container">
        <div class="row text-center">
            <h1> Welcome, <b>
                    <?php 
                    if (isset($_SESSION['UserName'])) { 
                        echo $_SESSION['UserName'];   
                    }
                    else{
                        echo 'Coustomer';
                    }
                ?>
                </b></h1>
        </div>
    </div>
</section>

<section id="service-history-list">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2 service-menu">
                <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=CustomerServiceDashboard"?>"
                        class="style-none text-white">
                        Dashboard
                    </a>
                </div>
                <div class="side-menu-item">
                    <a href="<?= $base_url."?controller=Helperland&function=ServiceHistory"?>"
                        class="style-none text-white">
                        Service History
                    </a>
                </div>
                <div class="side-menu-item">
                    Service Schedule
                </div>
                <div class="side-menu-item side-menu-item-active">
                    <a href="<?= $base_url."?controller=Helperland&function=FavouriteProns"?>"
                        class="style-none text-white">
                        Favourite Pros
                    </a>
                </div>
                <div class="side-menu-item">
                    Invoices Notifications
                </div>
                <div class="side-menu-item">
                    Notifications
                </div>
            </div>
            <div class="row col-md-8" id="favouritePron">

                <!-- <div class="col-md-3">
                    <div class="favourite-border text-center">
                        <div class="btn round">
                            <img src="../assets/img/cap.png" width="75%" alt="" class="">
                            <label class="mt-5"><b>ppp</b></label>
                        </div>
                        <div class="mt-1">
                            <img src="../assets/img/star1.png" class="service-history-star-icon">
                            <img src="../assets/img/star1.png" class="service-history-star-icon">
                            <img src="../assets/img/star1.png" class="service-history-star-icon">
                            <img src="../assets/img/star1.png" class="service-history-star-icon">
                            <img src="../assets/img/star2.png" class="service-history-star-icon"> 4
                        </div>
                        <div class="mt-3 mb-3">
                            <input type="button" class="btn dark-blue btn-sm rounded-pill" value="Remove">
                            <input type="button" class="btn lite-red btn-sm rounded-pill" value="Block">
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    </div>
</section>

<?php include 'footer.php';?>