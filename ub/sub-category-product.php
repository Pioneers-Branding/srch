<?php include 'header.php';
if(isset($_GET['cid'])){
    $cid = towreal($_GET['cid']);
    $csid = towreal($_GET['csid']);
    $cat = towquery("SELECT * FROM `tbl_subCategory` WHERE `id`=$csid");
    $cat = towfetch($cat);
    // print_r($cat);
    // exit;

  if(isset($_GET)){
     $query="";
        
        $query = "SELECT * FROM `tbl_product` WHERE `product_cat`=$cid AND product_sub_cat = $csid ";
        if(!empty($_GET['pt'])){
            $query .=" AND type_fk_id = ".$_GET['pt'];
        }if(!empty($_GET['cl'])){
            $query .=" AND color = ".$_GET['cl'];
        }if(!empty($_GET['maxp'])){
            // $productprice= explode("-",$_GET['pr']);
            $query .=" AND discount > ".$_GET['minp']." AND discount < ".$_GET['maxp'] ;
        }if(!empty($_GET['sz'])){
            $query .=" OR size Like ".$_GET['sz'];
        }if(!empty($_GET['st'])){
                 if($_GET['st']==1){
                     $query .= " order by product_price ASC ";
                 }else if($_GET['st']==2){
                     $query .= " order by product_price DESC ";
                 }else{
                     $query .= " order by product_pk_id DESC ";
                 }
        }
    //  echo $query;
        $pro = towquery($query);
    }else{
     $pro = towquery("SELECT * FROM `tbl_product` WHERE `product_cat`=$cid AND product_sub_cat = $csid ");
    }  
}
?>


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://feminineafrica.com/"><?= Home ?></a></li>
    <!--<li class="breadcrumb-item"><a href="#">Library</a></li>-->
    <!--<li class="breadcrumb-item active" aria-current="page">Data</li>-->
    <li class="breadcrumb-item active" aria-current="page"><a href="#"><?= $cat[$category_tilte] ?></a></li>
  </ol>
</nav>

