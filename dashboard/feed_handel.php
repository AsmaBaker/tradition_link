<?php
  include("../connection_db.php");
  session_start();

      if(isset($_GET['del'])){
         if($_GET['del']=='delFeed'){
            $id=$_GET['id'];
        $deleteFeed="DELETE FROM `feedbacks` WHERE id=$id";
        if(mysqli_query($conn,$deleteFeed)){
         $_SESSION['action']='تم حذف الرسالة';
         header('location:show.php?no=8');
        }else {
         echo mysqli_error($conn);
        }
       }else if($_GET['del']=='delAll'){
        $deleteFeed="DELETE FROM `feedbacks`";
        if(mysqli_query($conn,$deleteFeed)){
         $_SESSION['action']='تم حذف الرسائل';
         header('location:show.php?no=8');
        }else {
         echo mysqli_error($conn);
        }
      } 
   }
?>