<?php  
include('Model.php'); 

class BukuModel extends Model { 
    private $db; 
    private $table = 'm_buku'; 

    public function __construct() {
        include_once('../lib/Connection.php');
        global $conn;
        // Pastikan koneksi berhasil
        if ($conn) {
            $this->db = $conn;
        } else {
            throw new Exception("Koneksi database gagal.");
        }
    }
    
    // Validasi kategori_id pada tabel m_kategori
    public function isKategoriValid($kategori_id) {
        $query = $this->db->prepare("SELECT COUNT(*) as count FROM m_kategori WHERE kategori_id = ?");
        $query->bind_param('i', $kategori_id);
        $query->execute();
        $result = $query->get_result()->fetch_assoc();
        return $result['count'] > 0;
    }

    // Fungsi untuk menyimpan data buku
    public function insertData($data) { 
        // Validasi kategori_id
        if (!$this->isKategoriValid($data['kategori_id'])) {
            throw new Exception("Invalid kategori_id: Data kategori tidak ditemukan.");
        }

        $query = $this->db->prepare("INSERT INTO {$this->table} 
            (kategori_id, buku_kode, buku_nama, jumlah, deskripsi, gambar) 
            VALUES (?, ?, ?, ?, ?, ?)");

        // Validasi gambar
        $gambar = isset($data['gambar']) ? $data['gambar'] : '';  // Menangani gambar kosong
        
        $query->bind_param(
            'ississ', 
            $data['kategori_id'], 
            $data['buku_kode'], 
            $data['buku_nama'], 
            $data['jumlah'], 
            $data['deskripsi'], 
            $gambar
        );

        if ($query->execute()) {
            return true; // Data berhasil disimpan
        } else {
            throw new Exception("Gagal menyimpan data buku: " . $query->error);
        }
    } 

    public function getData() {
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id) {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE buku_id = ?");
        $query->bind_param('i', $id);
        $query->execute();
        return $query->get_result()->fetch_assoc();
    }

    public function updateData($id, $data) {
        if (!$this->isKategoriValid($data['kategori_id'])) {
            throw new Exception("Invalid kategori_id: Data kategori tidak ditemukan.");
        }

        $query = $this->db->prepare("UPDATE {$this->table} 
            SET kategori_id = ?, buku_kode = ?, buku_nama = ?, jumlah = ?, deskripsi = ?, gambar = ? 
            WHERE buku_id = ?");
        
        // Validasi gambar
        $gambar = isset($data['gambar']) ? $data['gambar'] : '';  // Menangani gambar kosong

        $query->bind_param(
            'ississi', 
            $data['kategori_id'], 
            $data['buku_kode'], 
            $data['buku_nama'], 
            $data['jumlah'], 
            $data['deskripsi'], 
            $gambar, 
            $id
        );

        if ($query->execute()) {
            return true;
        } else {
            throw new Exception("Gagal memperbarui data buku: " . $query->error);
        }
    }

    public function deleteData($id) {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE buku_id = ?");
        $query->bind_param('i', $id);
        if ($query->execute()) {
            return true;
        } else {
            throw new Exception("Gagal menghapus data buku: " . $query->error);
        }
    }
}
?>
