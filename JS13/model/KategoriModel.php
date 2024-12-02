<?php  
    include('Model.php'); 
    
    class KategoriModel extends Model{ 
        private $db; 

        // {$this->table}
        private $table = 'm_kategori'; 
    
        public function __construct() {
            $this->db = new mysqli('localhost', 'root', '', 'dasar_web');
            if ($this->db->connect_error) {
                die('Koneksi gagal: ' . $this->db->connect_error);
            }
        } 
        public function insertData($data){ 
            // prepare statement untuk query insert 
            $query = $this->db->prepare("insert into {$this->table} (kategori_kode, kategori_nama) values(?,?)"); 
    
            // binding parameter ke query, "s" berarti string, "ss" berarti dua string 
            $query->bind_param('ss', $data['kategori_kode'], $data['kategori_nama']);          
            // eksekusi query untuk menyimpan ke database 
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        public function getData() {
            return $this->db->query("SELECT * FROM `m_kategori` ORDER BY `kategori_id` ASC ");
        }
        
        
        public function getDataById($id) {
            $stmt = $this->db->prepare("SELECT * FROM m_kategori WHERE kategori_id = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
    
        public function updateData($id, $data) { 
            // Prepare the query to update data
            $query = $this->db->prepare("UPDATE {$this->table} SET kategori_kode = ?, kategori_nama = ? WHERE kategori_id = ?"); 

            // Bind parameters to the query
            $query->bind_param('ssi', $data['kategori_kode'], $data['kategori_nama'], $id); 

            // Execute the query
            $query->execute(); 
        }  
        public function deleteData($id) {
            $stmt = $this->db->prepare("DELETE FROM m_kategori WHERE kategori_id = ?");
            $stmt->bind_param('i', $id);
            return $stmt->execute();
        }
    }
?>