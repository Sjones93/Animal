<?php

/*
 * Author: Hannah Hostetter    
 * Date: 11/30/2018 
 * File: insertproducts.php
 *
 */
 
$page_title = "Animal Adopt Insert Animal";
require_once 'includes/header.php';
require_once('includes/database.php');
?>
<br><br>
        <link type="text/css" rel="stylesheet" href="www/css/adoption.css" />

<div class="insert">
<?php
//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'productName') ||
        !filter_has_var(INPUT_POST, 'price') ||
        !filter_has_var(INPUT_POST, 'image') ||
        !filter_has_var(INPUT_POST, 'description')) {   
    echo "There were problems retrieving animal details. New animal cannot be added.";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}


//retrieve, sanitize, and escape user's input from a form
$productName = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_STRING)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_URL)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

//define the MySQL insert statement

$sql = "INSERT INTO products VALUES (NULL, '$productName',  '$price', '$image', '$description')";

//execute the query
 $query = @$conn->query($sql);
 
//handle error
if(!$query) {
     $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    include 'includes/footer.php';
    exit;
}



// close the connection.
$conn->close();

//display a confirmation message and a link to display details of the new book
echo "You have successfully inserted the new animal into the database.";
?>
<br><br>
<br>

<button class="button">
    <a style="text-decoration: none; color: white" href="products.php">Animal Details</a>
</button> 
<br>

</div>


<?php
require_once 'includes/footer.php';
?>



