<?php

$conn = mysqli_connect('localhost', 'root', '', 'php_bug_tracking');
$sql = "SELECT * FROM employees WHERE e_roles = 'php dev' or 'dev'";
$result = mysqli_query($conn, $sql);
