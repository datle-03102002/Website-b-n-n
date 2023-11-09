<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- <link rel="stylesheet" href="view/style.css">
	<script src="view/index.js"></script> -->
</head>
<body>
	<div class="container">
	<?php
	// include "view/header.php";
	include "../model/khachhang.php";
	include "../model/order.php";
	include "../model/danhmuc.php";
	include "../model/sanpham.php";
	if(isset($_GET['a'])){
		switch ($_GET['a']) {
			case 'datban':
				include "view/datban.php";
				break;
			case 'danhsachkhachhang':
				$kq = get_khachhang();
				include "view/danhsachkhachhang.php";
				break;
			case 'xulydonhang':
				include "view/xulydonhang.php";
				break;
			case 'nhandon':
				include "view/nhandon.php";
				break;
			case 'quanlydonhang':
				$kq = getAll_order();
				include "view/quanlydonhang.php";
				break;
			case 'capnhatdonhang':
				include "view/capnhatdonhang.php";
				break;
			case 'quanlyvacapnhatsanpham':
				$kq = get_sanPham();
				include "view/quanlysanpham.php";
				break;
			case 'themsanpham':
				$dm = get_danhmuc();
				include "view/themsanpham.php";
				break;
			case 'suasanpham':
				$dm = get_danhmuc();
				include "view/suasanpham.php";
				break;
			default:
				// code...
				include "view/home.php";
				break;
		}
	}
	else{
		include "view/home.php";
	}
	?>
	</div>
</body>
</html>