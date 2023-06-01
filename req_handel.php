<?php
  include("connection_db.php");
  session_start();
  extract($_POST);
  $errors=[];

  if($submit=="sent"){
   //input validate
     if(empty($name)){
        $errors[]="الاسم مطلوب";
      }else if(!preg_match ("/^[a-zA-z ]*$/", $name)){
        $errors[]="يجب ان يحتوي الاسم على احرف فقط";
      }else if(strlen($name)<9){
        $errors[]="الاسم الذي ادخلته قصير";
      } else if(empty($phone)){
        $errors[]="رقم الهاتف مطلوب";
      }else if (!preg_match ("/^[0-9]*$/", $phone) ) {  
        $errors = "يجب ادخال رقم هاتف صحيح";  
      } else if(strlen($phone)<10){
        $errors[]="رقم الهاتف قصير ";
      } else if($city == "selected"){ //
        $errors[]="يلزم تحديد مدينة";
      }else if(empty($address)){
        $errors[]="العنوان مطلوب";
      }else  if($cat=="selected"){
        $errors[]="يلزم تحديد قسم";
      }else if(empty($desc)){
        $errors[]="يجب كتابة وصف عن طبيعة المتجر";
      }
      if(empty($errors)){
         $newReq = "INSERT INTO `requests`( `name`, `phone`, `city`, `cat_id`, `description`)
          VALUES ('$name','$phone','$city','$cat','$desc')";
         if ($conn->query($newReq) === TRUE) {
            $_SESSION['done']="تم ارسال الطلب بنجاح سوف نتواصل معك في اقرب وقت ممكن .";
            header("location:merchant.php");
         }else{
            $errors[]="حدث خطأ حاول مرة اخرى ";
            $_SESSION['errors']=$errors;
            header("location:req.php");
         }
      }else{
       $_SESSION['errors']=$errors;
       header("location:req.php");
     }
    }
?>