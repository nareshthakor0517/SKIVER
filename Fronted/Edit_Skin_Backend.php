<?php 

  include('database_connection.php');

    if (isset($_POST['Update_Skin_btn'])) {
         
            // echo "jdslfhajl";

            $update_skin_id = $_POST['Update_skin_Id'];
            $update_skin_image = $_POST['Update_skin_image'];
            $update_skin_name = $_POST['Update_skin_name'];
            $update_skin_descri= $_POST['Update_skin_description'];
            $update_skin_price = $_POST['Update_skin_price'];
          
            $Update_data_process="UPDATE `add_skin_table` SET `skin_img`='$update_skin_image',`skin_name`='$update_skin_name',`skin_discri`='$update_skin_descri',`skin_price`='$update_skin_price' WHERE `skin_id`='$update_skin_id'";

            // $Update_data_process="UPDATE `customer_table` SET `cust_username`='$update_cust_username',
            // `cust_email`='$update_cust_email',`cust_mobile`='$update_cust_mobile',
            // `cust_password`='$update_cust_password' WHERE `cust_id`='$update_cust_id'";

            $Update_process = mysqli_query($conn,$Update_data_process);

            if ($Update_process) {
                // echo "done";

                header('location:Manage_Product_Skin.php');

            }
            else
            {
                echo "fail";
            }

    }

?>