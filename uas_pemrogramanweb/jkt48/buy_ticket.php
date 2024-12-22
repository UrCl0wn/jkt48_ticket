<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Ticket</title>
    <style>
                /* Gaya Umum */
/* Gaya Umum */
body {
    font-family: Arial, sans-serif;
    background-color: #f8d7da; /* Latar belakang merah muda */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Gaya untuk kontainer utama */
.container {
    text-align: center;
    background-color: #fff; /* Latar belakang putih */
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 100%;
}

/* Gaya untuk pesan */
.container h1 {
    font-size: 24px;
    color: #dc3545; /* Merah pekat */
    margin-bottom: 20px;
    font-weight: bold;
}

/* Tombol kembali */
.container a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #dc3545; /* Warna merah */
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    text-transform: uppercase;
    transition: background-color 0.3s;
}

.container a:hover {
    background-color: #a71d2a; /* Merah lebih gelap saat hover */
}

</style>
</head>
<body class="message-container">
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

$ticket_id = $_GET['id'];

// Periksa tiket tersedia
$stmt = $conn->prepare('SELECT available_tickets FROM tickets WHERE id = ?');
$stmt->bind_param('i', $ticket_id);
$stmt->execute();
$stmt->bind_result($available_tickets);
$stmt->fetch();
$stmt->close();

if ($available_tickets > 0) {
    // Kurangi tiket
    $stmt = $conn->prepare('UPDATE tickets SET available_tickets = available_tickets - 1 WHERE id = ?');
    $stmt->bind_param('i', $ticket_id);
    $stmt->execute();
    $stmt->close();
    echo 'Tiket berhasil dibeli!';
} else {
    echo 'Tiket sudah habis!';
}

$conn->close();
?>
</body>
</html>
