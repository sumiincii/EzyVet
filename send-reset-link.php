<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    include 'connection.php';

    // Check if the user exists
    $query = "SELECT id FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch the user ID
        $user = $result->fetch_assoc();
        $user_id = $user['id'];

        // Generate a password reset token
        $token = bin2hex(random_bytes(16));

        // Insert the token into the password_recovery table
        $query = "INSERT INTO password_recovery (user_id, token) VALUES ('$user_id', '$token')";
        $conn->query($query);

        // Send the password reset link to the user's email
        $reset_link = "http://yourdomain.com/reset-password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Click the link to reset your password: $reset_link";

        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->SMTPDebug = 2; // Enable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ezyvet.neust@gmail.com'; // Your Gmail
            $mail->Password = 'oiem ddmg sfnr hhbz'; // Your app password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;


            // Recipients
            $mail->setFrom('ezyvet.neust@gmail.com', 'EzyVet');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->send();
            echo "Password reset link sent to your email.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "User not found.";
    }

    $conn->close();
}
