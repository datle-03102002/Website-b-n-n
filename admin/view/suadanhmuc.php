<?php
    include "../model/config.php";
    $menu_id =$_GET['menu_id'];
    $sql = "SELECT * FROM menu where menu_id='$menu_id'";
    $kq = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($kq);
    mysqli_close($conn);
    if(isset($_POST['sua'])){
            session_start();
            include "../model/config.php";
            $madm = $_POST['madm'];
            $tendm = $_POST['tendm'];
            $mota = $_POST['mota'];
            $sql = "UPDATE menu SET menu_id ='$menu_id',name='$tendm',description='$mota' WHERE menu_id='$menu_id'";
            $kq = mysqli_query($conn,$sql);
            if($kq){
                $_SESSION['thongbao'] ="Thêm thành công";
                echo '<script>alert("'.$_SESSION['thongbao'].'")</script>';
                header("location: index.php?a=quanlydanhmucsanpham");
            }
            else{
                $_SESSION['thongbao'] ="Thêm không thành công";
            }
            
        }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm danh mục</title>
	<!--My icon-->
	<link href="view/assets/vendor/fontawesome/css/all.min.css" rel="stylesheet"/>
    <!--My vendor-->
	<link href="view/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<!--My style-->
    <link href="view/assets/css/main.css" rel="stylesheet" type="text/css"/>

	<script language="javascript" src="view/assets/js/main.js"></script>
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
        <a href="index.php?a=quanlydanhmucsanpham">
            <button class="btn btn-primary" style="margin-bottom:10px;">Quay lại</button>
        </a>
        <?php
        if(isset($_SESSION['thongbao'])){
            echo '<h3>'.$_SESSION['thongbao'].'</h3>';
            unset($_SESSION['thongbao']);
        }
        ?>
	<section class="section">
      <form action="#" method="post">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Sửa danh mục sản phẩm</h5>
                <!-- Vertical Form -->
                <div class="row g-3">
                  <div class="col-12">
                    <label for="billCode4" class="form-label">Mã danh mục</label>
                    <input type="text" class="form-control" id="billCode" name="madm" required value="<?=$row['menu_id']?>">
                  </div>
                  <div class="col-12">
                    <label for="billProduct4" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" id="billProduct" name="tendm" required value="<?=$row['name']?>">
                  </div>
                  <div class="col-12">
                    <label for="nameWarehouse4" class="form-label">Mô tả</label>
                    <input type="text" class="form-control" id="nameWarehouse" name="mota" required value="<?=$row['description']?>">
                  </div>
                  <div class="btn-add-bill">
                    <button type="submit" name="sua" class="btn btn-primary">Sửa</button>
                  </div>
                </div><!-- Vertical Form -->
              </div>
            </div>            
          </div>
  
        </div>
      </form>
    </section>
		</section>
	</main><!-- End #main -->
	<script language="javascript" src="view/assets/js/template.js"></script>
    <script src="view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>