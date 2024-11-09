<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_SESSION['level'])) {
    require 'config/koneksi.php'; 
    require 'function provisions/pesan_kilat.php';

    include __DIR__ . '/admin/Teamplate/header.php';

    if (!empty($_GET['page'])) {
        include 'admin/module/' . $_GET['page'] . '/index.php'; 
    } else {
        include 'admin/Teamplate/home.php';
    }

    
    include 'admin/Teamplate/footer.php'; 
} else {
    header("Location: login.php");
    exit(); 
}
?>
