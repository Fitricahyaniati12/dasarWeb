<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah File Dokumen</title>
</head>
<body>
    <h2>Unggah File Dokumen dengan AJAX</h2>
    <form id="upload-form" action="upload_ajax.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file" required>
        <input type="submit" name="submit" value="Unggah">
    </form>

    <div id="status"></div> <!-- Status upload akan ditampilkan di sini -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Script AJAX untuk pengunggahan -->
    <script src="upload.js"></script>
</body>
</html>
