<?php


$conn = mysqli_connect('localhost', 'root', '', 'php_bug_tracking');
$sql = "SELECT * FRom statuses";
$result = mysqli_query($conn, $sql);
