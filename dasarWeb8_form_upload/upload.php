<?php
if (isset($_FILES['file'])) {
    $errors = array();
    $allowed_extensions = array("jpg", "jpeg", "gif", "png", "pdf", "docx");
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (in_array($file_ext, $allowed_extensions) === false) {
        $errors[] = "Ekstensi file tidak diizinkan. Hanya file JPG, JPEG, GIF, PNG, PDF, dan DOCX yang diizinkan.";
    }

    if ($file_size > 2097152) {
        $errors[] = "Ukuran file tidak boleh lebih dari 2 MB.";
    }

    if (empty($errors)) {
        if (move_uploaded_file($file_tmp, "uploads/" . $file_name)) {
            echo "File berhasil diunggah: " . $file_name;
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo implode("<br>", $errors);
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
