<?php
   include("connection_db.php");
   session_start();
?>
<!doctype html>
<html dir="rtl">
  <head>
    <title>  المتجر</title>
    <?php include('head.php')?>
  </head>
  
  <body>
  <!-- start navbar-->
  <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->

  <!--start stores page-->
 <div class="stores" id="stores">
      <?php
        $_SESSION['id']=$_GET['id'];
        $id=$_SESSION['id'];
        $getStores = "SELECT * FROM stores where id=$id";
        $getAllStores = mysqli_query($conn,$getStores);
        $stores=mysqli_fetch_all($getAllStores,MYSQLI_ASSOC);
      ?>
       <div class="container">

        <div class="row description ">
         <?php
          foreach($stores as $stores):
         ?>
         <div class="img-descr col-md-3 "> 
            <img src="img/store/<?=$stores['img']?>"> 
         </div>
         <div class=" descr col-md-8 " >
             <p class="name-store"><?=$stores['name']?></p>
             <p><?=$stores['desc']?></p>
             <p>العنوان : <?=$stores['address']?></p>
          </div>
          <div class="links col-md-1">
               <ul>
               <a href="<?=$stores['instagram']?>"><i class="fa-brands fa-instagram"></i></a>
               <a href="<?=$stores['facebook']?>" ><i class="fa-brands fa-facebook-f"></i></a>
             </ul>
          </div>
          <?php endforeach ?>
        </div>
        <div class="sortS row">
        <div class="col-2">
         <h4>فرز المنتجات حسب:</h4>
        </div>
       <form action="stores.php?id=<?=$id?>" method="post" class="form-one col-3">
       <div class="row">

        <div class="col-6">
       <select class="form-select" aria-label="Default select example" name="sort_p">
        <option selected>السعر</option>
        <option value="1">من الاقل الى الاعلى</option>
        <option value="2">من الاعلى الى الاقل </option>
        <option value="3">تراجع عن الفرز</option>
       </select>
       </div>
       <div class="col-1">
        <input type="submit" name="sort_price" class="btn bg-light" value="فرز حسب السعر"  >
       </div>
       </div>
        </form>
        <form action="stores.php?id=<?=$id?>" method="post" class="form-two col-3">
       <div class="row">
       <div class="col-6">
       <select class="form-select" aria-label="Default select example" name="sort_d">
        <option selected>الاحدث</option>
        <option value="1">من الاقدم الى الاحدث</option>
        <option value="2">من الاحدث الى الاقدم</option>
        <option value="3">تراجع عن الفرز</option>
       </select>
       </div>
       <div class="col-6">
        <input type="submit" name="sort_date" class="btn bg-light" value="فرز حسب الاحدث"  >
       </div>
       </div>
        </form>
        </div>


        <div class="store_product">    
           <?php
            if(isset($_POST['sort_price'])){
       
              if($_POST['sort_p'] == 1){
               $getProducts = "SELECT * FROM products where sto_id=$id ORDER BY `products`.`price` ASC";
              }else if ($_POST['sort_p'] ==2){
               $getProducts = "SELECT * FROM products where sto_id=$id ORDER BY `products`.`price` DESC";
              }else if ($_POST['sort_p'] ==3){
               $getProducts = "SELECT * FROM products where sto_id=$id";
              }
            }else if(isset($_POST['sort_date'])){
              if($_POST['sort_d'] ==1){
                $getProducts = "SELECT * FROM products where sto_id=$id ORDER BY `products`.`created_at` ASC";
               }else if ($_POST['sort_d']==2){
                $getProducts = "SELECT * FROM products where sto_id=$id ORDER BY `products`.`created_at` DESC";
               }else if ($_POST['sort_d']==3){
                $getProducts = "SELECT * FROM products where sto_id=$id";
               }
            }else{ 
              $getProducts = "SELECT * FROM products where sto_id=$id";
            }
            $getAllProducts = mysqli_query($conn,$getProducts);
            $products=mysqli_fetch_all($getAllProducts,MYSQLI_ASSOC);
           ?>
          <div class="row">
           <?php
           foreach($products as $index=>$product):
           ?>
          <div class="col-3 card" >
          <form action="cart.php" method="$_GET">
           <a href="product.php?pro_id=<?=$product['id']?>&sto_id=<?=$product['sto_id']?>" target="_blank">
            <img src="img/<?=$id?>/<?=$product['img']?>" class="card-img-top" alt="...">
            <div class="card-body row">
             <h5 class="card-title"><?=$product['name']?></h5>
             <p class="card-text"> <?=$product['price']?> <i class="fa-solid fa-shekel-sign"></i></p>
             <?php
              if($product['sto_id']==11101 ||$product['sto_id']==11104 ){
                ?>
                <a href="<?=$stores['facebook']?>" target="_blank" class="btn add">الطلب من المطعم<i class="fa-brands fa-facebook-f"></i></a>
                <?php
              }else{
             ?>
             <a href="cart.php?pro_id=<?=$product['id']?>" target="_blank" class="btn add">اضافة الى السلة<i class="fa-solid fa-cart-shopping"></i> </a>
             <?php } ?>
            </div>
           </a>
           </form>
          </div>
          <?php endforeach ?>
          </div>
         </div>
        </div>
 </div>
      

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

