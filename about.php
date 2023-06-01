<?php
include("connection_db.php");
  session_start();
  
 ?>
  <!doctype html>
<html dir="rtl">
  <head>
    <title>عن الموقع </title>
    <?php include('head.php')?>
  </head>
  <body>

 <!-- start navbar-->
 <nav class="navbar navbar-expand-lg ">
    <?php include('navbar.php') ?>
  </nav>
  <!-- end navbar-->


  <!-- start about us page-->
  <div class="container">
   <div class="about">
    <h2> من نحن؟</h2>
    <p>موقع تجارة الكترونية صنع بأيدي فلسطينية، يضم العديد من المتاجر التي تقدم المنتجات التراثية بكافة انواعها  ومجالاتها مثل المطرزات والفخار والماكولات وغيرها..</p>
    <p>انطلق الموقع من ايماننا  بضرورة دعم التراث الفلسطيني الذي يتعرض للسرقة والتهويد من قبل العدو الغاشم والذي يعبر عن امجادنا وثقافتنا وهويتنا  الفلسطينية المتاصلة .</p>
    <p>يستهدف تراثيات الحرفيين والتجار والمشاريع الصغيرة كخطوى اولى لتقديم الدعم والتسويق لهم .</p>
    <p>كما ويستهدف ايضاً الشعب الفلسطيني من خلال جذبه الى موقع يعتبر حاضنه للمشغولات التراثية الفلسطينية .</p>
    <section>
      <p class="titlle">هذا الموقع من فكرة وتطبيق :</p></section>
          <section>
              <div class="container reveal">
             
      <div class="founders row">
  
      <div class="boxs col-md-5">
      
        <div class="box row">
            <div class="info col-10">
            <p class="first-p">اسماء بكر سلمان</p>
            <p> التخصص: انظمة المعلومات الحاسوبية</p>
            <p>العمر :21 عام</p>
        </div>
        
        
          <div class="contact_us col-1">
            <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
            <a href=""><i class="fa-regular fa-envelope"></i></a>
            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
          </div>
          </div>
        </div>  
  
        <div class="boxs col-md-5 ">
          <div class="box row">
            <div class="info col-10">
         <p class="first-p"> لمى منصور حشاش</p>
          <p> التخصص: انظمة المعلومات الحاسوبية</p>
          <p>العمر :21 عام</p></div>
  
          <div class="contact_us col-1">
            <a href=""><i class="fa-brands fa-linkedin-in"></i></a>
            <a href=""><i class="fa-regular fa-envelope"></i></a>
            <a href=""><i class="fa-brands fa-whatsapp"></i></a>
           
          </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    <p>تم انشاء الموقع استكمالاً لمتطلبات البكالوريوس في تخصص انظمة المعلومات الحاسوبية في جامعة القدس المفتوحة.بأشراف الدكتور اسامة مرعي.</p>
    </div>
</div>

<!--end about us page-->

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
      <!-- bootstrap 5 -->
      <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>