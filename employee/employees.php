<?php
session_start();
?>

<?php
require '../includes/header.php';
require '../includes/footer.php';
?>

<?php main_header(); ?>


<div class="container">
    <div class="mt-5">
        <div class="container " style="display:flex;flex-direction:row;">

            <h4 class="m-2">Employee </h4>
            <?php
            require '../config/config.php';
            ?>
            <a href="<?php echo URL; ?>/employee/" class="btn btn-success m-2">
                + Add
            </a>
        </div>
        <?php
        require '../Database/Database.php';
        require '../models/Employee.php';

        $database = new Database();
        $db = $database->connect();
        $emp = new Employee($db);
        $result = $emp->readAll();

        $num = $result->rowCount();
        if ($num > 0) {
            echo ' <table class="table table-striped table-light">';
            echo ' <thead>
        <tr>
    <th class="col">
         Name
    </th>
    <th class="col">
        Role
    </th>
    <th class="col">
        Description
    </th>
    <th class="col">
        Email Address
    </th>
    <th class="col">
        Phone
    </th>
 
</tr>
</thead>
<tbody>

';

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <tr >
                    <td >' . $row['e_name'] . '</td>
                    <td>' . $row['e_roles'] . '</td>
                    <td>' . $row['e_description'] . '</td>
                    <td>' . $row['e_email'] . '</td>
                    <td>' . $row['e_phone'] . '</td>
                 

                    </tr> 
                ';
            }
            echo '
            
            </tbody>
            </table>';
        } else {
            echo '<p align="center">No Projects Created</p>';
        }




        ?>
    </div>
</div>

<?php main_footer(); ?>