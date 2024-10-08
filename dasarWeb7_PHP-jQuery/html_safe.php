<!DOCTYPE html>
<html>
<head>
    <title>HTML Safe Input</title>
</head>
<body>
    <h2>Form Input yang Aman</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="input">Input: </label>
        <input type="text" name="input" id="input" required>
        <br><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Step 2: Mengambil dan mengamankan input
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['input'];
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        // Menampilkan input yang aman
        echo "<h3>Input yang Aman:</h3>";
        echo $input;

        // Step 3: Memeriksa apakah input adalah email yang valid
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Lanjutkan dengan pengolahan email yang aman
            echo "<br>Email valid: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        } else {
            // Tangani input yang tidak valid
            echo "<br>Email tidak valid!";
        }
    }
    ?>
</body>
</html>
