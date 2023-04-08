<?php
session_start();

// Check if the user is logged in and has user_type 'admin'
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === TRUE && $_SESSION['user_type'] === 'admin') {
    // User is logged in as admin
} else {
    // User is not logged in or is not an admin
    $_SESSION['message'] = 'You do not have access to these features.';
    header('Location: ./index.php');
    exit();
}
