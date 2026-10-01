<?php
include('../Fronted/database_connection.php');

// session_start();
// if (!$_SESSION['cust_username']) {
//    header('location: ../Fronted/customer_login.php');
// }
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
    overflow: hidden; /* Ensures image does not overflow */
    border-radius: 10px; /* Optional: smooth edges */
}
.card img {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 10px; /* Smooth edges */
}

.card img:hover {
    transform: scale(1); /* Slight zoom effect */
    /* box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3); Smooth shadow */
}
.card img:hover {

    transform: scale(1);
}
.card img:hover {
  overflow:hiiden;
}
.card img:hover {
    transform:  scale(1.06);
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
</style>
<?php 

// $admin_id= $_SESSION['cust_username'];
// $select_name = "SELECT * FROM `customer_table` WHERE `cust_id`='$admin_id'";
// $select_name_run = mysqli_query($conn,$select_name);
// $data = mysqli_fetch_assoc($select_name_run);
// print_r($data); 


?>

<body style="background-color:	 #f7f2ee";>

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

// Count cart items from the database
$cart_count_query = "SELECT COUNT(*) as cart_count FROM `cover_cart_table` WHERE `cust_id`='$USER'";
$cart_count_result = mysqli_query($conn, $cart_count_query);
$cart_count_row = mysqli_fetch_assoc($cart_count_result);
$cart_count = $cart_count_row['cart_count'] ?? 0;
?>




<!-- User Dropdown -->
<li class="nav-item">
    <a class="btn btn-" href="../Fronted/customer_login.php">
        <i class="bi bi-person-circle" style="font-size: 1.2rem;"></i>
        <span class="ms-2">Login</span>
    </a>
</li>


                        <!-- <li class="nav-item dropdown mb-2">
                            <a class="nav-link dropdown-toggle" href="#" id="orderDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle" style="font-size: 1.2rem;margin-top: 10px;"></i>
                                <span class="ms-2 " style="margin-top: 100px;">Profile</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="orderDropdown">
                                <li><a class="dropdown-item"
                                        href="../Fronted/cover_order_details_customer.php">Cover</a></li>
                                <li><a class="dropdown-item" href="../Fronted/skin_order_details_customer.php">Skin</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>



    <!-- ///////////////////////////////////////////////////////// -->
    <div class="slider_show" style="bottom: 50;margin-top: 40px;">
    <div id="carouselExample" class="carousel slide carousel-container">
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img src="./img/4.png" class="d-block w-100" alt="..." height="680vh" width="100%">
            </div>
            <div class="carousel-item">
                <img src="ssf2.webp" class="d-block w-100" alt="..." height="680vh" width="100%">
            </div>
            <div class="carousel-item">
                <img src="img\c2.webp" class="d-block w-100" alt="..." height="680vh" width="100%">
            </div>
            <div class="carousel-item">
                <img src="ssf.webp" class="d-block w-100" alt="..." height="680vh" width="100%">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Navbar -->




<!-- cover Section -->
<section id="cover" class="pt-4" style="height: auto;">
    <?php

            include('../Fronted/database_connection.php');

            $Select_all_info = "SELECT * FROM `add_cover_table`";
            $cover_data = mysqli_query($conn, $Select_all_info);

            // $info_data = mysqli_fetch_assoc($car_data);

            // print_r($info_data);
            ?>
    <div class="container" style="margin-top: 10%;">
        <h2 class="text-center mb-4">Our Covers</h2>

        <div class="row g-4">
            <!-- cover Card -->
            <?php while ($info_data = mysqli_fetch_assoc($cover_data)) {
                        ?>
            <div class="col-md-4">
            <div class="card" style="background-color:rgb(208, 206, 209);">

                    <img src="Cover_Img/<?php echo $info_data['cover_img']; ?>" class="card-img-top  " 
                        alt="Mobile Cover 1">
                    <center>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $info_data['cover_name']; ?></h5>
                            <p class="card-text">Rs. <?php echo $info_data['cover_price'];?> /-</p>

                            <form action="../Fronted/customer_login.php" method="post">
                                <input type="hidden" value="<?php echo $info_data['cover_id']; ?>" name="selected_cover_id">
                                <button type="submit" name="selected_btn"  class="custom-btn">View</button>
                            </form>

                        </div>
                    </center>
                </div>

            </div>
            <?php
                        } ?>


        </div>
    </div>
</section>


<!-- skin Section -->
<section id="skin" class="pt-4" style="height: auto;">
    <?php
        include('../Fronted/database_connection.php');
        $Select_all_info = "SELECT * FROM `add_skin_table`";
        $skin_data = mysqli_query($conn, $Select_all_info);
    ?>
    <div class="container" style="margin-top: 10%;">
        <h2 class="text-center mb-4">Our Skins</h2>
        <div class="row g-4">
            <!-- skin card -->
            <?php while ($info_data = mysqli_fetch_assoc($skin_data)) { ?>
                <div class="col-md-4">
                <div class="card" style="background-color:rgb(225, 227, 231);">
                        <img src="Cover_Img/<?php echo $info_data['skin_img']; ?>" class="card-img-top img-fluid" alt="Skin Image">
                        <center>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $info_data['skin_name']; ?></h5>
                                <p class="card-text">Price: ₹<?php echo $info_data['skin_price']; ?> /-</p>
                                


                                
                                <!-- View Details Button -->
                                <form action="../Fronted/customer_login.php" method="post">
                                    <input type="hidden" value="<?php echo $info_data['skin_id']; ?>" name="selected_skin_id">
                                    <button type="submit" name="selected_skin_btn" class="custom-btn">View</button>
                                </form>
                            </div>
                        </center>
                    </div>
                    <br>
                </div>
            <?php } ?>
        </div>
    </div>
</section>


<!-- Footer -->
<footer class="bg-dark text-light py-3 text-center">

    <!-- About Us Section -->
    <section id="about" class="py-5">
        <div class="container" style="margin-top:3%;">
            <h2 class="text-center">About Us</h2>
            <p class="text-center">
                SKIVER is a leading provider of high-quality mobile accessories. We specialize in offering stylish and
                durable phone covers and skins that cater to every personality and need.
                Our mission is to deliver superior products that combine functionality with design, ensuring that your
                mobile device is both protected and stylish.
            </p>
            <p class="text-center">
                With a commitment to customer satisfaction, we strive to provide excellent service and a diverse range
                of products at affordable prices. Explore our collection today and give your phone a fresh, new look
                with SKIVER!
            </p>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center">Contact Us</h2>
            <form action="Contactus_Backend.php" method="post">
                <div class="d-flex justify-content-between">
                    <div class="mb-3 flex-fill me-2">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="Contactus_name" id="name" required>
                    </div>
                    <div class="mb-3 flex-fill me-2">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="Contactus_email" id="email" required>
                    </div>
                    <div class="mb-3 flex-fill me-2">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" name="Contactus_subject" id="subject" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" name="Contactus_message" id="message" rows="3" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" name="Contactus_btn" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
    </section>

    <p>&copy; 2025 SKIVER. All Rights Reserved.</p>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="script.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    console.log('Website Loaded');
});
</script>
</body>

</html>