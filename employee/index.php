<?php
session_start();
require '../includes/header.php';
require '../includes/footer.php';
include '../config/config.php';
?>


<?php
main_header('Add Employee');
?>
<div class="container">

    <div class="mt-5 card card-body rounded-0 m-auto col-md-4">
        <p class="card-text m-1 h5">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus m-1" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
            </svg>
            Add Employee
        </p>

        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="mt-3">
            <div class="mb-2">
                <input type="text" name="fname" class="form-control  rounded-0" placeholder="FullName">
            </div>
            <div class="mb-2">
                <input type="text" name="role" class="form-control  rounded-0" placeholder="Role(s)">
            </div>
            <div class="mb-2">
                <textarea name="desc" placeholder="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-2">
                <input type="email" name="email" class="form-control  rounded-0" placeholder="Email Address">
            </div>
            <div class="mb-2">
                <input type="text" name="mobile" class="form-control  rounded-0" placeholder="Mobile Number">
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-success rounded-0 " type="submit" name="ubtn">Submit</button>
            </div>
        </form>
    </div>
    <button onclick="reset_game()" type="button">refresh</button>
</div>
<script>
    function reset_game() {
        location.reload();
        document.getElementById('input').value = '';
    }
</script>

<?php

require '../Database/Database.php';
require '../models/Employee.php';

if (isset($_POST['ubtn'])) {


    $fname = $_POST['fname'];
    $role = $_POST['role'];
    $desc = $_POST['desc'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];


    $database  = new Database();
    $db = $database->connect();
    $result = new Employee($db);


    $result->name = $fname;
    $result->email = $email;
    $result->role = $role;
    $result->phone = "+91" . $mobile;
    $result->description = $desc;

    $result->createEmployee();
}

?>

<?php main_footer(); ?>