<?php
session_start();
// Change this to your connection info.

require 'db_con/init.php';


// Now we check if the data from the login form was submitted, isset() will check if the data exists.

if (!isset($_POST['username'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Udfyld venligst både E-mail og Adgangskode felterne!');
}

$sql = "SELECT id, password, user_type FROM accounts WHERE username = :username";
$bind = [":username" => $_POST['username']];
$stmt = $db->sql($sql, $bind);

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $db->sql($sql, $bind)) {

    if (count($stmt) > 0) {

        $password = $stmt[0]->password;
        $id = $stmt[0]->id;
        $user_type = $stmt[0]->user_type;

        // Account exists, now we verify the password.
        // Note: I am using Hashed password for my verification.
        // Verify the password
        if (password_verify($_POST['password'], $password)) {
            // Password verification success!
            // Check the user type
            if ($user_type == "admin") {
                $_SESSION['user_type'] = 'admin';
                // Redirect to the admin page
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                header('Location: productPageAdmin.php');
            } else if ($user_type == "user") {
                $_SESSION['user_type'] = 'user';
                // Redirect to the user page
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                header('Location: productPageUser.php');

            } else {
                // Handle invalid user types
                echo "Invalid user type";
                exit();
            }
        } else {
            // Password verification failed
            echo "Incorrect password";
            exit();
        }

        echo $_SESSION['user_type'];


    } else {
        // Incorrect username
        echo 'Incorrect username!';
    }
}

