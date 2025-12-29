<?php include 'header.php';
include 'web_action/config.php';
$cat_id=$_GET['cat_id'];

// print_r($ip); die();
$sub_cat=$_GET['sub_cat_id'];
$child_cat_id=$_GET['child_cat_id'];
// if(!empty($sub_cat)){
// $subcat_sql1 ="select * from `tbl_subCategory` WHERE id=$sub_cat ";
//                         $catResult = mysqli_query($con,$subcat_sql1);
//                         $subcatData = mysqli_fetch_assoc($catResult);
//                         $cat_id=$subcatData['category_id'];
                        
// }else{
//   $cat_id=$_GET['cat_id']; 
// }
// print_r($cat_id); die();
if(!empty($sub_cat)){
    
    $subcat_sql1 ="select * from `tbl_subCategory` WHERE id=$sub_cat ";
                        $catResult = mysqli_query($con,$subcat_sql1);
                        $subcatData = mysqli_fetch_assoc($catResult);
                        $cat_id1=$subcatData['category_id'];
                        $sql ="select * from `tbl_category` WHERE cat_pk_id=$cat_id1 ";
                        $result = mysqli_query($con,$sql);
                    $product_banner = mysqli_fetch_assoc($result);
    
}else if(!empty($child_cat_id)){
    
    $childcat_sql1 ="select * from `tbl_childcategory` WHERE child_pk_id=$child_cat_id ";
                        $childcatResult = mysqli_query($con,$childcat_sql1);
                        $childcatData = mysqli_fetch_assoc($childcatResult);
                        $cat_id1=$childcatData['product_cat'];
                        $sql ="select * from `tbl_category` WHERE cat_pk_id=$cat_id1 ";
                        $result = mysqli_query($con,$sql);
                    $product_banner = mysqli_fetch_assoc($result);
    
}else{
$sql ="select * from `tbl_category` WHERE cat_pk_id=$cat_id ";
                        $result = mysqli_query($con,$sql);
                    $product_banner = mysqli_fetch_assoc($result);

}



// print_r($row); die();
?>
 <link rel="stylesheet" href="<?=$asset_url?>d2afzgorr4mxtq.cloudfront.net/css/theme.min.css">
