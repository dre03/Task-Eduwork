<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Pengarang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    include_once('../connect.php');
    $idPengarang = mysqli_real_escape_string($conn, $_GET['id_pengarang']);
    $pengarang = mysqli_query($conn, "SELECT * FROM pengarang WHERE id_pengarang = '$idPengarang'");

    while ($pengarangData = mysqli_fetch_array($pengarang)) {
            $id_pengarang = $pengarangData['id_pengarang'];
            $nama_pengarang = $pengarangData['nama_pengarang'];
            $email = $pengarangData['email'];
            $telp = $pengarangData['telp'];
            $alamat = $pengarangData['alamat'];
    }
    ?>

    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center">Edit Pengarang</h3>
            <div class="col-md-12">
                <form action="edit.php?id_pengarang=<?php $id_pengarang ?>" method="POST" name="form1">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="id_pengarang" class="form-label">ID Pengarang</label>
                                <input type="text" class="form-control" id="id_pengarang" readonly name="id_pengarang" value="<?php echo $id_pengarang ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="nama_pengarang" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama_pengarang" name="nama_pengarang" value="<?php echo $nama_pengarang ?>">
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
    $id_pengarang = mysqli_real_escape_string($conn, $_POST['id_pengarang']);
    $nama_pengarang = mysqli_real_escape_string($conn, $_POST['nama_pengarang']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telp = mysqli_real_escape_string($conn, $_POST['telp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    

    // print_r($_POST);

    $query = "UPDATE `pengarang` SET `id_pengarang` = '$id_pengarang', `nama_pengarang`='$nama_pengarang', `email`='$email', `telp`='$telp', `alamat`='$alamat'  WHERE `id_pengarang`='$id_pengarang'";
    $update = mysqli_query($conn, $query);

    if ($update) {
        header("Location: index.php");
        exit();
    } else {
        die("Query Error: " . mysqli_error($conn));
    }
}


?>