<?php 

  include('database_connection.php');

   if (isset($_POST['Regi_btn'])) {
    
         $cust_username = $_POST['Cust_Username'];
         $cust_email = $_POST['Cust_Email'];
         $cust_mobile = $_POST['Cust_Mobile'];
         $cust_password=$_POST['cust_password'];


    
        $Insert_customertable = "INSERT INTO `customer_table`(`cust_username`, `cust_email`, `cust_mobile`, `cust_password`)
         VALUES ('$cust_username','$cust_email','$cust_mobile','$cust_password')";

         $Insert_query = mysqli_query($conn,$Insert_customertable);

         if ($Insert_query) { 

          //     echo "Success";
          header('location:customer_login.php');

         }
         else
         {
              echo "Fail";
         }
   }

?>