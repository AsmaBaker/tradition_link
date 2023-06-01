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
 
    <div class="add">
      <form class="row g-3 pt-5 align-center" method="POST" action="product_handel.php" enctype="multipart/form-data">
        <h3>اضافة منتج</h3>
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
          <input type="text" class="form-control" id="id" name="id" placeholder="id">
          <label for="id">رقم المنتج
          </label>
       </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="name" name="name" placeholder="name">
          <label for="name">الاسم
          </label>
       </div>
       <div class="form-floating">
       <input type="file" id="fileToUpload" name="img">
       </div>
       <div class="form-floating">
          <textarea type="text" class="form-control" id="size" name="size" placeholder="size"></textarea>
          <label for="size">الحجم
          </label>
       </div>
       <div class="form-floating">
          <textarea type="text" class="form-control" id="price" name="price" placeholder="name"></textarea>
          <label for="name">السعر
          </label>
       </div>
       <div class="form-floating">
          <textarea type="text" class="form-control" id="total" name="total" placeholder="name"></textarea>
          <label for="name">الكمية
          </label>
       </div>
       <div class="form-floating">
          <textarea type="text" class="form-control" id="desc" name="desc" placeholder="name"></textarea>
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
           <button type="submit" class="btn btn-primary" name="submit" value="addPro">اضافة المنتج</button>
           <a class="btn btn-primary" href="show.php?no=6">عودة</a>
         </div>
      </form>
    </div>
</body>
</html>