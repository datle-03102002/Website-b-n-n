<?php
   include "../model/config.php";
    $menu_id= $_GET['menu_id'];
    $sql = "DELETE FROM menu WHERE menu_id = '$menu_id'";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("location: index.php?a=quanlydanhmucsanpham");
?>