<?php 
include('admin_header.php');
include('database_connection.php');

$query = "SELECT * FROM `model`"; // Replace `user_table` with your actual table name
$result = mysqli_query($conn, $query);

?>

  <!-- Recent Sales Start -->
  <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0">Model Table</h4>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark ">
                                    <th scope="col">Model_Id</th>
                                    <th scope="col">Model_Name</th>
                                    <th scope="col">TimeStamp</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete </a></th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php
// Loop through the result and display each row in the table
while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['model_id']; ?></td>
                        <td><?php echo $row['model_name']; ?></td>
                       
                        <td><?php echo $row['timestamp']; ?></td>
                        <td>
                            <form action='Edit_Model.php' method='POST'>
                                <input type='hidden' name='Model_Update_id' value="<?php echo $row['model_id']; ?>">
                                <button type='submit' name="edit_btn" class='btn btn-primary'>Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action='Delete_Model.php' method='POST'>
                                <input type='hidden' name='Model_delete_id' value="<?php echo $row['model_id']; ?>">
                                <button type='submit' name='Delete_model_id' class='btn btn-danger'>Delete</button>
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


<?php include('admin_footer.php');?>