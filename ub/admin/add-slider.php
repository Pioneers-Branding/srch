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
<?php include("includes/header.php"); ?>

<!-- BEGIN: Main Menu-->
<?php   include("includes/aside.php"); ?>

<!-- BEGIN: Content-->
   <div class="app-content content">
         <div class="content-overlay"></div>
         <div class="content-wrapper">
            <div class="content-header row">
               <div class="content-header-left col-md-6 col-12 mb-2">
                  <h3 class="content-header-title mb-0">Add Slider</h3>
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
                                 <form class="form form-horizontal form-bordered" id="sliderForm" enctype="multipart/form-data">
                                    <div class="form-body">
                                       <h4 class="form-section">Slider Info</h4>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Slider Name </label>
                                          <div class="col-md-9">
                                             <input type="text" id="post_title" class="form-control" placeholder="Enter slider Name " name="post_title" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Image</label>
                                          <div class="col-md-9">
                                             <input type="file" id="post_image" class="form-control"  name="post_image" accept='image/*'  required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Shown Home </label>
                                          <div class="col-md-9">
                                             <input type="checkbox" value="1" id="shown_home"  name="shown_home" >
                                          </div>
                                       </div>
                                       <div class="form-group ">
                      <input type="hidden" name="slider_ref" class="form-control" id="slider_ref" >
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
 <script type="text/javascript">
         $(document).ready(function (e){
         $("#sliderForm").on('submit',(function(e){
          
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
         Swal.fire('','Slider  Added Successfully','success')
         $("#sliderForm")[0].reset();
         return false;
         }
         if($.trim(data)=='failed'){
         $.LoadingOverlay("hide");
         toastr.error('Failed to add Slider','error')
         $("#sliderForm")[0].reset();
         return false;
         }
         }
             
         });
         }));
         });
      </script>
<?php   include("includes/footer.php"); ?>
