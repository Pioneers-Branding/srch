<?php include 'header.php';
    $pkid = $row['product_pk_id'];

if(isset($row['product_pk_id']) && !empty($row['product_pk_id'])){
    $pkid = $row['product_pk_id'];
    $product = towquery("SELECT * FROM `tbl_product` INNER JOIN tbl_category ON tbl_category.cat_pk_id= tbl_product.`product_cat` WHERE product_pk_id=$pkid");
    $productfetch = towfetch($product); 
        extract($productfetch);
    //Size        
    $productSize = explode(",",$productfetch['size']);
    $sizeDeatails = towquery("SELECT * FROM `tbl_size` WHERE size_status=1");
      
    //color       
   
        
        $productcolor = explode(",",$productfetch['color']);
    $colorDeatails = towquery("SELECT * FROM `tbl_color` WHERE color_status=1");
        
        
        // print_r($colorName);
//Brand       
    $brandDeatails = towquery("SELECT * FROM `tbl_brand` WHERE brand_id=".$productfetch['brand_fk_id']);
     $brandName = towfetch($brandDeatails); 
        extract($brandName);
        // print_r($brandName);
        
    $decode = json_decode($productfetch['product_image']);
    // print_r($decode);
   $gross = $discount/$product_price * 100;
  $off =100 - $gross;
}
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://feminineafrica.com/"><?= Home ?></a></li>
    <!--<li class="breadcrumb-item"><a href="#">Library</a></li>-->
    <li class="breadcrumb-item"><a href="<?= base_url ?><?= $productfetch['cat_url'] ?>"><?= $productfetch[$category_tilte] ?></a></li>
	
    <li class="breadcrumb-item active" aria-current="page"><a href="#"><?= $productfetch[$product_tilte] ?></a></li>
  </ol>
</nav>

