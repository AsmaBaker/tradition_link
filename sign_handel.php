<?php
  include("connection_db.php");
  session_start();
  extract($_POST);
  $errors=[];
  $passwordLen = strlen($password);
if($submit=="signIn"){
    //email validation
     if(empty($email)){
        $errors[]="البريد الالكتروني مطلوب";
     }
     //password validation
     if(empty($password)){
        $errors[]="كلمة المرور مطلوبة";
     }
//التحقق من صحة بيانات الحساب
if(!empty($errors)){
    $_SESSION['errors']=$errors;
    header("location:sign.php");
}else{
    $getUser="SELECT * FROM users where email='$email'";
    $userData = mysqli_query($conn, $getUser);
    $user=mysqli_fetch_all($userData,MYSQLI_ASSOC);
    if (empty($user)){
        $errors[]="البريد الاكتروني او كلمة المرور خطأ";
        header("location:sign.php");
    }else if($password != $user[0]['password']){
        $errors[]="البريد الاكتروني او كلمة المرور خطأ";
        header("location:sign.php");
    }else{
      $sign="تم التسجيل بنجاح";
      $_SESSION['sign']=$sign;
        header("location:order_data.php");
    }
    if(!empty($errors)){
       $_SESSION['errors']=$errors;
       header("location:sign.php");
    }


    
 }}else if($submit=="signUp"){
     //userName validation
     if(empty($userName)){
        $errors[]="اسم المستخدم مطلوب";
     }else if(strlen($userName) <3 or strlen($userName) > 30 ){
        $errors[]="يجب ان يتكون اسم المستخدم من 3الى 10 حروف";}
      //email validation
      if(empty($email)){
        $errors[]="البريد الالكتروني مطلوب";
      }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[]="يجب ان يكون ايميل حقيقي";} 
     //password validation
     if(empty($password)){
        $errors[]="كلمة المرور مطلوبة";
     } else if($passwordLen <8 or $passwordLen > 30){
        $errors[]="يجي ان تتكون من 8 الى 30 حرف";}
     //التحقق من صحة بيانات الحساب
     if(!empty($errors)){
      $_SESSION['errors']=$errors;
      header("location:sign.php");
     }else{
      $getUser="SELECT * FROM users where email='$email'";
      $userData = mysqli_query($conn, $getUser);
      $user=mysqli_fetch_all($userData,MYSQLI_ASSOC);
      if(!empty($user)){
          $errors[]="الايميل الذي تحاول ادخاله يملك حساب بالفعل";
          header("location:sign.php");
      }else{
         $newUser = "INSERT INTO users (user_name, email, password)
         VALUES ('$userName', '$email', '$password')";
         if ($conn->query($newUser) === TRUE) {
            echo"done";
         } else {
          $errors[]="حدث خطا ما , حاول مرة اخرى";} }
      if(!empty($errors)){
         $_SESSION['errors']=$errors;
         header("location:sign.php");
      }else{
         $_SESSION['sign']="تم التسجيل بنجاح";
         header("location:order_data.php");
      }}}
?>