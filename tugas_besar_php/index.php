<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .bgBody {
            background-color: #dbdbdb;
        }

        .fSize-35 {
            font-size: 35px;
        }

        .fSize-20 {
            font-size: 20px;
        }
    </style>
</head>

<body class="bgBody">

    <?php
    include('connection.php');
    $query = "SELECT * FROM produk";
    $products = mysqli_query($connection, $query);
    ?>
    <div class="container">
        <nav class="navbar mt-5">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center gap-2">
                    <img src="https://img.freepik.com/premium-vector/abstract-letter-c-logo-with-colorful-design-vector-3d_345408-876.jpg" alt="" class="rounded-circle" width="50px">
                    <span class="fSize-35">Mari Belanja</span>
                </a>
                <a href="dashboard.php" class="btn btn-success fw-bold">Kelola Produk</a>
            </div>
        </nav>
    </div>

    <div class="container mb-5">
        <div class="container-fluid">
            <p class="fw-bold mt-4 fSize-20">Semua Produk</p>
            <div class="row">
                <?php
                while ($data = mysqli_fetch_array($products)) {
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 d-flex justify-content-around">
                        <div class="card mt-4" style="width: 18rem;">
                            <img src="file./<?php echo $data['picture'] ?>" class="card-img-top p-3" alt="..." width="85%" height="240px">
                            <div class="card-body pb-4">
                                <h5 class="card-title"><?php echo $data['title']  ?></h5>
                                <p class="card-text"><?php echo $data['description']  ?></p>
                                <span class="rounded-pill text-bg-success pt-1 pb-1 ps-3 pe-3">Rp. <?php echo $data['price']  ?></span>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>