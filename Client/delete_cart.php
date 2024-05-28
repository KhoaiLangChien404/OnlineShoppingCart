<?php
include 'connect.php';
if(isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn,"DELETE FROM `cart` WHERE cart_id=$delete_id");
    if($delete_query) {
        echo "Product deleted";
        header('location:cart.php');
    }
    else {
        echo "Product not deleted";
        header('location:cart.php');
    }
}
?>