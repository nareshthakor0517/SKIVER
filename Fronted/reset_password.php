<?php
session_start();
include('database_connection.php');

// Check if OTP was verified and Email Exists
if(!isset($_SESSION['otp']) || !isset($_SESSION['email'])){
    echo "<script>alert('Unauthorized Access!'); window.location='forgot_password.php';</script>";
    exit();
}

if(isset($_POST['reset_btn'])){
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_SESSION['email'];

    // ✅ Password Match Check
    if($password != $confirm_password){
        echo "<script>alert('Passwords do not match. Try Again!');</script>";
    }else{
        // ✅ Direct Update the Password Without Encryption
        $update_query = "UPDATE customer_table SET cust_password='$password' WHERE cust_email='$email'";
        $result = mysqli_query($conn, $update_query);

        if($result){
            // ✅ Session Clear and Redirect to Login Page
            session_unset();
            session_destroy();
            echo "<script>alert('Password Updated Successfully! Please Login Now.'); window.location='customer_login.php';</script>";
            exit();
        }else{
            echo "<script>alert('Failed to Update Password. Try Again!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
                    <h4 class="text-center">Reset Password</h4>
                    <p class="text-center text-muted">Enter your new password</p>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter new password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm new password" required>
                        </div>
                        <input type="submit" class="btn btn-primary w-100" name="reset_btn" value="Reset Password">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
