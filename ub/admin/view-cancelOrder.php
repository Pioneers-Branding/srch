<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
       $db= new dbconfig();
     $readAll =   $db->dbperform("UPDATE `tbl_cancelOreder` SET `order_flag`='1' WHERE `ID` > 1");
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
                  <h3 class="content-header-title mb-0">View Cancel Order</h3>
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
            <th>Order ID</th>
            <th>Product Name</th>
            <th>ORDER DATE</th>
            <th>Cancel Date</th>
            <th>User</th>
        </tr>
    </thead>
 
              <?php 
              $classMasterObject = new classMaster();
              echo $classMasterObject->display_CancelOrder();
              
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

 <?php include('includes/footer.php');?> 