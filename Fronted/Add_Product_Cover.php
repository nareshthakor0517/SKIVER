<?php 
include('admin_header.php');
?>

<div class="registration-form">
<style>
       
        .registration-form {
            margin-top: 3%;
            margin-left: 30% ;
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
     <h2>Add a New Cover</h2>
        <form action="Add_Product_Cover_Backend.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="cover_name" class="form-label">Cover Name</label>
                <input type="text" class="form-control" id="cover_name" name="cover_name" placeholder="Enter cover name" required>
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="cover_description" class="form-label">Description</label>
                <textarea class="form-control" id="cover_description" name="cover_description" rows="4" placeholder="Enter description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="cover_price" class="form-label">Price</label>
                <input type="number" class="form-control" id="cover_price" name="cover_price" step="0.01" placeholder="Enter price" required>
            </div>
            <div class="form-group">
                <button type="submit" name="Cover_btn" class="btn btn-primary w-100">Add Cover</button>
            </div>
        </form>
    </div>
    
<?php include('admin_footer.php');?>