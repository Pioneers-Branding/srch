<!-- Slick Carousel CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
@extends('frontend.layouts.app')
@section('title') {{ 'About Us' }} @endsection
@section('content')
<style>
.special-box {
    min-height: 100%; 
    padding: 3.5rem 10% !important;
}

.special-box-inner {
    height: 100% !important;
}


   .slick-initialized .slick-slide {
   display: block;
   padding: 20px;
   }
   .slick-slider:not(.feat-caro) > button.slick-arrow {
   background-color: transparent !important;
   color: transparent !important;}
   .slick-prev:before, .slick-next:before {
   font-family: 'slick';
   font-size: 35px;}
   .slick-dots li.slick-active button:before {
   opacity: .75;
   color: transparent;
   }
   .slick-slider ul.slick-dots > li button {
   color: transparent;
   padding: 0;
   -webkit-border-radius: 50%;
   border-radius: 50%;
   background-color: transparent;
   height: .75rem;
   width: .75rem;
   font-size: 0;
   margin-top: 3px;
   margin-left: 5px;
   }
   .team-img{
   border: 2px solid #6c757d !important;
   }
   .social-links4 > a {
   padding-top: 7px;
   }
   
   .ara{
   height:340px !important;
   }
   .client-review-box > h3 + p {
    margin-top: 10px;
    height: 232px;
}

