
<?php include 'header.php';

require_once"admin/classes/dbconfig.php";
 $db= new dbconfig(); 
$user_id=$_SESSION['user_id'];
$sql_users = $db->dbperform("select * from `tbl_user`");
$users = mysqli_fetch_assoc($sql_users);

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
                     <tr>
                        <td>
                           <div class="product-item__inner remove-prodcut-hover">
                              <div class="row">
                                 <div class="product-item__header col-3 col-md-3">
                                    <div class="mb-2"><a href="" class="d-block text-center"><img class="height-122 product-cart-img lazy" src="admin/assets/1_w5rX32r.webp" width="100" height="100"></a></div>
                                 </div>
                                 <div class="col-9 col-md-9 align-self-center">
                                    <div class="pr-lg-3">
                                       <h6 class="font-size-12 font-size-14-lg">
                                          <a href="" class="text-blue font-weight-bold">Godrej Edge Pro 190 Ltr 3 Star Direct Cool Single Door Refrigerator - RD EDGEPRO 205C 33 TAF ZN WN</a>
                                       </h6>
                                       <p class="cart-joy-label mb-1">Our Price</p>
                                       <div class="d-lg-flex cart-product-price">
                                          <div class="text-blue-2 font-size-18 font-weight-bold">₹21190</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </td>
                        <td class="vertical-top group-3 second-g">
                           <div class="prodcut-price">
                              <div class="text-dark font-weight-bold">₹21190</div>
                           </div>
                        </td>
                        <td class="group-3 third-g">
                           <a class="text-gray-90 delete_cart_btn" data-id="10302" style="cursor:pointer;">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 463 463" height="17" class="m-0 vertical-top" xmlns:v="https://vecta.io/nano">
                                 <path d="M412.145 86.709h-6.951V72.532c0-12.104-9.848-21.952-21.952-21.952h-81.053l-9.902-34.66C289.608 6.547 280.928 0 271.18 0h-79.36a22.05 22.05 0 0 0-21.107 15.921l-9.902 34.66H79.758c-12.104 0-21.952 9.848-21.952 21.952V86.71h-6.951a7.5 7.5 0 1 0 0 15h14.753L91.832 429.5c1.503 18.785 17.442 33.5 36.287 33.5h206.762c18.845 0 34.784-14.715 36.287-33.5l26.223-327.79h14.753a7.501 7.501 0 0 0 .001-15.001zM185.136 20.042c.848-2.969 3.597-5.042 6.684-5.042h79.36c3.087 0 5.836 2.073 6.684 5.042l8.725 30.539H176.411l8.725-30.539zM79.758 65.581h216.746c.008 0 .016.002.024.002s.019-.002.028-.002h86.686c3.833 0 6.952 3.119 6.952 6.952V86.71H72.806V72.532a6.96 6.96 0 0 1 6.952-6.951zm276.458 362.722C355.332 439.348 345.961 448 334.881 448H128.119c-11.08 0-20.451-8.651-21.335-19.696L80.656 101.709h301.687l-26.127 326.594zM231.5 426.871a7.5 7.5 0 0 0 7.5-7.5V137.564a7.5 7.5 0 1 0-15 0V419.37a7.5 7.5 0 0 0 7.5 7.501zm-72.522-7.116c.206 4.006 3.518 7.116 7.484 7.116a7.34 7.34 0 0 0 .391-.01 7.5 7.5 0 0 0 7.106-7.875L159.506 137.18c-.212-4.137-3.727-7.319-7.875-7.106a7.5 7.5 0 0 0-7.106 7.875l14.453 281.806zm137.169 7.106l.391.01c3.966 0 7.278-3.11 7.484-7.116l14.452-281.806c.212-4.137-2.969-7.662-7.106-7.875-4.146-.212-7.662 2.97-7.875 7.106l-14.452 281.806c-.211 4.137 2.97 7.662 7.106 7.875z"></path>
                              </svg>
                           </a>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</main>
  <?php include('footer.php')?>





<!-- ========== Body ========== -->


