<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$count=0;

//retrieve cart content
if (isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
    
    if ($cart){
        $count=array_sum($cart);
       
    }
}

//set cart image
$shoppingcart_img = (!$count) ? "shoppingcart_empty.gif":"shoppingcart_full.gif";

//variable for a user's login, name and role
$login = '';
$name = '';
$role = 0;

//if a user has logged in
if(isset($_SESSION['login']) AND isset($_SESSION['name']) AND isset($_SESSION['role'])){
    $login = $_SESSION['login'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];

}
?>


<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="www/css/adoption.css" />
        <title><?php echo $page_title; ?></title>
    </head>
    <body>
        <nav>
            <div id="header">
            Exotic Animal Adoption Center
            </div>
                <div >
                    <ul>
                        <li>
                        <a href="index.php" >HOME</a>
                        <li/>
                    
                        <li>
                        <a href="products.php">ADOPT</a>
                        </li>
              
                        <li>
                        <a href="bar3.php">SEARCH</a>
                        </li>
                        
                        <li>
                        <?php
                        if ($role ==1){
                            echo "<a href='addproducts.php'>ADD ANIMAL</a>";
                         }
                        if (empty($login)){
                            echo "<a href='loginform.php'>LOGIN</a>";
                        } else{
                             echo "<a href='logout.php'>LOGOUT</a>";
                             echo "<span style='color:black; text-align:center'>Welcome $name!</span>";
                            }
                         ?>
                        </li>
                        
                        <li>
                            <a href="showcart.php">CART                             
                                <span><?php echo $count ?> item(s)</span>
                            </a>
                        </div>
                        </li>
                    </ul>
                </div>
        </nav>
        
            <!-- main content body starts -->
            
