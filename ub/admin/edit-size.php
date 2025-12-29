<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
   }
   else{
       header("location:login");
   }
    
     $db=new dbconfig();
     $id=intval($_GET['size_name']);
     $result = $db->dbperform("select * from tbl_size where size_id='$id'");
     $row=$result->fetch_assoc();
        
   if($_SERVER['REQUEST_METHOD']=='POST' && isset( $_POST['sizeRef'] ) ){
       
        if(isset($_FILES['post_image']['name']) && !empty($_FILES['post_image']['name'])){
           
             $file_name = $_FILES['post_image']['name'];
             move_uploaded_file($_FILES['post_image']['tmp_name'], "assets/" . $_FILES['post_image']['name']);
             $image = $file_name;
        
        $sizeName = $_POST['sizeName'];
        $sizeName_fr = $_POST['sizeName_fr'];
        $shownHome = isset($_POST['shown_home'])?$_POST['shown_home']:'';
        $db->dbperform("update tbl_size set `size_name`='$sizeName', `size_name_fr`='$sizeName_fr',`shown_home`='$shownHome',`size_image`='$image'  where size_id='$id'");
    }else{       
        // print_r($_POST);die();
        $sizeName = $_POST['sizeName'];
        $sizeName_fr = $_POST['sizeName_fr'];
        $shownHome = isset($_POST['shown_home'])?$_POST['shown_home']:'';
        // $db->dbperform("update tbl_size set `size_name`='$sizeName',`shown_home`='$shownHome' where brand_id='$id'");
        $db->dbperform("update `tbl_size` set `size_name`='$sizeName' ,`size_name_fr`='$sizeName_fr' where `size_id`='$id'");
     
        }
        
        // header("location:edit-size?size_name=".$id);   
    ?>
   <script>
       alert('Size Update Successfully');
       window.location.href='edit-size?size_name=<?= $id ?>';
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
                  <h3 class="content-header-title mb-0">Edit Size</h3>
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
                                 <form class="form form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                                    <div class="form-body">
                                       <h4 class="form-section">Size  Info</h4>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Size Name(English)</label>
                                          <div class="col-md-9">
                                             <input type="text" id="projectinput2" class="form-control" value="<?=$row['size_name'];?>" placeholder="Enter Brand Name" name="sizeName" required>
                                          </div>
                                       </div> 
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Size Name(French)</label>
                                          <div class="col-md-9">
                                             <input type="text" id="sizeName2" class="form-control" value="<?=$row['size_name_fr'];?>" placeholder="Enter Brand Name" name="sizeName_fr" required>
                                          </div>
                                       </div> 
                                       <!--<div class="form-group row">-->
                                       <!--   <label class="col-md-3 label-control" for="projectinput2">Image</label>-->
                                       <!--   <div class="col-md-9">-->
                                       <!--         <input type="file" name="post_image" class="form-control" id="post_image" >-->
                                       <!--     </div>-->
                                       <!--</div>-->
                                       <!--<div class="form-group row">-->
                                       <!--   <label class="col-md-3 label-control" for="projectinput2">Shown Home</label>-->
                                       <!--   <div class="col-md-9">-->
                                       <!--      <input type="checkbox" id="shown_home" <?php if($row['shown_home']==1){ echo 'checked';}?> value="1" name="shown_home" >-->
                                       <!--   </div>-->
                                       <!--</div>-->
                                       <div class="form-group ">
                                          <input type="hidden" name="sizeRef" class="form-control" id="sizeRef" >
                                       </div>
                                       <button type="submit" class="btn btn-primary" style="margin-top:25px;margin-bottom:25px;float:right;">
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
<?php   include("includes/footer.php"); ?>
