
<?php
$asset_url =  (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]".'/ub/';
include 'web_action/config.php';
?>
<footer>
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="row">
                        <div class="col-auto">
                            <i class="bi bi-newspaper newsletter-icon"></i>
                        </div>
                        <div class="col">
                            <h2 class="Subscribe-heading">Subscribe to Newsletter</h2>
                            <span class="subscribe-note">We'll never share your email address with a any third
                                party</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 align-self-center">
                    <form class="needs-validation" id="Newsletter" method="post">
                        <div class="input-group">
                            <label for="subscribeSrEmail" class="form-label d-none">First name</label>
                            <input type="email" class="form-control" name="email" id="subscribeSrEmail"
                                placeholder="Email address" aria-label="Email address"
                                aria-describedby="subscribeButton" required>
                            <button type="submit" class="btn btn-dark btn-sm-wide" id="kohiapp-subscribeButton">Subscribe </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-3 mb-lg-0">
                    <div class="mb-3 mb-lg-4"> <a href="index.php" class="d-inline-block"> <img height="50" src="d1kivxjtmxnd4.cloudfront.net/assets/img/f87d2d81-4156-4639-b3d6-71e5e630d720.jfif" alt="logo">
                        </a></div>
                    <div class="mb-lg-4 mb-3">
                        <div class="row g-2">
                            <div class="col-auto"> <i class="bi bi-headset text-black hover-text-blue font-size-46 font-size-sx-40"></i>
                            </div>
                            <div class="col pl-3 align-self-center">
                                <div class="font-size-13 text-black hover-text-blue font-weight-light">Got questions?
                                    Call us!</div> <a href="tel:+91 98997 48175"
                                    class="font-size-20 text-black hover-text-blue">+91 98997 48175 </a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-lg-0 mb-3 mt-lg-3 mt-3">
                        <ul class="social-media-footer">
                            <!--<li> <a target="_blank" href="https://www.facebook.com/GreatEasternRetail"> <img
                                        src="https://d1kivxjtmxnd4.cloudfront.net/fit-in/35x35/assets/svg/social/facebook.svg"
                                        alt="facebook" height="35" loading="lazy" /> </a></li>-->
                           <!-- <li> <a target="_blank"
                                    href="https://www.youtube.com/@greateasternretail7800/featured"> <img
                                        src="https://d1kivxjtmxnd4.cloudfront.net/fit-in/35x35/assets/svg/social/youtube.svg"
                                        alt="Youtube" height="35" loading="lazy" /> </a></li>-->
                            <li> <a target="_blank" href="https://instagram.com/ubcorpindia"> <img
                                        src="https://d1kivxjtmxnd4.cloudfront.net/fit-in/35x35/assets/svg/social/instagram.svg"
                                        alt="instagram" height="35" loading="lazy" /> </a></li>
                            <li> <a target="_blank" href="mailto:Ubcorpindia@gmail.com">
                                    <img src="https://d1kivxjtmxnd4.cloudfront.net/fit-in/35x35/assets/svg/social/gmail.svg"
                                        alt="gmail" height="35" loading="lazy" /> </a></li>
                            <li> <a target="_blank" href="https://api.whatsapp.com/send?phone=919899748175"> <img
                                        src="https://d1kivxjtmxnd4.cloudfront.net/fit-in/35x35/assets/svg/social/whatsapp.svg"
                                        alt="whatsapp" height="35" loading="lazy" /> </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                       <!-- <div class="col-12 col-md-5 mb-4 mb-md-0">
                            <h6 class="footer-link-title mb-3 text-black hover-text-blue">Products</h6>
                            <div class="row">
                                <div class="col-6">
                                    <ul class="footer-link-list">
                                         <?php 
                        $cat_sql = "select * from `tbl_category`";
                        
                       $catresult = mysqli_query($con,$cat_sql);
                    
                       ?>
                        <?php while ($row = mysqli_fetch_array($catresult, MYSQLI_ASSOC)) { 
                                    ?>

                                        <li><a href="<?=$asset_url?>product.php?cat_id=<?=$row['cat_pk_id']?>"><?=$row['category']?></a></li>
                                        <?php }?>
                                       
                                        
                                    </ul>
                                </div>
                                
                            </div>
                        </div>-->
                        <div class="col-4 col-md mb-md-0">
                            <h6 class="footer-link-title mb-3 text-black hover-text-blue">My Account</h6>
                            <ul class="footer-link-list">
                                <li> <a  data-bs-toggle="modal" href="#loginModal" role="button" > My Account</a> </li>
                                <!--<li> <a  data-bs-toggle="modal" href="#loginModal" role="button" > Track Your Order </a> </li>-->
                                <!--<li> <a  data-bs-toggle="modal" href="#loginModal" role="button" > Wish List</a> </li>-->
                            </ul>
                        </div>
                        <div class="col-4 col-md">
                            <h6 class="footer-link-title mb-3 text-black hover-text-blue">About</h6>
                            <ul class="footer-link-list">
                                <li><a href="about_us.php">About Us</a></li>
                            </ul>
                        </div>
                        <div class="col-4 col-md">
                            <h6 class="footer-link-title mb-3 text-black hover-text-blue">Policies</h6>
                            <ul class="footer-link-list">
                                <li><a href="<?=$asset_url?>terms_condition.php">Terms &amp; Conditions</a></li>
                                <li><a href="<?=$asset_url?>privacy.php">Privacy Policy</a></li>
                                <li><a data-bs-toggle="modal" data-href="/paymentsreturns" href="refund-policy.php" role="button">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
    </style>
    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-sm-12 align-self-center text-white text-lg-start text-center"><span class="footer-at-tag"><i class="bi bi-at"></i> <a href="index.php" class="text-white">Ub Electronics</a></span> - All rights Reserved - Developed By  <a href="https://designersattack.com" target="_blank" class="blink_me" style="color: #fff; test-transform: underline"><strong>DESIGNERS ATTACK</strong></a></div>
                <div class="col-lg-auto col-sm-12 text-md-right text-center mt-lg-0 mt-2">
                    <div class="d-inline-block footer-bottom-logo"> <img
                            src="./d2afzgorr4mxtq.cloudfront.net/img/100x60/img1.jpg" alt="Visa"> </div>
                    <div class="d-inline-block footer-bottom-logo"> <img
                            src="./d2afzgorr4mxtq.cloudfront.net/img/100x60/img2.jpg" alt="Master"> </div>
                   <!-- <div class="d-inline-block footer-bottom-logo"> <img
                            src="./d2afzgorr4mxtq.cloudfront.netfit-in/42x31/assets/image/american-express.png"
                            alt="american-express"> </div>
                    <div class="d-inline-block footer-bottom-logo">
                        <img src="./d2afzgorr4mxtq.cloudfront.netfit-in/42x31/assets/image/diners-club.png"
                            alt="diners-club">
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</footer>
<!--
<div class="modal loginModal fade" id="UserDetailget"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content p-0">
			<div class="modal-body p-0 header-store-detail-modal">
                <button type="button" class="login-close browser-tab-close" data-bs-dismiss="modal" aria-label="Close"><i
                    class="bi bi-x"></i></button>
				<div class="row">
					<div class="col-md-12">
						<div id="offers-slider" class="offers-slider" data-img="https://d1kivxjtmxnd4.cloudfront.net/assets/image/bannr-blue-20.webp"><div class="item" style="cursor: pointer;"><div class="modal-left-banner"> <img alt="Great Eastern Retail" src="https://d1kivxjtmxnd4.cloudfront.net/assets/image/bannr-blue-20.webp"/></div></div></div>
					</div>
				</div>
				<div class="user-detail-form">
					<form id="user_browser_visit" method="post" class="needs-validation" novalidate>
						<div class="row">
							<div class="col-md-3 col-6 mb-lg-0 mb-2">
								<input type="text" class="form-control" placeholder="Full name" name="full_name" required>
							</div>
							<div class="col-md-3 col-6 mb-lg-0 mb-2">
								<input type="tel" class="form-control" placeholder="Mobile No" name="mobile_no" required>
							</div>
							<div class="col-md-3 mb-lg-0 mb-2">
								<input type="email" class="form-control" placeholder="Email" name="email" required>
							</div>
							<div class="col-md-3 mb-lg-0 mb-2">
								<input type="text" class="form-control" placeholder="Location" name="location" required>
							</div>
						</div><input type="hidden" name="csrfmiddlewaretoken" value="1DdKAGsY4t7FAEdNOTRiEAyL3n2S0JO5mn2Q0tqDJFuWv5MCJht3uLQUqnlTlb4p">
						<div class="row justify-content-between">
							<div class="col-md-auto col-12 align-self-end order-2 order-lg-1">
								<p class="user-form-heading">Thank you for vising Great Eastern Retail!</p>
							</div>
							<div class="col-md-auto col-12 text-right order-1 order-lg-2">
								<button name="submit" type="submit" class="btn user-from-btn">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
