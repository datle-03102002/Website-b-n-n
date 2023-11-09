<?php
	
	
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tạo đơn</title>
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
			</li>
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
			</li>
		</ul>

	</aside><!-- End Sidebar-->
	<main id="main" class="main">
		<form action="#" method="post">
			 	<div class="row g-3">
                  <div class="col-5">
                    <label for="nameWarehouse4" class="form-label">Ngày bắt đầu</label>
                    <input type="date" class="form-control" name="ngaybatdau" required>
                  </div>
				  <div class="col-5">
                    <label for="nameWarehouse4" class="form-label">Ngày kết thúc</label>
                    <input type="date" class="form-control" name="ngayketthuc" required>
                  </div>
				</div>
			<button style="margin-top:15px" type="submit" name="thongke" class="btn btn-primary">Thống kê</button>
		</form>
		<table class="table" >
	<thead>
		<tr>
		<th scope="col">Tên sản phẩm</th>
		<th scope="col">Tên danh mục</th>
		<th scope="col">Tổng tiền đã bán</th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			if(isset($_POST['thongke'])){
			session_start();
			include "../model/config.php";
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$time = date("d-m-Y",time());
			$ngaybatdau = date("Y-m-d",strtotime($_POST['ngaybatdau']));
			$ngaykethuc = date("Y-m-d",strtotime($_POST['ngayketthuc']));

			$sql = "SELECT foods.name,orderdetail.food_id,menu.name, orderdetail.price,orderdetail.quantity 
			FROM orderdetail INNER JOIN foods ON foods.food_id = orderdetail.food_id INNER JOIN menu 
			ON menu.menu_id = foods.menu_id  INNER JOIN order_ ON order_.order_id = orderdetail.order_id WHERE order_date>='$ngaybatdau' AND order_date<='$ngaykethuc' 
			GROUP BY orderdetail.food_id;";
			$kq = mysqli_query($conn,$sql);
			$item = mysqli_fetch_assoc($kq);
			if($item==NULL){
				$_SESSION['thongbao']= "Chưa có sản phẩm nào được bán";
				echo '<td colspan="4"><h1>'.$_SESSION['thongbao'].'</h1></td>';
				unset($_SESSION['thongbao']);
			}
			else{
				$sql = "SELECT foods.name,orderdetail.food_id,menu.name as menu, SUM( orderdetail.price*orderdetail.quantity ) as total
				FROM orderdetail INNER JOIN foods ON foods.food_id = orderdetail.food_id INNER JOIN menu 
				ON menu.menu_id = foods.menu_id  INNER JOIN order_ ON order_.order_id = orderdetail.order_id WHERE order_date>='$ngaybatdau' AND order_date<='$ngaykethuc' 
				GROUP BY orderdetail.food_id";
				$kq = mysqli_query($conn,$sql);
				$tong=0;
				while($item =  mysqli_fetch_assoc($kq)){
					$tong += $item['total'];
					?>
					<tr>
					<td><?=$item['name']?></td>
					<td><?=$item['menu']?></td>
					
					<td><?=$item['total']?></td>
					</tr>
					<?php
				}
				?>
				<tr>
				<td colspan="2">Tổng tiền đã bán được</td>
				<td><?=$tong?></td>
			</tr>
			<?php
			}
					mysqli_close($conn);
					
			
			
		}
			
			?>
			
		
	</tbody>
	</table>
			
		</section>

	</main><!-- End #main -->
	<script language="javascript" src="view/assets/js/template.js"></script>
    <script src="view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>