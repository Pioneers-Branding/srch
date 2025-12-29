<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
        $db=new dbconfig();
        
        $resultext  = $db->dbperform("select * from tbl_post_extra Where post_extr_id='1' AND post_tbl='home'" );
         $rowext =$resultext->fetch_assoc();
        //  print_r($rowext);
   }
   else{
       header("location:login");
   }
   
   
   ?>

  <!-- BEGIN: Header-->
 <?php include('includes/header.php');?>
 <?php include('includes/aside.php');?>
  <!-- BEGIN: Content-->
            <div class="app-content content">
         <div class="content-overlay"></div>
         <div class="content-wrapper">
            <div class="content-header row">
               <div class="content-header-left col-md-6 col-12 mb-2">
                  <h3 class="content-header-title mb-0">EDIT SETTING</h3>
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
                            <form class="form form-horizontal form-bordered" id="settingForm" enctype="multipart/form-data">
                                    <div class="form-body">
                                          
                                       <h4 class="form-section">Seo Content</h4>
 <input type="hidden"  class="form-control" name="post_id" value="<?= isset($rowext['post_extr_id'])?$rowext['post_extr_id']:''?>" readonly  />
                                      
<div class="form-group row">
<label class="col-md-3 label-control" for="projectinput2">Meta title(English)</label>
<div class="col-md-9">
<input type="text"  class="form-control" name="meta_title_en" value="<?= isset($rowext['meta_title_en'])?$rowext['meta_title_en']:''?>" placeholder="enter meta title" />
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="projectinput2">Meta title(French)</label>
<div class="col-md-9">
<input type="text"  class="form-control" name="meta_title_fr" value="<?= isset($rowext['meta_title_fr'])?$rowext['meta_title_fr']:''?>" placeholder="enter meta title" />
</div>
</div>


<div class="form-group row">
<label class="col-md-3 label-control" for="projectinput2">Meta Description(English)</label>
<div class="col-md-9">
<input type="text"  class="form-control" name="meta_description_en" value="<?= isset($rowext['meta_title_en'])?$rowext['meta_title_en']:''?>" placeholder="enter meta Description	" />
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="projectinput2">Meta Description(French)</label>
<div class="col-md-9">
<input type="text"  class="form-control" name="meta_description_fr" value="<?= isset($rowext['meta_description_fr'])?$rowext['meta_description_fr']:''?>" placeholder="enter meta Description" />
</div>
</div>


<div class="form-group row">
<label class="col-md-3 label-control" for="projectinput2">Meta Keywords(English)</label>
<div class="col-md-9">
<input type="text"  class="form-control" name="meta_keywords_en" value="<?= isset($rowext['meta_keywords_en'])?$rowext['meta_keywords_en']:''?>" placeholder="enter meta Keywords" />
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="projectinput2">Meta Keywords(French)</label>
<div class="col-md-9">
<input type="text"  class="form-control" name="meta_keywords_fr" value="<?= isset($rowext['meta_keywords_fr'])?$rowext['meta_keywords_fr']:''?>" placeholder="enter meta Keywords" />
</div>
</div>
<div class="form-group row">
        <input type="hidden" name="setting_ref" class="form-control" id="setting_ref" >
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
 <script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>


 <script type="text/javascript">
    $(document).ready(function (e){
         $("#settingForm").on('submit',(function(e){
              e.preventDefault();
             $.LoadingOverlay("show");
         $.ajax({
                url: "classes/control.php",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                        if($.trim(data)=='success'){
                                $.LoadingOverlay("hide");
                                Swal.fire('','Upadate Successfully','success');
                                return false;
                                }
                         if($.trim(data)=='failed'){
                                 $.LoadingOverlay("hide");
                                 toastr.error('Failed to Update ','error');
                                   return false;
                         }else{
                                 $.LoadingOverlay("hide");
                                 toastr.error('Failed to Update ','error')
                                    return false;
                         }
                }
             
                });
         }));
    });
      </script> 
 <?php include('includes/footer.php');?>