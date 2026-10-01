<?php include('admin_header.php');?>
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
        <h2>Add Model</h2>
        <!-- <form action="User_backand/User_Reg_backand.php" method="POST"> -->
        <form action="Model_Backend.php" method="post">
            <div class="form-group">
                <label for="fullname">Model</label>
                <input type="text" id="fullname" name="select_Model" placeholder="Enter a New Model" required>
            </div>
          
            <div class="form-group">
                <button type="submit" class='btn btn-primary' name="add_model_btn">Add Model</button>
            </div>
        </form>
        <div class="form-footer">
            <p>Already have an account? <a href="Model.php">Login here</a></p>
        </div>
    </div>
<?php include('admin_footer.php');?>