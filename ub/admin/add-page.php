<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
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
                  <h3 class="content-header-title mb-0">Add Page</h3>
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
                                 <form class="form form-horizontal form-bordered" id="pageForm" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <input type="hidden" value="page" id="post_name" class="form-control" placeholder="" name="post_name" readonly >
                                         
                                       <h4 class="form-section">Page Info</h4>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Post title(English) </label>
                                          <div class="col-md-9">
                                             <input type="text" id="post_title" class="form-control" placeholder="Enter page Name " name="post_title" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Post title(french) </label>
                                          <div class="col-md-9">
                                             <input type="text" id="post_title_fr" class="form-control" placeholder="Enter page Name " name="post_title_fr" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Post Content(English) </label>
                                          <div class="col-md-9">
                                            <textarea name="post_content" class="form-control" id="post_content" ></textarea>
                                           </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Post Content (french)</label>
                                          <div class="col-md-9">
                                            <textarea name="post_content_fr" class="form-control" id="post_content_fr" ></textarea>
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
                                             <input type="checkbox" value="1" id="shown_home1"  name="shown[]" >&nbsp;topbar&nbsp;
                                             <input type="checkbox" value="2" id="shown_home2"  name="shown[]" >&nbsp;footer
                                          </div>
                                       </div>
                                                                              <lable>SEO Content</lable>
                                       
<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta title(English)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" name="meta_title_en" placeholder="enter meta title" />
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta title(French)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" name="meta_title_fr" placeholder="enter meta title" />
  </div>
</div>


<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta Description(English)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" name="meta_description_en" placeholder="enter meta description" />
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta Description(French)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" name="meta_description_fr" placeholder="enter meta description" />
  </div>
</div>


<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta Keywords(English)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" name="meta_keywords_en" placeholder="enter meta keyword" />
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 label-control" for="projectinput2">Meta Keywords(French)</label>
  <div class="col-md-9">
	  <input type="text"  class="form-control" name="meta_keywords_fr" placeholder="enter meta keyword">
  </div>
</div>
                                       <div class="form-group row" style="display:none">
                                          <label class="col-md-3 label-control" for="projectinput2">Sort Order</label>
                                          <div class="col-md-9">
                                              <input type="number" min="1" class="form-control" name="sort_order" placeholder="0" />
                                          </div>
                                       </div>
                                       <div class="form-group ">
                      <input type="hidden" name="posts_ref" class="form-control" id="posts_ref" >
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

      <script>
         CKEDITOR.replace( 'post_content' );
         CKEDITOR.replace( 'post_content_fr' );
      </script>
      <script type="text/javascript">
         $(document).ready(function (e){
         $("#pageForm").on('submit',(function(e){
          for (instance in CKEDITOR.instances) {
             CKEDITOR.instances[instance].updateElement();
         }
         $.LoadingOverlay("show");
         
         e.preventDefault();
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
         Swal.fire('','Page  Added Successfully','success')
         $("#pageForm")[0].reset();
             return false;
         }
         if($.trim(data)=='failed'){
         $.LoadingOverlay("hide");
         toastr.error('Failed to add Page','error')
         $("#pageForm")[0].reset();
         return false;
         }else{
         $.LoadingOverlay("hide");
         toastr.error('Failed to add Page','error')
         $("#pageForm")[0].reset();
         return false;
         }
         }
             
         });
         }));
         });
      </script> 
 <?php include('includes/footer.php');?>