<?php

// include('admin_header.php');
include('database_connection.php');

?>


<?php 
  
  if(isset($_POST['Delete_Skin_id'])) {
        
        //  echo "delete";

        $Cover_delete_id = $_POST['Skin_delete_id'];

        echo $Cover_delete_id;

        $Delete_Cust="DELETE FROM `add_skin_table` WHERE `skin_id`='$Cover_delete_id'";

        $Delete_process = mysqli_query($conn,$Delete_Cust);

        if ($Delete_process) {
            // header('manage_user.php');
            header('location:Manage_Product_Skin.php');
            // echo "data delete";
            // exit; 
        }
        else
        {
              echo "fail";
        }
  }

?>







