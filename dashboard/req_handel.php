<?php
  include("../connection_db.php");
  session_start();

      if(isset($_GET['del'])){
         if($_GET['del']=='deleteReq'){
            $id=$_GET['id'];
        $deleteReq="DELETE FROM `requests` WHERE id=$id";
        if(mysqli_query($conn,$deleteReq)){
         $_SESSION['action']='تم حذف الطلب';
         header('location:show.php?no=3');
        }else {
         echo mysqli_error($conn);
        }
       }else if($_GET['del']=='deleteAll'){
        $deleteReq="DELETE FROM `requests`";
        if(mysqli_query($conn,$deleteReq)){
         $_SESSION['action']='تم حذف الطلبات';
         header('location:show.php?no=3');
        }else {
         echo mysqli_error($conn);
        }
      } 
   }
  
?>