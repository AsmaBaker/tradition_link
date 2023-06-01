<?php
include("connection_db.php");
  session_start();
 ?>
<!doctype html>
<html dir="rtl">
  <head>
    <title>الخصوصية والأمان</title>
    <?php include('head.php')?>
  </head>
  <body>

 <!-- start navbar-->
  <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->

  
  <!--start privecy page-->
  <div class="container">
  <div class="priv_sec">
    <h3>الخصوصية والأمان:</h3>
    <p>- في موقع تراثيات نضمن لك سرية بياناتك ومعلوماتك بحيث لا يمكن لاحد الاطلاع عليها غيرك.</p>
    <p>- تعتبر الصور والمعلومات في موقعنا ملكية خاصة له وللمتاجر التي يحتويها الموقع وإن اي عملية سرقة او نسب لهذه المنتجات لك سيعرضك للمسائلة القانونية.</p>
  </div>
</div>
    <!--end privecy page-->



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