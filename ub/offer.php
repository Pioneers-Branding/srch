<?php include 'header.php';
   if(isset($_GET['sort'])){
         $sort = towreal($_GET['sort']);
         if($sort==1){
            $pro = towquery("SELECT * FROM `tbl_product` WHERE `offer_product`=1 order by product_price DESC ");
         }else if($sort==2){
            $pro = towquery("SELECT * FROM `tbl_product` WHERE `offer_product`=1 order by product_price ASC ");
         }else{
            $pro = towquery("SELECT * FROM `tbl_product` WHERE `offer_product`=1 order by product_pk_id DESC ");
         }
    }else{
    $pro = towquery("SELECT * FROM `tbl_product` WHERE `offer_product`=1");
    } 
?>
<div class="container">
    <div class="row">
        
        <div class="col-md-12">
             <h3 style="font-weight: bold; color: #FB9A2E; font-size: 35px; text-align: center;">Offer Product</h3>
        </div>
        <div class="col-md-9" style="margin-top: 20px; margin-bottom: 20px;">
           
        </div>
         <div class="col-md-3" style="display:none">
                <select name="sort" id="sort" onchange="price_popularity()" class="form-control">
                    <option value="">Select Sorting</option>
                    <option value="1" <?php if(isset($_GET['sort']) && $_GET['sort']==1){ echo "selected";}?>>High to Low</option>
                    <option value="2" <?php if(isset($_GET['sort']) && $_GET['sort']==2){ echo "selected";}?>>Low to High</option>
                    <option value="3" <?php if(isset($_GET['sort']) && $_GET['sort']==3){ echo "selected";}?>>New Arrivals</option>
                </select>
            </div>
        <div class="col-md-12 col-xs-12" style="padding: 0;">
            <?php while($prof = towfetch($pro)){
                $decode = json_decode($prof['product_image']);
                ?>
                <div class="col-md-6 col-xs-6" style="padding: 7px;">
                 <div class="col-md-12" style="background: #fff; border: #ccc solid 1px; border-radius:  20px; ">
                        <a href="product-detail.php?pid=<?=$prof['product_pk_id']?>"> <img src="http://tbiindia.org/er4u/tycoonsretails/<?=$decode[0]?>" style="width: 100%; height: 120px;"></a>
                        <p style="margin-top: 10px; font-size: 18px; font-weight: bold; text-align: left;"><a href="product-detail.php?pid=<?=$prof['product_pk_id']?>"><b><?=$prof['product_title']?></b></a></p>
                        <p style="margin-top: -10px; margin-bottom:3px; text-align: left;">Buy <?=$prof['product_w']?></p>
                        <p style="text-align: left;">
                            <span style="font-size: 18px; font-weight: bold; text-align: left; color:#999;">Rs <?=$prof['discount']?></span> <span style="text-decoration-line: line-through;font-size: 13.5px; color:ccc; margin-left: 5px;">Rs <?=$prof['product_price']?></span></p>
                       <center> 
                          <?php if($prof['product_stock'] !=0){ ?>
                       <button style="background: #fea650; padding: 6px 18px; border: none; color: #fff; margin-bottom: 10px;" onclick="add_to_cart(<?=$prof['product_pk_id']?>)" id="add_button_<?=$prof['product_pk_id']?>">ADD TO CART</button>
                        <button style="background: #1d941d; padding: 6px 18px; border: none; color: #fff; display:none; margin-bottom: 10px;" id="added_button_<?=$prof['product_pk_id']?>">ADDED</button>
                       <?php } else{ ?>
                         <button style="background: #ce1919; padding: 6px 18px; border: none; color: #fff; margin-bottom: 10px;">Unavailable</button>
                       <?php } ?>
                        </center>
                    </div>
                </div>
                <?php } ?>
        </div>
        
    </div>
</div>
<?php include 'footer.php';?>
<script>
    function price_popularity(){
    var sort = $('#sort').val();
    if(sort !=''){
        location.href="<?= $_SERVER['SCRIPT_URI'] ?>?sort="+sort;
    }else{
         location.href="<?= $_SERVER['SCRIPT_URI'] ?>";
    }
}
</script>
    </body>
</html>
