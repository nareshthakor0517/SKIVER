<?php

include('admin_header.php');
include('database_connection.php');

$update = $_POST['Cover_Update_id'];

$Select_User_data = "SELECT * FROM `add_cover_table` where `cover_id`='$update'";
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
    <h2>Edit a Cover</h2>
    <form action="Edit_Cover_Backend.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="Update_cover_Id" value="<?php echo $User_data['cover_id']; ?>">
        </div>
        <?php if (!empty($User_data['cover_img'])): ?>
                            <center><div class="form-group">
                                <label>Your Image</label>
                                <img src="../Home_page/Cover_Img/<?php echo $User_data['cover_img']; ?>"
                                    alt="Image" class="img-thumbnail" style="width: 200px; height: auto;">
                            </div></center>
                            <?php endif; ?>
        <div class="mb-3">
            <label for="cover_name" class="form-label">Cover Name</label>
            <input type="text" class="form-control" id="cover_name" name="Update_cover_name"
                value="<?php echo $User_data['cover_name']; ?>" placeholder="Enter cover name" required>
        </div>
        <div class="mb-3">
            <label for="cover_description" class="form-label">Description</label>
            <textarea class="form-control" id="cover_description" name="Update_cover_description" rows="4"
                value="" placeholder="Enter description" required><?php echo $User_data['cover_discri']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="cover_price" class="form-label">Price</label>
            <input type="number" class="form-control" id="cover_price" name="Update_cover_price" step="0.01"
                value="<?php echo $User_data['cover_price']; ?>" placeholder="Enter price" required>
        </div>
        <div class="form-group">
            <button type="submit" name="Cover_Update_btn" class="btn btn-primary w-100">Edit Cover</button>
        </div>
    </form>
</div>

<?php include('admin_footer.php');?>

