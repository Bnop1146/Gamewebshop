<?php
// Start the session
session_start();

// Check if the product id and quantity are set
if(isset($_POST['product_id']) && isset($_POST['quantity'])) {
    // Update the quantity in the cart
    $_SESSION['cart'][$_POST['product_id']]['quantity'] = $_POST['quantity'];
}


