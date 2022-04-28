<?php

require '../Database/Database.php';
require '../models/Ticket.php';
require '../config/config.php';
$db = new Database();
$db = $db->connect();
$ticket = new Ticket($db);

if (isset($_REQUEST['t_id'])) {
    $tid = $_REQUEST['t_id'];
    $ticket->ticket_id = $tid;
    if ($ticket->deleteTicket()) {
        header('Location:' . URL . '/ticket/tickets.php');
        exit();
    } else {
        header('Location:' . URL . '/ticket/tickets.php');
        exit();
    }
}


?>

