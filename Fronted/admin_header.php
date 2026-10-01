<?php
session_start();   

if (!$_SESSION['admin_username']) {
    header('location: admin_login.php   ');
}
include('database_connection.php');
 
// $admin_data = $_SESSION['username'];

$admin=$_SESSION['admin_username'];

// $admin_data= $_SESSION['admin_username'];


  
// Admin Profile start
$all_data = "SELECT*FROM `admin_table` WHERE `admin_username`='$admin'";

$data_pro = mysqli_query($conn, $all_data);

$datas = mysqli_fetch_array($data_pro);


?>

    <title>SKIVER</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="admin_css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="admin_css/style.css" rel="stylesheet">

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-3 mb-3">
                    <h3 class="text-primary">SKIVER</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="admin_img/admin.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo$datas['admin_username'];?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="admin_Dashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2 mt-6"></i>Customer</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Add_customer.php" class="dropdown-item">Add Customer</a>
                            <a href="Manage_customer.php" class="dropdown-item">Manage Customer</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-plus me-2"></i>Add Products</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Add_Product_Cover.php" class="dropdown-item">Cover</a>
                            <a href="Add_Product_Skin.php" class="dropdown-item">Skin</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-gear-fill"></i> Manage product</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Manage_Product_Cover.php" class="dropdown-item">Cover</a>
                            <a href="Manage_Product_Skin.php" class="dropdown-item">Skin</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <i class="bi bi-cart-fill order-icon"></i> Order</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Order_Cover.php" class="dropdown-item">Cover</a>
                            <a href="Order_Skin.php" class="dropdown-item">Skin</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <i class="bi bi-phone" style="font-size: 22px; color: black;"></i> Model</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="Model.php" class="dropdown-item">Add Model</a>
                            <a href="Manage_Model.php" class="dropdown-item">Manage Model</a>
                        </div>
                    </div>
                  
                    <a href="../Fronted/Add_Contact_us.php" class="nav-link "><i class="bi bi-envelope-fill me-2  "></i>Contact Us</a>
           
                    <a href="admin_logout.php" class="nav-link dropdown-toggle" ><i class="fas fa-sign-out-alt me-2"></i>Log Out</a>
                      
                            
                        </div>
                        
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content ">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4 mt-3">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                       
                       
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="admin_img/admin.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo$datas['admin_username'];?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="admin_logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

