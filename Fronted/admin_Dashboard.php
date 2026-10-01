<?php
include('admin_header.php');
include('database_connection.php');

$query = "SELECT * FROM `customer_table`"; // Replace `user_table` with your actual table name
$result = mysqli_query($conn, $query);


?>

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="mb-0"> Customer Table</h5>
            <a href="Manage_customer.php">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark ">
                        <th scope="col">Cust_Id</th>
                        <th scope="col">Cust_Username</th>
                        <th scope="col">Cust_Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Password</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete </a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
// Loop through the result and display each row in the table
while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['cust_id']; ?></td>
                        <td><?php echo $row['cust_username'];  ?></td>
                        <td><?php echo $row['cust_email']; ?></td>
                        <td><?php echo $row['cust_mobile']; ?></td>
                        <td><?php echo $row['cust_password']; ?></td>
                        <td>
                            <form action='Edit_Fronted.php' method='POST'>
                                <input type='hidden' name='Cust_Update_id' value="<?php echo $row['cust_id']; ?>">
                                <button type='submit' name="edit_btn" class='btn btn-primary'>Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action='Delete_Fronted.php' method='POST'>
                                <input type='hidden' name='Cust_delete_id' value="<?php echo $row['cust_id']; ?>">
                                <button type='submit' name='Delete_cust_id' class='btn btn-danger'>Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php
            }
            ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->


<?php 

include('database_connection.php');

$query = "SELECT * FROM `add_cover_table`"; // Replace `user_table` with your actual table name
$result = mysqli_query($conn, $query);

?>

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="mb-0">Cover Table</h5>
            <a href="Manage_Product_Cover.php">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark ">
                        <th scope="col">Cover_Id</th>
                        <th scope="col">Cover_Img</th>
                        <th scope="col">Cover_Name</th>
                        <th scope="col">Cover_Discription</th>
                        <th scope="col">Cover_Price</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete </a></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
// Loop through the result and display each row in the table
while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <th><?php echo $row['cover_id']; ?></th>
                        <td><img src="../Home_page/Cover_Img/<?php echo $row['cover_img']; ?>" width="100px"
                                alt="<?php echo $row['cover_img']; ?>"></td>

                        <td><?php echo $row['cover_name']; ?></td>

                        <td><?php echo $row['cover_discri']; ?></td>
                        <td><?php echo $row['cover_price']; ?></td>
                        <td>
                            <form action='Edit_Cover.php' method='POST'>
                                <input type='hidden' name='Cover_Update_id' value="<?php echo $row['cover_id']; ?>">
                                <button type='submit' name="edit_btn" class='btn btn-primary'>Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action='Delete_Cover.php' method='POST'>
                                <input type='hidden' name='Cover_delete_id' value="<?php echo $row['cover_id']; ?>">
                                <button type='submit' name='Delete_cover_id' class='btn btn-danger'>Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php
            }
            ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php 
include('database_connection.php');

$query = "SELECT * FROM `add_skin_table`"; // Replace `user_table` with your actual table name
$result = mysqli_query($conn, $query);

?>

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="mb-0">Skin Table</h5>
            <a href="Manage_Product_Skin.php">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark ">
                        <th scope="col">Skin_Id</th>
                        <th scope="col">Skin_Img</th>
                        <th scope="col">Skin_Name</th>
                        <th scope="col">Skin_Discription</th>
                        <th scope="col">Skin_Price</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete </a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
// Loop through the result and display each row in the table
while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['skin_id']; ?></td>
                        <td><img src="../Home_page/Cover_Img/<?php echo $row['skin_img'];?>" width="100px" alt=""></td>
                        <td><?php echo $row['skin_name']; ?></td>


                        <td><?php echo $row['skin_discri']; ?></td>
                        <td><?php echo $row['skin_price']; ?></td>
                        <td>
                            <form action='Edit_Skin.php' method='POST'>
                                <input type='hidden' name='Skin_Update_id' value="<?php echo $row['skin_id']; ?>">
                                <button type='submit' name="edit_btn" class='btn btn-primary'>Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action='Delete_Skin.php' method='POST'>
                                <input type='hidden' name='Skin_delete_id' value="<?php echo $row['skin_id']; ?>">
                                <button type='submit' name='Delete_Skin_id' class='btn btn-danger'>Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php
            }
            ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
include('database_connection.php');

$query = "SELECT * FROM `order_cover_table`"; // Replace `user_table` with your actual table name
$result = mysqli_query($conn, $query);

?>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="mb-0">Order Cover Table</h5>
            <a href="Order_Cover.php">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>

                    <tr class="text-dark ">
                        <th scope="col">Order_Id</th>
                        <th scope="col">Customer_Id</th>
                        <th scope="col">Cover_Id</th>
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
                        <td><?php echo $row[' cov_order_id']; ?></td>
                        <td><?php echo $row['cus_id']; ?></td>
                        <td><?php echo $row['cover_id']; ?></td>
                        <td><?php echo $row['cov_order_email']; ?></td>
                        <td><?php echo $row['cov_order_firsrname']; ?></td>
                        <td><?php echo $row['cov_order_lastname']; ?></td>
                        <td><?php echo $row['cov_order_phone']; ?></td>
                        <td><?php echo $row['cov_order_alternate_no']; ?></td>
                        <td><?php echo $row['cov_order_address']; ?></td>
                        <td><?php echo $row['cov_order_city']; ?></td>
                        <td><?php echo $row['cov_order_pincode']; ?></td>

                        <td><?php echo $row['paymentmode']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                        <td><?php echo $row['o_date_cover']; ?></td>


                    </tr>
                    <?php }
                ?>
                </tbody>
            </table>

        </div>

    </div>

</div>

<?php 
include('database_connection.php');

$query = "SELECT * FROM `order_skin_table`"; // Replace `user_table` with your actual table name
$result = mysqli_query($conn, $query);

?>

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="mb-0">Order Skin Table</h5>
            <a href="Order_Skin.php">Show All</a>
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



<!-- Last table -->
<?php 
include('database_connection.php');

$query = "SELECT * FROM `contact_us_table`"; // Replace `user_table` with your actual table name
$result = mysqli_query($conn, $query);
?>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="mb-0">Contact Us Table</h5>
            <a href="Add_Contact_us.php">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark ">
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
// Loop through the result and display each row in the table
while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name'];  ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                    </tr>
                    <?php
            }
            ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php include('admin_footer.php');?>