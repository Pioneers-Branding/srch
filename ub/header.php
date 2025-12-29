<?php
ob_start();
session_start();
   
$asset_url =  (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]".'/ub/';

require_once"admin/classes/dbconfig.php";
 $db= new dbconfig(); 
$category_result = $db->dbperform("select * from `tbl_category`");

// print_r($category_result); die();

      
  
?>

<!doctype html>
<style>
.search-bar-category{border-radius: 0 !important; border: solid 2px #2D2554 !important;}

.showdata_list{
    display:flex;
    list-style:none;
    justify-content:space-around;
    text-transform: uppercase;
    padding: 10px 100px;
    font-size: 12px;
}

.showdata_list li a {color: #000 !important;}

.showData{
            display: none;
            position:fixed;
            left:0;
        }
    
 
    
        .show:hover .showData{
    
    display:grid;
    grid-template-columns: 15% 15% 15% 15% 20%  20%;
    cursor:pointer;
    
    /* justify-content: space-around; */
    /* gap:100px; */
    width:90%;
    margin-left: 5% !important;
   BORDER-RADIUS: 0 !important;
    position:absolute;
    top:135px;
    padding-bottom: 30px !important;
    border-bottom: #666 solid 2px;
    
    
    /* margin: auto; */
    /* overflow-y:scroll; */
    /* background: rgb(84, 7, 7); */
    background:white;
    /* color:white; */
    /* background: #000; */
    /* color:white; */
    /* color:white; */
    z-index:10;
    border-radius:5px;
}


/* .hover_1{
    display: grid;
    grid-template-columns: 15% 15% 15% 15% 15% 25%;
    border: 1px solid red;

} */

.center1{
    color:rgb(2, 18, 18);
    margin-top: 15px;
    margin-left: 10px;
    /* border: 2px solid red; */

}
.center2{
    top: 70px;
}



.dropdown-menu{
    display:block !important;
}

ul.mega-menu {
    display: flex;
    list-style: none;
    gap: 15px;
    justify-content: flex-start;
    padding: 0;
   
}


.category .dropdown-item{
    padding:0 !important;
}

.megasubmenu{
    display: none;
    position: absolute;
    top: 100%;
    
    width: 100%; /* Takes the width of the container */
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 10px;
    top: 18px!important;
    left: -43px!important;
    z-index:999;
}

/*.megasubmenu {*/
/*    padding: 0;*/
/*    border: 0;*/
/*    padding-left: 15px;*/
/*    box-shadow: 6px 6px 10px 0 #eee;*/
/*    background: #f8f9fa!important;*/
    
    /* right: 14px; */
/*}*/

.has-megasubmenu{
    position:relative;
}

.has-megasubmenu:hover .megasubmenu{
   display:block;
   
}


.new_top_drop a {
    color: var(--white-color);
    font-size: .813rem;
}
.new_top_drop .dropdown-menu.mega-menu {
    z-index: 9999;
    display:block;
}
.new_top_drop li.has-megasubmenu a {
    color: #212529;
    text-transform: capitalize;
    display:block;
}
.new_top_drop .nav-link:focus, .new_top_drop .nav-link:hover {
    color: var(--white-color) !important;
}
ol.breadcrumb {
    align-items: center;
    margin-top: 11px;
}

.header-topbar{background: #2D2554 !important;}



.select-billing-shipping-address {
    color: #fff !important;
    background: #1249a0 !important;
}
button.logout_btn {
    border: unset;
    margin-left: 11px;
}
form.mobile-search-form {
    display: flex;
    align-items: center;
    margin-bottom: 7px;
}
span.error {
    color: red;
    margin: auto;
    display: grid;
}
.login-form input {
    width: 100% !important;
}
.easy-autocomplete-container {
    background: none repeat scroll 0 0 #fff;
    
}
div#suggestions p {
    font-size: 14px;
    background: inherit;
    border-color: #ccc;
    border-image: none;
    border-style: solid;
    border-width: 0 1px;
    display: block;
    font-size: 14px;
    font-weight: 400;
    padding: 4px 12px;
    margin-bottom: 0px;
}

.category{
    padding-top:15px;
}

.list_item {
    display: flex;
    gap: 20px;
    list-style: none;
    justify-content: center;
}

.list_item li:hover{
    border-bottom:2px solid red;
    padding-bottom:12px;
}


</style>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16"
        href="fav-icon.png">
   <meta name="base_url" content="index.php">
    <link rel="canonical" href="index.php" />
    <!-- HTML Meta Tags -->
    <title>Ub Electronics | Online Electronics Store In India</title>
    <meta name="description" content="Compare & Buy electronic items from India's leading online store. Shop AC's, Television, Refrigerator, Water Purifier, Smartphones, Laptops, etc. from the top industry brands.">
    <meta name="keywords" content="online shopping, low cost led, mobile, washing machine, microwave, dryer, washer, audio, speakers, Fridges, refrigerators, ac, air condition, laptops, tablet, iphones, ipad, imac, and many more" />
    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="index.php">
    <meta property="og:type" content="website">
    <meta property="og:title" content="UB Electronics | Online Electronics Store In India">
    <meta property="og:description" content="Compare & Buy electronic items from India's leading online store. Shop AC's, Television, Refrigerator, Water Purifier, Smartphones, Laptops, etc. from the top industry brands.">
    

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="ubekart.com">
    <!--<meta property="twitter:url" content="index.html">-->
    <meta name="twitter:title" content="UB Electronics | Online Electronics Store In India">
    <meta name="twitter:description" content="Compare & Buy electronic items from India's leading online store. Shop AC's, Television, Refrigerator, Water Purifier, Smartphones, Laptops, etc. from the top industry brands.">
    <!-- cdn https://d1culczn4pnwut.cloudfront.net -->
    <link rel="stylesheet" href="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/ge_assets/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/assets/css/home.min.css">

    <script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/assets/js/jquery.js"></script>
    <script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/assets/js/owl.carousel.min.js"></script>
    
    
    
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?=$asset_url?>static/assets/vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?=$asset_url?>static/assets/css/font-electro.css">

    <link rel="stylesheet" href="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/css/bundle.min.css">
    <!-- CSS Electro Template -->
    <!--<link rel="stylesheet" href="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/css/theme.min.css">-->
    <link rel="stylesheet" href="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/css/grid.min.css">
    
    <script src="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/vendor/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/css/responsive.min.css"/>
    
    
    <link rel='stylesheet' href='<?=$asset_url?>sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
    <link rel='stylesheet' href='<?=$asset_url?>cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css'>
    
    
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp-H598wbMhBWMz9I_zbvdcknH-fiBVCo" defer></script>
    
    <style>
        .megasubmenu {
            height: unset !important;
        }
        .container.cart-data table {
            width: 100%;
        }
        .profile-sidebar {
            padding: 20px !important;
            background: #fff;
        }
        .topbar-left ul {
            margin: 0;
            padding: 0;
        }
        ul#timer {
            display: flex;
            list-style-type: none;
            gap: 11px;
        }
        ul#timer li {
            background: #fff;
            padding: 1px 5px;
            border-radius: 3px;
            font-size: 14px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            font-weight: bold;
        }
        ul#timer li span{
            margin-left: 5px;
        }
        li#days {
        color: #fb1212;
        }
        li#hours {
            color: #cbcb34;
        }
        li#minutes {
            color: #f9a40a;
        }
        li#seconds {
            color: #e8bc3c;
        }
    </style>
    <!-- <script src="https://d1culczn4pnwut.cloudfront.net/assets/js/theme.js?ver=1.1"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" referrerpolicy="no-referrer"></script> -->
    <!-- Google Tag Manager -->
 
    <!-- End Google Tag Manager -->
    <!-- Google Tag Manager (noscript) -->
    <!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9BVB9K"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>-->
    <!-- End Google Tag Manager (noscript) -->
    <!-- Facebook Pixel Code -->
    <!--<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    '../connect.facebook.net/en_US/fbevents.js');
    fbq('init', '410299896742013');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=410299896742013&amp;ev=PageView&amp;noscript=1"/></noscript>-->
    <!-- End Facebook Pixel Code -->
