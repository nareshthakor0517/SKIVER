<?php
session_start();
include('..\Fronted\database_connection.php');


if (isset($_POST['select_button'])) {
    $id = $_POST['select_glass_id'];
    $Select_all_info = "SELECT * FROM `add_glass_table` WHERE `glass_id`='$id'";
    $glass_data = mysqli_query($conn, $Select_all_info);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .product-page {
            display: flex;
            flex-direction: row;
            height: 100vh;
            width: 100vw;
        }

        .product-image {
            flex: 1;
            background-size: cover;
            background-position: center;
        }

        .product-details {
            flex: 1;
            padding: 50px;
            background-color: #fff;
            box-shadow: -5px 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: bold;
            color: #007bff;
        }

        .btn-container {
            display: flex;
            gap: 20px;
        }

        .btn {
            padding: 15px 30px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-buy-now {
            background-color: #28a745;
            color: white;
        }

        .btn-buy-now:hover {
            background-color: #218838;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #565e64;
        }
    </style>
</head>

<body>
    <div class="product-page">
        <?php while ($info_data = mysqli_fetch_assoc($glass_data)) { ?>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <img src="images/<?php echo $info_data['glass_img']; ?>" class="img-fluid product-image" height="400px" width="350px">
            </div>
            <div class="product-details">
                <h1><?php echo $info_data['glass_name']; ?></h1>
                <p><strong>Description:</strong> <?php echo $info_data['glass_info']; ?></p>
                <p class="product-price">Price: ₹ <span id="price"><?php echo $info_data['glass_price']; ?></span></p>

                <!-- Add to Cart Form -->
                <form action="backend_cart_store_.php" method="post">
                    <input type="hidden" name="select_glass_id" value="<?php echo $info_data['glass_id']; ?>">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1" onchange="updateTotalPrice(<?php echo $info_data['glass_price']; ?>)">
                    <p class="product-price">Total: ₹ <span id="total_price"><?php echo $info_data['glass_price']; ?></span></p>
                    <button class="btn btn-primary" name="backend_cart_store_btn">Add to Cart</button>
                </form>

                <!-- Buy Now Form -->
                <form action="checkout.php" method="POST">
                    <input type="hidden" name="glass_ID" value="<?php echo $info_data['glass_id']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn btn-buy-now">Buy Now</button>
                </form>

                <button class="btn btn-secondary"><a href="home_page.php" style="color: white;">Back to Products</a></button>
            </div>
        <?php } ?>
    </div>

    <script>
        function updateTotalPrice(price) {
            let quantity = document.getElementById("quantity").value;
            let total = price * quantity;
            document.getElementById("total_price").innerText = total;
        }
    </script>
</body>

</html>

<?php } ?>
