<?php

require '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\Admin;
use BugTracking\Config\Config;



$database = new Database();
$db = $database->connect();
$admin = new Admin($db);


if (isset($_POST['type_btn'])) {
    $type = $_POST['type'];
    $admin->type = $type;
    // $admin->createType();
    if ($admin->createType()) {
        header('Location:' . Config::$home . '/admin/admin.php');
        exit();
    } else {
        header('Location:' . Config::$home . '/admin/admin.php?typeerr');
    }
}

if (isset($_POST['status_btn'])) {
    $status = $_POST['status'];
    $admin->status = $status;
    if ($admin->createStatus()) {
        header('Location:' . Config::$home . '/admin/admin.php');
        exit();
    } else {
        header('Location:' . Config::$home . '/admin/admin.php?statuserr');
    }
}

if (isset($_POST['p_btn'])) {

    $priority = $_POST['priority'];
    $admin->priority = $priority;
    if ($admin->createPriority()) {
        header('Location:' . Config::$home . '/admin/admin.php');
        exit();
    } else {
        header('Location:' . Config::$home . '/admin/admin.php?perr');
    }
}
