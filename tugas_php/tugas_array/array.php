<?php

$dataJson = file_get_contents('data.json');
$data = json_decode($dataJson, true);

echo `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>`;
echo "<body style='margin: 0;'>";
echo "<div style='background: #3DC2EC; margin: 0;'>";
echo "<h3 style='padding: 15px;'>Data Nilai</h3>";
echo "</div>";

echo "<div style='display: flex; justify-content: center; margin-top: 5rem;'>";
echo "<table border='1' cellpadding='10' style='text-align:center;'>";
echo "<tr>";
echo "<th>No</th>";
echo "<th>Nama</th>";
echo "<th>Tanggal Lahir</th>";
echo "<th>Umur</th>";
echo "<th>Alamat</th>";
echo "<th>Kelas</th>";
echo "<th>Nilai</th>";
echo "<th>Hasil</th>";
echo "</tr>";
$no = 1;
foreach ($data as $key => $value) {
    $tanggalLahir = new DateTime($value['tanggal_lahir']);
    $sekarang = new DateTime();
    $umur = $tanggalLahir->diff($sekarang)->y;
    echo "<tr>";
    echo "<td>".$no++."</td>";
    echo "<td>".$value['nama']."</td>";
    echo "<td>".$value['tanggal_lahir']."</td>";
    echo "<td>".$umur."</td>";
    echo "<td>".$value['alamat']."</td>";
    echo "<td>".$value['kelas']."</td>";
    echo "<td>".$value['nilai']."</td>";
    if ($value['nilai'] >= 90 && $value['nilai'] <= 100) {
        echo "<td>A</td>";
    }elseif($value['nilai'] >= 80 && $value['nilai'] < 90){
        echo "<td>B</td>";
    }elseif($value['nilai'] >= 70 && $value['nilai'] < 80){
        echo "<td>C</td>";
    }else {
        echo "<td>D</td>";
    }

    echo "</tr>";
}
echo "</table>";
echo "</div>";
echo "</body>";
echo "</html>";

?>