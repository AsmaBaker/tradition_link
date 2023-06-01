<?php
include("connection_db.php");
  session_start();
 ?>
<!doctype html>
<html dir="rtl">
  <head>
    <title> الدفع </title>
    <?php include('head.php')?>

  </head>
  <body>
     
<!-- start navbar-->
  <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->
    
  <!--start pay page-->
<div class="container">
  <div class=" row pay">
    <div class="ways-pay col-md-6">
    <h3>الدفع:</h3>
    <p>نوفر لك في تراثيات الية الدفع عند الاستلام , ليمكنك  من تفحص طلبك ومعاينته قبل الدفع والاستلام , ونطمح الى توفير اليات دفع الكتروني في المستقبل</p>
   
      
    </div>
  <div class="img-pay col-md-3">
      <img src="img/التوصيل/الدفع-removebg-preview.png" width="480px">
  </div>
</div>
</div>
  <!--end pay page-->
  
  <!--start footer-->
  <div class="footer" id="footer">
   <?php include('footer.php')?>
  </div>
  <!--end footer-->

  <!--start copy-right-->
  <div class="copy-right">
  <?php include('copy_right.php')?>
  </div>
  <!--end copy-right-->

  <div class="up">
    <?php include('up.php')?>
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