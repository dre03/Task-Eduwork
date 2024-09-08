<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include_once('connect.php');

    $queryBooks = "SELECT buku.*, katalog.nama AS nama_katalog, nama_penerbit, nama_pengarang  FROM buku 
                        LEFT JOIN katalog ON katalog.id_katalog = buku.id_katalog
                        LEFT JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit
                        LEFT JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang ORDER BY judul ASC";
    $books = mysqli_query($conn, $queryBooks);

    if (!$books) {
        die("Query Error: " . mysqli_error($conn));
    }


    ?>
    <div class="container mt-5">
        <div class="row" style="margin: 50px;">
            <div class="col-md-2 text-center">
                <h5><a href="index.php" class="nav-link btn btn bg-primary text-white">Buku</a></h5>
            </div>
            <div class="col-3 text-center">
                <h5><a href="crud_katalog/index.php" class="nav-link btn btn bg-light">Tugas CRUD Katalog</a></h5>
            </div>
            <div class="col-3 text-center">
                <h5><a href="crud_penerbit/index.php" class="nav-link btn btn bg-light">Tugas CRUD Penerbit</a></h5>
            </div>
            <div class="col-3 text-center">
                <h5><a href="crud_pengarang/index.php" class="nav-link btn btn bg-light">Tugas CRUD Pengarang</a></h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary mb-5" href="add.php">Add Data</a>
            </div>
            <div class="col-md-12">
                <table border="1" class="table table-bordered">
                    <thead>
                        <tr>
                            <td>ISBN</td>
                            <td>Judul</td>
                            <td>Tahun</td>
                            <td>Penerbit</td>
                            <td>Pengarang</td>
                            <td>Katalog</td>
                            <td>Stok</td>
                            <td>Harga Pinjam</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($book = mysqli_fetch_array($books)) {
                            echo "<tr>
                                    <td>{$book['isbn']}</td>
                                    <td>{$book['judul']}</td>
                                    <td>{$book['tahun']}</td>
                                    <td>{$book['nama_penerbit']}</td>
                                    <td>{$book['nama_pengarang']}</td>
                                    <td>{$book['nama_katalog']}</td>
                                    <td>{$book['qty_stok']}</td>
                                    <td>{$book['harga_pinjam']}</td>
                                    <td>
                                        <a href='edit.php?isbn=" . $book['isbn'] . "' class='btn btn-warning'>Edit</a>
                                        <a href='#' class='btn btn-danger' onclick=\"confirmation('{$book['isbn']}')\">Delete</a>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>


<script>
    function confirmation(isbn) {
        if (confirm('Apakah Anda yakin ingin menghapus buku dengan ISBN: ' + isbn + '?')) {
            // Jika pengguna menekan "OK", arahkan ke URL untuk menghapus
            window.location.href = 'delete.php?isbn=' + isbn;
        }
    }
</script>