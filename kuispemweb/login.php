<?php
session_start();
include 'config.php'; // File konfigurasi database

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if(password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        if($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
    } else {
        echo "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <form action="login.php" method="post">
            <h2>Login</h2>
            <div class="input-group">
                <input type="text" name="username" required placeholder="Username">
            </div>
            <div class="input-group">
                <input type="password" name="password" required placeholder="Password">
            </div>
            <div class="input-group">
                <button type="submit" name="login">Login</button>
            </div>
            <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
            <p>Lupa password? <a href="forgot_password.php">Reset di sini</a></p>
        </form>
    </div>
</body>
</html>
