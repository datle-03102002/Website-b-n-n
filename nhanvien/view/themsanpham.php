
<?php
    if(isset($_POST['them'])){
        session_start();
        include "../model/config.php";
        $msp = $_POST['masp'];
        $checkmsp = false;
        while($row = mysqli_fetch_assoc($kq)){
          if($row['food_id']==$msp){
            $_SESSION['thongbao'] ="Mã sản phẩm trùng";
            $checkmsp= true;
            break;
          }
        }
        if($checkmsp==false){
            $madm = $_POST['madm'];
            $tensp = $_POST['tensp'];
            $gia = $_POST['gia'];
            $soluong = $_POST['soluong'];
            $target_dir="../uploads/";
            $file = $target_dir.basename($_FILES['anh']['name']);
            $mota = $_POST['mota'];
            move_uploaded_file($_FILES["anh"]["tmp_name"],$file);
            $sql = "INSERT INTO foods(food_id ,menu_id,name,images,descriptions,price,quantity) VALUES ('$msp','$madm','$tensp','$file','$mota','$gia','$soluong')";
            $kq = mysqli_query($conn,$sql);
            mysqli_close($conn);
            if($kq){
              $_SESSION['thongbao'] ="Thêm thành công";
              header("location: index.php?a=baotrisanpham");
            }
            else{
              $_SESSION['thongbao'] ="Thêm không thành công";
            }
          
        }    
    }
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ</title>
	My icon
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
    <a href="index.php?a=quanlyvacapnhatsanpham">
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
                <h5 class="card-title">Thêm sản phẩm</h5>
                <!-- Vertical Form -->
                <div class="row g-3">
                  <div class="col-12">
                    <label for="billCode4" class="form-label">Mã sản phẩm</label>
                    <input type="text" class="form-control" id="billCode" name="masp" required>
                  </div>
                  <div class="col-12">
                   <label for="billProduct4" class="form-label">Mã danh mục</label>
                    <!-- <input type="text" class="form-control" id="billProduct">  -->
                    <select class="form-select" name="madm" id="">
                      <?php
                        while($row = mysqli_fetch_assoc($dm)){
                          ?>
                            <option value="<?=$row['menu_id']?>"><?=$row['name']?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="nameWarehouse4" class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="tensp" id="nameWarehouse" required>
                  </div>
                  <div class="col-12">
                    <label for="nameWarehouse4" class="form-label">Giá</label>
                    <input type="number" min="1" class="form-control" name="gia" required>
                  </div>
                  <div class="btn-add-bill">
                    <button type="submit" name="them" class="btn btn-primary">Thêm</button>
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
                    <label for="nameProduct4" class="form-label">Số lượng</label>
                    <input type="number" min="1" class="form-control" id="nameProduct" name="soluong" required>
                  </div>
                  <div class="col-12">
                    <label for="nameProduct4" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" name="anh" >
                  </div>
                  <div class="col-12">
                    <label for="dateWarehouse4" class="form-label">Mô tả</label>
                    <textarea class="form-control"  name="mota" id="" cols="10" rows="5" required></textarea>
                    
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
