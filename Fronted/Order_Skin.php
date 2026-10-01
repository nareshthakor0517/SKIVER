<?php 
include('admin_header.php');
include('database_connection.php');

$query = "SELECT * FROM `order_skin_table`"; // Replace `user_table` with your actual table name
$result = mysqli_query($conn, $query);

?>

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Order Skin Table</h4>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark ">
                        <th scope="col">Order_Id</th>
                        <th scope="col">Customer_Id</th>
                        <th scope="col">Skin_Id</th>
                        <th scope="col">Email</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Alternate Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">Pin Code</th>

                        <th scope="col">Payment</th>
                        <th scope="col">Price</th>
                        <th scope="col">Model</th>
                        <th scope="col">Date</th>


                    </tr>
                </thead>
                <tbody>
                <?php
// Loop through the result and display each row in the table
while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['skin_order_id']; ?></td>
                        <td><?php echo $row['cus_id']; ?></td>
                        <td><?php echo $row['skin_id']; ?></td>
                        <td><?php echo $row['skin_order_email']; ?></td>
                        <td><?php echo $row['skin_order_firstname']; ?></td>
                        <td><?php echo $row['skin_order_lastname']; ?></td>
                        <td><?php echo $row['skin_order_phone']; ?></td>
                        <td><?php echo $row['skin_order_alternate_no']; ?></td>
                        <td><?php echo $row['skin_order_address']; ?></td>
                        <td><?php echo $row['skin_order_city']; ?></td>
                        <td><?php echo $row['skin_order_pincode']; ?></td>

                        <td><?php echo $row['paymentmode']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['o_date_skin']; ?></td>


                    </tr>
                    <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include('admin_footer.php');?>