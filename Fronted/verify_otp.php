<?php
session_start();
$conn = mysqli_connect("localhost","root","","skiver");

if(isset($_POST['verify'])) {

    $otp = $_POST['otp'];

    // Check if OTP is correct
    if($otp == $_SESSION['otp']) {
        // Redirect to reset password page
        header('location: reset_password.php');
        exit();
    } else {
        echo "<script>alert('Invalid OTP! Please try again.');window.location='verify_otp.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h4 class="text-center">Verify OTP</h4>
                    <p class="text-center text-muted">Enter the OTP sent to your email</p>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="otp" class="form-label">Enter OTP</label>
                            <input type="text" class="form-control" name="otp" maxlength="6" placeholder="Enter OTP" required>
                        </div>
                        <input type="submit" class="btn btn-primary w-100" value="Verify OTP" name="verify">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
