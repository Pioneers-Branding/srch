<?php
session_start();
include('header.php');
include 'web_action/config.php';
// $user_ip = $_SERVER['REMOTE_ADDR'];
// print_r($user_ip);
if (!isset($_SESSION['uniqid_user_id'])) {
    $_SESSION['uniqid_user_id'] = uniqid();
}
$guest_ip=$_SESSION['uniqid_user_id'];

?>
<link rel="stylesheet" href="https://gaganfilmsproduction.in/feminineafrica.ci/d2afzgorr4mxtq.cloudfront.net/css/theme.min.css">
<style>
    .new_login_head p {
        text-align: end;
    }
    .login_n button {
        background: #049fe2;
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        border: unset;
        padding: 2px 14px;
        border-radius: 3px;
    }
    .or_line span {
        top: -18px;
        position: absolute;
        background: white;
        padding: 7px;
        margin-left: -11px;
    }
    .new_login_head p {
        text-align: left;
        font-size: 20px;
        font-weight: 500;
    }
    .or_line {
        border-bottom: 1px solid #dee2e6;
        position: relative;
        text-align: center;
        margin: 16px 0px;
    }
    .order_child {
        display: flex;
        justify-content: space-between;
    }
    .order_inner_section {
        margin-top: 32px;
    }
    p.order-left {
        font-size: 18px;
        margin-bottom: 9px;
    }
    .validation{
color:red;
}
    p.order-right {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 9px;
    }
    .order-ch {
        margin-top: 27px;
    }
    .order-ch p {
        font-size: 21px;
        font-weight: bold;
    }
    .price_text {
        color: #808080d4;
        text-align: end;
    }
    .megasubmenu.dropdown-menu {
    left: 100%;
    top: -7px;
    min-height: 100%;
    max-width: 722px;
    min-width: 722px;
    padding: 0;
    border: 0;
    padding-left: 15px;
    box-shadow: 6px 6px 10px 0 #eee;
    background: #f8f9fa!important;
    }
    .product-menu-list .title {
        color: var(--main-color) !important;
        font-size: 14px !important;
        padding-bottom: 5px !important;
        position: relative !important;
    }
    .mb-location:before{content:'You are in '}.mb-location:after,.mb-no-location:after{content:'CHANGE';font-size:12px;color:#1249a0;float:right;line-height:22px}.current-location-container.popup .current-location{max-width:1200px;overflow:hidden;min-width:1100px;margin:auto;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);padding-bottom:30px}.current-location-container.popup .current-location-selected{display:none}.current-location-container.popup .current-location-title{font-size:20px;line-height:36px}.current-location-container.popup .search-container .justify-content-center{justify-content:left!important}.close-current-location{z-index:1}@media screen and (max-width:768px){.mb-location{width:100%;display:block}.current-location-container.popup .current-location{max-width:100%;overflow-y:scroll;min-width:100%;height:100%;margin:auto;position:absolute;top:0;left:0;transform:none}.current-location-container.popup .current-location-title{font-size:16px;line-height:36px;margin-bottom:10px}.search-container{text-align:center}.location-heading{margin-top:0}ul.store-list li{display:inline-block;width:calc(100%/2);margin-bottom:10px;text-align:left}ul.store-list{padding:0;list-style:none;display:block;margin:14px auto;max-width:300px}.current-location-container.popup .current-location-selected{position:fixed;width:100%;bottom:0;display:block}.current-location-container.popup .btn-section-current-location .btn-current-location{padding:7px 10px}.current-location-container.popup .current-location-selected .container{padding-right:0}.current-location-container.popup .btn-section-current-location:after{top:12px}.current-location-container.popup .or{margin:10px 0}.current-location-container.popup .current-location .btn{padding:5px 15px;font-size:14px}}@media screen and (min-width:769px){.current-location-container.popup .store-list li{border:1px solid #ddd;width:auto;padding:5px 15px;margin-right:15px;margin-bottom:15px;border-radius:20px;background:#e6e6e6;box-shadow:0 0 5px 0 #ddd}.current-location-container.popup .store-list li:hover{box-shadow:0 4px 8px 0 #ddd;background:#1249a0;color:#fff}.current-location-container.popup .store-list{margin-bottom:0}}@media screen and (width:768px){ul.store-list{padding:0;list-style:none;display:block;margin:14px auto;max-width:100%}.current-location-container.popup .current-location .btn{padding:.375rem .75rem;font-size:16px}ul.store-list li{width:calc(100%/4)}}.current-location-container.popup .current-location .close-current-location{display:none}</style>

<!-- ========== Body ========== -->

<style>.dxg-elements text:nth-child(2){text-anchor:end}.dxg-elements text:nth-child(3){text-anchor:end}.dxg-elements text:nth-child(4){text-anchor:start}.dxg-elements text:nth-child(5){text-anchor:start}.dxg-elements text:nth-child(6){text-anchor:start}.gauge-container{margin-bottom:-35px}.gooey{position:absolute;top:50%;left:50%;width:142px;height:40px;margin:-20px 0 0 -71px;filter:contrast(20)}.gooey .dot{position:absolute;width:16px;height:16px;top:12px;left:15px;filter:blur(0);background:#000;border-radius:50%;transform:translateX(0);animation:dot 2.8s infinite}.gooey .dots{transform: translateX(0);margin-top: 12px;margin-left: 31px;animation: dots 2.8s infinite;width: auto;background: no-repeat;}.gooey .dots span{display:block;float:left;width:16px;height:16px;margin-left:16px;filter:blur(0);background:#000;border-radius:50%}@-moz-keyframes dot{50%{transform:translateX(96px)}}@-webkit-keyframes dot{50%{transform:translateX(96px)}}@-o-keyframes dot{50%{transform:translateX(96px)}}@keyframes dot{50%{transform:translateX(96px)}}@-moz-keyframes dots{50%{transform:translateX(-31px)}}@-webkit-keyframes dots{50%{transform:translateX(-31px)}}@-o-keyframes dots{50%{transform:translateX(-31px)}}@keyframes dots{50%{transform:translateX(-31px)}}.payment-loader{position:fixed;height:100%;width:100%;z-index:99999;background:rgba(256,256,256,.7);top:0;bottom:0}</style>

<?php

?>
    <!-- ========== MAIN CONTENT ========== -->
    <div class="payment-loader" style="display: none;">
        <div class="gooey">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
        </div>
    </div>

    <main id="content" role="main" class="cart-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../index.html">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container" id="checkout_summery">


<style>.payment-section {padding: 10px 20px;border: 1px solid #1249a0;background: #1249a0;}</style>
    <div class="row">
        <div class="col-lg-9 mb-3">
            <div class="row">
              <?php if(!(isset($_SESSION['user_id']))){?>
              <div class="col-md-12">
                    <div class="border-color-1 mb-0">
                        <div class="row justify-content-between">
                            <div class="col-md-12">
                                <div class="login_n">
                                    <button data-bs-toggle="modal" href="#loginModal"> Login</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="or_line">
                                    <span>OR</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="new_login_head">
                                    <p>Continue as a guest!!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                <?php 
                       
                        if(isset($_SESSION['user_id'])){
                        
                        
                        $user_id=$_SESSION['user_id'];
                        $sql_users = "select * from `tbl_user` WHERE user_pk_id=$user_id";
                        $userResult = mysqli_query($con,$sql_users);
                        $users = mysqli_fetch_assoc($userResult);
                        $full_name=$users['full_name'];
                        
                        
                    
                        ?>
                <div class="col-md-12 mb-5">
                    
                    <div class="py-3 pr-0 border-bottom">
                        <div class="row">
                            <div class="col-6 col-md-4">
                                <h5 class="font-size-16 font-weight-bold"><?=$full_name?></h5>
                            </div>
                            <!--<div class="col-6 col-md-4">-->
                            <!--    <h5 class="font-size-16 font-weight-bold">None</h5>-->
                            <!--</div>-->
                        </div>
                    </div>
                    
                </div>
                
                <?php }else{?>
                <div class="col-md-12 mb-5">
                    
                </div>
                <?php } ?>
                <div class="col-md-12 mb-5">
                    <div class="border-bottom border-color-1 mb-3">
                        <div class="row justify-content-between">
                            <div class="col-7 col-md-6">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-16 font-weight-bold">
                                    <i class="fa fa-check-circle text-green font-size-20 orderSummary-selected-address" data-target-group="checkout-group" style="display: none">
                                    </i>
                                    Billing &amp; Shipping address
                                </h3>
                            </div>
                            <div class="col-auto col-md-6 text-right">
                                
                                    <a href="javascript:;" class="text-blue font-size-16 font-weight-bold
                                    js-animation-link manage-address manage-address-list" data-target="#addNewAddress" id="addnewAddressBtn" data-link-group="checkout-group" data-animation-in="slideInUp" data-target-group="checkout-group">Add
                                        New Address
                                    </a>
                                
                                <a class="text-blue font-weight-bold font-size-16
                                    js-animation-link orderSummary-selected-address" data-target=".manage-address" data-link-group="checkout-group" data-animation-in="slideInUp" href="javascript:;" style="display: none" data-target-group="checkout-group">
                                    Change
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--- Guest address form -------------------------->
                   
                    <form class="border-bottom border-color-1 pb-5" id="addguestNewAddress" novalidate="novalidate" style="display:none;"  data-target-group="checkout-group">
                        <input type="hidden" name="csrfmiddlewaretoken" value="EGpDfRDfVwXzNidrodg7AOESw921EpHh2y1alB5fSQfuOSj4Tazwed8CnpJTcWRs">
                        <div class="form-row">
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="guest_name">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="guest_name" value="<?=$full_name?>" id="guest_name" placeholder="Enter your name" aria-label="Name" required="" data-msg="Please enter a valid your name" data-error-class="u-has-error" data-success-class="u-has-success">
                                <span id="guest_name_error" class="validation"></span>
                            </div>

                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="guest_AddressMobile">Mobile
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="tel" maxlength="10" minlength="10" class="form-control" name="guest_mobile" id="guest_AddressMobile" value="<?=$users['contact']?>" placeholder="Enter your mobile number" aria-label="Mobile" required="" data-msg="Please enter a valid your mobile number" data-error-class="u-has-error" data-success-class="u-has-success">
                                <span id="guest_AddressMobile_error" class="validation"></span>
                            </div>
                            <!--<div class="js-form-message col-md-4 mb-2 mb-lg-5">-->
                            <!--    <label class="form-label" for="guest_AddressName">Email-->
                            <!--        <span class="text-danger">*</span>-->
                            <!--    </label>-->
                            <!--    <input type="email" class="form-control" name="guest_email" id="guest_AddressName" placeholder="Enter your email" value="<?=$users['user_email']?>" aria-label="Email" required="" data-msg="Please enter a valid your email" data-error-class="u-has-error" data-success-class="u-has-success">-->
                            <!--    <span id="guest_AddressName_error" class="validation"></span>-->
                            <!--</div>-->
                            <div class="js-form-message col-md-6 mb-2 mb-lg-5">
                                <label class="form-label" for="guest_Address1">Flat/House/Floor/Building
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="guest_address" id="guest_Address1" placeholder="" aria-label="Name" required="" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">
                                <span id="guest_Address1_error" class="validation"></span>
                            </div>
                            <!--<div class="js-form-message col-md-6 mb-2 mb-lg-5">-->
                            <!--    <label class="form-label" for="guest_Address2">Area/Street/Sector-->
                            <!--    </label>-->
                            <!--    <input type="text" class="form-control" name="guest_address2" id="guest_Address2" placeholder="" aria-label="Name" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">-->
                            <!--</div>-->
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="guest_Landmark">Landmark
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="guest_landmark" id="guest_Landmark" placeholder="" aria-label="Landmark" required="" data-msg="Please enter a valid Landmark" data-error-class="u-has-error" data-success-class="u-has-success">
                                <span id="guest_Landmark_error" class="validation"></span>
                            </div>

                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="guest_Pincode">Pincode
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="guest_pincode" id="guest_Pincode" placeholder="" aria-label="Pincode" required="" data-msg="Please enter a valid your area Pin-code" data-error-class="u-has-error" data-success-class="u-has-success">
                                <span id="guest_Pincode_error" class="validation"></span>
                            </div>
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="guest_Pincode">GST Number
                                    
                                </label>
                                <input type="text" class="form-control" name="gst_number" id="gst_number" placeholder="" aria-label="gst_number"  data-error-class="u-has-error" data-success-class="u-has-success">
                                
                            </div>
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="guest_State">State
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" name="guest_state" id="guest_state" aria-label="State" required="" data-msg="Please enter a valid state name" data-error-class="u-has-error" data-success-class="u-has-success" data-city="#guest_city">
                                    <option value="">Select State</option>
                                    
                            <option value="AP">Andhra Pradesh</option>
                        	<option value="AR">Arunachal Pradesh</option>
                        	<option value="AS">Assam</option>
                        	<option value="BR">Bihar</option>
                        	<option value="CT">Chhattisgarh</option>
                        	<option value="GA">Gujarat</option>
                        	<option value="HR">Haryana</option>
                        	<option value="HP">Himachal Pradesh</option>
                        	<option value="JK">Jammu and Kashmir</option>
                        	<option value="GA">Goa</option>
                        	<option value="JH">Jharkhand</option>
                        	<option value="KA">Karnataka</option>
                        	<option value="KL">Kerala</option>
                        	<option value="MP">Madhya Pradesh</option>
                        	<option value="MH">Maharashtra</option>
                            <option value="MN">Manipur</option>
                            <option value="ML">Meghalaya</option>
                        	<option value="MZ">Mizoram</option>
                        	<option value="NL">Nagaland</option>
                        	<option value="OR">Odisha</option>
                        	<option value="PB">Punjab</option>
                        	<option value="RJ">Rajasthan</option>
                        	<option value="SK">Sikkim</option>
                        	<option value="TN">Tamil Nadu</option>
                        	<option value="TG">Telangana</option>
                        	<option value="TR">Tripura</option>
                        	<option value="UT">Uttarakhand</option>
                        	<option value="UP">Uttar Pradesh</option>
                        	<option value="WB">West Bengal</option>
                        	<option value="AN">Andaman and Nicobar Islands</option>
                        	<option value="CH">Chandigarh</option>
                        	<option value="DN">Dadra and Nagar Haveli</option>
                        	<option value="DD">Daman and Diu</option>
                        	<option value="DL">Delhi</option>
                        	<option value="LD">Lakshadweep</option>
                        	<option value="PY">Puducherry</option>
                                    
                                </select>
                                <span id="guest_state_error" class="validation"></span>
                            </div>
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="guest_City">City
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="guest_city" id="guest_city" placeholder="" aria-label="guest_city" required=""   data-success-class="u-has-success">
                                <span id="guest_city_error" class="validation"></span>
                            </div>
                            <div class="js-form-message col-md-8 mb-2 mb-lg-5 align-self-end pb-2">
                                
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input required="" type="radio" id="guest_1" name="guest_addressType" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="guest_1">
                                            Home
                                        </label>
                                    </div>
                                
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input required="" type="radio" id="guest_2" name="guest_addressType" class="custom-control-input" value="2">
                                        <label class="custom-control-label" for="guest_2">
                                            Office
                                        </label>
                                    </div>
                                
                            </div>
                            <!--<div class="col-md-12 mb-3">-->
                            <!--    <div id="addshopCartHeadingFour" class="custom-control custom-checkbox d-flex align-items-center">-->
                            <!--        <input type="checkbox" onclick="($(this).is(':checked') == true ? $('#add-guest-billing').hide():$('#add-guest-billing').show())" class="custom-control-input" id="addguestaddress" name="billingdiffrentAddress" checked="">-->
                            <!--        <label class="custom-control-label form-label" for="addguestaddress">Billing address same as shipping address?</label>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div id="add-guest-billing" class="mt-3 mb-3" style="display: none">
                            <div class="form-row">
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="guest_addBillingUserName">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="guest_billing_address_name" id="guest_addBillingUserName" placeholder="Enter your name" aria-label="Name" data-msg="Please enter a valid your name" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>

                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="guest_addBillingAddressMobile">Mobile
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control" name="guest_billing_address_mobile_no" id="guest_addBillingAddressMobile" maxlength="10" minlength="10" placeholder="Enter your mobile number" aria-label="Mobile" data-msg="Please enter a valid your mobile number" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="guest_addBillingAddressName">Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="guest_billing_address_email" id="guest_addBillingAddressName" placeholder="Enter your email" aria-label="Email" data-msg="Please enter a valid your email" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-md-6 mb-2 mb-lg-5">
                                    <label class="form-label" for="guest_addBillingAddress1">Flat/House/Floor/Building
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="guest_billing_address_address_line1" id="guest_addBillingAddress1" placeholder="" aria-label="Name" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-md-6 mb-2 mb-lg-5">
                                    <label class="form-label" for="guest_addBillingAddress2">Area/Street/Sector
                                    </label>
                                    <input type="text" class="form-control" name="guest_billing_address_address_line2" id="guest_addBillingAddress2" placeholder="" aria-label="Name" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="guest_addBillingLandmark">Landmark
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="guest_billing_address_landmark" id="guest_addBillingLandmark" placeholder="" aria-label="Landmark" data-msg="Please enter a valid Landmark" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>

                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="guest_addBillingPincode">Pincode
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="guest_billing_address_pincode" id="guest_addBillingPincode" placeholder="" aria-label="Pincode" data-msg="Please enter a valid your area Pin-code" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="guest_addBillingState">State
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="billing_address_state_id" id="guest_addBillingState" aria-label="State" data-msg="Please enter a valid state name" data-error-class="u-has-error" data-success-class="u-has-success" data-city="#guest_addBillingCity">
                                        <option value="">Select State</option>
                                        
                                            <option value="1">WEST BENGAL</option>
                                        
                                            <option value="2">ODISHA</option>
                                        
                                            <option value="3">RAJASTHAN</option>
                                        
                                            <option value="4">UTTAR PRADESH</option>
                                        
                                            <option value="5">ANDHRA PRADESH</option>
                                        
                                            <option value="7">HARYANA</option>
                                        
                                    </select>
                                </div>
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="guest_addBillingCity">City
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select class="form-control" name="guest_billing_address_city_id" id="guest_addBillingCity" aria-label="City" data-msg="Please enter a valid City name" data-error-class="u-has-error" data-success-class="u-has-success">
                                    </select>
                                </div>
                                <div class="js-form-message col-md-8 mb-2 mb-lg-5 align-self-end pb-2">
                                    
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="guest_11" name="guest_billing_addresstype" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="guest_11">Home</label>
                                        </div>
                                    
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="guest_21" name="guest_billing_addresstype" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="guest_21">Office</label>
                                        </div>
                                    

                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn cancel_btn btn-light px-xl-10 mr-3 js-animation-link" data-target=".guest-address" data-link-group="checkout-group" data-animation-in="slideInUp">Cancel</button>
                        <button type="button" name="submit" id="saveAdress" class="btn btn-primary-dark-w px-xl-10">Save
                        </button>
                    </form>
                    
                <!--- User is login address form ------------------>
                    <form class="border-bottom border-color-1 pb-5" id="addNewAddress" novalidate="novalidate" style="display: none" data-target-group="checkout-group">
                        <input type="hidden" name="csrfmiddlewaretoken" value="EGpDfRDfVwXzNidrodg7AOESw921EpHh2y1alB5fSQfuOSj4Tazwed8CnpJTcWRs">
                        <div class="form-row">
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="name">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" aria-label="Name" required="" data-msg="Please enter a valid your name" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>

                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="AddressMobile">Mobile
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="tel" maxlength="10" minlength="10" class="form-control" name="mmobile" id="AddressMobile" placeholder="Enter your mobile number" aria-label="Mobile" required="" data-msg="Please enter a valid your mobile number" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <div class="js-form-message col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="AddressName">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" name="email" id="AddressName" placeholder="Enter your email" aria-label="Email" required="" data-msg="Please enter a valid your email" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <div class="js-form-message col-md-6 mb-2 mb-lg-5">
                                <label class="form-label" for="Address1">Flat/House/Floor/Building
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="address" id="Address1" placeholder="" aria-label="Name" required="" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <div class="js-form-message col-md-6 mb-2 mb-lg-5">
                                <label class="form-label" for="Address2">Area/Street/Sector
                                </label>
                                <input type="text" class="form-control" name="address2" id="Address2" placeholder="" aria-label="Name" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="Landmark">Landmark
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="landmark" id="Landmark" placeholder="" aria-label="Landmark" required="" data-msg="Please enter a valid Landmark" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>

                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="Pincode">Pincode
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="pincode" id="Pincode" placeholder="" aria-label="Pincode" required="" data-msg="Please enter a valid your area Pin-code" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="State">State
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" name="state" id="state" placeholder="" aria-label="State" required="" data-msg="Please enter a valid state name" data-error-class="u-has-error" data-success-class="u-has-success">
                                    <option value="">Select State</option>
                                    
                                        <option value="1">WEST BENGAL</option>
                                    
                                        <option value="2">ODISHA</option>
                                    
                                        <option value="3">RAJASTHAN</option>
                                    
                                        <option value="4">UTTAR PRADESH</option>
                                    
                                        <option value="5">ANDHRA PRADESH</option>
                                    
                                        <option value="7">HARYANA</option>
                                    
                                </select>
                            </div>
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="City">City
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" name="city" id="city" placeholder="" aria-label="City" required="" data-msg="Please enter a valid City name" data-error-class="u-has-error" data-success-class="u-has-success">

                                </select>
                            </div>
                            <div class="js-form-message col-md-8 mb-2 mb-lg-5 align-self-end pb-2">
                                
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input required="" type="radio" id="1" name="customRadioInline1_profile" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="1">
                                            Home
                                        </label>
                                    </div>
                                
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input required="" type="radio" id="2" name="customRadioInline1_profile" class="custom-control-input" value="2">
                                        <label class="custom-control-label" for="2">
                                            Office
                                        </label>
                                    </div>
                                
                            </div>
                            <div class="col-md-12 mb-3">
                                <div id="addshopCartHeadingFour" class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="addbillingdiffrentAddress" name="billingdiffrentAddress" checked="">
                                    <label class="custom-control-label form-label" for="addbillingdiffrentAddress">
                                        Billing address same as shipping address?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="addbillingAddress" class="mt-3 mb-3" style="display: none">
                            <div class="form-row">
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="BillingUserName">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="billing_address_name" id="addBillingUserName" placeholder="Enter your name" aria-label="Name" data-msg="Please enter a valid your name" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>

                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="addBillingAddressMobile">Mobile
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control" name="billing_address_mobile_no" id="addBillingAddressMobile" maxlength="10" minlength="10" placeholder="Enter your mobile number" aria-label="Mobile" data-msg="Please enter a valid your mobile number" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="addBillingAddressName">Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="billing_address_email" id="addBillingAddressName" placeholder="Enter your email" aria-label="Email" data-msg="Please enter a valid your email" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-md-6 mb-2 mb-lg-5">
                                    <label class="form-label" for="addBillingAddress1">Flat/House/Floor/Building
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="billing_address_address_line1" id="addBillingAddress1" placeholder="" aria-label="Name" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-md-6 mb-2 mb-lg-5">
                                    <label class="form-label" for="addBillingAddress2">Area/Street/Sector
                                    </label>
                                    <input type="text" class="form-control" name="billing_address_address_line2" id="addBillingAddress2" placeholder="" aria-label="Name" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="addBillingLandmark">Landmark
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="billing_address_landmark" id="addBillingLandmark" placeholder="" aria-label="Landmark" data-msg="Please enter a valid Landmark" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>

                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="addBillingPincode">Pincode
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="billing_address_pincode" id="addBillingPincode" placeholder="" aria-label="Pincode" data-msg="Please enter a valid your area Pin-code" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="addBillingState">State
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="billing_address_state_id" id="addBillingState" placeholder="" aria-label="State" data-msg="Please enter a valid state name" data-error-class="u-has-error" data-success-class="u-has-success">
                                        <option value="">Select State</option>
                                        
                                            <option value="1">WEST BENGAL</option>
                                        
                                            <option value="2">ODISHA</option>
                                        
                                            <option value="3">RAJASTHAN</option>
                                        
                                            <option value="4">UTTAR PRADESH</option>
                                        
                                            <option value="5">ANDHRA PRADESH</option>
                                        
                                            <option value="7">HARYANA</option>
                                        
                                    </select>
                                </div>
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="addBillingCity">City
                                        <span class="text-danger">*</span>
                                    </label>

                                    <select class="form-control" name="billing_address_city_id" id="addBillingCity" placeholder="" aria-label="City" data-msg="Please enter a valid City name" data-error-class="u-has-error" data-success-class="u-has-success">
                                    </select>
                                </div>
                                <div class="js-form-message col-md-8 mb-2 mb-lg-5 align-self-end pb-2">
                                    
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="11" name="customRadioInline2" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="11">Home</label>
                                        </div>
                                    
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="21" name="customRadioInline2" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="21">Office</label>
                                        </div>
                                    

                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-light px-xl-10 mr-3 js-animation-link" data-target=".manage-address-list" data-link-group="checkout-group" data-animation-in="slideInUp">
                            Cancel
                        </button>

                        <button type="submit" name="submit" class="btn btn-primary-dark-w px-xl-10">Save
                        </button>
                    </form>
                    
                    
                    <div class="manage-address manage-address-list animated slideInUp" data-target-group="checkout-group" id="addressList" style="opacity: 1;">
                        <div class="row">
                            <?php
                            
                            if(!empty($user_id)){
                                $address_sql ="select * from `tbl_addresses` WHERE userId=$user_id";
                            }else{
                                $address_sql ="select * from `tbl_addresses` WHERE guest_ip='$guest_ip'";
                            }
                                               $address_result = mysqli_query($con,$address_sql);
                        
                                                    
                                                    ?>
                                                    <?php while ($row = mysqli_fetch_array($address_result, MYSQLI_ASSOC)) {?>
                                    
                                        <div class="col-md-4 mb-3">
                                            <div class="card address-card">
                                                <div class="card-body">
                                                    <div class="row justify-content-between">
                                                        <div class="col-auto">
                                                            <p class="text-uppercase text-danger">
                                                                Home
                                                            </p>
                                                        </div>

                                                        <div class="col-auto">
                                                            <a class="edit-billing-shipping-address text-blue text-uppercase js-animation-link" type="button" data-target="#edit-billing-shipping-address" data-link-group="checkout-group" data-animation-in="slideInUp" data-id="<?=$row['id']?>" href="#">
                                                                Edit
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-6">
                                                            <h5 class="text-blue font-weight-bold text-uppercase">
                                                                Shipping
                                                                Address</h5>
                                                            <h6 class="mb-2 text-black">
                                                                <?=$row['contactPerson']?>
                                                            </h6>
                                                            <div class="text-dark">
                                                                <p class="mb-2"><?=$row['Address1']?>
                                                                    <?=$row['landmark']?></p>
                                                                <p><?=$row['city']?>,
                                                                    <?=$row['state']?></p>
                                                                <p><?=$row['contactNumber']?></p>
                                                                
                                                            </div>
                                                            <hr class="d-md-block d-none">
                                                        </div>
                                                        <div class="col-md-12 col-6">
                                                            <h5 class="text-blue font-weight-bold text-uppercase">
                                                                Billing Address</h5>
                                                            <h6 class="mb-2 text-black"><?=$row['contactPerson']?></h6>
                                                            <div class="text-dark mb-3">
                                                                <p class="mb-2"><?=$row['Address1']?>
                                                                    <?=$row['landmark']?></p>
                                                                <p><?=$row['city']?>,
                                                                    <?=$row['state']?></p>
                                                                <p><?=$row['contactPerson']?></p>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                
                                                 <a href="order_summary.php?id=<?php echo $row['id']?><?=isset($_GET['coupon_value'])? '&coupon_value='.$_GET['coupon_value'] : '' ?>"><button type="button" class="btn  btn-sm btn-block btn-outline-black btn-wide transition-3d-hover borders-radius-10 js-animation-link select-billing-shipping-address" data-target=".orderSummary-selected-address" data-link-group="checkout-group" data-animation-in="slideInUp">
                                                        Deliver Here
                                                    </button></a>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    <?php }?>
                                
                            
                        </div>
                    </div>
                   
                    <form class="border-bottom border-color-1 pb-5 updateaddress" id="edit-billing-shipping-address" style="display: none" data-target-group="checkout-group" novalidate="novalidate">
                        <input type="hidden" name="csrfmiddlewaretoken" value="EGpDfRDfVwXzNidrodg7AOESw921EpHh2y1alB5fSQfuOSj4Tazwed8CnpJTcWRs">
                        <input type="hidden" name="edit_address_id" id="edit_address_id">
                        <div class="form-row edit-address-section ">
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="AddressName">Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="name" id="edit_AddressName" placeholder="Enter your name" aria-label="Name" required="" data-msg="Please enter a valid your name" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>

                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="AddressMobile">Mobile
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="tel" class="form-control" maxlength="10" minlength="10" name="mmobile" id="edit_AddressMobile" placeholder="Enter your mobile number" aria-label="Mobile" required="" data-msg="Please enter a valid your mobile number" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <!--<div class="js-form-message col-md-4 mb-2 mb-lg-5">-->
                            <!--    <label class="form-label" for="AddressName">Email-->
                            <!--        <span class="text-danger">*</span>-->
                            <!--    </label>-->
                            <!--    <input type="email" class="form-control" name="email" id="AddressName" placeholder="Enter your email" aria-label="Email" required="" data-msg="Please enter a valid your email" data-error-class="u-has-error" data-success-class="u-has-success" value="">-->
                            <!--</div>-->
                            <div class="js-form-message col-md-6 mb-2 mb-lg-5">
                                <label class="form-label" for="Address1">Flat/House/Floor/Building
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="address" id="edit_Address1" placeholder="" aria-label="Name" required="" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <!--<div class="js-form-message col-md-6 mb-2 mb-lg-5">-->
                            <!--    <label class="form-label" for="Address2">Area/Street/Sector-->
                            <!--    </label>-->
                            <!--    <input type="text" class="form-control" name="address2" id="edit_Address2" placeholder="" aria-label="Name" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">-->
                            <!--</div>-->
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="Landmark">Landmark
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="landmark" id="edit_Landmark" placeholder="" aria-label="Landmark" required="" data-msg="Please enter a valid Landmark" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>

                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="Pincode">Pincode
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="Pincode" id="edit_Pincode" placeholder="" aria-label="Pincode" required="" data-msg="Please enter a valid your area Pin-code" data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" >GST Number
                                    
                                </label>
                                <input type="text" class="form-control" name="edit_gst_number" id="edit_gst_number" placeholder="" aria-label="gst_number"  data-error-class="u-has-error" data-success-class="u-has-success">
                                
                            </div>
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="State">State
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" name="state" id="edit_state" placeholder="" aria-label="State" required="" data-msg="Please enter a valid state name" data-error-class="u-has-error" data-success-class="u-has-success">
                                    <option value="">Select State</option>
                                    
                                        <option value="AP">Andhra Pradesh</option>
                        	<option value="AR">Arunachal Pradesh</option>
                        	<option value="AS">Assam</option>
                        	<option value="BR">Bihar</option>
                        	<option value="CT">Chhattisgarh</option>
                        	<option value="GA">Gujarat</option>
                        	<option value="HR">Haryana</option>
                        	<option value="HP">Himachal Pradesh</option>
                        	<option value="JK">Jammu and Kashmir</option>
                        	<option value="GA">Goa</option>
                        	<option value="JH">Jharkhand</option>
                        	<option value="KA">Karnataka</option>
                        	<option value="KL">Kerala</option>
                        	<option value="MP">Madhya Pradesh</option>
                        	<option value="MH">Maharashtra</option>
                            <option value="MN">Manipur</option>
                            <option value="ML">Meghalaya</option>
                        	<option value="MZ">Mizoram</option>
                        	<option value="NL">Nagaland</option>
                        	<option value="OR">Odisha</option>
                        	<option value="PB">Punjab</option>
                        	<option value="RJ">Rajasthan</option>
                        	<option value="SK">Sikkim</option>
                        	<option value="TN">Tamil Nadu</option>
                        	<option value="TG">Telangana</option>
                        	<option value="TR">Tripura</option>
                        	<option value="UT">Uttarakhand</option>
                        	<option value="UP">Uttar Pradesh</option>
                        	<option value="WB">West Bengal</option>
                        	<option value="AN">Andaman and Nicobar Islands</option>
                        	<option value="CH">Chandigarh</option>
                        	<option value="DN">Dadra and Nagar Haveli</option>
                        	<option value="DD">Daman and Diu</option>
                        	<option value="DL">Delhi</option>
                        	<option value="LD">Lakshadweep</option>
                        	<option value="PY">Puducherry</option>
                            
                                </select>
                            </div>
                            <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="City">City
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="Pincode" id="edit_city" placeholder="" aria-label="edit_city" required=""  >
                            </div>
                            <div class="js-form-message col-md-8 mb-2 mb-lg-5 align-self-end pb-2">
                                
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input required="" type="radio" id="edit_address_type" name="edit_address_type" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="edit_address_type">Home
                                        </label>
                                    </div>
                                
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input required="" type="radio" id="edit_address_type2" name="edit_address_type" class="custom-control-input" value="2">
                                        <label class="custom-control-label" for="edit_address_type2">Office
                                        </label>
                                    </div>
                                
                            </div>
                            <!--<div class="col-md-12 mb-3">-->
                            <!--    <div id="shopCartHeadingFour" class="custom-control custom-checkbox d-flex align-items-center">-->
                            <!--        <input type="checkbox" class="custom-control-input" id="billingdiffrentAddress" name="editbillingdiffrentAddress">-->
                            <!--        <label class="custom-control-label form-label" for="billingdiffrentAddress">-->
                            <!--            Billing address same as shipping address?-->
                            <!--        </label>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div id="billingAddress" class="mt-3 mb-3" style="display: none">
                            <div class="form-row">
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="BillingUserName">Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="billing_address_name" id="BillingUserName" placeholder="Enter your name" aria-label="Name" required="" data-msg="Please enter a valid your name" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>

                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="BillingAddressMobile">Mobile
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control" name="billing_address_mobile_no" id="BillingAddressMobile" maxlength="10" minlength="10" placeholder="Enter your mobile number" aria-label="Mobile" required="" data-msg="Please enter a valid your mobile number" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="BillingAddressName">Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control" name="billing_address_email" id="BillingAddressName" placeholder="Enter your email" aria-label="Email" required="" data-msg="Please enter a valid your email" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-md-6 mb-2 mb-lg-5">
                                    <label class="form-label" for="BillingAddress1">
                                        Flat/House/Floor/Building
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="billing_address_address_line1" id="BillingAddress1" placeholder="" aria-label="Name" required="" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-md-6 mb-2 mb-lg-5">
                                    <label class="form-label" for="BillingAddress2">Area/Street/Sector
                                    </label>
                                    <input type="text" class="form-control" name="billing_address_address_line2" id="BillingAddress2" placeholder="" aria-label="Name" data-msg="Please enter Flat/House/Floor/Building" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="BillingLandmark">Landmark
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="billing_address_landmark" id="BillingLandmark" placeholder="" aria-label="Landmark" required="" data-msg="Please enter a valid Landmark" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>

                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="BillingPincode">Pincode
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="billing_address_pincode" id="BillingPincode" placeholder="" aria-label="Pincode" required="" data-msg="Please enter a valid your area Pin-code" data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="billing_address_state_id">State
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="billing_address_state_id" id="billing_address_state_id" placeholder="" aria-label="State" data-msg="Please enter a valid state name" data-error-class="u-has-error" data-success-class="u-has-success">
                                        <option value="">Select State</option>
                                        
                                            <option value="1">WEST BENGAL</option>
                                        
                                            <option value="2">ODISHA</option>
                                        
                                            <option value="3">RAJASTHAN</option>
                                        
                                            <option value="4">UTTAR PRADESH</option>
                                        
                                            <option value="5">ANDHRA PRADESH</option>
                                        
                                            <option value="7">HARYANA</option>
                                        
                                    </select>
                                </div>
                                <div class="js-form-message col-6 col-md-4 mb-2 mb-lg-5">
                                    <label class="form-label" for="billing_address_city_id">City
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control" name="billing_address_city_id" id="billing_address_city_id" placeholder="" aria-label="City" data-msg="Please enter a valid City name" data-error-class="u-has-error" data-success-class="u-has-success">
                                        
                                            <option value="232">BANKURA</option>
                                        
                                            <option value="233">BARDHAMAN</option>
                                        
                                            <option value="234">BIRBHUM</option>
                                        
                                            <option value="235">COOCH BEHAR</option>
                                        
                                            <option value="236">DARJILING</option>
                                        
                                            <option value="237">EAST MIDNAPORE</option>
                                        
                                            <option value="238">HOOGHLY</option>
                                        
                                            <option value="239">HOWRAH</option>
                                        
                                            <option value="240">JALPAIGURI</option>
                                        
                                            <option value="241">KOLKATA</option>
                                        
                                            <option value="242">MALDA</option>
                                        
                                            <option value="243">MEDINIPUR</option>
                                        
                                            <option value="244">JAIPUR</option>
                                        
                                            <option value="245">JODHPUR</option>
                                        
                                            <option value="246">SIKAR</option>
                                        
                                            <option value="247">KOTA</option>
                                        
                                            <option value="248">VARANASI</option>
                                        
                                            <option value="249">LUCKNOW</option>
                                        
                                            <option value="250">VIZAG</option>
                                        
                                            <option value="251">VIJAYWADA</option>
                                        
                                            <option value="252">ANGUL</option>
                                        
                                            <option value="253">BALANGIR</option>
                                        
                                            <option value="254">BALESWAR</option>
                                        
                                            <option value="255">BARGARH</option>
                                        
                                            <option value="256">BHADRAK</option>
                                        
                                            <option value="257">KENDUJHAR</option>
                                        
                                            <option value="258">KHORDA</option>
                                        
                                            <option value="259">KORAPUT</option>
                                        
                                            <option value="260">MALKANGIRI</option>
                                        
                                            <option value="261">MAYURBHANJ</option>
                                        
                                            <option value="262">NABARANGAPUR</option>
                                        
                                            <option value="263">NAYAGARH</option>
                                        
                                            <option value="264">NUAPADA</option>
                                        
                                            <option value="265">PURI</option>
                                        
                                            <option value="266">RAYAGADA</option>
                                        
                                            <option value="267">SAMBALPUR</option>
                                        
                                            <option value="268">SONAPUR</option>
                                        
                                            <option value="269">SUNDERGARH</option>
                                        
                                            <option value="270">ASANSOL</option>
                                        
                                            <option value="271">NORTH 24 PARGANA</option>
                                        
                                            <option value="272">SURI</option>
                                        
                                            <option value="273">BALASORE</option>
                                        
                                            <option value="274">BARASAT</option>
                                        
                                            <option value="275">HALDIA</option>
                                        
                                            <option value="276">BURDWAN</option>
                                        
                                            <option value="277">NADIA</option>
                                        
                                            <option value="278">CUTTACK</option>
                                        
                                            <option value="279">ROURKELA</option>
                                        
                                            <option value="280">JAJPUR</option>
                                        
                                            <option value="281">BHUBANESWAR</option>
                                        
                                            <option value="282">BRAHMAPUR</option>
                                        
                                            <option value="283">SOUTH 24 PARGANA</option>
                                        
                                            <option value="284">DELHI</option>
                                        
                                            <option value="288">GURGAON</option>
                                        
                                    </select>
                                </div>
                                <div class="js-form-message col-md-8 mb-2 mb-lg-5 align-self-end pb-2">
                                    
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="1billing-add-type" name="billing_address_type_id" class="custom-control-input" value="1">
                                            <label class="custom-control-label" for="1billing-add-type">
                                                Home
                                            </label>
                                        </div>
                                    
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="2billing-add-type" name="billing_address_type_id" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="2billing-add-type">
                                                Office
                                            </label>
                                        </div>
                                    

                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn cancel_btn btn-light px-xl-10 mr-3 js-animation-link"  data-target=".manage-address-list" data-link-group="checkout-group" data-animation-in="slideInUp">
                            Cancel
                        </button>
                        <button type="button" name="submit" class="btn update_add_btn btn-primary-dark-w px-xl-10">
                            Save
                        </button>
                    </form>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3">
            <form method="post" id="checkout-form">
                <!--<div class="mb-5">-->
                <!--    <div class="border-bottom border-color-1 mb-3">-->
                <!--        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 font-weight-bold">-->
                <!--            Coupon-->
                <!--            Codes</h3>-->
                <!--    </div>-->

                <!--    <label class="sr-only" for="subscribeSrEmailExample1">Coupon code</label>-->
                <!--    <div class="input-group">-->
                <!--        <input type="text" class="form-control" name="coupon_code" id="Coupon" placeholder="Enter Coupon Code" aria-label="Coupon code" aria-describedby="applyCoupon">-->
                <!--        <div class="input-group-append">-->
                <!--            <button class="btn btn-block btn-dark px-4" type="button" id="applyCoupon">-->
                <!--                <i class="fas fa-tags d-md-none"></i>-->
                <!--                <span class="d-none d-md-inline">Apply </span>-->
                <!--            </button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div id="appliedMessage">-->
                        
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="mb-5">-->
                <!--    <div class="border-bottom border-color-1 mb-3">-->
                <!--        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 font-weight-bold">-->
                <!--            Gift-->
                <!--            Card</h3>-->
                <!--    </div>-->

                <!--    <label class="sr-only" for="subscribeSrEmailExample1">Gift Card</label>-->
                <!--    <div class="input-group">-->
                <!--        <input type="text" class="form-control" name="gift_code" id="gift_code" placeholder="Enter Gift Card Number" aria-label="Gift Card Number" aria-describedby="subscribeButtonExample2">-->
                <!--        <div class="input-group-append">-->
                <!--            <button class="btn btn-block btn-dark px-4 " type="button" id="apply_gift_code">-->
                <!--                <i class="fas fa-tags d-md-none"></i>-->
                <!--                <span class="d-none d-md-inline">Apply </span>-->
                <!--            </button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div id="appliedGiftMessage"></div>-->
                <!--</div>-->
                <div class="mb-5" style="display: none;">
                    <div class="border-bottom border-color-1 mb-3">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 font-weight-bold">
                            GST details (If Applicable)
                        </h3>
                    </div>

                    <input type="text" class="form-control mb-3" name="company_name" id="companyName" placeholder="Enter Company Name" aria-label="Company Name" aria-describedby="companyName">
                    <input type="text" class="form-control mb-3" name="company_gst" id="gstNumner" placeholder="Enter GST No" aria-label="GST No" maxlength="15" minlength="15" aria-describedby="gstNumber">
                    <!--<button type="submit" name="submit" class="btn btn-outline-dark btn-block">
                        Apply Now
                    </button> -->

                </div>
                <input type="hidden" name="selcted_address" id="selcted_address" value="">
                <input type="hidden" name="payment_type" id="payment_type" value="">
                <input type="hidden" name="gift_card_enc" id="gift_card_enc" value="">
                <div id="order-summary">

                </div>
            </form>
            <div class="">
                    <div class="order-summary-section">
                        <div class="border-bottom border-color-1 mb-0">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 font-weight-bold">
                                Order Summary
                            </h3>
                        </div>
                        <?
                        $total=0;
                        $user_id=$_SESSION['user_id'];

                        
                        foreach($_SESSION['cart'] as $item) {
                                $subtotal = $item['product_price'] * $item['product_qty'];
                                $total += $subtotal;
                        
                        }
                        
                        if(isset($_GET['coupon_value']))
                        {
                            $users_sql="SELECT user_coins FROM tbl_user WHERE user_pk_id =$user_id";
                            $user_result=mysqli_query($con,$users_sql);
                            $user_coins=mysqli_fetch_assoc($user_result);
                            
                            $discounted_amt=$total-sprintf("%.2f", $user_coins['user_coins']);
                        }else
                        {
                            $discounted_amt=$total;
                        }
?>
                       <div class="order_inner_section">
                           <div class="order_child">
                                <p class="order-left">Sub Total (<?=count($_SESSION['cart'])?> Item)</p>
                                <p class="order-right">₹<?=$total?></p>
                           </div>
                           <div class="order_child">
                                <p class="order-left">Discount</p>
                                <p class="order-right">₹<?=sprintf("%.2f", $user_coins['user_coins'])?></p>
                           </div>
                           <div class="order_child">
                                <p class="order-left">Delivery Charge</p>
                                <p class="order-right">Free</p>
                           </div>
                           <!--<div class="order_child">-->
                           <!--     <p class="order-left">Gift Card</p>-->
                           <!--     <p class="order-right">₹0</p>-->
                           <!--</div>-->
                           <!--<div class="order_child">-->
                           <!--     <p class="order-left">Coupon discount</p>-->
                           <!--     <p class="order-right"></p>-->
                           <!--</div>-->
                           <div class="order_child order-ch">
                                <p class="order-left">TOTAL:</p>
                                <p class="order-right">₹<?=$discounted_amt?></p>
                           </div>
                           <div class="price_text">
                               Price Are Inclusive of Taxes
                           </div>
                           
                           
                       </div>
                    </div>
                </div>
        </div>
    </div>
 <script>
    function is_loginpoup(){
        
            $('#sidebarNavToggler').trigger('click')
            $('#guest-btn').click(function () {
                $('#close-sidebar-btn').trigger('click');
                $('#addguestNewAddress').show()
            })
        
    }
    
    
    
$('#saveAdress').on('click',function(){
var full_name=$('#guest_name').val();
var contact=$('#guest_AddressMobile').val();
var user_email=$('#guest_AddressName').val();
var guest_state=$('#guest_state').val();
var guest_Address1=$('#guest_Address1').val();
var guest_Address2=$('#guest_Address2').val();
var guest_Landmark=$('#guest_Landmark').val();
var guest_Pincode=$('#guest_Pincode').val();
var gst_number=$('#gst_number').val();
var guest_city=$('#guest_city').val();
var guestchecked=$('input[name="guest_addressType"]:checked').val();



// var checked_value=""

// if (guest_home.checked) {
//     checked_value = guest_home.value;
//   } else if (guest_office.checked) {
//     checked_value = guest_office.value;
//   }

// var selected = $("input[type='radio'][name='guest_addressType']:checked");
// alert(selected);

if((full_name=="")){
           $('#guest_name_error').html('Please Enter Name');
           }else if(contact==""){
               $('#guest_AddressMobile_error').html('Please Enter Phone Number');
           }else if(user_email==""){
               $('#guest_AddressName_error').html('Please Enter Email');
           }else if(guest_state==""){
               $('#guest_state_error').html('Please Select Your State');
           }else if(guest_Address1==""){
               $('#guest_Address1_error').html('Please Enter Your Address');
           }else if(guest_Landmark==""){
               $('#guest_Landmark_error').html('Please Enter Landmark');
           }else if(guest_Pincode==""){
               $('#guest_Pincode_error').html('Please Enter Pincode');
           }else if(guest_city==""){
               $('#guest_city_error').html('Please Enter City');
           }else{

$.ajax({
                        type: "POST",
                        url: '<?=$asset_url?>web_action/save_address.php',
                        data: {
                            full_name:full_name,
                            contact:contact,
                            user_email:user_email,
                            guest_state:guest_state,
                            guest_Address1:guest_Address1,
                            guest_Address2:guest_Address2,
                            guest_Landmark:guest_Landmark,
                            guest_Pincode:guest_Pincode,
                            guest_city:guest_city,
                            gst_number:gst_number,
                            guest_ip:'<?=$guest_ip?>',
                            guest_home:guestchecked,
                            user_id:'<?=$user_id?>',
                            add_adress:'add_adress',
                        },
                        success: function (response) {
                            
                            $("#addguestNewAddress").css("display","none")
                            $(".manage-address-list").css("display","block")
                            $("#edit-billing-shipping-address").css("display","none")
                           location.reload(); 
                        }
                       
                    });
           }        
    });
    
    
    
$('.update_add_btn').on('click',function(){
var id=$('#edit_address_id').val();
var full_name=$('#edit_AddressName').val();
var contact=$('#edit_AddressMobile').val();
var gst_number=$('#edit_gst_number').val();
var guest_state=$('#edit_state').val();
var guest_Address1=$('#edit_Address1').val();
// var guest_Address2=$('#guest_Address2').val();
var guest_Landmark=$('#edit_Landmark').val();
var guest_Pincode=$('#edit_Pincode').val();

var guest_city=$('#edit_city').val();



var guestchecked=$('input[name="edit_address_type"]:checked').val();

// var checked_value=""

// if (guest_home.checked) {
//     checked_value = guest_home.value;
//   } else if (guest_office.checked) {
//     checked_value = guest_office.value;
//   }

// var selected = $("input[type='radio'][name='guest_addressType']:checked");
// alert(selected);

$.ajax({
                        type: "POST",
                        url: '<?=$asset_url?>web_action/save_address.php',
                        data: {
                            full_name:full_name,
                            contact:contact,
                            guest_state:guest_state,
                            guest_Address1:guest_Address1,
                            guest_Landmark:guest_Landmark,
                            guest_Pincode:guest_Pincode,
                            gst_number:gst_number,
                            guest_city:guest_city,
                            guest_home:guestchecked,
                            address_id:id
                        },
                        success: function (response) {
                            
                            $("#addguestNewAddress").css("display","none")
                            $(".manage-address-list").css("display","block")
                            $("#edit-billing-shipping-address").css("display","none")
                          location.reload();
                        }
                       
                    });
        
    });
    
    
</script>

<script>
    
$("#guest_name").focusout(function(){
var code=$('#guest_name').val();
if(code==""){
$('#guest_name_error').html('Please  Enter Name');
}else{
    $('#guest_name_error').html('');
}

});
$("#guest_AddressMobile").focusout(function(){
var code=$('#guest_AddressMobile').val();
if(code==""){
$('#guest_AddressMobile_error').html('Please  Enter Phone Number');
}else{
    $('#guest_AddressMobile_error').html('');
}

});
$("#guest_AddressName").focusout(function(){
var code=$('#guest_AddressName').val();
if(code==""){
$('#guest_AddressName_error').html('Please  Enter Email');
}else{
    $('#guest_AddressName_error').html('');
}

});
$("#guest_state").focusout(function(){
var code=$('#guest_state').val();
if(code==""){
$('#guest_state_error').html('Please  Select Your State');
}else{
    $('#guest_state_error').html('');
}

});
$("#guest_Address1").focusout(function(){
var code=$('#guest_Address1').val();
if(code==""){
$('#guest_Address1_error').html('Please  Enter Address');
}else{
    $('#guest_Address1_error').html('');
}

});

$("#guest_Landmark").focusout(function(){
var code=$('#guest_Landmark').val();
if(code==""){
$('#guest_Landmark_error').html('Please  Enter Landmark');
}else{
    $('#guest_Landmark_error').html('');
}

});

$("#guest_Pincode").focusout(function(){
var code=$('#guest_Pincode').val();
if(code==""){
$('#guest_Pincode_error').html('Please  Enter Pincode');
}else{
    $('#guest_Pincode_error').html('');
}

});

$("#guest_city").focusout(function(){
var code=$('#guest_city').val();
if(code==""){
$('#guest_city_error').html('Please  Enter City');
}else{
    $('#guest_city_error').html('');
}

});
    
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        
    $(".edit-billing-shipping-address").on("click",function(){
     $("#addguestNewAddress").css("display","none")
     $(".manage-address-list").css("display","none")
    $("#edit-billing-shipping-address").css("display","block")
    var id=$(this).data('id');
    $.ajax({
                        type: "GET",
                        url: '<?=$asset_url?>web_action/save_address.php',
                        data: {
                            edit_user_add:'edit_user_add',
                            id:id
                        },
                        dataType:'json',
                        success: function (response) {
                            
                            console.log(response.contactPerson)
                            $('#edit_AddressName').val(response.contactPerson);
                            $('#edit_AddressMobile').val(response.contactNumber);
                            $('#edit_Address1').val(response.addressId);
                            // $('#edit_Address2').val(response.contactPerson);
                            $('#edit_Landmark').val(response.landmark);
                            $('#edit_Pincode').val(response.pincode);
                            $('#edit_gst_number').val(response.gst_no);
                            $('#edit_state').val(response.state);
                            $('#edit_city').val(response.city);
                            $('#edit_address_id').val(response.id);
                            console.log(response.addressType);
                            if (response.addressType =="1") {
                            $('#edit_address_type').attr('checked', true );
                            } else if (response.addressType ==="2") {
                            $('#edit_address_type2').attr('checked', true )
                            }
                            // $('#edit_address_type').val(response.addressType);
                            // $('#edit_address_type2').val(response.addressType);
                            
                        }
                       
                    });
    
    
    
    

});
        
    $(".cancel_btn").on("click",function(){
     $("#addguestNewAddress").css("display","none")
     $(".manage-address-list").css("display","block")
    $("#edit-billing-shipping-address").css("display","none")
    
    
    

});

  $("#addnewAddressBtn").on("click",function(){
     $("#addguestNewAddress").css("display","block")
     $(".manage-address-list").css("display","none")
    $("#edit-billing-shipping-address").css("display","none")
    
    
    

});

   
   
// order insert
$(".order_btn").on("click",function(){
 var address_id=$(this).data('id');
//  alert(address_id);

 $.ajax({
                        type: "POST",
                        url: '<?=$asset_url?>web_action/order.php',
                        data: {
                            order_insert:'order_insert',
                            address_id:address_id
                        },
                        dataType:'json',
                        success: function (response) {
                            
                            Swal.fire({
  title: "Good job", text: "Your order Placed Successfully!", type: 
"success"
}).then((result) => {
  // Reload the Page
  location.reload();
});
                            
                        }
                       
                    });


});

</script>

</div>
    </main>

<!-- ========== Body ========== -->

<?php include('footer.php')?>