</head>

<body>
    <!-- ========== HEADER ========== -->
     
<!-- ========== HEADER ========== -->
    <!-- Topbar -->
    <div class="header-topbar d-none d-lg-block">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="topbar-left">
                    <ul class="">
                        <li class="list-inline-item mr-3" >
                            <a href="<?=$asset_url?>" class="header-topbar__nav-link">
                                Home</a>
                        </li>
                        <?php
                                $liv_category = $db->dbperform("select * from `tbl_category` WHERE live_sale=1");
                               $live_cat=mysqli_fetch_assoc($liv_category);
                                // print_r($live_cat['expire_date_time'])
                       
                                ?>
                        <li class="list-inline-item mr-3 count_time" >
                            <a class="header-topbar__nav-link" href="<?=$asset_url?>product.php?cat_id=<?=$live_cat['cat_pk_id']?>" ><?=$live_cat['category']?></a>
                            
                        </li>
                        <li class="list-inline-item mr-0 count_time">
                            <ul id="timer">
                              <li id="days"></li>
                              <li id="hours"></li>
                              <li id="minutes"></li>
                              <li id="seconds"></li>
                            </ul>
                        </li>
                    
                </div>
                <div class="topbar-right ml-auto py-2 ">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-0">
                            <a href="https://play.google.com/store/apps/details?id=com.ubelectronics.ubelectronics&hl=en-IN" class="header-topbar__nav-link"><i style="padding-right: 7px;" class="bi bi-download mr-1"></i>Download App</a>
                        </li>
                        <li class="list-inline-item mr-0">
                            <a href="store-locator.html" class="header-topbar__nav-link"><i class="bi bi-geo-alt mr-1"></i>
                                Store Locator</a>
                        </li>
                        <!--<li class="list-inline-item mr-0">-->
                        <!--    <a  data-bs-toggle="modal" href="#loginModal" role="button"  class="header-topbar__nav-link"><i class="bi bi-order"></i> Track Your Order</a>-->
                        <!--</li>-->
                        <!--<li class="list-inline-item mr-0">-->
                            
                        <!--    <a href="javascript:;" onclick="closeCurrentlocation()" class="header-topbar__nav-link"><i class="bi bi-geo-alt mr-1"></i> My Location</a>-->
                            
                        <!--</li>-->
                        <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                            <a href="contact-us.html" class="header-topbar__nav-link"><i class="bi bi-telephone"></i>
                                Contact Us</a>
                        </li>
                        <?php 
                       
                     
                        if(isset($_SESSION['user_id'])){
                        
                        
                        $user_id=$_SESSION['user_id'];
                        $sql_users = $db->dbperform("select * from `tbl_user` WHERE user_pk_id=$user_id");
                        $users = mysqli_fetch_assoc($sql_users);
                        $full_name=$users['full_name'];
                        ?> 
                        <li class="list-inline-item mr-0">
                            <a   href="<?=$asset_url?>profile.php" class="header-topbar__nav-link">
                                
                                <i class="bi bi-person"></i><?= $full_name ?>
                                </a> 
                                <!--<button class="logout_btn">Logout</button>-->
                            
                            
                        </li>
                        <?php }else{
                        // echo "there is not session id";
                        ?>
                        <li class="list-inline-item mr-0">
                            <a  data-bs-toggle="modal" href="#loginModal" role="button"  class="header-topbar__nav-link">
                                <i class="bi bi-person"></i> Register <span class="text-gray-50">/</span> Sign in
                            </a>
                            
                        </li>
                        <?php }?>
                        <!--<li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">-->
                        <!--    <a  data-bs-toggle="modal" href="#loginModal" role="button"  class="header-topbar__nav-link"><i class="bi bi-heart"></i>-->
                        <!--        Wishlist</a>-->
                        <!--</li>-->
                        <!--<li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">-->
                        <!--    <a href="e-catalogue.html" class="header-topbar__nav-link"><i class="bi bi-journal-album"></i>-->
                        <!--        E-Catalogue </a>-->
                        <!--</li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!--        Main header -->
    <div class="main-header__section sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-white justify-content-between">
                <div class="mobile-menu">
                    <button type="button" class="btn-open first"><i class="bi bi-list"></i></button>
                </div>
                <div class="logo"><a class="navbar-brand m-0" href="<?=$asset_url?>index.php"><img
                            src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/assets/img/f87d2d81-4156-4639-b3d6-71e5e630d720.jfif" height="46"
                            alt="UB Electronics" /></a></div>
                <div class="search-category-container d-none d-lg-block align-self-center">
                    <form class="min-width-600" id="search-form">
                        <div class="input-group search-bar-category">
                            <!--<div class="dropdown category-btn">-->
                            <!--    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">All Categories</a>-->
                            <!--    <ul class="dropdown-menu mega-menu">-->
                            <!--        <?php foreach($category_result as $row){
                                        // print_r($row);
                                       $cate_id=$row['cat_pk_id'];
                                 $subcategory_result = $db->dbperform("SELECT * FROM `tbl_subCategory` WHERE category_id=$cate_id");
                                    
                                    
                                   ?>
                            <!--        <li class="has-megasubmenu">-->
                            <!--            <a class="dropdown-item" href="#"><?=$row['category']?></a>-->
                            <!--            <div class="megasubmenu dropdown-menu" style="height: 100%;overflow-y: scroll;">-->
                            <!--                <div class="row">-->
                            <!--                    <div class="col-9">-->
                            <!--                        <div class="row">-->
                            <!--                        <?php foreach($subcategory_result as $subcat){
                                                   ?>
                            <!--                                <div class="col-4">-->
                            <!--                                <div class="product-menu-list">-->
                            <!--                                    <a href="<?=$asset_url?>product.php?sub_cat_id=<?=$subcat['id']?>"><h6 class="title"><?= $subcat['category']?></h6></a>-->
                                                                
                                            
                            <!--                                </div>
                            <!--                                </div>
                                                        
                            <!--             <?php }?>          
                                                        
                                                            
                                                    
                            <!--                        </div>
                            <!--                    </div>
                            <!--                    <div class="col-3">
                            <!--                        <img onclick="location.href='shop/air-conditioner/index.html'" class="img-fluid"-->
                            <!--                            src="<?=$asset_url?>admin/assets/<?=$row['cat_image']?>"-->
                            <!--                            alt="category">
                            <!--                    </div>-->
                            <!--                </div><!-- end row

                            <!--            </div>-->
                            <!--        </li>-->
                            <!--        <?php }?>-->
                                    
                                     
                            <!--    </ul>-->
                            <!--</div>-->
                            
                           
                            
                            
                            <div class="easy-autocomplete eac-plate-dark"><input aria-describedby="search-btn" aria-label="Search for products, brands &amp; more" class="search-input" id="searchproduct-items" placeholder="Search for products, brands &amp; more" required="" type="search" autocomplete="off"><div class="easy-autocomplete-container" id="suggestions"><ul ></ul></div></div>
                            <!-- <input type="text" class="search-input" id="searchproduct-item" placeholder="Search for products, brands & more"
                                aria-label="Search for products, brands & more" aria-describedby="search-btn" required> -->
                            <button class="btn" type="button" id="search-btn"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                
                
                 
                
                <div class="others-menu align-self-center">
                    <ul class="navbar-nav justify-content-end align-items-center">
                        
                       <?php 
                       
                        if(isset($_SESSION['user_id'])){
                        
                        
                        $user_id=$_SESSION['user_id'];
                        $sql_users = $db->dbperform("select * from `tbl_user` WHERE user_pk_id=$user_id");
                        $users = mysqli_fetch_assoc($sql_users);
                        $full_name=$users['full_name'];
                        ?> 
                        <li class="list-inline-item mr-0">
                            <a   href="<?=$asset_url?>profile.php" class="header-topbar__nav-link">
                                
                                <i class="bi bi-person"></i><?= $full_name ?>
                                </a> 
                                <!--<button class="logout_btn">Logout</button>-->
                            
                            
                        </li>
                        <?php }else{
                        // echo "there is not session id";
                        ?>
                        <li class="list-inline-item mr-0">
                            <a  data-bs-toggle="modal" href="#loginModal" role="button"  class="header-topbar__nav-link">
                                <i class="bi bi-person"></i>
                            </a>
                            
                        </li>
                        <?php }?>
                        <li class="nav-item d-none d-lg-inline"><a class="nav-link" href="tel:033-40372000"><i
                                    class="bi bi-headset"></i>
                                <span class="d-none d-lg-inline">Customer Care</span> </a></li>
                                
                        <li class="nav-item position-relative"><a class="nav-link" href="<?=$asset_url?>view_cart.php"><i class="bi bi-cart3"></i> <span
                                    class="d-none d-lg-inline">My Cart</span>
                                    
                                    <div class="cart-count" style=""><?=count($_SESSION['cart']);?></div>
                                    
                            </a></li>
                        <li class="nav-item d-none d-lg-none"><a class="nav-link" href="#"><i class="bi bi-search"></i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="mobile-search-bar">
            <div class="container">
                <form class="mobile-search-form">
                    <input type="text" class="search-input" id="search-mobile-view" placeholder="Search for products, brands & more" aria-label="Search for products, brands & more" aria-describedby="search-btn" required>
                    <button class="btn" type="button" id="mobile-search-btn"><i class="bi bi-search"></i></button>
                    <!--<button class="btn" type="button" onclick="startConverting()" id="mobile-voice-btn"><i class="bi bi-mic-fill"></i></button>-->
                </form>
            </div>
        </div>
    </div>
    <div class="voice-search-container" style="display: none;">
        <div class="voice-search-div">
            <div class="voice-grid">
                <div class="voice-icon">
                    <div class="voice-btn"><i class="bi bi-mic-fill"></i></div>
                </div>
                <div class="voice-search-text" onclick="startConverting()"> We are Listening</div>
            </div>
        </div>
    </div>
    <div class="current-location-container">
        <div class="current-location"> <span class="close-current-location" onclick="closeCurrentlocation()"><i class="bi bi-x-lg"></i> </span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="search-container">
                            <div class="row justify-content-center">
                                <div class="col-auto current-location-title align-self-center">Search by pincode</div>
                                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 current-location-search-selction">
                                    <div class="input-box"> <input type="number" minlength="6" id="pincodefinddata" name="pincodefinddata" class="form-control search-pincode-inputBox pincodesearch" maxlength="7" placeholder="Search your pincode"> <button id="selectMyLocation1" type="button" class="search-btn"><span class="bi bi-search"></span> </button></div>
                                    <p id="pincode-error" style="display:none">Your pincode is not serviceable for delivery</p>
                                </div>
                                <div class="col-12 col-md-auto col-lg-auto align-self-center">
                                    <div class="or font-size-14">OR</div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12"> <button onclick="getLocation()" class="btn btn-primary-dark-w"><i class="bi bi-geo-alt"></i>&nbsp;&nbsp;Use Current Location </button></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <h6 class="location-heading">All Cities</h6>
                    </div>
                    <div class="col-md-10">
                        <ul class="store-list"></ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="current-location-selected">
            <div class="container text-end">
                <div class="btn-section-current-location" onclick="closeCurrentlocation()">  <input class="btn btn-current-location" value="Kolkata" readonly /> </div>
            </div>
        </div>
    </div>
    
    
        <div class="modal loginModal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body p-0">
                    <button type="button" class="login-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x"></i></button>
                    <div class="row g-0">
                        <div class="col-2-5">
                            <div class="log-left">
                                <span class="log-title">Welcome Back!</span>
                                <span class="log-tag-line">Login to manage your account.</span>
                            </div>
                        </div>
                        <div class="col-3-5">
                            <div class="log-right">
                                <form id="loginFrom" method="POST" class="needs-validation login-form" novalidate>
                                    <div class="input-group mb-3 has-validation">
                                        <input type="text" class="form-control" placeholder="Enter Email/Mobile number"
                                            name="email" id="user_email" aria-label="Enter Email/Mobile number"
                                            aria-describedby="basic-email" required>
                            <span id="user_email_error" class="  error validation"></span>
                                        <i class="bi bi-person"></i>
                                        <div class="invalid-feedback">
                                            Please enter a valid email address or mobile no.
                                        </div>
                                        <div class="invalid-feedback-forget">
                                            Please enter a valid email address.
                                        </div>
                                    </div>
                                    <div class="input-group mb-3 has-validation">
                                        <input type="password" class="form-control" id="user_password" placeholder="Enter Password"
                                            name="password" aria-label="Enter Password"
                                            aria-describedby="basic-password" autocomplete="on" required>
                                            <span id="user_password_error" class="  error validation"></span>
                                        <i class="bi bi-lock"></i>
                                        <div class="invalid-feedback">
                                            Your password is invalid. Please try again.
                                        </div>
                                    </div>
                                    <div class="text-end mb-2">
                                        <div class="forget-link">Forgot Password?</div>
                                    </div>
                                    <div class="d-grid gap-2 mb-2">
                                        <button type="button" id="login_btn" class="btn btn-block btn-primary transition-3d-hover">Login</button>
                                        <!--<div class="text-center">-->
                                        <!--    <span class="divider">OR</span>-->
                                        <!--</div>-->
                                        <!--<button type="button" id="request-otp" class="btn btn-block btn-outline-dark">Request-->
                                        <!--    OTP</button>-->
                                    </div>
                                    <div class="text-center mb-4">
                                        <div class="signup-link">Do not have an account? <a href="#RegModal"
                                                class="signup-modal-open" data-bs-toggle="modal"
                                                role="button">Signup</a></div>
                                    </div>
                                    <!--<div class="d-flex justify-content-between">-->
                                    <!--    <a class="btn btn-block btn-sm btn-soft-facebook transition-3d-hover me-1"-->
                                    <!--        href="oauth/login/facebook/index067e.html?next=/"><span-->
                                    <!--            class="bi bi-facebook me-1"></span> Facebook</a>-->
                                    <!--    <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ms-1 mt-0"-->
                                    <!--        href="oauth/login/google-oauth2/index067e.html?next=/"><span-->
                                    <!--            class="bi bi-google me-1"></span> Google</a>-->
                                    <!--</div>-->
                                </form>
                                <form class="login-form needs-validation" method="POST" style="display:none" id="otpForm" novalidate>
                                    <div class="form-heading">
                                        <h4 class="form-title">Enter the One-Time Password</h4>
                                        <div class="form-tag-line">OTP sent to <span
                                                id="otp-mobile-email">xxxxxxxxxx</span></div>
                                    </div>
                                    <div class="input-group mb-3 has-validation">
                                        <input type="hidden" id="otp-request" name="otp-request"/>
                                        <input id="otp_number" type="tel" class="form-control" minlength="6" maxlength="6"
                                            placeholder="Enter 6 digit OTP" aria-label="Enter 6 digit OTP"
                                            aria-describedby="basic-password" autocomplete="on" required>
                                        <i class="bi bi-key-fill"></i>
                                        <div class="invalid-feedback">
                                            Enter 6 digit OTP.
                                        </div>
                                    </div>
                                    <div class="text-end mb-3">
                                        <div class="otp-resend"><a href="javascript:;" id="resend-otp-login">Resend OTP</a> <span id="otp-time"></span></div>
                                    </div>
                                    <div class="d-grid gap-2 mb-2">
                                        <button type="submit"
                                            class="btn btn-block btn-primary transition-3d-hover">Continue</button>
                                        <button type="button" class="btn btn-block existing-user-login">Existing
                                            User? Log in</button>
                                    </div>
                                </form>
                                <form class="login-form needs-validation" method="POST" id="reset-password-form" style="display:none" novalidate>
                                    <div class="form-heading">
                                        <h4 class="form-title">Set new password</h4>
                                    </div>
                                    <input type="hidden" name="forget_token" id="forget_token" />
                                    <div class="input-group mb-3 has-validation">
                                        <input type="password" class="form-control" name="new_pwd" id="new_pwd"
                                            minlength="8" maxlength="20" placeholder="Password"
                                            aria-label="Enter Password" aria-describedby="new_pwd" autocomplete="on"
                                            required>
                                        <i class="bi bi-lock-fill"></i>
                                        <div class="invalid-feedback">
                                            Your password is invalid. Password must be between 8 and 20 characters.
                                        </div>
                                    </div>
                                    <div class="input-group mb-3 has-validation">
                                        <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd"
                                            minlength="8" maxlength="20" placeholder="Confirm Password"
                                            aria-label="Enter Confirm Password" aria-describedby="confirm_pwd"
                                            autocomplete="on" required>
                                        <i class="bi bi-lock-fill"></i>
                                        <div class="invalid-feedback">
                                            Enter confirm password.
                                        </div>
                                        <div class="invalid-feedback-forget">Password does not match the confirm
                                            password.</div>
                                    </div>
                                    <div class="d-grid gap-2 mb-2">
                                        <button type="submit"
                                            class="btn btn-block btn-primary transition-3d-hover">Submit</button>
                                        <button type="button" class="btn btn-block existing-user-login">Existing
                                            User? Log in</button>
                                    </div>
                                </form>
                                <div class="login-form-msg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal loginModal fade" id="RegModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body p-0">
                    <button type="button" class="login-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x"></i></button>
                    <div class="row g-0">
                        <div class="col-2-5">
                            <div class="log-left">
                                <span class="log-title">Welcome</span>
                                <span class="log-tag-line">Fill out the form to get started.</span>
                            </div>
                        </div>
                        <div class="col-3-5">
                            <div class="log-right">
                                <form method="POST" class="needs-validation login-form" id="user_reg" novalidate>
                                    <div class="input-group mb-3 has-validation">
                                        <input type="text" class="form-control" placeholder="Name"
                                            aria-label="Enter Name" id="user_Name" aria-describedby="basic-Name" required>
                                            
                    <span id="name_error" class="  error validation"></span>
                                        <i class="bi bi-person-fill"></i>
                                        <div class="invalid-feedback">
                                            Please enter your name.
                                        </div>
                                    </div>
                                    <div class="input-group mb-3 has-validation">
                                        <input type="tel"  minlength="11" class="form-control" minlength="9" maxlength="10"
                                            placeholder="Mobile" id="user_Mobile" aria-label="Enter Mobile"
                                            aria-describedby="basic-mobile" required>
                                                  <span id="Mobile_error" class="  error validation"></span>
                                            
                                            
                                        <i class="bi bi-phone-fill"></i>
                                        <div class="invalid-feedback">
                                            Please enter 10 digit mobile number.
                                        </div>
                                    </div>
                                    <div class="input-group mb-3 has-validation">
                                        <input type="email" class="form-control" placeholder="Email"
                                            aria-label="Enter Email" id="user_Email" aria-describedby="basic-mobile" required>
                                            
            <span id="email_error" class="  error validation"></span>
                                            
                                        <i class="bi bi-envelope-fill"></i>
                                        <div class="invalid-feedback">
                                            Please enter a valid Email address.
                                        </div>
                                    </div>
                                    <div class="input-group mb-3 has-validation">
                                        <input type="password" class="form-control" minlength="8" maxlength="20"
                                            placeholder="Password" id="user_Password" aria-label="Enter Password"
                                            aria-describedby="basic-password" autocomplete="on" required>
                                            
                        <span id="password_error" class="  error validation"></span>
                                        <i class="bi bi-lock-fill"></i>
                                        <div class="invalid-feedback">
                                            Your password is invalid. Password must be between 8 and 20 characters.
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Occupation"
                                            aria-label="Enter Occupation" id="user_Occupation" aria-describedby="basic-Occupation">
                                            
                                            <span id="Occupation_error" class="  error validation"></span>
                                        <i class="bi bi-briefcase-fill"></i>
                                    </div>
                                    <div class="d-grid gap-2 mb-2">
                                        <button type="button" id="reg_submit_btn" class="btn btn-block btn-primary transition-3d-hover">Get
                                            Started</button>
                                    </div>
                                    <div class="text-center mb-4">
                                        <div class="signup-link">Do not have an account? <a data-bs-toggle="modal"
                                                class="login-modal-open" role="button" href="#loginModal">Login</a>
                                        </div>
                                    </div>
                                </form>
                                <form class="login-form needs-validation" id="RegotpForm" style="display: none;" novalidate>
                                    <div class="form-heading">
                                        <h4 class="form-title">Enter the One-Time Password</h4>
                                        <div class="form-tag-line">OTP sent to <span
                                                id="reg-otp-email">xxxxxxxxxx</span></div>
                                    </div>
                                    <div class="input-group mb-3 has-validation">
                                        <input type="tel" id="reg-otp" class="form-control" minlength="6" maxlength="6"
                                            placeholder="Enter 6 digit OTP" aria-label="Enter 6 digit OTP"
                                            aria-describedby="basic-password" autocomplete="on" required>
                                        <i class="bi bi-key-fill"></i>
                                        <div class="invalid-feedback">
                                            Enter 6 digit OTP.
                                        </div>
                                    </div>
                                    <div class="text-end mb-3">
                                        <div class="otp-resend"><a href="javascript:;" id="resend-otp-reg">Resend OTP</a></div>
                                    </div>
                                    <div class="d-grid gap-2 mb-2">
                                        <button type="submit"
                                            class="btn btn-block btn-primary transition-3d-hover">Continue</button>
                                    </div>
                                </form>
                                <div class="login-form-msg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div class="zeynep-overlay"></div>

    <div class="zeynep">
        <img height="50" src="https://gaganfilmsproduction.in/public/feminineafrica.ci/d1kivxjtmxnd4.cloudfront.net/assets/img/f87d2d81-4156-4639-b3d6-71e5e630d720.jfif" alt="logo">
        <ul>
            <!--<li>-->
            
            <!--<a href="javascript:;" onclick="$('.current-location-container').show().addClass('popup')" class="mb-no-location"><i class="bi bi-geo-alt mr-1"></i> My Location</a>-->
            
            <!--</li>-->
            <li>
                <a href="index.php">Home </a>
            </li>
            <li class="has-submenu">
            <a href="javascript:;" data-submenu="categories">All Categories</a>
            <div id="categories" class="submenu">
            <div class="submenu-header">
            <a href="#" data-submenu-close="categories">Main Menu</a>
            </div>
            <label>All Categories</label>
            <ul>
            <?php
