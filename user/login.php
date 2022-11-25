<?php session_start(); ?>

<?php

require_once '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\User;

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {

    if (isset($_POST['lbtn'])) {


        $email = strip_tags($_POST['email']);
        $pwd = strip_tags($_POST['pwd']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../index.php?email=invalid");
            exit();
        }


        $database = new Database();
        $db = $database->connect();

        $user = new User($db);

        $user->email = $email;

        $result = $user->getUser();
        $num = $result->rowCount();


        if ($num >  0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                $hashedPwd = $row['user_pwd'];
                $hashedPwdCheck = password_verify($pwd, $hashedPwd);

                if ($hashedPwdCheck == false) {
                    header("Location: ../index.php?login=error");
                    exit();
                } else {

                    $_SESSION['u_id'] = $row['user_id'];
                    header('Location: ../home.php');
                    exit();
                }
            }
        } else {
            header('Location: ../index.php');
            exit();
        }
    }
} else {
    echo "REQUEST_METHOD_ERROR";
}