-->
<script type="text/javascript">!function(){"use strict";var t=document.querySelectorAll(".needs-validation");Array.prototype.slice.call(t).forEach(function(t){t.addEventListener("submit",function(e){t.checkValidity()||(e.preventDefault(),e.stopPropagation()),t.classList.add("was-validated")},!1)})}();$(function(){var n=$(".zeynep").zeynep({});n.on("closing",function(){}),$(".zeynep-overlay").on("click",function(){n.close()}),$(".btn-open").on("click",function(){n.open()})});
</script>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast compare-toast-msg" data-autohide="false">
        <div class="toast-body">
            <div class="toast-msg"></div><a href="javascript:;">Clear list</a>
        </div>
    </div>
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast notification-msg" data-autohide="false">
        <div class="toast-body">
            <div class="toast-msg"></div>
        </div>
    </div>
</body>
     <script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/assets/js/theme-v5.js"></script>
     <script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/assets/js/main-v5.js"></script> 
    
    
    <script src="<?=$asset_url?>static/ge_assets/js/home_page.js"></script>
    <script src="<?=$asset_url?>static/ge_assets/js/footer.js"></script>



<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/vendor/bootstrap/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp-H598wbMhBWMz9I_zbvdcknH-fiBVCo"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/bundle.min.js"></script>
<!-- JS Electro -->
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/hs.core.js"></script>

