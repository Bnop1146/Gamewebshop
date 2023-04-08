<?php
require 'db_con/init.php';


if (!empty($_POST["data"])) {
    $data = $_POST["data"];

    // Hash the password
    $hashed_password = password_hash($data["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO accounts (username, password, uname, phone, user_type) VALUES
                                    (:username, :password, :uname, :phone, :user_type)";
    $bind = [
        ":username" => $data["username"],
        ":password" => $hashed_password,
        ":uname" => $data["uname"],
        ":phone" => $data["phone"],
        ":user_type" => "user", // Set the user_type to "user" by default
    ];

    $db->sql($sql, $bind, false);

    header('Location: index.php');
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
    <title>GameShop - Signup</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="loggedin loggedinbg">


<div class="container pt-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-6 col-lg-4">
            <form action="signup.php" method="post" enctype="application/x-www-form-urlencoded" class="border p-4">
                <div class="form-group">
                    <label for="username">E-mailadresse</label>
                    <input type="email" class="form-control" name="data[username]" id="username" placeholder="Write your Email" value="" required>
                </div>
                <div class="form-group">
                    <label for="password">Adgangskode</label>
                    <input type="password" class="form-control" name="data[password]" id="password" placeholder="Write your Password" required>
                </div>
                <div class="form-group">
                    <label for="uname">Name</label>
                    <input type="text" class="form-control" name="data[uname]" id="uname" placeholder="Write your name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Telefon nummer</label>
                    <input type="number" class="form-control" name="data[phone]" id="phone" placeholder="Write your Phone number" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit form</button>
                <a href="index.php" class="mt-3 d-block text-center">Already have a user?</a>
            </form>
        </div>
    </div>
</div>







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

