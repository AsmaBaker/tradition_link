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
      <a class="navbar-brand" href='loginDB.php?action="logout"'> خروج </a>
    </div>
   </div>
  </div>
    <?php
    if(isset($_GET['id'])){
    $id=$_GET['id'];
    ?>
      <div class="content">
     <div class="container">
      <td><a class="btn btn-secondary" href="index.php">عودة الى الصفحة الرئيسية</a></td>
      <td><a class="btn btn-secondary" href="show.php?no=7">عودة الى الطلبات</a></td> 
       </td> 
   <div class="row">
    <div class="col-md-4 mt-5">
       <table class="table table-info">
      <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">الاسم</th>
         <th scope="col">رقم الهاتف</th>
         <th scope="col">المدينة</th>
         <th scope="col">العنوان</th>
         <th scope="col">المبلغ الاجمالي</th>
       </tr>
     </thead>
     <tbody>
    <?php
       $getOrders= "SELECT * FROM orders_data  where id=$id";
       $getAllOrders = mysqli_query($conn,$getOrders);
       $orders=mysqli_fetch_all($getAllOrders,MYSQLI_ASSOC);
      
        foreach($orders as $index=>$order):
      ?>
      <tr>
      <td scope="row"><?= $index +1 ?></td>
      <td><?= $order['full_name'] ?></td>
      <td><?= $order['phone'] ?></td>
      <?php
      $city=$order['city'];
      $getCity = "SELECT name FROM cities where id= $city";
      $getAllCity = mysqli_query($conn,$getCity);
      $city=mysqli_fetch_all($getAllCity,MYSQLI_ASSOC);
      foreach($city as $city):
      ?>
      <td><?= $city['name'] ?></td>
      <?php endforeach; ?>
      <td><?= $order['address'] ?></td>
      <td><?= $order['price'] ?></td>

      <?php endforeach; ?>
      </tr>
      </tbody>
     </table>
    </div>
    <div class="col-md-8 mt-5">
    <table class="table">
      <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">الاسم</th>
         <th scope="col">الكمية</th>
         <th scope="col">السعر للقطعة</th>
         <th scope="col">اسم المتجر</th>
       </tr>
     </thead>
     <tbody>
    <?php
      $getProducts = "SELECT * FROM carts where ord_id=$id";
      $getAllProducts = mysqli_query($conn,$getProducts);
      $products=mysqli_fetch_all($getAllProducts,MYSQLI_ASSOC);

        foreach($products as $index=>$product):
      ?>
      <tr>
      <td scope="row"><?= $index +1 ?></td>
      <td><?= $product['pro_name'] ?></td>
      <td><?= $product['quantity'] ?></td>
      <td><?= $product['pro_price'] ?></td>
      <?php
      $store_id=$product['store_id'];
      $getStores = "SELECT name FROM stores where id= $store_id";
      $getAllStores = mysqli_query($conn,$getStores);
      $stores=mysqli_fetch_all($getAllStores,MYSQLI_ASSOC);
      foreach($stores as $store):
      ?>
      <td><?= $store['name'] ?></td>
      <?php endforeach; ?>
      <?php endforeach; ?>
      </tr>
      </tbody>
     </table>
    </div>
   </div>
    </div>
  
    <?php
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