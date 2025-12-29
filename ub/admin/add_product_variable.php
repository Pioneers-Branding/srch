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
                  <h3 class="content-header-title mb-0">Add Product</h3>
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
                              <div class="row col-md-12">
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Category </label>
                                    <select name="p_post_title[]" class="form-control" id="p_post_title[]" multiple>
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
                              </div>
                              <!--<div class="row col-md-12">-->
                              <!--   <div class="form-group col-md-6">-->
                              <!--      <label for="exampleInputEmail1">Add To Best Deal ? </label>-->
                              <!--      <select name="best_deal" class="form-control" id="best_deal" >-->
                              <!--         <option value='1'>Yes</option>-->
                              <!--         <option value='0' >No</option>-->
                              <!--      </select>-->
                              <!--   </div>-->
                               <div class="row col-md-12">
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Select Brand </label>
                                    <select name="brand" class="form-control" id="brand" >
                                       <option value=''> --- Select---</option>
                                       <?php $core_control_oj->displayBrand(); ?>
                                    </select>
                                 </div>
                                 
                                
                                 
                                 <!--<div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Select Color </label><br>
                                    <select name="color" class="form-control qlt_box1" style="margin-top:px;font-size:12px; max-width:120px; width:100%;">
                                     // $core_control_oj->displayColor();
                                       
                                    </select>
                                 </div>-->
                                 
                                  <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Type</label>
                                    <select name="productType" class="form-control" id="productType" >
                                       <option value=''> --- Select---</option>
                                       <?php $core_control_oj->displayProductType(); ?>
                                    </select>
                                 </div>
                                <!--  <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Select Size </label><br>
                                     //$core_control_oj->displaySize(); 
                                       
                                    </select>
                                 </div>-->
                                 </div>
                              <!--</div>-->
                              <!--<div class="row col-md-12">-->
                              <!--   <div class="form-group col-md-6">-->
                              <!--      <label for="exampleInputEmail1">Product Gst</label>-->
                              <!--      <input type="text" name="product_gst" class="form-control" id="product_gst" >-->
                              <!--   </div>-->
                              <!--   <div class="form-group col-md-6">-->
                              <!--      <label for="exampleInputEmail1">Add Keywords </label>-->
                              <!--      <textarea name="product_keyword" class="form-control" id="product_keyword"></textarea>-->
                              <!--   </div>-->
                              <!--</div>-->
                              <div class="row col-md-12">
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Name(English)</label>
                                    <input type="text" name="product_title" class="form-control" id="product_title" required>
                                 </div> 
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Name(French)</label>
                                    <input type="text" name="product_title_fr" class="form-control" id="product_title_fr" required>
                                 </div>
                                  <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Featured Image</label>
                                    <input type="file" name="featurd_image" class="form-control" id="featurd_image"  >
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Gallery Image</label>
                                    <input type="file" name="product_image[]" class="form-control" id="product_image"  multiple>
                                 </div>
                              </div>
                              <div class="row col-md-12">
                                 <!--<div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Quantity</label>
                                    <input type="text" name="product_quantity" class="form-control" id="product_quantity" value="1">
                                 </div>-->
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Discounted Product Price</label>
                                    <input type="text" name="product_price" class="form-control" id="product_price" required>
                                 </div>
                              </div>
                              <div class="row col-md-12">
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Price</label>
                                    <input type="text" name="discount" class="form-control" id="discount" required>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Weight (In KG)</label>
                                    <input type="text" name="product_w" class="form-control" id="product_w">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Shown Home</label>
                                    &nbsp;<input type="checkbox" name="offerProduct" value="1" id="offerProduct">
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Product Stock Quantity</label>
                                    <input type="text" name="stockQuantity" class="form-control" value="1" id="stockQuantity">
                                 </div>
                                 <input type="hidden" name="product_varient" class="form-control" id="product_varient" value="green">
                                 <!--<div class="form-group col-md-6">-->
                                 <!--   <label for="exampleInputEmail1">Product Shipping Charge</label>-->
                                 <!--   <input type="text" name="product_sc" class="form-control" id="product_sc" >-->
                                 <!--</div>-->
                              </div>
                              <div class="form-group ">
                              <input type="hidden" name="appendValue"  class="form-control" id="appendValue" value="0" >

                              </div>
                              <div class="row col-md-12">
                                 <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Product Description(English)</label>
                                    <textarea name="product_desc" class="form-control" id="product_desc" ></textarea>
                                 </div>
                              </div>
                               <div class="row col-md-12">
                                 <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">Product Description(French)</label>
                                    <textarea name="product_desc_fr" class="form-control" id="product_desc_fr" ></textarea>
                                 </div>
                              </div>

 <label>Seo Content</label>
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
<input type="text"  class="form-control" name="meta_description_en" placeholder="enter meta Description	" />
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="projectinput2">Meta Description(French)</label>
<div class="col-md-9">
<input type="text"  class="form-control" name="meta_description_fr" placeholder="enter meta Description" />
</div>
</div>


