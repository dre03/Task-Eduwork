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

    $isbn = mysqli_real_escape_string($conn, $_GET['isbn']); // Mencegah SQL Injection

    $book = mysqli_query($conn, "SELECT  * FROM buku WHERE isbn ='$isbn'");

    while ($book_data = mysqli_fetch_array($book)) {
        $isbn = $book_data['isbn'];
        $judul = $book_data['judul'];
        $tahun = $book_data['tahun'];
        $id_penerbit = $book_data['id_penerbit'];
        $id_pengarang = $book_data['id_pengarang'];
        $id_katalog = $book_data['id_katalog'];
        $qty_stok = $book_data['qty_stok'];
        $harga_pinjam = $book_data['harga_pinjam'];
    }

    ?>

    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center">Edit Buku</h3>
            <div class="col-md-12">
                <form action="edit.php?isbn=<?php $isbn; ?>" method="POST" name="form2">
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" readonly="" class="form-control" id="isbn" name="isbn" value="<?php echo $isbn ?>">
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" class="form-control" id="tahun" name="tahun" value="<?php echo $tahun ?>">
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <select class="form-select" aria-label="Default select example" name="id_penerbit">
                            <option>Pilih Pengarang</option>
                            <?php
                            while ($penerbit = mysqli_fetch_array($penerbits)) {
                                echo "<option value='{$penerbit['id_penerbit']}' " . ($penerbit['id_penerbit'] == $id_penerbit ? 'selected' : '') . ">{$penerbit['nama_penerbit']}</option>";
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
                                echo "<option value='{$pengarang['id_pengarang']}' " . ($pengarang['id_pengarang'] == $id_pengarang ? 'selected' : '') . ">{$pengarang['nama_pengarang']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">Katalog</label>
                        <select class="form-select" aria-label="Default select example" name="id_katalog">
                            <option>Pilih Katalog</option>
                            <?php
                            while ($katalog = mysqli_fetch_array($katalogs)) {
                                echo "<option value='{$katalog['id_katalog']}' " . ($katalog['id_katalog'] == $id_katalog ? 'selected' : '') . ">{$katalog['nama']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="qty_stok" value="<?php echo $qty_stok ?>">
                    </div>
                    <div class="mb-3">
                        <label for="harga_pinjam" class="form-label">Harga Pinjam</label>
                        <input type="number" class="form-control" id="harga_pinjam" name="harga_pinjam" value="<?php echo $harga_pinjam ?>">
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
    // Mengambil data dari form
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $tahun = mysqli_real_escape_string($conn, $_POST['tahun']);
    $id_penerbit = mysqli_real_escape_string($conn, $_POST['id_penerbit']);
    $id_pengarang = mysqli_real_escape_string($conn, $_POST['id_pengarang']);
    $id_katalog = mysqli_real_escape_string($conn, $_POST['id_katalog']);
    $qty_stok = mysqli_real_escape_string($conn, $_POST['qty_stok']);
    $harga_pinjam = mysqli_real_escape_string($conn, $_POST['harga_pinjam']);

    // Query untuk mengupdate data
    $queryUpdateBook = "UPDATE `buku` SET `judul`='$judul', `tahun`='$tahun', `id_penerbit`='$id_penerbit', `id_pengarang`='$id_pengarang', `id_katalog`='$id_katalog', `qty_stok`='$qty_stok', `harga_pinjam`='$harga_pinjam' WHERE `isbn`='$isbn'";

    $update = mysqli_query($conn, $queryUpdateBook);

    if ($update) {
        // Jika berhasil, redirect ke index.php
        header("Location: index.php");
        exit(); // Pastikan untuk mengakhiri script setelah redirect
    } else {
        // Jika ada error, tampilkan pesan error
        die("Query Error: " . mysqli_error($conn));
    }
}
?>