<?php
    include("../model/config.php.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username!=null && $password!=null){
        // lấy id mới nhất của bảng customer
        $sql = "SELECT customer_id from customers ORDER BY customer_id DESC LIMIT 1;";
        // thực thi truy vấn
        $rs = mysqli_query($conn,$sql);
        $r = mysqli_fetch_assoc($rs);
        
        if($r['customer_id']==null){
            $myQuery1 = "INSERT INTO customers(customer_id,email,password) VALUES('CS01','$username','$password');";
            mysqli_query($conn,$myQuery1);
        }
        else{
            $number = substr($r['customer_id'],strlen($r['customer_id'])-2,strlen($r['customer_id']));
            $number++;
            $id = "CS".$number;
            $myQuery2 = "INSERT INTO customers(customer_id,email,password) VALUES('$id','$username','$password');";
            mysqli_query($conn,$myQuery2);
        }
        mysqli_close($conn);
        header("location:login-page.php");
    }
?>
