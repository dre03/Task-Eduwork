<?php

include_once('../connect.php');

$idPengarang = mysqli_real_escape_string($conn, $_GET['id_pengarang']); // Mencegah SQL Injection

$delete = mysqli_query($conn, "DELETE FROM pengarang WHERE id_pengarang = '$idPengarang'");

header('Location: index.php');
