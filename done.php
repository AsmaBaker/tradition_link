<?php
  include("connection_db.php");
  session_start();
?>
<!doctype html>
<html dir="rtl">
  <head>
    <title>تراثيات | الرئيسية</title>
    <?php include('head.php')?>
  </head>
  <body>
  <!-- start navbar-->
  <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->

    <?php
     if (isset($_SESSION['order'])){
     ?>
      <div class="done_order">
        <img src="img/done.png" width="20%" alt="">
        <p><?=$_SESSION['order']?></p>
      </div>
      <?php
        unset($_SESSION['cart']);

     }
     
    ?>

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