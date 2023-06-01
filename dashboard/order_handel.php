<?php
  include("../connection_db.php");
  session_start();

  if(isset($_GET['edit'])){
    if($_GET['edit']=='deli'){
        $id=$_GET['id'];

        $upStatus = "UPDATE `orders_data` 
        SET`status`='1'
         WHERE id=$id";
        if ($conn->query($upStatus) === TRUE) {
            echo"done";
          
        } else {
         $errors[]=" حدث خطا ما , حاول مرة اخرى";
         echo mysqli_error($conn);
      } 
      if(!empty($errors)){
        $_SESSION['errors']=$errors;
        header("location:add_cat.php?id=$id");
     }else{
        $_SESSION['action']='تم تعديل الحالة';
        header('location:show.php?no=7');
     }
    }else if($_GET['edit']=='done'){
        $id=$_GET['id'];
       $date= date("Y-m-d h:i:sa") ;
        $upStatus = "UPDATE `orders_data` 
        SET `delivered_at`='$date'
         WHERE id=$id";
        if ($conn->query($upStatus) === TRUE) {
       echo"done";
        } else {
         $errors[]=" حدث خطا ما , حاول مرة اخرى";
         echo mysqli_error($conn);
      } 
      if(!empty($errors)){
        $_SESSION['errors']=$errors;
        header("location:add_cat.php?id=$id");
     }else{
        $_SESSION['action']='تم تعديل الحالة';
        header('location:show.php?no=7');
     }

    }
  }



      if(isset($_GET['del'])){
        echo"fff";
         if($_GET['del']=='delOrder'){
            $id=$_GET['id'];
       $deleteCart="DELETE FROM `carts` WHERE ord_id=$id";
        if(mysqli_query($conn,$deleteCart)){
        $deleteOrder="DELETE FROM `orders_data` WHERE id=$id";
        if(mysqli_query($conn,$deleteOrder)){
     
            $_SESSION['action']='تم حذف الطلب';
             header('location:show.php?no=7');
            }
        }else {
         echo mysqli_error($conn);
        }
       }
      }
?>