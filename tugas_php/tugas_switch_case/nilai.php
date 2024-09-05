<?php

$nilai = 99;

switch($nilai){
    case $nilai >= 90 && $nilai <= 100;
        echo 'Nilai Anda A';
        break;
    case $nilai >= 80 && $nilai < 90;
        echo 'Nilai Anda B';
        break;
    case $nilai >= 70 && $nilai < 80;
        echo 'Nilai Anda C';
        break;
    case $nilai >= 0 && $nilai < 70;
        echo 'Nilai Anda D';
        break;
    default:
        echo "Nilai Anda Kosong";
        break;
}


?>