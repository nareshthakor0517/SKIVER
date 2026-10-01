<?php 
session_start();

include('database_connection.php');

if(isset($_POST['add_btn'])) {
   
 
    $cust_id  = $_SESSION['cust_username'];
    $model = $_POST['model'];
    $skin_id = $_POST['sel_skin_id'];

    $insert_query = "INSERT INTO `cart_table`(`cust_id`, `model`, `skin_id`) 
                     VALUES ('$cust_id','$model','$skin_id')";
    
    $Insert_query_process = mysqli_query($conn, $insert_query);

   

if ($Insert_query_process) {
    // echo "done";
   
    header('location:V_Cart_Btn.php');
}
else
{
    echo "fail";
}
}
?>
