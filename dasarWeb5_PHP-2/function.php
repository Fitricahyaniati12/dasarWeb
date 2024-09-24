<?php
// Membuat fungsi
function hitungUmur($thn_lahir, $thn_sekarang) {
    $umur = $thn_sekarang - $thn_lahir; // Menghitung umur
    return $umur; // Mengembalikan umur
}

// Menampilkan umur
echo "Umur saya adalah " . hitungUmur(2005, 2024) . " tahun."; 
// Ganti tahun lahir sesuai kebutuhan
?>
