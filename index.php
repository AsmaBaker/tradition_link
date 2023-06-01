<?php
  session_start();
  include("connection_db.php");
?>
<!doctype html>
<html dir="rtl">
  <head>
    <title>تراثيات | الرئيسية</title>
    <?php include('./head.php')?>
  </head>
  <body>
   
  <!-- start navbar-->
  <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->

  <!--start menu-bar-->
  <div class="menu-bar" dir="rtl">
    <ul>
      <li><a href="#store">الاقسام والمتاجر </a></li>
      <li><a href="#dealer">انشئ متجرك </a></li>
      <li><a href="#footer">روابط مهمة</a></li>
    </ul>
  </div>  
  <!--end menu-bar-->
  
 

  <!--start header-->
  <div class="header">
   <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/header/1.png" class="d-block " alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/header/2.png" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/header/3.png" class="d-block " alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/header/4.png" class="d-block" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/header/5.png" class="d-block" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
   </div>
   <div class="main-page">
      <div class="row imgs ">
        <div class="img-1 h-img col-2">
        <a href="stores.php?id=11103">
          <img src="img/header/6.jpeg">
        </a>
        </div>
        <div class="img-2 h-img col-2">
          <a href="stores.php?id=22201">
          <img src="img/header/7.png">
          </a>
        </div>
        <div class="img-3 h-img col-md-3">
          <a href="">
          <img src="img/header/8.png">
          </a>
        </div>
      </div>
   </div>
  </div>
  <!--end  header-->
 <!--lama-->
  <!--start chose-->
  <div class="chose">
    <div class="container">
      <div class="chose-title">
        <h2>اخترنا لك</h2>
        <?php
         $getChose = "SELECT * FROM products  where id=111028  or id=222018 or id =444011 or id=333014 or id=666011";
         $getAllChose = mysqli_query($conn,$getChose);
         $chose=mysqli_fetch_all($getAllChose,MYSQLI_ASSOC);
        ?>
       </div>
       <div class="row">
        <?php
        foreach($chose as $index=>$chosen):
        ?>
        <div class="col-md-3 card">
          <a href="product.php?pro_id=<?=$chosen['id']?>&sto_id=<?=$chosen['sto_id']?>">
          <img src="img/<?=$chosen['sto_id']?>/<?=$chosen['img']?>" class="card-img-top" alt="...">
          <div class="card-body row">
            <h5 class="card-title"><?=$chosen['name']?></h5>
            <p class="card-text"> <?=$chosen['price']?><i class="fa-solid fa-shekel-sign"></i></p>
            <a href="cart.php?pro_id=<?=$chosen['id']?>" target="_blank" class="btn add">اضافة الى السلة<i class="fa-solid fa-cart-shopping"></i> </a>
          </div>
          </a>
        </div>
       <?php endforeach ?>
    </div>
   </div>
  </div>
  <!--end chose-->

  <!--srart store-->
  <div class="store" id="store">
    <?php
    $getCats = "SELECT * FROM categories";
    $getAllCats = mysqli_query($conn,$getCats);
    $cats=mysqli_fetch_all($getAllCats,MYSQLI_ASSOC);
    ?>
    <div class="store-head ">
      <h3>الاقسام والمتــــــــــــاجر </h3>
    </div>
    <div class="row">
     <div class="col-2 sort">
      <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
        <nav class="nav nav-pills flex-column">  
          <h5>اقسام تراثيات:</h5>       
          <?php
          foreach($cats as $index=>$cat):
          ?>
          <a class="nav-link" href="#item-<?=$index?>"><?=$cat['name']?></a>
          <?php endforeach ?>
        </nav>
        <div class="">

          <form action="index.php#store" method="post">
          <div>
            <h5>تصفية حسب المدينة:</h5>
            <div class="form-check form-check-reverse form-check-inline">
            <input class="form-check-input" type="radio" value="all" id="reverseCheck1" name="city">
              <label class="form-check-label" for="reverseCheck1">
              جميع المتاجر
              </label>
            </div>
              <br>
            <?php
            $getCities = "SELECT * FROM cities where is_exists ";
            $getAllCities = mysqli_query($conn,$getCities);
            $cities=mysqli_fetch_all($getAllCities,MYSQLI_ASSOC);
            ?>
            <?php
            foreach($cities as $index=>$city):
            ?>
            <div class="form-check form-check-reverse form-check-inline">
              <input class="form-check-input" type="radio" value="<?=$city['id']?>" id="reverseCheck1" name="city">
              <label class="form-check-label" for="reverseCheck1">
               <?=$city['name']?>
              </label>
            </div>
            <?php endforeach?>
            <input class="btn d-block sort_btn btn_index"  type="submit" value="تنفيذ" name="citySort">
          </div>
          </form>
          <form action="index.php#store" method="post">
           <div>
            <h5>تصفية حسب طبيعة التواجد:</h5>
                <div class="form-check form-check-reverse form-check-inline">
              <input class="form-check-input" type="radio" name="on" value="all" id="reverseCheck1">
              <label class="form-check-label" for="reverseCheck1">
              جميع المتاجر
              </label>             
            </div>   
            <div class="form-check form-check-reverse form-check-inline">
              <input class="form-check-input" type="radio" name="on" value="online" id="reverseCheck1">
              <label class="form-check-label" for="reverseCheck1">
             متاجر   الاونلاين
              </label>
            </div>
            <div class="form-check form-check-reverse form-check-inline">
              <input class="form-check-input" type="radio" name="on" value="market" id="reverseCheck1">
              <label class="form-check-label" for="reverseCheck1">
              المحال التجارية
              </label>             
            </div>    
            <input class="btn d-block sort_btn btn_index"  type="submit" value="تنفيذ" name="online"> 
           </div>
          </form>
        </div>
      </nav>
     </div>
     <div class="col-10 store-sc">
      <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
          <?php
          foreach($cats as $index=>$cat):
          ?>
          <div id="item-<?php echo $index; ?>">
          <div class="Section-name ">
            <h2 id="2"><?= $cat['name']?></h2>
          </div>
          <div class="row">
          <?php
          $catId=$cat['id'];
         if(isset($_POST['citySort'])){
             if($_POST['city'] == "all"){  
               $getStores = "SELECT * FROM stores where cat_id = $catId";
              }else if($_POST['citySort'] =! null){
               $city_id=$_POST['city'];
               $getStores = "SELECT * FROM stores where cat_id = $catId and city = $city_id";
              }
             }else if(isset($_POST['online'])){
             if($_POST['on']=="online"){
               $getStores = "SELECT * FROM stores where cat_id = $catId and city=19";
 
             }else if($_POST['on']=="market"){
               $getStores = "SELECT * FROM stores where cat_id = $catId and city != 19";
             }else if($_POST['on']=="all"){
              $getStores = "SELECT * FROM stores where cat_id = $catId";
             }
            }else {
              $getStores = "SELECT * FROM stores where cat_id = $catId";
          }
          $getAllStores = mysqli_query($conn,$getStores);
          $stores=mysqli_fetch_all($getAllStores,MYSQLI_ASSOC);
           foreach($stores as $index=>$store):
           ?>
            <div class="store-content  col-6 col-sm-2 ">
              <img src="img/store/<?=$store['img']?>" alt="">
              <div class="store-name">
                <h3><?=$store['name']?></h3>
                <a href="stores.php?id=<?=$store['id']?>" target="_blank">تسوق الان</a>
              </div>
            </div>
           <?php 
           endforeach ;
           ?>
          </div>
        </div>
        <?php endforeach ?>
      </div>
     </div>
    </div>
  </div>
  <!--end store-->

  <!--start dealer "تاجر"-->
  <div class="dealer" id="dealer">
    <p>هل تود الانضمام ك تاجر؟</p>
    <a class="btn" href="merchant.php">معرفة التفاصيل</a>
  </div>
  <!--end dealer-->

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