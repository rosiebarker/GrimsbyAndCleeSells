<?php
session_start();

// Check if the productid is provided
if(isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    //Adds the product to the basket session variable
    if(!isset($_SESSION['basket'])) {
        $_SESSION['basket'] = array();
    }
    //Adds the product to the basket array with a default quantity of 1
    $_SESSION['basket'][$product_id] = 1;

    exit;
} else {
    //error handling
    echo "Error: Product ID is required.";
}
?>