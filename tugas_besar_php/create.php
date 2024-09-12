<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Add Catalog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    include_once('connection.php');
    ?>

    <div class="container mt-5">
        <div class="row">
            <h3 class="text-center">Add Catalog</h3>
            <div class="col-md-12">
                <form action="create.php" method="POST" name="form1" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="form-label">Picture</label>
                        <input type="file" class="form-control" id="picture" name="picture">
                        <p class="text-danger">Ekstensi yang diperbolehkan .png | .jpg | .jpeg</p>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
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
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $random = rand();
    $ekstensi = array('png', 'jpg', 'jpeg');
    $filename = $_FILES['picture']['name'];
    $size = $_FILES['picture']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if (!in_array($ext,$ekstensi)) {
        header("Location: dashboard.php?alert=gagal_ekstensi");
    } else{
        if ($size < 1044070) {
            $picture = $random.'_'.$filename;
            move_uploaded_file($_FILES['picture']['tmp_name'], 'file/'.$random.'_'.$filename);
            $queryInsertCatalog = "INSERT INTO `produk`(`title`, `description`, `price`, `picture`) VALUES ('$title', '$description', '$price', '$picture')";
            $insert = mysqli_query($connection, $queryInsertCatalog);
            if ($insert) {
                header("Location: dashboard.php?alert=berhasil");
                exit();
            } else {
                die("Query Error: " . mysqli_error($connection));
            }
        }
    }
}


?>