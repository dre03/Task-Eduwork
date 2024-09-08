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
    $queryKatalog = "SELECT * FROM katalog  ORDER BY nama ASC";
    $katalogs = mysqli_query($conn, $queryKatalog);

    if (!$katalogs) {
        die("Query Error: " . mysqli_error($conn));
    }


    ?>
    <div class="container mt-5">
        <div class="row" style="margin: 50px;">
            <div class="col-3 text-center">
                <h5><a href="../index.php" class="nav-link btn btn bg-light">Buku</a></h5>
            </div>
            <div class="col-3 text-center">
                <h5><a href="index.php" class="nav-link btn btn bg-primary text-white">Tugas CRUD Katalog</a></h5>
            </div>
            <div class="col-3 text-center">
                <h5><a href="../crud_penerbit/index.php" class="nav-link btn btn bg-light">Tugas CRUD Penerbit</a></h5>
            </div>
            <div class="col-3 text-center">
                <h5><a href="../crud_pengarang/index.php" class="nav-link btn btn bg-light">Tugas CRUD Pengarang</a></h5>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary mb-5" href="create.php">Add Data Katalog</a>
            </div>
            <div class="col-md-12">
                <table border="1" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <td>ID Katalog</td>
                            <td>Nama</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($katalog = mysqli_fetch_array($katalogs)) {
                            echo "<tr>
                                    <td>{$katalog['id_katalog']}</td>
                                    <td>{$katalog['nama']}</td>
                                    <td class='text-center'>
                                        <a href='edit.php?id_katalog=" . $katalog['id_katalog'] . "' class='btn btn-warning'>Edit</a>
                                        <a href='#' class='btn btn-danger' onclick=\"confirmation('{$katalog['id_katalog']}')\">Delete</a>
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
    function confirmation(id_katalog) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini ?')) {
            // Jika pengguna menekan "OK", arahkan ke URL untuk menghapus
            window.location.href = 'delete.php?id_katalog=' + id_katalog;
        }
    }
</script>