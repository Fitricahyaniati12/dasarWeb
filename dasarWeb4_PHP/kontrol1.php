<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];

sort($nilaiSiswa);

array_shift($nilaiSiswa); 
array_shift($nilaiSiswa); 

array_pop($nilaiSiswa); 
array_pop($nilaiSiswa);

$totalNilai = array_sum($nilaiSiswa);

echo "Total nilai setelah mengabaikan dua nilai tertinggi dan dua nilai terendah adalah: $totalNilai<br>";
?>
