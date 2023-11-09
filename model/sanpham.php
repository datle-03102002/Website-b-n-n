<?php
    function get_sanPham(){
        include "config.php";
        $sql = "SELECT * FROM foods";
      $kq = mysqli_query($conn,$sql);
      mysqli_close($conn);
      return $kq;

    }
?>