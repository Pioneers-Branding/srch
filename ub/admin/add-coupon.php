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
                  <h3 class="content-header-title mb-0">Add Coupon</h3>
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
                                       <h4 class="form-section">Coupon  Info</h4>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Coupon Name(English)</label>
                                          <div class="col-md-9">
                                             <input type="text" name="coupon_name" class="form-control" value="" id="coupon_name" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Coupon Name(French)</label>
                                          <div class="col-md-9">
                                             <input type="text" name="coupon_name_fr" class="form-control" value="" id="coupon_name_fr" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Coupon Description(English)</label>
                                          <div class="col-md-9">
                                             <input type="text" name="coupon_description" class="form-control" value="" id="coupon_description" required>
                                          </div>
                                       </div>
                                  <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Coupon Description(French)</label>
                                          <div class="col-md-9">
                                             <input type="text" name="coupon_description_fr" class="form-control" value="" id="coupon_description_fr" required>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Coupon % ( Dont Add The Percent Symbol)</label>
                                          <div class="col-md-9">
                                             <input type="number" min="1" name="coupon_amt" class="form-control" id="coupon_amt"  required>
                                          </div>
                                       </div>
                                       
                                       <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Coupon Minimun Amount</label>
                                          <div class="col-md-9">
                                             <input type="text"  name="couponMin" class="form-control" id="couponMin"  required>
                                          </div>
                                       </div>
                                       
                                        <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Coupon Expire Date</label>
                                          <div class="col-md-9">
                                             <input type="date"  name="couponExp" class="form-control" id="couponExp"  required>
                                          </div>
                                       </div>
                                        <div class="form-group row">
                                          <label class="col-md-3 label-control" for="projectinput2">Coupon For </label>
                                          <div class="col-md-9">
                                             <input type="radio" value="1" id="coupon_for"  name="coupon_for" > All
                                             <input type="radio" value="0" id="coupon_for"  name="coupon_for" > Selected
                                          </div>
                                       </div>
                             
                             
                                       <div class="form-group ">
                                          <input type="hidden" name="coupon_ref" class="form-control" id="coupon_ref" >
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
         Swal.fire('','Coupon Added Successfully','success')
         $("#CategoryForm")[0].reset();
         return false;
         }
         if($.trim(data)=='failed'){
         $.LoadingOverlay("hide");
         Swal.fire('','Failed to add Coupon','error')
         $("#CategoryForm")[0].reset();
         return false;
         }
          if($.trim(data)=='exists'){
         $.LoadingOverlay("hide");
         Swal.fire('','Coupon Already Exist','info')
         $("#CategoryForm")[0].reset();
         return false;
         }
         }
             
         });
         }));
         });
      </script> 
<?php   include("includes/footer.php"); ?>
