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