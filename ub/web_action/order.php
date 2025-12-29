<?php
session_start();
require_once 'config.php';


if ($_GET["address_id"] && isset($_SESSION['cart'])) {
    // Retrieve the data sent via AJAX
    
    $cash_delivery=$_GET["cash_delivery"];
    $address_id=$_GET["address_id"];
    $coupon_value= (isset($_GET["coupon_value"])) ? $_GET["coupon_value"]:'';
    
    $cart_data=$_SESSION['cart'];
    $order_keyrandom= substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(25/strlen($x)) )),1,25);
    $user_id=$_SESSION["user_id"];
    $guest_ip=$_SESSION["uniqid_user_id"];
    date_default_timezone_set("Asia/Calcutta");
    $orderDate = date('Y-m-d');
    $total_amount=0;
  
  
  $address_sql="SELECT contactNumber FROM tbl_addresses WHERE id =$address_id";
  $address_result=mysqli_query($con,$address_sql);
  $addresses=mysqli_fetch_assoc($address_result);
  $user_Contact=$addresses['contactNumber'];
//   print_r($user_coins); die();
    foreach($cart_data as $each_cart){
            //   $cart_id=$each_cart['id'];
               $item_id=$each_cart['product_id'];
            //   $item_size=$each_cart['item_size'];
            //   $item_color=$each_cart['item_color'];
               $item_qty=$each_cart['product_qty'];
               $item_price=$each_cart['product_price'];
               $total_amount+=$item_price*$item_qty;
               $sql ="INSERT INTO `tbl_order` (`product_fk_id`, `product_quantity`, `product_fk_price`, `order_id`,  `user_fk_id`,`guest_ip`,`order_status`,`orderDate`,`address_id`) 
            VALUES ('$item_id', '$item_qty', '$item_price', '$order_keyrandom', '$user_id','$guest_ip','0','$orderDate','$address_id')";
            
               
               $result=mysqli_query($con,$sql);
               
               
               
            
               
           }
           
     $users_sql="SELECT user_coins FROM tbl_user WHERE user_pk_id =$user_id";
     $user_result=mysqli_query($con,$users_sql);
     $user_coins=mysqli_fetch_assoc($user_result);
     $user_total_coins=$user_coins['user_coins'];
     if(!empty($coupon_value)){
         $final_amount=$total_amount-$user_total_coins;
     }else{
         $final_amount=$total_amount;
     }
      
    
           if($result){
               
              
                            unset($_SESSION['cart']);
                            
                  $tran_sql ="INSERT INTO `tbl_transaction` (`order_id`,  `user_fk_id`,`guest_ip`,`transaction_status`,`transaction_date`,`address_id`,`transaction_mode`,`totalamt`,`coupon_value`) 
            VALUES ('$order_keyrandom', '$user_id','$guest_ip','0','$orderDate','$address_id','COD','$total_amount','$coupon_value')";
            
               
               $tran_result=mysqli_query($con,$tran_sql);        
                if($tran_result){
                    // $response['suc'] =true;
                    ?>
                    <script type="text/javascript">
              window.location.href = "../payment_gateway.php?order_id=<?=$order_keyrandom?>&final_amount=<?=$final_amount?>&user_Contact=<?=$user_Contact?>";
          </script>
                    <?php
                }
               
           }
//   echo json_encode($response);
}

if($_GET['transactionId']){
    $user_id=$_SESSION["user_id"];
    $order_id=$_GET['transactionId'];
    $order_status=$_GET['order_status'];
    $transactionId=$_GET['transactionId'];
    
    
    
    $users_sql="SELECT user_coins FROM tbl_user WHERE user_pk_id =$user_id";
    $user_result=mysqli_query($con,$users_sql);
    $user_coins=mysqli_fetch_assoc($user_result);
    $user_total_coins=$user_coins['user_coins'];
    
    
    $coin_sql="SELECT * FROM tbl_transaction WHERE `order_id`='$order_id'";
    $coins_result=mysqli_query($con,$coin_sql);
    $uses_coin=mysqli_fetch_assoc($coins_result);
    $user__coins=$uses_coin['user_coins'];
    $coupon_value=$uses_coin['coupon_value'];
    $total_amount=$uses_coin['totalamt'];
    
   
    // print_r($user_total_coins); die();
    if($total_amount>=1000){
        
        $coins=sprintf("%.2f", $total_amount/1000);
    }
    
    if($order_status=='PAYMENT_SUCCESS'){
     if(!empty($coupon_value))
    {
        
    // final amount after minus user coins
    // $total_amount-=$user_coins['user_coins'];
    // minus user coins which have been used
    
    $user_sql = "UPDATE tbl_user SET user_coins = user_coins - '$user_total_coins' WHERE user_pk_id ='$user_id'";
    $result_user=mysqli_query($con,$user_sql);
    //create user coins behalf of final amount
    $trans_coins=sprintf("%.2f", $user_total_coins);
    
    }    
        
    $getusers_sql = "UPDATE tbl_user SET user_coins = user_coins + '$coins' WHERE `user_pk_id` ='$user_id'";
    $getuser_result=mysqli_query($con,$getusers_sql);
    
    $order_sql = "UPDATE tbl_transaction SET `transactionId`='$transactionId' ,`payment_status`='1', `transaction_mode`='ONLINE', `user_coins`='$trans_coins' WHERE `order_id` ='$order_id'";
    
    $order_result=mysqli_query($con,$order_sql); 
    
    if($order_result){
        ?>
<script>
    window.location.href = "../order_succes.php";
</script>

<?php
    }
    }else if($order_status=='PAYMENT_ERROR'){
       
        
    // print_r($update_coins_sql);
        echo 'error';
    }
}

if($_POST["cancel_order"]){
    $order_id=$_POST["order_id"];
    
    $sql_query="UPDATE  tbl_transaction set `transaction_status`=2 WHERE transaction_pk_id='$order_id'";

 $result=mysqli_query($con,$sql_query);

 if($result){

  $response['status']=true;


 }else{
$response['status']=false;
 }
 echo json_encode($response);
    
}
?>