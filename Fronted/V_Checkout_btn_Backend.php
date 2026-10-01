<?php  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 
include('database_connection.php'); 

if (isset($_POST['place_order_btn'])) {
    $cus_id = $_POST['user_id'];
    $cover_id = $_POST['cover_id'];
    $cov_order_email = $_POST['cov_order_email'];
    $cov_order_firsrname = $_POST['cov_order_firsrname'];
    $cov_order_lastname = $_POST['cov_order_lastname'];
    $cov_order_phone = $_POST['cov_order_phone'];
    $cov_order_alternate_no = $_POST['cov_order_alternate_no'];
    $cov_order_address = $_POST['cov_order_address'];
    $cov_order_city = $_POST['cov_order_city'];
    $cov_order_pincode = $_POST['cov_order_pincode'];
    $paymentmode = $_POST['paymentmode'];
    $price = $_POST['price_'];
    $model_name = $_POST['model_name'];


    // Ensure model_name is provided
    if (!isset($_POST['model_name']) || empty($_POST['model_name'])) {
        die("Error: model_name is missing or empty");
    }
    $model_name = $_POST['model_name'];

    // ✅ Insert order into database
    $insert_query = "INSERT INTO `order_cover_table` 
        (`cus_id`, `cover_id`, `cov_order_email`, `cov_order_firsrname`, `cov_order_lastname`, 
        `cov_order_phone`, `cov_order_alternate_no`, `cov_order_address`, `cov_order_city`, 
        `cov_order_pincode`, `paymentmode`, `price`, `model`) 
        VALUES 
        ('$cus_id', '$cover_id', '$cov_order_email', '$cov_order_firsrname', '$cov_order_lastname', 
        '$cov_order_phone', '$cov_order_alternate_no', '$cov_order_address', '$cov_order_city', 
        '$cov_order_pincode', '$paymentmode', '$price', '$model_name')";

    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        // ✅ Fetch latest order details
        $order_query = "SELECT * FROM `order_cover_table` WHERE `cus_id`='$cus_id' ORDER BY ` cov_order_id` DESC LIMIT 1";
        $order_result = mysqli_query($conn, $order_query);
        $order_data = mysqli_fetch_assoc($order_result);

        // ✅ Fetch product details
        $product_query = "SELECT * FROM `add_cover_table` WHERE `cover_id`='$cover_id'";
        $product_result = mysqli_query($conn, $product_query);
        $product_data = mysqli_fetch_assoc($product_result);
        $product_name = $product_data['cover_name'];

        // ✅ Remove product from cart after successful order
        $cart_query = "DELETE FROM cover_cart_table WHERE cust_id = '$cus_id' AND cover_id = '$cover_id'";
        mysqli_query($conn, $cart_query);

        // ✅ Send order confirmation email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'piyushbharwad7990@gmail.com';  // Replace with your email
            $mail->Password = 'dwhpxfmieichgsqb';    // Replace with your app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('piyushbharwad7990@gmail.com', 'Team Skiver');
            $mail->addAddress($cov_order_email, $cov_order_firsrname);
            $mail->Subject = 'Order Confirmation - Your Order #'.$order_data[' cov_order_id'];

            // 📩 Email body with HTML format
            $mail->isHTML(true);
            $mail->Body = "
            <div style='max-width: 600px; margin: auto; background: #1e1e1e; color: #fff; padding: 20px; border-radius: 10px; font-family: Arial, sans-serif;'>
                
                <h2 style='color: #007bff; text-align: center;'>Skiver</h2>
                <p style='text-align: center; font-size: 16px;'>Dear <strong>$cov_order_firsrname $cov_order_lastname</strong>, thank you for shopping with us!</p>
        
                <hr style='border: 1px solid #333;'>
        
                <h3 style='color: #fff;'>🛍️ Order Details</h3>
                <p><strong>Order ID:</strong> #{$order_data[' cov_order_id']}</p>
                <p><strong>Order Date:</strong> {$order_data['o_date_cover']}</p>
        
                <hr style='border: 1px solid #333;'>
        
                <h3 style='color: #fff;'>💳 Payment Details</h3>    
                <p><strong>Payment Method:</strong> $paymentmode</p>
                <p><strong>Payment Status:</strong> " . ($paymentmode == 'Online' ? '<span style=\"color:green; font-weight:bold;\">Paid</span>' : '<span style=\"color:red; font-weight:bold;\">Pending</span>') . "</p>
        
                <hr style='border: 1px solid #333;'>
        
                <h3 style='color: #fff;'>📦 Product Details</h3>
                <table style='width: 100%; border-collapse: collapse; margin-top: 10px; background: #292929; border-radius: 5px;'>
                    <thead>
                        <tr style='background-color: #007bff; color: #fff; text-align: left;'>
                            <th style='padding: 10px;'>Product</th>
                            <th style='padding: 10px;'>Model</th>
                            <th style='padding: 10px;'>Price</th>
                            <th style='padding: 10px;'>Quantity</th>
                            <th style='padding: 10px;'>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style='border-bottom: 1px solid #444; text-align: left;'>
                            <td style='padding: 10px; color: #fff;'>$product_name</td>
                            <td style='padding: 10px; color: #fff;'>$model_name</td>
                            <td style='padding: 10px; color: #fff;'>₹$price</td>
                            <td style='padding: 10px; color: #fff;'>1</td>
                            <td style='padding: 10px; color: #fff;'>₹$price</td>
                        </tr>
                    </tbody>
                </table>
        
                <h2 style='color: #fff; text-align: right; padding: 10px;'>Total Paid: ₹$price</h2>
        
                <hr style='border: 1px solid #333;'>
        
                <h3 style='color: #fff;'>🚚 Delivery Address</h3>
                <p><strong>Name:</strong> $cov_order_firsrname $cov_order_lastname</p>
                <p>{$cov_order_address}, {$cov_order_city} - {$cov_order_pincode}</p>
        
                <hr style='border: 1px solid #333;'>
        
                <h3 style='color: #fff;'>📞 Contact Details</h3>
                <p><strong>Email:</strong> $cov_order_email</p>
                <p><strong>Phone:</strong> $cov_order_phone</p>
                <p><strong>Alternate Phone:</strong> $cov_order_alternate_no</p>
        
                <hr style='border: 1px solid #333;'>
        
                <p style='text-align: center; font-size: 16px;'>For any queries, contact us at <br> 
                    <a href='mailto:support@skiver.com' style='color: #007bff; text-decoration: none;'>support@skiver.com</a>
                </p>
            </div>
        ";
        
            $mail->send();
        } catch (Exception $e) {
            error_log("Email sending failed: " . $mail->ErrorInfo);
        }

        // ✅ Redirect to success page
        header('Location: success.php');
        exit();
    } else {
        echo "Order placement failed: " . mysqli_error($conn);
    }
}    
?>
