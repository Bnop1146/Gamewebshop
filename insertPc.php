<?php
include 'admin-only.php';
require 'db_con/init.php';



if (!empty($_POST["data"])) {
    $data = $_POST["data"];
    $file = $_FILES;

    $sql = "INSERT INTO pc_products (prodPrice, prodName, prodCore, prodGpu, prodRam, prodImg) VALUES
                                    (:prodPrice, :prodName, :prodCore, :prodGpu, :prodRam, :prodImg)";
    $bind = [
        ":prodPrice" => $data["prodPrice"],
        ":prodName" => $data["prodName"],
        ":prodCore" => $data["prodCore"],
        ":prodGpu" => $data["prodGpu"],
        ":prodRam" => $data["prodRam"],
        ":prodImg" => (!empty($file["prodImg"]["tmp_name"])) ? $file["prodImg"]["name"] : NULL,
    ];

    $db->sql($sql, $bind, false);

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
    <div class="row justify-content-center mt-5 pt-5">
        <form class="p-3 border" method="post" action="insertPc.php" enctype="multipart/form-data">
            <div class="">
                <div class="col-12">
                    <div class="form-group">
                        <label for="prodName">Name of the PC</label>
                        <input class="form-control" type="text" name="data[prodName]" id="prodName"
                               placeholder="Name of the Pc" value="">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="prodPrice">Product price</label>
                        <input class="form-control" type="number" name="data[prodPrice]" id="prodPrice"
                               placeholder="Price of the Pc" value="">
                    </div>
                </div>



                <div class="col-12">
                    <div class="form-group">
                        <label for="prodCore">Name for the product CPU</label>
                        <input class="form-control" type="text" name="data[prodCore]" id="prodCore"
                               placeholder="Name and Type of CPU" value="">
                    </div>
                </div>



                <div class="col-12">
                    <div class="form-group">
                        <label for="prodGpu">Name for the product Graphics Card</label>
                        <input class="form-control" type="text" name="data[prodGpu]" id="prodGpu"
                               placeholder="Name and Type of GPU" value="">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="prodRam">Name and amount of RAM in the PC</label>
                        <input class="form-control" type="text" name="data[prodRam]" id="prodRam"
                               placeholder="Name and Type of RAM" value="">
                    </div>
                </div>


                <div class="col-12">
                    <label class="form-label" for="prodImg">An image for the product</label>
                    <input type="file" class="form-control" id="prodImg" name="prodImg">
                </div>


                <hr class="p-1 mt-3">


                <div class="col-3 ">
                    <button class=" btn btn-primary text-white-50" type="submit" id="btnSubmit">
                        Create new PC
                    </button>
                </div>
            </div>
        </form>
    </div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
