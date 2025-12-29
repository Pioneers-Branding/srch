@extends('frontend.layouts.app')
@section('title') {{ 'faq' }} @endsection
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
                    <img src="{{ asset('frontend/assets/srcamain/images/faq-desktop.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>

                
                <section class="top-h top-h-mobile">
                      <img src="{{ asset('frontend/assets/srcamain/images/faq-mobile.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>

<!--<section class="top-h">-->
<!--                <div class="w-100 pt-100 mt-20 black-layer opc5 pb-80 position-relative">-->
<!--                    <div class="fixed-bg" style="background-image: url('{{ asset('frontend/assets/srcamain/images/xx.avif') }}');"></div>-->
<!--                    <div class="container">-->
<!--                        <div class="page-title-wrap text-center w-100">-->
<!--                            <div class="page-title-inner d-inline-block">-->
<!--                                <h1 class="mb-0">FAQs</h1>-->
<!--                                <ol class="breadcrumb mb-0 justify-content-center">-->
<!--                                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}" title="">Home</a></li>-->
<!--                                   <li class="breadcrumb-item active">FAQs</li>-->
<!--                                </ol>-->
<!--                            </div>-->
<!--                        </div><!-- Page Title Wrap -->
<!--                    </div>-->
<!--                </div>-->
<!--            </section>-->
        
       <section class="faq-section" style="margin-top:25px">
    <h1>Frequently Asked Questions</h1>
    <div class="faq-container">
  <div class="faq-item">
    <h3 class="faq-question">What are the benefits of joining the chess academy? <span class="plus-icon">+</span></h3>
    <p class="faq-answer">By joining our chess academy, you'll receive personalized training from experienced coaches and gain access to exclusive tournaments.</p>
  </div>
  <div class="faq-item">
    <h3 class="faq-question">What skill level do I need to join the academy? <span class="plus-icon">+</span></h3>
    <p class="faq-answer">Our academy is open to all skill levels, from beginners to advanced players. We have tailored programs for everyone.</p>
  </div>
  <div class="faq-item">
    <h3 class="faq-question">How long does it take to improve at chess? <span class="plus-icon">+</span></h3>
    <p class="faq-answer">Improvement varies depending on dedication and practice, but with regular coaching, most students see significant progress in a few months.</p>
  </div>
  <div class="faq-item">
    <h3 class="faq-question">Do you offer online chess lessons? <span class="plus-icon">+</span></h3>
    <p class="faq-answer">Yes, we offer both in-person and online chess lessons to accommodate different schedules and locations.</p>
  </div>
  <div class="faq-item">
    <h3 class="faq-question">Can I participate in tournaments through the academy? <span class="plus-icon">+</span></h3>
    <p class="faq-answer">Absolutely! We organize regular tournaments for our students and help them participate in national and international competitions.</p>
  </div>
  <div class="faq-item">
    <h3 class="faq-question">What equipment do I need for online lessons? <span class="plus-icon">+</span></h3>
    <p class="faq-answer">For online lessons, you'll need a stable internet connection, a computer or tablet, and a chess board for practice.</p>
  </div>
  <div class="faq-item">
    <h3 class="faq-question">How often are chess classes held? <span class="plus-icon">+</span></h3>
    <p class="faq-answer">Classes are typically held once or twice a week, depending on the program you're enrolled in.</p>
  </div>
  <div class="faq-item">
    <h3 class="faq-question">What age groups do you cater to? <span class="plus-icon">+</span></h3>
    <p class="faq-answer">We offer programs for children, teenagers, and adults. Our youngest students start from 5 years old.</p>
  </div>
  <div class="faq-item">
    <h3 class="faq-question">Can I get a trial lesson before enrolling? <span class="plus-icon">+</span></h3>
    <p class="faq-answer">Yes, we offer trial lessons so you can experience our teaching methods before making a commitment.</p>
  </div>
  <div class="faq-item">
    <h3 class="faq-question">How do I sign up for the academy? <span class="plus-icon">+</span></h3>
    <p class="faq-answer">You can sign up by visiting our website and filling out the registration form or by contacting us directly.</p>
  </div>
  
  <div class="faq-item">
  <h3 class="faq-question">What is Chess Coffee Connect (CCC)? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Chess Coffee Connect is a vibrant offline chess community where chess meets cafés, conversations, and community vibes. Think casual games, competitive rapid events, coffee-fuelled checkmates, and real connections — not just online ratings.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">Who can join Chess Coffee Connect? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Everyone! Absolute beginners, casual players, club players, rated pros, parents, students — if you love chess (or want to), you’re welcome.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">Do I need to be a rated chess player? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">No ratings required. CCC is beginner-friendly and pro-respected. You play at your comfort level.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">What happens at a Chess Coffee Connect meet-up? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Offline chess games, rapid tournaments, casual play, analysis chats, coffee breaks, networking, fun challenges, prizes, and lots of chess energy.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">Is this a tournament or a casual event? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Both. Some events are relaxed social meet-ups, others are structured rapid/blitz tournaments. Each event clearly mentions the format.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">What formats do you usually play? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Rapid & Blitz formats like 15+5, 10+0, 5+3 — fast, exciting, and perfect for café chess.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">Do you provide chess boards and clocks? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Yes. Chess sets and clocks are provided. You’re also welcome to bring your own.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">Where do Chess Coffee Connect events happen? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Across cafés and community spaces in Delhi NCR and beyond. Locations are announced in advance for each event.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">Is Chess Coffee Connect kid-friendly? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Yes. Many events are family-friendly, and juniors often play alongside adults in a safe, encouraging environment.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">What is the CCC Tribe Pass? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">The Tribe Pass is a value-packed pass that helps regular players save on multiple events, tournaments, and special community experiences.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">Are there prizes? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Yes. Depending on the event — cash prizes, trophies, certificates, goodies, free entries, and surprise rewards.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">Can beginners really compete? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Absolutely. We often have separate categories, friendly pairings, and beginner-focused formats so everyone enjoys.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">How is CCC different from a regular chess academy? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">CCC is about community first — social chess, real conversations, café culture, and pressure-free learning, alongside competitive play.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">Is this connected to SR Chess Academy (SRCA)? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Yes. Chess Coffee Connect is powered by SR Chess Academy, bringing structured chess values into a relaxed, modern community format.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">How do I register for events? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Registration links are shared on the website, WhatsApp communities, and social media. Some events allow on-spot entries (subject to availability).</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">How do I stay updated? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Join our WhatsApp communities, follow us on Instagram, and keep an eye on the SRCA website for updates.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">Can I collaborate, volunteer, or host an event? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Yes. We love collaborations — cafés, schools, corporates, creators, and chess lovers. DM us or reach out via the website.</p>
</div>

<div class="faq-item">
  <h3 class="faq-question">Why should I join Chess Coffee Connect? <span class="plus-icon">+</span></h3>
  <p class="faq-answer">Because chess is better offline, over coffee, with real people — fresh vibes, strong moves, and a growing chess tribe.</p>
</div>

  <!-- Add more FAQ items as needed -->
</div>

  </section>



@endsection


