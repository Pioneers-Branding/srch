<?php include 'header.php';

include 'web_action/config.php';
$user_id=$_SESSION['user_id'];
// $sql_users = $db->dbperform("select * from `tbl_order` WHERE user_fk_id=$user_id");
$order_sql="SELECT * FROM tbl_transaction
WHERE user_fk_id='$user_id' AND payment_status='1'";
$order_result=mysqli_query($con,$order_sql);
// print_r($order_result);

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://gaganfilmsproduction.in/feminineafrica.ci/d2afzgorr4mxtq.cloudfront.net/css/theme.min.css">
<style>
.megasubmenu.dropdown-menu {
    left: 100%;
    top: -7px;
    min-height: 100%;
    max-width: 722px;
    min-width: 722px;
    padding: 0;
    border: 0;
    padding-left: 15px;
    box-shadow: 6px 6px 10px 0 #eee;
    background: #f8f9fa!important;
}
.product-menu-list .title {
    color: var(--main-color) !important;
    font-size: 14px !important;
    padding-bottom: 5px !important;
    position: relative !important;
}
span.success-btn {
    color: #198754;
    font-weight: bold;
    font-size: 16px;
}
span.danger-btn {
    color: #dc3545;
    font-weight: bold;
    font-size: 16px;
}
</style>

<!-- ========== Body ========== -->


    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="cart-page">
   <!-- breadcrumb -->
   <div class="bg-gray-13 bg-md-transparent">
      <div class="container">
         <!-- breadcrumb -->
         <div class="my-md-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                  <li class=""><a href="<?=$asset_url?>index.php">Home></a>
                  </li>
                  <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Cart1
                  </li>
               </ol>
            </nav>
         </div>
         <!-- End breadcrumb -->
      </div>
   </div>
   <!-- End breadcrumb -->
   <div class="container all-cart-data">
      <div class="row mb-md-5 md-3">
         <div class="col-lg-12 mb-3">
            <div class="border-bottom border-color-1 mb-0">
               <!--<h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 font-weight-bold">Shopping Cart <span class="text-blue">(1 items) </span>  </h3>-->
            </div>
            <div class="cart-table border-bottom">
               <table class="table" cellspacing="0">
                  <thead>
                     <tr>
                        <th>Sr No.</th>
                        <th>Order Amount</th>
                        <th>Discount</th>
                        <th>Subtotal</th>
                        <th>Order Date</th>
                        <th>View Items</th>
                        <th>Action</th>
                        
                        
                     </tr>
                  </thead>
                  <tbody>
                      <?php
                      $sr=1;
                       while ($row = mysqli_fetch_array($order_result, MYSQLI_ASSOC)) {?>
                     <tr>
                        <td>
                           <?=$sr?>
                        </td>
                        <td class="vertical-top group-3 second-g">
                              ₹<?=$row['totalamt']?>
                        </td>
                        <td class="vertical-top group-3 second-g">
                              ₹<?=$row['user_coins']?>
                        </td>
                        <td class="vertical-top group-3 second-g">
                              ₹<?=$row['totalamt'] - $row['user_coins']?>
                        </td>
                        <td class="vertical-top group-3 second-g">
                              <?=$row['transaction_date']?>
                        </td>
                        <td><div class="order_pr_action"><button style="cursor:pointer; width: 125px;" data-id="<?=$row['order_id']?>" class="view_order">View</button></div></td>
                        <td class="group-3 third-g">
                        <?php 
                        if($row['transaction_status']==2){
                        ?>
                        <span class="danger-btn">Cancelled </span>
                        <?php }else if($row['transaction_status']==1){?>
                        <span class="success-btn"  >Deliverd </span>
                        <?php }else{?>                        <button type="button" class="btn btn-danger delete_cart_btn" data-id="<?=$row['transaction_pk_id']?>" style="cursor:pointer; width: 125px;">Cancel Order</button>
                        <?php }?>
                              
                    
                        </td>
                     </tr>
                     <?php 
                     $sr++;
                     }?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</main>
  <?php include('footer.php')?>
<!-- ========== Body ========== -->

<script>
    $(document).on("click", ".delete_cart_btn", function(){
    var order_id=$(this).data('id');
    $(this).html('Cancelled');
    $(this).removeClass('delete_cart_btn');
    $.ajax({
                    type: "POST",
                    url: '<?php echo $asset_url?>web_action/order.php',
                    data: {
                        order_id:order_id,
                        cancel_order:'cancel_order'
                        
                        },
                    dataType:'json',
                    success: function(response) {
                        
                        
                        if (response.status ==1){
                          Swal.fire(
                          'Cancelled!',
                          'Your Order Has Been Cancelled!!',
                          'success'
                         
                        ) ; 
                        
                        }else{
                            alert(response.msg)
                        }
                    },
                    error: function(error) {
                        console.log(error.responseJSON)
                    }
                });
    });
    
    
    $(document).on("click", ".view_order", function(){
        var order_id=$(this).data('id');
        
        window.location.href = "<?=$asset_url?>order_items.php?order_id="+order_id+" ";
    });
</script>


