<?php
session_start();
?>

<?php
require '../includes/header.php';
require '../includes/footer.php';
?>

<?php main_header(); ?>


<div class="container">
    <div class="mt-5">
        <h4>Tickets </h4>
        <?php
        require '../Database/Database.php';
        require '../models/Ticket.php';

        $database = new Database();
        $db = $database->connect();
        $ticket = new Ticket($db);
        $result = $ticket->readAll();

        $num = $result->rowCount();
        if ($num > 0) {
            echo ' <table class="table table-striped table-light">';
            echo ' <thead>
        <tr>
    <th class="col">
        Ticket Name
    </th>
    <th class="col">
        Project
    </th>
    <th class="col">
        Ticket Type
    </th>
    <th class="col">
        Description
    </th>
    <th class="col">
        Assigned To
    </th>
    <th class="col">
        Status
    </th>
    <th class="col">
        Priority
    </th>
    <th class="col">
        Actions
    </th>
    </tr>
</thead>
<tbody>

';

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <tr >
                    <td >' . $row['ticket_name'] . '</td>
                    <td>' . $row['project_name'] . '</td>
                    <td>' . $row['ticket_type'] . '</td>
                    <td>' . $row['ticket_description'] . '</td>
                    <td>' . $row['ticket_assigned_to'] . '</td>
                    <td>' . $row['ticket_status'] . '</td>
                    <td>' . $row['ticket_priority'] . '</td>
                    <td>
                 <a href="editTicket.php?t_id='.$row['ticket_id'].'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                      <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                 </a> | 
                 <a href="deleteTicket.php?t_id='.$row['ticket_id'].'">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                 <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                 <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
               </svg>
                 </a> 
</td>
                    </tr> 
                ';
            }
            echo '
            
            </tbody>
            </table>';
        } else {
            echo '<p align="center">No Projects Created</p>';
        }




        ?>
    </div>
</div>

<?php main_footer(); ?>