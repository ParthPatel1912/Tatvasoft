<?php
        if(!isset($_SESSION))
        {
            session_start();
        }
?>

<footer>
        <div class="footer_section w-100 footer-line">
            <div class="footer_main d-flex justify-content-around align-items-center">
                <a class="footer_left" href="<?= $base_url."?controller=Helperland&function=HomePage"?>">
                    <img src="../assets/img/footer-logo.png" alt="" height="78" width="106">
                </a>
                <div class="footer_mid">
                    <ul class="d-flex p-0 text-center">
                        <li>
                            <a href="<?= $base_url."?controller=Helperland&function=HomePage"?>" class="text-decoration-none">HOME</a>
                        </li>
                        <li>
                            <a href="<?= $base_url."?controller=Helperland&function=About"?>" class="text-decoration-none">ABOUT</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none">TESTIMONIAL</a>
                        </li>
                        <li>
                            <a href="<?= $base_url."?controller=Helperland&function=FAQ"?>" class="text-decoration-none">FAQS</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none">INSURANCE POLICY</a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none">IMPRESSUM</a>
                        </li>
                    </ul>
                </div>
                <div class="footer_right d-flex">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-instagram"></i>
                </div>
            </div>

            <div class="text-center">
                <div class=" justify-content-center align-self-center">
                    <div class="footer_line justify-content-center"></div>
                </div>
            </div>

            <div class="footer_end d-flex align-items-center justify-content-center">
                <p class="m-0 text-center">©2018 Helperland. All rights reserved. Terms and Conditions | Privacy Policy</p>
                <!-- <button class="btn footer_btn rounded-pill">OK!</button> -->
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script>
        <?php require('../assets/js/main.js');?>
        <?php require('../assets/js/sweetAlert.js');?>
        <?php require('../assets/js/validation.js');?>
    </script>

    <div id="iframeloading" 
        style="top: 35%;
        display:none;
        position: fixed;
        left: 40%;
        height: 100%;">
        <img src="../assets/img/Double Ring.gif" alt="loading" />
    </div>

<?php  if (isset($_SESSION['message_title']) && isset($_SESSION['message_text']) && isset($_SESSION['message_icon'])){ ?>
    <script>
        $(document).ready(function() {

            Swal.fire({
            position: 'center',
            grow: 'false',
            title: '<?php echo $_SESSION['message_title']; ?>',
            text: '<?php echo $_SESSION['message_text']; ?>',
            icon: '<?php echo $_SESSION['message_icon']; ?>',
            showConfirmButton: false,
            timer: 1500
            })

        });
    </script>
    <?php } 
    unset($_SESSION['message_title']);
    unset($_SESSION['message_text']);
    unset($_SESSION['message_icon']);
    ?>


<?php  if (isset($_SESSION['user_title']) && isset($_SESSION['user_text']) && isset($_SESSION['user_icon'])){ ?>
    <script>
        $(document).ready(function() {

            Swal.fire({
            title: '<?php echo $_SESSION['user_title']; ?>',
            text: '<?php echo $_SESSION['user_text']; ?>',
            icon: '<?php echo $_SESSION['user_icon']; ?>',
            confirmButtonText: 'Done'
            })

        });
    </script>
    <?php } 
    unset($_SESSION['user_title']);
    unset($_SESSION['user_text']);
    unset($_SESSION['user_icon']);
    ?>




    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>