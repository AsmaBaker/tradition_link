<?php
  include("../connection_db.php");
  session_start();
  extract($_POST);
  $errors=[];

  if(isset($submit)){
 if($submit=="addCat"){
   if(!preg_match ("/\b[0-9]/", $id)){
      $errors[]="يجب ان يحتوي الحقل على ارقام فقط";
   }else{
      $getCat="SELECT * FROM categories where id='$id'";
      $userCat= mysqli_query($conn, $getCat);
      $cat=mysqli_fetch_all($catData,MYSQLI_ASSOC);

       if (!empty($cat)){
        $errors[]="الرقم الذي تحاول ادخاله موجود بالفعل";
        header("location:add_cat.php");
       }
   }

    if(empty($name)){
       $errors[]="الاسم مطلوب";
    }
    
    
    if(!empty($errors)){
     $_SESSION['errors']=$errors;
     header("location:add_cat.php");
    }else{
        $newCat = "INSERT INTO `categories`(`id`, `name`, `store_total`) 
        VALUES ('$id','$name','0')";
        if ($conn->query($newCat) === TRUE) {
           echo"done";
        } else {
         $errors[]="حدث خطا ما , حاول مرة اخرى";
      } }
     if(!empty($errors)){
        $_SESSION['errors']=$errors;
        header("location:add_cat.php");
     }else{
        $_SESSION['added']="تم اضافة القسم";
        header("location:show.php?no=4");
     }}
   }

   //update 

   if(isset($_POST['updateCat'])){
      $id=$_SESSION['upCatId'];
      if(empty($name)){
         $errors[]="الاسم مطلوب";
      }
      if(!empty($errors)){
       $_SESSION['errors']=$errors;
       header("location:add_cat.php");
      }else{
       
          $upCat = "UPDATE `categories` 
          SET `name`='$name' WHERE id=$id";
          if ($conn->query($upCat) === TRUE) {
             echo"done";
          } else {
           $errors[]=" حدث خطا ما , حاول مرة اخرى";
           echo mysqli_error($conn);

        } }
       if(!empty($errors)){
          $_SESSION['errors']=$errors;
          header("location:add_cat.php?id=$id");
       }else{
          $_SESSION['action']="تم تعديل القسم";
          header("location:show.php?no=4");
       }
      }

      if(isset($_GET['del'])){
         if($_GET['del']=='delCat'){
            $id=$_GET['id'];

        $deleteCat="DELETE FROM `categories` WHERE id=$id";
        if(mysqli_query($conn,$deleteCat)){
         $_SESSION['action']='تم حذف القسم';
         header('location:show.php?no=4');
        }else {
         echo mysqli_error($conn);
        }
         }
      }
  
?>