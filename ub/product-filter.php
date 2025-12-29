<?php include 'header.php';


    $cid = towreal(isset($_GET['cid'])?$_GET['cid']:'');
    $cat = towquery("SELECT * FROM `tbl_category` WHERE `cat_pk_id`=$cid");
    $cat = towfetch($cat);
    // print_r($cat);
    // exit;


//for Filter Range
$minPrice =  getPriceRaneforProduct($cid,"ASC");
$maxPrice =  getPriceRaneforProduct($cid,"DESC");



//For Applying Filter
$filterQueryId = array();
// print_r($_GET['maxp']);

        $minarray= array();
        $maxarray = array();
        if(!empty($_GET['maxp'])){
            foreach($_GET['maxp'] as $maxRange){
                    $priceRaneArray = explode("-",$maxRange);
                    $minarray[] = $priceRaneArray[0];
                    $maxarray[] = $priceRaneArray[1];
            }    
            //  print_r($minarray);
            //  print_r($maxarray);
             
            for($ft=0;$ft<count($minarray);$ft++){
             $query = " SELECT `product_pk_id`,`discount` FROM `tbl_product` WHERE `product_cat`=$cid AND `discount` >= ".$minarray[$ft]." AND `discount` <= ".$maxarray[$ft];   
             $filterQuery =towquery($query);   
                while($filterQueryResult = towfetch($filterQuery)){
                        $filterQueryId[]=$filterQueryResult['product_pk_id'];
                }
            }
        }

//   print_r($filterQueryId); 
  // No of Type 
//   print_r($_GET['pt']);
        if(!empty($_GET['pt'])){
            foreach($_GET['pt'] as $pt){
               $querypt = " SELECT `product_pk_id`,`discount` FROM `tbl_product` WHERE `product_cat`=$cid AND `type_fk_id` = ".$pt;   
                $filterQuerypt =towquery($querypt); 
                while($filterQueryptResult = towfetch($filterQuerypt)){
                        if(!in_array($filterQueryptResult['product_pk_id'],$filterQueryId)){
                            $filterQueryId[]=$filterQueryptResult['product_pk_id'];
                        }
                }
            }
        }
  
//  print_r($filterQueryId);  
  
   // No of Color 
//   print_r($_GET['cl']);
        if(!empty($_GET['cl'])){
            foreach($_GET['cl'] as $clc){
               $querycl = " SELECT `product_pk_id`,`discount` FROM `tbl_product` WHERE `product_cat`=$cid AND `color` = ".$clc;   
                // echo $querycl;
                $filterQuerycl =towquery($querycl); 
                while($filterQueryclResult = towfetch($filterQuerycl)){
                        if(!in_array($filterQueryclResult['product_pk_id'],$filterQueryId)){
                            $filterQueryId[]=$filterQueryclResult['product_pk_id'];
                        }
                }
            }
        }
  
//  print_r($filterQueryId);

 // No of Size 
//   print_r($_GET['sz']);
        if(!empty($_GET['sz'])){
            foreach($_GET['sz'] as $szp){
               $querysz = " SELECT `product_pk_id`,`discount` FROM `tbl_product` WHERE `product_cat`=$cid AND `size` like '%".$szp."%' ";   
                // echo $querysz;
                $filterQuerysz =towquery($querysz); 
                while($filterQueryszResult = towfetch($filterQuerysz)){
                        if(!in_array($filterQueryszResult['product_pk_id'],$filterQueryId)){
                            $filterQueryId[]=$filterQueryszResult['product_pk_id'];
                        }
                }
            }
        }
  
//  print_r($filterQueryId);

//Create Url
if(!empty($_GET['st']) || !empty($_GET['pt'])){
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url=parse_url($url);
$clearURL = base_url.$cat['cat_url'];
$filterString ="Showing result ";
// echo $clearURL;
//Sortiing
$filterString .="";
echo $filterString."<a href='$clearURL'> <i class='remove-res fa fa-times text-danger'></i></a>";
}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://akwabaformula.com/electro-store/"><?= Home ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="#"><?= $cat[$category_tilte] ?></a></li>
  </ol>
</nav>

