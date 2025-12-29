<?php 

    ob_start();
    session_start();
    require_once "classMaster.php";   
    
    $core_control_oj = new classMaster();
    
     if( isset($_POST['logged_ref'] ) ){
         
         if($core_control_oj->logged_user()!=='failed'){
             
            $core_control_oj->record_user_activity( $_POST['email'], 'Logged In', $_SERVER['REMOTE_ADDR'] );
            
            echo $core_control_oj->logged_user();
            
            exit();
            
         }else{ 
            $core_control_oj->record_user_activity( $_POST['email'], 'Logged In Failed', $_SERVER['REMOTE_ADDR'] ); 
            
            echo $core_control_oj->logged_user();
            
            exit();

         }
     }
     
     //for Seo Setting
     
        if( isset($_POST['setting_ref'] ) ){       
       
         if( $core_control_oj->update_setting()=='success' ){ 
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Setting', $_SERVER['REMOTE_ADDR'] );             
            echo 'success';            
            exit();
          }
     } 
     
     //for category
        if( isset($_POST['cat_ref'] ) ){
         
         if($core_control_oj->check_category()===0 or $core_control_oj->check_category()===1){
             
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Adding category but category already exist', $_SERVER['REMOTE_ADDR'] );
            
            echo $core_control_oj->check_category();
            
            exit();
            
         } 
         if( $core_control_oj->add_category()=='success' ){ 

            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added category', $_SERVER['REMOTE_ADDR'] ); 
            
            echo 'success';
            
            exit();

         }else{
             
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Adding category failed', $_SERVER['REMOTE_ADDR'] ); 
            
            echo $core_control_oj->add_category();
            
            exit();  
         }
     }
     //for sub category

      if( isset($_POST['s_cat_ref'] ) ){
         
        //  if($core_control_oj->check_category()===0 or $core_control_oj->check_category()===1){
             
        //     $core_control_oj->record_user_activity( $_SESSION['key'], 'Adding Sub category but category already exist', $_SERVER['REMOTE_ADDR'] );
            
        //     echo $core_control_oj->check_category();
            
        //     exit();
            
        //  } 
         if( $core_control_oj->add_sub_category()=='success' ){ 

            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added Sub category', $_SERVER['REMOTE_ADDR'] ); 
            
            echo 'success';
            
            exit();

         }else{
             
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Adding Sub category failed', $_SERVER['REMOTE_ADDR'] ); 
            
            echo $core_control_oj->add_sub_category();
            
            exit();  
         }
     }
     
     //for slider
        if( isset($_POST['slider_ref'] ) ){       
       
         if( $core_control_oj->add_slider()=='success' ){ 
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added Slider', $_SERVER['REMOTE_ADDR'] );             
            echo 'success';            
            exit();

          }
     }
     
     //for page
        if( isset($_POST['posts_ref'] ) ){       
       
         if( $core_control_oj->add_posts()=='success' ){ 
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added post', $_SERVER['REMOTE_ADDR'] );             
            echo 'success';            
            exit();
          }
     }
     
      //for brand
        if( isset($_POST['brand_ref'] ) ){
         
       
         if( $core_control_oj->add_brand()=='success' ){ 

            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added brand', $_SERVER['REMOTE_ADDR'] ); 
            
            echo 'success';
            
            exit();

          }
          //else{
             
        //     $core_control_oj->record_user_activity( $_SESSION['key'], 'Adding brand failed', $_SERVER['REMOTE_ADDR'] ); 
            
        //     echo $core_control_oj->add_brand();
            
        //     exit();  
        //  }
     }
     //for Size
     
      if( isset($_POST['size_ref'] ) ){
         
       
         if( $core_control_oj->add_size()=='success' ){ 

            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added Size', $_SERVER['REMOTE_ADDR'] ); 
            
            echo 'success';
            
            exit();

          }
          //else{
             
        //     $core_control_oj->record_user_activity( $_SESSION['key'], 'Adding brand failed', $_SERVER['REMOTE_ADDR'] ); 
            
        //     echo $core_control_oj->add_brand();
            
        //     exit();  
        //  }
     }
     
     
     //for Product type
     
      if( isset($_POST['type_ref'] ) ){
         
       
         if( $core_control_oj->add_productType()=='success' ){ 

            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added Color', $_SERVER['REMOTE_ADDR'] ); 
            
            echo 'success';
            
            exit();

          }
         }
      //for Size
     
      if( isset($_POST['color_ref'] ) ){
         
       
         if( $core_control_oj->add_color()=='success' ){ 

            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added Color', $_SERVER['REMOTE_ADDR'] ); 
            
            echo 'success';
            
            exit();

          }
          //else{
             
        //     $core_control_oj->record_user_activity( $_SESSION['key'], 'Adding brand failed', $_SERVER['REMOTE_ADDR'] ); 
            
        //     echo $core_control_oj->add_brand();
            
        //     exit();  
        //  }
     }
        //Add Product

      if( isset($_POST['product_ref'] ) ){
         
         if( $core_control_oj->add_product_admin()=='success' ){ 
             
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added New Product', $_SERVER['REMOTE_ADDR'] );
            
            echo 'success';
            
            exit();

         }
         else{
            echo 'failed';
            
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Failed Adding New Product', $_SERVER['REMOTE_ADDR'] );
            
            exit();
         }
           
            
            
     }
     
     if( isset($_POST['child_ref'] ) ){
         
         if( $core_control_oj->add_childcategory_admin()=='success' ){ 
             
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added New Child Category', $_SERVER['REMOTE_ADDR'] );
            
            echo 'success';
            
            exit();

         }
         else{
            echo 'failed';
            
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Failed Adding New Child Category', $_SERVER['REMOTE_ADDR'] );
            
            exit();
         }
           
            
            
     }
     
           if( isset($_POST['product_var'] ) ){
         
         if( $core_control_oj->add_variable_product_admin()=='success' ){ 
             
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added New Product', $_SERVER['REMOTE_ADDR'] );
            
            echo 'success';
            
            exit();

         }
         else{
            echo 'failed';
            
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Failed Adding New Product', $_SERVER['REMOTE_ADDR'] );
            
            exit();
         }
           
            
            
     }
     
     //Bulk add 
     
      if( isset($_POST['csv_ref'] ) ){
         
         if( $core_control_oj->add_product_bulk_admin()=='success' ){ 
             
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added New Products ( Bulk )', $_SERVER['REMOTE_ADDR'] );
            
            echo 'success';
            
            exit();

         }
         else{

            $core_control_oj->record_user_activity( $_SESSION['key'], 'Failed Adding New Products ( Bulk ) ', $_SERVER['REMOTE_ADDR'] );
            
            exit();
         }
           
            
            
     }
     
          //Add Coupon

      if( isset($_POST['coupon_ref'] ) ){
         
         if( $core_control_oj->add_coupon()=='success' ){ 
             
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added New Coupon', $_SERVER['REMOTE_ADDR'] );
            
            echo 'success';
            
            exit();

         }
         else{
            echo 'failed';
            
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Failed Adding New Coupon', $_SERVER['REMOTE_ADDR'] );
            
            exit();
         }
           
            
            
     }
     
     // Add Tax
        if( isset($_POST['Tax_ref'] ) ){
         
         if( $core_control_oj->add_tax()=='success' ){ 
             
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Added New Tax', $_SERVER['REMOTE_ADDR'] );
            
            echo 'success';
            
            exit();

         }
         else{
            echo 'failed';
            
            $core_control_oj->record_user_activity( $_SESSION['key'], 'Failed Adding New Tax', $_SERVER['REMOTE_ADDR'] );
            
            exit();
         }
           
            
            
     }
     
     // For Registration 
     
      if( isset($_POST['register_ref'] ) ){
         
         if( $core_control_oj->register_user($_SERVER['REMOTE_ADDR'])=='success' ){ 
             
            $core_control_oj->record_user_activity( $_POST['email'], 'New User Registered ', $_SERVER['REMOTE_ADDR'] );
            
            echo 'success';
            
            exit();

         }
         else{
            echo 'failed';
            
            $core_control_oj->record_user_activity( $_SESSION['email'], 'Failed Adding User', $_SERVER['REMOTE_ADDR'] );
            
            exit();
         }
           
        if( $core_control_oj->register_user($_SERVER['REMOTE_ADDR'])=='exists' ){ 
             
            $core_control_oj->record_user_activity( $_SESSION['email'], ' User Already Exists ', $_SERVER['REMOTE_ADDR'] );
            
            echo 'exists';
            
            exit();

         }   
            
     }
     
      // For Ajax live search 
     
      if( isset($_POST['ajax_live_search_ref'] ) ){
         
          echo $core_control_oj->ajax_live_search($_POST['ajax_live_search_ref']);
         
            
     }
      // For Cart 
     
      if( isset($_POST['cart_action'] ) ){
         
          echo $core_control_oj->cart();
         
            
     }
       if( isset($_POST['track_shipment_ref'] ) ){
         
          echo $core_control_oj->TrackShipment($_POST['track_shipment_no']);
         
            
     }
    if( isset($_POST['include_ref'] ) ){
        
        if(isset($_POST['product_id']))
        {
            echo $core_control_oj->displaySub($_POST['p_post_title'],$_POST['product_id']);
        }else{
         
          echo $core_control_oj->displaySub($_POST['p_post_title'],'');
         
        } 
         
            
     }
     
     
     if( isset($_POST['include_child'] ) ){
        
        if(isset($_POST['product_id']))
        {
            echo $core_control_oj->displayChild($_POST['p_post_title2'],$_POST['product_id']);
        }else{
         
          echo $core_control_oj->displayChild($_POST['p_post_title2'],'');
         
        } 
         
            
     }
         if( isset($_POST['slider_ref'] ) ){
         
          echo $core_control_oj->add_slider_admin();
         
            
     }
        if( isset($_POST['razorPayRef'] ) ){
         
          echo $core_control_oj->razoPayTransaction($_SESSION['cart']);
         
            
     }
      if( isset($_POST['codRef'] ) ){
         
          echo $core_control_oj->codTransaction($_SESSION['cart']);
         
            
     }
           if( isset($_POST['banner_ref'] ) ){
         
          echo $core_control_oj->add_banner_admin();
         
            
     }
          if (isset($_POST['adminUserRef']))
{

    echo $core_control_oj->registerAdminUser();

}
?>