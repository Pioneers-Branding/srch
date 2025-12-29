<?php 
   ob_start();
    session_start();
    require_once "classMaster.php";   
    
    $db= new dbconfig();
    
    if(isset($_POST['CouponName']) && !empty($_POST['CouponName'])){
        $CouponName = $_POST['CouponName'];
        $amount = $_POST['amount'];
        $date= date('Ymd');
        $data = array();
        $query = $db->dbperform("select *  from `tbl_coupon` Where coupon_name='$CouponName' AND coupon_expire >= $date  AND coupon_status='1'");
              
            //   $query_result = $query->fetch_assoc();
            //     print_r($query->num_rows );
            //     print_r($query_result);
              if($query->num_rows > 0){
                  $query_result = $query->fetch_assoc();
                  if($query_result['couponMin'] < $amount ){
                    //   print_r($query_result);
                      $discount = $query_result['coupon_discount'];
                      $discountPrice = ($discount * $amount)/100;
                      $restAmount = $amount - $discountPrice;
                      $data['disCount'] = $discountPrice;
                      $data['restAmount'] = $restAmount;
                      $data['message'] = "appliqué avec success";
                  }else{
                      $data['disCount'] = "";
                      $data['restAmount'] = "";
                      $data['message'] = "Your not eligle for this coupon";
                  }
              }else{
                    $data['disCount'] = "";
                    $data['restAmount'] = "";
                    $data['message'] = "Invalid Coupon or Coupon Expire";
              }
                
            print_r(json_encode($data));    
    }else{
        echo 0;
    }
    ?>