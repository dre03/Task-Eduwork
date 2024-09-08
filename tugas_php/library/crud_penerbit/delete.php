<?php

include_once('../connect.php');

$idPenerbit = mysqli_real_escape_string($conn, $_GET['id_penerbit']); // Mencegah SQL Injection

$delete = mysqli_query($conn, "DELETE FROM penerbit WHERE id_penerbit = '$idPenerbit'");

header('Location: index.php');
