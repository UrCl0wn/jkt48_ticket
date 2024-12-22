<form method="POST" action="login.php">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit" name="login">Login</button>
</form>
<?php
// Include koneksi database
include 'config/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cari pengguna berdasarkan email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Periksa apakah pengguna ditemukan dan password cocok
    if ($user && password_verify($password, $user['password_hash'])) {
        session_start(); // Mulai sesi
        $_SESSION['user_id'] = $user['id']; // Simpan ID pengguna di sesi
        header("Location: dashboard.php");
    exit();
} else {
    echo "Email atau password salah!";
}
}
?>
