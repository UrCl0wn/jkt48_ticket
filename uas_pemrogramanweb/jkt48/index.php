<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - JKT48 Official Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #d60000;
            color: white;
            padding: 10px 20px;
        }
        .header h1 {
            margin: 0;
        }
        .menu {
            background-color: #d60000;
            overflow: hidden;
        }
        .menu a {
            float: left;
            color: white;
            text-decoration: none;
            padding: 14px 16px;
            display: block;
        }
        .menu a:hover {
            background-color: #f44336;
        }
        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .news {
            flex: 1;
            margin-right: 20px;
        }
        .news h2 {
            background-color: #ffb6c1;
            padding: 10px;
        }
        .news ul {
            list-style: none;
            padding: 0;
        }
        .news ul li {
            margin-bottom: 10px;
        }
        .news ul li a {
            text-decoration: none;
            color: #d60000;
        }
        .news ul li a:hover {
            text-decoration: underline;
        }
        .login {
            flex: 1;
        }
        .login h2 {
            background-color: #ffb6c1;
            padding: 10px;
        }
        .login form {
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .login form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .login form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .login form button {
            width: 100%;
            padding: 10px;
            background-color: #d60000;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .login form button:hover {
            background-color: #f44336;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #d60000;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>JKT48 Official Website</h1>
</div>

<div class="menu">
    <a href="#">NEWS</a>
    <a href="#">SCHEDULE</a>
    <a href="#">MEMBER</a>
    <a href="#">THEATER</a>
    <a href="#">JKT48 POINTS</a>
    <a href="#">SHOP</a>
    <a href="#">FANCLUB</a>
</div>

<div class="container">
    <div class="news">
        <h2>News</h2>
        <ul>
            <li><a href="#">Pengumuman Mengenai Akun Media Sosial Member JKT48 Generasi 13</a> <br>20 Desember 2024</li>
            <li><a href="#">Pengumuman Mengenai Kegiatan Flora Shafiq</a> <br>20 Desember 2024</li>
            <li><a href="#">Pengumuman tentang Callista Alifia</a> <br>20 Desember 2024</li>
            <li><a href="#">Pengumuman Mengenai Pertunjukan Terakhir "Tunas di Balik Seragam" oleh JKT48</a> <br>16 Desember 2024</li>
        </ul>
    </div>

    <div class="login">
        <h2>Login</h2>
        <form action="process_login.php" method="POST">
            <label for="email">Alamat Email*</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Kata Sandi*</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <p><a href="#">Lupa password?</a></p>
        <p><a href="#">Bagi yang pertama kali</a></p>
    </div>
</div>

<div class="footer">
    <p>&copy; 2024 JKT48 Official Website</p>
</div>

</body>
</html>
