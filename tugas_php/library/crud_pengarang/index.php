<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Katalog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php include_once('../connect.php');
    $query = "SELECT * FROM pengarang  ORDER BY nama_pengarang ASC";
    $pengarangs = mysqli_query($conn, $query);

    if (!$pengarangs) {
        die("Query Error: " . mysqli_error($conn));
    }


    ?>
    <div class="container mt-5">
        <div class="row" style="margin: 50px;">
            <div class="col-3 text-center">
                <h5><a href="../index.php" class="nav-link btn btn bg-light">Buku</a></h5>
            </div>
            <div class="col-3 text-center">
                <h5><a href="../crud_katalog/index.php" class="nav-link btn btn bg-light">Tugas CRUD Katalog</a></h5>
            </div>
            <div class="col-3 text-center">
                <h5><a href="../crud_penerbit/index.php" class="nav-link btn btn bg-light">Tugas CRUD Penerbit</a></h5>
            </div>
            <div class="col-3 text-center">
                <h5><a href="index.php" class="nav-link btn btn bg-primary text-white">Tugas CRUD Pengarang</a></h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary mb-5" href="create.php">Add Data Pengarang</a>
            </div>
            <div class="col-md-12">
                <table border="1" class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <td>ID Pengarang</td>
                            <td>Nama</td>
                            <td>Email</td>
                            <td>Telepon</td>
                            <td>Alamat</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        while ($pengarang = mysqli_fetch_array($pengarangs)) {
                            echo "<tr>
                                    <td>{$pengarang['id_pengarang']}</td>
                                    <td>{$pengarang['nama_pengarang']}</td>
                                    <td>{$pengarang['email']}</td>
                                    <td>{$pengarang['telp']}</td>
                                    <td>{$pengarang['alamat']}</td>
                                    <td class='text-center'>
                                        <a href='edit.php?id_pengarang=" . $pengarang['id_pengarang'] . "' class='btn btn-warning'>Edit</a>
                                        <a href='#' class='btn btn-danger' onclick=\"confirmation('{$pengarang['id_pengarang']}')\">Delete</a>
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
    function confirmation(id_pengarang) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini ?')) {
            // Jika pengguna menekan "OK", arahkan ke URL untuk menghapus
            window.location.href = 'delete.php?id_pengarang=' + id_pengarang;
        }
    }
</script>