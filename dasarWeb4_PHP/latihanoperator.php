<?php
$totalKursi = 45;
$kursiTerisi = 28;

$kursiKosong = $totalKursi - $kursiTerisi;
$persentaseKosong = ($kursiKosong / $totalKursi) * 100;

echo "<h2>Persentase Kursi Kosong di Restoran</h2>";
echo "<p>Total Kursi: $totalKursi</p>";
echo "<p>Kursi Terisi: $kursiTerisi</p>";
echo "<p>Kursi Kosong: $kursiKosong</p>";
echo "<p>Persentase Kursi Kosong: " . number_format($persentaseKosong, 2) . "%</p>";
?>
