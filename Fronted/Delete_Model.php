<?php

// include('admin_header.php');
include('database_connection.php');

?>


<?php 
  
  if(isset($_POST['Delete_model_id'])) {
        
        //  echo "delete";

        $Model_delete_id = $_POST['Model_delete_id'];

        echo $Model_delete_id;

        $Delete_Model="DELETE FROM `model` WHERE `model_id`='$Model_delete_id'";

        $Delete_process = mysqli_query($conn,$Delete_Model);

        if ($Delete_process) {
            // header('manage_user.php');
            header('location:Manage_Model.php');
            // echo "data delete";
            // exit; 
        }
        else
        {
              echo "fail";
        }
  }

?>







