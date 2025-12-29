<?php 
   ob_start();
    session_start();
    require_once "classMaster.php";   
    
    $db= new dbconfig();
    
    if(isset($_POST['pid']) && $_POST['pid']!=""){
            if(isset($_SESSION['userId']) && $_SESSION['userId']!=""){
                        $userId   = $_SESSION['userId'];
                        $pid = $_POST['pid'];
                        $added_date    = date("Y-m-d H:i:s");
                $query = $db->dbperform("select *  from `user_wishlist` Where user_id='$userId' AND product_id='$pid'");
                
                // $query_result = $query->fetch_assoc();
                // print_r($query->num_rows );
                // print_r($query_result);die();
                
              if($query->num_rows > 0){
                  $db->dbperformm("DELETE FROM `user_wishlist` Where user_id='$userId' AND product_id='$pid'");      
                    echo "removed";
                }else{
                    $db->dbperformm("INSERT INTO `user_wishlist`(`user_id`, `product_id`, `added_date`) VALUES ('$userId','$pid','$added_date')");
                    echo "success";
                }
            }else{
                echo "login";
            }
        }else{
            echo "error";
        }
    ?>