<?php

if (session_status()== PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['login'])){
    header("Location: loginform.php");
    exit();
}

//empty cart
$_SESSION['cart'] = '';

//set title
$page_title = "Exotic Animal Adoption Center Checkout";

//disply the header
require_once ('includes/header.php');

?>

<h2>Checkout</h2>

<p> Thank you for shopping with us. Your Donation is greatly appreciated. You will be notified once your items are shipped.</p>

<?php
    include ('includes/footer.php');
?>