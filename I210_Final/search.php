<html>
    <style>
        .desc{
            padding: 10px;
            padding-bottom: 50px;
         
            
        }
        .price{
            padding: 5px;
         
            
        }
        
        .title{
            padding-bottom: 5px;
            text-decoration: underline;
            /*text-transform: uppercase;*/
        }
        
        a {
            display: block;
            color: #4ABDAC;
            text-align: center;
            text-decoration: none;
            font-size: 20px;
        }

        td{
            text-align: center;
        }
        
    </style>
<?php


$servername = "localhost";
$username = "phpuser";
$password = "phpuser";
$dbname = "project";
if (isset($_POST['submit'])) {
    $search_value = $_POST["search"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo 'Connection Failed: ' . $con->connect_error;
    } else {
        $sql = "SELECT * FROM products where productNum like '%$search_value%' or productName like '%$search_value%' or description like '%$search_value%'";

        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) {
             echo '<table>';
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
           echo '<tr>';
                echo "<td> ", $row['description'], "</td>";
           echo '</tr>';
        echo '<tbody>';
        echo '</table>';
        echo '</div>';
        }
             
             
        }
    }

?>

</html>