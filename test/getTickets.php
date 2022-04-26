<?php


require 'Ticket.php';
$ticket = new Ticket();
$result = $ticket->readAll();
$num = $result->rowCount();
if($num > 0){
    echo '<ul>
';
    while($row =$result->fetch(PDO::FETCH_ASSOC)){
        echo '<li>
                '.$row['ticket_name'].'
        </li>';
    }
    echo '</ul>
    ';
}

?>

