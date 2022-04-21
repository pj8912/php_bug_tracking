<?php

require '../config/config.php';
require '../Database/Database.php';
require '../models/Admin.php';
$database = new Database();
$db = $database->connect();
$admin = new Admin($db);

if (isset($_POST['status_btn'])) {
    $status = $_POST['status'];
    $admin->status = $status;
    if ($admin->createStatus()) {
        header('location:' . URL . '/admin/admin.php');
        exit();
    } else {
        header('location:' . URL . '/admin/admin.php?statuserr');
        exit();
    }
}
