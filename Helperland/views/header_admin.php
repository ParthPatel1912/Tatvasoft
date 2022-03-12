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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">


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

<body id="body">

    <!-- Header -->

    <header class="sticky-top">
        <div class=" main position-relative">
            <nav class="navbar navbar-expand-xl home-navbar navbar-usermanagement" id="navbar">
                <div class="container-fluid">
                    <h1>Helperland</h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 navbar-usermanagement-list">
                            <li>
                                <img src="../assets/img/user.png ">
                            </li>
                            <li>
                                <?php 
                                    if (isset($_SESSION['UserName'])) { 
                                        echo $_SESSION['UserName']." ";   
                                    }
                                    else{
                                        echo 'Admin';
                                    }
                                ?>
                            </li>
                            <li>
                               <!-- <a> -->
                               <form method="POST" action="<?= $base_url."?controller=User&function=Logout"?>" >
                                    <button class="nav-link btn btn-link" name="logout" type="submit">
                                        <img src="../assets/img/logout.png">
                                    </button>
                                </form>
                                <!-- </a> -->
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>
        </div>
    </header>