<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.header.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.hamburgers.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.unfold.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.focus-state.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.malihu-scrollbar.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.validation.min.js"></script>

<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.onscroll-animation.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.slick-carousel.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.quantity-counter.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.show-animation.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.svg-injector.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.go-to.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.selectpicker.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/components/hs.range-slider.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/js/js.cookie.min.js"></script>
<script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/assets/js/theme-custom-v5.js"></script>

<script src="<?=$asset_url?>static/ge_assets/js/footer.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

<!-- Mirrored from www.greateasternretail.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Sep 2023 11:01:08 GMT -->
</html>



<script>
getCartCount();
   function getCartCount(){ 
               $.ajax({
                    type: "POST",
                    url: '<?php echo $asset_url?>web_action/add_cart.php',
                    data: {
                        getCartCount:'getCartCount',
                        
                        },
                    success: function(response) {
                        
                      $('.cart-count').html(response)
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
   }
   
   
   
   
  $(document).on("click",".add_Cart",function() {
      
    var  id    =  $(this).attr('data-id');
    var  name  =  $(this).attr('data-name');
    var  image  =  $(this).attr('data-image');
    var  price =  $(this).attr('data-price');
    var  qty   =  $(this).attr('data-qty');
    
    $.ajax({
            type: "POST",
            url: '<?php echo $asset_url?>web_action/add_cart.php',
            data: {
                add_to_cart:'add_to_cart',
                product_id:id,
                product_name:name,
                product_price:price,
                product_qty:qty,
                product_image:image,
                
                },
            dataType:'json',
            success: function(response) {
                
                getCartCount();
                
              console.log(response);
                if (response.status =='SUCCESS'){
                        Swal.fire(
                          'Thank You!',
                          'Product Added To Your Cart SuccessFully!!',
                          'success'
                        ) ;       
                    notification('Product successfully added to your cart.')
                    $(this).html('added')
                    
                }else{
                   
                }
            },
            error: function(error) {
                console.log(error.responseJSON)
            }
    });
      
  });
</script>