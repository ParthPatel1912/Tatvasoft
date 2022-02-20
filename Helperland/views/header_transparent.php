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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/e6dbed9bdc.js" crossorigin="anonymous"></script>
    
    <?php $base_url = 'http://localhost:8088/'; ?>

    <?php include 'Login.php' ?>
    <?php include 'ForgotPassword.php' ?>
    <?php include 'ResetPassword.php' ?>

</head>

<body>

    <header class="sticky-top">
        <div class=" main position-relative">
            <nav class="navbar navbar-expand-xl home-navbar" id="home-navbar">
                <div class="container-fluid navbar_main_homepage">
                    <a class="navbar-brand py-0 ps-4 pt-3" href="<?= $base_url."?controller=Helperland&function=HomePage"?>">
                        <img src="../assets/img/logo-large.png" class="img-fluid" alt="" height="53px" width="75px">
                    </a>
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
                    <div class="collapse navbar-collapse navbar_list_homepage" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                            <li class="nav-item btnBlueTransparent rounded-pill">
                                <a class="nav-link text-decoration-none text-light p-0" href="<?= $base_url."?controller=Helperland&function=BookService"?>">Book a Cleaner</a>
                            </li>
                            <li class="nav-item btnBorder rounded-pill">
                                <a class="nav-link text-decoration-none text-light py-0" href="<?= $base_url."?controller=Helperland&function=Prices"?>">Prices</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Our Guarantee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Blog</a>
                            </li>
                            <li class="nav-item navbar_contact">
                                <a class="nav-link text-light" href="<?= $base_url."?controller=Helperland&function=Contact"?>">Contact us</a>
                            </li>

                            <li class="nav-item btnBlueTransparent rounded-pill">
                                <a href="#LoginModal" data-toggle="modal" data-target="#LoginModal" data-dismiss="modal" onclick="LoginModal()" class="py-0 text-decoration-none text-light">Login</a>
                            </li>
                            <li class="nav-item btnBlueTransparent rounded-pill">
                                <a href="<?= $base_url."?controller=Helperland&function=ServiceProvider"?>" class="py-0 text-decoration-none text-light">Become a Helper</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/img/ic-flag.png" alt="united kingdom flag" class="county-flag">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <img src="../assets/img/ic-flag.png" alt="united kingdom flag" class="county-flag">India
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <img src="../assets/img/ic-flag.png" alt="united kingdom flag" class="county-flag">USA
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