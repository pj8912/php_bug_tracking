<?php session_start(); ?>
<?php

require_once  '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\Project;
use BugTracking\Config\Config;


$database = new Database();
$db = $database->connect();
$emp = new Project($db);

if (isset($_GET['p_id'])) {
    $eid = $_GET['p_id'];
    $emp->project_id  = $eid;
    $emp->deleteProject();
    header('Location: projects.php');
    exit();
}

?>
