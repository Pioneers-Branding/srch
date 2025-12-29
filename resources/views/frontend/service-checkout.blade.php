@extends('frontend.layouts.app')
@section('title') {{ 'About Us' }} @endsection
@section('content')

<section>
            <div class="w-100 pt-110 pb-120 position-relative">
               <!-- checkout-section -->
               <section class="ttm-row checkout-section tohh break-991-colum clearfix">
                  <div class="container">
                     <!-- row -->
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="coupon_toggle">
                              <div class="coupon_code">
                                 Have a coupon? <a href="#">Click here to enter your code</a>
                              </div>
                           </div>
                           <form name="checkout" method="post" class="checkout row" action="#">
                            <div class="comment-reply-wrap d-inline-block w-100">
                                <h3 class="position-relative">Billing details<span class="d-inline-block"></span></h3>
                                <form class="w-100">
                                    <div class="row mrg10">
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="field-box position-relative w-100">
                                             <input class="brd-rd5" type="text" placeholder="Full Name">
                                          </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="field-box position-relative w-100"><input class="brd-rd5" type="email" placeholder="Email Address"></div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="field-box position-relative w-100"><input class="brd-rd5" type="tel" placeholder="Phone No"></div>
                                        </div>
                                        
                                        <div class="col-md-6 col-sm-6 col-lg-6">
                                            <div class="field-box position-relative w-100"><input class="brd-rd5" type="text" placeholder="Pincode"></div>
                                        </div>
                                       
                                     
                                    </div>
                                </form>

                                <div class="col-lg-12 comment-reply-wrap">
                                    <h3 class="position-relative">Your Service<span class="d-inline-block"></span></h3>
                                    <div id="order_review" class="checkout-review-order">
                                       <table class="shop_table checkout-review-order-table">
                                          <thead>
                                             <tr>
                                                <th class="product-name">Service</th>
                                                <th class="product-total">Total</th>
                                             </tr>
                                          </thead>
                                         
                                          <tfoot>
                                             <tr class="cart-subtotal">
                                                <th>Free Trial Class Services</th>
                                                <td>
                                                   <span class="Price-amount amount">
                                                   <span class="Price-currencySymbol">₹</span>999.00
                                                   </span>
                                                </td>
                                             </tr>
                                             <tr class="order-total">
                                                <th>Total Amount</th>
                                                <td><strong><span class="woocommerce-Price-amount amount"><span
                                                   class="woocommerce-Price-currencySymbol">₹</span>999.00</span></strong>
                                                </td>
                                             </tr>
                                          </tfoot>
                                       </table>
                                       <div id="payment" class="checkout-payment">
                                          <ul class="payment_methods">
                                             <li class="payment_method_ppec_paypal">
                                                <a href="#"><img src="images/Razorpay_logo.svg"
                                                   alt="" style="width: 15%;
                                                   background: #fff;
                                                   padding-left: 10px; padding-right: 10px;"></a>
                                                <div class="payment_box">
                                                   <p>Pay via Razorpay; you can pay with your credit card if
                                                      you don’t have a Razorpay account.
                                                   </p>
                                                </div>
                                             </li>
                                          </ul>
                                          <div class="checkout-form place-order clearfix">
                                             <p class="payment_policy">Your personal data will be used to process
                                                your order, support your experience throughout this website, and
                                                for other purposes described in our <a
                                                   href=" {{ route('front.privacy') }}">Privacy policy</a> 
                                             </p>
                                             <div class="col-md-12 col-sm-12 col-lg-12">
                                               <div class="field-box position-relative w-100"><textarea class="brd-rd5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea></div>
                                               <p class="mb-0"><input type="checkbox" id="terms-check"><label class="mb-0" for="terms-check">please check this box to agree to terms & services</label></p>
                                               <button class="thm-btn scndry-bg brd-rd5 position-relative overflow-hidden mt-20 mb-20" type="submit">Continue To payment</button>
                                           </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                            </div><!-- Comment Reply Wrap -->
                              
                           </form>
                        </div>
                     </div>
                  </div>
               </section>
               <!-- checkout-section end -->
            </div>
         </section>

@endsection


