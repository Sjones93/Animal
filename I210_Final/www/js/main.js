function confirm_deletion(productNum) {
    buttons = "<div style='color:black; font-size:small'> Are you sure you wanted to delete the product?<br><br>";
    buttons += "<input type='button' onclick=window.location.href='deleteproducts.php?productNum=" + productNum + "' value='  Delete  ' >";

    buttons += " <input type='button' onclick='cancel_deletion(" + productNum + ")' value='  Cancel  ' ></div>";
    
    document.getElementById("delete-buttons").innerHTML = buttons;
    
    console.log('deleted');
}

function cancel_deletion(productNum) {
    buttons = "<div><input type='button' value='  Delete Product  ' onclick='confirm_deletion(" + productNum + ")'></div>";
    document.getElementById("delete-buttons").innerHTML = buttons;
}