<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
       $classMaster = new classMaster();
   }
   else{
       header("location:login");
   }
         $db=new dbconfig();
         $id=intval($_GET['category']);
         $result = $db->dbperform("select * from tbl_category  where cat_pk_id='$id'");
         $row=$result->fetch_assoc();
         $resultext  = $db->dbperform("select * from tbl_post_extra Where post_extr_id='$id' AND post_tbl='product'" );
         $rowext =$resultext->fetch_assoc();
         ?>            
    <?php
if ($_SERVER['REDIRECT_REQUEST_METHOD']=='POST' || isset($_POST['cat_ref']))
{
    //SEO CONTENT    
$meta_title_en = isset($_POST['meta_title_en'])?$db->get_safe_str($_POST['meta_title_en']):'';
$meta_title_fr = isset($_POST['meta_title_fr'])?$db->get_safe_str($_POST['meta_title_fr']):'';

$meta_description_en = isset($_POST['meta_description_en'])?$_POST['meta_description_en']:'';
$meta_description_fr = isset($_POST['meta_description_fr'])?$db->get_safe_str($_POST['meta_description_fr']):'';

$meta_keywords_en = isset($_POST['meta_keywords_en'])?$_POST['meta_keywords_en']:'';
$meta_keywords_fr = isset($_POST['meta_keywords_fr'])?$db->get_safe_str($_POST['meta_keywords_fr']):'';

$post_tbl = 'cat';

    $file_name = $_FILES['post_image']['name'];

        move_uploaded_file($_FILES['post_image']['tmp_name'], "assets/" . $_FILES['post_image']['name']);

        $image = $file_name;
        
        $banner_image = $_FILES['banner_image']['name'];

        move_uploaded_file($_FILES['banner_image']['tmp_name'], "assets/" . $_FILES['banner_image']['name']);
        //Banner French
            $targetPathBanner_fr = "assets/" . $_FILES['banner_image_fr']['name'];
            $banner_image_fr = $_FILES['banner_image_fr']['name'];
            move_uploaded_file($banner_image_fr, $targetPathBanner_fr); 
            
        $post_title = $_POST['post_title'];
         $cat_titleUrl = preg_replace(array(
                    '/[^a-zA-Z0-9 -]/',
                    '/[ -]+/',
                    '/^-|-$/'
                ) , array(
                    '',
                    '-',
                    ''
                ) , $post_title);

                $url = strtolower($cat_titleUrl);
                
        $post_title_fr = $db->get_safe_str($_POST['post_title_fr']);
        $shown_home = isset($_POST['shown_home'])?$_POST['shown_home']:'';
        $live_sale = isset($_POST['live_sale'])?$_POST['live_sale']:'';
        $expire_date = isset($_POST['expire_date_time'])?$_POST['expire_date_time']:'';
        $expire_date_time=date("Y-m-d H:i:s", strtotime($expire_date));
        $created_date=date("Y-m-d H:i:s");
        $dont_show_on_home = isset($_POST['dont_show_on_home'])?$_POST['dont_show_on_home']:'';
        $shown_mobile = isset($_POST['shown_mobile'])?$_POST['shown_mobile']:'';
        $mobleText = isset($_POST['mobleText'])?$_POST['mobleText']:'';
        $mobleText_fr = isset($_POST['mobleText_fr'])?$db->get_safe_str($_POST['mobleText_fr']):'';
        $sortOrder = isset($_POST['sort_order'])?$_POST['sort_order']:'';

        $fa = $_POST['fa'];
        
    if (isset($_FILES['post_image']) && $_FILES['post_image']['tmp_name'] != '')
    {
        $db->dbperformm("update tbl_category set `category`='$post_title',`cat_url`='$url',`category_fr`='$post_title_fr',`cat_fafa`='$fa',`cat_image`='$image', `cat_bannerImage`='$banner_image',`cat_bannerImage_fr`='$banner_image_fr'  , `shown_home` = '$shown_home' ,`live_sale`=$live_sale,`expire_date_time`='$expire_date_time',`created_date`='$created_date',`sort_order`='$sortOrder',`shown_mobile`='$shown_mobile',`mobile_text`='$mobleText',`mobile_text_fr`='$mobleText_fr',`dont_show_on_home`='$dont_show_on_home' where cat_pk_id='$id'");
        
    }else  if (isset($_FILES['banner_image']['name']) && !empty($_FILES['banner_image']['tmp_name'])){
         $db->dbperformm("update tbl_category set `category`='$post_title',`cat_url`='$url',`category_fr`='$post_title_fr',`cat_fafa`='$fa', `cat_bannerImage`='$banner_image',`cat_bannerImage_fr`='$banner_image_fr'  , `shown_home` = '$shown_home' , `live_sale` = '$live_sale',`expire_date_time`='$expire_date_time',`created_date`='$created_date',`sort_order`='$sortOrder',`shown_mobile`='$shown_mobile',`mobile_text`='$mobleText',`mobile_text_fr`='$mobleText_fr',`dont_show_on_home`='$dont_show_on_home' where cat_pk_id='$id'");
        
    } else
    {
         $db->dbperformm("update tbl_category set `category`='$post_title',`cat_url`='$url',`category_fr`='$post_title_fr',`cat_fafa`='$fa',`shown_home`= '$shown_home',`live_sale` = '$live_sale' ,`expire_date_time`='$expire_date_time',`created_date`='$created_date',`sort_order`='$sortOrder',`shown_mobile`='$shown_mobile',`mobile_text`='$mobleText',`mobile_text_fr`='$mobleText_fr',`dont_show_on_home`='$dont_show_on_home' where cat_pk_id='$id'");
    }
        
    //   post extra
                    $metaPost =   $db->dbperform("Select * from tbl_post_extra Where post_extr_id='$id' and post_tbl='cat' ");
                        if($metaPost->num_rows > 0){
                            $db->dbperformm("update tbl_post_extra set `post_tbl`='$post_tbl',`meta_title_en`='$meta_title_en',`meta_title_fr`='$meta_title_fr',`meta_description_en`='$meta_description_en', `meta_description_fr`='$meta_description_fr',`meta_keywords_en`='$meta_keywords_en' ,`meta_keywords_fr`='$meta_keywords_fr' where post_extr_id='$id' AND post_tbl='cat' ");
                        }else{
                           $db->dbperformm("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$id','cat','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");
                    	}  
    ?>
   <script>
       alert('Category Update Successfully');
       window.location.href='edit-category?category=<?= $id ?>&ref=parent';
   </script>
   <?php
}
?>    
<!-- BEGIN: Header-->
<?php include("includes/header.php"); ?>

