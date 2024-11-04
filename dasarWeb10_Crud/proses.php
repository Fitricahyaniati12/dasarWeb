<?php
include('koneksi.php'); // Pastikan koneksi database berhasil

// Pastikan koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil aksi dari URL
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

if ($aksi == 'hapus') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Sanitize ID input
        echo "ID yang diterima: " . $id; // Debugging ID

        // Periksa jika ID ada di database
        $checkQuery = "SELECT * FROM anggota WHERE id = $id";
        $checkResult = mysqli_query($koneksi, $checkQuery);
        if (mysqli_num_rows($checkResult) == 0) {
            echo "ID tidak ditemukan di database.";
            exit();
        }

        // Menyiapkan pernyataan untuk menghapus data
        $stmt = mysqli_prepare($koneksi, "DELETE FROM anggota WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id); // Mengikat parameter ID sebagai integer

        // Menjalankan pernyataan
        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.php"); // Redirect setelah penghapusan berhasil
            exit();
        } else {
            // Menampilkan pesan jika gagal menghapus data
            echo "Gagal menghapus data: " . mysqli_error($koneksi);
        }

        // Menutup pernyataan
        mysqli_stmt_close($stmt);
    } else {
        echo "ID tidak valid.";
    }
} else {
    header("Location: index.php"); 
}

mysqli_close($koneksi); 
?>
