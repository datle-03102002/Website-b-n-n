
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ</title>
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
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã nhân viên</th>
      <th scope="col">Họ tên</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Quyền</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
		<?php
		$count=0;
			while($row =mysqli_fetch_assoc($tk)){
				$count++;
				?>
				<tr>
					<td><?=$count?></td>
					<td><?=$row['employee_id']?></td>
					<td><?=$row['fullName']?></td>
					<td><?=$row['email']?></td>
					<td><?=$row['password']?></td>
					<td>
						<?php
							if($row['permission']=="Nhân viên"){
								?>				
										Nhân viên
								<?php
							}
							else{
								?>	
										ADMIN	
								<?php
							}
						?>
					</td>
					<td style="display: flex; gap:2px;">
						<div>
							<a href="index.php?a=capquyentaikhoan&employee_id=<?=$row['employee_id']?>">
							<button class="btn btn-primary" type="submit">Cập nhật</button>
							</a>
						</div>
						<div>
							<a href="index.php?a=xoataikhoannhanvien&employee_id=<?=$row['employee_id']?>" onclick="return del('<?=$row['fullName']?>')">
							<button name="xoa" class="btn btn-primary">Xóa</button>
							</a>
						</div>
					</td>
				</tr>
				<?php
			}

		?>
</table>
		</section>

	</main>

			  <script language="javascript" src="view/assets/js/template.js"></script>
    <script src="view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<script>
	function del(name){
    	return confirm("Bạn có muốn xóa sản phẩm "+name+" không?" );
  	}
	
</script>