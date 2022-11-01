<?php session_start(); ?>
<?php

require_once  'vendor/autoload.php';

use BugTracking\Templates\Template;

$template = new Template();


error_reporting(E_ALL);
ini_set('display_errors', 'On');




//header
$template->main_header('Home');

if (isset($_SESSION['u_id'])) {
    $template->main_navbar(true);
} else {

    $template->main_navbar(false);
}
?>

<?php if (isset($_SESSION['u_id'])) : ?>
    <div class="container">
    <div class="card card-body bg-light mt-5 w-50 m-auto">
        <a href="admin/admin.php" class="text-center h4">Go to Administartion</a>
    </div>    
</div>
<?php endif; ?>


<?php if (!isset($_SESSION['u_id'])) : ?>

    <!-- login -->
    <div class="container">
        <div class="bg-white mt-5 card card-body col-md-6 m-auto login-form">
            <p align="center" class="h1 p-1">BugTracking</p><br>

            <h4 class="mt-4">Login</h3>
                <form action="user/login.php" method="post">

                    <div class="mb-2">
                        <input type="email" name="email" class='form-control' placeholder="Email">
                    </div>
                    <div class="mb-2">
                        <input type="password" name="pwd" class='form-control' placeholder="Password">
                    </div>
                    <div class="d-grid gap-2" align="center">
                        <button name="lbtn" type="submit" class="btn btn-primary ">
                            login
                        </button>
                    </div>

                </form>
                <p align="Center" class="mt-5"> Don't Have and account <a href="user/signup.php">Sign Up</a> </p>
        </div>
    <?php endif; ?>

    </div>

    <?php

    $template->main_footer();

    ?>