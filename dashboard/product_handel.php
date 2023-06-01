<?php
  include("../connection_db.php");
  session_start();
  extract($_POST);
  $errors=[];

  if(isset($submit)){
   if($submit=="addPro"){ 
      //$getStores = "SELECT * FROM stores where id=$cat";
      //$getAllStores = mysqli_query($conn,$getStores);
      //$atores=mysqli_fetch_all($getAllStores,MYSQLI_ASSOC);
   
  $img=$_FILES['img']['name'];
  $tmp_name = $_FILES['img']['tmp_name'];
  move_uploaded_file($tmp_name , "../img/$store/$img");


  $addPro="INSERT INTO `products`(`id`, `name`, `img`, `size`, `total`, `price`, `desc`, `sto_id`)
   VALUES ('$id','$name','$img','$size','$total','$price','$desc','$store')";

  if(mysqli_query($conn,$addPro)){
    $_SESSION['action']='تم اضافة المنتج';
    header('location:show.php?no=6');

 }else {
     echo mysqli_error($conn);
 }
   }
}

   //update 

   if(isset($_POST['upPro'])){
      $id=$_SESSION['upProId'];

      $getProduct = "SELECT * FROM products where id=$id";
      $getAllProduct = mysqli_query($conn,$getProduct);
      $product=mysqli_fetch_all($getAllProduct,MYSQLI_ASSOC);
      $image=$product[0]['img'];
      $sto_id=$product[0]['sto_id'];

   
         unlink("../img/$sto_id/$image");
         
      $img=$_FILES['img']['name'];
      $tmp_name = $_FILES['img']['tmp_name'];
      move_uploaded_file($tmp_name , "../img/$store/$img");

      if(!empty($errors)){
       $_SESSION['errors']=$errors;
       header("location:update_product.php");
      }else{
         
          $upPro = "UPDATE `products` 
          SET `name`='$name',`img`='$img',`size`='$size',`total`='$total',`price`='$price',`desc`='$desc',`sto_id`='$store'
           WHERE id=$id";
          if ($conn->query($upPro) === TRUE) {
             echo"done";
          } else {
           //$errors[]=" حدث خطا ما , حاول مرة اخرى";
           echo mysqli_error($conn);

        } 
        
       if(!empty($errors)){
          $_SESSION['errors']=$errors;
          header("location:update_product.php?id=$id");
       }else{
          $_SESSION['action']="تم تعديل المنتج";
          header("location:show.php?no=6");
       }
       
      
      
   }}

   if(isset($_GET['del'])){
      if($_GET['del']=='delPro'){
         $id=$_GET['id'];

         $getProducts = "SELECT * FROM products where id=$id";
         $getAllProducts = mysqli_query($conn,$getProducts);
         $product=mysqli_fetch_all($getAllProducts,MYSQLI_ASSOC);
         $img=$product[0]['img'];
         $sto_id=$product[0]['sto_id'];

   
            unlink("../img/$sto_id/$img");

     $deleteProduct="DELETE FROM `products` WHERE id=$id";
     if(mysqli_query($conn,$deleteProduct)){

      $_SESSION['action']='تم حذف المنتج';
      header('location:show.php?no=6');
     }else {
      echo mysqli_error($conn);
     }
     
      }
   }
  
?>