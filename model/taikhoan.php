<?php
    // lay thong tin tai khoan nhan vien
    function getTK(){
        include "config.php";
    $sql = "SELECT * FROM employees";   
    $kq = mysqli_query($conn,$sql);
    mysqli_close($conn);
    return $kq;
    }
?>