<div class="form-group row">
<label class="col-md-3 label-control" for="projectinput2">Meta Keywords(English)</label>
<div class="col-md-9">
<input type="text"  class="form-control" name="meta_keywords_en" placeholder="enter meta Keywords" />
</div>
</div>

<div class="form-group row">
<label class="col-md-3 label-control" for="projectinput2">Meta Keywords(French)</label>
<div class="col-md-9">
<input type="text"  class="form-control" name="meta_keywords_fr" placeholder="enter meta Keywords" />
</div>
</div>   

                               <div class="row col-md-12">
                                 <div class="form-group col-md-12">
                                            <table class="table-condensed pad-zero">
                                        <thead class="thead-inverse">
                                           <tr>
                                              <th>Color</th>
                                              <th>Quantity</th>
                                                <th>Size</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tblBody" class="tbody-inverse">
                                            <tr>
                                               <td><div class="form-group">
                                                   <select name="color_name[]" class="form-control qlt_box1" style="font-size:12px; max-width:120px; width:100%;">
                                                       
                                                           <?php $core_control_oj->displayColor(); ?>
                                                      
                                                   </select>
                                                   </div></td>
                                               <td><div class="form-group"><input class="form-control" placeholder="Product Quantity" required="required" type="text" name="product_vquantity[]" ></div></td>
                                               <td><div class="form-group">
                                                   <select name="cmsize[]" class="form-control qlt_box1" style="font-size:12px; max-width:120px; width:100%;">
                                                       
                                                           <?php $core_control_oj->displaySizeDropdown(); ?>
                                                      
                                                   </select>
                                                   </div></td>
                                                <!--<td><div class="form-group"> //echo $core_control_oj->displayMultipeSize("1"); </div></td>-->
                                            </tr>
                                        </tbody>
                                        <tfoot> 
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><a href="javascript:;" class="btn-sm btn-primary add_row" >Add More</a></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                     </div>
                                 </div>
                                   <div class="form-group ">
                                 <input type="hidden" name="product_ref" class="form-control" id="product_ref" >
                              </div>
                           </div>
                           <!-- /.card-body -->
                           <div class="form-group">
                              <button type="submit"   class="btn btn-primary " style="margin-bottom:15px;float: right;">Submit</button>
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

      <script>
         CKEDITOR.replace( 'product_desc' );
         CKEDITOR.replace( 'product_desc_fr' );
      </script>
     
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
         Swal.fire('','Product  Added Successfully','success')
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
         Swal.fire('','Failed to add Product','error')
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
         // Show full page LoadingOverlay
        
        //Check Product 
        $('#product_title').on('change',(function(e){
                var pr = $(this).val();
                var include_ref='product';
                $.ajax({
                     url: "classes/search.php",
                     data: { product_title:pr,include_ref:include_ref },
                     method:"POST",
                     success: function(data){
                     if(data > 0 ){
                         alert('Product name Allready Exist');
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
      
<?php   include("includes/footer.php"); ?>
