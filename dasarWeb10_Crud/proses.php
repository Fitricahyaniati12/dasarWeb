<?php
include('koneksi.php'); // Include database connection

$aksi = $_GET['aksi'] ?? '';

if ($aksi == 'ubah') {
    if (isset($_POST['id'])) {
        // Sanitize the ID and other inputs
        $id = intval($_POST['id']);
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
        $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $no_telp = mysqli_real_escape_string($koneksi, $_POST['no_telp']);

        // Prepare the SQL query
        $query = "UPDATE anggota SET nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', no_telp='$no_telp' WHERE id='$id'";

        // Execute the query
        if (mysqli_query($koneksi, $query)) {
            // Redirect on success
            header("Location: index.php");
            exit();
        } else {
            // Show error if the query fails
            echo "Gagal mengupdate data: " . mysqli_error($koneksi);
        }
    } else {
        echo "ID tidak valid.";
    }
}

// Close the database connection
mysqli_close($koneksi);
?>
