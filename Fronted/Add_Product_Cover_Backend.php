<?php 

  include('database_connection.php');

   if (isset($_POST['Cover_btn'])) {
    
         $cover_name = $_POST['cover_name'];
         $cover_discri = $_POST['cover_description'];
         $cover_price=$_POST['cover_price'];

         $cover_img = $_FILES['cover_image']['name'];
         $cover_img_tmp = $_FILES['cover_image']['tmp_name'];
         $location = "../Home_page/Cover_Img/".$cover_img;

         $Insert_data_add_cover_table = "INSERT INTO `add_cover_table`(`cover_img`, `cover_name`, `cover_discri`, `cover_price`) 
         VALUES ('$cover_img','$cover_name','$cover_discri','$cover_price')";


         $Insert_query = mysqli_query($conn,$Insert_data_add_cover_table);

         if ($Insert_query) { 

            move_uploaded_file($cover_img_tmp,$location);
          //     echo "Success";
          header('location:Manage_Product_Cover.php');

         }
         else
         {
              echo "Fail";
         }
   }

?>