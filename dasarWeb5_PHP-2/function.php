<?php
// Membuat fungsi
function perkenalan($nama, $salam = "Assalamualaikum") {
    echo $salam . ", ";
    echo "Perkenalkan, nama saya " . $nama . "<br/>"; 
    echo "Senang berkenalan dengan Anda<br/>";
}

// Memanggil fungsi dengan argumen lengkap
perkenalan("Fitri", "Hallo");

echo "<hr>";

$saya = "chya";
$ucapanSalam = "Selamat pagi";

// Memanggil fungsi tanpa mengisi parameter salam
perkenalan($saya);
?>
