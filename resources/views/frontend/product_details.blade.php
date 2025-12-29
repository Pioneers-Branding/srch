@extends('frontend.layouts.app')
@section('title') {{ 'Product Detail' }} @endsection
@section('content')
<!-- site-main start -->
<style>
    .quantity input {
    width: 40%;
    border: 2px solid #888;
    border-radius: 5px;
    display: inherit
;
    padding: 8px;
    margin: 10px 0 20px;
}
.quantity {
    height: auto;
    width: 185px;
}
p{
    margin-bottom:0px;
}


</style>
   <!-- sidebar -->
   <section>
      <div class="w-100 pt-40 pb-120 position-relative">
         <div class="container">
            <div class="page-wrap wide-sec3 position-relative w-100">
               <div id="productDetail">
                  <!-- Product details will be appended here by JavaScript -->
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- sidebar end -->

<!-- site-main end-->
<script>
   getProductDetail({{ Request::segment(2)}});
</script>



@endsection