<?php
// PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

/**
 * Sends an appointment confirmation email to the client.
 *
 * @param string $email The recipient's email address.
 * @param string $fullname The recipient's full name.
 * @param int $queue_number The queue number assigned to the client.
 */
function sendConfirmationEmail($email, $fullname, $queue_number, $appointment_details)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ezyvet.neust@gmail.com'; // your gmail
        $mail->Password = 'gjyk hyze xust szfv'; // app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('ezyvet.neust@gmail.com', 'EzyVet'); // Replace with your email
        $mail->addAddress($email, $fullname);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Appointment Confirmation';
        $mail->Body = "
            <p>Dear $fullname,</p>
            <p>Thank you for booking an appointment with us!</p>
            <p>Your queue number is <strong>$queue_number</strong>.</p>
            <p>Appointment Details: <strong>$appointment_details</strong></p>
            <p>We look forward to seeing you and your pet!</p>
            <p>Thank you,</p>
            <p>Veterinary Clinic Team</p>
        ";

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->send();
    } catch (Exception $e) {
        echo "Mailer Error (Confirmation): {$mail->ErrorInfo}";
    }
}


/**
 * Sends a notification email to the next client in the queue.
 *
 * @param string $email The recipient's email address.
 * @param string $fullname The recipient's full name.
 * @param int $queue_number The queue number assigned to the client.
 */
function sendNotification($email, $fullname, $queue_number)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ezyvet.neust@gmail.com'; // your gmail
        $mail->Password = 'gjyk hyze xust szfv'; // app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('ezyvet.neust@gmail.com', 'EzyVet'); // Replace with your email
        $mail->addAddress($email, $fullname);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Appointment Notification';
        $mail->Body = "
            <p>Dear $fullname,</p>
            <p>Your appointment queue number <strong>$queue_number</strong> is almost ready.</p>
            <p>Please prepare for your appointment and arrive on time.</p>
            <p>Thank you,</p>
            <p>Veterinary Clinic Team</p>
        ";

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->send();
    } catch (Exception $e) {
        echo "Mailer Error (Notification): {$mail->ErrorInfo}";
    }
}
