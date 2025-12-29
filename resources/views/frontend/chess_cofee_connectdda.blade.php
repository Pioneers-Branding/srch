@extends('frontend.layouts.app')
@section('title') {{ 'Product list' }} @endsection
@section('content')
 
<section class="top-h">
   <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">
      <div class="fixed-bg" style="background-image: url('{{ asset('frontend/assets/srcamain/images/xx.avif') }}');"></div>
      <div class="container">
         <div class="page-title-wrap text-center w-100">
            <div class="page-title-inner d-inline-block">
               <h1 class="mb-0">Chess Coffee Connect </h1>
               <ol class="breadcrumb mb-0 justify-content-center">
                  <li class="breadcrumb-item"><a href="index.html" title="">Home</a></li>
                  <li class="breadcrumb-item active">Connect</li>
               </ol>
            </div>
         </div>
         <!-- Page Title Wrap -->
      </div>
   </div>
</section>
<div class="container">
   <div class="row">
      <div class="col-lg-12">
         <div class="coffee single-box">
            <p class="parag">Welcome to <b> Coffee Connect</b>— where we blend the strategic depth of chess with
               a friendly, community-focused environment! Join us every month for our exciting<b> Chess &
               Coffee Meet-ups</b> and become a part of Delhi’s growing chess culture. Whether you’re a
               seasoned player or a beginner, young or old, our community is open to everyone who loves the
               game and the camaraderie that comes with it. As an affiliate of <b>Shivika Rohilla Chess Academy
               (SRCA)</b>, we strive to create an environment where every game is fair, fun, and memorable.
            </p>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="proced-box neww-v neww-v3 z1 brd-rd5 thm-bg position-relative w-100">
            <span class="rounded-circle position-absolute">1</span>
            <h4 ><a href="#" title="">Our Mission – Checkmate Goals</a></h4>
            <ul>
               <li>At Chess Coffee Connect, we believe in making chess more than just a game; we aim to build a
                  community. By bringing people together over chess boards and coffee cups, we’re working to
                  establish a vibrant chess culture in Delhi—one where players of all ages and skill levels feel
                  welcome and inspired. Our meet-ups are open to all, from casual players to serious competitors,
                  and we encourage everyone to enjoy the game respectfully.
               </li>
            </ul>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="proced-box z1 neww-v neww-v3 brd-rd5 thm-bg position-relative w-100">
            <span class="rounded-circle position-absolute">2</span>
            <h4 ><a href="#" title="">Chess Coffee Connect Membership Fees</a></h4>
            <ul>
               <li>Join Chess Coffee Connect and become part of Delhi’s most exciting chess community! As a member,
                  you’ll enjoy monthly Chess & Coffee Meet-ups, exclusive perks, and a chance to be part of a
                  growing chess culture.
               </li>
            </ul>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="proced-box z1 neww-v neww-v2 brd-rd5 thm-bg position-relative w-100">
            <span class="rounded-circle position-absolute">3</span>
            <h4 ><a href="#" title="">Why Join Us?</a></h4>
            <ul>
               <li>Chess Coffee Connect is more than a club; it’s a movement to make chess a lively part of Delhi’s
                  culture. By attending our monthly meet-ups, you’ll be part of a community that values strategy,
                  learning, and the timeless thrill of chess—all while sipping on your favorite coffee.
               </li>
               <li>So, bring your board (or use one of ours), grab a cup of coffee, and let’s create checkmate
                  moments together! Follow us for updates on upcoming meet-ups, and join us in building Delhi’s
                  chess culture, one coffee at a time.
               </li>
            </ul>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="proced-box neww-v neww-v2 z1 brd-rd5 thm-bg position-relative w-100">
            <span class="rounded-circle position-absolute">4</span>
            <h4 ><a href="#" title="">What to Expect</a></h4>
            <ul>
               <li>Monthly Meet-Ups: Enjoy casual and competitive games, interactive sessions, and the
                  opportunity to learn from each other.
               </li>
               <li>All Ages Welcome: Our meet-ups are family-friendly and inclusive, encouraging players from
                  every age group and background to participate.
               </li>
               <li>Community Building: Connect with fellow chess lovers, share strategies, and celebrate the
                  joy of the game.
               </li>
               <li>Coffee & Conversations: Indulge in great coffee as you engage in friendly matches, puzzles,
                  and stimulating conversations.
               </li>
            </ul>
         </div>
      </div>
   </div>
   <!-- First section: Image on the left, content on the right -->
   <!--@foreach($services as $service)-->
   <!--<div class="row">-->
   <!--   <div class="col-lg-6 image-container">-->
   <!--      <img src="{{ $service->feature_image }}"-->
   <!--         alt="{{ $service->name }}">-->
   <!--   </div>-->
   <!--   <div class="col-lg-6 content-container">-->
   <!--      <h2>{{ $service->name }}</h2>-->
   <!--      <p>{{ $service->description }}</p>-->
   <!--      <h3 class="price">Price: {{ $service->default_price }}/-</h3>-->
   <!--      <a href="{{ route('front.checkout', ['id' => Crypt::encryptString($service->id)]) }}" class="checkout-btn">Checkout</a>-->
   <!--   </div>-->
   <!--</div>-->
   <!--@endforeach-->
   <div class="row">
      <div class="col-lg-6">
         <div class="proced-box z1 brd-rd5 neww-v thm-bg position-relative w-100">
            <span class="rounded-circle position-absolute">1</span>
            <h4 ><a href="#" title="">Why Become a Member?</a></h4>
            <ul>
               <li>Connect with a vibrant community of chess lovers and coffee enthusiasts</li>
               <li>Learn from regular interactions, strategy sessions, and workshops</li>
               <li>Compete in friendly games, tournaments, and exciting chess events</li>
               <li>Enjoy great coffee, great company, and exclusive membership perks.</li>
            </ul>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="proced-box z1 neww-v brd-rd5 thm-bg position-relative w-100">
            <span class="rounded-circle position-absolute">2</span>
            <h4 ><a href="#" title="">Tournament Rules</a></h4>
            <ul>
               <li><strong>Touch-Move Rule:</strong> For rated rapid tournaments, the touch-move rule
                  applies—if you touch a piece, you must move it (if legally possible).
               </li>
               <li><strong>Clock-Move Rule for Casual Blitz:</strong> During our casual blitz tournaments, we
                  adopt the clock-move rule to keep the atmosphere light and enjoyable.
               </li>
            </ul>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="proced-box z1 neww-v brd-rd5 thm-bg position-relative w-100">
            <span class="rounded-circle position-absolute">3</span>
            <h4><a href="#" title="">Dispute Resolution</a></h4>
            <ul>
               <li><strong>Resolve Disputes:</strong> We encourage players to first try resolving any disputes
                  or misunderstandings directly with each other.
               </li>
               <li><strong>Arbiter Assistance:</strong> If you’re unable to reach an agreement, simply pause
                  the clock and raise your hand.
               </li>
            </ul>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="proced-box neww-v z1 brd-rd5 thm-bg position-relative w-100">
            <span class="rounded-circle position-absolute">4</span>
            <h4 ><a href="#" title="">Etiquette & Sportsmanship</h4>
            <ul>
               <li><strong>Respect Your Opponent:</strong> Greet your opponent at the beginning and end of each
                  game.
               </li>
               <li><strong>Stay Focused, Stay Quiet:</strong> During gameplay, avoid discussing moves or
                  providing advice to others.
               </li>
               <li><strong>Keep It Clean:</strong> Handle chess pieces and clocks with care, and clean up any
                  coffee cups or belongings before leaving your table.
               </li>
            </ul>
         </div>
      </div>
      <div class="col-lg-12">
         <div class="coffee addition single-box">
            <h3>General Community Guidelines</h3>
            <ul>
               <li><strong>Be Punctual:</strong> Arrive on time for scheduled tournaments and events. Late
                  arrivals may forfeit their match.
               </li>
               <li><strong>No Phones on the Table:</strong> To ensure focus and fairness, please keep phones
                  silent and off the playing table.
               </li>
               <li><strong>Enjoy and Encourage:</strong> Chess Coffee Connect is a community-driven space.
                  Encourage new players, share insights, and enjoy the friendly competition!
               </li>
            </ul>
            <p>Thank you for upholding these guidelines and helping us create a positive, supportive chess
               culture in Delhi. Whether you’re here to compete or simply enjoy a game over coffee, we’re
               thrilled to have you as part of our community.
            </p>
         </div>
      </div>
      <div class="col-lg-12">
         <div class="coffee addition single-box">
            <h3>Chess Supplies at Chess Coffee Connect</h3>
            <p>Please bring your own chess sets and clocks to our meet-ups. However, if you're new to chess or
               need additional equipment, no problem! Chess supplies are available for purchase through our
               partner, Shivika Rohilla Chess Academy (SRCA).
            </p>
            <p>For more information or to purchase supplies, please contact Yogender Prakash at SRCA.</p>
            <p>Whether you're a seasoned player or just starting, we’ve got everything you need to fully enjoy
               your chess experience at Chess Coffee Connect!
            </p>
         </div>
      </div>
   </div>
</div>
@endsection