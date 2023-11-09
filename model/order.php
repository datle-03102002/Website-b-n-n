<?php
function getAll_order(){
    include "config.php";
    $sql = "SELECT order_.order_id,order_date,foods.name,foods.price,customers.customer_id, 
    customers.fullName FROM order_ INNER JOIN customers ON order_.customer_id =  customers.customer_id
     INNER JOIN orderdetail ON order_.order_id = orderdetail.order_id INNER JOIN foods ON 
     foods.food_id = orderdetail.food_id";
    $kq = mysqli_query($conn,$sql);
    mysqli_close($conn);
    return $kq;
}
?>