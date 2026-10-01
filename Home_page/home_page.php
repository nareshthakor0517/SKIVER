<?php

  include('header.php');
  
?>
<div class="slider_show" style="bottom: 50;margin-top: 40px;">
    <div id="carouselExample" class="carousel slide carousel-container">
        <div class="carousel-inner ">
            <div class="carousel-item active">
                <img src="./img/4.png" class="d-block w-100" alt="..." height="660vh" width="100%">
            </div>
            <div class="carousel-item">
                <img src="ssf2.webp" class="d-block w-100" alt="..." height="660vh" width="100%">
            </div>
            <div class="carousel-item">
                <img src="img\c2.webp" class="d-block w-100" alt="..." height="660vh" width="100%">
            </div>
            <div class="carousel-item">
                <img src="ssf.webp" class="d-block w-100" alt="..." height="660vh" width="100%">
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
                <div class="card" style="background-color:rgb(190, 190, 190);">
                    <img src="Cover_Img/<?php echo $info_data['cover_img']; ?>" class="card-img-top  "
                        alt="Mobile Cover 1">
                    <center>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $info_data['cover_name']; ?></h5>
                            <p class="card-text">Rs. <?php echo $info_data['cover_price'];?> /-</p>

                            <form action="../Fronted/View_Btn.php" method="post">
                                <input type="hidden" value="<?php echo $info_data['cover_id']; ?>"
                                    name="selected_cover_id">
                                <button type="submit" name="selected_btn" class="custom-btn">View</button>
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
                    <img src="Cover_Img/<?php echo $info_data['skin_img']; ?>" class="card-img-top img-fluid"
                        alt="Skin Image">
                    <center>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $info_data['skin_name']; ?></h5>
                            <p class="card-text">Price: ₹<?php echo $info_data['skin_price']; ?> /-</p>




                            <!-- View Details Button -->
                            <form action="../Fronted/View_Btn_Skin.php" method="post">
                                <input type="hidden" value="<?php echo $info_data['skin_id']; ?>"
                                    name="selected_skin_id">
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