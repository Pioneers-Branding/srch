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
                  <h3 class="content-header-title mb-0">View  Coupon</h3>
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
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Coupon </th>
            <th>Coupon Minimum Amount </th>
            <th>Coupon For</th>
            <th>Coupon % </th>
            <th>Coupon Description</th>
            <th>Valid  </th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php 
        $classMasterObject = new classMaster();
        echo $classMasterObject->display_coupon();
        ?>
        </tbody>
    <!--<tfoot>-->
    <!--    <tr>-->
    <!--        <th>Coupon </th>-->
    <!--        <th>Coupon Minimum Amount </th>-->
    <!--        <th>Coupon For</th>-->
    <!--        <th>Coupon % </th>-->
    <!--        <th>Valid  </th>-->
    <!--        <th>Action</th>-->
    <!--        </tr>-->
    <!--</tfoot>-->
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
if(isset( $_POST['active_coupon'])){
  $active_coupon=$_POST['active_coupon'];
  $chnge_coupon = $_POST['coupon_status'];
  $db->dbperformm("update tbl_coupon set coupon_status='$chnge_coupon' where coupon_pk_id='$active_coupon'");  

  header('location:view-coupon');  
}

if(isset( $_POST['delete_coupon'] )){
    
  $delete_coupon=$_POST['delete_coupon'];

  $db->dbperformm("DELETE FROM  tbl_coupon  where coupon_pk_id='$delete_coupon'");  

  header('location:view-coupon');  
}

?>
<?php   include("includes/footer.php"); ?>
