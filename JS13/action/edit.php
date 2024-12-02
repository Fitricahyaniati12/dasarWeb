<?php
include('KategoriModel.php');

// Pastikan ID dan data diterima melalui metode POST
if (isset($_POST['kategori_id']) && isset($_POST['kategori_kode']) && isset($_POST['kategori_nama'])) {
    $kategoriModel = new KategoriModel();

    // Ambil data dari form
    $id = $_POST['kategori_id'];
    $data = [
        'kategori_kode' => $_POST['kategori_kode'],
        'kategori_nama' => $_POST['kategori_nama']
    ];

    // Update data ke database
    $result = $kategoriModel->updateData($id, $data);

    // Berikan notifikasi berhasil/gagal
    if ($result) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui data.";
    }
} else {
    echo "Data tidak lengkap!";
}
?>

<form action="edit.php" method="POST">
    <input type="hidden" name="kategori_id" value="1"> <!-- Isi dengan ID data yang akan diubah -->
    <label for="kategori_kode">Kode Kategori:</label>
    <input type="text" name="kategori_kode" id="kategori_kode" value="001">
    <label for="kategori_nama">Nama Kategori:</label>
    <input type="text" name="kategori_nama" id="kategori_nama" value="Elektronik">
    <button type="submit">Update</button>
</form>

