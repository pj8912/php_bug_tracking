<?php
require '../config/config.php';
require '../Database/Database.php';
require '../models/Admin.php';
$database = new Database();
$db = $database->connect();
$admin = new Admin($db);

if (isset($_POST['p_btn'])) {

    $p = $_POST['priority'];

    $admin->priority = $p;

    if ($admin->createPriority()) {
        header('location:' . URL . '/admin/admin.php');
        exit();
    } else {
        header('location:' . URL . '/admin/admin.php?perr');
        exit();
    }
}
