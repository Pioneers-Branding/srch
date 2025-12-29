<?php include 'header.php';
if(isset($_GET['cid'])){
    $cid = towreal($_GET['cid']);
    $cat = towquery("SELECT * FROM `tbl_subCategory` WHERE `category_id`=$cid");
    // print_r($cat);
    // exit;
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
             <h3 style="font-weight: bold; color: #FB9A2E; font-size: 22px;">CHOOSE SUB CATEGORIES</h3>
        </div>
        <?php while($f = towfetch($cat)){?>
        <a href="product.php?cid=<?=$f['category_id']?>&csid=<?=$f['id']?>"><div class="col-md-12 col-xs-12" style="border-top: #ccc solid 1px; border-bottom:#ccc solid 1px; padding:9px 0 0px 0; margin-top: 10px;">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-md-8 col-xs-8"><p style="font-size: 14px; font-weight: bold; color: #333;"><?=$f['category']?></p></div>
                    <div class="col-md-4 col-xs-4"><p style="font-size: 14px; font-weight: bold; text-align: right; color: #333;"> <i class="fa fa-angle-right" style="font-size:18px;  color: #333;"></i></p></div>
                </div>
            </div>
            
        </div></a>
        <?php } ?>
    </div>
</div>
        <?php include 'footer.php';?>
    </body>
</html>
