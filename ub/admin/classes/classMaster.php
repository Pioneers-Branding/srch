<?php
date_default_timezone_set('Asia/Calcutta');

require_once "dbconfig.php";
require_once "activity.php";

final class classMaster extends dbconfig implements activity
{

    public $Ip_stack_api_key = '0f92cc9034bb2de2dd8f577021adf75b';

    public function get_user_loc_by_ip($_IPv4)
    {

        $ip = $_IPv4;

        $access_key = $this->Ip_stack_api_key;

        $ch = curl_init('http://api.ipstack.com/' . $ip . '?access_key=' . $access_key);
        

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $json = curl_exec($ch);

        curl_close($ch);

        return $json;
        
        

    }

    public function record_user_activity($_Useremail, $_Activity, $_IP)
    {

        $loc_result = json_decode($this->get_user_loc_by_ip($_IP) , true);

        $loc_result_capital = $loc_result['city'];

        $date = date("d F Y h:i:s A");

        dbconfig::dbperformm("INSERT INTO `tbl_user_activity_logs`(`user_email`, `user_activity`, `user_activity_loc`, `user_activity_date`) VALUES ('$_Useremail','$_Activity','$loc_result_capital','$date')");

    }

    public function display_user_activity()
    {

        $display_user_activity_result = dbconfig::dbperform("select * from `tbl_user_activity_logs`");

        $data = '';

        while ($display_user_activity_result_row = $display_user_activity_result->fetch_assoc())
        {

            $data .= "<tr>
                  <td>" . $display_user_activity_result_row['user_email'] . "</td>
                  <td>" . $display_user_activity_result_row['user_activity'] . "</td>
                  <td>" . $display_user_activity_result_row['user_activity_loc'] . "</td>
                  <td>" . $display_user_activity_result_row['user_activity_date'] . "</td>
                </tr>";
        }

        return $data;

    }
    public function register_user($_IP)
    {

        if (isset($_POST['register_ref']))
        {

            $full_name = $_POST['fname'] . " " . $_POST['lname'];

            $email = $_POST['email'];

            $pswrd = md5($_POST['pswrd']);

            $phone = $_POST['phone'];

            $auth_token = md5($email);

            $user_role = 'user';

            $loc_result = json_decode($this->get_user_loc_by_ip($_IP) , true);

            $loc_result_capital = $loc_result['location']['capital'];

            $to = $email;

            $date = date("d F Y h:i:s A");

            $subject = "# Registration Mail From Heathy The Organic";

            $txt = "Hello " . $full_name . ",\n Click the link below to confirm your registration to Healthy The Organic.\nhttps://bfwa.co.in/ecom/confirm?auth_token=" . $auth_token;

            $headers = "From: register@healthytheorganic.com" . "\r\n";

            $display_user_activity_result = dbconfig::dbperform("select * from tbl_user where user_email='$email'");

            if ($display_user_activity_result->num_rows > 0)
            {
                echo 'exists';
                exit();
            }

            if (mail($to, $subject, $txt, $headers))
            {

                dbconfig::dbperformm("INSERT INTO `tbl_user`( `full_name`,`contact`,`user_email`, `user_password`, `user_auth_tok`, `user_role`, `user_reg_loc`, `user_reg_date`, `user_status`, `user_block_status`) 
                                                                             VALUES ('$full_name','$phone','$email','$pswrd','$auth_token','$user_role','$loc_result_capital','$date','1','0')");

                $last_id_result = dbconfig::dbperform("select user_pk_id from `tbl_user` where user_email='$email'");

                $last_id_row = $last_id_result->fetch_assoc();

                $last_id = $last_id_row['user_pk_id'];

                dbconfig::dbperformm("INSERT INTO `tbl_user_details`(`user_fk_id`, `user_full_name`, `user_contact`) VALUES ('$last_id','$full_name','$phone')");
                return 'success';
            }
            else
            {

                return 'failed';

            }

        }

    }

    public function logged_user()
    {

        if (isset($_POST['logged_ref']))
        {

            $email = $_POST['email'];

            $pass = md5($_POST['pass']);

            $user_result = dbconfig::dbperform("select * from `tbl_user` where user_email='$email' and user_password='$pass' and user_status='1' and user_block_status='0'");

            if ($user_result->num_rows > 0)
            {

                $user_result_row = $user_result->fetch_assoc();

                ob_start();
                if (!isset($_SESSION))
                {
                    session_start();
                }
                if ($user_result_row['user_role'] == 'admin')
                {

                    $_SESSION['adminKey'] = $user_result_row['user_email'];
                    $_SESSION['nameKey'] = $user_result_row['full_name'];
                    $_SESSION['key_id'] = $user_result_row['user_pk_id'];

                    return 'admin';
                }
                if ($user_result_row['user_role'] == 'vendor')
                {

                    $_SESSION['v_key'] = $user_result_row['user_email'];
                    $_SESSION['key_id'] = $user_result_row['user_pk_id'];
                    $_SESSION['nameKey'] = $user_result_row['full_name'];
                    return 'vendor';

                }
                if ($user_result_row['user_role'] == 'user')
                {

                    $_SESSION['userKey'] = $user_result_row['user_email'];
                    $_SESSION['nameKey'] = $user_result_row['full_name'];
                    $_SESSION['key_id'] = $user_result_row['user_pk_id'];
                    return 'user';

                }
            }
            else
            {
                return 'failed';
            }

        }
    }
    public function check_category()
    {

        if (isset($_POST['cat_ref']))
        {

            $category = $_POST['post_title'];

            $category_result = dbconfig::dbperform("select * from `tbl_category` where category='$category'");

            if ($category_result->num_rows > 0)
            {

                $category_result_row = $category_result->fetch_assoc();

                if ($category_result_row['cat_status'] == 1)
                {
                    return 1;
                }

                if ($category_result_row['cat_status'] == 0)
                {
                    return 0;
                }

            }
            else
            {
                return 'avail';
            }

        }
        if (isset($_POST['s_cat_ref']))
        {

            $category = $_POST['s_post_title'];

            $category_result = dbconfig::dbperform("select * from `tbl_category` where category='$category'");

            if ($category_result->num_rows > 0)
            {

                $category_result_row = $category_result->fetch_assoc();

                if ($category_result_row['cat_status'] == 1)
                {
                    return 1;
                }

                if ($category_result_row['cat_status'] == 0)
                {
                    return 0;
                }

            }
            else
            {
                return 'avail';
            }

        }
    }
  
   public function add_category()
    {

        if (isset($_POST['cat_ref']))
        {

            if (!empty($_POST)){

                $sourcePath = isset($_FILES['post_image']['tmp_name'])?$_FILES['post_image']['tmp_name']:'';

                $targetPath = isset($_FILES['post_image']['name'])?"../assets/" . $_FILES['post_image']['name']:'';

                $image = isset($_FILES['post_image']['name'])?$_FILES['post_image']['name']:'';

                $category = isset($_POST['post_title'])?$_POST['post_title']:'';
                $category_fr = isset($_POST['post_title_fr'])?dbconfig::get_safe_str($_POST['post_title_fr']):'';
                
               $shHome = isset($_POST['shown_home'])?$_POST['shown_home']:'';
               $livesale = isset($_POST['live_sale'])?$_POST['live_sale']:'';
               $expire_date = isset($_POST['expire_date_time'])?$_POST['expire_date_time']:'';
                $expire_date_time=date("Y-m-d H:i:s", strtotime($expire_date));
               $created_date=date("Y-m-d H:i:s");
               $shown_mobile = isset($_POST['shown_mobile'])?$_POST['shown_mobile']:'';
               $dont_show_on_home = isset($_POST['dont_show_on_home'])?$_POST['dont_show_on_home']:'';
               $mobileText = isset($_POST['mobileText'])?$_POST['mobileText']:'';
               $mobileText_fr = isset($_POST['mobileText_fr'])?$_POST['mobileText_fr']:'';
               $sortOrder = isset($_POST['sort_order'])?$_POST['sort_order']:'';
                //Banner English
                $sourcePathBanner = isset($_FILES['banner_image']['tmp_name'])?$_FILES['banner_image']['tmp_name']:'';
         		$targetPathBanner = isset($_FILES['banner_image']['name'])?"../assets/" . $_FILES['banner_image']['name']:'';
        		$bannerImage = isset($_FILES['banner_image']['name'])?$_FILES['banner_image']['name']:'';
        		//Banner French
                    $sourcePathBanner_fr = $_FILES['banner_image_fr']['tmp_name'];
                    $targetPathBanner_fr = "../assets/" . $_FILES['banner_image_fr']['name'];
                    $bannerImage_fr = $_FILES['banner_image_fr']['name'];
                    move_uploaded_file($bannerImage_fr, $targetPathBanner_fr); 
                    
                    
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

                $_Fa_fa = isset($_POST['fa'])?$_POST['fa']:'';

                move_uploaded_file($sourcePath, $targetPath);
                move_uploaded_file($sourcePathBanner, $targetPathBanner);
//meta 
$meta_title_en = isset($_POST['meta_title_en'])?dbconfig::get_safe_str($_POST['meta_title_en']):'';
$meta_title_fr = isset($_POST['meta_title_fr'])?dbconfig::get_safe_str($_POST['meta_title_fr']):'';

$meta_description_en = isset($_POST['meta_description_en'])?dbconfig::get_safe_str($_POST['meta_description_en']):'';
$meta_description_fr = isset($_POST['meta_description_fr'])?dbconfig::get_safe_str($_POST['meta_description_fr']):'';

$meta_keywords_en = isset($_POST['meta_keywords_en'])?dbconfig::get_safe_str($_POST['meta_keywords_en']):'';
$meta_keywords_fr = isset($_POST['meta_keywords_fr'])?dbconfig::get_safe_str($_POST['meta_keywords_fr']):'';
$post_tbl = 'cat';

                $ctId =     dbconfig::dbperformm("INSERT INTO `tbl_category`(`category`,`category_fr`, `cat_url` , `cat_fafa`, `cat_image`, `cat_bannerImage`, `cat_bannerImage_fr`,`shown_home`,`live_sale`,`expire_date_time`,`created_date`,`cat_parent`,`cat_status`,`sort_order`,`shown_mobile`,`mobile_text`,`mobile_text_fr`, `dont_show_on_home`) VALUES ('$category','$category_fr','$url','$_Fa_fa','$image','$bannerImage','$bannerImage_fr','$shHome','$livesale','$expire_date_time','$created_date','0','1','$sortOrder','$shown_mobile','$mobileText','$mobileText_fr','$dont_show_on_home')");
                    
                    $last_id_result = dbconfig::dbperform("select cat_pk_id from `tbl_category` where category='$category' Order by cat_pk_id DESC");
                    $last_id_row = $last_id_result->fetch_assoc();
                    $insId = $last_id_row['cat_pk_id'];
                     dbconfig::dbperformm ("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$insId','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");
                
                    return 'success';
                
                
            }

        }else{
            return 'failed';
        }

    }
    public function add_sub_category()
    {

        if (isset($_POST['s_cat_ref']))
        {

            $p_post_title = $_POST['p_post_title'];
            $s_post_title = $_POST['s_post_title'];
            $s_post_titleeUrl = preg_replace(array(
                '/[^a-zA-Z0-9 -]/',
                '/[ -]+/',
                '/^-|-$/'
            ) , array(
                '',
                '-',
                ''
            ) , $s_post_title);
            $url = strtolower($s_post_titleeUrl);
            $sourcePath = $_FILES['post_image']['tmp_name'];
            $targetPath = "../assets/" . $_FILES['post_image']['name'];
            $image = $_FILES['post_image']['name'];
            move_uploaded_file($sourcePath, $targetPath);

            dbconfig::dbperformm("INSERT INTO `tbl_category`(`category`, `cat_url` , `cat_fafa`, `cat_image`, `cat_parent`,`cat_status`) VALUES ('$s_post_title','$url','null','$image','$p_post_title','1')");
            return 'success';
        }

    }
    public function categoryTree($parent_id = 0, $sub_mark = '')
    {

        $query = dbconfig::dbperform("select * from `tbl_category` WHERE cat_parent = $parent_id and cat_status='1'");

        if ($query->num_rows > 0)
        {
            while ($row = $query->fetch_assoc())
            {
                echo '<option value="' . $row['cat_pk_id'] . '">' . $sub_mark . $row['category'] . '</option>';
                $this->categoryTree($row['cat_pk_id'], $sub_mark . '---');
            }
        }
    }
    public function categoryTreeParent()
    {

        $query = dbconfig::dbperform("select * from `tbl_category` WHERE cat_parent = 0 and cat_status='1'");

        if ($query->num_rows > 0)
        {
            while ($row = $query->fetch_assoc())
            {
                echo '<option value="' . $row['cat_pk_id'] . '">' . $sub_mark . $row['category'] . '</option>';
            }
        }
    }
        public function categoryTreeParentEdit($id)
    {

        $query = dbconfig::dbperform("select * from `tbl_category`  WHERE cat_parent = 0 and cat_status='1'");
        $query2 = dbconfig::dbperform("select * from `tbl_subCategory`  WHERE id = '$id' ");
        $row2=$query2->fetch_assoc();

        if ($query->num_rows > 0)
        {
            
            echo '<option value="">Select</option>';
            while ($row = $query->fetch_assoc())
            {
                if( $row['cat_pk_id']==$row2['category_id']){
                    
                echo '<option value="' . $row['cat_pk_id'] . ' "selected>'  . $row['category'] . '</option>';
                }else{
                echo '<option value="' . $row['cat_pk_id'] . ' ">'  . $row['category'] . '</option>';

                }
            }
        }
    }
    public function categoryTreeSubCat($parent_id, $sub_mark = '')
    {

        $query = dbconfig::dbperform("select * from `tbl_category` WHERE cat_parent = $parent_id and cat_status='1'");

        if ($query->num_rows > 0)
        {
            while ($row = $query->fetch_assoc())
            {
                echo '<option value="' . $row['cat_pk_id'] . '">' . $sub_mark . $row['category'] . '</option>';
                $this->categoryTree($row['cat_pk_id'], $sub_mark . '---');
            }
        }
    }
    
     //posts   
    public function add_posts(){
        if (isset($_POST['posts_ref'])){
           
        	$sourcePath = isset($_FILES['post_image']['tmp_name'])?$_FILES['post_image']['tmp_name']:'';
        	$targetPath = isset($_FILES['post_image']['name'])?"../assets/" . $_FILES['post_image']['name']:'';
        	
        	move_uploaded_file($sourcePath, $targetPath);
        	
        	$post_image = isset($_FILES['post_image']['name'])?$_FILES['post_image']['name']:'';
        
        	$post_title = isset($_POST['post_title'])?$_POST['post_title']:'';
        	    
        	     $post_url = preg_replace(array(
                            '/[^a-zA-Z0-9 -]/',
                            '/[ -]+/',
                            '/^-|-$/'
                        ) , array(
                            '',
                            '-',
                            ''
                        ) , strtolower($post_title));
                        
        	$post_title_fr = isset($_POST['post_title_fr'])?dbconfig::get_safe_str($_POST['post_title_fr']):'';
        	$post_content = isset($_POST['post_content'])?$_POST['post_content']:'';
        	$post_content_fr = isset($_POST['post_content_fr'])?$_POST['post_content_fr']:'';
        	$post_shown = isset($_POST['shown'])?implode(",",$_POST['shown']):'';
        	$post_date = date('Y-m-d h:i:s');
        	$post_name=isset($_POST['post_name'])?$_POST['post_name']:'page';
        	$post_order=isset($_POST['sort_order'])?$_POST['sort_order']:'0';
        	
        	$post_id = isset($_POST['post_id'])?$_POST['post_id']:'';

//Post Extar Content

$meta_title_en = isset($_POST['meta_title_en'])?dbconfig::get_safe_str($_POST['meta_title_en']):'';
$meta_title_fr = isset($_POST['meta_title_fr'])?dbconfig::get_safe_str($_POST['meta_title_fr']):'';

$meta_description_en = isset($_POST['meta_description_en'])?dbconfig::get_safe_str($_POST['meta_description_en']):'';
$meta_description_fr = isset($_POST['meta_description_fr'])?dbconfig::get_safe_str($_POST['meta_description_fr']):'';

$meta_keywords_en = isset($_POST['meta_keywords_en'])?dbconfig::get_safe_str($_POST['meta_keywords_en']):'';
$meta_keywords_fr = isset($_POST['meta_keywords_fr'])?dbconfig::get_safe_str($_POST['meta_keywords_fr']):'';
$post_tbl = 'posts';

             if(!empty($post_id)){
                 //   post extra
                    $metaPost =   dbconfig::dbperform("Select * from tbl_post_extra Where post_extr_id='$post_id' and post_tbl='$post_tbl' ");
                        if($metaPost->num_rows > 0){
                            dbconfig::dbperformm("update tbl_post_extra set `post_tbl`='$post_tbl',`meta_title_en`='$meta_title_en',`meta_title_fr`='$meta_title_fr',`meta_description_en`='$meta_description_en', `meta_description_fr`='$meta_description_fr',`meta_keywords_en`='$meta_keywords_en' ,`meta_keywords_fr`='$meta_keywords_fr' where post_extr_id='$post_id'");
                        }else{
                            dbconfig::dbperformm("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$post_id','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");
                    	}
              
                 
                    	if(isset($_FILES['post_image']['name']) && !empty($_FILES['post_image']['name'])){	
                        	dbconfig::dbperformm("update tbl_posts set `post_title`='$post_title',`post_url`='$post_url',`post_title_fr`='$post_title_fr',`post_content`='$post_content', `post_content_fr`='$post_content_fr',`post_shown`='$post_shown' ,`post_image`='$post_image',`post_update`='$post_date',`sort_order`='$post_order' where post_id='$post_id'");
                       }else{
                        dbconfig::dbperformm("update tbl_posts set `post_title`='$post_title',`post_url`='$post_url',`post_title_fr`='$post_title_fr',`post_content`='$post_content', `post_content_fr`='$post_content_fr',`post_shown`='$post_shown' ,`post_update`='$post_date',`sort_order`='$post_order'  where post_id='$post_id'");
                        }
                 }else{
                    dbconfig::dbperformm("INSERT INTO `tbl_posts`(`post_title`,`post_url`, `post_title_fr`,`post_content`,`post_content_fr`,`post_shown`,`post_image`,`post_status`,`post_name`,`post_date`,`sort_order`) VALUES ('$post_title','$post_url','$post_title_fr','$post_content','$post_content_fr','$post_shown','$post_image','1','$post_name','$post_date','$post_order')");
                    
                    $last_id_result = dbconfig::dbperform("select post_id from `tbl_posts` where post_title='$post_title' Order by post_id DESC");
                    $last_id_row = $last_id_result->fetch_assoc();
                    $insId = $last_id_row['post_id'];
                    dbconfig::dbperformm("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$insId','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");
          
                }
            echo 'success';
    	}else{
    		echo "failed";
    	}
    }
   
    //seo setting
    public function update_setting(){
        if (isset($_POST['setting_ref'])){           
             $post_id = isset($_POST['post_id'])?$_POST['post_id']:1;
        		
        //Post Extra Content
        $meta_title_en = isset($_POST['meta_title_en'])?dbconfig::get_safe_str($_POST['meta_title_en']):'';
        $meta_title_fr = isset($_POST['meta_title_fr'])?dbconfig::get_safe_str($_POST['meta_title_fr']):'';
        
        $meta_description_en = isset($_POST['meta_description_en'])?dbconfig::get_safe_str($_POST['meta_description_en']):'';
        $meta_description_fr = isset($_POST['meta_description_fr'])?dbconfig::get_safe_str($_POST['meta_description_fr']):'';
        
        $meta_keywords_en = isset($_POST['meta_keywords_en'])?dbconfig::get_safe_str($_POST['meta_keywords_en']):'';
        $meta_keywords_fr = isset($_POST['meta_keywords_fr'])?dbconfig::get_safe_str($_POST['meta_keywords_fr']):'';
        $post_tbl = 'home';
        
         if(!empty($post_id)){         
        //   post extra
        $metaPost =   dbconfig::dbperform("Select * from tbl_post_extra Where post_extr_id='$post_id' and post_tbl='$post_tbl' ");
       
        if($metaPost->num_rows > 0){
            dbconfig::dbperformm("update tbl_post_extra set `post_tbl`='$post_tbl',`meta_title_en`='$meta_title_en',`meta_title_fr`='$meta_title_fr',`meta_description_en`='$meta_description_en', `meta_description_fr`='$meta_description_fr',`meta_keywords_en`='$meta_keywords_en' ,`meta_keywords_fr`='$meta_keywords_fr' where post_extr_id='$post_id' and post_tbl='$post_tbl'");
        }else{
            dbconfig::dbperformm("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$post_id','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");
        }
          }else{
         dbconfig::dbperformm("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$post_id','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");
        }
               echo 'success';
        	}else{
    	    	echo "failed";
    	    }
    }
    
   
  //Slider   
    public function add_slider()
    {

        if (isset($_POST['slider_ref']))
        {
            $sourcePath = $_FILES['post_image']['tmp_name'];
            $targetPath = "../assets/" . $_FILES['post_image']['name'];
            $image = $_FILES['post_image']['name'];
            move_uploaded_file($sourcePath, $targetPath);
            
            $slider = $_POST['post_title'];
            $shownHome = $_POST['shown_home'];
            dbconfig::dbperformm("INSERT INTO `tbl_slider`(`slider_name`, `slider_status`,`slider_image`) VALUES ('$slider','$shownHome','$image')");
            echo 'success';

        }

    }
    public function add_brand()
    {

        if (isset($_POST['brand_ref']))
        {
            $sourcePath = $_FILES['post_image']['tmp_name'];
            $targetPath = "../assets/" . $_FILES['post_image']['name'];
            $image = $_FILES['post_image']['name'];
            move_uploaded_file($sourcePath, $targetPath);
            
            $brand = $_POST['post_title'];
            
            $brand_titleeUrl = preg_replace(array(
                '/[^a-zA-Z0-9 -]/',
                '/[ -]+/',
                '/^-|-$/'
            ) , array(
                '',
                '-',
                ''
            ) , $brand);
            $url = strtolower($brand_titleeUrl);
            $brand_fr = dbconfig::get_safe_str($_POST['post_title_fr']);
            $shownHome = $_POST['shown_home'];
            
    //meta 
$meta_title_en = isset($_POST['meta_title_en'])?dbconfig::get_safe_str($_POST['meta_title_en']):'';
$meta_title_fr = isset($_POST['meta_title_fr'])?dbconfig::get_safe_str($_POST['meta_title_fr']):'';

$meta_description_en = isset($_POST['meta_description_en'])?dbconfig::get_safe_str($_POST['meta_description_en']):'';
$meta_description_fr = isset($_POST['meta_description_fr'])?dbconfig::get_safe_str($_POST['meta_description_fr']):'';

$meta_keywords_en = isset($_POST['meta_keywords_en'])?dbconfig::get_safe_str($_POST['meta_keywords_en']):'';
$meta_keywords_fr = isset($_POST['meta_keywords_fr'])?dbconfig::get_safe_str($_POST['meta_keywords_fr']):'';
$post_tbl = 'brand';        
            
            dbconfig::dbperformm("INSERT INTO `tbl_brand`(`brand_name`,`brand_name_fr`, `brand_status`,`brand_image`,`shown_home`,`brand_url`) VALUES ('$brand','$brand_fr','1','$image','$shownHome','$url')");
            
                    $last_id_result = dbconfig::dbperform("select `brand_id` from `tbl_brand` where `brand_name`='$brand' Order by `brand_id` DESC");
                    $last_id_row = $last_id_result->fetch_assoc();
                    $insId = $last_id_row['brand_id'];
                     dbconfig::dbperformm ("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$insId','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");
            echo 'success';

        }

    }
    //Size
    
    public function add_size()
    {

        if (isset($_POST['size_ref']))
        {
            // $sourcePath = $_FILES['post_image']['tmp_name'];
            // $targetPath = "../assets/" . $_FILES['post_image']['name'];
            // $image = $_FILES['post_image']['name'];
            // move_uploaded_file($sourcePath, $targetPath);
            
            $size = $_POST['post_title'];
            $size_fr = $_POST['post_title_fr'];
            //$shownHome = $_POST['shown_home'];
			
            dbconfig::dbperformm("INSERT INTO `tbl_size`(`size_name`, `size_name_fr`,`size_status`) VALUES ('$size','$size_fr','1')");
            echo 'success';

        }

    }
//Color 

public function add_color()
    {

        if (isset($_POST['color_ref']))
        {
            $color = $_POST['post_title'];
            $color_fr = $_POST['post_title_fr'];
            dbconfig::dbperformm("INSERT INTO `tbl_color`(`color_name`, `color_name_fr`,`color_status`) VALUES ('$color','$color_fr','1')");
            echo 'success';
        }

    }
    
//Add Product Type

public function add_productType()
    {

        if (isset($_POST['type_ref']))
        {
            $type = $_POST['post_title'];
            $type_fr = $_POST['post_title_fr'];
            dbconfig::dbperformm("INSERT INTO `tbl_productType`(`post_title`,`post_title_fr`, `post_status`) VALUES ('$type','$type_fr','1')");
            echo 'success';
        }

    }
    public function display_category($parent, $name)
    {

        $display_category_result = dbconfig::dbperform("select * from `tbl_category` where  cat_parent='$parent' ");

        $data = '';
        $status = '';

        while ($display_category_result_row = $display_category_result->fetch_assoc())
        {
            $status = $display_category_result_row['cat_status'] == 0 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';
            if ($display_category_result_row['cat_parent'] == 0)
            {
                $data .= "<tr>
                 <td>" . $display_category_result_row['cat_pk_id'] . "</td>
                  <td>" . ucwords($display_category_result_row['category']) . "</td>";
                //  $data .= " <td>" . $display_category_result_row['cat_fafa'] . "</td>";
                  
                  
                  $data .= "<td><img height='50px' width='50px' src=assets/" . $display_category_result_row['cat_image'] . "></td>

                  <td>
                  <form method='post'>
                  <button type='button' onclick='view_category_url(this)' class='btn btn-info' value='" . $display_category_result_row['category'] . "'><i class='fa fa-eye'></i></button>
                  <a class='btn btn-primary' href='edit-category?category=" . $display_category_result_row['cat_pk_id'] . "&ref=parent'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_cat' value='" . $display_category_result_row['cat_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";
            }
            else
            {
                $data .= "<tr>
                  <td>" . $display_category_result_row['category'] . "</td>
                  <td><i class='fa fa-shopping-cart'></i></td>
                  <td >" . $name . "</td>
                  <td><img height='50px' width='50px' src=assets/" . $display_category_result_row['cat_image'] . "></td>

                  <td>
                  <form method='post'>
                  <a class='btn btn-primary' href='edit-category?category=" . $display_category_result_row['cat_pk_id'] . "'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_cat' value='" . $display_category_result_row['cat_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

            }
            $this->display_category($display_category_result_row['cat_pk_id'], $display_category_result_row['category']);
        }
        echo $data;

    }
    
    public function display_Subcategory($st, $name)
    {

        $display_category_result = dbconfig::dbperform("select * from `tbl_subCategory` where  cat_status='$st' ");
// print_r($display_category_result); die();
        $data = '';
        $status = '';

        while ($display_category_result_row = $display_category_result->fetch_assoc())
        {
            $status = $display_category_result_row['cat_status'] == 1 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';
            if ($display_category_result_row['cat_status'] == 1)
            {
                $data .= "<tr> ";
                
                $data .= " <td>";
                $id = $display_category_result_row['category_id'];
                $category_result = dbconfig::dbperform("select category from `tbl_category` where  cat_pk_id='$id' ");
                    while ($display_category = $category_result->fetch_assoc()){
                  $data .= ucwords($display_category['category']);
            }
                
               $data .=  "</td>
                
                  <td>" . ucwords($display_category_result_row['category']) . "</td>";
                  
                //   $data .= "<td>" . $display_category_result_row['cat_fafa'] . "</td>";
                  
                  $data .= "<td><img height='50px' width='50px' src=assets/" . str_replace(" ","%20",$display_category_result_row['cat_image']) . "></td>

                  <td>
                  <form method='post'>
                  <a class='btn btn-primary' href='edit-sub-category?category=" . $display_category_result_row['id'] . "&ref=" . $display_category_result_row['category_id'] . "'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_cat' value='" . $display_category_result_row['id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";
            }
            else
            {
                $data .= "<tr>
                  <td>" . $display_category_result_row['category'] . "</td>
                  <td><i class='fa fa-shopping-cart'></i></td>
                  <td >" . $name . "</td>
                  <td><img height='50px' width='50px' src=assets/" . $display_category_result_row['cat_image'] . "></td>

                  <td>
                  <form method='post'>
                  <a class='btn btn-primary' href='edit-category?category=" . $display_category_result_row['cat_pk_id'] . "'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_cat' value='" . $display_category_result_row['cat_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

            }
            $this->display_Subcategory($display_category_result_row['cat_pk_id'], $display_category_result_row['category']);
        }
        echo $data;

    }
    
    
    public function display_childcategory()
    {

        $display_childcategory_result = dbconfig::dbperform("select tbl_category.category as category, tbl_subCategory.category as subcategory, tbl_childcategory.* from `tbl_childcategory` INNER JOIN tbl_category ON tbl_childcategory.product_cat = tbl_category.cat_pk_id INNER JOIN tbl_subCategory ON tbl_childcategory.product_sub_cat = tbl_subCategory.id");
        

        $data = '';
        

        while ($display_childcategory_result_row = $display_childcategory_result->fetch_assoc())
        {
            // print_r($display_category_result); die();
            
            // $status = $display_category_result_row['cat_status'] == 1 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';
           
                $data .= "<tr> 
                 <td>" . $display_childcategory_result_row['child_pk_id'] . "</td>
                  <td>" . ucwords($display_childcategory_result_row['category']) . "</td>";
                  
                  $data .= "<td>" . $display_childcategory_result_row['subcategory'] . "</td>";
                  
                  $data .= "<td>" . $display_childcategory_result_row['child_category'] . "</td>

                  <td>
                  <form method='post'>
                  <a class='btn btn-primary' href='edit-child-category?category=" . $display_childcategory_result_row['child_pk_id'] . "&ref=" . $display_childcategory_result_row['product_cat'] . "&refid=" . $display_childcategory_result_row['product_sub_cat'] . "'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_child_cat' value='" . $display_childcategory_result_row['child_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";
            // }
            // else
            // {
            //     $data .= "<tr>
            //       <td>" . $display_category_result_row['category'] . "</td>
            //       <td><i class='fa fa-shopping-cart'></i></td>
            //       <td >" . $name . "</td>
            //       <td><img height='50px' width='50px' src=assets/" . $display_category_result_row['cat_image'] . "></td>

            //       <td>
            //       <form method='post'>
            //       <a class='btn btn-primary' href='edit-category?category=" . $display_category_result_row['cat_pk_id'] . "'><i class='fa fa-edit'></i></a>
            //       <button type='submit' class='btn btn-danger' name='delete_cat' value='" . $display_category_result_row['cat_pk_id'] . "'><i class='fa fa-trash'></i></button>
            //       </form>
            //       </td>
            //     </tr>";

            // }
            // $this->display_childcategory($display_category_result_row['cat_pk_id'], $display_category_result_row['category']);
        }
        echo $data;

    }

 public function display_slider()
    {

        $display_slider_result = dbconfig::dbperform("select * from `tbl_slider` ");

        $data = '';
        $status = '';

        while ($display_slider_result_row = $display_slider_result->fetch_assoc())
        {
            $status = $display_slider_result_row['slider_status'] == 0 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';

            $data .= "<tr>
                  <td>" . ucwords($display_slider_result_row['slider_name']) . "</td>
                  <td><img height='50px' width='50px' src=assets/" . $display_slider_result_row['slider_image'] . "></td>
                  <td>
                  <form method='post'>
                  <a class='btn btn-primary' href='edit-slider?slider_name=" . $display_slider_result_row['slider_pk_id'] . "'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_slider' value='" . $display_slider_result_row['slider_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

        }
        echo $data;
    }
    public function display_brand()
    {

        $display_brand_result = dbconfig::dbperform("select * from `tbl_brand` ");

        $data = '';
        $status = '';

        while ($display_brand_result_row = $display_brand_result->fetch_assoc())
        {
            $status = $display_brand_result_row['brand_status'] == 0 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';

            $data .= "<tr>
                  <td>" . ucwords($display_brand_result_row['brand_name']) . "</td>
                  <td><img height='50px' width='50px' src=assets/" . str_replace(" ","%20",$display_brand_result_row['brand_image']) . "></td>
                  <td>
                  <form method='post'>
                  <a class='btn btn-primary' href='edit-brand?brand_name=" . $display_brand_result_row['brand_id'] . "'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_brand' value='" . $display_brand_result_row['brand_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

        }
        echo $data;
    }
    
    public function display_size()
    {

        $display_size_result = dbconfig::dbperform("select * from `tbl_size` ");

        $data = '';
        $status = '';

        while ($display_size_result_row = $display_size_result->fetch_assoc())
        {
            $status = $display_size_result_row['size_status'] == 0 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';

            $data .= "<tr>
                  <td>" . ucwords($display_size_result_row['size_name']) . "</td>
                  <td>
                  <form method='post'>
                  <a class='btn btn-primary' href='edit-size?size_name=" . $display_size_result_row['size_id'] . "'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_size' value='" . $display_size_result_row['size_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

        }
        echo $data;
    }
    
       public function display_subscribe()
    {

        $display_size_result = dbconfig::dbperform("select * from `tbl_subscribeUser` ORDER By ID DESC ");

        $data = '';
        $status = '';
            $cn=1;
        while ($display_size_result_row = $display_size_result->fetch_assoc())
        {
            

            $data .= "<tr>
                    <td>$cn</td>
                  <td>" . ucwords($display_size_result_row['email']) . "</td>
                  <td>
                  <form method='post'>
                  <button type='submit' class='btn btn-danger' name='delete_subemail' value='" . $display_size_result_row['ID'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";
        $cn++;
        }
        echo $data;
    }
    
    public function display_CancelOrder()
    {

        $display_size_result = dbconfig::dbperform("SELECT DISTINCT(`tbl_cancelOreder`.`product_id`), `tbl_cancelOreder`.*, `tbl_user`.`full_name`,`tbl_order`.`order_date` FROM `tbl_cancelOreder` INNER JOIN `tbl_user` ON `tbl_user`.`user_pk_id`=`tbl_cancelOreder`.`user_id` INNER JOIN `tbl_order` ON `tbl_order`.`order_id`=`tbl_cancelOreder`.`order_id`  ORDER BY `tbl_cancelOreder`.`id` DESC ");

        $data = '';
        $status = '';
            $cn=1;
        while ($display_size_result_row = $display_size_result->fetch_assoc())
        {
            

            $data .= "<tr>
                    <td>$cn</td>
					<td>".$display_size_result_row['order_id']."</td>
                  <td>" . ucwords($display_size_result_row['product_name']) . "</td>
                  <td>" . $display_size_result_row['order_date'] . "</td>
                  <td>" . $display_size_result_row['cancel_date'] . "</td>
                  <td>
                  ".ucwords($display_size_result_row['full_name'])."&nbsp;". ucwords($display_size_result_row['last_name'])."
                  </td>
                </tr>";
        $cn++;
        }
        echo $data;
    }
    
    
     public function display_posts($post_type='page')
    {

        $display_posts_result = dbconfig::dbperform("select * from `tbl_posts` Where post_name='$post_type' ");

        $data = '';
        $status = '';

        while ($display_posts_result_row = $display_posts_result->fetch_assoc())
        {
            $status = $display_posts_result_row['post_status'] == 0 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';
            if($post_type=='ambassadors'){ 
                $editButtun = "<a class='btn btn-primary' href='our-ambassadors?amb=" . $display_posts_result_row['post_id'] . "'><i class='fa fa-edit'></i></a>";
            }else{
                $editButtun = "<a class='btn btn-primary' href='edit-page?page_name=" . $display_posts_result_row['post_id'] . "'><i class='fa fa-edit'></i></a>";
            }
            $data .= "<tr>
                  <td>" . ucwords($display_posts_result_row['post_title']) . "</td>
                  <td><img height='50px' width='50px' src=assets/" . $display_posts_result_row['post_image'] . "></td>
                  <td>
                  <form method='post'>
                  ".$editButtun."
                  <button type='submit' class='btn btn-danger' name='delete_posts' value='" . $display_posts_result_row['post_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

        }
        echo $data;
    }
   
    
    public function display_color()
    {

        $display_color_result = dbconfig::dbperform("select * from `tbl_color` ");

        $data = '';
        $status = '';
        $count=1;
        while ($display_color_result_row = $display_color_result->fetch_assoc())
        {
            $status = $display_color_result_row['size_status'] == 0 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';

            $data .= "<tr>
                    <td>$count.</td>
                  <td>" . ucwords($display_color_result_row['color_name']) . "</td>
                  <td>
                  <form method='post'>
                  <a class='btn btn-primary' href='edit-color?color_name=" . $display_color_result_row['color_id'] . "'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_color' value='" . $display_color_result_row['color_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";
            $count++;
        }
        echo $data;
    }
    
     public function display_productType()
    {

        $display_product_type = dbconfig::dbperform("select * from `tbl_productType` ");

        $data = '';
        $status = '';
        $count=1;
        while ($display_product_type_row = $display_product_type->fetch_assoc())
        {
            $status = $display_product_type_row['post_status'] == 0 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';

            $data .= "<tr>
                    <td>$count.</td>
                  <td>" . ucwords($display_product_type_row['post_title']) . "</td>
                  <td>
                  <form method='post'>
                  <a class='btn btn-primary' href='edit-productType?type_name=" . $display_product_type_row['id'] . "'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_type' value='" . $display_product_type_row['id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";
            $count++;
        }
        echo $data;
    }
    public function add_product_admin()
    {


        if (is_array($_FILES['product_image']) && isset($_POST['product_ref']))
        {

            $file_name = array();

            for ($x = 0;$x < count($_FILES["product_image"]["tmp_name"]);$x++)
            {

                $file_name[$x] = $_FILES['product_image']['name'][$x];
                

                move_uploaded_file($_FILES['product_image']['tmp_name'][$x], "../assets/" . $_FILES['product_image']['name'][$x]);

            }
            $image = json_encode($file_name);
            
            $featurd_imagesourcePath = $_FILES['featurd_image']['tmp_name'];
            $featurd_imagetargetPath = "../assets/" . $_FILES['featurd_image']['name'];
            $featurd_image = $_FILES['featurd_image']['name'];
            move_uploaded_file($featurd_imagesourcePath, $featurd_imagetargetPath);
            
            $product_title = $_POST['product_title'];
            $product_title_fr = dbconfig::get_safe_str($_POST['product_title_fr']);

              $subcatName = "";
            $subCat = dbconfig::dbperform("select category from tbl_category Where cat_pk_id='$product_title' "); 
                if($subCat->num_rows > 0){
                    $subcat = $subCat->fetch_assoc();
                        $subcat_titleUrl = preg_replace(array(
                            '/[^a-zA-Z0-9 -]/',
                            '/[ -]+/',
                            '/^-|-$/'
                        ) , array(
                            '',
                            '-',
                            ''
                        ) , $subcat['category']);
                    $subcatName = "/".$subcat_titleUrl."/";
                    
                }
                
            $product_titleUrl = preg_replace(array(
                '/[^a-zA-Z0-9 -]/',
                '/[ -]+/',
                '/^-|-$/'
            ) , array(
                '',
                '-',
                ''
            ) , $product_title);

            $url = strtolower($subcatName.$product_titleUrl);
// print_r($url);die();

            $product_quantity = $_POST['product_quantity'];
           
            $product_price = $_POST['product_price'];

            $product_desc = $_POST['product_desc'];
            $product_short_desc = $_POST['product_short_desc'];
            $product_desc_fr = $_POST['product_desc_fr'];

            $date = date("d F Y h:i:s A");

            $Key_id = $_SESSION['key_id'];

            // $p_post_title = $_POST['p_post_title'];
            
            $categories=array();
           
            for($c=0; $c<count($_POST['p_post_title']); $c++) {
                $categories[$c] = $_POST['p_post_title'][$c];
            }
            $cat=json_encode($categories);
            
            $subcategories=array();
           
            for($c=0; $c<count($_POST['p_post_title2']); $c++) {
                $subcategories[$c] = $_POST['p_post_title2'][$c];
            }
            $p_post_title2=json_encode($subcategories);
            
            
            $childcategories=array();
           
            for($c=0; $c<count($_POST['p_post_title3']); $c++) {
                $childcategories[$c] = $_POST['p_post_title3'][$c];
            }
            $p_post_title3=json_encode($childcategories);

            // $p_post_title2 = $_POST['p_post_title2'];
            // $p_post_title3 = $_POST['p_post_title3'];
            // print_r($cat); print_r($p_post_title2); print_r($p_post_title3); die();
            
            $best_deal = $_POST['best_deal'];

            $brand = $_POST['brand']!=''? $_POST['brand']:'';

            $product_keyword = $_POST['product_keyword'];

            $discount = $_POST['discount'];
            
            $product_gst = $_POST['product_gst']; 

            $product_w = $_POST['product_w'];
            $product_sc = $_POST['product_sc'];

            $product_varient = $_POST['product_varient'];
            $counterValue = $_POST['appendValue'];
            $offerProduct = $_POST['offerProduct'];
            $Featured = $_POST['Featured'];
            $size=isset($_POST['size'])?implode(',',$_POST['size']):'';
            $color=isset($_POST['color'])?implode(',',$_POST['color']):'';
            
            $stockQuantity= $_POST['stockQuantity'];
            $productType= $_POST['productType'];
      
//  SEO CONTENT
$meta_title_en = isset($_POST['meta_title_en'])?dbconfig::get_safe_str($_POST['meta_title_en']):'';
$meta_title_fr = isset($_POST['meta_title_fr'])?dbconfig::get_safe_str($_POST['meta_title_fr']):'';

$meta_description_en = isset($_POST['meta_description_en'])?dbconfig::get_safe_str($_POST['meta_description_en']):'';
$meta_description_fr = isset($_POST['meta_description_fr'])?dbconfig::get_safe_str($_POST['meta_description_fr']):'';

$meta_keywords_en = isset($_POST['meta_keywords_en'])?dbconfig::get_safe_str($_POST['meta_keywords_en']):'';
$meta_keywords_fr = isset($_POST['meta_keywords_fr'])?dbconfig::get_safe_str($_POST['meta_keywords_fr']):'';

$post_tbl = 'product';
      
             
            if ($image != '')
            {
                if( $counterValue==0 ){
                  error_reporting(-1);  
              dbconfig::dbperformm("INSERT INTO `tbl_product`(
              `product_cat`,
              `product_sub_cat`,
              `product_child_cat`,
              `brand_fk_id`,
              `best_deal`,
              `product_title`,
              `product_title_fr`,
              `product_url`,
              `product_image`,
              `product_price`,
              `discount`,
              `product_gst`,
              `product_varient`,
              `product_desc`,
              `product_short_desc`,
              `product_desc_fr`,
              `product_status`,
              `product_user`,
              `product_date`,
              `product_keyword`,
              `product_w`,
              `product_sc`,
              `size`,
              `weight_price`,
              `offer_product`,
              `Featured`,
              `color`,
              `featurd_image`,
              `stock_quantity`,
              `type_fk_id`
              )VALUES (
              '$cat',
              '$p_post_title2',
              '$p_post_title3',
              '$brand',
              '$best_deal',
              '$product_title',
              '$product_title_fr',
              '$url',
              '$image',
              '$product_price',
              '$discount',
              '$product_gst',
              '$product_varient',
              '$product_desc',
              '$product_short_desc',
              '$product_desc_fr',
              '1','$Key_id',
              '$date',
              '$product_keyword',
              '$product_w',
              '$product_sc',
              '$size',
              '$weightPrice',
              '$offerProduct',
              '$Featured',
              '$color',
              '$featurd_image',
              '$stockQuantity',
              '$productType'
              )");
                // SEO Data Insert 
                // print_r($PRORESULT); die();
                $last_id_result = dbconfig::dbperform("select product_pk_id from `tbl_product` where product_title='$product_title' Order by product_pk_id DESC");
                $last_id_row = $last_id_result->fetch_assoc();
                $insId = $last_id_row['product_pk_id'];
                
                  //  variable data insert
               

            foreach($_POST['color_name'] as $key => $value) 
            {

                $colorname= $_POST['color_name'][$key];
                $quantityv= $_POST['product_vquantity'][$key];
                $sizearr= $_POST['cmsize'][$key];
               // $sizearr= implode(',' , $_POST['cmsize']);
               // print_r($_POST['cmsize'][$key]);
                //   foreach($_POST['cmsize'] as $num => $val)
                //   {
                // $sizearr= implode(',', $_POST['cmsize'][$num]);
                //   }
                 // print_r($sizearr);
                 dbconfig::dbperformm("INSERT INTO `tbl_product_variation`(`product_id`, `product_color_id`, `product_size`, `product_quantity`) VALUES ('$insId','$colorname','$sizearr' ,'$quantityv')");
                
}
            
        
            
            
          
       
                
                dbconfig::dbperformm("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$insId','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");
                
            
                return 'success';
                }
                if( $counterValue>0 ){
                dbconfig::dbperformm("INSERT INTO `tbl_product`( `product_cat`,`product_sub_cat`,`product_child_cat`,`brand_fk_id`,`best_deal`,`product_title`, `product_title_fr`,`product_url`, `product_image`, `product_quantity`, `product_price`,`discount`,`product_gst`,`product_varient`, `product_desc`,`product_short_desc`,`product_desc_fr`, `product_status`, `product_user`, `product_date`,`product_keyword`, `product_w`, `product_sc`,`size`,`weight_price`,`offer_product`,`Featured`,`color`,`stock_quantity`,`type_fk_id`) 
                                           VALUES ('$cat','$p_post_title2','$p_post_title3','$brand','$best_deal','$product_title','$product_title_fr','$url','$image','$product_quantity','$product_price','$discount','$product_gst','$product_varient','$product_desc','$product_short_desc','$product_desc_fr','1','$Key_id','$date','$product_keyword','$product_w','$product_sc','$size','$weightPrice','$offerProduct','$Featured','$color','$stockQuantity','$productType')");
                                           
                                           
                                           
                for($i=0;$i<$counterValue;$i++){
            
                 $product_quantity = $_POST['product_quantity'.$i];
                 $product_price = $_POST['product_price'.$i];
                 $discount = $_POST['discount'.$i];
                 $product_varient = $_POST['product_varient'.$i];
                 $product_w = $_POST['product_w'.$i];
                 $product_sc = $_POST['product_sc'.$i];
                 $offerProduct = $_POST['offerProduct'.$i];
                 $Featured = $_POST['Featured'.$i];
                 $size=isset($_POST['size'])?implode(',',$_POST['size'.$i]):'';
                 $color=$_POST['color'.$i];
                 $stockQuantity= $_POST['stockQuantity'.$i];
                    $productType= $_POST['productType'.$i];
                dbconfig::dbperformm("INSERT INTO `tbl_product`( `product_cat`,`product_sub_cat`,`product_child_cat`,`brand_fk_id`,`best_deal`,`product_title`, `product_url`, `product_image`, `product_quantity`, `product_price`,`discount`,`product_gst`,`product_varient`, `product_desc`,`product_short_desc`, `product_status`, `product_user`, `product_date`,`product_keyword`, `product_w`, `product_sc`,`size`,`weight_price`,`offer_product`,`Featured`,`color`,`stock_quantity`,`type_fk_id`) 
                                           VALUES ('$cat','$p_post_title2','$p_post_title3','$brand','$best_deal','$product_title','$url','$image','$product_quantity','$product_price','$discount','$product_gst','$product_varient','$product_desc','$product_short_desc','1','$Key_id','$date','$product_keyword','$product_w','$product_sc','$size','$weightPrice','$offerProduct','$Featured','$color','$stockQuantity','$productType')");
                
                }
                
                
                return 'success';
                }
                
            }
            else
            {
                return 'failed';
            }

        }

    }
    
    
    public function add_childcategory_admin()
    {


        if (isset($_POST['child_ref']))
        {

            $file_name = array();

            
            
            
            $product_title = $_POST['product_title'];
            
            $date = date("d F Y h:i:s A");

            $Key_id = $_SESSION['key_id'];

            
            
            
            $cat=$_POST['p_post_title'];

            $p_post_title2 = $_POST['p_post_title2'];

            
      


$post_tbl = 'product';
      
           
                dbconfig::dbperformm("INSERT INTO `tbl_childcategory`( `product_cat`,`product_sub_cat`,`child_category`, `created_on`) 
                                                        VALUES ('$cat','$p_post_title2','$product_title','$date')");
                
            
        
            
            
          
       
                
                
                
            
                return 'success';
                
                
                
            

        }

    }
    
    
    public function add_variable_product_admin()
    {

        if (is_array($_FILES['product_image']) && isset($_POST['product_ref']))
        {

            $file_name = array();

            for ($x = 0;$x < count($_FILES["product_image"]["tmp_name"]);$x++)
            {

                $file_name[$x] = $_FILES['product_image']['name'][$x];
                

                move_uploaded_file($_FILES['product_image']['tmp_name'][$x], "../assets/" . $_FILES['product_image']['name'][$x]);

            }
            $image = json_encode($file_name);
            
            $featurd_imagesourcePath = $_FILES['featurd_image']['tmp_name'];
            $featurd_imagetargetPath = "../assets/" . $_FILES['featurd_image']['name'];
            $featurd_image = $_FILES['featurd_image']['name'];
            move_uploaded_file($featurd_imagesourcePath, $featurd_imagetargetPath);
            
            $product_title = $_POST['product_title'];
            $product_title_fr = dbconfig::get_safe_str($_POST['product_title_fr']);

              $subcatName = "";
            $subCat = dbconfig::dbperform("select category from tbl_category Where cat_pk_id='$product_title' "); 
                if($subCat->num_rows > 0){
                    $subcat = $subCat->fetch_assoc();
                        $subcat_titleUrl = preg_replace(array(
                            '/[^a-zA-Z0-9 -]/',
                            '/[ -]+/',
                            '/^-|-$/'
                        ) , array(
                            '',
                            '-',
                            ''
                        ) , $subcat['category']);
                    $subcatName = "/".$subcat_titleUrl."/";
                    
                }
                
            $product_titleUrl = preg_replace(array(
                '/[^a-zA-Z0-9 -]/',
                '/[ -]+/',
                '/^-|-$/'
            ) , array(
                '',
                '-',
                ''
            ) , $product_title);

            $url = strtolower($subcatName.$product_titleUrl);
// print_r($url);die();

            $product_quantity = $_POST['product_quantity'];

            $product_price = $_POST['product_price'];

            $product_desc = $_POST['product_desc'];
            $product_desc_fr = $_POST['product_desc_fr'];

            $date = date("d F Y h:i:s A");

            $Key_id = $_SESSION['key_id'];

            // $p_post_title = $_POST['p_post_title'];
            
            $categories=array();
           
            for($c=0; $c<count($_POST['p_post_title']); $c++) {
                $categories[$c] = $_POST['p_post_title'][$c];
            }
            $cat=json_encode($categories);

            $p_post_title2 = $_POST['p_post_title2'];

            $best_deal = $_POST['best_deal'];

            $brand = $_POST['brand']!=''? $_POST['brand']:'';

            $product_keyword = $_POST['product_keyword'];

            $discount = $_POST['discount'];
            
            $product_gst = $_POST['product_gst']; 

            $product_w = $_POST['product_w'];
            $product_sc = $_POST['product_sc'];

            $product_varient = $_POST['product_varient'];
            $counterValue = $_POST['appendValue'];
            $offerProduct = $_POST['offerProduct'];
            $size=isset($_POST['size'])?implode(',',$_POST['size']):'';
            $color=isset($_POST['color_name'])?implode(',',$_POST['color_name']):'';
            
            $stockQuantity= $_POST['stockQuantity'];
            $productType= $_POST['productType'];
      
//  SEO CONTENT
$meta_title_en = isset($_POST['meta_title_en'])?dbconfig::get_safe_str($_POST['meta_title_en']):'';
$meta_title_fr = isset($_POST['meta_title_fr'])?dbconfig::get_safe_str($_POST['meta_title_fr']):'';

$meta_description_en = isset($_POST['meta_description_en'])?dbconfig::get_safe_str($_POST['meta_description_en']):'';
$meta_description_fr = isset($_POST['meta_description_fr'])?dbconfig::get_safe_str($_POST['meta_description_fr']):'';

$meta_keywords_en = isset($_POST['meta_keywords_en'])?dbconfig::get_safe_str($_POST['meta_keywords_en']):'';
$meta_keywords_fr = isset($_POST['meta_keywords_fr'])?dbconfig::get_safe_str($_POST['meta_keywords_fr']):'';

$post_tbl = 'product';
      
             
            if ($image != '')
            {
                if( $counterValue==0 ){
                dbconfig::dbperformm("INSERT INTO `tbl_product`( `product_cat`,`product_sub_cat`,`brand_fk_id`,`best_deal`,`product_title`,`product_title_fr`, `product_url`, `product_image`, `product_quantity`, `product_price`,`discount`,`product_gst`,`product_varient`, `product_desc`,`product_desc_fr`, `product_status`, `product_user`, `product_date`,`product_keyword`, `product_w`, `product_sc`,`size`,`weight_price`,`offer_product`,`color`,`featurd_image`,`stock_quantity`,`type_fk_id`) 
                                                        VALUES ('$cat','$p_post_title2','$brand','$best_deal','$product_title','$product_title_fr','$url','$image','$product_quantity','$product_price','$discount','$product_gst','$product_varient','$product_desc','$product_desc_fr','1','$Key_id','$date','$product_keyword','$product_w','$product_sc','$size','$weightPrice','$offerProduct','$color','$featurd_image','$stockQuantity','$productType')");
                // SEO Data Insert    
                $last_id_result = dbconfig::dbperform("select product_pk_id from `tbl_product` where product_title='$product_title' Order by product_pk_id DESC");
                $last_id_row = $last_id_result->fetch_assoc();
                $insId = $last_id_row['product_pk_id'];
                dbconfig::dbperformm("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$insId','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");
          
                
                return 'success';
                }
                if( $counterValue>0 ){
                dbconfig::dbperformm("INSERT INTO `tbl_product`( `product_cat`,`product_sub_cat`,`brand_fk_id`,`best_deal`,`product_title`, `product_title_fr`,`product_url`, `product_image`, `product_quantity`, `product_price`,`discount`,`product_gst`,`product_varient`, `product_desc`,`product_desc_fr`, `product_status`, `product_user`, `product_date`,`product_keyword`, `product_w`, `product_sc`,`size`,`weight_price`,`offer_product`,`color`,`stock_quantity`,`type_fk_id`) 
                                           VALUES ('$cat','$p_post_title2','$brand','$best_deal','$product_title','$product_title_fr','$url','$image','$product_quantity','$product_price','$discount','$product_gst','$product_varient','$product_desc','$product_desc_fr','1','$Key_id','$date','$product_keyword','$product_w','$product_sc','$size','$weightPrice','$offerProduct','$color','$stockQuantity','$productType')");
                for($i=0;$i<$counterValue;$i++){
            
                 $product_quantity = $_POST['product_quantity'.$i];
                 $product_price = $_POST['product_price'.$i];
                 $discount = $_POST['discount'.$i];
                 $product_varient = $_POST['product_varient'.$i];
                 $product_w = $_POST['product_w'.$i];
                 $product_sc = $_POST['product_sc'.$i];
                 $offerProduct = $_POST['offerProduct'.$i];
                 $size=isset($_POST['size'])?implode(',',$_POST['size'.$i]):'';
                 $color=$_POST['color'.$i];
                 $stockQuantity= $_POST['stockQuantity'.$i];
                    $productType= $_POST['productType'.$i];
                dbconfig::dbperformm("INSERT INTO `tbl_product`( `product_cat`,`product_sub_cat`,`brand_fk_id`,`best_deal`,`product_title`, `product_url`, `product_image`, `product_quantity`, `product_price`,`discount`,`product_gst`,`product_varient`, `product_desc`, `product_status`, `product_user`, `product_date`,`product_keyword`, `product_w`, `product_sc`,`size`,`weight_price`,`offer_product`,`color`,`stock_quantity`,`type_fk_id`) 
                                           VALUES ('$cat','$p_post_title2','$brand','$best_deal','$product_title','$url','$image','$product_quantity','$product_price','$discount','$product_gst','$product_varient','$product_desc','1','$Key_id','$date','$product_keyword','$product_w','$product_sc','$size','$weightPrice','$offerProduct','$color','$stockQuantity','$productType')");
                
                }
                
                
                return 'success';
                }
                
            }
            else
            {
                return 'failed';
            }

        }

    }
    
    public function add_product_bulk_admin()
    {

        if (is_array($_FILES['csv']) && isset($_POST['csv_ref']))
        {
            $date = date("d F Y h:i:s A");
            $file = fopen($_FILES['csv']['tmp_name'], "r");
            $Key_id = $_SESSION['key_id'];
            $p_post_title = $_POST['p_post_title'];

            while (($emapData = fgetcsv($file, 20000, ",")) !== false)

            {
                $product_titleUrl = preg_replace(array(
                    '/[^a-zA-Z0-9 -]/',
                    '/[ -]+/',
                    '/^-|-$/'
                ) , array(
                    '',
                    '-',
                    ''
                ) , $emapData[0]);
                $url = strtolower($product_titleUrl);
                $product_title = $emapData[0];
                $image_replace = str_replace("open", "uc", $emapData[1]);
                $image = json_encode(explode(";", $image_replace));
                $product_quantity = $emapData[2];
                $product_price = $emapData[3];
                $discount = $emapData[4];
                $product_varient = $emapData[5];
                $product_desc = $emapData[6];
                $keyword = $emapData[7];

                dbconfig::dbperformm("INSERT INTO `tbl_product`( `product_cat`,`product_title`, `product_url`, `product_image`, `product_quantity`, `product_price`,`discount`,`product_varient`, `product_desc`, `product_status`, `product_user`, `product_date`,`product_keyword`) 
                                                        VALUES ('$p_post_title','$product_title','$url','$image','$product_quantity','$product_price','$discount','$product_varient','$product_desc','1','$Key_id','$date','$keyword')");
            }
            fclose($file);
            echo "success";

        }

    }
    public function display_product_admin()
    {

        $data = '';

        $status = '';

        $varient = '';

    //   $display_product_result = dbconfig::dbperform("select * from `tbl_product` inner join tbl_category on tbl_category.cat_pk_id=tbl_product.product_cat inner join tbl_user on tbl_user.user_pk_id=tbl_product.product_user");
   
    $display_product_result = dbconfig::dbperform("select * from `tbl_product` left join tbl_category on tbl_category.cat_pk_id=tbl_product.product_cat left join tbl_user on tbl_user.user_pk_id=tbl_product.product_user");

        while ($display_product_result_row = $display_product_result->fetch_assoc())
        {
            $image = '';

            $varient = $display_product_result_row['product_varient'] != '' ? $display_product_result_row['product_varient'] : 'N/A';

            $desc = strlen($display_product_result_row['product_desc']) > 100 ? substr($display_product_result_row['product_desc'], 0, 100) . "..." : $display_product_result_row['product_desc'];

            if ($display_product_result_row['product_status'] == 0)
            {
                $status = '<td><div class="btn btn-warning">Pending For Approval | In Active</div></td>';
            }
            if ($display_product_result_row['product_status'] == 1)
            {
                $status = '<td><div class="btn btn-success">Approved | Active</div></td>';
            }
            if ($display_product_result_row['product_status'] == 2)
            {
                $status = '<td><div class="btn btn-primary">Out Of Stock</div></td>';
            }
            $decode = json_decode($display_product_result_row['product_image']);

            foreach ($decode as $keys)
            {
                if (strpos($keys, 'https') !== false || strpos($keys, 'http') !== false || strpos($keys, 'www') !== false)
                {
                    $image .= "<img height='50px' width='50px' src=" . $keys . ">  ";
                }
                else
                {
                    $image .= "<img height='50px' width='50px' src=https://feminineafrica.com/admin/assets/" . $keys . ">  ";
                }
            }
            $data .= "<tr>
                  <td>" . $display_product_result_row['category'] . "</td>
                  <td>" . $display_product_result_row['product_title'] . "</td>
                  <td><img height='50px' width='50px' src=https://feminineafrica.com/admin/assets/".$display_product_result_row['featurd_image']."></td>";
                  
                //   $data .= "<td>" . $image . "</td><td>" . $display_product_result_row['product_quantity'] . "</td>";

                $data .= "
                <td>" . $display_product_result_row['stock_quantity'] . "</td>
                <td>" . $display_product_result_row['product_price'] . ".00</td>

                  <td>" . $display_product_result_row['discount'] . "</td>";
                  
                //   $data .= "<td>" . $varient . "</td>
                //  <td>" . $display_product_result_row['product_gst'] . " %</td>
                //  <td>" . $display_product_result_row['product_w'] . " </td>
                //  <td>" . $display_product_result_row['product_sc'] . ".00 </td>";


                //   $data .= " <td>" . $desc . "</td>
                //   <td>" . $display_product_result_row['product_date'] . "</td>
                //   <td>" . $display_product_result_row['user_email'] . " ( " . $display_product_result_row['user_role'] . " )</td>
                //         ";
                  $data .= " <td>
                  <form method='post'>
                  <a class='btn btn-primary' href='edit-product?product=" . $display_product_result_row['product_pk_id'] . "'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_cat' value='" . $display_product_result_row['product_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

        }
        echo $data;
    }

function language(){
   if(isset($_COOKIE['eleLangA']) && $_COOKIE['eleLangA'] == '/en/fr'){
       return 'French';
   }else if(!isset($_COOKIE['eleLangA']) && $_COOKIE['googtrans'] == '/en/fr'){
       return 'French';
   }else if($_COOKIE['eleLangA'] == '/en/en'){
       return 'English';
   }else{
       return 'English';
   }
}

// public function language_flag(){
//     return isset($_COOKIE['eslanguage_flag'])?$_COOKIE['eslanguage_flag']:'<span class="flag-icon flag-icon-us"></span>';
// }
function language_flag(){
   if(isset($_COOKIE['eleLangA']) && $_COOKIE['eleLangA'] == '/en/fr'){
       return '<span class="flag-icon flag-icon-fr"></span>';
   }else if(!isset($_COOKIE['eleLangA']) && $_COOKIE['googtrans'] == '/en/fr'){
       return '<span class="flag-icon flag-icon-fr"></span>';
   }else if($_COOKIE['eleLangA'] == '/en/en'){
       return '<span class="flag-icon flag-icon-us"></span>';
   }else{
       return '<span class="flag-icon flag-icon-us"></span>';
   }
}

    public function display_product_pending_admin()
    {

        $data = '';

        $status = '';

        $display_product_pending_result = dbconfig::dbperform("select * from `tbl_product` inner join tbl_category on tbl_category.cat_pk_id=tbl_product.product_cat inner join tbl_user on tbl_user.user_pk_id=tbl_product.product_user where product_status='0' and user_role='vendor'");

        while ($display_product_pending_result_row = $display_product_pending_result->fetch_assoc())
        {
            $image = '';
            $desc = strlen($display_product_pending_result_row['product_desc']) > 100 ? substr($display_product_pending_result_row['product_desc'], 0, 100) . "..." : $display_product_pending_result_row['product_desc'];
            $decode = json_decode($display_product_pending_result_row['product_image']);

            foreach ($decode as $keys)
            {
                if (strpos($keys, 'https') !== false || strpos($keys, 'http') !== false || strpos($keys, 'www') !== false)
                {
                    $image .= "<img height='50px' width='50px' src=" . $keys . ">  ";
                }
                else
                {
                    $image .= "<img height='50px' width='50px' src=.././images/" . $keys . ">  ";
                }
            }
            $data .= "<tr>
                  <td>" . $display_product_pending_result_row['category'] . "</td>
                  <td>" . $display_product_pending_result_row['product_title'] . "</td>
                  <td>" . $image . "</td>
                  <td>" . $display_product_pending_result_row['product_quantity'] . "</td>
                  <td>" . $display_product_pending_result_row['product_price'] . "</td>
                  <td>" . $desc . "</td>
                  <td><div class='btn btn-warning'>Pending For Approval </div></td>  
                  <td>" . $display_product_pending_result_row['product_date'] . "</td>
                  <td>" . $display_product_pending_result_row['user_email'] . " ( " . $display_product_pending_result_row['user_role'] . " )</td>

                  <td>
                  <form method='post'>
                  <button type='submit' class='btn btn-success' name='active_cat' value='" . $display_product_pending_result_row['product_pk_id'] . "'><i class='fa fa-check'></i></button>
                  <button type='submit' class='btn btn-danger' name='delete_cat' value='" . $display_product_pending_result_row['product_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

        }
        echo $data;
    }
    public function display_user()
    {

        $data = '';
        $status = '';
        // $display_user_result = dbconfig::dbperform("select * from `tbl_user` inner join tbl_user_details on tbl_user.user_pk_id=tbl_user_details.user_fk_id where user_role='user'");

        $display_user_result = dbconfig::dbperform("select * from tbl_user where user_role='user' order by user_pk_id DESC");

        while ($display_user_result_row = $display_user_result->fetch_assoc())
        {
            $status = $display_user_result_row['user_status'] == 0 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';

            $data .= "<tr>
                  <td>" . $display_user_result_row['full_name'] . "</td>
                  <td>" . $display_user_result_row['user_email'] . "</td>
                  <td>" . $display_user_result_row['contact'] . "</td>";
                  
                //   $data .= " <td>" . $display_user_result_row['user_address'] . "</td>
                //   <td>" . $display_user_result_row['user_role'] . "</td> 
                //   <td>" . $display_user_result_row['user_reg_loc'] . "</td>  ";
                  
                $data .= "   <td>" . $display_user_result_row['user_reg_date'] . "</td>
                  <td>
                  <form method='post'>
                  <a class='btn btn-primary' href='edit-user?user=" . $display_user_result_row['user_pk_id'] . "&ref=User'><i class='fa fa-edit'></i></a>
                  <button type='submit' class='btn btn-danger' name='delete_cat' value='" . $display_user_result_row['user_pk_id'] . "'><i class='fa fa-trash'></i></button>
                 </form>
                  </td>
                </tr>";

        }
        echo $data;
    }
    public function display_vendor()
    {

        $data = '';
        $status = '';
        $display_user_result = dbconfig::dbperform("select * from `tbl_user` inner join tbl_user_details on tbl_user.user_pk_id=tbl_user_details.user_fk_id where user_role='vendor'");

        while ($display_user_result_row = $display_user_result->fetch_assoc())
        {
            $status = $display_user_result_row['user_status'] == 0 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';

            $data .= "<tr>
                  <td>" . $display_user_result_row['user_full_name'] . "</td>
                  <td>" . $display_user_result_row['user_email'] . "</td>
                  <td>" . $display_user_result_row['user_auth_tok'] . "</td>
                  <td>" . $display_user_result_row['user_contact'] . "</td>
                  <td>" . $display_user_result_row['user_address'] . "</td>
                  <td>" . $display_user_result_row['user_role'] . "</td>  
                  <td>" . $display_user_result_row['user_reg_date'] . "</td>
                  <td>" . $display_user_result_row['user_reg_loc'] . "</td>
                  " . $status . "
                  <td>
                  <form method='post'>
                  <button type='submit' class='btn btn-success' name='active_cat' value='" . $display_user_result_row['user_pk_id'] . "'><i class='fa fa-check'></i></button>
                  <button type='submit' class='btn btn-danger' name='delete_cat' value='" . $display_user_result_row['user_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

        }
        echo $data;
    }

    public function add_coupon()
    {
        if (isset($_POST['coupon_ref']))
        {
            $coupon_name = isset($_POST['coupon_name'])?trim($_POST['coupon_name']):'';
            $coupon_name_fr = isset($_POST['coupon_name_fr'])?trim($_POST['coupon_name_fr']):'';
            $coupon_description = isset($_POST['coupon_description'])?trim($_POST['coupon_description']):'';
            $coupon_description_fr = isset($_POST['coupon_description_fr'])?trim($_POST['coupon_description_fr']):'';
            $coupon_amt = isset($_POST['coupon_amt'])?trim($_POST['coupon_amt']):'';
            $couponMin = isset($_POST['couponMin'])?trim($_POST['couponMin']):'';
            $couponExp = isset($_POST['couponExp'])?trim($_POST['couponExp']):'';
            $couponCreate = date('Y-m-d h:i:s');
            $coupon_for = isset($_POST['coupon_for'])?trim($_POST['coupon_for']):'';
        
           dbconfig::dbperformm("INSERT INTO `tbl_coupon`(`coupon_name`,`coupon_name_fr`, `coupon_discount`, `coupon_status`,`couponMin`,`coupon_expire`,`coupon_create`,`coupon_description`,`coupon_description_fr`) VALUES ('$coupon_name','$coupon_name_fr','$coupon_amt','1','$couponMin','$couponExp','$couponCreate','$coupon_description','$coupon_description_fr')");
            return 'success';
        }
        else
        {
            return 'failed';

        }

    }
    public function display_coupon()
    {

        $data = '';
        $status = '';
        $display_user_result = dbconfig::dbperform("select * from `tbl_coupon`");

        while ($display_user_result_row = $display_user_result->fetch_assoc())
        {
            $status = $display_user_result_row['coupon_status'] == 0 ? '<td><div class="btn btn-warning">In Valid</div></td>' : '<td><div class="btn btn-success">Valid</div></td>';
                if($display_user_result_row['coupon_status']==0){ $cst=1;}else{ $cst=0; }
          if($display_user_result_row['coupon_all']==1){ $coupon_all="All";}else{ $coupon_all="Selected Perosn"; }
       
            $data .= "<tr>
                  <td>" . $display_user_result_row['coupon_name'] . "</td>
                  <td>" . $display_user_result_row['couponMin'] . " ₹</td>
                  <td>" . $coupon_all . "</td>
 
                  <td>" . $display_user_result_row['coupon_discount'] . " %</td>
                  <td>" . $display_user_result_row['coupon_description'] . "</td>
                  " . $status . "
                  <td>
                  <form method='post'>
                  <input type='hidden' name='coupon_status' id='coupon_status' value='".$cst."' >
                  <button type='submit' class='btn btn-success' name='active_coupon' value='" . $display_user_result_row['coupon_pk_id'] . "'><i class='fa fa-check'></i></button>
                  <button type='submit' class='btn btn-danger' name='delete_coupon' value='" . $display_user_result_row['coupon_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

        }
        echo $data;
    }

    public function add_tax()
    {
        if (isset($_POST['Tax_ref']))
        {
            $Tax_name = trim($_POST['Tax_name']);
            $Tax_amt = $_POST['Tax_amt'];
            dbconfig::dbperformm("INSERT INTO `tbl_taxes`(`tax_name`, `tax_per`, `tax_status`) VALUES  ('$Tax_name','$Tax_amt','1')");
            return 'success';
        }
        else
        {
            return 'failed';

        }

    }
    public function display_tax()
    {

        $data = '';
        $status = '';
        $display_user_result = dbconfig::dbperform("select * from `tbl_taxes`");

        while ($display_user_result_row = $display_user_result->fetch_assoc())
        {
            $status = $display_user_result_row['tax_status'] == 0 ? '<td><div class="btn btn-warning">In Active</div></td>' : '<td><div class="btn btn-success">Active</div></td>';

            $data .= "<tr>
                  <td>" . $display_user_result_row['tax_name'] . "</td>
                  <td>" . $display_user_result_row['tax_per'] . " %</td>
                  " . $status . "
                  <td>
                  <form method='post'>
                  <button type='submit' class='btn btn-success' name='active_tax' value='" . $display_user_result_row['tax_pk_id'] . "'><i class='fa fa-check'></i></button>
                  <button type='submit' class='btn btn-danger' name='delete_tax' value='" . $display_user_result_row['tax_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

        }
        echo $data;
    }

    // for front ui
    public function display_category_front_ui($parent)
    {

        $display_category_result = dbconfig::dbperform("select * from `tbl_category` where  cat_parent='$parent' and cat_status='1' ORDER BY cat_pk_id ASC");

        $data = '';

        while ($display_category_result_row = $display_category_result->fetch_assoc())
        {

            $data .= '<li>';

            $data .= '<a  href="' . $display_category_result_row['cat_url'] . '" >' . $display_category_result_row['category'] . '</a>';

            $parentid = $display_category_result_row['cat_pk_id'];

            $display_subcategory_result = dbconfig::dbperform("select * from `tbl_category` where  cat_parent='$parentid' and cat_status='1' ORDER BY cat_pk_id ASC");

            if ($display_subcategory_result)
            {

                $data .= ' <ul class="">';

                while ($display_subcategory_result_row = $display_subcategory_result->fetch_assoc())
                {

                    $data .= '<li><a  href="' . $display_subcategory_result_row['cat_url'] . '">' . $display_subcategory_result_row['category'] . '</a></li>';
                }
                $data .= '</ul>';
            }
            $data .= '</li>';
        }

        echo $data;
    }

    public function display_category_front_ui1($parent)
    {

        $display_category_result = dbconfig::dbperform("select * from `tbl_category` where  cat_parent='$parent' and cat_status='1' ORDER BY cat_pk_id ASC");

        $data = '';

        while ($display_category_result_row = $display_category_result->fetch_assoc())
        {

            $data .= '<li class="upper-links dropdown">';

            $data .= '<a class="links" href="#" style="color:black;">' . $display_category_result_row['category'] . '</a>';

            $parentid = $display_category_result_row['cat_pk_id'];

            $display_subcategory_result = dbconfig::dbperform("select * from `tbl_category` where  cat_parent='$parentid' and cat_status='1' ORDER BY cat_pk_id ASC");

            if ($display_subcategory_result)
            {

                $data .= '<ul class="dropdown-menu">';

                while ($display_subcategory_result_row = $display_subcategory_result->fetch_assoc())
                {

                    $data .= '<li class="profile-li"><a class="profile-links" href="' . $display_subcategory_result_row['cat_url'] . '">' . $display_subcategory_result_row['category'] . '</a></li>';
                }
                $data .= '</ul>';
            }
            $data .= '</li><br>';
        }

        echo $data;
    }

    public function display_category_front_ui_aside($parent)
    {

        $display_category_result = dbconfig::dbperform("select * from `tbl_category` where  cat_parent='$parent' and cat_status='1' ORDER BY cat_pk_id ASC");

        $data = '';

        while ($display_category_result_row = $display_category_result->fetch_assoc())
        {

            $data .= '<li><a href="filter-search?category=' . urlencode($display_category_result_row['category']) . '&color=&price-min=&price-max=">' . $display_category_result_row['category'] . '</a>';

            $data .= '</li>';
        }

        echo $data;
    }

    public function display_category_front_ui_below($parent)
    {

        $display_category_result = dbconfig::dbperform("select * from `tbl_category` where  cat_parent='$parent' and cat_status='1' ORDER BY cat_pk_id ASC limit 0,12");

        $data = '';

        while ($display_category_result_row = $display_category_result->fetch_assoc())
        {

            $data .= '<div class="col-xs-6 d-lg-none"  style="margin-bottom: 0px; " ><a style="color:#7fad39;"  href="' . $display_category_result_row['cat_url'] . '"><img height="97px" width="180px" src="img/' . $display_category_result_row['cat_image'] . '" alt="">' . $display_category_result_row['category'] . '</a></div>';

        }

        echo $data;
    }
        public function display_category_front_ui_middle($parent)
    {

        $display_category_result = dbconfig::dbperform("select * from `tbl_category` where  cat_parent='$parent' and cat_status='1' ORDER BY cat_pk_id ASC limit 0,8");

        $data = '';

        while ($display_category_result_row = $display_category_result->fetch_assoc())
        {

            $data .= ' <div class="col-xs-6 col-lg-3 mb-4">
                                <div class="category category-default1 category-absolute banner-radius overlay-zoom">
                                    <a href="'.$display_category_result_row['cat_url'].'">
                                        <figure class="category-media">
                                            <img src="admin/assets/'.$display_category_result_row['cat_image'].'" alt="category" style="height:280px;width:280px;" width="280"
                                                height="280" style="background-color: #e8eded;" />
                                        </figure>
                                    </a>
                                    <div class="category-content font-weight-bold">
                                        <h4 class="category-name font-weight-bold ls-l"><a href="'.$display_category_result_row['cat_url'].'">'.$display_category_result_row['category'].'</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>';

        }

        echo $data;
    }
    public function displaySub($parent, $product_id)
    {
        $ids = join(',', $parent);  
        $data = '';
        $query = dbconfig::dbperform("select * from `tbl_subCategory` WHERE category_id in ($ids) and cat_status=1");
        $proquery = dbconfig::dbperform("select * from `tbl_product` WHERE `product_pk_id`='$product_id'");
        $prorow=$proquery->fetch_assoc();
        $subcategories = str_replace( array('[',']','"') , ''  , $prorow['product_sub_cat']);
            $subcategories = explode(",",$subcategories);
      
        if ($query->num_rows > 0)
        {
            $data .= '<option value="">--Select--</option>';
            
            while ($row = $query->fetch_assoc()){
                            echo '<option value="' . $row['id'] . '"';foreach ($subcategories as $category) { if($category == $row['id'])echo 'selected';} echo ' >'.$row['category'] . '</option>';
                            }
            
        }else{
             $data .= '<option value="">No Sub Category</option>';
        }
        echo $data;
    }
    
    public function displayChild($parent, $product_id)
    {
        $ids = join(',', $parent);  
        $data = '';
        $query = dbconfig::dbperform("select * from `tbl_childcategory` WHERE product_sub_cat in ($ids)");
        
        $proquery = dbconfig::dbperform("select * from `tbl_product` WHERE `product_pk_id`='$product_id'");
        $prorow=$proquery->fetch_assoc();
        $childcategories = str_replace( array('[',']','"') , ''  , $prorow['product_child_cat']);
            $childcategories = explode(",",$childcategories);
      
        if ($query->num_rows > 0)
        {
            $data .= '<option value="">--Select--</option>';
            
            while ($rowchild = $query->fetch_assoc()){
                            echo '<option value="' . $rowchild['child_pk_id'] . '"';foreach ($childcategories as $category) { if($category == $rowchild['child_pk_id'])echo 'selected';} echo ' >'.$rowchild['child_category'] . '</option>';
                            }
            
        }else{
             $data .= '<option value="">No Sub Category</option>';
        }
        echo $data;
    }
    
    public function displayBrand()
    {
        $data = '';
        $query = dbconfig::dbperform("select * from `tbl_brand`");

        if ($query->num_rows > 0)
        {
            while ($row = $query->fetch_assoc())
            {
                $data .= '<option value="' . $row['brand_id'] . '">' . $sub_mark . $row['brand_name'] . '</option>';
            }
        }
        echo $data;
    }
    
     public function displaySize()
    {
        $data = '';
        $query = dbconfig::dbperform("select * from `tbl_size`");

        if ($query->num_rows > 0)
        {
            while ($row = $query->fetch_assoc())
            {
                $data .= '
				<input type="checkbox" name="size[]" value="'. $row['size_id'] . '" > '. $row['size_name'] .' ';
            }
        }
        echo $data;
    }
    
     public function displayColor()
    {
        $data = '';
        $query = dbconfig::dbperform("select * from `tbl_color`");
        $num=0;
        if ($query->num_rows > 0)
        {
           
			 
            while ($row = $query->fetch_assoc())
            {
               
				$data .='<option value="'.$row['color_id'].'">'.$row['color_name'].'</option>';
				
               
            }
            echo $data;	
        }
        	
        
    }
    
      public function displaySizeDropdown()
    {
        $data = '';
        $query = dbconfig::dbperform("select * from `tbl_size`");
        $num=0;
        if ($query->num_rows > 0)
        {
           
			 
            while ($row = $query->fetch_assoc())
            {
               
				$data .='<option value="'.$row['size_id'].'">'.$row['size_name'].'</option>';
				
               
            }
            echo $data;	
        }
        	
        
    }
    public function displayProductType()
    {
        $data = '';
        $query = dbconfig::dbperform("select * from `tbl_productType` Order By post_title ASC");

        if ($query->num_rows > 0)
        {
            while ($row = $query->fetch_assoc())
            {
                $data .= '<option value="' . $row['id'] . '">' . $sub_mark . $row['post_title'] . '</option>';
            }
        }
        echo $data;
    }
    // public function display_page($url)
    // {

    //     $display_category_result = dbconfig::dbperform("select * from tbl_category where cat_url='$url' and cat_status='1'");

    //     $row = $display_category_result->fetch_assoc();

    //     $switch_case_control = '';

    //     $flag = 0;

    //     if ($row['cat_parent'] == 0)
    //     {

    //         $switch_case_control = 0;
    //         $flag = 1;

    //     }
    //     if ($row['cat_parent'] > 0)
    //     {

    //         $switch_case_control = 1;
    //         $flag = 1;

    //     }

    //     $display_category_result = dbconfig::dbperform("select * from tbl_product where product_url='$url' and product_status='1'");

    //     if ($display_category_result->num_rows > 0)
    //     {

    //         $switch_case_control = 2;
    //     }

    //     switch ($switch_case_control)
    //     {

    //         case 0:
    //             require_once "cat-parent.php";
    //         break;

    //         case 1:
    //             require_once "sub-category.php";
    //         break;

    //         case 2:
    //             require_once "description.php";
    //         break;

    //         default:
    //             require_once "404.php";
    //     }

    // }
    
     public function display_page($url)
    {

       $switch_case_control = '';

        $flag = 0;
// page page
$display_category_result = dbconfig::dbperform("select * from tbl_posts where post_url='$url' and post_status='1'");
$switch_case_control = '';
        if ($display_category_result->num_rows > 0)
        {
        $row = $display_category_result->fetch_assoc();
        // print_r($row);
            $switch_case_control = 2;
            $flag = 2;
        }

        $display_category_result = dbconfig::dbperform("select * from tbl_product where product_url='$url' and product_status='1'");

        if ($display_category_result->num_rows > 0)
        {

            $switch_case_control = 2;
        }
        
//Sub Category Page
        
        $display_category_result = dbconfig::dbperform("select * from tbl_subCategory where cat_url='$url' and cat_status='1'");
    //   print_r($display_category_result);
        if($display_category_result->num_rows > 0){
             $row = $display_category_result->fetch_assoc();        
            $switch_case_control =1;
            $flag = 1;
        }
     
    //Category Page
        
        $display_category_result = dbconfig::dbperform("select * from tbl_category where cat_url='$url' and cat_status='1'");
              // print_r($display_category_result);
        if($display_category_result->num_rows > 0){
            $row = $display_category_result->fetch_assoc();
            $switch_case_control =4;
            $flag = 1;
        }
      
   //Brand Page
        
        $display_category_result = dbconfig::dbperform("select * from tbl_brand where brand_url='$url' and brand_status='1'");
              // print_r($display_category_result);
        if($display_category_result->num_rows > 0){
            $row = $display_category_result->fetch_assoc();
            $switch_case_control =5;
            $flag = 1;
        }  
//Product Page
        // $row='';
        $display_product_result = dbconfig::dbperform("select * from tbl_product where product_url='$url' and product_status='1'");
        if($display_product_result->num_rows > 0){ 
            $row = $display_product_result->fetch_assoc();  
            $switch_case_control =3;
            $related_products = dbconfig::dbperform("select * from tbl_product where product_cat='".$row['product_cat']."' and product_status='1' and product_pk_id!='".$row['product_pk_id']."' limit 4");
            if($related_products->num_rows > 0){
                $related_products_row = $related_products->fetch_assoc();
            }
            $flag = 1;
        }
             

// echo "------------";
        switch ($switch_case_control)
        {

          
            case 1:  
                require_once "sub-category-product.php";
            break;

            case 2:
                require_once "page.php";
            break;
            
            case 3:  
                require_once "product-detail.php";
            break;
            
            case 4: 
                require_once "category_product_backup.php";
            break;
            
            case 5: 
                require_once "brand-product.php";
            break;


            default:
                require_once "404.php";
        }

    }
    public function display_main_category_product($url)
    {

        $display_category_result = dbconfig::dbperform("select * from tbl_category  where tbl_category.cat_url='$url' and tbl_category.cat_status='1'");

        $display_category_result_row = $display_category_result->fetch_assoc();

        $display_category_result1 = dbconfig::dbperform("select * from tbl_category  where tbl_category.cat_parent='" . $display_category_result_row['cat_pk_id'] . "' and tbl_category.cat_status='1' ORDER BY cat_pk_id ASC limit 0,12");

        $data = '';

        while ($display_category_result_row1 = $display_category_result1->fetch_assoc())
        {

            $data .= '<div class="col-xs-6 d-lg-none"  style="margin-bottom: 0px; " ><a style="color:#7fad39;" href="' . $display_category_result_row1['cat_url'] . '"><img height="97px" width="180px" style="max-width: -webkit-fill-available;" src="img/' . $display_category_result_row1['cat_image'] . '" alt="">' . $display_category_result_row1['category'] . '</a></div>';

        }

        echo $data;

    }
    public function display_index_productBestDeal()
    {

        $display_category_result = dbconfig::dbperform("select * from  tbl_product inner join tbl_brand on tbl_brand.brand_id = tbl_product.brand_fk_id where best_deal='1' and product_status='1' group by product_url limit 0,5");

        $data = '';
        $image = '';
        $i = 0;
        $varient = '';
        if ($display_category_result->num_rows > 0)
        {

            while ($row = $display_category_result->fetch_assoc())
            {

                $keys = json_decode($row['product_image'], true);

                if (strpos($keys[0], 'https') !== false || strpos($keys[0], 'http') !== false || strpos($keys[0], 'www') !== false)
                {

                    $image = "<img  class= 'image_pro'   src=" . $keys[0] . ">  ";
                }
                else
                {
                    $image = "admin/assets/$keys[0]";
                }
             


                $data .= ' <div class="product text-center">
                            <figure class="product-media">
                                <a href="'.$row['product_url'].'">
                                    <img src="'.$image.'" alt="Blue Pinafore Denim Dress"
                                        width="280" height="315px" style="background-color: #f2f3f5;height:400px;width:280px;" />
                                </a>
                           
                                <div class="product-action">
                                    <a href="'.$row['product_url'].'" class="btn-product " title="View Details">View Details</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                
                                <h3 class="product-name">
                                    <a href="'.$row['product_url'].'">'.$row['product_title'].'</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">₹ '.$row['discount'].'</span>
                                </div>
                             
                            </div>
                        </div>
';
            }
        }
        else
        {

            $data .= '  <div class="product text-center">
                            No Product Found
                        </div>';
        }

        echo $data;

    }
        public function display_index_productRecentDeal()
    {

        $display_category_result = dbconfig::dbperform("select * from  tbl_product inner join tbl_brand on tbl_brand.brand_id = tbl_product.brand_fk_id where best_deal='1' and product_status='1' group by product_url order by product_pk_id DESC limit 0,5");

        $data = '';
        $image = '';
        $i = 0;
        $varient = '';
        if ($display_category_result->num_rows > 0)
        {

            while ($row = $display_category_result->fetch_assoc())
            {

                $keys = json_decode($row['product_image'], true);

                if (strpos($keys[0], 'https') !== false || strpos($keys[0], 'http') !== false || strpos($keys[0], 'www') !== false)
                {

                    $image = "<img  class= 'image_pro'   src=" . $keys[0] . ">  ";
                }
                else
                {
                    $image = "admin/assets/$keys[0]";
                }
             


                $data .= ' <div class="product text-center">
                            <figure class="product-media">
                                <a href="'.$row['product_url'].'">
                                    <img src="'.$image.'" alt="Blue Pinafore Denim Dress"
                                        width="280" height="315" style="background-color: #f2f3f5;" />
                                </a>
                           
                                <div class="product-action">
                                    <a href="'.$row['product_url'].'" class="btn-product " title="View Details">View Details</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                
                                <h3 class="product-name">
                                    <a href="'.$row['product_url'].'">'.$row['product_title'].'</a>
                                </h3>
                                <div class="product-price">
                                    <span class="price">₹ '.$row['discount'].'</span>
                                </div>
                             
                            </div>
                        </div>
';
            }
        }
        else
        {

            $data .= '  <div class="product text-center">
                            No Product Found
                        </div>';
        }

        echo $data;

    }
    public function display_index_product2($url, $page)
    {

        $limit = 5;

        if (!empty($page))
        {
            $pn = $page;
        }
        else
        {
            $pn = 1;
        };

        $start_from = ($pn - 1) * $limit;
        $display_category_result = dbconfig::dbperform("select * from tbl_category inner join tbl_product on tbl_product.product_sub_cat=tbl_category.cat_pk_id where tbl_category.cat_url='$url' and tbl_category.cat_status='1' and tbl_product.product_status='1'  ");
        $i = 0;
        $row = $display_category_result->fetch_assoc();
        $data = '<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <div class="breadcrumb__text">
                     <div class="breadcrumb__option">
                        <a href="index.php">Home</a>
                        <span>'.$row['category'].'</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div class="container">
         <div class="row" style="margin-top: 20px;">';
        $image = '';
        $varient = '';
        if ($display_category_result->num_rows > 0)
        {

            while ($row = $display_category_result->fetch_assoc())
            {
                $varient = '<select class="form-control qlt_box1" style=" margin-top:px;font-size:12px; max-width:80px; width:100%;" style="z-index:;">';

                $keys = json_decode($row['product_image'], true);

                if (strpos($keys[0], 'https') !== false || strpos($keys[0], 'http') !== false || strpos($keys[0], 'www') !== false)
                {

                    $image = "<img class='image_pro' src=" . $keys[0] . ">  ";
                }
                else
                {
                    $image = "<img class='image_pro' src=img/" . $keys[0] . ">  ";
                }
                if ($row['product_varient'] != '')
                {

                    $varient .= '<option> ' . $row['product_varient'] . '</option>';

                }
                else
                {

                    $varient .= '<option>N/A</option>';

                }
                $data .= '<div class="col-md-12 m-3 p-3" style="border: 1px solid red;" >
               <div class="latest-product__item__pic">
                 ' . $image . '
               </div>
               <div class="latest-product__item__text" style="padding:0;">
                  <h6>' . $row['brand_name'] . '</h6>
                  <h5 style="margin-top: -10px;"><b>' . $row['product_title'] . '</b></h5>
              
                  <div style="width: 45%; float: left;margin-right: 10px; ">
                   ' . $varient . ' 
                  </select>
                  </div>
                  <div id="input_div"  class="pr-lg-5 pr-sm-2 ">
                     <input type="button" value="-" id="moins'.$i.'" onclick="minus'.$i.'()" class="ml-lg-4 ml-sm-1">
                     <input type="text" size="25" value="1" id="count'.$i.'" style="max-width:19px;width:100%;">
                     <input type="button" value="+" id="plus'.$i.'" onclick="plus'.$i.'()" style="width:22px;">
                  </div>
               </div>
               <div style="width: 50%; float: left; "   class="mt-3">
                  <p style="text-decoration: line-through; padding-right: 3px;font-size:14px;"> MRP Rs. ' . $row['product_price'] . '</p>
                  <p style="margin-top: -25px; padding-left: 3px;font-size:14px;"><b>Rs. ' . $row['discount'] . '</b></p>
               </div>
               <div style="width: 40%; float: right; ">
             
                  <button class="product_add_btn"   onClick = "cartAction(' . "'add'" . ',' . "'$i'" . ',' . "'" . $row['product_pk_id'] . "'" . ',' . "'" . $row['product_price'] . "'" . ');">Add</button>
               </div>
            </div>';
                $i++;
            }

            // $sql = "select * from tbl_category inner join tbl_product on tbl_product.product_sub_cat=tbl_category.cat_pk_id where tbl_category.cat_url='$url' and tbl_category.cat_status='1' and tbl_product.product_status='1'";
            // $rs_result = dbconfig::dbperform($sql);
            // $total_records = $rs_result->num_rows;

            // // Number of pages required.
            // $total_pages = ceil($total_records / $limit);
            // $pagLink = "<div class='pagination' style='text-align:center;'>";
            // if (($page > 1) && ($pn > 1))
            // {
            // $Next =  $pn-1 ;
            // $pagLink .= "<a style=''  href='$url?page=" .$Next. "'> Prev</a>";            
            // }
                
            // for ($i = 1;$i <= $total_pages;$i++)
            // {
            //     if ($i == $pn)
            //     {
            //         // code
            //         $pagLink .= "<a class='active'  href='$url?page=" . $i . "'>" . $i . "</a>";
            //     }
            //     else
            //     {
            //         $pagLink .= "<a   href='$url?page=" . $i . "'>" . $i . "</a>";

            //     }
            
               
            // }
           
            // if (($page > 1) && ($pn < $total_pages))
            // {
            //  $Next =  $pn+1 ;
            //  $pagLink .= "<a style=''  href='$url?page=" .$Next. "'> Next</a>";            
            // }
            // $pagLink .= "</div>";
          
        }
        else
        {

            $data .= '<div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <div class="single_product_text">
                                    <h4>No Product Found</h4>
                                </div>
                            </div>
                        </div>';
        }

        echo $data;
    }
    public function display_index_jquery_product()
    {

        $display_category_result = dbconfig::dbperform("select * from  tbl_product where best_deal='1' and product_status='1' limit 0,10");

        $data = '';
        $image = '';
        $i = 0;

        if ($display_category_result->num_rows > 0)
        {

            while ($row = $display_category_result->fetch_assoc())
            {

                $data .= 'var count' . $i . ' = 1;
             var countE' . $i . ' = document.getElementById("count' . $i . '");
             function plus' . $i . '(){
                 count' . $i . '++;
                 countE' . $i . '.value = count' . $i . ';
             }
             function minus' . $i . '(){
               if (count' . $i . ' > 1) {
                 count' . $i . '--;
                 countE' . $i . '.value = count' . $i . ';
               }  
             }';
                $i++;
            }
        }
        echo $data;

    }
    public function display_index_jquery_product2($url)
    {

        $display_category_result = dbconfig::dbperform("select * from tbl_category inner join tbl_product on tbl_product.product_sub_cat=tbl_category.cat_pk_id where tbl_category.cat_url='$url' and tbl_category.cat_status='1' and tbl_product.product_status='1'  ");

        $data = '';
        $image = '';
        $i = 0;

        if ($display_category_result->num_rows > 0)
        {

            while ($row = $display_category_result->fetch_assoc())
            {

                $data .= 'var count' . $i . ' = 1;
             var countE' . $i . ' = document.getElementById("count' . $i . '");
             function plus' . $i . '(){
                 count' . $i . '++;
                 countE' . $i . '.value = count' . $i . ';
             }
             function minus' . $i . '(){
               if (count' . $i . ' > 1) {
                 count' . $i . '--;
                 countE' . $i . '.value = count' . $i . ';
               }  
             }';
                $i++;
            }
        }
        echo $data;

    }
    public function display_product_desc($url)
    {

        $display_category_result = dbconfig::dbperform("select * from tbl_product  where product_url='$url' and product_status='1' order by product_pk_id desc limit 0,1");

        $data = '';

        if ($display_category_result->num_rows > 0)
        {
            $row = $display_category_result->fetch_assoc();

            $data .= '<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>'.$row['product_title'].'</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <a href="">'.$row['product_title'].'</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-details spad">
        <div class="container">
            <div class="row">
             <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                      ';

            $image = json_decode($row['product_image'], true);

            $count = count($image);
            $stock = $row['product_quantity']>0? 'In Stock':'Out Of Stock';
            $brand_name = !empty($row['brand_name']) ? $row['brand_name'] : 'Bonzo Kids';
            $brand_logo = !empty($row['brand_logo']) ? '<img style="margin-top: 15px;" height="100px" width="100px" src="' . $row['brand_logo'] . '">' : '';

            

            if (strpos($image[0], 'https') !== false || strpos($image[0], 'http') !== false || strpos($image[0], 'www') !== false)
            {

                $data.= '  <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"src="img/'.$image[0].'" alt="">
                        </div>';

            }
            else
            {
               $data.= '  <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"src="img/'.$image[0].'" alt="">
                        </div>';

            }

            foreach ($image as $key)
            {
                if (strpos($key, 'https') !== false || strpos($key, 'http') !== false || strpos($key, 'www') !== false)
                {

                    $data.='  <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/"src="img/' . $key . '" alt="">
                        </div>';

                }
                else
                {

                   $data.='  <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/"src="img/' . $key . '" alt="">
                        </div>';

                }

            }
            $data.='</div>
                </div>';
         
            $desc = $row['product_desc']=='' ? 'N/A': $row['product_desc'];
            $data .= '             
                
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>'.$row['product_title'].'</h3>

                        <ul>
                             <li><b>Price</b> <span>'.$row['product_price'].'</span></li>
                            <li><b>Discount Price</b> <span>'.$row['discount'].'</span></li>
                            <li><b>Availability</b> <span>'.$stock.'</span></li>
                            <li><b>Weight</b> <span>'.$row['product_varient'].'</span></li>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                         
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <p>'. $desc .'</p>
                                </div>
                            </div>
                      
                        </div>
                          
                          <div id="input_div" class="pr-lg-5 pr-sm-2 " style="margin-top:20px;" >
                     <input type="button" value="-" id="moins" onclick="minus()" class="ml-2">
                     <input type="text" size="25" value="1" id="count" style="max-width:19px;width:100%;">
                     <input type="button" value="+" id="plus" onclick="plus()"style="width:22px;">
                  </div>
                    <div style="width: 40%; float: right; ">
             
                  <button class="product_add_btn"  style=""   onClick = "cartActiondesc(' . "'add'" . ',' . "''" . ',' . "'" . $row['product_pk_id'] . "'" . ',' . "'" . $row['product_price'] . "'" . ');">Add</button>
               </div>
                    </div>
                </div>
            </div>
        </div>
    </section>';

        }

        echo $data;

    }

    public function ajax_live_search($keyword)
    {

        if (isset($_POST['ajax_live_search_ref']))
        {

            $display_category_result = dbconfig::dbperform("select * from tbl_category where tbl_category.cat_status='1' and category LIKE '%$keyword%'");
            $display_product_result = dbconfig::dbperform("select * from tbl_product where tbl_product.product_status='1' and product_keyword LIKE '%$keyword%'");

            $data = '<ul id="country-list">';

            if ($display_category_result->num_rows > 0)
            {

                while ($row = $display_category_result->fetch_assoc())
                {

                    $data .= '<a style="text-decoration: none;" class="" href="' . $row['cat_url'] . '"><li style="width: -webkit-fill-available;">' . $row['category'] . '</li></a>';

                }
            }

            if ($display_product_result->num_rows > 0)
            {

                while ($row = $display_product_result->fetch_assoc())
                {

                    $data .= '<a style="text-decoration: none;" class="" href="' . $row['product_url'] . '"><li style="width: -webkit-fill-available;">' . $row['product_title'] . '</li></a>';

                }
            }
            if ($display_category_result->num_rows == 0 && $display_product_result->num_rows == 0)
            {
                $data .= '<a style="text-decoration: none;" class="" href="#"><li style="width: -webkit-fill-available;">No Results Found</li></a>';
            }
            $data .= '</ul>';
            echo $data;
        }
    }
    public function cart()
    {

        if (isset($_POST['cart_action']) && !empty($_POST['cart_action']))
        {

            $switch_case_selector = $_POST['cart_action'] !== '' ? $_POST['cart_action'] : '';
            $product_id = $_POST['product_id'] !== '' ? $_POST['product_id'] : '';
            $product_quantity = $_POST['cart_quantity'] !== '' ? $_POST['cart_quantity'] : '';
            $product_price = $_POST['product_price'] !== '' ? $_POST['product_price'] : '';
            switch ($switch_case_selector)
            {

                case "add":

                    if (!empty($_SESSION['cart']))
                    {

                        if (array_key_exists($product_id, $_SESSION['cart']))
                        {

                            $_SESSION['cart'][$product_id]['quantity'] = $_SESSION['cart'][$product_id]['quantity'] + $_POST['cart_quantity'];
                            echo count($_SESSION['cart']);

                        }
                        else
                        {

                            $_SESSION['cart'][$product_id] = array(
                                "quantity" => $product_quantity,
                                "price" => $product_price
                            );
                            echo count($_SESSION['cart']);

                        }

                    }
                    else
                    {

                        $_SESSION['cart'][$product_id] = array(
                            "quantity" => $product_quantity,
                            "price" => $product_price
                        );
                        echo count($_SESSION['cart']);

                    }

                break;
                
                case "deduct":

                    if (!empty($_SESSION['cart']))
                    {

                        if (array_key_exists($product_id, $_SESSION['cart']))
                        {

                            $_SESSION['cart'][$product_id]['quantity'] = $_SESSION['cart'][$product_id]['quantity'] - $_POST['cart_quantity'];
                            if($_SESSION['cart'][$product_id]['quantity']==0){
                                unset($_SESSION['cart'][$product_id]);
                            }
                            echo "de";

                        }


                    }
                   

                break;

                case "remove":
                    if (!empty($_SESSION['cart']))
                    {

                        if (array_key_exists($product_id, $_SESSION['cart']))
                        {

                            unset($_SESSION['cart'][$product_id]);
                            echo 'unset';

                        }
                        else
                        {
                            echo 'N/a Product';

                        }
                    }
                break;

                case "empty":
                    if (!empty($_SESSION['cart']))
                    {

                        unset($_SESSION['cart']);
                        echo 'cunset';

                    }
                break;
                default:
                    echo "N/A Action ";

            }

        }

    }

    public function display_cart_ui($cart_key)
    {

        $product_id = array_keys($cart_key);

        $data = '';
        $tax = '';
        $total = '';
        $counter = count($product_id);
        $temp=0;
        $sub_total = 0;
        $alert = '';
        foreach ($product_id as $key)
        {

            $display_cart_result = dbconfig::dbperform("select * from tbl_product where product_pk_id=$key");

            while ($row = $display_cart_result->fetch_assoc())

            {
                $image = json_decode($row['product_image'], true);

                if (strpos($image[0], 'https') !== false || strpos($image[0], 'http') !== false || strpos($image[0], 'www') !== false)
                {

                    $cart_image = '<img class="img-fluid " style="height:120px;width:110px;" src="' . $image[0] . '" >';
                }
                else
                {
                    $cart_image = '<img class="img-fluid " style="height:120px;width:110px;" src="img/' . $image[0] . '" >';

                }
                if( $cart_key[$key]['quantity'] > $row['product_quantity']){
                    
                    $cart_key[$key]['quantity'] = $row['product_quantity'];
                    $_SESSION['cart'][$key]['quantity'] = $row['product_quantity'];
                    $alert .= '<p style="background-color:red;color:white;">'.$row['product_title'].' Exceeds To Its Available Quantity , Quantity Sets To Its Available Quantity</p><br><br>';
                    
                }
        
                
                $sub_total += $cart_key[$key]['quantity'] * $row['discount'];
                $sub_total1 = $cart_key[$key]['quantity'] * $row['discount'];
                $sub_total2 += $cart_key[$key]['quantity'] * $row['product_price'];

                $data .= ''.$alert.'        <div class="pt-4 wish-list">


          <div class="row mb-4">
            <div class="col-md-5 col-lg-3 col-xl-3">
               <div class="row">
                   <div class="col-6">
              <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
             '.$cart_image.'
              </div>
              </div>
              <div class="col-6 text-right">
                 <h5>'.$row['product_title'].'</h5>
                    <p class="mb-3 text-muted text-uppercase small">Discount Price - '.$row['discount'].'</p>
                    <p class="mb-2 text-muted text-uppercase small">Quantity: '.$cart_key[$key]['quantity'].'</p>
                    <p class="mb-3 text-muted text-uppercase small">Total: '.$sub_total1.'</p>  
                  
              </div>
              
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
                
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                   
                    
                  </div>
                  <div>
                <span style="margin-left:20px;">Add</span> <span style="margin-left:15px;">  Remove</span> 
                    <small id="passwordHelpBlock" class="form-text text-muted text-center"> 
                   <td style="padding-left: 28px;">
                      <input type="button" style="margin-left: 17px; " id="add_cart_' . $row['product_pk_id'] . '" class="add_cart btn btn-success" value="+" onClick = "cartActionnu(' . "'add'" . ',' . "'1'" . ',' . "'" . $row['product_pk_id'] . "'" . ',' . "'" . $row['product_price'] . "'" . ');">
                    </td>
                  <td style="padding-left: 28px;">
                      <button type="button" style="margin-left: 17px; " class="btn btn-warning"onClick = "cartActionde(' . "'deduct'" . ',' . "'1'" . ',' . "'" . $row['product_pk_id'] . "'" . ',' . "'" . $row['product_price'] . "'" . ');">
                      x
                      </button>
                    <!--  <td style="padding-left: 28px;">
                      <button type="button" style="margin-left: 17px; " class="btn btn-danger"onClick = "cartActionn(' . "'remove'" . ',' . "'1'" . ',' . "'" . $row['product_pk_id'] . "'" . ',' . "'" . $row['product_price'] . "'" . ');">
                      <i class="fa fa-trash"></i>
                      </button>
                        </td> -->  
                   </tr>                    </small>
                  </div>
                </div>
              
              </div>
            </div>
          </div>
          <hr class="mb-4">


        </div>';
                
        $tax = intval($row['product_gst']) / 100;
        $total = $sub_total1 + ($sub_total1 * $tax);
        $temp = $temp +$total;
        $total =0;
                

            }
        }

     
       $savnigs = $sub_total2-$sub_total;

        $data .= ' </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="index.php" class="primary-btn cart-btn cart_btn_style">CONTINUE SHOPPING</a>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>₹ ' . $sub_total . '</span></li>
                            <li>Total Saving <span>₹ ' . $savnigs . '</span></li>
                            <li>Total ( + GST ) <span>₹ ' . $temp . '</span></li>
                        </ul>
                        <a href="payment-met" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>';

        $_SESSION['amt'] = $temp;
        echo $data;
    }

    public function place_order($ORDER_ID, $CUST_ID, $TXN_AMOUNT, $cart_array)
    {

        $cart_keys = array_keys($cart_array);
        $date = date("d F Y h:i:s A");
        foreach ($cart_keys as $keys)
        {
            $quantity = $cart_array[$keys]['quantity'];
            dbconfig::dbperformm("INSERT INTO `tbl_order`(`order_id`, `product_fk_id`,`product_quantity`, `user_fk_id`, `order_status`, `order_date`) VALUES ('$ORDER_ID','$keys','$quantity','$CUST_ID','0','$date')");
        }
        dbconfig::dbperformm("INSERT INTO `tbl_transaction`( `order_id`, `user_fk_id`, `transaction_status`, `transaction_mode`, `transaction_date`) VALUES ('$ORDER_ID','$CUST_ID','0','paytm','$date')");

    }

    public function update_order($ORDERID, $cart_array, $BANKNAME, $PAYMENTMODE, $deladdr)
    {

        $cart_keys = array_keys($cart_array);
        $mode = 'PayTM (' . $BANKNAME . ' ) ( ' . $PAYMENTMODE . ' )';
        $date = date("d F Y h:i:s A");
        foreach ($cart_keys as $keys)
        {
            $quantity = $cart_array[$keys]['quantity'];
            $order_result = dbconfig::dbperform("select product_user,product_quantity  from `tbl_product`  where product_pk_id='$keys'");
            $vendor_email = '';
            if ($order_result->num_rows > 0)
            {
                $order_row = $order_result->fetch_assoc();

                $vendor_result = dbconfig::dbperform("select user_email  from `tbl_user`  where user_pk_id='$keys'");
                $vendor_result_row = $vendor_result->fetch_assoc();
                $vendor_email = $vendor_result_row['user_email'];
                $left_quantity = intval($order_row['product_quantity']);
                $left_quantity = $left_quantity - $quantity;
                if ($left_quantity <= 0)
                {
                    $left_quantity = 0;
                    dbconfig::dbperformm("update  `tbl_product` set product_quantity ='$left_quantity', product_status='2',product_out='$date' where product_pk_id='$keys'");

                }
                else
                {

                    dbconfig::dbperformm("update  `tbl_product` set product_quantity ='$left_quantity' where product_pk_id='$keys'");

                }

            }

        }

        dbconfig::dbperformm("update  `tbl_order` set order_status ='1' where order_id='$ORDERID'");

        dbconfig::dbperformm("update `tbl_transaction` set transaction_status='1' ,transaction_mode='$mode',del_addr='$deladdr' where order_id='$ORDERID'");

        $to = "tsingal763@gmail.com";

        $subject = "Order Placed";

        $txt = " Hello Admin,\n An Order Has Been Placed, \n Order Id:- " . $ORDERID . "\n Payment Mode:-" . $mode;

        $headers = "From: ashuboxitin@gmail.com" . "\r\n";

        mail($to, $subject, $txt, $headers);

        // for vendor email
        $to = $vendor_email;

        $subject = "Order Placed";

        $txt = " Hello Vendor,\n An Order Has Been Placed, \n Order Id:- " . $ORDERID . "\n Payment Mode:-" . $mode;

        $headers = "From: ashuboxitin@gmail.com" . "\r\n";

        mail($to, $subject, $txt, $headers);
    }
    public function display_order()
    {
        $data = '';
        $status = '';
        $display_order_result = dbconfig::dbperform("select order_id,product_title,tbl_order.product_quantity as order_quantity,product_price,full_name,user_role,order_date,order_status 
        
        from `tbl_order` inner join tbl_product on tbl_product.product_pk_id=tbl_order.product_fk_id inner join tbl_user on tbl_user.user_pk_id=tbl_order.user_fk_id");

        while ($display_order_result_row = $display_order_result->fetch_assoc())
        {
            $status = $display_order_result_row['order_status'] == 0 ? '<td><div class="btn btn-danger">Pending</div></td>' : '<td><div class="btn btn-success">Paid</div></td>';

            $data .= "<tr>
                  <td>" . $display_order_result_row['order_id'] . "</td>
                  <td>" . $display_order_result_row['product_title'] . " </td>
                  <td>" . $display_order_result_row['order_quantity'] . "</td>
                  <td>" . $display_order_result_row['product_price'] . " </td>
                  <td>" . $display_order_result_row['full_name'] . " ( " . $display_order_result_row['user_role'] . " )</td>
                  " . $status . "
                  <td>
                  " . $display_order_result_row['order_date'] . "
                  </td>
                </tr>";

        }
        echo $data;

    }
    public function display_transactions()
    {
        $data = '';
        $status = '';
        $display_order_result = dbconfig::dbperform("select * from `tbl_transaction`  inner join tbl_user on tbl_user.user_pk_id=tbl_transaction.user_fk_id");

        while ($display_order_result_row = $display_order_result->fetch_assoc())
        {
            $status = $display_order_result_row['transaction_status'] == 0 ? '<td><div class="btn btn-danger">Pending</div></td>' : '<td><div class="btn btn-success">Paid</div></td>';

            $data .= "<tr>
                  <td>" . $display_order_result_row['order_id'] . "</td>
                  <td>" . $display_order_result_row['full_name'] . " ( " . $display_order_result_row['user_role'] . " )</td>
                  <td>" . $display_order_result_row['transaction_mode'] . " </td>
                  " . $status . "
                  <td>" . $display_order_result_row['transaction_date'] . " </td>
                                    <td>" . $display_order_result_row['del_addr'] . " </td>

                  
                </tr>";

        }
        echo $data;

    }

    // pickrr Api
    public function PincodeServiceCheck($from_pincode, $to_pincode)
    {
        $url = 'http://pickrr.com/api/check-pincode-service/';

        $data = array(
            'from_pincode' => $from_pincode,
            'to_pincode' => $to_pincode,
            'auth_token' => 'd1a4af4ce78afd17588315fc1b4cddd2123224',
        );

        $params = '';
        foreach ($data as $key => $value) $params .= $key . '=' . $value . '&';

        $params = trim($params, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . '?' . $params); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

    }
    public function createShipment($ORDERID, $cart_array, $TXNAMOUNT, $delpin, $deladdr)
    {

        $product_id = array_keys($cart_array);

        $total_quantity = 0;

        $product_name = '';

        $loc_result = json_decode($this->get_user_loc_by_ip($_SERVER['REMOTE_ADDR']) , true);

        $loc_result_zip = $loc_result['zip'];

        $loc_result_region_name = $loc_result['region_name'];

        foreach ($product_id as $key)
        {

            $display_cart_result = dbconfig::dbperform("select product_title from tbl_product where product_pk_id=$key");

            while ($row = $display_cart_result->fetch_assoc())

            {

                $product_name .= $row['product_title'] . " | ";
                $total_quantity += $cart_array[$key]['quantity'];
            }

        }

        $full_name_result = $display_result = dbconfig::dbperform("select * from tbl_user where user_pk_id=" . $_SESSION['key_id']);
        $full_name_result_row = $full_name_result->fetch_assoc();

        $address = '';
        $pincode = '';
        $flag = 0;

        $addr1 = 'Bonzokids Lifestyle, 1st Floor, Single Street, Balaramapuram PO.Trivandrum, Kerala';
        $addr2 = 'Bhangel Market, Dadri Main Rd, Goyal Colony, Salarpur Khadar, Sector 102, Noida, Uttar Pradesh';
        $addr3 = 'Shipra mall Indirapuram lower ground floor-57/58 near fun land Uttar Pradesh';
        $addr4 = 'Shop no - 203, II floor, GIP mall,Noida, Sector 38A Uttar Pradesh';
        $addr5 = 'Above Mufti and Puma store, Court road, near canara bank, Saharanpur ,Uttar Pradesh';
        $addr6 = 'Shop no - 109 first floor Pink Square Mall, Raja Park, Jaipur, Rajasthan';
        $addr7 = 'Shop no - S-36 first floor Triton Mall, Jothwara, Jaipur, Rajasthan';
        $addr8 = 'A-218, Sahdeo Mahto Marg Sri Krishna Puri Opposite to Hari Lal Sweet Patna, Bihar';

        $pin1 = '695501';
        $pin2 = '201304';
        $pin3 = '201014';
        $pin4 = '201301';
        $pin5 = '247001';
        $pin6 = '302004';
        $pin7 = '302039';
        $pin8 = '800001';

        if (strpos($addr1, $loc_result_region_name) !== false)
        {
            $address = $addr1;
            $pincode = $pin1;
            $flag = 1;
        }
        if (strpos($addr2, $loc_result_region_name) !== false)
        {
            $address = $addr2;
            $pincode = $pin2;
            $flag = 1;
        }
        if (strpos($addr3, $loc_result_region_name) !== false)
        {
            $address = $addr3;
            $pincode = $pin3;
            $flag = 1;
        }
        if (strpos($addr4, $loc_result_region_name) !== false)
        {
            $address = $addr4;
            $pincode = $pin4;
            $flag = 1;
        }
        if (strpos($addr5, $loc_result_region_name) !== false)
        {
            $address = $addr5;
            $pincode = $pin5;
            $flag = 1;
        }
        if (strpos($addr6, $loc_result_region_name) !== false)
        {
            $address = $addr6;
            $pincode = $pin6;
            $flag = 1;
        }
        if (strpos($addr7, $loc_result_region_name) !== false)
        {
            $address = $addr7;
            $pincode = $pin7;
            $flag = 1;
        }
        if (strpos($addr8, $loc_result_region_name) !== false)
        {
            $address = $addr8;
            $pincode = $pin8;
            $flag = 1;
        }

        if (!$flag)
        {
            $address = $addr4;
            $pincode = $pin4;
        }

        $params = array(
            'auth_token' => 'd1a4af4ce78afd17588315fc1b4cddd2123224',
            'item_name' => $product_name,
            'from_name' => 'Bonzo Kids',
            'from_phone_number' => '8287416806',
            'from_address' => $address,
            'from_pincode' => $pincode,
            'to_name' => $full_name_result_row['full_name'],
            'to_phone_number' => $full_name_result_row['contact'],
            'to_pincode' => $delpin,
            'to_address' => $deladdr,
            'quantity' => $total_quantity,
            'invoice_value' => $_SESSION['amt'],
            'cod_amount' => 0,
            'client_order_id' => $ORDERID,
        );
        try
        {
            $json_params = json_encode($params);
            $url = 'http://www.pickrr.com/api/place-order/';
            //open connection
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_params);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json'
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //execute post
            $result = curl_exec($ch);
            $result = json_decode($result, true);
            //close connection
            curl_close($ch);
            if (gettype($result) != "array") throw new \Exception(print_r($result, true) . "Problem in connecting with Pickrr");
            if ($result['err'] != "") throw new \Exception($result['err']);
            $track_id = $result['tracking_id'];
            dbconfig::dbperform("insert into tbl_track (`track_id`) VALUES ('$track_id')");
        }
        catch(\Exception $e)
        {
            echo $e;
        }
    }
      public function displayMultipeSize($ic='',$priceSizeData='')
    {
        $sizeData = explode(",",$priceSizeData);
        
        $query = dbconfig::dbperform("select * from `tbl_size`");

        if ($query->num_rows > 0)
        {   $data ='';
            while ($row = $query->fetch_assoc())
            {   if(empty($ic) && $ic!=0){
                    $data .= '<input type="checkbox" name="cmsize[][]" value="'. $row['size_id'] . '" > '. $row['size_name'] .'';
                }else{
                    if(in_array($row['size_id'], $sizeData)){$check =  'checked'; }else{$check=""; }
                    $data .= '<input type="checkbox" name="cmsize[][]" value="'. $row['size_id'] . '" '.$check.'> '. $row['size_name'] .'';
                }
                    
                }
        }
        return $data;
    }


      public function displayMultipeSizeDropdown($ic='',$priceSizeData='')
    
    {
        $sizeData = explode(",",$priceSizeData);
        
        $query = dbconfig::dbperform("select * from `tbl_size`");

        if ($query->num_rows > 0)
        {   $data ='';
            while ($row = $query->fetch_assoc())
            {   if(empty($ic) && $ic!=0){
                    $data .= '<option value="'. $row['size_id'] . '> '. $row['size_name'] .'</option>';
                }else{
                    // if(in_array($row['size_id'], $sizeData)){$check =  'checked'; }else{$check=""; }
                    $data .= '<option value="'. $row['size_id'] . '>'. $row['size_name'] .'</option>';
                }
                    
                }
        }
        return $data;
    }
 
    public function cancelShipment($order_id)
    {
        try
        {
            $params = array(
                "auth_token" => "d1a4af4ce78afd17588315fc1b4cddd2123224",
                "order_id " => $order_id,
            );
            $json_params = json_encode($params);
            $url = 'http://www.pickrr.com/api/place-order/';
            //open connection
            $ch = curl_init();
            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_params);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type:application/json'
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //execute post
            $result = curl_exec($ch);
            $result = json_decode($result, true);
            //close connection
            curl_close($ch);
            if (gettype($result) != "array") throw new \Exception(print_r($result, true) . "Problem in connecting with Pickrr");
            if ($result['err'] != "") throw new \Exception($result['err']);
            return $result['tracking_id'];
        }
        catch(\Exception $e)
        {
            echo $e;

        }
    }
    public function TrackShipment($tracking_number)
    {
        $url = 'http://www.pickrr.com/api/tracking-json/';
        $data = array(
            'tracking_id' => $tracking_number
        );

        $params = '';
        foreach ($data as $key => $value) $params .= $key . '=' . $value . '&';

        $params = trim($params, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . '?' . $params); //Url together with parameters
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); //Timeout after 7 seconds
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($result, true);
        $table = '';

        for ($i = 0;$i < count(($json['track_arr']));$i++)
        {
            $table .= $json['track_arr'][$i]['status_array'][0]['status_time'];
            echo "\n";
            $table .= $json['track_arr'][$i]['status_array'][0]['status_body'];
            echo "\n";
            $table .= $json['track_arr'][$i]['status_array'][0]['status_location'];
            echo "\n";
            echo "\n";
        }
        echo $table;

    }

    //pickrr Api end
    

    // filter search
    public function filter_search($price, $color, $brand, $age)
    {

        $price_1 = !empty($price) ? " AND product_price <= '" . $price . "'" : '';
        $color_1 = !empty($color) ? " AND color LIKE '%" . $color . "%'" : '';
        $brand_1 = !empty($brand) ? " AND brand_name LIKE '%" . $brand . "%'" : '';
        $age_1 = !empty($age) ? " AND age LIKE '%" . $age . "%'" : '';

        //print_r( $color );
        $build = $price_1 . $color_1 . $brand_1 . $age_1;

        $customize_query = "select * from tbl_product where product_status='1' $build ";

        $customize_query_result = dbconfig::dbperform($customize_query);

        $data = '';
        $image = '';

        if ($customize_query_result->num_rows > 0)
        {
            $data .= '<div class="row align-items-center latest_product_inner">';

            while ($row = $customize_query_result->fetch_assoc())
            {

                $keys = json_decode($row['product_image'], true);

                if (strpos($keys[0], 'https') !== false || strpos($keys[0], 'http') !== false || strpos($keys[0], 'www') !== false)
                {

                    $image = "<img height='300px;' src=" . $keys[0] . ">  ";
                }
                else
                {
                    $image = "<img height='300px;' src=.././images/" . $keys[0] . ">  ";
                }
                $data .= '<div  class="col-lg-4 col-sm-6">
                            <a href="' . $row['product_url'] . '"><div  class="single_product_item">
                             <center>   ' . $image . '</center>
                                <div class="single_product_text">
                                    <h4>' . $row['product_title'] . '</h4>
                                    <h3>₹ ' . $row['product_price'] . '</a></h3>
                                    <form id="add_cart_form">
                                    <input type="button" id="add_cart_' . $row['product_pk_id'] . '" class="add_cart btn btn-primary" value="+ add to cart" onClick = "cartAction(' . "'add'" . ',' . "'1'" . ',' . "'" . $row['product_pk_id'] . "'" . ',' . "'" . $row['product_price'] . "'" . ');">
                                    </form>
                                </div>
                            </div>
                        </div>';
            }
            $data .= '</div>';
        }
        else
        {

            $data .= '<div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <div class="single_product_text">
                                    <h4>No Product Found</h4>
                                </div>
                            </div>
                        </div>';
        }

        echo $data;
    }
    public function display_main_sub_category_product_paginate($url, $page)
    {

        $limit = 15;

        if (!empty($page))
        {
            $pn = $page;
        }
        else
        {
            $pn = 1;
        };

        $start_from = ($pn - 1) * $limit;
        $display_category_result = dbconfig::dbperform("select * from tbl_category inner join tbl_product on tbl_product.product_sub_cat=tbl_category.cat_pk_id where tbl_category.cat_url='$url' and tbl_category.cat_status='1' and tbl_product.product_status='1'  group by product_url LIMIT $start_from, $limit");

        $data = '';
        $image = '';
        if ($display_category_result->num_rows > 0)
        {

            $data .= '<div class="row align-items-center latest_product_inner">';

            while ($row = $display_category_result->fetch_assoc())
            {

                $keys = json_decode($row['product_image'], true);

                if (strpos($keys[0], 'https') !== false || strpos($keys[0], 'http') !== false || strpos($keys[0], 'www') !== false)
                {

                    $image = "<img  height='300px;' src=" . $keys[0] . ">  ";
                }
                else
                {
                    $image = "admin/assets/$keys[0]  ";
                }

                $data .= '<div class="product-wrap">
									<div class="product">
										<figure class="product-media">
											<a href="'.$row['product_url'].'">
												<img src="'.$image.'" alt="product" width="280" height="315">
											</a>
								
											<div class="product-action">
												<a href="'.$row['product_url'].'" class="btn-product " title="Quick View">
													View Details</a>
											</div>
										</figure>
										<div class="product-details">
									
											<h3 class="product-name">
												<a href="'.$row['product_url'].'">'.$row['product_title'].'</a>
											</h3>
											<div class="product-price">
												<ins class="new-price">₹ '.$row['discount'].'</ins><del class="old-price">₹ '.$row['product_price'].'</del>
											</div>
								
										</div>
									</div>
								</div>';
            }
            $data .= '';

            $sql = "select * from tbl_category inner join tbl_product on tbl_product.product_sub_cat=tbl_category.cat_pk_id where tbl_category.cat_url='$url' and tbl_category.cat_status='1' and tbl_product.product_status='1'  group by product_url LIMIT $start_from, $limit";
            $rs_result = dbconfig::dbperform($sql);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];

            // Number of pages required.
            $total_pages = ceil($total_records / $limit);
            $pagLink = "";
            for ($i = 1;$i <= $total_pages;$i++)
            {
                if ($i == $pn)
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href='$url?page=" . $i . "'>" . $i . "</a>";
                }
                else
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href='$url?page=" . $i . "'> 
                                                    " . $i . "</a>";
                }
                if ($i != $total_pages)
                {
                    continue;
                }
                else
                {
                    //  $pagLink .= "<a style='padding-right: inherit;'  href='$url?page=" . $i . "'> Next</a>";
                    
                }
            };
        }
        else
        {

            $data .= '<div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <div class="single_product_text">
                                    <h4>No Product Found</h4>
                                </div>
                            </div>
                        </div>';
        }

        echo $data;
                    echo $pagLink;

    }
    public function display_main_category_product_paginate($url, $page, $filter)
    {

        $limit = 15;

        if (!empty($page))
        {
            $pn = $page;
        }
        else
        {
            $pn = 1;
        };

        $start_from = ($pn - 1) * $limit;
        $where = "where tbl_category.cat_url='$url' and tbl_category.cat_status='1' and tbl_product.product_status='1'";
        //   $where = "where tbl_category.cat_url='Girl-Fashion' and tbl_category.cat_status='1' and tbl_product.product_status='1'";
        if ($filter != null)
        {
            if (isset($filter['price']) && $filter['price'] != 'All')
            {
                $where .= " AND";
                $filterprice = $filter['price'];
                $exp = explode('+', $filterprice);
                if (count($exp) >= '2')
                {
                    $where .= " tbl_product.product_price>='$exp[0]'";
                }
                else
                {
                    $where .= " tbl_product.product_price<'$filterprice'";
                }
            }
            if (isset($filter['color']))
            {
                for ($c = 0;$c < count($filter['color']);$c++)
                {
                    if ($c == 0)
                    {
                        $where .= " AND(";
                    }
                    else
                    {
                        $where .= " OR";
                    }
                    $crow = $filter['color'][$c];
                    $where .= " tbl_product.color like '%$crow%'";
                }
                $where .= ")";
            }
            if (isset($filter['age']))
            {
                for ($a = 0;$a < count($filter['age']);$a++)
                {
                    if ($a == 0)
                    {
                        $where .= " AND(";
                    }
                    else
                    {
                        $where .= " OR";
                    }
                    $arow = $filter['age'][$a];
                    $where .= " tbl_product.age like '%$arow%'";
                }
                $where .= ")";
            }
            if (isset($filter['discount']))
            {
                for ($d = 0;$d < count($filter['discount']);$d++)
                {
                    if ($d == 0)
                    {
                        $where .= " AND(";
                    }
                    else
                    {
                        $where .= " OR";
                    }
                    $drow = $filter['discount'][$d];
                    $expd = explode('-', $drow);
                    if ($expd[1] != '100')
                    {
                        $high = $expd[1] - 0.1;
                    }
                    else
                    {
                        $high = $expd[1];
                    }
                    $where .= " tbl_product.discount between $expd[0] AND $high ";
                }
                $where .= ")";
            }
            // exit;
            if (isset($filter['brand']))
            {
                for ($b = 0;$b < count($filter['brand']);$b++)
                {
                    if ($b == 0)
                    {
                        $where .= " AND(";
                    }
                    else
                    {
                        $where .= " OR";
                    }
                    $brow = $filter['brand'][$b];
                    $where .= " tbl_product.brand_name='$brow'";
                }
                $where .= ")";
            }

        }
        $display_category_result = dbconfig::dbperform("select * from tbl_category inner join tbl_product on tbl_product.product_cat=tbl_category.cat_pk_id $where  LIMIT $start_from, $limit");

        $data = '';
        $image = '';

        if ($display_category_result->num_rows > 0)
        {

            $data .= '<div class="row align-items-center latest_product_inner">';

            while ($row = $display_category_result->fetch_assoc())
            {

                $keys = json_decode($row['product_image'], true);

                if (strpos($keys[0], 'https') !== false || strpos($keys[0], 'http') !== false || strpos($keys[0], 'www') !== false)
                {

                    $image = "<img  height='300px;' src=" . $keys[0] . ">  ";
                }
                else
                {
                    $image = "<img   height='300px;' src=.././images/" . $keys[0] . ">  ";
                }

                $data .= '<div   class="col-lg-4 col-sm-6">
                         <a  href="' . $row['product_url'] . '">
                            <div class="single_product_item">
                                ' . $image . '
                                <div class="single_product_text">
                                    <h4>' . $row['product_title'] . '</h4>
                                    <h3>₹ ' . $row['product_price'] . '</h3></a>
                                    <form id="add_cart_form">
                                    <input type="button" id="add_cart_' . $row['product_pk_id'] . '" class="add_cart btn btn-primary" value="+ add to cart" onClick = "cartAction(' . "'add'" . ',' . "'1'" . ',' . "'" . $row['product_pk_id'] . "'" . ',' . "'" . $row['product_price'] . "'" . ');">
                                    </form>
                                </div>
                            </div>
                        </div>';
            }
            $data .= '</div>';

            $sql = "select * from tbl_category inner join tbl_product on tbl_product.product_cat=tbl_category.cat_pk_id where tbl_category.cat_url='$url' and tbl_category.cat_status='1' and tbl_product.product_status='1'";
            $rs_result = dbconfig::dbperform($sql);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];

            // Number of pages required.
            $total_pages = ceil($total_records / $limit);
            $pagLink = "";
            for ($i = 1;$i <= $total_pages;$i++)
            {
                if ($i == $pn)
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href='$url?page=" . $i . "'>" . $i . "</a>";
                }
                else
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href='$url?page=" . $i . "'> 
                                                    " . $i . "</a>";
                }
                if ($i != $total_pages)
                {
                    continue;
                }
                else
                {
                    //  $pagLink .= "<a style='padding-right: inherit;'  href='$url?page=" . $i . "'> Next</a>";
                    
                }
            };
            echo $pagLink;
        }
        else
        {

            $data .= '<div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <div class="single_product_text">
                                    <h4>No Product Found</h4>
                                </div>
                            </div>
                        </div>';
        }

        echo $data;

    }
    public function store_data($get)
    {
        if ($get != null)
        {
            $name = $get['name'];
            $state = $get['state'];
            $city = $get['city'];
            $data = '';
            $where = "storestatus ='1' ";
            if ($name != '')
            {
                $where .= "AND storename %like% '$name'";
            }
            if ($state != '')
            {
                $where .= " AND state='$state'";
            }
            if ($city != '')
            {
                $where .= " AND city='$city'";
            }
            $store_data = dbconfig::dbperform("select * from tbl_stores where $where");

            if ($store_data->num_rows > 0)
            {
                while ($store_row = $store_data->fetch_assoc())
                {
                    $data .= "<p style='text-align: justify;'>Store Name:- " . $store_row['storename'];
                    $data .= "<br>Customer Care:- " . $store_row['customercare'];
                    $data .= "<br>Email Id:- " . $store_row['emailid'];
                    $data .= "<br>Store Address:- " . $store_row['address'];
                    $data .= "" . $store_row['googlemap'] . "</p>";

                }
            }
            else
            {
                $data = "Comming Soon";
            }
        }
        else
        {
            $data = "";
        }
        echo $data;
    }

