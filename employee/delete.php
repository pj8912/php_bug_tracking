<?php session_start(); ?>
<?php

require_once  '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\Employee;
use BugTracking\Config\Config;


$database = new Database();
$db = $database->connect();
$emp = new Employee($db);

if (isset($_GET['eid'])) {
    $eid = $_GET['eid'];
    $emp->eid  = $eid;
    $emp->deleteEmployee();
    header('Location: employees.php');
    exit();
}

?>
