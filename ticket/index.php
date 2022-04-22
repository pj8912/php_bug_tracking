<?php session_start(); ?>

<?php
require '../config/config.php';
if (!isset($_SESSION['u_id'])) {
    header('location:' . URL);
    exit();
}
require '../includes/header.php';
require '../includes/footer.php';
?>
<?php main_header('create Ticket'); ?>

<div class="container">
    <div class="card card-body m-auto col-md-6 mt-5">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="mb-2">
                    
                </div>
        </form>
    </div>
</div>



<?php main_footer(); ?>