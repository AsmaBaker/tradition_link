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
      <form class="row g-3 pt-5 align-center" method="POST" action="cat_handel.php">
        <h3>اضافة قسم</h3>
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
          <label for="id">رقم القسم
          </label>
       </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="name" name="name" placeholder="name">
          <label for="name">الاسم
          </label>
       </div>
       
         <div class="col-12">
           <button type="submit" class="btn btn-primary" name="submit" value="addCat">اضافة القسم</button>
           <a class="btn btn-primary" href="show.php?no=4">عودة</a>
         </div>
      </form>
    </div>
</body>
</html>