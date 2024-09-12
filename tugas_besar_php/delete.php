<?php

include_once('connection.php');

// Mencegah SQL Injection
$idProduct = mysqli_real_escape_string($connection, $_GET['id']);

// Mengambil data produk, khususnya gambar lama sebelum menghapus produk
$queryProduct = mysqli_query($connection, "SELECT picture FROM produk WHERE id = '$idProduct'");
$dataProduct = mysqli_fetch_array($queryProduct);
$old_picture = $dataProduct['picture'];  // Menyimpan nama file gambar lama

// Menghapus produk dari database
$delete = mysqli_query($connection, "DELETE FROM produk WHERE id = '$idProduct'");

if ($delete) {
    // Jika gambar ada di folder, hapus gambar
    if (file_exists('file/' . $old_picture)) {
        unlink('file/' . $old_picture);  // Menghapus gambar lama dari folder
    }
    // Redirect ke halaman index.php setelah penghapusan berhasil
    header('Location: dashboard.php?alert=delete');
    exit();
} else {
    // Menampilkan pesan kesalahan jika query gagal
    die("Gagal menghapus produk: " . mysqli_error($connection));
}
