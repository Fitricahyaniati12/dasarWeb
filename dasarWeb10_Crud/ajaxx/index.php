<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7Rrh7ud19ahkkpvbG9Sr" crossorigin="anonymous">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <title>Data Anggota</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php" style="color: #fff;">CRUD Dengan Ajax</a>
    </nav>
    <div class="container">
        <h2 align="center" style="margin: 30px;">Data Anggota</h2>
        <form method="post" class="form-data" id="form-data">
            <div class="row">
                <div class="col-sm-9">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="nama" id="nama" class="form-control" required="true">
                        <p class="text-danger" id="err_nama"></p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required="true"> Laki-laki
                        <input type="radio" name="jenis_kelamin" id="jenkel2" value="P"> Perempuan
                        <p class="text-danger" id="err_jenis_kelamin"></p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
                <p class="text-danger" id="err_alamat"></p>
            </div>
            <div class="form-group">
                <label>No Telepon</label>
                <input type="number" name="no_telp" id="no_telp" class="form-control" required="true">
                <p class="text-danger" id="err_no_telp"></p>
            </div>
            <div class="form-group">
                <button type="button" name="simpan" id="simpan" class="btn btn-primary">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>
        </form>
        <hr>
        <div class="data"></div>
    </div>
    <div class="text-center">
        <?php echo date('Y'); ?> Copyright: 
        <a href="https://google.com/">Desain Dan Pemrograman Web</a>
    </div>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Set up CSRF token in headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Load data anggota
            $('.data').load("data.php");

            // Click event for save button
            $("#simpan").click(function() {
                // Get form data
                var data = $('.form-data').serialize();
                var jenkell = document.getElementById("jenkel1").value;
                var jenkel2 = document.getElementById("jenkel2").value;
                var nama = document.getElementById("nama").value;
                var alamat = document.getElementById("alamat").value;
                var no_telp = document.getElementById("no_telp").value;

                // Clear previous error messages
                document.getElementById("err_nama").innerHTML = "";
                document.getElementById("err_alamat").innerHTML = "";
                document.getElementById("err_jenis_kelamin").innerHTML = "";
                document.getElementById("err_no_telp").innerHTML = "";

                // Validation checks
                if (nama == "") {
                    document.getElementById("err_nama").innerHTML = "Nama Harus Diisi";
                }

                if (alamat == "") {
                    document.getElementById("err_alamat").innerHTML = "Alamat Harus Diisi";
                }

                if (document.getElementById("jenkel1").checked == false && document.getElementById("jenkel2").checked == false) {
                    document.getElementById("err_jenis_kelamin").innerHTML = "Jenis Kelamin Harus Dipilih";
                }

                if (no_telp == "") {
                    document.getElementById("err_no_telp").innerHTML = "No Telepon Harus Diisi";
                }

                // If all fields are valid, proceed with AJAX request
                if (nama != "" && alamat != "" && (document.getElementById("jenkel1").checked == true || document.getElementById("jenkel2").checked == true) && no_telp != "") {
                    $.ajax({
                        type: 'POST',
                        url: "form_action.php",
                        data: data,
                        success: function() {
                            // Reload the data and reset the form
                            $('.data').load("data.php");
                            document.getElementById("id").value = "";
                            document.getElementById("form-data").reset();
                        },
                        error: function(response) {
                            console.log(response.responseText);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
