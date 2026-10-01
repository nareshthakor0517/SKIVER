<?php
   include('database_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Font Awesome Integration -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            position: relative;
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
        .toggle-password {
            position: absolute;
            top: 70%;
            right: 5px;
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
    <div class="login-container">
        <h1>Admin Login</h1>
        <form action="admin_login_backend.php" method="POST">
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
        </form>
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
