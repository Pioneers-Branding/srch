<?php include 'header.php';
include 'web_action/config.php';



$order_id=$_GET['order_id'];
// print_r($order_id);
$order_sql="SELECT * FROM tbl_order INNER JOIN tbl_product ON tbl_order.product_fk_id = tbl_product.product_pk_id
WHERE order_id='$order_id'";
$order_result=mysqli_query($con,$order_sql);


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
               <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18 font-weight-bold">Shopping Cart <span class="text-blue">(1 items) </span>  </h3>
            </div>
            <div class="cart-table border-bottom">
               <table class="table" cellspacing="0">
                  <thead>
                     <tr>
                        <th>Product Details</th>
                        <th colspan="2">Sub Total</th>
                     </tr>
                  </thead>
                  <tbody>
                      <?php
                       while ($row = mysqli_fetch_array($order_result, MYSQLI_ASSOC)) {?>
                     <tr>
                        <td>
                           <div class="product-item__inner remove-prodcut-hover">
                              <div class="row">
                                 <div class="product-item__header col-3 col-md-3">
                                    <div class="mb-2"><a href="" class="d-block text-center"><img class="height-122 product-cart-img lazy" src="admin/assets/<?=$row['featurd_image']?>" width="100" height="100"></a></div>
                                 </div>
                                 <div class="col-9 col-md-9 align-self-center">
                                    <div class="pr-lg-3">
                                       <h6 class="font-size-12 font-size-14-lg">
                                          <a href="" class="text-blue font-weight-bold"><?=$row['product_title']?></a>
                                       </h6>
                                       <p class="cart-joy-label mb-1">Product Price</p>
                                       <div class="d-lg-flex cart-product-price">
                                          <div class="text-blue-2 font-size-18 font-weight-bold">₹<?=$row['product_price']?></div>
                                       </div>
                                       
                                       <p class="cart-joy-label mb-1">Qty</p>
                                       <div class="d-lg-flex cart-product-price">
                                          <div class="text-blue-2 font-size-18 font-weight-bold"><?=$row['product_quantity']?></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </td>
                        <td class="vertical-top group-3 second-g">
                           <div class="prodcut-price">
                              <div class="text-dark font-weight-bold">₹<?=$row['product_fk_price'] * $row['product_quantity']?></div>
                           </div>
                        </td>
                        
                     </tr>
                     <?php }?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</main>
  <?php include('footer.php')?>
<!-- ========== Body ========== -->

<!--<script>-->
<!--//     $(document).on("click", ".delete_cart_btn", function(){-->
<!--//     var order_id=$(this).data('id');-->
<!--//     $(this).html('Cancelled');-->
<!--//     $(this).removeClass('delete_cart_btn');-->
<!--//     $.ajax({-->
<!--//                     type: "POST",-->
<!--//                     url: '<?php echo $asset_url?>web_action/order.php',-->
<!--//                     data: {-->
<!--//                         order_id:order_id,-->
<!--//                         cancel_order:'cancel_order'-->
                        
<!--//                         },-->
<!--//                     dataType:'json',-->
<!--//                     success: function(response) {-->
                        
                        
<!--//                         if (response.status ==1){-->
<!--//                           Swal.fire(-->
<!--//                           'Cancelled!',-->
<!--//                           'Your Order Has Been Cancelled!!',-->
<!--//                           'success'-->
                         
<!--//                         ) ; -->
                        
<!--//                         }else{-->
<!--//                             alert(response.msg)-->
<!--//                         }-->
<!--//                     },-->
<!--//                     error: function(error) {-->
<!--//                         console.log(error.responseJSON)-->
<!--//                     }-->
<!--//                 });-->
<!--//     });-->
<!--// </script>-->


