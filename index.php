<?php
session_start();

// Check if the user is logged in and has admin user_type
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE && $_SESSION['user_type'] === 'admin') {
  // User is logged in as admin, display the admin page
} else {
  // User is not logged in or is not an admin
  $message = "You do not have access to these features.";
}
?>





<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GameShop - Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="">

<div class="container pt-5 mt-5">
    <!-- Display the message in a Bootstrap alert component -->
    <?php if(isset($message)) { ?>
        <div class="alert alert-danger row justify-content-center " role="alert">
            <p><?php echo $message; ?></p>
        </div>
    <?php } ?>
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-6 col-lg-4">
            <form action="login.php" method="post" class="border p-4">
                <div class="form-group">
                    <label for="username">E-mailadress</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Indtast din e-mailadresse" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Indtast din adgangskode" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <a href="signup.php" class="mt-3 d-block text-center">Don't have a user yet?</a>
            </form>
        </div>
    </div>
</div>









<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
