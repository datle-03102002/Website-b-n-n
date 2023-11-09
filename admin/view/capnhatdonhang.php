<?php
    session_start();
    include "../model/config.php";
    $order_id = $_GET['order_id'];
    $state = $_GET['state'];
    $sql = "SELECT * FROM orderdetail where order_id='$order_id' ";
    $query = mysqli_query($conn,$sql);
    $kq = mysqli_fetch_assoc($query);
    if(isset($_POST['capquyen'])){
        $order_id = $_POST['order_id'];
        $state = $_POST['state'];
        $sql = "UPDATE orderdetail SET state='$state' where order_id='$order_id'";
        $query = mysqli_query($conn,$sql);
        if($query){
            header("location: index.php?a=quanlydonhang");
        }
        else{
            $_SESSION['thongbao']="Cập nhật không thành công";
            header("location: index.php?a=quanlydonhang");
        }
        
    }
    mysqli_close($conn);
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
				  <i class="fa-solid fa-user-plus"></i><span>Tạo tài khoản nhân viên</span>
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
    <a href="index.php?a=quanlydonhang">
      <button class="btn btn-primary" style="margin-bottom:10px;">Quay lại</button>
    </a>
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
                <h5 class="card-title">Cập nhật trạng thái giao hàng</h5>
                <!-- Vertical Form -->
                <div class="row g-3">
                  <div class="col-12">
                    <label for="billCode4" class="form-label">Mã đơn hàng</label>
                    <input type="text" class="form-control" id="billCode" name="order_id" required value="<?=$kq['order_id']?>">
                  </div>
                  <div class="col-12">
                   <label for="billProduct4" class="form-label">Mã sản phẩm</label>
                    <!-- <input type="text" class="form-control" id="billProduct">  -->
                    <input type="text" class="form-control" name="food_id" required value="<?=$kq['food_id']?>">
                  </div>
                  
                  <div class="col-12">
                    <label for="nameWarehouse4" class="form-label">Trạng thái</label>
                    <select class="form-select" name="state" id="">
                      <?php
                        if(0==$state){
                          ?>
                            <option value="0" selected>Chờ xử lý</option>
                            <option value="1" >Đang chuẩn bị hàng</option>
                            <option value="2">Đang giao hàng</option>
                            <option value="3" >Giao hàng thành công</option>
                            <option value="4">Đã hủy đơn hàng</option>
                        <?php
                        }
                        else if(1== $state){
                        ?>
                            <option value="0">Chờ xử lý</option>
                            <option value="1" selected>Đang chuẩn bị hàng</option>
                            <option value="2">Đang giao hàng</option>
                            <option value="3" >Giao hàng thành công</option>
                            <option value="4">Đã hủy đơn hàng</option>
                        <?php
                        }
                        else if(2== $state){
                            ?>
                                <option value="0">Chờ xử lý</option>
                            <option value="1" >Đang chuẩn bị hàng</option>
                            <option value="2" selected>Đang giao hàng</option>
                            <option value="3" >Giao hàng thành công</option>
                            <option value="4">Đã hủy đơn hàng</option>
                            <?php
                        }
                        else if(3== $state){
                            ?>
                                <option value="0">Chờ xử lý</option>
                            <option value="1" >Đang chuẩn bị hàng</option>
                            <option value="2" >Đang giao hàng</option>
                            <option value="3" selected>Giao hàng thành công</option>
                            <option value="4">Đã hủy đơn hàng</option>
                            <?php
                        }
                        else {
                            ?>
                                <option value="0">Chờ xử lý</option>
                            <option value="1" >Đang chuẩn bị hàng</option>
                            <option value="2" >Đang giao hàng</option>
                            <option value="3" >Giao hàng thành công</option>
                            <option value="4" selected>Đã hủy đơn hàng</option>
                            <?php
                        }
                        
                        
                      ?>
                    </select>
                  </div>
                  <div class="btn-add-bill">
                    <button type="submit" name="capquyen" class="btn btn-primary">Cập nhật</button>
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
