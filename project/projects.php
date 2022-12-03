<?php session_start(); ?>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

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

            <h4 class="m-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-postcard m-1" viewBox="0 0 16 16">
	<path fill-rule="evenodd" d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4Zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7ZM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5Zm0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5ZM10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3ZM13 8h-2V6h2v2Z"/>
	</svg>
    
            Projects </h4>

            <a href="<?php echo Config::$home; ?>/project/project.php" class="btn btn-success m-2 rounded-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg> Add
            </a>

            <a href="<?php echo Config::$home; ?>/project/projects.php" class="btn btn-primary m-2 rounded-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                </svg> View
            </a>
        </div>

        <?php
        $database = new Database();
        $db = $database->connect();
        $project = new Project($db);
        $result = $project->readAll();

        $num = $result->rowCount();
        if ($num > 0) {
            echo ' <table class="table table-striped table-light mt-5" style="width:fit-content">';
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
        <th class="col">
        Actions
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
                        <td style="display:flex">
                        <a class="m-1 btn  btn-primary btn-sm rounded-5" href="editProject.php?p_id=' . $row['project_id'] . '">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                          <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                        
                     </a> 
                     <a  class="m-1 btn  btn-danger btn-sm rounded-5" href="delete.php?p_id=' . $row['project_id'] . '">
                     <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                     <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                     <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                   </svg>
                     </a> 
                        </td>
                        
                        </tr> 
                    ';
            }
            echo '
                
                </tbody>
                </table>';
        } else {
            echo '<p align="center" class="mt-5">No Projects Created</p>';
        }
        ?>


    </div>
</div>
<?php $template->main_footer(); ?>