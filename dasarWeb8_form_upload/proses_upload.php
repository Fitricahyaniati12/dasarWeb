<?php
$targetDirectory = "uploads/";
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Periksa apakah ada file yang diunggah
if (!empty($_FILES['files']['name'][0])) {
    $totalFiles = count($_FILES['files']['name']); // Menghitung total file yang diunggah

    // Loop melalui semua file yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i]; // Nama file
        $fileTmpName = $_FILES['files']['tmp_name'][$i];
        $targetFile = $targetDirectory . basename($fileName); // Jalur file target
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $allowedExtensions = array("jpg", "jpeg", "png", "gif");

        if (in_array($fileType, $allowedExtensions)) {
         
            if (move_uploaded_file($fileTmpName, $targetFile)) {
                echo "File $fileName berhasil diunggah.<br>";
               
                echo "<img src='$targetFile' width='200' alt='Thumbnail'><br>";
            } else {
                echo "Gagal mengunggah file $fileName.<br>";
            }
        } else {
            echo "Format file $fileName tidak valid (hanya JPG, JPEG, PNG, GIF).<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