$cat_result = $db->dbperform("SELECT * FROM `tbl_category`");

foreach ($cat_result as $row) {
    $category_id = $row['cat_pk_id'];
    $subcat_result = $db->dbperform("SELECT * FROM `tbl_subCategory` WHERE category_id=$category_id");
?>

    <li class="has-submenu">
        <a href="#" data-submenu="submenu-<?=$category_id?>"><?=$row['category']?></a>

        <div id="submenu-<?=$category_id?>" class="submenu">
            <div class="submenu-header">
                <a href="#" data-submenu-close="submenu-<?=$category_id?>">All Categories</a>
            </div>

            <?php foreach ($subcat_result as $subcategory) { ?>
                <label data-submenu="childmenu-<?= $subcategory['id']?>" data-submenu-close="submenu-<?=$category_id?>"><?= $subcategory['category']?></label>

                <div id="childmenu-<?= $subcategory['id']?>" class="submenu">
                    <div class="submenu-header">
                        <a href="#" data-submenu-close="childmenu-<?= $subcategory['id']?>">All Categories</a>
                    </div>

                    <?php
                    $sub_cat_id = $subcategory['id'];
                    $childcategory_result = $db->dbperform("SELECT * FROM `tbl_childcategory` WHERE product_sub_cat=$sub_cat_id");
                    foreach ($childcategory_result as $childcat) {
                    ?>
                        <label onclick="location.href='<?=$asset_url?>product.php?child_cat_id=<?= $childcat['child_pk_id']?>'"><?= $childcat['child_category']?></label>
                    <?php } ?>

                </div>
            <?php } ?>

        </div>
    </li>

<?php } ?>

            
            <!--<li class="has-submenu">-->
            <!--    <a href="#" data-submenu="submenu-3">Home Entertainment</a>-->
            <!--    <div id="submenu-3" class="submenu">-->
            <!--        <div class="submenu-header">-->
            <!--            <a href="#" data-submenu-close="submenu-3">All Categories</a>-->
            <!--        </div>-->
            
            
            <!--            <label onclick="location.href='shop/home-entertainment/audio/index.php'">Audio</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/home-entertainment/audio/speaker/index.php">Speaker</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-entertainment/audio/soundbar/index.php">Soundbar</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-entertainment/audio/music-system/index.php">Music System</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/home-entertainment/home-theater-systems/index.php'">Home Theater Systems</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/home-entertainment/home-theater-systems/51-channel/index.php">5.1 Channel</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            
            
            
            <!--    </div>-->
            <!--</li>-->
            
            <!--<li class="has-submenu">-->
            <!--    <a href="#" data-submenu="submenu-5">Televisions</a>-->
            <!--    <div id="submenu-5" class="submenu">-->
            <!--        <div class="submenu-header">-->
            <!--            <a href="#" data-submenu-close="submenu-5">All Categories</a>-->
            <!--        </div>-->
            
            
            <!--            <label onclick="location.href='shop/televisions/led/index.php'">LED</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/televisions/led/smart/index.php">Smart</a></li>-->
            
            
            
            <!--                    <li><a href="shop/televisions/led/basic/index.php">Basic</a></li>-->
            
            
            
            <!--                    <li><a href="shop/televisions/led/uhd/index.php">UHD</a></li>-->
            
            
            
            <!--                    <li><a href="shop/televisions/led/full-hd/index.php">Full HD</a></li>-->
            
            
            
            <!--                    <li><a href="shop/televisions/led/hd-ready/index.php">HD Ready</a></li>-->
            
            
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/televisions/oled/index.php'">OLED</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/televisions/oled/oled/index.php">OLED</a></li>-->
            
            
            
            
            
            
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/televisions/qled/index.php'">QLED</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/televisions/qled/qled/index.php">QLED</a></li>-->
            
            
            
            
            <!--            </ul>-->
            
            
            <!--    </div>-->
            <!--</li>-->
            
            <!--<li class="has-submenu">-->
            <!--    <a href="#" data-submenu="submenu-9">Washing Machine</a>-->
            <!--    <div id="submenu-9" class="submenu">-->
            <!--        <div class="submenu-header">-->
            <!--            <a href="#" data-submenu-close="submenu-9">All Categories</a>-->
            <!--        </div>-->
            
            
            <!--            <label onclick="location.href='shop/washing-machine/top-loading/index.php'">Top Loading</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/60-kgs/index.php">6.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/72-kgs/index.php">7.2 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/75-kgs/index.php">7.5 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/160-kgs/index.php">16.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/120-kgs/index.php">12.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/110-kgs/index.php">11.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/90-kgs/index.php">9.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/80-kgs/index.php">8.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/62-kgs/index.php">6.2 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/70-kgs/index.php">7.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/65-kgs/index.php">6.5 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/100-kgs/index.php">10.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/top-loading/85-kgs/index.php">8.5 Kgs</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/washing-machine/semi-automatic/index.php'">Semi Automatic</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/washing-machine/semi-automatic/70-kgs/index.php">7.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/semi-automatic/72-kgs/index.php">7.2 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/semi-automatic/75-kgs/index.php">7.5 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/semi-automatic/80-kgs/index.php">8.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/semi-automatic/85-kgs/index.php">8.5 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/semi-automatic/100-kgs/index.php">10.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/semi-automatic/95kg/index.php">9.5 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/semi-automatic/105-kgs/index.php">10.5 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/semi-automatic/110-kgs/index.php">11.0 Kgs</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/washing-machine/front-loading/index.php'">Front Loading</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/washing-machine/front-loading/60-kgs/index.php">6.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/front-loading/62-kgs/index.php">6.2 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/front-loading/70-kgs/index.php">7.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/front-loading/75-kgs/index.php">7.5 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/front-loading/80-kgs/index.php">8.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/front-loading/90-kgs/index.php">9.0 Kgs</a></li>-->
            
            
            
            <!--                    <li><a href="shop/washing-machine/front-loading/65-kgs/index.php">6.5 Kgs</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/washing-machine/washer-dryer/index.php'">Washer Dryer</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/washing-machine/washer-dryer/90-60-kgs/index.php">9.0 / 6.0 Kgs</a></li>-->
            
            
            <!--            </ul>-->
            
            
            <!--    </div>-->
            <!--</li>-->
            
            <!--<li class="has-submenu">-->
            <!--    <a href="#" data-submenu="submenu-4">Computers</a>-->
            <!--    <div id="submenu-4" class="submenu">-->
            <!--        <div class="submenu-header">-->
            <!--            <a href="#" data-submenu-close="submenu-4">All Categories</a>-->
            <!--        </div>-->
            
            
            <!--            <label onclick="location.href='shop/computers/laptops/index.php'">Laptops</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/computers/laptops/core-i3/index.php">Core i3</a></li>-->
            
            
            
            <!--                    <li><a href="shop/computers/laptops/core-i5/index.php">Core i5</a></li>-->
            
            
            
            <!--                    <li><a href="shop/computers/laptops/celeron/index.php">Celeron</a></li>-->
            
            
            
            <!--                    <li><a href="shop/computers/laptops/amd-ryzen-3/index.php">AMD Ryzen 3</a></li>-->
            
            
            
            <!--                    <li><a href="shop/computers/laptops/ryzen/index.php">Ryzen</a></li>-->
            
            
            
            <!--                    <li><a href="shop/computers/laptops/pentium-quad-core/index.php">Pentium Quad Core</a></li>-->
            
            
            
            <!--                    <li><a href="shop/computers/laptops/ryzen-5-quad-core/index.php">Ryzen 5 Quad Core</a></li>-->
            
            
            <!--            </ul>-->
            
            
            <!--    </div>-->
            <!--</li>-->
            
            <!--<li class="has-submenu">-->
            <!--    <a href="#" data-submenu="submenu-8">Refrigerator</a>-->
            <!--    <div id="submenu-8" class="submenu">-->
            <!--        <div class="submenu-header">-->
            <!--            <a href="#" data-submenu-close="submenu-8">All Categories</a>-->
            <!--        </div>-->
            
            
            <!--            <label onclick="location.href='shop/refrigerator/single-door/index.php'">Single Door</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/refrigerator/single-door/direct-cool/index.php">Direct Cool</a></li>-->
            
            
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/refrigerator/double-door/index.php'">Double Door</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/refrigerator/double-door/frost-free/index.php">Frost Free</a></li>-->
            
            
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/refrigerator/triple-door/index.php'">Triple Door</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/refrigerator/triple-door/frost-free/index.php">Frost Free</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            
            
            <!--            <label onclick="location.href='shop/refrigerator/deep-freezer/index.php'">Deep Freezer</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/refrigerator/deep-freezer/single-door/index.php">Single Door</a></li>-->
            
            
            
            <!--                    <li><a href="shop/refrigerator/deep-freezer/double-door/index.php">Double Door</a></li>-->
            
            
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/refrigerator/side-by-side/index.php'">Side by Side</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/refrigerator/side-by-side/frost-free/index.php">Frost Free</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            
            <!--    </div>-->
            <!--</li>-->
            
            <!--<li class="has-submenu">-->
            <!--    <a href="#" data-submenu="submenu-7">Mobiles</a>-->
            <!--    <div id="submenu-7" class="submenu">-->
            <!--        <div class="submenu-header">-->
            <!--            <a href="#" data-submenu-close="submenu-7">All Categories</a>-->
            <!--        </div>-->
            
            
            <!--            <label onclick="location.href='shop/mobiles/smart-phones/index.php'">Smart Phones</label>-->
            <!--            <ul>-->
            
            
            
            
            <!--                    <li><a href="shop/mobiles/smart-phones/android/index.php">Android</a></li>-->
            
            
            
            
            
            <!--                    <li><a href="shop/mobiles/smart-phones/ios/index.php">iOS</a></li>-->
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/mobiles/tablet/index.php'">Tablet</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/mobiles/tablet/android/index.php">Android</a></li>-->
            
            
            <!--            </ul>-->
            
            
            <!--    </div>-->
            <!--</li>-->
            
            <!--<li class="has-submenu">-->
            <!--    <a href="#" data-submenu="submenu-2">Home Appliances</a>-->
            <!--    <div id="submenu-2" class="submenu">-->
            <!--        <div class="submenu-header">-->
            <!--            <a href="#" data-submenu-close="submenu-2">All Categories</a>-->
            <!--        </div>-->
            
            
            <!--            <label onclick="location.href='shop/home-appliances/vacuum-cleaner/index.php'">Vacuum Cleaner</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/home-appliances/vacuum-cleaner/handheld/index.php">Handheld</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-appliances/vacuum-cleaner/dry-vacuum-cleaner/index.php">Dry Vacuum Cleaner</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-appliances/vacuum-cleaner/dual-cleaning-wet-and-dry/index.php">Dual Cleaning: Wet and Dry</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/home-appliances/ceiling-fans/index.php'">Ceiling Fans</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/home-appliances/ceiling-fans/1250-mm/index.php">1250 mm</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-appliances/ceiling-fans/1200-mm/index.php">1200 mm</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-appliances/ceiling-fans/900-mm/index.php">900 mm</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/home-appliances/air-coolers/index.php'">Air Coolers</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/home-appliances/air-coolers/tower/index.php">Tower</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-appliances/air-coolers/roompersonal/index.php">Room/Personal</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-appliances/air-coolers/desert/index.php">Desert</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/home-appliances/water-heater/index.php'">Water Heater</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/home-appliances/water-heater/instant/index.php">Instant</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-appliances/water-heater/storage/index.php">Storage</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/home-appliances/electric-iron/index.php'">Electric Iron</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/home-appliances/electric-iron/steam-iron/index.php">Steam Iron</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-appliances/electric-iron/dry-iron/index.php">Dry Iron</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/home-appliances/room-heater/index.php'">Room Heater</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/home-appliances/room-heater/2400-watt/index.php">2400 Watt</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-appliances/room-heater/2000-watt/index.php">2000 Watt</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-appliances/room-heater/1200-watt/index.php">1200 Watt</a></li>-->
            
            
            
            <!--                    <li><a href="shop/home-appliances/room-heater/800-watt/index.php">800 Watt</a></li>-->
            
            
            <!--            </ul>-->
            
            
            <!--    </div>-->
            <!--</li>-->
            
            <!--<li class="has-submenu">-->
            <!--    <a href="#" data-submenu="submenu-6">Kitchen Appliances</a>-->
            <!--    <div id="submenu-6" class="submenu">-->
            <!--        <div class="submenu-header">-->
            <!--            <a href="#" data-submenu-close="submenu-6">All Categories</a>-->
            <!--        </div>-->
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/water-purifier/index.php'">Water Purifier</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/rouvmtds/index.php">RO + UV + MTDS</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-uv-mf/index.php">RO + UV + MF</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/uvufmc/index.php">UV + UF + MC</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-uv-uf/index.php">RO + UV + UF</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-mf/index.php">RO + MF</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-uf/index.php">RO + UF</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-uv/index.php">RO + UV</a></li>-->
            
            
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro/index.php">RO</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-uv-uf-tds/index.php">RO + UV + UF + TDS</a></li>-->
            
            
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/uv/index.php">UV</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/uv-uf/index.php">UV + UF</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/uv-ro/index.php">UV+ RO</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-uv-uf-mineraliser/index.php">RO + UV + UF + MINERALISER</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-uv-uf-tds-control-uv-in-tank/index.php">RO + UV + UF + TDS Control + UV in Tank</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-uv-minerals/index.php">RO + UV + Minerals</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-uv-alkaline/index.php">RO + UV + Alkaline</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-uv-ta/index.php">RO + UV + TA</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/uv-uf/index.php">UV + UF</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/water-purifier/ro-uv-uf-tds-control-alkaline-uv-in-tank/index.php">RO + UV + UF + TDS Control + Alkaline + UV in Tank</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/over-toaster-grill/index.php'">Oven Toaster Grill</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/over-toaster-grill/36-litres/index.php">36 Litres</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/over-toaster-grill/35-litres/index.php">35 Litres</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/over-toaster-grill/29-litres/index.php">29 Litres</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/over-toaster-grill/24-litres/index.php">24 Litres</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/over-toaster-grill/20-litres/index.php">20 Litres</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/over-toaster-grill/28-litres/index.php">28 Litres</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/over-toaster-grill/66-litres/index.php">66 Litres</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/over-toaster-grill/25-litres/index.php">25 Litres</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/mixer-grinder/index.php'">Mixer Grinder</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/mixer-grinder/750-watts/index.php">750 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/mixer-grinder/500-watts/index.php">500 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/mixer-grinder/600-watts/index.php">600 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/mixer-grinder/450-watts/index.php">450 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/mixer-grinder/60-watts/index.php">60 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/mixer-grinder/800-watts/index.php">800 Watts</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/induction-cooker/index.php'">Induction Cooktop</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/induction-cooker/2000-watts/index.php">2000 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/induction-cooker/1600-watts/index.php">1600 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/induction-cooker/1400-watts/index.php">1400 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/induction-cooker/200-watts/index.php">200 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/induction-cooker/1800-watts/index.php">1800 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/induction-cooker/2100-watts/index.php">2100 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/induction-cooker/1900-watts/index.php">1900 Watts</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/cooktop/index.php'">Cooktop</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/cooktop/4-burners/index.php">4 Burners</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/cooktop/3-burners/index.php">3 Burners</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/cooktop/2-burners/index.php">2 Burners</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/microwaves/index.php'">Microwaves</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/microwaves/convection/index.php">Convection</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/microwaves/solo/index.php">Solo</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/microwaves/grill/index.php">Grill</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/toaster/index.php'">Toaster</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/toaster/4-slice-pop-up-toaster/index.php">4 slice pop-up toaster</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/toaster/2-slice-pop-up-toaster/index.php">2 slice pop-up toaster</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/roti-maker/index.php'">Roti Maker</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/roti-maker/home-made-roti-maker/index.php">Roti maker</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/chimney/index.php'">Chimney</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/chimney/auto-clean/index.php">Auto Clean</a></li>-->
            
            
            
            <!--                    <li><a href="shop/kitchen-appliances/chimney/manual-cleaning/index.php">Manual cleaning</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/dishwashers/index.php'">Dishwashers</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/dishwashers/free-standing/index.php">Free Standing</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/kettle/index.php'">Kettle</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/kettle/electric-kettle/index.php">Electric Kettle</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/hand-mixer/index.php'">Hand Mixer</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/hand-mixer/300-watts/index.php">300 Watts</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/citrus-press-juicer/index.php'">Citrus Press Juicer</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/citrus-press-juicer/25-watts/index.php">25 Watts</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/rice-cooker/index.php'">Rice Cooker</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/rice-cooker/550-watts/index.php">550 Watts</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/kitchen-appliances/sandwich-maker/index.php'">Sandwich Maker</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/kitchen-appliances/sandwich-maker/2-slice/index.php">2 Slice</a></li>-->
            
            
            <!--            </ul>-->
            
            
            <!--    </div>-->
            <!--</li>-->
            
            <!--<li class="has-submenu">-->
            <!--    <a href="#" data-submenu="submenu-10">Camera</a>-->
            <!--    <div id="submenu-10" class="submenu">-->
            <!--        <div class="submenu-header">-->
            <!--            <a href="#" data-submenu-close="submenu-10">All Categories</a>-->
            <!--        </div>-->
            
            
            <!--            <label onclick="location.href='shop/camera/camera-type/index.php'">DSLR Camera</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/camera/camera-type/dslr/index.php">DSLR</a></li>-->
            
            
            <!--            </ul>-->
            
            
            <!--    </div>-->
            <!--</li>-->
            
            <!--<li class="has-submenu">-->
            <!--    <a href="#" data-submenu="submenu-11">Personal Care</a>-->
            <!--    <div id="submenu-11" class="submenu">-->
            <!--        <div class="submenu-header">-->
            <!--            <a href="#" data-submenu-close="submenu-11">All Categories</a>-->
            <!--        </div>-->
            
            
            <!--            <label onclick="location.href='shop/personal-care/hair-dryer/index.php'">Hair Dryer</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/personal-care/hair-dryer/1000-watts/index.php">1000 Watts</a></li>-->
            
            
            
            <!--                    <li><a href="shop/personal-care/hair-dryer/600-watts/index.php">600 Watts</a></li>-->
            
            
            <!--            </ul>-->
            
            
            
            <!--            <label onclick="location.href='shop/personal-care/hair-straightener/index.php'">Hair Straightener</label>-->
            <!--            <ul>-->
            
            
            <!--                    <li><a href="shop/personal-care/hair-straightener/pink/index.php">Pink</a></li>-->
            
            
            
            <!--                    <li><a href="shop/personal-care/hair-straightener/black/index.php">Black</a></li>-->
            
            
            
            <!--                    <li><a href="shop/personal-care/hair-straightener/black-pink/index.php">Black &amp; Pink</a></li>-->
            
            
            <!--            </ul>-->
            
            
            <!--    </div>-->
            <!--</li>-->
            
            </ul>
            </div>
            </li>
            <!--<li>-->
            <!--    <a href="store-locator.html">Store Locator</a>-->
            <!--</li>-->
            <!--<li>-->
            <!--    <a  data-bs-toggle="modal" href="#loginModal" role="button" >Track Your Order</a>-->
            <!--</li>-->

            <!--<li>-->
            <!--    <a  data-bs-toggle="modal" href="#loginModal" role="button"  >Wishlist</a>-->
            <!--</li>-->
            <li>
                <a href="https://ubekart.com/about_us.php">About Us</a>
            </li>
           
            <!--<li>-->
            <!--    <a href="e-catalogue.html">E-Catalogue</a>-->
            <!--</li>-->
            
        </ul>
    </div>
    
    <!--=================editing============-->
    <!--<div class='container'>-->
    <!--                        <div class='category'>-->
                                
                                <!--<div class="dropdown category-btn">-->
                                <!--    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">All Categories</a>-->
    <!--                                <ul class=" mega-menu">-->
                                        
                                      
                                        
    <!--                                    <li class="has-megasubmenu">-->
    <!--                                        <a class="dropdown-item" href="#"><?=$row['category']?></a>-->
    <!--                                        <div class="megasubmenu_container">-->
    <!--                                            <div class="megasubmenu " >-->
    <!--                                            <div class="row">-->
    <!--                                                <div class="col-9">-->
    <!--                                                    <div class="row">-->
    <!--                                                     -->
    <!--                                                            <div class="col-4">-->
    <!--                                                            <div class="product-menu-list">-->
    <!--                                                                <a href="<?=$asset_url?>product.php?sub_cat_id=<?=$subcat['id']?>"><h6 class="title"><?=$subcat['category']?></h6></a>-->
                                                                    
                                                
    <!--                                                            </div>-->
    <!--                                                            </div>-->
    <!--                                                      -->
                                                    
                                                            
                                                                
                                                        
    <!--                                                    </div>-->
    <!--                                                </div>-->
    <!--                                                <div class="col-3">-->
    <!--                                                    <img onclick="location.href='<?=$asset_url?>product.php?cat_id=<?=$row['cat_pk_id']?>'" class="img-fluid"-->
    <!--                                                        src="<?=$asset_url?>admin/assets/<?=$row['cat_image']?>"-->
    <!--                                                        alt="category">-->
    <!--                                                </div>-->
    <!--                                            </div><!-- end row -->
    
    <!--                                        </div>-->
    <!--                                        </div>-->
                                            
    <!--                                    </li>-->
                                       
    <!--                                    -->
                                         
    <!--                                </ul>-->
    <!--                            </div>-->
                                
    <!--                 </div>          -->
                              
                              
                              <style>
                              
                              @media screen and (max-width: 460px)
                              {
                                  .hp{display: none !important;}
                              }
                              
                                  
                              </style>
                                
           
           <div class='showdata_list hp' style="box-shadow: 0 0 8px #ccc; margin-top: 5px;z-index: 4;">                                          
           
           <?php foreach($category_result as $row){
                                            // print_r($row);
                                     $cate_id=$row['cat_pk_id'];
                                   $subcategory_result = $db->dbperform("SELECT * FROM `tbl_subCategory` WHERE category_id=$cate_id");
                                        
                                        
                                    ?>
           
          <a  class="show" style="cursor:pointer; color: #000 !important;">
            <li><?=$row['category']?></li>
            <div class="showData" id="hover_1">

                <?php foreach($subcategory_result as $subcat){
                   $subcate_id=$subcat['id'];
                                   $childcategory_result = $db->dbperform("SELECT * FROM `tbl_childcategory` WHERE product_sub_cat=$subcate_id");
                 ?>
                <div class="center1">
                    
                    <li onclick="location.href='<?=$asset_url?>product.php?sub_cat_id=<?=$subcat['id']?>'"><b><small><?=$subcat['category']?></small></b></li>
                   <?php
                   foreach($childcategory_result as $childcat){
                   ?>
                    <li onclick="location.href='<?=$asset_url?>product.php?child_cat_id=<?=$childcat['child_pk_id']?>'"><small><?=$childcat['child_category']?></small></li>
                    <?php }?>
                    <!--<li><small>LG</small></li>-->
                    <!--<li><small>Samsung</small></li>-->
                    <!--<li><small>Whirlpool</small></li>-->
                    <!--<li><small>Bosch</small></li>-->
                    <!--<li><small>IFB</small></li>-->
                    <!--<li><small>Haier</small></li>-->
                    <!--<li><small>Godrej</small></li>-->
                    <!--<li><small>Panasonic</small></li>-->
                    <!--<li><small>Voltas Beko</small></li>-->
                    <!--<li><small><pre>     </pre></small></li>-->
                   



                    
                </div>
            <?php }?>  
                <!--<div class="center1">-->
                <!--    <li><b><small>LOAD TYPE</small></b></li>-->
                <!--    <li><small>Top Loading</small></li>-->
                <!--    <li><small>Front Loading</small></li>-->
                <!--    <li><small><pre>     </pre></small></li>-->
                <!--    <li><b><small>FAMILY SIZE</small></b></li>-->
                <!--    <li><small>Couple</small></li>-->
                <!--    <li><small>Family of 3</small></li>-->
                <!--    <li><small>Family of 4</small></li>-->
                <!--    <li><small>Family of 5</small></li>-->
                <!--    <li><small>Family of 6</small></li>-->
                <!--    <li><small><pre>     </pre></small></li>-->
                <!--    <li><b><small>CAPACITY</small></b></li>-->
                <!--    <li><small>6 Kg & Below</small></li>-->
                <!--    <li><small>6.1 Kg - 7 kg</small></li>-->
                <!--    <li><small>7.1 Kg - 8 kg</small></li>-->
                <!--    <li><small>8.1 Kg - 9 kg</small></li>-->








                   

                <!--</div> -->
                <!--<div class="center1">-->
                     
                <!--</div>-->

                <!--<div class="center1">-->
                   
                <!--</div> -->

                <!--<div class="center1">-->
                   
                <!--</div> -->
                <?php /* <div class="center1">
                   
                    <img src="<?=$asset_url?>admin/assets/<?=$row['cat_image']?>" alt="">
                </div>*/?>

            </div>
        </a>   
       
          <?php }?> 
           </div>
                                
                           
                                
                    <!--==================editing=================-->
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
    $('.logout_btn').click(function() {
        
       
        $.ajax({
            type: 'POST',
            url: '<?php echo $asset_url?>web_action/logout.php', // Replace with the correct path to your server-side script
            data: { logout_btn: true },
            success: function(response) {
                // Optionally, handle the response from the server if needed
                // For example, you can redirect the user to a login page
                window.location.href = '<?php echo $asset_url?>index.php';
            }
        });
    });
    
    </script>
    <script>
 $("#reg_submit_btn").click(function(){
var full_name=$('#user_Name').val();
var contact=$('#user_Mobile').val();
var user_email=$('#user_Email').val();
var user_password=$('#user_Password').val();

if((full_name=="")){
$('#name_error').html('Please Enter Name');
return false;
}else {
   $('#name_error').html('');
 
   }
if((contact=="")){
$('#Mobile_error').html('Please Enter Mobile Number');
return false;
}else {
   $('#Mobile_error').html('');
 
   }

if((user_email=="")){
$('#email_error').html('Please Enter email');
return false;
}else {
   $('#email_error').html('');
 
   }

if((user_password=="")){
$('#password_error').html('Please Enter Password');
return false;
}else {
   $('#password_error').html('');
 
   }



// alert(user_password);

$.ajax({
    url: '<?php echo $asset_url?>web_action/register.php',
    type: 'POST',
    dataType:'json',
    data: {
    full_name:full_name,
    contact:contact,
    user_email:user_email,
    user_password:user_password,
    
    },
    
    success:function(response){
        
    
    if(response==1){
        $('#RegModal').modal('hide');
         $('#loginModal').modal('hide');
        Swal.fire(
      'success!',
      'Register Succesfully.',
      'success'
    )
        
        // $('#RegModal').modal('hide');
        // $('#loginModal').modal('show');
        // $("#loginModal").show();
    }else{
         $('#RegModal').modal('hide');
         $('#loginModal').modal('hide');
        Swal.fire('User is already exists!','error');
    }
    
    
    }
    
    });
    

    });


