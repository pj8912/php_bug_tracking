<?php session_start(); ?>

<?php
// require '../config/config.php';
require '../includes/header.php';
require '../includes/footer.php';
?>

<?php main_header('Administartion'); ?>
<div class="container">
    <div class="row mt-5">
    </div>
    <div class="row mt-3">
        <div class="col-md-3 m-1 card card-body">
            <p class="text-center h4">

                Add Ticket type
            </p>
            <hr>
            <form action="" method="post">
                <div class="mb-2">
                    <input type="text" placeholder="Ticket Type" class="form-control" name="type" id="">
                </div>
                <div class="d-grid gap-2">
                    <button type="text" class="btn btn-success">
                        Submit
                    </button>
                </div>
            </form>
            <hr>
        </div>
        <div class="col-md-3 m-1 card card-body">
            <!-- Add Ticket priority -->
            <p class="text-center h4">

                Add Ticket status
            </p>
            <hr>
            <form action="" method="post">
                <div class="mb-2">
                    <input type="text" placeholder="Ticket Status" class="form-control" name="status">
                </div>
                <div class="d-grid gap-2">
                    <button type="text" class="btn btn-success">
                        Submit
                    </button>
                </div>
            </form>

        </div>
        <div class="col-md-3 m-1 card card-body">
            <p class="text-center h4">

                Add Ticket priority
            </p>
            <hr>
            <form action="" method="post">
                <div class="mb-2">
                    <input type="text" placeholder="Ticket Priority" class="form-control" name="priority">
                </div>
                <div class="d-grid gap-2">
                    <button type="text" class="btn btn-success">
                        Submit
                    </button>
                </div>
            </form>

        </div>

    </div>
</div>

<?php main_footer(); ?>