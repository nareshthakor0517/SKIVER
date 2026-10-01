<?php
include('../Fronted/database_connection.php');

session_start();

// $user_id = $_SESSION['cust_username']; // This is the user_id stored in session

// // Fetch user details from user_table
// $all_data = "SELECT * FROM `customer_table` WHERE `cust_id`='$user_id'";
// $data_pro = mysqli_query($conn, $all_data);

// $user_info = mysqli_fetch_assoc($data_pro);

    // Fetch user details from the database
    $user_id = $_SESSION['cust_username'];
    $all_data = "SELECT * FROM `customer_table` WHERE `cust_id`='$user_id'";
    $data_pro = mysqli_query($conn, $all_data);
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKIVER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<style>
/* ✅ Custom Dropdown Styling */
.navbar .dropdown-menu {
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    min-width: 150px;
    padding: 8px;
    max-height: 150px;
    /* overflow-y: auto; */
    transition: all 0.3s ease-in-out;
}

/* ✅ Cart Items */
.navbar .dropdown-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 12px;
    border-bottom: 1px solid #f1f1f1;
}

.navbar .dropdown-item:last-child {
    border-bottom: none;
}

/* ✅ Cart Icon */
.navbar .nav-link.dropdown-toggle {
    font-size: 1rem;
    font-weight: 600;
    color: #007bff;
    transition: 0.3s;
}

.navbar .nav-link.dropdown-toggle:hover {
    color: #0056b3;
}

.navbar .dropdown-menu p {
    text-align: center;
    color: #555;
}

/* ✅ Smooth Dropdown Animation */
.navbar .dropdown-menu {
    transform: translateX(-10px);
    opacity: 0;
    visibility: hidden;
}

.navbar .dropdown:hover .dropdown-menu {
    transform: translateY(0);
    opacity: 1;
    visibility: visible;
}

/* ✅ Checkout Button */
.checkout-btn {
    display: block;
    width: 100%;
    background-color: #007bff;
    color: white;
    text-align: center;
    padding: 10px;
    border-radius: 5px;
    font-weight: bold;
    margin-top: 10px;
    transition: 0.3s;
}

.checkout-btn:hover {
    background-color: #0056b3;
}

/* ✅ Improved Navbar Look */
.custom-navbar {
    background-color: #1a1a1a;
    padding: 10px 20px;
    border-bottom: 2px solid #00ff00;
}

.custom-navbar .nav-link {
    color: #00ff00;
    font-weight: bold;
}

.custom-navbar .nav-link:hover {
    color: #ffffff;
}

.hero-section {
    height: 80vh;
    background-size: cover;
    background-position: center;
}

.hero-section h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.hero-section p {
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
}

/* Custom CSS */
.custom-navbar {
    background-color: #12181b;
    /* Dark background */
    margin-top: 5px;
}

.custom-navbar .nav-link {
    color: rgb(0, 224, 67);
    /* White text */
    font-size: 1rem;
    padding: 0.4rem 1rem;
    transition: color 0.3s ease;
}

.custom-navbar .nav-link:hover {
    color: #00ff00;
    /* Highlight color */
}

.custom-navbar .nav-item.active .nav-link {
    color: #00ff00;
    /* Active item color */
}

.nav-link:hover {
    color: #000000fd;
}

/* card */
.card {
    overflow: hidden;
    /* Ensures image does not overflow */
    border-radius: 10px;
    /* Optional: smooth edges */
}

.card img {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 10px;
    /* Smooth edges */
}

.card img:hover {
    transform: scale(1);
    /* Slight zoom effect */
    /* box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3); Smooth shadow */
}

.card img:hover {

    transform: scale(1);
}

.card img:hover {
    overflow: hiiden;
}

.card img:hover {
    transform: scale(1.06);
}

