<?php
session_start();
?>

<?php
require '../Database/Database.php';
require '../models/Ticket.php';

$database = new Database();
$db = $database->connect();

$ticket = new Ticket($db);

if (isset($_POST['tbtn'])) {

    
    $ticket->ticket_name  = $_POST['t_name'];
    $ticket->project_name = $_POST['project_id'];
    $ticket->ticket_type = $_POST['t_type'];
    $ticket->ticket_description = $_POST['desc'];
    $ticket->ticket_assigned_to = $_POST['assinged_to'];
    $ticket->ticket_status = $_POST['ticket_status'];
    $ticket->ticket_priority = $_POST['ticket_priority'];
    
    $ticket->startDate = $_POST['start_date'];
    $ticket->endDate = $_POST['end_date'];

    // if(empty())
    
    $ticket->createTicket();
    header('location: index.php');
    exit();
    if (!$ticket->createTicket()) {
        header('location: index.php?upload=err');
        exit();
    }
}
?>

<?php
require '../config/config.php';
if (!isset($_SESSION['u_id'])) {
    header('Location:' . URL);
    exit();
}
?>

