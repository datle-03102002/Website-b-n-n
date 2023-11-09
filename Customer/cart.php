<?php
    if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['permission'])){
    header("location:cart-page.php");
    }else{
    header("location:login-page.php");
    }
?>