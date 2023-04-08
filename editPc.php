<?php
include 'admin-only.php';
require 'db_conn.php';

// check if product ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // fetch product data from database
    $sql = "SELECT * FROM pc_products WHERE prodid = $id";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);

    // check if product exists in database
    if (!$product) {
        echo "Product not found";
        exit;
    }
} else {
    echo "Product ID not provided";
    exit;
}

// handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // sanitize user input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $core = mysqli_real_escape_string($conn, $_POST['core']);
    $gpu = mysqli_real_escape_string($conn, $_POST['gpu']);
    $ram = mysqli_real_escape_string($conn, $_POST['ram']);

    // update product data in database
    $sql = "UPDATE pc_products SET prodName = '$name', prodPrice = '$price', prodCore = '$core', prodGpu = '$gpu', prodRam = '$ram' WHERE prodid = $id";
    mysqli_query($conn, $sql);

    // redirect to product list page
    header('Location: productPageAdmin.php');
    exit;
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GameShop - Pc Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="loggedin">


<!-- HTML form to edit product data -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $product['prodName']; ?>">
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" name="price" value="<?php echo $product['prodPrice']; ?>">
                </div>

                <div class="form-group">
                    <label for="core">CPU:</label>
                    <input type="text" class="form-control" name="core" value="<?php echo $product['prodCore']; ?>">
                </div>

                <div class="form-group">
                    <label for="gpu">GPU:</label>
                    <input type="text" class="form-control" name="gpu" value="<?php echo $product['prodGpu']; ?>">
                </div>

                <div class="form-group">
                    <label for="ram">RAM:</label>
                    <input type="text" class="form-control" name="ram" value="<?php echo $product['prodRam']; ?>">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

