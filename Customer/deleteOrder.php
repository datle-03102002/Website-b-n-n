<?php
    include "../model/config.php";
    $food_id = $_GET['food_id'];
    $cart_id = $_GET['cart_id'];
    $customer_id = $_GET['customer_id'];
    echo $cart_id;
    echo $customer_id;
    mysqli_query($conn,"DELETE FROM carts WHERE food_id='$food_id' AND customer_id='$customer_id'");
    mysqli_close($conn);
    header("location: cart-page.php");
?>