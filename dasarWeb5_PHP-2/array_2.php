<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informasi Dosen</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Link to external CSS file -->
</head>
<body>
<h2>Data Dosen</h2>
<table>
    <tr>
        <th>Nama</th>
        <th>Domisili</th>
        <th>Jenis Kelamin</th>
    </tr>
    <tr>
        <?php
        $Dosen = [
            'nama' => 'Elok Nur Hamdana',
            'domisili' => 'Malang',
            'jenis kelamin' => 'Perempuan'
        ];

        echo "<td>{$Dosen['nama']}</td>";
        echo "<td>{$Dosen['domisili']}</td>";
        echo "<td>{$Dosen['jenis kelamin']}</td>";
        ?>
    </tr>
</table>
</body>
</html>
