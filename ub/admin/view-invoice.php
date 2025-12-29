<?php 
   ob_start();
   session_start();
   if( isset( $_SESSION['adminKey'] ) ){
       require_once"classes/classMaster.php";
       $db= new dbconfig();
       $readAll =   $db->dbperform("UPDATE `tbl_order` SET `read_flag`='1' WHERE `order_pk_id` > 1");
   }
   else{
       header("location:login");
   }
   ?>

<!-- BEGIN: Header-->
<?php include("includes/header.php"); ?>

<!-- BEGIN: Main Menu-->
<?php   include("includes/aside.php"); ?>
           <div class="app-content content">
         <div class="content-overlay"></div>
         <div class="content-wrapper">
            <div class="content-header row">
               <div class="content-header-left col-md-6 col-12 mb-2">
                  <h3 class="content-header-title mb-0">View User</h3>
                  <div class="row breadcrumbs-top">
                  </div>
               </div>
            </div>
            <div class="content-body">
                  <h3 class="content-header-title mb-0">Search</h3>
                  <form method="get" action="productInform" target="_blank">
                   <div class="row">
					<div class="col-md-3">
				  <select name="productName" class="form-control">
				  <option value="">Select Product</option>
				  <?php 
				  $productList = $db->dbperform("select product_pk_id,product_title from tbl_product  ORDER BY product_pk_id DESC");
                        while($prodt = $productList->fetch_assoc()){  ?>
                            <option value="<?= $prodt['product_pk_id']?>"><?= $prodt['product_title']?></option>
                       <?php }
				  ?>
				   </select>
				   </div>
				   <div class="col-md-3">
				   <input type="date" name="strtDate" class="form-control">
				   </div>
				   
				   <div class="col-md-3">
				   <input type="date" name="endDate" class="form-control">
				   </div>
				   <div class="col-md-3">
				   <button type="submit" name="submit" class="btn btn-info form-control" value="search">Search</button>
				   </div>
				   </div>
				    </form>
               </div>
               <br><br>
            <div class="content-body">
               <!-- Basic form layout section start -->
               <section id="basic-form-layouts">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="card-content collpase show">
                              <div class="card-body" style="overflow: auto">
<table id="example2" class="display" cellspacing="0" width="100%" style="text-align: center">
<thead>
                <tr>
                  <th style="display:none">Sno.</th>
                  <th>Order Id</th>
                  <th>Customer Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Mode</th>
                  <th>Date</th>
                  <th>Invoice</th>
                  <th>Status</th>
                  <th>Delete</th>
                </tr>
                </thead>
               <?php 
                       
                        $resultcourierDriver = $db->dbperform("select * from tbl_transaction INNER JOIN tbl_addresses ON tbl_transaction.address_id = tbl_addresses.id 
                            INNER JOIN tbl_user ON tbl_transaction.user_fk_id = tbl_user.user_pk_id  WHERE payment_status IN (1, 2) ORDER BY transaction_pk_id DESC");
                        //   print_r($resultcourierDriver); die();
                        while($rowcourierDriver = $resultcourierDriver->fetch_assoc()){
                        ?>
                            <tr>
                                <td style="display:none"><?=$rowcourierDriver['transaction_pk_id ']?></td>
                                <td class="text-truncate"><?=$rowcourierDriver['order_id']?></td>
                                <td class="text-truncate"><?=$rowcourierDriver['contactPerson']?></td>
                                <td class="text-truncate"><?=$rowcourierDriver['user_email']?></td>
                                <td class="text-truncate"><?=$rowcourierDriver['contactNumber']?></td>
                                <td class="text-truncate"><a href="#"><?=$rowcourierDriver['transaction_mode']?></a></td>
                                <td class="text-truncate"><?=$rowcourierDriver['transaction_date']?></td>
                                <td class="text-truncate"><a href="invoice?order=<?=$rowcourierDriver['order_id']?>">View</a></td>
                                <td class="text-truncate menu-table"><span  class="edit" data-id="<?= $rowcourierDriver['transaction_pk_id'] ?>" data-status=" <?php if(empty($rowcourierDriver['trackingLink'])){echo "Pending";}else{echo "Complete";}?>">
                                    <?php if(empty($rowcourierDriver['trackingLink'])){echo "Pending";}else{echo $rowcourierDriver['trackingLink'];}?>
                                    </span>
                                    </td>
                                <td ><!--<a class="text-truncate" href="slip?order=<?=$rowcourierDriver['order_id']?>">View</a>-->
                                <a class="text-danger" href="delete_order?order=<?=$rowcourierDriver['order_id']?>">Delete</a></td>
    
                            </tr>
                   <?php } ?>
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
<script type="text/javascript">
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                "lengthMenu": [[25, 50, 100, -1], [ 25, 50,100, "All"]]
                });
            
        } );
      </script> 
      <?php

if(isset( $_POST['delete_cat'] )){
    
  $delete_cat=$_POST['delete_cat'];

  $db->dbperform("DELETE FROM `tbl_user` WHERE  user_pk_id='$delete_cat'");  
  $db->dbperform("DELETE FROM `tbl_user_details` WHERE  user_fk_id='$delete_cat'");  

  header('location:view-user');  
}

?>
 <script>
$(document).ready(function(){
$(".edit").click(function(){
id=$(this).attr("data-id");
status=$(this).attr("data-status");
//   alert(id); alert(status);
   $(this).parent().parent().find(".menu-table").html("<select name='orderStatus' id='orderStatus'><option value='Pending'>Pending</option><option value='Complete'>Complete</option><option value='Cancel'>Cancel</option><option value='Return'>Return</option></select><button type='button' data-id="+id+" data-status="+status+" class='btn up'>save</button>");
});
});
$(document).ready(function(){
$(document).on("click",".up",function(){
id=$(this).attr("data-id");
status=$('#orderStatus').val();
$.ajax({
type: "POST",
url: "classes/invoice.php",
data: {id : id ,status :status},
success:function(res){
 window.location.reload();     
}
});

// window.location.reload();
});
});
</script>
<?php   include("includes/footer.php"); ?>
