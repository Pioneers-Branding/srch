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
                  <h3 class="content-header-title mb-0">View Category</h3>
                  <div class="row breadcrumbs-top">
                  </div>
               </div>
            </div>
            
           <!-- <div class="content-header row">-->
           <!--     <div class="content-header-left col-md-6 col-12 mb-2">-->
        	  <!--  	 <div class="content-header-title mb-0">-->
        		 <!--        <button type="button" id="sycnCategory" class="btn btn-info"><i class="fas fa-sync"></i> Import</button>-->
        			<!-- </div>-->
        		 <!--</div>-->
           <!-- </div>-->
            
           <!-- <div class="content-header row">-->
           <!--     <div class="content-header-left col-md-6 col-12 mb-2">-->
           <!--         <form class="form-horizontal" action="" method="post"  name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">-->
        	  <!--  	 <div class="content-header-title mb-0">-->
        	  <!--  	     <input type="file" required name="castegoryCsv" class="form-control" id="file" accept=".csv" />-->
        		 <!--       	<br>-->
        	  <!--  	      <button type="button" id="importCategory" class="btn btn-info"><i class="fas fa-sync"></i> Import</button>-->
        			<!-- </div>-->
        			<!-- </form>-->
        		 <!--</div>-->
           <!-- </div>-->
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
                     <th>Category Id</th>
                  <th>Category</th>
                  <!--<th>Category Icon</th>-->
                 <th>Category Image</th>

                  <th>Action</th>
                </tr>
                </thead>
     
                <tfoot>
                <tr>
                   <th>Category Id</th>
                  <th>Category</th>
                  <!--<th>Category Icon</th>-->
                 <th>Category Image</th>

                      <th>Action</th>
                </tr>
                </tfoot>
              <?php 
              $classMasterObject = new classMaster();
              echo $classMasterObject->display_category(0,''); ;
              
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
      
    
<script>
    function view_category_url(name){
        let url = name.value.replace(/[^a-zA-Z ]/g, "").replace(/\s+/g, '-').toLowerCase();
        let category_url = 'https://feminineafrica.com/'+url
        Swal.fire('',category_url,'info')
    }
</script>   
    

<!-- END: Content-->
<?php
if(isset( $_POST['delete_cat'] )){
    
  $delete_cat=$_POST['delete_cat'];

  $db->dbperformm("DELETE FROM tbl_category  where cat_pk_id='$delete_cat'");  
  $db->dbperformm("DELETE FROM tbl_post_extra  where post_extr_id='$delete_cat' And post_tbl='cat' "); 

  header('location:view-category');  
}

?>
<?php   include("includes/footer.php"); ?>
