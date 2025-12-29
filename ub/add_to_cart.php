<?php
include 'config.php';

// Include Language file
if(isset($_SESSION['eleLang'])){
 include "lang_".$_SESSION['eleLang'].".php";
}else{
 include "lang_en.php";
}
$cartproduct_tilte = "product_title";
if(isset($_SESSION['eleLang']) && $_SESSION['eleLang'] == 'fr'){
     $cartproduct_tilte = "product_title_fr";
}
$sessId = isset($_SESSION['session_id'])?$_SESSION['session_id']:'';
$user_user_pk_id = isset($_SESSION['userId'])?$_SESSION['userId']:'';    

// print_r($_POST);die();
if(isset($_POST['id'])){
    $product = array();
    $id = towreal($_POST['id']);
    $size = towreal($_POST['size']);
    $color = towreal($_POST['color']);
    $brand = trim(towreal($_POST['brand'])," ");
    
    $ch = towquery("SELECT * FROM `tbl_cart` WHERE user_sess_id='$sessId' AND product_pk_id=$id ");
    if(townum($ch) == 0){
    towquery("INSERT INTO `tbl_cart`(`user_sess_id`,`user_pk_id`, `product_pk_id`, `qty`, `size`, `color`, `brand`,`create_date`) VALUES ('$sessId','$user_user_pk_id','$id',1,'$size','$color','$brand','".date('Y-m-d H:i:s')."')");
    }else{
        towquery("UPDATE `tbl_cart` SET `qty`=`qty`+1  ,`size`='$size', `color`='$color', `brand`='$brand' WHERE user_sess_id='$sessId' AND product_pk_id=$id");
    }
    // $a = towquery("SELECT * FROM `tbl_cart` WHERE user_sess_id='$sessId'"); 
   $a = towquery("SELECT tbl_cart.*,tbl_product.product_title,tbl_product.product_title_fr,tbl_product.product_image,tbl_product.featurd_image,tbl_product.discount,tbl_product.product_w,tbl_product.product_price FROM `tbl_cart` INNER JOIN tbl_product
      ON tbl_cart.product_pk_id=tbl_product.product_pk_id WHERE user_sess_id='$sessId' Order By cart_id DESC");
  
 }elseif(isset($_POST['rid'])){
    $id = towreal($_POST['rid']);
    $type = towreal($_POST['type']);
    $ch = towquery("SELECT * FROM `tbl_cart` WHERE user_sess_id='$sessId' AND product_pk_id=$id");
    if(townum($ch) > 0){
        $a = towfetch($ch);
        if($type == "add") {
             towquery("UPDATE `tbl_cart` SET `qty`=`qty`+1 WHERE user_sess_id='$sessId' AND product_pk_id=$id");
        } else {
            if($a['qty'] == 1){
                towquery("DELETE FROM `tbl_cart` WHERE user_sess_id='$sessId' AND product_pk_id=$id");
            }else{
                towquery("UPDATE `tbl_cart` SET `qty`=`qty`-1 WHERE user_sess_id='$sessId' AND product_pk_id=$id");
            }
        }
        
    }
    // $a = towquery("SELECT * FROM `tbl_cart` WHERE user_sess_id='$sessId'");
    // echo townum($a);
    $a = towquery("SELECT tbl_cart.*,tbl_product.product_title,tbl_product.product_title_fr,tbl_product.product_image,tbl_product.featurd_image,tbl_product.discount,tbl_product.product_w,tbl_product.product_price FROM `tbl_cart` INNER JOIN tbl_product
      ON tbl_cart.product_pk_id=tbl_product.product_pk_id WHERE user_sess_id='$sessId' Order By cart_id DESC");
  
}
elseif(isset($_POST['removeid'])){
    $id = towreal($_POST['removeid']);
    $ch = towquery("SELECT * FROM `tbl_cart` WHERE user_sess_id='$sessId' AND product_pk_id=$id");
    if(townum($ch) > 0){
        $a = towfetch($ch);
        towquery("DELETE FROM `tbl_cart` WHERE user_sess_id='$sessId' AND product_pk_id=$id");
        /*else{
        towquery("UPDATE `tbl_cart` SET `qty`=0 WHERE user_sess_id='$sessId' AND product_pk_id=$id");
    }*/
    }
    // $a = towquery("SELECT * FROM `tbl_cart` WHERE user_sess_id='$sessId'");
    // echo townum($a);
    $a = towquery("SELECT tbl_cart.*,tbl_product.product_title,tbl_product.product_title_fr,tbl_product.product_image,tbl_product.featurd_image,tbl_product.discount,tbl_product.product_w,tbl_product.product_price FROM `tbl_cart` INNER JOIN tbl_product
      ON tbl_cart.product_pk_id=tbl_product.product_pk_id WHERE user_sess_id='$sessId' Order By cart_id DESC");
  
}
            $detail = "";
          $co=1; while($cartf = towfetch($a)){ 
              $detail = $cartf[$cartproduct_tilte];
          }
          
$product['cartValue']= townum($a) ;
$product['addCart']= ($detail);

print_r(json_encode($product));
?>