<?php

$conn = mysqli_connect('localhost', 'root', '', 'php_bug_tracking');
$sql = "SELECT * FROM employees WHERE e_roles ='dev' OR e_roles ='php dev' ";
$result = mysqli_query($conn, $sql);
