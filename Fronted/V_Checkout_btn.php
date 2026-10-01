<?php
include('database_connection.php');
session_start();

$_SESSION['cust_username'];

$user_name = $_SESSION['cust_username'];



$select= "SELECT * FROM customer_table WHERE cust_username='$user_name'";

$op = mysqli_query($conn,$select);

$data = mysqli_fetch_assoc($op);

// $user_id = $data['cust_id'];

// $user_id = $data['cust_id'];


$query = "SELECT * FROM order_cover_table WHERE cus_id='$user_name'"; // Replace user_table with your actual table name
$result = mysqli_query($conn, $query);

   

if (isset($_POST['CheckOut_btn'])) {

    $ID  = $_POST['Cover_ID'];

    $User_ID = $_POST['User_ID'];

    $Select_all_info = "SELECT * FROM cover_cart_table WHERE cover_id='$ID'";
    $cover_data = mysqli_query($conn, $Select_all_info);
    $row = mysqli_fetch_assoc($cover_data);


                  $cover_id = $row['cover_id'];

                    $user_data = "SELECT * FROM add_cover_table WHERE cover_id='$cover_id'";
                    $user_data_run = mysqli_query($conn,$user_data);
                    $user_row = mysqli_fetch_assoc($user_data_run);

      
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
                <form action="V_Checkout_btn_Backend.php" method="POST">

                    <h4>Contact</h4>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="cov_order_email" id="email"
                            placeholder="Enter your email">

                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $User_ID?>">
                        <input type="hidden" class="form-control" name="cover_id" value="<?php echo $ID?>">

                    </div>



                    <h4>Delivery</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="cov_order_firsrname" id="firstName"
                                placeholder="First name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="cov_order_lastname" id="lastName"
                                placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="mb-3 mt-2">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control " minlength="10" maxlength="10" pattern="[0-9]{10}"
                            name="cov_order_phone" id="phone" placeholder="Enter your phone number" required>
                    </div>

                    <div class="mb-3">
                        <label for="alternateNumber" class="form-label">Alternate Number</label>
                        <input type="tel" class="form-control" name="cov_order_alternate_no" id="alternateNumber"
                            placeholder="Enter your phone number" minlength="10" maxlength="10" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="cov_order_address" id="address" rows="3"
                            placeholder="Enter your full address" required></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" name="cov_order_city" id="city"
                                placeholder="Enter your city" required oninput="validateText()">
                        </div>
                        <div class="col-md-6">
                            <label for="pincode" class="form-label">Pin Code</label>
                            <input type="text" class="form-control" name="cov_order_pincode" id="pincode" maxlength="6"
                                pattern="[0-9]{6}" required oninput="validatePincode()"
                                placeholder="Enter your pin code" required>
                        </div>
                    </div>
                    <!-- --------------------------------------- ---------------------------------- -->
                    <div class="row g-3 m-1">

                        <div class="col-md-12">
                            <label for="paymentmode" class="form-label">Select Payment Mode</label>
                            <select name="paymentmode" id="paymentmode" class="form-control"
                                onchange="togglePaymentDiv()">
                                <option value="">Select Payment Mode</option>
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                            </select>
                        </div>

                        <!-- -------------
                         -------------------------- ---------------------------------- -->
                        <?php $info_data=mysqli_fetch_assoc($cover_data) ?>


                    </div>
                    <form action="V_Checkout_btn_Backend.php" method="post">
                        <input type="hidden" name="price_" value="<?php echo $user_row['cover_price']; ?>">
                        <input type="hidden" name="model_name" value="<?php echo $row['model'] ?>">
                        <button name="place_order_btn" class="btn btn-dark w-100 mt-3">Place Order</button>
                    </form>
                </form>
            </div>

            <!-- Right Section -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>


                        <div class="d-flex justify-content-between mb-3">
                            <p class="mb-0">Cover Name : <?php echo $user_row['cover_name']; ?></p>
                            <p class="mb-0">Rs.<?php echo $user_row['cover_price']; ?>/-</p>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <p class="mb-0">Model Name : <?php echo  $row['model']; ?></p>
                        </div>
                        <hr>

                        <div class="d-flex justify-content-between">
                            <h6>Total</h6>
                            <h6>Rs.<?php echo $user_row['cover_price']; ?>/-</h6>
                        </div>
                    </div>
                </div>


                <br>
                <div class="row P-5">
                    <div class="col-12">



                        <div id="paymentDiv" style="display: none;">
                            <div class="heading text-center">
                                <h3>PAYMENT NOW</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur </p>
                                <hr>
                            </div>
                            <div class="img">
                                <img src="../Fronted/admin_img/WhatsApp Image 2025-02-13 at 11.25.31 AM.jpeg"
                                    style="margin-left:15%;" width="250px" class="img-fluid" alt="QR">
                            </div>
                            <div class="heading text-center">
                                <hr>
                                <p> Total Payment you Need TO Pay Is <b>Rs.<?php echo $user_row['cover_price']; ?>/-</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('phone').addEventListener('input', function(e) {
        let phoneValue = e.target.value;
        if (phoneValue.length > 10) {
            e.target.value = phoneValue.slice(0, 10);
        }
    });

    document.getElementById('alternateNumber').addEventListener('input', function(e) {
        let alternatePhoneValue = e.target.value;
        if (alternatePhoneValue.length > 10) {
            e.target.value = alternatePhoneValue.slice(0, 10);
        }
    });


    function validatePincode() {
        const pincode = document.getElementById('pincode').value;

        // Allow only numbers
        document.getElementById('pincode').value = pincode.replace(/[^0-9]/g, '');

        // Limit to 6 digits
        if (pincode.length > 6) {
            document.getElementById('pincode').value = pincode.slice(0, 6);
        }
    }


    function validateText() {
        const city = document.getElementById('city').value;

        // Allow only alphabets (a-z, A-Z)
        document.getElementById('city').value = city.replace(/[^a-zA-Z\s]/g, '');
    }

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
    <?php }?>