<style>
    .breadcrumb>.breadcrumb-item>a{color: #777 !important; font-size: 13px;}
    
</style>


        <h3 style="text-align: center; font-weight: bold; margin-top: 20px; margin-bottom: 20px;font-family: 'Ubuntu', sans-serif;"><?= $cat[$category_tilte] ?></h3>
        
        
        <div class="container-fluid" style="background: #f8f8f8; padding-top: 20px; margin-bottom: 20px;">
            <div class="row">
                <div class="col-md-2">
                    <form>
 
  <div class="form-group">
    
    <select class="form-control common_selector" id="st" name="st" >
      <option value=""><?= sort_by_relevance ?></option>
      <option value="1" <?php if(isset($_GET['st']) && $_GET['st']=='1'){ echo "selected";} ?> ><?= low_to_high ?></option>
      <option value="2" <?php if(isset($_GET['st']) && $_GET['st']=='2'){ echo "selected";} ?>><?= high_to_low ?></option>
    </select>
  </div>
 
 
</form>
                </div>
                
                 <div class="col-md-2">
                    <form>
 
  <div class="form-group">
    
    <select class="form-control common_selector" id="pt" name="pt">
      <option value=""><?= product_type ?></option>
      <?php while($pt = towfetch($productType)){ ?>
             <option value="<?= $pt['id']?>" <?php if(isset($_GET['pt']) && $_GET['pt']==$pt['id']){ echo "selected";} ?>><?= $pt[$title_field] ?></option>
     <?php  } ?>
      ?>
</select>
  </div>
 
 
</form>
                </div>
                
<!--                 <div class="col-md-2">-->
<!--                    <form>-->
 
<!--  <div class="form-group">-->
    
<!--    <select class="form-control" id="exampleFormControlSelect1">-->
<!--      <option>Style</option>-->
<!--      <option>2</option>-->
<!--      <option>3</option>-->
<!--      <option>4</option>-->
<!--      <option>5</option>-->
<!--    </select>-->
<!--  </div>-->
 
 
<!--</form>-->
<!--                </div>-->
                
                 <div class="col-md-2">
                    <form>
 
  <div class="form-group">
    
    <select class="form-control common_selector" id="cl" name="cl">
      <option value=""><?= color ?></option>
      <?php while($pc = towfetch($productColor)){ ?>
             <option value="<?= $pc['color_id']?>" <?php if(isset($_GET['cl']) && $_GET['cl']== $pc['color_id']){ echo "selected";} ?>><?= $pc[$color_title] ?></option>
     <?php  } ?>
      ?>
    </select>
  </div>
 
 
</form>
                </div>
                
                 <div class="col-md-2">
                    <form>
 
  <div class="form-group">
    
    <select class="form-control common_selector" id="sz" name="sz">
      <option value=""><?= size ?></option>
     <?php while($ps = towfetch($productSize)){ ?>
             <option value="<?= $ps['size_id']?>" <?php if(isset($_GET['sz']) && $_GET['sz']== $ps['size_id']){ echo "selected";} ?>><?= $ps[$size_title] ?></option>
     <?php  } ?>
      ?>
    </select>
  </div>
 
 
</form>
                </div>
                
<!--                 <div class="col-md-2">-->
<!--                    <form>-->
 
<!--  <div class="form-group">-->
    
<!--    <select class="form-control common_selector" id="pr" name="pr">-->
<!--      <option value="">Price Range</option>-->
<!--      <option value="0-99" <?php if(isset($_GET['pr']) && $_GET['pr']=='0-99'){ echo "selected";} ?>>$0 - $99</option>-->
<!--      <option value="100-199" <?php if(isset($_GET['pr']) && $_GET['pr']=='100-199'){ echo "selected";} ?>>$100 - $199</option>-->
<!--      <option value="200-499" <?php if(isset($_GET['pr']) && $_GET['pr']=='200-499'){ echo "selected";} ?>>$200 - $499</option>-->
<!--      <option value="500-999" <?php if(isset($_GET['pr']) && $_GET['pr']=='500-999'){ echo "selected";} ?>>$500 - $999</option>-->
<!--      <option value="1000-4999" <?php if(isset($_GET['pr']) && $_GET['pr']=='1000-4999'){ echo "selected";} ?>>$1000 - $4999</option>-->

<!--    </select>-->
<!--  </div>-->
 
 
<!--</form>-->

<!--                </div>-->
                
                <div class="col-md-2">
                <form>
                <div class="form-group">
                <!--<h3>Price Range</h3>-->
                <input type="hidden" id="minp" name="minp" value="<?= isset($_GET['minp'])?$_GET['minp'] :0 ?>" class="form-control common_selector" />
                <input type="hidden" id="maxp" name="maxp" value="<?= isset($_GET['maxp'])?$_GET['maxp'] :10000 ?>" class="form-control common_selector" />
                <p id="price_show">$<?= isset($_GET['minp'])?$_GET['minp'] :0 ?> - $<?= isset($_GET['maxp'])?$_GET['maxp'] :10000 ?></p>
                <div id="price_range" class="common_selector"></div>
                </div> 
                </form>
            </div>
            </div>
  
        </div>
        
        <p style="text-align: center; font-size: 14px;" ><?= $pro->num_rows ?> styles found</p>
        
        
        
        <div class="container-fluid" style="margin-bottom: 30px; margin-top: 20px;">
            <div class="row">
                 <?php $uid = (isset($_SESSION['userId']))?$_SESSION['userId']:""; 
                    while($prof = towfetch($pro)){
                $decode = json_decode($prof['product_image']);
                ?>
            <div class="col-md-3">
                  <p  onclick="addtoWishlists(<?= $prof['product_pk_id'] ?>);"   title="Add To Wishlist"><i class="fa fa-heart" id="fa-heart<?= $prof['product_pk_id'] ?>" style="color:<?php echo (is_wishlisted($prof['product_pk_id'],$uid))?"red":"black";?>"></i></p>
             <a href="product-detail.php?pid=<?=$prof['product_pk_id']?>">
                    <!--<img src="admin/assets/<?=$decode[0]?>" style="width: 100%;">-->
                    <img src="admin/assets/<?= $prof['featurd_image']?>" style="width: 100%;">
                <p style=" text-align: left; color: #000; margin-top: 12px; font-size: 12px;"><?=$prof[$product_tilte]?></p>
                 <p style=" text-align: left; color: #000; margin-top: 6px; font-size: 15px; font-weight: bold;font-family: 'Ubuntu', sans-serif;"><?php echo currency_code(); ?><?= currency_price($prof['discount']) ?></span> <span style="text-decoration-line: line-through;font-size: 13.5px; color:ccc; margin-left: 5px;">aaaaaa<?php echo currency_code(); ?><?= currency_price($prof['product_price']) ?></span></p>
            </a>
            </div>
                <?php } ?>
           
        </div> </div>
	<!-- //banner -->

<script>
function filter_data(page){
    
        let st= $('#st').val();
        let pt= $('#pt').val();
        let cl= $('#cl').val();
        let sz= $('#sz').val();
        // let pr= $('#pr').val();
        var minp = $('#minp').val();
        var maxp = $('#maxp').val();
         location.href="<?= $_SERVER['SCRIPT_URI'] ?>?cid="+<?= $_GET['cid'] ?>+"&csid="+<?= $_GET['csid'] ?>+"&st="+st+"&pt="+pt+"&cl="+cl+"&sz="+sz+"&minp="+minp+"&maxp="+maxp;
    }
  
var minp = $('#minp').val();
var maxp = $('#maxp').val();    
    $('#price_range').slider({
        range:true,
        min:0,
        max:10000,
        values:[minp,maxp],
        step:10,
        stop:function(event, ui)
        {
            $('#price_show').html('$'+ui.values[0] + ' - ' +'$'+ui.values[1]);
            $('#minp').val(ui.values[0]);
            $('#maxp').val(ui.values[1]);
            filter_data(1);
        }

    });
    
    $('.common_selector').change(function(){
        filter_data(1);
    });

</script>
<?php include 'footer.php';?>