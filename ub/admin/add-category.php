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
                  <h3 class="content-header-title mb-0">Add Category</h3>
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
                                 <form class="form form-horizontal form-bordered" id="CategoryForm">
                                    <div class="form-body">
                                       <h4 class="form-section">Category  Info</h4>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Category Name(English)</label>
                                          <div class="col-md-9">
                                             <input type="text" id="post_title" class="form-control" placeholder="Enter Category Name" name="post_title" required>
                                          </div>
                                       </div>
                                       <!--<div class="form-group row">-->
                                       <!--   <label class="col-md-3 label-control" for="projectinput2">Category Name(French)</label>-->
                                       <!--   <div class="col-md-9">-->
                                       <!--      <input type="text" id="post_title_fr" class="form-control" placeholder="Enter Category Name" name="post_title_fr" required>-->
                                       <!--   </div>-->
                                       <!--</div>-->
                                       <input type="hidden" id="fa" value="fa fa-shopping-cart" class="form-control"  name="fa" value="fa fa-shopping-cart">
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Image</label>
                                          <div class="col-md-9">
                                             <input type="file" id="post_image" class="form-control"  name="post_image" required>
                                          </div>
                                       </div>
                                        <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Banner Image(English)</label>
                                          <div class="col-md-9">
                                             <input type="file" id="banner_image" class="form-control"  name="banner_image">
                                          </div>
                                       </div>
                                       <!--<div class="form-group row">-->
                                       <!--   <label class="col-md-3 label-control" for="projectinput2">Banner Image(French)</label>-->
                                       <!--   <div class="col-md-9">-->
                                       <!--      <input type="file" id="banner_image_fr" class="form-control"  name="banner_image_fr">-->
                                       <!--   </div>-->
                                       <!--</div>-->
                                        <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Shown Home</label>
                                          <div class="col-md-9">
                                              <input type="checkbox" name="shown_home" id="shown_home" value="1" />
                                         </div>
                                       </div>
                                       
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Live Sale</label>
                                          <div class="col-md-9">
                                              <input type="checkbox" name="live_sale" id="live_sale" value="1" />
                                         </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Live Sale Expire Date</label>
                                          <div class="col-md-9">
                                              <input type="datetime-local" name="expire_date_time" id="expire_date_time"/>
                                         </div>
                                       </div>
                                       <!--<div class="form-group row">-->
                                       <!--   <label class="col-md-3 label-control" for="projectinput2">Live Sale Expire Time</label>-->
                                       <!--   <div class="col-md-9">-->
                                       <!--       <input type="time" name="expire_time" id="expire_time"/>-->
                                       <!--  </div>-->
                                       <!--</div>-->
                                       <!--<div class="form-group row">-->
                                       <!--   <label class="col-md-3 label-control" for="projectinput2">Shown Mobile</label>-->
                                       <!--   <div class="col-md-9">-->
                                       <!--       <input type="checkbox" name="shown_mobile" id="shown_mobile" value="1" />-->
                                       <!--  </div>-->
                                       <!--</div>-->
                                       <!--<div class="form-group row">-->
                                       <!--   <label class="col-md-3 label-control" for="projectinput2">Don't Show On Home</label>-->
                                       <!--   <div class="col-md-9">-->
                                       <!--       <input type="checkbox" name="dont_show_on_home" id="dont_show_on_home" value="1" />-->
                                       <!--  </div>-->
                                       <!--</div>-->
                                       <!--<div class="form-group row">-->
                                       <!--   <label class="col-md-3 label-control" for="projectinput2">Mobile Text(English)</label>-->
                                       <!--   <div class="col-md-9">-->
                                       <!--      <input type="text" name="mobileText" class="form-control" id="mobileText" placeholder="enter mobile text" value=" " />-->
                                       <!--  </div>-->
                                       <!--</div>-->
                                       <!--<div class="form-group row">-->
                                       <!--   <label class="col-md-3 label-control" for="projectinput2">Mobile Text(French)</label>-->
                                       <!--   <div class="col-md-9">-->
                                       <!--      <input type="text" name="mobileText_fr" class="form-control" id="mobileText_fr" placeholder="enter mobile text" value=" " />-->
                                       <!--  </div>-->
                                       <!--</div>-->
                                       <!--<div class="form-group row">-->
                                       <!--   <label class="col-md-3 label-control" for="projectinput2">Sort Order</label>-->
                                       <!--   <div class="col-md-9">-->
                                       <!--       <input type="number" min="1" class="form-control" name="sort_order" id="sort_order" value="1" />-->
                                       <!--  </div>-->
                                       <!--</div>-->
<!--   <label>Seo Content</label>-->
<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta title(English)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_title_en" placeholder="enter meta title" />-->
<!--  </div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta title(French)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_title_fr" placeholder="enter meta title" />-->
<!--  </div>-->
<!--</div>-->


<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta Description(English)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_description_en" placeholder="enter meta Description	" />-->
<!--  </div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta Description(French)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_description_fr" placeholder="enter meta Description" />-->
<!--  </div>-->
<!--</div>-->


<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta Keywords(English)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_keywords_en" placeholder="enter meta Keywords" />-->
<!--  </div>-->
<!--</div>-->

<!--<div class="form-group row">-->
<!--  <label class="col-md-3 label-control" for="projectinput2">Meta Keywords(French)</label>-->
<!--  <div class="col-md-9">-->
<!--	  <input type="text"  class="form-control" name="meta_keywords_fr" placeholder="enter meta Keywords" />-->
<!--  </div>-->
<!--</div>                                       -->
                                       <div class="form-group ">
                                          <input type="hidden" name="cat_ref" class="form-control" id="cat_ref" >
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
         $("#CategoryForm").on('submit',(function(e){
          
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
         Swal.fire('','Category Added Successfully','success')
         $("#CategoryForm")[0].reset();
         return false;
         }
         if($.trim(data)=='failed'){
         $.LoadingOverlay("hide");
         Swal.fire('','Failed to add Category','error')
         $("#CategoryForm")[0].reset();
         return false;
         }
          if($.trim(data)=='exists'){
         $.LoadingOverlay("hide");
         Swal.fire('','Category Already Exist','info')
         $("#CategoryForm")[0].reset();
         return false;
         }
         }
             
         });
         }));
         });
      </script>
<?php   include("includes/footer.php"); ?>
