<?php
session_start();
if (!isset($_SESSION['cust_username'])) {
    die("Error: Customer is not logged in.");
}
$USER = $_SESSION['cust_username'];
// echo $USER;

include('database_connection.php');

// Cart Initialization
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// If Add to Cart button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_btn'])) {

    $model = $_POST['model'];
    $cover_id = $_POST['sel_cover_id'];
    $USER = $_SESSION['cust_username'];

    $PROCESS = "INSERT INTO `cover_cart_table`(`cust_id`, `cover_id`, `model`) VALUES ('$USER','$cover_id','$model')";
$PROCESS_RUN = mysqli_query($conn, $PROCESS);

if (!$PROCESS_RUN) {
    die("Error inserting data: " . mysqli_error($conn));
}

    $Select_all_info = "SELECT * FROM `add_cover_table` WHERE `cover_id`='$cover_id'";
    $cover_data = mysqli_query($conn, $Select_all_info);
    $cover_info = mysqli_fetch_assoc($cover_data);

    if ($cover_info) {
        // Check if the item already exists in the cart
        $exists = false;
        foreach ($_SESSION['cart'] as $item) {
            if ($item['cover_id'] == $cover_id) {
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $_SESSION['cart'][] = [
                'cover_id' => $cover_id,
                'cover_name' => $cover_info['cover_name'] ?? 'N/A',
                'cover_img' => $cover_info['cover_img'] ?? 'default.jpg',
                'cover_price' => $cover_info['cover_price'] ?? 0,
                'model' => $model ?? 'N/A',
            ];
        }
    }
    

    // Redirect to prevent form resubmission issue
    header("Location: V_Cart_Btn.php");
    exit;
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];

    foreach ($_SESSION['cart'] as $key => $item) {
        if (isset($item['cover_id']) && $item['cover_id'] == $remove_id) {
            unset($_SESSION['cart'][$key]);
        }
        if (isset($item['skin_id']) && $item['skin_id'] == $remove_id) {
            unset($_SESSION['cart'][$key]);
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array

    // Database से हटाना
    $delete_query_cover = "DELETE FROM `cover_cart_table` WHERE `cover_id`='$remove_id' AND `cust_id`='$USER'";
    mysqli_query($conn, $delete_query_cover);

    $delete_query_skin = "DELETE FROM `skin_cart_table` WHERE `skin_id`='$remove_id' AND `cust_id`='$USER'";
    mysqli_query($conn, $delete_query_skin);

    // Redirect to refresh the page
    header("Location: V_Cart_Btn.php");
    exit;
}




// Calculate Total Price
$total_price = 0;
$select_data = "SELECT c.cover_price FROM `cover_cart_table` cc 
                JOIN `add_cover_table` c ON cc.cover_id = c.cover_id 
                WHERE cc.cust_id='$USER'";
$select_data_run = mysqli_query($conn, $select_data);

while ($row = mysqli_fetch_assoc($select_data_run)) {
    $total_price += $row['cover_price'];
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-5">
    <h2 class="text-center mb-4">Cart Details</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Cover Image</th>
                    <th>Cover Name</th>
                    <th>Select Model</th>
                    <th>Price (Rs.)</th>
                    <th>Remove</th>
                    <th>Buy Now</th>
                </tr>
            </thead>
            <tbody>


                <?php 
            
            $select_data = "SELECT * FROM `cover_cart_table` WHERE `cust_id`='$USER'";
            $select_data_run = mysqli_query($conn,$select_data);
            
            ?>
                <?php 
                while ( $row = mysqli_fetch_assoc($select_data_run)) {
                    $cover_id = $row['cover_id'];

                    $user_data = "SELECT * FROM `add_cover_table` WHERE `cover_id`='$cover_id'";
                    $user_data_run = mysqli_query($conn,$user_data);
                    $user_row = mysqli_fetch_assoc($user_data_run);


                ?>
                <tr>
                    <td>
                        <img src="../Home_page/Cover_Img/<?php echo $user_row['cover_img'] ?>" class="img-thumbnail" width="100">
                    </td>
                    <td><?php echo $user_row['cover_name'] ?></td>
                    <td><?php echo $row['model']; ?></td>
                    <td>Rs. <?php echo $user_row['cover_price']  ?>.00</td>
                    <td><a href="V_Cart_Btn.php?remove=<?php echo $user_row['cover_id']; ?>" class="btn btn-danger">Remove</a>
                    </td>
                    <td>
                        <form action="V_Checkout_btn.php" method="post">
                            <input type="hidden" name="Model" value="<?php echo $row['cover_id']; ?>   ">
                            <input type="hidden" name="Cover_ID" value="<?php echo $row['cover_id']; ?>    ">
                            <input type="hidden" name="User_ID" value="<?php echo $_SESSION['cust_username']?>    ">
                            <button type="submit" name="CheckOut_btn" class="btn btn-success">Buy Now</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
                <!-- Total Price Row -->    
                <tr class="table-bordered table-striped table-hover">
                    <td colspan="3" class="text-end"><strong>Total Price:</strong></td>
                    <td colspan="3"><strong>Rs. <?php echo $total_price; ?>.00</strong></td>
                </tr>
                
             
                
            </tbody>
        </table>
    </div>


    <!-- Back to Home Button -->
    <div class="text-center mt-3">
        <!-- <a href="../Home_page/home_page.php" class="btn btn-primary">Continue Shopping</a> -->
    </div>
</div>
<!-- ---------------------------------------------------------------------------------------------------- -->
<?php
$USER = $_SESSION['cust_username'];

// Cart Initialization
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// If Add to Cart button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_btn'])) {

    $model = $_POST['model'];
    $skin_id = $_POST['sel_skin_id'];
    $USER = $_SESSION['cust_username'];

    $PROCESS = "INSERT INTO `skin_cart_table`(`cust_id`, `skin_id`, `model`) VALUES ('$USER','$skin_id','$model')";
    $PROCESS_RUN = mysqli_query($conn,$PROCESS);

    $Select_all_info = "SELECT * FROM `add_skin_table` WHERE `skin_id`='$skin_id'";
    $cover_data = mysqli_query($conn, $Select_all_info);
    $cover_info = mysqli_fetch_assoc($cover_data);

    if ($cover_info) {
        // Check if the item already exists in the cart
        $exists = false;
        foreach ($_SESSION['cart'] as $item) {
            if ($item['skin_id'] == $skin_id) {
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $_SESSION['cart'][] = [
                'skin_id' => $skin_id,
                'skin_name' => $cover_info['skin_name'] ?? 'N/A',
                'skin_name' => $cover_info['skin_name'] ?? 'default.jpg',
                'skin_price' => $cover_info['skin_price'] ?? 0,
                'model' => $model ?? 'N/A',
            ];
        }
    }

    // Redirect to prevent form resubmission issue
    header("Location: V_Cart_Skin.php");
    exit;
}

// if (isset($_GET['remove'])) {
//     $remove_id = $_GET['remove'];

//     // Remove from session cart
//     foreach ($_SESSION['cart'] as $key => $item) {
//         if ($item['skin_id'] == $remove_id) {
//             unset($_SESSION['cart'][$key]);
//             $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
//             break;
//         }
//     }

//     // Remove from database
//     $delete_query = "DELETE FROM `skin_cart_table` WHERE `skin_id`='$remove_id' AND `cust_id`='$USER'";
//     mysqli_query($conn, $delete_query);

//     // Redirect to refresh the page
//     header("Location: V_Cart_Btn.php");
//     exit;
// }
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];

    // Remove from session cart
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['skin_id'] == $remove_id) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index array
        }
    }

    // Remove from database
    $delete_query = "DELETE FROM `skin_cart_table` WHERE `skin_id`='$remove_id' AND `cust_id`='$USER'";
    mysqli_query($conn, $delete_query);

    // Redirect to refresh the page
    header("Location: V_Cart_Btn.php");
    exit;
}




