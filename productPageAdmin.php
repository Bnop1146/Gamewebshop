<?php
include 'admin-only.php';
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
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/6b4a3d7b29.js" crossorigin="anonymous"></script>

</head>
<body class="loggedin loggedinbg">

<?php include 'components/navbar.php'; ?>


<!--Container Main start-->
<div class="container py-5">

    <a class="btn btn-warning w-25" href="insertPc.php">Insert</a>

    <div class="row mt-4">
        <table class="table ">
            <thead class="text-center">
            <tr>
                <th class="td-navn" scope="col">Pc name</th>
                <th class="td-dato" scope="col">Price pr m</th>
                <th class="td-email" scope="col">CPU</th>
                <th class="td-navn" scope="col">GPU</th>
                <th class="td-navn" scope="col">RAM</th>

                <th class="td-slet" scope="col">Delete</th>
                <th class="td-slet" scope="col">Edit</th>

            </tr>
            </thead>
        </table>


            <?php


            require 'db_conn.php';
                $sql = "SELECT * FROM pc_products";
                $result = mysqli_query($conn, $sql);
                $check_Data = mysqli_num_rows($result) > 0;


                if ($check_Data)
                {
                    // output data of each row
                    while($row = mysqli_fetch_array($result)) {

                        ?>

                        <table class="table table-bordered align-middle">
                            <tbody class="text-center  ">
                            <tr class="tr-table">
                                <td class="td-navn "><?php echo $row['prodName']; ?></td>
                                <td class="td-dato"><?php echo $row['prodPrice']; ?> pr. m</td>
                                <td class="td-email"><?php echo $row['prodCore']; ?></td>
                                <td class="td-navn"><?php echo $row['prodGpu']; ?></td>
                                <td class="td-navn"><?php echo $row['prodRam']; ?></td>


                                <td class="td-slet">
                                    <a href="deletePc.php?id=<?php echo $row['prodid']; ?>" onclick="return confirm('Are you sure you want to delete this product?');">
                                        <i class="text-danger fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                                <td class="td-slet">
                                    <a href="editPc.php?id=<?php echo $row['prodid']; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>


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


