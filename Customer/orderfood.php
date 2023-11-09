<?php
    include("main.php");
    include("../model/config.php");
    session_start();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $permission = $_SESSION['permission'];
    $quantity = $_POST['quantityFood'];
    $idFood = $_POST['idFood'];
    $id_customer = getIdCustomer($username,$password);
    $checkChange = false;
    $cart_id_ = "";
    if(!checkSignIn($username,$password,$permission)){
        header("location:login-page.php");
    }
    else{
        $query = "SELECT cart_id,quantity FROM carts where customer_id='$id_customer' and food_id='$idFood';";
        $excus = mysqli_query($conn,$query);
        $getResult = mysqli_fetch_assoc($excus);
        if($getResult['cart_id']!=null){
            $cart_id_ = $getResult['cart_id'];
            $sum = $quantity + $getResult['quantity'];
            $query = "UPDATE carts SET quantity = '$sum' where customer_id='$id_customer' and food_id='$idFood';";
            mysqli_query($conn,$query);
            $checkChange = true;
        }
        else{
            // max_id == null thì bảng carts database không có bản ghi nào
            // ngược lại là có bản ghi
            // kiểm tra nếu tên khách hàng có trong bảng carts thì giữ nguyên carts_id và customer_id và chỉ thay đổi food_id
            // nếu tên khách hnafg không có trong bản carts thì tăng carts_id
            $get_max_cart_id = "SELECT cart_id from carts order by cart_id desc limit 1;";
            $excute = mysqli_query($conn,$get_max_cart_id);
            $max_id_ = mysqli_fetch_assoc($excute);
            if($max_id_['cart_id']==null){
                $cart_id_ = 'CT01';
                $insert = "INSERT INTO carts values('CT01','$id_customer','$idFood','$quantity');";
                mysqli_query($conn,$insert);
                $checkChange = true;
            }
            else{
                $myquery = "SELECT customer_id from carts where customer_id = '$id_customer';";
                $check_id = mysqli_fetch_assoc(mysqli_query($conn,$myquery));
                if($check_id['customer_id']==null){
                    $number = substr($max_id_['cart_id'],strlen($max_id_['cart_id'])-2,strlen($max_id_['cart_id']));
                    $number++;
                    if($number<10){
                        $max_id_ = 'CT0'.$number;
                    }
                    else{
                        $max_id_ = 'CT'.$number;
                    }
                    $cart_id_ = $max_id_;
                    $insert = "INSERT INTO carts values('$max_id_','$id_customer','$idFood','$quantity');";
                    mysqli_query($conn,$insert);
                    $checkChange = true;
                } 
                else{
                    $myquery = "SELECT cart_id from carts where customer_id = '$id_customer' LIMIT 1;";
                    $excus = mysqli_query($conn,$myquery);
                    $cart_id = mysqli_fetch_assoc($excus);
                    $cis = $cart_id['cart_id'];
                    $cart_id_ = $cis;
                    $insert = "INSERT INTO carts values('$cis','$id_customer','$idFood','$quantity')";
                    mysqli_query($conn,$insert);
                    $checkChange = true;
                }
            }
       }
    }
    $_SESSION['cart_id_'] = $cart_id_;
    if($checkChange){
        $_SESSION['success'] = $checkChange;
        $_SESSION['message'] = "Thêm vào giỏ hàng thành công!";
    }
    else{
        $_SESSION['success'] = false;
        $_SESSION['message'] = "Không thể thêm vào giỏ hàng!";
    }
    header("location:fooddetailpage.php");
?>