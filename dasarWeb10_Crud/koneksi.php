<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "anggota");

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
