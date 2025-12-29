<?php include 'header.php';
if ($cartCount->num_rows == 0)
{
    echo "<script>alert('No item in cart!');window.location.href='" . base_url . "';</script>";
}
$item = 0;
$subtotal = 0;
$total = 0;
$shipingPrice = 60;
$tax = 0;
?>    
 
    <div class="container-fluid spacing" style="margin-top: 2px;">
        <div class="col-sm-12 col-md-8" style="background-color:#fbfbfb;">
            <h5><?=shopping_cart?></h5>
                <table class="table checkout-table">
                  <thead>
                    <tr>
                      <th scope="col" class="col-sm-6"><?=item?></th>
                      <th scope="col" class="col-sm-2"><?=price?></th>
                      <th scope="col" class="col-sm-2"><?=qty?></th>
                      <th scope="col" class="col-sm-2"><?=subtotal?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($cartf = towfetch($cart)){ ?> 
                        <tr>
                          <th scope="row">
                              <div style="display: flex">
                                  <div>
                                      <a href="<?=base_url ?><?=$cartf['product_url'] ?>">
            							<img src="<?=base_url ?>admin/assets/<?=$cartf['featurd_image'] ?>" style="width:150px; height: 150px;" alt=" " class="img-responsive">
            						  </a>
                                  </div>
                                  <div style="margin-left:15px;display:flex;flex-direction:column;align-items:flex-start;justify-content:space-between">
                                      <div>
                                          <a href="<?=base_url ?><?=$cartf['product_url'] ?>"  style="font-family: 'Nunito Sans', sans-serif; color: #000;">
        					        	    <?=$cartf[$product_tilte]; ?>
        					        	  </a>
        					        	  <p style="font-family: 'Nunito Sans', sans-serif; color: #000;margin-top: 6px;"><?=color?>: <?=$cartf['color'] ?></p>
        					        	  <p style="font-family: 'Nunito Sans', sans-serif; color: #000;"><?=size ?>: <?=$cartf['size'] ?></p>
                                      </div>
    					        	  <div class="rem" onclick="remove_cart('<?=$cartf['product_pk_id']; ?>')" >
    									<div class="close1"></div>
    								  </div>
                                  </div>
                              </div>
                          </th>
                          <td><?=currency_code() ?> <?=currency_price($cartf['discount'] * $cartf['qty']) ?></td>
                          <td style="display:flex">
                              <div class="entry value-minus" onclick="minus_cart('<?=$cartf['product_pk_id']; ?>')">-</div>
    							<div class="entry value" style="color: #fff; background: #000;">
    								<span><?=$cartf['qty']; ?></span>
    							</div>
    						  <div class="entry value-plus active" onclick="plus_cart('<?=$cartf['product_pk_id']; ?>')" >+</div>
                          </td>
                          <?php
                                $subtotal += $cartf['product_price'] * $cartf['qty'];
                                $total += $cartf['discount'] * $cartf['qty']
                          ?>
                          <td>
                              <?=currency_code() ?> <?=currency_price($total) ?>
                          </td>
                        </tr>
                    <?php $item++;} ?>
                  </tbody>
                </table>
                <div class="col-sm-12 col-md-8 mobile-view" style="background-color:#fbfbfb;">
        </div>
        </div>
        
        <div class="col-sm-12 col-md-4">
            <h3 style="font-size: 18px;font-family: 'Nunito Sans', sans-serif;font-weight: bold;"><?=summary?></h3>
            <div class="summary-detail-box">
                <p style="font-family: 'Nunito Sans', sans-serif; ">
                    <span style="color: #666;"><?=Subtotals?></span>
                    <span style="color: #666;"><?=currency_code() ?> <?=currency_price($total) ?></span>
                </p>
                <p style="font-family: 'Nunito Sans', sans-serif;">
                    <span style="color: #666;"><?=tax ?></span>
                    <span style="color: #666;"><?=currency_code() ?> <?=$tax ?></span>
                </p>
            </div>
            <div class="total-amount">
                <p style="font-family: 'Nunito Sans', sans-serif;">
                    <span><?=order_total ?></span>
                    <span><?=currency_code() ?> <?=currency_price($total) + $tax ?>.00</span>
                </p>
            </div>
            <a href="order_new" id="checkout">
                <div class="col-md-12 col-xs-12" style="background: #000; padding-top: 2px; padding-bottom: 1px;margin-top: 20px">
                    <p style=" text-align: center;font-family: 'Nunito Sans', sans-serif; font-size: 17px; color: #fff; padding: 5px 0"><?=checkout ?></p>
                </div>
            </a>
        </div>
    </div>

<?php include 'footer.php'; ?>
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
              rid: id,
              type: "add"
            },
             function(data,status) {
                 location.reload();
             });
    }
    function minus_cart(id){
        $.post("add_to_cart.php",
            {
              rid: id,
              type: "subt"
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
