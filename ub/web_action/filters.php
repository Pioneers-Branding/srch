<?php
include 'config.php';
$asset_url =  (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]".'/'; 
if ($_POST["filters"]) {
   
   $cat_id = $_POST['cat_id'];
    $sql = "SELECT * FROM tbl_product ";
    
    if(!empty($_POST["price"]))
    {
       $priceArray=explode(";", $_POST["price"]);
       $from_price=$priceArray[0];
       $to_price=$priceArray[1]; 
       
       $sql.=" WHERE product_price BETWEEN '$from_price' AND '$to_price' ";
    }
    
    if(!empty($_POST["sub_cat_id"]))
    {
        $sub_cat_id = $_POST["sub_cat_id"];
        
        $sql.= empty($_POST["price"]) ? 'WHERE' :'AND';
        
        $sql.="  product_sub_cat='$sub_cat_id' "; 
    }
    
    if(!empty($_POST["brand_id"]))
    {
         $brand_id=explode(',',$_POST["brand_id"]);
         
         $names = implode('\', \'', $brand_id);

         $Ids = "'" . $names . "'";
         
         $sql.= empty($_POST["price"]) && empty($_POST["sub_cat_id"]) ? 'WHERE' :'AND';
         
         $sql.=" brand_fk_id IN ($Ids)";
    }
     
    // print_r($sql);die();
    
    $result = mysqli_query($con,$sql); 

    while($res= mysqli_fetch_assoc($result))
                                        {
                                            
                                            
    $category_array = json_decode($res['product_cat']);
    if(!empty($cat_id)){
    if(!in_array($cat_id,$category_array)){
        
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
                        
                            
                                <img class="img-fluid lazy" src="<?=$asset_url?>admin/assets/<?=$res['featurd_image']?>"
                                        data-src="<?=$asset_url?>admin/assets/<?=$res['featurd_image']?>"
                                        alt="Image Description">
                            
                        
                    </a>
                </div>
                <h5 class="mb-1 product-item__title"><a
href="<?=$asset_url?>product_details.php?product_id=<?=$res['product_pk_id']?>"
class="text-blue font-weight-bold"><?=$res['product_title']?></a>
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
                            <div class="dis-per-sm ml-2">26%
                                off
                            </div>
                        
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
<?php }?>

<?php }


?>