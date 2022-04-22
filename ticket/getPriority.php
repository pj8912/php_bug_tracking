<?php

$conn = mysqli_connect('localhost', 'root', '', 'php_bug_tracking');
$sql = "SELECT * FROM priorities";
$result = mysqli_query($conn, $sql);
