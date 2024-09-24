<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informasi Dosen</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        h2 {
            text-align: center;
        }
    </style>
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
