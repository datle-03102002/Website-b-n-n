<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý đơn hàng</title>
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
					<a class="nav-link" href="index.php?a=danhsachkhachhang">
					<span>Danh sách khách hàng</span>
					</a>
					<li class="nav-item">
					<a class="nav-link " href="index.php?a=xulydonhang">
					  <span>Xử lý đơn hàng</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="index.php?a=quanlydonhang">
					  <span>Quản lý đơn hàng</span>
					</a>
				</li><!-- End Tables Nav -->
				<li class="nav-item">
				<a class="nav-link" href="index.php?a=quanlyvacapnhatsanpham">
				  <span>Quản lý và cập nhật sản phẩm</span>
				</a>
				</li><!-- End Components Nav -->

			

			<!-- End Tables Nav -->
		</ul>

	</aside><!-- End Sidebar-->
  
	<main id="main" class="main">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã đơn hàng</th>
      <th scope="col">Ngày lập đơn</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Giá bán</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
		<?php
			include "../model/config.php";
			$sql = "SELECT * FROM order_ INNER JOIN orderdetail ON order_.order_id = orderdetail.order_id INNER JOIN foods ON foods.food_id = orderdetail.food_id WHERE state=0";
			$kq = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($kq);
			if($row == Null){
					$_SESSION['thongbao'] = "Chưa có đơn hàng nào";
					echo '<td colspan="4"><h3>'.$_SESSION['thongbao'].'</h3></td>';
					unset($_SESSION['thongbao']);
			}
			else{
				$sql = "SELECT * FROM order_ INNER JOIN orderdetail ON order_.order_id = orderdetail.order_id INNER JOIN foods ON foods.food_id = orderdetail.food_id WHERE state=0";
				$kq = mysqli_query($conn,$sql);
				$count =0;
				while($row = mysqli_fetch_assoc($kq)){
					$count++;
					?>
					<tr>
						<td><?=$count?></td>
						<td><?=$row['order_id']?></td>
						<td><?=$row['orderDate']?></td>
						<td><?=$row['name']?></td>
						<td><img style="width:100px" src="<?=$row['images']?>" alt="ẢNH"></td>
						<td><?=$row['price']?></td>
						<td>Chờ xử lý</td>

						<td >
							<a href="index.php?a=nhandon&order_id=<?=$row['order_id']?>">
								<button class="btn btn-primary" style="margin-right: 10px;">Nhận đơn</button>
							</a>
						</td>
						
					</tr>
					<?php
				}
			}
			mysqli_close($conn);
		?>
</table>
			
		</section>

	</main><!-- End #main -->
	<script language="javascript" src="view/assets/js/template.js"></script>
    <script src="view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>