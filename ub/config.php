<?php
session_start();
$session_id = session_id();
$_SESSION['session_id']=$session_id;
$db = mysqli_connect("localhost", "filmsproducgagan_ub_electronics", "aOjho],K55hP", "filmsproducgagan_ub_electronics");



$postID='';
// define("base_url", $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'/');
define("base_url", 'https://feminineafrica.ci/');
function towquery($query)
 {
    //   $db = mysqli_connect("localhost", "spyvioxp_feminine", "feminine2020", "spyvioxp_feminine");
   mysqli_set_charset($db,'utf8_unicode_ci');
   $re = mysqli_query($db,$query);
   return $re;
 }
 function towquery2($query)
 {
//   $db = mysqli_connect("localhost", "spyvioxp_feminine", "feminine2020", "spyvioxp_feminine");
   mysqli_set_charset($db,'utf8_unicode_ci');
   $re = mysqli_query($db,$query);
   $re2 = mysqli_insert_id($db);
   return $re2;
 }
 function townum($query)
 {
   $re = mysqli_num_rows($query);
   return $re;
 }
 function towfetch($query)
 {
   $re = mysqli_fetch_array($query);
   return $re;
 }
 function towfetchassoc($query)
 {
   $re = mysqli_fetch_assoc($query);
   return $re;
 }
 function towreal($query)
 {
//   $db = mysqli_connect("localhost", "spyvioxp_feminine", "feminine2020", "spyvioxp_feminine");
   $re = str_replace("<","<",$query);
   $re = str_replace(">",">",$re);
   $re = mysqli_real_escape_string($db,$re);
   return $re;
 }
 function towrealarray($query)
 {
//   $db = mysqli_connect("localhost", "spyvioxp_feminine", "feminine2020", "spyvioxp_feminine");
   $re = array();
   foreach ($query as $key => $value) {
   $$key = str_replace("<","<",$value);
   $$key = str_replace(">",">",$$key);
   $$key = mysqli_real_escape_string($db,$$key);

   $re[$key] = $$key;
    }
   return $re;
 }
 function towrealarray2($query)
 {
   $co = mysqli_connect("localhost", "spyvioxp_feminine", "feminine2020", "spyvioxp_feminine");
   $re = array();
   foreach ($query as $key => $value) {
       if(!is_array($value)){
   $$key = str_replace("<","<",$value);
   $$key = str_replace(">",">",$$key);
   $$key = mysqli_real_escape_string($co,$$key);

   $re[$key] = $$key;
       }else{
           $re[$key] = towrealarray2($value);
       }
    }
   return $re;
 }

date_default_timezone_set('Asia/Kolkata');

function getDateTimeDiff($date){
 $now_timestamp = strtotime(date('Y-m-d H:i:s'));
 $diff_timestamp = $now_timestamp - strtotime($date);
 
 if($diff_timestamp<60){
  return 'few seconds ago';
 }
 else if($diff_timestamp>=60 && $diff_timestamp<3600){
  return round($diff_timestamp/60).' mins ago';
 }
 else if($diff_timestamp>=3600 && $diff_timestamp<86400){
  return round($diff_timestamp/3600).' hours ago';
 }
 else if($diff_timestamp>=86400 && $diff_timestamp<(86400*30)){
  return round($diff_timestamp/(86400)).' days ago';
 }
 else if($diff_timestamp>=(86400*30) && $diff_timestamp<(86400*365)){
  return round($diff_timestamp/(86400*30)).' months ago';
 }
 else{
  return round($diff_timestamp/(86400*365)).' years ago';
 }
}


// function language(){
//     return isset($_SESSION['language'])?$_SESSION['language']:'English';
// }

// function language_flag(){
//     return isset($_SESSION['language_flag'])?$_SESSION['language_flag']:'<span class="flag-icon flag-icon-us"></span>';
// }

