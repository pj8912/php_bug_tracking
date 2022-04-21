<?php
// session_start();
include 'includes/header.php';
include 'includes/footer.php';

?>

<style>
    #cards {
        margin: 0 auto;
        margin-top: 100px;
    }

    .ref {
        cursor: pointer;
    }

    a {
        text-decoration: none;
    }
</style>

<?php main_header('Contact Us'); ?>

<div class="container">
    <div class="card card-body col-md-4 rounded-0" id="cards">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <p class="h5">Contact Us</p>
            <hr>
            <div class="mb-2">
                <input type="text" name="name" placeholder="Your Name" class="form-control">
            </div>
            <div class="mb-2">
                <input type="text" name="company" placeholder="Company" class="form-control">
            </div>
            <div class="mb-2">
                <input type="email" name="email" placeholder="Email" class="form-control">
            </div>
            <div class="mb-2">
                <input type="text" name="mobile" placeholder="Mobile" class="form-control">
            </div>
            <div class="mb-2">
                <textarea name="message" placeholder="Message" cols="30" class="form-control" rows="4"></textarea>
            </div>
            <div class="d-grid gap-2">

                <button name="ubtn" type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>


        </form>
        <p class="text-center mt-1 text-secondary ref" onclick="reset_game()" id="refresh">Refresh</p>
    </div>
</div>

<script>
    function reset_game() {
        location.reload();
        document.getElementById('input').value = '';
    }
</script>

<?php

if (isset($_POST['ubtn'])) {
    $name = $_POST['name'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];

    require 'Database/Database.php';
    require 'models/ContactUs.php';
    $db  = new Database();
    $db = $db->connect();
    $contact = new ContactUs($db);
    $contact->name = $name;
    $contact->company = $company;
    $contact->email = $email;
    $contact->mobile = $mobile;
    $contact->message = $message;
    if ($contact->createContact()) {
        header('location: index.php');
        exit();
    } else {
        header('location: contactus.php?err');
        exit();
    }
}
?>


<?php main_footer(); ?>