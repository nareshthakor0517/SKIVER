<?php
session_start();
include('../Fronted/database_connection.php');

// Check if user is logged in
$is_logged_in = isset($_SESSION['cust_username']) && !empty($_SESSION['cust_username']);

if ($is_logged_in) {
    // Fetch user details from the database
    $user_id = $_SESSION['cust_username'];
    $all_data = "SELECT * FROM `customer_table` WHERE `cust_id`='$user_id'";
    $data_pro = mysqli_query($conn, $all_data);
    $user_info = mysqli_fetch_assoc($data_pro);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
 
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
            background-size: 400% 400%;
    animation: gradientAnimation 15s ease infinite;
        }
        .profile-card {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
            position: relative;
            transition: all 0.3s ease;
        }
        .profile-card:hover {
            transform: translateY(-5px); /* Subtle elevation effect */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Enhanced shadow on hover */
        }
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid #4CAF50;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .name {
            font-size: 24px;
            font-weight: 600;
            color: #4CAF50;
        }
        .bio {
            font-size: 16px;
            color: #777;
            margin: 10px 0;
        }
        .info {
            font-size: 14px;
            color: #555;
            margin: 8px 0;
        }
        .buttons {
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin: 5px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
            text-align: center;
        }
        .btn.active {
            background-color: #4CAF50;
            color: white;
        }
        .btn.active:hover {
            background-color: #45a049;
        }
        .btn.inactive {
            background-color: #f44336;
            color: white;
        }
        .btn.inactive:hover {
            background-color: #e53935;
        }
        .btn:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <!-- Display profile details if logged in -->
        <?php if ($is_logged_in): ?>
            <img src="../Fronted/admin_img/user2.avif" alt="Customer Profile" class="profile-img">
            <div class="name"><?php echo htmlspecialchars($user_info['cust_username']); ?></div>
            <div class="bio">Loyal Customer | Shopping Enthusiast</div>
            <div class="info"><strong>📅 Joined: </strong><?php echo date('d M Y', strtotime($user_info['cust_createtime'])); ?></div>
            <div class="info"><strong>📧 Email: </strong><?php echo htmlspecialchars($user_info['cust_email']); ?></div>
            <div class="info"><strong>📞 Mobile: </strong>+<?php echo htmlspecialchars($user_info['cust_mobile']); ?></div>
        <?php else: ?>
            <div class="name">Guest</div>
            <div class="bio">Please login to see your profile details.</div>
        <?php endif; ?>

        <div class="buttons">
            <!-- Home button is active when logged in, inactive when not -->
            <?php if ($is_logged_in): ?>
                <a href="home_page.php" class="btn active">🏠 Home</a>
            <?php else: ?>
                <a href="home_page.php" class="btn inactive">🏠 Home</a>
            <?php endif; ?>
            
            <!-- Log out button is active when logged in -->
            <?php if ($is_logged_in): ?>
                <a href="../Fronted/customer_login.php" class="btn inactive">🚪 Log Out</a>
            <?php else: ?>
                <a href="../Fronted/customer_login.php" class="btn active">🔑 Log In</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
