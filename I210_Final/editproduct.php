<?php


$page_title = "Edit animal details";

require_once ('includes/header.php');
require_once('includes/database.php');

if (!filter_has_var(INPUT_GET, 'productNum')){
    echo 'Error: productNum was not found.';
    require_once ('includes/footer.php');
    exit();
}
$productNum = filter_input(INPUT_GET, 'productNum', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM products WHERE productNum=" . $productNum;

$query = $conn->query($sql);

$row = $query->fetch_assoc();


//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once ('includes/footer.php');
    exit;
}
//display results in a table
?>
<br><br>
<br>

<div class="addTitle">
    <h2>Edit Animal Details</h2>
</div>
<br>
<br>

<form name="editanimal" action="updateproduct.php" method="get">
    <table >
        <tr>
            <th>Animal ID</th>
            <td><input name="productNum" value="<?php echo $row['productNum'] ?>" readonly="readonly" /></td>
        </tr>
        <tr>
            <th>Animal Name</th>
            <td><input name="productName" value="<?php echo $row['productName'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Price</th>
            <td><input name="price" type="number" step="0.01"  value="<?php echo $row['price'] ?>"  step="any" required /></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><input  name="description" rows="6" cols="65" value="<?php echo $row['description'] ?>"  /></td>
        </tr>
          
    </table>
    <br>
<div class="inputs">
    &nbsp;&nbsp; <input type="submit" value="Update"> &nbsp;&nbsp;
    <input type='button' onclick="window.location.href='productdetails.php?productNum=<?php echo $row['productNum'] ?>'" value="Cancel"> &nbsp;&nbsp;
</div>
</form>


    
<br>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');
?>