<?php
include('database_connection.php');
session_start();
require_once('../phpqrcode-master/phpqrcode.php'); // Include the QR Code library

$_SESSION['cust_username'];

$user_name = $_SESSION['cust_username'];

$select= "SELECT * FROM `customer_table` WHERE `cust_username`='$user_name'";
$op = mysqli_query($conn,$select);
$data = mysqli_fetch_assoc($op);

$query = "SELECT * FROM `order_skin_table` WHERE `skin_id`='$user_name'";
$result = mysqli_query($conn, $query);

if (isset($_POST['CheckOut_btn'])) {

    $ID  = $_POST['Skin_id'];
    $User_ID = $_POST['User_ID'];

    $Select_all_info = "SELECT * FROM `skin_cart_table` WHERE `skin_id`='$ID'";
    $cover_data = mysqli_query($conn, $Select_all_info);
    $row = mysqli_fetch_assoc($cover_data);

    $skin_id = $row['skin_id'];

    $user_data = "SELECT * FROM `add_skin_table` WHERE `skin_id`='$skin_id'";
    $user_data_run = mysqli_query($conn,$user_data);
    $user_row = mysqli_fetch_assoc($user_data_run);

    // ✅ QR Code Generation Logic
    $paymentAmount = $user_row['skin_price'];
    $upiID = "bhikhaji126489@oksbi"; // ✅ Replace it with your real UPI ID
    $name = "Skiver Seller";
    $note = "Payment for Skin Cover";

    $qrData = "upi://pay?pa=$upiID&pn=$name&mc=&tid=&tr=&tn=$note&am=$paymentAmount&cu=INR";
    $qrFile = "skin_payment_qr.png";
    QRcode::png($qrData, $qrFile, QR_ECLEVEL_L, 5);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background-color: #f8f9fa;
}

.card {
    border: 1px solid #e0e0e0;
}

.accordion-button {
    background-color: #f8f9fa;
    color: #000;
}

.accordion-button:not(.collapsed) {
    background-color: #e9ecef;
}

.btn-dark {
    background-color: #000;
    color: #fff;
}

.btn-dark:hover {
    background-color: #333;
}
</style>
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <!-- Left Section -->
            <div class="col-md-7">
                <form action="V_Checkout_Skin_Backend.php" method="POST">

                    <h4>Contact</h4>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="skin_order_email" id="email"
                            placeholder="Enter your email">

                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $User_ID?>">
                        <input type="hidden" class="form-control" name="skin_id" value="<?php echo $ID?>">
                    </div>

                    <h4>Delivery</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="skin_order_firstname" id="firstName"
                                placeholder="First name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="skin_order_lastname" id="lastName"
                                placeholder="Last name" required>
                        </div>
                    </div>

                    <div class="mb-3 mt-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" minlength="10" maxlength="10" pattern="[0-9]{10}"
                            name="skin_order_phone" id="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="phone" class="form-label">Alternate Phone</label>
                        <input type="tel" class="form-control" minlength="10" maxlength="10" pattern="[0-9]{10}"
                            name="skin_order_alternate_no" id="phone" placeholder="Enter your Other phone number" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="skin_order_address" id="address" rows="3"
                            placeholder="Enter your full address" required></textarea>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" name="skin_order_city" id="city"
                                placeholder="Enter your city" required>
                        </div>
                        <div class="col-md-6">
                            <label for="pincode" class="form-label">Pin Code</label>
                            <input type="text" class="form-control" name="skin_order_pincode" id="pincode" maxlength="6"
                                pattern="[0-9]{6}" required placeholder="Enter your pin code">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="paymentmode" class="form-label mt-3">Select Payment Mode</label>
                        <select name="paymentmode" id="paymentmode" class="form-control"
                            onchange="togglePaymentDiv()">
                            <option value="">Select Payment Mode</option>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                        </select>
                    </div>

                    <input type="hidden" name="price_" value="<?php echo $user_row['skin_price']; ?>">
                    <input type="hidden" name="model_name" value="<?php echo $row['model'] ?>">
                    <button name="place_order_skin_btn" class="btn btn-dark w-100 mt-3">Place Order</button>
                </form>
            </div>

            <!-- ✅ QR Code Section -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <p><b>Skin Name:</b> <?php echo $user_row['skin_name']; ?></p>
                        <p><b>Price:</b> Rs.<?php echo $user_row['skin_price']; ?>/-</p>
                        <p><b>Model:</b> <?php echo  $row['model']; ?></p>
                        <hr>

                        <!-- ✅ QR Code will show here -->
                        <div id="paymentDiv" style="display: none;">
                            <h4 class="text-center">PAY NOW</h4>
                            <img src="<?php echo $qrFile; ?>" width="250px" class="img-fluid" style="margin-left:20%;" />
                            <p class="text-center mt-2">Pay Rs.<?php echo $paymentAmount; ?>/-</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
function togglePaymentDiv() {
    var paymentMode = document.getElementById("paymentmode").value;
    var paymentDiv = document.getElementById("paymentDiv");
    if (paymentMode === "Online") {
        paymentDiv.style.display = "block";
    } else {
        paymentDiv.style.display = "none";
    }
}
</script>

<?php } ?>
