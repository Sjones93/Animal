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
<style>
    .search{
        padding-top: 50px;
        padding-bottom: 400px;

    }

</style>
<div class="search" align="center">
    <h3>Search Animal Inventory</h3>
    <br>    <br>

    <form action="bar3.php" method="POST">
        <input type="text" name="search" placeholder="Search animals here...">
        <input type="submit" name="submit">
    </form>
    <br>
    <?php
    include_once 'search.php';
    ?>
    <div>
        <?php
        require 'includes/footer.php';
        ?>
    </div>
</div>