@extends('frontend.layouts.app')
@section('title') {{ 'Service Details' }} @endsection
@section('content')
       <section class="service-details-area padding-top-100 padding-bottom-100">
        <div class="container">
            <ul class="author-tag style-02 mt-reverse-0">
                <li class="tag-list">
                    <a href="javascript:void(0)">
                        <div class="authors">
                            <div class="thumb">
                                <img src="assets/img/service/author.jpg" alt>
                                <span class="notification-dot"></span>
                            </div>
                            <span class="author-title"> Rajia Akter </span>
                        </div>
                    </a>
                </li>
                <li class="tag-list">
                    <a href="javascript:void(0)">
                        <span class="icon"> <i class="las la-star"></i> </span>
                        <span class="reviews"> 4.8 (421) </span>
                    </a>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-8 margin-top-30">
                    <div class="service-details-wrapper">
                        <div class="service-details-inner">
                            <div class="details-thumb">
                                <img src="assets/img/woman-relaxing-spa.webp" alt>
                            </div>
                            <ul class="details-tabs tabs margin-top-55">
                                <li data-tab="tab1" class="list active">
                                    Overview
                                </li>
                                <li class="list" data-tab="tab2">
                                    About Seller
                                </li>
                                <li class="list" data-tab="tab3">
                                    Review
                                </li>
                            </ul>
                            <div class="tab-content-item active" id="tab1">
                                <div class="details-content-tab padding-top-10">
                                    <p class="details-tap-para"> Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit. Sed a egestas leo. Aliquam ut ante lobortis tellus cursus pellentesque.
                                        Praesent feugiat tellus quis aliquet pharetra. Phasellus gravida nibh lorem,
                                        vitae malesuada
                                        quam aliquet sit amet. Mauris at urna elit. Quisque lectus nibh, malesuada sed
                                        commodo vel, feugiat ut sapien. In consequat, sem ac ultricies congue, nibh
                                        massa luctus est, non porta enim lorem sit amet nulla. </p>
                                    <p class="details-tap-para"> Nam euismod turpis lacus, at laoreet purus volutpat eu.
                                        Aenean finibus velit dolor, non laoreet tortor sollicitudin a. Ut facilisis, sem
                                        et efficitur ultricies, quam ligula dictum massa, vitae sodales nulla turpis non
                                        sapien. </p>
                                </div>
                                <div class="overview-single style-02 padding-top-60">
                                    <h4 class="title"> What you will get: </h4>
                                    <ul class="overview-benefits margin-top-30">
                                        <li class="list"> <a href="javascript:void(0)"> 3 Bed Room </a></li>
                                        <li class="list"> <a href="javascript:void(0)"> 2 Bath Room </a></li>
                                    </ul>
                                    <a href="javascript:void(0)" class="customize-text"> Customize Available </a>
                                </div>
                                <div class="overview-single style-02 padding-top-60">
                                    <h4 class="title"> Benifits of the premium Package: </h4>
                                    <ul class="overview-benefits margin-top-30">
                                        <li class="list"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a
                                            egestas leo. </li>
                                        <li class="list"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a
                                            egestas leo. </li>
                                        <li class="list"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a
                                            egestas leo. </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content-item" id="tab2">
                                <div class="details-content-tab padding-top-10">
                                    <div class="about-seller-tab margin-top-30">
                                        <div class="about-seller-flex-content">
                                            <div class="about-seller-thumb">
                                                <a href="javascript:void(0)"> <img
                                                        src="assets/img/seller/seller-small.jpg" alt> </a>
                                            </div>
                                            <div class="about-seller-content">
                                                <h5 class="title"> <a href="javascript:void(0)"> John Cena </a> </h5>
                                                <div class="about-seller-list">
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="reviews"> (560) </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="seller-details-box margin-top-40">
                                            <ul class="seller-box-list">
                                                <li class="box-list"> From <strong> Bangladesh </strong> </li>
                                                <li class="box-list"> Seller Since <strong> 2015 </strong> </li>
                                                <li class="box-list"> Order Completion Rate <strong> 96% </strong> </li>
                                                <li class="box-list"> Order Completed <strong> 820 </strong> </li>
                                            </ul>
                                            <p class="seller-details-para"> Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Sed a egestas leo. Aliquam ut ante lobortis tellus
                                                cursus pellentesque. Praesent feugiat tellus quis aliquet pharetra.
                                                Phasellus gravida nibh lorem, vitae
                                                malesuada quam aliquet sit amet. Mauris at urna elit. Quisque lectus
                                                nibh, malesuada sed commodo vel, feugiat ut sapien. In consequat, sem ac
                                                ultricies congue, nibh massa luctus est, non porta enim lorem
                                                sit amet nulla. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content-item" id="tab3">
                                <div class="details-content-tab padding-top-10">
                                    <div class="about-review-tab">
                                        <div class="about-seller-flex-content style-02">
                                            <div class="about-seller-thumb">
                                                <a href="javascript:void(0)"> 
                                                <img src="assets/img/seller/seller-small.jpg" alt> </a>
                                            </div>
                                            <div class="about-seller-content">
                                                <h5 class="title"> <a href="javascript:void(0)"> Riyad Hossain </a>
                                                </h5>
                                                <div class="about-seller-list">
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                </div>
                                                <p class="about-review-para"> Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Sed a egestas leo. Aliquam ut ante lobortis tellus
                                                    cursus pellentesque. Praesent feugiat tellus quis aliquet </p>
                                                <span class="review-date"> Feb 25, 2022 </span>
                                            </div>
                                        </div>
                                        <div class="about-seller-flex-content style-02">
                                            <div class="about-seller-thumb">
                                                <a href="javascript:void(0)"> <img
                                                        src="assets/img/seller/seller-small2.jpg" alt> </a>
                                            </div>
                                            <div class="about-seller-content">
                                                <h5 class="title"> <a href="javascript:void(0)"> John Cena </a> </h5>
                                                <div class="about-seller-list">
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                </div>
                                                <p class="about-review-para"> Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Sed a egestas leo. Aliquam ut ante lobortis tellus
                                                    cursus pellentesque. Praesent feugiat tellus quis aliquet </p>
                                                <span class="review-date"> Feb 23, 2022 </span>
                                            </div>
                                        </div>
                                        <div class="about-seller-flex-content style-02">
                                            <div class="about-seller-thumb">
                                                <a href="javascript:void(0)"> <img
                                                        src="assets/img/seller/seller-small3.jpg" alt> </a>
                                            </div>
                                            <div class="about-seller-content">
                                                <h5 class="title"> <a href="javascript:void(0)"> Roman Reings </a> </h5>
                                                <div class="about-seller-list">
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                </div>
                                                <p class="about-review-para"> Lorem ipsum dolor sit amet, consectetur
                                                    adipiscing elit. Sed a egestas leo. Aliquam ut ante lobortis tellus
                                                    cursus pellentesque. Praesent feugiat tellus quis aliquet </p>
                                                <span class="review-date"> Feb 24, 2022 </span>
                                            </div>
                                        </div>
                                        <div class="btn-wrapper">
                                            <a href="javascript:void(0)" class="btn-see-more main-color-one"> See More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="another-details-wrapper padding-top-100">
                        <div class="section-title-two">
                            <h3 class="title"> Another Service </h3>
                            <a href="javascript:void(0)" class="section-btn"> Explore All </a>
                        </div>
                        <div class="row padding-top-20">
                            <div class="col-md-6 margin-top-30">
                                <div class="single-service no-margin">
                                    <a href="javascript:void(0)" class="service-thumb">
                                        <img src="assets/img/Main-page---Recenter.jpg" alt>
                                        <div class="award-icons">
                                            <i class="las la-award"></i>
                                        </div>
                                    </a>
                                    <div class="services-contents">
                                        <ul class="author-tag">
                                            <li class="tag-list">
                                                <a href="javascript:void(0)">
                                                    <div class="authors">
                                                        <div class="thumb">
                                                            <img src="assets/img/service/author.jpg" alt>
                                                            <span class="notification-dot"></span>
                                                        </div>
                                                        <span class="author-title"> Rajia Akter </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="tag-list">
                                                <a href="javascript:void(0)">
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="reviews"> 4.7 (264) </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <h4 class="common-title-two"> <a href="javascript:void(0)"> All Painting &
                                                Renovation Service </a> </h4>
                                       
                                        <div class="service-price mt-3">
                                            <span class="starting"> Starting at </span>
                                            <span class="prices color-3"> 80.00 </span>
                                        </div>
                                        <div class="btn-wrapper mt-4">
                                            <a href="{{route('front.multistep_form')}}" class="cmn-btn btn-appoinment btn-bg-1"> Book
                                                Appoinment </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 margin-top-30">
                                <div class="single-service no-margin">
                                    <a href="javascript:void(0)" class="service-thumb">
                                        <img src="assets/img/hd-mediaitemid98670-3865.jpeg" alt>
                                        <div class="award-icons">
                                            <i class="las la-award"></i>
                                        </div>
                                    </a>
                                    <div class="services-contents">
                                        <ul class="author-tag">
                                            <li class="tag-list">
                                                <a href="javascript:void(0)">
                                                    <div class="authors">
                                                        <div class="thumb">
                                                            <img src="assets/img/service/author2.jpg" alt>
                                                            <span class="notification-dot"></span>
                                                        </div>
                                                        <span class="author-title"> Riyad Hossain </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="tag-list">
                                                <a href="javascript:void(0)">
                                                    <span class="icon"> <i class="las la-star"></i> </span>
                                                    <span class="reviews"> 4.9 (532) </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <h4 class="common-title-two"> <a href="javascript:void(0)"> All Emergency
                                                Electrical Support </a> </h4>
                                       
                                        <div class="service-price mt-3">
                                            <span class="starting"> Starting at </span>
                                            <span class="prices color-3"> 90.00 </span>
                                        </div>
                                        <div class="btn-wrapper mt-4">
                                            <a href="{{route('front.multistep_form')}}" class="cmn-btn btn-appoinment btn-bg-1"> Book
                                                Appoinment </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 margin-top-30">
                    <div class="service-details-package">
                        <div class="single-packages">
                            <ul class="package-price">
                                <li> Our Package </li>
                                <li> 150 </li>
                            </ul>
                            <div class="details-available-price margin-top-20">
                                <h6 class="tilte-available"> Available Service Packages </h6>
                                <ul class="available-list">
                                    <li> 3 Bed Room </li>
                                    <li> 2 Bath Room </li>
                                </ul>
                            </div>
                            <button type="submit"> Book Appoinment </button>
                        </div>
                        <div class="order-pagkages">
                            <span class="single-order"> <i class="las la-check"></i> 820 Order Completed </span>
                            <span class="single-order"> <i class="las la-star"></i> Seller Rating 95% </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection