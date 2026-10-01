<?php 

  include('database_connection.php');

    if (isset($_POST['Model_Update_btn'])) {
         
            // echo "jdslfhajl";

            $update_model_id  = $_POST['Update_Model_Id'];
            $update_model_name = $_POST['Update_Model_name'];

          
            $Update_data_process="UPDATE `model` SET `model_name`='$update_model_name' WHERE `model_id`='$update_model_id'";


            $Update_process = mysqli_query($conn,$Update_data_process);

            if ($Update_process) {
                // echo "done";

                header('location:Manage_Model.php');

            }
            else
            {
                echo "fail";
            }

    }

?>