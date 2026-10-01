<?php 

  include('database_connection.php');

   if (isset($_POST['Skin_btn'])) {
    
         $Skin_name = $_POST['skin_name'];
         $Skin_discri = $_POST['skin_description'];
         $Skin_price=$_POST['skin_price'];

         $skin_img = $_FILES['skin_image']['name'];
         $skin_img_tmp = $_FILES['skin_image']['tmp_name'];
         $location = "../Home_page/Cover_Img/".$skin_img;


       $Insert_data_add_skin_table = "INSERT INTO `add_skin_table`(`skin_img`, `skin_name`, `skin_discri`, `skin_price`) 
       VALUES ('$skin_img','$Skin_name','$Skin_discri','$Skin_price')";


         $Insert_query = mysqli_query($conn,$Insert_data_add_skin_table);

         if ($Insert_query) { 
            
            move_uploaded_file($skin_img_tmp,$location);

          //     echo "Success";
          header('location:Manage_Product_Skin.php');

         }
         else
         {
              echo "Fail";
         }
   }

?>