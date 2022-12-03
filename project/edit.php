<?php session_start(); ?>
<?php

require_once  '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\Project;
use BugTracking\Config\Config;


$database = new Database();
$db = $database->connect();
$emp = new Project($db);
?>


<?php if (isset($_GET['p_id'])): ?>

    
<?php endif; ?>
