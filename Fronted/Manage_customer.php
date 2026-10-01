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
            <h6 class="mb-0">Customer Table</h6>
            <a href="">Show All</a>
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
include('admin_footer.php');
?>