<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php


    include_once('connect.php');

    $penerbits = mysqli_query($conn, "select  * from penerbit");
    $pengarangs = mysqli_query($conn, "select  * from pengarang");
    $katalogs = mysqli_query($conn, "select  * from katalog");

    ?>

    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center">Tambah Buku</h3>
            <div class="col-md-12">
                <form action="add.php" method="POST" name="form1">
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn">
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" class="form-control" id="tahun" name="tahun">
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <select class="form-select" aria-label="Default select example" name="id_penerbit">
                            <option>Pilih Penerbit</option>
                            <?php
                            while ($penerbit = mysqli_fetch_array($penerbits)) {

                                echo "
                                        <option value='{$penerbit['id_penerbit']}'>{$penerbit['nama_penerbit']}</option>
                                    ";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">Pengarang</label>
                        <select class="form-select" aria-label="Default select example" name="id_pengarang">
                            <option>Pilih Pengarang</option>
                            <?php
                            while ($pengarang = mysqli_fetch_array($pengarangs)) {

                                echo "
                                        <option value='{$pengarang['id_pengarang']}'>{$pengarang['nama_pengarang']}</option>
                                    ";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">Katalog</label>
                        <select class="form-select" aria-label="Default select example" name="id_katalog">
                            <option value="1">Pilih Katalog</option>
                            <?php
                            while ($katalog = mysqli_fetch_array($katalogs)) {

                                echo "
                                        <option value='{$katalog['id_katalog']}'>{$katalog['nama']}</option>
                                    ";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="qty_stok">
                    </div>
                    <div class="mb-3">
                        <label for="harga_pinjam" class="form-label">Harga Pinjam</label>
                        <input type="number" class="form-control" id="harga_pinjam" name="harga_pinjam">
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
        $isbn = $_POST['isbn'];
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $id_penerbit = $_POST['id_penerbit'];
        $id_pengarang = $_POST['id_pengarang'];
        $id_katalog = $_POST['id_katalog'];
        $qty_stok = $_POST['qty_stok'];
        $harga_pinjam = $_POST['harga_pinjam'];

        // print_r($_POST);

        $queryInsertBook = "INSERT INTO `buku`(`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES 
                            ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam')";

        $insert = mysqli_query($conn, $queryInsertBook);

        if ($insert) {
            // Jika berhasil, redirect ke index.php
            header("Location: index.php");
            exit(); // Pastikan untuk mengakhiri script setelah redirect
        } else {
            // Jika ada error, tampilkan pesan error
            die("Query Error: " . mysqli_error($conn));
        }
}


?>