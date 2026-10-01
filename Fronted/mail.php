<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/autoload.php';

session_start();
$conn = mysqli_connect("localhost","root","","skiver");

if(isset($_POST['submit'])) {

    $email = $_POST['email'];

    // Check if email exists in the database
    $check_email = "SELECT * FROM customer_table WHERE cust_email='$email'";
    $result = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;

        // Generate Random 6 Digit OTP
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;

        // Send OTP via PHPMailer
        $mailUsername = getenv('SKIVER_MAIL_USERNAME');
        $mailPassword = getenv('SKIVER_MAIL_PASSWORD');

        if (!$mailUsername || !$mailPassword) {
            http_response_code(500);
            exit('Email service is not configured.');
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $mailUsername;
            $mail->Password   = $mailPassword;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom($mailUsername, 'Skiver');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset OTP';
            $mail->Body    = "Your OTP for resetting password is: <b>$otp</b>";

            $mail->send();
            
            // Redirect to verify_otp.php
            header('location: verify_otp.php');
            exit();

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } else {
        echo "<script>alert('Email does not exist in our record!');window.location='forgot_password.php';</script>";
    }
}
?>
