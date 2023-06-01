<?php
  include("connection_db.php");
  session_start();
 ?>
<!doctype html>
<html dir="rtl">
  <head>
    <title> تراثيات |ل</title>
    <?php include('head.php')?>
  </head>

  <body>
   <!-- start navbar-->
   <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->

  <!--start form -->
  <div class="req">
      <div class="req_content">
        <form id="myForm"action="req_handel.php" method="post">
          <div class="tab-content" id="pills-tabContent">
            <h3>تعبئة الطلب</h3>
            <?php
             if(isset($_SESSION['errors'])){
             $errors = $_SESSION['errors'];
              foreach($errors as $index=>$error):
            ?>
            <p class="alert alert-danger mt-3 fs-5"><?=$error?></p>
            <?php
             
             endforeach ;
             session_unset();
              }
            ?>
            <div class="form-floating mb-3 ">
             <input type="text" class="form-control" id="name" name="name" placeholder="name@example.com">
             <label for="name">الاسم الثلاثي</label>
            </div>
            <div class="form-floating">
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Password">
              <label for="phone">رقم الهاتف</label>
            </div>
            <select class="form-select city" aria-label="Default select example" id="city" name="city">
               <option value="selected">المدينة</option>
               <?php
                $getCities = "SELECT * FROM cities where is_delivery ";
                $getAllCities = mysqli_query($conn,$getCities);
                $cities=mysqli_fetch_all($getAllCities,MYSQLI_ASSOC);
                foreach($cities as $index=>$city):
                ?>
               <option value="<?=$city['id']?>"> <?=$city['name']?> </option>
               <?php endforeach ?>
            </select>
            <div class="form-floating mt-3">
              <input type="text" class="form-control" id="address" placeholder="Password" name="address">
              <label for="address">عنوان المتجر/اونلاين</label>
            </div>
            <select class="form-select" aria-label="Default select example " name="cat">
              <option value="selected">القسم</option>
              <?php
               $getCats = "SELECT * FROM categories";
               $getAllCats = mysqli_query($conn,$getCats);
               $cats=mysqli_fetch_all($getAllCats,MYSQLI_ASSOC);
              foreach($cats as $index=>$cat):
              ?>
              <option value="<?=$cat['id']?>"> <?=$cat['name']?> </option>
               <?php endforeach ?>
            </select>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Leave a comment here" id="desc" name="desc" style="height: 100px"></textarea>
              <label for="desc">اسم المتجر ووصف المنتجات والبضائع التي يقدمها</label>
            </div>
            <div class="modal-footer">
             <button type="submit" class="btn send" id="submit" name="submit" value="sent">ارسال </button>
            </div>
          </div> 
        </form>
      </div>
  </div>
  <!--end form -->
   
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
    <script type="text/javascript">
      window.addEventListener('scroll',reveal);

      function reveal(){
          var reveals=document.querySelectorAll('.reveal');
          for(var i=0;i<reveals.length;i++){
              var windowheight=window.innerHeight;
              var revealtop=reveals[i].getBoundingClientRect().top;
              var revealpoint=150;
              if(revealtop < windowheight-revealpoint){
                  reveals[i].classList.add('active');
              }
              else{
                  reveals[i].classList.remove('active');
              }

          }
      }
  </script>
  </body>
</html>