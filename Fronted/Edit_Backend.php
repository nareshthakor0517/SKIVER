<?php 

  include('database_connection.php');

    if (isset($_POST['Update_Customer_btn'])) {
         
            // echo "jdslfhajl";

            $update_cust_id  = $_POST['Update_Cust_Id'];
            $update_cust_username = $_POST['Update_Cust_Username'];
            $update_cust_email = $_POST['Update_Cust_Email'];
            $update_cust_mobile = $_POST['Update_Cust_Mobile'];
            $update_cust_password = $_POST['Update_cust_password'];
          
            // echo $Update_User_Name,
            // $Update_User_Email,
            // $Update_User_Mobile,
            // $Update_User_Address,
            // $Update_User_City,
            // $Update_User_Gender,
            // $Update_User_Education;

            $Update_data_process="UPDATE `customer_table` SET `cust_username`='$update_cust_username',
            `cust_email`='$update_cust_email',`cust_mobile`='$update_cust_mobile',
            `cust_password`='$update_cust_password' WHERE `cust_id`='$update_cust_id'";

            $Update_process = mysqli_query($conn,$Update_data_process);

            if ($Update_process) {
                // echo "done";

                header('location:Manage_customer.php');

            }
            else
            {
                echo "fail";
            }

    }

?>
