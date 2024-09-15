<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);
    // Enable SMTP debugging (set to 2 for detailed output)
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ezyvet.neust@gmail.com'; // your gmail
    $mail->Password = 'gjyk hyze xust szfv'; // app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465; // can Use port 587 instead of 465
    $mail->setFrom('ezyvet.neust@gmail.com');
    $mail->addAddress($_POST["email"]);
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    try {
        if ($mail->send()) {
            echo "
            <script>
            alert('sent successfully');
            document.location.href ='index.php';
            </script>
            ";
        }
    } catch (Exception $e) {
        echo "Error sending email: " . $mail->ErrorInfo;
    }
}
