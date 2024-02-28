<?php
include 'config.php'; // File konfigurasi database

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();

    if($stmt->affected_rows > 0) {
        echo "Registrasi berhasil!";
    } else {
        echo "Username atau email sudah digunakan!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="register-container">
        <form action="register.php" method="post">
            <h2>Registrasi</h2>
            <div class="input-group">
                <input type="text" name="username" required placeholder="Username">
            </div>
            <div class="input-group">
                <input type="email" name="email" required placeholder="Email">
            </div>
            <div class="input-group">
                <input type="password" name="password" required placeholder="Password">
            </div>
            <div class="input-group">
                <button type="submit" name="register">Daftar</button>
            </div>
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </form>
    </div>
</body>
</html>
