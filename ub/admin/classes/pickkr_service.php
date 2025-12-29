<?php 
ob_start();
session_start();
require_once "core_control.php";   
    
    $core_control_oj = new core_control();
    
     if( isset($_POST['pickrr_pin_check'] ) ){
          
        $loc_result = json_decode($core_control_oj->get_user_loc_by_ip($_SERVER['REMOTE_ADDR']) , true);

        $loc_result_zip = $loc_result['zip'];
        
        $service_check = json_decode($core_control_oj->PincodeServiceCheck($loc_result_zip,$_POST['pickrr_pin_check']), true);
        
        $result = $service_check['has_cod'];

         if($result){
             
            echo 'pin-success';
            
            exit();
            
         }else{ 
            
            echo 'pin-failure';
            
            exit();

         }
     }
?>