<?php
include('../lib/Session.php');
$session = new Session();
if ($session->get('is_login') !== true) {
    header('Location: login.php');
    exit();
}

include_once('../model/BukuModel.php');
include_once('../lib/Secure.php');

$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';
header('Content-Type: application/json'); // Pastikan tipe konten adalah JSON

// Enable error reporting untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $buku = new BukuModel();

    if ($act == 'load') {
        $data = $buku->getData();
        $result = [];
        $i = 1;
        while ($row = $data->fetch_assoc()) {
            $result['data'][] = [
                $i,
                $row['buku_kode'],
                $row['buku_nama'],
                $row['kategori_id'],
                $row['jumlah'],
                $row['deskripsi'],
                $row['gambar'],
                '<button class="btn btn-sm btn-warning" onclick="editData(' . $row['buku_id'] . ')"><i class="fa fa-edit"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteData(' . $row['buku_id'] . ')"><i class="fa fa-trash"></i></button>'
            ];
            $i++;
        }
        echo json_encode($result);
        exit();
    }

    if ($act == 'get') {
        $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
        $data = $buku->getDataById($id);
        echo json_encode($data);
        exit();
    }

    if ($act == 'save') {
        // Menangani data gambar
        $gambar = isset($_POST['gambar']) ? $_POST['gambar'] : '';  // Pastikan gambar ada
        $data = [
            'kategori_id' => antiSqlInjection($_POST['kategori_id']),
            'buku_kode' => antiSqlInjection($_POST['buku_kode']),
            'buku_nama' => antiSqlInjection($_POST['buku_nama']),
            'jumlah' => (int)$_POST['jumlah'],
            'deskripsi' => antiSqlInjection($_POST['deskripsi']),
            'gambar' => $gambar
        ];
        $buku->insertData($data);
        echo json_encode(['status' => true, 'message' => 'Data berhasil disimpan.']);
        exit();
    }

    if ($act == 'update') {
        $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
        // Menangani data gambar
        $gambar = isset($_POST['gambar']) ? $_POST['gambar'] : '';  // Pastikan gambar ada
        $data = [
            'kategori_id' => antiSqlInjection($_POST['kategori_id']),
            'buku_kode' => antiSqlInjection($_POST['buku_kode']),
            'buku_nama' => antiSqlInjection($_POST['buku_nama']),
            'jumlah' => (int)$_POST['jumlah'],
            'deskripsi' => antiSqlInjection($_POST['deskripsi']),
            'gambar' => $gambar
        ];
        $buku->updateData($id, $data);
        echo json_encode(['status' => true, 'message' => 'Data berhasil diupdate.']);
        exit();
    }

    if ($act == 'delete') {
        $id = (isset($_GET['id']) && ctype_digit($_GET['id'])) ? $_GET['id'] : 0;
        $buku->deleteData($id);
        echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus.']);
        exit();
    }
} catch (Exception $e) {
    echo json_encode(['status' => false, 'message' => $e->getMessage()]);
}
?>