    public function display_main_category_product_paginate1($url, $page)
    {
        $limit = 15;

        if (!empty($page))
        {
            $pn = $page;
        }
        else
        {
            $pn = 1;
        };

        $start_from = ($pn - 1) * $limit;

        $display_category_result = dbconfig::dbperform("select * from tbl_category inner join tbl_product on tbl_product.product_cat=tbl_category.cat_pk_id where tbl_category.cat_url='$url' group by product_url LIMIT $start_from, $limit");
        $data = '';
        $image = '';
        if ($display_category_result->num_rows > 0)
        {

            $data .= '<div class="row align-items-center latest_product_inner">';

            while ($row = $display_category_result->fetch_assoc())
            {

                $keys = json_decode($row['product_image'], true);

                if (strpos($keys[0], 'https') !== false || strpos($keys[0], 'http') !== false || strpos($keys[0], 'www') !== false)
                {

                    $image = "<img  height='300px;' src=" . $keys[0] . ">  ";
                }
                else
                {
                    $image = "admin/assets/$keys[0]  ";
                }

                $data .= '	<div class="col-md-4"><div class="product-wrap">
									<div class="product">
										<figure class="product-media">
											<a href="'.$row['product_url'].'">
												<img style="height:250px;" src="'.$image.'" alt="product" width="280" height="315">
											</a>
								
											<div class="product-action">
												<a href="'.$row['product_url'].'" class="btn-product " title="Quick View">
													View Details</a>
											</div>
										</figure>
										<div class="product-details">
									
											<h3 class="product-name">
												<a href="'.$row['product_url'].'">'.$row['product_title'].'</a>
											</h3>
											<div class="product-price">
												<ins class="new-price">₹ '.$row['discount'].'</ins><del class="old-price">₹ '.$row['product_price'].'</del>
											</div>
								
										</div>
									</div>
								</div></div>';
            }
            $data .= '';

            $sql = "select * from tbl_category inner join tbl_product on tbl_product.product_cat=tbl_category.cat_pk_id where tbl_category.cat_url='$url' and tbl_category.cat_status='1' and tbl_product.product_status='1' group by product_url";
            $rs_result = dbconfig::dbperform($sql);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];

            // Number of pages required.
            $total_pages = ceil($total_records / $limit);
            $pagLink = "";
            for ($i = 1;$i <= $total_pages;$i++)
            {
                if ($i == $pn)
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href='$url?page=" . $i . "'>" . $i . "</a>";
                }
                else
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href='$url?page=" . $i . "'> 
                                                    " . $i . "</a>";
                }
                if ($i != $total_pages)
                {
                    continue;
                }
                else
                {
                    //  $pagLink .= "<a style='padding-right: inherit;'  href='$url?page=" . $i . "'> Next</a>";
                    
                }
            };
        }
        else
        {

            $data .= '<div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <div class="single_product_text">
                                    <h4>No Product Found</h4>
                                </div>
                            </div>
                        </div>';
        }

        echo $data;
                    echo $pagLink;


    }
    public function display_main_category_product_paginateResult($url, $page)
    {
        $limit = 15;

        if (!empty($page))
        {
            $pn = $page;
        }
        else
        {
            $pn = 1;
        };

        $start_from = ($pn - 1) * $limit;

        $display_category_result = dbconfig::dbperform("select * from tbl_category inner join tbl_product on tbl_product.product_cat=tbl_category.cat_pk_id where tbl_product.product_keyword like '%$url%' group by product_url LIMIT $start_from, $limit");
        $data = '';
        $image = '';
        if ($display_category_result->num_rows > 0)
        {

            $data .= '<div class="row align-items-center latest_product_inner">';

            while ($row = $display_category_result->fetch_assoc())
            {

                $keys = json_decode($row['product_image'], true);

                if (strpos($keys[0], 'https') !== false || strpos($keys[0], 'http') !== false || strpos($keys[0], 'www') !== false)
                {

                    $image = "<img  height='300px;' src=" . $keys[0] . ">  ";
                }
                else
                {
                    $image = "admin/assets/$keys[0]  ";
                }

                $data .= '<div class="product-wrap">
									<div class="product">
										<figure class="product-media">
											<a href="'.$row['product_url'].'">
												<img src="'.$image.'" alt="product" width="280" height="315">
											</a>
								
											<div class="product-action">
												<a href="'.$row['product_url'].'" class="btn-product " title="Quick View">
													View Details</a>
											</div>
										</figure>
										<div class="product-details">
									
											<h3 class="product-name">
												<a href="'.$row['product_url'].'">'.$row['product_title'].'</a>
											</h3>
											<div class="product-price">
												<ins class="new-price">₹ '.$row['discount'].'</ins><del class="old-price">₹ '.$row['product_price'].'</del>
											</div>
								
										</div>
									</div>
								</div>';
            }
            $data .= '';

            $sql = "select * from tbl_category inner join tbl_product on tbl_product.product_cat=tbl_category.cat_pk_id where tbl_product.product_keyword='$url' and tbl_category.cat_status='1' and tbl_product.product_status='1' group by product_url";
            $rs_result = dbconfig::dbperform($sql);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];

            // Number of pages required.
            $total_pages = ceil($total_records / $limit);
            $pagLink = "";
            for ($i = 1;$i <= $total_pages;$i++)
            {
                if ($i == $pn)
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href=result?search=$url&page=$i>" . $i . "</a>";
                }
                else
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href=result?search=$url&page=$i> 
                                                    " . $i . "</a>";
                }
                if ($i != $total_pages)
                {
                    continue;
                }
                else
                {
                    //  $pagLink .= "<a style='padding-right: inherit;'  href='$url?page=" . $i . "'> Next</a>";
                    
                }
            };
        }
        else
        {

            $data .= '<div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <div class="single_product_text">
                                    <h4>No Product Found</h4>
                                </div>
                            </div>
                        </div>';
        }

        echo $data;
                    echo $pagLink;


    }
    public function filter_search1($filter, $url, $page)
    {

        $limit = 15;

        if (!empty($page))
        {
            $pn = $page;
        }
        else
        {
            $pn = 1;
        };
        $start_from = ($pn - 1) * $limit;
        $where = "where  tbl_product.product_status='1'";
        if ($filter != null)
        {
            if (isset($filter['price']) && $filter['price'] != 'All')
            {
                $where .= " AND";
                $filterprice = $filter['price'];
                $exp = explode('+', $filterprice);
                if (count($exp) >= '2')
                {
                    $where .= " tbl_product.product_price>='$exp[0]'";
                }
                else
                {
                    $where .= " tbl_product.product_price<'$filterprice'";
                }
            }
            if (isset($filter['color']))
            {
                for ($c = 0;$c < count($filter['color']);$c++)
                {
                    if ($c == 0)
                    {
                        $where .= " AND(";
                    }
                    else
                    {
                        $where .= " OR";
                    }
                    $crow = $filter['color'][$c];
                    $where .= " tbl_product.color like '%$crow%'";
                }
                $where .= ")";
            }
            if (isset($filter['age']))
            {
                for ($a = 0;$a < count($filter['age']);$a++)
                {
                    if ($a == 0)
                    {
                        $where .= " AND(";
                    }
                    else
                    {
                        $where .= " OR";
                    }
                    $arow = $filter['age'][$a];
                    $where .= " tbl_product.age like '%$arow%'";
                }
                $where .= ")";
            }
            if (isset($filter['discount']))
            {
                for ($d = 0;$d < count($filter['discount']);$d++)
                {
                    if ($d == 0)
                    {
                        $where .= " AND(";
                    }
                    else
                    {
                        $where .= " OR";
                    }
                    $drow = $filter['discount'][$d];
                    $expd = explode('-', $drow);
                    if ($expd[1] != '100')
                    {
                        $high = $expd[1] - 0.1;
                    }
                    else
                    {
                        $high = $expd[1];
                    }
                    $where .= " tbl_product.discount between $expd[0] AND $high ";
                }
                $where .= ")";
            }
            // exit;
            if (isset($filter['brand']))
            {
                for ($b = 0;$b < count($filter['brand']);$b++)
                {
                    if ($b == 0)
                    {
                        $where .= " AND(";
                    }
                    else
                    {
                        $where .= " OR";
                    }
                    $brow = $filter['brand'][$b];
                    $where .= " tbl_product.brand_name='$brow'";
                }
                $where .= ")";
            }

        }
        $display_category_result = dbconfig::dbperform("select * from tbl_category inner join tbl_product on tbl_product.product_cat=tbl_category.cat_pk_id $where  LIMIT $start_from, $limit");
        $data = '';
        $image = '';

        if ($display_category_result->num_rows > 0)
        {

            $data .= '<div class="row align-items-center latest_product_inner">';

            while ($row = $display_category_result->fetch_assoc())
            {

                $keys = json_decode($row['product_image'], true);

                if (strpos($keys[0], 'https') !== false || strpos($keys[0], 'http') !== false || strpos($keys[0], 'www') !== false)
                {

                    $image = "<img  height='300px;' src=" . $keys[0] . ">  ";
                }
                else
                {
                    $image = "<img   height='300px;' src=.././images/" . $keys[0] . ">  ";
                }

                $data .= '<div   class="col-lg-4 col-sm-6">
                         <a  href="' . $row['product_url'] . '">
                            <div class="single_product_item">
                                ' . $image . '
                                <div class="single_product_text">
                                    <h4>' . $row['product_title'] . '</h4>
                                    <h3>₹ ' . $row['product_price'] . '</h3></a>
                                    <form id="add_cart_form">
                                    <input type="button" id="add_cart_' . $row['product_pk_id'] . '" class="add_cart btn btn-primary" value="+ add to cart" onClick = "cartAction(' . "'add'" . ',' . "'1'" . ',' . "'" . $row['product_pk_id'] . "'" . ',' . "'" . $row['product_price'] . "'" . ');">
                                    </form>
                                </div>
                            </div>
                        </div>';
            }
            $data .= '</div>';

            $sql = "select * from tbl_category inner join tbl_product on tbl_product.product_cat=tbl_category.cat_pk_id $where ";
            $rs_result = dbconfig::dbperform($sql);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];

            // Number of pages required.
            $total_pages = ceil($total_records / $limit);
            $pagLink = "";
            for ($i = 1;$i <= $total_pages;$i++)
            {
                if ($i == $pn)
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href='$url&page=" . $i . "'>" . $i . "</a>";
                }
                else
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href='$url&page=" . $i . "'> 
                                                    " . $i . "</a>";
                }
                if ($i != $total_pages)
                {
                    continue;
                }
                else
                {
                    // $pagLink .= "<a style='padding-right: inherit;'  href='$url&page=" . $i . "'> Next</a>";
                    
                }
            };
            echo $pagLink;
        }
        else
        {

            $data .= '<div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <div class="single_product_text">
                                    <h4>No Product Found</h4>
                                </div>
                            </div>
                        </div>';
        }

        echo $data;

    }
    public function display_slider_admin()
    {

        $data = '';

        $status = '';

        $varient = '';

        $display_product_result = dbconfig::dbperform("select * from `tbl_slider` ");

        while ($display_product_result_row = $display_product_result->fetch_assoc())
        {
            $image = '';

            $data .= "<tr>
                  <td> <img src=../img/" . $display_product_result_row['slider_image'] . " height='50px' width='50px'></td>
                  <td>" . $display_product_result_row['slider_status'] . "</td>

                  <td>
                  <form method='post'>
                  <button type='submit' class='btn btn-success' name='active_cat' value='" . $display_product_result_row['slider_pk_id'] . "'><i class='fa fa-check'></i></button>
                  <button type='submit' class='btn btn-danger' name='delete_cat' value='" . $display_product_result_row['slider_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

        }
        echo $data;
    }
    public function add_slider_admin()
    {

        if (is_array($_FILES['slider_image']) && isset($_POST['slider_ref']))
        {

            if (is_uploaded_file($_FILES['slider_image']['tmp_name']))
            {

                $sourcePath = $_FILES['slider_image']['tmp_name'];

                $targetPath = "../../img/" . $_FILES['slider_image']['name'];

                $image = $_FILES['slider_image']['name'];

                if (move_uploaded_file($sourcePath, $targetPath))
                {

                    dbconfig::dbperformm("INSERT INTO `tbl_slider`(`slider_image`) VALUES ('$image')");

                    return 'success';
                }
                else
                {
                    return 'failed';
                }
            }

        }
    }
    public function display_slider_front_ui()
    {

        $data = '<ol class="carousel-indicators">';

        $status = '';

        $i = 0;

        $display_product_result = dbconfig::dbperform("select * from `tbl_slider` ");

        while ($display_product_result_row = $display_product_result->fetch_assoc())
        {

            if ($display_product_result_row['slider_status'] == '1')
            {

                $data .= '<li data-target="#main-carousel" data-slide-to="' . $i . '" class="active"></li>';

            }
            else
            {

                $data .= '<li data-target="#main-carousel" data-slide-to="' . $i . '" class=""></li>';

            }
            $i++;
        }

        $data .= '</ol><div class="carousel-inner">';
        
        $display_product_result = dbconfig::dbperform("select * from `tbl_slider` ");

        
        while ($display_product_result_row = $display_product_result->fetch_assoc())
        {

            if ($display_product_result_row['slider_status'] == '1')
            {

                $data .= '<div class="carousel-item active">
                          <img class="d-block img-fluid" style="max-height:184px;height:100%;width:-webkit-fill-available;" src="img/'.$display_product_result_row['slider_image'].'" alt="">
                          </div>';

            }
            else
            {

                $data .= '<div class="carousel-item ">
                          <img class="d-block img-fluid" style="max-height:184px;height:100%;width:-webkit-fill-available;"  src="img/'.$display_product_result_row['slider_image'].'" alt="">
                          </div>';

            }
        }
        
          $data.='</div>';
          
          echo $data;

    }
    


    public function razoPayTransaction( $cartArray ){
        
          if( isset($_POST['razorPayRef'] ) ){
        
        $data='';      
        $ORDER_ID='';
        $newOrder ='';
        $transcAmt=$_POST['razorPayAmount'];
        $leftAmount =$_POST['leftAmount'];
        
        $tContact =$_POST['tContact'];
        $tPincode =$_POST['tPincode'];
        $tName =$_POST['tName'];
        $tEmail =$_POST['tEmail'];

        $tState =$_POST['tState'];
        $tCity =$_POST['tCity'];

           
        $t1Contact =$_POST['t1Contact'];
        $t1Pincode =$_POST['t1Pincode'];
        $t1Name =$_POST['t1Name'];
        $t1Email =$_POST['t1Email'];

        $t1State =$_POST['t1State'];
        $t1City =$_POST['t1City'];
        $shiping_ch =$_POST['shiping_ch'];
        
        $userShippingAddress1 =$_POST['userShippingAddress1'];
        
        $orderIDResult = dbconfig::dbperform("select  order_id from `tbl_order`  ORDER BY order_pk_id DESC LIMIT 1");
        if($orderIDResult->num_rows>0){
        $orderIDResultRow = $orderIDResult->fetch_assoc(); 
        $ORDER_ID1= explode('-',$orderIDResultRow['order_id']);
        $newOrder = intval($ORDER_ID1[1])+1;
        $ORDER_ID ='HTO-'.$newOrder;
        }else{
        $ORDER_ID ='HTO-1';
        }
        $CUST_ID = $_SESSION['key_id'];
        $razorPayAmount = $_POST['razorPayAmount'];
        $del_addr = $_POST['del_addr'];
        $cart_keys = array_keys($cartArray);
        $cart_array = $cartArray;
        $date = date("d F Y h:i:s A");
        foreach ($cart_keys as $keys)
        {
            $quantity = $cart_array[$keys]['quantity'];
            $result = dbconfig::dbperform("select product_title,product_quantity  from `tbl_product` where product_pk_id='$keys'");
            $row = $result->fetch_assoc();
            $leftQuantity = $row['product_quantity']-$quantity;
            if( $leftQuantity < 0 ){
                
               $data .='You Must Decrease the Quantity Of '.$row['product_title'].'<br>'; 
            }

        }
        if($data!=''){
            
            echo $data;
            exit();
        }  
        if( $data=='' ){
            
        foreach ($cart_keys as $keys)
        {
            $quantity = $cart_array[$keys]['quantity'];
            $result1 = dbconfig::dbperform("select product_title,product_quantity  from `tbl_product` where product_pk_id='$keys'");
            $row1 = $result1->fetch_assoc();
            $leftQuantity = $row1['product_quantity']-$quantity;
            if( $leftQuantity == 0 ){
            
            dbconfig::dbperformm("update  `tbl_product` set product_quantity ='$leftQuantity', product_status='2',product_out='$date' where product_pk_id='$keys'");


            }

            if( $leftQuantity > 0 ){
            
            dbconfig::dbperformm("update  `tbl_product` set product_quantity ='$leftQuantity' where product_pk_id='$keys'");


            }
        dbconfig::dbperformm("INSERT INTO `tbl_order`(`order_id`, `product_fk_id`,`product_quantity`, `user_fk_id`, `order_status`, `order_date`) VALUES ('$ORDER_ID','$keys','$quantity','$CUST_ID','0','$date')");
        }
        dbconfig::dbperformm("INSERT INTO `tbl_transaction`( `order_id`, `user_fk_id`, `transaction_status`, `transaction_mode`, `transaction_date`,`transc_amount`,`leftAmount`,`tContact`, `tPincode`,`tName`,`tEmail`,`tState`,`tCity`,`t1Contact`, `t1Pincode`,`t1Name`,`t1Email`,`t1State`,`t1City`,`userShippingAddress1`,`shiping_ch`)
        VALUES ('$ORDER_ID','$CUST_ID','0','RazorPay','$date','$transcAmt','$leftAmount','$tContact', '$tPincode','$tName','$tEmail','$tState','$tCity','$t1Contact', '$t1Pincode','$t1Name','$t1Email','$t1State','$t1City','$userShippingAddress1','$shiping_ch')");
          
         echo 'successful';   
         
        dbconfig::dbperformm("update  `tbl_order` set order_status ='1' where order_id='$ORDER_ID'");

        dbconfig::dbperformm("update `tbl_transaction` set transaction_status='1' ,transaction_mode='RazorPay',del_addr='$del_addr' where order_id='$ORDER_ID'");
        }

        unset($_SESSION['cart']);      
        }
        
    }
    
       public function codTransaction( $cartArray ){
        
          if( isset($_POST['codRef'] ) ){
        $ORDER_ID='';
        $newOrder ='';
        $transcAmt=$_SESSION['amt'];
        $orderIDResult = dbconfig::dbperform("select  order_id from `tbl_order`  ORDER BY order_pk_id DESC LIMIT 1");
        if($orderIDResult->num_rows>0){
        $orderIDResultRow = $orderIDResult->fetch_assoc(); 
        $ORDER_ID1= explode('-',$orderIDResultRow['order_id']);
        $newOrder = intval($ORDER_ID1[1])+1;
        $ORDER_ID ='UB-'.$newOrder;
        }else{
        $ORDER_ID ='UB-1';
        }
        $data='';      
        $CUST_ID = $_SESSION['key_id'];
        $razorPayAmount = $_POST['codPayAmount'];
        $del_addr = $_POST['del_addr'];
        $cart_keys = array_keys($cartArray);
        $cart_array = $cartArray;
        $date = date("d F Y h:i:s A");
        foreach ($cart_keys as $keys)
        {
            $quantity = $cart_array[$keys]['quantity'];
            $result = dbconfig::dbperform("select product_title,product_quantity  from `tbl_product` where product_pk_id='$keys'");
            $row = $result->fetch_assoc();
            $leftQuantity = $row['product_quantity']-$quantity;
            if( $leftQuantity < 0 ){
                
               $data .='You Must Decrease the Quantity Of '.$row['product_title'].'<br>'; 
            }

        }
        if($data!=''){
            
            echo $data;
            exit();
        }  
        if( $data=='' ){
            
        foreach ($cart_keys as $keys)
        {
            $quantity = $cart_array[$keys]['quantity'];
            $result1 = dbconfig::dbperform("select product_title,product_quantity  from `tbl_product` where product_pk_id='$keys'");
            $row1 = $result1->fetch_assoc();
            $leftQuantity = $row1['product_quantity']-$quantity;
            if( $leftQuantity == 0 ){
            
            dbconfig::dbperformm("update  `tbl_product` set product_quantity ='$leftQuantity', product_status='2',product_out='$date' where product_pk_id='$keys'");


            }

            if( $leftQuantity > 0 ){
            
            dbconfig::dbperformm("update  `tbl_product` set product_quantity ='$leftQuantity' where product_pk_id='$keys'");


            }
        dbconfig::dbperformm("INSERT INTO `tbl_order`(`order_id`, `product_fk_id`,`product_quantity`, `user_fk_id`, `order_status`, `order_date`) VALUES ('$ORDER_ID','$keys','$quantity','$CUST_ID','0','$date')");
        }
        dbconfig::dbperformm("INSERT INTO `tbl_transaction`( `order_id`, `user_fk_id`, `transaction_status`, `transaction_mode`, `transaction_date`,`transc_amount`) VALUES ('$ORDER_ID','$CUST_ID','0','COD','$date','$transcAmt')");
          
         echo 'successful';   
         
        dbconfig::dbperformm("update  `tbl_order` set order_status ='0' where order_id='$ORDER_ID'");

        dbconfig::dbperformm("update `tbl_transaction` set transaction_status='0' ,transaction_mode='COD',del_addr='$del_addr' where order_id='$ORDER_ID'");
        }

        unset($_SESSION['cart']);      
        }
        
    }
        public function add_banner_admin()
    {

        if (is_array($_FILES['slider_image']) && isset($_POST['banner_ref']))
        {

            if (is_uploaded_file($_FILES['slider_image']['tmp_name']))
            {

                $sourcePath = $_FILES['slider_image']['tmp_name'];

                $targetPath = "../../img/" . $_FILES['slider_image']['name'];

                $image = $_FILES['slider_image']['name'];

                if (move_uploaded_file($sourcePath, $targetPath))
                {

                    dbconfig::dbperformm("INSERT INTO `tbl_banner`(`banner_image`) VALUES ('$image')");

                    return 'success';
                }
                else
                {
                    return 'failed';
                }
            }

        }
    }
        public function display_banner_admin()
    {

        $data = '';

        $status = '';

        $varient = '';

        $display_product_result = dbconfig::dbperform("select * from `tbl_banner` ");

        while ($display_product_result_row = $display_product_result->fetch_assoc())
        {
            $image = '';

            $data .= "<tr>
                  <td> <img src=../img/" . $display_product_result_row['banner_image'] . " height='50px' width='50px'></td>
                  <td>" . $display_product_result_row['banner_status'] . "</td>

                  <td>
                  <form method='post'>
                  <button type='submit' class='btn btn-success' name='active_cat' value='" . $display_product_result_row['banner_pk_id'] . "'><i class='fa fa-check'></i></button>
                  <button type='submit' class='btn btn-danger' name='delete_cat' value='" . $display_product_result_row['banner_pk_id'] . "'><i class='fa fa-trash'></i></button>
                  </form>
                  </td>
                </tr>";

        }
        echo $data;
    }
        public function display_banner_front_ui()
    {

        $data = '';

        $status = '';

        $varient = '';

        $display_product_result = dbconfig::dbperform("select * from `tbl_banner` ");

        while ($display_product_result_row = $display_product_result->fetch_assoc())
        {
            $image = '';

            $data .= '<div class="col-12 mt-3"><img src ="img/'.$display_product_result_row['banner_image'].'" class="img-fluid"></div>';

        }
        echo $data;
    }
    public function display_order_new()
    {
        $data = '';
        $status = '';
        $display_order_result = dbconfig::dbperform("select * from `tbl_transaction`  inner join tbl_user on tbl_user.user_pk_id=tbl_transaction.user_fk_id order by transaction_pk_id DESC");

        while ($display_order_result_row = $display_order_result->fetch_assoc())
        {
           
            $status = $display_order_result_row['order_status'] == 0 ? '<div class="btn btn-danger">Pending</div>' : '<div class="btn btn-success">Paid</div>';

            $data .= '<div class="container" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="col-md-12 col-xs-12" style="background: #f5f5f5; border: #ccc solid 1px; margin-top:10px; padding-top:10px;">
                                   <a href="https://urbanbasket.in/urban-bas/view-order?order='.$display_order_result_row['order_id'].'"> <p style=" margin-bottom:-1px;"><b>Order Id: '.$display_order_result_row['order_id'].'</b></p></a>
                                    <p style=" margin-bottom:-1px;"><i>Placed On: '.$display_order_result_row['transaction_date'].'</i></p>
                                    <p>Total Amount: Rs. '.$display_order_result_row['transc_amount'].'/-</p>
                                    
                                   <a href="https://urbanbasket.in/urban-bas/admin/invoice?order='.$display_order_result_row['order_id'].'" style=" margin-bottom:3px;" class=""> <p ><b>View Invoice</b></p></a>

                                    
                                </div>          
                            </div>
                        </div>
                    </div>';

        }
        echo $data;

    }
  public function display_frontOrder_ui($order)
    {


        $data = '';


            $display_cart_result = dbconfig::dbperform("select * from tbl_order where order_id='$order'");

            while ($row = $display_cart_result->fetch_assoc())

            {
            $display_cart_result2 = dbconfig::dbperform("select * from tbl_product where product_pk_id=".$row['product_fk_id']);
            $display_cart_resultRow2 = $display_cart_result2 ->fetch_assoc();
                $image = json_decode($display_cart_resultRow2['product_image'], true);

                if (strpos($image[0], 'https') !== false || strpos($image[0], 'http') !== false || strpos($image[0], 'www') !== false)
                {

                    $cart_image = '<img class="img-fluid " style="height:120px;width:110px;" src="' . $image[0] . '" >';
                }
                else
                {
                    $cart_image = '<img class="img-fluid " style="height:120px;width:110px;" src="img/' . $image[0] . '" >';

                }

            $data .= '<div class="pt-4 wish-list" style="width: -webkit-fill-available;">


          <div class="row mb-4">
            <div class="col-md-12 col-lg-12 col-xl-12">
               <div class="row" style="width:100%">
                   <div class="col-6">
              <div class=" view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
             '.$cart_image.'
              </div>
              </div>
              <div class="col-6 text-right">
                 <h5>'.$row['product_title'].'</h5>
                    <p class="mb-3 text-muted text-uppercase small">Discount Price - '.$display_cart_resultRow2['discount'].'</p>
                    <p class="mb-2 text-muted text-uppercase small">Quantity: '.$row['product_quantity'].'</p>
                    <p class="mb-3 text-muted text-uppercase small">Total: '.$display_cart_resultRow2['discount']*$row['product_quantity'].'</p>  
                  
              </div>
              
              </div>
            </div>
            <div class="col-md-7 col-lg-9 col-xl-9">
                
              <div>
                <div class="d-flex justify-content-between">
                  <div>
                   
                    
                  </div>
                  <div>
               
                  </div>
                </div>
              
              </div>
            </div>
          </div>
          <hr class="mb-4">


        </div>';
                
  
                

            }
        

        echo $data;
    }

    
           public function registerAdminUser()
    {

        if (isset($_POST['adminUserRef']))
        {

            $full_name = $_POST['full_name'];

            $user_email = $_POST['user_email'];

            $user_password = md5($_POST['user_password']);

            $contact = $_POST['contact'];

            $auth_token = md5($user_email);

            $user_role = 'user';

            $user_reg_loc = $_POST['user_reg_loc'];

            $user_address = $_POST['user_address'];

            $date = date("d F Y h:i:s A");

            $display_user_activity_result = dbconfig::dbperform("select * from tbl_user where user_email='$user_email'");

            if ($display_user_activity_result->num_rows > 0)
            {
                echo 'exists';
                exit();
            }

            if ($display_user_activity_result->num_rows == 0)
            {

                dbconfig::dbperform("INSERT INTO `tbl_user`( `full_name`,`contact`,`user_email`, `user_password`, `user_auth_tok`, `user_role`, `user_reg_loc`, `user_reg_date`, `user_status`, `user_block_status`, `address`) 
                                                                             VALUES ('$full_name','$contact','$user_email','$user_password','$auth_token','$user_role','$user_reg_loc','$date','1','0','$user_address')");

                $last_id_result = dbconfig::dbperform("select user_pk_id from `tbl_user` where user_email='$user_email'");

                $last_id_row = $last_id_result->fetch_assoc();

                $last_id = $last_id_row['user_pk_id'];

                dbconfig::dbperform("INSERT INTO `tbl_user_details`(`user_fk_id`, `user_full_name`, `user_contact`,`user_address`) VALUES ('$last_id','$full_name','$contact','$user_address')");
                return 'success';
            }
            else
            {

                return 'failed';

            }

        }

    } 
       public function display_main_category_product_paginateFilterResult($filter, $page,$uri)
    {
        $limit = 15;

        if (!empty($page))
        {
            
            $pn = $page;
            $uri =  str_replace("&page=".$pn,"",$uri);

        }
        else
        {
            $pn = 1;
        };

        $start_from = ($pn - 1) * $limit;
 $where = "where  tbl_product.product_status='1'";
        if($filter!=null){
            if(isset($filter['price']) ){
                $where .= " AND";
                $filterprice = round($filter['price']);
                if($filterprice>50){
                    $where .= " tbl_product.discount<='$filterprice.00'";
                }else{
                    $where .= " tbl_product.discount>='$filterprice.00'";
                }
            }
            if(isset($filter['color']) ){
                for($c=0; $c<count($filter['color']); $c++){
                    if($c==0){ $where .= " AND("; }else{ $where .= " OR"; }
                    $crow = $filter['color'][$c];
                    $where .= " tbl_product.color like '%$crow%'";
                }
                $where .= ")";
            }
            if(isset($filter['age']) ){
                for($a=0; $a<count($filter['age']); $a++){
                    if($a==0){ $where .= " AND("; }else{ $where .= " OR"; }
                    $arow = $filter['age'][$a];
                    $where .= " tbl_product.age like '%$arow%'";
                }
                $where .= ")";
            }
            if(isset($filter['discount']) ){
                for($d=0; $d<count($filter['discount']); $d++){
                    if($d==0){ $where .= " AND("; }else{ $where .= " OR"; }
                    $drow = $filter['discount'][$d];
                    $expd = explode('-',$drow);
                    if($expd[1]!='100'){
                        $high = $expd[1]-0.1;
                    }else{ $high = $expd[1]; }
                    $where .= " tbl_product.discount between $expd[0] AND $high ";
                }
                $where .= ")";
            }
            // exit;
            if(isset($filter['brand']) ){
                for($b=0; $b<count($filter['brand']); $b++){
                    if($b==0){ $where .= " AND("; }else{ $where .= " OR"; }
                    $brow = $filter['brand'][$b];
                    $where .= " tbl_brand.brand_name='$brow'";
                }
                $where .= ")";
            }
                if(isset($filter['productType']) ){
                for($b=0; $b<count($filter['productType']); $b++){
                    if($b==0){ $where .= " AND("; }else{ $where .= " OR"; }
                    $brow = $filter['productType'][$b];
                    $where .= " tbl_product.productType='$brow'";
                }
                $where .= ")";
            }
            
        }
        $display_category_result = dbconfig::dbperform("select * from tbl_brand inner join tbl_product on tbl_product.brand_fk_id=tbl_brand.brand_id $where  group by tbl_product.product_url LIMIT $start_from, $limit");
        $data = '';
        $image = '';
        if ($display_category_result->num_rows > 0)
        {

            $data .= '<div class="row align-items-center latest_product_inner">';

            while ($row = $display_category_result->fetch_assoc())
            {

                $keys = json_decode($row['product_image'], true);

                if (strpos($keys[0], 'https') !== false || strpos($keys[0], 'http') !== false || strpos($keys[0], 'www') !== false)
                {

                    $image = "<img  height='300px;' src=" . $keys[0] . ">  ";
                }
                else
                {
                    $image = "admin/assets/$keys[0]  ";
                }

                $data .= '<div class="product-wrap">
									<div class="product">
										<figure class="product-media">
											<a href="'.$row['product_url'].'">
												<img src="'.$image.'" alt="product" width="280" height="315">
											</a>
								
											<div class="product-action">
												<a href="'.$row['product_url'].'" class="btn-product " title="Quick View">
													View Details</a>
											</div>
										</figure>
										<div class="product-details">
									
											<h3 class="product-name">
												<a href="'.$row['product_url'].'">'.$row['product_title'].'</a>
											</h3>
											<div class="product-price">
												<ins class="new-price">₹ '.$row['discount'].'</ins><del class="old-price">₹ '.$row['product_price'].'</del>
											</div>
								
										</div>
									</div>
								</div>';
            }
            $data .= '';

            $sql = "select * from tbl_brand inner join tbl_product on tbl_product.brand_fk_id=tbl_brand.brand_id $where  group by tbl_product.product_url ";
            $rs_result = dbconfig::dbperform($sql);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];

            // Number of pages required.
            $total_pages = ceil($total_records / $limit);
            $pagLink = "";
            for ($i = 1;$i <= $total_pages;$i++)
            {
                if ($i == $pn)
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href=$uri&page=$i>" . $i . "</a>";
                }
                else
                {
                    $pagLink .= "<a style='padding-right: inherit;'  href=$uri&page=$i> 
                                                    " . $i . "</a>";
                }
                if ($i != $total_pages)
                {
                    continue;
                }
                else
                {
                    //  $pagLink .= "<a style='padding-right: inherit;'  href='$url?page=" . $i . "'> Next</a>";
                    
                }
            };
        }
        else
        {

            $data .= '<div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <div class="single_product_text">
                                    <h4>No Product Found</h4>
                                </div>
                            </div>
                        </div>';
        }

        echo $data;
                    echo $pagLink;


    }
}

?>
