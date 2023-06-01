<?php
  include("connection_db.php");
  session_start();
  extract($_POST);
  $errors=[];

  function price($conn){
     $price = $_SESSION['price'];
    
     $city = $_POST['city'];
     $getdel = "SELECT delivery_price FROM cities where id = $city";
     $getAlldel = mysqli_query($conn,$getdel);
     $dels=mysqli_fetch_all($getAlldel,MYSQLI_ASSOC);
     foreach($dels as $del):
     $endPrice = $del['delivery_price'] + $price;
     endforeach;
     return $endPrice;
 }

  if($submit=="الشراء الان"){
   //input validate
     if(empty($name)){
        $errors[]="الاسم  مطلوب";
      }else if(!preg_match ("/^[a-zA-zا-ي ]*$/", $name)){
        $errors[]="يجب ان يحتوي الاسم على احرف فقط";
      }else if(strlen($name)<9){
        $errors[]="لا يمكن ان يكون الاسم الثلاثي بهذا الطول";
      } else if(empty($phone)){
        $errors[]="رقم الهاتف مطلوب";
      }else if (!preg_match ("/^[0-9]*$/", $phone) ) {  
        $errors = "يجب ادخال رقم هاتف صحيح";  
      } else if(strlen($phone)<10){
        $errors[]="لا يمكن ان رقم الهاتف بهذا الطول";
      } else if($city == "selected"){ 
        $errors[]="يلزم تحديد مدينة";
      }else if(empty($address)){
        $errors[]="العنوان مطلوب";
      }
      if(empty($errors)){
         $endprice = price($conn);
         $newOrder = "INSERT INTO `orders_data`(`full_name`, `phone`, `city`, `address`, `price`)
          VALUES ('$name','$phone','$city','$address','$endprice')";
         if ($conn->query($newOrder) === TRUE) {
             $ord_id= mysqli_insert_id($conn);

             $products = $_SESSION['products'];
             foreach($products as $index=>$product):
              $pro_id=$product['id'];
              $pro_name=$product['name'];
              $pro_price=$product['price'];
              $sto_id=$product['sto_id'];
              $newOrder = "INSERT INTO `carts`(`pro_id`, `ord_id`, `quantity`, `pro_name`, `pro_price`, `store_id`) 
               VALUES ('$pro_id','$ord_id','quantity','$pro_name','$pro_price','$sto_id')";
               if ($conn->query($newOrder) === TRUE) {
                echo"done";
                $_SESSION['order']="تم اتمام الطلب بنجاح , سيصلك في غضون 3 ايام ";
                header("location:done.php");
             }
           endforeach;
         }else{
          $price = $_SESSION['price'];

            $errors[]="حدث خطأ حاول مرة اخرى ";
            $_SESSION['errors']=$errors;
            header("location:order_data.php?price=$price");
         }
      }else{
        $price = $_SESSION['price'];

       $_SESSION['errors']=$errors;
       header("location:order_data.php?price=$price");
      }
  }
?>