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
$sql = "SELECT tbiindia_categoryid FROM tbl_category";
$result = $link1->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $tblId[] = $row["tbiindia_categoryid"];
  }
} 
           $categoryData = "SELECT * FROM `catalog_category`";
            $cateGory = mysqli_query($link2,$categoryData);
            while($catName = mysqli_fetch_array($cateGory)){ 

                if(!in_array($catName['category_id'], $tblId)){
                    
$tblind = $catName['category_id'];

$image = isset($catName['main_img'])?$catName['main_img']:'';
$category = isset($catName['name'])?$catName['name']:'';

$shHome = isset($_POST['shown_home'])?$_POST['shown_home']:'0';

$bannerImage =  isset($catName['image'])?$catName['image']:'';

                $cat_titleUrl = preg_replace(array(
                    '/[^a-zA-Z0-9 -]/',
                    '/[ -]+/',
                    '/^-|-$/'
                ) , array(
                    '',
                    '-',
                    ''
                ) , $category);

                $url = strtolower($cat_titleUrl);

                $_Fa_fa = '<i class="fa fa-shopping-cart"></i>';
                    
 $sql ="INSERT INTO tbl_category(`category`, `cat_url` , `cat_fafa`, `cat_image`, `cat_bannerImage`,`shown_home`,`cat_parent`,
 `cat_status`,`tbiindia_categoryid`) 
 VALUES ('$category','$cat_titleUrl','$_Fa_fa','$image','$bannerImage',$shHome,'0','1','$tblind')";     
 mysqli_query($link1, $sql);

                }
            }
       }else{
        echo 0;
       }?>