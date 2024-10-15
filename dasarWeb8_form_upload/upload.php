<?php
if (isset($_POST["submit"])) {
    $targetdir = "uploads/"; // Direktori tujuan untuk menyimpan file
    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);
    $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

    // Ekstensi file yang diizinkan
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    
    $maxsize = 5 * 1024 * 1024;

    // Periksa apakah file valid (ekstensi dan ukuran)
    if (in_array($fileType, $allowedExtensions) && $_FILES["myfile"]["size"] <= $maxsize) {
        // Coba memindahkan file ke folder target
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)) {
            echo "File berhasil diunggah.<br>";

            echo "<img src='$targetfile' width='200' alt='Thumbnail'><br>";
        } else {
            echo "Gagal mengunggah file.";
        }
    } else {
        echo "File tidak valid atau melebihi ukuran maksimum yang diizinkan.";
    }
}
?>
