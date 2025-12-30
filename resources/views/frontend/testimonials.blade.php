<style>
    .client-review-box > h3 {
    font-size: 1.625rem;
    font-weight: 800;
    height: 60px;
}
.client-review-box > h3 + p {
    margin-top: 10px;
    height: 150px;
}

@media(max-width:786px){
     .client-review-box > h3 {
    height: auto;
}
.client-review-box > h3 + p {
    height: auto;
}
  
}

    .top-h-mobile{
        display:none 
    }
@media (max-width: 767.98px) {
    .top-h-mobile{
        display:block !important; 
    }
    .top-h-desktop{
             display:none  !important;   
    }
    
}


    </style>

@extends('frontend.layouts.app')
@section('title', 'Chess Academy Testimonials | Student Reviews – SR Chess Academy')
@section('keywords', 'Chess academy testimonials')
@section('description', 'Read real student reviews and testimonials for SR Chess Academy’s chess coaching in Delhi. Discover success stories & experiences from learners.')

@section('content')
<!--<section class="top-h">-->
<!--   <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">-->
<!--      <div class="fixed-bg" style="background-image: url('{{ asset('frontend/assets/srcamain/images/xx.avif') }}');"></div>-->
<!--      <div class="container">-->
<!--         <div class="page-title-wrap text-center w-100">-->
<!--            <div class="page-title-inner d-inline-block">-->
<!--               <h1 class="mb-0">Testimonial </h1>-->
<!--               <ol class="breadcrumb mb-0 justify-content-center">-->
<!--                  <li class="breadcrumb-item"><a href="{{ route('front.index') }}" title="">Home</a></li>-->
<!--                  <li class="breadcrumb-item active">Testimonial</li>-->
<!--               </ol>-->
<!--            </div>-->
<!--         </div>-->
         <!-- Page Title Wrap -->
<!--      </div>-->
<!--   </div>-->
<!--</section>-->


    
                <section class="top-h top-h-desktop">
                    <img src="{{ asset('frontend/assets/srcamain/images/testimonial-desk.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>

                
                <section class="top-h top-h-mobile">
                      <img src="{{ asset('frontend/assets/srcamain/images/testimonial-mob.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>
