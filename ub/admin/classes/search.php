<?php 
   ob_start();
    session_start();
    require_once "classMaster.php";   
    $core_control_oj = new classMaster();
      $db= new dbconfig();
      
     $search = isset($_POST['search']) && !empty($_POST['search']) ? $_POST['search'] : '';
        $row = '';
        if($search!= ''){
           $product="SELECT * FROM `tbl_product` WHERE product_title LIKE '%$search%' or product_title_fr LIKE '%$search%'";
           $query = $db->dbperform("select *  from `tbl_product` Where product_title LIKE '%$search%' ");
        //   $db3 = mysqli_connect("localhost", "akwabaformula_electro", "B0PP?CEszIEl", "akwabaformula_electro");
        //   $res = mysqli_query($db3,$product);
           
           while($prof = mysqli_fetch_array($query)){
                $decode = json_decode($prof['product_image']); ?>
                <div class="product">
                    <p style="margin-top: 10px; font-size: 18px; font-weight: bold; text-align: left;">
                           <!--<a href="product-detail.php?pid=<?=$prof['product_pk_id']?>">-->
                           <a href="https://feminineafrica.ci/<?=$prof['product_url']?>">
                             <b><?=$prof['product_title']?></b></a>
                            </p>
                </div>
              <!--<div class="item" style="width: 100%; height: 100px;">-->
              <!--      <div class="pad15" style="background: #fff; border: #ccc solid 1px; border-radius:  20px;">-->
                         <!--<a href="product-detail.php?pid=<?=$prof['product_pk_id']?>">-->
                         <!--    <img src="admin/assets/<?=$decode[0]?>" style="width: 100%; height: 230px;">-->
                         <!--    </a>-->
              <!--          <p style="margin-top: 10px; font-size: 18px; font-weight: bold; text-align: left;">-->
              <!--             <a href="product-detail.php?pid=<?=$prof['product_pk_id']?>">-->
              <!--               <b><?=$prof['product_title']?></b></a>-->
              <!--              </p>-->
                        <!--<p style="margin-top: -10px; margin-bottom:3px; text-align: left;">Buy <?=$prof['product_w']?></p>-->
                        <!--<p style="text-align: left;">-->
                        <!--    <span style="font-size: 22px; font-weight: bold; text-align: left; color:#999;">Rs <?=$prof['discount']?></span> <span style="text-decoration-line: line-through;font-size: 17.5px; color:ccc; margin-left: 5px;">Rs <?=$prof['product_price']?></span></p>-->
                        <!--<button style="background: #fea650; padding: 8px 20px; border: none; color: #fff;" onclick="add_to_cart(<?=$prof['product_pk_id']?>)" id="add_button_<?=$prof['product_pk_id']?>">ADD TO CART</button>-->
                        <!--<button style="background: #1d941d; padding: 8px 20px; border: none; color: #fff; display:none;" id="added_button_<?=$prof['product_pk_id']?>">ADDED</button>-->
              <!--      </div>-->
              <!--  </div>-->
          <?php }
        }
    //check Product
        if(isset($_POST['product_title']) && !empty($_POST['product_title'])){
            $product = trim($_POST['product_title']);
             $query = $db->dbperform("select *  from `tbl_product` Where product_title='$product' ");
               if($query->num_rows > 0 ){
                   echo $query->num_rows;
               }else{
                   echo 0;
               } 
        }
        
        
        if(isset($_POST['child_category']) && !empty($_POST['child_category'])){
            $product = trim($_POST['child_category']);
            $subcategory=$_POST['subcategory'];
             $query = $db->dbperform("select *  from `tbl_childcategory` Where child_category='$product' And product_sub_cat='$subcategory' ");
               if($query->num_rows > 0 ){
                   echo $query->num_rows;
               }else{
                   echo 0;
               } 
        } 
    ?>