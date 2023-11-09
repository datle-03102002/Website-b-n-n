<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php
    include("../model/config.php");
 	session_start();
	include("main.php");
	if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['permission'])){
        echo "Giỏ hàng";
    }else{
        header("location:login-page.php");
    }
  ?></title>
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="vendor/aos/aos.css" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet">
    <script src="js/index.js"></script>
</head>

<body>

    <!--Header-->
    <header class="pt-2">
        <div class="container-fluid">
            <div class="container-xl">
                <div
                    class="row header d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <div class="col-4 header__logo"><img src="img/LOGO.png"></div>
                    <div class="col-4 header__search align-middle">
                        <form role="search" class="input-group px-2 pe-lg-0" name="frmSearch" id="frmSearch">
                            <input class="form-control " type="search" name="txtKeyword" id="txtKeyword">
                            <button class="btn btn-primary" type="button"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                    <div class="col-4 position-relative text-end">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4 text-end d-flex flex-wrap align-items-center  justify-content-lg-end">
                                <a href="cart-page.php" class=""><i
                                        class="fa-solid fa-cart-shopping text-danger fs-0"></i></a>
                            </div>
                            <div class="col-lg-4">
                                <div class="dropdown">
                                    <?php
                                    
									if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['permission'])){
										if(checkSignIn($_SESSION['username'],$_SESSION['password'],$_SESSION['permission'])){
                                            
												?>
                                                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32"
                                                        class="rounded-circle">
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
                                                </ul>

                                                <?php
											}
											else{
												?>
                                            <a href="login-page.php">Sign in / Sing out</a>
                                            <?php
                                                }
											}
										    else{
											?>
                                            <a href="login-page.php">Sign in / Sing out</a>
                                            <?php
											}
										?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!--Menu-->

    <nav class="navbar navbar-expand-lg navbar-light text-light" aria-label="">
        <div class="container-xl">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobile"
                aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mobile">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2">
                        <a class="nav-link active" href="index.php">Trang chủ
                            <div class="line"></div>
                        </a>

                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="index.php#about">Giới thiệu
                            <div class="line"></div>
                        </a>

                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="index.php##carouselExampleCaptions">Món ngon
                            <div class="line"></div>
                        </a>

                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="index.php#menu">Thực đơn
                            <div class="line"></div>
                        </a>

                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link " href="index.php#book-a-table">Đặt bàn
                            <div class="line"></div>
                        </a>

                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="#">Có gì hót
                            <div class="line"></div>
                            <a>

                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="index.php#footer">Cửa hàng
                            <div class="line"></div>
                        </a>

                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="index.php#contact">Liên hệ
                            <div class="line"></div>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="menu" class="menu mt-5">
        <div class="container-md pe-5 ps-5 fw-bold">
            <div class="row">
                <div class="col-lg-3 fw-bold fs-4">Giỏ hàng</div>
            </div>
            <div class="row pt-5">
                <div class="col-4">
                    <p>Sản phẩm</p>
                </div>
                <div class="col-lg-2">
                    <p>Đơn giá</p>
                </div>
                <div class="col-lg-2">
                    <p>Số lượng</p>
                </div>
                <div class="col-lg-2">
                    <p>Số tiền</p>
                </div>
                <div class="col-lg-2">
                    <p>Hành động</p>
                </div>
            </div>
        </div>
        <div class="container-md pe-5 ps-5 pb-5">
            <form action="buy-foods.php" method="post">
                <?php
					getCart(getIdCustomer($_SESSION['username'],$_SESSION['password']));
				?>
            </form>
        </div>
        <div class="container-md pe-5 ps-5 pb-5">
            <form action="order-detail.php" method="post">
                <div class="row fs-4">
                    <div class="col-lg-3 fw-bold">Danh sách đơn hàng</div>
                </div>
                <div class="row pt-5 fw-bold">
                    <div class="col-lg-2">Mã đơn hàng</div>
                    <div class="col-lg-2">Ngày đặt</div>
                    <div class="col-lg-2">Giờ đặt</div>
                    <div class="col-lg-2">Tổng tiền</div>
                    <div class="col-lg-2">Trạng thái</div>
                    <div class="col-lg-2">Hành động</div>
                </div>
                <?php
                    $exc = mysqli_query($conn,"SELECT order_id,order_date,order_time,total,order_status FROM order_;");
                    $status = "";
                    while($r = mysqli_fetch_assoc($exc)){
                        if($r['order_status']==0){
                            $status = "Chờ xử lý";
                        }
                        if($r['order_status']==1){
                            $status = "Đang chuẩn bị hàng";
                        }
                        if($r['order_status']==2){
                            $status = "Đang giao";
                        }
                        if($r['order_status']==3){
                            $status = "Đã giao thành công";
                        }
                        if($r['order_status']==4){
                            $status = "Đã hủy";
                        }
                        ?>
                            <div class="row pt-3">
                                <div class="col-lg-2"><?=$r['order_id']?></div>
                                <div class="col-lg-2"><?=$r['order_date']?></div>
                                <div class="col-lg-2"><?=$r['order_time']?></div>
                                <div class="col-lg-2 text-danger"><?=$r['total']?> VNĐ</div>
                                <div class="col-lg-2"><?=$status?></div>
                                <div class="col-lg-2">
                                    <button type="submit" class="bg-success text-light">Xem chi tiết</button>
                                    <input type="text" name="order_id" id="" value="<?=$r['order_id']?>" hidden>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            </form>
        </div>
    </section>
    
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Địa chỉ</h4>
                        <p>
                            Thôn kép <br>
                            Việt Tiến, Việt Yên, Bắc Giang<br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Liên hệ</h4>
                        <p>
                            <strong>Phone:</strong> 0867687695<br>
                            <strong>Email:</strong> dvquan210502@gmail.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Giờ mở cửa</h4>
                        <p>
                            <strong>Thứ hai - Thứ bảy: 11AM</strong> - 23PM<br>
                            Chủ nhật: Đóng cửa
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Theo dõi chúng tôi</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fa-brands fa-square-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <script src="vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="vendor/glightbox/js/glightbox.min.js"></script>
        <script src="vendor/swiper/swiper-bundle.min.js"></script>

        <script src="vendor/aos/aos.js"></script>
        <script src="js/main.js"></script>
</body>

</html>