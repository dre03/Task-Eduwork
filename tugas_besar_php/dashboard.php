<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <?php

    include('connection.php');
    $query = 'SELECT * FROM produk';

    $products = mysqli_query($connection, $query);

    ?>
    <div class="container mt-4">
        <h2 class="text-center">Manage Product</h2>
        <div class="container-fluid">
            <div class="d-flex gap-3">
                <a href="create.php" class="btn btn-primary">+ Product</a>
                <a href="index.php" class="btn btn-dark">Back</a>
            </div>
            <?php
            if (isset($_GET['alert'])) {
                if ($_GET['alert'] == 'gagal_ekstensi') {
            ?>
                    <div class="alert alert-warning alert-dismissible mt-3">
                        <button type="button" class="btn-close float-end" data-dismiss="alert" aria-hidden="true"></button>
                        <h4><i class="icon fa fa-warning"></i> Warning !</h4>
                        Ekstensi Tidak Diperbolehkan
                    </div>
                <?php
                } elseif ($_GET['alert'] == "gagal_ukuran") {
                ?>
                    <div class="alert alert-warning alert-dismissible mt-3">
                        <button type="button" class="btn-close float-end" data-dismiss="alert" aria-hidden="true"></button>
                        <h4><i class="icon fa fa-check"></i> Warning !</h4>
                        Ukuran File terlalu Besar
                    </div>
                <?php
                } elseif ($_GET['alert'] == "update_berhasil") {
                ?>
                    <div class="alert alert-success alert-dismissible mt-3">
                        <button type="button" class="btn-close float-end" data-dismiss="alert" aria-hidden="true"></button>
                        <h4><i class="icon fa fa-check"></i> Success !</h4>
                        Data Update Berhasil
                    </div>
                <?php
                } elseif ($_GET['alert'] == "delete") {
                ?>
                    <div class="alert alert-success alert-dismissible mt-3">
                        <button type="button" class="btn-close float-end" data-dismiss="alert" aria-hidden="true"></button>
                        <h4><i class="icon fa fa-check"></i> Success !</h4>
                        Data Berhasil Dihapus
                    </div>
                <?php
                } elseif ($_GET['alert'] == "berhasil") {
                ?>
                    <div class="alert alert-success alert-dismissible mt-3">
                        <button type="button" class="btn-close float-end" data-dismiss="alert" aria-hidden="true"></button>
                        <h4><i class="icon fa fa-check"></i> Success</h4>
                        Data Berhasil Disimpan
                    </div>
            <?php
                }
            }
            ?>
            <table class="table table-striped table-hover">
                <thead class="text-center">
                    <tr>
                        <td>No</td>
                        <td>Title</td>
                        <td>Deskripsi</td>
                        <td>Price</td>
                        <td>Picture</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $no = 1;
                    while ($product = mysqli_fetch_array($products)) {
                        echo "<tr>
                                        <td>{$no}</td>
                                        <td>{$product['title']}</td>
                                        <td>{$product['description']}</td>
                                        <td>{$product['price']}</td>
                                        <td><img src='file/{$product['picture']}' width='100' height='100'></td>
                                        <td class='text-center'>
                                            <a href='edit.php?id=" . $product['id'] . "' class='btn btn-warning'><i class='bi bi-pencil-square'></i></a>
                                            <a href='#' class='btn btn-danger' onclick=\"confirmation('{$product['id']}')\"><i class='bi bi-trash3'></i></a>
                                        </td>
                                    </tr>";
                        $no++;
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

<script>
    function confirmation(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini ?')) {
            // Jika pengguna menekan "OK", arahkan ke URL untuk menghapus
            window.location.href = 'delete.php?id=' + id;
        }
    }
</script>