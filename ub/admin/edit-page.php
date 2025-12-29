<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
       $core_control_oj = new classMaster();
   }
   else{
       header("location:login");
   }
       
         $db=new dbconfig();
         $id=intval($_GET['page_name']);
         $result = $db->dbperform("select * from tbl_posts  where post_id='$id' ");
          $row=$result->fetch_assoc();
          $resultext  = $db->dbperform("select * from tbl_post_extra Where post_extr_id='$id' AND post_tbl='posts'" );
         $rowext =$resultext->fetch_assoc();
        // print_r($row);
   
   if($_SERVER['REQUEST_METHOD']=='POST' && isset( $_POST['update_btn'] ) ){
       //   SEO CONTENT
$meta_title_en = isset($_POST['meta_title_en'])?$db->get_safe_str($_POST['meta_title_en']):'';
$meta_title_fr = isset($_POST['meta_title_fr'])?$db->get_safe_str($_POST['meta_title_fr']):'';

$meta_description_en = isset($_POST['meta_description_en'])?$db->get_safe_str($_POST['meta_description_en']):'';
$meta_description_fr = isset($_POST['meta_description_fr'])?$db->get_safe_str($_POST['meta_description_fr']):'';

$meta_keywords_en = isset($_POST['meta_keywords_en'])?$db->get_safe_str($_POST['meta_keywords_en']):'';
$meta_keywords_fr = isset($_POST['meta_keywords_fr'])?$db->get_safe_str($_POST['meta_keywords_fr']):'';

$post_tbl = 'posts';

    //Product Deatils
        //  $file_name=array();
           
        // for($x=0; $x<count($_FILES["post_image"]["tmp_name"]); $x++ ) {
        
        // $file_name[$x] = $_FILES['u_product_image']['name'][$x];
        
        // move_uploaded_file($_FILES['u_product_image']['tmp_name'][$x],"../admin/assets/".$_FILES['u_product_image']['name'][$x]);
                    
        // }
        // $image=json_encode($file_name);
        if(isset($_FILES['post_image']['tmp_name']) && !empty($_FILES['post_image']['tmp_name'])){
                $post_imagesourcePath = $_FILES['post_image']['tmp_name'];
            	$post_imageargetPath = "assets/" . $_FILES['post_image']['name'];
            	$post_image = $_FILES['post_image']['name'];
            	move_uploaded_file($post_imagesourcePath, $post_imagetargetPath);
        }else{
            	$post_image = $_POST['post_image'];
        }
        $post_title = $_POST['post_title'];
        $post_title_fr = $db->get_safe_str($_POST['post_title_fr']);

        $post_content = $_POST['post_content'];
        $post_content_fr = $_POST['post_content_fr'];
        
        $shown=isset($_POST['shown'])?implode(",",$_POST['shown']):'';
        
        
   
   //update tbl_product
            if( isset( $_FILES['post_image'] ) && $_FILES['post_image']['tmp_name'][0]!=''  ){
                    $db->dbperformm("update tbl_posts set `post_title`='$post_title',`post_title_fr`='$post_title_fr',`post_content`='$post_content',`post_content_fr`='$post_content_fr',`post_shown`='$shown', `post_image`='$post_image'  where post_id='$id'");
            } else{
                    $db->dbperformm("update tbl_posts set `post_title`='$post_title',`post_title_fr`='$post_title_fr',`post_content`='$post_content',`post_content_fr`='$post_content_fr',`post_shown`='$shown'  where post_id='$id'");
            }   
            
            
          //   post extra
        $metaPost =   $db->dbperform("Select * from tbl_post_extra Where post_extr_id='$id' and post_tbl='$post_tbl' ");
            if($metaPost->num_rows > 0){
                $db->dbperformm("update tbl_post_extra set `post_tbl`='$post_tbl',`meta_title_en`='$meta_title_en',`meta_title_fr`='$meta_title_fr',`meta_description_en`='$meta_description_en', `meta_description_fr`='$meta_description_fr',`meta_keywords_en`='$meta_keywords_en' ,`meta_keywords_fr`='$meta_keywords_fr' where post_extr_id='$id' AND post_tbl='$post_tbl' ");
             }else{
                 $db->dbperformm("INSERT INTO `tbl_post_extra`(`post_extr_id`,`post_tbl`,`meta_title_en`, `meta_title_fr`,`meta_description_en`,`meta_description_fr`,`meta_keywords_en`,`meta_keywords_fr`) VALUES ('$id','$post_tbl','$meta_title_en','$meta_title_fr','$meta_description_en','$meta_description_fr','$meta_keywords_en','$meta_keywords_fr')");   
            } 
   ?>
   <script>
       alert('Page Update Successfully');
       window.location.href='edit-page?page_name=<?= $id ?>';
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
                  <h3 class="content-header-title mb-0">Edit Page</h3>
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
                                 <form class="form form-horizontal form-bordered" role="form" method="post" id="pageForm" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <input type="hidden" value="page" id="post_name" class="form-control" placeholder="" name="post_name" readonly >
                                         
                                       <h4 class="form-section">Page Info</h4>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Post title(English) </label>
                                          <div class="col-md-9">
                                             <input type="text" id="post_title" value="<?=$row['post_title'];?>" class="form-control" placeholder="Enter page Name " name="post_title" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Post title(french) </label>
                                          <div class="col-md-9">
                                             <input type="text" id="post_title_fr" value="<?=$row['post_title_fr'];?>" class="form-control" placeholder="Enter page Name " name="post_title_fr" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Post Content(English) </label>
                                          <div class="col-md-9">
                                            <textarea name="post_content" class="form-control" id="post_content" ><?=$row['post_content'];?></textarea>
                                           </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Post Content (french)</label>
                                          <div class="col-md-9">
                                            <textarea name="post_content_fr" class="form-control" id="post_content_fr" ><?=$row['post_content_fr'];?></textarea>
                                           </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Image</label>
                                          <div class="col-md-9">
                                             <input type="file" id="post_image" class="form-control"  name="post_image" accept='image/*' >
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Shown</label>
                                          <div class="col-md-9">
                                             <input type="checkbox" value="1" id="shown_home1" <?php if($row['post_shown']==1){ echo 'checked'; } ?>  name="shown[]" >&nbsp;topbar&nbsp;
                                             <input type="checkbox" value="2" id="shown_home2" <?php if($row['post_shown']==2){ echo 'checked'; } ?> name="shown[]" >&nbsp;footer
                                          </div>
                                       </div>
                                                                              <lable>SEO Content</lable>
                                       
<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta title(English)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" value="<?=$rowext['meta_title_en'];?>" name="meta_title_en" placeholder="enter meta title" />
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta title(French)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" value="<?=$rowext['meta_title_fr'];?>" name="meta_title_fr" placeholder="enter meta title" />
  </div>
</div>


<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta Description(English)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" value="<?=$rowext['meta_description_en'];?>"  name="meta_description_en" placeholder="enter meta description" />
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta Description(French)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" value="<?=$rowext['meta_description_fr'];?>" name="meta_description_fr" placeholder="enter meta description" />
  </div>
</div>


<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta Keywords(English)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" value="<?=$rowext['meta_keywords_en'];?>" name="meta_keywords_en" placeholder="enter meta keyword" />
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta Keywords(French)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" value="<?=$rowext['meta_keywords_fr'];?>" name="meta_keywords_fr" placeholder="enter meta keyword">
  </div>
</div>
                                      
                                       <div class="form-group ">
                                       </div>
                                        <button type="submit" class="btn btn-primary " name="update_btn" style="float: right;">Submit</button>
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
 <script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
  <script type="text/javascript">
    $("#p_post_title").on('change',(function(e){
    var p_post_title=$("#p_post_title").val();
    var include_ref='ref';
    $.ajax({
    url: "classes/control.php",
    data: { p_post_title:p_post_title,include_ref:include_ref },
    method:"POST",
    success: function(data){
    if(data!==''){
    $("#p_post_title2").html(data);
    }
    }
    });
    }));
    
     //Check Product 
        $('#u_product_title').on('change',(function(e){
                var pr = $(this).val();
                var include_ref='product';
                $.ajax({
                     url: "classes/search.php",
                     data: { product_title:pr,include_ref:include_ref },
                     method:"POST",
                     success: function(data){
                     if(data > 0 ){
                         alert('Product name Allready Exist');
                       $("#u_product_title").val('');
                    }
         }
         });
        }));
        
</script>
<script>
CKEDITOR.replace( 'post_content' );
CKEDITOR.replace( 'post_content_fr' );
</script>
<?php   include("includes/footer.php"); ?>
