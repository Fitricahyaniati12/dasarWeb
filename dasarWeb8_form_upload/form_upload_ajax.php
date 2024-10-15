<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah File Gambar</title>
</head>
<body>
    <h2>Unggah File Gambar</h2>
    <form id="upload-form" action="upload_ajax.php" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" id="file" multiple required> <!-- Mengizinkan beberapa file -->
        <input type="submit" name="submit" value="Unggah Gambar">
    </form>
    <div id="status"></div> <!-- Status upload akan ditampilkan di sini -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#upload-form").submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman form biasa

                var formData = new FormData(this); // Mengambil data dari form

                $.ajax({
                    type: 'POST',
                    url: 'upload_ajax.php', // URL ke file PHP
                    data: formData,
                    cache: false,
                    contentType: false, // Jangan set contentType
                    processData: false, // Jangan proses data
                    success: function(response) {
                        $("#status").html(response); // Tampilkan respon dari server
                    },
                    error: function() {
                        $('#status').html('Terjadi kesalahan saat mengunggah file.'); // Tampilkan pesan kesalahan
                    }
                });
            });
        });
    </script>
</body>
</html>
