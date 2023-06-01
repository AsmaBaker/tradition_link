<?php
  include("../connection_db.php");
  session_start();
  extract($_POST);
  $errors=[];
  $passwordLen = strlen($password);
  if(isset($submit)){
 if($submit=="addAmin"){
    //userName validation
    if(empty($name)){
       $errors[]="الاسم مطلوب";
    }else if(!preg_match ("/\b[A-Z][a-z]{2,4}/", $name)){
      $errors[]=" يجب ان يبدا الاسم بحرف كبير, وان لا يقل عن 3 احرف ولا يزيد عن 5 احرف";
    }
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
     header("location:add_admin.php");
    }else{
      $getAdmin="SELECT * FROM admins where email='$email'";
      $userAdmin = mysqli_query($conn, $getAdmin);
      $admin=mysqli_fetch_all($userAdmin,MYSQLI_ASSOC);
      if(!empty($admin)){
          $errors[]="الايميل الذي تحاول ادخاله يملك حساب بالفعل";
          header("location:sign.php");
    
      }else{
        $newAdmin = "INSERT INTO admins (name, email, password,status)
        VALUES ('$name', '$email', '$password','$status')";
        if ($conn->query($newAdmin) === TRUE) {
           echo"done";
        } else {
         $errors[]="حدث خطا ما , حاول مرة اخرى";
      } }
     if(!empty($errors)){
        $_SESSION['errors']=$errors;
        header("location:add_admin.php");
     }else{
        $_SESSION['added']="تم اضافة المسؤول";
        header("location:show.php?no=1");
     }}
   }}

   //update admin

   if(isset($_POST['updateAdmin'])){
      $id=$_SESSION['upAddId'];
      if(empty($name)){
         $errors[]="الاسم مطلوب";
      }else if(!preg_match ("/\b[A-Z][a-z]{2,4}/", $name)){
        $errors[]=" يجب ان يبدا الاسم بحرف كبير, وان لا يقل عن 3 احرف او يزيد عن 5 احرف";
      }
      if(empty($password)){
         $errors[]="كلمة المرور مطلوبة";
      } else if($passwordLen <8 or $passwordLen > 30){
         $errors[]="يجب ان تتكون كلمة المرور من 8 الى 30 حرف";
      }
      if(!empty($errors)){
       $_SESSION['errors']=$errors;
       header("location:add_admin.php");
      }else{
       
          $upAdmin = "UPDATE `admins`
           SET`name`='$name',`password`='$password',`status`='$status' WHERE id=$id";
          if ($conn->query($upAdmin) === TRUE) {
             echo"done";
          } else {
           $errors[]=" $id حدث خطا ما , حاول مرة اخرى";
           echo mysqli_error($conn);

        } }
       if(!empty($errors)){
          $_SESSION['errors']=$errors;
          header("location:update_admin.php?id=$id");
       }else{
          $_SESSION['action']="تم تعديل المسؤول";
          header("location:show.php?no=1");
       }
      }

      if(isset($_GET['del'])){
         if($_GET['del']=='deleteAd'){
            $id=$_GET['id'];

        $deleteAdmin="DELETE FROM `admins` WHERE id=$id";
        if(mysqli_query($conn,$deleteAdmin)){
         $_SESSION['action']='تم حذف المسؤول';
         header('location:show.php?no=1');
        }else {
         echo mysqli_error($conn);
        }
      }
      }
  
?>