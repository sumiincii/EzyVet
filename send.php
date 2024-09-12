<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ezyvet.neust@gmail.com'; // ur gmail
    $mail->Password = 'qafo swjl yazl jqxq'; //app pass

    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('ezyvet.neust@gmail.com');
    $mail->addAddress($_POST["email"]);
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];

    if ($mail->send()) {
        echo "
        <script>
        alert('sent successfully');
        document.location.href ='';
        </script>
        ";
    } else {
        echo "Error sending email: " . $mail->ErrorInfo;
    }
}
