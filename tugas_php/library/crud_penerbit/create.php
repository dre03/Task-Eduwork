<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Penerbit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    include_once('../connect.php');
    ?>

    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center">Tambah Penerbit</h3>
            <div class="col-md-12">
                <form action="create.php" method="POST" name="form1">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="id_penerbit" class="form-label">ID Penerbit</label>
                                <input type="text" class="form-control" id="id_penerbit" name="id_penerbit">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nama_penerbit" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="telp" class="form-label">Telepon</label>
                                <input type="number" class="form-control" id="telp" name="telp">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                        </div>
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
    $id_penerbit = $_POST['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    // print_r($_POST);

    $query = "INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat')";
    $insert = mysqli_query($conn, $query);

    if ($insert) {
        header("Location: index.php");
        exit();
    } else {
        die("Query Error: " . mysqli_error($conn));
    }
}


?>