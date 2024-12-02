<?php
// Koneksi ke database menggunakan MySQLi
$db = new mysqli('localhost', 'root', '', 'dasar_web');

// Cek koneksi
if ($db->connect_error) {
    die("Koneksi database gagal: " . $db->connect_error);
}

// Fetch buku dari database
$sql = "SELECT * FROM m_buku";  
$result = $db->query($sql);
?>

<!-- CSS untuk menempatkan tombol "Tambah" di kanan atas -->
<style>
    .btn-tambah {
        position: absolute;
        top: 20px;
        right: 20px;
    }
    .container {
      width: 220%;
      padding: 0 px;
      max-width: 1200px;
      margin: 0 auto;
    }
    .card-header {
        font-size: 18px;
        font-weight: bold;
    }
    .card-body {
        padding: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>

<!-- Daftar Buku dan Kategori Buku -->
<div class="container">
    <div class="card">
        <div class="card-header">
            Daftar Buku
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-md btn-primary btn-tambah" onclick="tambahData()">Tambah Buku</button>

            <!-- Tampilkan tabel buku -->
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Nama Buku</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$no}</td>
                                <td>{$row['buku_kode']}</td>
                                <td>{$row['buku_nama']}</td>
                                <td>{$row['kategori_id']}</td>
                                <td>{$row['jumlah']}</td>
                                <td>{$row['deskripsi']}</td>
                                <td><img src='uploads/{$row['gambar']}' alt='{$row['buku_nama']}' width='100'></td>
                                <td>
                                    <button class='btn btn-warning' onclick='editData({$row['buku_id']})'>Edit</button>
                                    <button class='btn btn-danger' onclick='deleteData({$row['buku_id']})'>Delete</button>
                                </td>
                              </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data ditemukan.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

   

<!-- Modal Form untuk Tambah/Edit Buku -->
<div class="modal fade" id="form-data" style="display: none;" aria-hidden="true"> 
    <form action="action/bukuAction.php?act=save" method="post" id="form-tambah" enctype="multipart/form-data"> 
        <div class="modal-dialog modal-md"> 
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <h4 class="modal-title">Tambah Buku</h4> 
                </div> 
                <div class="modal-body"> 
                    <div class="form-group"> 
                        <label>Kode Buku</label> 
                        <input type="text" class="form-control" name="buku_kode" id="buku_kode"> 
                    </div> 
                    <div class="form-group"> 
                        <label>Nama Buku</label> 
                        <input type="text" class="form-control" name="buku_nama" id="buku_nama"> 
                    </div> 
                    <div class="form-group">
                        <label for="kategori_id">Kategori Buku</label>
                        <select class="form-control" name="kategori_id" id="kategori_id">
                            <option value="" disabled selected>Pilih Kategori Buku</option>
                            <option value="FKS">Fiksi</option>
                            <option value="NVL">Novel</option>
                            <option value="ILM">Ilmiah</option>
                            <option value="MTR">Misteri</option>
                            <option value="SSL">Sosial</option>
                            <option value="LKK">LKK</option>
                        </select>
                    </div>
                    <div class="form-group"> 
                        <label>Jumlah</label> 
                        <input type="number" class="form-control" name="jumlah" id="jumlah"> 
                    </div>
                    <div class="form-group"> 
                        <label>Deskripsi</label> 
                        <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                    </div>
                    <div class="form-group"> 
                        <label>Gambar</label> 
                        <input type="file" class="form-control" name="gambar" id="gambar"> 
                    </div>
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button> 
                    <button type="submit" class="btn btn-primary">Simpan</button> 
                </div> 
            </div> 
        </div> 
    </form> 
</div>

<script>
    // Fungsi untuk menambah data buku
    function tambahData() {
        // Reset form untuk memastikan modal kosong
        document.getElementById('form-tambah').reset();
        document.getElementById('form-tambah').action = 'action/bukuAction.php?act=save';
        $('#form-data').modal('show');
    }

    // Fungsi untuk mengedit data buku
    function editData(id) {
        // Load data buku berdasarkan ID untuk edit
        fetch(`action/bukuAction.php?act=get&id=${id}`)
            .then(response => response.json())
            .then(data => {
                // Isi modal dengan data buku yang akan diedit
                document.getElementById('buku_kode').value = data.buku_kode;
                document.getElementById('buku_nama').value = data.buku_nama;
                document.getElementById('kategori_id').value = data.kategori_id;
                document.getElementById('jumlah').value = data.jumlah;
                document.getElementById('deskripsi').value = data.deskripsi;
                document.getElementById('gambar').value = data.gambar;
                
                // Ubah action form untuk update
                document.getElementById('form-tambah').action = `action/bukuAction.php?act=update&id=${id}`;
                $('#form-data').modal('show');
            });
    }

    // Fungsi untuk menghapus data buku
    function deleteData(id) {
        if (confirm("Are you sure you want to delete this book?")) {
            fetch(`action/bukuAction.php?act=delete&id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        alert(data.message);
                        location.reload();  // Reload halaman setelah data dihapus
                    } else {
                        alert(data.message);
                    }
                });
        }
    }
</script>
