<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input dengan Validasi</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</head>
<body>
    <h1>Form Input dengan Validasi</h1>
    <form id="myForm" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama">
        <span id="nama-error" class="error"></span><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">
        <span id="email-error" class="error"></span><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <span id="password-error" class="error"></span><br>

        <input type="submit" value="Submit">
    </form>

    <div id="result"></div>

    <script>
    $(document).ready(function() {
        $("#myForm").submit(function(event) {
            event.preventDefault(); // Prevent default form submission

            var nama = $("#nama").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var valid = true;

            // Reset error messages
            $("#nama-error").text("");
            $("#email-error").text("");
            $("#password-error").text("");

            // Validate Nama
            if (nama === "") {
                $("#nama-error").text("Nama harus diisi.");
                valid = false;
            }

            // Validate Email
            if (email === "") {
                $("#email-error").text("Email harus diisi.");
                valid = false;
            } else if (!validateEmail(email)) {
                $("#email-error").text("Format email tidak valid.");
                valid = false;
            }

            // Validate Password
            if (password.length < 8) {
                $("#password-error").text("Password harus terdiri dari minimal 8 karakter.");
                valid = false;
            }

            // If all validations pass, submit the form via AJAX
            if (valid) {
                $.ajax({
                    url: "proses_validasi.php",
                    type: "POST",
                    data: {nama: nama, email: email, password: password},
                    success: function(response) {
                        $("#result").html(response);
                    }
                });
            }
        });

        // Function to validate email format
        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }
    });
    </script>
</body>
</html>