$("#login_btn").click(function(){
    
var user_email=$('#user_email').val();
var user_password=$('#user_password').val();

if((user_email=="")){
$('#user_email_error').html('Please Enter Email');
return false;
}else {
   $('#user_email_error').html('');
 
   }
if((user_password=="")){
$('#user_password_error').html('Please Enter Password');
return false;
}else {
   $('#user_password_error').html('');
 
   }

$.ajax({
    url: '<?php echo $asset_url?>web_action/userlogin.php',
    type: 'POST',
    dataType:'json',
    data: {
    user_email:user_email,
    user_password:user_password,
    
    },
    
    success:function(response){
    
    if(response==1){
        
          $('#RegModal').modal('hide');
         $('#loginModal').modal('hide');
         
         Swal.fire({
  title: "Good job", text: "Login Succesfully!", type: 
"success"
}).then((result) => {
  // Reload the Page
  location.reload();
});
        
        // // $('#RegModal').modal('hide');
        // $('#loginModal').modal('hide');
        // location.reload();
    }else if(response==2){
        
        $('#RegModal').modal('hide');
         $('#loginModal').modal('hide');
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'User Not Found!'
});
        
    }else{
        
        $('#RegModal').modal('hide');
         $('#loginModal').modal('hide');
        Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'invalid Password !'
});
        
    }
    
    
    }
    
    });
    });
    
    

    $('#searchproduct-items').keyup(function () {
        var query = $(this).val();
        
        if (query !== '') {
            $.ajax({
                url: 'web_action/suggestions.php', // PHP script to fetch suggestions
                method: 'POST',
                data: { query: query },
                success: function (data) {
                    $('#suggestions').html(data);
                }
            });
        } else {
            $('#suggestions').html('');
        }
    });

 
</script>
<script>
    function makeTimer() {

			var endTime = new Date("<?=date('d F Y H:i:s',strtotime($live_cat['expire_date_time']))?>");
			
			var varDate = new Date("<?=date('d F Y H:i:s',strtotime($live_cat['expire_date_time']))?>");
			
            var today = new Date();
			
			endTime = (Date.parse(endTime) / 1000);

			var now = new Date();
			now = (Date.parse(now) / 1000);

			var timeLeft = endTime - now;

			var days = Math.floor(timeLeft / 86400); 
			var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
			var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
			var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
  
			if (hours < "10") { hours = "0" + hours; }
			if (minutes < "10") { minutes = "0" + minutes; }
			if (seconds < "10") { seconds = "0" + seconds; }
	
			if (days < 0) {
			    $('.count_time').hide();
            console.log('-'); ;
            } else {
            console.log('+'); ;
             }

			$("#days").html(days + "<span>Days</span>");
			$("#hours").html(hours + "<span>Hours</span>");
			$("#minutes").html(minutes + "<span>Minutes</span>");
			$("#seconds").html(seconds + "<span>Seconds</span>");		

	}

	setInterval(function() { makeTimer(); }, 1000);
</script>