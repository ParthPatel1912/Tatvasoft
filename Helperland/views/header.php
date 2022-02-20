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
    <link href="../assets/css/style.css?v=2" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.css" integrity="sha512-SWjZLElR5l3FxoO9Bt9Dy3plCWlBi1Mc9/OlojDPwryZxO0ydpZgvXMLhV6jdEyULGNWjKgZWiX/AMzIvZ4JuA==" crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.min.js" integrity="sha512-kvg/Lknti7OoAw0GqMBP8B+7cGHvp4M9O9V6nAYG91FZVDMW3Xkkq5qrdMhrXiawahqU7IZ5CNsY/wWy1PpGTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery.ui.position.min.js" integrity="sha512-2NZDd1dAB6xu/KFmVhHk+R00JDnC1S9jTfcROXKDTYYTXTkKRLnT5ykFv8CdWWKZB7LeFkxYcvJH+x95klrH1Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/e6dbed9bdc.js" crossorigin="anonymous"></script>

    <?php $base_url = 'http://localhost:8088/'; ?>

    <?php include 'Login.php';?>
    <?php include 'ForgotPassword.php' ?>
    <?php include 'ResetPassword.php' ?>

</head>

<body onload="disablesetupservice()">

    <header class="sticky-top">
        <div class=" main position-relative">
            <nav class="navbar navbar-expand-xl home-navbar" id="navbar">
                <div class="container-fluid navbar_main">
                    <a class="navbar-brand py-0 ps-4" href="<?= $base_url."?controller=Helperland&function=HomePage"?>">
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
                    <div class="collapse navbar-collapse navbar_list" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                            <li class="nav-item btnBlue rounded-pill">
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
                            <li class="nav-item">
                                <a class="nav-link text-light" href="<?= $base_url."?controller=Helperland&function=Contact"?>">Contact us</a>
                            </li>

                            <li class="nav-item btnBlue rounded-pill">
                                <a href="#LoginModal" data-toggle="modal" data-target="#LoginModal"  data-dismiss="modal" onclick="LoginModal()" class="py-0 text-decoration-none text-light">Login</a>
                            </li>
                            <li class="nav-item btnBlue rounded-pill">
                                <a href="<?= $base_url."?controller=Helperland&function=ServiceProvider"?>" class="py-0 text-decoration-none text-light">Become a Helper</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>