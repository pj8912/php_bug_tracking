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
    <div class="card card-body m-auto col-md-6 mt-4" >
        <form action="uploadticket.php" method="post">
            <div class="mb-2">
                <input type="text" name="t_name" placeholder="ticket name" class="form-control">
            </div>
            <div class="mb-2">
                <select name="project_id" class="form-control">
                    <option>--SELECT PROJECT --</option>

                    <?php
                    require 'getProjects.php';
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
                    include 'getTypes.php';
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['ticket_type'] . '">' . $row['ticket_type'] . '</option>';
                        }
                    } else {
                        echo 'No types available';
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
                    include 'getDev.php';
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['e_name'] . '">' . $row['e_name'] . '</option>';
                        }
                    } else {
                        echo 'No Devs available';
                    }

                    ?>
                </select>
            </div>
            <div class="mb-2">
                <select name="ticket_status" class="form-control">
                    <option value="">Select Status</option>
                    <?php
                    include 'getStatus.php';
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['ticket_status'] . '">' . $row['ticket_status'] . '</option>';
                        }
                    } else {
                        echo 'No status available';
                    }

                    ?>
                </select>
            </div>
            <div class="mb-2">
                <select name="ticket_priority" class="form-control">
                    <option value="">Select Priority</option>
                    <?php
                    include 'getPriority.php';
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row['ticket_priority'].'">' . $row['ticket_priority'] . '</option>';
                        }
                    } else {
                        echo 'No Priority available';
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