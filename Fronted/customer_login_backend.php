<?php
session_start(); // Start session for user data storage
include('database_connection.php');

// Check if form is submitted
if (isset($_POST['login_btn'])) {

    // echo "usytgfcyusdgcds";
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // Query to check for admin credentials
    $admin_query = "SELECT * FROM `customer_table` WHERE `cust_username`='$username' AND `cust_password`='$password'";
    $admin_result = mysqli_query($conn, $admin_query);

        $admin_data = mysqli_fetch_assoc($admin_result);
        if($admin_data)
        {
            echo "success"; 
            $_SESSION['cust_username'] = $admin_data['cust_id'];
            // $_SESSION['cust_username'] = $username;
            header('Location:../Home_page/home_page.php'); // Redirect to admin panel
            // exit();
        }
        else
        {
            // echo "fails";
            echo "<script>alert('login proccess Fails  !!!!')</script>";
            // header("location:admin_login.php");
        }
      
}


?>


