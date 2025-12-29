@extends('frontend.layouts.app')
@section('title') {{ 'Coaches' }} @endsection
@section('content')

  <!--<section class="top-h">-->
  <!--          <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">-->
  <!--              <div class="fixed-bg" style="background-image: url('{{ asset('frontend/assets/srcamain/images/xx.avif') }}');"></div>-->
  <!--              <div class="container">-->
  <!--                  <div class="page-title-wrap text-center w-100">-->
  <!--                      <div class="page-title-inner d-inline-block">-->
  <!--                          <h1 class="mb-0">Coaches</h1>-->
  <!--                          <ol class="breadcrumb mb-0 justify-content-center">-->
  <!--                              <li class="breadcrumb-item"><a href="{{ route('front.index') }}" title="">Home</a></li>-->
  <!--                              <li class="breadcrumb-item active">coaches </li>-->
  <!--                          </ol>-->
  <!--                      </div>-->
  <!--                  </div><!-- Page Title Wrap -->
  <!--              </div>-->
  <!--          </div>-->
  <!--      </section>-->
  <!--      <section>-->
  
  <style>
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
    
                <section class="top-h top-h-desktop">
                    <img src="{{ asset('frontend/assets/srcamain/images/coaches-desk.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>

                
                <section class="top-h top-h-mobile">
                      <img src="{{ asset('frontend/assets/srcamain/images/coaches-mob.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>
                 <section>
                        <div class="w-100 pt-4 pb-110 position-relative">
                            <div class="container">
                                <div class="team-wrap position-relative w-100">
                                    <div class="row mrg30">

                                        <div class="col-md-4 col-sm-6 col-lg-3">
                                            <div class="team-box text-center position-relative w-100">
                                                <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                                                <img   class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/hemant_sharma.jpg')}}"  alt="Team Image 5" />
                                    
                                                    
                                                    <!--<div-->
                                                    <!--    class="social-links2 z1 align-items-center justify-content-center position-absolute">-->
                                                    <!--    <a class="brd-rd5 twitter-hvr" href="https://twitter.com/"-->
                                                    <!--        title="Twtiiter" target="_blank"><i-->
                                                    <!--            class="fab fa-twitter"></i></a>-->
                                                    <!--    <a class="brd-rd5 facebook-hvr" href="https://www.facebook.com/"-->
                                                    <!--        title="Facebook" target="_blank"><i-->
                                                    <!--            class="fab fa-facebook-f"></i></a>-->
                                                    <!--    <a class="brd-rd5 youtube-hvr" href="https://www.youtube.com/"-->
                                                    <!--        title="Youtube" target="_blank"><i-->
                                                    <!--            class="fab fa-youtube"></i></a>-->
                                                    <!--    <a class="brd-rd5 linkedin-hvr" href="https://www.linkedin.com/"-->
                                                    <!--        title="Linkedin" target="_blank"><i-->
                                                    <!--            class="fab fa-linkedin-in"></i></a>-->
                                                    <!--</div>-->
                                                </div>
                                                <div class="team-info z1 bg-color5 position-relative w-100">
                                                    <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">Hemant Sharma</a></h3>
                                                    <span class="d-block thm-clr">International Master (IM)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-lg-3">
                                            <div class="team-box text-center position-relative w-100">
                                                <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                                                <img   class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/tejas_bakre.jpg')}}"  alt="Team Image 5" />
                                    
                                                    
                                                    <!--<div-->
                                                    <!--    class="social-links2 z1 align-items-center justify-content-center position-absolute">-->
                                                    <!--    <a class="brd-rd5 twitter-hvr" href="https://twitter.com/"-->
                                                    <!--        title="Twtiiter" target="_blank"><i-->
                                                    <!--            class="fab fa-twitter"></i></a>-->
                                                    <!--    <a class="brd-rd5 facebook-hvr" href="https://www.facebook.com/"-->
                                                    <!--        title="Facebook" target="_blank"><i-->
                                                    <!--            class="fab fa-facebook-f"></i></a>-->
                                                    <!--    <a class="brd-rd5 youtube-hvr" href="https://www.youtube.com/"-->
                                                    <!--        title="Youtube" target="_blank"><i-->
                                                    <!--            class="fab fa-youtube"></i></a>-->
                                                    <!--    <a class="brd-rd5 linkedin-hvr" href="https://www.linkedin.com/"-->
                                                    <!--        title="Linkedin" target="_blank"><i-->
                                                    <!--            class="fab fa-linkedin-in"></i></a>-->
                                                    <!--</div>-->
                                                </div>
                                                <div class="team-info z1 bg-color5 position-relative w-100">
                                                    <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">Tejas Bakre

                                                    </a></h3>
                                                    <span class="d-block thm-clr">Grandmaster (GM)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-lg-3">
                                            <div class="team-box text-center position-relative w-100">
                                                <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                                                <img   class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/yogender_prakash.jpg')}}"  alt="Team Image 5" />
                                    
                                                
                                                    
                                                    <!--<div-->
                                                    <!--    class="social-links2 z1 align-items-center justify-content-center position-absolute">-->
                                                    <!--    <a class="brd-rd5 twitter-hvr" href="https://twitter.com/"-->
                                                    <!--        title="Twtiiter" target="_blank"><i-->
                                                    <!--            class="fab fa-twitter"></i></a>-->
                                                    <!--    <a class="brd-rd5 facebook-hvr" href="https://www.facebook.com/"-->
                                                    <!--        title="Facebook" target="_blank"><i-->
                                                    <!--            class="fab fa-facebook-f"></i></a>-->
                                                    <!--    <a class="brd-rd5 youtube-hvr" href="https://www.youtube.com/"-->
                                                    <!--        title="Youtube" target="_blank"><i-->
                                                    <!--            class="fab fa-youtube"></i></a>-->
                                                    <!--    <a class="brd-rd5 linkedin-hvr" href="https://www.linkedin.com/"-->
                                                    <!--        title="Linkedin" target="_blank"><i-->
                                                    <!--            class="fab fa-linkedin-in"></i></a>-->
                                                    <!--</div>-->
                                                </div>
                                                <div class="team-info z1 bg-color5 position-relative w-100">
                                                    <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">Yogender Prakash</a></h3>
                                                    <span class="d-block thm-clr">National Instructor</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-lg-3">
                                            <div class="team-box text-center position-relative w-100">
                                                <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                                                <img   class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/vishal_sareen.jpg')}}"  alt="Team Image 5" />
                                    
                                                    
                                                    <!--<div-->
                                                    <!--    class="social-links2 z1 align-items-center justify-content-center position-absolute">-->
                                                    <!--    <a class="brd-rd5 twitter-hvr" href="https://twitter.com/"-->
                                                    <!--        title="Twtiiter" target="_blank"><i-->
                                                    <!--            class="fab fa-twitter"></i></a>-->
                                                    <!--    <a class="brd-rd5 facebook-hvr" href="https://www.facebook.com/"-->
                                                    <!--        title="Facebook" target="_blank"><i-->
                                                    <!--            class="fab fa-facebook-f"></i></a>-->
                                                    <!--    <a class="brd-rd5 youtube-hvr" href="https://www.youtube.com/"-->
                                                    <!--        title="Youtube" target="_blank"><i-->
                                                    <!--            class="fab fa-youtube"></i></a>-->
                                                    <!--    <a class="brd-rd5 linkedin-hvr" href="https://www.linkedin.com/"-->
                                                    <!--        title="Linkedin" target="_blank"><i-->
                                                    <!--            class="fab fa-linkedin-in"></i></a>-->
                                                    <!--</div>-->
                                                </div>
                                                <div class="team-info z1 bg-color5 position-relative w-100">
                                                    <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">Vishal Sareen</a></h3>
                                                    <span class="d-block thm-clr">International Master (IM)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-lg-3">
                                            <div class="team-box text-center position-relative w-100">
                                                <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                                                     <img   class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/shivika-pic.webp')}}"  alt="Team Image 5" />
                                                </div>
                                                <div class="team-info z1 bg-color5 position-relative w-100">
                                                    <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">Shivika Rohilla</a></h3>
                                                    <span class="d-block thm-clr">Women Fide Master (WFM)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-lg-3">
                                            <div class="team-box text-center position-relative w-100">
                                                <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                                                     <img   class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/jaydeep-sharma.webp')}}"  alt="Team Image 5" />
                                                </div>
                                                <div class="team-info z1 bg-color5 position-relative w-100">
                                                    <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">Jaydeep Sharma</a></h3>
                                                    <span class="d-block thm-clr">FIDE Instructor</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-lg-3">
                                            <div class="team-box text-center position-relative w-100">
                                                <div class="team-img brd-rd5 overflow-hidden position-relative w-100">
                                                     <img   class="img-fluid w-100" src="{{asset('frontend/assets/srcamain/images/Nanki-chadha.webp')}}"  alt="Team Image 5" />
                                                </div>
                                                <div class="team-info z1 bg-color5 position-relative w-100">
                                                    <h3 class="mb-0"><a href="{{ route('front.coaches_details') }}" title="">Nanki Chadha</a></h3>
                                                    <span class="d-block thm-clr">Sports Psychologist</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>

@endsection