<style>
.custom-control-label::after, .custom-control-label::before {
    content: unset;
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

.mb-location:before{content:'You are in '}.mb-location:after,.mb-no-location:after{content:'CHANGE';font-size:12px;color:#1249a0;float:right;line-height:22px}.current-location-container.popup .current-location{max-width:1200px;overflow:hidden;min-width:1100px;margin:auto;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);padding-bottom:30px}.current-location-container.popup .current-location-selected{display:none}.current-location-container.popup .current-location-title{font-size:20px;line-height:36px}.current-location-container.popup .search-container .justify-content-center{justify-content:left!important}.close-current-location{z-index:1}@media screen and (max-width:768px){.mb-location{width:100%;display:block}.current-location-container.popup .current-location{max-width:100%;overflow-y:scroll;min-width:100%;height:100%;margin:auto;position:absolute;top:0;left:0;transform:none}.current-location-container.popup .current-location-title{font-size:16px;line-height:36px;margin-bottom:10px}.search-container{text-align:center}.location-heading{margin-top:0}ul.store-list li{display:inline-block;width:calc(100%/2);margin-bottom:10px;text-align:left}ul.store-list{padding:0;list-style:none;display:block;margin:14px auto;max-width:300px}.current-location-container.popup .current-location-selected{position:fixed;width:100%;bottom:0;display:block}.current-location-container.popup .btn-section-current-location .btn-current-location{padding:7px 10px}.current-location-container.popup .current-location-selected .container{padding-right:0}.current-location-container.popup .btn-section-current-location:after{top:12px}.current-location-container.popup .or{margin:10px 0}.current-location-container.popup .current-location .btn{padding:5px 15px;font-size:14px}}@media screen and (min-width:769px){.current-location-container.popup .store-list li{border:1px solid #ddd;width:auto;padding:5px 15px;margin-right:15px;margin-bottom:15px;border-radius:20px;background:#e6e6e6;box-shadow:0 0 5px 0 #ddd}.current-location-container.popup .store-list li:hover{box-shadow:0 4px 8px 0 #ddd;background:#1249a0;color:#fff}.current-location-container.popup .store-list{margin-bottom:0}}@media screen and (width:768px){ul.store-list{padding:0;list-style:none;display:block;margin:14px auto;max-width:100%}.current-location-container.popup .current-location .btn{padding:.375rem .75rem;font-size:16px}ul.store-list li{width:calc(100%/4)}}.current-location-container.popup .current-location .close-current-location{display:none}

</style>


<!-- ========== Body ========== -->


    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
    <div class="container">
        <div class="my-md-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
<!--                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Home</a></li>-->
    <!--                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1">-->
    <!--                            <a href="/shop/"></a>-->
    <!--                        </li>-->
    <!--                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1">-->
    <!--                            <a href="/shop//">-->
    <!--                                    -->
    <!--                                </a>-->
    <!--                        </li>-->
    <!--                        -->
                    </ol>
                </nav>
            </div>
            <form action="" method="get" id="filter_form" autocomplete="off">
                <div class="row mb-4 mb-lg-8">
                    <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                        <div class="mb-6 border border-width-2 border-color-3 borders-radius-6">
                            <!-- List -->
                            <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
                                <li>
                                    <div class="dropdown-title">Browse Categories</div>
                                </li>
                                
                                <?php foreach($category_result as $row){?>
                                    <li>
                                        <a style="text-transform: capitalize;" class="dropdown-toggle dropdown-toggle-collapse" href="javascript:;"
                                           role="button"
                                           data-toggle="collapse" aria-expanded="false"
                                           aria-controls="sidebarNav1Collapse-<?=$row['cat_pk_id']?>"
                                           data-target="#sidebarNav1Collapse-<?=$row['cat_pk_id']?>">
                                            <?=$row['category']?>
                                            <!--<span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                
                                            <!--   </span>-->
                                        </a>
                                        <div id="sidebarNav1Collapse-<?=$row['cat_pk_id']?>" class="collapse"
                                             data-parent="#sidebarNav">
                                            <ul id="sidebarNav1" class="list-unstyled dropdown-list">
                                                 
                                                <?php
                                                $cate_id=$row['cat_pk_id'];
                                                    
                                                    $cate_sql ="select * from `tbl_subCategory` WHERE category_id=$cate_id ";
                                                    $cate_result = mysqli_query($con,$cate_sql);
                        
                                                    
                                                    ?>
                                                    <?php while ($row = mysqli_fetch_array($cate_result, MYSQLI_ASSOC)) {?>
                                                        <li>
                                                            <a class="dropdown-item"
                                                               href="<?=$asset_url?>product.php?sub_cat_id=<?=$row['id']?>">
                                                                <?= $row['category']?>
                                                                <span class="text-gray-25 font-size-12 font-weight-normal">
                                                                     
                                                                    <!--(38)--></span> </a>
                                                        </li>
                                                    
                                                
                                                    <?php }?>
                                                        
                                            </ul>
                                        </div>
                                    </li>
                                <?php }?>
                                    <!--<li>-->
                                    <!--    <a class="dropdown-toggle dropdown-toggle-collapse" href="javascript:;"-->
                                    <!--       role="button"-->
                                    <!--       data-toggle="collapse" aria-expanded="false"-->
                                    <!--       aria-controls="sidebarNav1Collapse-3"-->
                                    <!--       data-target="#sidebarNav1Collapse-3">-->
                                    <!--        Home Entertainment-->
                                    <!--        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                
                                    <!--            (17)</span>-->
                                    <!--    </a>-->
                                    <!--    <div id="sidebarNav1Collapse-3" class="collapse"-->
                                    <!--         data-parent="#sidebarNav">-->
                                    <!--        <ul id="sidebarNav1" class="list-unstyled dropdown-list">-->
                                                <!-- Menu List -->
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="audio/index.html">-->
                                    <!--                            Audio-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (14)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="home-theater-systems/index.html">-->
                                    <!--                            Home Theater Systems-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (3)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                                
                                                    
                                                
                                                <!-- End Menu List -->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                
                                    <!--<li>-->
                                    <!--    <a class="dropdown-toggle dropdown-toggle-collapse" href="javascript:;"-->
                                    <!--       role="button"-->
                                    <!--       data-toggle="collapse" aria-expanded="false"-->
                                    <!--       aria-controls="sidebarNav1Collapse-5"-->
                                    <!--       data-target="#sidebarNav1Collapse-5">-->
                                    <!--        Televisions-->
                                    <!--        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                
                                    <!--            (337)</span>-->
                                    <!--    </a>-->
                                    <!--    <div id="sidebarNav1Collapse-5" class="collapse"-->
                                    <!--         data-parent="#sidebarNav">-->
                                    <!--        <ul id="sidebarNav1" class="list-unstyled dropdown-list">-->
                                                <!-- Menu List -->
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../televisions/led/index.html">-->
                                    <!--                            LED-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (325)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../televisions/oled/index.html">-->
                                    <!--                            OLED-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (8)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../televisions/qled/index.html">-->
                                    <!--                            QLED-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (4)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                <!-- End Menu List -->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                
                                    <!--<li>-->
                                    <!--    <a class="dropdown-toggle dropdown-toggle-collapse" href="javascript:;"-->
                                    <!--       role="button"-->
                                    <!--       data-toggle="collapse" aria-expanded="false"-->
                                    <!--       aria-controls="sidebarNav1Collapse-9"-->
                                    <!--       data-target="#sidebarNav1Collapse-9">-->
                                    <!--        Washing Machine-->
                                    <!--        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                
                                    <!--            (72)</span>-->
                                    <!--    </a>-->
                                    <!--    <div id="sidebarNav1Collapse-9" class="collapse"-->
                                    <!--         data-parent="#sidebarNav">-->
                                    <!--        <ul id="sidebarNav1" class="list-unstyled dropdown-list">-->
                                                <!-- Menu List -->
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../washing-machine/front-loading/index.html">-->
                                    <!--                            Front Loading-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (30)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../washing-machine/semi-automatic/index.html">-->
                                    <!--                            Semi Automatic-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (5)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../washing-machine/top-loading/index.html">-->
                                    <!--                            Top Loading-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (36)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../washing-machine/washer-dryer/index.html">-->
                                    <!--                            Washer Dryer-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (1)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                <!-- End Menu List -->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                
                                    <!--<li>-->
                                    <!--    <a class="dropdown-toggle dropdown-toggle-collapse" href="javascript:;"-->
                                    <!--       role="button"-->
                                    <!--       data-toggle="collapse" aria-expanded="false"-->
                                    <!--       aria-controls="sidebarNav1Collapse-4"-->
                                    <!--       data-target="#sidebarNav1Collapse-4">-->
                                    <!--        Computers-->
                                    <!--        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                
                                    <!--            (12)</span>-->
                                    <!--    </a>-->
                                    <!--    <div id="sidebarNav1Collapse-4" class="collapse"-->
                                    <!--         data-parent="#sidebarNav">-->
                                    <!--        <ul id="sidebarNav1" class="list-unstyled dropdown-list">-->
                                                <!-- Menu List -->
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../computers/laptops/index.html">-->
                                    <!--                            Laptops-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (12)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                <!-- End Menu List -->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                
                                    <!--<li>-->
                                    <!--    <a class="dropdown-toggle dropdown-toggle-collapse" href="javascript:;"-->
                                    <!--       role="button"-->
                                    <!--       data-toggle="collapse" aria-expanded="false"-->
                                    <!--       aria-controls="sidebarNav1Collapse-8"-->
                                    <!--       data-target="#sidebarNav1Collapse-8">-->
                                    <!--        Refrigerator-->
                                    <!--        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                
                                    <!--            (261)</span>-->
                                    <!--    </a>-->
                                    <!--    <div id="sidebarNav1Collapse-8" class="collapse"-->
                                    <!--         data-parent="#sidebarNav">-->
                                    <!--        <ul id="sidebarNav1" class="list-unstyled dropdown-list">-->
                                                <!-- Menu List -->
                                                
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../refrigerator/deep-freezer/index.html">-->
                                    <!--                            Deep Freezer-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (1)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../refrigerator/double-door/index.html">-->
                                    <!--                            Double Door-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (175)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../refrigerator/side-by-side/index.html">-->
                                    <!--                            Side by Side-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (4)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../refrigerator/single-door/index.html">-->
                                    <!--                            Single Door-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (80)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../refrigerator/triple-door/index.html">-->
                                    <!--                            Triple Door-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (1)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                <!-- End Menu List -->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                
                                    <!--<li>-->
                                    <!--    <a class="dropdown-toggle dropdown-toggle-collapse" href="javascript:;"-->
                                    <!--       role="button"-->
                                    <!--       data-toggle="collapse" aria-expanded="false"-->
                                    <!--       aria-controls="sidebarNav1Collapse-7"-->
                                    <!--       data-target="#sidebarNav1Collapse-7">-->
                                    <!--        Mobiles-->
                                    <!--        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                
                                    <!--            (309)</span>-->
                                    <!--    </a>-->
                                    <!--    <div id="sidebarNav1Collapse-7" class="collapse"-->
                                    <!--         data-parent="#sidebarNav">-->
                                    <!--        <ul id="sidebarNav1" class="list-unstyled dropdown-list">-->
                                                <!-- Menu List -->
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../mobiles/smart-phones/index.html">-->
                                    <!--                            Smart Phones-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (309)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../mobiles/tablet/index.html">-->
                                    <!--                            Tablet-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (0)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                <!-- End Menu List -->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                
                                    <!--<li>-->
                                    <!--    <a class="dropdown-toggle dropdown-toggle-collapse" href="javascript:;"-->
                                    <!--       role="button"-->
                                    <!--       data-toggle="collapse" aria-expanded="false"-->
                                    <!--       aria-controls="sidebarNav1Collapse-2"-->
                                    <!--       data-target="#sidebarNav1Collapse-2">-->
                                    <!--        Home Appliances-->
                                    <!--        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                
                                    <!--            (108)</span>-->
                                    <!--    </a>-->
                                    <!--    <div id="sidebarNav1Collapse-2" class="collapse"-->
                                    <!--         data-parent="#sidebarNav">-->
                                    <!--        <ul id="sidebarNav1" class="list-unstyled dropdown-list">-->
                                                <!-- Menu List -->
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../home-appliances/air-coolers/index.html">-->
                                    <!--                            Air Coolers-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (24)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../home-appliances/ceiling-fans/index.html">-->
                                    <!--                            Ceiling Fans-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (5)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../home-appliances/electric-iron/index.html">-->
                                    <!--                            Electric Iron-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (3)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../home-appliances/room-heater/index.html">-->
                                    <!--                            Room Heater-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (6)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../home-appliances/vacuum-cleaner/index.html">-->
                                    <!--                            Vacuum Cleaner-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (5)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../home-appliances/water-heater/index.html">-->
                                    <!--                            Water Heater-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (65)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                <!-- End Menu List -->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                
                                    <!--<li>-->
                                    <!--    <a class="dropdown-toggle dropdown-toggle-collapse" href="javascript:;"-->
                                    <!--       role="button"-->
                                    <!--       data-toggle="collapse" aria-expanded="false"-->
                                    <!--       aria-controls="sidebarNav1Collapse-6"-->
                                    <!--       data-target="#sidebarNav1Collapse-6">-->
                                    <!--        Kitchen Appliances-->
                                    <!--        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                
                                    <!--            (412)</span>-->
                                    <!--    </a>-->
                                    <!--    <div id="sidebarNav1Collapse-6" class="collapse"-->
                                    <!--         data-parent="#sidebarNav">-->
                                    <!--        <ul id="sidebarNav1" class="list-unstyled dropdown-list">-->
                                                <!-- Menu List -->
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/chimney/index.html">-->
                                    <!--                            Chimney-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (19)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/citrus-press-juicer/index.html">-->
                                    <!--                            Citrus Press Juicer-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (41)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/cooktop/index.html">-->
                                    <!--                            Cooktop-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (10)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/dishwashers/index.html">-->
                                    <!--                            Dishwashers-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (4)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/hand-mixer/index.html">-->
                                    <!--                            Hand Mixer-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (1)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/induction-cooker/index.html">-->
                                    <!--                            Induction Cooktop-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (10)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/kettle/index.html">-->
                                    <!--                            Kettle-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (3)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/microwaves/index.html">-->
                                    <!--                            Microwaves-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (184)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/mixer-grinder/index.html">-->
                                    <!--                            Mixer Grinder-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (39)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/over-toaster-grill/index.html">-->
                                    <!--                            Oven Toaster Grill-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (55)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/rice-cooker/index.html">-->
                                    <!--                            Rice Cooker-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (1)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/roti-maker/index.html">-->
                                    <!--                            Roti Maker-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (1)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/sandwich-maker/index.html">-->
                                    <!--                            Sandwich Maker-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (2)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/toaster/index.html">-->
                                    <!--                            Toaster-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (4)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../kitchen-appliances/water-purifier/index.html">-->
                                    <!--                            Water Purifier-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (38)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                <!-- End Menu List -->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                
                                    <!--<li>-->
                                    <!--    <a class="dropdown-toggle dropdown-toggle-collapse" href="javascript:;"-->
                                    <!--       role="button"-->
                                    <!--       data-toggle="collapse" aria-expanded="false"-->
                                    <!--       aria-controls="sidebarNav1Collapse-10"-->
                                    <!--       data-target="#sidebarNav1Collapse-10">-->
                                    <!--        Camera-->
                                    <!--        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                
                                    <!--            (44)</span>-->
                                    <!--    </a>-->
                                    <!--    <div id="sidebarNav1Collapse-10" class="collapse"-->
                                    <!--         data-parent="#sidebarNav">-->
                                    <!--        <ul id="sidebarNav1" class="list-unstyled dropdown-list">-->
                                                <!-- Menu List -->
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../camera/camera-type/index.html">-->
                                    <!--                            DSLR Camera-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (44)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                <!-- End Menu List -->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                
                                    <!--<li>-->
                                    <!--    <a class="dropdown-toggle dropdown-toggle-collapse" href="javascript:;"-->
                                    <!--       role="button"-->
                                    <!--       data-toggle="collapse" aria-expanded="false"-->
                                    <!--       aria-controls="sidebarNav1Collapse-11"-->
                                    <!--       data-target="#sidebarNav1Collapse-11">-->
                                    <!--        Personal Care-->
                                    <!--        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                
                                    <!--            (0)</span>-->
                                    <!--    </a>-->
                                    <!--    <div id="sidebarNav1Collapse-11" class="collapse"-->
                                    <!--         data-parent="#sidebarNav">-->
                                    <!--        <ul id="sidebarNav1" class="list-unstyled dropdown-list">-->
                                                <!-- Menu List -->
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../personal-care/hair-dryer/index.html">-->
                                    <!--                            Hair Dryer-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (0)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                    
                                    <!--                    <li>-->
                                    <!--                        <a class="dropdown-item"-->
                                    <!--                           href="../personal-care/hair-straightener/index.html">-->
                                    <!--                            Hair Straightener-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                                     
                                    <!--                                (0)</span> </a>-->
                                    <!--                    </li>-->
                                                    
                                                
                                                <!-- End Menu List -->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</li>-->
                                
                            </ul>
                            <!-- End List -->
                        </div>
                        <div class="sticky-top mb-6">
                            <div class="border-bottom border-color-1 mb-5">
                                <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filters</h3>
                            </div>
                            <div class="border-bottom pb-4 mb-4">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Brands</h4>
                                 <!--Checkboxes -->
                                <?php
                                
                                $brand_ids = [];
                                         if($_GET['sub_cat_id']){
                                            $selectproduct_query="SELECT * FROM tbl_product WHERE product_sub_cat=$sub_cat";
                                        }else{
                                        $selectproduct_query="SELECT * FROM tbl_product";
                                        }
                                        
                                        $product=mysqli_query($con,$selectproduct_query);
                                        
                                        while($res= mysqli_fetch_array($product))
                                        {
                                            
                                        $category_array = json_decode($res['product_cat']);
                                        if(!empty($cat_id)){
                                        if(!in_array($cat_id,$category_array)){
                                            
                                           continue ; 
                                        }
                                            
                                        }
                                       $brand_id=$res['brand_fk_id'];
                                       
                                       array_push($brand_ids,$brand_id);
                                       
                                    }
                                    
                                    $brand_ids = array_unique($brand_ids);
                                    
                                    // print_r($brand_ids);
                                    
                                    foreach($brand_ids as $brand_id){
                                        
                                        $brand_sql="SELECT * FROM tbl_brand WHERE brand_id=$brand_id";
                                       $brand_data=mysqli_query($con,$brand_sql);
                                    $res2= mysqli_fetch_assoc($brand_data);
                                    ?>
                                      
                                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                            <div class="">
                                                <input type="checkbox" class=" brand_checkbox"
                                                      
                                                       
                                                       name="brand"
                                                       value="<?=$res2['brand_id']?>"
                                                        >
                                                <label class="custom-control-label"
                                                       >
                                                    <?=$res2['brand_name']?>
                                                    <span class="text-gray-25 font-size-12 font-weight-normal">
                                                        
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    
                                      <?php } ?>
                                
                                    
                                
                                 <!--End Checkboxes -->
                                 <!--If brand has more then N object then show show more/show less-->
                                

                            </div>
                            <div class="range-slider">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>
                                 <!--Range Slider -->
                                <input  class="js-range-slider price_slider" type="text"
                                       data-extra-classes="u-range-slider u-range-slider-indicator  u-range-slider-grid"
                                       data-type="double"
                                       data-grid="false"
                                       data-hide-from-to="true"
                                       data-prefix="₹ "
                                       data-min="0"
                                       data-max="200000"
                                       data-from="0"
                                       data-to="200000"
                                       data-result-min="#rangeSliderExample3MinResult"
                                       name="range_price"
                                       data-skin="round"
                                       data-result-max="#rangeSliderExample3MaxResult">
                                 <!--End Range Slider -->
                                <div class="mt-1 text-gray-111 d-flex mb-4">
                                    <span class="mr-0dot5">Price: </span>
                                    <span>₹</span>
                                    <span id="rangeSliderExample3MinResult" class=""></span>
                                    <span class="mx-0dot5"> — </span>
                                    <span>₹</span>
                                    <span id="rangeSliderExample3MaxResult" class=""></span>
                                </div>
                            </div>
                            

                            
                                
                                    <!--<div class="border-bottom pb-4 mb-4">-->
                                    <!--    <h4 class="font-size-14 mb-3 font-weight-bold">-->
                                    <!--        Audio Type-->
                                    <!--    </h4>-->

                                         <!--Checkboxes -->
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-Soundbar"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Soundbar"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Soundbar">-->
                                    <!--                        Soundbar-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (4)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-Speaker"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Speaker"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Speaker">-->
                                    <!--                        Speaker-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (5)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-Home Theatre"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Home Theatre"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Home Theatre">-->
                                    <!--                        Home Theatre-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (3)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-Music System"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Music System"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Music System">-->
                                    <!--                        Music System-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (6)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-Bluetooth Speaker"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Bluetooth Speaker"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Bluetooth Speaker">-->
                                    <!--                        Bluetooth Speaker-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (1)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                         <!--End Checkboxes -->

                                         <!--End View More - Collapse -->
                                        
                                         <!--End Link -->
                                    <!--</div>-->
                                
                            
                                
                                    <!--<div class="border-bottom pb-4 mb-4">-->
                                    <!--    <h4 class="font-size-14 mb-3 font-weight-bold">-->
                                    <!--        Configuration-->
                                    <!--    </h4>-->

                                         <!--Checkboxes -->
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-2.0 Channel"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="2.0 Channel"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-2.0 Channel">-->
                                    <!--                        2.0 Channel-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (6)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-5.1 Channel"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="5.1 Channel"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-5.1 Channel">-->
                                    <!--                        5.1 Channel-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (4)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-2.1 Channel"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="2.1 Channel"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-2.1 Channel">-->
                                    <!--                        2.1 Channel-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (1)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-Portable Bluetooth Speaker"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Portable Bluetooth Speaker"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Portable Bluetooth Speaker">-->
                                    <!--                        Portable Bluetooth Speaker-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (1)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-Mono"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Mono"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Mono">-->
                                    <!--                        Mono-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (1)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="collapse"-->
                                    <!--                 id="attribute_name-103">-->
                                    <!--                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                    <div class="custom-control custom-checkbox">-->
                                    <!--                        <input type="checkbox"-->
                                    <!--                               class="custom-control-input attribute_value_select"-->
                                    <!--                               onchange="this.form.submit()"-->
                                    <!--                               id="attribute_value-4.1 Channel"-->
                                    <!--                               name="attribute_value"-->
                                    <!--                               value="4.1 Channel"-->
                                                                    
                                    <!--                        >-->
                                    <!--                        <label class="custom-control-label"-->
                                    <!--                               for="attribute_value-4.1 Channel">-->
                                    <!--                            4.1 Channel-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                            (1)-->
                                    <!--                        </span>-->
                                    <!--                        </label>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="collapse"-->
                                    <!--                 id="attribute_name-103">-->
                                    <!--                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                    <div class="custom-control custom-checkbox">-->
                                    <!--                        <input type="checkbox"-->
                                    <!--                               class="custom-control-input attribute_value_select"-->
                                    <!--                               onchange="this.form.submit()"-->
                                    <!--                               id="attribute_value-3.1 Channel"-->
                                    <!--                               name="attribute_value"-->
                                    <!--                               value="3.1 Channel"-->
                                                                    
                                    <!--                        >-->
                                    <!--                        <label class="custom-control-label"-->
                                    <!--                               for="attribute_value-3.1 Channel">-->
                                    <!--                            3.1 Channel-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                            (1)-->
                                    <!--                        </span>-->
                                    <!--                        </label>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="collapse"-->
                                    <!--                 id="attribute_name-103">-->
                                    <!--                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                    <div class="custom-control custom-checkbox">-->
                                    <!--                        <input type="checkbox"-->
                                    <!--                               class="custom-control-input attribute_value_select"-->
                                    <!--                               onchange="this.form.submit()"-->
                                    <!--                               id="attribute_value-Stereo"-->
                                    <!--                               name="attribute_value"-->
                                    <!--                               value="Stereo"-->
                                                                    
                                    <!--                        >-->
                                    <!--                        <label class="custom-control-label"-->
                                    <!--                               for="attribute_value-Stereo">-->
                                    <!--                            Stereo-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                            (1)-->
                                    <!--                        </span>-->
                                    <!--                        </label>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                         <!--End Checkboxes -->

                                         <!--End View More - Collapse -->
                                        
                                         <!--    Link -->
                                    <!--        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"-->
                                    <!--           data-toggle="collapse"-->
                                    <!--           href="#attribute_name-103"-->
                                    <!--           role="button"-->
                                    <!--           aria-expanded="false"-->
                                    <!--           aria-controls="attribute_name-103">-->
                                    <!--    <span class="link__icon text-gray-27 bg-white">-->
                                    <!--        <span class="link__icon-inner">+</span>-->
                                    <!--    </span>-->
                                    <!--            <span class="link-collapse__default">Show more</span>-->
                                    <!--            <span class="link-collapse__active">Show less</span>-->
                                    <!--        </a>-->
                                        
                                         <!--End Link -->
                                    <!--</div>-->
                                
                            
                            <div class="border-bottom pb-4 mb-4">
                                <h4 class="font-size-14 mb-3 font-weight-bold">
                                    Discount
                                </h4>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input attribute_value_select"
                                               onchange="this.form.submit()" id="discount_value-10"
                                               name="discount_value" value="10"
                                               
                                        >
                                        <label class="custom-control-label" for="discount_value-10">
                                            10% Off or more
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input attribute_value_select"
                                               onchange="this.form.submit()" id="discount_value-20"
                                               name="discount_value" value="20"
                                               
                                        >
                                        <label class="custom-control-label" for="discount_value-20">
                                            20% Off or more
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input attribute_value_select"
                                               onchange="this.form.submit()" id="discount_value-30"
                                               name="discount_value" value="30"
                                               
                                        >
                                        <label class="custom-control-label" for="discount_value-30">
                                            30% Off or more
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input attribute_value_select"
                                               onchange="this.form.submit()" id="discount_value-40"
                                               name="discount_value" value="40"
                                               
                                        >
                                        <label class="custom-control-label" for="discount_value-40">
                                            40% Off or more
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-wd-9gdot5">
                        <div class="mb-3 mb-lg-6">
                            <a href="#" class="row align-items-center">
                                <?php/*<div class="col-md-12 mb-4 mb-md-0">
                                    
                                        <img class="img-fluid lazy mx-auto d-block" src="../../static/assets/svg/preloaders/loader.svg" data-src="<?=$asset_url?>admin/assets/<?=$product_banner['cat_bannerImage'] ?>"
                                             alt="Image Description">
                                    
                                </div>*/?>
                                <div class="col-md-12 mb-4 mb-md-0">
                                    
                                        <img class="img-fluid lazy mx-auto d-block" src="../../static/assets/svg/preloaders/loader.svg" data-src="https://cdna.artstation.com/p/assets/images/images/015/633/570/large/sangeeta-bisht-sangeeta-bisht-home-appliance-service-banner.jpg?1549037196" style="width: 100%;"
                                             alt="Image Description">
                                    
                                </div>
                                
                            </a>
                        </div>
                        <!-- Shop-control-bar Title -->
                        <div class="flex-center-between mb-2 mb-lg-3">
                            <h3 class="font-size-25 mb-0"><?php if(!empty($sub_cat)){?> <?=$subcatData['category']?> <?php }else{?><?=$product_banner['category']?>
                            <?php }?></h3>
                            <p class="font-size-14 text-gray-90 mb-0">
                                Showing 1 - 15
                                of 15 results
                            </p>
                        </div>
                        <!-- End shop-control-bar Title -->
                        <!-- Shop-control-bar -->
                        <div class="flex-center-between borders-radius-9 py-2 horizontal-filter">
                            <div class="d-xl-none">
                                <!-- Account Sidebar Toggle Button -->
                                <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal"
                                   href="javascript:;"
                                   role="button"
                                   aria-controls="sidebarContent1"
                                   aria-haspopup="true"
                                   aria-expanded="false"
                                   data-unfold-event="click"
                                   data-unfold-hide-on-scroll="false"
                                   data-unfold-target="#sidebarContent1"
                                   data-unfold-type="css-animation"
                                   data-unfold-animation-in="fadeInLeft"
                                   data-unfold-animation-out="fadeOutLeft"
                                   data-unfold-duration="500">
                                    <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
                                </a>
                                <!-- End Account Sidebar Toggle Button -->
                            </div>
                            <div class="px-3 d-none d-xl-block">
                                <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-one-example1-tab" data-toggle="pill"
                                           href="#pills-one-example1" role="tab" aria-controls="pills-one-example1"
                                           aria-selected="false">
                                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                <i class="fa fa-th"></i>
                                            </div>
                                        </a>
                                    </li>

                                    <!--<li class="nav-item">
                                        <a class="nav-link" id="pills-three-example1-tab" data-toggle="pill"
                                           href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                                           aria-selected="true">
                                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                <i class="fa fa-list"></i>
                                            </div>
                                        </a>
                                    </li>-->

                                </ul>
                            </div>
                            <div class="d-flex filter-dropdown">
                                <!-- Select -->
                                <select name="sort_option" id="sort_options_id"
                                        class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                        data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                    <option style="display: none;" id="default" value="one" >
                                        Popularity
                                    </option>
                                    <option id="az" name="az" value="two" >Sort by A-Z
                                    </option>
                                    <option id="za" value="three" >
                                        Sort by Z-A
                                    </option>
                                    <option id="pricelh" value="four" 
                                            selected >Price: low to high
                                    </option>
                                    <option id="pricehl" value="five" >Price: high to low
                                    </option>
                                    <option id="dicountl" value="six" >Discount: high to low
                                    </option>
                                </select>
                                <!-- End Select -->
                                <!-- Select -->
                                <select class="js-select selectpicker dropdown-select max-width-120"
                                        
                                        name="show_count"
                                        data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                    <option value="40" >Show 40</option>
                                    <option value="60" >Show 60</option>
                                    <option value="100" >Show All
                                    </option>
                                </select>
                                <!-- End Select -->
                            </div>
                            <nav class="px-3 flex-horizontal-center text-gray-20 d-none d-xl-flex">
                                <input size="2" min="1" max="1" step="1"
                                       type="number"
                                       name="page"
                                       id="current_page_id"
                                       
                                       class="form-control text-center px-2 height-35"
                                       value="1">
                                <!--                                of 1-->
                                
                            </nav>
                        </div>
                        <!-- End Shop-control-bar -->
                        <!-- Shop Body -->
                        <!-- Tab Content -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                                 aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                                <ul class="row list-unstyled product_data products-group no-gutters products-slider with-margin-less">
                                    
                                        
                                        <?php
                                        
                                        
                                            $select_query="SELECT * FROM tbl_product";
                                        
                                        
                                        $query=mysqli_query($con,$select_query);
                                        
                                        $nums=mysqli_num_rows($query);
                                        // print_r($nums); die();
                                        ?>
                                        
                                        <?php if($nums > 0) {
                                        
                                        while($res= mysqli_fetch_array($query))
                                        {
                                            
                                        $category_array = json_decode($res['product_cat']);
                                        if(!empty($cat_id)){
                                        if(!in_array($cat_id,$category_array)){
                                            
                                           continue ; 
                                        }
                                            
                                        }
                                        
                                        $subcat_array = json_decode($res['product_sub_cat']);
                                        if(!empty($sub_cat)){
                                        if(!in_array($sub_cat,$subcat_array)){
                                            
                                           continue ; 
                                        }
                                            
                                        }
                                        
                                        
                                        $child_cat_array = json_decode($res['product_child_cat']);
                                        if(!empty($child_cat_id)){
                                        if(!in_array($child_cat_id,$child_cat_array)){
                                            
                                           continue ; 
                                        }
                                            
                                        }
                                        
                                        ?>   
                                        
                                         
  

                                        <li class="col-6 col-sm-4 col-lg-3">
                                        <div class="product-item">
                                            <div class="product-item__outer h-100">
                                                <div class="product-item__inner position-relative">
                                                    <div class="product-item__body">
                                                        <div class="mb-2">
                                                            <div class="coupon-band font-size-12">

                                                            </div>
                                                        </div>
                                                        <button type="button" class="quick-view" data-toggle="modal"
                                                                data-target="#exampleModalCenter"
                                                                id="709">
                                                            <i class="font-size-14 text-gray-5 fa fa-eye"
                                                               data-toggle="tooltip"
                                                                data-placement="top" title="Quick View">
                                                            </i>
                                                        </button>
                                                        <button type="button"
                                                                value="709"
                                                                class="add-wishlist add-wishlist-709">
                                                            <i class="font-size-14 text-gray-5 fas fa-heart"></i>
                                                        </button>
                                                        <div class="mb-2">
                                                            <a href="<?=$asset_url?>product_details.php?product_id=<?=$res['product_pk_id']?>" class="square-img product-img-mb">
                                                                
                                                                    
                                                                        <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"
                                                                                data-src="<?=$asset_url?>admin/assets/<?=$res['featurd_image']?>"
                                                                                alt="Image Description">
                                                                    
                                                                
                                                            </a>
                                                        </div>
                                                        <h5 class="mb-1 product-item__title"><a
                                        href="<?=$asset_url?>product_details.php?product_id=<?=$res['product_pk_id']?>"
                                        class="text-blue font-weight-bold" style="color: #2D2554 !important; text-transform: uppercase !important;"><?=$res['product_title']?></a>
                                                        </h5>
                                                        
                                                        <p class="price-label">Our Price</p>

                                                        <div class="flex-center-between mb-1">
                                                            <div class="prodcut-price d-flex align-items-center position-relative">
                                                                <ins class="font-size-20 text-blue-2 text-decoration-none">
                                                                    <span class="rupees">₹</span><?=$res['product_price']?>
                                                                </ins>
                                                                
                                                                    <div class="font-size-12 mb-0 position-absolute bottom--100">
                                                                        MRP
                                                                        <del>
                                                                            <span class="rupees">₹</span>
                                                                            <?=$res['discount']?>
                                                                        </del>
                                                                    </div>
                                                                   <!-- <div class="dis-per-sm ml-2">26%
                                                                        off
                                                                    </div>-->
                                                                
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="product-item__footer">
                                                        <div class="border-top pt-2 flex-center-between flex-wrap">
                                                            
                                                            
                                                            <!--<label class="product-compare font-size-13"-->
                                                            <!--       for="compare-product-709">-->
                                                            <!--    <input type="checkbox"-->
                                                            <!--           value="709"-->
                                                            <!--           id="compare-product-709"-->
                                                            <!--           class="compare-product">-->
                                                            <!--    <span>-->
                                                            <!--        <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                                            <!--        Compare-->
                                                            <!--    </span>-->
                                                            <!--</label>-->
                                                            
                                                            
                                                            <a href="javascript:;"
                                                    data-id="<?=$res['product_pk_id']?>"
                                        data-id="<?=$res['product_pk_id']?>"
                                        data-name="<?=$res['product_title']?>"
                                        data-image="<?=$res['featurd_image']?>"
                                        data-price="<?=$res['product_price']?>"
                                        data-qty="1"
                                                   class="text-gray-6  font-size-13 add_Cart"><i
                                                        class="ec ec-add-to-cart mr-1 font-size-15"></i> Add
                                                    Cart</a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </li>
                                        
                                    <?php }
                                    
                                    }?>
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="711">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="711"-->
                                        <!--                        class="add-wishlist add-wishlist-711">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="product_details.php" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_VIcL618.jpg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="product_details.php"-->
                                        <!--                        class="text-blue font-weight-bold">Carvaan Saregama Mini 2.0 Rabindrasangeet- Music Player with Bluetooth/FM/AM/AUX (Terracotta Brown)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>1900-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    2590-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">26%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-711">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="711"-->
                                        <!--                               id="compare-product-711"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=711 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="712">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="712"-->
                                        <!--                        class="add-wishlist add-wishlist-712">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/712/saregama-carvaan-mini-hindi-20-bluetooth-speaker-terracotta-brown/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_EieQmGV.jpg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/712/saregama-carvaan-mini-hindi-20-bluetooth-speaker-terracotta-brown/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Saregama Carvaan Mini Hindi 2.0 - Bluetooth Speaker (Terracotta Brown)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>1900-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    2590-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">26%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-712">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="712"-->
                                        <!--                               id="compare-product-712"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=712 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="714">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="714"-->
                                        <!--                        class="add-wishlist add-wishlist-714">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/714/saregama-carvaan-mini-hindi-20-music-player-with-bluetoothfmamaux-skyline-blue/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_D0qj9UI.jpg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/714/saregama-carvaan-mini-hindi-20-music-player-with-bluetoothfmamaux-skyline-blue/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Saregama Carvaan Mini Hindi 2.0- Music Player with Bluetooth/FM/AM/AUX (Skyline Blue)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>1900-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    2590-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">26%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-714">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="714"-->
                                        <!--                               id="compare-product-714"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=714 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="713">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="713"-->
                                        <!--                        class="add-wishlist add-wishlist-713">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/713/carvaan-saregama-mini-kids-pre-loaded-with-stories-rhymes-learnings-mantras-with-bluetoothusbaux-in-out/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_UaViRvN.jpg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/713/carvaan-saregama-mini-kids-pre-loaded-with-stories-rhymes-learnings-mantras-with-bluetoothusbaux-in-out/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Carvaan Saregama Mini Kids - Pre-Loaded with Stories, Rhymes, Learnings, Mantras with Bluetooth/USB/Aux in-Out</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>2700-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    2990-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">9%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-713">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="713"-->
                                        <!--                               id="compare-product-713"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=713 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="80">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="80"-->
                                        <!--                        class="add-wishlist add-wishlist-80">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/80/google-home-mini-with-google-assistant-smart-speaker-charcoal/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/236x236/images/Google Home Mini_1.jpeg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/80/google-home-mini-with-google-assistant-smart-speaker-charcoal/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Google Home Mini with Google Assistant Smart Speaker(Charcoal)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>4000-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    5000-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">20%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-80">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="80"-->
                                        <!--                               id="compare-product-80"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=80 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="710">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="710"-->
                                        <!--                        class="add-wishlist add-wishlist-710">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/710/carvaan-saregama-portable-with-5000-preloaded-songs-fmbtaux-premium-bengali-music-player-royal-blue/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_p7vEolq.jpg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/710/carvaan-saregama-portable-with-5000-preloaded-songs-fmbtaux-premium-bengali-music-player-royal-blue/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Carvaan Saregama Portable with 5000 Preloaded Songs, FM/BT/AUX Premium Bengali Music Player (Royal Blue)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>6610-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    7390-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">10%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-710">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="710"-->
                                        <!--                               id="compare-product-710"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=710 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="78">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="78"-->
                                        <!--                        class="add-wishlist add-wishlist-78">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/78/sony-21-channel-multimedia-speaker-system-with-bluetooth-sa-d20-black/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/236x236/images/Sony 2.1 Channel Multimedia Speaker_1.jpeg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/78/sony-21-channel-multimedia-speaker-system-with-bluetooth-sa-d20-black/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Sony 2.1 Channel Multimedia Speaker System with Bluetooth (SA-D20, Black)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>7900-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    8990-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">12%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-78">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="78"-->
                                        <!--                               id="compare-product-78"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=78 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="75">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="75"-->
                                        <!--                        class="add-wishlist add-wishlist-75">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/75/panasonic-2-channel-80-watt-audio-speaker-system-sc-htb200gwk-black/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_l5GnmVS.jpg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/75/panasonic-2-channel-80-watt-audio-speaker-system-sc-htb200gwk-black/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Panasonic 2 Channel 80 Watt Audio Speaker System (SC-HTB200GWK, Black)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>8393-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    11990-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">30%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-75">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="75"-->
                                        <!--                               id="compare-product-75"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=75 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="79">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="79"-->
                                        <!--                        class="add-wishlist add-wishlist-79">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/79/sony-portable-wireless-bluetooth-speakers-with-nfc-srs-xb30-blue/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/236x236/images/Sony Portable Wireless Bluetooth Speakers_1.jpg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/79/sony-portable-wireless-bluetooth-speakers-with-nfc-srs-xb30-blue/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Sony Portable Wireless Bluetooth Speakers With NFC (SRS-XB30, Blue)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>9900-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    10990-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">9%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-79">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="79"-->
                                        <!--                               id="compare-product-79"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=79 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="570">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="570"-->
                                        <!--                        class="add-wishlist add-wishlist-570">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/570/sony-sa-d40-80-w-bluetooth-home-theatre-black-41-channel/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_wqtXVer.jpeg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/570/sony-sa-d40-80-w-bluetooth-home-theatre-black-41-channel/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">SONY SA-D40 80 W Bluetooth Home Theatre  (Black, 4.1 Channel)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>11990-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    11990-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class=" ml-2">-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-570">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="570"-->
                                        <!--                               id="compare-product-570"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=570 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="76">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="76"-->
                                        <!--                        class="add-wishlist add-wishlist-76">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/76/sony-51ch-dolby-digital-soundbar-home-theatre-system-with-bluetooth-connectivity-ht-s20r-black/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/HWT400_9.png"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/76/sony-51ch-dolby-digital-soundbar-home-theatre-system-with-bluetooth-connectivity-ht-s20r-black/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Sony 5.1ch Dolby Digital Soundbar Home Theatre System With Bluetooth Connectivity (HT-S20R, Black)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>15990-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    23990-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">33%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-76">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="76"-->
                                        <!--                               id="compare-product-76"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=76 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="342">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="342"-->
                                        <!--                        class="add-wishlist add-wishlist-342">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/342/sony-ht-rt3-real-51ch-dolby-audio-soundbar-home-theatre-system-600w-dolby-audio-bluetooth-connectivity-black/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/Sony_HT_RT3_1.jpg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/342/sony-ht-rt3-real-51ch-dolby-audio-soundbar-home-theatre-system-600w-dolby-audio-bluetooth-connectivity-black/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Sony HT-RT3 Real 5.1ch Dolby Audio Soundbar Home Theatre System (600W, Dolby Audio, Bluetooth Connectivity) (Black)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>20000-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    24990-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">19%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-342">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="342"-->
                                        <!--                               id="compare-product-342"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=342 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="343">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="343"-->
                                        <!--                        class="add-wishlist add-wishlist-343">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/343/sony-ht-rt40-real-51ch-dolby-audio-soundbar-home-theatre-system-with-tall-boy-speakers-600w-dolby-audio-bluetooth-connectivity-black/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/Sony_HT_RT40_1.jpg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/343/sony-ht-rt40-real-51ch-dolby-audio-soundbar-home-theatre-system-with-tall-boy-speakers-600w-dolby-audio-bluetooth-connectivity-black/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Sony HT-RT40 Real 5.1ch Dolby Audio Soundbar Home Theatre System with Tall boy Speakers (600W, Dolby Audio, Bluetooth Connectivity) (Black)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>26990-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    29990-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">10%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-343">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="343"-->
                                        <!--                               id="compare-product-343"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=343 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                        
                                        
                                        <!--<li class="col-6 col-sm-4 col-lg-3">-->
                                        <!--<div class="product-item">-->
                                        <!--    <div class="product-item__outer h-100">-->
                                        <!--        <div class="product-item__inner position-relative">-->
                                        <!--            <div class="product-item__body">-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <div class="coupon-band font-size-12">-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <button type="button" class="quick-view" data-toggle="modal"-->
                                        <!--                        data-target="#exampleModalCenter"-->
                                        <!--                        id="344">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fa fa-eye"-->
                                        <!--                       data-toggle="tooltip"-->
                                        <!--                        data-placement="top" title="Quick View">-->
                                        <!--                    </i>-->
                                        <!--                </button>-->
                                        <!--                <button type="button"-->
                                        <!--                        value="344"-->
                                        <!--                        class="add-wishlist add-wishlist-344">-->
                                        <!--                    <i class="font-size-14 text-gray-5 fas fa-heart"></i>-->
                                        <!--                </button>-->
                                        <!--                <div class="mb-2">-->
                                        <!--                    <a href="../../product/344/sony-ht-s500rf-real-51ch-dolby-audio-soundbar-home-theatre-system-1000w-dolby-audio-bluetooth-connectivity-black/index.html" class="square-img product-img-mb">-->
                                                                
                                                                    
                                        <!--                                <img class="img-fluid lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                        data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/Sony_HT_S500RF_1.jpg"-->
                                        <!--                                        alt="Image Description">-->
                                                                    
                                                                
                                        <!--                    </a>-->
                                        <!--                </div>-->
                                        <!--                <h5 class="mb-1 product-item__title"><a-->
                                        <!--                        href="../../product/344/sony-ht-s500rf-real-51ch-dolby-audio-soundbar-home-theatre-system-1000w-dolby-audio-bluetooth-connectivity-black/index.html"-->
                                        <!--                        class="text-blue font-weight-bold">Sony HT-S500RF Real 5.1ch Dolby Audio Soundbar Home Theatre System (1000W, Dolby Audio, Bluetooth Connectivity) (Black)</a>-->
                                        <!--                </h5>-->
                                                        
                                        <!--                <p class="price-label">Our Price</p>-->

                                        <!--                <div class="flex-center-between mb-1">-->
                                        <!--                    <div class="prodcut-price d-flex align-items-center position-relative">-->
                                        <!--                        <ins class="font-size-20 text-blue-2 text-decoration-none">-->
                                        <!--                            <span class="rupees">₹</span>36990-->
                                        <!--                        </ins>-->
                                                                
                                        <!--                            <div class="font-size-12 mb-0 position-absolute bottom--100">-->
                                        <!--                                MRP-->
                                        <!--                                <del>-->
                                        <!--                                    <span class="rupees">₹</span>-->
                                        <!--                                    39990-->
                                        <!--                                </del>-->
                                        <!--                            </div>-->
                                        <!--                            <div class="dis-per-sm ml-2">7%-->
                                        <!--                                off-->
                                        <!--                            </div>-->
                                                                
                                        <!--                    </div>-->
                                        <!--                </div>-->

                                        <!--            </div>-->
                                        <!--            <div class="product-item__footer">-->
                                        <!--                <div class="border-top pt-2 flex-center-between flex-wrap">-->
                                                            
                                                            
                                        <!--                    <label class="product-compare font-size-13"-->
                                        <!--                           for="compare-product-344">-->
                                        <!--                        <input type="checkbox"-->
                                        <!--                               value="344"-->
                                        <!--                               id="compare-product-344"-->
                                        <!--                               class="compare-product">-->
                                        <!--                        <span>-->
                                        <!--                            <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                            Compare-->
                                        <!--                        </span>-->
                                        <!--                    </label>-->
                                                            
                                                            
                                        <!--                    <a href="javascript:;"-->
                                        <!--                       data-product=344 data-action="add"-->
                                        <!--                       class="text-gray-6 cart-btn font-size-13 updatecart"><i-->
                                        <!--                            class="ec ec-add-to-cart mr-1 font-size-15"></i> Add-->
                                        <!--                        Cart</a>-->
                                                            
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!--</li>-->
                                        
                                    
                                </ul>
                            </div>

                            <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel"
                                 aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                                <ul class="d-block list-unstyled products-group prodcut-list-view">
                  <?php
                                        
                                        if($_GET['sub_cat_id']){
                                            $select_product_query="SELECT * FROM tbl_product WHERE product_sub_cat=$sub_cat";
                                        }else{
                                        $select_product_query="SELECT * FROM tbl_product";
                                        }
                                        
                                        $productquery=mysqli_query($con,$select_product_query);
                                        
                                        $pronums=mysqli_num_rows($productquery);
                                        // print_r($nums); die();
                                        ?>
                                        
                                        <?php if($pronums > 0) {
                                        
                                        while($res= mysqli_fetch_array($productquery))
                                        {
                                            
                                        $cat_array = json_decode($res['product_cat']);
                                        if(!empty($cat_id)){
                                        if(!in_array($cat_id,$cat_array)){
                                            
                                           continue ; 
                                        }
                                            
                                        }
                                        
                                        ?>   
                                        
                                        
                                    
                    <li class="product-item product-vertical-list remove-divider">
                        <div class="product-item__outer w-100">
                            <div class="product-item__inner remove-prodcut-hover row">
                                <div class="product-item__header col-6 col-md-3">
                                    <div class="product-img-inner">
                                        
                                        
                                            <div class="mb-2">
                                                <a href="<?=$asset_url?>product_details.php?product_id=<?=$res['product_pk_id']?>"
                                                   class="d-block text-center"><img
                                                        class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"
                                                        data-src="<?=$asset_url?>admin/assets/<?=$res['featurd_image']?>"
                                                        alt="Image Description"></a>
                                            </div>
                                         
                                    
                                    </div>
                                </div>
                                <div class="product-item__body col-6 col-md-9">
                                    <!--<div class="ext">-->
                                    <!--    <div class="d-flex">-->
                                    <!--        <div class="compare-btn">-->
                                    <!--            <label class="product-compare font-size-13"-->
                                    <!--               for="compare-product-g-709">-->
                                    <!--            <input type="checkbox"-->
                                    <!--                   value="709"-->
                                    <!--                   id="compare-product-g-709"-->
                                    <!--                   class="compare-product">-->
                                    <!--            <span>-->
                                    <!--                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                    <!--                Compare-->
                                    <!--            </span>-->
                                    <!--        </label>-->
                                    <!--        </div>-->
                                    <!--        <div class="wishlist-botton">-->
                                    <!--            <button type="button" value="709" class="btn add-wishlist add-wishlist-709"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pr-lg-16">
                                                    
                                                    
                                                <h5 class="mb-1 product-title product-item__title">
                                                    <a href="<?=$asset_url?>product_details.php?product_id=<?=$res['product_pk_id']?>" class="text-blue"><?=$res['product_title']?></a>
                                                </h5>
                                                <!--<p class="m-0 d-lg-block d-none"><strong>Product Code </strong>MINI 2.0 RED BENGALI</p>-->
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            
                                            <p class="font-weight-bold text-black m-0">Our Price</p>
                                            <div class="d-lg-flex d-block justify-content-between">
                                                <div class="product-price-veritcal">
                                                    <div class="prodcut-price">
                                                            <div class="text-blue font-size-20 font-weight-bold">
                                                                <span class="rupees">₹</span><?=$res['product_price']?>
                                                            </div>
                                                    </div>
                                                    
                                                        <div class="ml-3 dash-line align-self-center">
                                                            <span class="rupees">₹</span><?=$res['discount']?>
                                                        </div>
                                                        <div class="ml-3 align-self-center font-size-14 text-blue">
                                                            <span class="rupees">₹</span><?=$res['discount']- $res['product_price']?>
                                                        </div>
                                                    
                                                <!--<div class="connect-to-store-right ml-3 align-self-center">-->
                                                <!--    <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=709><i class="ec ec-support"></i> Connect to store</a>-->
                                                <!--</div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="product-item__footer footer-mb-size">
                                        <div >
                                            <button data-id="<?=$res['product_pk_id']?>"
                                        data-id="<?=$res['product_pk_id']?>"
                                        data-name="<?=$res['product_title']?>"
                                        data-image="<?=$res['featurd_image']?>"
                                        data-price="<?=$res['product_price']?>"
                                        data-qty="1"
                                                    class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 add_Cart">
                                                Add to cart
                                            </button>
                                            <!--<a href="#" data-product=709-->
                                            <!--        data-action="add"-->
                                            <!--   class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                            <!--    Buy now-->
                                            <!--</a>-->

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                                    <?php }
                                    
                                    }?>
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/711/carvaan-saregama-mini-20-rabindrasangeet-music-player-with-bluetoothfmamaux-terracotta-brown/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_VIcL618.jpg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-711">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="711"-->
                                        <!--                                   id="compare-product-g-711"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="711" class="btn add-wishlist add-wishlist-711"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="product_details.php" class="text-blue">Carvaan Saregama Mini 2.0 Rabindrasangeet- Music Player with Bluetooth/FM/AM/AUX (Terracotta Brown)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>MINI 2.0 BROWN BENGALI</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>1900-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>2590-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>690(26%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=711><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=711-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=711-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/712/saregama-carvaan-mini-hindi-20-bluetooth-speaker-terracotta-brown/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_EieQmGV.jpg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-712">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="712"-->
                                        <!--                                   id="compare-product-g-712"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="712" class="btn add-wishlist add-wishlist-712"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/712/saregama-carvaan-mini-hindi-20-bluetooth-speaker-terracotta-brown/index.html" class="text-blue">Saregama Carvaan Mini Hindi 2.0 - Bluetooth Speaker (Terracotta Brown)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>MINI 2.0 BROWN HINDI</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>1900-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>2590-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>690(26%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=712><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=712-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=712-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/714/saregama-carvaan-mini-hindi-20-music-player-with-bluetoothfmamaux-skyline-blue/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_D0qj9UI.jpg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-714">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="714"-->
                                        <!--                                   id="compare-product-g-714"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="714" class="btn add-wishlist add-wishlist-714"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/714/saregama-carvaan-mini-hindi-20-music-player-with-bluetoothfmamaux-skyline-blue/index.html" class="text-blue">Saregama Carvaan Mini Hindi 2.0- Music Player with Bluetooth/FM/AM/AUX (Skyline Blue)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>MINI 2.0 BLUE HINDI</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>1900-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>2590-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>690(26%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=714><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=714-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=714-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/713/carvaan-saregama-mini-kids-pre-loaded-with-stories-rhymes-learnings-mantras-with-bluetoothusbaux-in-out/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_UaViRvN.jpg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-713">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="713"-->
                                        <!--                                   id="compare-product-g-713"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="713" class="btn add-wishlist add-wishlist-713"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/713/carvaan-saregama-mini-kids-pre-loaded-with-stories-rhymes-learnings-mantras-with-bluetoothusbaux-in-out/index.html" class="text-blue">Carvaan Saregama Mini Kids - Pre-Loaded with Stories, Rhymes, Learnings, Mantras with Bluetooth/USB/Aux in-Out</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>MINI 2.0 BLUE</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>2700-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>2990-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>290(9%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=713><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=713-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=713-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/80/google-home-mini-with-google-assistant-smart-speaker-charcoal/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/236x236/images/Google Home Mini_1.jpeg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-80">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="80"-->
                                        <!--                                   id="compare-product-g-80"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="80" class="btn add-wishlist add-wishlist-80"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/80/google-home-mini-with-google-assistant-smart-speaker-charcoal/index.html" class="text-blue">Google Home Mini with Google Assistant Smart Speaker (Charcoal)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>Google Home Mini</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>4000-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>5000-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>1000(20%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=80><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=80-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=80-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/710/carvaan-saregama-portable-with-5000-preloaded-songs-fmbtaux-premium-bengali-music-player-royal-blue/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_p7vEolq.jpg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-710">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="710"-->
                                        <!--                                   id="compare-product-g-710"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="710" class="btn add-wishlist add-wishlist-710"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/710/carvaan-saregama-portable-with-5000-preloaded-songs-fmbtaux-premium-bengali-music-player-royal-blue/index.html" class="text-blue">Carvaan Saregama Portable with 5000 Preloaded Songs, FM/BT/AUX Premium Bengali Music Player (Royal Blue)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>PREMIUM</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>6610-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>7390-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>780(10%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=710><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=710-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=710-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/78/sony-21-channel-multimedia-speaker-system-with-bluetooth-sa-d20-black/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/236x236/images/Sony 2.1 Channel Multimedia Speaker_1.jpeg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-78">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="78"-->
                                        <!--                                   id="compare-product-g-78"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="78" class="btn add-wishlist add-wishlist-78"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/78/sony-21-channel-multimedia-speaker-system-with-bluetooth-sa-d20-black/index.html" class="text-blue">Sony 2.1 Channel Multimedia Speaker System with Bluetooth (SA-D20, Black)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>SA-D20//CE12</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>7900-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>8990-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>1090(12%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=78><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=78-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=78-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/75/panasonic-2-channel-80-watt-audio-speaker-system-sc-htb200gwk-black/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_l5GnmVS.jpg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-75">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="75"-->
                                        <!--                                   id="compare-product-g-75"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="75" class="btn add-wishlist add-wishlist-75"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/75/panasonic-2-channel-80-watt-audio-speaker-system-sc-htb200gwk-black/index.html" class="text-blue">Panasonic 2 Channel 80 Watt Audio Speaker System (SC-HTB200GWK, Black)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>SC-HTB200GWK</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>8393-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>11990-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>3597(30%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=75><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=75-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=75-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/79/sony-portable-wireless-bluetooth-speakers-with-nfc-srs-xb30-blue/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/236x236/images/Sony Portable Wireless Bluetooth Speakers_1.jpg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-79">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="79"-->
                                        <!--                                   id="compare-product-g-79"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="79" class="btn add-wishlist add-wishlist-79"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/79/sony-portable-wireless-bluetooth-speakers-with-nfc-srs-xb30-blue/index.html" class="text-blue">Sony Portable Wireless Bluetooth Speakers With NFC (SRS-XB30, Blue)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>SRS-XB30</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>9900-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>10990-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>1090(9%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=79><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=79-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=79-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/570/sony-sa-d40-80-w-bluetooth-home-theatre-black-41-channel/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/1_wqtXVer.jpeg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-570">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="570"-->
                                        <!--                                   id="compare-product-g-570"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="570" class="btn add-wishlist add-wishlist-570"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/570/sony-sa-d40-80-w-bluetooth-home-theatre-black-41-channel/index.html" class="text-blue">SONY SA-D40 80 W Bluetooth Home Theatre  (Black, 4.1 Channel)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>SA-D40</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>11990-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 align-self-center">-->
                                        <!--                                        <del class="font-size-14 tex-gray-6">-->
                                        <!--                                            <span class="rupees">₹</span>11990</del>-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center">-->
                                        <!--                                        <div class="dis-per"></div>-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=570><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=570-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=570-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/76/sony-51ch-dolby-digital-soundbar-home-theatre-system-with-bluetooth-connectivity-ht-s20r-black/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/HWT400_9.png"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-76">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="76"-->
                                        <!--                                   id="compare-product-g-76"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="76" class="btn add-wishlist add-wishlist-76"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/76/sony-51ch-dolby-digital-soundbar-home-theatre-system-with-bluetooth-connectivity-ht-s20r-black/index.html" class="text-blue">Sony 5.1ch Dolby Digital Soundbar Home Theatre System With Bluetooth Connectivity (HT-S20R, Black)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>HTS20R</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>15990-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>23990-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>8000(33%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=76><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=76-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=76-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/342/sony-ht-rt3-real-51ch-dolby-audio-soundbar-home-theatre-system-600w-dolby-audio-bluetooth-connectivity-black/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/Sony_HT_RT3_1.jpg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-342">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="342"-->
                                        <!--                                   id="compare-product-g-342"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="342" class="btn add-wishlist add-wishlist-342"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/342/sony-ht-rt3-real-51ch-dolby-audio-soundbar-home-theatre-system-600w-dolby-audio-bluetooth-connectivity-black/index.html" class="text-blue">Sony HT-RT3 Real 5.1ch Dolby Audio Soundbar Home Theatre System (600W, Dolby Audio, Bluetooth Connectivity) (Black)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>HT-RT3</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>20000-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>24990-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>4990(19%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=342><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=342-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=342-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/343/sony-ht-rt40-real-51ch-dolby-audio-soundbar-home-theatre-system-with-tall-boy-speakers-600w-dolby-audio-bluetooth-connectivity-black/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/Sony_HT_RT40_1.jpg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-343">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="343"-->
                                        <!--                                   id="compare-product-g-343"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="343" class="btn add-wishlist add-wishlist-343"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/343/sony-ht-rt40-real-51ch-dolby-audio-soundbar-home-theatre-system-with-tall-boy-speakers-600w-dolby-audio-bluetooth-connectivity-black/index.html" class="text-blue">Sony HT-RT40 Real 5.1ch Dolby Audio Soundbar Home Theatre System with Tall boy Speakers (600W, Dolby Audio, Bluetooth Connectivity) (Black)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>HT-RT40</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>26990-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>29990-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>3000(10%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=343><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=343-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=343-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    
                                        <!--<li class="product-item product-vertical-list remove-divider">-->
                                        <!--    <div class="product-item__outer w-100">-->
                                        <!--        <div class="product-item__inner remove-prodcut-hover row">-->
                                        <!--            <div class="product-item__header col-6 col-md-3">-->
                                        <!--                <div class="product-img-inner">-->
                                                            
                                                            
                                        <!--                        <div class="mb-2">-->
                                        <!--                            <a href="../../product/344/sony-ht-s500rf-real-51ch-dolby-audio-soundbar-home-theatre-system-1000w-dolby-audio-bluetooth-connectivity-black/index.html"-->
                                        <!--                               class="d-block text-center"><img-->
                                        <!--                                    class="product-img-h-list mx-auto lazy" src="../../static/assets/svg/preloaders/loader.svg"-->
                                        <!--                                    data-src="<?=$asset_url?>d1kivxjtmxnd4.cloudfront.net/filters_format(webp)/filters_quality(70)/fit-in/236x236/images/Sony_HT_S500RF_1.jpg"-->
                                        <!--                                    alt="Image Description"></a>-->
                                        <!--                        </div>-->
                                                             
                                                        
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--            <div class="product-item__body col-6 col-md-9">-->
                                        <!--                <div class="ext">-->
                                        <!--                    <div class="d-flex">-->
                                        <!--                        <div class="compare-btn">-->
                                        <!--                            <label class="product-compare font-size-13"-->
                                        <!--                               for="compare-product-g-344">-->
                                        <!--                            <input type="checkbox"-->
                                        <!--                                   value="344"-->
                                        <!--                                   id="compare-product-g-344"-->
                                        <!--                                   class="compare-product">-->
                                        <!--                            <span>-->
                                        <!--                                <i class="ec ec-compare mr-1 font-size-15"></i>-->
                                        <!--                                Compare-->
                                        <!--                            </span>-->
                                        <!--                        </label>-->
                                        <!--                        </div>-->
                                        <!--                        <div class="wishlist-botton">-->
                                        <!--                            <button type="button" value="344" class="btn add-wishlist add-wishlist-344"> <i class="font-size-14 text-gray-5  fas fa-heart"></i> Wishlist</button>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                        <!--                <div class="row">-->
                                        <!--                    <div class="col-md-12">-->
                                        <!--                        <div class="pr-lg-16">-->
                                                                        
                                                                        
                                        <!--                            <h5 class="mb-1 product-title product-item__title">-->
                                        <!--                                <a href="../../product/344/sony-ht-s500rf-real-51ch-dolby-audio-soundbar-home-theatre-system-1000w-dolby-audio-bluetooth-connectivity-black/index.html" class="text-blue">Sony HT-S500RF Real 5.1ch Dolby Audio Soundbar Home Theatre System (1000W, Dolby Audio, Bluetooth Connectivity) (Black)</a>-->
                                        <!--                            </h5>-->
                                        <!--                            <p class="m-0 d-lg-block d-none"><strong>Product Code </strong>HT-S500RF</p>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                    <div class="col-md-12 mb-3">-->
                                                                
                                        <!--                        <p class="font-weight-bold text-black m-0">Our Price</p>-->
                                        <!--                        <div class="d-lg-flex d-block justify-content-between">-->
                                        <!--                            <div class="product-price-veritcal">-->
                                        <!--                                <div class="prodcut-price">-->
                                        <!--                                        <div class="text-blue font-size-20 font-weight-bold">-->
                                        <!--                                            <span class="rupees">₹</span>36990-->
                                        <!--                                        </div>-->
                                        <!--                                </div>-->
                                                                        
                                        <!--                                    <div class="ml-3 dash-line align-self-center">-->
                                        <!--                                        <span class="rupees">₹</span>39990-->
                                        <!--                                    </div>-->
                                        <!--                                    <div class="ml-3 align-self-center font-size-14 text-blue">-->
                                        <!--                                        <span class="rupees">₹</span>3000(7%)-->
                                        <!--                                    </div>-->
                                                                        
                                        <!--                            <div class="connect-to-store-right ml-3 align-self-center">-->
                                        <!--                                <a href="javascript:;" data-toggle="modal" data-target=" #AreaPincodeModal " data-product=344><i class="ec ec-support"></i> Connect to store</a>-->
                                        <!--                            </div>-->
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                                        
                                        <!--                <div class="product-item__footer footer-mb-size">-->
                                        <!--                    <div class="prodcut-add-cart">-->
                                        <!--                        <button data-product=344-->
                                        <!--                                data-action="add"-->
                                        <!--                                class="btn btn-sm btn-outline-dark btn-wide transition-3d-hover  mb-lg-0 mb-2 updatecart">-->
                                        <!--                            Add to cart-->
                                        <!--                        </button>-->
                                        <!--                        <a href="#" data-product=344-->
                                        <!--                                data-action="add"-->
                                        <!--                           class="btn btn-sm cart-btn btn-primary-dark-w btn-wide transition-3d-hover ml-lg-3 ml-0 buynow">-->
                                        <!--                            Buy now-->
                                        <!--                        </a>-->

                                        <!--                    </div>-->
                                        <!--                </div>-->
                                                        
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                    

                                </ul>
                            </div>
                        </div>
                        <!-- End Tab Content -->
                        <!-- End Shop Body -->
                        <!-- Shop Pagination -->
                        
                        <!-- End Shop Pagination -->
                    </div>

                </div>
            </form>
            <form action="" method="get" id="filter_form_mobile"> <input type="hidden" name="csrfmiddlewaretoken" value="b4dmViIR4qoQuItx7xoj8i2FW9wstT2xwO2sl5GwJCL7p92m2V04YtkOj9PtOliR">
                 <aside id="sidebarContent1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarNavToggler1">
            <div class="u-sidebar__scroller">
                <div class="u-sidebar__container">
                    <div class="">
                        <!-- Toggle Button -->
                        <div class="d-flex align-items-center pt-3 px-4 bg-white">
                            <button type="button" class="close ml-auto"
                                aria-controls="sidebarContent1"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent1"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInLeft"
                                data-unfold-animation-out="fadeOutLeft"
                                data-unfold-duration="500">
                                <span aria-hidden="true"><i class="ec ec-close-remove"></i></span>
                            </button>
                        </div>
                        <!-- End Toggle Button -->

                        <!-- Content -->
                        <div class="js-scrollbar u-sidebar__body">
                            <div class="u-sidebar__content u-header-sidebar__content px-4">
                                <div class="mb-6 border border-width-2 border-color-3 borders-radius-6">
                                    <!-- List -->
                                    <ul id="sidebarNav-mo" class="list-unstyled mb-0 sidebar-navbar">
                                        <?php foreach($category_result as $row){
                                        
                                        ?>
                                        <li>
                                            <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title"
                                               href="javascript:;" role="button" data-toggle="collapse"
                                               aria-expanded="false" aria-controls="sidebarNav-mo1Collapse-<?=$row['cat_pk_id']?>"
                                               data-target="#sidebarNav-mo1Collapse-<?=$row['cat_pk_id']?>">
                                               <?=$row['category']?>
                                            </a>

                                            <div id="sidebarNav-mo1Collapse-<?=$row['cat_pk_id']?>" class="collapse"
                                                 data-parent="#sidebarNav-mo">
                                                <ul id="sidebarNav1-<?=$row['cat_pk_id']?>" class="list-unstyled dropdown-list">
                                                    <!-- Menu List -->
                                                   
                                                    <?
                                                    $category_id=$row['cat_pk_id'];
                                                    
                                                    $cat_sql ="select * from `tbl_subCategory` WHERE category_id=$category_id ";
                                                    
                                        // $product_sql ="select * from `tbl_product` WHERE category_id=$category_id ";
                                        
                                        // $pro_result = mysqli_query($con,$product_sql);
                                        // $pro_data_count=mysqli_fetch_array($pro_result, MYSQLI_ASSOC);
                                        // print_r($product_sql);
                                        
                        $cat_result = mysqli_query($con,$cat_sql);
                        
                                                    
                                                    ?>
                                                    <?php while ($row = mysqli_fetch_array($cat_result, MYSQLI_ASSOC)) {?>
                                                    <li>
                                                        <a class="dropdown-item" href="<?=$asset_url?>product.php?sub_cat_id=<?=$row['id']?>">
                                                        <?= $row['category']?>
                                                        <span class="text-gray-25 font-size-12 font-weight-normal">
                                                            
                                        
                                                        </span>
                                                            <span class="text-gray-25 font-size-12 font-weight-normal">
                                                            
                                                                    (38)
                                                        </span>
                                                        </a>
                                                    </li>
                                                    
                                                <?php }?>
                                                    
                                                    <!--<li>-->
                                                    <!--    <a class="dropdown-item" href="../air-conditioner/window/index.html">-->
                                                    <!--    Window-->
                                                    <!--    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                                    <!--    </span>-->
                                                    <!--        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                                    <!--                (2)-->
                                                    <!--    </span>-->
                                                    <!--    </a>-->
                                                    <!--</li>-->
                                                    
                                                
                                                    <!-- End Menu List -->
                                                </ul>
                                            </div>
                                        </li>
                                        <?php }?>
                                        <!--<li>-->
                                        <!--    <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title"-->
                                        <!--       href="javascript:;" role="button" data-toggle="collapse"-->
                                        <!--       aria-expanded="false" aria-controls="sidebarNav-mo1Collapse-3"-->
                                        <!--       data-target="#sidebarNav-mo1Collapse-3">-->
                                        <!--        Home Entertainment-->
                                        <!--    </a>-->

                                        <!--    <div id="sidebarNav-mo1Collapse-3" class="collapse"-->
                                        <!--         data-parent="#sidebarNav-mo">-->
                                        <!--        <ul id="sidebarNav1-3" class="list-unstyled dropdown-list">-->
                                                    <!-- Menu List -->
                                                   
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="audio/index.html">-->
                                        <!--                Audio-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (14)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="home-theater-systems/index.html">-->
                                        <!--                Home Theater Systems-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (3)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                                
                                                    
                                                
                                                    <!-- End Menu List -->
                                        <!--        </ul>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                        
                                        <!--<li>-->
                                        <!--    <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title"-->
                                        <!--       href="javascript:;" role="button" data-toggle="collapse"-->
                                        <!--       aria-expanded="false" aria-controls="sidebarNav-mo1Collapse-5"-->
                                        <!--       data-target="#sidebarNav-mo1Collapse-5">-->
                                        <!--        Televisions-->
                                        <!--    </a>-->

                                        <!--    <div id="sidebarNav-mo1Collapse-5" class="collapse"-->
                                        <!--         data-parent="#sidebarNav-mo">-->
                                        <!--        <ul id="sidebarNav1-5" class="list-unstyled dropdown-list">-->
                                                    <!-- Menu List -->
                                                   
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../televisions/led/index.html">-->
                                        <!--                LED-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (325)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../televisions/oled/index.html">-->
                                        <!--                OLED-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (8)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../televisions/qled/index.html">-->
                                        <!--                QLED-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (4)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    <!-- End Menu List -->
                                        <!--        </ul>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                        
                                        <!--<li>-->
                                        <!--    <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title"-->
                                        <!--       href="javascript:;" role="button" data-toggle="collapse"-->
                                        <!--       aria-expanded="false" aria-controls="sidebarNav-mo1Collapse-9"-->
                                        <!--       data-target="#sidebarNav-mo1Collapse-9">-->
                                        <!--        Washing Machine-->
                                        <!--    </a>-->

                                        <!--    <div id="sidebarNav-mo1Collapse-9" class="collapse"-->
                                        <!--         data-parent="#sidebarNav-mo">-->
                                        <!--        <ul id="sidebarNav1-9" class="list-unstyled dropdown-list">-->
                                                    <!-- Menu List -->
                                                   
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../washing-machine/front-loading/index.html">-->
                                        <!--                Front Loading-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (30)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../washing-machine/semi-automatic/index.html">-->
                                        <!--                Semi Automatic-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (5)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../washing-machine/top-loading/index.html">-->
                                        <!--                Top Loading-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (36)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../washing-machine/washer-dryer/index.html">-->
                                        <!--                Washer Dryer-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (1)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    <!-- End Menu List -->
                                        <!--        </ul>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                        
                                        <!--<li>-->
                                        <!--    <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title"-->
                                        <!--       href="javascript:;" role="button" data-toggle="collapse"-->
                                        <!--       aria-expanded="false" aria-controls="sidebarNav-mo1Collapse-4"-->
                                        <!--       data-target="#sidebarNav-mo1Collapse-4">-->
                                        <!--        Computers-->
                                        <!--    </a>-->

                                        <!--    <div id="sidebarNav-mo1Collapse-4" class="collapse"-->
                                        <!--         data-parent="#sidebarNav-mo">-->
                                        <!--        <ul id="sidebarNav1-4" class="list-unstyled dropdown-list">-->
                                                    <!-- Menu List -->
                                                   
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../computers/laptops/index.html">-->
                                        <!--                Laptops-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (12)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    <!-- End Menu List -->
                                        <!--        </ul>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                        
                                        <!--<li>-->
                                        <!--    <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title"-->
                                        <!--       href="javascript:;" role="button" data-toggle="collapse"-->
                                        <!--       aria-expanded="false" aria-controls="sidebarNav-mo1Collapse-8"-->
                                        <!--       data-target="#sidebarNav-mo1Collapse-8">-->
                                        <!--        Refrigerator-->
                                        <!--    </a>-->

                                        <!--    <div id="sidebarNav-mo1Collapse-8" class="collapse"-->
                                        <!--         data-parent="#sidebarNav-mo">-->
                                        <!--        <ul id="sidebarNav1-8" class="list-unstyled dropdown-list">-->
                                                    <!-- Menu List -->
                                                   
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../refrigerator/deep-freezer/index.html">-->
                                        <!--                Deep Freezer-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (1)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../refrigerator/double-door/index.html">-->
                                        <!--                Double Door-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (175)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../refrigerator/side-by-side/index.html">-->
                                        <!--                Side by Side-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (4)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../refrigerator/single-door/index.html">-->
                                        <!--                Single Door-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (80)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../refrigerator/triple-door/index.html">-->
                                        <!--                Triple Door-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (1)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    <!-- End Menu List -->
                                        <!--        </ul>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                        
                                        <!--<li>-->
                                        <!--    <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title"-->
                                        <!--       href="javascript:;" role="button" data-toggle="collapse"-->
                                        <!--       aria-expanded="false" aria-controls="sidebarNav-mo1Collapse-7"-->
                                        <!--       data-target="#sidebarNav-mo1Collapse-7">-->
                                        <!--        Mobiles-->
                                        <!--    </a>-->

                                        <!--    <div id="sidebarNav-mo1Collapse-7" class="collapse"-->
                                        <!--         data-parent="#sidebarNav-mo">-->
                                        <!--        <ul id="sidebarNav1-7" class="list-unstyled dropdown-list">-->
                                                    <!-- Menu List -->
                                                   
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../mobiles/smart-phones/index.html">-->
                                        <!--                Smart Phones-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (309)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../mobiles/tablet/index.html">-->
                                        <!--                Tablet-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (0)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    <!-- End Menu List -->
                                        <!--        </ul>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                        
                                        <!--<li>-->
                                        <!--    <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title"-->
                                        <!--       href="javascript:;" role="button" data-toggle="collapse"-->
                                        <!--       aria-expanded="false" aria-controls="sidebarNav-mo1Collapse-2"-->
                                        <!--       data-target="#sidebarNav-mo1Collapse-2">-->
                                        <!--        Home Appliances-->
                                        <!--    </a>-->

                                        <!--    <div id="sidebarNav-mo1Collapse-2" class="collapse"-->
                                        <!--         data-parent="#sidebarNav-mo">-->
                                        <!--        <ul id="sidebarNav1-2" class="list-unstyled dropdown-list">-->
                                                    <!-- Menu List -->
                                                   
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../home-appliances/air-coolers/index.html">-->
                                        <!--                Air Coolers-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (24)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../home-appliances/ceiling-fans/index.html">-->
                                        <!--                Ceiling Fans-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (5)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../home-appliances/electric-iron/index.html">-->
                                        <!--                Electric Iron-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (3)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../home-appliances/room-heater/index.html">-->
                                        <!--                Room Heater-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (6)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../home-appliances/vacuum-cleaner/index.html">-->
                                        <!--                Vacuum Cleaner-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (5)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../home-appliances/water-heater/index.html">-->
                                        <!--                Water Heater-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (65)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    <!-- End Menu List -->
                                        <!--        </ul>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                        
                                        <!--<li>-->
                                        <!--    <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title"-->
                                        <!--       href="javascript:;" role="button" data-toggle="collapse"-->
                                        <!--       aria-expanded="false" aria-controls="sidebarNav-mo1Collapse-6"-->
                                        <!--       data-target="#sidebarNav-mo1Collapse-6">-->
                                        <!--        Kitchen Appliances-->
                                        <!--    </a>-->

                                        <!--    <div id="sidebarNav-mo1Collapse-6" class="collapse"-->
                                        <!--         data-parent="#sidebarNav-mo">-->
                                        <!--        <ul id="sidebarNav1-6" class="list-unstyled dropdown-list">-->
                                                    <!-- Menu List -->
                                                   
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/chimney/index.html">-->
                                        <!--                Chimney-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (19)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/citrus-press-juicer/index.html">-->
                                        <!--                Citrus Press Juicer-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (41)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/cooktop/index.html">-->
                                        <!--                Cooktop-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (10)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/dishwashers/index.html">-->
                                        <!--                Dishwashers-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (4)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/hand-mixer/index.html">-->
                                        <!--                Hand Mixer-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (1)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/induction-cooker/index.html">-->
                                        <!--                Induction Cooktop-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (10)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/kettle/index.html">-->
                                        <!--                Kettle-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (3)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/microwaves/index.html">-->
                                        <!--                Microwaves-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (184)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/mixer-grinder/index.html">-->
                                        <!--                Mixer Grinder-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (39)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/over-toaster-grill/index.html">-->
                                        <!--                Oven Toaster Grill-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (55)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/rice-cooker/index.html">-->
                                        <!--                Rice Cooker-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (1)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/roti-maker/index.html">-->
                                        <!--                Roti Maker-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (1)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/sandwich-maker/index.html">-->
                                        <!--                Sandwich Maker-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (2)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/toaster/index.html">-->
                                        <!--                Toaster-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (4)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../kitchen-appliances/water-purifier/index.html">-->
                                        <!--                Water Purifier-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (38)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    <!-- End Menu List -->
                                        <!--        </ul>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                        
                                        <!--<li>-->
                                        <!--    <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title"-->
                                        <!--       href="javascript:;" role="button" data-toggle="collapse"-->
                                        <!--       aria-expanded="false" aria-controls="sidebarNav-mo1Collapse-10"-->
                                        <!--       data-target="#sidebarNav-mo1Collapse-10">-->
                                        <!--        Camera-->
                                        <!--    </a>-->

                                        <!--    <div id="sidebarNav-mo1Collapse-10" class="collapse"-->
                                        <!--         data-parent="#sidebarNav-mo">-->
                                        <!--        <ul id="sidebarNav1-10" class="list-unstyled dropdown-list">-->
                                                    <!-- Menu List -->
                                                   
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../camera/camera-type/index.html">-->
                                        <!--                DSLR Camera-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (44)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    <!-- End Menu List -->
                                        <!--        </ul>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                        
                                        <!--<li>-->
                                        <!--    <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title"-->
                                        <!--       href="javascript:;" role="button" data-toggle="collapse"-->
                                        <!--       aria-expanded="false" aria-controls="sidebarNav-mo1Collapse-11"-->
                                        <!--       data-target="#sidebarNav-mo1Collapse-11">-->
                                        <!--        Personal Care-->
                                        <!--    </a>-->

                                        <!--    <div id="sidebarNav-mo1Collapse-11" class="collapse"-->
                                        <!--         data-parent="#sidebarNav-mo">-->
                                        <!--        <ul id="sidebarNav1-11" class="list-unstyled dropdown-list">-->
                                                    <!-- Menu List -->
                                                   
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../personal-care/hair-dryer/index.html">-->
                                        <!--                Hair Dryer-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (0)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    
                                        <!--            <li>-->
                                        <!--                <a class="dropdown-item" href="../personal-care/hair-straightener/index.html">-->
                                        <!--                Hair Straightener-->
                                        <!--                <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            

                                        <!--                </span>-->
                                        <!--                    <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                                            
                                        <!--                            (0)-->
                                        <!--                </span>-->
                                        <!--                </a>-->
                                        <!--            </li>-->
                                                    
                                                
                                                    <!-- End Menu List -->
                                        <!--        </ul>-->
                                        <!--    </div>-->
                                        <!--</li>-->
                                        

                                    </ul>
                                    <!-- End List -->
                                </div>
                                <div class="mb-6">
                                    <div class="border-bottom border-color-1 mb-5">
                                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filters</h3>
                                    </div>
                                    <div class="border-bottom pb-4 mb-4">
                                        <h4 class="font-size-14 mb-3 font-weight-bold">Brands</h4>

                                         <!--Checkboxes -->
                                         <?php
                                
                                $brand_ids = [];
                                         if($_GET['sub_cat_id']){
                                            $selectproduct_query="SELECT * FROM tbl_product WHERE product_sub_cat=$sub_cat";
                                        }else{
                                        $selectproduct_query="SELECT * FROM tbl_product";
                                        }
                                        
                                        $product=mysqli_query($con,$selectproduct_query);
                                        
                                        while($res= mysqli_fetch_array($product))
                                        {
                                            
                                        $category_array = json_decode($res['product_cat']);
                                        if(!empty($cat_id)){
                                        if(!in_array($cat_id,$category_array)){
                                            
                                           continue ; 
                                        }
                                            
                                        }
                                       $brand_id=$res['brand_fk_id'];
                                       
                                       array_push($brand_ids,$brand_id);
                                       
                                    }
                                    
                                    $brand_ids = array_unique($brand_ids);
                                    
                                    // print_r($brand_ids);
                                    
                                    foreach($brand_ids as $brand_id){
                                        
                                        $brand_sql="SELECT * FROM tbl_brand WHERE brand_id=$brand_id";
                                       $brand_data=mysqli_query($con,$brand_sql);
                                    $res2= mysqli_fetch_assoc($brand_data);
                                    ?>
                                

                                        <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                            <div class="custom-control ">
                                                <input type="checkbox" class="brand_checkbox"
                                                       
                                                       name="brand"
                                                       value="<?=$res2['brand_id']?>"
                                                        
                                                       >
                                                <label class="custom-control-label" >
                                                    <?=$res2['brand_name']?>
                                                    <span class="text-gray-25 font-size-12 font-weight-normal">
                                                        
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        
                                
                                      <?php }?>  
                                        

                                        

                                    </div>
                                    <div class="range-slider">
                                        <h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>
                                         <!--Range Slider -->
                                        <input  class="js-range-slider price_slider" type="text"
                                        data-extra-classes="u-range-slider u-range-slider-indicator u-range-slider-grid"
                                        data-type="double"
                                        data-grid="false"
                                        data-hide-from-to="true"
                                        data-prefix="₹"
                                        data-min="0"
                                        data-max="200000"
                                        data-from="0"
                                        data-to="200000"
                                        data-result-min="#rangeSliderExample3MinResult1"
                                               name="range_price"
                                        data-result-max="#rangeSliderExample3MaxResult1">
                                         <!--End Range Slider -->
                                        <div class="mt-1 text-gray-111 d-flex mb-4">
                                            <span class="mr-0dot5">Price: </span>
                                            <span>₹</span>
                                            <span id="rangeSliderExample3MinResult1" class=""></span>
                                            <span class="mx-0dot5"> — </span>
                                            <span>₹</span>
                                            <span id="rangeSliderExample3MaxResult1" class=""></span>
                                        </div>
                                    </div>
                                    

                            
                                
                                    <!--<div class="border-bottom pb-4 mb-4">-->
                                    <!--    <h4 class="font-size-14 mb-3 font-weight-bold">-->
                                    <!--        Audio Type-->
                                    <!--    </h4>-->

                                         <!--Checkboxes -->
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-mo-Soundbar"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Soundbar"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Soundbar">-->
                                    <!--                        Soundbar-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (4)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-mo-Speaker"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Speaker"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Speaker">-->
                                    <!--                        Speaker-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (5)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-mo-Home Theatre"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Home Theatre"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Home Theatre">-->
                                    <!--                        Home Theatre-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (3)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-mo-Music System"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Music System"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Music System">-->
                                    <!--                        Music System-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (6)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-mo-Bluetooth Speaker"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Bluetooth Speaker"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Bluetooth Speaker">-->
                                    <!--                        Bluetooth Speaker-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (1)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                         <!--End Checkboxes -->

                                         <!--End View More - Collapse -->
                                        
                                         <!--End Link -->
                                    <!--</div>-->
                                
                            
                                
                                    <!--<div class="border-bottom pb-4 mb-4">-->
                                    <!--    <h4 class="font-size-14 mb-3 font-weight-bold">-->
                                    <!--        Configuration-->
                                    <!--    </h4>-->

                                         <!--Checkboxes -->
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-mo-2.0 Channel"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="2.0 Channel"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-2.0 Channel">-->
                                    <!--                        2.0 Channel-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (6)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-mo-5.1 Channel"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="5.1 Channel"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-5.1 Channel">-->
                                    <!--                        5.1 Channel-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (4)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-mo-2.1 Channel"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="2.1 Channel"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-2.1 Channel">-->
                                    <!--                        2.1 Channel-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (1)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-mo-Portable Bluetooth Speaker"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Portable Bluetooth Speaker"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Portable Bluetooth Speaker">-->
                                    <!--                        Portable Bluetooth Speaker-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (1)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                <div class="custom-control custom-checkbox">-->
                                    <!--                    <input type="checkbox" class="custom-control-input attribute_value_select"-->
                                    <!--                           onchange="this.form.submit()"-->
                                    <!--                           id="attribute_value-mo-Mono"-->
                                    <!--                           name="attribute_value"-->
                                    <!--                           value="Mono"-->
                                                                
                                    <!--                    >-->
                                    <!--                    <label class="custom-control-label"-->
                                    <!--                           for="attribute_value-Mono">-->
                                    <!--                        Mono-->
                                    <!--                        <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                    (1)-->
                                    <!--                </span></label>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="collapse"-->
                                    <!--                 id="attribute_name-mo-103">-->
                                    <!--                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                    <div class="custom-control custom-checkbox">-->
                                    <!--                        <input type="checkbox"-->
                                    <!--                               class="custom-control-input attribute_value_select"-->
                                    <!--                               onchange="this.form.submit()"-->
                                    <!--                               id="attribute_value-mo-4.1 Channel"-->
                                    <!--                               name="attribute_value"-->
                                    <!--                               value="4.1 Channel"-->
                                                                    
                                    <!--                        >-->
                                    <!--                        <label class="custom-control-label"-->
                                    <!--                               for="attribute_value-4.1 Channel">-->
                                    <!--                            4.1 Channel-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                            (1)-->
                                    <!--                        </span>-->
                                    <!--                        </label>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="collapse"-->
                                    <!--                 id="attribute_name-mo-103">-->
                                    <!--                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                    <div class="custom-control custom-checkbox">-->
                                    <!--                        <input type="checkbox"-->
                                    <!--                               class="custom-control-input attribute_value_select"-->
                                    <!--                               onchange="this.form.submit()"-->
                                    <!--                               id="attribute_value-mo-3.1 Channel"-->
                                    <!--                               name="attribute_value"-->
                                    <!--                               value="3.1 Channel"-->
                                                                    
                                    <!--                        >-->
                                    <!--                        <label class="custom-control-label"-->
                                    <!--                               for="attribute_value-3.1 Channel">-->
                                    <!--                            3.1 Channel-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                            (1)-->
                                    <!--                        </span>-->
                                    <!--                        </label>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                            
                                    <!--            <div class="collapse"-->
                                    <!--                 id="attribute_name-mo-103">-->
                                    <!--                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">-->
                                    <!--                    <div class="custom-control custom-checkbox">-->
                                    <!--                        <input type="checkbox"-->
                                    <!--                               class="custom-control-input attribute_value_select"-->
                                    <!--                               onchange="this.form.submit()"-->
                                    <!--                               id="attribute_value-mo-Stereo"-->
                                    <!--                               name="attribute_value"-->
                                    <!--                               value="Stereo"-->
                                                                    
                                    <!--                        >-->
                                    <!--                        <label class="custom-control-label"-->
                                    <!--                               for="attribute_value-Stereo">-->
                                    <!--                            Stereo-->
                                    <!--                            <span class="text-gray-25 font-size-12 font-weight-normal">-->
                                    <!--                            (1)-->
                                    <!--                        </span>-->
                                    <!--                        </label>-->
                                    <!--                    </div>-->
                                    <!--                </div>-->
                                    <!--            </div>-->
                                            
                                        

                                         <!--End Checkboxes -->

                                         <!--End View More - Collapse -->
                                        
                                         <!--    Link -->
                                    <!--        <a class="link link-collapse small font-size-13 text-gray-27 d-inline-flex mt-2"-->
                                    <!--           data-toggle="collapse"-->
                                    <!--           href="#attribute_name-mo-103"-->
                                    <!--           role="button"-->
                                    <!--           aria-expanded="false"-->
                                    <!--           aria-controls="attribute_name-mo-103">-->
                                    <!--    <span class="link__icon text-gray-27 bg-white">-->
                                    <!--        <span class="link__icon-inner">+</span>-->
                                    <!--    </span>-->
                                    <!--            <span class="link-collapse__default">Show more</span>-->
                                    <!--            <span class="link-collapse__active">Show less</span>-->
                                    <!--        </a>-->
                                        
                                    <!--     End Link -->
                                    <!--</div>-->
                                
                            
                            <div class="border-bottom pb-4 mb-4">
                                <h4 class="font-size-14 mb-3 font-weight-bold">
                                    Discount
                                </h4>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input attribute_value_select"
                                               onchange="this.form.submit()" id="discount_value-m-10"
                                               name="discount_value" value="10"
                                               
                                        >
                                        <label class="custom-control-label" for="discount_value-m-10">
                                            10% Off or more
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input attribute_value_select"
                                               onchange="this.form.submit()" id="discount_value-m-20"
                                               name="discount_value" value="20"
                                               
                                        >
                                        <label class="custom-control-label" for="discount_value-m-20">
                                            20% Off or more
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input attribute_value_select"
                                               onchange="this.form.submit()" id="discount_value-m-30"
                                               name="discount_value" value="30"
                                               
                                        >
                                        <label class="custom-control-label" for="discount_value-m-30">
                                            30% Off or more
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input attribute_value_select"
                                               onchange="this.form.submit()" id="discount_value-m-40"
                                               name="discount_value" value="40"
                                               
                                        >
                                        <label class="custom-control-label" for="discount_value-m-40">
                                            40% Off or more
                                        </label>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
            </div>
        </aside>
        </form>

            <!-- Brand Carousel -->
           <!-- <div class="mb-4 mb-lg-8">
                <div class="py-2">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <h3 class="section-title text-center section-title__full mb-0 pb-2 font-size-22 mb-3 mb-lg-6">Top
                                Brands</h3>
                        </div>
                    </div>
                    <div class="js-slick-carousel u-slick my-1"
                         data-slides-show="7"
                         data-infinite="true"
                         data-slides-scroll="1"
                         data-autoplay="true"
                         data-autoplaySpeed="3000"
                         data-lazy-Load="ondemand"
                         data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                         data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                         data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
                         data-responsive='[{"breakpoint":1440,"settings":{"slidesToShow":7}},{"breakpoint":1366,"settings":{"slidesToShow":6}},{"breakpoint":768,"settings":{"slidesToShow":4}},{"breakpoint":554,"settings":{"slidesToShow":3}}]'>
                        
                        <div class="js-slide">
                            <a href="../brands/panasonic/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/download_8.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/nikon/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/9b5f8d0d-fbfd-40a9-9e06-9e0a46373d10.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/whirlpool/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/Whirlpool.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/vivo/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/Vivo.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/oppo/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/Oppo.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/voltas-beko/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/vb.jpg" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/skyworth/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/skyworth_logo.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/metz/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/METZ_Logo_-_Copy_150x1502x.jpg" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/haier/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/41daa1c3869cdc95f624f7bc36fbd3c4.w1668.h1668._CR0016681668_SX200_.jpg" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/tcl/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/TCL.jpg" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/lg/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/LG_4safaVQ.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/avita/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/logo_1.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/lenovo/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/Leneovo.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/innotrics/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/logo_2.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/google/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/googlelogo_color_272x92dp.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/sony/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/Sony_DYh1QKJ.jpg" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/usha/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/usha.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/godrej/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/b1dc5aad-6dc1-4499-a6cf-3f5e47c2a51d_855K3IW.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/blue-star/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/bluestar.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/carrier/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/Carrier.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/o-general/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/Ogeneral_p1LqYYd.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/samsung/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/Samsung_UJCFAoE.jpg" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/voltas/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/Voltas_yb5azJT.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/lloyd/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/lloyd_LS8vNJY.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/daikin/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/Daikin.jpg" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/hitachi/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/Hitachi.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/symphony/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/LG_Fgprtsr.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/orient/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/ORIENTELEC.NS.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/havells/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/download_6.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/kenstar/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/download_5.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/bajaj/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/download_8.jpeg" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/crompton/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/download_4_wA7Dcwd.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/kaff/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/New-Project_0y7egVX.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/kutchina/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/7f4052383fb9d22427e992b270a20d21.w400.h400_jYD2IA5.jpg" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/apple/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/d41fb81a-7c49-4673-9e66-76e9713f3158_ChajykI.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/morphy/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/80a72fa1-815d-4ade-9eef-b06c501f6e4e.png" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                        <div class="js-slide">
                            <a href="../brands/jaipan/index.html" class="d-block top-brand">
                                <img class="img-fluid m-auto max-height-75" data-lazy="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/filters:quality(70)/fit-in/110x75/images/GVOLHLQ821c7d0fd_786.jpg" src="../../static/assets/image/icons/image.svg" alt="Image Description">
                            </a>
                        </div>
                        
                    </div>
                    <div class="text-center mt-3">
                        <a href="../../brands/index.html" class="text-gray-90 btn btn-outline-primary hover-text-white  border-width-2 rounded-pill font-size-15 text-lh-19 font-size-15-md">
                            VIEW ALL
                        </a>
                    </div>
                </div>
            </div>-->
            <!-- End Brand Carousel -->
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
   <!-- <div class="modal fade" id="ConnectToStoreModal" tabindex="-1" role="dialog"
         aria-labelledby="ConnectToStoreModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-5 mx-4">
                <button class="close modal-close" data-dismiss="modal" aria-label="Close"><i
                        class="ec ec-close-remove"></i></button>
                <div class="modal-body p-0 header-store-detail-modal" id="store-manage-data">
                    <p class="font-size-18 font-weight-bold mb-2 text-grey-90">Connect to store</p>
                    <div class="kohiapp-post-profile">
                        <div class="img-wrap">
                            <img class="img-fluid manage-img" src="../../static/assets/img/great-eastern.png" alt="Great Eastern Retail"
                                 title="Great Eastern Retail Pvt. Ltd">
                        </div>
                        <div class="desc">
                            <p class="title">Staff</p>
                            <div class="store-data">
                                <p class="font-size-14 font-weight-light mb-0">Store Manager</p>
                                <p class="store-name font-size-14 font-weight-bold mb-0"> Ub Electronics</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrap">
                        <button class="btn btn-outline-black ConnectToPhoneModal" data-product="" data-toggle="modal"
                                data-target="#ConnectToPhoneModal">Connect On Call
                        </button>
                        <a class="btn btn-primary-dark-w btn-appointment" href="../../appointment.html">Book an appointment</a>

                    </div>
                </div>
            </div>
        </div>
    </div>-->
    
    <!--Connect to store -- phone call  Modal -->
   <!-- <div class="modal fade" id="ConnectToPhoneModal" tabindex="-1" role="dialog"
         aria-labelledby="ConnectToPhoneModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-5 mx-4">
                <button class="close modal-close" data-dismiss="modal" aria-label="Close"><i
                        class="ec ec-close-remove"></i></button>
                <div class="modal-body p-0 header-store-detail-modal">
                    <div class="form-msg"></div>
                    <div class="kohiapp-post-profile bg-blueparple-gradiant">
                        <div class="img-wrap">
                            <img class="img-fluid manage-img" src="../../static/assets/img/great-eastern.png" alt="Great Eastern Retail"
                                 title="Great Eastern Retail Pvt. Ltd">
                        </div>
                        <div class="desc">
                            <p class="title text-white">Staff</p>
                            <div class="store-data">
                                <p class="font-size-14 font-weight-light mb-0 text-white">Store Manager</p>
                                <p class="store-name font-size-14 font-weight-bold mb-0 text-white"> Ub Electronics</p>
                            </div>
                        </div>
                    </div>
                    <form method="post" id="StoreEnquiryform">
                        <input type="hidden" name="csrfmiddlewaretoken" value="b4dmViIR4qoQuItx7xoj8i2FW9wstT2xwO2sl5GwJCL7p92m2V04YtkOj9PtOliR">
                        <div class="form-row">
                            <div class="col-md-12 mb-3 js-form-message">
                                <label class="form-label" for="">Full Name</label>
                                <input type="hidden" name="product_id">
                                <input type="text" class="form-control" placeholder="Enter full name"
                                       data-msg="Please enter your message."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success" name="full_name" required>
                                <input type="hidden" name="store_id" value="" id="store_id">
                            </div>
                            <div class="col-md-5 mb-3 js-form-message">
                                <label class="form-label" for="">Mobile No</label>
                                <input type="tel" class="form-control" minlength="10" maxlength="10"
                                       placeholder="Enter Mobile No" name="Mobile"
                                       data-msg="Please enter 10 digit mobile number"
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success" required>
                            </div>
                            <div class="col-md-7 mb-3 js-form-message">
                                <label class="form-label" for="">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                       data-msg="Please enter email."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                            </div>
                            <div class="col-md-12 mb-3 js-form-message">
                                <label class="form-label" for="">Remarks</label>
                                <input type="text" class="form-control" placeholder="Remarks" name="Remarks"
                                       data-msg="Please enter remark."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                            </div>
                            <div class="col-md-12 mb-3 js-form-message">
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
    </div>-->
    
    <script>
        $(document).ready(function () {
            $('.sub_cat_select').on('click',function(){
                $('.attribute_value_select').removeAttr('checked');
            })
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
        })

        function next_page(page_num) {
            $('#current_page_id').val(page_num);
            $('#filter_form').submit();
        }

    </script>
<script>
function priceChange(){
    setTimeout(function(){$("#filter_form").submit();}, 1200);
}
$(document).ready(function() {
    window.addEventListener("pageshow", function (event) {
      var historyTraversal = event.persisted ||
                             (typeof window.performance != "undefined" &&
                              window.performance.navigation.type === 2 );
      if (historyTraversal) {
        window.location.reload();
      }
    });

    $('.updatecart').on('click',function(){
        var productID = this.dataset.product
        console.log(productID);
        var cartCount = $('#cartcount');
        $.ajax({
                    type: "POST",
                    url: '/addToCart',
                    data: 'csrfmiddlewaretoken=b4dmViIR4qoQuItx7xoj8i2FW9wstT2xwO2sl5GwJCL7p92m2V04YtkOj9PtOliR&product_id='+productID+'&action=add&qty=1&OnsiteGoEW=&Screen_Protection_EW=&Total_Damage_EW=&ExtendedWarranty=&buy_price=100',
                    success: function(response) {
                        //$(".appointment-msg").hide()
                        //alert(response);
                        if (response.status == 'SUCCESS'){
                            cartCount.html(response.data)
                            if (response.data != 0){
                                cartCount.removeClass('opacity-0')
                            }else {
                                cartCount.addClass('opacity-0')
                            }
                            notification('Product successfully added to your cart.')
                            $(this).html('added')
                            loadCartData()
                        }else{
                            alert(response.msg)
                        }
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
    })
    $('.buynow').on('click',function(){
        var productID = this.dataset.product
        
        $.ajax({
                    type: "POST",
                    url: '/buyNow',
                    data: 'csrfmiddlewaretoken=b4dmViIR4qoQuItx7xoj8i2FW9wstT2xwO2sl5GwJCL7p92m2V04YtkOj9PtOliR&product_id='+productID+'&action=add&qty=1',
                    success: function(response) {
                        //$(".appointment-msg").hide()
                        //alert(response);
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
                            alert(response.msg)
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
                    data: 'csrfmiddlewaretoken=b4dmViIR4qoQuItx7xoj8i2FW9wstT2xwO2sl5GwJCL7p92m2V04YtkOj9PtOliR',
                    success: function(response) {
                        //$(".appointment-msg").hide()
                        //alert(response);
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
                data: 'csrfmiddlewaretoken=b4dmViIR4qoQuItx7xoj8i2FW9wstT2xwO2sl5GwJCL7p92m2V04YtkOj9PtOliR&store_pincode='+storepincode,
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
});
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

<script src="../../static/ge_assets/js/footer.js"></script>

<?php include 'footer.php';?>

<!-- ========== Body ========== -->


<!-- ========== SECONDARY CONTENTS ========== -->
<!-- Account Sidebar Navigation -->
<script>
var price='';
var cat_id='';
var sub_cat_id='';
var brand_id='';
$(document).on('change', '.price_slider', function() {
   price=$(this).val();

  filters();
});
 
$(document).on('change', '.brand_checkbox', function() {
    
    var ck_id = [];
    
    $("input[name='brand']:checked").each ( function() {
        ck_id.push($(this).val());
 	  });
 	 
 	 brand_id = ck_id.join(',');
 	  
   filters();
});

function filters(){
  
  cat_id="<?=!empty($_GET['cat_id']) ?  $_GET['cat_id']: ''?>";
  sub_cat_id="<?=!empty($_GET['sub_cat_id']) ?  $_GET['sub_cat_id'] : ''?>";
  console.log(brand_id);
  $.ajax({
                    type: "POST",
                    url: '<?=$asset_url?>web_action/filters.php',
                    data: {
                        price:price,
                        cat_id:cat_id,
                        sub_cat_id:sub_cat_id,
                        brand_id:brand_id,
                        filters:'filters'
                    },
                    success: function(response) {
                        $('.product_data').html(response);
                    }
                   
                });
}    
    


    
</script>
