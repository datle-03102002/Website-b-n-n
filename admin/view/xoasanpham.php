
<?php
    
    include "../model/config.php";
    $food_id=$_GET['food_id'];
    $sql = "DELETE FROM foods WHERE food_id = '$food_id'";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("location: index.php?a=baotrisanpham");
?>