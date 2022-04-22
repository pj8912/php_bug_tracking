<?php

require '../Database/Database.php';
require '../models/Project.php';

$db = new Database();
$db = $db->connect();
$project = new Project($db);
$result = $project->getProjectTitles();
