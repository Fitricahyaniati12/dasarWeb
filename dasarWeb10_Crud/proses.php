<?php
include('koneksi.php');

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'ubah') {
        // Mengambil data dari form dan menghindari karakter berbahaya
        $id = $_POST['id'];
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);

        // Query untuk mengupdate data anggota
        $query = "UPDATE anggota SET nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telp='$no_telp' WHERE id='$id'";
        $result = mysqli_query($koneksi, $query);

        // Memeriksa hasil eksekusi query
        if ($result) {
            header('Location: index.php'); // Redirect ke halaman utama setelah berhasil
            exit; // Pastikan untuk menghentikan eksekusi setelah redirect
        } else {
            echo 'Gagal memperbarui data: ' . mysqli_error($koneksi);
        }
    }
}

// Menutup koneksi database
mysqli_close($koneksi);
?>
