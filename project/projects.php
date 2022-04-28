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

            <h4 class="m-2">Projects </h4>
            <?php
            require '../config/config.php';
            ?>
            <a href="<?php echo URL; ?>/project/" class="btn btn-success m-2">
                + Add
            </a>
        </div>
        <?php
        require '../Database/Database.php';
        require '../models/Project.php';

        $database = new Database();
        $db = $database->connect();
        $project = new Project($db);
        $result = $project->readAll();

        $num = $result->rowCount();
        if ($num > 0) {
            echo ' <table class="table table-striped table-light">';
            echo ' <thead>
        <tr>
    <th class="col">
        Title
    </th>
    <th class="col">
        Type
    </th>
    <th class="col">
        Description
    </th>
    <th class="col">
        Manager
    </th>
    <th class="col">
        Front-end
    </th>
    <th class="col">
        Back-end
    </th>
</tr>
</thead>
<tbody>

';

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <tr >
                    <td >' . $row['project_title'] . '</td>
                    <td>' . $row['project_type'] . '</td>
                    <td>' . $row['project_description'] . '</td>
                    <td>' . $row['project_manager'] . '</td>
                    <td>' . $row['frontend'] . '</td>
                    <td>' . $row['backend'] . '</td>
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