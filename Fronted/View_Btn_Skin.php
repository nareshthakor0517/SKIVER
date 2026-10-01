<?php
session_start();
include('database_connection.php');


if (isset($_POST['selected_skin_btn'])) {
    $id = $_POST['selected_skin_id'];
    $Select_all_info = "SELECT * FROM `add_skin_table` WHERE `skin_id`='$id'";
    $cover_data = mysqli_query($conn, $Select_all_info);

    //  $info_data = mysqli_fetch_assoc($cover_data);

    // print_r($info_data);
    $sql = "SELECT model_name FROM model"; 
    $result = $conn->query($sql);

    ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">

<style>
body {
    margin-top: 5%;
    font-family: Arial, sans-serif;
}

header h1 {
    font-size: 2rem;
    font-weight: bold;
}

footer {
    background-color: #f8f9fa;
    padding: 10px 0;
}

.product-container {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.product-description {
    max-height: 200px;
    overflow-y: auto;
    margin-bottom: 20px;
}

.product-image {
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    max-width: 100%;
    height: auto;
    margin: 0 auto;
    /* Centers the image horizontally */
}

.product-price {
    font-size: 1.5rem;
    color: #28a745;
    font-weight: bold;
}

.old-price {
    text-decoration: line-through;
    color: #6c757d;
}

.form-container {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    /* Added margin-top for spacing between price and form */
}

.btn-danger {
    width: 100%;
    margin-top: 10px;
}

/* Custom Select2 style */
.select2-container .select2-selection--single {
    height: 40px;
    /* Keeps the height fixed */
}

.select2-container .select2-selection--single .select2-selection__rendered {
    line-height: 36px;
    /* Vertically center the text */
}

.form-select {
    margin-left: 0;
    /* Ensure no left margin, so it's aligned with the price */
}
</style>

<!-- Include jQuery (required by Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<div class="container my-4 product-container">

    <header class="text-center mb-4">
        <?php while ($info_data = mysqli_fetch_assoc($cover_data)) {
                ?>
        <h1><?php echo $info_data['skin_name']; ?></h1>
    </header>

    <main class="row">
        <!-- Product Image Section -->
        <section class="col-md-6 d-flex justify-content-center align-items-center">
            <img src="../Home_page/Cover_Img/<?php echo $info_data['skin_img']; ?>" class="img-fluid product-image"
                height="400px" width="350px">
        </section>

        <!-- Product Details Section -->
        <section class="col-md-6">
            <!-- Product Description -->
            <div class="product-description mb-4">
                <h5>Description:</h5>
                <p>
                    <?php echo $info_data['skin_discri']; ?>
                </p>
            </div>

            <!-- Product Price -->
            <h2 class="product-price mb-4 ">Rs.<?php echo $info_data['skin_price']; ?>/-</h2>

            <!-- Form Container -->
            <div class="form-container">
                <form action="V_Cart_Skin.php" method="POST">
                    <div class=" mb-4 ">
                        <label for="model" class="form-label ">Please Choose Your Phone Brand</label>
                        <select id="model" name="model" class="form-select" required>
                            <option selected disabled required>Select a model</option>
                            <!-- Vivo Series -->
                            <optgroup label="Vivo X Series">
                                <option value="Vivo X100 Pro+">Vivo X100 Pro+</option>
                                <option value="Vivo X90 Pro+">Vivo X90 Pro+</option>
                                <option value="Vivo X80 Pro+">Vivo X80 Pro+</option>
                                <option value="Vivo X70 Pro+">Vivo X70 Pro+</option>
                            </optgroup>
                            <optgroup label="Vivo Y Series">
                                <option value="Vivo Y200">Vivo Y200</option>
                                <option value="Vivo Y150">Vivo Y150</option>
                                <option value="Vivo Y78+">Vivo Y78+</option>
                                <option value="Vivo Y33T">Vivo Y33T</option>
                            </optgroup>
                            <optgroup label="Vivo V Series">
                                <option value="Vivo V29 Pro">Vivo V29 Pro</option>
                                <option value="Vivo V27e">Vivo V27e</option>
                                <option value="Vivo V23e">Vivo V23e</option>
                                <option value="Vivo V21e">Vivo V21e</option>
                            </optgroup>
                            <optgroup label="Vivo T Series">
                                <option value="Vivo T2x">Vivo T2x</option>
                                <option value="Vivo T1x">Vivo T1x</option>
                            </optgroup>

                            <!-- Oppo Series -->
                            <optgroup label="Oppo F Series">
                                <option value="Oppo F25 ">Oppo F25</option>
                                <option value="Oppo F23 Pro">Oppo F23 Pro</option>
                                <option value="Oppo F21s ">Oppo F21s</option>
                            </optgroup>
                            <optgroup label="Oppo Reno Series">
                                <option value="Oppo Reno10 Pro+">Oppo Reno10 Pro+</option>
                                <option value="Oppo Reno9">Oppo Reno9</option>
                                <option value="Oppo Reno7 Z">Oppo Reno7 Z</option>
                            </optgroup>
                            <optgroup label="Oppo Find Series">
                                <option value="Oppo Find X6">Oppo Find X6</option>
                                <option value="Oppo Find X5 Lite">Oppo Find X5 Lite</option>
                            </optgroup>

                            <!-- Samsung Series -->
                            <optgroup label="Samsung S Series">
                                <option value="Samsung S24 Ultra">Samsung S24 Ultra</option>
                                <option value="Samsung S23 Ultra">Samsung S23 Ultra</option>
                                <option value="Samsung S21 FE">Samsung S21 FE</option>
                            </optgroup>
                            <optgroup label="Samsung A Series">
                                <option value="Samsung A54 5G">Samsung A54 5G</option>
                                <option value="Samsung A34">Samsung A34</option>
                            </optgroup>
                            <optgroup label="Samsung F Series">
                                <option value="Samsung F14 5G">Samsung F14 5G</option>
                                <option value="Samsung F13">Samsung F13</option>
                            </optgroup>
                            <optgroup label="Samsung M Series">
                                <option value="Samsung M14 5G">Samsung M14 5G</option>
                                <option value="Samsung M12">Samsung M12</option>
                            </optgroup>
                            <optgroup label="Samsung Note Series">
                                <option value="Samsung Note 20 Ultra">Samsung Note 20 Ultra</option>
                                <option value="Samsung Note 9">Samsung Note 9</option>
                            </optgroup>

                            <!-- iPhone Series -->
                            <optgroup label="iPhone Series">
                                <option value="iPhone 15 Pro Max">iPhone 15 Pro Max</option>
                                <option value="iPhone 14 Plus ">iPhone 14 Plus</option>
                                <option value="iPhone 13 Mini ">iPhone 13 Mini</option>
                                <option value="iPhone 12 Pro Max">iPhone 12 Pro Max</option>
                                <option value="iPhone 11 Pro ">iPhone 11 Pro</option>
                                <option value="iPhone XS">iPhone XS</option>
                            </optgroup>

                            <!-- Motorola Series -->
                            <optgroup label="Motorola G Series">
                                <option value="Motorola G100">Motorola G100</option>
                                <option value="Motorola G60">Motorola G60</option>
                                <option value="Motorola G50">Motorola G50</option>
                            </optgroup>
                            <optgroup label="Motorola Edge Series">
                                <option value="Motorola Edge 40 Pro">Motorola Edge 40 Pro</option>
                                <option value="Motorola Edge 20 Fusion">Motorola Edge 20 Fusion</option>
                            </optgroup>
                            <optgroup label="Motorola E Series">
                                <option value="Motorola E40">Motorola E40</option>
                                <option value="Motorola E20">Motorola E20</option>
                            </optgroup>

                            <!-- iQOO Series -->
                            <optgroup label="iQOO Z Series">
                                <option value="iQOO Z8x">iQOO Z8x</option>
                                <option value="iQOO Z7 Pro">iQOO Z7 Pro</option>
                            </optgroup>
                            <optgroup label="iQOO Neo Series">
                                <option value="iQOO Neo 8">iQOO Neo 8</option>
                                <option value="iQOO Neo 7 Racing Edition">iQOO Neo 7 Racing Edition</option>
                            </optgroup>

                            <!-- OnePlus Series -->
                            <optgroup label="OnePlus Nord Series">
                                <option value="OnePlus Nord CE 3 Lite">OnePlus Nord CE 3 Lite</option>
                                <option value="OnePlus Nord 2T">OnePlus Nord 2T</option>
                            </optgroup>
                            <optgroup label="OnePlus Number Series">
                                <option value="OnePlus 12">OnePlus 12</option>
                                <option value="OnePlus 11R">OnePlus 11R</option>
                            </optgroup>

                            <!-- Nothing Series -->
                            <optgroup label="Nothing Series">
                                <option value="Nothing Phone (2)">Nothing Phone (2)</option>
                                <option value="Nothing Phone (1)">Nothing Phone (1)</option>
                            </optgroup>

                            <!-- Realme Series -->
                            <optgroup label="Realme Narzo Series">
                                <option value="Realme Narzo 70">Realme Narzo 70</option>
                                <option value="Realme Narzo 60x">Realme Narzo 60x</option>
                            </optgroup>
                            <optgroup label="Realme GT Series">
                                <option value="Realme GT 4">Realme GT 4</option>
                                <option value="Realme GT Neo 4">Realme GT Neo 4</option>
                            </optgroup>
                            <optgroup label="Realme X Series">
                                <option value="Realme X9">Realme X9</option>
                                <option value="Realme X50 Pro">Realme X50 Pro</option>
                            </optgroup>
                            <optgroup label="Realme V Series">
                                <option value="Realme V50">Realme V50</option>
                            </optgroup>

                            <!-- Xiaomi Series -->
                            <optgroup label="Xiaomi Series">
                                <option value="Xiaomi 14 Pro">Xiaomi 14 Pro</option>
                                <option value="Xiaomi Civi 3">Xiaomi Civi 3</option>
                                <option value="Xiaomi Mi 12">Xiaomi Mi 12</option>
                            </optgroup>

                            <!-- Poco Series -->
                            <optgroup label="Poco Series">
                                <option value="Poco F6">Poco F6</option>
                                <option value="Poco X6">Poco X6</option>
                                <option value="Poco M6 Pro">Poco M6 Pro</option>
                            </optgroup>

                            <!-- Google Pixel -->
                            <optgroup label="Google Pixel">
                                <option value="Google Pixel 8 Pro">Google Pixel 8 Pro</option>
                                <option value="Google Pixel 7 Pro">Google Pixel 7 Pro</option>
                                <option value="Google Pixel 6a">Google Pixel 6a</option>
                            </optgroup>

                            <!-- Asus Series -->
                            <optgroup label="Asus ROG">
                                <option value="Asus ROG Phone 8">Asus ROG Phone 8</option>
                                <option value="Asus ROG Phone 7 Ultimate">Asus ROG Phone 7 Ultimate</option>
                            </optgroup>

                            <!-- Infinix Series -->
                            <optgroup label="Infinix Series">
                                <option value="Infinix Zero Ultra">Infinix Zero Ultra</option>
                                <option value="Infinix Note 30 VIP">Infinix Note 30 VIP</option>
                                <option value="Infinix Hot 12">Infinix Hot 12</option>
                                <option value="Infinix Smart 10">Infinix Smart 10</option>
                            </optgroup>

                            <!-- Lava Series -->
                            <optgroup label="Lava Series">
                                <option value="Lava Agni 3">Lava Agni 3</option>
                                <option value="Lava Blaze 6G">Lava Blaze 6G</option>
                            </optgroup>

                            <optgroup label="New Models">
                                <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($row["model_name"]) . '">' . htmlspecialchars($row["model_name"]) . '</option>';
                }
            } else {
                echo '<option disabled>No Models Found</option>';
            }
            ?>
                            </optgroup>

                        </select>

                    </div>


                    <input type="hidden" name="sel_skin_id" value="<?php echo $info_data['skin_id']; ?>">



                    <button type="submit" name="add_btn" class="btn btn-danger w-100 mt-3">Add to Cart</button>


                </form>
            </div>
        </section>
    </main>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Initialize Select2 for the dropdown with search functionality
$(document).ready(function() {
    $('#model').select2({
        width: '100%' // Ensures the dropdown stays the same width as the container
    });

    // Show alert on change
    document.getElementById('model').addEventListener('change', function() {
        alert(`You selected ${this.value}!`);
    });
});
</script>
<?php } ?>
<?php } ?>