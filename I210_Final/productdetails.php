
<?php
$page_title = "Indiana Animal Adoption Center";
require 'includes/header.php';
require_once ('includes/database.php');

//retrive product num from query string
if (!filter_has_var(INPUT_GET, 'productNum')){
    echo 'Error: product number was not found.';
    require_once ('includes/footer.php');
    exit();
}
$productNum = filter_input(INPUT_GET, 'productNum', FILTER_SANITIZE_NUMBER_INT);


//Select statement
$sql = "SELECT * FROM products WHERE productNum=" . $productNum;

//execute the query
$query = $conn->query($sql);

//recieve results 
$row = $query ->fetch_assoc();

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once ('includes/footer.php');
    exit;
}

?>
        <!--<link type="text/css" rel="stylesheet" href="www/css/adoption.css" />-->



<br>
<div>
<br>
<h2>Animal Details</h2>
<br>
<div >
    <table class="animalDetail">
        <div class="col1">
            <?php
           echo '<img src=', $row['image'], 'alt="" style="width: 425px"  />';
           ?>
        </div>

        <div class="col2">
            <p><?php echo $row['productName'] ?></p>   
        </div>
    <br>
        <div class="col3">
            <b>Price: </b>
            $<?php echo $row['price'] ?>
            <br>
            <h4>Description:</h4>
            <p><?php echo $row['description'] ?></p>
            <br>            <br>

            <button class="button" style="vertical-align:middle">
                <a style="text-decoration: none; color: white" href="addtocart.php?productNum=<?php echo $row['productNum'] ?> ">Add to cart</a>
            </button>
            
            <script src="www/js/main.js"></script>
            
            
            <button id="delete-buttons" class="button" style="vertical-align:middle" onclick="confirm_deletion(<?php echo $productNum ?>)"<span>Delete Animal</span></button>
            
            <button class="button">
                <a style="text-decoration: none; color: white" href="editproduct.php?productNum=<?php echo $row['productNum']?>">Edit</a>
            </button>        
        </div>
    </table>
</div>
</div>


<?php
require_once ('includes/footer.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

