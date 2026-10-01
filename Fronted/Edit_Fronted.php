<?php
include('admin_header.php');
include('database_connection.php');

$update = $_POST['Cust_Update_id'];

$Select_User_data = "SELECT * FROM `customer_table` where `cust_id`='$update'";
$Select_Update_data = mysqli_query($conn, $Select_User_data);

$User_data = mysqli_fetch_array($Select_Update_data);
?>
<div class="registration-form">
<style>
    .registration-form {
        margin-top: 3%;
        margin-left: 30%;
        background-color: #ffffff;
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
        width: 100%;
        padding: 10px;
        padding-right: 40px; /* Space for the eye icon */
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .form-group input:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 4px rgba(0, 123, 255, 0.2);
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
</style>

<!-- Include Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<h2>Edit Account</h2>
<form action="Edit_Backend.php" method="post">
    <div class="form-group">
        <input type="hidden" name="Update_Cust_Id" value="<?php echo $User_data['cust_id']; ?>">
    </div>

    <div class="form-group">
        <label for="fullname">Username</label>
        <input type="text" id="fullname" name="Update_Cust_Username" value="<?php echo $User_data['cust_username']; ?>" placeholder="Enter your Username" required>
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="Update_Cust_Email" value="<?php echo $User_data['cust_email']; ?>" placeholder="Enter your email" required>
    </div>
    <div class="form-group">
        <label for="mobile">Mobile Number</label>
        <input type="tel" id="mobile" name="Update_Cust_Mobile" value="<?php echo $User_data['cust_mobile']; ?>" placeholder="Enter your mobile number" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="Update_cust_password" value="<?php echo $User_data['cust_password']; ?>" placeholder="Enter your password" required>
        <i class="fas fa-eye toggle-password" id="togglePassword"></i>
    </div>
    <div class="form-group">
        <button type="submit" name="Update_Customer_btn">Update</button>
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

<?php include('admin_footer.php'); ?>
``
