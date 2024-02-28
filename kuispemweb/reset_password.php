<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="reset-password-container">
        <form action="reset_password.php" method="post">
            <h2>Reset Password</h2>
            <div class="input-group">
                <input type="password" name="new_password" required placeholder="Password Baru">
            </div>
            <div class="input-group">
                <input type="password" name="confirm_new_password" required placeholder="Konfirmasi Password Baru">
            </div>
            <div class="input-group">
                <button type="submit" name="submit">Reset Password</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];
    $token = $_GET['token'];
    // Cek apakah token valid dan belum kadaluwarsa
    // Jika valid, cek apakah password baru dan konfirmasi password cocok
    // Jika cocok, update password di database
}
?>