@media(max-width:786px){
     .client-review-box > h3 + p {

    height: auto !important;  
}
</style>


        <section class="top-h top-h-desktop">
    <img 
        src="{{ asset('frontend/assets/srcamain/images/WhatsApp Image 2025-05-09 at 2.31.09 PM.jpeg') }}" 
        alt="" 
        style="width: 100%; height: auto; display: block;"
    >
</section>
<section>
   <div class="w-100 pt-100 opc95 pb-100 position-relative">
      <div class="fixed-bg" style="background-image: url(assets/images/parallax-bg6.html);"></div>
      <div class="container">
         <div class="about-wrap2 position-relative w-100">
            <div class="row mrg30">
               <div class="col-md-12 col-sm-12 col-lg-6 order-lg-1">
                  <div class="about-gal w-100">
                     <div class="row align-items-end mrg20">
                        <div class="col-md-6 col-sm-6 col-lg-6">
                           <div class="about-gal-img brd-rd10 overflow-hidden position-relative w-100">
                              <a href="{{asset('frontend/assets/srcamain/images/d/1.webp')}}"
                                 data-fancybox="gallery" title=""><img class="img-fluid w-100"
                                 src="{{asset('frontend/assets/srcamain/images/d/1.webp')}}"
                                 alt="About Gallery Image 1"></a>
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6">
                           <div class="about-gal-img brd-rd10 overflow-hidden position-relative w-100">
                              <a href="{{asset('frontend/assets/srcamain/images/d/2.webp')}}"
                                 data-fancybox="gallery" title=""><img class="img-fluid w-100"
                                 src="{{asset('frontend/assets/srcamain/images/d/2.webp')}}"
                                 alt="About Gallery Image 2"></a>
                           </div>
                        </div>
                     </div>
                     <div class="row mrg20">
                        <div class="col-md-6 col-sm-6 col-lg-6">
                           <div
                              class="about-gal-img brd-rd10 brd-rd10 overflow-hidden position-relative w-100">
                              <a href="{{asset('frontend/assets/srcamain/images/d/3.webp')}}"
                                 data-fancybox="gallery" title=""><img class="img-fluid w-100"
                                 src="{{asset('frontend/assets/srcamain/images/d/3.webp')}}"alt="About Gallery Image 3"></a>
                           </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6">
                           <div class="about-gal-img brd-rd10 overflow-hidden position-relative w-100">
                              <a class="about-play-btn spinner scndry-clr rounded-circle"
                                 href="https://www.youtube.com/watch?v=Aj8nLR4YI9k" data-fancybox
                                 title=""><i class="fas fa-play-circle"></i></a>
                              <img class="img-fluid w-100"
                                 src="{{asset('frontend/assets/srcamain/images/d/4.webp')}}"alt="About Gallery Image 4">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <p style="text-align: justify";>
                  Welcome to Shivika Rohilla Chess Academy (SRCA)—where the journey to chess mastery begins! Founded by Woman FIDE Master (WFM) Shivika Rohilla, her mother, Dr. Nidhi Bhasin Rohilla, and her first coach, National Instructor Yogender Sharma, SRCA is dedicated to promoting the art of chess and nurturing talent with passion and precision. Our mission is clear: to make chess popular in Delhi and inspire more individuals—especially young girls—to pursue chess as a professional sport. Shivika’s chess journey is a story of dedication, resilience, and familial support. Playing chess for over a decade, she has honed her skills through countless hours of practice, strategic thinking, and unwavering commitment. From the start, her mother, Dr. Nidhi, has been her greatest supporter and advocate—traveling with her to tournaments
                  .<br/>investing in her growth, and sharing in every victory and lesson. This mother-daughter bond has not only fueled Shivika's success but has inspired SRCA's vision of empowering young players to chase their dreams in chess.
                  <br/>At SRCA, we believe that chess is not just a game; it’s a powerful tool for building critical thinking, strategic foresight, and resilience. Our curriculum combines foundational skills, advanced tactics, and mental strength training to support players at every level, from freshers to aspiring professionals. We offer coaching that focuses on each player’s unique journey, strengthening their mindset and preparing them to face opponents with confidence on the chessboard. Our academy hosts regular chess tournaments and community events, encouraging more girls to take on the challenge, break barriers, and become skilled chess players. We’re committed to transforming chess culture in Delhi, making it accessible, exciting, and inclusive for everyone  <br/> <br/>Join us at SRCA as we redefine what’s possible in chess, one move at a time.           
               </p>
               <div class="col-md-12 col-sm-12 col-lg-6">
                  <div class="about-desc w-100">
                     <h4 id="chess-steps" class="thm-clr d-inline-block" style="font-weight: 1200;color:rgb(252, 215, 57)">
                        STEPS TOWARDS MASTERING CHESS
                     </h4>
                     <br> 
                     <p class="mb-0">At Shivika Rohilla Chess Academy (SRCA), we understand the dreams of players and the aspirations of parents. That’s why we offer 360-degree support for everything chess, from personalized coaching to tournaments, mentorship, and beyond.</p>
                     <p class="mb-0">
                        With small batch sizes, we ensure individual attention for every student, nurturing their unique potential. Our mission is to inspire excellence, foster passion, and build a legacy of chess in Delhi, empowering players to shine on every board they face. At SRCA, we’re not just teaching chess—we’re shaping futures and creating champions.
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <!-- About Wrap 2 -->
         <!--                    <p class="mt-2">-->
         <!-- Our academy hosts regular chess tournaments and community events, encouraging more girls to take on the challenge, break barriers, and become skilled chess players. We’re committed to transforming chess culture in Delhi, making it accessible, exciting, and inclusive for everyone.-->
         <!--</p>-->
         <!--<p>-->
         <!-- Join us at SRCA as we redefine what’s possible in chess,one move at time.-->
         <!--</p>-->
      </div>
   </div>
</section>
<section>
   <div class="w-100 blue-layer opc1 pb-120 position-relative">
      <div class="fixed-bg back-blend-multiply bg-color5" style="background-image: url(assets/images/parallax-bg1.jpg);"></div>
      <div class="container">
         <div class="quote-facts-wrap position-relative w-100">
            <div class="row mrg30 align-items-end">
               <div class="col-md-8 col-sm-12 col-lg-8">
                  <div class="quote-box-wrap position-relative w-100">
                     <img class="img-fluid brd-rd5 overlap65" src="{{asset('frontend/assets/srcamain/images/d/oss-68ac5e4adebab.webp')}}" alt="Quote Image">
                     <div class="quote-box position-absolute w-100">
                        <div class="quote-box-inner thm-bg w-100">
                           <i class="fas fa-quote-left scndry-bg brd-rd5 position-absolute"></i>
                           <p class="mb-0">"Chess is the gymnasium of the mind." – Blaise Pascal</p>
                        </div>
                        <div class="quote-box-info position-relative overflow-hidden thm-bg brd-rd5 w-100">
                           <h3 class="mb-0">Grandmaster Anatoly Karpov</h3>
                           <span class="d-block">World Chess Champion</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-12 col-lg-4">
                  <div class="facts-wrap position-relative w-100">
                     <div class="fact-box position-relative d-flex flex-wrap w-100">
                        <i class="fas fa-chess thm-clr d-inline-block"></i>
                        <div class="fact-box-inner">
                           <span class="scndry-clr d-block rim"><i class="counter">85</i>+</span>
                           <h4 class="mb-0">Grandmasters in India</h4>
                           <!--<p class="mb-0">Top Players from Around the World</p>-->
                        </div>
                     </div>
                     <div class="fact-box position-relative d-flex flex-wrap w-100">
                        <i class="fas fa-trophy thm-clr d-inline-block"></i>
                        <div class="fact-box-inner">
                           <span class="scndry-clr d-block rim"><i class="counter">44000</i>+</span>
                           <h4 class="mb-0">Rated Chess Players</h4>
                           <!--<p class="mb-0">Held Annually Globally</p>-->
                        </div>
                     </div>
                     <div class="fact-box position-relative d-flex flex-wrap w-100">
                        <i class="fas fa-users thm-clr d-inline-block"></i>
                        <div class="fact-box-inner">
                           <span class="scndry-clr d-block rim"><i class="counter">5000</i>+</span>
                           <h4 class="mb-0">Rated Women Chess Players </h4>
                           <p class="mb-0">*as per <a href="https://ratings.fide.com/" target="blank">(https://ratings.fide.com/)</a></p>
                        </div>
                     </div>
                  </div>
                  <!-- Facts Wrap -->
               </div>
            </div>
         </div>
         <!-- Quotes & Facts Wrap -->
      </div>
   </div>
</section>
<section>
   <div class="w-100 pt-100 pb-110 position-relative">
      <div class="container">
         <div class="sec-title v2 text-center w-100">
            <div class="sec-title-inner d-inline-block">
               <h2 class="mb-0 text-color3">Meet Our Best Trainers</h2>
               <p class="mb-0 position-relative sub-shap thm-shp d-inline-block">It's exhilarating when you outsmart your opponent in a challenging game of chess.</p>
            </div>
         </div>
         <section>
            <div class="w-100 pt-100 pb-110 position-relative">
               <div class="container">
                  <div class="team-wrap position-relative w-100">
                     <div class="team-slider">
                        <div class="team-box text-center position-relative w-100">
                           <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                              <img class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/hemant_sharma.jpg')}}" alt="Team Image 1">
                           </div>
                           <div class="team-info z1 bg-color5 position-relative w-100">
                              <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">IM Hemant Sharma</a></h3>
                              <span class="d-block thm-clr">Intermediate Batch</span>
                           </div>
                        </div>
                        <div class="team-box text-center position-relative w-100">
                           <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                              <img class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/tejas_bakre.jpg')}}" alt="Team Image 2">
                           </div>
                           <div class="team-info z1 bg-color5 position-relative w-100">
                              <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">GM Tejas Bakre</a></h3>
                              <span class="d-block thm-clr">Advanced Batch</span>
                           </div>
                        </div>
                        <div class="team-box text-center position-relative w-100">
                           <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                              <img class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/yogender_prakash.jpg')}}" alt="Team Image 3">
                           </div>
                           <div class="team-info z1 bg-color5 position-relative w-100">
                              <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">Yogender Prakash</a></h3>
                              <span class="d-block thm-clr">National Instructor</span>
                           </div>
                        </div>
                        <div class="team-box text-center position-relative w-100">
                           <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                              <img class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/vishal_sareen.jpg')}}" alt="Team Image 4">
                           </div>
                           <div class="team-info z1 bg-color5 position-relative w-100">
                              <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">IM Vishal Sareen</a></h3>
                              <span class="d-block thm-clr">Advanced Batch</span>
                           </div>
                        </div>
                        <div class="team-box text-center position-relative w-100">
                           <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                              <img class="img-fluid w-100 ara"  src="{{asset('frontend/assets/srcamain/images/Aradhya.jpeg')}}" alt="IM Aradhya Garg">
                           </div>
                           <div class="team-info z1 bg-color5 position-relative w-100">
                              <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">IM Aradhya Garg</a></h3>
                              <span class="d-block thm-clr">Chess advisor</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
</section>
<section>
   <div class="w-100 position-relative">
   <div class="special-wrap res-row overflow-hidden position-relative w-100">
      <div class="row mrg">
         <!-- BOX 1 -->
         <div class="col-md-6 col-sm-6 col-lg-4 d-flex">
            <div class="special-box v3 text-center z1 scndry-bg grad-bg2 d-flex flex-column justify-content-center align-items-center w-100 p-4">
               <i class="fas fa-paste d-inline-block mb-3"></i>
               <div class="special-box-inner">
                  <h4 class="mb-3">Beginner's Guide</h4>
                  <p class="mb-0">
                     New to chess? No problem! Our Beginner's Guide simplifies the basics, teaching essential moves, strategies, and tactics. Build a strong foundation and step into the world of chess with confidence!
                  </p>
               </div>
            </div>
         </div>

         <!-- BOX 2 -->
         <div class="col-md-6 col-sm-6 col-lg-4 d-flex">
            <div class="special-box v3 text-center z1 scndry-bg grad-bg2 d-flex flex-column justify-content-center align-items-center w-100 p-4">
               <i class="fas fa-horse-head d-inline-block mb-3"></i>
               <div class="special-box-inner">
                  <h4 class="mb-3">Playing Sessions</h4>
                  <p class="mb-0">
                     Practice makes perfect! Join our interactive playing sessions to sharpen your skills, analyze your moves, and compete with peers under expert guidance. Turn every game into a learning opportunity!
                  </p>
               </div>
            </div>
         </div>

         <!-- BOX 3 -->
         <div class="col-md-6 col-sm-6 col-lg-4 d-flex">
            <div class="special-box v3 text-center z1 scndry-bg grad-bg2 d-flex flex-column justify-content-center align-items-center w-100 p-4">
               <i class="fas fa-trophy d-inline-block mb-3"></i>
               <div class="special-box-inner">
                  <h4 class="mb-3">Chess Coffee Connect</h4>
                  <p class="mb-0">
                     Where chess meets conversations! Relax, network, and play friendly games over a cup of coffee. Chess Coffee Connect is the perfect blend of learning, strategy, and socializing.
                  </p>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>

</section>
<section>
   <div class="w-100 pt-60 pb-60 position-relative">
      <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-2 col-6">
                <div class="spnsr-box text-center w-100">
                   <a><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/acif-logo.webp')}}" alt="Sponsor Image 1"></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-2 col-6">
                <div class="spnsr-box text-center w-100">
                   <a><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/chess-logo.webp')}}" alt="Sponsor Image 1"></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-2 col-6">
                <div class="spnsr-box text-center w-100">
                   <a><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/crown-logo.webp')}}" alt="Sponsor Image 1"></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-2 col-6">
                <div class="spnsr-box text-center w-100">
                   <a><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/dcas-logo.webp')}}" alt="Sponsor Image 1"></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-2 col-6">
                <div class="spnsr-box text-center w-100">
                   <a><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/fide-logo.webp')}}" alt="Sponsor Image 1"></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-2 col-6">
                <div class="spnsr-box text-center w-100">
                   <a><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/help-hand-logo.webp')}}" alt="Sponsor Image 1"></a>
                </div>
            </div>
        </div>
         <!--<div id="logoCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">-->
         <!--   <div class="carousel-inner">-->
         <!--      <div class="carousel-item active">-->
         <!--         <ul class="spnsr-list d-flex flex-wrap justify-content-center align-items-center list-unstyled w-100">-->
         <!--            <li>-->
         <!--               <div class="spnsr-box text-center w-100">-->
         <!--                  <a href="#"><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/logos/srca-logo-removebg-preview.png')}}" alt="Sponsor Image 1"></a>-->
         <!--               </div>-->
         <!--            </li>-->
         <!--            <li>-->
         <!--               <div class="spnsr-box text-center w-100">-->
         <!--                  <a href="#"><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/unnamed-removebg-preview.png')}}" alt="Sponsor Image 2"></a>-->
         <!--               </div>-->
         <!--            </li>-->
         <!--            <li>-->
         <!--               <div class="spnsr-box text-center w-100">-->
         <!--                  <a href="#"><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/unnamed (6).jpg')}}" alt="Sponsor Image 3"></a>-->
         <!--               </div>-->
         <!--            </li>-->
         <!--         </ul>-->
         <!--      </div>-->
         <!--      <div class="carousel-item">-->
         <!--         <ul class="spnsr-list d-flex flex-wrap justify-content-center align-items-center list-unstyled w-100">-->
         <!--            <li>-->
         <!--               <div class="spnsr-box text-center w-100">-->
         <!--                  <a href="#"><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/logos/srca2-logo-removebg-preview.png')}}" alt="Sponsor Image 4"></a>-->
         <!--               </div>-->
         <!--            </li>-->
         <!--            <li>-->
         <!--               <div class="spnsr-box text-center w-100">-->
         <!--                  <a href="#"><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/logos/srca-logo3-removebg-preview.png')}}" alt="Sponsor Image 5"></a>-->
         <!--               </div>-->
         <!--            </li>-->
         <!--            <li>-->
         <!--               <div class="spnsr-box text-center w-100">-->
         <!--                  <a href="#"><img class="img-fluid" src="{{asset('frontend/assets/srcamain/images/logos/srca-logo4-removebg-preview.png')}}" alt="Sponsor Image 6"></a>-->
         <!--               </div>-->
         <!--            </li>-->
         <!--         </ul>-->
         <!--      </div>-->
         <!--   </div>-->
            <!-- Controls (Next/Prev buttons) -->
            <!--<button class="carousel-control-prev" type="button" data-bs-target="#logoCarousel" data-bs-slide="prev">-->
            <!--    <span class="carousel-control-prev-icon"></span>-->
            <!--</button>-->
            <!--<button class="carousel-control-next" type="button" data-bs-target="#logoCarousel" data-bs-slide="next">-->
            <!--    <span class="carousel-control-next-icon"></span>-->
            <!--</button>-->
         <!--</div>-->
      </div>
   </div>
</section>
<section>
   <div class="w-100 pt-110 gray-layer opc5 pb-110 position-relative">
      <div class="fixed-bg" style="background-image: url(assets/images/pattern-bg2.jpg);"></div>
      <div class="container">
         <div class="sec-title2 v3 text-center w-100">
            <div class="sec-title2-inner d-inline-block">
               <span
                  class="thm-clr d-inline-block letter-spacing-initial text-transform-initial border-0"> Chess Coffee Connect</span>
               <h2 class="mb-0">Member Reviews</h2>
               <p class="mb-0">Experience the thrill of chess through the eyes of our members! Discover how Chess Coffee Connect blends strategic gameplay, engaging conversations, and a vibrant community to create unforgettable moments..</p>
            </div>
         </div>
         <!-- Sec Title 2 -->
         <div class="client-reviews-wrap res-row text-center w-100">
            <div class="row mrg30">
               <div class="col-md-6 col-sm-6 col-lg-4">
                  <div class="client-review-box brd-rd5 position-relative w-100">
                     <div class="client-img z1 position-absolute rounded-circle">
                        <img  class="img-fluid rounded-circle" src="{{asset('frontend/assets/srcamain/images/unnamed (1).png')}}"  alt="" />
                        <span
                           class="position-absolute z1 rounded-circle"><i
                           class="fas fa-quote-left thm-clr"></i></span>
                     </div>
                     <h3 class="mb-0">Anshu Sobti</h3>
                     <p class="mb-0">ISRCA is hands down one of the best chess academies in Delhi! The infrastructure is excellent, creating a perfect learning environment for young minds. The coaching is top-notch, with structured training programs that help players improve their game at every level.</p>
                     <span class="d-block scndry-clr">Delhi , India</span>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-lg-4">
                  <div class="client-review-box brd-rd5 position-relative w-100">
                     <div class="client-img z1 position-absolute rounded-circle">
                        <img  class="img-fluid rounded-circle" src="{{asset('frontend/assets/srcamain/images/unnamed (3).png')}}"  alt="" />
                        <span
                           class="position-absolute z1 rounded-circle"><i
                           class="fas fa-quote-left thm-clr"></i></span>
                     </div>
                     <h3 class="mb-0">Booms gaming</h3>
                     <p class="mb-0">I liked how they take care of not only chess but children mental health also. Am lucky that we found SRCA to help my children learn chess and play Delhi state.</p>
                     <span class="d-block scndry-clr">Banglore , India</span>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-lg-4">
                  <div class="client-review-box z1 brd-rd5 position-relative w-100">
                     <div class="client-img position-absolute rounded-circle">
                        <img  class="img-fluid rounded-circle" src="{{ asset('frontend/assets/srcamain/images/unnamed (4).png') }}"  alt="" />
                        <span
                           class="position-absolute z1 rounded-circle"><i
                           class="fas fa-quote-left thm-clr"></i></span>
                     </div>
                     <h3 class="mb-0">Riddhi Gothi</h3>
                     <p class="client-review mb-3">Great academy with expert coaches and a supportive environment. Perfect for improving chess skills at any level. Highly recommend!. </p>
              <span class="d-block scndry-clr">Indore , India</span>
                  </div>
               </div>
            </div>
         </div>
         <!-- Client Reviews Wrap -->
         <div style="  text-align: center;
            margin-top: 5%;">
            <a href="https://g.page/r/CVzhukntrrGWEBM/review"  target="_blank" class="thm-btn thm-bg d-inline-block position-relative overflow-hidden">Leave us a Review!</a>
         </div>
      </div>
   </div>
</section>
<section style="margin: 4% 0">
   <div class="w-100 scndry-bg position-relative">
      <div class="find-thera-wrap position-relative w-100">
         <div class="row align-items-center mrg">
            <div class="col-md-12 col-sm-12 col-lg-6">
               <div class="find-thera-img position-relative"><img class="img-fluid w-100"
                  src="{{asset('frontend/assets/srcamain/images/about-shivika-img.webp')}}" alt="Find Therapist Image"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-6">
               <div class="find-thera-cap position-relative">
                  <a class="video-play spinner text-center rounded-circle position-absolute"
                     href="https://www.youtube.com/watch?v=WYiemcA5BrE" data-fancybox title=""><i
                     class="fas fa-play" style="margin-top: 40%;"></i></a>
                  <div class="find-thera-cap-inner">
                     <h2 class="mb-0 text-color3">Chess Coffee Connect a vibrant space where chess enthusiasts of all levels come together to share strategies, network, and grow their passion for the game. Whether you’re a seasoned player or a beginner, it’s the perfect opportunity to connect, learn, and be part of SRCA’s thriving chess community.</h2>
                     <div class="btns-group d-inline-flex flex-wrap align-items-center w-100">
                        <!--<a class="thm-btn v2 bg-color5 brd-rd5 d-inline-block position-relative overflow-hidden" href="https://srchessacademy.com/coaches" title="">KNOW MORE</a>-->
                        <a class="simple-link d-inline-block text-color3 mt-4" href="https://srchessacademy.com/chess-coffee-connect" title="">Register for upcoming events</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Find Therapist Wrap -->
   </div>
</section>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Slick Carousel JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
   $(document).ready(function () {
   $('.items').slick({
      dots: true,
      infinite: true,
      speed: 800,
      autoplay: true, // Enable autoplay
      autoplaySpeed: 2000, // Slide every 2 seconds
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
         {
            breakpoint: 1024,
            settings: {
               slidesToShow: 2,
               slidesToScroll: 2,
               infinite: true,
               dots: true
            }
         },
         {
            breakpoint: 600,
            settings: {
               slidesToShow: 1,
               slidesToScroll: 1
            }
         }
      ]
   });
   });
   
</script>
<script>
   $(document).ready(function () {
       $('.team-slider').slick({
           dots: true,
           infinite: true,
           speed: 800,
           autoplay: true,
           autoplaySpeed: 2000,
           slidesToShow: 3,
           slidesToScroll: 1,
           responsive: [
               {
                   breakpoint: 1024,
                   settings: {
                       slidesToShow: 2,
                       slidesToScroll: 1
                   }
               },
               {
                   breakpoint: 600,
                   settings: {
                       slidesToShow: 1,
                       slidesToScroll: 1
                   }
               }
           ]
       });
   });
</script>
@endsection