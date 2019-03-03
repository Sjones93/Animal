<?php

if (session_status() == PHP_SESSION_NONE){
    session_start();
}

if (isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
} else {
    $cart = array();
}

//if product num cant be found end script
if (!filter_has_var(INPUT_GET, 'productNum')){
        $error = "Product Num not found. Operation cannot proceed. <br><br>";
        header("Lcoation: error.php?m=$error");
        die();
}

//retrieve product num and make sure it is a number
$productNum = filter_input(INPUT_GET, 'productNum', FILTER_SANITIZE_NUMBER_INT);
if (!is_numeric($productNum)){
    $error = "Invalid product num. Operation cannot proceed. <br><br>";
    header("Location: error.php?m=$error");
    die();
}

if (array_key_exists($productNum, $cart)){
    $cart[$productNum] = $cart[$productNum] +1;
} else{
    $cart[$productNum] = 1;
}

//update session
$_SESSION['cart'] = $cart;

//redirect to the showcart page
header('Location: showcart.php');
?>