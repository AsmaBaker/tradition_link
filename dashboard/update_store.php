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
  if(isset($_GET['id']) || isset($_SESSION['upStoId'])){
    $id=$_GET['id'];
    $_SESSION['upStoId']=$id;

     $getStore = "SELECT * FROM stores WHERE id= $id";
     $getStoreData = mysqli_query($conn,$getStore);
     $store=mysqli_fetch_all($getStoreData,MYSQLI_ASSOC);
     print_r($store)
    ?>
     <div class="update">
      <form class="row g-3 pt-5 align-center" method="POST" action="store_handel.php" enctype="multipart/form-data">
        <h3> تعديل متجر</h3>
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
          <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?= $store[0]['name']?>">
          <label for="name">الاسم
          </label>
       </div>
       <div class="form-floating">
       <input type="file" id="fileToUpload" name="img" value="<?= $store[0]['img']?>">
       </div>
       <div class="form-floating">
          <input type="text" class="form-control" id="desc" name="desc" placeholder="name" value="<?= $store[0]['desc']?>">
          <label for="name">الوصف
          </label>
       </div>
       <div class="row mt-3"> 
         <div class="col-5">
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
         </div>
         <div class="col-5">
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
       </div>
       <div class="form-floating">
          <input type="text" class="form-control" id="address" name="address" placeholder="name" value="<?= $store[0]['address']?>">
          <label for="address">العنوان
          </label>
       </div> 
       <div class="form-floating">
          <input type="text" class="form-control" id="facebook" name="facebook" placeholder="name" value="<?= $store[0]['facebook']?>">
          <label for="facebook">فيسبوك
          </label>
       </div> 
       <div class="form-floating">
          <input type="text" class="form-control" id="instagram" name="instagram" placeholder="name" value="<?= $store[0]['instagram']?>">
          <label for="instagram">انستجرام
          </label>
       </div> 
       <div class="form-floating">
          <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="name" value="<?= $store[0]['whatsapp']?>">
          <label for="whatsapp">واتس اب
          </label>
       </div> 
       <div class="form-floating">
          <input type="text" class="form-control" id="phone" name="phone" placeholder="name" value="<?= $store[0]['phone']?>">
          <label for="phone">رقم الهاتف <?= $store[0]['phone']?>
          </label>
       </div>
      
       
         <div class="col-12">
           <button type="submit" class="btn btn-primary" name="upStore" value="UpStore">تعديل المتجر</button>
           <a class="btn btn-primary" href="show.php?no=5">عودة</a>
         </div>
      </form>
    </div>
  <?php
  }
  ?>
</body>
</html>