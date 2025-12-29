
    <link rel="icon" href="{{asset('frontend/assets/pixelcut-export.png')}}" type="image/x-icon">

<style>
    .site-main{
        margin:6% 0;
    }
</style>


@extends('frontend.layouts.app')
@section('title') {{ 'Cart' }} @endsection
@section('content')
<div class="container">
        <div class="site-main">

       <section class="ttm-row cart-section break-991-colum clearfix">
           <div class="container">
               <!-- row -->
               <div class="row">
                   <div class="col-lg-12">
                       <!-- ttm-cart-form -->
                       <form class="ttm-cart-form" action="#" method="post">
                           <table class="shop_table shop_table_responsive" id="product-cart">
                               <thead>
                                   <tr>
                                       <th class="product-remove">&nbsp;</th>
                                       <th class="product-thumbnail">&nbsp;</th>
                                       <th class="product-name">Product</th>
                                       <th class="product-price">Price</th>
                                      <th class="product-quantity">Quantity</th>
                                       <th class="product-subtotal">Total</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   
                                   <!-- Product rows will be dynamically inserted here -->
                                   
                               </tbody>
                           </table>
                       </form>
                       <!-- cart-collaterals -->
                       <div class="cart-collaterals">
                           <div class="cart_totals ">
                               <h2>Cart Total</h2>
                               <table class="shop_table shop_table_responsive">
                                   <tbody>
                                       <tr class="cart-subtotal">
                                           <th>Subtotal</th>
                                           <td data-title="Subtotal">
                                               <span id="cart-subtotal" class="Price-amount">
                                                   <span class="Price-currencySymbol" >₹</span>00
                                               </span>
                                           </td>
                                       </tr>
                                       
                                   </tbody>
                               </table>
                               <div class="proceed-to-checkout text-center mt-10">
                                   <a href="{{ route('front.checkout.cart') }}" class="checkout-button button mt-35">Proceed to checkout</a>
                                       <div style="display:none" class="checkout-process-div">
                                       <div class="checkout-button-separator">— or —</div>
                                       <a href="{{('checkout')}}"><img src="{{ asset('frontend/assets/main/images/Razorpay_logo.svg') }}"
                                        alt="" style="width: 25%;
                                        background: #fff;
                                      
                                        padding-left: 10px; padding-right: 10px;"></a>
                                   </div>
                               </div>
                           </div>
                       </div><!-- cart-collaterals end-->
                   </div>
               </div>
           </div>
       </section>

         </div>
   
</div>
@endsection

