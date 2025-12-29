<?php
include 'header.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require("phpmailer/vendor/autoload.php");
 $size_data=[];
  $clr_data=[];
if(isset($_POST['submit'])){
     $ext = towrealarray2($_POST);
    extract($ext);
   
    $newuser_user_pk_id = "";
    if(isset($email) && !empty($email) && !empty($last_name)){
          $checkUser =    towquery("Select * FROM `tbl_user` WHERE `user_email`='$email' ");
        if($checkUser->num_rows > 0){
             while($row = towfetch($checkUser)) {
                 $newuser_user_pk_id = $row['user_pk_id'];
             }
             
          $udid = towquery("UPDATE `tbl_user` SET `full_name`='$user_full_name',`first_name`='$first_name',`last_name`='$last_name',`user_email`='$email',`address`='$userShippingAddress',`addressType`='$addressType',`landmark`='$landmark' WHERE `user_pk_id`='$userid'");
          }else{ 
              $full_name=$first_name.' '.$last_name;
              $phone='+'.$countryCode.$phone;
              $pass= md5($user_password); 
            $newuser_user_pk_id = towquery2("INSERT INTO `tbl_user`(`full_name`,`first_name`,`last_name`,`contact`,`address`,`landmark`,`user_email`,`user_role`,`user_status`,`user_reg_date`,`user_password`) VALUES ('$full_name','$first_name','$last_name','$phone','$address','$landmark','$email','user','1','".date('Y-m-d H:i:s')."','$pass')");
          }
    }
        
$i=0;
while(count($product_pk_id) > $i){
    
$d = date('ymdhis');
$cartdetail =    towquery("Select * FROM `tbl_cart` WHERE `product_pk_id`='$product_pk_id[$i]' ");

 while($rowcard = towfetch($cartdetail)) {
    $cartclr = $rowcard['color'];
     $cartsize = $rowcard['size'];
    }

$order_id='ORDER-'.$d;
$p_qty=$qty[$i];
$phone = $countryCode.$phone;   
$udid = towquery2("INSERT INTO `tbl_order`(`order_id`, `product_fk_id`, `product_quantity`, `user_fk_id`, `order_status`, `order_date` ,`orderDate`,`color`,`size`) VALUES ('ORDER-".$d."','".$product_pk_id[$i]."','".$qty[$i]."','$newuser_user_pk_id','0','".date('Y-m-d H:i:s')."','".date('Y-m-d')."','$cartclr','$cartsize')");

    if(isset($last_name) && !empty($last_name)){
        $user_full_name = $first_name." ".$last_name;
         $udid = towquery2("INSERT INTO `tbl_transaction`(`order_id`, `user_fk_id`, `transaction_status`, `transaction_mode`, `transaction_date`, `del_addr`, `transc_amount`, `leftAmount`, `tContact`, `tPincode`, `tName`, `tEmail`, `tState`, `tCity`, `t1Name`, `t1Email`, `t1Contact`, `t1State`, `t1City`, `t1Pincode`, `userShippingAddress1`, `trackingId`, `trackingLink`, `shiping_ch`,`shipingPrice`,`shipingDay`,`shipingTime`,`totalamt`,`currency_code`,`currency`,`addressType`,`userShippingLandmark`,`couponName`,`couponPrice`) 
                                          VALUES ('ORDER-".$d."','$newuser_user_pk_id',0,'COD','".date('Y-m-d H:i:s')."','$address',0,'$totalamt','$user_contact','$zipcode','$user_full_name','$email','','','$user_full_name','$email','$user_contact','','','$zipcode','$address','','','','$shipping','$shipingDay','$slotTime','$totalamt','$currency_code','$currency','$addressType','$landmark','$discouponName','$discouponPrice')");
    } else {
        $udid = towquery2("INSERT INTO `tbl_transaction`(`order_id`, `user_fk_id`, `transaction_status`, `transaction_mode`, `transaction_date`, `del_addr`, `transc_amount`, `leftAmount`, `tContact`, `tPincode`, `tName`, `tEmail`, `tState`, `tCity`, `t1Name`, `t1Email`, `t1Contact`, `t1State`, `t1City`, `t1Pincode`, `userShippingAddress1`, `trackingId`, `trackingLink`, `shiping_ch`,`shipingPrice`,`shipingDay`,`shipingTime`,`totalamt`,`currency_code`,`currency`,`addressType`,`userShippingLandmark`,`couponName`,`couponPrice`) 
                                          VALUES ('ORDER-".$d."','$newuser_user_pk_id',0,'COD','".date('Y-m-d H:i:s')."','$user_address',0,'$totalamt','$user_contact','$user_pincode','$user_full_name','','','','$user_full_name','','$user_contact','','','$user_pincode','$userShippingAddress','','','','$shipping','$shipingDay','$slotTime','$totalamt','$currency_code','$currency','$addressType','$landmark','$discouponName','$discouponPrice')");
    }

$cartf = towfetch($cart);
 $qty=$cartf['qty'];
 $size1=$cartf['size'];
 $color1=$cartf['color'];

 // $clr_obj=new stdClass();
 $checkProduct =    towquery("Select * FROM `tbl_product` WHERE `product_pk_id`='$product_pk_id[$i]' ");
    if($checkProduct->num_rows > 0){
    	while($rows = towfetch($checkProduct)) {

             $stock_quantity = $rows['stock_quantity'];
               $color_quantity = json_decode($rows['color_qty']);
               $size_quantity = json_decode($rows['size_qty']);
    		      $newStock_quantity  = $stock_quantity - $qty[$i];
         }
         foreach($size_quantity as $size){
         
         if($size1==$size->name){
          $size->quant=($size->quant)-$qty;
          $size_obj='{ "name" :"'.$size->name.'", "quant" :"'.$size->quant.'"}';   
          array_push($size_data,$size_obj);
         } 
         else{
          $size_obj='{ "name" :"'.$size->name.'", "quant" :"'.$size->quant.'"}';
          array_push($size_data,$size_obj);
         }       
          }
            $size_str=implode(',',$size_data);
            $size_str='['.$size_str.']';
        
          foreach($color_quantity as $color){
         
         if($color1==$color->name){
           $color->quant=($color->quant)-$qty;
            $clr_obj='{ "name" :"'.$color->name.'", "quant" :"'.$color->quant.'"}';   
          array_push($clr_data,$clr_obj);
         }    
         else{
              $clr_obj='{ "name" :"'.$color->name.'", "quant" :"'.$color->quant.'"}';   
          array_push($clr_data,$clr_obj);
         }    
          }
        
         $clr_str=implode(',',$clr_data);
            $clr_str='['.$clr_str.']';


          $updPrd = towquery("UPDATE `tbl_product` SET `stock_quantity`='$newStock_quantity',`color_qty`='$clr_str',`size_qty`='$size_str' , `update_date`='".date('Y-m-d h:i:s')."' WHERE `product_pk_id`='$product_pk_id[$i]'");
    }

$i++;
}
towquery("DELETE FROM `tbl_cart` WHERE `cart_id`=".$cart_id[$i]);

// $flink = 'https://feminineafrica.com/';

$to = $email;
// $subject = "AVIS DE COMMANDE DE FEMININE AFRICA";
$message = "";

// $message .= "

// Dear $user_full_name,<br><br>
// Félicitations! <br><br>Nous espérons que votre achat vous apportera pleine satisfaction. Nous vous remercions d’avoir passé commande auprès de Feminine Africa et vous tiendrons informé de la progression de celle-ci au fur et à mesure. N’hésitez pas à revenir vers nous en cas de problème. <br>
   
// <br>


// Congratulations! <br><br>We hope that you will enjoy your purchase at its fullest. We thank you for your order made with Feminine Africa and we will let you know, step by step how it is going. Let us know if you have any difficulty. 

// <br><br>
// Order Id is: $d
// <br><br>

// Shoppingement vôtre, <br>
// Feminine Africa<br>
// <a href='https://feminineafrica.com/' target='_blank'>www.feminineafrica.com</a><br><br>
// <img src='https://feminineafrica.com/images/mobile.png' style='width: 24px; height: 18px;'>+225 07 02 56 02 40<br>
// <img src='https://feminineafrica.com/images/envelop.png' style='width: 18px; height: 16px;'>
// 							 inquiry@feminineafrica.com<br>
							 
							 
// 							 <a href='https://www.instagram.com/feminineafrica/' target='_blank'><span><img src='https://feminineafrica.com/images/instagram.png' style='width: 20px; height: 18px;'> @feminineafrica
							 
// 							 <br>
							 
							 
// 							 <a href='https://www.youtube.com/channel/UCepcCf9SScPmSq0KGWxL8RQ' target='_blank'><span><img src='https://feminineafrica.com/images/youtube.png' style='width: 20px; height: 18px;'> Feminine Africa</span>
// 							</a>
							 

// "
// ;

$message .= '<table class="timetable_sub">
            <thead>
              <tr>
                <th>s_no </th>
                
                <th>quantity</th>
                <th> pd_name</th>

                <th>price</th>
                
              </tr>
            </thead>
            <tbody>
                    
                                <tr>
                                  <td>1.</td>
                
                <td>quantity</td>
                <td> pd_name</td>

                <td>price</td>
                                </tr>
            </tbody>
          </table>';


// $header = "From:inquiry@feminineafrica.com \r\n";
// $header .= "MIME-Version: 1.0\r\n";
// $header .= "Content-type: text/html\r\n";
// $retval = mail($to, $subject, $message, $header);
                                $fromserver = "feminineafrica.com"; 
                                $mail = new PHPMailer(true);
                                $mail->IsSMTP();
                                $mail->CharSet = "UTF-8";
                                $mail->Host = 'feminineafrica.com';
                                $mail->Port = '587';
                                $mail->SMTPSecure = 'tls';
                                $mail->Username = 'inquiry@feminineafrica.com';
                                $mail->Password = 'TxHSFO&=m,MA';
                                $mail->SMTPAuth = true;
                                $mail->SMTPDebug = false;
                                $mail->From = 'inquiry@feminineafrica.com';
                                $mail->FromName = 'FeminineAfrica';
                                 $mail->addAddress('tanujarawat0508@gmail.com');
                                // $mail->addAddress('negivani402@gmail.com');

                                // $mail->AddReplyTo('no-reply@smsandvoice.com', '');
                                $mail->IsHTML(true);
                                $mail->Subject = 'order Confirmation';
                                $mail->Body = $message;

// if(!$mail->Send()){
// echo "Mailer Error: " . $mail->ErrorInfo;
// }else{

//    }



$url = 'https://feminineafrica.com/thank-you/'.$d;
print_r("<script type='text/javascript'>window.location='$url';</script>");
}
?>




<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
    
    
    function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
    
</script>


    <!-- Modal -->
    <!--<div id="myModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered" role="document">
          
        <div class="modal-content rounded-0">
            <p class="cancel" data-dismiss="modal" ><img src="https://uxwing.com/wp-content/themes/uxwing/download/48-checkmark-cross/close-round.png" style="width: 20px; height: 20px; position: absolute; right: 1%; top: 2%; z-index: 5;"></p>
          <div class="modal-body bg-4">

            
            <div class="d-flex main-content">
              <div class="bg-image promo-img mr-3" style="background-image: url('images/modal-image.jpeg');">
              </div>
              <div>
                <div class="text-center">
                  
                  <p style="font-family: 'Nunito Sans', sans-serif; margin-top: 10px; margin-bottom: 15px;">10% de réduction sur votre commande avec ce code</p>
                </div>
                <div class="coupon"  id="p1">
                 BIENVENU10
                </div>
                
                  <button  onclick="copyToClipboard('#p1')" style="background: #000; padding-top: 5px; padding-bottom: 5px; font-size: 14px; text-align: center; color: #fff; width: 100%;font-family: 'Nunito Sans', sans-serif; padding-top: 4px; padding-bottom: 4px; border: none; ">Code à utiliser</button>
                
                <p class="text-center"style="margin-top: 8px;">
               
                </p>
              </div>
            </div>



            
          </div>
        </div>
      </div>
    </div>-->
    
    
    <style>
        
.content {
  height: 100vh; }

.modal {
  border-radius: 7px;
  overflow: hidden;
  background-color: transparent; }
  .modal .logo a img {
    width: 30px; }
  .modal .modal-content {
    background-color: transparent;
    border: none;
    border-radius: 7px; }
    .modal .modal-content .modal-body {
      border-radius: 7px;
      overflow: hidden;
      color: #fff;
      padding-left: 0px;
      padding-right: 0px;
      -webkit-box-shadow: 0 10px 50px -10px rgba(0, 0, 0, 0.9);
      box-shadow: 0 10px 50px -10px rgba(0, 0, 0, 0.9); }
      .modal .modal-content .modal-body h2 {
        font-size: 18px; }
      .modal .modal-content .modal-body p {
        color: #000;
        font-size: 14px; line-height: 20px; }
      .modal .modal-content .modal-body h3 {
        color: #000;
        font-size: 22px; }
      .modal .modal-content .modal-body .close-btn {
        color: #000; }
      .modal .modal-content .modal-body .promo-img {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 150px;
        flex: 0 0 150px; }
  .modal .main-content {
    padding-left: 20px;
    padding-right: 20px; }
  .modal .coupon {
    padding: 10px;
    color: #000;
    text-align: center;
    background-color: #fff;
    border: 2px dashed #6c757d;
    margin-bottom: 20px; }
  .modal .cancel {
    color: gray;
    font-size: 14px; }

.form-control {
  }
  .form-control:active, .form-control:focus, .form-control:hover {
    -webkit-box-shadow: none !important;
    box-shadow: none !important; }


.bg-image {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat; }

.logo img {
  width: 70px; }

.bg-4 {
  background: #fff4e4; }
  
  @media screen and (max-width: 460px)
  {
      .modal .modal-content .modal-body .promo-img {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 100px;
        flex: 0 0 100px; }
  }
  
    </style>






<div class="container">
    <form method="post" id="checkout">
    <div class="row">
        <div class="col-md-6">
        <div class="checkout-left">
            <?php if (!isset($_SESSION['user'])) { ?>
                <div>
                    <a class="col-md-12 custom-btn" href="login"><?= strtoupper(Login) ?> / <?= strtoupper(register) ?></a>
                </div>
                <p class=" mt-4" style="font-size: 16px;color: #000;font-family: 'Ubuntu', sans-serif;"><?= orr ?></p>
				<div class="address_form_agile mt-sm-5 mt-4">
					<p class="mb-sm-4 mb-6" style="font-size: 16px;color: #000;font-family: 'Ubuntu', sans-serif;"><?= guest_login ?></p>
						<div class="creditly-wrapper wthree, w3_agileits_wrapper guest-form">
                              <div class="form-group">
                                <label class="required" for="email"><?= email ?></label>
                                <input type="email" class="form-control" id="" name="email" required oninvalid="this.setCustomValidity('Email Requis')"
  oninput="this.setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label class="required" for="first-name"><?= f_name ?></label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required oninvalid="this.setCustomValidity('Prénom requis')"
  oninput="this.setCustomValidity('')" >
                              </div>
                              <div class="form-group">
                                <label class="required" for="last-name"><?= l_name ?></label>
                                <input type="text" class="form-control" id="last_name" name="last_name"  required oninvalid="this.setCustomValidity('Nom de famille requis')"
  oninput="this.setCustomValidity('')" >
                              </div>
                              <div class="form-group">
                                <label class="required" for="countryCode"><?= country_code ?></label>
                                <select class="form-control" name="countryCode" id="countryCode" required aria-label="Select Country Code">
                                    <option data-countryCode="CD" value="225" Selected>Cote D'Ivoire (+225)</option>
                                        
                                    <option data-countryCode="GB" value="44" >UK (+44)</option>
                                    <option data-countryCode="US" value="1">USA (+1)</option>
                                    <optgroup label="Other countries">
                                        <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                                        <option data-countryCode="AD" value="376">Andorra (+376)</option>
                                        <option data-countryCode="AO" value="244">Angola (+244)</option>
                                        <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                                        <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                                        <option data-countryCode="AR" value="54">Argentina (+54)</option>
                                        <option data-countryCode="AM" value="374">Armenia (+374)</option>
                                        <option data-countryCode="AW" value="297">Aruba (+297)</option>
                                        <option data-countryCode="AU" value="61">Australia (+61)</option>
                                        <option data-countryCode="AT" value="43">Austria (+43)</option>
                                        <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                                        <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                                        <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                                        <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                                        <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                                        <option data-countryCode="BY" value="375">Belarus (+375)</option>
                                        <option data-countryCode="BE" value="32">Belgium (+32)</option>
                                        <option data-countryCode="BZ" value="501">Belize (+501)</option>
                                        <option data-countryCode="BJ" value="229">Benin (+229)</option>
                                        <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                                        <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                                        <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                                        <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                                        <option data-countryCode="BW" value="267">Botswana (+267)</option>
                                        <option data-countryCode="BR" value="55">Brazil (+55)</option>
                                        <option data-countryCode="BN" value="673">Brunei (+673)</option>
                                        <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                                        <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                                        <option data-countryCode="BI" value="257">Burundi (+257)</option>
                                        <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                                        <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                                        <option data-countryCode="CA" value="1">Canada (+1)</option>
                                        <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                                        <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                                        <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                                        <option data-countryCode="CL" value="56">Chile (+56)</option>
                                        <option data-countryCode="CN" value="86">China (+86)</option>
                                        <option data-countryCode="CO" value="57">Colombia (+57)</option>
                                        <option data-countryCode="KM" value="269">Comoros (+269)</option>
                                        <option data-countryCode="CG" value="242">Congo (+242)</option>
                                        <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                                        <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                                        
                                        <option data-countryCode="HR" value="385">Croatia (+385)</option>
                                        <option data-countryCode="CU" value="53">Cuba (+53)</option>
                                        <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                                        <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                                        <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                                        <option data-countryCode="DK" value="45">Denmark (+45)</option>
                                        <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                                        <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                                        <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                                        <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                                        <option data-countryCode="EG" value="20">Egypt (+20)</option>
                                        <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                                        <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                                        <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                                        <option data-countryCode="EE" value="372">Estonia (+372)</option>
                                        <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                                        <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                                        <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                                        <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                                        <option data-countryCode="FI" value="358">Finland (+358)</option>
                                        <option data-countryCode="FR" value="33">France (+33)</option>
                                        <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                                        <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                                        <option data-countryCode="GA" value="241">Gabon (+241)</option>
                                        <option data-countryCode="GM" value="220">Gambia (+220)</option>
                                        <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                                        <option data-countryCode="DE" value="49">Germany (+49)</option>
                                        <option data-countryCode="GH" value="233">Ghana (+233)</option>
                                        <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                                        <option data-countryCode="GR" value="30">Greece (+30)</option>
                                        <option data-countryCode="GL" value="299">Greenland (+299)</option>
                                        <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                                        <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                                        <option data-countryCode="GU" value="671">Guam (+671)</option>
                                        <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                                        <option data-countryCode="GN" value="224">Guinea (+224)</option>
                                        <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                                        <option data-countryCode="GY" value="592">Guyana (+592)</option>
                                        <option data-countryCode="HT" value="509">Haiti (+509)</option>
                                        <option data-countryCode="HN" value="504">Honduras (+504)</option>
                                        <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                                        <option data-countryCode="HU" value="36">Hungary (+36)</option>
                                        <option data-countryCode="IS" value="354">Iceland (+354)</option>
                                        <option data-countryCode="IN" value="91">India (+91)</option>
                                        <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                                        <option data-countryCode="IR" value="98">Iran (+98)</option>
                                        <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                                        <option data-countryCode="IE" value="353">Ireland (+353)</option>
                                        <option data-countryCode="IL" value="972">Israel (+972)</option>
                                        <option data-countryCode="IT" value="39">Italy (+39)</option>
                                        <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                                        <option data-countryCode="JP" value="81">Japan (+81)</option>
                                        <option data-countryCode="JO" value="962">Jordan (+962)</option>
                                        <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                                        <option data-countryCode="KE" value="254">Kenya (+254)</option>
                                        <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                                        <option data-countryCode="KP" value="850">Korea North (+850)</option>
                                        <option data-countryCode="KR" value="82">Korea South (+82)</option>
                                        <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                                        <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                                        <option data-countryCode="LA" value="856">Laos (+856)</option>
                                        <option data-countryCode="LV" value="371">Latvia (+371)</option>
                                        <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                                        <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                                        <option data-countryCode="LR" value="231">Liberia (+231)</option>
                                        <option data-countryCode="LY" value="218">Libya (+218)</option>
                                        <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                                        <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                                        <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                                        <option data-countryCode="MO" value="853">Macao (+853)</option>
                                        <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                                        <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                                        <option data-countryCode="MW" value="265">Malawi (+265)</option>
                                        <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                                        <option data-countryCode="MV" value="960">Maldives (+960)</option>
                                        <option data-countryCode="ML" value="223">Mali (+223)</option>
                                        <option data-countryCode="MT" value="356">Malta (+356)</option>
                                        <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                                        <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                                        <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                                        <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                                        <option data-countryCode="MX" value="52">Mexico (+52)</option>
                                        <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                                        <option data-countryCode="MD" value="373">Moldova (+373)</option>
                                        <option data-countryCode="MC" value="377">Monaco (+377)</option>
                                        <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                                        <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                                        <option data-countryCode="MA" value="212">Morocco (+212)</option>
                                        <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                                        <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                                        <option data-countryCode="NA" value="264">Namibia (+264)</option>
                                        <option data-countryCode="NR" value="674">Nauru (+674)</option>
                                        <option data-countryCode="NP" value="977">Nepal (+977)</option>
                                        <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                                        <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                                        <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                                        <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                                        <option data-countryCode="NE" value="227">Niger (+227)</option>
                                        <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                                        <option data-countryCode="NU" value="683">Niue (+683)</option>
                                        <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                                        <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                                        <option data-countryCode="NO" value="47">Norway (+47)</option>
                                        <option data-countryCode="OM" value="968">Oman (+968)</option>
                                        <option data-countryCode="PW" value="680">Palau (+680)</option>
                                        <option data-countryCode="PA" value="507">Panama (+507)</option>
                                        <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                                        <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                                        <option data-countryCode="PE" value="51">Peru (+51)</option>
                                        <option data-countryCode="PH" value="63">Philippines (+63)</option>
                                        <option data-countryCode="PL" value="48">Poland (+48)</option>
                                        <option data-countryCode="PT" value="351">Portugal (+351)</option>
                                        <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                                        <option data-countryCode="QA" value="974">Qatar (+974)</option>
                                        <option data-countryCode="RE" value="262">Reunion (+262)</option>
                                        <option data-countryCode="RO" value="40">Romania (+40)</option>
                                        <option data-countryCode="RU" value="7">Russia (+7)</option>
                                        <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                                        <option data-countryCode="SM" value="378">San Marino (+378)</option>
                                        <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                                        <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                                        <option data-countryCode="SN" value="221">Senegal (+221)</option>
                                        <option data-countryCode="CS" value="381">Serbia (+381)</option>
                                        <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                                        <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                                        <option data-countryCode="SG" value="65">Singapore (+65)</option>
                                        <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                                        <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                                        <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                                        <option data-countryCode="SO" value="252">Somalia (+252)</option>
                                        <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                                        <option data-countryCode="ES" value="34">Spain (+34)</option>
                                        <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                                        <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                                        <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                                        <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                                        <option data-countryCode="SD" value="249">Sudan (+249)</option>
                                        <option data-countryCode="SR" value="597">Suriname (+597)</option>
                                        <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                                        <option data-countryCode="SE" value="46">Sweden (+46)</option>
                                        <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                                        <option data-countryCode="SI" value="963">Syria (+963)</option>
                                        <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                                        <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                                        <option data-countryCode="TH" value="66">Thailand (+66)</option>
                                        <option data-countryCode="TG" value="228">Togo (+228)</option>
                                        <option data-countryCode="TO" value="676">Tonga (+676)</option>
                                        <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                                        <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                                        <option data-countryCode="TR" value="90">Turkey (+90)</option>
                                        <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                                        <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                                        <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                        <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                                        <option data-countryCode="UG" value="256">Uganda (+256)</option>
                                        <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                                        <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                                        <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                                        <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                                        <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                                        <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                                        <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                                        <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                                        <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                                        <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                                        <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                                        <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                                        <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                                        <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                                        <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                                        <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                                        <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                                    </optgroup>
                                </select>
                              </div>
                              <div class="form-group">
                                <label class="required" for="phone"><?= number ?></label>
                                <input type="text" class="form-control" id="phone" name="phone" required oninvalid="this.setCustomValidity('Contact requis')"
  oninput="this.setCustomValidity('')">
                              </div>
                              <div class="form-group">
                                <label class="required" for="address"><?= address ?></label>
                                <textarea class="form-control" id="address" name="address" required oninvalid="this.setCustomValidity('Adresse requise')"
  oninput="this.setCustomValidity('')" rows="4" cols="50"></textarea>
                              </div>
                              <div class="w3_agileits_card_number_grid_right form-group">
        						<div class="controls">
        						    <label class="required" for="address"><?= landmark ?></label>
        							<input type="text" class="form-control" placeholder="" name="landmark" required="" value="">
        						</div>
        					</div>
                              
                              <div class="form-group">
                                <label class="required" for="country"><?= country ?></label>
                                <input type="text" class="form-control" id="country" name="country" required oninvalid="this.setCustomValidity('Pays requis')"
  oninput="this.setCustomValidity('')">
                              </div>
						</div>
					<!--<div class="checkout-right-basket">-->
					<!--	<a href="payment.html">Make a Payment-->
					<!--		<span class="far fa-hand-point-right"></span>-->
					<!--	</a>-->
					<!--</div>-->
				</div>
			<? } else { 
			    $userdata = towquery("Select * FROM `tbl_user` WHERE `user_pk_id`=".$_SESSION['userId']);
                                    while($us=towfetch($userdata)) { ?>
                <p class="mb-sm-4 mb-6" style="font-size: 22px;color: #000;font-family: 'Ubuntu', sans-serif;"><?= shipping_detail ?></p>                    
                <div class="information-wrapper">                    
                    <div class="first-row">                    
                        <div class="controls form-group">
                            <input type="hidden" name="userid" value="<?= isset($us['user_pk_id'])?$us['user_pk_id']:'' ?>">
                            
        					<input class="billing-address-name form-control" type="hidden" name="user_full_name" required value="<?= isset($us['first_name'])?$us['first_name']:'' ?> <?= isset($us['last_name'])?$us['last_name']:'' ?>"   placeholder="Full Name" >
        					
        					<input class="billing-address-name form-control" type="text" name="first_name" required oninvalid="this.setCustomValidity('Prénom obligatoire')"
  oninput="this.setCustomValidity('')"  value="<?= isset($us['first_name'])?$us['first_name']:'' ?>"   placeholder="<?= ft ?>" >
        					
        					<input class="billing-address-name form-control" type="text" name="last_name" required oninvalid="this.setCustomValidity('Nom de famille requis')"
  oninput="this.setCustomValidity('')" value="<?= isset($us['last_name'])?$us['last_name']:'' ?>"   placeholder="<?= lt ?>" >
        					
        					
        					
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
        							<input type="text" class="form-control" placeholder="<?= mobile ?>" name="user_contact" readonly value="<?= isset($us['contact'])?$us['contact']:'' ?>"  required oninvalid="this.setCustomValidity('Contact requis')"
  oninput="this.setCustomValidity('')">
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
        					<textarea class="form-control" placeholder="<?= address ?>" name="userShippingAddress" required oninvalid="this.setCustomValidity('Adresse requise')"
  oninput="this.setCustomValidity('')" ><?= isset($us['address'])?$us['address']:'' ?> </textarea>
        				</div>
        				<div class="controls form-group">
        					<input type="text" class="form-control" placeholder="<?= landmark ?>" value="<?= isset($us['landmark'])?$us['landmark']:'' ?>" name="landmark" required  oninvalid="this.setCustomValidity('Point de repère requis')"
  oninput="this.setCustomValidity('')">
        				</div>
        			
        				
        				
        				<div class="controls form-group">
        					<select class="option-w3ls" name="addressType">
        						<option value=""><?= address_type ?></option>
        						<option <?php if($us['addressType'] == Office ){ echo "selected"; } ?> value="<?= Office ?>"><?= Office ?></option>
        						<option <?php if($us['addressType'] == Home){ echo "selected"; } ?> value="<?= Home ?>"><?= Home ?></option>
        						<option <?php if($us['addressType'] == Other){ echo "selected"; } ?> value="<?= Other ?>"><?= Other ?></option>
        
        					</select>
        				</div>     
        			</div>
        		</div>	
			
			<? }} ?>
			</div>
			</div>
			<!------Cart Item Start--------->
			<div class="col-md-6" style="background: #f7f7f7;">
			     <div class="checkout-right">
			         <div class="address_form_agile mt-sm-5 mt-4">
        
                  
        <div class="col-md-12 col-xs-12" style="border-bottom:#ccc solid 1px; padding:15px 0 10px 0;">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <h4 style="font-size:20px;color:#000; margin-bottom: 10px;font-family: 'Nunito Sans', sans-serif;"><?= strtoupper(o_summary) ?></h4>
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
                    
                        <div class="col-md-12 col-xs-12 padding_0 mv-15 flex-row">
                            <div class="col-md-4 col-xs-12 padding_0">
                                <img class="product_image" src="<?= base_url ?>admin/assets/<?=$cartf['featurd_image']?>" style="width:100%; height: auto;" alt=" " class="img-responsive">
                            </div>
                            <div class="col-md-8 col-xs-12 padding_0" style="padding-left: 15px">
                                <h6 style="font-weight:500;font-family: 'Nunito Sans', sans-serif;"><?=$cartf['product_title']?></h6>
                                <p style="color:#000;font-family: 'Nunito Sans', sans-serif;">Qty: <?=$cartf['qty']?></p>
                                <p style="color:#000;font-family: 'Nunito Sans', sans-serif;">CFA<?=$cartf['discount']?></p>
                            </div>
                        </div>
                        
                    <?php $item++;} ?>	
                    <div class="col-md-8 col-xs-8 border-top">
                        <p style="font-size: 14px;font-family: 'Nunito Sans', sans-serif;color: #000;"><?= discount ?></p>
                        <p style="font-size: 14px; color: #000;font-family: 'Nunito Sans', sans-serif;"><?= subtotal ?></p>
                    </div>
                    <div class="col-md-4 col-xs-4 border-top">
                        <p id="discount" style="font-size: 14px;color: #000;text-align: right;"><?= currency_code() ?> <?= currency_price($subtotal) ?> </p>
                        <p style="font-size: 14px;color: #000;text-align: right;"><?= currency_code() ?> <?= currency_price($total-$subtotal) ?> </p>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-md-12 col-xs-12" style="border-bottom:#ccc solid 1px; padding:15px 0 10px 0;">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
					<form name="Coupon">
					    <div class="flex-row">
					        <input type="text" name="CouponName" id="CouponName" class="form-control newCouponName" placeholder="Enter discount code" />
					        <button style="padding-left: 5px; font-size: 10px; background: #000; " type="button" id="applycoupon" onclick="applyCouponCode()" class="btn btn-info btn-xs coupon-button"><?=apply?></button>
					        <button type="button" id="chngcoupon" style="display: none" class="btn btn-info btn-xs coupon-button"><?= remove ?></button>
                    
					    </div>
					</form>
					<p style="font-size: 16px;font-family: 'Nunito Sans', sans-serif; color: #000; font-weight: bold; display:none;" id="CouponPrice"></p>							
                    
                    </div>
                   
                    <br><span style="color:green;margin-left: 15px;margin-top: 10px;font-size: 16px;font-family: 'Nunito Sans', sans-serif; font-weight: bold; display:none;" id="couponmsg"></span>
                   <!--<br> <span style="color:#018849;font-size: 16px;font-family: 'Ubuntu', sans-serif; font-weight: bold;display:none;" id="chngcoupon">Change Coupon</span>-->
                 
                </div>
<!--                 <div class="row" id="couponDiv">-->
<!--                    <div class="col-md-4 col-xs-4">-->
<!--					<p style="font-size: 16px;font-family: 'Ubuntu', sans-serif; color: #000; font-weight: bold; "><?= apply_coupon ?></p>	-->
<!--                    </div>-->
					
<!--                    <div class="col-md-8 col-xs-8">-->
<!--									<div class="shop_detail_right_inner_3 clearfix">-->
<!-- <div class="panel panel-primary shop_detail_right_inner_3_main clearfix">-->
<!--                <div class="panel-heading">-->
<!--                    <p class="panel-title">-->
<!--                       <i class="fa fa-edit"></i><?= coupon_details ?></p>-->
<!--                    <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>-->
<!--                </div>-->
<!--                <div class="panel-body" style="display: block;"><table class="table" id="CouponTable">-->
<!--  <thead>-->
<!--    <tr>-->
<!--      <th scope="col">coupon</th>-->
<!--      <th scope="col"><?= description ?></th>-->
<!--      <th scope="col"><?= min_ammount ?></th>-->
<!--      <th scope="col"><?= apply ?></th>-->
<!--    </tr>-->
<!--  </thead>-->
<!--  <tbody>-->
<!--      <?php while($cou = towfetch($coupon)) { ?>-->
<!--	  <tr>-->
<!--      <td><?= $cou[$coupon_tilte] ?></td>-->
<!--      <td><?= $cou[$coupon_desc] ?></td>-->
<!--      <td><?= $cou['couponMin'] ?></td>-->
<!--      <td><button type="button" onclick="applyCouponCode('<?= $cou['coupon_name'] ?>')" class="btn btn-info btn-xs" style="margin-top:20px"><?= apply ?></button>-->
<!--     </td>-->
<!--    </tr>-->
<!-- <?php } ?>-->
<!--  </tbody>-->
<!--</table>-->
<!--</div>-->
<!--       </div>-->
<!--                    </div>			-->
                    
<!--                    </div>-->
                    
<!--                </div>-->

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
                    <div class="col-md-8 col-xs-8"><p style="font-size: 15px; color: #000;font-family: 'Nunito Sans', sans-serif; font-weight: 600;"><?= strtoupper(order_total) ?></p>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <p style="font-size: 15px; text-align: right;color: #000;font-weight: 600;"> 
                        <span id="tot" style="font-family: 'Nunito Sans', sans-serif;"><?= currency_code() ?> <?= currency_price($total) ?></span>
                        <input type="hidden" value="<?= currency_price($total) ?>" name="totalamt" id="totalamt" > </p>
                        <input type="hidden" value="" name="discouponPrice" id="discouponPrice" > </p>
                        <input type="hidden" value="" name="discouponName" id="discouponName" > </p>
                        <input type="hidden" value="<?= currency_code() ?>" name="currency_code" id="currency_code" />
                        <input type="hidden" value="<?= currency()?>" name="currency" id="currency" />
                        
                         
                        
                         </div>
                       
                    <div class="col-md-12 col-xs-12">
                        <p style="font-size: 14px;font-family: 'Nunito Sans', sans-serif;color: #000;"><?= payd ?></p>
                        <img src="images/payment-method.png" style="width: 100%;">
                         	<button type="submit" name="submit" class="submit " style="width: 100%; z-index:5;font-family: 'Nunito Sans', sans-serif; background: #000; margin-top: 15px;  color: #fff; border: none; padding-top: 8px; padding-bottom: 10px;"><?= place_order ?></button>
						 </div>
                         
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

<?php include 'footer.php';?>
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
                            $('#applycoupon').hide();
                            $('#couponDiv').hide();
                            $('#couponmsg').show();  
                            $('#chngcoupon').show();  
                            $('#coupon').show();  
                            // $('#CouponPrice').show();
                            $('#discount').html("<?= currency_code() ?>"+obj.disCount);
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
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>






<!--<table class='table table-bordered'>-->
<!--  <thead>-->
<!--    <tr>-->
<!--      <th scope='col'>Order Name</th>-->
<!--      <th scope='col'>Image</th>-->
<!--      <th scope='col'>Quantity</th>-->
<!--      <th scope='col'>Price</th>-->
<!--    </tr>-->
<!--  </thead>-->
<!--  <tbody>-->
      
<!--  foreach (array_combine($product_pk_id, $qty) as $pk_id => $qtys) {-->
<!--  $checkProduct =    towquery('Select * FROM `tbl_product` WHERE `product_pk_id`=$pk_id ');-->
<!--    if($checkProduct->num_rows > 0){-->
<!--    	while($rows = towfetch($checkProduct)) {-->

<!--    <tr>-->
<!--      <th>'.$rows['product_title'].'</th>-->
<!--      <td><img src='<?= base_url ?>'admin/assets/'.$rows['featurd_image'].'></td>-->
<!--      <td>$qtys</td>-->
<!--      <td>'.$rows['product_price'].'</td>-->
<!--    </tr>-->
<!--     }}} -->
   
<!--  </tbody>-->
<!--</table>-->