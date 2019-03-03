<?php
/*
 * Author: Stephen Jones
 */
$page_title = "Animal Adopt Add Animal";
require_once 'includes/header.php';
?>
<br><br>
<br>


<div class="addTitle">
    <h2>Add New Animal</h2>
</div>
<br><br>
<form class="Add" action="insertproduct.php" method="post">
    <table cellspacing="0" cellpadding="3" style="border: 1px solid silver; padding:5px; margin-bottom: 10px">

       
        <tr>
            <td style="text-align: right">Animal Name: </td>
            <td><input name="productName" type="text" size="40" required /></td>
        </tr>
       
        <tr>
            <td style="text-align: right">Price: </td>
            <td><input name="price" type="number" step="0.01" required /></td>
        </tr>

         <tr>
            <td style="text-align: right">Image: </td>
            <td><input name="image" type="text" size="100" required /></td>
        </tr>
        
        <tr>
            <td style="text-align: right; vertical-align: top">Description:</td>
            <td><textarea name="description" rows="6" cols="65"></textarea></td>
        </tr>
    </table>
    <div class="inputs" >
        <input class="button" type="submit" value="Add Animal" />
        <input class="button" type="button" value="Cancel" onclick="window.location.href='addproducts.php'" />
    </div>
</form>

<?php
require_once 'includes/footer.php';