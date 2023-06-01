<?php
  include("../connection_db.php");
  session_start();
  extract($_POST);
  $errors=[];

  if(isset($submit)){
   if($submit=="addStore"){ 
   
  $img=$_FILES['img']['name'];
  $tmp_name = $_FILES['img']['tmp_name'];
  move_uploaded_file($tmp_name , "../img/store/$img");
  
  $getCats = "SELECT * FROM categories where id=$cat";
  $getAllCats = mysqli_query($conn,$getCats);
  $cats=mysqli_fetch_all($getAllCats,MYSQLI_ASSOC);

  $cat_name=$cats[0]['name'];

  $addStore="INSERT INTO `stores`(`id`, `name`, `img`, `desc`, `address`, `city`, `facebook`, `instagram`, `whatsapp`, `phone`, `cat_id`, `cat_name`)
   VALUES ('$id','$name','$img','$desc','$address','$city','$facebook','$instagram','$whatsapp','$phone','$cat','$cat_name')";

  if(mysqli_query($conn,$addStore)){
    $_SESSION['action']='تم اضافة المتجر';
    header('location:show.php?no=5');
  }else {
     echo mysqli_error($conn);
  }
 }
}
   //update 

   if(isset($_POST['upStore'])){
      $id=$_SESSION['upStoId'];

      $getStores = "SELECT * FROM stores where id=$id";
      $getAllStores = mysqli_query($conn,$getStores);
      $stores=mysqli_fetch_all($getAllStores,MYSQLI_ASSOC);
      $image=$stores[0]['img'];
   
         unlink("../img/store/$image");
         
      $img=$_FILES['img']['name'];
      $tmp_name = $_FILES['img']['tmp_name'];
      move_uploaded_file($tmp_name , "../img/store/$img");

      if(!empty($errors)){
       $_SESSION['errors']=$errors;
       header("location:add_store.php");
      }else{
         
         $getCats = "SELECT name FROM categories where id=$cat";
         $getAllCats = mysqli_query($conn,$getCats);
         $cate=mysqli_fetch_all($getAllCats,MYSQLI_ASSOC);

         $cat_name=$cate[0]['name'];
          $upSto = "UPDATE `stores` 
          SET `name`='$name',`img`='$img',`desc`='$desc',`address`='$address',`city`='$city',`facebook`='$facebook',`instagram`='$instagram',`whatsapp`='$whatsapp',`phone`='$phone',`cat_id`='$cat',`cat_name`='$cat_name'
           WHERE id=$id";
          if ($conn->query($upSto) === TRUE) {
             echo"done";
          } else {
           $errors[]=" حدث خطا ما , حاول مرة اخرى";
           echo mysqli_error($conn);

        } 
       if(!empty($errors)){
          $_SESSION['errors']=$errors;
          header("location:update_store.php?id=$id");
       }else{
          $_SESSION['action']="تم تعديل المتجر";
          header("location:show.php?no=5");
       }
      
      
   }}

   if(isset($_GET['del'])){
      if($_GET['del']=='delStore'){
         $id=$_GET['id'];

         $getStores = "SELECT * FROM stores where id=$id";
         $getAllStores = mysqli_query($conn,$getStores);
         $stores=mysqli_fetch_all($getAllStores,MYSQLI_ASSOC);
        $img=$stores[0]['img'];
      
            unlink("../img/store/$img");

     $deleteStore="DELETE FROM `stores` WHERE id=$id";
     if(mysqli_query($conn,$deleteStore)){

      $_SESSION['action']='تم حذف المتجر';
      header('location:show.php?no=5');
     }else {
      echo mysqli_error($conn);
     }
      }
   }
  
?>