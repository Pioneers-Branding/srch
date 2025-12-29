<?php include 'header.php';

// $user = towquery("SELECT * FROM `tbl_user` WHERE user_pk_id='$user_user_pk_id' ");
//     $userfetch = towfetch($user); 
//     /*print_r($userfetch);
//     exit;*/
//         extract($userfetch);
        
        
?>
	<div class="container">
	    <h2>Shipping Address</h2>
	    <div class="card">
	        <div class="card-body" style="margin:15px;border:1px solid #ddd;padding:15px;">
	            <div class="manage-address manage-address-list animated slideInUp" data-target-group="checkout-group" id="addressList" style="opacity: 1;">
                        <div class="row">
                            <?php
                                $address_sql ="select * from `tbl_addresses` WHERE userId=$user_id";
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
                                
                                                 <a href="order_summary.php?id=<?php echo $row['id']?>"><button type="button" class="btn  btn-sm btn-block btn-outline-black btn-wide transition-3d-hover borders-radius-10 js-animation-link select-billing-shipping-address" data-target=".orderSummary-selected-address" data-link-group="checkout-group" data-animation-in="slideInUp">
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
                            <div class="js-form-message col-md-4 mb-2 mb-lg-5">
                                <label class="form-label" for="guest_AddressName">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" name="guest_email" id="guest_AddressName" placeholder="Enter your email" value="<?=$users['user_email']?>" aria-label="Email" required="" data-msg="Please enter a valid your email" data-error-class="u-has-error" data-success-class="u-has-success">
                                <span id="guest_AddressName_error" class="validation"></span>
                            </div>
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
                        
                        <button type="button" class="btn cancel_btn btn-light px-xl-10 mr-3 js-animation-link" data-target=".guest-address" data-link-group="checkout-group" data-animation-in="slideInUp">Cancel</button>
                        <button type="button" name="submit" id="saveAdress" class="btn btn-primary-dark-w px-xl-10">Save
                        </button>
                    </form>
                    
                    
	<?php include 'footer.php';?>
    </body>
</html>