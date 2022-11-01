<?php session_start(); ?>
<?php

require_once  'vendor/autoload.php';

use BugTracking\Templates\Template;
use BugTracking\Database\Database;
use BugTracking\Models\ContactUs;
use BugTracking\Config\Config;

// use BugTracking\Models\Con;

$template = new Template();


// error_reporting(E_ALL);
// ini_set('display_errors', 'On');




//header
$template->main_header('Home');

if (isset($_SESSION['u_id'])) {
    $template->main_navbar(true);
} else {

    $template->main_navbar(false);
}

?>

<div class="container">

    <div class="card card-body mt-5 m-auto col-md-4">

        <h4>Contact Us</h4>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        
        
            <div class="mb-2">
                <input type="text" class="form-control" placeholder="Name" name="name">
            </div>
            <div class="mb-2"><input type="text" class="form-control" placeholder="Company Name" name="company_name"></div>
            <div class="mb-2"><input type="email" class="form-control" placeholder="Email Address" name="email"></div>
            <div class="mb-2"><input type="text" name="mobile" class="form-control" placeholder="Mobile"></div>
            <div class="mb-2"><input type="text" name="message" class="form-control" placeholder="message"></div>
            <div class="d-grid gap-2">
                <button type="submit" name="sbtn" class="btn btn-success">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>


<?php $template->main_footer(); ?>

<?php
if (isset($_POST['sbtn'])) {

    $name = $_POST['name'];
    $company_name = $_POST['company_name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];


    $db = new Database();
    $db = $db->connect();
    $contact = new ContactUs($db);

    $contact->name = $name;
    $contact->company = $company_name;
    $contact->email = $email;
    $contact->mobile = $mobile;
    $contact->message = $message;


    $contact->createContact();
    header('Location: ../index.php');
    exit();
}
