<?php 
include('..\Fronted\database_connection.php');

if (isset($_POST['Contactus_btn'])) {
    // Sanitize and assign inputs
    $contactus_name = $_POST['Contactus_name'];
    $contactus_email = $_POST['Contactus_email'];
    $contactus_subject = $_POST['Contactus_subject'];
    $contactus_message = $_POST['Contactus_message'];

    // Correct SQL query
    $Insert_data_contact_us = "INSERT INTO `contact_us_table` (`name`, `email`, `subject`, `message`) 
                               VALUES ('$contactus_name', '$contactus_email', '$contactus_subject', '$contactus_message')";

    // Execute query
    $Insert_query = mysqli_query($conn, $Insert_data_contact_us);

    // Check result
    if ($Insert_query) { 
        echo "Success: Data inserted successfully.";
        header('Location:home_page.php');
        exit(); // Ensure script stops after redirection
    } else {
        echo "Error: " . mysqli_error($conn); // Display error message
    }
}
?>
