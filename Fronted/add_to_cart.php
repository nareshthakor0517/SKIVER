<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cover_id = $_POST['cover_id'];
    $cover_name = $_POST['cover_name'];
    $cover_price = $_POST['cover_price'];

    $cart_item = [
        'id' => $cover_id,
        'name' => $cover_name,
        'price' => $cover_price,
        'quantity' => 1
    ];

    // Agar session me cart nahi hai, to naye array se initialize kare
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Agar product pehle se cart me hai, quantity badhaye
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $cover_id) {
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }

    // Naya item add kare agar pehle se nahi hai
    if (!$found) {
        $_SESSION['cart'][] = $cart_item;
    }

    header("Location: home.php"); // Home page par redirect kare
    exit();
}
?>
