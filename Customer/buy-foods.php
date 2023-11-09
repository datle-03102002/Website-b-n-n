<?php
    // Lấy ngày, tháng và năm hiện tạ
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include("../model/config.php");
    session_start();
    $currentDate = date("Y-m-d");
    $currentTime = date("H:i:s");
    // echo "Ngày hôm nay là: " . $currentDate . $currentTime . $_SESSION['username'];
    $total = $_POST['order_total'];
    $cart_id_ = "";
    $max_id_order = "";
    $status="";
    if(!isset($_SESSION['username'])){
    header('location:login-page.php');
    }
    else{
        $usname =$_SESSION["username"];
        $query = "SELECT customer_id FROM customers WHERE email = '$usname'";
        $r = mysqli_fetch_assoc(mysqli_query($conn, $query));
        $customer_id = $r['customer_id'];
       
        if(isset($_SESSION['cart_id_'])){
            $cart_id_ = $_SESSION['cart_id_'];
            if(isset($customer_id)){
                // lấy order_id
                $r = mysqli_fetch_assoc(mysqli_query($conn, "SELECT order_id FROM order_ ORDER BY order_id DESC LIMIT 1;"));
                if(!isset($r['order_id'])){
                    mysqli_query($conn, "INSERT INTO order_(order_id,customer_id,cart_id,order_date,order_time,total,order_status) VALUES('OR01','$customer_id','$cart_id_','$currentDate','$currentTime','$total',0);");
                }
                else{
                    $max_id_order = $r['order_id'];
                    $number = substr($max_id_order,strlen($max_id_order)-2,strlen($max_id_order));
                    $number++;
                    if($number<10){
                        $max_id_order = "OR0" . $number;
                    }
                    else{
                        $max_id_order = "OR" . $number;
                    }
                    mysqli_query($conn, "INSERT INTO order_(order_id,customer_id,cart_id,order_date,order_time,total,order_status) VALUES('$max_id_order','$customer_id','$cart_id_','$currentDate','$currentTime','$total',0);");
                }
            }
            // thêm vào bảng chi tiết đơn hàng
            // lấy danh sách sản phẩm trong giỏ hàng
            $exc = mysqli_query($conn, "SELECT order_id,food_id,quantity,total,order_status
            FROM carts INNER JOIN order_ ON carts.cart_id = order_.cart_id 
            WHERE carts.cart_id = '$cart_id_' 
            and order_date='$currentDate' 
            and order_time='$currentTime';");

            while($rss = mysqli_fetch_assoc($exc)){
                if($rss['food_id']!=null){
                $order_id = $rss['order_id'];
                $food_id = $rss['food_id'];
                $quantity = $rss['quantity'];
                $total = $rss['total'];
                if($rss['order_status']==0){
                    $status = "Chờ xử lý";
                }
                if($rss['order_status']==1){
                    $status = "Đang chuẩn bị hàng";
                }
                if($rss['order_status']==2){
                    $status = "Đang giao";
                }
                if($rss['order_status']==3){
                    $status = "Đã giao thành công";
                }
                if($rss['order_status']==4){
                    $status = "Đã hủy";
                }
                mysqli_query($conn, "INSERT INTO orderdetail(order_id,food_id,order_state,quantity,price,ship) VALUES('$order_id','$food_id','$status','$quantity',1000,0);");
                echo $order_id . "\t" . $food_id . "\t" . $quantity . "\t" . $total."\n";
                }
            }
        }
    }
    
    mysqli_close($conn);
    header("location:cart-page.php");
?>