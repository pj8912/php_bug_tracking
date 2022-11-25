<?php session_start(); ?>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once  '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\Project;
use BugTracking\Models\Employee;
use BugTracking\Models\Admin;

use BugTracking\Templates\Template;
use BugTracking\Config\Config;

$db = new Database();
$db = $db->connect();

$project = new Project($db);
$admin = new Admin($db);
$em = new Employee($db);


$template = new Template();

//header
$template->main_header('Create Ticket');

if (isset($_SESSION['u_id'])) {
        $template->main_navbar(true);
} else {
        $template->main_navbar(false);
        //header('Location:'.Config::$home);
        //exit();
}

?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

<div class="container">



        <div class="container mt-5" style="display:flex;flex-direction:row;">

                <h4 class="m-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket" viewBox="0 0 16 16">
                                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z" />
                        </svg>

                        Ticket
                </h4>

                <a href="<?php echo Config::$home; ?>/ticket/ticket.php" class="btn btn-success m-2 rounded-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        Add
                </a>

                <a href="<?php echo Config::$home; ?>/ticket/tickets.php" class="btn btn-primary m-2 rounded-5">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg>
                        View
                </a>
        </div>
       
        <div class="card card-body border-0 m-auto col-md-6 mt-5">


                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="mb-2">
                                <input type="text" name="t_name" placeholder="ticket name" class="form-control">
                        </div>
                        <div class="mb-2">
                                <select name="project_id" class="form-control">
                                        <option>--SELECT PROJECT --</option>

                                        <?php


                                        $result = $project->getProjectTitles();
                                        $num = $result->rowCount();

                                        if ($num > 0) {
                                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<option value="' . $row['project_title'] . '">' . $row['project_title'] . '</option>';
                                                }
                                        } else {
                                                echo '<option>No Project created</option>';
                                        }
                                        ?>
                                </select>
                        </div>
                        <div class="mb-2">
                                <select name="t_type" class="form-control">
                                        <option>--SELECT TICKET TYPE--</option>
                                        <?php
                                        $result = $admin->getAllTypes();
                                        $num = $result->rowCount();

                                        if ($num > 0) {
                                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<option value="' . $row['ticket_type'] . '">' . $row['ticket_type'] . '</option>';
                                                }
                                        } else {
                                                echo '<option>No types available</option>';
                                        }
                                        ?>
                                </select>
                        </div>
                        <div class="mb-2">
                                <textarea name="desc" placeholder="Description..." cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                                <label for="">Assign Dev</label>

                                <select name="assinged_to" class="form-control">
                                        <option>--Assign Dev--</option>
                                        <?php

                                        $result = $em->getDevs();

                                        $num = $result->rowCount();
                                        if ($num > 0) {
                                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<option value="' . $row['e_name'] . '">' . $row['e_name'] . '</option>';
                                                }
                                        } else {
                                                echo '<option>  No Devs available </option>';
                                        }

                                        ?>
                                </select>
                        </div>
                        <div class="mb-2">
                                <select name="ticket_status" class="form-control">
                                        <option>--SELECT STATUS --</option>

                                        <?php

                                        $result = $admin->getAllStatues();
                                        $num = $result->rowCount();

                                        if ($num > 0) {
                                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<option value="' . $row['ticket_status'] . '">' . $row['ticket_status'] . '</option>';
                                                }
                                        } else {
                                                echo '<option> NO status available </option>';
                                        }

                                        ?>
                                </select>
                        </div>
                        <div class="mb-2">
                                <select name="ticket_priority" class="form-control">
                                        <option>-- Select Priority ---</option>
                                        <?php

                                        $result = $admin->getAllPriorities();
                                        $num = $result->rowCount();

                                        if ($num > 0) {
                                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<option value="' . $row['ticket_priority'] . '">' . $row['ticket_priority'] . '</option>';
                                                }
                                        } else {
                                                echo '<option>No Priority available</option>';
                                        }

                                        ?>
                                </select>
                        </div>

                        <div class="mb-2">
                                <input type="text" id="datepicker" name="start_date" placeholder="Start Date" class="form-control">
                                <script>
                                        $(function() {
                                                $("#datepicker").datepicker({
                                                        changeMonth: true,
                                                        changeYear: true,
                                                        dateFormat: 'yy-mm-dd', // iso format
                                                });
                                        });
                                </script>
                        </div>

                        <div class="mb-2">
                                <input type="text" id="datepickerx" name="end_date" placeholder="End Date" class="form-control">
                                <script>
                                        $(function() {
                                                $("#datepickerx").datepicker({
                                                        changeMonth: true,
                                                        changeYear: true,
                                                        dateFormat: 'yy-mm-dd', // iso format
                                                });
                                        });
                                </script>
                        </div>
                        <div class="d-grid gap-2">
                                <button name="tbtn" class="btn btn-lg btn-success rounded-0" type="submit">Submit</button>
                        </div>
                </form>
        </div>
</div>
<?php $template->main_footer(); ?>

<?php

use BugTracking\Models\Ticket;

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
        header('location: http://localhost/php_bug_tracking/ticket/tickets.php');
        exit();
        if (!$ticket->createTicket()) {
                header('location: http://localhost/php_bug_tracking/');
                exit();
        }
}
