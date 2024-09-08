<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "perpus";

$connction = mysqli_connect($servername, $username, $password, $database);

if (!$connction) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "select * from anggota";
$result = $connction->query($query);


if ($result->num_rows > 0) {
    echo "<b>Data Anggota</b> <br>";
    while ($row = $result->fetch_assoc()) {
        echo "Anggota : " . $row['nama']. "  " . $row['telp'] . "  " . $row['alamat'] . "<br>";
    }
} else{
    echo "Data Kosong";
}

$connction->close();


?>