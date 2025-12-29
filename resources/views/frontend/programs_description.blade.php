@extends('frontend.layouts.app')
@section('title') {{ 'Product list' }} @endsection
@section('content')
<!-- site-main start -->
            <div class="site-main">

                <!--about-section-->
                <section class="prt-row clearfix">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <img width="1300" height="500" class="img-fluid" src="{{ asset('frontend/assets/main/images/single-img-6.jpg') }}"
                                    
                                        alt="single-img-6">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-6">
                                <div class="">
                                    <h3 class="service-title">100% nutriton good for your healthy lifestyle</h3>
                                    <p class="service-desc-text">Nutrition Services is dedicated to bringing you and
                                        your
                                        family healthy, delicious food options whenever you’re at one of our locations.
                                        We
                                        handpick the best coaches and health experts from across the country to make
                                        sure
                                        you get the most health.</p>
                                        <div class="mt-35 res-991-mt-10">
                                            <a class="prt-btn prt-btn-size-md prt-btn-shape-square prt-btn-style-fill prt-btn-color-skin" href="{{ route('front.enroll_now') }}">Enroll Now</a>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="progress-bar-main border-0 res-991-mt-20">
                                    <div class="prt-progress-bar style1" data-percent="60%">
                                        <div class="progress-bar-title d-flex justify-content-between">
                                            <h3 class="progress-title">health nutritions<br></h3>
                                            <h3 class="progress-percentage counter">60%</h3>
                                        </div>
                                        <div class="progress-bar-inner">
                                            <div class="progress-bar progress-bar-color-bar_skincolor"
                                                style="width: 60%;">

                                            </div>
                                        </div>
                                    </div><!-- prt-progress-bar end -->
                                    <!-- prt-progress-bar -->
                                    <div class="prt-progress-bar style1" data-percent="50%">
                                        <div class="progress-bar-title d-flex justify-content-between">
                                            <h3 class="progress-title">Child Nutrition<br></h3>
                                            <h3 class="progress-percentage counter">50%</h3>
                                        </div>
                                        <div class="progress-bar-inner">
                                            <div class="progress-bar progress-bar-color-bar_skincolor"
                                                style="width: 50%;">

                                            </div>
                                        </div>
                                    </div><!-- prt-progress-bar end -->
                                    <!-- prt-progress-bar -->
                                    <div class="prt-progress-bar style1" data-percent="80%">
                                        <div class="progress-bar-title d-flex justify-content-between">
                                            <h3 class="progress-title">First Hand Advice<br></h3>
                                            <h3 class="progress-percentage counter">80%</h3>
                                        </div>
                                        <div class="progress-bar-inner">
                                            <div class="progress-bar progress-bar-color-bar_skincolor"
                                                style="width: 80%;">

                                            </div>
                                        </div>
                                    </div><!-- prt-progress-bar end -->
                                </div>
                            </div>
                        </div>
                        <div class="row mt-70 mb-80 res-991-mt-60 res-991-mb-60 res-575-mt-0">
                            <div class="col-lg-12">
                                <div class="border-bottom"></div>
                            </div>
                        </div>
                        <div class="row align-items-cente">
                            <div class="col-xl-6 col-lg-6">
                                <div>
                                    <img width="635" height="360" class="img-fluid" src="{{ asset('frontend/assets/main/images/single-img-7.jpg') }}" 
                                    
                                        alt="single-img-7">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="res-991-mt-30">
                                    <h3 class="service-title">Planning and prep</h3>
                                    <p class="service-desc-text">Our staff is united in a shared commitment achieving
                                        better
                                        health for everyone, everywhere. Our main aim is to improve healthy eating
                                        habbits,
                                        information &amp; inner strength. Our nutrition team love weight loss, corporate
                                        nutrition.</p>
                                </div>
                                <ul class="prt-list style4">
                                    <li class="prt-list-item">
                                        <div class="list-dot"></div>
                                        <div class="prt-list-text">The standard chunk of Lorem Ipsum used sins is
                                            reproduced
                                        </div>
                                    </li>
                                    <li class="prt-list-item">
                                        <div class="list-dot"></div>
                                        <div class="prt-list-text">All the Lorem Ipsum generators rahul on the Internet
                                        </div>
                                    </li>
                                    <li class="prt-list-item">
                                        <div class="list-dot"></div>
                                        <div class="prt-list-text">But I must explain to you how all this mistaken idea
                                        </div>
                                    </li>
                                    <li class="prt-list-item">
                                        <div class="list-dot"></div>
                                        <div class="prt-list-text">The standard chunk of Lorem Ipsum used sins is
                                            reproduced
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mt-80 mb-70 res-991-mt-50 res-991-mb-50 res-575-mt-0 res-575-mb-35">
                            <div class="col-lg-12">
                                <div class="border-bottom"></div>
                            </div>
                        </div>
              
                        <div class="row mt-80 mb-70 res-991-mt-50 res-991-mb-50 res-575-mt-0 res-575-mb-35">
                            <div class="col-lg-12">
                                <div class="border-bottom"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="service-title text-center">Open class time</h3>
                                <!-- tab -->
                                <div class="prt-tabs prt-tab-style-03 mt-40 res-575-mt-0">
                                    <ul class="tabs">
                                        <li class="tab active"><a href="#">Monday</a></li>
                                        <li class="tab"><a href="#">Friday</a></li>
                                        <li class="tab"><a href="#">Saturday</a></li>
                                    </ul>
                                    <div class="content-tab">
                                        <!-- content-inner -->
                                        <div class="content-inner active" style="">
                                            <div class="content-inner-text">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="content-inner-box">
                                                            <h3>Opening Hours 6:00pm to 9:00pm<br>Everyday</h3>
                                                            <p class="tab-block-text">Our staff is united in a shared
                                                                commitment achieving better health for everyone,
                                                                everywhere.
                                                                Our main aim is to improve healthy eating habits
                                                                information
                                                                & inner strength.</p>
                                                            <a class="prt-btn prt-btn-size-md prt-btn-shape-square prt-btn-style-fill prt-btn-color-skin"
                                                                href="{{ route('front.contact') }}">JOIN NOW</a>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="imagebox">
                                                            <img width="614" height="342" class="img-fluid w-100"
                                                                loading="lazy" src="{{ asset('frontend/assets/main/images/tab-1.png') }}" alt="tab-image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- content-inner end-->
                                        <!-- content-inner -->
                                        <div class="content-inner" style="display: none;">
                                            <div class="content-inner-text">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="content-inner-box">
                                                            <h3>Opening Hours 6:00pm to 9:00pm<br>Everyday</h3>
                                                            <p class="tab-block-text">Our staff is united in a shared
                                                                commitment achieving better health for everyone,
                                                                everywhere.
                                                                Our main aim is to improve healthy eating habits
                                                                information
                                                                & inner strength.</p>
                                                            <a class="prt-btn prt-btn-size-md prt-btn-shape-square prt-btn-style-fill prt-btn-color-skin"
                                                                href="contact-us.html">JOIN NOW</a>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="imagebox">
                                                            <img width="614" height="342" class="img-fluid w-100"
                                                                loading="lazy" src="{{ asset('frontend/assets/main/images/tab-2.png') }}" alt="tab-image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- content-inner end-->
                                        <!-- content-inner -->
                                        <div class="content-inner" style="display: none;">
                                            <div class="content-inner-text">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="content-inner-box">
                                                            <h3>Opening Hours 6:00pm to 9:00pm<br>Everyday</h3>
                                                            <p class="tab-block-text">Our staff is united in a shared
                                                                commitment achieving better health for everyone,
                                                                everywhere.
                                                                Our main aim is to improve healthy eating habits
                                                                information
                                                                & inner strength.</p>
                                                            <a class="prt-btn prt-btn-size-md prt-btn-shape-square prt-btn-style-fill prt-btn-color-skin"
                                                                href="contact-us.html">JOIN NOW</a>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="imagebox">
                                                            <img width="614" height="342" class="img-fluid w-100"
                                                                loading="lazy" src="{{ asset('frontend/assets/main/images/tab-1.png') }}" alt="tab-image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- content-inner end-->
                                    </div>
                                </div>
                                <!-- tab end-->
                            </div>
                        </div>
                        <div class="row mt-80 mb-70 res-991-mt-60 res-991-mb-50 res-575-mt-0 res-575-mb-50">
                            <div class="col-lg-12">
                                <div class="border-bottom"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="accordion-title">
                                    <h3 class="service-title">Every day help for our clients</h3>
                                </div>
                                <div class="accordion style3 mt-50 res-991-mt-30">
                                    <!-- toggle -->
                                    <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                        <div class="toggle-title position-relative">
                                            <a href="#" class="active"><i class="number"></i>
                                                <span>nutrition</span>
                                                What are the negative aspects of the diet?</a>
                                        </div>
                                        <div class="toggle-content show">
                                            <p class="active">Biologically, dieting can lead to unhealthy changes in
                                                body
                                                composition, hormonal changes, reduced bone density, menstrual
                                                disturbances,
                                                and lower resting energy expenditure. We have been the most trusted
                                                “Health
                                                care Nutrition” manual for 25 years, and We are proud of our rich
                                                history of
                                                providing evidence based nutrition resources.</p>
                                        </div>
                                    </div><!-- toggle end -->
                                    <!-- toggle -->
                                    <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                        <div class="toggle-title position-relative">
                                            <a href="#"><i class="number"></i>
                                                <span>nutrition</span>
                                                How long will take to get my results?</a>
                                        </div>
                                        <div class="toggle-content">
                                            <p>Biologically, dieting can lead to unhealthy changes in body composition,
                                                hormonal changes, reduced bone density, menstrual disturbances, and
                                                lower
                                                resting energy expenditure. We have been the most trusted “Health care
                                                Nutrition” manual for 25 years, and We are proud of our rich history of
                                                providing evidence based nutrition resources.</p>
                                        </div>
                                    </div><!-- toggle end -->
                                    <!-- toggle -->
                                    <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                        <div class="toggle-title position-relative">
                                            <a href="#"><i class="number"></i>
                                                <span>nutrition</span>
                                                How do i make an appointment with your office?</a>
                                        </div>
                                        <div class="toggle-content">
                                            <p>Biologically, dieting can lead to unhealthy changes in body composition,
                                                hormonal changes, reduced bone density, menstrual disturbances, and
                                                lower
                                                resting energy expenditure. We have been the most trusted “Health care
                                                Nutrition” manual for 25 years, and We are proud of our rich history of
                                                providing evidence based nutrition resources.</p>
                                        </div>
                                    </div><!-- toggle end -->
                                </div>
                            </div>
                        </div>

                        <a class="prt-btn entrol prt-btn-size-md prt-btn-shape-square prt-btn-style-fill prt-btn-color-skin" href="{{ route('front.enroll_now') }}">Enroll Now</a>
                    </div>
                </section>
                <!--about-section end-->

            </div><!-- site-main end-->
   
            <div class="social-media">
                <div class="social-media-icons">
                    <a href="https://facebook.com" target="_blank" class="social-icon facebook tk" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="social-icon twitter tk" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://instagram.com" target="_blank" class="social-icon instagram tk" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="social-icon linkedin tk" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://Whatsapp.com" target="_blank" class="social-icon whatsapp tk" aria-label="Whatsapp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
              </div>
@endsection
