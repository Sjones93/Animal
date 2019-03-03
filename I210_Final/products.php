<?php
$page_title = "Indiana Animal Adoption Center";
require 'includes/header.php';
require_once ('includes/database.php');

//select statement
$sql = "SELECT * FROM products";

//execute the query
$query = $conn->query($sql);

//Handle connection errors
if ($conn->connect_errno) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die("Connection to database failed: ($errno) $errmsg.");
}
?>


<div id="adopthero">
    <div id="adopthero-text">
        <p>ADOPTION</p>
    </div>
</div>
<br>
<h2 id="subtitle">Animals Avaliable for Adoption</h2>

<br>
   <?php
    //insert a row into the table for each row of data 
    while (($row = $query->fetch_assoc()) !== NULL){
        echo '<table class="animallist">';
        echo '<thead>';
           echo '<tr>';
                echo '<th>';
                echo '<img src=', $row['image'], 'alt="" style="width: 325px"  />';
                echo '</th>';
           echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
           echo '<tr>';
                echo "<td><a href=productdetails.php?productNum=", $row['productNum'],">", $row['productName'], "</a></td>";
           echo '</tr>';
           echo '<tr>';
                echo "<td> $", $row['price'], "</td>";
           echo '</tr>';
        echo '<tbody>';
        echo '</table>';
        echo '</div>';
        }
        ?>

<?php
require_once ('includes/footer.php');
	
