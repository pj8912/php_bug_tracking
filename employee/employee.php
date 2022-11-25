<?php session_start(); ?>
<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 'On');

require_once  '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\Employee;
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



	<div class="container mt-5" style="display:flex;flex-direction:row;">

		<h4 class="m-2">Employee </h4>

		<a href="<?php echo Config::$home; ?>/employee/employee.php" class="btn btn-success m-2 rounded-5">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
				<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
				<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
			</svg>
			Add
		</a>

		<a href="<?php echo Config::$home; ?>/employee/employees.php" class="btn btn-primary m-2 rounded-5">

			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
				<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
				<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
			</svg>
			View
		</a>
	</div>
	<div class=" card card-body border-0 col-md-6 m-auto mt-3">
		<p class="card-text m-1 h5">
			<svg xmlns="http://www.w3.org/2000/svg" width="23" height="24" fill="currentColor" class="bi bi-person-plus m-1" viewBox="0 0 16 16">
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
				<button class="btn btn-success rounded-0 rounded-5" type="submit" name="ubtn">Add</button>
			</div>
		</form>


	</div>


</div>
<!-- </div> -->


<!-- <script src="<?php //echo Config::$home;
					?>/assets/js/add_employee.js"></script> -->



<?php $template->main_footer(); ?>

<?php
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
	header("Location: http://localhost/php_bug_tracking/employee/employees.php");
	exit();
}

?>

