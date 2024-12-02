<?php
include('KategoriModel.php');

// Pastikan ID diterima melalui metode GET atau POST
if (isset($_GET['kategori_id'])) {
    $kategoriModel = new KategoriModel();

    // Ambil ID dari URL
    $id = $_GET['kategori_id'];

    // Hapus data dari database
    $result = $kategoriModel->deleteData($id);

    // Berikan notifikasi berhasil/gagal
    if ($result) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "ID tidak ditemukan!";
}
?>
