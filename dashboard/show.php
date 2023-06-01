<?php
session_start();
include '../connection_db.php';

?>

<!DOCTYPE html>
<html dir="rtl">
<head>
    <?php include('../head.php')?>
  </head>
<body>
<div class="navbar">
   <div class="container-fluid">
    <div class="col-1">
      <img src="../img/logo.png" alt="logo">
    </div>
    <div class="col-7"></div>
    <div class="col-2">
      <a class="navbar-brand" href='log_out_handel.php?action="logout"'> خروج <i class="fa-solid fa-right-from-bracket fa-rotate-180 fa-sm"></i></a>
    </div>
   </div>
  </div>
  <div class="container">
  <?php
  if(isset($_GET['no'])){
  if($_GET['no']==1){
  ?>
  <div class="content">
    <div class="container">
      <td><a class="btn btn-secondary" href="index.php?status=<?=$_SESSION['status']?>">عودة الى الصفحة الرئيسية</a></td> 
      <td><a class="btn btn-success" href="add_admin.php">اضافة مسؤول جديد</a></td>
      <?php
    //طباعة  
    if(isset($_SESSION['action'])){
      $action=$_SESSION['action'];
      if(!empty($action)){
    ?>
    <p class="alert alert-success mt-4">
        <?php     
        echo $action;        
      }
      unset($_SESSION['action']);
      } 
        ?>
    </p>
     <table class="table" >
      <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">الاسم</th>
         <th scope="col">البريد الالكتروني</th>
         <th scope="col">كلمة السر</th>
         <th scope="col">الحالة</th>
         <th scope="col">تاريخ الانشاء</th>

       </tr>
     </thead>
     <tbody>
      <?php
        $getAdmins = "SELECT * FROM admins";
        $getAllAdmins = mysqli_query($conn,$getAdmins);
        $admins=mysqli_fetch_all($getAllAdmins,MYSQLI_ASSOC);
      
        foreach($admins as $index=>$admin):
      ?>
      <tr>
      <td scope="row"><?= $index +1 ?></td>
      <td><?= $admin['name'] ?></td>
      <td><?= $admin['email'] ?></td>
      <td><?= $admin['password'] ?></td>
      <?php
      if($admin['status']==0){
        ?>
      <td>مسؤول</td>
      <?php
      }else if($admin['status']==1){
        ?>
      <td> مسؤول رئيسيي</td>
      <?php
      }
      ?>
      <td><?= $admin['created_at'] ?></td>
      <td><a class="btn btn-warning" href="update_admin.php?id=<?= $admin['id'] ?>">تعديل</a></td>
      <td><a class="btn btn-danger" href="admin_handel.php?id=<?=$admin['id'] ?>& del=deleteAd">حذف</a></td>
      </tr>
      <?php endforeach ?>
    </tbody>
     </table>
        
    </div>
  </div>
  <?php
   }else if($_GET['no']==2){
    ?>
  <div class="content">
    <div class="container">
      <td><a class="btn btn-secondary" href="index.php?status=<?=$_SESSION['status']?>">عودة الى الصفحة الرئيسية</a></td> 
      <?php
      //طباعة  
    if(isset($_SESSION['action'])){
      $action=$_SESSION['action'];
      if(!empty($action)){
    ?>
    <p class="alert alert-success mt-4">
        <?php     
        echo $action;        
      }
      unset($_SESSION['action']);
      } 
        ?>
    </p>

    <table class="table" >
      <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">الاسم</th>
         <th scope="col">متوفر توصيل</th>
         <th scope="col">تضم متاجر </th>
         <th scope="col">تكلفة التوصيل</th>

       </tr>
     </thead>
     <tbody>
      <?php
      $getcites = "SELECT * FROM cities";
      $getAllCities = mysqli_query($conn,$getcites);
      $cities=mysqli_fetch_all($getAllCities,MYSQLI_ASSOC);
        foreach($cities as $index=>$city):
      ?>
      <tr>
      <td scope="row"><?= $index +1 ?></td>
      <td><?= $city['name'] ?></td>
      <?php
      if($city['is_delivery']==0){
        ?>
      <td>لا يتوفر توصيل</td>
      <?php
      }else if($city['is_delivery']==1){
        ?>
      <td>يتوفر توصيل</td>
      <?php
      }
      ?>
      <?php
      $id=$city['id'];
       $getStores = "SELECT * FROM stores where city=$id";
       $getAllStores = mysqli_query($conn,$getStores);
       $stores=mysqli_fetch_all($getAllStores,MYSQLI_ASSOC);
       if(empty($stores)){

        $upCit = "UPDATE `cities`
        SET `is_exists`='0' WHERE id=$id";
        if ($conn->query($upCit) === TRUE) {
        } else {
         $errors[]=" حدث خطا ما , حاول مرة اخرى";
         echo mysqli_error($conn);
        }
       }else{
        $upCit = "UPDATE `cities`
        SET `is_exists`='1' WHERE id=$id";
        if ($conn->query($upCit) === TRUE) {
        } else {
         $errors[]=" حدث خطا ما , حاول مرة اخرى";
         echo mysqli_error($conn);
        }
       }
       
      if($city['is_exists']==0){
        ?>
      <td>لا تضم متاجر</td>
      <?php
      }else if($city['is_exists']==1){
        ?>
      <td>تضم متاجر</td>
      <?php
      }
      ?>
      <td><?= $city['delivery_price'] ?></td>

      <td><a class="btn btn-warning" href="update_city.php?id=<?= $city['id'] ?>">تعديل</a></td>
      </tr>
      <?php endforeach ?>
    </tbody>
     </table>
 
    </div>
  </div>
   <?php
  }else if($_GET['no']==3){
   ?>
  <div class="content">
   <div class="container">
     <td><a class="btn btn-secondary" href="index.php?status=<?=$_SESSION['status']?>">عودة الى الصفحة الرئيسية</a></td> 
     <td><a class="btn btn-danger" href="req_handel.php?del=deleteAll" >حذف الكل</a></td>
     <?php
     //طباعة  
   if(isset($_SESSION['action'])){
     $action=$_SESSION['action'];
     if(!empty($action)){
   ?>
   <p class="alert alert-success mt-4">
       <?php     
       echo $action;        
     }
     unset($_SESSION['action']);
     } 
       ?>
   </p>

   <table class="table" >
     <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">الاسم</th>
        <th scope="col">رقم الهاتف</th>
        <th scope="col">المدينة</th>
        <th scope="col">القسم</th>
        <th scope="col">وصف المتجر</th>
        <th scope="col">تاريخ الارسال</th>
      </tr>
    </thead>
    <tbody>
     <?php
     $getRequest = "SELECT * FROM requests";
     $getAllRequest = mysqli_query($conn,$getRequest);
     $requests=mysqli_fetch_all($getAllRequest,MYSQLI_ASSOC);
       foreach($requests as $index=>$request):
     ?>
     <tr>
     <td scope="row"><?= $index +1 ?></td>
     <td><?= $request['name'] ?></td>
     <td><?= $request['phone'] ?></td>
     <td><?= $request['city'] ?></td>
     <td><?= $request['cat_id'] ?></td>
     <td><?= $request['description'] ?></td>
     <td><?= $request['created_at'] ?></td>
     <td><a class="btn btn-danger" href="req_handel.php?id=<?=$request['id'] ?>& del=deleteReq">حذف</a></td>
     </tr>
     <?php endforeach ?>
   </tbody>
    </table>

   </div>
  </div>
   <?php
  }else if($_GET['no']==4){
    ?>
  <div class="content">
    <div class="container">
      <td><a class="btn btn-secondary" href="index.php?status=<?=$_SESSION['status']?>">عودة الى الصفحة الرئيسية</a></td>
      <td><a class="btn btn-success" href="add_cat.php">اضافة قسم جديد</a></td>
      <?php
    //طباعة  
    if(isset($_SESSION['action'])){
      $action=$_SESSION['action'];
      if(!empty($action)){
    ?>
    <p class="alert alert-success mt-4">
        <?php     
        echo $action;        
      }
      unset($_SESSION['action']);
      } 
        ?>
    </p>
    <table class="table" >
      <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">الاسم</th>
         <th scope="col">عدد المتاجر</th>
       </tr>
     </thead>
     <tbody>
      <?php
      
      $getCats = "SELECT * FROM categories";
      $getAllCats = mysqli_query($conn,$getCats);
      $cats=mysqli_fetch_all($getAllCats,MYSQLI_ASSOC);

        foreach($cats as $index=>$cat):
      ?>
      <tr>
      <td scope="row"><?= $index +1 ?></td>
      <td><?= $cat['name'] ?></td>
      <?php
       $cat_id=$cat['id'];
        $getStores = "SELECT * FROM stores where cat_id=$cat_id";
        $getAllStores = mysqli_query($conn,$getStores);
        $stores=mysqli_fetch_all($getAllStores,MYSQLI_ASSOC);

        $count=count($stores);
        $upSto = "UPDATE `categories` SET `store_total`='$count' WHERE id=$cat_id";
        if ($conn->query($upSto) === TRUE) {
        } else {
         $errors[]=" حدث خطا ما , حاول مرة اخرى";
         echo mysqli_error($conn);
        }
      ?>  
      <td><?=$cat['store_total']?></td>
      <td><a class="btn btn-warning" href="update_cat.php?id=<?= $cat['id'] ?>">تعديل</a></td>
      <td><a class="btn btn-danger" href="cat_handel.php?id=<?= $cat['id'] ?>& del=delCat">حذف</a></td>
      </tr>
      <?php endforeach ?>
    </tbody>
     </table>
        
    </div>
  </div>
  <?php
   }else if($_GET['no']==5){
    ?>
  <div class="content">
    <div class="container">
      <td><a class="btn btn-secondary" href="index.php?status=<?=$_SESSION['status']?>">عودة الى الصفحة الرئيسية</a></td> 
      <td><a class="btn btn-success" href="add_store.php">اضافة متجر جديد</a></td>
      <?php
      //طباعة  
    if(isset($_SESSION['action'])){
      $action=$_SESSION['action'];
      if(!empty($action)){
    ?>
    <p class="alert alert-success mt-4">
        <?php     
        echo $action;        
      }
      unset($_SESSION['action']);
      } 
        ?>
    </p>

    <table class="table" >
      <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">الاسم</th>
         <th scope="col">الصورة</th>
         <th scope="col">الوصف</th>
         <th scope="col">العنوان</th>
         <th scope="col">المدينة</th>
         <th scope="col">فيسبوك</th>
         <th scope="col">انستجرام</th>
         <th scope="col">واتس اب</th>
         <th scope="col">رقم الهاتف</th>
         <th scope="col">اسم القسم</th>
         <th scope="col">تاريخ الانشاء</th>
       </tr>
     </thead>
     <tbody>
      <?php
      $getStores = "SELECT * FROM stores";
      $getAllStores = mysqli_query($conn,$getStores);
      $stores=mysqli_fetch_all($getAllStores,MYSQLI_ASSOC);
        foreach($stores as $index=>$store):
      ?>
      <tr>
      <td scope="row"><?= $index +1 ?></td>
      <td><?= $store['name'] ?></td>
      <td><img src="../img/store/<?= $store['img'] ?>" width="100%" alt=""> </td>
      <td><?= $store['desc'] ?></td>
      <td><?= $store['address'] ?></td>
 
      <?php
      $city_id=$store['city'];
      $getcity = "SELECT * FROM cities where id= $city_id";
      $getAllCity = mysqli_query($conn,$getcity);
      $cities=mysqli_fetch_all($getAllCity,MYSQLI_ASSOC);
      foreach($cities as $city):
      ?>
      <td><?= $city['name'] ?></td>
      
      <?php endforeach ?>
      <td><a href="<?= $store['facebook'] ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></td>
      <td><a href="<?= $store['instagram'] ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></td>
      <td><?= $store['whatsapp'] ?></td>
      <td><?= $store['phone'] ?></td>
      <td><?= $store['cat_name'] ?></td>
      <td><?= $store['created_at'] ?></td>


      <td><a class="btn btn-warning" href="update_store.php?id=<?= $store['id'] ?>">تعديل</a></td>
      <td><a class="btn btn-danger" href="store_handel.php?id=<?= $store['id'] ?>&del=delStore">حذف</a></td>
      </tr>
      <?php endforeach ?>
    </tbody>
     </table>
        
    </div>
  </div>
  <?php
  }else if($_GET['no']==6){
    ?>
  <div class="content">
    <div class="container">
      <td><a class="btn btn-secondary" href="index.php?status=<?=$_SESSION['status']?>">عودة الى الصفحة الرئيسية</a></td> 
      <td><a class="btn btn-success" href="add_product.php">اضافة منتج جديد</a></td>
      <?php
    //طباعة  
    if(isset($_SESSION['action'])){
      $action=$_SESSION['action'];
      if(!empty($action)){
    ?>
    <p class="alert alert-success mt-4">
        <?php     
        echo $action;        
      }
      unset($_SESSION['action']);
      } 
        ?>
    </p>
    <table class="table">
      <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">الاسم</th>
         <th scope="col">الصورة</th>
         <th scope="col">الكمية المتوفرة</th>
         <th scope="col">السعر</th>
         <th scope="col">الوصف</th>
         <th scope="col">اسم المتجر</th>
       </tr>
     </thead>
     <tbody>
      <?php
      
      $getProducts = "SELECT * FROM products";
      $getAllProducts = mysqli_query($conn,$getProducts);
      $products=mysqli_fetch_all($getAllProducts,MYSQLI_ASSOC);

        foreach($products as $index=>$product):
        ?>
      <tr>
      <td scope="row"><?= $index +1 ?></td>
      <td><?= $product['name'] ?></td>
      <td class="w-25"><img src="../img/<?= $product['sto_id'] ?>/<?= $product['img'] ?>" width="70%" alt=""> </td>
      <td><?= $product['total'] ?></td>
      <td><?= $product['price'] ?></td>
      <td><?= $product['desc'] ?></td>
      <?php
      $store_id=$product['sto_id'];
      $getStores = "SELECT name FROM stores where id= $store_id";
      $getAllStores = mysqli_query($conn,$getStores);
      $stores=mysqli_fetch_all($getAllStores,MYSQLI_ASSOC);
      foreach($stores as $store):
      ?>
      <td><?= $store['name'] ?></td>
      
      <?php endforeach ?>
      
      <td><a class="btn btn-warning" href="update_product.php?id=<?= $product['id'] ?>">تعديل</a></td>
      <td><a class="btn btn-danger" href="product_handel.php?id=<?= $product['id']?>&del=delPro">حذف</a></td>
      </tr>
      <?php endforeach ?>
    </tbody>
     </table>
        
    </div>
  </div>
  <?php
  }else if($_GET['no']==7){
    ?>
  <div class="content">
     <?php
      $getOrders= "SELECT * FROM orders_data  ORDER BY `orders_data`.`cerated_at` ASC";
      $getAllOrders = mysqli_query($conn,$getOrders);
      $orders=mysqli_fetch_all($getAllOrders,MYSQLI_ASSOC);

      $getOrdersN= "SELECT * FROM orders_data where status=0 ORDER BY `orders_data`.`cerated_at` ASC";
      $getAllOrdersN = mysqli_query($conn,$getOrdersN);
      $ordersN=mysqli_fetch_all($getAllOrdersN,MYSQLI_ASSOC);

      $getOrdersD= "SELECT * FROM orders_data where status=1 and delivered_at IS NULL ORDER BY `orders_data`.`cerated_at` ASC";
      $getAllOrdersD = mysqli_query($conn,$getOrdersD);
      $ordersD=mysqli_fetch_all($getAllOrdersD,MYSQLI_ASSOC);
    
      
      ?>
      
    <div class="container">
      <td><a class="btn btn-secondary" href="index.php?status=<?=$_SESSION['status']?>">عودة الى الصفحة الرئيسية</a></td> 

      <ul class="nav nav-pills mb-3 mt-2" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
         <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">جميع الطلبات : <?=count($orders)?></button>
        </li>
        <li class="nav-item" role="presentation">
         <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">الطلبات الجديدة :<?=count($ordersN)?></button>
        </li>
        <li class="nav-item" role="presentation">
         <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">الطلبات الجاهزة للتسليم :<?=count($ordersD)?></button>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
         <div class="row">
          <?php
         //طباعة  
    if(isset($_SESSION['action'])){
      $action=$_SESSION['action'];
      if(!empty($action)){
    ?>
    <p class="alert alert-success mt-4">
        <?php     
        echo $action;        
      }
      unset($_SESSION['action']);
      } 
        ?>
    </p>
          <?php
          foreach($orders as $index=>$order):
            $id=$order['id'];
          ?>
          <div class="orders col-2">
            <a href="order.php?id=<?=$id?>">
           <h3 class="">طلبية <?= $order['id']?></h3>
           <?php 
           if($order['status']==0 && $order['delivered_at']== null){
            ?>
            <p>طلبية جديدة</p>
            <td><a class="btn btn-warning" href="order_handel.php?id=<?= $order['id'] ?> & edit=deli">تعديل الحالة</a></td>

            <?php
            }elseif($order['status']==1 && $order['delivered_at']== null){
              ?>
              <p>جاهزة للتوصيل</p>
              <td><a class="btn btn-warning" href="order_handel.php?id=<?= $order['id'] ?> & edit=done">تعديل الحالة</a></td>
              <?php
            }else{
              ?>
              <p>تم التوصيل</p>
              <td><a class="btn btn-danger del" href="order_handel.php?id=<?= $order['id'] ?>&del=delOrder">حذف</a></td>

              <?php
            }
           ?>

            </a>
          </div>
         <?php
         endforeach;
         ?>
         </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <div class="row">
          <?php
       
          foreach($ordersN as $index=>$orderN):
            $id=$orderN['id'];
          ?>
          <div class="orders col-2">
            <a href="order.php?id=<?=$id?>">
           <h3 class="">طلبية <?= $orderN['id']?></h3>
         
            <p>طلبية جديدة</p>
            <td><a class="btn btn-warning" href="order_handel.php?id=<?= $order['id'] ?> & edit=deli">تعديل الحالة</a></td>           
            </a>
          </div>
         <?php
         endforeach;
         ?>
         </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
        <div class="row">
          <?php
    
          foreach($ordersD as $index=>$orderD):
            $id=$orderD['id'];
          ?>
          <div class="orders col-2">
            <a href="order.php?id=<?=$id?>">
           <h3 class="">طلبية <?= $orderD['id']?></h3>
         
              <p>جاهزة للتوصيل</p>
              <td><a class="btn btn-warning" href="order_handel.php?id=<?= $order['id'] ?> & edit=done">تعديل الحالة</a></td>

           
            </a>
          </div>
         <?php
         endforeach;
         ?>
         </div>
        </div>
      </div>
    
    </div>
  </div>
  <?php
  }else if($_GET['no']==8){
    ?>
  <div class="content">
    <div class="container">
      <td><a class="btn btn-secondary" href="index.php?status=<?=$_SESSION['status']?>">عودة الى الصفحة الرئيسية</a></td>
      <td><a class="btn btn-danger" href="feed_handel.php?del=delAll" >حذف الكل</a></td>
      <?php
    //طباعة  
    if(isset($_SESSION['action'])){
      $action=$_SESSION['action'];
      if(!empty($action)){
    ?>
    <p class="alert alert-success mt-4">
        <?php     
        echo $action;        
      }
      unset($_SESSION['action']);
      } 
        ?>
    </p>
    <table class="table">
      <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">الرسالة</th>
         <th scope="col">تاريخ الارسال</th>
       </tr>
      </thead>
      <tbody>
      <?php
      
      $getFeed = "SELECT * FROM feedbacks";
      $getAllFeed = mysqli_query($conn,$getFeed);
      $feeds=mysqli_fetch_all($getAllFeed,MYSQLI_ASSOC);

        foreach($feeds as $index=>$feed):
      ?>
      <tr>
      <td scope="row"><?= $index +1 ?></td>
      <td><?= $feed['content'] ?></td>
      <td><?= $feed['created_at'] ?></td>
      <td><a class="btn btn-danger" href="feed_handel.php?id=<?= $feed['id'] ?>&del=delFeed">حذف</a></td>
      </tr>
      <?php endforeach ?>
    </tbody>
     </table>
        
    </div>
  </div>
  <?php
   }
  }
  ?>
  <div class="up">
    <?php include('../up.php')?>
  </div>
 
  <script>
    let up= document.getElementById("up");
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
     if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
       up.style.display = "block";
       } else {
       up.style.display = "none";
       }
     }
     function upFunction(){
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
     }
  </script>
      <!-- bootstrap 5 -->
      <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>