<?php
$serverName = 'localhost';
$userName = 'root';
$password = '';
$db = 'school';

$conn = mysqli_connect($serverName, $userName, $password, $db);

if (!$conn) {
    echo 'error' . '<br>' . mysqli_connect_error();
}
