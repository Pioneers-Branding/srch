<?php 
   ob_start();
    session_start();
    require_once "classMaster.php";   
    
    $db= new dbconfig();
    
    if(isset($_POST['image']) && $_POST['image']!="" && $_POST['id'] && $_POST['id']!=""){
            $id = $_POST['id'];
            $image = $_POST['image'];
            $query = $db->dbperform("select product_image from `tbl_product` Where product_pk_id='$id'");
            $query_result = $query->fetch_assoc();
            if($query_result['product_image'] != '') {
                $images = str_replace( array('[',']','"') , ''  , $query_result['product_image'] );
                $images = explode(",",$images);
                if(count($images) != 0) {
                    if (($key = array_search($image, $images)) !== false) {
                        unset($images[$key]);
                        $images = array_values($images);
                        $file_name=array();
                        for($x=0; $x<count($images); $x++ ) {
                            $file_name[$x] = $images[$x];
                        }
                        $images=json_encode($file_name);
                        $db->dbperform("update tbl_product set `product_image`='$images' where product_pk_id='$id'");
                        echo "success";
                    }
                } else {
                    echo "error";
                }
            } else {
                echo "error";
            }
        }else{
            echo "error";
        }
    ?>