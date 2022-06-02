<?php session_start(); ?>

<?php
require '../config/config.php';
require '../includes/header.php';
require '../includes/footer.php';
?>
<?php main_header('create Ticket'); ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>

<div class="container">

    <?php
    require '../Database/Database.php';
    $db = new Database();
    $db = $db->connect();

    //project
    require '../models/Project.php';
    $project = new Project($db);

    //admin
    require '../models/Admin.php';
    $admin = new Admin($db);

    //employee
    require '../models/Employee.php';
    $em = new Employee($db);
    ?>

    <div class="card card-body m-auto col-md-6 mt-4">
        <p class="card-text m-1 h5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket" viewBox="0 0 16 16">
                <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z" />
            </svg>
            Add Ticket
        </p>
        <br>
        <form action="uploadticket.php" method="post">
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


<?php
main_footer();
?>
<?php
if (!isset($_SESSION['u_id'])) {
    header('location:' . URL);
    exit();
} ?>