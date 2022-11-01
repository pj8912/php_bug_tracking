<?php session_start(); ?>
<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 'On');

require_once  '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\Project;
use BugTracking\Templates\Template;
use BugTracking\Config\Config;


$template = new Template();

//header
$template->main_header('Bug Tracking');
if (isset($_SESSION['u_id'])) {
        $template->main_navbar(true);
} else {
        $template->main_navbar(false);
}

?>


<div class="container">

        <div class="mt-5">

                <div class="container" style="display:flex;flex-direction:row;">

                        <h4 class="m-2">Projects </h4>

                        <a href="<?php echo Config::$home; ?>/project/project.php" class="btn btn-success m-2 rounded-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                                Add
                        </a>

                        <a href="<?php echo Config::$home; ?>/project/projects.php" class="btn btn-primary m-2  rounded-5">

                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                </svg>

                                View
                        </a>
                </div>

                <div class=" card card-body border-0 col-md-6 m-auto mt-3">
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
</div>

<?php $template->main_footer(); ?>

<?php

if (isset($_POST['ubtn'])) {

        $title = $_POST['title'];
        $type = $_POST['type'];
        $desc = $_POST['desc'];
        $manager = $_POST['manager'];
        $frontend = $_POST['frontend'];
        $backend = $_POST['backend'];
        $client = $_POST['client'];



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
        header('Location: http://localhost/bug-tracking/project/project.php');
        exit();
}
