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
    $idPenerbit = mysqli_real_escape_string($conn, $_GET['id_penerbit']);
    $pengarang = mysqli_query($conn, "SELECT * FROM penerbit WHERE id_penerbit = '$idPenerbit'");

    while ($pengarangData = mysqli_fetch_array($pengarang)) {
        $id_penerbit = $pengarangData['id_penerbit'];
        $nama_penerbit = $pengarangData['nama_penerbit'];
        $email = $pengarangData['email'];
        $telp = $pengarangData['telp'];
        $alamat = $pengarangData['alamat'];
    }
    ?>

    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center">Edit Penerbit</h3>
            <div class="col-md-12">
                <form action="edit.php?id_penerbit=<?php $id_penerbit ?>" method="POST" name="form1">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="id_penerbit" class="form-label">ID Penerbit</label>
                                <input type="text" class="form-control" id="id_penerbit" readonly name="id_penerbit" value="<?php echo $id_penerbit ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nama_penerbit" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="<?php echo $nama_penerbit ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="telp" class="form-label">Telepon</label>
                                <input type="number" class="form-control" id="telp" name="telp" value="<?php echo $telp ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
    $id_penerbit = mysqli_real_escape_string($conn, $_POST['id_penerbit']);
    $nama_penerbit = mysqli_real_escape_string($conn, $_POST['nama_penerbit']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);


    // print_r($_POST);

    $query = "UPDATE `penerbit` SET `id_penerbit` = '$id_penerbit', `nama_penerbit`='$nama_penerbit', `email`='$email', `telp`='$telp', `alamat`='$alamat'  WHERE `id_penerbit`='$id_penerbit'";
    $update = mysqli_query($conn, $query);

    if ($update) {
        header("Location: index.php");
        exit();
    } else {
        die("Query Error: " . mysqli_error($conn));
    }
}


?>