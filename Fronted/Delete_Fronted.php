<?php

// include('admin_header.php');
include('database_connection.php');

?>


<?php 
  
  if(isset($_POST['Delete_cust_id'])) {
        
        //  echo "delete";

        $Cust_delete_id = $_POST['Cust_delete_id'];

        echo $Cust_delete_id;

        $Delete_Cust="DELETE FROM `customer_table` WHERE `cust_id`='$Cust_delete_id'";

        $Delete_process = mysqli_query($conn,$Delete_Cust);

        if ($Delete_process) {
            // header('manage_user.php');
            header('location:Manage_customer.php');
            // echo "data delete";
            // exit; 
        }
        else
        {
              echo "fail";
        }
  }

?>







