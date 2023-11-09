<?php
    include "config.php";
    $order_id= $_GET['order_id'];
    $food_id =$_GET['food_id'];
    $sql = "DELETE FROM orderdetail WHERE order_id = '$order_id' AND food_id='$food_id'";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("location: ../nhanvien/index.php?a=quanlydonhang");
?>