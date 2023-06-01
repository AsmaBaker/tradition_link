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
  if(isset($_GET['id']) || isset($_SESSION['upCatId'])){
    $id=$_GET['id'];
    $_SESSION['upCatId']=$id;

     $getCat = "SELECT * FROM categories WHERE id= $id";
     $getCatData = mysqli_query($conn,$getCat);
     $cat=mysqli_fetch_all($getCatData,MYSQLI_ASSOC);
    ?>
    <div class="update">
    <form class="row g-3 pt-5 align-center" method="POST" action="cat_handel.php?id=<?=$id?>">
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
        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?=$cat[0]['name']?>">
        <label for="name">الاسم
        </label>
     </div>


       <div class="col-12">
         <button type="submit" class="btn btn-primary" name="updateCat" value="updateCat">حفظ البيانات الجديدة</button>
         <a class="btn btn-primary" href="show.php?no=4">عودة</a>
       </div>
    </form>
  </div>
  <?php
  }
  ?>
</body>
</html>