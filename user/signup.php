<?php session_start(); ?>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once  '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\User;
use BugTracking\Templates\Template;

$template = new Template();

//header
$template->main_header('Sign Up');
?>

<div class="container">
    <div class="bg-white mt-5 card card-body col-md-6 m-auto login-form">
        <p align="center" class="h1 p-1">BugTracking</p><br>
        <h4 class="mt-4">SignUp</h4>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-2">
                <input class="form-control" type="text" name="flname" placeholder="FullName">
            </div>
            <div class="mb-2">
                <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="mb-2">
                <input class="form-control" type="password" name="pwd" placeholder="Password">
            </div>
            <div class="d-grid gap-2  ">
                <button type="submit" name="sbtn" class="btn btn-success" align="center">
                    Sign Up
                </button>
            </div>
            <p class="text-center mt-3">Already have an account <a href="../index.php">Log in</a></p>
        </form>
    </div>
</div>

<?php
$template->main_footer();
?>

<?php
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    if (isset($_POST['sbtn'])) {

        // $_POST = filter_input_array('POST', FILTER_SANITIZE_STRING);

        $name = htmlentities((strip_tags($_POST['flname'])));
        $email  = strip_tags($_POST['email']);
        $pwd = strip_tags($_POST['pwd']);


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../index.php?error=empty");
            exit();
        } else {
            $db = new Database();
            $db = $db->connect();
            $user = new User($db);
            $user->email = $email;

            $result = $user->check_user();
            $num = $result->rowCount();
            if ($num > 0) {
                header('Location: ../index.php');
                exit();
            } else {
                $user->fullname = $name;
                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                $user->pwd = $hashedPwd;
                //create user
                $user->create_user();
                header("Location: ../index.php?signup=success");
                exit();
            }
        }
    }
}
// else {
//     header('Location: ../index.php');
//     exit();
// }
?>