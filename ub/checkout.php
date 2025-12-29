<?php include 'header.php';
if($cartCount->num_rows == 0 ){
     echo "<script>alert('No item in cart!');window.location.href='".base_url."';</script>";
}


        $item = 0;
        $subtotal = 0;
        $total = 0;
        $shipingPrice=60;
        // $cartf = towfetch($cart);
        // print_r($cart->num_rows);
    ?>    
 
    	<!-- checkout page -->
    	
    	
    	<style>
    	    @media screen and (max-width: 460px)
    	    {
    	        .nkm{margin-top: 40px;}
    	    }
    	</style>
    	
	<div class="privacy py-sm-5 py-4 nkm">
		<div class="container py-xl-4 py-lg-2" style="margin-top:-45px !important;">
			<!-- tittle heading -->
			<?php/*<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span><?= checkout ?></span>
			</h3>*/?>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<p class="mb-sm-4 mb-3" style="color: #000;"><?= checkout_msg ?>:
					<span><?php echo $cartCount->num_rows; ?> <?= products ?></span>
				</p>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th><?= s_no ?>.</th>
								<th><?= product_img ?></th>
								<th><?= quantity ?></th>
								<th><?= pd_name ?></th>
								<th><?= size ?></th>
                                <th><?= color ?></th>
								<th><?= price ?></th>
								<th><?= remove ?></th>
							</tr>
						</thead>
						<tbody>
						    <?php $co=1; while($cartf = towfetch($cart)){ ?>
						        
                                <tr class="rem1">
								<td class="invert"><?= $co ?></td>
								<td class="invert-image">
									<a href="<?= base_url ?><?=$cartf['product_url']?>">
										<img src="<?= base_url ?>admin/assets/<?=$cartf['featurd_image']?>" style="width:150px; height: 150px;" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus" onclick="minus_cart('<?=$cartf['product_pk_id'];?>')">&nbsp;</div>
											<div class="entry value" style="color: #fff; background: #000;">
												<span><?=$cartf['qty'];?></span>
											</div>
											<div class="entry value-plus active" onclick="plus_cart('<?=$cartf['product_pk_id'];?>')" >&nbsp;</div>
										</div>
									</div>
								</td>
								<td class="invert">
								    	<a href="<?= base_url?><?=$cartf['product_url']?>">
							        	<?=$cartf[$product_tilte];?>
							        	</a>
								</td>
								<td class="invert">
								    
							        <span><?=$cartf['size'];?></span>
							        	
								</td>
								<td class="invert">
								    	
							        <span><?=$cartf['color'];?></span>
								</td>
								<td class="invert" style="color: #D01345; font-weight: bold;"><?php if(isset($_SESSION['exchange_rate']))
                 { echo $_SESSION['exchange_sign']; }
                 else
                 {
                 echo "CFA";}?>
                 <?php if(isset($_SESSION['exchange_rate'])){
                     echo  number_format($_SESSION['exchange_rate']*($cartf['discount']* $cartf['qty']),2); } else {
                 echo $cartf['discount']* $cartf['qty'];}?></td>
								<td class="invert">
									<div class="rem" onclick="remove_cart('<?=$cartf['product_pk_id'];?>')" >
										<div class="close1"> </div>
									</div>
								</td>
							</tr>
							<?php
                      $subtotal +=$cartf['product_price']* $cartf['qty'];
                      $total +=$cartf['discount']* $cartf['qty']?>
						    <?php $co++; $item++;} ?>
							<!--<tr class="rem1">-->
							<!--	<td class="invert">1</td>-->
							<!--	<td class="invert-image">-->
							<!--		<a href="single.html">-->
							<!--			<img src="images/a.jpg" alt=" " class="img-responsive">-->
							<!--		</a>-->
							<!--	</td>-->
							<!--	<td class="invert">-->
							<!--		<div class="quantity">-->
							<!--			<div class="quantity-select">-->
							<!--				<div class="entry value-minus">&nbsp;</div>-->
							<!--				<div class="entry value">-->
							<!--					<span>1</span>-->
							<!--				</div>-->
							<!--				<div class="entry value-plus active">&nbsp;</div>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--	</td>-->
							<!--	<td class="invert">Back Cover</td>-->
							<!--	<td class="invert">$259</td>-->
							<!--	<td class="invert">-->
							<!--		<div class="rem">-->
							<!--			<div class="close1"> </div>-->
							<!--		</div>-->
							<!--	</td>-->
							<!--</tr>-->
							<!--<tr class="rem2">-->
							<!--	<td class="invert">2</td>-->
							<!--	<td class="invert-image">-->
							<!--		<a href="single2.html">-->
							<!--			<img src="images/a4.jpg" alt=" " class="img-responsive">-->
							<!--		</a>-->
							<!--	</td>-->
							<!--	<td class="invert">-->
							<!--		<div class="quantity">-->
							<!--			<div class="quantity-select">-->
							<!--				<div class="entry value-minus">&nbsp;</div>-->
							<!--				<div class="entry value">-->
							<!--					<span>1</span>-->
							<!--				</div>-->
							<!--				<div class="entry value-plus active">&nbsp;</div>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--	</td>-->
							<!--	<td class="invert">Cordless Trimmer</td>-->
							<!--	<td class="invert">$1,999</td>-->
							<!--	<td class="invert">-->
							<!--		<div class="rem">-->
							<!--			<div class="close2"> </div>-->
							<!--		</div>-->
							<!--	</td>-->
							<!--</tr>-->
							<!--<tr class="rem3">-->
							<!--	<td class="invert">3</td>-->
							<!--	<td class="invert-image">-->
							<!--		<a href="single.html">-->
							<!--			<img src="images/a3.jpg" alt=" " class="img-responsive">-->
							<!--		</a>-->
							<!--	</td>-->
							<!--	<td class="invert">-->
							<!--		<div class="quantity">-->
							<!--			<div class="quantity-select">-->
							<!--				<div class="entry value-minus">&nbsp;</div>-->
							<!--				<div class="entry value">-->
							<!--					<span>1</span>-->
							<!--				</div>-->
							<!--				<div class="entry value-plus active">&nbsp;</div>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--	</td>-->
							<!--	<td class="invert">Nikon Camera</td>-->
							<!--	<td class="invert">$37,490</td>-->
							<!--	<td class="invert">-->
							<!--		<div class="rem">-->
							<!--			<div class="close3"> </div>-->
							<!--		</div>-->
							<!--	</td>-->
							<!--</tr>-->
							<tfoot>
							  
							    <tr>
							        <td colspan="4"><?= Total ?></td>
							        <td colspan="2"><?php if(isset($_SESSION['exchange_rate']))
                 { echo $_SESSION['exchange_sign']; }
                 else
                 {
                 echo "CFA";}?>
                 <?php if(isset($_SESSION['exchange_rate'])){
                     echo  number_format($_SESSION['exchange_rate']*($total),2); } else {
                 echo $total;}?></td>
							        <input type="hidden" name="total" id="total" class="form-control" value="<?php $total;?>" />
							    </tr>
							    <tr>
							        <td colspan="7">
							            <a href="order_new" id="checkout"><div class="col-md-12 col-xs-12" style="background: #018849; padding-top: 2px; padding-bottom: 1px;">
                                         <p style=" text-align: center; font-size: 17px; color: #fff;"><?= checkout ?></p></div></a>
							        </td>
							    </tr>1
							</tfoot>
							<input type="hidden" name="shipping" id="shipping" value="<?= currency_price($shipingPrice) ?>" class="form-control" />
						</tbody>
					</table>
				</div>
			</div>
		
		</div>
	</div>
	<!-- //checkout page -->

<?php include 'footer.php';?>
<script>
// $(document).ready(function(){ 
//     if($('#total').val()==0){
//         $('.shippingValue').hide();
//     }else if($('#total').val()>299){
//          $('.shippingValue').hide();
//          $('#shipping').val('0');
//     }else{
//         $('.shippingValue').show();
//         let tt =$('#total').val();
//         let sp =$('#shipping').val();
//             newtotal=parseInt(tt)+parseInt(sp);
//         $('#total').val(parseInt(newtotal));
//         $('#tot').html(newtotal);
//     }
// }); 

    function plus_cart(id){
        $.post("add_to_cart.php",
            {
              id: id
            },
             function(data,status) {
                 location.reload();
             });
    }
    function minus_cart(id){
        $.post("add_to_cart.php",
            {
              rid: id
            },
             function(data,status) {
                 location.reload();
             });
    }
    function remove_cart(id){
        $.post("add_to_cart.php",
            {
              removeid: id
            },
             function(data,status) {
                 location.reload();
             });
    }
</script>
