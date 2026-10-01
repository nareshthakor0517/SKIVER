<?php 

  include('database_connection.php');

    if (isset($_POST['Cover_Update_btn'])) {
         
            // echo "jdslfhajl";

            $update_cover_id  = $_POST['Update_cover_Id'];
            $update_cover_image = $_POST['Update_cover_image'];
            $update_cover_name = $_POST['Update_cover_name'];
            $update_cover_descri= $_POST['Update_cover_description'];
            $update_cover_price = $_POST['Update_cover_price'];
          
            $Update_data_process="UPDATE `add_cover_table` SET `cover_img`='$update_cover_image',`cover_name`='$update_cover_name',`cover_discri`='$update_cover_descri',`cover_price`='$update_cover_price' WHERE `cover_id`='$update_cover_id'";

            // $Update_data_process="UPDATE `customer_table` SET `cust_username`='$update_cust_username',
            // `cust_email`='$update_cust_email',`cust_mobile`='$update_cust_mobile',
            // `cust_password`='$update_cust_password' WHERE `cust_id`='$update_cust_id'";

            $Update_process = mysqli_query($conn,$Update_data_process);

            if ($Update_process) {
                // echo "done";

                header('location:Manage_Product_Cover.php');

            }
            else
            {
                echo "fail";
            }

    }

?>