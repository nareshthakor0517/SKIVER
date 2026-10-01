<?php

   include('database_connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ecommerce</title>
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
            background: linear-gradient(135deg, #00bcd4, #8e2de2);
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: 400% 400%;
            animation: gradientAnimation 5s ease infinite;
        }
        .login-container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button.btn {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button.btn:hover {
            background-color: #218838;
        }
        .form-footer {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
        }
        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
            .form-group .toggle-password {
        position: absolute;
        
        top: 70%;
        right: 15px;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 18px;
        color: #888;
        transition: color 0.3s ease;
    }

    .form-group .toggle-password:hover {
        color: #007bff;
    }

    </style>
</head>
<body>
    <div class="login-container">
        <h1>User Login</h1>
        <hr width="200px">
        <br>
        <form action="customer_login_backend.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>
            <div class="form-group">
                <button type="submit" name="login_btn" class="btn">Login</button>
            </div>
            <div class="form-footer">
                <p>Don't have an account? <a href="customer_registration.php">Register here</a></p>
                <p><a href="forgot_password.php">Forgot Password?</a></p>
            </div>
        </form>
    </div>

    <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        // Toggle password visibility
        const type = passwordField.type === 'password' ? 'text' : 'password';
        passwordField.type = type;

        // Toggle eye icon class
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>


</body>
</html>