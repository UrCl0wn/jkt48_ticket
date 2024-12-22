<?php
// Aktifkan laporan error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'jkt48_ticket');

// Cek koneksi
if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}

// Data user baru
$email = 'admin@jkt48.com';
$password = 'admin123'; // password asli
$password_hash = password_hash($password, PASSWORD_BCRYPT);

// Menyimpan user ke database
$stmt = $conn->prepare('INSERT INTO users (email, password_hash) VALUES (?, ?)');
if (!$stmt) {
    die('Prepare statement gagal: ' . $conn->error);
}

$stmt->bind_param('ss', $email, $password_hash);

if ($stmt->execute()) {
    echo 'User berhasil dibuat.';
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>
