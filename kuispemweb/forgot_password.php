

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="forgot-password-container">
        <form action="forgot_password.php" method="post">
            <h2>Lupa Password</h2>
            <div class="input-group">
                <input type="email" name="email" required placeholder="Email">
            </div>
            <div class="input-group">
                <button type="submit" name="reset">Reset Password</button>
            </div>
        </form>
    </div>
</body>
</html>
