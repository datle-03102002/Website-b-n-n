<?php
    session_start();
    include "../model/config.php";
    $employee_id = $_GET['employee_id'];
    $sql = "DELETE FROM employees WHERE employee_id='$employee_id'";
    $kq = mysqli_query($conn,$sql);
    if($kq){
        $_SESSION['thongbao'] ="Xóa thành công";
        header("location: index.php?a=quanlytaikhoanvaphanquyen");
    }
    else{
        $_SESSION['thongbao'] ="Có lỗi khi xóa";
        header("location: index.php?a=quanlytaikhoanvaphanquyen");
    }
?>