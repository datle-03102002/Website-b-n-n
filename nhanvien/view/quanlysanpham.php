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
				</li><!-- End Tables Nav -->
		</ul>

	</aside><!-- End Sidebar-->
	
	<main id="main" class="main">
    <a href="index.php?a=themsanpham" >
      <button style="margin-bottom:10px" class="btn btn-primary" >Thêm sản phẩm</button>
    </a>
	<table class="table" style="text-algin: center">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Mã danh mục</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php
      
      $count =0;
      while($row = mysqli_fetch_assoc($kq)){
        $count++;
        ?>
        <tr>
          <td><?=$count?></td>
          <td><?=$row['food_id']?></td>
          <td><?=$row['name']?></td>
          <td><?=$row['menu_id']?></td>
          <td scope="row">
            <img style="width: 100px" src="<?=$row['images']?>" alt="anhr">
          </td>
          <td><?=$row['descriptions']?></td>
          <td><?=$row['price']?></td>
          <td><?=$row['quantity']?></td>
          <td >
            
              <a href="index.php?a=suasanpham&food_id=<?=$row["food_id"]?>" >
                <button class="btn btn-primary" style="display: flex; align-items: center"><i class="fa-solid fa-trash"></i>Sửa</button>
              </a>
          </td>
        </tr>
        <?php
      }
    ?>
  </tbody>
  
</table>
			
		</section>

	</main>

			  <script language="javascript" src="view/assets/js/template.js"></script>
    <script src="view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>