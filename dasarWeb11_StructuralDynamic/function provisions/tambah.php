<?php
session_start();
if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../function provisions/pesan_kilat.php';
    require '../function provisions/anti_injection.php';

    $jabatan = $_POST['jabatan'];
    $keterangan = $_POST['keterangan'];

    if (!empty($_POST['jabatan'])) {
        $jabatan = antiinjection($koneksi, $_POST['jabatan']);
        $keterangan = antiinjection($koneksi, $_POST['keterangan']);

        $query = "INSERT INTO jabatan (jabatan, keterangan) VALUES ('$jabatan', '$keterangan')";

        if (mysqli_query($koneksi, $query)) {
            pesan('success', "Jabatan Baru Ditambahkan.");
        } else {
            pesan('danger', "Gagal Menambahkan Jabatan: " . mysqli_error($koneksi));
        }

        header("Location: ../admin/module/jabatan/index.php");
        exit();

        
    }
}
?>
