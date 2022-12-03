<?php session_start(); ?>
<?php

require_once  '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\Ticket;
use BugTracking\Config\Config;

use BugTracking\Templates\Template;
$template = new Template();



$database = new Database();
$db = $database->connect();

$emp = new Ticket($db);


$template->main_header();
$template->main_navbar(true);
?>



<?php if(isset($_GET['t_id'])): ?>    

    // $tid = $_GET['t_id'];
        


<?php endif; ?>


<?php
$template->main_footer();
?>