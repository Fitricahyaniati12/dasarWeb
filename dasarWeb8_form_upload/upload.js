$(document).ready(function() {
    // Menangani perubahan pada input file
    $('#file').change(function() {
        // Jika ada file yang dipilih
        if (this.files.length > 0) {
            $('#upload-button').prop('disabled', false).css('opacity', 1); // Aktifkan tombol
        } else {
            $('#upload-button').prop('disabled', true).css('opacity', 0.5); // Nonaktifkan tombol
        }
    });

    // Menangani submit form
    $('#upload-form').submit(function(e) {
        e.preventDefault(); // Mencegah pengiriman default
        var formData = new FormData(this); // Mengambil data formulir

        $.ajax({
            type: 'POST',
            url: 'upload.php', // Ganti dengan URL PHP yang benar untuk pengolahan file
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#status').html(response); // Tampilkan status unggahan
                $('#upload-button').prop('disabled', true).css('opacity', 0.5); // Nonaktifkan tombol setelah unggah
                $('#file').val(''); // Reset input file
            },
            error: function() {
                $('#status').html('Terjadi kesalahan saat mengunggah file.'); // Tampilkan pesan error
            }
        });
    });
});
