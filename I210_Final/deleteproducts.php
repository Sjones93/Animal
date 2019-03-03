<?php

/*
 * Author: Stephen Jones
 * Date: 11/30/2018
 * File: deleteproducts.php
 * Description: File lets user delete a animal using its productNum
 *
 */
$page_title = "Exotic Animal Adoption Center Delete Animal";
require_once 'includes/header.php';
require_once('includes/database.php');

//if there were problems retrieving book id, the script must end.
if(!filter_has_var(INPUT_GET, 'productNum')) {
    echo "Deletion cannot continue since there were problems retrieving productNum";
    include ('includes/footer.php');
    exit;
}

//add your code here
$productNum = filter_input(INPUT_GET, 'productNum', FILTER_SANITIZE_NUMBER_INT);

//remove foreign key restraint
//mysql_query('SET foreign_key_checks = 0');

//define the MySQL delete statement
$sql = "DELETE FROM products WHERE productNum=$productNum";


//execute the query
 $query = @$conn->query($sql);

//restore foreign key
//mysql_query('SET foreign_key_checks = 1');

 
//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//confirm delete
echo "The animal has been deleted.  ";

//close database connection
$conn->close();

//display a confirmation message
echo "You have successfully deleted the animal from the database.<br><br>";

require_once 'includes/footer.php';