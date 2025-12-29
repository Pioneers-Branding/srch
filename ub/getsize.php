<?php  include 'config.php';
//echo "Response";
//echo $_POST['selectedcolor'];
if(isset($_POST['selectedcolor'])){
    $color = $_POST['selectedcolor'];
    $product= $_POST['product_id'];
     
     $id_color=towquery("SELECT * FROM `tbl_color` WHERE color_name='$color' OR color_name_fr='$color'");
     $id_fetch=mysqli_fetch_assoc($id_color);
     $id=$id_fetch['color_id'];
     
    $sizes=towquery("SELECT * FROM `tbl_product_variation` left join tbl_size on tbl_product_variation.product_size=tbl_size.size_id left join tbl_color on tbl_product_variation.product_color_id=tbl_color.color_id WHERE tbl_product_variation.product_id='$product' and color_id='$id'");
    
    
    while($sizefetch=mysqli_fetch_assoc($sizes)){
       // print_r($sizefetch);
       ?>
      
       
       <div class="size-box" id="size_box_<?php echo $sizefetch['size_name']; ?>"<?php 
       if($sizefetch['product_quantity']==0){
           ?>
           style="cursor:not-allowed;"
            onclick="return false()"
            title="Out Of Stock"
           <?php
       }else{
           ?>
            onclick="selectSize('<?php echo $sizefetch['size_name']; ?>')"
           <?php
       }
       
       ?>> <?php echo $sizefetch['size_name']; ?></div>
       <?php
             
        }
}
?>