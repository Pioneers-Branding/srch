<?php include 'header.php';
if(isset($_GET['q'])){
    $cid = towreal($_GET['q']);
    $pro = towquery("SELECT * FROM `tbl_product` WHERE `product_title` LIKE '%$cid%'");
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
             <h3 style="font-weight: bold; color: #FB9A2E; font-size: 35px; text-align: center;"><?=$cid?></h3>
        </div>
        
        <div class="col-md-12 col-xs-12" style="padding: 0;">
            <?php while($prof = towfetch($pro)){
                $decode = json_decode($prof['product_image']);
                ?>
                <div class="col-md-6 col-xs-6" style="padding: 7px;">
                 <div class="col-md-12" style="background: #fff; border: #ccc solid 1px; border-radius:  20px; ">
                         <img src="admin/assets/<?=$decode[0]?>" style="width: 100%; height: 120px;">
                        <p style="margin-top: 10px; font-size: 18px; font-weight: bold; text-align: left;"><b><?=$prof['product_title']?></b></p>
                        <p style="margin-top: -10px; margin-bottom:3px; text-align: left;">Buy <?=$prof['product_w']?></p>
                        <p style="text-align: left;">
                            <span style="font-size: 18px; font-weight: bold; text-align: left; color:#999;">Rs <?=$prof['discount']?></span> <span style="text-decoration-line: line-through;font-size: 13.5px; color:ccc; margin-left: 5px;">Rs <?=$prof['product_price']?></span></p>
                        <button style="background: #fea650; padding: 6px 18px; border: none; color: #fff; margin-bottom: 10px;" onclick="add_to_cart(<?=$prof['product_pk_id']?>)" id="add_button_<?=$prof['product_pk_id']?>">ADD TO CART</button>
                        <button style="background: #1d941d; padding: 6px 18px; border: none; color: #fff; display:none; margin-bottom: 10px;" id="added_button_<?=$prof['product_pk_id']?>">ADDED</button>
                    </div>
                </div>
                <?php } ?>
        </div>
        
    </div>
</div>
<?php include 'footer.php';?>
    </body>
</html>
