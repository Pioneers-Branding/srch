 <!-- Slick Carousel CSS -->
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

   <!-- Font Awesome for icons -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dyyrdA7qQOS0m5FGT+zl5IL5sNmBRHo0b4ICZYh7BgW8w35Cu1FU9EYkmD59dsNFZEm2ts77a24EMmH9dvKD6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@extends('frontend.layouts.app') 
@section('title', 'SRCA | Best Chess Classes in Delhi')
@section('keywords', 'Chess Classes, Chess for beginners, Delhi Chess Classes')
@section('description', 'Best Chess Classes in Delhi at SRCA. Expert coaches, personalized training for all levels, and engaging tournaments. Enroll today to master the game!')

@section('content') 
<style>
   .social-media-icons {
   position: fixed;
   right: 2%;
   top: 30%;
   transform: translateY(-50%);
   z-index: 1000;
   }
   .social-icon {
   display: block;
   margin: 10px 0;
   background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739)  !important;
   border-radius: 50%;
   width: 35px;
   height: 35px;
   line-height: 25px; 
   text-align: center;
   color: #000;
   /* font-size: 24px; */
   transition: background-color 0.3s, transform 0.3s;
   margin-bottom: -7px !important;
   }
   .asaa i {
   font-size: 30px !important;
   }
   .social-icon {
   padding-top: 8px;
   }
   .tk i {
   font-size: 18px;
   }
   .about-desc.v2 > span:not(.about-time) + h2 {
    margin-top: 10px;
    text-transform: uppercase;
}
   .asaaa {
   margin-left: -11%;
   width: 45px;
   height: 45px;
   background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739)  !important;
   }
   .new-box .col-lg-2{
   width:20% !important;
   }
   .special-box v3{
   padding-top:32% !important;
   }
   .serv-img2{
   border: 2px solid #6c757d !important;
   }
   .about-img .social-links4 {
   top: 10% !important;
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

   @media (max-width: 1300px) {
   .special-box.v3 {
   padding: 4.5rem 13%;
   }
   }
   
   .ara{
       height:340px;
   }



@media (max-width:786px){
      .pad-btn{
             top: 20px !important;
      }
         .ara{
       height:auto !important;
   }
   .proced-box .new_design{
     height: 60% !important;
}
 .team-img{
    height:275px;
}
.team-box{
    margin-bottom:0 ;
}


 .team-img img{
    height:100%;
}

}


</style>
<div class="social-media ">
   <div class="social-media-icons ">
      <a href="https://www.facebook.com/profile.php?id=61559885038853" target="_blank" class="social-icon facebook tk mobile" aria-label="Facebook">
      <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://x.com/ChessShivi46473?t=T63X2qFgay2WqroAs7amsw&s=09" target="_blank" class="social-icon twitter tk mobile" aria-label="Twitter">
      <i class="fab fa-twitter"></i>
      </a>
      <a href="https://www.instagram.com/srca_chessmentors/" target="_blank" class="social-icon instagram tk mobile" aria-label="Instagram">
      <i class="fab fa-instagram"></i>
      </a>
      <a href="https://www.linkedin.com/company/sr-chess-academy/" target="_blank" class="social-icon linkedin tk mobile" aria-label="LinkedIn">
      <i class="fab fa-linkedin-in"></i>
      </a>
      <a href="https://youtu.be/39wamHswcB8" target="_blank" class="social-icon youtube tk mobile" aria-label="YouTube">
      <i class="fab fa-youtube"></i>
      </a>
      <a href="https://api.whatsapp.com/send?phone=917042854007" target="_blank" class="social-icon whatsapp tk mobile" aria-label="WhatsApp">
      <i class="fab fa-whatsapp"></i>
      </a>
   </div>
</div>
<!-- Sn Main Slider -->
<section class="sn-main-slider">
   <div class="sn-main-slider-carousel owl-carousel owl-theme">
      @foreach($banners as $banner)
      <div class="slide">
         <div class="container">
            <div class="row clearfix">
               <!-- Content Column -->
               <div class="content-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                     <!-- <div class="title">{{ $banner->title ?? 'Default Title' }}</div> -->
                     
                     <h2><?= $banner->description ?></h2>
                     <!-- <div class="text">{{ $banner->description ?? 'Default description text.' }}</div> -->
                     <div class="btns-box">
                        <a class="thm-btn thm-bg brd-rd5 d-inline-block position-relative overflow-hidden"
                           href="/signup" title="">{{ $banner->button_text ?? 'GET STARTED' }}</a>
                     </div>
                  </div>
               </div>
               <!-- Image Column -->
               <div class="image-column col-lg-6 col-md-12 col-sm-12">
                  <div class="inner-column">
                     <div class="circle-layer">
                        <span class="circle-one"></span>
                        <span class="circle-two"></span>
                     </div>
                     <div class="image">
                        <img src="{{ asset($banner->feature_image) }}" alt="{{ $banner->title ?? 'Banner Image' }}" />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</section>
<!-- End Main Slider Section -->
<section class="sn-featured-section">
   <div class="container">
      <div class="inner-container">
         <div class="clearfix">
            <!-- Sn Feature Block -->
            <div class="sn-feature-block col-lg-4 col-md-6 col-sm-12">
               <a href="https://docs.google.com/spreadsheets/d/1O5iU5IOBoQHZ0QNfIKBq6xMzU5MlYeBXO70bcsyvT1s/edit?gid=0#gid=0" target="_blank"><div class="inner-box">
                  <div class="content">
                     <span class="icon fas fa-certificate"></span>
                     <h4>Download Certificates
                     </h4>
                     <!-- <div class="text">Nostrud exerctation to ullamco</div> -->
                  </div>
               </div></a>
            </div>
            <!-- Sn Feature Block -->
            <div class="sn-feature-block active col-lg-4 col-md-6 col-sm-12">
               <a href="https://docs.google.com/spreadsheets/d/1Y7oHirDt_kffeIpl6U5MMgfquKjUfusIY7CX-gOkN0E/edit?gid=0#gid=0" target="_blank"><div class="inner-box">
                  <div class="content">
                     <span class="icon fas fa-image"></span>
                     <h4>View Tournament Photos & Videos</h4>
                     <!-- <div class="text">Nostrud exerctation to ullamco</div> -->
                  </div>
               </div></a>
            </div>
            <!-- Sn Feature Block -->
            <div class="sn-feature-block col-lg-4 col-md-6 col-sm-12">
               <a href="https://srchessacademy.com/chess-coffee-connect" target="_blank"><div class="inner-box">
                  <div class="content">
                     <span class="icon fas fa-medal"></span>
                     <h4>View Upcoming Events
                     </h4>
                     <!-- <div class="text">Nostrud exerctation to ullamco</div> -->
                  </div>
               </div></a>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="pt-90">
   <div class="w-100 scndry-bg position-relative">
      <div class="video-impact-wrap position-relative w-100">
         <div class="mark">
            <marquee >
               1. "Every chess master was once a beginner." – Irving Chernev &nbsp; | &nbsp;
               2. "Chess is the gymnasium of the mind." – Blaise Pascal &nbsp; | &nbsp;
               3. "In chess, as in life, opportunity strikes but once." – David Bronstein &nbsp; | &nbsp;
               4. "The beauty of a move lies not in its appearance but in the thought behind it." – A. T. Fomenko &nbsp; | &nbsp;
               5. "Chess is a game of patience and strategy." – Unknown &nbsp; | &nbsp;
               6. "A good player knows all the rules, a great player knows how to break them." – Unknown &nbsp; | &nbsp;
               7. "Chess is life in miniature. Chess is a struggle." – Garry Kasparov &nbsp; | &nbsp;
               8. "You can't play chess without losing pawns." – James Mateson &nbsp; | &nbsp;
               9. "The hardest game to win is a won game." – Emanuel Lasker &nbsp; | &nbsp;
               10. "A pawn that reaches the eighth rank is a queen." – Unknown
            </marquee>
         </div>
         <div class="row mrg">
            <div class="col-md-12 col-sm-12 col-lg-6">
               <div class="video-box-wrap z1 d-flex flex-wrap justify-content-center align-items-center position-relative w-100"
                  style="background-image: url('{{ asset('frontend/assets/srcamain/images/xx.avif') }}');"
                  >
                  <div style="background-color: rgba(0, 0, 0, 0.6); position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1,color:#fff"></div>
                  <div class="video-box position-relative d-inline-block">
                     <!-- <a class="position-absolute spinner" href="https://player.vimeo.com/video/183609522" data-fancybox title=""><i class="fas fa-play"></i></a> -->
                     <span class="d-block thm-clr">Stress  Trivia</span>
                     <h2 class="mb-0">Inspire Strength, Empower Success</h2>
                     <p class="mb-0">At SRCA, we believe true success comes from a balance of mental strength, resilience, and emotional well-being. The <strong>Stress Test </strong>isn’t about pushing limits—it’s about unlocking potential and preparing for challenges with confidence and clarity.</p>
                     <p style="color:#fff;">Our expert <strong>sports psychologist</strong> plays a vital role in this journey, helping players:</p>
                     <ul>
                        <li style="color:#fff; list-style: disc;">Build mental toughness and focus under pressure.</li>
                        <li style="color:#fff; list-style: disc;">Develop strategies to handle stress in high-stakes situations.</li>
                        <li style="color:#fff; list-style: disc;">Cultivate a positive mindset for success on and off the board.</li>
                     </ul>
                     <p class="mt-1">Whether you’re a player striving to perform at your best or a parent ensuring your child’s growth, we recommend experiencing the Stress Test to inspire strength and empower success.
                        <br>Join us at SRCA to unlock a brighter, balanced future!
                     </p>
                     <a class="thm-btn thm-bg brd-rd5 d-inline-block position-relative overflow-hidden"
                        href="{{ route('front.stress_test_parents') }}" title=""> For Parents </a>
                     <a class="thm-btn thm-bg brd-rd5 d-inline-block pad-btn position-relative overflow-hidden"
                        href="{{ route('front.stress_test_children') }}" title="">For Children </a>
                  </div>
               </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-6">
               <div class="impact-wrap z1 d-flex flex-wrap justify-content-center align-items-center position-relative w-100"
                  style="background-image: url('{{ asset('frontend/assets/srcamain/images/bubble-bg.png') }}');"
                  >
                  <div class="impact-inner d-inline-block">
                     <span class="d-block thm-clr">Chess  Trivia</span>
                     <h2 class="mb-0">Chess Trivia:Outsmart, Checkmate, and Win Big!
</h2>
                     <p class="mb-0">Dive into the world of chess with the Shivika Rohilla Chess Academy (SRCA) Trivia Challenge! Unlock exclusive discounts on our freshers, beginners and related chess programs while sharpening your skills and expanding your chess knowledge. Each trivia session offers fun facts, expert insights, and rewards just for you. Stay tuned for monthly updates, challenge your friends, and join the SRCA community to Play. Learn. Win. Let the game begin! 
</p>
                     <div class="impact-facts-wrap w-100">
                        <div class="row mrg30">
                           <div class="col-md-6 col-sm-6 col-lg-6">
                              <div class="impact-fact-box d-flex flex-wrap w-100">
                                 <i class="fas fa-horse-head  d-inline-block"></i>
                                 <div class="impact-fact-box-inner">
                                    <span class="thm-clr d-block"><span
                                       class="counter">148.2</span>K</span>
                                    <p class="mb-0">Chess Sessions</p>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6 col-lg-6">
                              <div class="impact-fact-box d-flex flex-wrap w-100">
                                 <i class="fas fa-users d-inline-block"></i>
                                 <div class="impact-fact-box-inner">
                                    <span class="thm-clr d-block"><span
                                       class="counter">3085</span>+</span>
                                    <p class="mb-0">Online Enrollment</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <p class="mb-0"> Crack the Chess Code: Solve Trivia, Score Discounts</p>
                        
                        <h4 class="mt-4" style="color: rgb(252, 215, 57);">Play Trivia, Win Discounts!</h4>
                        @if(Auth::check())
                        <a class="thm-btn thm-bg brd-rd5 d-inline-block position-relative overflow-hidden"
                           href="{{ route('front.chess_trivia') }}" title=""> Start Chess Trivia </a>
                        @else
                        <a class="thm-btn thm-bg brd-rd5 d-inline-block position-relative overflow-hidden"
                           href="{{ url('signin') }}?page=chess_trivia" title=""> Start Chess Trivia </a>
                        @endif
                       
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Video & Impact Wrap -->
   </div>
</section>
<section>
   <div class="w-100 pt-90 white-layer opc95 pb-100 position-relative">
      <div class="fixed-bg" style="background-image: url('{{ asset('frontend/assets/srcamain/images/transparent-chess-pieces-board (1).jpg') }}');"
         >
         <div style="background-color: rgb(248 242 242 / 80%); position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1,color:#fff"></div>
      </div>
      <div class="container">
         <div
            class="sec-title sec-title-with-btns d-flex flex-wrap align-items-center justify-content-between w-100">
            <div class="sec-title-inner">
               <!--<span class="position-relative thm-clr sub-shap v2 thm-shp d-block">Providing Since-->
               <!--    2020</span>-->
               <span class="position-relative thm-clr sub-shap v2 thm-shp d-block" style="color: black;">
                  <h4>Providing Since 2020</h4>
               </span>
               <h2 class="mb-0">Services We Provide</h2>
               <p class="mb-0">Everything Chess, All Under One Roof! At SRCA, we’re dedicated to building a thriving chess culture in Delhi. From expert coaching and tournament guidance to social media services through Chess Climb Media, parents' workshops, and much more—we provide anything and everything to nurture your chess journey!

               </p>
            </div>
            <div class="sec-title-btns d-inline-flex flex-wrap align-items-center">
               <!--<a class="simple-link thm-clr d-inline-block" href="#" title="">More Services<i-->
               <!--        class="fas fa-caret-right"></i></a>-->
               <!--<a class="simple-link thm-clr d-inline-block" href="#" title="" -->
               <!--     style="color: black; text-decoration: none; transition: color 0.3s ease;" -->
               <!--        onmouseover="this.style.color='rgb(252, 215, 57)'" -->
               <!--      onmouseout="this.style.color='black'">-->
               <!-- More Services<i class="fas fa-caret-right"></i>-->
               <!--</a>-->
               <a class="thm-btn v2 thm-bg brd-rd5 d-inline-block position-relative overflow-hidden"
                  href="https://srchessacademy.com/contact" title="">Enquire Now</a>
            </div>
         </div>
         <!-- Sec Title -->
         <div class="serv-wrap2 res-row position-relative w-100">
            <div class="row mrg30">
               <div class="col-md-6 col-sm-6 col-lg-4">
                  <div class="serv-box2 v2 position-relative w-100">
                     <div class="serv-img2 brd-rd10 position-relative overflow-hidden w-100">
                        <img style="width: 100%; height: 100%; object-fit: cover;"  src="{{asset('frontend/assets/srcamain/images/demo.jpg')}}"  alt="" />
                        <a class="position-absolute" href="#" title=""><i class="fas fa-plus"></i></a>
                     </div>
                     <div class="serv-info2 w-100 position-absolute">
                        <h3 class="mb-0"><a href="{{ route('front.coaching') }}" title=""> Coaching <br>Classes</a></h3>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-lg-4">
                  <div class="serv-box2 v2 position-relative w-100">
                     <div class="serv-img2 brd-rd10 position-relative overflow-hidden w-100">
                        <img  src="{{asset('frontend/assets/srcamain/images/game1.jpg')}}"  alt="" />
                        <a class="position-absolute" href="#" title=""><i class="fas fa-plus"></i></a>
                     </div>
                     <div class="serv-info2 w-100 position-absolute">
                        <h3 class="mb-0"><a href="{{ route('front.chess-consultation') }}" title="">Tournament Guidance & Planning</a></h3>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-lg-4">
                  <div class="serv-box2 v2 position-relative w-100">
                     <div class="serv-img2 brd-rd10 position-relative overflow-hidden w-100">
                        <img  src="{{asset('frontend/assets/srcamain/images/playing-chess1.jpg')}}"  alt="" />
                        <a class="position-absolute" href="#" title=""><i class="fas fa-plus"></i></a>
                     </div>
                     <div class="serv-info2 w-100 position-absolute">
                        <h3 class="mb-0"><a href="{{ route('front.workshops') }}" title="">Player & Parent Workshop</a></h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Services Wrap 2 -->
      </div>
   </div>
</section>
<section>
   <div class="w-100 position-relative ">
      <div class="special-wrap res-row overflow-hidden position-relative w-100">
         <div class="row mrg">
            <div class="col-12 col-md-6 col-lg-4">
               <div
                  class="special-box v3 text-center z1 scndry-bg grad-bg2 d-flex position-relative justify-content-center flex-column align-items-center w-100" >
                  <i class="fas fa-horse-head d-inline-block"></i>
                  <div class="special-box-inner">
                     <h4 class="mb-0">Inclusive Opportunities</h4>
                     <p class="mb-0">
                        10% discount for girls and special initiatives for underprivileged children.
                        <br><br><br>
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
               <div
                  class="special-box v3 text-center z1 scndry-bg grad-bg2 d-flex position-relative justify-content-center flex-column align-items-center w-100" >
                  <i class="fas fa-paste d-inline-block"></i>
                  <div class="special-box-inner">
                     <h4 class="mb-0">Comprehensive Chess Training</h4>
                     <p class="mb-0">
                        Batches designed for different skill levels, offering expert coaching, game analysis, 
                        and tournament preparation for rated events and championships.
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
               <div
                  class="special-box v3 text-center z1 scndry-bg grad-bg2 d-flex position-relative justify-content-center flex-column align-items-center w-100" >
                  <i class="fas fa-trophy d-inline-block"></i>
                  <div class="special-box-inner">
                     <h4 class="mb-0">Holistic Approach to Excellence</h4>
                     <p class="mb-0">
                      Fostering intellect, strategy, and a vibrant community to cultivate a thriving chess culture.

                        <br><br>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Specials Wrap -->
   </div>
</section>
<section>
   <div class="w-100 pt-80 white-layer opc8 pb-120 position-relative">
      <div class="container">
         <div class="about-wrap3 position-relative w-100">
            <div class="row mrg30">
               <div class="col-md-12 col-sm-12 col-lg-6 order-lg-1">
                  <div class="about-img position-relative w-100">
                     <img  src="{{asset('frontend/assets/srcamain/images/1.jpeg')}}"  alt="" />
                     <div class="social-links4 position-absolute">
                        <a style="font-size:2rem" href="https://www.instagram.com/shivikarohillaofficial?utm_source=qr&igsh=MWh3bmUxMTZpaGFzeg==" title="Instagram" target="_blank"><i
                           class="fab fa-instagram"></i></a>
                     </div>
                     <div class="about-info z1 scndry-bg position-absolute">
                        <i class="fas fa-horse-head  position-absolute"></i>
                        <h3 class="mb-0">
           WFM Shivika Rohilla
<span class="d-block thm-clr"></span>
                        <!--<span class="d-block">- Co- Founder </span>-->
                        <br/>
                        
                        <a class="thm-btn thm-bg brd-rd5 d-inline-block position-relative overflow-hidden"
                           href="https://docs.google.com/forms/d/e/1FAIpQLSe5fcFC-x55EoULoYVaz39GYwpcJ-IYfuPqZSr0uEb9qUJceg/viewform" title="">Start your Journey</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-lg-6">
                  <div class="about-desc v2 w-100">
                     <span class="thm-clr font-weight-extrabold d-inline-block border-0">We transform you into a skilled professional</span>
                     <h2 class="mb-0" style:"font-weight:400 !important"> <span>Welcome to Shivika Rohilla Chess Academy (SRCA) !</span>  </h2>
                     <!--<strong>Coaching Since 20 Years at vero eos et accusamus et iusto odio dignissimos-->
                     <!--    ducimus qui blanditiis.</strong>-->
                     <p class="mb-0">SRCA was founded with a vision to provide everything related to chess under one roof—from professional coaching and tournaments to corporate workshops and team-building events. Our goal is to nurture talent, inspire passion, and build a thriving chess community in Delhi. By combining expertise, innovation, and dedication, we aim to create a legacy of chess in Delhi, empowering players of all ages to achieve excellence on and off the board. 

</p>
<p>
    Join us to learn, grow, and become part of a movement that’s redefining chess culture in India!
</p>
                     <p class="mb-0"> <strong>Chess is more than a game; it's a journey of growth, strategy, and endless possibilities.</strong></p>
                      <h5 class="mt-2">
                       - WFM Shivika Rohilla </h5>
                  </div>
               </div>
            </div>
         </div>
         <!-- About Wrap 3 -->
      </div>
   </div>
</section>
<section>
   <div class="w-100 pt-120 blue-layer2 opc85 pb-130 position-relative">
      <div class="fixed-bg"  
         style="background-image: url('{{ asset('frontend/assets/srcamain/images/aa.jpg') }}');"
         ></div>
      <div class="container">
         <div class="sec-title2 v2 text-center w-100">
            <div class="sec-title2-inner d-inline-block" 
               style="color: #fff; background: rgba(0, 0, 0, 0.5); padding: 10px; border-radius: 5px;">
               <span class="thm-clr d-inline-block" style="color: #FFD700;">STEPS TOWARDS BECOMING A PROFESSIONAL</span>
               <h2 class="mb-0" style="color: #fff;">Chess Learning Level</h2>
               <p class="mb-0" style="color: #fff;">Start with the basics, advance through strategy and tactics, and refine endgame skills. Focus on tournament preparation and consistent practice to reach professional level.</p>
            </div>
         </div>
         <!-- Sec Title 2 -->-->
         <div class="procedure-wrap res-row text-center w-100">
            <div class="row mrg30 new-box">
               <div class="col-md-4 col-sm-4 col-lg-2">
                  <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100 new_design">
                     <span class="rounded-circle position-absolute">1</span>
                     <h4 class="mb-0"><a href="{{ route('front.coaching') }}" title="">Freshers</a></h4>
                     <p class="mb-0">Laying the groundwork for a bright future!</p>
                  </div>
               </div>
               <div class="col-md-4 col-sm-4 col-lg-2">
                  <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100 new_design">
                     <span class="rounded-circle position-absolute">2</span>
                     <h4 class="mb-0"><a href="{{ route('front.coaching') }}" title="">Beginners</a></h4>
                     <p class="mb-0">Building confidence with every step forward!</p>
                  </div>
               </div>
               <div class="col-md-4 col-sm-4 col-lg-2">
                  <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100 new_design">
                     <span class="rounded-circle position-absolute">3</span>
                     <h4 class="mb-0"><a href="{{ route('front.coaching') }}" title="">Advanced Beginners</a></h4>
                     <p class="mb-0">Refining skills and enhancing strategies!</p>
                  </div>
               </div>
               <div class="col-md-4 col-sm-4 col-lg-2">
                  <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100 new_design">
                     <span class="rounded-circle position-absolute">4</span>
                     <h4 class="mb-0"><a href="{{ route('front.coaching') }}" title="">Intermediate</a></h4>
                     <p class="mb-0">Honing expertise for consistent growth!</p>
                  </div>
               </div>
               <div class="col-md-4 col-sm-4 col-lg-2">
                  <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100 new_design">
                     <span class="rounded-circle position-absolute">5</span>
                     <h4 class="mb-0"><a href="{{ route('front.coaching') }}" title="">Advanced</a></h4>
                     <p class="mb-0">Pushing boundaries to achieve excellence!</p>
                  </div>
               </div>
            </div>
         </div>
         <!-- Procedure Wrap -->
      </div>
   </div>
</section>
<section>
   <div class="w-100 pt-100 white-layer opc95 pb-110 position-relative">
      <div class="fixed-bg" style="background-image: url('{{ asset('frontend/assets/srcamain/images/transparent-chess-pieces-board (1).jpg') }}');"
         >
         <div style="background-color: rgb(248 242 242 / 80%); position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1,color:#fff"></div>
      </div>
      <div class="container">
         <div class="sec-title2 v3 text-center w-100">
            <div class="sec-title2-inner d-inline-block">
               <span
                  class="thm-clr d-inline-block letter-spacing-initial text-transform-initial border-0">Empowering Minds Through Chess
</span>
               <h2 class="mb-0">Master the Game</h2>
               <p class="mb-0">Expert guidance, personalized training, and a vibrant chess community—all under one roof at SRCA</p>
            </div>
         </div>
         <!-- Sec Title 2 -->
         <div class="courses-wrap res-row position-relative w-100">
            <div class="row mrg30">
               <div class="col-md-6 col+-sm-6 col-lg-4">
                  <div class="course-box position-relative w-100">
                     <!--<span-->
                     <!--    class="price z2 brd-rd5 text-center scndry-bg position-absolute"><small>₹</small>2500</span>-->
                     <div class="course-img overflow-hidden position-relative w-100">
                        <a href="#" title="">
                        <img  class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/b2.jpeg')}}"  alt="" />
                        </a>
                     </div>
                     <div class="course-info bg-color6 position-relative w-100">
                      
                        <span class="d-block pt-3"><a href="{{ route('front.coaching') }}" title="">Chess Coaching</a></span>
                        <h3 class="mb-0"><a href="{{ route('front.coaching') }}" title=""> Master techniques with personalized training</a></h3>
                        <div class="rating d-block">
                           <span class="rate thm-clr d-inline-block"><i class="fas fa-star"></i><i
                              class="fas fa-star"></i><i class="fas fa-star"></i><i
                              class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></span>
                        </div>
                        <div
                           class="course-info-bottom scndry-clr bg-color13 d-inline-flex flex-wrap w-100">
                           <a href="{{ route('front.coaching') }}" class="thm-btn thm-bg d-inline-block position-relative overflow-hidden">Know more</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-lg-4">
                  <div class="course-box position-relative w-100">
                     <!--<span-->
                     <!--    class="price z2 brd-rd5 text-center scndry-bg position-absolute"><small>₹</small>2500</span>-->
                     <div class="course-img overflow-hidden position-relative w-100">
                        <a href="{{ route('front.chess-consultation') }}" title="">
                        <img  class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/b1.jpeg')}}"  alt="" />
                        </a>
                     </div>
                     <div class="course-info bg-color6 position-relative w-100">
                       
                        <span class="d-block pt-3"> <a href="{{ route('front.chess-consultation') }}" title="">Chess Consultation</a></span>
                        <h3 class="mb-0"><a href="{{ route('front.chess-consultation') }}" title="">Refine strategies and elevate your game. </a></h3>
                        <div class="rating d-block">
                           <span class="rate thm-clr d-inline-block"><i class="fas fa-star"></i><i
                              class="fas fa-star"></i><i class="fas fa-star"></i><i
                              class="fas fa-star"></i><i class="fas fa-star"></i></span>
                        </div>
                        <div
                           class="course-info-bottom scndry-clr bg-color13 d-inline-flex flex-wrap w-100">
                           <a href="{{ route('front.chess-consultation') }}" class="thm-btn thm-bg d-inline-block position-relative overflow-hidden">Know More</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-lg-4">
                  <div class="course-box position-relative w-100">
                     <!--<span-->
                     <!--    class="price z2 brd-rd5 text-center scndry-bg position-absolute"><small>₹</small>2500</span>-->
                     <div class="course-img overflow-hidden position-relative w-100">
                        <a href="{{ route('front.chess-coffee-connect') }}" title="">
                        <img  class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/b3.jpeg')}}"  alt="" />
                        </a>
                     </div>
                     <div class="course-info bg-color6 position-relative w-100">
                      
                        <span class="d-block pt-3"> <a href="{{ route('front.chess-coffee-connect') }}" title="">Chess Coffee Connect</a></span>
                        <h3 class="mb-0"><a href="{{ route('front.chess-coffee-connect') }}" title="">Learn, network, and enjoy chess over coffee.
                           </a>
                        </h3>
                        <div class="rating d-block">
                           <span class="rate thm-clr d-inline-block"><i class="fas fa-star"></i><i
                              class="fas fa-star"></i><i class="fas fa-star"></i><i
                              class="fas fa-star"></i><i class="fas fa-star"></i></span>
                        </div>
                        <div
                           class="course-info-bottom scndry-clr bg-color13 d-inline-flex flex-wrap w-100">
                           <a href="{{ route('front.chess-coffee-connect') }}" class="thm-btn thm-bg d-inline-block position-relative overflow-hidden">Know More</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Courses Wrap -->
         <div class="view-more mt-40 d-inline-block text-center w-100">
            <!--<p class="mb-0">Want to Explore our Services section.</p>-->
         </div>
         <!-- View More -->
      </div>
   </div>
</section>
<section>
<div class="w-100 gray-layer opc5 pb-110 position-relative">
   <div class="fixed-bg" style="background-image: url('{{ asset('frontend/assets/srcamain/images/transparent-chess-pieces-board (1).jpg') }}');"
      >
      <div style="background-color: rgb(248 242 242 / 80%); position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1,color:#fff"></div>
   </div>
   <div class="container">
      <div class="sec-title2 v3 text-center w-100">
         <div class="sec-title2-inner d-inline-block">
            <span
               class="thm-clr d-inline-block letter-spacing-initial text-transform-initial border-0 mt-5">Shaping Minds, Building Champions</span>
            <h2 class="mb-0 mt-4">Mastermind Collective: Your Winning Support Team</h2>
            <p class="mb-0">Masters of strategy, shaping champions witin you, One Move at a Time</p>
         </div>
      </div>
      <!-- Sec Title 2 -->
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
                            <span class="d-block thm-clr">Chess Advisor</span>
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
                            <img class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/1.jpeg')}}" alt="Team Image 4">
                        </div>
                        <div class="team-info z1 bg-color5 position-relative w-100">
                            <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">WFM Shivika Rohilla</a></h3>
                            <span class="d-block thm-clr">Co- Founder</span>
                        </div>
                    </div>
                    <div class="team-box text-center position-relative w-100">
                        <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/nanaki.jpg')}}" alt="Dr. Nanaki Jahnavi Chadha">
                        </div>
                        <div class="team-info z1 bg-color5 position-relative w-100">
                            <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">Dr. Nanaki Jahnavi Chadha</a></h3>
                            <span class="d-block thm-clr">Sports Psychologist</span>
                        </div>
                    </div>
                    
                    
                    <div class="team-box text-center position-relative w-100">
                        <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/yumna.jpg')}}" alt="Yumna Shamsi">
                        </div>
                        <div class="team-info z1 bg-color5 position-relative w-100">
                            <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">Yumna Shamsi</a></h3>
                            <span class="d-block thm-clr">Nutritionist</span>
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
                    <div class="team-box text-center position-relative w-100">
                        <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                            <img class="img-fluid w-100 ara"  src="{{asset('frontend/assets/srcamain/images/jaydeep-sharma.webp')}}" alt="IM Aradhya Garg">
                        </div>
                        <div class="team-info z1 bg-color5 position-relative w-100">
                            <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">Jaydeep Sharma</a></h3>
                            <span class="d-block thm-clr">FIDE Instructor</span>
                        </div>
                    </div>
                    
                    
                    
              
            </div>
        </div>
    </div>
</section>

      
      
      <section>
         <div class="sec-title2 v3 text-center w-100">
            <div class="sec-title2-inner d-inline-block">
               <h2 class="mb-0">Testimonials</h2>
            </div>
         </div>
         <!-- Sec Title 2 -->
         <div class="client-reviews-wrap res-row text-center w-100">
   <div class="items">
      <!-- Client Review 1 -->
      <div class="client-review-box rounded position-relative w-100">
         <div class="client-img position-absolute rounded-circle">
            <img class="img-fluid rounded-circle" src="https://blog.zapr.in/hubfs/Imported_Blog_Media/md-1.jpg" alt="Susan D'Souza - Client Review">
            <span class="quote-icon position-absolute rounded-circle">
               <i class="fas fa-quote-left thm-clr"></i>
            </span>
         </div>
         <h3 class="client-name mb-2">Manikant Das</h3>
         <p class="client-review mb-3">I love how SRCA keeps parents updated and involved. It is comforting to see my child grow in such a professional environment.</br></br></p>
         <span class="client-location d-block text-muted">Mumbai, India</span>
      </div>

      <!-- Client Review 2 -->
      <div class="client-review-box rounded position-relative w-100">
         <div class="client-img position-absolute rounded-circle">
            <img class="img-fluid rounded-circle" src="https://deft360.com/wp-content/uploads/2016/01/Pooja-1-e1622323927868-350x350.jpg" alt="Ronit Singh - Client Review">
            <span class="quote-icon position-absolute rounded-circle">
               <i class="fas fa-quote-left thm-clr"></i>
            </span>
         </div>
         <h3 class="client-name mb-2">Pooja Chouhan</h3>
         <p class="client-review mb-3">SRCA’s care and planning are amazing. My child’s confidence and chess skills have grown so much since joining the academy. </br></br></p>
         <span class="client-location d-block text-muted">India</span>
      </div>

      <!-- Client Review 3 -->
      <div class="client-review-box rounded position-relative w-100">
         <div class="client-img position-absolute rounded-circle">
            <img class="img-fluid rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVNJ_kKCThnq6TXdzkZQGy_OdsvnNtOdLgXMWb5j_bZ4aKwq-5oZmgDj217QQnqELL9vE&usqp=CAU" alt="Reem Sheikh - Client Review">
            <span class="quote-icon position-absolute rounded-circle">
               <i class="fas fa-quote-left thm-clr"></i>
            </span>
         </div>
         <h3 class="client-name mb-2">Reem Sheikh</h3>
         <p class="client-review mb-3">SRCA doesn’t just teach chess, they help with personal growth too. My child is now more focused, confident, and disciplined.</p>
         <span class="client-location d-block text-muted">India</span>
      </div>

      <!-- Client Review 4 -->
      <div class="client-review-box rounded position-relative w-100">
         <div class="client-img position-absolute rounded-circle">
            <img class="img-fluid rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcbzIAf3-kBGPAwbeVP4LRKG1WPwJQABhnMgQx-MYEYwAJgHWBsFUY9jZYdmKbZ9Ggh4g&usqp=CAU" alt="Nikhil Verma - Client Review">
            <span class="quote-icon position-absolute rounded-circle">
               <i class="fas fa-quote-left thm-clr"></i>
            </span>
         </div>
         <h3 class="client-name mb-2">Nikhil Verma</h3>
         <p class="client-review mb-3">The coaches at SRCA are truly exceptional. My child not only improved in chess but also gained valuable life skills. </br></br></p>
         <span class="client-location d-block text-muted">Delhi, India</span>
      </div>
      
      
   </div
 
   
</div>
         

         
   </div>
   
     <div style="    text-align: center;
        margin: auto;">
                                <a href="https://g.page/r/CVzhukntrrGWEBM/review"  target="_blank" class="thm-btn thm-bg d-inline-block position-relative overflow-hidden">Leave us a Review!</a>
                           </div>
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