// Calculate Total Price
$total_price = 0;
$select_data = "SELECT c.skin_price FROM `skin_cart_table` cc 
                JOIN `add_skin_table` c ON cc.skin_id = c.skin_id 
                WHERE cc.cust_id='$USER'";
$select_data_run = mysqli_query($conn, $select_data);

while ($row = mysqli_fetch_assoc($select_data_run)) {
    $total_price += $row['skin_price'];
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-5">
    <h2 class="text-center mb-4">Cart Details</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Skin Image</th>
                    <th>Skin Name</th>
                    <th>Select Model</th>
                    <th>Price (Rs.)</th>
                    <th>Remove</th>
                    <th>Buy Now</th>
                </tr>
            </thead>
            <tbody>


                <?php 
            
            $select_data = "SELECT * FROM `skin_cart_table` WHERE `cust_id`='$USER'";
            $select_data_run = mysqli_query($conn,$select_data);
            
            ?>
                <?php 
                while ( $row = mysqli_fetch_assoc($select_data_run)) {
                    $skin_id = $row['skin_id'];

                    $user_data = "SELECT * FROM `add_skin_table` WHERE `skin_id`='$skin_id'";
                    $user_data_run = mysqli_query($conn,$user_data);
                    $user_row = mysqli_fetch_assoc($user_data_run);


                ?>
                <tr>
                    <td>
                        <img src="../Home_page/Cover_Img/<?php echo $user_row['skin_img'] ?>" class="img-thumbnail" width="100">
                    </td>
                    <td><?php echo $user_row['skin_name'] ?></td>
                    <td><?php echo $row['model']; ?></td>
                    <td>Rs. <?php echo $user_row['skin_price']  ?>.00</td>
                    <td><a href="V_Cart_Btn.php?remove=<?php echo $user_row['skin_id']; ?>" class="btn btn-danger">Remove</a>
                    </td>
                    <td>
                        <form action="V_Checkout_skin.php" method="post">
                            <input type="hidden" name="Model" value="<?php echo $row['skin_id']; ?>   ">
                            <input type="hidden" name="Skin_id" value="<?php echo $row['skin_id']; ?>    ">
                            <input type="hidden" name="User_ID" value="<?php echo $_SESSION['cust_username']?>    ">
                            <button type="submit" name="CheckOut_btn" class="btn btn-success">Buy Now</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
                <!-- Total Price Row -->    
                <tr class="table-bordered table-striped table-hover">
                    <td colspan="3" class="text-end"><strong>Total Price:</strong></td>
                    <td colspan="3"><strong>Rs. <?php echo $total_price; ?>.00</strong></td>
                </tr>
                
             
                
            </tbody>
        </table>
    </div>


    <!-- Back to Home Button -->
    <div class="text-center mt-3">
        <a href="../Home_page/home_page.php" class="btn btn-primary">Continue Shopping</a>
    </div>
</div>