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
        <p class="h2">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
            </svg>
            Administration

        </p>
        <hr>

        <div class="card m-4 p-2" style="width:inherit">
            <?php

            $get_admin = $admin->getAdmin();

            while ($row = $get_admin->fetch(PDO::FETCH_ASSOC)) {
                //admin icon instead of text
                echo '<h6  > <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
            </svg>: ' . $row['user_fullname'] . "</h6>";
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
                                <a href="delete.php?tid=' . $row['t_id'] . '" class="text-danger">
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
                                <a href="delete.php?sid=' . $row['s_id'] . '" class="text-danger">
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
                                <a href="delete.php?pid=' . $row['p_id'] . '" class="text-danger">
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
