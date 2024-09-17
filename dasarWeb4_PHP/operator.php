<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Hasil Tambah: $hasilTambah<br>";
echo "Hasil Kurang: $hasilKurang<br>";
echo "Hasil Kali: $hasilKali<br>";
echo "Hasil Bagi: $hasilBagi<br>";
echo "Sisa Bagi: $sisaBagi<br>";
echo "Pangkat: $pangkat<br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "<h2>Hasil Perbandingan</h2>";
echo "<p>Nilai a: $a</p>";
echo "<p>Nilai b: $b</p>";

echo "<p>Hasil Sama (a == b): " . ($hasilSama ? 'true' : 'false') . "</p>";
echo "<p>Hasil Tidak Sama (a != b): " . ($hasilTidakSama ? 'true' : 'false') . "</p>";
echo "<p>Hasil Lebih Kecil (a < b): " . ($hasilLebihKecil ? 'true' : 'false') . "</p>";
echo "<p>Hasil Lebih Besar (a > b): " . ($hasilLebihBesar ? 'true' : 'false') . "</p>";
echo "<p>Hasil Lebih Kecil Sama (a <= b): " . ($hasilLebihKecilSama ? 'true' : 'false') . "</p>";
echo "<p>Hasil Lebih Besar Sama (a >= b): " . ($hasilLebihBesarSama ? 'true' : 'false') . "</p>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "<h2>Hasil Operasi Logika</h2>";
echo "<p>Hasil AND (a && b): " . ($hasilAnd ? 'true' : 'false') . "</p>";
echo "<p>Hasil OR (a || b): " . ($hasilOr ? 'true' : 'false') . "</p>";
echo "<p>Hasil NOT a (!a): " . ($hasilNotA ? 'true' : 'false') . "</p>";
echo "<p>Hasil NOT b (!b): " . ($hasilNotB ? 'true' : 'false') . "</p>";
?>
