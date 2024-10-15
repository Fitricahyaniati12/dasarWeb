<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiupload Gambar</title>
</head>
<body>
    <h2>Unggah Banyak Gambar</h2>
    <form action="proses_upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple="multiple" accept=".jpg, .jpeg, .png, .gif" />
        <input type="submit" value="Unggah Gambar" />
    </form>
</body>
</html>
