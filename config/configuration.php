<!-- this file will create database and table for students data, also it will create a trigger to insert time when the data is entered into database -->
<!-- make sure to run this before you run any other file -->

<?php

$serverName = 'localhost';
$userName = 'root';
$password = 'tabishshaikh764';

$conn = mysqli_connect($serverName, $userName, $password);

$createDb = "CREATE DATABASE school";

if (mysqli_query($conn, $createDb)) {
} else {
    echo 'error' . mysqli_error($conn);
}

$db = "school";
$conn = mysqli_connect($serverName, $userName, $password, $db);

$createTable = "CREATE TABLE student(id INT auto_increment primary key, sname varchar(100), fname varchar(100), lname varchar(100), dob DATE, class varchar(30), divi varchar(30), roll int, prn int, numb bigint, email varchar(100), address mediumtext, city varchar(25), state varchar(25), zip int, created_at timestamp);";

if (mysqli_query($conn, $createTable)) {
} else {
    echo 'error' . mysqli_error($conn);
}

$trigger = "CREATE TRIGGER update_timestamp
BEFORE INSERT ON  student 
for each ROW BEGIN
SET new.created_at = current_timestamp();
END
";

if (mysqli_query($conn, $trigger)) {
} else {
    echo 'error' . mysqli_error($conn);
}
