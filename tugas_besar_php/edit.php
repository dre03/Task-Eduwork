<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Catalog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    include_once('connection.php');
    $idProduct = mysqli_real_escape_string($connection, $_GET['id']);
    $product = mysqli_query($connection, "SELECT * FROM produk WHERE id = '$idProduct'");

    while ($data = mysqli_fetch_array($product)) {
        $title = $data['title'];
        $description = $data['description'];
        $price = $data['price'];
        $old_picture = $data['picture'];
    }
    ?>

    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center">Update Catalog</h3>
            <div class="col-md-12">
                <form action="edit.php?id=<?php echo $idProduct ?>" method="POST" name="form1" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $title ?>">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo $description ?>">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $price ?>">
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="form-label">Picture</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                        <p class="text-danger">Ekstensi yang diperbolehkan .png | .jpg | .jpeg</p>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        <a href="dashboard.php" class="btn btn-dark">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);

    // Proses upload gambar
    $random = rand();
    $ekstensi = array('png', 'jpg', 'jpeg');
    $filename = $_FILES['picture']['name'];
    $size = $_FILES['picture']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    // Cek apakah file gambar di-upload atau tidak
    if ($filename != "") {
        // Jika ada gambar baru di-upload
        if (!in_array($ext, $ekstensi)) {
            header("Location: dashboard.php?alert=gagal_ekstensi");
            exit();
        } else {
            // Jika ukuran file gambar valid (misalnya kurang dari 1 MB)
            if ($size < 1044070) {
                $picture = $random . '_' . $filename;

                // Hapus gambar lama sebelum update jika ada gambar baru
                if (file_exists('file/' . $old_picture)) {
                    unlink('file/' . $old_picture); // Menghapus gambar lama
                }

                // Pindahkan gambar baru ke folder 'file/'
                move_uploaded_file($_FILES['picture']['tmp_name'], 'file/' . $picture);
            }
        }
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $picture = $old_picture;
    }

    // Query untuk mengupdate data produk
    $queryUpdateCatalog = "UPDATE produk SET title = '$title', description = '$description', price = '$price', picture = '$picture' WHERE id = '$idProduct'";
    $insert = mysqli_query($connection, $queryUpdateCatalog);

    // Jika berhasil, kembali ke dashboard dengan pesan sukses
    if ($insert) {
        header("Location: dashboard.php?alert=update_berhasil");
        exit();
    } else {
        // Jika ada kesalahan pada query
        die("Query Error: " . mysqli_error($connection));
    }
}
?>