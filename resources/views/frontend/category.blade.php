@extends('frontend.layouts.app')
@section('title') {{ 'Service - list' }} @endsection
<style>
  #category-detail-image{
      height:600px !important;
      width:100% !important;
  }
  #category-detail-image img{
      width:100% !important;
      height:100% !important;
  }
</style>
@section('content')
<section id="category-detail-image" class="mt-4 padding-top-85">
    <script> 
               var LoaderHTML = setLoaderClasses('col-xl-12 col-lg-12 col-sm-12 col-md-12');
               document.write(LoaderHTML.repeat(1))
        </script>
</section>


    <section class="category-area padding-top-75 padding-bottom-100">
        <div class="container" id="child-category">
            <div class="row margin-top-20">
                   <script> 
                           var LoaderHTML = setLoaderClasses('col-xl-2 col-lg-3 col-sm-6 col-md-4');
                           document.write(LoaderHTML.repeat(6))
                   </script>
                </div>
        </div>
    </section>
    <section class="category-services-area  padding-bottom-100">
        <div class="container">
            <div class="row margin-top-20" id="">
                
                
                
                <div class="col-lg-12 margin-bottom-10" id="searchServiceList">
                       <div class="row margin-top-20">
                            <script> 
                               var LoaderHTML = setLoaderClasses('col-xl-3 col-lg-3 col-sm-2 col-md-3');
                               document.write(LoaderHTML.repeat(4))
                            </script>
                        </div>
                </div> 
                
                <div class="col-lg-12 d-none">
                    <div class="service-pagination">
                        <ul class="pagination-list">
                            <li>
                            <a href="javascript:void(0)"><i class="las la-angle-left"></i> </a>
                            </li>
                            <li class="active"><a href="javascript:void(0)"> 1 </a></li>
                            <li><a href="javascript:void(0)"> 2 </a></li>
                            <li><a href="javascript:void(0)"> 3 </a></li>
                            <li><a href="javascript:void(0)"> 4 </a></li>
                            <li>
                                <a href="javascript:void(0)"> <i class="las la-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<section class="margketplace-area padding-top-100 padding-bottom-100 section-bg-2">-->
    <!--    <div class="container">-->
    <!--        <div class="row justify-content-center">-->
    <!--            <div class="col-lg-6">-->
    <!--                <div class="section-title">-->
    <!--                    <h2 class="title"> Why Choose MakeoverAdda? </h2>-->
    <!--                    <span class="section-para"> It is a long established fact that a reader will be distracted by-->
    <!--                        the readable content of a page when looking at its layout. </span>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row margin-top-20">-->
    <!--            <div class="col-lg-4 col-md-6 margin-top-30 marketplace-child">-->
    <!--                <div class="single-marketplace style-02 wow fadeInUp" data-wow-delay=".2s">-->
    <!--                    <div class="icon">-->
    <!--                        <i class="las la-tools"></i>-->
    <!--                    </div>-->
    <!--                    <div class="marketplace-contents">-->
    <!--                        <h4 class="common-title-two"> <a href="javascript:void(0)"> Service Commitment </a> </h4>-->
    <!--                        <p class="common-para"> It is a long established fact that a reader will be distracted by-->
    <!--                            the readable. It is a long established fact that a reader. </p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6 margin-top-30 marketplace-child">-->
    <!--                <div class="single-marketplace style-02 wow fadeInDown" data-wow-delay=".2s">-->
    <!--                    <div class="icon">-->
    <!--                        <i class="las la-users-cog"></i>-->
    <!--                    </div>-->
    <!--                    <div class="marketplace-contents">-->
    <!--                        <h4 class="common-title-two"> <a href="javascript:void(0)"> Super Experience </a> </h4>-->
    <!--                        <p class="common-para"> It is a long established fact that a reader will be distracted by-->
    <!--                            the readable. It is a long established fact that a reader. </p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6 margin-top-30 marketplace-child">-->
    <!--                <div class="single-marketplace style-02 wow fadeInUp" data-wow-delay=".2s">-->
    <!--                    <div class="icon">-->
    <!--                        <i class="las la-shield-alt"></i>-->
    <!--                    </div>-->
    <!--                    <div class="marketplace-contents">-->
    <!--                        <h4 class="common-title-two"> <a href="javascript:void(0)"> User Data Secure </a> </h4>-->
    <!--                        <p class="common-para"> It is a long established fact that a reader will be distracted by-->
    <!--                            the readable. It is a long established fact that a reader. </p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6 margin-top-30 marketplace-child">-->
    <!--                <div class="single-marketplace style-02 wow fadeInDown" data-wow-delay=".2s">-->
    <!--                    <div class="icon">-->
    <!--                        <i class="las la-stopwatch"></i>-->
    <!--                    </div>-->
    <!--                    <div class="marketplace-contents">-->
    <!--                        <h4 class="common-title-two"> <a href="javascript:void(0)"> Fast Service </a> </h4>-->
    <!--                        <p class="common-para"> It is a long established fact that a reader will be distracted by-->
    <!--                            the readable. It is a long established fact that a reader. </p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6 margin-top-30 marketplace-child">-->
    <!--                <div class="single-marketplace style-02 wow fadeInUp" data-wow-delay=".2s">-->
    <!--                    <div class="icon">-->
    <!--                        <i class="las la-file-invoice-dollar"></i>-->
    <!--                    </div>-->
    <!--                    <div class="marketplace-contents">-->
    <!--                        <h4 class="common-title-two"> <a href="javascript:void(0)"> Secure Payment </a> </h4>-->
    <!--                        <p class="common-para"> It is a long established fact that a reader will be distracted by-->
    <!--                            the readable. It is a long established fact that a reader. </p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-6 margin-top-30 marketplace-child">-->
    <!--                <div class="single-marketplace style-02 wow fadeInDown" data-wow-delay=".2s">-->
    <!--                    <div class="icon">-->
    <!--                        <i class="las la-headset"></i>-->
    <!--                    </div>-->
    <!--                    <div class="marketplace-contents">-->
    <!--                        <h4 class="common-title-two"> <a href="javascript:void(0)"> Dedicated Support </a> </h4>-->
    <!--                        <p class="common-para"> It is a long established fact that a reader will be distracted by-->
    <!--                            the readable. It is a long established fact that a reader. </p>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->


