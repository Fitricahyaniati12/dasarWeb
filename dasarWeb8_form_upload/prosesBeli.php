<?php
if (isset($_POST["beliNovel"]) && isset($_POST["beliBuku"])) {
    setcookie("beliNovel", $_POST["beliNovel"], time() + 3600); 
    setcookie("beliBuku", $_POST["beliBuku"], time() + 3600);   

    header("Location: keranjangBelanja.php");
    exit(); 
}
?>
