<?php
session_start();

if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php'; 
    require '../function provisions/pesan_kilat.php'; 
    require '../function provisions/anti_injection.php'; 

    if (!empty($_GET['jabatan'])) {
        // Mengambil data dari form yang dikirim melalui POST
        $id = antiinjection($koneksi, $_POST['id']);
        $jabatan = antiinjection($koneksi, $_POST['jabatan']);
        $keterangan = antiinjection($koneksi, $_POST['keterangan']);

        $query = "UPDATE jabatan SET jabatan = '$jabatan', keterangan = '$keterangan' WHERE id = '$id'";

        // Mengeksekusi query
        if (mysqli_query($koneksi, $query)) {
            // Jika berhasil, tampilkan pesan sukses
            pesan('success', "Jabatan Telah Diubah.");
        } else {
            // Jika gagal, tampilkan pesan error dengan alasan
            pesan('danger', "Mengubah Jabatan Karena: " . mysqli_error($koneksi));
        }

        header("Location: ../admin/module/jabatan/index.php");
        exit();
    }
} else {
    // Jika belum login, alihkan ke halaman login
    header("Location: ../login.php");
}
?>
