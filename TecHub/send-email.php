<?php 
include 'db_conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.freesmtpservers.com';
$mail->SMTPAuth = true;
$mail->Username = 'pasindurangana1@gmail.com';
$mail->Password = '';
$mail->SMTPSecure = 'tls';
$mail->Port = 25;

$subject = "Hi testing 1";
$message = "hello bye";


$mail->setFrom('ranganapasindu123@gmail.com', 'PR');
$mail->Subject = $subject;
$mail->Body = $message;
$mail->IsHTML(true);

$to_email_query = "SELECT Email FROM techofficer";
$to_email_query_run = mysqli_query($conn, $to_email_query);

while ($row = mysqli_fetch_assoc($to_email_query_run)) {
    $recipientEmail = $row["Email"];
    $mail->addAddress($recipientEmail);

    // Send the email
    if (!$mail->send()) {
        echo "Error sending email to: " . $recipientEmail . "<br>";
    } else {
        echo "Email sent to: " . $recipientEmail . "<br>";
    }

    // Clear addresses for the next email
    $mail->clearAddresses();
}


// header("Location: customer-home.php");
?>