<style>
    .breadcrumb>.breadcrumb-item>a{color: #777 !important; font-size: 13px;}
    span.item_price{color: #000; font-weight: bold;font-family: 'Ubuntu', sans-serif;}
</style>
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5" style="margin-top: -51px;">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
							    	<li data-thumb="<?= base_url ?>admin/assets/<?= $productfetch['featurd_image'] ?>">
									<div class="thumb-image">
										<img src="<?= base_url ?>admin/assets/<?= $productfetch['featurd_image'] ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
							    <?php 
							    for($im=0;$im<count($decode);$im++){ ?>
							        	<li data-thumb="<?= base_url ?>admin/assets/<?= $decode[$im]?>">
									<div class="thumb-image">
										<img src="<?= base_url ?>admin/assets/<?= $decode[$im]?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
							    <?php }
							    ?>
							    
								<!--<li data-thumb="images/si1.jpg">-->
								<!--	<div class="thumb-image">-->
								<!--		<img src="images/si1.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>-->
								<!--</li>-->
								<!--<li data-thumb="images/si2.jpg">-->
								<!--	<div class="thumb-image">-->
								<!--		<img src="images/si2.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>-->
								<!--</li>-->
								<!--<li data-thumb="images/si3.jpg">-->
								<!--	<div class="thumb-image">-->
								<!--		<img src="images/si3.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>-->
								<!--</li>-->
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?= $productfetch[$product_tilte] ?>
					<?php $uid = (isset($_SESSION['userId']))?$_SESSION['userId']:"";?>
                <p  onclick="addtoWishlists(<?= $productfetch['product_pk_id'] ?>);"   title="Add To Wishlist"><i class="fa fa-heart" id="fa-heart<?= $productfetch['product_pk_id'] ?>" style="color:<?php echo (is_wishlisted($productfetch['product_pk_id'],$uid))?"red":"black";?>"></i></p>
					</h3>
					<p class="mb-3">
						<span class="item_price"><?php echo currency_code(); ?><?= currency_price($discount )?></span>
						<del class="mx-2 font-weight-light"></del>
						<?php/*<del class="mx-2 font-weight-light"><?php echo currency_code(); ?><?= currency_price($product_price) ?></del>
						*/?>
						<label>Free delivery</label>
					</p><?= ($productfetch[$pr_desc]); ?>
					<?php  //echo $productfetch['product_desc']; ?>
					<!--<div class="single-infoagile">-->
					<!--	<ul>-->
					<!--		<li class="mb-3">-->
					<!--			Cash on Delivery Eligible.-->
					<!--		</li>-->
					<!--		<li class="mb-3">-->
					<!--			Shipping Speed to Delivery.-->
					<!--		</li>-->
					<!--		<li class="mb-3">-->
					<!--			EMIs from $655/month.-->
					<!--		</li>-->
					<!--		<li class="mb-3">-->
					<!--			Bank OfferExtra 5% off* with Axis Bank Buzz Credit CardT&C-->
					<!--		</li>-->
					<!--	</ul>-->
					<!--</div>-->
					<!--<div class="product-single-w3l">-->
					<!--	<p class="my-3">-->
					<!--		<i class="far fa-hand-point-right mr-2"></i>-->
					<!--		<label>1 Year</label>Manufacturer Warranty</p>-->
					<!--	<ul>-->
					<!--		<li class="mb-1">-->
					<!--			3 GB RAM | 16 GB ROM | Expandable Upto 256 GB-->
					<!--		</li>-->
					<!--		<li class="mb-1">-->
					<!--			5.5 inch Full HD Display-->
					<!--		</li>-->
					<!--		<li class="mb-1">-->
					<!--			13MP Rear Camera | 8MP Front Camera-->
					<!--		</li>-->
					<!--		<li class="mb-1">-->
					<!--			3300 mAh Battery-->
					<!--		</li>-->
					<!--		<li class="mb-1">-->
					<!--			Exynos 7870 Octa Core 1.6GHz Processor-->
					<!--		</li>-->
					<!--	</ul>-->
					<!--	<p class="my-sm-4 my-3">-->
					<!--		<i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card-->
					<!--	</p>-->
					<!--</div>-->
					<br>
					
					
					<!-- Button trigger modal -->

<style>
    .modal-dialog{max-width: 800px !important;}
</style>
<!-- Modal -->
<div class="modal fade" id="size-chart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="images/size-guide.png" style="width: 100%;">
      </div>
      
    </div>
  </div>
</div>
					
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="#" method="post">
							     <?php if(!empty($brandName['brand_name'])){ ?>
							<label style="display:none" ><?= brand ?></label>
							    <input type="text" readonly style="display:none" value="<?= $brandName[$brand_title] ?>" name="brand_name"  id="brand_name" class="form-control" />
							    <?php } ?>
							  <label><?= color ?></label>
                                    <select name="color_name" id="color_name" class="form-control" required  >
                                        <option value=""><?= select_color ?></option>
                                            <?php while($sz = towfetch($colorDeatails)){ 
                                             if(in_array($sz['color_id'],$productcolor)){?>
                                                <option value="<?= $sz[$color_title]?>"><?= $sz[$color_title]?></option>
                                            <?php } } ?>
                                    </select>
							  
							   <?php if(!empty($colorName['color_name'])){ ?>
							    							    <?php } ?>
							    <label><?= size ?></label>
                                    <select name="size_name" id="size_name" class="form-control" required  >
                                        <option value=""><?= select_size ?></option>
                                            <?php while($sz = towfetch($sizeDeatails)){ 
                                             if(in_array($sz['size_id'],$productSize)){?>
                                                <option value="<?= $sz[$size_title]?>"><?= $sz[$size_title]?></option>
                                            <?php } } ?>
                                    </select>
                                   
                                    <br>
                                    
                                    
                                    	<button type="button" class="btn btn-primary" style="background: none; padding-top: -10px !important; margin-bottom: 10px; border: none; color: #000;" data-toggle="modal" data-target="#size-chart">
  Guide des tailles
</button>
                                    
                                    
								<fieldset>
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" />
									<input type="hidden" name="business" value=" " />
									<input type="hidden" name="item_name" value="<?= $productfetch[$product_tilte] ?>" />
									<input type="hidden" name="amount" value="<?= currency_price($product_price)?>" />
									<input type="hidden" name="discount_amount" value="<?= currency_price($discount) ?>" />
									<input type="hidden" name="currency_code" value="<?php echo currency(); ?>" />
									<input type="hidden" name="return" value=" " />
									<input type="hidden" name="cancel_return" value=" " />
									<!--<input type="submit" name="submit" value="Add to Bag" class="button" />-->
									<input type="button" name="button" class="button" value="<?= add_bag ?>" onclick="add_to_cart(<?=$product_pk_id?>)" id="add_button_<?=$product_pk_id?>" />
								
									<input type="button" name="button" class="button" value="Added" style="display:none;" onclick="add_to_cart(<?=$product_pk_id?>)"  id="added_button_<?=$product_pk_id?>">
								</fieldset>
							</form>
						</div>
					</div>
					
					
				
					
					
				</div>
			</div>
		</div>
	</div>
	
	<!--Product Add Model-->
	<div id="product-model"></div>
	 <!-- Modal -->
 
  
	<!-- //Single Page -->
    <?php include 'footer.php';?>
<script>
       function plus_cart(id){
        $.post("<?= base_url ?>add_to_cart.php",
            {
              id: id
            },
             function(data,status) {
                 location.reload();
             });
    }
    function minus_cart(id){
        $.post("<?= base_url ?>add_to_cart.php",
            {
              rid: id
            },
             function(data,status) {
                 location.reload();
             });
    }
    function remove_cart(id){
        $.post("<?= base_url ?>add_to_cart.php",
            {
              removeid: id
            },
             function(data,status) {
                 location.reload();
             });
    }
</script>