<?php
include("connection_db.php");
  session_start();
 ?>
<!doctype html>
<html dir="rtl">
  <head>
    <title>الاراء والشكاوي </title>
    <?php include('head.php')?>
  </head>
  <body>

  <!-- start navbar-->
  <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->

  <!--start delivery page-->
    <div class="container">
        
          <div class="delivery">
            <h3> التوصيل</h3>
            <p>يقدم موقع تراثيات ميزة للمستخدمين تمكنهم من التسوق والشراء من العديد من المتاجر بعدة اصناف في طلبية واحدة بتكلفة توصيل واحدة.</p>
            <div class=" row deliv">
              <div class="del col-md-8">
                <p>نوفر امكانية التوصيل لكافة انحاء فلسطين:</p>
                <ul>
                  <li>- الضفة الغربية. </li>
                  <li>- قطاع غزة.</li>
                  <li>- مدن الداخل الفلسطيني المحتل.</li>
                </ul>
              
                <p>وتستغرق مدة التوصيل من يومين الى 5 ايام بناءًا على المدينة.</p>
                <p class="packkag">نهتم في  تراثيات  بتغليف المنتجات بصورة امنة ومحكمة بحيث نضمن لك سلامتها من اي تلف او كسر. </p>
              </div>
              <div class="img-del col-md-2">
                <img src="img/التوصيل/التوصيل.png" width="495x" > </div>

            </div>
      
          </div>
     </div>
    

   <!--end delivery page-->

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