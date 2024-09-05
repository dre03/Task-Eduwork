<?php

$nama = 'Andre Apriyana';
$tinggiBadan = 160;
$beratBadan = 70;
// Mengubah tinggi badan ke meter
$tinggiBadanMeter = $tinggiBadan / 100;
// Menghitung BMI
$bmi = $beratBadan / ($tinggiBadanMeter * $tinggiBadanMeter);
// Menampilkan hasil BMI dan kategori
echo "<b>Nama: $nama</b><br>";
echo "Tinggi Badan: $tinggiBadan cm<br>";
echo "Berat Badan: $beratBadan kg<br>";
echo "BMI: " . round($bmi, 2) . "<br>";

// Klasifikasi BMI
if ($bmi < 18.5) {
    echo "Kategori: Kurus ";
} elseif ($bmi >= 18.5 && $bmi < 25.0) {
    echo "Kategori: Normal";
} elseif ($bmi >= 25.0 && $bmi < 27.0) {
    echo "Kategori: Kelebihan Berat Badan";
} else {
    echo "Kategori: Obesitas";
}
