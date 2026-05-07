<?php
// Linking the manual files
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $mail = new PHPMailer(true);

    try {
        // Gmail Settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'krantipariyar574388@gmail.com'; // Your Gmail
        $mail->Password   = 'wmjs qxjx eppa hckd';       // Use App Password from Step 4
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender & Receiver
        $mail->setFrom('krantipariyar574388@gmail.com', 'Portfolio Bot');
        $mail->addAddress('krantipariyar574388@gmail.com'); 

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = 'New Portfolio Message from ' . $_POST['name'];
        $mail->Body    = "<b>Name:</b> {$_POST['name']}<br>
                          <b>Email:</b> {$_POST['email']}<br>
                          <b>Message:</b> {$_POST['message']}";

        if($mail->send()) {
    // Message pathayepachhi index.html ma success status pathaune
    header("Location: index.html?status=success#contact");
    exit();
} else {
    header("Location: index.html?status=error#contact");
    exit();
}
    } catch (Exception $e) {
        echo "<h1>Error! Message could not be sent.</h1>";
        echo "<p>Mailer Error: {$mail->ErrorInfo}</p>";
    }
}
?>