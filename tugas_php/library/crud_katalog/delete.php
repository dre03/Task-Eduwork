<?php

include_once('../connect.php');

$idKatalog = mysqli_real_escape_string($conn, $_GET['id_katalog']); // Mencegah SQL Injection
$delete = mysqli_query($conn, "DELETE FROM katalog WHERE id_katalog = '$idKatalog'");

header('Location: index.php');
