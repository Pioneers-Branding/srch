<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
       $classMaster = new classMaster();
       $db=new dbconfig();
   }
   else{
       header("location:login");
   }
   ?>
    <?php 
    if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=='POST'){
       
     $p_post_title = $_POST['p_post_title'];
    //   print_r($_POST['s_post_title']);die();
      for($s=0;$s<count($_POST['s_post_title']);$s++){
          
            $s_post_title = $db->get_safe_str($_POST['s_post_title'][$s]);
            $s_post_title_fr = $db->get_safe_str($_POST['s_post_title_fr'][$s]);
            $s_post_titleeUrl = preg_replace(array(
                '/[^a-zA-Z0-9 -]/',
                '/[ -]+/',
                '/^-|-$/'
            ) , array(
                '',
                '-',
                ''
            ) , $s_post_title);
            
            $sourcePath = $_FILES['post_image']['tmp_name'][$s];
            $targetPath = "assets/" . $_FILES['post_image']['name'][$s];
            $image = $_FILES['post_image']['name'][$s];
            move_uploaded_file($image, $targetPath);

            $url = strtolower($s_post_titleeUrl);
            $faIcon ='<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
 // SEO CONTENT

$meta_title_en = isset($_POST['meta_title_en'])?$db->get_safe_str($_POST['meta_title_en'][$s]):'';
$meta_title_fr = isset($_POST['meta_title_fr'])?$db->get_safe_str($_POST['meta_title_fr'][$s]):'';

$meta_description_en = isset($_POST['meta_description_en'])?$db->get_safe_str($_POST['meta_description_en'][$s]):'';
$meta_description_fr = isset($_POST['meta_description_fr'])?$db->get_safe_str($_POST['meta_description_fr'][$s]):'';

$meta_keywords_en = isset($_POST['meta_keywords_en'])?$db->get_safe_str($_POST['meta_keywords_en'][$s]):'';
$meta_keywords_fr = isset($_POST['meta_keywords_fr'])?$db->get_safe_str($_POST['meta_keywords_fr'][$s]):'';
$post_tbl = 'subCat';           
            $db->dbperformm("INSERT INTO `tbl_subCategory`(`category`, `category_fr`,`cat_url` , `cat_fafa`, `cat_image`, `category_id`,`cat_status`) VALUES ('$s_post_title','$s_post_title_fr','$url','$faIcon','$image','$p_post_title','1')");
            // header("location:add-sub-category");   
            
            
$last_id_result = $db->dbperform("select id from `tbl_subCategory` where cat_status='1' Order by id DESC");
$last_id_row = $last_id_result->fetch_assoc();
$insId = $last_id_row['id'];

$db->dbperformm("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$insId','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");
  
 
    }
    
    
           ?>
    
   <script>
       alert('Sub Category Add Succses');
      window.location.href='add-sub-category';
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
                  <h3 class="content-header-title mb-0">Add Sub Category</h3>
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
                                 <form class="form form-horizontal form-bordered"  id="SubCategoryForm" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                       <h4 class="form-section">Sub Category  Info</h4>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Select Category </label>
                                          <div class="col-md-9">
                                            <select name="p_post_title" class="form-control" id="p_post_title" required>
                                           
                                           <?php $classMaster->categoryTreeParent(); ?>
                     
                                            </select>
                                            </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Sub Category Name(English)</label>
                                          <div class="col-md-9">
                                             <input type="text" id="s_post_title"  class="form-control"  name="s_post_title[]" required>
                                          </div>
                                       </div> 
                                       <!--<div class="form-group row">-->
                                       <!--   <label class="col-md-3 label-control" for="projectinput2">Sub Category Name(French)</label>-->
                                       <!--   <div class="col-md-9">-->
                                       <!--      <input type="text" id="s_post_title_fr"  class="form-control"  name="s_post_title_fr[]" required>-->
                                       <!--   </div>-->
                                       <!--</div>-->
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Image</label>
                                          <div class="col-md-9">
                                             <input type="file" id="post_image" class="form-control"  name="post_image[]" required>
                                          </div>
                                       </div>
<!--                                                                              <label>Seo Content</label>-->
<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta title(English)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_title_en[]" placeholder="enter meta title" />-->
<!--</div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta title(French)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_title_fr[]" placeholder="enter meta title" />-->
<!--</div>-->
<!--</div>-->


<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Description(English)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_description_en[]" placeholder="enter meta Description	" />-->
<!--</div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Description(French)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_description_fr[]" placeholder="enter meta Description" />-->
<!--</div>-->
<!--</div>-->


<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Keywords(English)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_keywords_en[]" placeholder="enter meta Keywords" />-->
<!--</div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--<label class="col-md-3 label-control" for="projectinput2">Meta Keywords(French)</label>-->
<!--<div class="col-md-9">-->
<!--<input type="text"  class="form-control" name="meta_keywords_fr[]" placeholder="enter meta Keywords" />-->
<!--</div>-->
<!--</div>-->
                                        <div id="tblBody">
                                            
                                        </div>
                                        
                                        <a href="" class="btn btn-info add_row" style="margin-top:25px;margin-bottom:25px;float:left;">Add More</a>
                                       
                                       <button type="submit" name="SubCategoryForm" class="btn btn-primary" style="margin-top:25px;margin-bottom:25px;float:right;">
                                       <i class="fa fa-check-square-o"></i> Save
                                       </button>
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
 <script>
$(document).ready(function(){
$(".add_row").click(function(ev){
ev.preventDefault();
$("#tblBody").append('<div class="form-group row"><label class="col-md-3 label-control" for="projectinput2">Sub Category Name(English)</label><div class="col-md-9"><input type="text" id="s_post_title"  class="form-control"  name="s_post_title[]" required></div><label class="col-md-3 label-control" for="projectinput2">Sub Category Name(French)</label><div class="col-md-9"><input type="text" id="s_post_title_fr"  class="form-control"  name="s_post_title_fr[]" required></div><label class="col-md-3 label-control" for="projectinput2">Image</label><div class="col-md-9"><input type="file" id="post_image" class="form-control"  name="post_image[]" ></div><label class="col-md-3 label-control" for="projectinput2">Shown Home</label><div class="col-md-9"><input type="checkbox" id="shown_home"   name="shown_home[]" value="1" ></div><label class="col-md-3 label-control" for="projectinput2">Sort Order</label><div class="col-md-9"><input type="number" min="1" class="form-control" name="sort_order[]" id="sort_order" value="1" /></div><label class="col-md-3 label-control" for="projectinput2"></label><div class="col-md-9"><a href="" class="btn btn-danger remove_row" style="margin-top:25px;margin-bottom:25px;float:left;">Remove</a></div></div>');
    
});


$(document).on("click",".remove_row",function(ev){
ev.preventDefault();
$(this).parent().parent().remove();

});
});
</script>
<?php   include("includes/footer.php"); ?>
