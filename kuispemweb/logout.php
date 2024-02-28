<?php
session_start();
session_destroy(); // Menghancurkan semua data sesi
header('Location: login.php'); // Mengarahkan kembali ke halaman login
exit;
?>
