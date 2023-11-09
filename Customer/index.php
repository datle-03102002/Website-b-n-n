<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cửa hàng bán đồ ăn</title>
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<link href="vendor/aos/aos.css" rel="stylesheet">
	
  <link href="css/main.css" rel="stylesheet">
	<script src="js/index.js"></script>
  <?php
    session_start();
    include("main.php");
  ?>
  </head>
  <body>
	
	<!--Header-->
		<header class="pt-2">
			<div class="container-fluid">
				<div class="container-xl">
					<div class="row header d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
						<div class="col-4 header__logo"><img src="img/LOGO.png"></div>
              <div class="col-4 header__search align-middle">
                <form role="search" class="input-group px-2 pe-lg-0" name="frmSearch" id="frmSearch">
                  <input class="form-control " type="search" name="txtKeyword" id="txtKeyword">
                  <button class="btn btn-primary" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
              </div>
						<div class="col-4 text-end ">
              <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 text-end d-flex flex-wrap align-items-center  justify-content-lg-end">
                <a href="cart-page.php" class=""><i class="fa-solid fa-cart-shopping text-danger fs-0"></i></a>
                </div>
                <div class="col-lg-4">
                    <div class="dropdown">
                      <?php
                          // echo $_SESSION['username']."\t".$_SESSION['password']."\t".$_SESSION['permission'];
                          if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['permission'])){
                            if(checkSignIn($_SESSION['username'],$_SESSION['password'],$_SESSION['permission'])){
                              ?>
                              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                              </a>
                              
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
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
			
		</header>
		
	<!--Menu-->
	
	<nav class="navbar navbar-expand-lg navbar-light text-light" aria-label="">
		<div class="container-xl">

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobile" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
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
						<a class="nav-link" href="#about">Giới thiệu
						<div class="line"></div>
						</a>
						
					</li>
					<li class="nav-item px-2">
						<a class="nav-link" href="#carouselExampleCaptions">Món ngon
						<div class="line"></div>
						</a>
						
					</li>
					<li class="nav-item px-2">
						<a class="nav-link" href="#menu">Thực đơn
						<div class="line"></div>
						</a>
						
					</li>
					<li class="nav-item px-2">
						<a class="nav-link " href="#book-a-table" >Đặt bàn
						<div class="line"></div>
						</a>
						
					</li>
					<li class="nav-item px-2">
						<a class="nav-link" href="#">Có gì hót
						<div class="line"></div>
						<a>
						
					</li>
					<li class="nav-item px-2">
						<a class="nav-link" href="#footer">Cửa hàng
						<div class="line"></div>
						</a>
					</li>
					<li class="nav-item px-2">
						<a class="nav-link" href="#contact">Liên hệ
						<div class="line"></div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<!--Slider-->
	
	<div id="carouselExampleCaptions" class="carousel slide">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="container-fluid slide-1">
					<div class="row">
						<div class="col-6 offset-3">
							<div class="row align-items-center">
								<div class="col-6 align-items-center">
									<div class="text-dark text-center">
										<h1>Cơm trộn và càng cua</h1>
										<p class="text-danger">80.000 VNĐ / xuất</p>
										<button class="btn bg-success text-light">Mua ngay</button>
									</div>
								</div>
								<div class="col-6">
									<img src="imgs/do-an-1.png" class="d-block w-100" alt="...">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="container-fluid slide-2">
					<div class="row">
						<div class="col-6 offset-3">
							<div class="row align-items-center">
								<div class="col-6 align-items-center">
									<div class="text-dark text-center">
										<h1>Cơm cuộn kèm mực nướng</h1>
										<p class="text-danger">280.000 VNĐ / xuất</p>
										<button class="btn bg-success text-light">Mua ngay</button>
									</div>
								</div>
								<div class="col-6">
									<img src="imgs/do-an-2.png" class="d-block w-100" alt="...">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="container-fluid slide-3">
					<div class="row">
						<div class="col-6 offset-3">
							<div class="row align-items-center">
								<div class="col-6 align-items-center">
									<div class="text-dark text-center">
										<h1>Cơm trộn</h1>
										<p class="text-danger">180.000 VNĐ / xuất</p>
										<button class="btn bg-success text-light">Mua ngay</button>
									</div>
								</div>
								<div class="col-6">
									<img src="imgs/do-an-3.png" class="d-block w-100" alt="...">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
	<!--About us-->
	<section id="about" class="about">
      <div class="container-xl mb-3" data-aos="fade-up">

        <div class="section-header text-center mt-3">
          <h2>Giới thiệu</h2>
          <p>Hãy đến <span>với chúng tôi</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(imgs/about.jpg) ;" data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4>Đặt bàn</h4>
              <p>0867687695</p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Chào mừng bạn đã ghé nhà hàng chúng tôi, chúng tôi là nhà hàng cao cấp hàng đầu Hà Nội, đến với chúng tôi các bạn sẽ cảm nhận được:
              </p>
              <ul>
                <li><i class="bi fa-solid fa-check-double"></i> Không gian vô cùng rộng dãi và sang trọng.</li>
                <li><i class="bi fa-solid fa-check-double"></i> Dịch vụ tiếp đón khách hàng chất lượng hàng đầu.</li>
                <li><i class="bi fa-solid fa-check-double"></i> Cung cấp cho khách hàng những món ăn ngon, chất lượng đến từ đầu bếp hàng đầu của nhà hàng.</li>
                <li><i class="bi fa-solid fa-check-double"></i> Chúng tôi cam kết nhưng nguyên liệu đều là đồ tươi sống.</li>
              </ul>
              <p>
				
              </p>

              <div class="position-relative mt-4">
                <img src="imgs/about-2.jpg" class="img-fluid" alt="">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

	<!--Specials-->
	
	<!---->
	<!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <form action="main.php" method="post" id="display_food">
          <div class="container-xxl" data-aos="fade-up">

            <div class="section-header text-center mt-5">
              <h2 class=" fw-bold">Thực đơn</h2>
              
            </div>
    
            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
    
              <li class="nav-item" >
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                  <h4>Tất cả</h4>
                </a>
              </li><!-- End tab nav item -->
    
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                  <h4>Nước uống</h4>
                </a><!-- End tab nav item -->
    
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
                  <h4>Hoa quả</h4>
                </a>
              </li><!-- End tab nav item -->
    
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
                  <h4>Đồ ăn</h4>
                </a>
              </li><!-- End tab nav item -->
    
            </ul>
    
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
    
              <div class="tab-pane fade active show" id="menu-starters">
    
                <div class="tab-header text-center">
                  <p>Menu</p>
                  <h3>Tất cả</h3>
                </div>
                
                
                <div class="row gy-5" id="allProduct">
                  
                <?php
                    productFoods(9);
                ?>
                  
                </div>
              </div><!-- End Starter Menu Content -->
    
              <div class="tab-pane fade" id="menu-breakfast">
    
                <div class="tab-header text-center">
                  <p>Menu</p>
                  <h3>Nước uống</h3>
                </div>
    
                <div class="row gy-5">
                <?php
                    productFoods(6);
                ?>
                  
                </div>
              </div><!-- End Breakfast Menu Content -->
    
              <div class="tab-pane fade" id="menu-lunch">
    
                <div class="tab-header text-center">
                  <p>Menu</p>
                  <h3>Hoa quả</h3>
                </div>
    
                <div class="row gy-5">
    
                <?php
                    productFoods(4);
                ?>
    
                </div>
              </div><!-- End Lunch Menu Content -->
    
              <div class="tab-pane fade" id="menu-dinner">
    
                <div class="tab-header text-center">
                  <p>Menu</p>
                  <h3>Đồ ăn</h3>
                </div>
    
                <div class="row gy-5">
    
                <?php
                    productFoods(6);
                ?>
    
                </div>
              </div><!-- End Dinner Menu Content -->
    
            </div>
    
          </div>

      </form>
    </section><!-- End Menu Section -->
 

	 <!-- ======= Book A Table Section ======= -->
   <section id="book-a-table" class="book-a-table mt-3">
      <div class="container-xl " data-aos="fade-up">

        <div class="section-header text-center">
          <h2 class="fw-bold">Đặt bàn</h2>
          <p>Đặt <span>niềm tin của bạn</span> với chúng tôi</p>
        </div>

        <div class="row g-0 bg-dark-subtle ">

          <div class="col-lg-4 reservation-img" style="background-image: url(imgs/reservation.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>

          <div class="col-lg-8 d-flex align-items-center reservation-form-bg mt-5 mb-5">
            <form action="main.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
              <div class="row gy-4 me-2 ms-2">
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Họ và tên" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Số điện thoại" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="date" class="form-control" id="date" placeholder="Ngày đặt" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="time" id="time" placeholder="Thời gian" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="number" class="form-control" name="people" id="people" placeholder="Số lượng người" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                  <div class="validate"></div>
                </div>
                <div class="form-group mt-3 col-lg-12">
                  <textarea class="form-control" name="message" rows="5" placeholder="Tin nhắn"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="text-center"><button type="submit" class="btn btn-danger mt-3">Đặt bàn</button></div>
              </div>
              
              
            </form>
          </div><!-- End Reservation Form -->

        </div>

      </div>
    </section><!-- End Book A Table Section -->
	
<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
          <div class="container" data-aos="fade-up">

            <div class="section-header">
              <h2 class="fw-bold">Contact</h2>
              <p>Need Help? <span>Contact Us</span></p>
            </div>

            <div class="mb-3">
              <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
            </div><!-- End Google Maps -->

            <div class="row gy-4">

              <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
              
                  <i class="icon fa-solid fa-map flex-shrink-0 "></i>
                  <div>
                    <h3>Our Address</h3>
                    <p>A108 Adam Street, New York, NY 535022</p>
                  </div>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                  <i class="icon fa-solid fa-envelope flex-shrink-0"></i>
                  <div>
                    <h3>Email Us</h3>
                    <p>contact@example.com</p>
                  </div>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                  <i class="icon fa-solid fa-square-phone flex-shrink-0"></i>
                  <div>
                    <h3>Call Us</h3>
                    <p>+1 5589 55488 55</p>
                  </div>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                  <i class="icon fa-solid fa-square-share-nodes flex-shrink-0"></i>
                  <div>
                    <h3>Opening Hours</h3>
                    <div><strong>Mon-Sat:</strong> 11AM - 23PM;
                      <strong>Sunday:</strong> Closed
                    </div>
                  </div>
                </div>
              </div><!-- End Info Item -->

            </div>

            <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
              <div class="row">
                <div class="col-xl-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-xl-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form><!--End Contact Form -->

          </div>
        </section><!-- End Contact Section -->

      </main><!-- End #main -->

      <!-- ======= Footer ======= -->
      <footer id="footer" class="footer">

        <div class="container">
          <div class="row gy-3">
            <div class="col-lg-3 col-md-6 d-flex">
              <i class="bi bi-geo-alt icon"></i>
              <div>
                <h4>Address</h4>
                <p>
                  A108 Adam Street <br>
                  New York, NY 535022 - US<br>
                </p>
              </div>

            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
              <i class="bi bi-telephone icon"></i>
              <div>
                <h4>Reservations</h4>
                <p>
                  <strong>Phone:</strong> +1 5589 55488 55<br>
                  <strong>Email:</strong> info@example.com<br>
                </p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links d-flex">
              <i class="bi bi-clock icon"></i>
              <div>
                <h4>Opening Hours</h4>
                <p>
                  <strong>Mon-Sat: 11AM</strong> - 23PM<br>
                  Sunday: Closed
                </p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Follow Us</h4>
              <div class="social-links d-flex">
                <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa-brands fa-square-instagram"></i></a>
                <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
              </div>
            </div>

          </div>
        </div>
      
        <div class="container">
          <div class="copyright">
            &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="vendor/glightbox/js/glightbox.min.js"></script>
	<script src="vendor/swiper/swiper-bundle.min.js"></script>
	
	<script src="vendor/aos/aos.js"></script>
	<script src="js/main.js"></script>
  </body>
</html>