<?php
    include('../model/config.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $permission = $_POST['permission'];
    
    // khởi tạo session
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['permission'] = $permission;
    
    echo $username."\t".$password."\t".$permission." check\n";
    
    if($permission == 'Customer'){
      // tạo truy vấn
      $sql = "SELECT email,password from customers";
      
      $rs = mysqli_query($conn,$sql);
      while($r=mysqli_fetch_assoc($rs)){
        echo $r['email']." ".$r['password']."<br>";
        if((strcmp($username,$r['email'])==0) &&(strcmp($password,$r['password'])==0)){
          echo '<h1>Đăng nhập tài khoản khách hàng thành công</h1>';
          header("location:index.php");
          return;
        }
      }
      header("location:login-page.php");
    }
    else{
      if($permission=='Admin'){
        header("location:../admin/index.php");
      }
      else{
        $sql = "SELECT email,password,permission from employees";
        $rs = mysqli_query($conn,$sql);
        while($r=mysqli_fetch_assoc($rs)){
          echo $r['email']."\t".$password;
          if((strcmp($username,$r['email'])==0) &&(strcmp($password,$r['password']==0))){
            header("location:../nhanvien/index.php");
            return;
          }
        }
        header("location:login-page.php");
      }
    }
    
?>