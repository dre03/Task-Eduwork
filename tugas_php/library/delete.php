<?php

    include_once('connect.php');

    $isbn = mysqli_real_escape_string($conn, $_GET['isbn']); // Mencegah SQL Injection
    $delete = mysqli_query($conn, "DELETE FROM buku WHERE isbn = '$isbn'");

    header('Location: index.php');


?>