<?php
    session_start();
    $_SESSION['id_food'] = $_POST['id_food'];
    //echo $_POST['id_food'];
    header("location:fooddetailpage.php");
?>