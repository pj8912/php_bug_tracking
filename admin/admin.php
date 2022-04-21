<?php session_start(); ?>

<?php
// require '../config/config.php';
require '../includes/header.php';
require '../includes/footer.php';
?>
<style>
    #del {
        width: 25px;
        height: 25px;

    }
    .main-box{
     height: fit-content;
    }
</style>
<?php main_header('Administartion'); ?>
<div class="container">
    <div class="row mt-5">
    </div>
    <div class="row mt-3">
        <?php
        require '../Database/Database.php';
        require '../models/Admin.php';
        $database = new Database();
        $db = $database->connect();
        $admin = new Admin($db);


        ?>
        <div class="col-md-3 m-1 card card-body main-box" >
            <p class="text-center h4">

                Add Ticket type
            </p>
            <hr>
            <form action="createtype.php" method="post">
                <div class="mb-2">
                    <input type="text" placeholder="Ticket Type" class="form-control" name="type">
                </div>
                <div class="d-grid gap-2">
                    <button name="type_btn" type="text" class="btn btn-success">
                        Submit
                    </button>
                </div>
            </form>
            <hr>
            <div>
                <?php

                $result = $admin->getAllTypes();
                $num = $result->rowCount();
                if ($num < 1) {
                    echo "No types created";
                } else {
                    echo '<ul class="list-group">';
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                        echo '<li class="list-group-item">' . $row['ticket_type'] . '
                                <a href="delete/delete_type.php?id='.$row['t_id'].'" class="text-danger">
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


        <div class="col-md-3 m-1 card card-body main-box">
            <!-- Add Ticket priority -->
            <p class="text-center h4">

                Add Ticket status
            </p>
            <hr>
            <form action="createstatus.php" method="post">
                <div class="mb-2">
                    <input type="text" placeholder="Ticket Status" class="form-control" name="status">
                </div>
                <div class="d-grid gap-2">
                    <button name="status_btn" type="text" class="btn btn-success">
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
                    echo "No Status created";
                } else {
                    echo '<ul class="list-group">';
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                        echo '<li class="list-group-item">' . $row['ticket_status'] . '
                                <a href="delete/delete_status.php?id='.$row['s_id'].'" class="text-danger">
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


        <div class="col-md-3 m-1 card card-body main-box" >
            <p class="text-center h4">

                Add Ticket priority
            </p>
            <hr>
            <form action="create_priority.php" method="post">
                <div class="mb-2">
                    <input type="text" placeholder="Ticket Priority" class="form-control" name="priority">
                </div>
                <div class="d-grid gap-2">
                    <button name="p_btn" type="text" class="btn btn-success">
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
                                <a href="delete/delete_priority.php?id='.$row['p_id'].'" class="text-danger">
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

<?php main_footer(); ?>