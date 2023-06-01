<?php
  include("../connection_db.php");
  session_start();
  extract($_POST);
  $errors=[];
  $passwordLen = strlen($password);

if($submit=="signIn"){
    //email validation
     if(empty($email)){
        $errors[]="البريد الالكتروني مطلوب";
     }else if(empty($password)){
        $errors[]="كلمة المرور مطلوبة";
     }else{
      $getUser="SELECT * FROM admins where email='$email'";
      $userData = mysqli_query($conn, $getUser);
      $user=mysqli_fetch_all($userData,MYSQLI_ASSOC);
       if (empty($user)){
         $errors[]="البريد الالكتروني او كلمة المرور خطأ";
         header("location:sign.php");
       }else if($password != $user[0]['password']){
        $errors[]="البريد الالكتروني او كلمة المرور خطأ";
        header("location:sign.php");
       }else{
        $status=$user[0]['status'];
         $sign="تم التسجيل بنجاح";
         $_SESSION['sign']="done";
          header("location:index.php?status=$status");
       }
       if(!empty($errors)){
       $_SESSION['errors']=$errors;
       header("location:sign.php");
       }
      }
     if(!empty($errors)){
      $_SESSION['errors']=$errors;
      header("location:sign.php");
      }}
?>