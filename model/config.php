<?php
$servername = "localhost";
$usname = "root";
$userpass ="";
$database ="restaurant";
$conn = mysqli_connect($servername,$usname,$userpass,$database);
if(!$conn){
    die ("Không kết nối được cơ sở dữ liệu");
}
?>