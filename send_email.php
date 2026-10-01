<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once __DIR__ . '/vendor/autoload.php';

header('Content-Type: application/json; charset=utf-8');

function respond(int $status, string $message): void
{
    http_response_code($status);
    echo json_encode(['message' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(405, 'Method not allowed.');
}

$mailUsername = getenv('SKIVER_MAIL_USERNAME');
$mailPassword = getenv('SKIVER_MAIL_PASSWORD');
$mailRecipient = getenv('SKIVER_MAIL_TO') ?: $mailUsername;

if (!$mailUsername || !$mailPassword || !$mailRecipient) {
    respond(500, 'Email service is not configured.');
}

$mailer = new PHPMailer(true);

try {
    $mailer->isSMTP();
    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = $mailUsername;
    $mailer->Password = $mailPassword;
    $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mailer->Port = 587;
    $mailer->CharSet = PHPMailer::CHARSET_UTF8;
    $mailer->setFrom($mailUsername, 'Skiver');
    $mailer->addAddress($mailRecipient);
    $mailer->isHTML(true);

    if (($_POST['type'] ?? '') === 'contact') {
        $firstName = trim($_POST['firstname'] ?? '');
        $lastName = trim($_POST['lastname'] ?? '');
        $senderEmail = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
        $subject = trim($_POST['subject'] ?? '');

        if ($firstName === '' || !$senderEmail || $subject === '') {
            respond(400, 'Please provide a name, valid email, and message.');
        }

        $mailer->addReplyTo($senderEmail, trim($firstName . ' ' . $lastName));
        $mailer->Subject = 'Website contact request';
        $mailer->Body = '<b>Name:</b> ' . htmlspecialchars(trim($firstName . ' ' . $lastName), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
            . '<br><b>Email:</b> ' . htmlspecialchars($senderEmail, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
            . '<br><b>Message:</b><br>' . nl2br(htmlspecialchars($subject, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));
        $mailer->AltBody = "Name: $firstName $lastName\nEmail: $senderEmail\n\n$subject";
    } elseif (($_POST['type'] ?? '') === 'order') {
        $mailer->Subject = 'Order Confirmation';
        $mailer->Body = 'Your order has been placed successfully!';
        $mailer->AltBody = 'Your order has been placed successfully!';
    } else {
        respond(400, 'Invalid email request.');
    }

    $mailer->send();
    respond(200, 'Email sent successfully.');
} catch (\Throwable $error) {
    respond(500, 'Email could not be sent.');
}