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
    <div class="card card-body m-auto col-md-4 mt-2">
        <p class="card-text m-1 h5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
            </svg>
            Add Project
        </p>
        <br>
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