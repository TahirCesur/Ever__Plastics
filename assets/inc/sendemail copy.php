<?php

// Define some constants
define("RECIPIENT_NAME", "Ever Plastics");
define("RECIPIENT_EMAIL", "info@everplastics.com");

// Read the form values
$name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : "";
$senderEmail = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : "";
$phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : "";
$subject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : "";
$message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : "";

$mail_subject = 'Contact request sent by ' . $name;

$body = 'Name: ' . $name . "\r\n";
$body .= 'Email: ' . $senderEmail . "\r\n";
if ($phone) {
    $body .= 'Phone: ' . $phone . "\r\n";
}
if ($subject) {
    $body .= 'Subject: ' . $subject . "\r\n";
}
$body .= 'Message: ' . "\r\n" . $message;

// Set headers
$recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
$headers = "From: " . $name . " <" . $senderEmail . ">\r\n";
$headers .= "Reply-To: " . $senderEmail . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send the email
if ($name && $senderEmail && $message) {
    $success = mail($recipient, $mail_subject, $body, $headers);
    if ($success) {
        echo "<div class='inner success'><p class='success'>Thank you for contacting us. We will get back to you as soon as possible!</p></div>";
    } else {
        echo "<div class='inner error'><p class='error'>Message delivery failed. Please try again later.</p></div>";
    }
} else {
    echo "<div class='inner error'><p class='error'>Please fill out all required fields.</p></div>";
}
?>