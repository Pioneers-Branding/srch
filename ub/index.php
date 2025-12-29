<?php include 'header.php';
// include 'web_action/config.php';
 
// error_reporting(E_ALL); 

// $category_result = $db->dbperform("select * from `tbl_category`");
$category_result_home = $db->dbperform("select * from `tbl_category` WHERE shown_home=1");



?>
<style>
    .feature_cls .item {
    width: 100%;
    height: 100%;
}
    .trend_cls .item {
    width: 100%;
    height: 100%;
}
.item {
    height: unset;
}
</style>



<!-- <script>$("#search-form").submit(function (r) {r.preventDefault(), keyword = $("#searchproduct-item").val().trim(), searchBar(keyword)});$(".mobile-search-form").submit(function (r) {r.preventDefault(), keyword = $("#search-mobile-view").val().trim(), searchBar(keyword)});function searchBar(e){e?(url=`/search/${e}`,window.location.replace(url)):notification("Please enter search keyword")};</script> -->
<script>$("#search-form").submit(function (r) {r.preventDefault(), keyword = $("#searchproduct-item").val().trim().replace("index.php", " "), searchBar(keyword)});$(".mobile-search-form").submit(function (r) {r.preventDefault(), keyword = $("#search-mobile-view").val().trim().replace("index.php", " "), searchBar(keyword)});function searchBar(e){e?(url=`/search/${e}`,window.location.replace(url)):notification("Please enter search keyword")};</script>
<style>.mb-location:before{content:'You are in '}.mb-location:after,.mb-no-location:after{content:'CHANGE';font-size:12px;color:#049FE2;float:right;line-height:22px}.current-location-container.popup .current-location{max-width:1200px;overflow:hidden;min-width:1100px;margin:auto;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)}.current-location-container.popup .current-location-selected{display:none}.current-location-container.popup .current-location-title{font-size:20px;line-height:36px}.current-location-container.popup .search-container .justify-content-center{justify-content:left!important}@media screen and (max-width:768px){.current-location-container.popup .current-location{max-width:100%;overflow-y:scroll;min-width:100%;height:100%;margin:auto;position:absolute;top:0;left:0;transform:none;padding-bottom:30px}.current-location-container.popup .current-location-title{font-size:16px;line-height:36px;margin-bottom:10px}.search-container{text-align:center}.location-heading{margin-top:0}ul.store-list li{display:inline-block;width:calc(100%/2);margin-bottom:10px;text-align:left}ul.store-list{padding:0;list-style:none;display:block;margin:14px auto;max-width:300px}.current-location-container.popup .current-location-selected{position:fixed;width:100%;bottom:0;display:block}.current-location-container.popup .btn-section-current-location .btn-current-location{padding:7px 10px}.current-location-container.popup .current-location-selected .container{padding-right:0}.current-location-container.popup .btn-section-current-location:after{top:12px}.current-location-container.popup .or{margin:10px 0}.current-location-container.popup .current-location .btn{padding:5px 15px;font-size:14px}}@media screen and (min-width:769px){.current-location-container.popup .store-list li{border:1px solid #ddd;width:auto;padding:5px 15px;margin-right:15px;margin-bottom:15px;border-radius:20px;background:#e6e6e6;box-shadow:0 0 5px 0 #ddd}.current-location-container.popup .store-list li:hover{box-shadow:0 4px 8px 0 #ddd;background:#049FE2;color:#fff}}@media screen and (width:768px){ul.store-list{padding:0;list-style:none;display:block;margin:14px auto;max-width:100%}.current-location-container.popup .current-location .btn{padding:.375rem .75rem;font-size:16px}ul.store-list li{width:calc(100%/4)}}.current-location-container.popup .current-location .close-current-location{display:none}</style>
    <!-- ========== Page ========== -->
    <style>
    @media screen and (max-width: 460px)
    {
         .w-100{height: 180px !important;}
    }
       
    </style>
    
<main id="content">

    
    <div id="main-slider" class="carousel slide carousel-fade main-slider" data-bs-ride="carousel" data-section-id="0">
        <div class="carousel-inner">
            
                
            <?php
            $slider_data = $db->dbperform("select * from `tbl_slider`");
            $i=0;
            foreach($slider_data as $row){
            ?>
            
                <div class="carousel-item  <?=$i==0 ? 'active' : '';?>">
                
                    
                        <a href="#" >
                            <img src="<?=$asset_url?>admin/assets/<?=$row['slider_image']?>" class="d-block w-100" alt="banner"/>
                        </a>
                    
                    
                </div>
            
            <?php $i++ ; }?>
            
            <!--<div class="carousel-item ">-->
                
                    
            <!--            <a href="shop/televisions/oled/index.php" target="_blank">-->
            <!--                <img src="./d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/fit-in/1440x500/images/home_banner/16613_ID-Day_FL_Retailer-Banner__1.jpg" class="d-block w-100" alt="banner"/>-->
            <!--            </a>-->
                    
                    
            <!--    </div>-->
                
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#main-slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#main-slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    

    
    
        <div class="section pt-2 pt-3 pb-lg-4 pb-3" id="page-2" >
            <div class="container">
                <div class="product-category-slider owl-carousel owl-theme">
                <?php foreach($category_result_home as $row ){?>
                    <div class="item">
                        <a href="product.php?cat_id=<?=$row['cat_pk_id']?>">
                            <div class="prod-category-box">
                                <img src="<?= $asset_url?>admin/assets/<?=$row['cat_image']?>"
                                    alt="Air Conditioner" />
                                <h4><?=$row['category']?></h4>
                            </div>
                        </a>
                    </div>
            <?php    }?>
                    <!--<div class="item">-->
                    <!--    <a href="product.php">-->
                    <!--        <div class="prod-category-box">-->
                    <!--            <img src="d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/fit-in/120x120/images/1_bluetooth_speakers_gcGCLeR.png"-->
                    <!--                alt="Home Entertainment" />-->
                    <!--            <h4>Home Entertainment</h4>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                
                    <!--<div class="item">-->
                    <!--    <a href="product.php">-->
                    <!--        <div class="prod-category-box">-->
                    <!--            <img src="d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/fit-in/120x120/images/1_tv_76CKeIt.png"-->
                    <!--                alt="Televisions" />-->
                    <!--            <h4>Televisions</h4>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                
                    <!--<div class="item">-->
                    <!--    <a href="product.php">-->
                    <!--        <div class="prod-category-box">-->
                    <!--            <img src="d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/fit-in/120x120/images/1_washing_machine_IMkruDn.png"-->
                    <!--                alt="Washing Machine" />-->
                    <!--            <h4>Washing Machine</h4>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                
                    <!--<div class="item">-->
                    <!--    <a href="product.php">-->
                    <!--        <div class="prod-category-box">-->
                    <!--            <img src="d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/fit-in/120x120/images/1_laptop.png"-->
                    <!--                alt="Computers" />-->
                    <!--            <h4>Computers</h4>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                
                    <!--<div class="item">-->
                    <!--    <a href="product.php">-->
                    <!--        <div class="prod-category-box">-->
                    <!--            <img src="d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/fit-in/120x120/images/1-12_Ayq5Xht.png"-->
                    <!--                alt="Refrigerator" />-->
                    <!--            <h4>Refrigerator</h4>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                
                    <!--<div class="item">-->
                    <!--    <a href="product.php">-->
                    <!--        <div class="prod-category-box">-->
                    <!--            <img src="d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/fit-in/120x120/images/1_Mobile_784q8lp.png"-->
                    <!--                alt="Mobiles" />-->
                    <!--            <h4>Mobiles</h4>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                
                    <!--<div class="item">-->
                    <!--    <a href="product.php">-->
                    <!--        <div class="prod-category-box">-->
                    <!--            <img src="d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/fit-in/120x120/images/1_fan_UbLdfsJ.png"-->
                    <!--                alt="Home Appliances" />-->
                    <!--            <h4>Home Appliances</h4>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                
                    <!--<div class="item">-->
                    <!--    <a href="product.php">-->
                    <!--        <div class="prod-category-box">-->
                    <!--            <img src="d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/fit-in/120x120/images/1_microwave_S7WUgvw.png"-->
                    <!--                alt="Kitchen Appliances" />-->
                    <!--            <h4>Kitchen Appliances</h4>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                
                    <!--<div class="item">-->
                    <!--    <a href="product.php">-->
                    <!--        <div class="prod-category-box">-->
                    <!--            <img src="d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/fit-in/120x120/images/1_camera.png"-->
                    <!--                alt="Camera" />-->
                    <!--            <h4>Camera</h4>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                
                    <!--<div class="item">-->
                    <!--    <a href="product.php">-->
                    <!--        <div class="prod-category-box">-->
                    <!--            <img src="d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/fit-in/120x120/images/1_hair-blower.png"-->
                    <!--                alt="Personal Care" />-->
                    <!--            <h4>Personal Care</h4>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                
                </div>
            </div>
        </div>
    

    
    

    <div id="home_data" data-id="[{&quot;id&quot;: 1, &quot;section&quot;: &quot;Banner&quot;}, {&quot;id&quot;: 2, &quot;section&quot;: &quot;All Categories horizontal&quot;}, {&quot;id&quot;: 3, &quot;section&quot;: &quot;Featured/Trending Product&quot;}, {&quot;id&quot;: 4, &quot;section&quot;: &quot;4 group large&quot;}, {&quot;id&quot;: 5, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 6, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 7, &quot;section&quot;: &quot;single full width&quot;}, {&quot;id&quot;: 8, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 9, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 10, &quot;section&quot;: &quot;4 group small&quot;}, {&quot;id&quot;: 11, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 12, &quot;section&quot;: &quot;single large&quot;}, {&quot;id&quot;: 13, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 14, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 15, &quot;section&quot;: &quot;Recently viewed&quot;}, {&quot;id&quot;: 16, &quot;section&quot;: &quot;Company UPS&quot;}, {&quot;id&quot;: 17, &quot;section&quot;: &quot;Top Brands&quot;}]">

<div class="section py-lg-4 animated fadeIn" data-section-id="null">
   <div class="container">
      <div class="position-relative bg-white text-center z-index-2">
         <ul class="nav nav-pills justify-content-center feature-treading" id="pills-tab" role="tablist">
            <li class="nav-item"> <a class="nav-link active" id="pills-one-Featured-tab" data-bs-toggle="pill" href="#pills-one-Featured" role="tab" aria-controls="pills-one-Featured" aria-selected="true">Featured</a></li>
           <!-- <li class="nav-item"> <a class="nav-link " id="pills-two-Treading-tab" data-bs-toggle="pill" href="#pills-two-Treading" role="tab" aria-controls="pills-two-Treading" aria-selected="false">Trending</a></li>-->
         </ul>
      </div>
      <div class="tab-content" id="pills-tabContent">
         <div class="tab-pane fade pt-2 show active" id="pills-one-Featured" role="tabpanel" aria-labelledby="pills-one-Featured-tab">
            <div id="Featured-slider" class="feature_cls product-card-slider owl-carousel owl-theme owl-loaded owl-drag">
               <div class="owl-stage-outer">
                  <div class="owl-stage" style="transform: translate3d(-2352px, 0px, 0px); transition: all 7s ease 0s; width: 3822px;">
                      <?php
                      
                   $product_result = $db->dbperform("select * from `tbl_product` WHERE Featured=1");
                   
                   
                //   $productsql ="select * from `tbl_product` WHERE Featured=1";
                //                         $product_result = mysqli_query($con,$productsql);
            
                                        
                    ?> 
                    
                    
                    <?php foreach($product_result as $row) {
                    ?>
                     <div class="owl-item" style="width: 294px;">
                        <div class="item">
                           <div class="product-card">
                              <div class="product-item-inner">
                                 <div class="product-item-body">
                                    <div class="product-add-on">
                                       <div class="product-coupon"></div>
                                       <div class="product-addon-btn"> <button class="quick-view optacity-0" data-id="1604"><i class="bi bi-eye"></i></button> <button class="wishlist-btn" data-id="1604"></button></div>
                                    </div>
                                    <a href="<?=$asset_url?>product_details.php?product_id=<?=$row['product_pk_id']?>">
                                       <div class="product-img"> <img class="img-fluid owl-lazy" src="<?=$asset_url?>admin/assets/<?=$row['featurd_image']?>" data-src="<?=$asset_url?>admin/assets/<?=$row['featurd_image']?>" alt="" style="opacity: 1;"> </div>
                                    </a>
                                    <a href="<?=$asset_url?>product_details.php?product_id=<?=$row['product_pk_id']?>" class="product-title"><?=$row['product_title']?></a>
                                    <div class="price-label">Our Price</div>
                                    <div class="product-price-box">
                                       <h6 class="product-price">₹<?=$row['product_price']?></h6>
                                       <span class="dis-per-sm ml-2">Special Offer</span>
                                       <div class="product-discount">MRP <del>₹<?=$row['discount']?></del></div>
                                    </div>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="d-flex justify-content-between"> <button class="product-cart-btn add-cart add_Cart"
                                        data-id="<?=$row['product_pk_id']?>"
                                        data-id="<?=$row['product_pk_id']?>"
                                        data-name="<?=$row['product_title']?>"
                                        data-image="<?=$row['featurd_image']?>"
                                        data-price="<?=$row['product_price']?>"
                                        data-qty="1"
                                    >Add Cart</button> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php }?>
                     
                  </div>
               </div>
               <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="bi bi-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="bi bi-chevron-right"></i></button></div>
               <div class="owl-dots disabled"></div>
            </div>
         </div>
         <div class="tab-pane fade pt-2" id="pills-two-Treading" role="tabpanel" aria-labelledby="pills-two-Treading-tab">
            <div id="Treading-slider" class="product-card-slider trend_cls owl-carousel owl-theme owl-loaded owl-drag">
               <div class="owl-stage-outer">
                  <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s;">
                     <div class="owl-item">
                        <div class="item">
                           <div class="product-card">
                              <div class="product-item-inner">
                                 <div class="product-item-body">
                                    <div class="product-add-on">
                                       <div class="product-coupon"></div>
                                       <div class="product-addon-btn"> <button class="quick-view optacity-0" data-id="323"><i class="bi bi-eye"></i></button> <button class="wishlist-btn" data-id="323"></button></div>
                                    </div>
                                    <a href="/product/323/lg-puricare-ro-mineral-booster-water-purifier-with-dual-protection-stainless-steel-tank-ww140np-black/">
                                       <div class="product-img"> <img class="img-fluid owl-lazy" src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/1_rKaByoU.jpg" data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/1_rKaByoU.jpg" alt="" style="opacity: 1;"> </div>
                                    </a>
                                    <a href="/product/323/lg-puricare-ro-mineral-booster-water-purifier-with-dual-protection-stainless-steel-tank-ww140np-black/" class="product-title">LG Puricare RO + Mineral Booster Water Purifier with Dual Protection Stainless Steel Tank (WW140NP, Black)</a>
                                    <div class="price-label">Our Price</div>
                                    <div class="product-price-box">
                                       <h6 class="product-price">₹17135</h6>
                                       <span class="dis-per-sm ml-2">27% off</span>
                                       <div class="product-discount">MRP <del>₹23499</del></div>
                                    </div>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="d-flex justify-content-between"> <button class="product-compare add-compare" data-compare-id="323">Compare</button><button class="product-cart-btn add-cart" data-id="323">Add Cart</button> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item">
                        <div class="item">
                           <div class="product-card">
                              <div class="product-item-inner">
                                 <div class="product-item-body">
                                    <div class="product-add-on">
                                       <div class="product-coupon"></div>
                                       <div class="product-addon-btn"> <button class="quick-view optacity-0" data-id="698"><i class="bi bi-eye"></i></button> <button class="wishlist-btn" data-id="698"></button></div>
                                    </div>
                                    <a href="/product/698/whirlpool-20-l-convection-microwave-oven-magicook-pro-22ce-black/">
                                       <div class="product-img"> <img class="img-fluid owl-lazy" src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/1_egiRv8d.jpg" data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/1_egiRv8d.jpg" alt="" style="opacity: 1;"> </div>
                                    </a>
                                    <a href="/product/698/whirlpool-20-l-convection-microwave-oven-magicook-pro-22ce-black/" class="product-title">Whirlpool 20 L Convection Microwave Oven  (Magicook Pro 22CE, Black)</a>
                                    <div class="price-label">Our Price</div>
                                    <div class="product-price-box">
                                       <h6 class="product-price">₹9380</h6>
                                       <span class="dis-per-sm ml-2">37% off</span>
                                       <div class="product-discount">MRP <del>₹15050</del></div>
                                    </div>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="d-flex justify-content-between"> <button class="product-compare add-compare" data-compare-id="698">Compare</button><button class="product-cart-btn add-cart" data-id="698">Add Cart</button> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item">
                        <div class="item">
                           <div class="product-card">
                              <div class="product-item-inner">
                                 <div class="product-item-body">
                                    <div class="product-add-on">
                                       <div class="product-coupon"></div>
                                       <div class="product-addon-btn"> <button class="quick-view optacity-0" data-id="898"><i class="bi bi-eye"></i></button> <button class="wishlist-btn" data-id="898"></button></div>
                                    </div>
                                    <a href="/product/898/lg-20-litres-ms2043db-solo-microwave-oven-black/">
                                       <div class="product-img"> <img class="img-fluid owl-lazy" src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/1_oMBW578.jpg" data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/1_oMBW578.jpg" alt="" style="opacity: 1;"> </div>
                                    </a>
                                    <a href="/product/898/lg-20-litres-ms2043db-solo-microwave-oven-black/" class="product-title">LG 20 L Solo Microwave Oven  (MS2043DB, Black)</a>
                                    <div class="price-label">Our Price</div>
                                    <div class="product-price-box">
                                       <h6 class="product-price">₹6131</h6>
                                       <span class="dis-per-sm ml-2">30% off</span>
                                       <div class="product-discount">MRP <del>₹8799</del></div>
                                    </div>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="d-flex justify-content-between"> <button class="product-compare add-compare" data-compare-id="898">Compare</button><button class="product-cart-btn add-cart" data-id="898">Add Cart</button> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item">
                        <div class="item">
                           <div class="product-card">
                              <div class="product-item-inner">
                                 <div class="product-item-body">
                                    <div class="product-add-on">
                                       <div class="product-coupon"></div>
                                       <div class="product-addon-btn"> <button class="quick-view optacity-0" data-id="909"><i class="bi bi-eye"></i></button> <button class="wishlist-btn" data-id="909"></button></div>
                                    </div>
                                    <a href="/product/909/samsung-mc28a5145vktl-28-l-convection-microwave-oven-black-2021/">
                                       <div class="product-img"> <img class="img-fluid owl-lazy" src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/SAMSUNG_MC 28A5145VK_1.jpg" data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/SAMSUNG_MC 28A5145VK_1.jpg" alt="" style="opacity: 1;"> </div>
                                    </a>
                                    <a href="/product/909/samsung-mc28a5145vktl-28-l-convection-microwave-oven-black-2021/" class="product-title">Samsung MC28A5145VK/TL 28 L Convection Microwave Oven ( Black) 2021</a>
                                    <div class="price-label">Our Price</div>
                                    <div class="product-price-box">
                                       <h6 class="product-price">₹16900</h6>
                                       <span class="dis-per-sm ml-2">23% off</span>
                                       <div class="product-discount">MRP <del>₹21990</del></div>
                                    </div>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="d-flex justify-content-between"> <button class="product-compare add-compare" data-compare-id="909">Compare</button><button class="product-cart-btn add-cart" data-id="909">Add Cart</button> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item">
                        <div class="item">
                           <div class="product-card">
                              <div class="product-item-inner">
                                 <div class="product-item-body">
                                    <div class="product-add-on">
                                       <div class="product-coupon"></div>
                                       <div class="product-addon-btn"> <button class="quick-view optacity-0" data-id="1483"><i class="bi bi-eye"></i></button> <button class="wishlist-btn" data-id="1483"></button></div>
                                    </div>
                                    <a href="/product/1483/havells-bianca-10-litre-vertical-storage-water-heater-geyser-white-blue-5-star/">
                                       <div class="product-img"> <img class="img-fluid owl-lazy" src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/havells_10L_1.jpg" data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/havells_10L_1.jpg" alt="" style="opacity: 1;"> </div>
                                    </a>
                                    <a href="/product/1483/havells-bianca-10-litre-vertical-storage-water-heater-geyser-white-blue-5-star/" class="product-title">Havells Bianca 10-Litre Vertical Storage Water Heater (Geyser) White-Blue 5 Star</a>
                                    <div class="price-label">Our Price</div>
                                    <div class="product-price-box">
                                       <h6 class="product-price">₹10194</h6>
                                       <span class="dis-per-sm ml-2">40% off</span>
                                       <div class="product-discount">MRP <del>₹16990</del></div>
                                    </div>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="d-flex justify-content-between"> <button class="product-compare add-compare" data-compare-id="1483">Compare</button><button class="product-cart-btn add-cart" data-id="1483">Add Cart</button> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="owl-item">
                        <div class="item">
                           <div class="product-card">
                              <div class="product-item-inner">
                                 <div class="product-item-body">
                                    <div class="product-add-on">
                                       <div class="product-coupon"></div>
                                       <div class="product-addon-btn"> <button class="quick-view optacity-0" data-id="1831"><i class="bi bi-eye"></i></button> <button class="wishlist-btn" data-id="1831"></button></div>
                                    </div>
                                    <a href="/product/1831/samsung-28-l-convection-microwave-oven-mc28a5025vs-silver/">
                                       <div class="product-img"> <img class="img-fluid owl-lazy" src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/MC28A5025VS_1.jpg" data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/fit-in/255x255/images/MC28A5025VS_1.jpg" alt="" style="opacity: 1;"> </div>
                                    </a>
                                    <a href="/product/1831/samsung-28-l-convection-microwave-oven-mc28a5025vs-silver/" class="product-title">Samsung 28 L Convection Microwave Oven (MC28A5025VS, Silver)</a>
                                    <div class="price-label">Our Price</div>
                                    <div class="product-price-box">
                                       <h6 class="product-price">₹14102</h6>
                                       <span class="dis-per-sm ml-2">25% off</span>
                                       <div class="product-discount">MRP <del>₹18990</del></div>
                                    </div>
                                 </div>
                                 <div class="product-item-footer">
                                    <div class="d-flex justify-content-between"> <button class="product-compare add-compare" data-compare-id="1831">Compare</button><button class="product-cart-btn add-cart" data-id="1831">Add Cart</button> </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="bi bi-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="bi bi-chevron-right"></i></button></div>
               <div class="owl-dots disabled"></div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="section pt-2 pt-3 pb-lg-4 pb-3 bg-soft-light">
   <div class="container">
      <div class="row g-2">
         <div class="col-lg-6 col-6"><a href="#" class="offer-banner"><img class="img-fluid lazy" src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/images/static_banner/Category_Page_Banners_12-11.png" srcset="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/565x198/images/static_banner/Category_Page_Banners_12-11.png 1368w, https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/680x365/images/static_banner/Category_Page_Banners_12-11.png 1600w" style=""></a></div>
         <div class="col-lg-6 col-6"><a href="#" class="offer-banner"><img class="img-fluid lazy" src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/images/static_banner/category_page_home_appliances.png" srcset="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/565x198/images/static_banner/category_page_home_appliances.png 1368w, https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/680x365/images/static_banner/category_page_home_appliances.png 1600w" style=""></a></div>
         <div class="col-lg-6 col-6"><a href="#" class="offer-banner"><img class="img-fluid lazy" src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/images/static_banner/Category_Page_Banners_12-03wm.png" srcset="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/565x198/images/static_banner/Category_Page_Banners_12-03wm.png 1368w, https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/680x365/images/static_banner/Category_Page_Banners_12-03wm.png 1600w" style=""></a></div>
         <div class="col-lg-6 col-6"><a href="#" class="offer-banner"><img class="img-fluid lazy" src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/images/static_banner/Category_Page_Banners_12-04_iZFxgbt.png" srcset="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/565x198/images/static_banner/Category_Page_Banners_12-04_iZFxgbt.png 1368w, https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/680x365/images/static_banner/Category_Page_Banners_12-04_iZFxgbt.png 1600w" style=""></a></div>
      </div>
   </div>
</div>


<div class="container" style="margin-bottom: 25px;">
    <div class="row">
        <div class="col-md-12">
            <img src="UB-ELECTRONICS-diwali-offer.png" style="width: 100%;">
        </div>
    </div>
    
</div>


</div>
    

    
    

    
    

    
    

    
    

    

<div id="home_data" data-id='[{&quot;id&quot;: 1, &quot;section&quot;: &quot;Banner&quot;}, {&quot;id&quot;: 2, &quot;section&quot;: &quot;All Categories horizontal&quot;}, {&quot;id&quot;: 3, &quot;section&quot;: &quot;Featured/Trending Product&quot;}, {&quot;id&quot;: 4, &quot;section&quot;: &quot;4 group large&quot;}, {&quot;id&quot;: 5, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 6, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 7, &quot;section&quot;: &quot;single full width&quot;}, {&quot;id&quot;: 8, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 9, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 10, &quot;section&quot;: &quot;4 group small&quot;}, {&quot;id&quot;: 11, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 12, &quot;section&quot;: &quot;single large&quot;}, {&quot;id&quot;: 13, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 14, &quot;section&quot;: &quot;Category data&quot;}, {&quot;id&quot;: 15, &quot;section&quot;: &quot;Recently viewed&quot;}, {&quot;id&quot;: 16, &quot;section&quot;: &quot;Company UPS&quot;}, {&quot;id&quot;: 17, &quot;section&quot;: &quot;Top Brands&quot;}]'>

</div><!--<div class="lazy-data">
    <svg id="dots" width="100%" height="58px" viewBox="0 0 132 58" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>Loader</title>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="dots" sketch:type="MSArtboardGroup" fill="#049FE2">
            <circle id="dot1" sketch:type="MSShapeGroup" cx="20" cy="30" r="8"></circle>
            <circle id="dot2" sketch:type="MSShapeGroup" cx="50" cy="30" r="8"></circle>
            <circle id="dot3" sketch:type="MSShapeGroup" cx="80" cy="30" r="8"></circle>
          <circle id="dot4" sketch:type="MSShapeGroup" cx="110" cy="30" r="8"></circle>
        </g>
    </g>
</svg>
</div>-->
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
</script>
 <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js">
   </script>
   <script type="text/javascript">
	var owl = $('#pills-tabContent .owl-carousel');
owl.owlCarousel({
    items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    mouseDrag: true,
    responsiveClass: true,
    responsive: {
        0:{
          items: 2
        },
        480:{
          items: 3
        },
        769:{
          items: 4
        }
    }
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[2000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
</script>

<?php include 'footer.php';?>