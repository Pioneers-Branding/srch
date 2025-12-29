<?php 
 require_once"./admin/classes/classMaster.php";
$classMaster_obj = new classMaster();

// $oldUrl = substr($_SERVER['QUERY_STRING'], 1); 
// $url = preg_replace(['/(\?make=[a-z]*[&])/i', '/(\&make=[a-z]*[^(&*)])/i', '/&(?!\w)/i'], ['?','',''], $oldUrl );

// $classMaster_obj->display_page($url);



// OLD METHOD


if($_SERVER['SERVER_NAME']=="akwabaformula.com"){
     $sideUrl = str_replace("https://akwabaformula.com/electro-store/"," ",$_SERVER['SCRIPT_URI']);
     $oldUrl = trim($sideUrl); 
}else{
    $oldUrl = substr($_SERVER['SCRIPT_URL'], 1); 
}

$url = preg_replace(['/(\?make=[a-z]*[&])/i', '/(\&make=[a-z]*[^(&*)])/i', '/&(?!\w)/i'], ['?','',''], $oldUrl );

$classMaster_obj->display_page($url);
?>