<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'perpus';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connected Failed". mysqli_connect_error());
}