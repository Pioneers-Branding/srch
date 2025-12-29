<?php 
   ob_start();
    //session_start();
    require_once "classMaster.php";   
    $core_control_oj = new classMaster();
	
     $id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : '';
       if($id){
       	$link1 = mysqli_connect("localhost", "akwabaformula_electro", "B0PP?CEszIEl", "akwabaformula_electro");
        if(!$link1 == true) {
            echo "database1 Connected Successfully";
        }
	   // Check for connection

		// Connection of Second database

		$databasehostname="101.53.132.70";
		$databaseuserid = "tbiindia_tycoon";
		$databasepassword ="Bhopal@321";
		$databasename ="tbiindia_tycoonsretails";

		$link2 = mysqli_connect($databasehostname, $databaseuserid, $databasepassword, $databasename);
		// Check for connection
		if(!$link2 == true) {
            	echo "database2 Connected Successfully";
            }


$tblId = array();
$sql = "SELECT tbiindia_productId FROM tbl_product";
$result = $link1->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $tblId[] = $row["tbiindia_productId"];
  }
}
$query = "SELECT img, date(lastupdate_datetime) as cdate, scatid, GROUP_CONCAT(distinct csize order by comid SEPARATOR '~') as csize, GROUP_CONCAT(comid order by comid SEPARATOR '~') as comid, GROUP_CONCAT((case when nmrp='' then saleprice else nmrp end) order by comid SEPARATOR '~') as nmrp, GROUP_CONCAT(saleprice order by comid SEPARATOR '~') as saleprice, group_concat(cur_stock order by comid SEPARATOR '~') as qty,short_description FROM `bar_combination` t1 where delstatus='0' GROUP by scatid ";		
		
 mysqli_set_charset($link2,'utf8');
   $re = mysqli_query($link2,$query);
  while($pro = mysqli_fetch_array($re)){
     if (!in_array($pro['scatid'], $tblId)){ 
     
      $prodName = getProductName($pro['scatid']);
            $tbiindia_productId = $pro['scatid'];
			$image = !empty($pro['img'])?$pro['img']:'';
            $product_title = !empty($prodName['subcat'])?$prodName['subcat']:'' ;

            $product_titleUrl = preg_replace(array(
                '/[^a-zA-Z0-9 -]/',
                '/[ -]+/',
                '/^-|-$/'
            ) , array(
                '',
                '-',
                ''
            ) , $product_title);

            $url = uniqid() . '-' . strtolower($product_titleUrl);

            $product_quantity = $pro['qty'];
            $product_price = !empty($pro['nmrp'])?$pro['nmrp']:'';			
            $discount = !empty($pro['saleprice'])?$pro['saleprice']:'';			
            $product_desc = !empty($pro['short_description'])?$pro['short_description']:'';
            $date = !empty($pro['cdate'])?$pro['cdate']:'';
            $Key_id = $_SESSION['key_id'];
			

            $p_post_title = isset($prodName['subcat'])?$prodName['subcat']:'';

            $p_post_title2 = isset($_POST['p_post_title2'])?$_POST['p_post_title2']:'';

            $best_deal = isset($_POST['best_deal'])?$_POST['best_deal']:'';

            $brand = isset($_POST['brand'])? $_POST['brand']:'';

            $product_keyword = isset($_POST['product_keyword'])?$_POST['product_keyword']:'';

            
            $product_gst = isset($_POST['product_gst'])?$_POST['product_gst']:''; 

            $product_w = isset($_POST['product_w'])?$_POST['product_w']:'';
            $product_sc = isset($_POST['product_sc'])?$_POST['product_sc']:'';

            $product_varient = isset($_POST['product_varient'])?$_POST['product_varient']:'';
            $counterValue = isset($_POST['appendValue'])?$_POST['appendValue']:'';
            $offerProduct = isset($_POST['offerProduct'])?$_POST['offerProduct']:'';
            $prodWeight=isset($_POST['size'])?implode(',',$_POST['size']):'';
            $weightPrice=isset($_POST['price'])?implode(',',$_POST['price']):'';
			if($id){
				$sql = "INSERT INTO `tbl_product`( `product_cat`,`product_sub_cat`,`brand_fk_id`,`best_deal`,`product_title`, `product_url`, `product_image`, `product_quantity`, `product_price`,`discount`,`product_gst`,`product_varient`, `product_desc`, `product_status`, `product_user`, `product_date`,`product_keyword`, `product_w`, `product_sc`,`product_weight`,`weight_price`,`offer_product`,`tbiindia_productId`) 
VALUES ('$p_post_title','$p_post_title2','$brand','$best_deal','$product_title','$url','$image','$product_quantity','$product_price','$discount','$product_gst','$product_varient','$product_desc','1','$Key_id','$date','$product_keyword','$product_w','$product_sc','$prodWeight','$weightPrice','$offerProduct','$tbiindia_productId')";

if (mysqli_query($link1, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link1);
}		
		
			}
			//return true;
	  }
	  
}	}else{
		   return false;
	   }
	   
	   
	   
function getProductName($id){
	$databasehostname="101.53.132.70";
$databaseuserid = "tbiindia_tycoon";
$databasepassword ="Bhopal@321";
$databasename ="tbiindia_tycoonsretails";

$link2 = mysqli_connect($databasehostname, $databaseuserid, $databasepassword, $databasename);
$productName = "SELECT subcat,catid FROM `master_subcategory` WHERE `scatid`='$id'";
$result = $link2->query($productName);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    return $row;
  }
}
}	   
       ?>