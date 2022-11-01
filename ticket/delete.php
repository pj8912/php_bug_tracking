<?php session_start(); ?>
<?php

require_once  '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\Ticket;
use BugTracking\Config\Config;


$database = new Database();
$db = $database->connect();
$emp = new Ticket($db);

if (isset($_GET['t_id'])) {
    $eid = $_GET['t_id'];
    $emp->ticket_id  = $eid;
    $emp->deleteTicket();
    header('Location: tickets.php');
    exit();
}

?>
