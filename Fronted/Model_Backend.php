<?php 

  include('database_connection.php');

   if (isset($_POST['add_model_btn'])) {
    
         $model_name = $_POST['select_Model'];


        $Insert_data ="INSERT INTO `model`(`model_name`) 
         VALUES ('$model_name')";
       
       $Insert_query = mysqli_query($conn,$Insert_data);

         if ($Insert_query) { 

          //     echo "Success";
          header('location:Manage_Model.php');

         }
         else
         {
              echo "Fail";
         }
   }

?>