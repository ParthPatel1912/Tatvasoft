<?php
        if(!isset($_SESSION))
        {
            session_start();
        }
?>

<!-- JS -->
    <script>
        <?php require('../assets/js/main.js');?>
        <?php require('../assets/js/sweetAlert.js');?>
        <?php require('../assets/js/validation.js');?>
    </script>

<?php  if (isset($_SESSION['message_title']) && isset($_SESSION['message_text']) && isset($_SESSION['message_icon'])){ ?>
    <script>
        $(document).ready(function() {

            Swal.fire({
            position: 'center',
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