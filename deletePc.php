<?php
include 'admin-only.php';
require 'db_conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // prepare the SQL statement using a parameterized query
    $sql = "DELETE FROM pc_products WHERE prodid = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // bind the parameter to the statement
    mysqli_stmt_bind_param($stmt, "i", $id);

    // execute the statement
    mysqli_stmt_execute($stmt);

    // redirect the user back to the product list
    header('Location: productPageAdmin.php');
    exit;
}


