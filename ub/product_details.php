<?php include 'header.php';
include 'web_action/config.php';
$product_id=$_GET['product_id'];

$sql ="select * from `tbl_product` WHERE product_pk_id=$product_id ";
                        $result = mysqli_query($con,$sql);
                    $product_data = mysqli_fetch_assoc($result);
                    
$cat_id= json_decode($product_data['product_cat']);

?>
    <!-- ========== MAIN CONTENT ========== -->
    <link rel="stylesheet" href="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/css/theme.min.css">
    <style>
    ul li {color: #666 !important;}
    h1{font-size: 22px !important; font-weight: bold !important;}
    h4{font-size: 16px !important; }
    
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
@media screen and (max-width: 768px){
.main-header__section, .main-header__section .navbar {
    background: var(--main-color)!important;
}
}
    </style>
    <main id="content" role="main">
        <div class="container">
            <!-- Single Product Body -->
            <!--<div class="my-md-2">-->
            <!--    <nav aria-label="breadcrumb">-->
            <!--        <ol class="breadcrumb mb-0 mb-lg-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">-->
            <!--            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../../../index.html">Home</a></li>-->
            <!--            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1">-->
            <!--                <a href="../../../shop/washing-machine/index.html">Washing Machine</a>-->
            <!--            </li>-->
            <!--            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1">-->
            <!--                <a href="../../../shop/washing-machine/top-loading/index.html">-->
            <!--                        Top Loading-->
            <!--                    </a>-->
            <!--            </li>-->
                        
            <!--                <li class="breadcrumb-item flex-shrink-0 ">-->
            <!--                    <a href="../../../shop/washing-machine/top-loading/62-kgs/index.html">-->
            <!--                        6.2 Kgs-->
            <!--                    </a>-->
            <!--                </li>-->
                        
                        <!--                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1">
                                
            <!--                        Grey </li>-->
                        <!--                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1">
            <!--                    </li>-->
                        <!--                                <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1">
            <!--                    </li>-->
            <!--        </ol>-->
            <!--    </nav>-->
            <!--</div>-->

            
            <div class="mb-3 mb-lg-10 mt-2">
                
                <div class="row">
                    <div class="col-md-6 col-lg-3 col-xl-4 mb-4 mb-md-0">
                    <div class="vertical-slider-div">
                         <ul class="vertical-thumbnail-slider u-slick" id="">
                            
                                <?php
                                    $product_images = json_decode($product_data['product_image']);
                                    
                                    ?>
                                    <?php
                                    foreach ($product_images as $img){
                                    ?>
                                    
                                    <li>
                                        <div class="slide-img-thumb">
                                            <img class="img-fluid" src="<?=$asset_url?>admin/assets/<?=$img?>" data-lazy="<?=$asset_url?>admin/assets/<?=$img?>" alt="Image Description">
                                        </div>
                                    </li>
                                    <?php }?>
                                
                            
                                
                                    
                                    <!--<li>-->
                                    <!--    <div class="slide-img-thumb">-->
                                    <!--        <img class="img-fluid" src="../../../static/assets/image/white-placeholder.png" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(50)/fit-in/60x60/images/2_ulYJWQ0.jpg" alt="Image Description">-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                    
                                
                            
                                
                                    
                                    <!--<li>-->
                                    <!--    <div class="slide-img-thumb">-->
                                    <!--        <img class="img-fluid" src="../../../static/assets/image/white-placeholder.png" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(50)/fit-in/60x60/images/3_tKrHyF3.jpg" alt="Image Description">-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                    
                                
                            
                                
                                    
                                    <!--<li>-->
                                    <!--    <div class="slide-img-thumb">-->
                                    <!--        <img class="img-fluid" src="../../../static/assets/image/white-placeholder.png" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(50)/fit-in/60x60/images/4_2e6nGXG.jpg" alt="Image Description">-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                    
                                
                            
                                
                                    
                                    <!--<li>-->
                                    <!--    <div class="slide-img-thumb">-->
                                    <!--        <img class="img-fluid" src="../../../static/assets/image/white-placeholder.png" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(50)/fit-in/60x60/images/5_JOT2mVr.jpg" alt="Image Description">-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                    
                                
                            
                                
                                    
                                    <!--<li>-->
                                    <!--    <div class="slide-img-thumb">-->
                                    <!--        <img class="img-fluid" src="../../../static/assets/image/white-placeholder.png" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(50)/fit-in/60x60/images/6_U4050mv.jpg" alt="Image Description">-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                    
                                
                            
                         </ul>
                    </div>
                    <div class="image-slider-div">
                     <ul class="single-image-slider u-slick" id="sliderouterwrapper">
                            
                                <?php
                                    foreach ($product_images as $img){
                                    ?>
                                    
                                    <li data-thumb="https://django-greateastern-prod.s3.amazonaws.com/images/1_DgETK6a.jpg?X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIAY6K3NNESXPEOTYO3%2F20230906%2Fap-south-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230906T111103Z&amp;X-Amz-Expires=3600&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Signature=94548ebb4f1d9a6f2bd5c8c2ec02d0fa6f254d050ea005b7f5a3a959c643ecc3">
                                        <a href="<?=$asset_url?>admin/assets/<?=$img?>" data-fancybox="gallery">
                                            <img class="img-fluid img-zoom" src="<?=$asset_url?>admin/assets/<?=$img?>" id="img-zoom-5275" alt="Image Description">
                                        </a>
                                    </li>
                                    
                                
                            <?php }?>
                                
                                    
                                    <!--<li data-thumb="https://django-greateastern-prod.s3.amazonaws.com/images/2_ulYJWQ0.jpg?X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIAY6K3NNESXPEOTYO3%2F20230906%2Fap-south-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230906T111103Z&amp;X-Amz-Expires=3600&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Signature=8eba8c61510b6cd23d4cd0650de5d132ff6467bd98545d16e7f95bd4218b16ed">-->
                                    <!--    <a href="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/images/2_ulYJWQ0.jpg" data-fancybox="gallery">-->
                                    <!--        <img class="img-fluid img-zoom" src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/images/2_ulYJWQ0.jpg" id="img-zoom-5276" alt="Image Description">-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                    
                                
                            
                                
                                    
                                    <!--<li data-thumb="https://django-greateastern-prod.s3.amazonaws.com/images/3_tKrHyF3.jpg?X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIAY6K3NNESXPEOTYO3%2F20230906%2Fap-south-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230906T111103Z&amp;X-Amz-Expires=3600&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Signature=b8366a5e34bf58344518b7f4e53b9dfb1aa768e0e3df21c9afa569902d8d09b7">-->
                                    <!--    <a href="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/images/3_tKrHyF3.jpg" data-fancybox="gallery">-->
                                    <!--        <img class="img-fluid img-zoom" src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/images/3_tKrHyF3.jpg" id="img-zoom-5277" alt="Image Description">-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                    
                                
                            
                                
                                    
                                    <!--<li data-thumb="https://django-greateastern-prod.s3.amazonaws.com/images/4_2e6nGXG.jpg?X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIAY6K3NNESXPEOTYO3%2F20230906%2Fap-south-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230906T111103Z&amp;X-Amz-Expires=3600&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Signature=28bf75332df2f70b0591dd53afc76cee517df80facdf100764088058cb301bc1">-->
                                    <!--    <a href="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/images/4_2e6nGXG.jpg" data-fancybox="gallery">-->
                                    <!--        <img class="img-fluid img-zoom" src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/images/4_2e6nGXG.jpg" id="img-zoom-5278" alt="Image Description">-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                    
                                
                            
                                
                                    
                                    <!--<li data-thumb="https://django-greateastern-prod.s3.amazonaws.com/images/5_JOT2mVr.jpg?X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIAY6K3NNESXPEOTYO3%2F20230906%2Fap-south-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230906T111103Z&amp;X-Amz-Expires=3600&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Signature=4d774a8317b1546984f703f02aa9e5df76ba114fb134b7dfbf100a504e4d262c">-->
                                    <!--    <a href="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/images/5_JOT2mVr.jpg" data-fancybox="gallery">-->
                                    <!--        <img class="img-fluid img-zoom" src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/images/5_JOT2mVr.jpg" id="img-zoom-5279" alt="Image Description">-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                    
                                
                            
                                
                                    
                                    <!--<li data-thumb="https://django-greateastern-prod.s3.amazonaws.com/images/6_U4050mv.jpg?X-Amz-Algorithm=AWS4-HMAC-SHA256&amp;X-Amz-Credential=AKIAY6K3NNESXPEOTYO3%2F20230906%2Fap-south-1%2Fs3%2Faws4_request&amp;X-Amz-Date=20230906T111103Z&amp;X-Amz-Expires=3600&amp;X-Amz-SignedHeaders=host&amp;X-Amz-Signature=61bf2721864446796d927a327d6a2329918b31b809fdf670c0cdb8f95042867a">-->
                                    <!--    <a href="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/images/6_U4050mv.jpg" data-fancybox="gallery">-->
                                    <!--        <img class="img-fluid img-zoom" src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/images/6_U4050mv.jpg" id="img-zoom-5280" alt="Image Description">-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                    
                                
                            
                         </ul>
                    </div>
                    <div id="myresult" class="img-zoom-result"></div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-5 mb-md-6 mb-lg-0">
                        <div class="mb-2">
                            

                            <h2 class="font-size-18 font-size-20-lg text-black text-lh-1dot2">
                                <?=$product_data['product_title']?>
                            </h2>
                            <!--<p class="m-0"><strong>Product Code </strong> WTL-62UPGB</p>-->
                            <!--<div class="m-0">-->
                            <!--    <a class="d-inline-flex align-items-center small font-size-15 text-lh-1 ">-->
                                    
                            <!--        <span class="text-secondary font-size-13 mr-2">(0 customer reviews)</span>-->
                            <!--        <a class=" review-tab" href="#product-details"-->
                            <!--           data-href-template="#Jpills-four-example1"><span-->
                            <!--                class="text-secondary font-size-13 text-blue">Add Review</span></a>-->
                            <!--    </a>-->
                            <!--</div>-->
                            <!--<a href="#" class="d-inline-block max-width-150"><img class="img-fluid max-height-40-img lazy" src="../../../static/assets/image/icons/image.svg" data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/images/vb.jpg"alt="Image Description"></a>-->
                            <div class="text-gray-9 font-size-14 ml-2 d-inline-block">
                                <span class="text-green font-weight-bold">
                                    Stock Available
                                </span>
                            </div>
                            
                            <div class="product-box-desc"></div>
                            <div class="hr-line mb-2"></div>
                            
                            <div class="price-list mb-2">
                                <ul class="mrp-price">
                                    <li>M.R.P.:</li>
                                    <li class="dash-line"><span
                                            class="rupees">₹</span> <?=$product_data['discount']?></li>
                                </ul>
                                <!--<input type="text" value="<?=$product_data['product_pk_id']?>">-->
                                <ul class="joy-price">
                                    <li>Our Price:</li>
                                    <li class="joy-price-value"><span
                                            class="rupees" >₹</span><?=$product_data['product_price']?><span class="f-dl">Free Delivery</span></li>
                                </ul>
                                
                                <ul class="dis-price">
                                    <li>You Save:</li>
                                    <li class="dis-price-value"><span
                                            class="rupees">₹</span> <?=$product_data['discount']-$product_data['product_price']?>
                                        <p>Inclusive of all taxes</p>
                                    </li>
                                </ul>
                                

                            </div>
                            
                            <!--<div class="dynamicDeliveryMessage mb-2">-->
                            <!--    <div class="DeliveryMessage">Get it between-->
                            <!--        <b>-->
                            <!--            Sep 09-->
                            <!--        </b>-->
                            <!--            to-->
                            <!--        <b>-->
                            <!--            Sep 11-->
                            <!--        </b>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            <div class="hr-line mb-2"></div>

                            
                            <div class="mb-2">
                                
                                
                            </div>
                            
                            <div class="mb-2 border-bottom">
                                <h6 class="mb-2 font-weight-bold">Key Features</h6>
                                <ul class="font-size-14 pl-3 ml-1 text-gray-110 addReadMore" style="list-style-type: none !important;">
                                    
                                        <li><span><?=$product_data['product_short_desc']?></span></li>
                                    
                                        <!--<li><span>Capacity 6.2 kg: Suitable for Bachelors &amp; Couples</span></li>-->
                                    
                                        <!--<li><span>680 rpm: Higher the spin speed, faster the drying time</span></li>-->
                                    
                                        <!--<li><span>Wobble Pulsator, STS Drum Type, 7 Wash Programs, 5 Water Level, Digital LED, Tempered Glass Window</span></li>-->
                                    
                                        <!--<li><span>Magic Filter, Diamond Drum, Water Fall, Child Lock, Air Turbo, Auto Restart, Eco Tub Clean</span></li>-->
                                    
                                        <!--<li><span>Transparent Toughened Glass Lid, Air Turbo, Soak, Ice Blue Led</span></li>-->
                                    
                                        <!--<li><span>Maximum spin speed - 680, rat mesh, activ wash plus</span></li>-->
                                    
                                        <!--<li><span>Special Features: Magic filter, LED display, Tempered Glass Door</span></li>-->
                                    
                                        <!--<li><span>Dimension (WxHxD): 540x982x568 mm</span></li>-->
                                    
                                        <!--<li><span>Installation: For requesting an installation/demo for this product once delivered, Contact_us on: [1800407267864] and provide the product&#x27;s model name.</span></li>-->
                                    
                                    <div id="read-more-features" class="read-more-content"><span>Read more...</span></div>
                                    <div id="read-less-features" class="read-more-content" style="display:none"><span>Read less...</span></div>
                                </ul>
                                <!--                            -->
                            </div>
                            
                            
                            <!--<div class="mb-0">-->
                            <!--     <label class="product-compare font-size-16"-->
                            <!--           for="compare-product-details-296">-->
                            <!--        <input type="checkbox"-->
                            <!--               value="296"-->
                            <!--               id="compare-product-details-296"-->
                            <!--               class="compare-product">-->
                            <!--        <span class="text-blue" style="color:#0062bd!important">-->
                            <!--            Compare with similar items-->
                            <!--        </span>-->
                            <!--    </label>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
                        <div class="mb-2">
<!--                            <div class="text-right mb-2 btn-share-section">-->
<!--                                <button class="btn share-sm btn-primary-dark-w social-toggle"-->
<!--                                        data-toggle="social-networks"><i class="fa fa-share-alt"></i> Share-->
<!--                                </button>-->
<!--                                <div class="social-networks">-->
<!--                                    <ul>-->
<!--                                        <li>-->
                                            
<!--                                            <div class="mail-this">-->
<!--    <a href="mailto:?subject=Meta%20Tags%20%E2%80%94%20Preview%2C%20Edit%20and%20Generate&body=With%20Meta%20Tags%20you%20can%20edit%20and%20experiment%20with%20your%20content%20then%20preview%20how%20your%20webpage%20will%20look%20on%20Google%2C%20Facebook%2C%20Twitter%20and%20more%21%20https%3A//www.greateasternretail.com/product/296/voltas-beko-62-kg-semi-automatic-top-loading-washing-machine-wtl62upgb-grey/"><i class="far fa-envelope"></i></a>-->
<!--</div>-->

<!--                                        </li>-->
<!--                                        <li>-->

                                            
<!--                                            <div class="tweet-this">-->
<!--    <a href="https://twitter.com/intent/tweet?text=Meta%20Tags%20%E2%80%94%20Preview%2C%20Edit%20and%20Generate%20https%3A//www.greateasternretail.com/product/296/voltas-beko-62-kg-semi-automatic-top-loading-washing-machine-wtl62upgb-grey/" class="meta-act-link meta-tweet" target="_blank"><i class="fab fa-twitter"></i></a>-->
<!--</div>-->

<!--                                        </li>-->

<!--                                        <li>-->
                                            
<!--                                            <div class="facebook-this">-->
<!--    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//www.greateasternretail.com/product/296/voltas-beko-62-kg-semi-automatic-top-loading-washing-machine-wtl62upgb-grey/" target="_blank"><span class='fab text-white hover-text-white fa-facebook-f btn-icon__inner'></span></a>-->
<!--</div>-->

<!--                                        </li>-->
<!--                                        <li>-->
<!--                                            <div class="whatsapp-this">-->
<!--    <a href="https://api.whatsapp.com/send?text=https%3A//www.greateasternretail.com/product/296/voltas-beko-62-kg-semi-automatic-top-loading-washing-machine-wtl62upgb-grey/" target="_blank"><span class='fab text-white hover-text-white fa-whatsapp btn-icon__inner'></span></a>-->
<!--</div>-->

<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </div>-->

                            
                                <!--<div class="card p-3 border-width-1 border-color-1 borders-radius-4 mb-2">-->
                                <!--    <h6 class="warranty-label"><img height="22px" src="../assets/svg/transfer.html" alt="">With Exchange</h6>-->
                                <!--    <input type="hidden" id="exchangeApplied" value="No">-->
                                <!--    <input type="hidden" id="exchangeWorking" value="No">-->
                                <!--    <input type="hidden" id="exchangebrand" value="">-->
                                <!--    <input type="hidden" id="exchangeModel" value="">-->
                                <!--    <h6 class="font-weight-medium text-blue" id="ExchangeUptoInfo" >Up to <span class="rupees">₹</span> 500.00 off</h6>-->
                                <!--    <h6 class="font-weight-medium text-green" id="ExchangeApplied" style="display: none;">Exchange Price: <span class="rupees">₹</span> <span id="ExchangeAmount"></span> off</h6>-->
                                <!--    <a href="#" class="btn btn-block btn-outline-black" data-toggle="modal" data-target="#ExchangeModal" data-product=296>Exchange Offers</a>-->
                                <!--</div>-->
                            

                            
                            
                            
                            
                            <!--<div class="mb-2">-->
                            <!--    <div class="d-flex">-->
                            <!--        <h6 class="font-size-14 font-weight-bold mt-1">Delivery</h6>-->
                            <!--        <div class="zipcode-search ml-2">-->
                                        <!-- Apply coupon Form -->

                            <!--            <label class="sr-only" for="delivery_pincode">Enter Pincode</label>-->
                            <!--            <div class="input-group">-->
                            <!--                <input type="text" class="form-control border-light-1 border-right-0"-->
                            <!--                       name="delivery_pincode" id="delivery_pincode"-->
                            <!--                       placeholder="Enter Pincode"-->
                            <!--                       aria-label="Enter Pincode" aria-describedby="subscribeButtonExample2"-->
                            <!--                       maxlength="6" required="">-->
                            <!--                <div class="input-group-append border-left-0">-->
                            <!--                    <button type="button" class="btn btn-block border-light-1 border-left-0 text-blue"-->
                            <!--                            id="kohiapp-delivery-check-form"><span-->
                            <!--                            class="d-md-inline">Check</span>-->
                            <!--                    </button>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--            <div id="response_msg"></div>-->
                                        <!-- End Apply coupon Form -->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="button-group-2 mb-2 pb-0dot5" role="group">

                                
                                    <button data-product="296" id="updatecart" data-action="add"
                                            class="btn btn-outline-black ">Add to Cart
                                    </button>
                                    <!--<button data-product="296" data-action="add"-->
                                    <!--        class="btn btn-primary-dark-w buynow">Buy Now-->
                                    <!--</button>-->
                                
                            </div>

                            <!--<div class="mb-3">-->
                            <!--    <button type="button" class="btn btn-sm btn-block btn-dark btn-wide transition-3d-hover"-->
                            <!--            data-toggle="modal"-->
                            <!--            data-target=" #AreaPincodeModal "-->
                            <!--            data-product=296>Connect to store-->
                            <!--    </button>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
                <!-- End Single Product Body -->
            </div>
        </div>
        <!-- Single Product Tab -->
        <div class="mb-3 mb-lg-8 container" id="product-details">
            <div class="position-relative position-md-static px-md-6">
                <ul class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-0 pb-1 pb-xl-0 mb-n1 mb-xl-0"
                    id="pills-tab-8" role="tablist">
                    

                    
                    
                   
                    
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link" id="Jpills-two-example1-tab" data-toggle="pill"
                           href="#Jpills-two-example1" role="tab" aria-controls="Jpills-two-example1"
                           aria-selected="false">Description</a>
                    </li>
                    
                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                        <a class="nav-link" id="Jpills-five-example1-tab" data-toggle="pill"
                           href="#Jpills-five-example1" role="tab" aria-controls="Jpills-five-example1"
                           aria-selected="false">About The Product</a>
                    </li>
                    
                </ul>
            </div>
            <!-- Tab Content -->
            <div class="mb-3 mb-lg-6 borders-radius-17 shadow-sm border p-3 p-lg-4 mt-4 mt-md-0 px-lg-10 py-lg-9">
                <div class="tab-content" id="Jpills-tabContent">
                    <div class="tab-pane fade active show" id="Jpills-one-example1" role="tabpanel"
                         aria-labelledby="Jpills-one-example1-tab">
                        
                        
                    </div>
                    <div class="tab-pane fade" id="Jpills-two-example1" role="tabpanel"
                         aria-labelledby="Jpills-two-example1-tab">
                        <p><?=$product_data['product_desc']?></p>
                        <!--<ul class="nav flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">-->
                        <!--    <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1"><strong>SKU:</strong>-->
                        <!--        <span class="sku">WTL-62UPGB</span></li>-->
                        <!--    <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>-->
                        <!--    <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1">-->
                        <!--        <strong>Category:</strong>-->
                        <!--        <a href="#" class="text-blue">Washing Machine-->
                        <!--        </a>-->
                        <!--    </li>-->
                            
                        <!--</ul>-->
                    </div>
                    <div class="tab-pane fade d-none" id="Jpills-five-example1" role="tabpanel"
                         aria-labelledby="Jpills-five-example1-tab">
                        <div id="product-flix-media-about">

                        </div>
                    </div>

                    
                        <!--<div class="tab-pane fade" id="Jpills-three-example1" role="tabpanel"-->
                        <!--     aria-labelledby="Jpills-three-example1-tab">-->
                            
                                <!--<div class="mx-md-3 pt-1 product-specification-tab">-->
                                <!--    <h3 class="font-size-20-lg font-size-20 text-blue-2 font-weight-bolder mb-2 mb-lg-3">-->
                                <!--        General Features-->
                                <!--    </h3>-->
                                <!--    <div class="row mb-2 mb-lg-3">-->
                                        
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Brand-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                VOLTAS BEKO-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Washing Machine Type-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Top Loading-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Model Number-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                VOLTAS BEKO WTL-62UPGB/ TL -->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                SKU-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                VOLTAS BEKO WTL-62UPGB/ TL -->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Energy Efficiency (Star Rating)-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                5 Star-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Washing Capacity-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                6.2 KG Capacity-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--    </div>-->
                                <!--</div>-->
                            
                                <!--<div class="mx-md-3 pt-1 product-specification-tab">-->
                                <!--    <h3 class="font-size-20-lg font-size-20 text-blue-2 font-weight-bolder mb-2 mb-lg-3">-->
                                <!--        Washing &amp; Drying Features-->
                                <!--    </h3>-->
                                <!--    <div class="row mb-2 mb-lg-3">-->
                                        
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Washing Technology-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Wobble Pulsator-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Fuzzy Logic Control-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Yes-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                3-Step Wash-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                NA-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Auto Balance System-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Yes-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Auto Restart-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                YES-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Jet Spray-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                NA-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Spin Speed (rpm)-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                680 RPM-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Water Consumption-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                140 Ltrs-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Wash Programs-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                NA-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Other Programs-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Soak, Blanket, Delicates, Eco Tub Clean, Quick Wash, Jeans-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--    </div>-->
                                <!--</div>-->
                            
                                <!--<div class="mx-md-3 pt-1 product-specification-tab">-->
                                <!--    <h3 class="font-size-20-lg font-size-20 text-blue-2 font-weight-bolder mb-2 mb-lg-3">-->
                                <!--        Wash Modes-->
                                <!--    </h3>-->
                                <!--    <div class="row mb-2 mb-lg-3">-->
                                        
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Hot Wash-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                NO-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Quick Wash-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                YES-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Spin Only-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                YES-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Spin &amp; Rinse-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                YES-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--    </div>-->
                                <!--</div>-->
                            
                                <!--<div class="mx-md-3 pt-1 product-specification-tab">-->
                                <!--    <h3 class="font-size-20-lg font-size-20 text-blue-2 font-weight-bolder mb-2 mb-lg-3">-->
                                <!--        Additional Features-->
                                <!--    </h3>-->
                                <!--    <div class="row mb-2 mb-lg-3">-->
                                        
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Child Lock-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Yes-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Magic Dispenser-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                NO-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Water Level-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                5 Water Level-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Delay Start-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                No-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Motor Type-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Non Inverter-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Hot/ Cold Water inlet-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                NA-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Smart Diagnosis-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                NA-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Memory Backup-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Yes-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                In-Built Heater-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                NO-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Auto Restart-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Yes-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Noise Level Wash-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                NA-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Noise Level Spin-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                NA-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Auto Power Off-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                YES-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--    </div>-->
                                <!--</div>-->
                            
                                <!--<div class="mx-md-3 pt-1 product-specification-tab">-->
                                <!--    <h3 class="font-size-20-lg font-size-20 text-blue-2 font-weight-bolder mb-2 mb-lg-3">-->
                                <!--        Physical Features-->
                                <!--    </h3>-->
                                <!--    <div class="row mb-2 mb-lg-3">-->
                                        
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Display Type-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                LED-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Color-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Imperial Silver-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Door Type-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Normal-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Drum Type-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Stainless Steel-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Filter Type-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Magic Filter-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Pulsator Type-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Wobble Wash-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Window (Glass Type)-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Tempered Glass Window-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--    </div>-->
                                <!--</div>-->
                            
                                <!--<div class="mx-md-3 pt-1 product-specification-tab">-->
                                <!--    <h3 class="font-size-20-lg font-size-20 text-blue-2 font-weight-bolder mb-2 mb-lg-3">-->
                                <!--        Included Components-->
                                <!--    </h3>-->
                                <!--    <div class="row mb-2 mb-lg-3">-->
                                        
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Main Product-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                1N Washing Machine-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Documents-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                User Manual,warranty card-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--    </div>-->
                                <!--</div>-->
                            
                                <!--<div class="mx-md-3 pt-1 product-specification-tab">-->
                                <!--    <h3 class="font-size-20-lg font-size-20 text-blue-2 font-weight-bolder mb-2 mb-lg-3">-->
                                <!--        Power Features-->
                                <!--    </h3>-->
                                <!--    <div class="row mb-2 mb-lg-3">-->
                                        
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Power Comsumption-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                330W-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Power Frequency-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                220V/50Hz-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--    </div>-->
                                <!--</div>-->
                            
                                <!--<div class="mx-md-3 pt-1 product-specification-tab">-->
                                <!--    <h3 class="font-size-20-lg font-size-20 text-blue-2 font-weight-bolder mb-2 mb-lg-3">-->
                                <!--        Product Dimensions-->
                                <!--    </h3>-->
                                <!--    <div class="row mb-2 mb-lg-3">-->
                                        
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Dimensions (W x D x H)-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                540 x 568 x 982-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Net Weight (Kg)-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                31.0 KG-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--    </div>-->
                                <!--</div>-->
                            
                                <!--<div class="mx-md-3 pt-1 product-specification-tab">-->
                                <!--    <h3 class="font-size-20-lg font-size-20 text-blue-2 font-weight-bolder mb-2 mb-lg-3">-->
                                <!--        Warranty Details-->
                                <!--    </h3>-->
                                <!--    <div class="row mb-2 mb-lg-3">-->
                                        
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Warranty-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                3 years comprehensive Warranty and 12 months on Wobble Motor-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Covered In Warranty-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                3 years warranty is applicable on all parts except Lint filter, knobs, inlet/otlet hose &amp; Top covers. Special Warranty or Extended Warranties for certain parts of products Motor does not include labour, only parts.-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Not Covered In Warranty-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Cosmetic / Aesthetic / Plastic / Glass Parts / Cable / Wiring / Piping / Consumbles are not covered under warranty.-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--    </div>-->
                                <!--</div>-->
                            
                                <!--<div class="mx-md-3 pt-1 product-specification-tab">-->
                                <!--    <h3 class="font-size-20-lg font-size-20 text-blue-2 font-weight-bolder mb-2 mb-lg-3">-->
                                <!--        Company Information-->
                                <!--    </h3>-->
                                <!--    <div class="row mb-2 mb-lg-3">-->
                                        
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Manufacturer Name &amp; Address-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                Voltas Beko india Pvt Ltd-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Packer Name &amp; Adresss-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                VOLTBEK HOME APPLIANCES PVT. LTD-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--    </div>-->
                                <!--</div>-->
                            
                                <!--<div class="mx-md-3 pt-1 product-specification-tab">-->
                                <!--    <h3 class="font-size-20-lg font-size-20 text-blue-2 font-weight-bolder mb-2 mb-lg-3">-->
                                <!--        Country of Origin-->
                                <!--    </h3>-->
                                <!--    <div class="row mb-2 mb-lg-3">-->
                                        
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Country of Manufacture-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                India-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--        <div class="col-6 col-md-4">-->
                                <!--            <h4 class="product-attribute-name">-->
                                <!--                Country of Brand Origin-->
                                <!--            </h4>-->
                                <!--            <p class="text-gray-5 product-specification add-Read-More showlesscontent">-->
                                <!--                India-->
                                <!--            </p>-->
                                <!--        </div>-->
                                         
                                <!--    </div>-->
                                <!--</div>-->
                            
                        <!--</div>-->
<!--                        -->
<!--                        []-->
                    <div class="tab-pane fade" id="Jpills-four-example1" role="tabpanel"
                         aria-labelledby="Jpills-four-example1-tab">
                        <div class="row mb-0 mb-lg-8">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h3 class="font-size-18 mb-3 mb-lg-6">Based on 0
                                        reviews</h3>
                                    <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">0.0</h2>
                                    <div class="text-lh-1">overall</div>
                                </div>

                                <!-- Ratings -->
                                <ul class="list-unstyled review-process-bar">
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1"
                                           href="javascript:;">
                                            <div class="col-auto mb-0 mb-md-2">
                                                <div class="text-warning text-ls-n2 font-size-16">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-0 mb-md-2">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 0%;"
                                                         aria-valuenow="100" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">0</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1"
                                           href="javascript:;">
                                            <div class="col-auto mb-0 mb-md-2">
                                                <div class="text-warning text-ls-n2 font-size-16">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-0 mb-md-2">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 0%;"
                                                         aria-valuenow="53" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">0</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1"
                                           href="javascript:;">
                                            <div class="col-auto mb-0 mb-md-2">
                                                <div class="text-warning text-ls-n2 font-size-16">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-0 mb-md-2">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">

                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 0%;"
                                                         aria-valuenow="0"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">0</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1"
                                           href="javascript:;">
                                            <div class="col-auto mb-0 mb-md-2">
                                                <div class="text-warning text-ls-n2 font-size-16">
                                                    <small class="fas fa-star"></small>
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-0 mb-md-2">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 0%;"
                                                         aria-valuenow="0" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-muted">0</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="py-1">
                                        <a class="row align-items-center mx-gutters-2 font-size-1"
                                           href="javascript:;">
                                            <div class="col-auto mb-0 mb-md-2">
                                                <div class="text-warning text-ls-n2 font-size-16">
                                                    <small class="fas fa-star"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                    <small class="far fa-star text-muted"></small>
                                                </div>
                                            </div>
                                            <div class="col-auto mb-0 mb-md-2">
                                                <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 0%;"
                                                         aria-valuenow="1" aria-valuemin="0"
                                                         aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-auto text-right">
                                                <span class="text-gray-90">0</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!-- End Ratings -->
                            </div>
                            <div class="col-md-6">
                                <h3 class="font-size-18 mb-2">Add a review</h3>
                                <!-- Form -->
                                <div class="review-msg"></div>
                                <form class="mt-0 mt-lg-3 d-block" id="user-rating-reviews">
                                    <input type="hidden" name="csrfmiddlewaretoken" value="vNmjZMdfOLYgLaCL5kOwSQcJjQYpDbLkQxbppzbUtXlxGBbA0IqhI1uSGQhqYD1E">
                                    <div class="row align-items-center mb-2 mb-lg-4">
                                        <div class="col-md-4 col-lg-3">
                                            <label for="rating" class="form-label mb-0">Your Review</label>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="d-block">
                                                <!-- Rating Stars Box -->
                                                <div class='rating-stars text-center'>
                                                    <ul id='stars'>
                                                        <li class='star' title='Poor' data-value='1'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='Fair' data-value='2'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='Good' data-value='3'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='Excellent' data-value='4'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='WOW!!!' data-value='5'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class="success-box d-inline-block ml-2"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="js-form-message">
                                                <input type="text" class="position-absolute opacity-0" name="rating"
                                                       data-msg="Please select rating." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="js-form-message form-group mb-3 row">
                                        <div class="col-md-4 col-lg-3">
                                            <label for="descriptionTextarea" class="form-label">Your Review</label>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="hidden" name="product_id" value="296">
                                            <textarea class="form-control" rows="3" name="review_description"
                                                      id="descriptionTextarea"
                                                      data-msg="Please enter your message."
                                                      data-error-class="u-has-error"
                                                      data-success-class="u-has-success" required></textarea>
                                        </div>
                                    </div>
                                    <div class="js-form-message form-group mb-3 row">
                                        <div class="col-md-4 col-lg-3">
                                            <label for="inputName" class="form-label">Name <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            
                                                <input type="text" class="form-control" name="name" id="inputName"
                                                       aria-label="Alex Hecker" required
                                                       data-msg="Please enter your name."
                                                       data-error-class="u-has-error"
                                                       data-success-class="u-has-success">
                                            
                                        </div>
                                    </div>
                                    <div class="js-form-message form-group mb-3 row">
                                        <div class="col-md-4 col-lg-3">
                                            <label for="emailAddress" class="form-label">Email <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            
                                                <input type="email" class="form-control" name="email"
                                                       id="emailAddress" aria-label="alexhecker@pixeel.com" required
                                                       data-msg="Please enter a valid email address."
                                                       data-error-class="u-has-error"
                                                       data-success-class="u-has-success">
                                            
                                        </div>
                                    </div>
                                    <div class="js-form-message form-group mb-3 row">
                                        <div class="col-md-4 col-lg-3">
                                            <label for="emailAddress" class="form-label">Mobile</label>
                                        </div>
                                        <div class="col-md-8 col-lg-9">
                                            
                                                <input type="tel" minlength="10" maxlength="10" class="form-control"
                                                       name="mobile" id="mobile" aria-label="alexhecker@pixeel.com"
                                                       data-msg="Please enter 10 digit mobile number"
                                                       data-error-class="u-has-error"
                                                       data-success-class="u-has-success">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="offset-md-4 offset-lg-3 col-auto">
                                            <button type="submit" name="submit"
                                                    class="btn btn-primary-dark btn-wide transition-3d-hover">Add
                                                Review
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                        <!-- Review -->
                        
                        <!-- Review -->
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
            <!-- End Single Product Tab -->
        </div>
        <div class="container">
            <!-- Related products -->
            <div class="mb-3 mb-lg-6">
                <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-0 mb-lg-4">
                    <h3 class="section-title mb-0 pb-2 font-size-22">Similar products</h3>
                </div>
                <div class="js-slick-carousel u-slick pt-0 pt-lg-3 px-0 px-lg-1 products-slider"
                     data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4"
                     data-slides-show="4"
                     data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                     data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                     data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
                     data-slides-scroll="1"
                     data-dots="false"
                     data-lazy-Load="ondemand"
                     data-responsive='[{"breakpoint":3000,"settings":{"slidesToShow":4,"dots":false}},{"breakpoint":1400,"settings":{"slidesToShow":4,"dots":false}},{"breakpoint":1200,"settings":{"slidesToShow":3,"dots":false}},{"breakpoint":992,"settings":{"slidesToShow":3}},{"breakpoint":768,"settings":{"slidesToShow":2,"dots":false}},{"breakpoint":554,"settings":{"slidesToShow":2,"dots":false}}]'>

                    
                       
                        
                    
                       
                        
                    
                       <?php
                      $product_sql ="select * from `tbl_product`";
                        $Productresult = mysqli_query($con,$product_sql);
                    // print_r($Pro_data);
                    $category = implode('', $cat_id);
                    // print_r($category);
                       ?>
                        <?php while ($row = mysqli_fetch_array($Productresult, MYSQLI_ASSOC)) { 
                            $category_array = json_decode($row['product_cat']);
                           
                          
                        if(!in_array($category,$category_array)){
                                            
                                           continue ; 
                                        }
                          
                        ?>
                        <div class="js-slide products-group py-0 py-lg-2 pb-lg-3">
                            <div class="product-item">
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner">
                                        <div class="product-item__body">
                                            <div class="mb-2">
                                                <div class="coupon-band font-size-12">

                                                </div>
                                            </div>
                                            <button class="quick-view" data-toggle="modal"
                                                    data-target="#exampleModalCenter"
                                                    id="1251">
                                                <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"
                                                    data-placement="top" title="Quick View">
                                                </i>
                                            </button>
                                            <button type="button"
                                                    value="1251"
                                                    class="add-wishlist add-wishlist-1251">
                                                <i class="font-size-14 text-gray-5  fas fa-heart"></i>
                                            </button>
                                            <div class="mb-2">
                                                <a href="<?=$asset_url?>product_details.php?product_id=<?=$row['product_pk_id']?>" class="d-block text-center image-sec">
                                                    
                                                        
                                                            <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="<?=$asset_url?>admin/assets/<?=$row['featurd_image']?>" alt="Image Description">
                                                        
                                                    
                                                </a>
                                            </div>
                                            <h5 class="mb-1 product-item__title"><a
                                                href="<?=$asset_url?>product_details.php?product_id=<?=$row['product_pk_id']?>"
                                                class="text-blue font-weight-bold"><?=$row['product_title']?></a>
                                            </h5>
                                            
                                                <p class="font-weight-bold text-black mb-0">Our Price</p>

                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price d-flex align-items-center position-relative">
                                                        <ins class="font-size-20 text-blue-2 text-decoration-none">
                                                            <span class="rupees">₹</span><?=$row['product_price']?>
                                                        </ins>
                                                        
                                                            <div class="font-size-12 mb-0 position-absolute bottom--100">
                                                                MRP
                                                                <del>
                                                                    <span class="rupees">₹</span>
                                                                    <?=$row['discount']?>
                                                                </del>
                                                            </div>
                                                            <div class="dis-per-sm ml-2">40%
                                                                off
                                                            </div>
                                                        
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="product-item__footer">
                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                <!-- <label class="product-compare font-size-13"-->
                                                <!--       for="compare-product-1251">-->
                                                <!--    <input type="checkbox"-->
                                                <!--           value="1251"-->
                                                <!--           id="compare-product-1251"-->
                                                <!--           class="compare-product">-->
                                                <!--    <span>-->
                                                <!--        <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                                <!--        Compare-->
                                                <!--    </span>-->
                                                <!--</label>-->
                                                
                                                
                                                <a href="javascript:;"
                                                    data-id="<?=$row['product_pk_id']?>"
                                        data-id="<?=$row['product_pk_id']?>"
                                        data-image="<?=$row['featurd_image']?>"
                                        data-name="<?=$row['product_title']?>"
                                        data-price="<?=$row['product_price']?>"
                                        data-qty="1"
                                                   class="text-gray-6  font-size-13 add_Cart"><i
                                                        class="ec ec-add-to-cart mr-1 font-size-15"></i> Add
                                                    Cart</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="252">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="252"-->
                        <!--                            class="add-wishlist add-wishlist-252">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../252/lg-10-kg-inverter-fully-automatic-top-loading-washing-machine-t10sjss1z-free-silver/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/T10SJSS1Z.png" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../252/lg-10-kg-inverter-fully-automatic-top-loading-washing-machine-t10sjss1z-free-silver/index.html"-->
                        <!--                        class="text-blue font-weight-bold">LG 10 Kg Inverter Fully-Automatic Top Loading Washing Machine (T10SJSS1Z, Free Silver)</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>33676-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            45990-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">26%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-252">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="252"-->
                        <!--                                   id="compare-product-252"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=252 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="1657">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="1657"-->
                        <!--                            class="add-wishlist add-wishlist-1657">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../1657/samsung-80-kg-fully-automatic-top-loading-washing-machine-wa80t4560vstlimperial-silver-8-kg/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/1_05GqAhx.jpg" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../1657/samsung-80-kg-fully-automatic-top-loading-washing-machine-wa80t4560vstlimperial-silver-8-kg/index.html"-->
                        <!--                        class="text-blue font-weight-bold">Samsung 8.0 Kg Fully-Automatic Top Loading Washing Machine (WA80T4560VS/TL,Imperial Silver), 8 Kg</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>25852-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            31900-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">18%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-1657">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="1657"-->
                        <!--                                   id="compare-product-1657"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=1657 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="780">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="780"-->
                        <!--                            class="add-wishlist add-wishlist-780">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../780/lg-75-kg-5-star-smart-inverter-fully-automatic-top-loading-washing-machine-t75sksf1z-middle-free-silver/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/LG_T-75SKSF1Z_1.jpg" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../780/lg-75-kg-5-star-smart-inverter-fully-automatic-top-loading-washing-machine-t75sksf1z-middle-free-silver/index.html"-->
                        <!--                        class="text-blue font-weight-bold">LG 7.5 Kg 5 Star Smart Inverter Fully-Automatic Top Loading Washing Machine (T75SKSF1Z, Middle Free Silver)</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>20175-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            28990-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">30%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-780">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="780"-->
                        <!--                                   id="compare-product-780"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=780 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="866">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="866"-->
                        <!--                            class="add-wishlist add-wishlist-866">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../866/samsung-80-kg-top-loading-5-star-fully-automatic-washing-machine-wa80n4760fe-ombre-plum-with-activwash/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/1_f6G9lq0.jpg" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../866/samsung-80-kg-top-loading-5-star-fully-automatic-washing-machine-wa80n4760fe-ombre-plum-with-activwash/index.html"-->
                        <!--                        class="text-blue font-weight-bold">WA80N4760FE Top Load with ActivWash 8.0Kg</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>29072-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            35900-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">19%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-866">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="866"-->
                        <!--                                   id="compare-product-866"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=866 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                       
                        
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="1339">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="1339"-->
                        <!--                            class="add-wishlist add-wishlist-1339">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../1339/haier-hwm75-826nzp-75-kg-fully-automatic-top-load-washing-machine/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/1_xL0LqaM.jpg" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../1339/haier-hwm75-826nzp-75-kg-fully-automatic-top-load-washing-machine/index.html"-->
                        <!--                        class="text-blue font-weight-bold">Haier HWM75-826NZP 7.5 Kg Fully Automatic Top Load Washing Machine</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>19526-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            32000-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">38%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-1339">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="1339"-->
                        <!--                                   id="compare-product-1339"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=1339 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="747">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="747"-->
                        <!--                            class="add-wishlist add-wishlist-747">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../747/voltas-beko-65-kg-5-star-fully-automatic-top-loading-washing-machine-wtl65upgb-gray-2020/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/VOLTAS BEKO_WTL-65UPGB_1.jpg" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../747/voltas-beko-65-kg-5-star-fully-automatic-top-loading-washing-machine-wtl65upgb-gray-2020/index.html"-->
                        <!--                        class="text-blue font-weight-bold">Voltas Beko 6.5 kg 5 Star Fully-Automatic Top Loading Washing Machine (WTL65UPGB, Gray) 2020</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>14694-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            24590-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">40%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-747">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="747"-->
                        <!--                                   id="compare-product-747"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=747 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="625">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="625"-->
                        <!--                            class="add-wishlist add-wishlist-625">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../625/panasonic-8-kg-5-star-fully-automatic-top-load-washing-machine-stain-master-na-f80x9crb-inox-grey/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/1_pnRkeU2.jpg" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../625/panasonic-8-kg-5-star-fully-automatic-top-load-washing-machine-stain-master-na-f80x9crb-inox-grey/index.html"-->
                        <!--                        class="text-blue font-weight-bold">Panasonic 8 Kg 5 Star Fully Automatic Top Load Washing Machine (Stain Master, NA-F80X9CRB, Inox Grey)</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>20650-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            31800-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">35%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-625">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="625"-->
                        <!--                                   id="compare-product-625"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=625 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="301">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="301"-->
                        <!--                            class="add-wishlist add-wishlist-301">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../301/voltas-beko-70-kg-5-star-fully-automatic-top-loading-washing-machine-wtl70upgb-grey-2020/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/Voltas_WTL60UPGC_1_uhK1Kwd.jpg" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../301/voltas-beko-70-kg-5-star-fully-automatic-top-loading-washing-machine-wtl70upgb-grey-2020/index.html"-->
                        <!--                        class="text-blue font-weight-bold">Voltas Beko 7.0 kg 5 Star Fully-Automatic Top Loading Washing Machine (WTL70UPGB, Grey) (2020)</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>17154-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            28690-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">40%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-301">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="301"-->
                        <!--                                   id="compare-product-301"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=301 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="290">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="290"-->
                        <!--                            class="add-wishlist add-wishlist-290">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../290/whirlpool-75-kg-5-star-fully-automatic-top-loading-washing-machine-whitemagic-elite-75-grey-hard-water-wash/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/New_Project_-_2021-03-22T172250.746.png" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../290/whirlpool-75-kg-5-star-fully-automatic-top-loading-washing-machine-whitemagic-elite-75-grey-hard-water-wash/index.html"-->
                        <!--                        class="text-blue font-weight-bold">Whirlpool 7.5 Kg 5 Star Fully-Automatic Top Loading Washing Machine (WHITEMAGIC ELITE 7.5, Grey, Hard Water Wash)</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>16240-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            22050-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">26%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-290">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="290"-->
                        <!--                                   id="compare-product-290"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=290 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                       
                        
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="1368">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="1368"-->
                        <!--                            class="add-wishlist add-wishlist-1368">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../1368/haier-65-kg-fully-automatic-top-load-silver-hwm65-707nzp/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/Haier_707NZP_1.jpg" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../1368/haier-65-kg-fully-automatic-top-load-silver-hwm65-707nzp/index.html"-->
                        <!--                        class="text-blue font-weight-bold">Haier 6.5 kg Fully Automatic Top Load Silver  (HWM65-707NZP)</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>14216-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            24000-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">40%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-1368">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="1368"-->
                        <!--                                   id="compare-product-1368"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=1368 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                       
                        
                    
                       
                        
                    
                       
                        
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="871">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="871"-->
                        <!--                            class="add-wishlist add-wishlist-871">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../871/lg-90-kg-5-star-smart-inverter-fully-automatic-top-loading-washing-machine-t90sjmb1z/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/1_duNpUwg.jpg" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../871/lg-90-kg-5-star-smart-inverter-fully-automatic-top-loading-washing-machine-t90sjmb1z/index.html"-->
                        <!--                        class="text-blue font-weight-bold">LG 9.0 Kg 5 Star Smart Inverter Fully-Automatic Top Loading Washing Machine (T90SJMB1Z)</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>31996-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            42990-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">25%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-871">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="871"-->
                        <!--                                   id="compare-product-871"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=871 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                       
                        
                        <!--<div class="js-slide products-group py-0 py-lg-2 pb-lg-3">-->
                        <!--    <div class="product-item">-->
                        <!--        <div class="product-item__outer h-100">-->
                        <!--            <div class="product-item__inner">-->
                        <!--                <div class="product-item__body">-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <div class="coupon-band font-size-12">-->

                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <button class="quick-view" data-toggle="modal"-->
                        <!--                            data-target="#exampleModalCenter"-->
                        <!--                            id="253">-->
                        <!--                        <i class="font-size-14 text-gray-5 fa fa-eye" data-toggle="tooltip"-->
                        <!--                            data-placement="top" title="Quick View">-->
                        <!--                        </i>-->
                        <!--                    </button>-->
                        <!--                    <button type="button"-->
                        <!--                            value="253"-->
                        <!--                            class="add-wishlist add-wishlist-253">-->
                        <!--                        <i class="font-size-14 text-gray-5  fas fa-heart"></i>-->
                        <!--                    </button>-->
                        <!--                    <div class="mb-2">-->
                        <!--                        <a href="../../253/lg-65-kg-5-star-smart-inverter-fully-automatic-top-loading-washing-machine-t65sksf1z-middle-free-silver-2020/index.html" class="d-block text-center image-sec">-->
                                                    
                                                        
                        <!--                                    <img class="img-fluid mx-auto d-block" src="../../../static/assets/svg/preloaders/loader.svg" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/255x255/images/T65SKSF1Z.png" alt="Image Description">-->
                                                        
                                                    
                        <!--                        </a>-->
                        <!--                    </div>-->
                        <!--                    <h5 class="mb-1 product-item__title"><a-->
                        <!--                        href="../../253/lg-65-kg-5-star-smart-inverter-fully-automatic-top-loading-washing-machine-t65sksf1z-middle-free-silver-2020/index.html"-->
                        <!--                        class="text-blue font-weight-bold">LG 6.5 Kg 5 Star Smart Inverter Fully-Automatic Top Loading Washing Machine (T65SKSF1Z, Middle Free Silver) (2020)</a>-->
                        <!--                    </h5>-->
                                            
                        <!--                        <p class="font-weight-bold text-black mb-0">Our Price</p>-->

                        <!--                        <div class="flex-center-between mb-1">-->
                        <!--                            <div class="prodcut-price d-flex align-items-center position-relative">-->
                        <!--                                <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                        <!--                                    <span class="rupees">₹</span>19131-->
                        <!--                                </ins>-->
                                                        
                        <!--                                    <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                        <!--                                        MRP-->
                        <!--                                        <del>-->
                        <!--                                            <span class="rupees">₹</span>-->
                        <!--                                            25990-->
                        <!--                                        </del>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="dis-per-sm ml-2">26%-->
                        <!--                                        off-->
                        <!--                                    </div>-->
                                                        
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                </div>-->
                        <!--                <div class="product-item__footer">-->
                        <!--                    <div class="border-top pt-2 flex-center-between flex-wrap">-->
                        <!--                         <label class="product-compare font-size-13"-->
                        <!--                               for="compare-product-253">-->
                        <!--                            <input type="checkbox"-->
                        <!--                                   value="253"-->
                        <!--                                   id="compare-product-253"-->
                        <!--                                   class="compare-product">-->
                        <!--                            <span>-->
                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                        <!--                                Compare-->
                        <!--                            </span>-->
                        <!--                        </label>-->
                                                
                                                
                        <!--                        <a href="javascript:;"-->
                        <!--                           data-product=253 data-action="add"-->
                        <!--                           class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                        <!--                                class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                        <!--                            Cart</a>-->
                                                
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                </div>
            </div>
            <!-- End Related products -->
           
       </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
    <!--Connect store Modal -->
    <div class="modal fade" id="AreaPincodeModal" tabindex="-1" role="dialog"
         aria-labelledby="AreaPincodeModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-5 mx-5">
                <button class="close modal-close" data-dismiss="modal" aria-label="Close"><i
                        class="ec ec-close-remove"></i></button>
                <div class="modal-body p-0">
                    <form method="post" id="storeGet" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label class="font-size-18 font-weight-600 text-gray-90">Enter a pincode</label>
                            <input type="number" name="pincode" placeholder="Enter pincode" class="form-control">
                            <div class="font-size-12" id="storepincodemsg"></div>
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary-dark-w px-5">APPLY</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Connect store Modal -->
    <!--Connect to store  Modal -->
    <div class="modal fade" id="ConnectToStoreModal" tabindex="-1" role="dialog"
         aria-labelledby="ConnectToStoreModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-3 p-lg-5 mx-0 mx-lg-4">
                <button class="close modal-close" data-dismiss="modal" aria-label="Close"><i
                        class="ec ec-close-remove"></i></button>
                <div class="modal-body p-0 header-store-detail-modal" id="store-manage-data">
                    <p class="font-size-18 font-weight-bold mb-2 text-grey-90">Connect to store</p>
                    <div class="kohiapp-post-profile bg-blue-2">
                        <div class="img-wrap">
                            <img class="img-fluid manage-img" src="../../../static/assets/img/great-eastern.png" alt="Great Eastern Retail"
                                 title="Great Eastern Retail Pvt. Ltd">
                        </div>
                        <div class="desc">
                            <p class="title text-white">Staff</p>
                            <div class="store-data">
                                <p class="font-size-14 text-white font-weight-light mb-0">Store Manager</p>
                                <p class="store-name text-white font-size-14 font-weight-bold mb-0"> Great Eastern Retail store</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrap">
                        <button class="btn btn-outline-black ConnectToPhoneModal" data-product="" data-toggle="modal"
                                data-target="#ConnectToPhoneModal">Connect On Call
                        </button>
                        <a class="btn btn-primary-dark-w btn-appointment" href="../../../appointment.html">Book an appointment</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--Connect to store -- phone call  Modal -->
    <div class="modal fade" id="ConnectToPhoneModal" tabindex="-1" role="dialog"
         aria-labelledby="ConnectToPhoneModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-3 p-lg-5 mx-0 mx-lg-4">
                <button class="close modal-close" data-dismiss="modal" aria-label="Close"><i
                        class="ec ec-close-remove"></i></button>
                <div class="modal-body p-0 header-store-detail-modal">
                    <div class="form-msg"></div>
                    <div class="kohiapp-post-profile bg-blueparple-gradiant">
                        <div class="img-wrap">
                            <img class="img-fluid manage-img" src="../../../static/assets/img/great-eastern.png" alt="Great Eastern Retail"
                                 title="Great Eastern Retail Pvt. Ltd">
                        </div>
                        <div class="desc">
                            <p class="title text-white">Staff</p>
                            <div class="store-data">
                                <p class="font-size-14 font-weight-light mb-0 text-white">Store Manager</p>
                                <p class="store-name font-size-14 font-weight-bold mb-0 text-white"> Great Eastern Retail store</p>
                            </div>
                        </div>
                    </div>
                    <form method="post" id="StoreEnquiryform">
                        <input type="hidden" name="csrfmiddlewaretoken" value="vNmjZMdfOLYgLaCL5kOwSQcJjQYpDbLkQxbppzbUtXlxGBbA0IqhI1uSGQhqYD1E">
                        <div class="form-row">
                            <div class="col-md-12 col-6 mb-2 mb-lg-3 js-form-message">
                                <label class="form-label" for="">Full Name</label>
                                <input type="hidden" name="product_id">
                                <input type="text" class="form-control" placeholder="Enter full name"
                                       data-msg="Please enter your message."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success" name="full_name" required>
                                <input type="hidden" name="store_id" value="" id="store_id">
                            </div>
                            <div class="col-md-5 col-6 mb-2 mb-lg-3 js-form-message">
                                <label class="form-label" for="">Mobile No</label>
                                <input type="tel" class="form-control" minlength="10" maxlength="10"
                                       placeholder="Enter Mobile No" name="Mobile"
                                       data-msg="Please enter 10 digit mobile number"
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success" required>
                            </div>
                            <div class="col-md-7 mb-2 mb-lg-3 js-form-message">
                                <label class="form-label" for="">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                       data-msg="Please enter email."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                            </div>
                            <div class="col-md-12 mb-2 mb-lg-3 js-form-message">
                                <label class="form-label" for="">Remarks</label>
                                <input type="text" class="form-control" placeholder="Remarks" name="Remarks"
                                       data-msg="Please enter remark."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                            </div>
                            <div class="col-md-12 mb-2 mb-lg-3 js-form-message">
                                <label class="form-label" for="">Do you have a preferred time for us to call you
                                    back?</label>
                                <select name="preferred_time" class="form-control" data-msg="Please select slot."
                                        data-error-class="u-has-error"
                                        data-success-class="u-has-success">
                                    <option value="">Select time slot</option>
                                    <option value="11AM - 1PM">11AM - 1PM</option>
                                    <option value="1PM - 3PM">1PM - 3PM</option>
                                    <option value="3PM - 5PM">3PM - 5PM</option>
                                    <option value="5PM - 7PM">5PM - 7PM</option>
                                    <option value="7PM - 9PM">7PM - 9PM</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary-dark-w">Raise a request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!--    Product Exchange   -->
    <div class="modal fade" id="ExchangeModal" tabindex="-1" role="dialog" aria-labelledby="ExchangeModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content mx-lg-10">
              <button class="close modal-close" data-dismiss="modal" aria-label="Close"><i class="ec ec-close-remove"></i></button>
            <div class="modal-body p-0">
              <div class="exchange-container">
                  <div class="exchange-35">
                      <h5 class="font-size-14 font-weight-bold text-gray-90">Old item will be rejected if</h5>
                      <ul class="list-bullet-1">
                          <li>Old item is not in working condition</li>
                          <li>Brand and model mismatch during pickup</li>
                      </ul>
                      <h5 class="font-size-14 font-weight-bold text-gray-90">Exchange tip</h5>
                      <ul class="list-bullet-1">
                          <li>If old item is rejected during pickup, you can pay the exchange discount amount at the time of delivery by card or cash and keep the new product</li>
                      </ul>
                  </div>
                  <div class="exchange-65">
                      <h5 class="font-size-14 font-weight-bold text-gray-90 mb-0">Exchange your old product</h5>
                      <p class="mb-2 font-size-16 text-gray-90">Which product would you like to exchange?</p>
                      <div class="d-block mb-2">
                          <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exchange" id="WorkgingModel" value="WorkingModel">
                        <label class="form-check-label" for="WorkgingModel">Working Model</label>
                      </div>
                      
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exchange" id="NonWorkgingModel" value="NonWorkingModel">
                        <label class="form-check-label" for="NonWorkgingModel">Non Working Model</label>
                      </div>
                      
                      </div>
                      <div id="ExchangeLevelInput" style="display: none;">
                          <div class="form-group max-width-200">
                              <select class="form-control form-control-sm ExchangeLevel" name="" id="ExchangeLevel1">
                                  <option value="" selected disabled>Select Type</option>
                                  
                                      <option value="Top Loading">Top Loading</option>
                                  
                                      <option value="Front Loading">Front Loading</option>
                                  
                                      <option value="Semi Automatic">Semi Automatic</option>
                                  
                                      <option value="Washer Dryer">Washer Dryer</option>
                                  
                              </select>
                          </div>
                          <div class="form-group max-width-200 mb-2">
                              <select class="form-control form-control-sm ExchangeLevel" name="" id="ExchangeLevel2">
                                  <option value="" selected disabled>Select brands</option>
                              </select>
                          </div>
                      </div>
                      <div id="ExchangeDetails" style="display: none;">
                          <span id="exchange_working_price" style="display: none;">500.00</span>
                          <span id="exchange_nonworking_price" style="display: none;">400.00</span>
                          <div class="pt-2">
                              <p class="text-green m-0">Fixed Exchange value: <span class="rupees">₹</span> <span id='exchange_price'>500.00</span> <span class="text-blue-2 pointer-event" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Exchange value will not change at the time of pickup">What's this?</span></p>
                              <p class="mb-0 font-size-12">Includes limited time discount of <span class="rupees">₹</span> 1,200.00</p>
                              <p class="mb-3 font-size-12">Exchange service fee Rs. <span class="rupees">₹</span> 100 will be charged</p>
                          </div>
                          <button class="btn btn-sm btn-gray" id="cancel_exchange">Cancel</button>
                          <button class="btn btn-sm btn-primary-dark-w" id="apply_exchange">Apply Exchange</button>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!--End Product Exchange Modal -->
<!--Spill & Drop Modal -->
     <div class="modal fade" id="spill_drop_protection" tabindex="-1" role="dialog"
     aria-labelledby="ConnectToStoreModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-3 p-lg-3">
                <button class="close modal-close" data-dismiss="modal" aria-label="Close"><i
                        class="ec ec-close-remove"></i></button>
                <div class="modal-body p-0 header-store-detail-modal" id="store-manage-data">
                    <p id="service-charge" class="font-size-13 mb-2 text-grey-90">At the time of raising a Service Request, the customer will have to pay Service Charge of ₹ <span></span></p>
                    <p class="font-size-18 font-weight-bold mb-2 text-grey-90">Great Eastern Spills & Drop Protection Plan</p>
                    <table class="table spill-drop-table">
                        <thead>
                            <tr>
                                <th>Age of the device at the time of filing service request</th>
                                <th>Device Depreciation %</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Up to 90 days</td>
                                <td>15% of Invoice Value</td>
                            </tr>
                            <tr>
                                <td>91 to 180 days</td>
                                <td>30% of Invoice Value</td>
                            </tr>
                            <tr>
                                <td>181 - 365 days</td>
                                <td>50% of Invoice Value</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="spill-drop-card">
                        <h6 class="font-size-18 font-weight-bold mb-2 text-grey-90">Features & Benefits</h6>
                        <div class="d-flex justify-content-between">
                            <ul class="spill-drop-li">
                                <li>No questions asked repairs</li>
                                <li>Free Pick and Drop</li>
                                <li>Repair or Replacement guarantee</li>
                                <li>No Paperwork required, hassle free plan</li>
                                <li>Repair at OEM Authorised Service Centers only</li>
                                <li>No depreciation in EW and SP plans</li>
                            </ul>
                            <img height="122" src="../../../static/ge_assets/image/GE-SDP-Logo.jpg" alt="Spills & Drop Protection Plan">
                        </div>

                        </div>
                    <div class="spill-drop-card">
                        <h6 class="font-size-18 font-weight-bold mb-2 text-grey-90">Terms & Conditions</h6>
                        <ul class="spill-drop-li">
                            <li>All prices are inclusive of applicable taxes</li>
                            <li>Plans should only be sold on new devices, SP and SDP should be sold on the same day as the device</li>
                            <li>Liability limited to the device invoice value</li>
                            <li>Damage to accessories is not covered</li>
                            <li>The device needs to have a minimum manufacturer's warranty of 12 months, applicable in India</li>
                            <li>Remaining terms of respective plans apply</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../../cdn.jsdelivr.net/npm/clipboard%402.0.8/dist/clipboard.min.js"></script>
    <script>
        $(document).ready(function () {
               new ClipboardJS('.vc');
               $('.icon-container').each(function(i,val){
                    if(i <= 4){
                    console.log(i)
                    $(this).removeClass('d-none')
                    }
               })

             $("#kohiapp-delivery-check-form").click(function () {
                var delivery_pincode = $('#delivery_pincode').val();
                var is_valid = $.isNumeric(delivery_pincode)
                if (delivery_pincode == ''){
                    $('#response_msg').html('<span class="text-red">Enter 6 digit area pincode</span>');
                    return false
                }else if((is_valid == false)){
                    $('#response_msg').html('<span class="text-red">Enter 6 digit valid pincode</span>');
                    return false
                }
                if (delivery_pincode != '') {
                    $.ajax({
                        type: "POST",
                        url: '/check-delivery',
                        headers: {"X-CSRFToken": 'vNmjZMdfOLYgLaCL5kOwSQcJjQYpDbLkQxbppzbUtXlxGBbA0IqhI1uSGQhqYD1E'},
                        data: 'delivery_pincode=' + delivery_pincode,
                        success: function (response) {
                            if(response.status == 'SUCCESS'){
                                $('#response_msg').html('<span class="text-blue">Delivery Available</span>');
                            }
                            if(response.status == 'FAILURE'){
                                $('#response_msg').html('<span class="text-red">Sorry! This item is not serviceable in your area</span>');
                            }
                        },
                        error: function (error) {

                        }
                    });
                }
             });

             $("#kohiapp-notify-me").click(function () {
                var product_id = 296
                if (product_id != '') {
                    $.ajax({
                        type: "POST",
                        url: '/product-notify-me',
                        headers: {"X-CSRFToken": 'vNmjZMdfOLYgLaCL5kOwSQcJjQYpDbLkQxbppzbUtXlxGBbA0IqhI1uSGQhqYD1E'},
                        data: 'product_id=' + product_id,
                        success: function (response) {
                            if(response.status == 'SUCCESS'){
                                notification('<p class="text-center text-primary m-0">Thank you for showing interest! We will notify you soon.</p>')
                            }
                        },
                        error: function (error) {

                        }
                    });
                }
             });

            $("#WorkgingModel").on('click',function (e) {
                exchange_price = $("#exchange_working_price").text();
                $("#exchangeWorking").val("Yes")
                $("#ExchangeLevelInput").show()
                $("#exchange_price").text(exchange_price);
            })

            $("#NonWorkgingModel").on('click',function (e) {
                exchange_price = $("#exchange_nonworking_price").text();
                $("#exchangeWorking").val("No")
                $("#ExchangeLevelInput").show()
                $("#exchange_price").text(exchange_price);
            })

            $("#cancel_exchange").on('click',function (e) {
                $('#ExchangeModal').modal('hide');
            })

            $("#apply_exchange").on('click',function (e) {
                $('#ExchangeModal').modal('hide');
                $("#ExchangeUptoInfo").hide()
                $("#ExchangeApplied").show()
                $("#ExchangeAmount").text(exchange_price);
                $("#exchangeApplied").val("Yes")
            })

            $("#ExchangeLevel1").on('change',function (e) {
                var selected_level_1 = $(this).val();
                $("#exchangebrand").val(selected_level_1)
                console.log()
                $.ajax({
                    type: "POST",
                    url: '/get-exchange-level2-data',
                    data: "csrfmiddlewaretoken=vNmjZMdfOLYgLaCL5kOwSQcJjQYpDbLkQxbppzbUtXlxGBbA0IqhI1uSGQhqYD1E&selected_level_1="+selected_level_1,
                    success: function (response) {
                        level_2_data = response['level_2_data']
                        $('#ExchangeLevel2').empty()
                        $('#ExchangeLevel2').append($('<option>', {
                                value: "",
                                text : "Select Brands",
                                selected : true,
                                disabled : true
                            }))
                        $.each(level_2_data, function (i) {
                            $('#ExchangeLevel2').append($('<option>', {
                                value: level_2_data[i],
                                text : level_2_data[i]
                            }));
                        });
                    },
                    error: function (response) {
                        // console.log(response)
                    }
                })
            })

            $('#ExchangeLevel2').on('change',function(e){
                var selected_level_1 = $(this).val();
                $("#exchangeModel").val(selected_level_1)
            })
            $(".ExchangeLevel").change(function(){
                level_1 = $("#ExchangeLevel1").val()
                level_2 = $("#ExchangeLevel2").val()
                console.log(level_1)
                console.log(level_2)
                if (level_1 && level_2){
                    $("#ExchangeDetails").show()
                }
            })

            $(".variant").on('click', function (e) {
                var attribute_name = $(this).attr("name");
                var atttribute_id = $(this).attr("id");
                var attribute_value = $(this).val();

                $.ajax({
                    type: "POST",
                    url: '',
                    data: "csrfmiddlewaretoken=vNmjZMdfOLYgLaCL5kOwSQcJjQYpDbLkQxbppzbUtXlxGBbA0IqhI1uSGQhqYD1E&attribute_name=" + attribute_name + "&atttribute_id=" + atttribute_id + "&attribute_value=" + attribute_value,
                    success: function (response) {
                        console.log(response)
                    },
                    error: function (response) {
                        console.log(response)
                    }
                })
            })

            $('.input-group').on('change', function () {
                $('input[name="' + this.name + '"]').not(this).prop('checked', false);
            });

             var freebie_check = $('.input-check-freebie').is(':checked');
             var freebie_item = 1;
             if(freebie_check == true){
                var main_product_price1 = parseFloat($('#main-product-freebie').text())
                $('.input-check-freebie').each(function () {
                      if ($(this).is(":checked")) {
                          main_product_price1 += parseFloat($(this).data('freebie-price'))
                          freebie_item += $(this).length
                      }
                 })
                if (main_product_price1 !== undefined){
                     $('.freebie-cal-items').html('for '+freebie_item+' item(s)')
                     $('.price-with-freebie').html(main_product_price1)
                }
             }
            $('.input-check-freebie').click(function () {
                var freebie_item = 1;
                var total_freebie_price_plus = 0;
                var total_freebie_price_less = 0;
                var total_price = 0;
                var main_product_price1 = parseFloat($('#main-product-freebie').text())
                var freebie_product_price = parseFloat($('#main-product-freebie').data('freebie-product-price'))
                $('.input-check-freebie').each(function () {
                      if ($(this).is(":checked")) {
                          total_freebie_price_plus += parseFloat($(this).data('freebie-price'))
                          freebie_item += $(this).length
                      }else {
                          total_freebie_price_less += parseFloat($(this).data('freebie-price'));
                      }
                 })
                 if (main_product_price1 !== undefined){
                     var main_product_price  = freebie_product_price - total_freebie_price_less;
                     var total_price = main_product_price + total_freebie_price_plus
                     var freebie_mrp = $('#freebie-product-mrp-value').data('freebie-product-mrp-value');
                     discount_without_freebie = parseInt((freebie_mrp - main_product_price) / freebie_mrp * 100)
                     $('#main-product-freebie').html(main_product_price);
                     $('.freebie-cal-items').html('for '+freebie_item+' item(s)')
                     $('.price-with-freebie').html(total_price)
                     $('#freebie-product-dis-value').html(discount_without_freebie+'% off');
                }
            })



            $('.input-check-addon').click(function () {
                if($(this).data('addon-type') == 'combo'){
                    if ($(this).is(":checked")) {
                        $('#main-product').html($(this).data('combo-price'));

                        var combo_price = $('#main-product').text();
                        var mrp = $('#product-mrp-value').data('product-mrp-value');
                        discount = parseInt((mrp - combo_price) / mrp * 100)
                        $('#product-dis-value').html(discount+'% off');
                        }else {
                            $('#main-product').html($('#main-product').data('product-price'));
                            $('#product-dis-value').html($('#product-dis-value').data('product-dis-value')+'% off');
                    }
                }
                var main_product_price = parseFloat($('#main-product').text())
                var item = 1;
                 $('.input-check-addon').each(function () {
                      if ($(this).is(":checked")) {
                          main_product_price += parseFloat($(this).data('price'))
                          item += $(this).length
                      }
                  })

                if (main_product_price !== undefined){
                    $('.price-with-add-on').html(main_product_price)
                    $('.cal-items').html('for '+item+' item(s)')
                }
            })
        })
        $(document).ready(function () {

            $.HSCore.components.HSValidation.init('#StoreEnquiryform', {
                // $('#StoreEnquiryform').find('button[type=submit]').html('Please wait...')
                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: '/submitStoreEnquery',
                        data: $("#StoreEnquiryform").serialize(),
                        success: function (response) {
                            console.log(response)
                            if (response.status === 'success') {
                                $('#StoreEnquiryform')[0].reset()
                                $('#StoreEnquiryform').find('button[type=submit]').html('Raise a request')
                                var modalinner = $('#ConnectToPhoneModal .modal-dialog .modal-content .modal-body');
                                $(modalinner).find('.kohiapp-post-profile').toggle()
                                $(modalinner).find('#StoreEnquiryform').toggle()
                                $(modalinner).find('.form-msg').html('<p class="font-size-14 text-gray-90 mb-0">Thank you for your request! You will receive a call from Great Eastern Retail Executive.</p>')
                                setTimeout(function () {
                                    $('#ConnectToPhoneModal').modal('hide')
                                    $(modalinner).find('.form-msg').html('')
                                    $(modalinner).find('.kohiapp-post-profile').toggle()
                                    $(modalinner).find('#StoreEnquiryform').toggle()
                                }, 5000)
                            } else {
                                $('#StoreEnquiryform')[0].reset()
                                $('#StoreEnquiryform').find('button[type=submit]').html('Raise a request')
                                var modalinner = $('#ConnectToPhoneModal .modal-dialog .modal-content .modal-body');
                                $(modalinner).find('.kohiapp-post-profile').toggle()
                                $(modalinner).find('#StoreEnquiryform').toggle()
                                $(modalinner).find('.form-msg').html('<p class="font-size-14 text-gray-90 mb-0">' + response.msg + '</p>')
                                setTimeout(function () {
                                    $('#ConnectToPhoneModal').modal('hide')
                                    $(modalinner).find('.form-msg').html('')
                                    $(modalinner).find('.kohiapp-post-profile').toggle()
                                    $(modalinner).find('#StoreEnquiryform').toggle()
                                }, 5000)
                            }
                        },
                        error: function (error) {
                            $('#StoreEnquiryform').find('button[type=submit]').html('Raise a request')
                            console.log(error.responseJSON)
                        }
                    });
                    // 
                }

            });
             $('.nav-classic li:first-child a').tab('show')
        })
    </script>
    <script type="text/javascript">
    jQuery('#Jpills-five-example1-tab').hide()
    jQuery('#flex-media-about').hide()
    jQuery('<div id="flix-inpage"></div>').prependTo("#product-flix-media-about");
    jQuery(".product-box-desc").html('<div id="flix-minisite"></div>');
    var product_mpn = 'WTL-62UPGB';
    var product_ean = "";
    var product_brand = 'Voltas Beko';
    var distributor = "16173"; var language = "in";
    var fallback_language = "";
    var headID = document.getElementsByTagName("head")[0];
    var flixScript = document.createElement('script');

    flixScript.type = 'text/javascript';
    flixScript.async = true;
    flixScript.src = '../../../../media.flixfacts.com/js/loader.js';
    flixScript.setAttribute('data-flix-distributor', distributor);
    flixScript.setAttribute('data-flix-language', language);
    flixScript.setAttribute('data-flix-fallback-language', fallback_language);
    flixScript.setAttribute('data-flix-brand', product_brand);
    flixScript.setAttribute('data-flix-ean', product_ean);
    flixScript.setAttribute('data-flix-mpn', product_mpn); flixScript.setAttribute('data-flix-button', 'flix-minisite');
    flixScript.setAttribute('data-flix-inpage', 'flix-inpage');
    flixScript.setAttribute('data-flix-price', '');
    headID.appendChild(flixScript);
    flixScript.onload = function () {
        if (typeof (flixJsCallbacks) === "object") {
            flixJsCallbacks.setLoadCallback(function () {
                try {
                    jQuery('#Jpills-five-example1-tab').show()
                    jQuery('#flex-media-about').show()
<!--                    jQuery('#Jpills-five-example1-tab').click()-->
                } catch (e) {}
            }, 'inpage');
        } ;
    }
     </script>
     <script>
