<?php
session_start();
include 'koneksi.php';
include 'csrf.php'; 

// Sanitize and validate the input values
$nama = stripslashes(strip_tags(htmlspecialchars($_POST['nama'], ENT_QUOTES)));
$jenis_kelamin = stripslashes(strip_tags(htmlspecialchars($_POST['jenis_kelamin'], ENT_QUOTES)));
$alamat = stripslashes(strip_tags(htmlspecialchars($_POST['alamat'], ENT_QUOTES)));
$no_telp = stripslashes(strip_tags(htmlspecialchars($_POST['no_telp'], ENT_QUOTES)));


$query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES (?, ?, ?, ?)";
$sql = $dbi->prepare($query);
$sql->bind_param("ssss", $nama, $jenis_kelamin, $alamat, $no_telp);

if ($sql->execute()) {
    echo json_encode(['success' => 'Sukses']);
} else {
    echo json_encode(['error' => 'Gagal menambahkan data']);
}

$dbi->close();
?>