<?php 
include('admin_header.php');
include('database_connection.php');

$query = "SELECT * FROM `contact_us_table`"; // Replace `user_table` with your actual table name
$result = mysqli_query($conn, $query);
?> 
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Contact Us Table</h4>
            <a href="">Show All</a>
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
                        <!-- <td>
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
                        </td> -->
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
include('admin_footer.php');
?>