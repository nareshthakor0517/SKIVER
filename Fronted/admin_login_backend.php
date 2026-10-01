<?php
session_start(); // Start session for user data storage
include('database_connection.php');

// Check if form is submitted
if (isset($_POST['login_btn'])) {

    // echo "usytgfcyusdgcds";
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // Query to check for admin credentials
    $admin_query = "SELECT * FROM admin_table WHERE `admin_username`='$username' AND `admin_password`='$password'";
    $admin_result = mysqli_query($conn, $admin_query);

        $admin_data = mysqli_fetch_assoc($admin_result);
        if($admin_data)
        {
            echo "success"; 
            $_SESSION['admin_username'] = $username;
            header('Location:admin_pannel.php'); // Redirect to admin panel
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


