<?php
  include("../connection_db.php");
  session_start();
  extract($_POST);
  $errors=[];

   //update admin

   if(isset($_POST['updateCity'])){
      $id=$_SESSION['upcitId'];
      if(empty($name)){
         $errors[]="الاسم مطلوب";
      }
      if(!empty($errors)){
       $_SESSION['errors']=$errors;
       header("location:ubdate_city.php");
      }else{
          $upCit = "UPDATE `cities` 
          SET `name`='$name',`is_delivery`='$del',`delivery_price`='$price' 
          WHERE id=$id";
          if ($conn->query($upCit) === TRUE) {
             echo"done";
          } else {
           $errors[]=" $id حدث خطا ما , حاول مرة اخرى";
           echo mysqli_error($conn);

        } }
       if(!empty($errors)){
          $_SESSION['errors']=$errors;
          header("location:update_city.php?id=$id");
       }else{
          $_SESSION['action']="تم تعديل المدينة";
          header("location:show.php?no=2");
       }
      }
?>