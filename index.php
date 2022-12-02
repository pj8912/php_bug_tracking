<?php
session_start();
if (isset($_SESSION['u_id'])) {
    header('Location: home.php');
    exit();
}
?>
<?php

require_once  'vendor/autoload.php';

use BugTracking\Templates\Template;

$template = new Template();

//error reporting
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//header
$template->main_header('Home');


$template->main_navbar(false);

?>

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
            <p align="Center" class="mt-5"> Don't Have and account? <a href="user/signup.php">Sign Up</a> </p>
    </div>

</div>

<?php

$template->main_footer();

?>