<section>
   <div style="background: #fff !important;" class="w-100 pt-40  opc5 pb-110 position-relative">
      <div class="fixed-bg" style="background-image: url(assets/images/pattern-bg2.jpg);"></div>
      <div class="container">
         <!--<div class="sec-title2 v3 text-center w-100">-->
         <!--   <div class="sec-title2-inner d-inline-block">-->
         <!--      <h2 class="mb-0">Testimonial</h2>-->
         <!--   </div>-->
         <!--</div>-->
         <!-- Sec Title 2 -->
         <div id="clientReviewCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    <div class="carousel-item active">
      <div class="client-reviews-wrap res-row text-center w-100">
        <div class="row mrg30">
          <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="client-review-box1 client-review-box brd-rd5 position-relative w-100">
              <div class="client-img position-absolute rounded-circle">
                <img class="img-fluid rounded-circle" src="{{ asset('frontend/assets/srcamain/images/unnamed (4).png') }}" alt="Ronit Singh - Client Review">
                <span class="quote-icon position-absolute rounded-circle">
                  <i class="fas fa-quote-left thm-clr"></i>
                </span>
              </div>
              <h3 class="client-name mb-2">Riddhi Gothi</h3>
              <p class="client-review mb-3">Great academy with expert coaches and a supportive environment. Perfect for improving chess skills at any level. Highly recommend!. </p>
              <span class="client-location d-block text-muted">India</span>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="client-review-box1 client-review-box brd-rd5 position-relative w-100">
              <div class="client-img position-absolute rounded-circle">
                <img class="img-fluid rounded-circle" src="{{ asset('frontend/assets/srcamain/images/unnamed (5).png') }}" alt="Reem Sheikh - Client Review">
                <span class="quote-icon position-absolute rounded-circle">
                  <i class="fas fa-quote-left thm-clr"></i>
                </span>
              </div>
              <h3 class="client-name mb-2">Anshu Sobti</h3>
              <p class="client-review mb-3">SRCA is hands down one of the best chess academies in Delhi! The infrastructure is excellent, creating a perfect learning environment for young minds.</p>
              <span class="client-location d-block text-muted">India</span>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="client-review-box1 client-review-box z1 brd-rd5 position-relative w-100">
              <div class="client-img position-absolute rounded-circle">
                <img class="img-fluid rounded-circle" src="{{ asset('frontend/assets/srcamain/images/google-log.webp') }}" alt="Priti Samra - Client Review">
                <span class="quote-icon position-absolute rounded-circle">
                  <i class="fas fa-quote-left thm-clr"></i>
                </span>
              </div>
              <h3 class="client-name mb-2">Priti Samra</h3>
              <p class="client-review mb-3">My child has gained so much confidence and clarity in the game — highly recommend it to any parent looking for quality chess training!</p>
              <span class="client-location d-block text-muted">India</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="carousel-item">
      <div class="client-reviews-wrap res-row text-center w-100">
        <div class="row mrg30">
          <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="client-review-box1 client-review-box z1 brd-rd5 position-relative w-100">
              <div class="client-img position-absolute rounded-circle">
                <img class="img-fluid rounded-circle" src="{{ asset('frontend/assets/srcamain/images/neha-bhasin.png') }}" alt="Susan D'Souza - Client Review">
                <span class="quote-icon position-absolute rounded-circle">
                  <i class="fas fa-quote-left thm-clr"></i>
                </span>
              </div>
              <h3 class="client-name mb-2">Neha Bhasin</h3>
              <p class="client-review mb-3">Good coaches with great chess playing atmosphere. Definitely recommended.</p>
              <span class="client-location d-block text-muted">India</span>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="client-review-box1 client-review-box z1 brd-rd5 position-relative w-100">
              <div class="client-img position-absolute rounded-circle">
                <img class="img-fluid rounded-circle" src="{{ asset('frontend/assets/srcamain/images/khusi.png') }}" alt="Khushi Gothi - Client Review">
                <span class="quote-icon position-absolute rounded-circle">
                  <i class="fas fa-quote-left thm-clr"></i>
                </span>
              </div>
              <h3 class="client-name mb-2">Khushi Gothi</h3>
              <p class="client-review mb-3">I’ve seen a big improvement in my thinking and game approach since I joined. Highly recommend it to anyone passionate about chess!</p>
              <span class="client-location d-block text-muted">India</span>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="client-review-box1 client-review-box z1 brd-rd5 position-relative w-100">
              <div class="client-img position-absolute rounded-circle">
                <img class="img-fluid rounded-circle" src="{{ asset('frontend/assets/srcamain/images/google-log.webp') }}" alt="Booms Gaming - Client Review">
                <span class="quote-icon position-absolute rounded-circle">
                  <i class="fas fa-quote-left thm-clr"></i>
                </span>
              </div>
              <h3 class="client-name mb-2">Booms Gaming</h3>
              <p class="client-review mb-3">I liked how they take care of not only chess but children mental health also. Am lucky that we found SRCA to help my children learn chess and play Delhi state.<br>Good place.</p>
              <span class="client-location d-block text-muted">India</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="carousel-item">
      <div class="client-reviews-wrap res-row text-center w-100">
        <div class="row mrg30">
          <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="client-review-box1 client-review-box z1 brd-rd5 position-relative w-100">
              <div class="client-img position-absolute rounded-circle">
                <img class="img-fluid rounded-circle" src="{{ asset('frontend/assets/srcamain/images/google-log.webp') }}" alt="Charlus - Client Review">
                <span class="quote-icon position-absolute rounded-circle">
                  <i class="fas fa-quote-left thm-clr"></i>
                </span>
              </div>
              <h3 class="client-name mb-2">Charlus</h3>
              <p class="client-review mb-3">The best rising chess community in Delhi with a highly appealing vibe. If you’re into chess and in Delhi, absolutely worth a stop by!</p>
              <span class="client-location d-block text-muted">India</span>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="client-review-box1 client-review-box z1 brd-rd5 position-relative w-100">
              <div class="client-img position-absolute rounded-circle">
                <img class="img-fluid rounded-circle" src="{{ asset('frontend/assets/srcamain/images/google-log.webp') }}" alt="Shubh Bhaskar - Client Review">
                <span class="quote-icon position-absolute rounded-circle">
                  <i class="fas fa-quote-left thm-clr"></i>
                </span>
              </div>
              <h3 class="client-name mb-2">Shubh Bhaskar</h3>
              <p class="client-review mb-3">Amazing environment and a great place to begin your chess journey!
SRCA caters to your needs and trains you to bring out your potential while keeping a warm and friendly environment.</p>
              <span class="client-location d-block text-muted">India</span>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-4">
            <div class="client-review-box1 client-review-box z1 brd-rd5 position-relative w-100">
              <div class="client-img position-absolute rounded-circle">
                <img class="img-fluid rounded-circle" src="{{ asset('frontend/assets/srcamain/images/google-log.webp') }}" alt="Mansi Sinha - Client Review">
                <span class="quote-icon position-absolute rounded-circle">
                  <i class="fas fa-quote-left thm-clr"></i>
                </span>
              </div>
              <h3 class="client-name mb-2">Mansi Sinha</h3>
              <p class="client-review mb-3">Good learning space for kids. Small batch size ensures personal attention for all children.
Enjoyed playing in one of the Chess Coffee Connect events by SRCA. Looking forward for more. Perfect place for Chess fans in Delhi.</p>
              <span class="client-location d-block text-muted">India</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Controls -->
  <!--<button class="carousel-control-prev" type="button" data-bs-target="#clientReviewCarousel" data-bs-slide="prev">-->
  <!--  <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
  <!--  <span class="visually-hidden">Previous</span>-->
  <!--</button>-->
  <!--<button class="carousel-control-next" type="button" data-bs-target="#clientReviewCarousel" data-bs-slide="next">-->
  <!--  <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
  <!--  <span class="visually-hidden">Next</span>-->
  <!--</button>-->
</div>

<div class="text-center mt-4">
  <a href="https://g.page/r/CVzhukntrrGWEBM/review" target="_blank" class="thm-btn thm-bg d-inline-block position-relative overflow-hidden">Leave us a Review!</a>
</div>

         <!-- Client Reviews Wrap -->
      </div>
   </div>
</section>
@endsection