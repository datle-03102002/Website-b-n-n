<?php
   // hàm này được sử dụng để lấy danh sách sản phẩm
    function productFoods($total){
      include("../model/config.php");
      $sql = "SELECT food_id,name, images,price from foods limit ".$total.";";
      $rs = mysqli_query($conn,$sql);
      while($r = mysqli_fetch_assoc($rs)){
        ?>
        <div class="col-lg-3 menu-item">
          <a href="<?=$r['images']?>" class="glightbox"><img src="<?=$r['images']?>" class="menu-img img-fluid" alt=""></a>
          <h4 onclick="getId('<?=$r['food_id']?>');"><?=$r['name']?></h4>
          <?php
            $_SESSION['id_food'] = $r['food_id'];
          ?>
          <form action="fooddetail.php" method="post" id="food_display_<?=$r['food_id']?>">
            <input type="hidden" name="id_food" id="id_food" value="<?=$r['food_id']?>" ></input>
          </form>
          <p class="ingredients">
            Lorem, deren, trataro, filede, nerada
          </p>
          <p class="price text-danger">
            <?=$r['price']?> VNĐ
          </p>
        </div>
        <?php
      }
      mysqli_close($conn);
    }
    // hàm này dùng để lấy chi tiết một sản phẩm
    function getFood($id){
      include("../model/config.php");
      if($id==null){
        return;
      }
      $sql = "SELECT name, images,price,quantity from foods where food_id = '$id' ;";
      $rs = mysqli_query($conn,$sql);
      $r = mysqli_fetch_assoc($rs);
      ?>
      <div class="col-lg-10 menu-item offset-1 ">
        <div class="row">
            <div class="col-lg-5 ">
            <a href="<?=$r['images']?>" class="glightbox"><img src="<?=$r['images']?>" class="menu-img img-fluid" alt=""></a>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5">
              <div class="row">
                <h4 class="fw-bold fs-1 text-uppercase"><?=$r['name']?></h4>
                <hr>
                <p class="fw-bold text-danger fs-0"><?=$r['price']?> VNĐ</p>
              </div>
              <div class="row">
                <p class="fw-bold">Số lượng hiện có: <span id="quantityOfProduct"><?=$r['quantity']?></span> </p>
              </div>
              <div class="row">
                <p class="fw-bold">Số lượng món</p>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <input type="number" name="quantityFood" id="quantityFood" class="form-control" onclick="checkQuantityProduct();" value='1'>
                </div>
                <div class="col-lg-4">
                  <button type="submit" class="btn btn-danger">Mua ngay</button>
                </div>
              </div>
              <div class="row">
                <div id="quantityErr"></div>
              </div>
              <input type="text" name="idFood" id="" value="<?=$id?>" hidden>
            </div>
        </div>
      </div>
      <?php
      mysqli_close($conn);
    }





    function getSession(){
      session_start();
      if(isset($_POST['id_food'])){
        $_SESSION['id_food'] = $_POST['id_food'];
      }
    }



    
    // hàm này dùng để in ra title của trang xem chi tiết sản phẩm
    function getTitle(){
      include("../model/config.php");
      if(isset($_SESSION['id_food'])){
        $id = $_SESSION['id_food'];
      $sql = "SELECT name from foods where food_id = '$id'";
      $rs = mysqli_query($conn,$sql);
      $r = mysqli_fetch_assoc($rs);
      $name = $r['name'];
     
      echo $name; 
      mysqli_close($conn);
      }
      
    }
    function getIdCustomer($us,$pass){
      include ("../model/config.php");
      $sql = "SELECT customer_id from customers where email = '$us' and password='$pass';";
      $rs = mysqli_query($conn,$sql);
      $r = mysqli_fetch_assoc($rs);
      $id = $r['customer_id'];
      mysqli_close($conn);
      return $id;
    }
    // hàm này dùng để lấy tên thực đơn
    function getMenu(){
      include("../model/config.php");
      if(isset($_SESSION['id_food'])){
        $id = $_SESSION['id_food'];
        $sql = "SELECT menu.name from foods inner join menu on foods.menu_id = menu.menu_id where foods.food_id = '$id' ";
        $rs = mysqli_query($conn,$sql);
        $r = mysqli_fetch_assoc($rs);
        $name = $r['name'];
        echo $name;
        mysqli_close($conn);
      }
    }

    // hàm này dùng để lấy id của sản phẩm được gửi từ client
    function getId(){
      
      $id = $_SESSION['id_food'];
      return $id; 
      
    }
    // hàm này dùng để kiểm tra xem người dùng đã đăng nhập chưa
    function checkSignIn($username,$password,$permission){
      include('../model/config.php');
      if($permission == 'Customer'){
        $sql = "SELECT email,password from customers";
        $rs = mysqli_query($conn,$sql);
        while($r=mysqli_fetch_assoc($rs)){
          
          if((strcmp($username,$r['email'])==0) &&(strcmp($password,$r['password'])==0)){
            
            return true;
          }
        }
        return false;
      }
      else{
        $sql = "SELECT email,password,permission from employees";
        $rs = mysqli_query($conn,$sql);
        while($r=mysqli_fetch_assoc($rs)){
          if((strcmp($username,$r['email'])==0) &&(strcmp($password,$r['password'])==0)){
            return true;
          }
        }
        return false;
      }
    }


    function getCart($customer_id){
      include("../model/config.php");
      $sql = "SELECT foods.name,foods.images,foods.price,carts.quantity,carts.food_id,carts.cart_id,customer_id from 
      carts inner join foods  on carts.food_id = foods.food_id
      where carts.customer_id = '$customer_id'; ";
      $rs = mysqli_query($conn,$sql);
      $sum_price = 0;
      while($r = mysqli_fetch_assoc($rs)){
        $sum_price += $r['quantity'] * $r['price'];
        ?>
          <div class="row d-flex align-items-center p-2">
					<div class="col-4">
						<div class="row d-flex align-items-center">
							<div class="col-lg-1">
								<input type="checkbox" name="SelectFood" id="SelectFood">
							</div>
							<div class="col-lg-3" >
							<img src="<?=$r['images']?>" alt="" style="height:100px;width:100px;">
							</div>
							<div class="col-lg-8 text-start">
								<p class="fw-bold fs-5" ><?=$r['name']?></p>
							</div>
						</div>
					</div>
					<div class="col-lg-2">
						<p class="text-danger"><?=$r['price']?></p>
					</div>
					<div class="col-lg-2">
						<div class="row">
              <div class="col-lg-1">
                <input type="number" name="" id="" value="<?=$r['quantity']?>" style="width:40px;">
              </div>
              <div class="col-lg-11"></div>
            </div>
					</div>
					<div class="col-lg-2">
						<p class="text-danger"><?=$r['quantity']*$r['price']?></p>
					</div>
					<div class="col-lg-2">
						<a href="deleteOrder.php?food_id=<?=$r['food_id']?>&customer_id=<?=$r['customer_id']?>&cart_id=<?=$r['cart_id']?>">
              <button type="button" class="btn btn-danger">Xóa</button>
            </a>
					</div>
				</div>
        <?php
      }
      ?>
      <div class="row d-flex align-items-center p-2">
					<div class="col-lg-1">Tổng tiền:</div>
					<div class="col-lg-2">
            <input class="text-danger fw-bold" type="text"  id="" value="<?=$sum_price?> VNĐ" disabled>
          </div>
					<div class="col-lg-6">
            
            <input type="text" name="order_total" id="" value="<?=$sum_price?>" hidden>
          </div>
					<div class="col-lg-1"></div>
					<div class="col-lg-1"><button type="submit" class="btn btn-danger">Mua</button></div>
					<div class="col-lg-1">
						
					</div>
			</div>
      <?php
    }
?>