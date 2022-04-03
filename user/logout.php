<?php
session_start();
include '../config/db.php';

if (isset($_SESSION['u_id'])) {

    $sql = "INSERT INTO users(last_seen) VALUES(NOW()) WHERE user_id = {$_SESSION['u_id']}";
    mysqli_query($conn, $sql);


    session_unset();

    session_destroy();

    header('location: ../index.php');
    exit();
}