/* view btn  */
.custom-btn {
    background: linear-gradient(45deg, #007bff, #0056b3);
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.custom-btn:hover {
    background: linear-gradient(45deg, #0056b3, #003d80);
    transform: scale(1.04);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.custom-btn:active {
    transform: scale(0.95);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* zkjbc */
.dropdown-menu {
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.dropdown-menu li {
    color: #333333;/ Text color / font-weight: bold;/ Make it pop /
}

.dropdown-menu li:hover {
    background: rgba(0, 0, 0, 0.1);/ Subtle hover effect / border-radius: 5px;
}
</style>
<?php 

$admin_id= $_SESSION['cust_username'];
$select_name = "SELECT * FROM `customer_table` WHERE `cust_id`='$admin_id'";
$select_name_run = mysqli_query($conn,$select_name);
$data = mysqli_fetch_assoc($select_name_run);
// print_r($data); 


?>

<body style="background-color:	 #f7f2ee" ;>

    <div class="heading" style="position: fixed; z-index: 1; width: 100%; top: 0;">
        <nav class="navbar navbar-expand-lg bg-body-tertiary"
            style="font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; letter-spacing: 1px;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="img/logo.jpg" alt="" height="50px" width="65px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home_page.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cover">Cover</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#skin">Skin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>





                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <?php
$USER = $_SESSION['cust_username'] ?? '';

$cover_count = 0;
$skin_count = 0;

// Calculate Cover Count
$select_data_cover = "SELECT COUNT(*) AS cover_count FROM `cover_cart_table` WHERE `cust_id`='$USER'";
$select_data_cover_run = mysqli_query($conn, $select_data_cover);
$cover_count_result = mysqli_fetch_assoc($select_data_cover_run);
$cover_count = $cover_count_result['cover_count'];

// Calculate Skin Count
$select_data_skin = "SELECT COUNT(*) AS skin_count FROM `skin_cart_table` WHERE `cust_id`='$USER'";
$select_data_skin_run = mysqli_query($conn, $select_data_skin);
$skin_count_result = mysqli_fetch_assoc($select_data_skin_run);
$skin_count = $skin_count_result['skin_count'];

// Total Count (Cover + Skin)
$total_count = $cover_count + $skin_count;

// count order
// Initialize order counts for covers and skins
$order_cover_count = 0;
$order_skin_count = 0;

// Count covers ordered by the customer
$select_data_order_cover = "SELECT COUNT(*) AS order_cover_count FROM `order_cover_table` WHERE `cus_id`='$USER' AND `cover_id` IS NOT NULL";
$select_data_order_cover_run = mysqli_query($conn, $select_data_order_cover);
$order_cover_count_result = mysqli_fetch_assoc($select_data_order_cover_run);
$order_cover_count = $order_cover_count_result['order_cover_count'];

// Count skins ordered by the customer
$select_data_order_skin = "SELECT COUNT(*) AS order_skin_count FROM `order_skin_table` WHERE `cus_id`='$USER' AND `skin_id` IS NOT NULL";
$select_data_order_skin_run = mysqli_query($conn, $select_data_order_skin);
$order_skin_count_result = mysqli_fetch_assoc($select_data_order_skin_run);
$order_skin_count = $order_skin_count_result['order_skin_count'];

// Total Order Count (Cover + Skin)
$total_order_count = $order_cover_count + $order_skin_count;

?>

                        <nav class="navbar navbar-expand-lg ">
                            <div class="container-fluid">

                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ms-auto">
                                        <!-- Order Dropdown -->
                                        <li class="nav-item dropdown mb-2">
                                            <a class="nav-link dropdown-toggle" href="#" id="orderDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-bag-check" style="font-size: 1.2rem;"></i>
                                                <span class="ms-2 ">Orders <span>(<?php echo $total_order_count; ?>)</span></span>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="orderDropdown">
                                                <li><a class="dropdown-item"
                                                        href="../Fronted/cover_order_details_customer.php">Cover <strong>(<?php echo $order_cover_count; ?>)</strong></a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="../Fronted/skin_order_details_customer.php">Skin
                                                        <strong>(<?php echo $order_skin_count; ?>)</strong>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item  cart-hover">
                                            <a class="nav-link d-flex align-items-center"
                                                href="../Fronted/V_Cart_Btn.php">
                                                <span class="ms-1 mt-1">🛒 View Cart (<span
                                                        id="cart-count"><?php echo $total_count; ?></span>)</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>


                        </li>


                        <!-- User Dropdown -->
                        <li class="nav-item">
                        <?php $user_info = mysqli_fetch_assoc($data_pro); ?>
                            <a class="btn btn- nav-link d-flex align-items-center" href="profile.php">
                                <i class="bi bi-person-circle mt-2" style="font-size: 1.2rem;"></i>
                                
                                <span class="ms-2 mt-2"><?php echo htmlspecialchars($user_info['cust_username']); ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>