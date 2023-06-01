<?php
include("connection_db.php");
  session_start();
  if(isset($_GET['price'])){
    $_SESSION['price']=($_GET['price']);
  }
 ?>
<!doctype html>
<html dir="rtl">
  <head>
    <title>تراثيات | اتمام الطلب</title>
    <?php include('head.php')?>
  </head>
  <body>
  <!-- start navbar-->
  <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->

  <!--start order-data-->
  <div class="order-data">
    <div class="container">
  
      <form action="order_data_handel.php" method="post">
        <p>تعبئة بيانات الطلب</p>
        <?php
             if(isset($_SESSION['errors'])){
             $errors = $_SESSION['errors'];
              foreach($errors as $index=>$error):
            ?>
            <p class="alert alert-danger mt-3 fs-5"><?=$error?></p>
            <?php
             
             endforeach ;
             unset($_SESSION['errors']);

              }
            ?>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="name" name="name"  placeholder="name@example.com">
          <label for="name">الاسم الثلاثي</label>
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="phone" name="phone" placeholder="name@example.com">
          <label for="phone">رقم الهاتف</label>
        </div>
        <div class="row">
          <div class="col-md-4">
          <select class="form-select city" aria-label="Default select example" id="city" name="city">
               <option value="selected">المدينة</option>
               <?php
                $getCities = "SELECT * FROM cities where id != 19";
                $getAllCities = mysqli_query($conn,$getCities);
                $cities=mysqli_fetch_all($getAllCities,MYSQLI_ASSOC);
                foreach($cities as $index=>$city):
                ?>
           
               <option value="<?=$city['id']?>"> <?=$city['name']?> </option>
               <?php endforeach ?>
            </select>
          </div>
          <div class="col-md-8">
             <div class="form-floating mb-3">
             <input type="text" class="form-control" id="address" name="address" placeholder="name@example.com">
             <label for="address">الشارع/البلدة/القرية</label>
             </div>
          </div>
        </div>
        <div class="payI">
          <select class="form-select" aria-label="Default select example">
            <option value="selected">الدفع عند الاستلام</option>
          </select>
        </div>
        <input type="submit" class="btn submit" name="submit" value="الشراء الان" >
      </form>
      
    </div>
  </div>
  <!--end order-data-->

  <!--start footer-->
  <div class="footer" id="footer">
   <?php include('footer.php')?>
  </div>
  <!--end footer-->

  <!--start copy-right-->
  <div class="copy-right">
  <?php include('copy_right.php')?>
  </div>
  <!--end copy-right-->

  <div class="up">
    <?php include('up.php')?>
  </div>
  <script>
    let up= document.getElementById("up");
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
     if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
       up.style.display = "block";
       } else {
       up.style.display = "none";
       }
     }
     function upFunction(){
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
     }
  </script>

    <!-- bootstrap 5 -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>