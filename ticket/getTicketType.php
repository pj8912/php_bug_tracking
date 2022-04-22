<?php

require '../Database/Database.php';
require '../models/Admin.php';

$db = new Database();
$db = $db->connect();
$admin = new Admin($db);
$result1 = $admin->getAllTypes();
?>

