<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'jkt48_ticket');

if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}

// Ambil data tiket
$result = $conn->query('SELECT * FROM tickets');

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Pembelian Tiket</title>
    <link rel="stylesheet" type="style/css" href="http://localhost/uas_pemrogramanweb/jkt48/style.css">
    <style>
        /* Gaya Umum */
body {
    font-family: Arial, sans-serif;
    background-color:rgb(243, 226, 226);
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #333;
    margin-top: 20px;
}

/* Gaya untuk tabel */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #ff4c4c;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #f1c1c1;
    cursor: pointer;
}

/* Gaya untuk link */
a {
    text-decoration: none;
    color: #ff4c4c;
    font-weight: bold;
    transition: color 0.3s;
}

a:hover {
    color: #d32f2f;
}

/* Gaya untuk tombol logout */
.logout {
    display: block;
    text-align: center;
    margin: 20px auto;
    padding: 10px 20px;
    width: 100px;
    background-color: #ff4c4c;
    color: #fff;
    text-transform: uppercase;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.logout:hover {
    background-color: #d32f2f;
}

        </style>
</head>
<body>
    <img src="./konser.jpeg" alt="konser" width="100%" height="800"/>
    <h1>Selamat datang di Dashboard Pembelian Tiket</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Acara</th>
            <th>Tanggal</th>
            <th>Harga</th>
            <th>Tiket Tersedia</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['event_name'] ?></td>
            <td><?= $row['date'] ?></td>
            <td>Rp<?= number_format($row['price'], 0, ',', '.') ?></td>
            <td><?= $row['available_tickets'] ?></td>
            <td><a href="buy_ticket.php?id=<?= $row['id'] ?>">Beli</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a class="logout" href="logout.php">Logout</a>
</body>
</html>
