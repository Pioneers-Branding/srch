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
                  <h3 class="content-header-title mb-0">Add Child Category</h3>
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
 <form role="form" id="product_form" enctype="multipart/form-data">
                           <div class="card-body ">
                              <div class="row">
                             
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Category </label>
                                    <select name="p_post_title" class="form-control" id="p_post_title" multiple>
                                        <option value="">Select Category</option>
                                    <?php $core_control_oj->categoryTreeParent(); ?>
                                    </select>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Sub Category </label>
                                    <select name="p_post_title2" class="form-control" id="p_post_title2" >
                                        <option value="">First Select Category</option>
                                    </select>
                                 </div>
                             
                              
                              
                                 
                                 
                                
                                 
                                 
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Child Category(English)</label>
                                    <input type="text" name="product_title" class="form-control" id="product_title" required>
                                 </div> 
                                  
                                  
                                   <div class="form-group ">
                                 <input type="hidden" name="child_ref" class="form-control" id="product_ref" >
                              </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="form-group">
                              <button type="submit" class="btn btn-primary " style="margin-bottom:15px;float: right;">Submit</button>
                           </div>
                 
                     </form>                              </div>
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

      <!--<script>-->
      <!--   CKEDITOR.replace( 'product_desc' );-->
      <!--   CKEDITOR.replace( 'product_short_desc' );-->
      <!--   CKEDITOR.replace( 'product_desc_fr' );-->
      <!--</script>-->
     
      <script type="text/javascript">
         $(document).ready(function (e){
         $("#product_form").on('submit',(function(e){
         for (instance in CKEDITOR.instances) {
         CKEDITOR.instances[instance].updateElement();
         }
           $.LoadingOverlay("show");
        
        // Hide it after 3 seconds

         e.preventDefault();
         $.ajax({
         url: "classes/control.php",
         type: "POST",
         data:  new FormData(this),
         contentType: false,
         cache: false,
         processData:false,
         success: function(data){
             console.log(data);
         if($.trim(data)=='success'){
         $.LoadingOverlay("hide");
         Swal.fire('','Child Category  Added Successfully','success')
         for (instance in CKEDITOR.instances) {
         CKEDITOR.instances[instance].updateElement();
         CKEDITOR.instances[instance].setData('');
         }
         $("#product_form")[0].reset();
         return false;
         }
         if($.trim(data)=='failed'){
         $.LoadingOverlay("hide");
         for (instance in CKEDITOR.instances) {
         CKEDITOR.instances[instance].updateElement();
         CKEDITOR.instances[instance].setData('');
         }
         Swal.fire('','Failed to add Child Category','error')
         $("#product_form")[0].reset();
         return false;
         }
         
         }
             
         });
         }));
         });
      </script> 
      <script type="text/javascript">
         $("#p_post_title").on('change',(function(e){
         var p_post_title=$("#p_post_title").val();
         
        //  alert(p_post_title);
         var include_ref='ref';
         $.ajax({
         url: "classes/control.php",
         data: { p_post_title:p_post_title,include_ref:include_ref },
         method:"POST",
         success: function(data){
             console.log(data);
         if(data!==''){
         $("#p_post_title2").html(data);
         }
         }
         });
         }));
         // Show full page LoadingOverlay
        
        //Check Product 
        $('#product_title').on('change',(function(e){
                var pr = $(this).val();
                var subcategory=$('#p_post_title2').val();
                var include_ref='child';
                $.ajax({
                     url: "classes/search.php",
                     data: { child_category:pr,include_ref:include_ref,subcategory:subcategory },
                     method:"POST",
                     success: function(data){
                     if(data > 0 ){
                         alert('Child Category Already Exist');
                       $("#product_title").val('');
                    }
         }
         });
        }));
        
      </script>
         <script type="text/javascript">
      function addMoreFields(){
         var counterValue =  $("#appendValue").val();
         $.ajax({
         url: "moreFieldsAjax.php",
         type: "POST",
         data:  $.param( {counterValue:counterValue} ),
         success: function(data){
         if(data!==''){
         $("#appendDiv").append(data);
         counterValue++;
         $("#appendValue").attr('value',counterValue);
         }
         }
             
         }); 
      }
      </script>
      <script>
$(document).ready(function(){
    var count = $('#spcount').val();
    $(".add_row").click(function(ev){
        ev.preventDefault();
            count++;
        $.ajax({
              type: "POST",
              url: "classes/appendPrice.php",
              data: {pr:count},
              success: function(res){
                    console.log(res);
                  $('#tblBody').append(res);
              }
        });
     });


$(document).on("click",".remove_row",function(ev){
	ev.preventDefault();
	debugger;
 $(this).closest('.new-data').remove();
	
});
});
</script>
   <script>
      $(document).on("change",".quanty",function(){
         var stock = 0;
         $(".quanty").each(function(){
             stock += +$(this).val();
         });
         
         $("#stockQuantity").val(stock);
      });
   </script>   
<?php   include("includes/footer.php"); ?>
