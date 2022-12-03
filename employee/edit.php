<?php session_start(); ?>
<?php

require_once  '../vendor/autoload.php';

use BugTracking\Database\Database;
use BugTracking\Models\Employee;
use BugTracking\Config\Config;
use BugTracking\Templates\Template;

$temp=  new Template();
echo $temp->main_header('Update Employee');
echo $temp->main_navbar(true);



$database = new Database();
$db = $database->connect();
$emp = new Employee($db);


error_reporting(E_ALL);
ini_set('display_errors', 'On');
?>

<?php if(isset($_GET['eid'])): ?>

        <?php 

        //set employee id
        $emp->eid = $_GET['eid'];
        
        ?>

    <div class="card card-body m-auto mt-5 col-md-4">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    
    <div class="mb-2">
        <label>Name</label>
        <?php 

            $result = $emp->getName();
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo '
                <input type="text" class="form-control" name="name" value="'.$row['e_name'].'">
                ';
            }
        ?>
    </div>
    <div class="mb-2">
        <label>Role(s)</label>
        <?php 

            $result = $emp->getRoles();
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo '
                <input type="text" class="form-control" name="role" value="'.$row['e_roles'].'">
                ';
            }
        ?>
    </div>

    <div class="mb-2">
        <label>Email</label>
        <?php 

            $result = $emp->getEmail();
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo '
                <input type="email" class="form-control" name="email" value="'.$row['e_email'].'">
                ';
            }
        ?>
    </div>
      
    <div class="mb-2">
        <label>Description</label>
        <?php 

            $result = $emp->getDesc();
            while($row =  $result->fetch(PDO::FETCH_ASSOC)){
                echo '
                <textarea class="form-control"  name="desc">'.$row['e_description'].'</textarea>
                ';
            }
        ?>
    </div>
    <div class="mb-2">
        <label>Phone</label>
        <?php 

            $result = $emp->getPhone();
            while($row =  $result->fetch(PDO::FETCH_ASSOC)){
                echo '
                <input type="text" class="form-control"  name="phone" value="'.$row['e_phone'].'">
                ';
            }
        ?>
    </div>

    <div class="d-grid gap-2">
        <button class="btn btn-primary" type="submit" name="ubtn">Update</button>
     </div>

    </form>
    </div>

    
    
<?php endif; ?>




<?php
echo $temp->main_footer();

if(isset($_SERVER['REQUEST_METHOD']) == 'POST'){
    if(isset($_POST['ubtn'])){
        
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $phone = $_POST['phone'];

        //
        $emp->name  = $name;
        $emp->email = $email;
        $emp->phone = $phone;
        $emp->description = $desc;
        $emp->role = $role;

        //update
        $emp->updateEmployee();

  
    }
}

?>