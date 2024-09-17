<?php
$nilaiSiswa = [85, 92, 78, 64, 90, 55, 88, 79, 70, 96];
$nilaiLulus = [];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai >= 70) {
        $nilaiLulus[] = $nilai;
    }
}

$daftarkaryawan = [
    ['Alice', 7],
    ['Bob', 3],
    ['Charlie', 9],
    ['David', 5],
    ['Eva', 6],
];
$karyawanPengalamanLimaTahun = [];

foreach ($daftarkaryawan as $karyawan) {
    if ($karyawan[1] > 5) {
        $karyawanPengalamanLimaTahun[] = $karyawan[0];
    }
}

echo "Daftar nilai siswa yang lulus: " . implode(', ', $nilaiLulus) . "<br>";

echo "Daftar karyawan dengan pengalaman kerja lebih dari 5 tahun: " . implode(', ', $karyawanPengalamanLimaTahun);

// Daftar nilai per mata kuliah
$daftarSiswa = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90],
];

// Hitung jumlah nilai dan jumlah siswa
$totalNilai = 0;
$jumlahSiswa = count($daftarSiswa);

foreach ($daftarSiswa as $siswa) {
    $totalNilai += $siswa[1];
}

$averageNilai = $totalNilai / $jumlahSiswa;


echo "<br>Daftar siswa yang memperoleh nilai di atas rata-rata ($averageNilai):<br>";

foreach ($daftarSiswa as $siswa) {
    if ($siswa[1] > $averageNilai) {
        echo "Nama: {$siswa[0]}, Nilai: {$siswa[1]}<br>";
    }
}
?>
