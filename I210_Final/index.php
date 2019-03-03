<?php
$page_title = "Exotic Animal Adoption Center";
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

<div id="hero">
    <div id="hero-text">
        <p>EXOTIC ANIMAL ADOPTION CENTER</p>
        <a href="products.php"><button class="button1" style="vertical-align:middle"><span>Adopt Now</span></button></a>
    </div>
</div>

<div>  
    
    <div></div>
    <br>
   
    <h2 id="subtitle">About Us</h2>
    <hr noshade style="color:#FC4A1A;size:4px;">
    <p id="p"> 
        The EAAC has brought a sophisticate level of care to each of its animals,
        providing them with proper nutritional diets, a high-degree of social 
        interaction, preventative medicines and prompt veterinary care.  
        The EAAC benefits from having an on-site clinic where we perform procedures when required.  
        This will typically include general veterinary care, tumor removals, 
        spay and neuter procedures, administering intravenous fluids and blood work.   
        The level of care provided at the EEAC for the long-term health of each animal is substantial.
        <br>
        Your gift adoption will go directly toward the care of one of our nearly 200 exotic animals.
        In return for your support,  you will receive a 5 x 7 photo of your sponsored animal and one
        pass to the center.
</p>

</div>
<div>
<?php
require 'includes/footer.php';
?>
</div>


