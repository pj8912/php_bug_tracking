<?php


$conn = mysqli_connect('localhost', 'root', '', 'php_bug_tracking');
$sql = "SELECT * from types";
$result = mysqli_query($conn, $sql);
