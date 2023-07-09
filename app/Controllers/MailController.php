<?php

use PHPMailer\PHPMailer\PHPMailer;

class MailController {
    public function sendMail($to, $subject, $message) {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.sendgrid.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'apikey';
        $mail->Password = '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';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        try {
            $mail->setFrom('ccabarcasp@gmail.com', 'Virtual Wallet');
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