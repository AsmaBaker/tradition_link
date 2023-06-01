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
  if(isset($_GET['id']) || isset($_SESSION['upcitId'])){
    $id=$_GET['id'];
    $_SESSION['upcitId']=$id;

     $getCites = "SELECT * FROM cities WHERE id= $id";
     $getCitesData = mysqli_query($conn,$getCites);
     $cites=mysqli_fetch_all($getCitesData,MYSQLI_ASSOC);
    ?>
    <div class="update">
    <form class="row g-3 pt-5 align-center" method="POST" action="city_handel.php?id=<?php $id ?>">
      <h3>تعديل</h3>
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
        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?=$cites[0]['name']?>">
        <label for="name">اسم المدينة
        </label>
     </div>
  

       <select  name="del" class="form-select" aria-label="Default select example">
       <option selected>التوصيل</option>
       <option  value="1">متوفر توصيل</option>
       <option  value="0">غير متوفر </option>
      </select>
      <div class="form-floating">
        <input type="text" class="form-control" id="price" name="price" placeholder="price" value="<?=$cites[0]['delivery_price']?>">
        <label for="price">تكلفة التوصيل
        </label>
     </div>


       <div class="col-12">
         <button type="submit" class="btn btn-primary" name="updateCity" value="updateCity">حفظ البيانات الجديدة</button>
         <a class="btn btn-primary" href="show.php?no=2">عودة</a>
       </div>
    </form>
  </div>
  <?php
  }
  ?>
</body>
</html>