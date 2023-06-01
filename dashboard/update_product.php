<?php 
session_start();
include '../connection_db.php';
?>
<!DOCTYPE html>
<html>
<html dir="rtl">
<head>
<head>
    <?php include('head.php')?>
  </head>
<body>
  <?php
  if(isset($_GET['id']) || isset($_SESSION['upProId'])){
    $id=$_GET['id'];
    $_SESSION['upProId']=$id;

     $getProduct = "SELECT * FROM products WHERE id= $id";
     $getProductData = mysqli_query($conn,$getProduct);
     $product=mysqli_fetch_all($getProductData,MYSQLI_ASSOC);
     print_r($product)
    ?>
     <div class="update">
      <form class="row g-3 pt-5 align-center" method="POST" action="product_handel.php" enctype="multipart/form-data">
        <h3> تعديل منتج</h3>
        <?php
        //طباعة الاخطاء 
        if(isset($_SESSION['errors'])){
         $errors=$_SESSION['errors'];
         if(!empty($errors)){
        ?>
        <p class="alert alert-danger">
        <?php     
        foreach($errors as $error){
        echo $error;
        echo"<br>";
        }
      }
      unset($_SESSION['errors']);
        } 
        
        ?>
     </p>

        <div class="form-floating">
          <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?=$product[0]['name']?>">
          <label for="name">الاسم
          </label>
       </div>
       <div class="form-floating">
       <input type="file" id="fileToUpload" name="img">
       </div>
       <div class="form-floating">
          <input type="text" class="form-control" id="size" name="size" placeholder="size" value="<?=$product[0]['size']?>">
         <label for="size">الحجم
          </label>
       </div>
       <div class="form-floating">
          <input type="text" class="form-control" id="price" name="price" placeholder="name" value="<?=$product[0]['price']?>">
          <label for="name">السعر
          </label>
       </div>
       <div class="form-floating">
          <input type="text" class="form-control" id="total" name="total" placeholder="name" value="<?=$product[0]['total']?>">
          <label for="name">الكمية
          </label>
       </div>
       <div class="form-floating">
          <input type="text" class="form-control" id="desc" name="desc" placeholder="name" value="<?=$product[0]['desc']?>">
         <label for="name">الوصف
          </label>
       </div>
       <select class="form-select" aria-label="Default select example " name="store">
              <option value="selected">المتجر</option>
              <?php
               $getStores = "SELECT * FROM stores";
               $getAllStores = mysqli_query($conn,$getStores);
               $stores=mysqli_fetch_all($getAllStores,MYSQLI_ASSOC);
              foreach($stores as $index=>$store):
              ?>
              <option value="<?=$store['id']?>"> <?=$store['name']?> </option>
               <?php endforeach ?>
      </select>
      
       
         <div class="col-12">
           <button type="submit" class="btn btn-primary" name="upPro" value="UpPro">تعديل المتجر</button>
           <a class="btn btn-primary" href="show.php?no=5">عودة</a>
         </div>
      </form>
    </div>
  <?php
  }
  ?>
</body>
</html>