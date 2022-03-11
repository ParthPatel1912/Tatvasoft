<?php
        if(!isset($_SESSION))
        {
            session_start();
        }
?>

<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->

    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/e6dbed9bdc.js" crossorigin="anonymous"></script>


    <?php $base_url = 'http://localhost:8088/'; ?>

    <?php include 'Login.php'?>
    <?php include 'WarningBookservice.php'?>
    <?php include 'ForgotPassword.php' ?>
    <?php include 'ResetPassword.php' ?>

</head>

<body id="body"  onload="disablesetupservice()">

    <!-- Header -->

    <header class="sticky-top">
        <div class=" main position-relative">
            <nav class="navbar navbar-expand-xl home-navbar" id="navbar">
                <div class="container-fluid navbar_main">
                    <a class="navbar-brand py-0 ps-4" href="<?= $base_url."?controller=Helperland&function=HomePage"?>">
                        <img src="../assets/img/logo-large.png" class="img-fluid" alt="" height="53px" width="75px">
                    </a>
                    <img src="../assets/img/icon-notification.png" class=" display-sm display-sm-notification text-right nav-border nav-link-image">
                    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="40"
                            height="40"
                            fill="#fff"
                            class="bi bi-list"
                            viewBox="0 0 16 16"
                            >
                            <path
                                fill-rule="evenodd"
                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                        </svg>
                    </button>
                    <div class="collapse navbar-collapse navbar_list" id="navbarText">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-left">
                            <li class="nav-item display-sm">
                                <a class="nav-link" href="#"> Welcome, 
                                <?php 
                                    if (isset($_SESSION['UserName'])) { 
                                        echo $_SESSION['UserName'];   
                                    }
                                    else{
                                        echo 'Service Provider OR Coustomer';
                                    }
                                ?>
                                </a>
                            </li>
                            <?php 
                                if($_SESSION['UserTypeId'] == 3){ ?>
                                    <li class="nav-item display-sm">
                                        <a class="nav-link rounded-link active" href="<?= $base_url."?controller=Helperland&function=BookService"?>">Book now </a>
                                    </li>
                                    <?php
                                }
                            ?>

                            <li class="nav-item display-sm">
                                <a class="nav-link" href="
                                <?php 
                                    if($_SESSION['UserTypeId'] == 3){
                                        echo $base_url."?controller=Helperland&function=CustomerServiceDashboard";
                                    }
                                ?>
                                "> Dashboard</a>
                            </li>
                            <li class="nav-item display-sm">
                                <a class="nav-link" href="
                                    <?php 
                                    if($_SESSION['UserTypeId'] == 3){
                                        echo $base_url."?controller=Helperland&function=ServiceHistory";
                                    }
                                    elseif ($_SESSION['UserTypeId'] == 2) { 
                                        echo $base_url."?controller=Helperland&function=ServiceHistoryforSP";
                                    }
                                    ?>"> Service History</a>
                            </li>
                            <li class="nav-item display-sm">
                                <a class="nav-link" href="#"> Service Schedule</a>
                            </li>
                            <li class="nav-item display-sm">
                                <a class="nav-link" href="<?= $base_url."?controller=Helperland&function=FavouriteProns"?>">  Favourite Pros </a>
                                </a>
                            </li>
                            <li class="nav-item display-sm">
                                <a class="nav-link" href="#"> Invoice </a>
                            </li>
                            <li class="nav-item display-sm">
                                <a class="nav-link" href="#"> Notification </a>
                            </li>

                            <li class="nav-item display-sm">
                                <a class="nav-link" 
                                href="<?php 
                                        if($_SESSION['UserTypeId'] == 3){
                                            echo $base_url."?controller=Helperland&function=CustomerSetting";
                                        }
                                        elseif ($_SESSION['UserTypeId'] == 2) {
                                            echo $base_url."?controller=Helperland&function=ServiceProviderSetting";
                                        }
                                    ?>"> My Setting </a>
                            </li>
                            <li class="nav-item display-sm">
                                <!-- <a class="nav-link" href="#"> Logout</a> -->
                                <form method="POST" action="<?= $base_url."?controller=User&function=Logout"?>" >
                                    <button class="nav-link btn btn-link" name="logout" type="submit">Logout</button>
                                </form>
                            </li>
                           

                            <?php 
                                if($_SESSION['UserTypeId'] == 3){ ?>

                                    <li class="nav-item display-non-sm btnBlue rounded-pill">
                                        <a class="nav-link text-decoration-none text-light p-0" href="<?= $base_url."?controller=Helperland&function=BookService"?>">Book Now</a>
                                        <!-- <a class="nav-link text-decoration-none text-light p-0" href="<?= $base_url."?controller=Helperland&function=BookService"?>">Book Now</a> -->
                                    </li>
                                    <?php
                                }
                            ?>

                                
                            <li class="nav-item">
                                <a class="nav-link " href="<?= $base_url."?controller=Helperland&function=Prices"?>">Prices & services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Warranty </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $base_url."?controller=Helperland&function=Contact"?>"> Contact</a>
                            </li>
                            <li class="nav-item display-non-sm">
                                <img src="../assets/img/icon-notification.png" class=" nav-border nav-link-image">
                            </li>
                            <li class="nav-item dropdown display-non-sm">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/img/user.png " alt="united kingdom flag" class="county-flag nav-link-image-user">
                                </a>
                                <ul class="dropdown-menu padding-left" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item bordered" href="#">
                                            Welcome,<br>
                                            <?php if (isset($_SESSION['UserName'])) { 
                                                echo $_SESSION['UserName'];   
                                            }
                                                else{
                                                    echo 'Service Provider OR Coustomer';
                                                }
                                            ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?php 
                                                if($_SESSION['UserTypeId'] == 3){
                                                    echo $base_url."?controller=Helperland&function=CustomerServiceDashboard";
                                                }
                                                elseif ($_SESSION['UserTypeId'] == 2) {
                                                    echo $base_url."?controller=Helperland&function=ServiceProviderSetting";
                                                }
                                            ?>">
                                            My Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" 
                                        href="<?php 
                                                if($_SESSION['UserTypeId'] == 3){
                                                    echo $base_url."?controller=Helperland&function=CustomerSetting";
                                                }
                                                elseif ($_SESSION['UserTypeId'] == 2) {
                                                    echo $base_url."?controller=Helperland&function=ServiceProviderSetting";
                                                }
                                            ?>">
                                            My Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= $base_url."?controller=User&function=Logout"?>">
                                            <!-- Logout -->
                                            Logout
                                            <!-- <form method="POST" action="<?= $base_url."?controller=User&function=Logout"?>" >
                                                <button class="btn border-0" name="logout" type="submit">Logout</button>
                                            </form> -->
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>