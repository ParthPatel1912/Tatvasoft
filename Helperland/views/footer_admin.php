<!-- JS -->
    <script>
        <?php require('../assets/js/main.js');?>
        <?php require('../assets/js/sweetAlert.js');?>
        <?php require('../assets/js/validation.js');?>
    </script>

<?php  if (isset($_SESSION['status_msg']) && isset($_SESSION['status_txt']) && isset($_SESSION['status'])){ ?>
    <script>
        $(document).ready(function() {

            Swal.fire({
            position: 'top-end',
            title: '<?php echo $_SESSION['status_msg']; ?>',
            text: '<?php echo $_SESSION['status_txt']; ?>',
            icon: '<?php echo $_SESSION['status']; ?>',
            showConfirmButton: false,
            timer: 1500
            })

        });
    </script>
    <?php } 
    unset($_SESSION['status_msg']);
    unset($_SESSION['status_txt']);
    unset($_SESSION['status']);
    ?>


<?php  if (isset($_SESSION['user_msg']) && isset($_SESSION['user_txt']) && isset($_SESSION['user_status'])){ ?>
    <script>
        $(document).ready(function() {

            Swal.fire({
            title: '<?php echo $_SESSION['user_msg']; ?>',
            text: '<?php echo $_SESSION['user_txt']; ?>',
            icon: '<?php echo $_SESSION['user_status']; ?>',
            confirmButtonText: 'Done'
            })

        });
    </script>
    <?php } 
    unset($_SESSION['user_msg']);
    unset($_SESSION['user_txt']);
    unset($_SESSION['user_status']);
    ?>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/ae6d6e0254.js " crossorigin="anonymous "></script>
</body>

</html>