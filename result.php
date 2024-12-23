<?php
session_start();
if (!isset($_SESSION['nama'])) {
    echo "Data tidak ditemukan.";
    exit;
}

$nama = $_SESSION['nama'];
$nim = $_SESSION['nim'];
$email = $_SESSION['email'];
$umur = $_SESSION['umur'];
$fileContent = $_SESSION['fileContent'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #333;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #000;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #000;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pendaftaran</h2>
        <table>
            <tr>
                <th>Nama</th>
                <td><?= htmlspecialchars($nama) ?></td>
            </tr>
            <tr>
                <th>NIM</th>
                <td><?= htmlspecialchars($nim) ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= htmlspecialchars($email) ?></td>
            </tr>
            <tr>
                <th>Umur</th>
                <td><?= htmlspecialchars($umur) ?></td>
            </tr>
        </table>
        <h3>Isi File:</h3>
        <table>
            <?php foreach ($fileContent as $line) : ?>
            <tr>
                <td><?= htmlspecialchars($line) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <h3>Informasi Browser/Sistem Operasi:</h3>
        <table>
            <tr>
                <th>User Agent</th>
                <td><?= $_SERVER['HTTP_USER_AGENT'] ?></td>
            </tr>
            <tr>
                <th>IP Address</th>
                <td><?= $_SERVER['REMOTE_ADDR'] ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
