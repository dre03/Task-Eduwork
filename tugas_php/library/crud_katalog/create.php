<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Katalog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    include_once('../connect.php');
    ?>

    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center">Tambah Katalog</h3>
            <div class="col-md-12">
                <form action="create.php" method="POST" name="form1">
                    <div class="mb-3">
                        <label for="id_katalog" class="form-label">ID Katalog</label>
                        <input type="text" class="form-control" id="id_katalog" name="id_katalog">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                        <a href="index.php" class="btn btn-dark">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php

if (isset($_POST['submit'])) {
    $id_katalog = $_POST['id_katalog'];
    $nama = $_POST['nama'];

    // print_r($_POST);

    $queryInsertKatalog = "INSERT INTO `katalog`(`id_katalog`, `nama`) VALUES ('$id_katalog', '$nama')";
    $insert = mysqli_query($conn, $queryInsertKatalog);

    if ($insert) {
        header("Location: index.php");
        exit();
    } else {
        die("Query Error: " . mysqli_error($conn));
    }
}


?>