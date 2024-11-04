<?php
include('koneksi.php');

$aksi = $_GET['aksi'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin']; // Changed variable name to use underscores
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];

if ($aksi == 'tambah') {
    // Prepare the SQL query with the correct syntax
    $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        // Provide feedback if the query fails
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>
