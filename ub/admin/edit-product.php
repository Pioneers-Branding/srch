<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
       $core_control_oj = new classMaster();
   }
   else{
       header("location:login");
   }
       
         $db=new dbconfig();
         $id=intval($_GET['product']);
         $result = $db->dbperform("select * from tbl_product  where product_pk_id='$id' ");
          $row=$result->fetch_assoc();
          $resultext  = $db->dbperform("select * from tbl_post_extra Where post_extr_id='$id' AND post_tbl='product'" );
         $rowext =$resultext->fetch_assoc();
        // print_r($row);
   
   if($_SERVER['REQUEST_METHOD']=='POST' && isset( $_POST['update_btn'] ) ){
        
       //   SEO CONTENT
$meta_title_en = isset($_POST['meta_title_en'])?$db->get_safe_str($_POST['meta_title_en']):'';
$meta_title_fr = isset($_POST['meta_title_fr'])?$db->get_safe_str($_POST['meta_title_fr']):'';

$meta_description_en = isset($_POST['meta_description_en'])?$db->get_safe_str($_POST['meta_description_en']):'';
$meta_description_fr = isset($_POST['meta_description_fr'])?$db->get_safe_str($_POST['meta_description_fr']):'';

$meta_keywords_en = isset($_POST['meta_keywords_en'])?$db->get_safe_str($_POST['meta_keywords_en']):'';
$meta_keywords_fr = isset($_POST['meta_keywords_fr'])?$db->get_safe_str($_POST['meta_keywords_fr']):'';

$post_tbl = 'product';

    //Product Deatils
         $file_name=array();
           
        for($x=0; $x<count($_FILES["u_product_image"]["tmp_name"]); $x++ ) {
        
        $file_name[$x] = $_FILES['u_product_image']['name'][$x];
        
        move_uploaded_file($_FILES['u_product_image']['tmp_name'][$x],"../admin/assets/".$_FILES['u_product_image']['name'][$x]);
                    
        }
        $image=json_encode($file_name);
        if(isset($_FILES['featurd_image']['tmp_name']) && !empty($_FILES['featurd_image']['tmp_name'])){
                $featurd_imagesourcePath = $_FILES['featurd_image']['tmp_name'];
                $featurd_image = $_FILES['featurd_image']['name'];
            	$featurd_imagetargetPath = "assets/" . $featurd_image;
            	move_uploaded_file($featurd_imagesourcePath, $featurd_imagetargetPath);
        }else{
            	$featurd_image = $_POST['featurd_image_name'];
        }
        $product_title = $_POST['u_product_title'];
        $product_title_fr = $db->get_safe_str($_POST['u_product_title_fr']);
        
        $product_price = $_POST['u_product_price'];
        
        $product_desc = $_POST['u_product_desc'];
        $product_desc_fr = $_POST['u_product_desc_fr'];

        // $p_post_title = $_POST['p_post_title'];
        $categories=array();
           
        for($c=0; $c<count($_POST['p_post_title']); $c++) {
            $categories[$c] = $_POST['p_post_title'][$c];
        }
        $cat=json_encode($categories);
        
        $subcategories=array();
           
            for($c=0; $c<count($_POST['p_post_title2']); $c++) {
                $subcategories[$c] = $_POST['p_post_title2'][$c];
            }
            $p_post_title2=json_encode($subcategories);
            
            
            $childcategories=array();
           
            for($c=0; $c<count($_POST['p_post_title3']); $c++) {
                $childcategories[$c] = $_POST['p_post_title3'][$c];
            }
            $p_post_title3=json_encode($childcategories);
            
            
        
            // $p_post_title2 = $_POST['p_post_title2'];
            // $p_post_title3 = $_POST['p_post_title3'];
            
            
            $subcatName = "";
           $subCat = $db->dbperform("select category from tbl_category Where cat_pk_id='$p_post_title' ");
                if($subCat->num_rows > 0){
                    $subcat = $subCat->fetch_assoc();
                        $subcat_titleUrl = preg_replace(array(
                            '/[^a-zA-Z0-9 -]/',
                            '/[ -]+/',
                            '/^-|-$/'
                        ) , array(
                            '',
                            '-',
                            ''
                        ) , $subcat['category']);
                    $subcatName = $subcat_titleUrl."/";
                    
                }
                
            $product_titleUrl = preg_replace(array(
                '/[^a-zA-Z0-9 -]/',
                '/[ -]+/',
                '/^-|-$/'
            ) , array(
                '',
                '-',
                ''
            ) , $product_title);

            $url = strtolower($subcatName.$product_titleUrl);

            $best_deal = $_POST['best_deal'];
            $brand = $_POST['brand']!=''? $_POST['brand']:'';
            $product_keyword = $_POST['product_keyword'];
            $discount = $_POST['discount'];
            $product_gst = $_POST['product_gst'];
            $product_varient = $_POST['product_varient'];
            $product_w = $_POST['product_w'];
            $product_sc = $_POST['product_sc'];
            $offerProduct=$_POST['offerProduct'];
            $stockProduct=$_POST['inStock'];
            $stockQuantity = $_POST['stockQuantity'];
            $productType= $_POST['productType'];
   
   //update tbl_product
            $db->dbperform("DELETE FROM tbl_product_variation WHERE product_id='$id'");
            if( isset( $_FILES['u_product_image'] ) && $_FILES['u_product_image']['tmp_name'][0]!=''  ){
                    $db->dbperformm("update tbl_product set `product_cat`='$cat',`product_sub_cat`='$p_post_title2',`product_child_cat`='$p_post_title3',`brand_fk_id`='$brand',`best_deal`='$best_deal',`product_title`='$product_title', `product_title_fr`='$product_title_fr', `product_url`='$url',  `product_image`='$image', `product_price`='$product_price',`discount`='$discount',`product_gst`='$product_gst' ,`product_varient`='$product_varient',`product_desc`='$product_desc',`product_desc_fr`='$product_desc_fr',  
        
                            `product_keyword`='$product_keyword',`product_w`='$product_w',`product_sc`='$product_sc' ,`weight_price`='$weightPrice', `offer_product`='$offerProduct', `product_stock`='$stockProduct',`featurd_image`='$featurd_image',`stock_quantity`='$stockQuantity',`type_fk_id`='$productType' where product_pk_id='$id'");
            }else if( isset( $_FILES['featurd_image']['name']) && !empty($_FILES['featurd_image']['name'])  ){
                    $db->dbperformm("update tbl_product set `product_cat`='$cat',`product_sub_cat`='$p_post_title2',`product_child_cat`='$p_post_title3',`brand_fk_id`='$brand',`best_deal`='$best_deal',`product_title`='$product_title', `product_title_fr`='$product_title_fr', `product_url`='$url', `product_price`='$product_price',`discount`='$discount',`product_gst`='$product_gst' ,`product_varient`='$product_varient',`product_desc`='$product_desc',`product_desc_fr`='$product_desc_fr',  
                    `product_keyword`='$product_keyword',`product_w`='$product_w',`product_sc`='$product_sc' ,`weight_price`='$weightPrice', `offer_product`='$offerProduct', `product_stock`='$stockProduct', `featurd_image`='$featurd_image',`stock_quantity`='$stockQuantity',`type_fk_id`='$productType' where product_pk_id='$id'");
            } else{
                    $db->dbperformm("update tbl_product set `product_cat`='$cat',`product_sub_cat`='$p_post_title2',`product_child_cat`='$p_post_title3',`brand_fk_id`='$brand',`best_deal`='$best_deal',`product_title`='$product_title', `product_title_fr`='$product_title_fr',  `product_url`='$url', `product_price`='$product_price',`discount`='$discount',`product_gst`='$product_gst' ,`product_varient`='$product_varient',`product_desc`='$product_desc', `product_desc_fr`='$product_desc_fr',
        
                        `product_keyword`='$product_keyword' ,`product_w`='$product_w',`product_sc`='$product_sc' ,`offer_product`='$offerProduct' , `product_stock`='$stockProduct',`stock_quantity`='$stockQuantity',`weight_price`='$weightPrice',`type_fk_id`='$productType' where product_pk_id='$id'");
            }   
            
            
          //   post extra
        $metaPost =   $db->dbperform("Select * from tbl_post_extra Where post_extr_id='$id' and post_tbl='$post_tbl' ");
            if($metaPost->num_rows > 0){
                $db->dbperformm("update tbl_post_extra set `post_tbl`='$post_tbl',`meta_title_en`='$meta_title_en',`meta_title_fr`='$meta_title_fr',`meta_description_en`='$meta_description_en', `meta_description_fr`='$meta_description_fr',`meta_keywords_en`='$meta_keywords_en' ,`meta_keywords_fr`='$meta_keywords_fr' where post_extr_id='$id' AND post_tbl='$post_tbl' ");
             }else{
                 $db->dbperformm("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$id','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");   
            } 
           
             foreach($_POST['color_name'] as $key => $value) 
            {
                 
                $colorname= $_POST['color_name'][$key];
                $quantityv= $_POST['product_vquantity'][$key];
                $sizearr= $_POST['cmsize'][$key];
               
                 $db->dbperformm("INSERT INTO `tbl_product_variation`(`product_id`, `product_color_id`, `product_size`, `product_quantity`) VALUES ('$id','$colorname','$sizearr' ,'$quantityv')");
                
}
   ?>
   <script>
       alert('Product Update Successfully');
       window.location.href='view-product';
   </script>
   <?php 
   }
   ?>
<!-- BEGIN: Header-->
<?php include("includes/header.php"); ?>

<!-- BEGIN: Main Menu-->
<?php   include("includes/aside.php"); ?>

<!-- BEGIN: Content-->

        <div class="app-content content">
         <div class="content-overlay"></div>
         <div class="content-wrapper">
            <div class="content-header row">
               <div class="content-header-left col-md-6 col-12 mb-2">
                  <h3 class="content-header-title mb-0">Edit Product</h3>
                  <div class="row breadcrumbs-top">
                  </div>
               </div>
            </div>
            <div class="content-body">
               <!-- Basic form layout section start -->
               <section id="basic-form-layouts">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-content collpase show">
                              <div class="card-body">
                                   <form role="form" method="post" id="product_form" enctype="multipart/form-data">
                <div class="card-body ">
                     <div class="row col-md-12">

                     <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Product Category</label>
                    <select name="p_post_title[]" class="form-control" id="p_post_title"  multiple>
                       
                       <?php 
                       $query = $db->dbperform("select * from `tbl_category` WHERE cat_parent = 0 and cat_status='1'");

        if ($query->num_rows > 0)
        {
            $categories = str_replace( array('[',']','"') , ''  , $row['product_cat']);
            $categories = explode(",",$categories);
            echo '<option value="">--Select--</option>';
            while ($rowa = $query->fetch_assoc())
            {
                 echo '<option value="' . $rowa['cat_pk_id'] . '"'; foreach ($categories as $category) { if($category == $rowa['cat_pk_id'])echo 'selected';} echo ' >' . $sub_mark . $rowa['category'] . '</option>'; 
            }
        }
                       ?>
 
                        </select>
                  </div>
              

                     <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Product Sub Category </label>
                    <select name="p_post_title2[]" class="form-control" id="p_post_title2" multiple>
                        <?php
                        $query = $db->dbperform("select * from `tbl_subCategory` WHERE cat_parent = 0 and cat_status='1'");
                        ?><?=$row['product_title'];?>
                        <!--<option value="">Select</option>-->
                    
                    <?php
                    $querysubCat = $db->dbperform("select * from `tbl_subCategory` ");
                            if ($querysubCat->num_rows > 0){
                                
                                $subcategories = str_replace( array('[',']','"') , ''  , $row['product_sub_cat']);
                                $subcategories = explode(",",$subcategories);
                                
                                 while ($rowcat = $querysubCat->fetch_assoc()){
                            echo '<option value="' . $rowcat['id'] . '"';foreach ($subcategories as $category) { if($category == $rowcat['id'])echo 'selected';} echo ' >'.$rowcat['category'] . '</option>';
                            } }
                            ?>
                    </select>
                  </div>
                  </div>
                  <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Child Category </label>
                                    <select name="p_post_title3[]" class="form-control" id="p_post_title3" multiple>
                                        <option value="" >First Select SubCategory</option>
                                        <?php
                    $querychildCat = $db->dbperform("select * from `tbl_childcategory` ");
                            if ($querychildCat->num_rows > 0){
                                
                                $childcategories = str_replace( array('[',']','"') , ''  , $row['product_child_cat']);
                                $childcategories = explode(",",$childcategories);
                                
                                 while ($rowchild = $querysubCat->fetch_assoc()){
                            echo '<option value="' . $rowchild['child_pk_id'] . '"';foreach ($childcategories as $category) { if($category == $rowchild['child_pk_id'])echo 'selected';} echo ' >'.$rowchild['child_category'] . '</option>';
                            } }
                            ?>
                                        
                                    </select>
                                 </div>
                     <div class="row col-md-12">
 
                  <div class="form-group col-md-6" style="display:none;">
                    <label for="exampleInputEmail1">Add To Best Deal ? </label>
                    <select name="best_deal" class="form-control" id="best_deal"  >
                    <option value='1' <?=$row['best_deal']=='1' ? 'selected':'';?>>Yes</option>   
                    <option value='0' <?=$row['best_deal']=='0' ? 'selected':'';?>>No</option>   

                    </select>
                  </div>
                     <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Select Brand </label>
                    <select name="brand" class="form-control" id="brand" >
                    
                    <option value=''> --- Select---</option>
                       <?php
                      // $core_control_oj->displayBrand(); 
                            $queryBrand = $db->dbperform("select * from `tbl_brand` WHERE  brand_status='1'");
                            if ($queryBrand->num_rows > 0){
                                 while ($rowb = $queryBrand->fetch_assoc()){
                            echo '<option value="' . $rowb['brand_id'] . '"'; echo  $rowb['brand_id']==$row['brand_fk_id'] ? 'selected':''; echo ' >'.$rowb['brand_name'] . '</option>';
                            } }
                            ?>
                        </select>               
                  </div>
                   
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Product Type</label>
                    <select name="productType" class="form-control" id="productType" >
                    
                    <option value=''> --- Select---</option>
                       <?php
                      // $core_control_oj->displayBrand(); 
                            $queryType = $db->dbperform("select * from `tbl_productType` WHERE  post_status='1'");
                            if ($queryType->num_rows > 0){
                                 while ($rowt = $queryType->fetch_assoc()){
                            echo '<option value="' . $rowt['id'] . '"'; echo  $rowt['id']==$row['type_fk_id'] ? 'selected':''; echo ' >'.$rowt['post_title'] . '</option>';
                            } }
                            ?>
                        </select>               
                  </div>
                   
                  </div>
                   <div class="row col-md-12" style="display:none;">
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Product Gst</label>
                    <input type="text" name="product_gst" class="form-control" value="<?=$row['product_gst'];?>"  id="product_gst" >
                  </div>
                     <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Add Keywords </label>
                      <textarea name="product_keyword" class="form-control" id="product_keyword" ><?=$row['product_keyword'];?></textarea>
                    </select>
                  </div>
                  </div>
              <div class="row col-md-12">
 
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Product Name(English)</label>
                    <input type="text" name="u_product_title" class="form-control" value="<?=$row['product_title'];?>" id="u_product_title" required>
                  </div>
                  <!-- <div class="form-group col-md-6">-->
                  <!--  <label for="exampleInputEmail1">Product Name(french)</label>-->
                  <!--  <input type="text" name="u_product_title_fr" class="form-control" value="<?=$row['product_title_fr'];?>" id="u_product_title_fr" required>-->
                  <!--</div>-->
                     <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Featured Image</label>
                                    <input type="file" name="featurd_image" class="form-control" id="featurd_image"  >
                                    <input type="hidden" name="featurd_image_name" value="<?=$row['featurd_image'];?>" class="form-control" id="featurd_image"  >
                                 </div>
                                 
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Gallery Image</label>
                    <input type="file" name="u_product_image[]" class="form-control" id="u_product_image"  multiple>
                    <div style="display: flex;margin-top: 10px">
                        <?php
                            $images = str_replace( array('[',']','"') , ''  , $row['product_image'] );
                            $images = explode(",",$images);
                            foreach ($images as $image) { ?>
                                <div style="position:relative;margin-right:10px">
                                    <img src="https://feminineafrica.com/admin/assets/<?=$image?>" style="max-height:200px;">
                                    <p style="position:absolute;top:5px;right:10px;cursor:pointer;font-weight:bold" onclick="remove('<?=$image?>')">x</p>
                                </div>
                            <?php }
                        ?>
                    </div>
                  </div>
                  </div>
             <div class="row col-md-12">

                
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Product Discounted Price</label>
                      <input type="text" name="u_product_price" class="form-control" value="<?=$row['product_price'];?>" id="u_product_price">
                  </div>
                </div>
                    <div class="row col-md-12">
                    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Product Price</label>
                      <input type="text" name="discount" value="<?=$row['discount'];?>" class="form-control" id="discount" required >
                  </div>
                  <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Weight(In KG)</label>
                                    <input type="text" name="product_w" class="form-control"  value="<?=$row['product_w'];?>" id="product_w" >
                                 </div>
                    <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Shown Home</label>
                                    &nbsp;<input type="checkbox" name="offerProduct" value="1" <?php if($row['offer_product']==1){ echo "checked"; } ?> id="offerProduct">
                                 </div>  
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Stock Quantity</label>
                                    <input type="text" name="stockQuantity" class="form-control" value="<?= $row['stock_quantity'] ?>" id="stockQuantity">
                                 </div>
                      <div class="form-group col-md-6" style="display:none;">
                                    <label for="exampleInputEmail1">Product In Stock</label>
                                   <select name="inStock" class="form-control">
                                       <option value="">---Select Product Stock---</option>
                                       <option value="1"  <?php if($row['product_stock']==1){ echo "selected"; } ?>>In Stock</option>
                                       <option value="0"  <?php if($row['product_stock']==0){ echo "selected"; } ?>>Out of Stock</option>
                                   </select>
                                 </div>                 
                 <div class="form-group col-md-6" style="display:none;">
                    <label for="exampleInputEmail1">Product Varient ( color )</label>
                      <input type="text" name="product_varient" value="<?=$row['product_varient'];?>" class="form-control" id="product_varient" >
                  </div>
                 
                </div>
                               <div class="row col-md-12">
                                 <!--<div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Weight</label>
                                    <input type="text" name="product_w" class="form-control"  value="<?=$row['product_w'];?>" id="product_w" >
                                 </div>-->
                                 <!--<div class="form-group col-md-6">-->
                                 <!--   <label for="exampleInputEmail1">Product Shipping Charge</label>-->
                                 <!--   <input type="text" name="product_sc" class="form-control"  value="<?=$row['product_sc'];?>" id="product_sc" >-->
                                 <!--</div>-->
                              </div>
                              
                <div class="row col-md-12">
               
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Product Short Description</label>
                      <textarea name="u_product_short_desc" class="form-control" id="u_product_short_desc" ><?=$row['product_short_desc'];?></textarea>
                  </div>
                </div>
                <div class="row col-md-12">
               
                  <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Product Description(English)</label>
                      <textarea name="u_product_desc" class="form-control" id="u_product_desc" ><?=$row['product_desc'];?></textarea>
                  </div>
                </div>
                  
                <!-- /.card-body -->
                
<!--                <label>Seo Content</label>-->
<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta title(English)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_title_en" value="<?=$rowext['meta_title_en'];?>" placeholder="enter meta title" />-->
<!--</div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta title(French)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_title_fr" value="<?=$rowext['meta_title_fr'];?>" placeholder="enter meta title" />-->
<!--</div>-->
<!--</div>-->


<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Description(English)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_description_en" value="<?=$rowext['meta_description_en'];?>" placeholder="enter meta Description	" />-->
<!--</div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Description(French)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_description_fr" value="<?=$rowext['meta_description_fr'];?>" placeholder="enter meta Description" />-->
<!--</div>-->
<!--</div>-->


<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Keywords(English)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_keywords_en" value="<?=$rowext['meta_keywords_en'];?>" placeholder="enter meta Keywords" />-->
<!--</div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Keywords(French)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_keywords_fr" value="<?=$rowext['meta_keywords_fr'];?>" placeholder="enter meta Keywords" />-->
<!--</div>-->
<!--</div>                -->
                
                               <div class="row col-md-12">
                                 <div class="form-group col-md-12">
                                            <table class="table-condensed pad-zero">
                                        <thead class="thead-inverse">
                                           <tr>
                                              <th>Color</th>
                                              <th>Quantity</th>
                                                <th>Size</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tblBody" class="tbody-inverse">
                                            <?php 
                                          $queryVar = $db->dbperform("SELECT * FROM `tbl_product_variation` left join tbl_size ON tbl_product_variation.product_size=tbl_size.size_id LEFT JOIN tbl_color ON tbl_product_variation.product_color_id=tbl_color.color_id WHERE product_id='$id'");
                            if ($queryVar->num_rows > 0){
                                 while ($rowvar = $queryVar->fetch_assoc()){
                                            ?>
                                            
                                            <tr class="new-data">
                                               <td><div class="form-group">
                                                   <select name="color_name[]" class="form-control qlt_box1" style="font-size:12px; max-width:120px; width:100%;"><option value="<?php echo $rowvar['product_color_id'];?>" selected > <?php echo $rowvar['color_name']; ?> </option>
                                                       
                                                           <?php $core_control_oj->displayColor(); ?>
                                                      
                                                   </select>
                                                   </div></td>
                                               <td><div class="form-group"><input class="form-control quanty" placeholder="Product Quantity" value="<?php echo $rowvar['product_quantity'];?>" required="required" type="text" name="product_vquantity[]" ></div></td>
                                               <td><div class="form-group">
                                                   <select name="cmsize[]" class="form-control qlt_box1" style="font-size:12px; max-width:120px; width:100%;"><option value="<?php echo $rowvar['product_size'];?>" selected > <?php echo $rowvar['size_name']; ?> </option>
                                                       
                                                           <?php $core_control_oj->displaySizeDropdown(); ?>
                                                      
                                                   </select>
                                                   </div></td>
                                                    <td>
                    <a href="" class="btn-sm btn-danger remove_row" style="padding: 6px 0px; width: 100%; text-align: center; display: block;">Remove </a></td>
                                                <!--<td><div class="form-group"> //echo $core_control_oj->displayMultipeSize("1"); </div></td>-->
                                            </tr>
                                            <?php } } ?> 
                                        </tbody>
                                        <tfoot> 
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><a href="javascript:;" class="btn-sm btn-primary add_row" >Add More</a></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                     </div>
                                 </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary " name="update_btn" style="float: right;">Submit</button>
                </div>
                </div>
                </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!-- // Basic form layout section end -->
            </div>
         </div>
      </div>
  
<!-- END: Content-->
 <script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
  <script>
  
  
    $("#p_post_title").on('change',(function(e){
        
    var p_post_title=$("#p_post_title").val();
    var include_ref='ref';
    $.ajax({
    url: "classes/control.php",
    data: { p_post_title:p_post_title,include_ref:include_ref },
    method:"POST",
    success: function(data){
    if(data!==''){
    $("#p_post_title2").html(data);
    }
    }
    });
    }));
    
     //Check Product 
        $('#u_product_title').on('change',(function(e){
                var pr = $(this).val();
                var include_ref='product';
                $.ajax({
                     url: "classes/search.php",
                     data: { product_title:pr,include_ref:include_ref },
                     method:"POST",
                     success: function(data){
                     if(data > 0 ){
                         alert('Product name Allready Exist');
                       $("#u_product_title").val('');
                    }
         }
         });
        }));
        
        
 $("#p_post_title2").on('change',(function(e){
         var p_post_title2=$("#p_post_title2").val();
         
        //  alert(p_post_title);
         var include_child='ref';
         $.ajax({
         url: "classes/control.php",
         data: { p_post_title2:p_post_title2,include_child:include_child },
         method:"POST",
         success: function(data){
             console.log(data);
         if(data!==''){
         $("#p_post_title3").html(data);
         }
         }
         });
         }));
         
         $(document).ready(function(){
         var p_post_title2=$("#p_post_title2").val();
         var product_id="<?=$_GET['product']?>";
        //  alert(p_post_title);
         var include_child='ref';
         $.ajax({
         url: "classes/control.php",
         data: { p_post_title2:p_post_title2,include_child:include_child,product_id:product_id },
         method:"POST",
         success: function(data){
             console.log(data);
         if(data!==''){
         $("#p_post_title3").html(data);
         }
         }
         });
         });
        
</script>
<script type="text/javascript">
      function addMoreFields(){
         var counterValue =  $("#appendValue").val();
         $.ajax({
         url: "moreFieldsAjax.php",
         type: "POST",
         data:  $.param( {counterValue:counterValue} ),
         success: function(data){
         if(data!==''){
         $("#appendDiv").append(data);
         counterValue++;
         $("#appendValue").attr('value',counterValue);
         }
         }
             
         }); 
      }
      </script>
        <script>
$(document).ready(function(){
    var count = $('#spcount').val();
    $(".add_row").click(function(ev){
        ev.preventDefault();
            count++;
        $.ajax({
              type: "POST",
              url: "classes/appendPrice.php",
              data: {pr:count},
              success: function(res){
                    console.log(res);
                  $('#tblBody').append(res);
              }
        });
     });


$(document).on("click",".remove_row",function(ev){
	ev.preventDefault();
	debugger;
 $(this).closest('.new-data').remove();
	
});
});
</script>
<script>
CKEDITOR.replace( 'u_product_desc' );
CKEDITOR.replace( 'u_product_desc_fr' );
</script>
<script>
    function remove(image){
        $.ajax({
                 url: "classes/product.php",
                 data: {image:image, id: <?=$_GET['product']?>},
                 method:"POST",
                 success: function(resp){
                     if(resp == 'success' ){
                         location.reload();
                    } else {
                        alert('Something went wrong');
                    }
                }
         });
    }
</script>
 <script>
      $(document).on("change",".quanty",function(){
         var stock = 0;
         $(".quanty").each(function(){
             stock += +$(this).val();
         });
         
         $("#stockQuantity").val(stock);
      });
      
      
      
      $(document).ready(function(){
             
         var p_post_title=$("#p_post_title").val();
         var product_id="<?=$_GET['product']?>";
          
        //  alert(p_post_title);
         var include_ref='ref';
         $.ajax({
         url: "classes/control.php",
         data: { p_post_title:p_post_title,include_ref:include_ref,product_id:product_id },
         method:"POST",
         success: function(data){
             console.log(data);
         if(data!==''){
         $("#p_post_title2").html(data);
         }
         }
         });
         
         });
   </script>   
<?php   include("includes/footer.php"); ?>
