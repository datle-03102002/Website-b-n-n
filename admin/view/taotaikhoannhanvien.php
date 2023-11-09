<?php
  
  if(isset($_POST['tao'])){
    session_start();
    include "../model/config.php";
    $manv = $_POST['manv'];
    $check = false;
    while($row = mysqli_fetch_assoc($tk)){
      if($row['employee_id'] == $manv){
        $_SESSION['thongbao'] ="Mã nhân viên trùng";
        $check=true;
        break;
      }
    }
    if($check== false){
    $ten = $_POST['ten'];
    $a =  $_POST['GT'];
    if($a == 0){
      $GT="Nam";
    }
    else{
      $GT ="Nữ";
    }
    echo $GT;
    $cmt = $_POST['cmt'];
    $ngaysinh = date("Y-m-d",strtotime($_POST['ngaysinh']));
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
      $sql = "INSERT INTO employees VALUES ('$manv','$ten','$GT','$cmt','$ngaysinh','$sdt','$email','$password','Nhân viên')";
      $kq = mysqli_query($conn,$sql);
      if($kq){
      $_SESSION['thongbao'] ="Tạo thành công";
      }
      else{
      $_SESSION['thongbao'] ="Tạo không thành công";
      }
      mysqli_close($conn);
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tạo tài khoản nhân viên</title>
	<!--My icon-->
	<link href="view/assets/vendor/fontawesome/css/all.min.css" rel="stylesheet"/>
    <!--My vendor-->
	<link href="view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<!--My style-->
    <link href="view/assets/css/main.css" rel="stylesheet" type="text/css"/>

	<script language="javascript" src="main.js"></script>
  </head>
  <body >
		<!-- ======= Header ======= -->
		<header id="header" class="header fixed-top d-flex align-items-center">

		<div class="d-flex align-items-center justify-content-between">
		  <a href="index.html" class="logo d-flex align-items-center">
			
			<span class="d-none d-lg-block">Cửa hàng bán đồ ăn</span>
		  </a>
		  <i class="fa-solid fa-bars toggle-sidebar-btn"></i>
		</div><!-- End Logo -->

	</header><!-- End Header -->
		<aside id="sidebar" class="sidebar">

		<ul class="sidebar-nav" id="sidebar-nav">

			<li class="nav-item">
				<a class="nav-link" href="index.php?a=home">
				  <i class="fa-solid fa-house"></i>
				  <span>Trang chủ</span>
				</a>
			</li><!-- End Dashboard Nav -->
<li class="nav-item">
				<a class="nav-link" href="index.php?a=taotaikhoannhanvien">
				  <span>Tạo tài khoản nhân viên</span>
				</a>
			<li class="nav-item">
				<a class="nav-link" href="index.php?a=thongkedoanhthu">
				  <span>Thống kê doanh thu</span>
				</a>
			</li><!-- End Components Nav -->

			<li class="nav-item">
				<a class="nav-link" href="index.php?a=quanlydanhmucsanpham">
				  <span>Quản lý danh mục sản phẩm</span>
				</a>
			</li><!-- End Forms Nav -->

			<li class="nav-item">
				<a class="nav-link " href="index.php?a=baotrisanpham">
				  <span>Bảo trì sản phẩm</span>
				</a>
			</li><!-- End Tables Nav -->
			<li class="nav-item">
				<a class="nav-link " href="index.php?a=quanlytaikhoanvaphanquyen">
				  <span>Quản lý tài khoản và phân quyền</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="index.php?a=quanlydonhang">
				  <span>Quản lý đơn hàng</span>
				</a>
			</li><!-- End Tables Nav -->
		</ul>

	</aside><!-- End Sidebar-->
	
	<main id="main" class="main">
    <?php
      if(isset($_SESSION['thongbao'])){
        echo '<h3>'.$_SESSION['thongbao'].'</h3>';
        unset($_SESSION['thongbao']);
      }
    ?>
    <section class="section">
      <form action="#" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tạo tài khoản nhân viên</h5>
                <!-- Vertical Form -->
                <div class="row g-3">
                  <div class="col-12">
                    <label  class="form-label">Mã nhân viên:</label>
                    <input type="text" class="form-control" id="billCode" name="manv" required>
                  </div>
                  <div class="col-12">
                    <label  class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="ten" id="nameWarehouse" required>
                  </div>
                  <div class="col-12">
                   <label  class="form-label">Giới tính</label>
                    <!-- <input type="text" class="form-control" id="billProduct">  -->
                    <select class="form-select" name="GT" id="">
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="nameWarehouse4" class="form-label">Chứng minh thư</label>
                    <input type="text" class="form-control" name="cmt" id="nameWarehouse" required>
                  </div>
                  
                  <div class="btn-add-bill">
                    <button type="submit" name="tao" class="btn btn-primary">Tạo</button>
                  </div>
                </div><!-- Vertical Form -->
  
              </div>
            </div>
  
            
          </div>
  
          <div class="col-lg-6">
  
            <div class="card">
              <div class="card-body" style="padding-bottom: 73px;">
                <h5 class="card-title">...</h5>
  
                <!-- Vertical Form -->
                <div class="row g-3">
                  <div class="col-12">
                    <label for="nameWarehouse4" class="form-label">Ngày tháng năm sinh</label>
                    <input type="date" class="form-control" name="ngaysinh" required>
                  </div>
                  <div class="col-12">
                    <label for="nameProduct4" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="nameProduct" name="sdt" required>
                  </div>
                  <div class="col-12">
                    <label for="nameProduct4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                  </div>
                  <div class="col-12">
                    <label for="dateWarehouse4" class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" required>
                    
                  </div>
                 
                </div><!-- Vertical Form -->
  
              </div>
            </div>
  
          </div>
        </div>
      </form>
    </section>
	</section>
	</main>
    <script language="javascript" src="view/assets/js/template.js"></script>
    <script src="view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