$(document).ready(function() {

    // $('.updatecart').on('click',function(){
    //     var productID = this.dataset.product
    //     var onsitego = '';
    //     if ($(".onsitego-checkbox:checkbox:checked")) {
    //         onsitego =$(".onsitego-checkbox:checkbox:checked").val();
            
    //     }
        
    //     var prod_total_damage_dict = '';
    //     if ($(".prod_total_damage_dict:checkbox:checked")) {
    //         prod_total_damage_dict = $(".prod_total_damage_dict:checkbox:checked").val();
    //     }
    //     var prod_screen_protection_dict = '';
    //     if ($(".prod_screen_protection_dict:checkbox:checked")) {
    //         prod_screen_protection_dict = $(".prod_screen_protection_dict:checkbox:checked").val();
    //     }
    //     var prod_ew_dict = "";
    //     if ($(".prod_ew_dict:checkbox:checked")) {
    //         prod_ew_dict = $(".prod_ew_dict:checkbox:checked").val();
    //     }
    //     var exchangeApplied = $("#exchangeApplied").val();
    //     var exchangeWorking = $("#exchangeWorking").val();
    //     var exchangebrand = $("#exchangebrand").val();
    //     var exchangeModel = $("#exchangeModel").val();
    //     $.ajax({
    //                 type: "POST",
    //                 url: '/addToCart',
    //                 data: 'csrfmiddlewaretoken=vNmjZMdfOLYgLaCL5kOwSQcJjQYpDbLkQxbppzbUtXlxGBbA0IqhI1uSGQhqYD1E&product_id='+productID+'&action=add&qty=1&OnsiteGoEW='+onsitego+'&Screen_Protection_EW='+prod_screen_protection_dict+'&Total_Damage_EW='+prod_total_damage_dict+'&ExtendedWarranty=&exchangeApplied='+exchangeApplied+"&exchangeWorking="+exchangeWorking+"&exchangebrand="+exchangebrand+"&exchangeModel="+exchangeModel+"&prod_ew_dict="+prod_ew_dict,
    //                 success: function(response) {
    //                     if (response.status == 'SUCCESS'){
    //                         $('#cartcount').html(response.data)
    //                         notification('Product successfully added to your cart.')
    //                          if (response.data != 0){
    //                             $('#cartcount').removeClass('opacity-0')
    //                         }else {
    //                             $('#cartcount').addClass('opacity-0')
    //                         }
    //                         $(this).html('added')
    //                         loadCartData()
    //                     }else{
    //                         notification(response.msg)
    //                     }
    //                 },
    //                 error: function(error) {
    //                     console.log(error.responseJSON)
    //                 }
    //             });
    // })
    $('.buynow').on('click',function(){
        var productID = this.dataset.product
        var onsitego = '';
        if ($(".onsitego-checkbox:checkbox:checked")) {
            onsitego =$(".onsitego-checkbox:checkbox:checked").val();
            
        }
        
        var prod_total_damage_dict = '';
        if ($(".prod_total_damage_dict:checkbox:checked")) {
            prod_total_damage_dict = $(".prod_total_damage_dict:checkbox:checked").val();
        }
        var prod_screen_protection_dict = '';
        if ($(".prod_screen_protection_dict:checkbox:checked")) {
            prod_screen_protection_dict = $(".prod_screen_protection_dict:checkbox:checked").val();
        }
        var prod_ew_dict = "";
        if ($(".prod_ew_dict:checkbox:checked")) {
            prod_ew_dict = $(".prod_ew_dict:checkbox:checked").val();
        }
        var exchangeApplied = $("#exchangeApplied").val();
        var exchangeWorking = $("#exchangeWorking").val();
        var exchangebrand = $("#exchangebrand").val();
        var exchangeModel = $("#exchangeModel").val();
        $.ajax({
                    type: "POST",
                    url: '/buyNow',
                    data: 'csrfmiddlewaretoken=vNmjZMdfOLYgLaCL5kOwSQcJjQYpDbLkQxbppzbUtXlxGBbA0IqhI1uSGQhqYD1E&product_id='+productID+'&action=add&qty=1&OnsiteGoEW='+onsitego+'&Screen_Protection_EW='+prod_screen_protection_dict+'&Total_Damage_EW='+prod_total_damage_dict+'&ExtendedWarranty=&exchangeApplied='+exchangeApplied+"&exchangeWorking="+exchangeWorking+"&exchangebrand="+exchangebrand+"&exchangeModel="+exchangeModel+"&prod_ew_dict="+prod_ew_dict,
                    success: function(response) {
                        if (response.status == 'SUCCESS'){
                            $('#cartcount').html(response.data)
                            notification('Product successfully added to your cart.')
                            if (response.data != 0){
                                $('#cartcount').removeClass('opacity-0')
                            }else {
                                $('#cartcount').addClass('opacity-0')
                            }
                            $(this).html('added')
                            //loadCartData()
                            location.href= '/checkout/?identifier=' + response.identifier;
                        }else{
                            notification(response.msg)
                        }
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
    })
    loadCartData()
    function loadCartData(){
        //cart_data
        $.ajax({
            type: "POST",
            url: '/loadCartCount',
            data: 'csrfmiddlewaretoken=vNmjZMdfOLYgLaCL5kOwSQcJjQYpDbLkQxbppzbUtXlxGBbA0IqhI1uSGQhqYD1E',
            success: function(response) {
                $('.cart_data').html(response)
            },
            error: function(error) {
                console.log(error.responseJSON)
            }
        });
    }
    $('#storeGet').submit(function () {
        $('#storepincodemsg').empty();
        var storepincode = $('input[name=pincode]').val();
        var is_valid = $.isNumeric(storepincode)
        if (storepincode == ''){
            $('#storepincodemsg').html('<span class="text-red">Enter 6 digit area pincode</span>');
            return false
        }else if((is_valid == false)){
            $('#storepincodemsg').html('<span class="text-red">Enter 6 digit valid pincode</span>');
            return false
        }
        storeget(storepincode,true)
        return false;
    })
    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }

    var getPincode = getCookie('pincode');
    if(getPincode != undefined){
        storeget(getPincode,false)
    }
    function storeget(storepincode,open){
        $.ajax({
                type: "POST",
                url: '/find-store-appointment-first',
                data: 'csrfmiddlewaretoken=vNmjZMdfOLYgLaCL5kOwSQcJjQYpDbLkQxbppzbUtXlxGBbA0IqhI1uSGQhqYD1E&store_pincode='+storepincode,
                success: function(response) {
                    if (response.data.length == 0){
                        $('#storepincodemsg').html('<span class="text-red">Store not found!</span>');
                    }else{
                        if (response.data.length > 0){
                            Cookies.set('pincode', storepincode);
                            var manager_img = response.data[0].store_manager_photo
                            var fcName = response.data[0].fcName
                            var contactPerson = response.data[0].contactPerson
                            var fcId = response.data[0].fcId
                            var profile = $('.kohiapp-post-profile')
                            profile.find('img').attr('src',manager_img)
                            profile.find('.title').text(contactPerson)
                            profile.find('.store-name').text(fcName)
                            $('#store_id').val(fcId)
                           if(open == true){
                            $('#AreaPincodeModal').modal('hide')
                            $('#ConnectToStoreModal').modal('show')
                            }
                        }
                    }
                },
                error: function(error) {
                    console.log(error.responseJSON)
                }
            });
    }
          AddReadMore();
    $('#service-charge span').html($('.spill_drop').data('mrp'))
});
function AddReadMore() {
        //This limit you can set after how much characters you want to show Read More.
        var carLmt = 80;
        // Text to show when text is collapsed
        var readMoreTxt = " ... Read More";
        // Text to show when text is expanded
        var readLessTxt = " Read Less";
        //Traverse all selectors with this class and manupulate HTML part to show Read More
        $(".add-Read-More").each(function() {
            if ($(this).find(".firstSec").length)
                return;
            var allstr = $.trim($(this).text());
            if (allstr.length > carLmt) {
                var firstSet = allstr.substring(0, carLmt);
                var secdHalf = allstr.substring(carLmt, allstr.length);
                var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='read-More'  title='Click to Show More'>" + readMoreTxt + "</span><span class='read-Less' title='Click to Show Less'>" + readLessTxt + "</span>";
                $(this).html(strtoadd);
            }
        });
        //Read More and Read Less Click Event binding
        $(document).on("click", ".read-More,.read-Less", function() {
            $(this).closest(".add-Read-More").toggleClass("showlesscontent showmorecontent");
        });
    }
</script>

 
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
<!-- ========== Body ========== -->


<script>
    <?php $product_name=$product_data['product_title']
    
    ?>
    $(document).on("click","#updatecart",function() {
    var product_id=<?=$product_id?>;
    var product_price=<?=$product_data['product_price']?>;
    var product_name='<?=$product_name?>';
    var product_image='<?=$product_data['featurd_image']?>';
    var product_qty=1;
    var add_to_cart='add_to_cart';
    console.log(product_name);
    $.ajax({
                    type: "POST",
                    url: '<?php echo $asset_url?>web_action/add_cart.php',
                    data: {
                        product_id:product_id,
                        product_name:product_name,
                        add_to_cart:add_to_cart,
                        product_price:product_price,
                        product_qty:product_qty,
                        product_image:product_image,
                        
                        },
                    dataType:'json',
                    success: function(response) {
                        getCartCount();
                        
                        if (response.status == 'SUCCESS'){
                            
                             Swal.fire(
                          'Thank You!',
                          'Product Added To Your Cart SuccessFully!!',
                          'success'
                        ) ; 
                        }else{
                            alert(response.msg)
                        }
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
    
    // console.log(product_price);
});
</script>


<?php include 'footer.php';?>