<?php
session_start();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GameShop - PC Shop</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b4a3d7b29.js" crossorigin="anonymous"></script>

</head>
<body class="loggedin loggedinbg">

<?php include 'components/navbar.php'; ?>


<!--Container Main start-->
<div class="container p-5">

    <h1>PC shop</h1>

    <div class="row">


        <?php


        require 'db_conn.php';
        $sql = "SELECT * FROM pc_products";
        $result = mysqli_query($conn, $sql);
        $check_Data = mysqli_num_rows($result) > 0;


        if ($check_Data)
        {
            // output data of each row
            while($row = mysqli_fetch_array($result)) {
                $product_id = $row['prodid'];
                ?>
            <div class="col-4">
                <div class="card my-3">

                    <div class="card-body  d-flex flex-column justify-content-between">
                        <div class="text-center">
                            <img src="uploads/<?php echo $row['prodImg']; ?>" class="card-img-top" alt="OI">
                            <h5 class="card-title text-black mt-5 "><?php echo $row['prodName']; ?></h5>
                            <p class="text-muted mb-3">Fra <?php echo $row['prodPrice']; ?> kr/md.</p>

                            <p class="card-text p-1 text-black"><?php echo $row['prodCore']; ?></p>
                            <p class="card-text p-1 text-black"><?php echo $row['prodGpu']; ?></p>
                            <p class="card-text p-1 text-black"><?php echo $row['prodRam']; ?></p>


                        </div>
                        <a href="Cart.php?id=<?php echo $product_id; ?>"
                           class="btn btn-success w-100 mt-4 text-white">
                            Add to Cart

                        </a>
                    </div>
                </div>
            </div>

                <?php


            }
        } else {
            echo "0 results found";
        }

        ?>





    </div>
</div>
<!--Container Main end-->



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

