<?php
session_start();
// Koneksi ke database
$db = new mysqli('localhost', 'root', '', 'nama_database');

// Cek koneksi
if ($db->connect_error) {
    die("Koneksi gagal: " . $db->connect_error);
}

// Proses ganti password
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
    $username = $_SESSION['username'];

    // Cek password lama
    $query = "SELECT password FROM users WHERE username = '$username'";
    $result = $db->query($query);
    $user = $result->fetch_assoc();

    if (password_verify($current_password, $user['password'])) {
        // Update password baru
        $update_query = "UPDATE users SET password='$new_password' WHERE username='$username'";
        $db->query($update_query);

        echo "Password berhasil diubah.";
    } else {
        echo "Password lama salah!";
    }
}

$db->close();
?>
