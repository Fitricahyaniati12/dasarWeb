<?php
include('koneksi.php'); // Pastikan file koneksi database sudah benar

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == 'tambah') {
        // Validasi dan sanitasi data dari form
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);

        // Query untuk menambahkan data anggota
        $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp) VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header('Location: index.php'); // Redirect ke halaman utama setelah berhasil
            exit;
        } else {
            echo 'Gagal menambahkan data: ' . mysqli_error($koneksi);
        }
    } elseif ($aksi == 'ubah') {
        // Proses ubah data anggota (sudah ada di kode Anda)
    } elseif ($aksi == 'hapus') {
        // Proses hapus data anggota
        $id = $_GET['id'];
        $query = "DELETE FROM anggota WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            echo 'Gagal menghapus data: ' . mysqli_error($koneksi);
        }
    }
}

// Menutup koneksi database
mysqli_close($koneksi);
?>
