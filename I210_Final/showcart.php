<?php
$page_title = "Shopping Cart";
require_once ('includes/header.php');
require_once('includes/database.php');
?>
<h2>My Shopping Cart</h2>
<?php
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include ('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];
?>
<table class="animallist">
    <tr>
        <th style="width: 500px">Name</th>
        <th style="width: 60px">Price</th>
        <th style="width: 60px">Quantity</th>
        <th style="width: 60px">Total</th>
    </tr>
<?php
//insert code to display the shopping cart content
//select statement
$sql = "SELECT productNum, productName, price FROM products WHERE 0 ";

//print_r($cart);
//echo "<br>";
//print_r(array_keys($cart));
//echo "<br>";


foreach (array_keys($cart) as $productNum) {
    $sql .= "OR productNum=$productNum";
}
//echo $sql;
//execute query

$query = $conn->query($sql);

//fetch product and display in a table
while ($row = $query->fetch_assoc()) {
    $productNum = $row['productNum'];
    $productName = $row['productName'];
    $price = $row['price'];
    $qty = $cart[$productNum];
    $total = $qty * $price;
    echo "<tr>",
    "<td><a href='productdetails.php?productNum=$productNum'>$productName</a></td>",
    "<td> $$price</td>",
    "<td>$qty</td>",
    "<td>$$total</td>",
    "</tr>";
}
?>
</table>
<br>
<div class="button">
    <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
    <input type="button" value="Cancel" onclick="window.location.href = 'products.php'" />
</div>
<br><br>

<?php
include ('includes/footer.php');
