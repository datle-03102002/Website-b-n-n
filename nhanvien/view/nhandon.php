<?php
    include "../model/config.php";
    $order_id = $_GET['order_id'];
    $sql = "UPDATE orderdetail SET state=1 WHERE order_id = '$order_id'";
    mysqli_query($conn,$sql);
    header("location: index.php?a=xulydonhang");
?>
