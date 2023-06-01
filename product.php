<?php
include("connection_db.php");
  session_start();
 ?>
<!doctype html>
<html dir="rtl">
  <head>
    <title>تراثيات | منتجاتنا</title>
    <?php include('head.php')?>
  </head>
  <body>
   <!-- start navbar-->
   <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->

  <!-- start product-->
  <div class="product">
    <?php
     $sto_id=$_GET['sto_id'];
     $getProducts = "SELECT * FROM products  where sto_id=$sto_id limit 10";
     $getProductsData = mysqli_query($conn,$getProducts);
     $products=mysqli_fetch_all($getProductsData,MYSQLI_ASSOC);

     $getStores = "SELECT * FROM stores  where id=$sto_id";
     $getStoresData = mysqli_query($conn,$getStores);
     $stores=mysqli_fetch_all($getStoresData,MYSQLI_ASSOC);

    $pro_id=$_GET['pro_id'];
    
    $getProduct = "SELECT * FROM products  where id=$pro_id";
    $getProductData = mysqli_query($conn,$getProduct);
    $product=mysqli_fetch_all($getProductData,MYSQLI_ASSOC);
    ?>
    <div class="container">
        <div class="row">
          <?php
           foreach($product as $product):
           ?>
            <div class="col-md-1"></div>
            <div class="col-md-4 pic">
                <img src="img/<?=$product['sto_id']?>/<?=$product['img']?>" alt="">
            </div>
            <div class="col-md-6 data">
                <p class="name"><?=$product['name']?></p>
                <p class="desc"><?=$product['desc']?></p>
                <p class="price"><?=$product['price']?><i class="fa-solid fa-shekel-sign"></i></p>

                <?php
                if(isset($_POST['quantity'])){
                  echo $_POST['quantity'] ;
                }
                ?>
             <?php
              if($product['sto_id']==11101 ||$product['sto_id']==11104 ){
                ?>
                <a href="<?=$store['facebook']?>" target="_blank" class="btn add mt-5">الطلب من المطعم<i class="fa-brands fa-facebook-f"></i></a>
                <?php
              }else{
             ?>
             <div class="row pro">
           
             <label for="quantity" class="col-1">الكمية:</label>
            <input class="quantity col-1" type="number" id="quantity" name="quantity" min="1" max="<?=$product[`total`]?>">

            <div class="col-8"></div>
             <a href="cart.php?pro_id=<?=$product['id']?>&quantity=<?=$quantity?>" target="_blank" class="btn add col-2">اضافة الى السلة<i class="fa-solid fa-cart-shopping"></i> </a>
             </div>
             <?php } ?>           
             </div>
            <?php endforeach ?>
        </div>
    </div>
  </div>
  <!-- end product-->

  <!--start suggestion-->
  <div class="suggestion">
    
    <div class="same-store">
        <div class="container">
        <?php 
       
            foreach($stores as $store):
        ?>
      <h4>منتجات مشابهة لدى <?=$store['name']?>:</h4>
      <?php endforeach ?>
      <div class="row">
    
        <?php
        foreach($products as $index=>$product):
        ?>
        <div class="col-3 card">
        <a href="product.php?pro_id=<?=$product['id']?>&sto_id=<?=$product['sto_id']?>">
          <img src="img/<?=$sto_id?>/<?=$product['img']?>" class="card-img-top" alt="...">
          <div class="card-body row">
            <h5 class="card-title"><?=$product['name']?></h5>
            <p class="card-text"> <?=$product['price']?><i class="fa-solid fa-shekel-sign"></i></p>
            <a href="cart.php?pro_id=<?=$product['id']?>" target="_blank" class="btn add">اضافة الى السلة<i class="fa-solid fa-cart-shopping"></i> </a>
          </div>
          </a>
          </div>
          <?php endforeach ?>
      </div>
    </div>
    </div>
  </div>
  <!--end suggestion-->

 
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