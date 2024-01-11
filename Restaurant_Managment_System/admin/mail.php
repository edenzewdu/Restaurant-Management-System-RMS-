<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require_once '../vendor/autoload.php';

// Function to send reservation approval email
function sendReservationApprovalEmail($email, $lname)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // SMTP server
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'example.com';                // SMTP username
        $mail->Password   = 'password';                   // SMTP password
        $mail->SMTPSecure = 'tls';          // Enable TLS encryption
        $mail->Port       = 465;                                    // TCP port to connect to
        $mail->SMTPAutoTLS = false;

        // Recipients
        $mail->setFrom('example.com', 'Restaurant_Reservation');
        $mail->addAddress($email, $lname);                          // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Reservation Approved';
        $mail->Body    = "Dear $lname,<br><br>Your reservation has been approved. We look forward to welcoming you to our restaurant.<br><br>Regards,<br>Your Restaurant";

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Function to send reservation rejection email
function sendReservationRejectionEmail($email, $lname, $reason)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // SMTP server
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'example.com';                // SMTP username
        $mail->Password   = 'password';                   // SMTP password
        $mail->SMTPSecure = 'tls';          // Enable TLS encryption
        $mail->Port       = 465;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('example.com', 'Restaurant_Reservation');
        $mail->addAddress($email, $lname);                          // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Reservation Rejected';
        $mail->Body    = "Dear $lname,<br><br>We regret to inform you that your reservation has been rejected.<br><br>Reason for Rejection: $reason<br><br>Please contact us for further information.<br><br>Regards,<br>Your Restaurant";
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}