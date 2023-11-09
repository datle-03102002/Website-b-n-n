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
	include "../model/sanpham.php";
	include "../model/danhmuc.php";
	include "../model/order.php";
	include "../model/taikhoan.php";

	// include "view/header.php";
	if(isset($_GET['a'])){
		switch ($_GET['a']) {
			case 'taotaikhoannhanvien':
				$tk = getTk();
				include "view/taotaikhoannhanvien.php";
				break;
			case 'thongkedoanhthu':
				include "view/thongkedoanhthu.php";
				break;
			case 'quanlydanhmucsanpham':
				$dm = get_danhmuc();
				include "view/quanlydanhmucsanpham.php";
				break;
			case 'themdanhmuc':
				$dm = get_danhmuc();
				include "view/themdanhmuc.php";
				break;
			case 'suadanhmuc':
				$dm = get_danhmuc();
				include "view/suadanhmuc.php";
				break;
			case 'xoadanhmuc':
				include "view/xoadanhmuc.php";
				break;
			case 'baotrisanpham':
				$kq = get_sanPham();
				$dm = get_danhmuc();
				include "view/baotrisanpham.php";
				break;
			case 'themsanpham':
				$kq = get_sanPham();
				$dm = get_danhmuc();
				include "view/themsanpham.php";
				break;
			case 'xoasanpham':
				include "view/xoasanpham.php";
			case 'suasanpham':
				$dm = get_danhmuc();
				include "view/suasanpham.php";
				break;
			case 'quanlytaikhoanvaphanquyen':
				$tk = getTk();
				include "view/quanlytaikhoanvaphanquyen.php";
				break;
			case 'xoataikhoannhanvien':
				include "view/xoataikhoannhanvien.php";
				break;
			case 'capquyentaikhoan':
				include "view/capquyentaikhoan.php";
				break;
			case 'quanlydonhang':
				$kq = getAll_order();
				include "view/quanlydonhang.php";
				break;
			case 'capnhatdonhang':
				include "view/capnhatdonhang.php";
				break;
			case 'xoadonhang':
				include "view/xoadonhang.php";
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