<style>
    .breadcrumb>.breadcrumb-item>a{color: #777 !important; font-size: 13px;}
    
</style>


        <h3 style="text-align: center; font-weight: bold; margin-top: 20px; margin-bottom: 20px;font-family: 'Ubuntu', sans-serif;"><?= $cat[$category_tilte] ?></h3>
        
        
       <div class="container-fluid" style="background: #f8f8f8; padding-top: 10px; padding-bottom: 10px !important; margin-bottom: 20px;">
               <div class="row">
                    <div class="col-6" style="padding: 3px;">
                        <div class="col-12" style="border: #000 solid 1px;">
                        <form method="get" action="<?= base_url ?><?= $cat['cat_url']?>">
                           <ul style="list-style: none; margin-top: -3px;">
                               <li class="dropdown" style="text-align: center;">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle-sort" style="color: #000; font-size: 12px;">
                                    <?= sort_by ?> <i class="fa fa-chevron-right" style="color: #000;"></i></b>
                                    </a>
                                 <ul class="dropdown-menu sort-menu" style="width:280px">
                                     
                                    <li style="margin-left:15px"><label class="checkbox"><input type="checkbox" class="chb" name="st" value="1" <?php if(isset($_GET['st']) && $_GET['st']=='1'){ echo "checked";} ?>>&nbsp;<?= low_to_high ?></label></li>
                                    <li style="margin-left:15px"><label class="checkbox"><input type="checkbox" class="chb" name="st" value="2" <?php if(isset($_GET['st']) && $_GET['st']=='2'){ echo "checked";} ?>>&nbsp;<?= high_to_low ?></label></li>
                                    <li style="margin-left:40px"><label class=""><button type="button" class="btn dropdown-toggle-sort">Cancel</button></label></li>
                                    <li style="margin-left:125px;margin-top:-40px"><label class=""><button type="submit" class="btn ">Submit</button></label></li>
                                    
                                 </ul>
                                </li>
                            </ul>
                </form> 
                    </div> </div>
               
               
                
                
                <div class="col-6" style="padding: 3px;">
                        <div class="col-12" style="border: #000 solid 1px; height: 24px;">
                      <form method="get" action="<?= base_url?>product-filter" style=""> 
                    <input type="hidden" name="cid" value="<?= $cid ?>" readonly class="form-control" />
                
                    <div class="form-group">   
                    <!--<form method="get" action="<?= base_url?>product-filter"> -->
                    <!--    <input type="hidden" name="cid" value="<?= $cid ?>" readonly class="form-control" />-->

   <ul style="list-style: none; margin-top: -3px;">
       <li class="dropdown" style="text-align: center;">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle-pdtype" style="color: #000; font-size: 12px;">
            <?= product_type ?> <i class="fa fa-chevron-right" style="color: #000;"></i></b>
            </a>
         <ul class="dropdown-menu pdtype-menu" style="width:280px">
             <?php while($pt = towfetch($productType)){ ?>
            <li style="margin-left:15px"><label class="checkbox"><input type="checkbox"  name="pt[]" value="<?= $pt['id']?>" <?php if(isset($pt['id']) && in_array($pt['id'],$_GET['pt'])){ echo "checked"; } ?>>&nbsp;<?= $pt[$title_field] ?></label></li>
           <?php } ?>
           
            <li style="margin-left:40px"><label class=""><button type="button" class="btn dropdown-toggle-pdtype">Cancel</button></label></li>
            <li style="margin-left:125px;margin-top:-40px"><label class=""><button type="submit" class="btn ">Submit</button></label></li>
            
         </ul>
        </li>
    </ul>
<!--</form> -->

  </div>
 
 
                </div>  </div></div>
  <div class="row">
<div class="col-6" style="padding: 3px;">
                      <div class="col-12" style="border: #000 solid 1px; height: 24px; ">
  <div class="form-group">
    <!--<form method="get" action="<?= base_url?>product-filter"> -->
    <!--    <input type="hidden" name="cid" value="<?= $cid ?>" readonly class="form-control" />-->
    <ul style="list-style: none; margin-top:-3px;">
       <li class="dropdown" style="text-align: center !important;">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle-color" style="color: #000;  font-size: 12px;">
            <?= color ?> <i class="fa fa-chevron-right" style="color: #000;"></i></b>
            </a>
         <ul class="dropdown-menu color-menu" style="width:280px">
             <?php while($pc = towfetch($productColor)){ ?>
            <li style="margin-left:15px"><label class="checkbox"><input type="checkbox"  name="cl[]" value="<?= $pc['color_id']?>"  <?php if(isset($_GET['cl']) && in_array($pc['color_id'],$_GET['cl'])){ echo "checked"; } ?> >&nbsp;<?= $pc[$color_title] ?></label></li>
           <?php } ?>
           
            <li style="margin-left:40px"><label class=""><button type="button" class="btn dropdown-toggle-color">Cancel</button></label></li>
            <li style="margin-left:125px;margin-top:-40px"><label class=""><button type="submit" class="btn ">Submit</button></label></li>
            
         </ul>
        </li>
    </ul>
<!--</form> -->

  </div>
</div></div>
                
    
    <div class="col-6" style="padding: 3px;">
                      <div class="col-12" style="border: #000 solid 1px; height: 24px; ">
  <div class="form-group">
    

<!--<form method="get" action="<?= base_url?>product-filter"> -->
<!--        <input type="hidden" name="cid" value="<?= $cid ?>" readonly class="form-control" />-->
    <ul style="list-style: none; margin-top:-3px;">
       <li class="dropdown" style="text-align: center !important;">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle-size" style="color: #000;  font-size: 12px;">
            <?= size ?> <i class="fa fa-chevron-right" style="color: #999;"></i></b>
            </a>
         <ul class="dropdown-menu size-menu" style="width:280px">
             <?php while($ps = towfetch($productSize)){ ?>
            <li style="margin-left:15px"><label class="checkbox"><input type="checkbox"  name="sz[]" value="<?= $ps['size_id']?>" <?php if(isset($_GET['sz']) && in_array($ps['size_id'],$_GET['sz'])){ echo "checked";} ?>>&nbsp;<?= $ps[$size_title] ?></label></li>
           <?php } ?>
           
            <li style="margin-left:40px"><label class=""><button type="button" class="btn dropdown-toggle-size">Cancel</button></label></li>
            <li style="margin-left:125px;margin-top:-40px"><label class=""><button type="submit" class="btn ">Submit</button></label></li>
            
         </ul>
        </li>
    </ul>
<!--</form>     -->
    
  </div>
  </div></div>
  
  
                <div class="col-6" style="padding: 3px;">
                      <div class="col-12" style="border: #000 solid 1px; height: 24px; ">
                <div class="form-group" style="">
                 <ul style="list-style: none; margin-top:-3px;">
                            
                   <li class="dropdown" style="text-align: center !important;">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle-pr" style="color: #000;  font-size: 12px;">
                       <?= price_range ?> <i class="fa fa-chevron-right" style="color: #000;"></i></b>
                        </a>
                     <ul class="dropdown-menu pr-menu" style="width:310px">
                         <?php $lastminPrice=0;
                                for($ip=2;$ip<50;$ip++){
                                    if($minPrice * $ip < $maxPrice){ 
                                        $lastminPrice = $minPrice * $ip; 
                                            $fminPrice = $minPrice * ($ip-1);
                                            $fmaxPrice = ($minPrice * $ip) -1;
                                            
                                            
                                            ?>
                         <li style="margin-left:15px"><label class="checkbox"><input type="checkbox"  name="maxp[]" value="<?= $fminPrice ?>-<?= $fmaxPrice ?>"  <?php if(in_array($fminPrice."-".$fmaxPrice,$_GET['maxp'])){ echo "checked"; } ?>><?php echo currency_code(); ?><?= currency_price($fminPrice) ?> -  <?php echo currency_code(); ?><?= currency_price($fmaxPrice) ?></label></li>
                        <?php } } ?>
                         <li style="margin-left:15px"><label class="checkbox"><input type="checkbox"  name="maxp[]" value="<?= $lastminPrice ?>-<?= $maxPrice ?>" <?php if(in_array($lastminPrice."-".$maxPrice,$_GET['maxp'])){ echo "checked"; } ?> ><?php echo currency_code(); ?><?= currency_price($lastminPrice) ?> -  <?php echo currency_code(); ?><?= $maxPrice ?></label></li>
                 <li style="margin-left:30px"><label class=""><button type="button" class="btn dropdown-toggle-pr">Cancel</button></label></li>
                <li style="margin-left:140px;margin-top:-40px"><label class=""><button type="submit" class="btn ">Submit</button></label></li>
                        
                     </ul>
                    </li>
                    
     </form>
                </ul>
                
                
                
                </div> </div>
                
            </div>
            </div>
           </form>
  
        </div>
        
        <p style="text-align: center; font-size: 14px;" ><?= count($filterQueryId) ?> styles found</p>
        
        <style>
            .ui-slider .ui-slider-range{background: #000;}
        </style>
        
        <div class="container-fluid" style="margin-bottom: 30px; margin-top: 20px;">
            <div class="row">
                	<?php $uid = (isset($_SESSION['userId']))?$_SESSION['userId']:"";
                	 foreach($filterQueryId as $proId){
                	        $filterquery = towquery("SELECT * FROM `tbl_product` WHERE  `product_pk_id`=$proId AND  `product_cat`=$cid");
                            if($filterquery->num_rows > 0){
                	        while($prof = towfetch($filterquery)){
                $decode = json_decode($prof['product_image']);
                ?>
            <div class="col-md-3">
                <p  onclick="addtoWishlists(<?= $prof['product_pk_id'] ?>);"   title="Add To Wishlist"><i class="fa fa-heart" style="position: absolute; z-index: 5; color: #000; left: 20px; top: 5px;" id="fa-heart<?= $prof['product_pk_id'] ?>" style="color:<?php echo (is_wishlisted($prof['product_pk_id'],$uid))?"red":"black";?>"></i></p>
              <a href="<?= base_url ?><?=$prof['product_url']?>">
                    <!--<img src="admin/assets/<?=$decode[0]?>" style="width: 100%;">-->
                    <img src="<?= base_url ?>admin/assets/<?=$prof['featurd_image']?>" style="width: 100%;">
                <p style=" text-align: left; color: #000; margin-top: 12px; font-size: 12px;"><?=$prof[$product_tilte]?></p>
                 <p style=" text-align: left; color: #000; margin-top: 6px; font-size: 15px; font-weight: bold;font-family: 'Ubuntu', sans-serif;"><?php echo currency_code(); ?> <?= currency_price($prof['discount'])?></span> <span style="text-decoration-line: line-through;font-size: 13.5px; color:ccc; margin-left: 5px;"><?php echo currency_code(); ?><?= currency_price($prof['product_price']) ?></span></p>
            </a>
            </div>
                <?php } 
                	   } }
                    ?>
           
        </div> </div>
	<!-- //banner -->


<script>
$(".chb").change(function() {
    $(".chb").prop('checked', false);
    $(this).prop('checked', true);
});
</script>
<?php include 'footer.php';?>