<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
       $db= new dbconfig();
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
                  <h3 class="content-header-title mb-0">View Product </h3>
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
<table id="example" class="display table-responsive" cellspacing="0" width="100%">
    <thead>
        <tr>
         <th>Category</th>
                  <th>Product Name</th>
                  <th>Product Image</th>
                  <!--<th>Product Quantity</th>-->
                  <th>Product Stock</th>
                  <th>Product Discounted Price</th>
                  <th>Product Price</th>
                  <!--<th>Product Varient</th>-->
                  <!--<th>Product Gst</th>-->

                  <!--<th>Product Weight</th>-->
                  <!--<th>Product Shipping Charges</th>-->
                  <!--<th>Product Description</th>-->
                  <!--<th>Product Added On</th>-->
                  <!--<th>Product Added By</th>          -->
                  <th>Action</th>
        </tr>
    </thead>
 
    <!--<tfoot>-->
    <!--    <tr>-->
    <!--     <th>Category</th>-->
    <!--              <th>Product Name</th>-->
    <!--              <th>Product Image</th>-->
    <!--              <th>Product Quantity</th>-->
    <!--              <th>Product Price</th>-->
    <!--              <th>Product Discounted Price</th>-->
    <!--              <th>Product Varient</th>-->
    <!--              <th>Product Gst</th>-->

    <!--              <th>Product Weight</th>-->
    <!--              <th>Product Shipping Charges</th>-->
    <!--              <th>Product Description</th>-->
    <!--              <th>Product Added On</th>-->
    <!--              <th>Product Added By</th>           -->
    <!--              <th>Action</th>-->
    <!--    </tr>-->
    <!--</tfoot>-->
              <?php 
              $classMasterObject = new classMaster();
              echo $classMasterObject->display_product_admin();
              
              ?>
    <tbody>
        </tbody>
        </table>

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
<?php
if(isset( $_POST['delete_cat'] )){
  $delete_cat=$_POST['delete_cat'];
  $db->dbperformm("DELETE FROM  tbl_product  where product_pk_id='$delete_cat'"); 
  $db->dbperformm("DELETE FROM  tbl_post_extra  where post_extr_id='$delete_cat' and post_tbl='product'");  

  header('location:view-product');  
}

?>
<?php   include("includes/footer.php"); ?>
