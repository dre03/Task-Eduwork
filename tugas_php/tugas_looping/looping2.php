<?php
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Document</title>';
echo '</head>';
echo '<body>';
echo '<table border="1">';
echo '<tr style="background: #3DC2EC;">
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
      </tr>'; // Perbaiki tag penutup tr

for ($i = 1, $kelas =  10; $i <= 10; $i++, $kelas--) { 
    echo '<tr>';
    echo "<td>$i</td>";
    echo "<td>Nama ke $i</td>";
    echo "<td>Kelas ke $kelas</td>"; 
    echo '</tr>';
}
echo '</table>';
echo '</body>';
echo '</html>';
