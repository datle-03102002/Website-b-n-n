<?php
  if(isset($_GET['employee_id'])){
    include "../model/config.php";
    $employee_id = $_GET['employee_id'];
    $sql = "SELECT * FROM employees WHERE employee_id='$employee_id'";
    $query  = mysqli_query($conn,$sql);
    $kq = mysqli_fetch_assoc($query);
    mysqli_close($conn);
  }
  if(isset($_POST['capquyen'])){
    include "../model/config.php";
    $employee_id = $_POST['manv'];
    $permission = $_POST['quyen'];
    $sql = "UPDATE employees SET permission='$permission' WHERE employee_id='$employee_id'";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("location: index.php?a=quanlytaikhoanvaphanquyen");
  }
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cấp quyền cho tài khoản</title>
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
    <a href="index.php?a=baotrisanpham">
      <button class="btn btn-primary" style="margin-bottom:10px;">Quay lại</button>
    </a>
    <?php
      if(isset($_SESSION['thongbao'])){
        echo '<h3>'.$_SESSION['thongbao'].'</h3>';
        unset($_SESSION['thongbao']);
      }
    ?>
    <section class="section">
      <form action="index.php?a=capquyentaikhoan" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Cấp quyền tài khoản</h5>
                <!-- Vertical Form -->
                <div class="row g-3">
                  <div class="col-12">
                    <label for="billCode4" class="form-label">Mã nhân viên</label>
                    <input type="text" class="form-control" id="billCode" name="manv" required value="<?=$kq['employee_id']?>">
                  </div>
                  <div class="col-12">
                   <label for="billProduct4" class="form-label">Họ tên</label>
                    <!-- <input type="text" class="form-control" id="billProduct">  -->
                    <input type="text" class="form-control" name="hoten" required value="<?=$kq['fullName']?>">
                  </div>
                  <div class="col-12">
                    <label for="nameWarehouse4" class="form-label">Email</label>
                    <input type="text" class="form-control" name="Email" id="nameWarehouse" required value="<?=$kq['email']?>">
                  </div>
                  <div class="col-12">
                    <label for="nameWarehouse4" class="form-label">Quyền</label>
                    <select class="form-select" name="quyen" id="">
                      <?php
                        if($kq['permission']=="Nhân viên"){
                          ?>
                          <option value="Nhân viên" selected>Nhân viên</option>
                          <option value="ADMIN">ADMIN</option>
                          <?php
                        }
                        else{
                          ?>
                          <option value="Nhân viên" >Nhân viên</option>
                          <option value="ADMIN" selected>ADMIN</option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="btn-add-bill">
                    <button type="submit" name="capquyen" class="btn btn-primary">Cấp quyền</button>
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
