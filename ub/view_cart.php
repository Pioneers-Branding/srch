<?php include('header.php');
include 'web_action/config.php';
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
.mb-location:before{content:'You are in '}.mb-location:after,.mb-no-location:after{content:'CHANGE';font-size:12px;color:#1249a0;float:right;line-height:22px}.current-location-container.popup .current-location{max-width:1200px;overflow:hidden;min-width:1100px;margin:auto;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);padding-bottom:30px}.current-location-container.popup .current-location-selected{display:none}.current-location-container.popup .current-location-title{font-size:20px;line-height:36px}.current-location-container.popup .search-container .justify-content-center{justify-content:left!important}.close-current-location{z-index:1}@media screen and (max-width:768px){.mb-location{width:100%;display:block}.current-location-container.popup .current-location{max-width:100%;overflow-y:scroll;min-width:100%;height:100%;margin:auto;position:absolute;top:0;left:0;transform:none}.current-location-container.popup .current-location-title{font-size:16px;line-height:36px;margin-bottom:10px}.search-container{text-align:center}.location-heading{margin-top:0}ul.store-list li{display:inline-block;width:calc(100%/2);margin-bottom:10px;text-align:left}ul.store-list{padding:0;list-style:none;display:block;margin:14px auto;max-width:300px}.current-location-container.popup .current-location-selected{position:fixed;width:100%;bottom:0;display:block}.current-location-container.popup .btn-section-current-location .btn-current-location{padding:7px 10px}.current-location-container.popup .current-location-selected .container{padding-right:0}.current-location-container.popup .btn-section-current-location:after{top:12px}.current-location-container.popup .or{margin:10px 0}.current-location-container.popup .current-location .btn{padding:5px 15px;font-size:14px}}@media screen and (min-width:769px){.current-location-container.popup .store-list li{border:1px solid #ddd;width:auto;padding:5px 15px;margin-right:15px;margin-bottom:15px;border-radius:20px;background:#e6e6e6;box-shadow:0 0 5px 0 #ddd}.current-location-container.popup .store-list li:hover{box-shadow:0 4px 8px 0 #ddd;background:#1249a0;color:#fff}.current-location-container.popup .store-list{margin-bottom:0}}@media screen and (width:768px){ul.store-list{padding:0;list-style:none;display:block;margin:14px auto;max-width:100%}.current-location-container.popup .current-location .btn{padding:.375rem .75rem;font-size:16px}ul.store-list li{width:calc(100%/4)}}.current-location-container.popup .current-location .close-current-location{display:none}

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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Cart
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->
        <div class="container all-cart-data"><div ></div></div>
      
    </main>
  <?php include('footer.php')?>
    <script>
        function cart() {
            // var c = $('.cart-data');
            
            $.ajax({
                url: "<?=$asset_url?>web_action/add_cart.php",
                type: "POST",
                data: {view_cart_sec:'view_cart_sec'},
                success: function (response) {
                    $(".all-cart-data").html(response)
                },
                error: function (response) {
                    console.log(response)
                }
                
               
            });
        }

        // function cartUpdate() {
        //     $.ajax({
        //         type: "POST",
        //         url: "/loadCartCount",
        //         data: "csrfmiddlewaretoken=FUQg8So0agy6IkOQ2zVUhdPSAIKmbwPI0EFmyFmFPsVnDLnFXXxF7o71XI3nwY52",
        //         success: function (t) {
        //             $(".cart_data").html(t)
        //         },
        //         error: function (t) {
        //             console.log(t)
        //         }
        //     })
        //     $(".updatecart").on("click", function () {
        //         var t = this.dataset.product, a = this.dataset.action, e = this.dataset.store;
        //         $.ajax({
        //             type: "POST",
        //             url: "/updateCartDetails",
        //             data: "csrfmiddlewaretoken=FUQg8So0agy6IkOQ2zVUhdPSAIKmbwPI0EFmyFmFPsVnDLnFXXxF7o71XI3nwY52&id=" + t + "&action=" + a + "&store=" + e,
        //             success: function (t) {
        //                 $('.change-store').modal('hide').on('hidden.bs.modal', function (e) {
        //                     "SUCCESS" == t.status ? ($(this).html("added")) : console.log(t.msg);
        //                 })
        //                 $('#cartcount').html(t.data);
        //                 if (t.data != 0){
        //                         $('#cartcount').removeClass('opacity-0')
        //                     }else {
        //                         $('#cartcount').addClass('opacity-0')
        //                     }
        //                     cart()

        //             },
        //             error: function (t) {
        //                 console.log(t)
        //             }
        //         })
        //     }), $("#inlineCheckbox4").on("change", function (t) {
        //         var a = 0, a = t.currentTarget.checked ? 1 : 0;
        //         $.ajax({
        //             type: "POST",
        //             url: "/markCartAsGift",
        //             data: "csrfmiddlewaretoken=FUQg8So0agy6IkOQ2zVUhdPSAIKmbwPI0EFmyFmFPsVnDLnFXXxF7o71XI3nwY52&gift=" + a,
        //             success: function (t) {
        //                 cart()
        //             },
        //             error: function (t) {
        //                 console.log(t)
        //             }
        //         })
        //     }), $(".cartDelete").on("click", function () {
        //         var t = this.dataset.product;
        //         alert(t), $.ajax({
        //             type: "POST",
        //             url: "/deleteCartProduct",
        //             data: "csrfmiddlewaretoken=FUQg8So0agy6IkOQ2zVUhdPSAIKmbwPI0EFmyFmFPsVnDLnFXXxF7o71XI3nwY52&product_id=" + t,
        //             success: function (t) {
        //                 "SUCCESS" == t.status ? (cart(), loadCartData()) : console.log(t.msg)
        //             },
        //             error: function (t) {
        //                 console.log(t)
        //             }
        //         })
        //     }), $(".deliverySlots").on("change", function (t) {
        //         ds = $(this).val(), $.ajax({
        //             type: "POST",
        //             url: "/updateCartDetails",
        //             data: "csrfmiddlewaretoken=FUQg8So0agy6IkOQ2zVUhdPSAIKmbwPI0EFmyFmFPsVnDLnFXXxF7o71XI3nwY52&slot=" + ds + "&action=changeSlot",
        //             success: function (t) {
        //                 "SUCCESS" == t.status ? ($(this).html("added"), cart(), loadCartData()) : console.log(t.msg)
        //             },
        //             error: function (t) {
        //                 console.log(t)
        //             }
        //         })
        //     })
        // }

        $(document).ready(function () {
            cart();
        });
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
<script>
  
//   var
  $(document).on('click','.js-minus',function(){
    const input=$('.js-result');
    var id = $(this).data('id');
    
    var value = $('.product_qty_val_'+id).val();
    
    if (value > 1) {
      value--;
    }
   input.val(value);
  });
  
  $(document).on('click','.js-plus',function(){
   
    const input=$('.js-result');
    var id = $(this).data('id');
    var value = $('.product_qty_val_'+id).val();
    
    value++;
    input.val(value);
  });


$(document).on('click','.check_out_btn',function(){
    
if ($("#inlineCheckbox4").is(":checked")) {
  
    var checkbox_val=$('#inlineCheckbox4').val();
    
    window.location.href = '<?=$asset_url?>check_out.php?coupon_value='+checkbox_val;
}else{
   window.location.href = '<?=$asset_url?>check_out.php';
}

});



</script> 
   
<script type="text/javascript">

$(document).on('click','.delete_cart_btn',function(){
var product_id = $(this).data('id');

       $.ajax({ 
       url: '<?=$asset_url?>web_action/add_cart.php', 
       type: 'POST',
       data: {
        product_id:product_id,
        delete_cart:'delete_cart',
      },
        success:function(res){
          if (res){ 
      console.log(res);
              localStorage.setItem("success_message", "Table Category has been Deleted succesfully");
              cart();
          }
         
        }
     })
    
   });
   <?php
   $user_id=$_SESSION['user_id'];
    $users_sql="SELECT user_coins FROM tbl_user WHERE user_pk_id =$user_id";
    $user_result=mysqli_query($con,$users_sql);
    $user_coins=mysqli_fetch_assoc($user_result);
    $discounted_amt=sprintf("%.2f", $user_coins['user_coins']);
   ?>
 $(document).on('click','#inlineCheckbox4',function(){
var total_price = $('#order_total').attr('data-price');

if ($("#inlineCheckbox4").is(":checked")) {
  
  var discount='<?=$discounted_amt?>';
  var final_amt=total_price - discount;
  $('.discounted_price').css("display", "block");
  $('.final_amt').html('₹'+final_amt);
}else{
    $('.final_amt').html('₹'+total_price);
    $('.discounted_price').css("display", "none");
}

    //   $.ajax({ 
    //   url: '<?=$asset_url?>web_action/add_cart.php', 
    //   type: 'POST',
    //   data: {
    //     product_id:product_id,
    //     product_qty:product_qty,
    //     update_cart:'update_cart'
    //   },
    //     success:function(res){
    //       if (res){ 
    //   console.log(res);
    //           localStorage.setItem("success_message", "Cart Updated succesfully");
    //           cart();
    //       }
         
    //     }
    //  })
    
   });  
 
$(document).on('click','.updatecart',function(){
var product_id = $(this).data('id');
var product_qty=$('.product_qty_val_'+product_id).val();
// alert(product_qty);
       $.ajax({ 
       url: '<?=$asset_url?>web_action/add_cart.php', 
       type: 'POST',
       data: {
        product_id:product_id,
        product_qty:product_qty,
        update_cart:'update_cart'
      },
        success:function(res){
          if (res){ 
      console.log(res);
              localStorage.setItem("success_message", "Cart Updated succesfully");
              cart();
          }
         
        }
     })
    
   });
   
   
</script>



<!-- ========== Body ========== -->


