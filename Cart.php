<?php
// Start the session
session_start();

// Check if the product id is set
if(isset($_GET['id'])) {

    // If the cart is not set, create an empty array
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the product id is already in the cart
    if(isset($_SESSION['cart'][$_GET['id']])) {
        // If it is, increment the quantity
        $_SESSION['cart'][$_GET['id']]['quantity']++;
    } else {
        include 'db_conn.php';
        // If it isn't, add the product to the cart with a quantity of 1
        $sql = "SELECT * FROM pc_products WHERE prodid = {$_GET['id']}";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);

        $_SESSION['cart'][$_GET['id']] = array(
            'quantity' => 1,
            'name' => $product['prodName'],
            'price' => $product['prodPrice']
        );
    }
}

// Check if the "Clear Cart" button was clicked
if(isset($_POST['clear_cart'])) {
    // Clear the cart by unsetting the session variable
    unset($_SESSION['cart']);
}

?>






<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GameShop - Pc Cart</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="loggedin">
<?php include 'components/navbar.php'?>

<div class="container p-5 ">
<form action="" method="post">
    <button type="submit" name="clear_cart" class="btn btn-danger">Clear Cart</button>
    <a class="btn btn-warning text-white" href="productPageUser.php">Browse our Shop</a>
</form>

<?php

// Display the contents of the cart
if(isset($_SESSION['cart'])) {
    ?>

    <table class="table">
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Loop through the cart items and display them
        $total_price = 0;
        foreach($_SESSION['cart'] as $key => $value) {
            ?>
            <tr>
                <td><?php echo (is_array($value) ? $value['name'] : ""); ?></td>
                <td><?php echo (is_array($value) ? '$' . number_format($value['price'], 2) : ""); ?></td>
                <td>
                    <div class="form-group">
                        <input type="number" class="form-control" name="quantity" value="<?php echo (is_array($value) ? $value['quantity'] : ""); ?>" min="1" onchange="updateQuantity(this.value, <?php echo $key; ?>)">
                    </div>
                </td>
            </tr>
            <?php
            if(is_array($value)) {
                $total_price += $value['price'] * $value['quantity'];
            }
        }
        ?>
        <tr>
            <td>Total Price:</td>
            <td><?php echo '$' . number_format($total_price, 2); ?></td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <?php
} else {
    echo "Your cart is empty.";
}
?>


</div>

<script>
    function updateQuantity(quantity, product_id) {
        // Make an AJAX request to update the quantity in the cart
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "update_cart.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // If the update was successful, reload the page to update the cart
                location.reload();
            }
        };
        xhr.send("product_id=" + product_id + "&quantity=" + quantity);
    }
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

