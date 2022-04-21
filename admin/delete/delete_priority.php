<?php
require '../../config/config.php';
require '../../Database/Database.php';
require '../../models/Admin.php';
$database = new Database();
$db = $database->connect();
$admin = new Admin($db);

if (isset($_GET['id'])) {
    $admin->pid = $_GET['id'];
    if ($admin->deletePriority()) {
        header('location:' . URL . '/admin/admin.php');
        exit();
    } else {
        header('location:' . URL . '/admin/admin.php?p_err');
        exit();
    }
}
