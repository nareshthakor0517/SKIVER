<?php
   include('database_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <!-- Font Awesome Integration -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @keyframes gradientAnimation {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
        
        body {
            background: linear-gradient(135deg, #00bcd4, #8e2de2, #ff9800, #4caf50, #f44336, #3f51b5, #9c27b0);
            font-family: Arial, sans-serif;
            background-color:rgb(244, 244, 249);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
        }

        .registration-form {
            background-color:rgba(255, 255, 255, 0.7);  /
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .registration-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 96%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.2);
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .form-footer {
            text-align: center;
            margin-top: 15px;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .toggle-password {
            position: absolute;
            top: 70%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #888;
            transition: color 0.3s ease;
        }

        .toggle-password:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="registration-form">
        <h2>Create Account</h2>
        <form action="customer_registration_backend.php" method="POST">
            <div class="form-group">
                <label for="fullname">Username</label>
                <input type="text" id="fullname" name="Cust_Username" placeholder="Enter your Username" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="Cust_Email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number</label>
                <input type="text" id="mobile" name="Cust_Mobile" maxlength="10" placeholder="Enter your mobile number" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="cust_password" placeholder="Enter your password" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>
            <div class="form-group">
                <button type="submit" name="Regi_btn">Register</button>
            </div>
        </form>
        <div class="form-footer">
            <p>Already have an account? <a href="customer_login.php">Login here</a></p>
        </div>
    </div>
    <script>
        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            // Toggle password visibility
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            // Toggle the eye icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
