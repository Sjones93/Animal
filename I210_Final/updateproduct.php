<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "Update animal details";
 
require_once ('includes/header.php');
require_once('includes/database.php');
 
//retrieve, sanitize, and escape all fields from the form
$productNum = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'productNum', FILTER_SANITIZE_NUMBER_INT)));
$productName = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'productName', FILTER_SANITIZE_STRING)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING)));
 
//define MySQL update statement
 $sql = "UPDATE products SET   productName='$productName',     price='$price',     description = '$description' WHERE productNum=$productNum";
 //execute the query
 $query = @$conn -> query($sql);
         
         
 
//execute the query
 
 
//Handle selection errors
if(!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    include ('includes/footer.php');
    exit;
}
echo "Your page has been updated.";
 
// close the connection.
$conn->close();

include ('includes/footer.php');