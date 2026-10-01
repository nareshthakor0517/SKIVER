<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
include('database_connection.php');

if (isset($_POST['place_order_skin_btn'])) {
    $cus_id = $_POST['user_id'];
    $skin_id = $_POST['skin_id'];
    $skin_order_email = $_POST['skin_order_email'];
    $skin_order_firstname = $_POST['skin_order_firstname'];
    $skin_order_lastname = $_POST['skin_order_lastname'];
    $skin_order_phone = $_POST['skin_order_phone'];
    $skin_order_alternate_no = $_POST['skin_order_alternate_no'];
    $skin_order_address = $_POST['skin_order_address'];
    $skin_order_city = $_POST['skin_order_city'];
    $skin_order_pincode = $_POST['skin_order_pincode'];
    $paymentmode = $_POST['paymentmode'];
    $price = $_POST['price_'];
    $model_name = $_POST['model_name'];

    // Insert order into database
    $insert_query = "INSERT INTO `order_skin_table` (`cus_id`, `skin_id`, `skin_order_email`, `skin_order_firstname`, `skin_order_lastname`, `skin_order_phone`, `skin_order_alternate_no`, `skin_order_address`, `skin_order_city`, `skin_order_pincode`, `paymentmode`, `price`, `model`) 
    VALUES ('$cus_id', '$skin_id', '$skin_order_email', '$skin_order_firstname', '$skin_order_lastname', '$skin_order_phone', '$skin_order_alternate_no', '$skin_order_address', '$skin_order_city', '$skin_order_pincode', '$paymentmode', '$price', '$model_name')";

    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        $order_query = "SELECT * FROM `order_skin_table` WHERE `cus_id`='$cus_id' ORDER BY `skin_order_id` DESC LIMIT 1";
        $order_result = mysqli_query($conn, $order_query);
        $order_data = mysqli_fetch_assoc($order_result);

        $product_query = "SELECT * FROM `add_skin_table` WHERE `skin_id`='$skin_id'";
        $product_result = mysqli_query($conn, $product_query);
        $product_data = mysqli_fetch_assoc($product_result);
        $product_name = $product_data['skin_name'];

        $cart_query = "DELETE FROM skin_cart_table WHERE cust_id = '$cus_id' AND skin_id = '$skin_id'";
        mysqli_query($conn, $cart_query);

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'piyushbharwad7990@gmail.com';
            $mail->Password = 'dwhpxfmieichgsqb';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('piyushbharwad7990@gmail.com', 'Team Skiver');
            $mail->addAddress($skin_order_email, $skin_order_firstname);
            $mail->Subject = 'Order Confirmation - Your Order #' . $order_data['skin_order_id'];

            $mail->isHTML(true);
            $mail->Body = "<div style='max-width: 600px; margin: auto; background: #1e1e1e; color: #fff; padding: 20px;'>
                <h2 style='text-align: center;'>Skiver</h2>
                <p>Dear <strong>$skin_order_firstname $skin_order_lastname</strong>, thank you for shopping with us!</p>

                <hr style='border: 1px solid #333;'>

                <h3 style='color: #fff;'>🛍️ Order Details</h3>
                <p><strong>Order ID:</strong> #{$order_data['skin_order_id']}</p>
                <p><strong>Order Date:</strong> {$order_data['o_date_skin']}</p>

                <hr style='border: 1px solid #333;'>

                <h3 style='color: #fff;'>💳 Payment Details</h3>
                <p><strong>Payment Method:</strong> $paymentmode</p>
                <p><strong>Payment Status:</strong> " . ($paymentmode == 'Online' ? '<span style="color:green; font-weight:bold;">Paid</span>' : '<span style="color:red; font-weight:bold;">Pending</span>') . "</p>

                <hr style='border: 1px solid #333;'>

                <h3 style='color: #fff;'>📦 Product Details</h3>
                <table style='width: 100%; border-collapse:collapse; background: #292929;'>
                    <thead>
                        <tr style='background-color: #007bff; color: #fff;'>
                            <th>Product</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>    
                    <tbody>
                        <tr>
                            <td>$product_name</td>
                            <td>$model_name</td>
                            <td>₹$price</td>
                            <td>1</td>
                            <td>₹$price</td>
                        </tr>
                    </tbody>
                </table>

                <h2 style='text-align: right;'>Total Paid: ₹$price</h2>

                <hr style='border: 1px solid #333;'>

                <h3>🚚 Delivery Address</h3>
                <p><strong>Name:</strong> $skin_order_firstname $skin_order_lastname</p>
                <p>{$skin_order_address}, {$skin_order_city} - {$skin_order_pincode}</p>

                <hr style='border: 1px solid #333;'>

                <h3>📞 Contact Details</h3>
                <p><strong>Email:</strong> $skin_order_email</p>
                <p><strong>Phone:</strong> $skin_order_phone</p>
                <p><strong>Alternate Phone:</strong> $skin_order_alternate_no</p>

                <p>For any queries, contact us at <a href='mailto:support@skiver.com'>support@skiver.com</a></p>
            </div>";

            $mail->send();
        } catch (Exception $e) {
            error_log("Email failed: " . $mail->ErrorInfo);
        }

        header('Location: success.php');
        exit();
    } else {
        echo "Order placement failed: " . mysqli_error($conn);
    }
}
?>
