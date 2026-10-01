<?php

include('admin_header.php');
include('database_connection.php');

$update = $_POST['Model_Update_id'];

$Select_User_data = "SELECT * FROM `model` where `model_id`='$update'";
$Select_Update_data = mysqli_query($conn,$Select_User_data);

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
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
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
    </style>

    <h2>Add Model</h2>
    <form action="Edit_Model_Backend.php" method="post">
        <div class="form-group">
         <input type="text" name="Update_Model_Id" value="<?php echo $User_data['model_id']; ?>">
            <label for="model_name">Model</label>
            <input type="text" id="Update_model_name" name="Update_Model_name" value="<?php echo $User_data['model_name']; ?>" placeholder="Enter your Model" required>
        </div>
        <div class="form-group">
            <button type="submit" name="Model_Update_btn" class="btn btn-primary">Add Model</button>
        </div>
    </form>

</div>

<?php include('admin_footer.php');?>

