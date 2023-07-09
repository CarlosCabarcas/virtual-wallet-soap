<?php

use PHPMailer\PHPMailer\PHPMailer;

class MailController {
    public function sendMail($to, $subject, $message) {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USER'];
        $mail->Password = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = $_ENV['SMTP_PORT'];
        try {
            $mail->setFrom($_ENV['SMTP_FROM'], 'Virtual Wallet');
            $mail->addAddress($to, 'Test Recipient');
            $mail->isHTML(true); 
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send();
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }
}