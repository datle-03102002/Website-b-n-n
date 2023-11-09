<?php
    function get_khachhang(){
        include "config.php";
        $sql = "SELECT * FROM customers";
        $kq = mysqli_query($conn,$sql);
        mysqli_close($conn);
        return $kq;
    }

?>