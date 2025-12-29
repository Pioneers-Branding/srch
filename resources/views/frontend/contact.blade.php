@extends('frontend.layouts.app')
@section('title') {{ 'Contact' }} @endsection
@section('content')

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
                    <img src="{{ asset('frontend/assets/srcamain/images/contact-desktop1.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>

                
                <section class="top-h top-h-mobile">
                      <img src="{{ asset('frontend/assets/srcamain/images/contact-mob.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>

 <!--<section class="top-h">-->
 <!--           <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">-->
 <!--               <div class="fixed-bg" style="background-image: url('{{ asset('frontend/assets/srcamain/images/xx.avif') }}');"></div>-->
 <!--               <div class="container">-->
 <!--                   <div class="page-title-wrap text-center w-100">-->
 <!--                       <div class="page-title-inner d-inline-block">-->
 <!--                           <h1 class="mb-0">Contact Us</h1>-->
 <!--                           <ol class="breadcrumb mb-0 justify-content-center">-->
 <!--                               <li class="breadcrumb-item"><a href="#" title="">Home</a></li>-->
 <!--                               <li class="breadcrumb-item active">Contact Us</li>-->
 <!--                           </ol>-->
 <!--                       </div>-->
 <!--                   </div><!-- Page Title Wrap -->
 <!--               </div>-->
 <!--           </div>-->
 <!--       </section>-->

            <section>
                <div class="w-100 pt-40  opc6 pb-30 position-relative">
                    <div class="fixed-bg back-blend-lighten " style="background-image: url(assets/images/parallax-bg7.html);"></div>
                    <div class="container">
                        <div class="sec-title3 text-center w-100">
                            <div class="sec-title3-inner d-inline-block">
                                <h3 class="mb-0">Contact Information</h3>
                                <!--<p>For any inquiries about our Privacy Policy or your personal data, please contact us at:-->
                                <!--enquiries.srca@gmail.com</p>-->
                            </div>
                        </div>
                        <div class="contact-info-wrap text-center position-relative w-100">
                            <div class="row mrg30">
                                <div class="col-md-4 col-sm-6 col-lg-4">
                                    <div class="contact-info-box position-relative w-100">
                                        <i class="fas fa-envelope-open brd-rd10 d-inline-block scndry-clr"></i>
                                        <span class="d-block"><a href="mailto: enquiries.srca@gmail.com " title=""> enquiries.srca@gmail.com </a></span>
                                        <!--<span class="d-block"><a href="mailto:admin@nauthemes.com" title="">admin@nauthemes.com</a></span>-->
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-lg-4">
                                    <div class="contact-info-box position-relative w-100">
                                        <i class="fas fa-home brd-rd10 d-inline-block scndry-clr"></i>
                                        <p class="mb-0"> B-7/93, Extn, Safdarjung Enclave. 
Lower ground floor. 
New Delhi - 110029</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-lg-4">
                                    <div class="contact-info-box position-relative w-100">
                                        <i class="fas fa-phone-alt brd-rd10 d-inline-block scndry-clr"></i>
                                        <span class="d-block">+91 7042854007</span>
                                        <!--<span class="d-block">+2 365 352 2523</span>-->
                                    </div>
                                </div>
                            </div>
                        </div><!-- Contact Info Wrap -->
                        
                </div>
            </section>
            <section>
                <div class="w-100 pb-100 opc7 position-relative">
                    <div class="fixed-bg"></div>
                    <div class="container">
                        <div class="row mt-4">
                            <div class="col-12">
                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                    
                                    @if(session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                    @endif
                            </div>
                        </div>
                        <div class="sec-title4 text-center w-100">
                            <div class="sec-title4-inner d-inline-block">
                                <h2 class="mb-0">Get In Touch:</h2>
                                <p class="mb-0">We'll reach out to you soon!</p>
                            </div>
                        </div>
                        <div class="contact-form d-flex flex-wrap justify-content-center text-center w-100">
                            <form class="w-100" method="POST" action="{{ route('front.contact.store') }}">
                                @csrf
                                <div class="response w-100"></div>
                                <div class="field-box w-100"><input class="brd-rd10 fname" type="text" name="fname" placeholder="Full Name" required></div>
                                 <div class="field-box w-100"><input class="brd-rd10 number" type="number" name="number" placeholder="Number" required></div>
                                <div class="field-box w-100"><input class="brd-rd10 email" type="email" name="email" placeholder="Email" required></div>
                                <div class="field-box w-100"><input class="brd-rd10 subject" type="tel" name="subject" placeholder="Subject" required></div>
                                <div class="field-box w-100"><textarea class="brd-rd10 contact_message" name="contact_message" placeholder="Comments" required></textarea></div>
                                <div class="btn-box w-100"><button class="thm-btn scndry-bg brd-rd10 position-relative overflow-hidden" type="submit" id="submit">Submit Now</button></div>
                            </form>
                            
                           
                            
                        </div>
                        
                        <!-- Contact Form -->
                    </div>
                </div>
            </section>

@endsection