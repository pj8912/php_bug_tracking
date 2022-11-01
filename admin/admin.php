<?php session_start(); ?>
<?php

require_once  '../vendor/autoload.php';

use BugTracking\Templates\Template;
use BugTracking\Database\Database;
use BugTracking\Models\Admin;


$template = new Template();

$template->main_header('Administartion');

if (isset($_SESSION['u_id'])) {
    $template->main_navbar(true);
} else {

    $template->main_navbar(false);
}

// database
$db = new Database();
$db = $db->connect();
// admin
$admin = new Admin($db);

$admin->userid = $_SESSION['u_id'];


?>
<div class="container">
    <div class="row mt-5">
        <p class="h2 ">
            Administration

        </p>
        <hr>

        <div class="card m-4 p-2" style="width:inherit">
            <?php

            $get_admin = $admin->getAdmin();

            while ($row = $get_admin->fetch(PDO::FETCH_ASSOC)) {
                echo "<h6  >Admin: " . $row['user_fullname'] . "</h6>";
            }
            ?>
        </div>
    </div>
    <div class="mt-2" style="display: flex;">

        <!-- ticket type-->
        <div class="col-md-3 m-1 card card-body main-box">
            <p class="text-center h4">

                Add Ticket type
            </p>
            <hr>
            <form action="create.php" method="post">
                <div class="mb-2">
                    <input type="text" placeholder="Ticket Type" class="form-control" name="type">
                </div>
                <div class="d-grid  gap-2">
                    <button name="type_btn" type="text" class="btn btn-success w-50 rounded-5 m-auto"  >
                        Submit
                    </button>
                </div>
            </form>
            <hr>
            <div>
                <?php

                $result  = $admin->getAllTypes();
                $num = $result->rowCount();
                if ($num < 1) {
                    echo "<p class='p-1 text-secondary'>No types created</p>";
                } else {
                    echo '<ul class="list-group">';
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                        echo '<li class="list-group-item">' . $row['ticket_type'] . '
                                <a href="delete/delete_type.php?id=' . $row['t_id'] . '" class="text-danger">
                                <svg id="del" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg>
                                </a>
                            </li>';
                    }
                    echo '</ul>';
                }
                ?>

            </div>

        </div>



        <!-- ticket status -->


        <div class="col-md-3 m-1 card card-body main-box">
            <p class="text-center h4">
                Add Ticket status
            </p>
            <hr>
            <form action="create.php" method="post">
                <div class="mb-2">
                    <input type="text" placeholder="Ticket Status" class="form-control" name="status">
                </div>
                <div class="d-grid gap-2">
                    <button name="status_btn" type="text" class="btn btn-success w-50 rounded-5 m-auto">
                        Submit
                    </button>
                </div>
            </form>
            <hr>
            <div>
                <?php
                $result = $admin->getAllStatues();
                $num = $result->rowCount();
                if ($num < 1) {
                    echo "<p class='p-1 text-secondary'>No Status created</p>";
                } else {
                    echo '<ul class="list-group">';
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                        echo '<li class="list-group-item">' . $row['ticket_status'] . '
                                <a href="delete/delete_status.php?id=' . $row['s_id'] . '" class="text-danger">
                                <svg id="del" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg>
                                </a>
                            </li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>

        </div>

        <!-- ticket priority -->

        <div class="col-md-3 m-1 card card-body main-box">
            <p class="text-center h4">

                Add Ticket priority
            </p>
            <hr>
            <form action="create.php" method="post">
                <div class="mb-2">
                    <input type="text" placeholder="Ticket Priority" class="form-control" name="priority">
                </div>
                <div class="d-grid gap-2">
                    <button name="p_btn" type="submit" class="btn btn-success w-50 rounded-5 m-auto">
                        Submit
                    </button>
                </div>
            </form>
            <hr>
            <div>
                <?php
                $result = $admin->getAllPriorities();
                $num = $result->rowCount();
                if ($num < 1) {
                    echo "No Priority created";
                } else {
                    echo '<ul class="list-group">';
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                        echo '<li class="list-group-item">' . $row['ticket_priority'] . '
                                <a href="delete/delete_priority.php?id=' . $row['p_id'] . '" class="text-danger">
                                <svg id="del" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg>
                                </a>
                            </li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>

        </div>

    </div>


</div>
</div>

<?php $template->main_footer(); ?>
