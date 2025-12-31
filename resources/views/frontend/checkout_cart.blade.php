@extends('frontend.layouts.app')
@section('title') {{ 'Product list' }} @endsection
@section('content')
<!-- site-main start -->
<style>
   .site-main{
   margin:6% 0;
   }
   #payment div.checkout-form {
   padding: 0;
   }
   /* Checkout Form */
   .checkout h3 {
   margin-bottom: 25px;
   font-size: 24px;
   font-weight: 600;
   color: black; /* Secondary */
   border-bottom: 2px solid #fcd739; /* Primary */
   padding-bottom: 10px;
   }
   .checkout-form {
   margin-bottom: 20px;
   }
   .checkout-form label {
   display: block;
   margin-bottom: 6px;
   font-weight: 500;
   color: black;
   }
   .checkout-form .required {
   color: red;
   }
   .input-text {
   width: 100%;
   padding: 10px 15px;
   border: 1px solid #ccc;
   border-radius: 4px;
   box-sizing: border-box;
   transition: border-color 0.3s ease;
   background-color: #fff;
   color: #000;
   }
   .input-text:focus {
   border-color: #fcd739; /* Primary */
   outline: none;
   }
   /* Row Layout */
   .checkout.row {
   display: flex;
   flex-wrap: wrap;
   gap: 30px;
   }
   .col-lg-6, .col-lg-12 {
   flex: 1 1 100%;
   }
   @media(min-width: 992px) {
   .col-lg-6 {
   flex: 0 0 48%;
   }
   .col-lg-12 {
   flex: 0 0 100%;
   }
   }
   /* Payment Button */
   .booking_submit {
   background-color: #fcd739; /* Primary */
   color: black; /* Secondary */
   border: none;
   padding: 12px 30px;
   font-size: 16px;
   font-weight: 600;
   border-radius: 5px;
   cursor: pointer;
   transition: background-color 0.3s ease, color 0.3s ease;
   }
   .booking_submit:hover {
   background-color: black; /* Secondary */
   color: #fcd739; /* Primary */
   }
   .payment_methods {
   list-style-type: none;
   padding: 0;
   }
   .payment_methods li {
   margin-bottom: 20px;
   }
   #payment {
   background-color: #fff;
   padding: 25px;
   border: 1px solid #fcd739; /* Primary */
   border-radius: 5px;
   }
   /* Review Section */
   .checkout-review-order {
   background-color: #fffde6;
   padding: 20px;
   border-radius: 6px;
   border: 1px solid #fcd739;
   }
   /* Final Place Order Button */
   .place-order {
   margin-top: 30px;
   text-align: right;
   }
   .checkout-form{
   margin:0;
   }
   /* Optional: Mobile tweaks */
   @media (max-width: 768px) {
   .checkout h3 {
   font-size: 20px;
   }
   .booking_submit {
   width: 100%;
   }
   }
