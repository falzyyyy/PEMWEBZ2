<?php
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'user') {
    header("Location: login.php");
    exit;
}

// Kode untuk menampilkan dashboard user
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Dashboard User</h1>
        <!-- Konten dashboard user di sini -->
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
