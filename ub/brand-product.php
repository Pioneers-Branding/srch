<?php include 'header.php';

if(isset($row['brand_id']) && !empty($row['brand_id'])){
    $cid = towreal($row['brand_id']);
    $cat = towquery("SELECT * FROM `tbl_brand` WHERE `brand_id`=$cid");
    $cat = towfetch($cat);
    // print_r($cat);
    // exit;
 
 
//for Filter Range
$minPrice =  getPriceRaneforProductBrand($cid,"ASC");
$maxPrice =  getPriceRaneforProductBrand($cid,"DESC");

        
if(isset($_GET)){
     $query="";
        
        $query = "SELECT * FROM `tbl_product` WHERE `brand_fk_id`=$cid";
        if(!empty($_GET['pt'])){
            $query .=" AND type_fk_id = ".$_GET['pt'];
        }if(!empty($_GET['cl'])){
            $query .=" AND color = ".$_GET['cl'];
        }if(!empty($_GET['maxp'])){
            // $productprice= explode("-",$_GET['pr']);
            $query .=" AND discount > ".$_GET['minp']." AND discount < ".$_GET['maxp'] ;
        }if(!empty($_GET['sz'])){
            $query .=" OR size Like ".$_GET['sz'];
        }if(!empty($_GET['st'])){
                 if($_GET['st']==1){
                     $query .= " order by discount ASC ";
                 }else if($_GET['st']==2){
                     $query .= " order by discount DESC ";
                 }else{
                     $query .= " order by product_pk_id DESC ";
                 }
        }
    //  echo $query;
        $pro = towquery($query);
    }else{
     $pro = towquery("SELECT * FROM `tbl_product` WHERE `brand_fk_id`=$cid");
    }
    
    
}

//Create Url
if(!empty($_GET['st']) || !empty($_GET['pt'])){
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url=parse_url($url);
$clearURL = $url['scheme'].'://'.$url['host'].$_SERVER['REDIRECT_URL'];
$filterString ="Clear Filters";
// echo $clearURL;
//Sortiing
$filterString .="";
echo $filterString."<a href='$clearURL'> <i class='remove-res fa fa-times text-danger'></i></a>";
}
?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://feminineafrica.com/"><?= Home ?></a></li>
    <!--<li class="breadcrumb-item"><a href="#">Library</a></li>-->
    <!--<li class="breadcrumb-item active" aria-current="page">Data</li>-->
    <li class="breadcrumb-item active" aria-current="page"><a href="#"><?= $cat[$brand_title] ?></a></li>
  </ol>
</nav>