function language_flag(){
   if(isset($_SESSION['eleLang']) && $_SESSION['eleLang'] == 'fr'){
       return '<span class="flag-icon flag-icon-fr"></span>';
   }else{
       return '<span class="flag-icon flag-icon-us"></span>';
   }
}
function language(){
   if(isset($_SESSION['eleLang']) && $_SESSION['eleLang'] == 'fr'){
       return 'French';
   }else{
       return 'English';
   }
}

function currency(){
    return isset($_SESSION['currency'])?$_SESSION['currency']:'XAF';
}

function currency_code(){
	return isset($_SESSION['currencyCode'])?$_SESSION['currencyCode']:'CFA';
}

function currency_price($price){
	return isset($_SESSION['price'])?number_format((float)$_SESSION['price'] * $price, 2, '.', ''): number_format((float)1 * $price, 2, '.', ''); 
}
    
    function is_wishlisted($pid,$uid){
        if(!empty($pid) && !empty($uid)){
           $query=towquery("SELECT * FROM `user_wishlist` Where `user_id`='$uid' AND `product_id`='$pid' " );
            if($query->num_rows>0){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    function getPriceRaneforProduct($cat="",$order = ""){
        if(!empty($order)){
        $queryPrice = towquery("SELECT `product_pk_id`,`product_title`,`discount` FROM `tbl_product` Where product_cat=$cat ORDER bY  `discount` $order ");
        if($queryPrice->num_rows>0){
                $query = towfetch($queryPrice);
                return ($query['discount']);
            }else{
                return 0;
            }
            
        }else{
                return 0;
        }
    }    
    
      function getPriceRaneforProductBrand($cat="",$order = ""){
        if(!empty($order)){
        $queryPrice = towquery("SELECT `product_pk_id`,`product_title`,`discount` FROM `tbl_product` Where `brand_fk_id`=$cat ORDER bY  `discount` $order ");
        if($queryPrice->num_rows>0){
                $query = towfetch($queryPrice);
                return ($query['discount']);
            }else{
                return 0;
            }
            
        }else{
                return 0;
        }
    }        
    
function getPageSeoDtaByUrl($olurl=''){
    $oldUrl = substr($olurl, 15); 
    // echo $oldUrl;
    $postID="";$postName="";
$url = preg_replace(['/(\?make=[a-z]*[&])/i', '/(\&make=[a-z]*[^(&*)])/i', '/&(?!\w)/i'], ['?','',''], $oldUrl );            
     
$res = towquery("select product_pk_id from tbl_product where product_url='$url' and product_status='1'");
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();	
            $postID = $row['product_pk_id'];
            $postName = 'product';
            // echo $postID.$postName;
    }
    
$res = towquery("select id from tbl_subCategory where cat_url='$url' and cat_status='1'");
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();	
            $postID = $row['id'];
            $postName = 'subCat';
    }    

$res = towquery("select cat_pk_id from tbl_category where cat_url='$url' and cat_status='1'");
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();	
            $postID = $row['cat_pk_id'];
            $postName = 'cat';
            // echo $postID.$postName;
    }  
    
$res = towquery("select post_id from tbl_posts where post_url='$url' and post_status='1'");
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();	
            $postID = $row['post_id'];
            $postName = 'posts';
    } 

if(!empty($postID) && !empty($postName)){
    $query=towquery("SELECT * FROM `tbl_post_extra` Where `post_extr_id`='$postID' AND `post_tbl`='$postName' " );
        if($query->num_rows>0){
            return ($query);
        }else{
            //Return Default SEO Content for Side
            $homequery = towquery("SELECT * FROM `tbl_post_extra` Where `post_extr_id`='1' AND `post_tbl`='home' " );
            return $homequery;
      }

}else{
   //Return Default SEO Content for Side
            $homequery = towquery("SELECT * FROM `tbl_post_extra` Where `post_extr_id`='1' AND `post_tbl`='home' " );
            return $homequery;
}

}  
?>