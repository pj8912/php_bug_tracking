<?php session_start(); ?>

<?php
require '../config/config.php';
if (!isset($_SESSION['u_id'])) {
    header('location:' . URL);
    exit();
}
require '../includes/header.php';
require '../includes/footer.php';
?>
<?php main_header('Create Project'); ?>

<div class="container">
    <div class="card card-body m-auto col-md-6 mt-5">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-2">
                <input type="text" name="title" placeholder="Project Name" class="form-control">
            </div>
            <div class="mb-2">
                <input type="text" name="type" placeholder="Type" class="form-control">
            </div>
            <div class="mb-2">
                <textarea cols="30" name="desc" rows="10" placeholder="Project Description" class="form-control"></textarea>
            </div>
            <div class="mb-2">
                <input type="text" name="manager" placeholder="Manager" class="form-control">
            </div>
            <div class="mb-2">
                <input type="text" name="frontend" placeholder="frontend" class="form-control">
            </div>
            <div class="mb-2">
                <input type="text" name="backend" placeholder="backend" class="form-control">
            </div>
            <div class="mb-2">
                <input type="text" name="client" placeholder="Client Name" class="form-control">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" name="ubtn">Submit</button>
            </div>

        </form>
    </div>
</div>

<?php
if (isset($_POST['ubtn'])) {
    $title = $_POST['title'];
    $type = $_POST['type'];
    $desc = $_POST['desc'];
    $manager = $_POST['manager'];
    $frontend = $_POST['frontend'];
    $backend = $_POST['backend'];
    $client = $_POST['client'];

    require '../Database/Database.php';
    require '../models/Project.php';

    $db = new Database();
    $db = $db->connect();
    $res = new Project($db);
    $res->project_title = $title;
    $res->description = $desc;
    $res->type = $type;
    $res->manager = $manager;
    $res->frontend = $frontend;
    $res->backend = $backend;
    $res->client_name = $client;

    $res->createProject();
}

?>


<?php main_footer(); ?>