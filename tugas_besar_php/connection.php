<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'db_catalog';

$connection = mysqli_connect($hostname, $username, $password, $database);

if (!$connection) {
    echo "Connected Failed" . mysqli_connect_error();
}
?>