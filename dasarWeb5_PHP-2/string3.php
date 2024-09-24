<?php
$pesan = "saya arek blitar";
// Ubah variabel $pesan menjadi array dengan perintah explode
$pesanPerkata = explode(" ", $pesan);
// Ubah setiap kata dalam array menjadi kebalikannya
$pesanPerkata = array_map(fn($kata) => strrev($kata), $pesanPerkata);
// Gabungkan kembali array menjadi string
$pesan = implode(" ", $pesanPerkata);
echo $pesan . "<br>";
?>
