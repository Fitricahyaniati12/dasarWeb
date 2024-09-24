<?php
// Membuat fungsi untuk menghitung umur
function hitungUmur($thn_lahir, $thn_sekarang) {
    return $thn_sekarang - $thn_lahir; 
}

// Membuat fungsi perkenalan
function perkenalan($nama, $salam = "Assalamualaikum") {
    echo $salam . ", ";
    echo "Perkenalkan, nama saya " . $nama . "<br/>"; 
}

// Memanggil fungsi perkenalan
perkenalan("Chya"); 

// Menampilkan umur
echo "Saya berusia " . hitungUmur(2005, 2024) . " tahun<br/>"; 
echo "Senang berkenalan dengan Anda<br/>";
?>
