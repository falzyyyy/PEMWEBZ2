<?php
// Memuat library PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// reset password
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(32));

    if (isset($_POST['reset'])) {
        // Proses reset password
        // Misalnya, menghasilkan link reset password dan menyimpannya di database

        // Membuat instance PHPMailer baru
        $mail = new PHPMailer(true);

        try {
            // Konfigurasi server SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'naufalnazhif3@gmail.com'; // Ganti dengan email Gmail Anda
            $mail->Password = 'nazhifalmaulid'; // Ganti dengan password Gmail Anda
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Mengatur penerima dan pengirim email
            $mail->setFrom('naufalnazhif3@gmail.com', 'Admin Website');
            $mail->addAddress($email); // Ganti dengan email penerima

            // Mengatur isi email
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body    = "Klik link berikut untuk mereset password Anda: <a href='http://yourwebsite.com/reset_password.php?token=$token'>Reset Password</a>";

            // Mengirim email
            if ($mail->send()) {
                echo "<script>alert('Instruksi reset password telah dikirim ke email Anda.');</script>";
            }
        } catch (Exception $e) {
            echo "<script>alert('Email gagal dikirim. PHPMailer Error: " . addslashes($mail->ErrorInfo) . "');</script>";
        }
    }
}
?>
