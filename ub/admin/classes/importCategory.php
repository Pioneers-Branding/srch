<?php 
 ob_start();
    //session_start();
    require_once "classMaster.php";   
    $core_control_oj = new classMaster();
    $db= new dbconfig();
 
$tblId = array();
$sql = "SELECT category FROM tbl_category";
  $result =  $db->dbperform($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $tblId[] = $row["category"];
  }
}    

$id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : '';
     
    if (isset($_FILES["castegoryCsv"])) {
        
        $fileName = $_FILES["castegoryCsv"]["tmp_name"];
        
    if ($_FILES["castegoryCsv"]["size"] > 0) {
             $file = fopen($fileName, "r");
            //  echo count($_FILES["castegoryCsv"]["size"]);
        while (($column = fgetcsv($file, 100000, ",")) !== FALSE) {
            
            $categoryName = "";
            if (isset($column[0])) {
                $categoryName = $column[0];
                
                $cat_titleUrl = preg_replace(array(
                    '/[^a-zA-Z0-9 -]/',
                    '/[ -]+/',
                    '/^-|-$/'
                ) , array(
                    '',
                    '-',
                    ''
                ) , $categoryName);
                
             $url = strtolower($cat_titleUrl);
             
            $categoryBanner = '';
            $categoryImage = '';
            $categoryFaicon = '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';   
            
            }
            
            $categoryParent = "";
            if (isset($column[1])) {
                $categoryParent = $column[1];
            }
            
            $categoryHome = "";
            if (isset($column[2])) {
                $categoryHome = $column[2];
            }
            
if(!in_array($categoryName,$tblId)){
$insertId =  $db->dbperformm("INSERT INTO `tbl_category`(`category`, `cat_url` , `cat_fafa`, `cat_image`, `cat_bannerImage`,`shown_home`,`cat_parent`,
 `cat_status`) VALUES ('$categoryName','$url','$categoryFaicon','$categoryImage','$categoryBanner','$categoryHome','$categoryParent','1')");
    }
            if($insertId){
                $message = "Insert";
            }else{
                $message = "Failed";
            }
         }
    }
            
    }
    
    
        echo $message."---";
    
?>