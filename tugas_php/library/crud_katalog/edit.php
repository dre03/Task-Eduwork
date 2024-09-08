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
        $idKatalog = mysqli_real_escape_string($conn, $_GET['id_katalog']);
        $katalog = mysqli_query($conn, "SELECT * FROM katalog WHERE id_katalog = '$idKatalog'");

        while($katalogData = mysqli_fetch_array($katalog)){
            $id_katalog = $katalogData['id_katalog'];
            $nama = $katalogData['nama'];
        }
    ?>

    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center">Edit Katalog</h3>
            <div class="col-md-12">
                <form action="edit.php?id_katalog=<?php $id_katalog ?>" method="POST" name="form1">
                    <div class="mb-3">
                        <label for="id_katalog" class="form-label">ID Katalog</label>
                        <input type="text" readonly class="form-control" id="id_katalog" name="id_katalog" value="<?php echo $id_katalog ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
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
    $id_katalog = mysqli_real_escape_string($conn, $_POST['id_katalog']); 
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);

    // print_r($_POST);

    $query = "UPDATE `katalog` SET `id_katalog` = '$id_katalog', `nama`='$nama' WHERE `id_katalog`='$id_katalog'";
    $update = mysqli_query($conn, $query);


    if ($update) {
        header("Location: index.php");
        exit();
    } else {
        die("Query Error: " . mysqli_error($conn));
    }
}


?>