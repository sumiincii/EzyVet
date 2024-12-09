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
            <p> PLEASE COME ON TIME. 5-10mins before of your appointment schedule.Late comers (15mins late) will no longer be accomodated. AVOID BEING LATE if di po aabot sa oras resched nalang po natin dahil may sinusunod po tayong oras.</p>
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
/**
 * Sends a cancellation notification email to the client.
 *
 * @param string $email The recipient's email address.
 * @param string $client_name The recipient's full name.
 * @param string $cancel_reason The reason for the cancellation.
 */
function sendCancellationNotification($email, $client_name, $cancel_reason)
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
        $mail->addAddress($email, $client_name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Appointment Cancellation Notification';
        $mail->Body = "
            <p>Dear $client_name,</p>
            <p>Your appointment has been canceled.</p>
            <p>Thank you for your understanding.</p>
            <p>Best regards,</p>
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
        echo "Mailer Error (Cancellation Notification): {$mail->ErrorInfo}";
    }
}