<!--start-->

    <!--<div class="clientlogo-area padding-top-100 padding-bottom-100">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-12">-->
    <!--                <div class="clientlogo-wrapper">-->
    <!--                    <div class="clientlogo-slider dot-style-one dot-02">-->
    <!--                        <div class="clientlogo-item">-->
    <!--                            <div class="single-clientlogo">-->
    <!--                                <div class="thumb">-->
    <!--                                    <a href="javascript:void(0)"> <img src="{{asset('frontend/assets/')}}/img/clientlogo/cl1.png" alt> </a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="clientlogo-item">-->
    <!--                            <div class="single-clientlogo">-->
    <!--                                <div class="thumb">-->
    <!--                                    <a href="javascript:void(0)"> <img src="{{asset('frontend/assets/')}}/img/clientlogo/cl2.png" alt> </a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="clientlogo-item">-->
    <!--                            <div class="single-clientlogo">-->
    <!--                                <div class="thumb">-->
    <!--                                    <a href="javascript:void(0)"> <img src="{{asset('frontend/assets/')}}/img/clientlogo/cl3.png" alt> </a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="clientlogo-item">-->
    <!--                            <div class="single-clientlogo">-->
    <!--                                <div class="thumb">-->
    <!--                                    <a href="javascript:void(0)"> <img src="{{asset('frontend/assets/')}}/img/clientlogo/cl4.png" alt> </a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="clientlogo-item">-->
    <!--                            <div class="single-clientlogo">-->
    <!--                                <div class="thumb">-->
    <!--                                    <a href="javascript:void(0)"> <img src="{{asset('frontend/assets/')}}/img/clientlogo/cl2.png" alt> </a>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->



<!--end-->

 
    
    <script>
        var categoryId = '{{ Request::segment(2) ?? '' }}';
        var subcategoryId = '{{ Request::segment(3) ?? '' }}';
        
        // Function to get category details
        @if(Request::segment(2))
            getCategoryDetail(categoryId);
        @endif
    
        // Function to get child category
        
            getChildCategory(subcategoryId);
    
        
        // Function to get search service list
        getSearchServiceList(categoryId, subcategoryId , ); 
        
        
        
        $(document).on("click",".child-category-click",function(e) {
            
            e.preventDefault();
           var child_category_id = $(this).attr('data-id');
           getSearchServiceList(categoryId, subcategoryId , child_category_id);
           
          $('html, body').animate({
                'scrollTop' : $("#searchServiceList").position().top
            }, 'slow');
           
        });
    </script>
@endsection