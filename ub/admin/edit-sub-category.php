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
    $parentid=intval($_GET['ref']);
    $result = $db->dbperform("select * from tbl_subCategory where id='$id' AND category_id='$parentid' ");
    $row=$result->fetch_assoc();
    $resultext  = $db->dbperform("select * from tbl_post_extra Where post_extr_id='$id' AND post_tbl='subCat'" );
    $rowext =$resultext->fetch_assoc();
    // print_r($resultext);
    
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['s_cat_ref']))
{
//SEO CONTENT    
$meta_title_en = isset($_POST['meta_title_en'])?$db->get_safe_str($_POST['meta_title_en']):'';
$meta_title_fr = isset($_POST['meta_title_fr'])?$db->get_safe_str($_POST['meta_title_fr']):'';

$meta_description_en = isset($_POST['meta_description_en'])?$db->get_safe_str($_POST['meta_description_en']):'';
$meta_description_fr = isset($_POST['meta_description_fr'])?$db->get_safe_str($_POST['meta_description_fr']):'';

$meta_keywords_en = isset($_POST['meta_keywords_en'])?$db->get_safe_str($_POST['meta_keywords_en']):'';
$meta_keywords_fr = isset($_POST['meta_keywords_fr'])?$db->get_safe_str($_POST['meta_keywords_fr']):'';

$post_tbl = 'subCat';

    if (isset($_FILES['post_image']) && $_FILES['post_image']['tmp_name'] != '')
    {

        $file_name = $_FILES['post_image']['name'];

        move_uploaded_file($_FILES['post_image']['tmp_name'], "assets/" . $_FILES['post_image']['name']);

        $image = $file_name;

        $post_title = $_POST['p_post_title'];

        $s_post_title = $db->get_safe_str($_POST['s_post_title']);
        $s_post_title_fr = $db->get_safe_str($_POST['s_post_title_fr']);

        $db->dbperformm("update tbl_subCategory set `category`='$s_post_title',`category_fr`='$s_post_title_fr',`category_id`='$post_title',`cat_image`='$image' where id='$id'");

        // header("location:edit-sub-category?category=" . $id);
    }
    if (isset($_FILES['post_image']) && $_FILES['post_image']['tmp_name'] == '')
    {
        $post_title = $_POST['p_post_title'];

        $s_post_title = $_POST['s_post_title'];
        $s_post_title_fr = $_POST['s_post_title_fr'];

        $db->dbperformm("update tbl_subCategory set `category`='$s_post_title',`category_fr`='$s_post_title_fr',`category_id`='$post_title' where id='$id'");

        // header("location:edit-sub-category?category=" . $id);

    }
    
//   post extra
$metaPost =   $db->dbperform("Select * from tbl_post_extra Where post_extr_id='$id' and post_tbl='$post_tbl' ");
if($metaPost->num_rows > 0){
$db->dbperformm("update tbl_post_extra set `post_tbl`='$post_tbl',`meta_title_en`='$meta_title_en',`meta_title_fr`='$meta_title_fr',`meta_description_en`='$meta_description_en', `meta_description_fr`='$meta_description_fr',`meta_keywords_en`='$meta_keywords_en' ,`meta_keywords_fr`='$meta_keywords_fr' where post_extr_id='$id' And post_tbl='$post_tbl' ");
}else{
   $db->dbperformm("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$id','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");    
}     
    ?>
   <script>
       alert('Sub Category Update Successfully');
       window.location.href='edit-sub-category?category=<?= $id ?>&ref=<?= $parentid ?>';
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
                  <h3 class="content-header-title mb-0">Edit Sub Category</h3>
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
              <form role="form" id="cat_form" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <select name="p_post_title" class="form-control" id="p_post_title" required>
                       
                       <?php $classMaster->categoryTreeParentEdit($id); ?>
 
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Sub Category(English)</label>
                    <input type="text" name="s_post_title" value="<?=$row['category'];?>" class="form-control" id="s_post_title" required>
                  </div>
                  <!--<div class="form-group">-->
                  <!--  <label for="exampleInputPassword1">Sub Category(French)</label>-->
                  <!--  <input type="text" name="s_post_title_fr" value="<?=$row['category_fr'];?>" class="form-control" id="s_post_title_fr" placeholder="enter category name" required>-->
                  <!--</div>-->
                <div class="form-group ">
                    <label for="exampleInputEmail1">Category Image</label>
                      <input type="file" name="post_image" class="form-control" id="post_image" >
                  </div>
<!--                   <label>Seo Content</label>-->
<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta title(English)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_title_en" value="<?=$rowext['meta_title_en'];?>" placeholder="enter meta title" />-->
<!--</div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta title(French)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_title_fr" value="<?=$rowext['meta_title_fr'];?>" placeholder="enter meta title" />-->
<!--</div>-->
<!--</div>-->


<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Description(English)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_description_en" value="<?=$rowext['meta_description_en'];?>" placeholder="enter meta Description	" />-->
<!--</div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Description(French)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_description_fr" value="<?=$rowext['meta_description_fr'];?>" placeholder="enter meta Description" />-->
<!--</div>-->
<!--</div>-->


<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Keywords(English)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_keywords_en" value="<?=$rowext['meta_keywords_en'];?>" placeholder="enter meta Keywords" />-->
<!--</div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Keywords(French)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_keywords_fr" value="<?=$rowext['meta_keywords_fr'];?>" placeholder="enter meta Keywords" />-->
<!--</div>-->
<!--</div>-->

                <div class="form-group ">
                      <input type="hidden" name="s_cat_ref" class="form-control" id="cat_ref" >
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary " style="margin-top:25px;margin-bottom:25px;float:right;"><i class="fa fa-check-square-o"></i> Save</button>
                </div>
              </form>
                                         </div>
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
