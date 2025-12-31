@extends('frontend.layouts.app')
@section('title') {{ 'workshop' }} @endsection
@section('content')
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .col-lg-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 15px;
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 10px;

        }

        .content-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;

        }

        .content-container h2 {
            font-size: 30px;
            color: #333;
            margin-bottom: 15px;
        }

        .content-container p {
            font-size: 18px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .content-container a {
            width: 32%;
            background-color: #fdce2d;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
        }
       /* Zigzag layout - reverse order on even rows */
        .row:nth-child(even) .col-lg-6:nth-child(1) {
            order: 2;
        }

        .row:nth-child(even) .col-lg-6:nth-child(2) {
            order: 1;
        }

        .too {
            margin-top: 2%;
            margin-bottom: 1%;
        }
        .content-container h3.price {
            font-size: 24px;
            color: #fcd739; /* You can adjust the color as needed */
            margin-bottom: 20px;
            font-weight: 800;
     }
     
     .top-h-mobile{
        display:none 
     }
     
        /* Responsive layout for small screens */
        @media (max-width: 768px) {
            .col-lg-6 {
                flex: 0 0 100%;
                max-width: 100%;
                padding: 15px;
            }
              .top-h-mobile{
        display:block !important; 
     }
     .top-h-desktop{
              display:none  !important;   
     }
        }
    </style>
<section class="top-h top-h-desktop">
    <img src="{{ asset('frontend/assets/srcamain/images/corporate-desktop.webp') }}" alt="" style="width: 100%; height: auto; display: block;">
</section>

                
                  <section class="top-h top-h-mobile">
                      <img 
        src="{{ asset('frontend/assets/srcamain/images/corporate-mob.webp') }}" 
        alt="" 
        style="width: 100%; height: auto; display: block;"
    >
                   
                </section>
                
                
                @if($subcategories->isEmpty())
                    
                    <div class="container too">
                        @foreach($services as $service)
                        <div class="row">
                            <div class="col-lg-6 image-container">
                                <img src="{{ $service->feature_image }}" alt="{{ $service->name }}">
                            </div>
                            <div class="col-lg-6 content-container">
                                <h2>{{ $service->name }}</h2>
                                 <p><?= $service->description?></p>
                                 <!--<h3 class="price">Price: {{ $service->default_price }}/-</h3>-->
                                 <!-- <h2>{{ $service->duration_min }}</h2>-->
                                 <a href="{{ route('front.contact') }}" class="checkout-btn" style="margin-bottom:10px">Enquire Now</a>
                                
                                @if($service->isEventPassed())
                                    <button class="checkout-btn" style="background-color: #d1d1d1; color: #7a7a7a; cursor: not-allowed; border: 1px solid #bfbfbf; padding: 12px; border-radius: 5px; width: 32%;" disabled>Event Passed</button>
                                @else
                                    <a href="{{ route('front.checkout', ['id' => Crypt::encryptString($service->id)]) }}" class="checkout-btn">Checkout</a>
                                @endif
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                @endif
                 @if($subcategories->isNotEmpty())
                
                    <div class="w-100 pt-40 white-layer opc95 pb-100 position-relative">
                        <div class="fixed-bg" style="background-image: url(assets/images/parallax-bg2.jpg);"></div>
                        <div class="container">
                            <div class="sec-title sec-title-with-btns d-flex flex-wrap align-items-center justify-content-between w-100">
                                <div class="sec-title-inner">
                                <span class="position-relative thm-clr sub-shap v2 thm-shp d-block">Providing Since
                                2020</span>
                                <h2 class="mb-0">Workshops We Provide</h2>
                                <p class="mb-0">Unlock your potential at Shivika Rohilla Chess Academy with our tailored workshops! Whether you're a parent, professional, or student, our workshops help you sharpen strategic thinking, foster teamwork, and elevate your chess skills for success in all areas of life. Let's level up together!
                                </p>
                                </div>
                                <div class="sec-title-btns d-inline-flex flex-wrap align-items-center">
                                <!--<a class="simple-link thm-clr d-inline-block" href= title="">Workshops We Provide<i class="fas fa-caret-right"></i></a>-->
                                <a class="thm-btn v2 thm-bg brd-rd5 d-inline-block position-relative overflow-hidden" href="https://srchessacademy.com/contact" title="">Enquire Now</a>
                                </div>
                            </div>
                            <!-- Sec Title -->
                            <div class="serv-wrap2 res-row position-relative w-100">
                                <div class="row mrg30">
                            
                                @foreach($subcategories as $subcategory)
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="serv-box2 v2 position-relative w-100">
                                        <div class="serv-img2 brd-rd10 position-relative overflow-hidden w-100">
                                            <img class="img-fluid w-100" src="{{ asset($subcategory->feature_image) }}" alt="{{ $subcategory->name }}">
                                            <a class="position-absolute" href="{{ route('front.services', ['category_slug' => $category->slug, 'sub_category_slug' => $subcategory->slug]) }}" title=""><i class="fas fa-plus"></i></a>
                                        </div>
                                        <div class="serv-info2 w-100 position-absolute">
                                            <h3 class="mb-0"><a href="{{ route('front.services', ['category_slug' => $category->slug, 'sub_category_slug' => $subcategory->slug]) }}" title="">{{ $subcategory->name }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            
                                </div>
                            </div>
                            <!-- Services Wrap 2 -->
                        </div>
                    </div>
                
                @endif
                
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
$(document).ready(function () {
    $('.toggle-desc').on('click', function () {
        const descId = $(this).data('id');
        const $desc = $(`#desc-${descId}`);
        const $shortDesc = $desc.find('.short-desc');
        const $fullDesc = $desc.find('.full-desc');
        const $link = $(this);

        // Toggle visibility of short and full descriptions
        $shortDesc.toggle();
        $fullDesc.toggle();
        
        // Change link text based on visibility
        $link.text($fullDesc.is(':visible') ? 'View Less' : 'View More');
    });
});
</script>

