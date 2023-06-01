<?php
include("connection_db.php");
  session_start();
 ?>
<!doctype html>
<html dir="rtl">
  <head>
    <title> تراثيات |الشروط والتفاصيل</title>
    <?php include('head.php')?>
  </head>

  <body>
   <!-- start navbar-->
   <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->

    <!-- start join us page-->
    <div class="img_store">
      <div class="informations">
      <p>سعيدون جداً برغبتك بالانضمام الى عائلتنا، يمكنك الاطلاع على التفاصيل ومن ثم تعبئة الطلب.</p>
      <a  class="btn butt nav-link" href="req.php">
        تقديم طلب
      </a>
      
      </div>
      
    </div>

    <div class="container">
            <?php
             if(isset($_SESSION['done'])){
            ?>
            <p class="alert alert-success mt-3 fs-5"><?=$_SESSION['done']?></p>
            <?php
              session_unset();
             }
            ?>
        <div class="definition ">
    
            <h3> عند انضمامك لمتجر تراثيات كتاجر نقدم لك العديد من الامتيازات: </h3>
            
            <div class="text reveal"><p> موقع فلسطيني فريد من نوعه يضم العديد من المتاجر التراثية الفلسطينية في مكان واحد.</p></div>
            <div class="text reveal"><p>يتم توقيع عقد لضمان حقك كتاجر من خلال عدة بنود، ويكون لفترة محددة قابلة للتجديد. </p></div>
            <div class="text reveal"><p> يتم استلام البضاعة منك وحفظها في المخازن وبدورنا نقوم بتصويرها وعرضها وتجهيز الطلبيات وارسالها للزبون.</p></div>
            <div class="text reveal"><p> يتم ارسال الارباح شهرياً أو حسب الاتفاق.</p></div>
        
        </div>
    </div>
 
    <!--end join us page-->
    
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
    <script type="text/javascript">
      window.addEventListener('scroll',reveal);

      function reveal(){
          var reveals=document.querySelectorAll('.reveal');
          for(var i=0;i<reveals.length;i++){
              var windowheight=window.innerHeight;
              var revealtop=reveals[i].getBoundingClientRect().top;
              var revealpoint=150;
              if(revealtop < windowheight-revealpoint){
                  reveals[i].classList.add('active');
              }
              else{
                  reveals[i].classList.remove('active');
              }

          }
      }
  </script>
  </body>
</html>