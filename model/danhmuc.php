<?php
    function get_danhmuc(){
        include "config.php";
        $sql = "SELECT * FROM menu";
      $kq = mysqli_query($conn,$sql);
      mysqli_close($conn);
      return $kq;
    }
?>