<!-- BEGIN: Main Menu-->
<?php   include("includes/aside.php"); ?>

<!-- BEGIN: Content-->
      <div class="app-content content">
         <div class="content-overlay"></div>
         <div class="content-wrapper">
            <div class="content-header row">
               <div class="content-header-left col-md-6 col-12 mb-2">
                  <h3 class="content-header-title mb-0">Edit Category</h3>
                  <div class="row breadcrumbs-top">
                  </div>
               </div>
            </div>
            <div class="content-body">
               <!-- Basic form layout section start -->
               <section id="basic-form-layouts">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-content collpase show">
         <div class="card-body">
           <?php  if( $_REQUEST['ref']=='parent' ){ ?>
                <form role="form" id="cat_form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name(Engish)</label>
                    <input type="text" name="post_title" value="<?=$row['category'];?>" class="form-control" id="post_title" required>
                  </div>
                  <!--<div class="form-group">-->
                  <!--  <label for="exampleInputEmail1">Category Name(French)</label>-->
                  <!--  <input type="text" name="post_title_fr" value="<?=$row['category_fr'];?>" class="form-control" id="post_title_fr" required>-->
                  <!--</div>-->
                    <input type="hidden" name="fa" value="fa fa-shopping-cart" class="form-control" id="fa">
                  <div class="form-group ">
                    <label for="exampleInputEmail1">Category Image</label>
                      <input type="file" name="post_image" class="form-control" id="post_image" >
                  </div>
                   <div class="form-group ">
                    <label for="exampleInputEmail1">Banner Image(English)</label>
                      <input type="file" id="banner_image" class="form-control"  name="banner_image">
                  </div>
                  <!-- <div class="form-group ">-->
                  <!--  <label for="exampleInputEmail1">Banner Image(French)</label>-->
                  <!--    <input type="file" id="banner_image_fr" class="form-control"  name="banner_image_fr">-->
                  <!--</div>-->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Shown Home</label>
                      <input type="checkbox" name="shown_home" <?php if($row['shown_home']==1){ echo 'checked'; } ?> id="shown_home" value="1" />
                                    
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Live Sale</label>
                      <input type="checkbox" name="live_sale" <?php if($row['live_sale']==1){ echo 'checked'; } ?> id="live_sale" value="1" />
                                    
                  </div>
                  
                  <div class="form-group row">
                      <label class="col-md-3 label-control" for="projectinput2">Live Sale Expire Date</label>
                      <div class="col-md-9">
                          <input type="datetime-local" name="expire_date_time" id="expire_date_time" value="<?=$row['expire_date_time'];?>"/>
                     </div>
                  </div>
                  <!-- <div class="form-group ">-->
                  <!--  <label for="exampleInputEmail1">Shown Mobile</label>-->
                  <!--    <input type="checkbox" name="shown_mobile" <?php if($row['shown_mobile']==1){ echo 'checked'; } ?> id="shown_mobile" value="1" />-->
                  <!--</div>-->
                  <!--<div class="form-group ">-->
                  <!--  <label for="exampleInputEmail1">Don't Show On Home</label>-->
                  <!--    <input type="checkbox" name="dont_show_on_home" <?php if($row['dont_show_on_home']==1){ echo 'checked'; } ?> id="dont_show_on_home" value="1" />-->
                  <!--</div>-->
                  <!--<div class="form-group ">-->
                  <!--  <label for="exampleInputEmail1">Mobile Text(English)</label>-->
                  <!--    <input type="text" name="mobleText"  id="mobleText" class="form-control" placeholder="enter mobile text in english" value="<?= $row['mobile_text'] ?>" />-->
                  <!--</div> -->
                  <!--<div class="form-group ">-->
                  <!--  <label for="exampleInputEmail1">Mobile Text(French)</label>-->
                  <!--    <input type="text" name="mobleText_fr"  id="mobleText_fr" class="form-control" placeholder="enter mobile text in french" value="<?= $row['mobile_text_fr'] ?>" />-->
                  <!--</div>-->
                  <!--<div class="form-group">-->
                  <!--  <label for="exampleInputPassword1">Sort Order</label>-->
                  <!-- <input type="number" min="1" name="sort_order" value="<?=$row['sort_order'];?>" class="form-control" id="sort_order" >-->
                  <!--</div>-->
<!--                                  <label>Seo Content</label>-->
<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta title(English)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_title_en" value="<?=$rowext['meta_title_en'];?>" placeholder="enter meta title" />-->
<!--  </div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta title(French)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_title_fr" value="<?=$rowext['meta_title_fr'];?>" placeholder="enter meta title" />-->
<!--  </div>-->
<!--</div>-->


<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta Description(English)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_description_en" value="<?=$rowext['meta_description_en'];?>" placeholder="enter meta Description	" />-->
<!--  </div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta Description(French)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_description_fr" value="<?=$row['meta_description_fr'];?>" placeholder="enter meta Description" />-->
<!--  </div>-->
<!--</div>-->


<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta Keywords(English)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_keywords_en" value="<?=$rowext['meta_keywords_en'];?>" placeholder="enter meta Keywords" />-->
<!--  </div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta Keywords(French)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_keywords_fr" value="<?=$rowext['meta_keywords_fr'];?>" placeholder="enter meta Keywords" />-->
<!--  </div>-->
<!--</div>-->
                </div>
                <div class="form-group ">
                      <input type="hidden" name="cat_ref" class="form-control" id="cat_ref" >
                  </div>
                <!-- /.card-body -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary " style="margin-top:25px;margin-bottom:25px;float:right;"><i class="fa fa-check-square-o"></i> Save</button>
                </div>
              </form>
              <?php }else{ ?>
              <form role="form" id="cat_form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name(English)</label>
                    <select name="p_post_title" class="form-control" id="p_post_title" required>
                       
                       <?php $classMaster->categoryTreeParentEdit($id); ?>
 
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sub Category</label>
                    <input type="text" name="s_post_title" value="<?=$row['category'];?>" class="form-control" id="s_post_title" required>
                  </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Category Image</label>
                      <input type="file" name="post_image" class="form-control" id="post_image" >
                  </div>
 
                <div class="form-group ">
                      <input type="hidden" name="s_cat_ref" class="form-control" id="cat_ref" >
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary " style="margin-top:25px;margin-bottom:25px;float:right;"><i class="fa fa-check-square-o"></i> Save</button>
                </div>
              </form>
              <?php } ?>                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!-- // Basic form layout section end -->
            </div>
         </div>
      </div>
    

<!-- END: Content-->
<?php   include("includes/footer.php"); ?>
