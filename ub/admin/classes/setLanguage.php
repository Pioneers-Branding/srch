<?php 
   ob_start();
    session_start();
    require_once "classMaster.php";   
    $core_control_oj = new classMaster();
    
    if(isset($_POST) && !empty($_POST)){
                 
            if($_POST['eslanguage'] == '/en/fr'){
                setcookie('eslanguage', 'French', time() + (3600), "/"); // 86400 = 1 day
                setcookie('eslanguage_flag', '<span class="flag-icon flag-icon-fr"></span>', time() + (3600), "/"); // 86400 = 1 day
            }      
            else if($_POST['eslanguage'] == '/en/en'){
                setcookie('eslanguage', 'English', time() + (3600), "/"); // 86400 = 1 day
                setcookie('eslanguage_flag','<span class="flag-icon flag-icon-us"></span>', time() + (3600), "/"); // 86400 = 1 day
            }
            else{
                // setcookie('eslanguage', 'French', time() + (3600), "/"); // 86400 = 1 day
                // setcookie('eslanguage_flag', '<span class="flag-icon flag-icon-fr"></span>', time() + (3600), "/"); // 86400 = 1 day    
                setcookie('eslanguage', 'English', time() + (3600), "/"); // 86400 = 1 day
                setcookie('eslanguage_flag','<span class="flag-icon flag-icon-us"></span>', time() + (3600), "/"); // 86400 = 1 day
       
            }
                    
        if(isset($_COOKIE['eslanguage_flag'])){
            // echo $_COOKIE['eslanguage'];
            echo $_COOKIE['eslanguage_flag'];
        }else{
            echo '<span class="flag-icon flag-icon-us"></span>';
        }
    }
    ?>