<style>
    .breadcrumb>.breadcrumb-item>a{color: #777 !important; font-size: 13px;}
    
</style>


        <h3 style="text-align: center; font-weight: bold; margin-top: 20px; margin-bottom: 20px;font-family: 'Ubuntu', sans-serif;"><?= $cat[$brand_title] ?></h3>
        
        
        <div class="container-fluid" style="background: #f8f8f8; padding-top: 10px; padding-bottom: 10px !important; margin-bottom: 20px;">
              
                <div class="row">
                    <div class="col-6 col-sm-2" style="padding: 3px;">
                        <div class="col-12" style="border: #000 solid 1px;">
                        <form method="get" action="<?= base_url ?><?= $cat['brand_url']?>">
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
                </form> </div>
                    </div>
                
                
                
                
                  <div class="col-6 col-sm-3" style="padding: 3px;">
                      <div class="col-12" style="border: #000 solid 1px; padding-bottom: 0; height: 24px;">
                    
                    <form method="get" action="<?= base_url?>brand-filter" > 
                    <input type="hidden" name="cid" value="<?= $cid ?>" readonly class="form-control" />
                
                    <div class="form-group">   
                    <!--<form method="get" action="<?= base_url?>brand-filter"> -->
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
 </div>
 
                </div>

 <div class="col-6 col-sm-2" style="padding: 3px;">
                      <div class="col-12" style="border: #000 solid 1px; height: 24px; ">
  <div class="form-group">
    <!--<form method="get" action="<?= base_url?>brand-filter"> -->
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
  </div>
</div>
                
    
   
    <div class="col-6 col-sm-2" style="padding: 3px;">
                      <div class="col-12" style="border: #000 solid 1px; height: 24px; ">
  <div class="form-group">
    

<!--<form method="get" action="<?= base_url?>brand-filter"> -->
<!--        <input type="hidden" name="cid" value="<?= $cid ?>" readonly class="form-control" />-->
    <ul style="list-style: none; margin-top: -3px;">
       <li class="dropdown" style="text-align: center;">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle-size" style="color: #000; font-size: 12px;">
            <?= size ?> <i class="fa fa-chevron-right" style="color: #000;"></i></b>
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
  </div>
  </div>
  
                 <div class="col-6 col-sm-3" style="padding: 3px;">
                      <div class="col-12" style="border: #000 solid 1px; height: 24px; ">
                <div class="form-group" style="margin-top: -5px;">
                 <ul style="list-style: none; margin-top: -1px;">
                            
                   <li class="dropdown" style="text-align: center;">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle-pr" style="color: #000; font-size: 12px;">
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
                
                
                
                </div> 
                </div>
            </div>
            </div>
           </form>
     
        </div>
        
        <p style="text-align: center; font-size: 14px;" ><?= $pro->num_rows ?> styles found</p>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        
        <div class="container-fluid" style="margin-bottom: 30px; margin-top: 20px;">
            <div class="row">
                 <?php $uid = (isset($_SESSION['userId']))?$_SESSION['userId']:""; 
                    while($prof = towfetch($pro)){
                $decode = json_decode($prof['product_image']);
                ?>
           <div class="col-6 col-sm-3" style="margin-bottom: 25px;">
                 <p  onclick="addtoWishlists(<?= $prof['product_pk_id'] ?>);"   title="Add To Wishlist"><i class="fa fa-heart-o" style="position: absolute; z-index: 5; left: 20px; top: 5px;color:<?= $prof['product_pk_id'] ?>" style="color:<?php echo (is_wishlisted($prof['product_pk_id'],$uid))?"red":"#D23C74";?>"></i></p>
             <a href="<?= base_url ?><?=$prof['product_url']?>">
                    <!--<img src="admin/assets/<?=$decode[0]?>" style="width: 100%;">-->
                    <img src="admin/assets/<?=$prof['featurd_image']?>" style="width: 100%;">
                <p style=" text-align: center; color: #333;font-family: 'Nunito Sans', sans-serif; margin-top: 2px; font-size: 15px;"><?=$prof[$product_tilte]?></p>
                
                <p style=" text-align: center; color: #DF1B50; margin-top: 6px; font-size: 15px; font-family: 'Nunito Sans', sans-serif;"><?php echo currency_code(); ?><?= currency_price($prof['discount']) ?></span> <span style="text-decoration-line: line-through;font-size: 13.5px; color:ccc; margin-left: 5px;"></span></p>
        
                
                
                 
            </a>
            </div>
                <?php } ?>
                
            <!--<div class="col-md-3">-->
            <!--    <img src="https://images.asos-media.com/products/river-island-lace-up-classic-leather-military-boot-in-black/200985004-1-black?$n_320w$&wid=317&fit=constrain" style="width: 100%;">-->
            <!--    <p style=" text-align: left; color: #000; margin-top: 12px; font-size: 12px;">adidas Originals Celox trainers in brown with orange detail</p>-->
            <!--     <p style=" text-align: left; color: #000; margin-top: 6px; font-size: 15px; font-weight: bold;font-family: 'Ubuntu', sans-serif;">$ 199</p>-->
            <!--</div>-->
            <!--  <div class="col-md-3">-->
            <!--    <img src="https://images.asos-media.com/products/river-island-lace-up-classic-leather-military-boot-in-black/200985004-1-black?$n_320w$&wid=317&fit=constrain" style="width: 100%;">-->
            <!--    <p style=" text-align: left; color: #000; margin-top: 12px; font-size: 12px;">adidas Originals Celox trainers in brown with orange detail</p>-->
            <!--     <p style=" text-align: left; color: #000; margin-top: 6px; font-size: 15px; font-weight: bold;font-family: 'Ubuntu', sans-serif;">$ 199</p>-->
            <!--</div>-->
            <!--   <div class="col-md-3">-->
            <!--    <img src="https://images.asos-media.com/products/river-island-lace-up-classic-leather-military-boot-in-black/200985004-1-black?$n_320w$&wid=317&fit=constrain" style="width: 100%;">-->
            <!--    <p style=" text-align: left; color: #000; margin-top: 12px; font-size: 12px;">adidas Originals Celox trainers in brown with orange detail</p>-->
            <!--     <p style=" text-align: left; color: #000; margin-top: 6px; font-size: 15px; font-weight: bold;font-family: 'Ubuntu', sans-serif;">$ 199</p>-->
            <!--</div>-->
            <!--    <div class="col-md-3">-->
            <!--    <img src="https://images.asos-media.com/products/river-island-lace-up-classic-leather-military-boot-in-black/200985004-1-black?$n_320w$&wid=317&fit=constrain" style="width: 100%;">-->
            <!--    <p style=" text-align: left; color: #000; margin-top: 12px; font-size: 12px;">adidas Originals Celox trainers in brown with orange detail</p>-->
            <!--     <p style=" text-align: left; color: #000; margin-top: 6px; font-size: 15px; font-weight: bold;font-family: 'Ubuntu', sans-serif;">$ 199</p>-->
            <!--</div>-->
        </div> </div>
	<!-- //banner -->

        




<script>
function filter_data(page){
    
        let st= $('#st').val();
        let pt= $('#pt').val();
        let cl= $('#cl').val();
        let sz= $('#sz').val();
        // let pr= $('#pr').val();
        var minp = $('#minp').val();
        var maxp = $('#maxp').val();
         location.href="<?= $_SERVER['SCRIPT_URI'] ?>?cid="+<?= $_GET['cid'] ?>+"&st="+st+"&pt="+pt+"&cl="+cl+"&sz="+sz+"&minp="+minp+"&maxp="+maxp;
    }
  
var minp = $('#minp').val();
var maxp = $('#maxp').val();    
    $('#price_range').slider({
        range:true,
        min:0,
        max:1000,
        values:[minp,maxp],
        step:10,
        stop:function(event, ui)
        {
            $('#price_show').html('$'+ui.values[0] + ' - ' +'$'+ui.values[1]);
            $('#minp').val(ui.values[0]);
            $('#maxp').val(ui.values[1]);
            filter_data(1);
        }

    });
    
    $('.common_selector').change(function(){
        filter_data(1);
    });

</script>
<?php include 'footer.php';?>