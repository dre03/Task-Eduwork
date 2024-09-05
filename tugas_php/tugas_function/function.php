<?php

// Fungsi Hitung Bangun Datar Persegi
function hitungLuasPersegi($sisi){
    $hasil = $sisi * $sisi;
    echo "<b>1. Fungsi Hitung Luas Persegi</b> <br>";
    echo "Luas Persegi dengan sisi $sisi adalah $hasil";
    echo "<br>";
    echo "<br>";
}


//Hitung Bangun Datar Persegi Panjang
function hitungLuasPersegiPanjang($panjang, $lebar){
    $hasil = $panjang * $lebar;
    echo "<b>2. Fungsi Menghitung Luas Persegi Panjang</b>";
    echo "<br>";
    echo "Luas Persegi Panjang dengan panjang $panjang dan Lebar $lebar adalah $hasil";
    echo "<br>";
    echo "<br>";

}

//Hitung Bangun Datar Lingkaran
function hitungLuasLingkaran($jari2){
    $phi = 3.14;
    $hasil = $phi * $jari2 * $jari2;
    echo "<b>3. Fungsi Menghitung Luas Lingkaran</b>";
    echo "<br>";
    echo "Luas Lingkaran dengan jari-jari $jari2 adalah $hasil";
    echo "<br>";
    echo "<br>";

}



// Hitung Volume Bangun Ruang Balok
function hitungBalok($panjang, $lebar, $tinggi){
    $hasil = $panjang * $lebar * $tinggi;
    echo "<b>4. Fungsi Menghitung Volume Bangun Ruang Balok</b>";
    echo "<br>";
    echo "Volume Bangun Ruang Balok dengan panjang $panjang, lebar $lebar dan tinggi $tinggi  adalah $hasil";
    echo "<br>"; 
    echo "<br>"; 

}


// Hitung Volume Bangun Ruang Prisma
function hitungPrisma($luasAlas, $tinggi){
    $hasil = $luasAlas * $tinggi;
    echo "<b>5. Fungsi Menghitung Volume Bangun Ruang Prisma</b>";
    echo "<br>";
    echo "Volume Bangun Ruang Prisma dengan luas alas $luasAlas dan tinggi $tinggi adalah $hasil";
    echo "<br>";
    echo "<br>";
}

hitungLuasPersegi(40);
hitungLuasPersegiPanjang(20, 10);
hitungLuasLingkaran(26);
hitungBalok(20, 15, 10);
hitungPrisma(30, 20);


?>
