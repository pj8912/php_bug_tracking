<?php


require '../config/config.php';
require '../Database/Database.php';
require '../models/Admin.php';
$database = new Database();
$db = $database->connect();
$admin = new Admin($db);


if (isset($_POST['type_btn'])) {
    $type = $_POST['type'];
    $admin->type = $type;
    // $admin->createType();
    if ($admin->createType()) {
        header('location:' . URL . '/admin/admin.php');
        exit();
    } else {
        header('location:' . URL . '/admin/admin.php?typeerr');
        exit();
    }
}
?>
