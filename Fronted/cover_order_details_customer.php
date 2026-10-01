<?php
include('database_connection.php');
session_start();

// $_SESSION['cust_username'];

$user_name = $_SESSION['cust_username'];

$select= "SELECT * FROM `customer_table` WHERE `cust_id`='$user_name'";

$op = mysqli_query($conn,$select);

$data = mysqli_fetch_assoc($op);

$user_id = $data['cust_id'];


$query = "SELECT * FROM `order_cover_table` WHERE `cus_id`='$user_id'"; // Replace `user_table` with your actual table name
$result = mysqli_query($conn, $query);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>
    .card {
        width: 1000px; /* Card width chhoti kar di */
        padding: 10px; /* Andar ka padding kam kiya */
        font-size: 14px; /* Text chhota kiya */
        margin: auto; /* Center align */
    }
    .card h5, .card h4 {
        font-size: 16px; /* Heading size bhi kam ki */
    }
    .card p, .card table {
        font-size: 14px;
    }
</style>


<body style="background-color:	 #f7f2ee";>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Order Details</h2>
        <?php
while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="card p-4">
        <h5>Order ID: <span id="order-id">#<?php echo $row[' cov_order_id']; ?></span></h5>
        <h5>Cust ID: <span id="order-id">#<?php echo $row['cus_id']; ?></span></h5>
        <h5>Cover ID: <span id="order-id">#<?php echo $row['cover_id']; ?></span></h5>
        <h5>Date : <span id="order-id"><?php echo $row['o_date_cover']; ?></span></h5>
        <!-- <p><strong>Status:</strong> <span class="badge bg-success" id="order-status">Pending</span></p> -->

        <h4 class="mt-4">Products</h4>
        <div class="table-responsive">
        <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="bg-primary text-white">
            <tr class="text-center">
                <th>Product Name</th>
                <th>Model Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php  
            $p_id = $row['cover_id']; 
            $query2 = "SELECT * FROM `add_cover_table` WHERE `cover_id`=?";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("i", $p_id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $c = $result2->fetch_assoc();
            ?>
            <tr class="text-center">
                <td><?php echo $c['cover_name']; ?></td>
                <td><?php echo $row['model']; ?></td>
                <td>1</td>
                <td>&#8377; <?php echo $row['price']; ?></td>
            </tr>
        </tbody>
    </table>
</div>

</div>


        <h4 class="mt-4">Contact Details</h4>
        <p><strong>Email :</strong> <?php echo $row['cov_order_email']; ?></p>
        <p><strong>Mobile No :</strong> <?php echo $row['cov_order_phone']; ?></p>
        <p><strong>Alternate Mobile No :</strong> <?php echo $row['cov_order_alternate_no']; ?></p>

        <h4 class="mt-4">Payment Details</h4>
        <p><strong>Payment Method:</strong> <?php echo $row['paymentmode']; ?></p>
        <p><strong>Total Amount:</strong> &#8377; <?php echo $row['price']; ?></p>
        <p><strong>Payment Status:</strong> 
    <?php 
    if ($row['paymentmode'] == 'Online') {
        echo '<span class="badge bg-success">Paid</span>';
    } else {
        echo '<span class="badge bg-danger">Pending</span>';
    }
    ?>
</p>


        <h4 class="mt-4">Delivery Address</h4>
        <p><b>Name :</b>  <?php echo $row['cov_order_firsrname'] . " " . $row['cov_order_lastname']; ?></p>
        <p><?php echo $row['cov_order_address'] . ", " . $row['cov_order_city'] . ", " . $row['cov_order_pincode']; ?></p>
    </div> 
    <br>
    
<?php } ?>
<br>
<center>
<a href="../Home_page/home_page.php" class="btn btn-primary">Back to Home</a>

</center>
<br>
