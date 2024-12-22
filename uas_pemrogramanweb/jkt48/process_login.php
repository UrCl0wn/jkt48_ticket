<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'jkt48_ticket');

// Cek koneksi
if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Periksa user di database
    $stmt = $conn->prepare('SELECT id, password_hash FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $password_hash);
        $stmt->fetch();

        if ($password == $password_hash) {
            $_SESSION['user_id'] = $user_id;
            header('Location: dashboard.php');
            exit;
        } else {
            echo 'Kata sandi salah.';
        }
    } else {
        echo 'Email tidak ditemukan.';
    }
    $stmt->close();
}
$conn->close();
?>
