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
                  <h3 class="content-header-title mb-0">View Color </h3>
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
            <th>#</th>
            <th>Color Name </th>
            <th>Action</th>
        </tr>
    </thead>
 
              <?php 
              $classMasterObject = new classMaster();
              echo $classMasterObject->display_color();
              
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

if(isset( $_POST['delete_color'] )){
  $delete_cat=$_POST['delete_color'];
  $db->dbperform("DELETE FROM `tbl_color` WHERE  color_id='$delete_cat'"); 
  header('location:view-color');  
}

?>
<?php   include("includes/footer.php"); ?>
