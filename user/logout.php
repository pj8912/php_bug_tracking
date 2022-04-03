<?php
session_start();
// include '../config/db.php';

if (isset($_SESSION['u_id'])) {

    $conn = mysqli_connect('localhost', 'root', '', 'php_bug_tracking');

    $sql = "UPDATE users SET last_seen = NOW() WHERE user_id = {$_SESSION['u_id']}";
    mysqli_query($conn, $sql);

    session_unset();

    session_destroy();

    header('location: ../index.php');
    exit();
}