</style>
<div class="container">
   <div class="site-main">
      <!-- checkout-section -->
      <section class="ttm-row checkout-section tohh break-991-colum clearfix">
         <div class="container">
            <!-- row -->
            <div class="row">
               <div class="col-lg-12">
                  <div class="coupon_toggle">
                      <div class="coupon_code">
                          Have a coupon? 
                          <!--<a href="#">Click here to enter your code</a>-->
                      </div>
                      
                      
                       <div id="coupon_form">
                                    <div class="field-box position-relative w-100">
                                            <input type="text"  id="coupon_code" class="brd-rd5"  placeholder="Enter your coupon code" value="">
                                            <a id="apply_coupon" class="apply_coupon" style="padding: 5px 10px; border: none; background-color: #007BFF; color: white; border-radius: 4px; cursor: pointer;">
                                             Apply
                                            </a>
                                            
                                    </div>
                                    <!-- Area for displaying success or error messages -->
                                     <div id="discount_message" style="margin-top: 10px; color: green;"></div>

                                </div>
                  </div>
                  <style>
                      .checkout-form label { display: block !important; margin-bottom: 5px; font-weight: 600; }
                      .checkout-form select, 
                      .checkout-form input[type="text"],
                      .checkout-form input[type="tel"],
                      .checkout-form input[type="email"],
                      .checkout-form input[type="date"] {
                          width: 100% !important;
                          padding: 10px !important;
                          border: 1px solid #ccc !important;
                          border-radius: 5px !important;
                          display: block !important;
                      }
                  </style>
                  <!-- resources/views/checkout.blade.php -->
                  <form name="checkout" method="post" class="checkout row" action="{{ route('store.checkout') }}">
                     @csrf <!-- Add CSRF token for security -->
                     <div class="col-lg-6">
                        <div class="billing-fields">
                           <h3>Billing details</h3>
                           <p class="checkout-form checkout-form-row-first">
                              <label>First name&nbsp;<abbr class="required" title="required">*</abbr></label>
                              <input type="text" class="input-text" value="{{$user->first_name}}" name="firstname" id="firstname" placeholder="" value="">
                           </p>
                           <p class="checkout-form checkout-form-row-last">
                              <label>Last name&nbsp;<abbr class="required" title="required">*</abbr></label>
                              <input type="text" value="{{$user->last_name}}" class="input-text" name="lastname" id="lastname" placeholder="" value="">
                           </p>
                           <p class="checkout-form">
                              <label>Gender&nbsp;<abbr class="required" title="required">*</abbr></label>
                              <select name="gender" id="gender" class="input-text">
                                  <option value="">Select Gender</option>
                                  <option value="male" {{ (isset($user) && $user->gender == 'male') ? 'selected' : '' }}>Male</option>
                                  <option value="female" {{ (isset($user) && $user->gender == 'female') ? 'selected' : '' }}>Female</option>
                                  <option value="other" {{ (isset($user) && $user->gender == 'other') ? 'selected' : '' }}>Other</option>
                              </select>
                           </p>
                           <p class="checkout-form">
                              <label>Date of Birth&nbsp;<abbr class="required" title="required">*</abbr></label>
                              <input type="date" value="{{$user->date_of_birth}}" class="input-text" name="dob" id="dob" placeholder="">
                           </p>
                           <p class="checkout-form">
                              <label>FIDE id (if any)</label>
                              <input type="text" class="input-text" name="fide_id" id="fide_id" placeholder="Enter FIDE identification number">
                           </p>
                           <p class="checkout-form">
                              <label>School/College/Workplace&nbsp;<abbr class="required" title="required">*</abbr></label>
                              <input type="text" class="input-text" name="school_college_workplace" id="school_college_workplace" placeholder="Enter your school, college or workplace">
                           </p>
                           <p class="checkout-form">
                              <label>Street address&nbsp;<abbr class="required" title="required">*</abbr></label>
                              <input type="text" class="input-text" id="streetaddress" name="streetaddress" placeholder="House number and street name" value="">
                           </p>
                           <p class="checkout-form">
                              <label>City&nbsp;<abbr class="required" title="required">*</abbr></label>
                              <input type="text" class="input-text" id="city" name="city" placeholder="" value="">
                           </p>
                           <p class="checkout-form">
                              <label>County&nbsp;<abbr class="required" title="required">*</abbr></label>
                              <input type="text" class="input-text" id="country" name="country" placeholder="" value="">
                           </p>
                           <p class="checkout-form">
                              <label>Postcode / ZIP&nbsp;<abbr class="required" title="required">*</abbr></label>
                              <input type="text" class="input-text" id="postcode" name="postcode" placeholder="" value="">
                           </p>
                           <p class="checkout-form">
                              <label>Phone&nbsp;<abbr class="required" title="required">*</abbr></label>
                              <input type="tel" class="input-text" id="mobile" value="{{$user->mobile}}" name="phone" placeholder="" value="">
                           </p>
                           <p class="checkout-form">
                              <label>Email address&nbsp;<abbr class="required" title="required">*</abbr></label>
                              <input type="email" value="{{$user->email}}" class="input-text" name="email" id="email" placeholder="" value="">
                           </p>
                        </div>
                     </div>
                     <!--<div class="col-lg-6">-->
                        <div class="checkout-review-order">
                           <div id="payment" class="checkout-payment">
                              <ul class="payment_methods">
                                 <li class="payment_method_ppec_paypal">
                                    <input type="button" class="next action-button button ttm-btn tgd ttm-btn-shape-round pull-right booking_submit" data-submit="true"
                                       id="onlineClick" value="Pay Now" />
                                    <!--<img src="{{ asset('frontend/assets/main/images/Razorpay_logo.svg') }}"-->
                                    <!--                                alt="" style="width: 25%;-->
                                    <!--                                background: #fff;padding-left: 10px; padding-right: 10px;">-->
                                    <!--<div class="payment_box">-->
                                    <!--    <p>Pay via Razorpay; you can pay with your credit card if you don’t have a Razorpay account.</p>-->
                                    <!--</div>-->
                                 </li>
                              </ul>
                              <div class="checkout-form place-order clearfix">
                                 <!--<button type="submit" class="button ttm-btn tgd ttm-btn-shape-round pull-right" id="cashButton" name="checkout_place_order"  value="Place order" data-value="Place order">Continue to payment</button>-->
                              </div>
                           </div>
                        </div>
                     <!--</div>-->
                  </form>
               </div>
            </div>
         </div>
      </section>
      <!-- checkout-section end -->
   </div>
   <input type="hidden" id="total_amount" value="{{ $total_amount }}">
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
   $(document).ready(function() {
   
        // Function to save booking information
        function saveBooking(callback) {
            $('.booking_submit').prop('disabled', true);
            $('.booking_submit').text('Processing...');
            var formData = {
                 firstname: $('#firstname').val(),
                 lastname: $('#lastname').val(),
                 gender: $('#gender').val(),
                 dob: $('#dob').val(),
                 fide_id: $('#fide_id').val(),
                 school_college_workplace: $('#school_college_workplace').val(),
                 streetaddress: $('#streetaddress').val(),
                 city: $('#city').val(),
                 country: $('#country').val(),
                 postcode: $('#postcode').val(),
                 mobile: $('#mobile').val(),
                 email: $('#email').val(),
                 '_token': csrf_token,
            };
        
            $.ajax({
                url: api_url + '/save-booking',
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function (res) {
                    if (res.status) {
                        if ($('[name="transaction_type"]:checked').val() == 'cash') {
                            savePayment(res.booking_id);
                            callback(true);
                        } else {
                            localStorage.setItem('booking_id', res.booking_id);
                            saveOnline(callback);
                        }
                    } else {
                        $('#error-msg').html(`<span style="color:red;">${res.message}</span>`);
                        callback(false);
                    }
                    $('.booking_submit').prop('disabled', false);
                    $('.booking_submit').text('Submit');
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                    callback(false);
                    $('.booking_submit').prop('disabled', false);
                    $('.booking_submit').text('Submit');
                }
            });
        }
   
        // Function to save payment details
        function savePayment(booking_id, razorpay_payment_id = "", razorpay_order_id = "") {
            var formData = {
                booking_id: booking_id,
                transaction_type: $('[name="transaction_type"]:checked').val(),
                '_token': csrf_token,
                razorpay_payment_id: razorpay_payment_id,
                razorpay_order_id: razorpay_order_id
            };
        
            $.ajax({
                url: api_url + '/save-payment',
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function (res) {
                    // Handle success response
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
   
        // Function to create a Razorpay order and trigger the payment process
        function saveOnline(callback) {
            var formData = {
                '_token': csrf_token,
                // amount: 1,
                amount: $('#total_amount').val(),
                
            };
            $.ajax({
                url: api_url + '/razorpay-order-create',
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function (res) {
                    if (res.status) {
                        var orderId = res.data.id;
                        RazorpayCheckout(res.data.amount, res.data.currency, orderId, callback);
                    } else {
                        console.error('Error creating Razorpay order:', res.error);
                        callback(false);
                    }
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                    callback(false);
                }
            });
        }
   
        // Razorpay checkout function
        function RazorpayCheckout(amount, currency, order_id, callback) {
            var options = {
                "key": "{{ env('RAZORPAY_API_KEY') }}",
                "amount": amount,
                "currency": currency,
                "name": "{{ app_name() }}",
                "description": "",
                "image": "{{ asset(setting('logo')) }}",
                "order_id": order_id,
                "handler": function (response) {
                    // When payment is successful
                    // var booking_id = localStorage.getItem('booking_id');
                    // savePayment(booking_id, response.razorpay_payment_id, response.razorpay_order_id);
                    // localStorage.removeItem('booking_id');
                    // callback(true);
                    
                     saveBooking(success => {
                            if (success) {
                                var booking_id = localStorage.getItem('booking_id');
                               
                                savePayment(booking_id, response.razorpay_payment_id, response.razorpay_order_id);
                                
                                localStorage.removeItem('booking_id');
                                
                                return ;
                            }
                        });
                },
                "prefill": {
                    "name": "{{ Auth::user()->name }}",
                    "email": "{{ Auth::user()->email }}",
                    "contact": "{{ Auth::user()->mobile }}"
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#702543"
                }
            };
   
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function (response) {
                console.error('Payment Failed:', response.error);
                callback(false);
            });
   
            rzp1.open();
        }
        
        // Event listener for the 'razorpay' button click
        $('#onlineClick').on('click', function() {
            saveOnline(success => {
                if (success) {
                    console.log('Booking saved successfully');
                } else {
                    console.log('Booking save failed');
                }
            });
        });
   
   });
</script>


<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('click', '#apply_coupon', function(e) {
        e.preventDefault(); // Prevent the default button action

        // Get values from the form
        const couponCode = $('#coupon_code').val();
        const totalAmount = $('#total_amount').val();

        // Clear previous message
        $('#discount_message').text('');

        // Send AJAX request to apply the coupon
        $.ajax({
            url: '/apply-coupon', // Laravel route URL
            method: 'POST',
            data: {
                coupon_code: couponCode, // Send coupon code
                total_amount: totalAmount, // Send total amount
                _token: '{{ csrf_token() }}' // Include CSRF token for security
            },
            success: function(response) {
                if (response.success) {
                    // Update the displayed price in the UI
                    $('#total_price').text(response.new_total.toFixed(2));
                    $('#discount_message').css('color', 'green').text(response.message);

                    // Update the hidden input with the new total
                    $('#total_amount').val(response.new_total);
                } else {
                     // Show an error message if the coupon is invalid
                     $('#discount_message').css('color', 'red').text(response.message);
                }
            },
            error: function() {
                alert('Something went wrong. Please try again.');
            }
        });
    });
</script>


<!--scri-->
@endsection