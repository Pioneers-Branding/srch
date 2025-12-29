<?php
include 'header.php';
if (!isset($_SESSION['user'])) {
 echo "<script>window.location.href='login';</script>";
}else{}
if(isset($_POST['submit'])){
    // print_r($_POST);
    $ext = towrealarray2($_POST); extract($ext);
    //print_r(($ext));die();
        if(isset($email) && !empty($email)){
            // echo $email;
               $checkUser =    towquery("Select * FROM `tbl_user` WHERE `user_email`='$email' ");
            if($checkUser->num_rows > 0){
                 while($row = towfetch($checkUser)) {
                     $newuser_user_pk_id = $row['user_pk_id'];
                 }
               $udid = towquery("UPDATE `tbl_user` SET `full_name`='$user_full_name',`user_email`='$email',`address`='$userShippingAddress' WHERE `user_pk_id`='$user_user_pk_id'");
           }else{ 
               $pass= md5($user_password); 
            $newuser_user_pk_id = towquery2("INSERT INTO `tbl_user`(`full_name`, `user_email`, `contact`,`user_role`,`user_status`,`user_reg_date`,`user_password`) VALUES ('$user_full_name','$email','$user_contact','user','1','".date('Y-m-d H:i:s')."','$pass')");
           }
        }
//     echo $newuser_user_pk_id;    
//   die();
//   if(isset($_POST['userShippingAddress'])){
// $udid = towquery2("UPDATE `tbl_user` SET `full_name`='$user_full_name',`user_email`='$email',`address`='$userShippingAddress' WHERE `user_pk_id`='$user_user_pk_id'");
// }
$i=0;
while(count($product_pk_id) > $i){
    
$d = date('ymdhis');
$udid = towquery2("INSERT INTO `tbl_order`(`order_id`, `product_fk_id`, `product_quantity`, `user_fk_id`, `order_status`, `order_date` ,`orderDate`) VALUES ('ORDER-".$d."','".$product_pk_id[$i]."','".$qty[$i]."','$newuser_user_pk_id','0','".date('Y-m-d H:i:s')."','".date('Y-m-d')."')");

$udid = towquery2("INSERT INTO `tbl_transaction`(`order_id`, `user_fk_id`, `transaction_status`, `transaction_mode`, `transaction_date`, `del_addr`, `transc_amount`, `leftAmount`, `tContact`, `tPincode`, `tName`, `tEmail`, `tState`, `tCity`, `t1Name`, `t1Email`, `t1Contact`, `t1State`, `t1City`, `t1Pincode`, `userShippingAddress1`, `trackingId`, `trackingLink`, `shiping_ch`,`shipingPrice`,`shipingDay`,`shipingTime`,`totalamt`,`currency_code`,`currency`,`addressType`,`userShippingLandmark`,`couponName`,`couponPrice`) 
                                          VALUES ('ORDER-".$d."','$newuser_user_pk_id',0,'COD','".date('Y-m-d H:i:s')."','$user_address',0,'$totalamt','$user_contact','$user_pincode','$user_full_name','','','','$user_full_name','','$user_contact','','','$user_pincode','$userShippingAddress','','','','$shipping','$shipingDay','$slotTime','$totalamt','$currency_code','$currency','$addressType','$landmark','$discouponName','$discouponPrice')");
towquery("DELETE FROM `tbl_cart` WHERE `cart_id`=".$cart_id[$i]);

 $checkProduct =    towquery("Select * FROM `tbl_product` WHERE `product_pk_id`='$product_pk_id[$i]' ");
    if($checkProduct->num_rows > 0){
    	while($rows = towfetch($checkProduct)) {
             $stock_quantity = $rows['stock_quantity'];
    		 $newStock_quantity  = $stock_quantity - $qty[$i];
         }
           $updPrd = towquery("UPDATE `tbl_product` SET `stock_quantity`='$newStock_quantity' , `update_date`='".date('Y-m-d h:i:s')."' WHERE `product_pk_id`='$product_pk_id[$i]'");
    }

$i++;
}

$flink = 'https://feminineafrica.com/';

$to = $email;
$subject = "ORDER NOTIFICATION FROM FEMININE AFRICA";
$message = "";

$message .= "<center><img src='https://feminineafrica.com/images/feminine-logo.jpeg' style='width: 20%;'></center><br>Dear $user_full_name,<br> Your invoice id is - ORDER-$d Your payment status is a pending. Pay your payment of ".currency_code().currency_price($totalamt)."Thank you for shopping with Feminine Africa.  <a href='$flink' target='_blank' >Open feminineafrica.com</a>.<br>  " ;
$message .="<br>Regards,<br>Feminine Africa";
$header = "From:inquiry@feminineafrica.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";
$retval = mail($to, $subject, $message, $header);

print_r("<script>window.location.replace('orders');</script>");
}
?>

<div class="container">
    <form method="post" id="checkout">
    <div class="row">
        <div class="col-md-6">
        <div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<p class="mb-sm-4 mb-6" style="font-size: 22px;color: #000;font-family: 'Ubuntu', sans-serif;"><?= shipping_detail ?></p>
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
							    <?php $userdata = towquery("Select * FROM `tbl_user` WHERE `user_pk_id`=".$_SESSION['userId']);
                                    while($us=towfetch($userdata)){
                                        // print_r($us);                               
                                ?>
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="user_full_name" required value="<?= isset($us['full_name'])?$us['full_name']:'' ?>"   placeholder="Full Name" >
									</div>
									<div class="controls form-group">
										<input type="email" class="form-control" placeholder="email" name="email" readonly  value="<?= isset($us['user_email'])?$us['user_email']:'' ?>">
									</div>
										<div class="controls form-group" style="display:none">
										<input type="password" class="form-control" placeholder="password" name="user_password" >
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Mobile Number" name="user_contact" value="<?= isset($us['contact'])?$us['contact']:'' ?>"  required>
											</div>
										</div>
									<?php/*	<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="<?= landmark ?>" name="landmark" required="" value="">
											</div>
										</div>*/?>
									</div>
									<div class="controls form-group">
										<!--<input type="text" >-->
										<textarea class="form-control" placeholder="<?= address ?>" name="userShippingAddress" required=""></textarea>
									</div>
									<?php/*<div class="controls form-group">
										<input type="text" class="form-control" placeholder="<?= pincode ?>" name="user_pincode" required="">
									</div>*/?>
									<div class="controls form-group">
										<select class="option-w3ls" name="addressType">
											<option><?= address_type ?></option>
											<option value="<?= Office ?>"><?= Office ?></option>
											<option value="<?= Home ?>"><?= Home ?></option>
											<option value="<?= Other ?>"><?= Other ?></option>

										</select>
									</div>
								</div>
								<?php } ?>
								</div>
						</div>
					<!--<div class="checkout-right-basket">-->
					<!--	<a href="payment.html">Make a Payment-->
					<!--		<span class="far fa-hand-point-right"></span>-->
					<!--	</a>-->
					<!--</div>-->
				</div>
			</div>
			</div>
			<!------Cart Item Start--------->
			<div class="col-md-6">
			     <div class="checkout-right">
			         <div class="address_form_agile mt-sm-5 mt-4">
        <?php
        $item = 0;
        $subtotal = 0;
        $total = 0;
         while($cartf = towfetch($cart)){
        ?>
         <input type="hidden" value="<?=  $cartf['user_sess_id'] ?>" name="sessionId" id="sessionId" />
        <input type="hidden" value="<?=$cartf['product_pk_id']?>" name="product_pk_id[]">
        <input type="hidden" value="<?=$cartf['qty']?>" name="qty[]">
        <input type="hidden" value="<?=$cartf['cart_id']?>" name="cart_id[]">
        <?php $decode = json_decode($cartf['product_image']);
        $subtotal +=$cartf['product_price']* $cartf['qty'];
        $total +=$cartf['discount']* $cartf['qty']?>
        <?php $item++;} ?>
                  
        <div class="col-md-12 col-xs-12" style="border-bottom:#ccc solid 1px; padding:15px 0 10px 0;">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-md-8 col-xs-8"><p style="font-size: 16px;font-family: 'Ubuntu', sans-serif; color: #000; font-weight: bold; "><?= Discount ?> (<?=$item;?> Items)</p>
                    <p style="font-size: 16px; color: #000;font-family: 'Ubuntu', sans-serif; font-weight: bold;"><?= Subtotal ?></p>
                    </div>
                    <div class="col-md-4 col-xs-4"><p style="font-size: 16px;  text-align: right;"><?= currency_code() ?><?= currency_price($subtotal) ?> </p>
                    
                    <p style="font-size: 16px;  text-align: right;"><?= currency_code() ?>:<?= currency_price($subtotal-$total) ?> </p>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-12 col-xs-12" style="border-bottom:#ccc solid 1px; padding:15px 0 10px 0;">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-md-4 col-xs-4">
					<p style="font-size: 16px;font-family: 'Ubuntu', sans-serif; color: #000; font-weight: bold; ">Coupon</p>							
                    
                    <p style="font-size: 16px;font-family: 'Ubuntu', sans-serif; color: #000; font-weight: bold; display:none;" id="coupon">Discount Price</p>							
                   
                    </div>
                    <div class="col-md-8 col-xs-8">
					<form name="Coupon">
					<input type="text" name="CouponName" id="CouponName"  class="form-control newCouponName"   />
                    
					<button type="button" onclick="applyCouponCode()" class="btn btn-info btn-xs" style="margin-top:20px"><?=apply?></button>
                    </form>
					<p style="font-size: 16px;font-family: 'Ubuntu', sans-serif; color: #000; font-weight: bold; display:none;" id="CouponPrice"></p>							
                    
                    </div>
                    <br><span style="color:green;font-size: 16px;font-family: 'Ubuntu', sans-serif; font-weight: bold; display:none;" id="couponmsg"></span>
                   <br> <span style="color:#018849;font-size: 16px;font-family: 'Ubuntu', sans-serif; font-weight: bold;display:none;" id="chngcoupon">Change Coupon</span>
                </div>
                 <div class="row" id="couponDiv">
                    <div class="col-md-4 col-xs-4">
					<p style="font-size: 16px;font-family: 'Ubuntu', sans-serif; color: #000; font-weight: bold; "><?= apply_coupon ?></p>	
                    </div>
					
                    <div class="col-md-8 col-xs-8">
									<div class="shop_detail_right_inner_3 clearfix">
 <div class="panel panel-primary shop_detail_right_inner_3_main clearfix">
                <div class="panel-heading">
                    <p class="panel-title">
                       <i class="fa fa-edit"></i><?= coupon_details ?></p>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                </div>
                <div class="panel-body" style="display: block;"><table class="table" id="CouponTable">
  <thead>
    <tr>
      <th scope="col">coupon</th>
      <th scope="col"><?= description ?></th>
      <th scope="col"><?= min_ammount ?></th>
      <th scope="col"><?= apply ?></th>
    </tr>
  </thead>
  <tbody>
      <?php while($cou = towfetch($coupon)) { ?>
	  <tr>
      <td><?= $cou[$coupon_tilte] ?></td>
      <td><?= $cou[$coupon_desc] ?></td>
      <td><?= $cou['couponMin'] ?></td>
      <td><button type="button" onclick="applyCouponCode('<?= $cou['coupon_name'] ?>')" class="btn btn-info btn-xs" style="margin-top:20px"><?= apply ?></button>
     </td>
    </tr>
 <?php } ?>
  </tbody>
</table>
</div>
       </div>
                    </div>			
                    
                    </div>
                    
                </div>
            </div>
            
        </div>
      
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
       <style>
         
       </style>
       
       <div class="col-md-12 col-xs-12" style="border-bottom:#ccc solid 1px; padding:15px 0 10px 0;">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-md-8 col-xs-8"><p style="font-size: 18px; color: #000;font-family: 'Ubuntu', sans-serif; font-weight: bold;"><?= Total ?></p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <p style="font-size: 18px; text-align: right;"> 
                        <span id="tot"><?= currency_code() ?><?= currency_price($total) ?></span>
                        <input type="hidden" value="<?= currency_price($total) ?>" name="totalamt" id="totalamt" > </p>
                        <input type="hidden" value="" name="discouponPrice" id="discouponPrice" > </p>
                        <input type="hidden" value="" name="discouponName" id="discouponName" > </p>
                        <input type="hidden" value="<?= currency_code() ?>" name="currency_code" id="currency_code" />
                        <input type="hidden" value="<?= currency()?>" name="currency" id="currency" />
                         </div>
                         	<button type="submit" name="submit" class="submit " style="width: 100%; background: #018849; margin-top: 15px;  color: #fff; border: none; padding-top: 8px; padding-bottom: 10px;"><?= pp_payment ?></button>
						
                         
                </div>
            </div>
            
        </div>
        
       
       		</div>
       	    	</div>
       		</div>
			<!------Cart Item End----------->
    </div>
    </form>
    </div>

<?php 
include 'footer.php';
?>
<script>
// $(document).ready(function(){ 
//     if($('#totalamt').val()==0){
//         $('.shippingValue').hide();
//     }else if($('#totalamt').val()>299){
//          $('.shippingValue').hide();
//          $('#shipping').val('0');
//     }else{
//         $('.shippingValue').show();
//         let tt =$('#totalamt').val();
//         let sp =$('#shipping').val();
//             newtotal=parseInt(tt)+parseInt(sp);
//         $('#totalamt').val(parseInt(newtotal));
//         $('#tot').html(newtotal);
//     }
// }); 

// $('.shipingDay').click(function(){
//     var cdt = $(this).val();
//   var tdate = new Date();
//   var dd = tdate.getDate(); //yields day
//   var MM = tdate.getMonth()+1; //yields month
//   var yyyy = tdate.getFullYear(); //yields year
// //   var currentDate= dd + "-" +( MM+1) + "-" + yyyy;
//     var currentDate = yyyy+ "-" +("0"+MM) + "-" +dd;
//     if(currentDate != cdt){
//         // alert(currentDate);
//         // alert(cdt);
//         $('.slotTime').removeAttr("disabled");
//     }else{
//         // $(".slotTime"). attr('disabled', true);
//         window.location.reload();
//     }
   
// });

function applyCouponCode(CouponName=''){
    var newCouponName = $('.newCouponName').val();
        if(newCouponName!=''){
            CouponName = newCouponName;
        }
    if(CouponName !=''){
    $('#CouponTable').hide();
    $('#CouponName').val(CouponName);
    $("#CouponName").attr("disabled", true);
        var tam = $('#totalamt').val();
        // alert(tam);
            $.ajax({
               url: "admin/classes/applyCoupon.php",
               type: "POST",
               data: {amount:tam,CouponName:CouponName},
               success: function(res){
                     res = $.trim(res);
            	     console.log(res);
            	   var obj = jQuery.parseJSON(res);
                       if(obj.restAmount !=''){
                            $('.btn-info').hide();
                            $('#couponDiv').hide();
                            $('#couponmsg').show();  
                            $('#chngcoupon').show();  
                            $('#coupon').show();  
                            $('#CouponPrice').show();
                            $('#CouponPrice').html("<?= currency_code() ?>"+obj.disCount);
                            $('#couponmsg').html(obj.message);
                            //Amount
                            $('#discouponName').val(CouponName);
                            $('#discouponPrice').val(obj.disCount);
                            $('#totalamt').val(obj.restAmount);
                            $('#tot').html("<?= currency_code() ?>"+obj.restAmount);
                            
                            // alert(obj.disCount);
                            // alert(obj.restAmount);
                            // alert(obj.message);
                       }else{
                           alert(obj.message);
                           $('#CouponName').val('');
                           window.location.reload();
                       }
                  }
            });
    }else{
        alert("Plese Enter CouponName");
    }
}

$('#chngcoupon').click(function(){
    window.location.reload();
});
$("#close1").click(function() {
    window.location.reload();
});
</script>
