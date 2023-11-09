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
	<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã đơn hàng</th>
      <th scope="col">Ngày lập đơn</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col">Mã khách hàng</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
		<?php
			$count =0;
			while($row = mysqli_fetch_assoc($kq)){
				$count++;
				?>
				<tr>
					<td><?=$count?></td>
					<td><?=$row['order_id']?></td>
					<td><?=$row['order_date']?></td>
					<td><?=$row['name']?></td>
					<td><?=$row['price']?></td>
					<td><?=$row['customer_id']?></td>
					<td><?=$row['fullName']?></td>

					<td style="display: flex; gap:2px;">
							<a onclick="return del(<?=$row['order_id']?>)" href="index.php?a=xoadonhang&order_id=<?=$row['order_id']?>">
								<button class="btn btn-primary" style="margin-right: 10px;">Xóa</button>
							</a>
					</td>
					
				</tr>
				<?php
			}

		?>
</table>
			
		</section>

	</main><!-- End #main -->
	<script language="javascript" src="view/assets/js/template.js"></script>
    <script src="view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<script>
	const del =(name)=>{
		return confirm("Bạn có muốn xóa đơn hàng "+ name);
	}
</script>