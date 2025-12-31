@extends('frontend.layouts.app')
@section('title', 'Chess Coffee Connect')
@section('keywords', 'Chess Coffee Connect')
@section('description', 'Join Chess Coffee Connect, a fun social chess meetup event in Delhi. Network with players, enjoy games & coffee in community-driven gatherings.')

@section('content')
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
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
            padding: 20px;

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
            margin-bottom: 7px;
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
            margin-top: 4%;
            margin-bottom: 1%;
        }
        .content-container h3.price {
            font-size: 24px;
            color: #fcd739; /* You can adjust the color as needed */
            margin-bottom: 20px;
            font-weight: 800;
     }
     
 

.checkout-btn {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.checkout-btn:hover {
    background-color: #0056b3;
}
 .top-h-mobile{
        display:none 
     }
@media (max-width: 767.98px) {
    .image-container {
        order: -1 !important; /* force image to be first */
    }
      .top-h-mobile{
        display:block !important; 
     }
     .top-h-desktop{
              display:none  !important;   
     }
    .too .row {
    display: contents !important;
}
     .too .col-lg-6 {
      max-width: 100% !important;
}
    
}


    </style>
    
    
     <style>
       
        .membership-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .membership-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        .membership-header {
            background: #FCD333;
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .membership-header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 20px solid transparent;
            border-right: 20px solid transparent;
            border-top: 20px solid var(--accent-color);
        }

        .price {
            font-size: 3rem;
            font-weight: bold;
            margin: 10px 0;
        }

        .benefit-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: flex-start;
        }

        .benefit-item:last-child {
            border-bottom: none;
        }

        .benefit-icon {
            color: var(--accent-color);
            margin-right: 15px;
            margin-top: 2px;
            font-size: 1.2rem;
        }

        .section-header {
            text-align: center;
            position: relative;
        }

        .section-header h2 {
            color: var(--primary-color);
            font-weight: bold;
            margin-bottom: 15px;
        }

        .section-header::after {
            content: '';
            width: 80px;
            height: 4px;
            background: var(--accent-color);
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .why-member-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .why-member-card:hover {
            transform: translateY(-10px);
        }

        .why-member-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--accent-color), #f39c12);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 2rem;
        }

        .rules-section {
            background: var(--light-bg);
            padding: 35px 0;
        }

        .rule-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
            border-left: 5px solid var(--accent-color);
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .rule-title {
            color: var(--primary-color);
            font-weight: bold;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .rule-icon {
            margin-right: 10px;
            color: var(--accent-color);
        }

        .check-in-btn {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            border: none;
            color: white;
            padding: 15px 40px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .check-in-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(39, 174, 96, 0.3);
            background: linear-gradient(135deg, #229954, #27ae60);
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-chess {
            position: absolute;
            opacity: 0.03;
            animation: float 20s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(100vh) rotate(0deg); }
            100% { transform: translateY(-100px) rotate(360deg); }
        }

        .coffee-cup {
            color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 50px 0;
            }
            
            .price {
                font-size: 2.5rem;
            }
            
            .membership-card {
                transform: translateY(-20px);
            }
            
            .membership-card:hover {
                transform: translateY(-25px);
            }
        }
    </style>
        
                
                
                 <section class="top-h top-h-desktop">
    <img 
        src="{{ asset('frontend/assets/srcamain/images/ccc-desk.webp') }}" 
        alt="" 
        style="width: 100%; height: auto; display: block;"
    >
</section>

                
                  <section class="top-h top-h-mobile">
                      <img 
        src="{{ asset('frontend/assets/srcamain/images/ccc-mob.webp') }}" 
        alt="" 
        style="width: 100%; height: auto; display: block;"
    >
                   
                </section>
                
                
                @if($subcategories->isEmpty())
                    
              <div class="container too">
                @foreach($services as $service)
                 <div style="background:#f3f3f3;border-radius:10px;margin-bottom:20px">
                      <div class="row align-items-center flex-wrap-reverse" >
                        <!-- Image First (even on desktop) -->
                        <div class="col-12 col-lg-6 image-containermb-lg-0 text-center">
                            <img src="{{ $service->feature_image }}" alt="{{ $service->name }}" class="img-fluid w-100  mb-3 ">
                        </div>
                
                        <!-- Text Second -->
                        <div class="col-12 col-lg-6 content-container" >
                            <h2>{{ $service->name }}</h2>
                            <p>{!! $service->description !!}</p> <!-- safe HTML -->
                            <h3 class="price">Price: {{ $service->default_price }}/-</h3>
                            
                            
                            @if($service->isEventPassed())
                                <button class="checkout-btn" style="background-color: #d1d1d1; color: #7a7a7a; cursor: not-allowed; border: 1px solid #bfbfbf;" disabled>Event Passed</button>
                            @else
                                <a href="{{ route('front.checkout', ['id' => Crypt::encryptString($service->id)]) }}" class="checkout-btn">Checkout</a>
                            @endif
                         
                           
                        </div>
                    </div>
                 </div>
                @endforeach
            </div>

                @endif
                 @if($subcategories->isNotEmpty())
                
                    <div class="w-100 pt-90 white-layer opc95 pb-100 position-relative">
                        <div class="fixed-bg" style="background-image: url(assets/images/parallax-bg2.jpg);"></div>
                        <div class="container">
                            <div class="sec-title sec-title-with-btns d-flex flex-wrap align-items-center justify-content-between w-100">
                                <div class="sec-title-inner">
                                <span class="position-relative thm-clr sub-shap v2 thm-shp d-block">Providing Since
                                2008</span>
                                <h2 class="mb-0">workshops We Provide</h2>
                                <p class="mb-0">Adipisicing elit sed dole there eiusmod tempor incididub labore dolore magna
                                    aliqua denim ads minim veniam quis nostrud.
                                </p>
                                </div>
                                <div class="sec-title-btns d-inline-flex flex-wrap align-items-center">
                                <a class="simple-link thm-clr d-inline-block" href="#" title="">More Services<i class="fas fa-caret-right"></i></a>
                                <a class="thm-btn v2 thm-bg brd-rd5 d-inline-block position-relative overflow-hidden" href="#" title="">Join Training</a>
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
                
                
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p>Welcome to Chess Coffee Connect— where we blend the strategic depth of chess with a friendly, community-focused environment! Join us every month for our exciting Chess & Coffee Meet-ups and become a part of Delhi’s growing chess culture. Whether you’re a seasoned player or a beginner, young or old, our community is open to everyone who loves the game and the camaraderie that comes with it. As an affiliate of Shivika Rohilla Chess Academy (SRCA), we strive to create an environment where every game is fair, fun, and memorable.</p>
                            <h3>Our Mission – Checkmate Goals</h3>
                            <p>At Chess Coffee Connect, we believe in making chess more than just a game; we aim to build a community. By bringing people together over chess boards and coffee cups, we’re working to establish a vibrant chess culture in Delhi—one where players of all ages and skill levels feel welcome and inspired. Our meet-ups are open to all, from casual players to serious competitors, and we encourage everyone to enjoy the game respectfully. </p>

                        </div>
                    </div>
                </div>
            </section> 
            
            	
		          <style>
                .proced-box:hover h3{
                    color:white;
                }
            </style>
            
            <section class="bg-light">
                <div class="w-100 pt-4 mb-5 opc5 position-relative">
                    <div class="container">
                        <div class="row mrg30">
                            <div class="col-md-6">
                                <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100">
                                    <h3 class="mb-0"><a >What to Expect </a></h3>
                                        <p><b>Monthly Meet-Ups</b>: Enjoy casual and competitive games, interactive sessions, and the opportunity to learn from each other.</p>
                                        <p><b>All Ages Welcome</b>: Our meet-ups are family-friendly and inclusive, encouraging players from every age group and background to participate.</p>
                                        <p><b>Community Building</b>: Connect with fellow chess lovers, share strategies, and celebrate the joy of the game.</p>
                                        <p><b>Coffee & Conversations</b>: Indulge in great coffee as you engage in friendly matches, puzzles, and stimulating conversations.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100">
                                    <h3 class="mb-0"><a>Why Join Us?</a></h3>
                                        <p class="mb-0">Chess Coffee Connect is more than a club; it’s a movement to make chess a lively part of Delhi’s culture. By attending our monthly meet-ups, you’ll be part of a community that values strategy, learning, and the timeless thrill of chess—all while sipping on your favorite coffee.
                                        <br>So, bring your board (or use one of ours), grab a cup of coffee, and let’s create checkmate moments together! Follow us for updates on upcoming meet-ups, and join us in building Delhi’s chess culture, one coffee at a time.
                                        </p><br><br><br><br>
                                </div>
                            </div>                            
                        </div>
                        
                    </div>
                </div>
            </section>	
		
			

    <!-- Why Become a Member Section -->
    <section class="py-5" style="background:#FCD334"> 
        <div class="container">
            <div class="section-header">
                <h2>Why Become a Member?</h2>
                <p class="text-muted">Join our vibrant community and unlock exclusive benefits</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="why-member-card text-center">
                       
                        <h4>Connect</h4>
                        <p>With a vibrant community of chess lovers and coffee enthusiasts</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="why-member-card text-center">
                       
                        <h4>Learn</h4>
                        <p>From regular interactions, strategy sessions, and workshops</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="why-member-card text-center">
                        
                        <h4>Compete</h4>
                        <p>In friendly games, tournaments, and exciting chess events</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="why-member-card text-center">
                        
                        <h4>Enjoy</h4>
                        <p>Great coffee, great company, and exclusive membership perks</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Rules Section -->
    <section class="rules-section">
        <div class="container">
            <div class="section-header">
                <h2>Tournament Rules & Guidelines</h2>
                <p class="text-muted">Fair play and sportsmanship are at the heart of our community</p>
            </div>
            <div class="row mrg30">

    <!-- Volunteer Squad -->
    <div class="col-md-6">
        <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100">
            <h3 class="mb-0"><a>Volunteer Squad</a></h3>

            <p><b>Networking Goldmine</b>: Meet GMs, IMs, influencers, café owners, startup founders, and corporate executives. Chess Coffee Connect is essentially a living LinkedIn — powered by chess and coffee.</p>

            <p><b>Skill Building</b>: Gain hands-on experience in event management, digital marketing, and community building — real-world skills that add strong value to your résumé.</p>

            <p><b>Gen Z Cred</b>: Be part of India’s first café chess culture. Think of it as “Beer Pong culture,” reimagined for Chess & Coffee. You are building the trend, not following it.</p>

            <p><b>Exclusive Perks</b>: Enjoy free passes to CCC events, coffee vouchers, official CCC merchandise drops, and priority access to premium chess nights.</p>

            <p><b>Growth Path</b>: Progress from Volunteer ➝ Community Lead ➝ Paid Event Manager. We grow with our people.</p>

            <p><b>Impact Factor</b>: This is more than volunteer hours — you are shaping a culture where intellect meets lifestyle.</p><br>
             <a class="thm-btn  brd-rd5 d-inline-block pad-btn position-relative overflow-hidden"  href="https://forms.gle/g2fPkUmf8foQ7tHz9" title="" style="background:#ffb000 !important">Register Here</a>
            
        </div>
    </div>

    <!-- VIP Tribe Pass -->
    <div class="col-md-6">
        <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100">
            <h3 class="mb-0"><a>VIP Tribe Pass</a></h3>

            <p><b>Love playing chess and want to save more?</b> Don’t miss the Tribe Edition.</p>

            <p>Chess Coffee Connect is now live across <b>10+ locations in Delhi NCR</b> — where chess meets cafés, conversations, and a growing community.</p>

            <p><b>Choose Your Vibe</b>:</p>
            <p>
                <b>Hustler Pass</b> → ₹555 | 5 Events | 1-Month Access<br>
                <b>Grandmaster Move</b> → ₹999 | Unlimited Café Events | 2-Month Access
            </p>
 
            <p><b>Perks You’ll Love</b>:</p><br>
            <p>
                👉 ₹100 food voucher (where applicable)<br>
                👉 Buddy Pass — bring a friend at 50% off<br>
                👉 50% OFF Mega Rapid Events
            </p><br>
            
            <a class="thm-btn  brd-rd5 d-inline-block pad-btn position-relative overflow-hidden mt-3"  href="https://forms.gle/f3dgRTUs1tJrjxsc8" title="" style="background:#ffb000 !important">Register Here</a>

            <br><br><br><br>
        </div>
    </div>

    <div class="col-md-6">
        <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100">
            <h3 class="mb-0"><a>Etiquette & Sportsmanship</a></h3>          

            <p><b>Respect Your Opponent</b> : Greet your opponent at the begining and end of each gam. Chess coffee connect is build on mutual respect and camaraderie.</p>
            <p><b>Stay Focused, Stay Quiet</b> : Avoid discussing moves or giving advice during gameplay.</p>
            <p><b>Keep It Clean</b> : Handle chess pieces and clocks with care, and clean up coffee cups or belongings before leaving.</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100">
            <h3 class="mb-0"><a>General Community Guidelines</a></h3>
            <p><b>Be Punctual</b> : Arrive on time for scheduled tournaments and events. Late arrivals may forfeit their match.</p>
            <p><b>No Phones on the Table</b> : Keep phones silent and off the playing table to maintain fairness and focus.</p>
            <p><b>Enjoy and Encourage</b> : Support new players, share insights, and embrace friendly competition.</p>    
       <br><br><br> </div>
    </div>

    <div class="col-md-6">
        <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100">
            <h3 class="mb-0"><a>Tournament Rules</a></h3>

            <p>For our structured tournaments, we adhere to the official laws of chess set by the International Chess Federation (FIDE). Here are some important guidelines eo keep in mind.</p>

            <p><b>Touch-Move Rule</b> : In rated rapid tournaments, if you touch a piece, you must move it (if legally possible).</p>
            <p><b>Clock-Move Rule for Casual Blitz</b> : In casual blitz tournaments, the clock-move rule is followed to keep games light, fair, and enjoyable.</p>

          
        </div>
    </div>

    <div class="col-md-6">
        <div class="proced-box z1 brd-rd5 thm-bg position-relative w-100">
            <h3 class="mb-0"><a>Dispute Resolution</a></h3>

            <p>Fair play and mutual respect are at the heart of Chess Coffee Connect. In case of disagreements, please follow the steps below to resolve them smoothly.</p>

            <p><b>How to Handle Disputes</b>:</p>

            <p><b>Resolve Disputes Directly</b> : Players are encouraged to first resolve misunderstandings calmly with each other.</p>
            <p><b>Arbiter Assistance</b> : If an agreement cannot be reached, pause the clock and raise your hand for assistance.</p>
     
        
        </div>
    </div>





</div>

        </div>
    </section>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Thank you for upholding these guidelines and helping us create a positive, supportive chess culture in Delhi. Whether you’re here to compete or simply enjoy a game over coffee, we’re thrilled to have you as part of our community.</p>
                    <h3></h3>
                    </div>
            </div>
        </div>
    </section>


    <script>
        // Add smooth scrolling and interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Animate cards on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all cards
            document.querySelectorAll('.why-member-card, .rule-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });

            // Check-in button interaction
            document.querySelector('.check-in-btn').addEventListener('click', function() {
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-check me-2"></i>Success!';
                    this.style.background = 'linear-gradient(135deg, #27ae60, #2ecc71)';
                }, 2000);
            });
        });
    </script>   
                
                
                
            
@endsection


