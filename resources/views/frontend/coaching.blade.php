@extends('frontend.layouts.app')
@section('title', 'Chess Coaching Courses in Delhi | Beginner to Advanced – SR Chess Academy')
@section('keywords', 'chess coaching courses, chess coaching courses in Delhi')
@section('description', 'Join structured chess coaching courses in Delhi for beginners, intermediate & advanced players. Learn from expert coaches with proven training methods.')

<style>
   .card {
   border-radius: 10px;
   box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
   padding: 20px;
   margin: 10px;
   }
   .star-rating {
   color: #f0c419;
   font-size: 1.5rem;
   }
   .register-btn {
   background-color: #ffb300;
   color: #fff;
   border-radius: 20px;
   padding: 10px 20px;
   text-align: center;
   text-decoration: none;
   display: inline-block;
   width: 100%;
   margin-top:5%;
   margin-bottom:7%;
   }
   .too{
      max-width:90% !important;
   }
   .zigzag {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 30px;
}

.zigzag:nth-child(odd) {
    flex-direction: row; /* Default: Image on the left, content on the right */
}

.zigzag:nth-child(even) {
    flex-direction: row-reverse; /* Reverse: Image on the right, content on the left */
}

.image-container img {
    width: 100%;
    height: auto;
    border-radius: 5px;
}

.content-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

</style>
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
            color: #000;
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
            .too {
    max-width: 100% !important;
}

.top-h-mobile{
        display:block !important; 
     }
     .top-h-desktop{
              display:none  !important;   
     }
        }
    </style>
@section('content')


   <section class="top-h top-h-desktop">
    <img 
        src="{{ asset('frontend/assets/srcamain/images/unnamed (2).jpg') }}" 
        alt="" 
        style="width: 100%; height: auto; display: block;"
    >
</section>

                
                  <section class="top-h top-h-mobile">
                      <img 
        src="{{ asset('frontend/assets/srcamain/images/IMG_1089.PNG') }}" 
        alt="" 
        style="width: 100%; height: auto; display: block;"
    >
                   
                </section>

<div class="container mt-5 d-none">
      <div class="row">
               <div class="col-md-4">
                  <div class="card">
              
                     <h3>FRESHERS</h3>
                     <p>
                        Introduce the basics of chess, focusing on board setup, piece movements, and the fundamentals of gameplay. Every grandmaster was once a beginner.
                        Your journey starts with the first move—embrace it!
                     </p>
                     <strong>Chess Board and Pieces:</strong> 
                     <ul>
                        <li>Introduction to the chessboard layout (files, ranks, and diagonals) </li>
                        <li>Names and movements of each piece: pawn, rook, knight, bishop, queen, and king</li>
                        <li>Intrduction of Chess Board (Files & Ranks)</li>
                        <li>Value of Pieces, Chess Notation</li>
                     </ul>
                     <br>
                     <strong>Basic Rules of Chess:</strong>
                     <ul>
                        <li>Piece values and understanding captures</li>
                        <li>Legal moves, castling, en passant, and pawn promotion </li>
                        <li> Understanding check, checkmate, and stalemate</li>
                     </ul>
                     <br><strong>Game Basics:</strong>
                     <ul>
                        <li>Setting up the board</li>
                        <li>Basics of turns and move selection  </li>
                        <li> Playing practice games to apply basic rules </li>
                        <li> Capture, Attack & Defense </li>
                     </ul>
                     <br><strong>Puzzles:</strong>
                     <ul>
                        <li>Mate in 1 Move.</li>
                     </ul>
                     <br><strong>Endgame Basics:</strong> 
                     <ul>
                        <li>Basic kingpawn Ending</li>
                        <li> Checkmate with 2 Rooks</li>
                     </ul>
                     
                     <div class="mt-3">
                         <br>
  <h5>Weekend Freshers Batch</h5>
  <p>
    <span class="about-time d-block mt-3">
      <span class="thm-clr"><i class="far fa-clock"></i> <b>Class Schedule:</b></span><br>
      Saturday & Sunday - 11:30 am to 1:00 pm
    </span>
  </p>
  <ul>
    <li>Trainer: Yogender Prakash</li>
    <li>Fees: ₹4000</li>
    <li>Batch Size: 6 - 8</li>
  </ul>
</div>
                     @if(Auth::check())
                     <a href="{{ route('front.checkout_coching', ['title' =>'ADVANCED', 'price' =>'4000']) }}" class="register-btn">Pay Now</a>
                  
                                        @else
                                        <a href="{{ url('signin') }}" class="register-btn">Pay Now</a>
                  
                                        @endif
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                
                     <h3>BEGINNERS</h3>
                     <p>Build on foundational skills with basic tactics and an introduction to strategic principles. Chess is not just a game of pieces, but of possibilities.
                        Every move you make reveals a new path.
                     </p>
                     <strong>Opening Principles:</strong>
                     <ul>
                        <li>Control of the center</li>
                        <li>Developing pieces effectively  </li>
                        <li> Early king safety and castling </li>
                     </ul>
                     <br><strong>Basic Tactics and Patterns:</strong>
                     <ul>
                        <li> Recognizing threats and simple captures </li>
                        <li>Basic tactics: pins, forks, skewers, and discovered attacks </li>
                        <li> Introduction to simple combinations </li>
                        <li> Types of Stalemates</li>
                     </ul>
                     <br><strong>Endgame Basics:</strong>
                     <ul>
                        <li>Understanding checkmating patterns with major pieces (e.g., king + queen vs. king, king + rook vs. king) </li>
                        <li>Basic pawn endings (king and pawn vs. king)</li>
                     </ul>
                     <br><strong>Practical Play:</strong>
                     <ul>
                        <li>Playing guided games with feedback on mistakes</li>
                        <li>Simple exercises to reinforce learned concepts </li>
                     </ul>
                     <strong>Openings Development:</strong>
                     <ul>
                        <li>  Fundamental opening repertoires for white and black (e.g., Italian Game, Sicilian Defense basics)</li>
                        <li>  Development and tempo in the opening phase</li>
                        <li>  Capturing the Hanging Piece/Pawn</li>
                     </ul>
                     </ul>
                         <div class="mt-3">
  <h5>Weekend Beginners Batch</h5>
  <p>
    <span class="about-time d-block mt-3">
      <span class="thm-clr"><i class="far fa-clock"></i> <b>Class Schedule:</b></span><br>
      Saturday & Sunday - 11:30 am to 1:00 pm
    </span>
  </p>
  <ul>
    <li>Trainer: Yogender Prakash</li>
    <li>Fees: ₹4000</li>
    <li>Batch Size: 6 - 8</li>
  </ul>
</div>
                     @if(Auth::check())
                     <a href="{{ route('front.checkout_coching', ['title' =>'ADVANCED', 'price' =>'4000']) }}" class="register-btn">Pay Now</a>
                  
                                        @else
                                        <a href="{{ url('signin') }}" class="register-btn">Pay Now</a>
                  
                                        @endif
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="card">
                     
                     <h3>ADVANCED BEGINNERS</h3>
        <p>Strengthen tactical skills and introduce basic positional concepts.
                        The beauty of chess lies in thinking beyond the obvious. Push your limits, and the board will open up to you.
                     </p>
                     <strong>Openings Development:</strong>
                     <ul>
                        <li>  Fundamental opening repertoires for white and black (e.g., Italian Game, Sicilian Defense basics)</li>
                        <li>  Development and tempo in the opening phase</li>
                        <li>  Capturing the Hanging Piece/Pawn</li>
                     </ul>
                     <br><strong>Intermediate Tactics:</strong>
                     <ul>
                        <li>  Double attacks and defensive tactics</li>
                        <li>  Advanced pins, skewers, and discovered attacks</li>
                        <li>  Back-rank tactics and threats on open files</li>
                        <li>  Deflection, Windmill, Back Rank weakness, etc.</li>
                     </ul>
                     <br><strong>Positional Play:</strong>
                     <ul>
                        <li>  Understanding weak squares and pawn structure</li>
                        <li>  Basics of piece activity and coordination</li>
                        <li>  Simple planning concepts and improving piece placement</li>
                     </ul>
                     <br><strong>Endgame Development:</strong>
                     <ul>
                     <li>  Rook and pawn endgames (basic ideas of the Lucena and Philidor positions)</li>
                     <li>  Opposition in pawn endgames</li>
                     <li>  King activity in endgames</li>
                     <ul>   
                       <div class="mt-3">
                           <br>
                            <br>
         <h5>Advanced Beginners Batch</h5>
        <p>
         <span class="about-time d-block mt-3">
           <span class="thm-clr"><i class="far fa-clock"></i> <b>Class Schedule:</b></span><br>
           Saturday & Sunday - 11:30 am to 1:00 pm
          </span>
        </p>
       <ul>
    <li>Trainer:  Deepak Singh</li>
    <li>Fees: ₹6000 </li>
    <li>Batch Size: Days to be announced</li>
  </ul>
</div>
                                     @if(Auth::check())
                                     <a href="{{ route('front.checkout_coching', ['title' =>'ADVANCED', 'price' =>'4000']) }}" class="register-btn">Pay Now</a>
                                  
                                        @else
                                        <a href="{{ url('signin') }}" class="register-btn">Pay Now</a>
                  
                                        @endif
                  </div>
               </div>
           
            </div>
            <div class="row justify-content-center mt-4" >            
               <div class="col-md-4" >
                  <div class="card">
                     
                     <h3>INTERMEDIATE</h3>
                     <p>
                        Develop strategic thinking, positional understanding, and advanced tactics.
                        Strength in chess comes from perseverance; the greatest moves often arise from the toughest challenges.
                     </p>
                     <strong>Opening Repertoire Expansion:</strong>
                     <ul>
                        <li>  Deepening understanding of common openings (e.g., Ruy Lopez, Sicilian Defense variations, Queen’s Gambit)</li>
                        <li>  Principles of opening preparation and responding to opponent’s moves</li>
                     </ul>
                     <br><strong>Advanced Tactics:</strong>
                     <ul>
                        <li>  Complex tactics and combinations</li>
                        <li>  Removing the defender, deflection, decoy tactics</li>
                        <li>  Complex examples of pins, skewers, and forks</li>
                     </ul>
                     <br><strong>Positional Concepts:</strong>
                     <ul>
                        <li>  Advanced pawn structures (isolated pawns, backward pawns, doubled pawns)</li>
                        <li>  Outposts and weak squares</li>
                        <li>  Good vs. bad bishops, knights vs. bishops dynamics</li>
                     </ul>
                     <br><strong>Planning and Strategy:</strong>
                     <ul>
                        <li>  Basics of formulating a plan based on the position</li>
                        <li>  Recognizing imbalances and exploiting them</li>
                        <li>  Transitioning between opening, middlegame, and endgame phases</li>
                     </ul>
                     <br><strong>Endgame Strategy:</strong>
                     <ul>
                        <li>  More advanced rook endgames and concepts (e.g., the Vancura position)</li>
                        <li>  Knight and bishop endgames</li>
                        <li>  Opposition, triangulation, and zugzwang in endgames</li>
                     </ul>
                     <div class="mt-3">
                         <br>
                        
  <h5>Intermediate Batch</h5>
  <p>
    <span class="about-time d-block mt-3">
      <span class="thm-clr"><i class="far fa-clock"></i> <b>Class Schedule:</b></span><br>
      Wednesday & Saturday - 4:00 pm to 6:00 pm
    </span>
  </p>
  <ul>
    <li>Trainer: IM Hemant Sharma </li>
    <li>Fees: ₹7000</li>
    <li>Batch Size: 6 - 8</li>
  </ul>
</div>

                     @if(Auth::check())
                     <a href="{{ route('front.checkout_coching', ['title' =>'ADVANCED', 'price' =>'4000']) }}" class="register-btn">Pay Now</a>
                     @else
                     <a href="{{ url('signin') }}" class="register-btn">Pay Now</a>
                     @endif
                  </div>
               </div>
               <div class="col-md-4" >
                  <div class="card">
                     
                     <h3>ADVANCED</h3>
                     <p>Mastery of chess principles with a focus on advanced strategy, in-depth analysis, and competitive preparation. Chess mastery is a blend of vision and precision.
                        The board is yours to conquer—one brilliant move at a time.
                     </p>
                     <strong>Opening Mastery:</strong>
                     <ul>
                        <li>  Deep study of individual openings with multiple variations (e.g., Najdorf, King’s Indian Defense, English Opening)</li>
                        <li>  Opening theory updates and understanding opening novelties</li>
                        <li>  Preparing for specific opponents in tournaments</li>
                     </ul>
                     <br><strong>Advanced Positional Play:</strong>
                     <ul>
                        <li>  Identifying and exploiting weaknesses in complex positions</li>
                        <li>  Positional sacrifices for long-term compensation</li>
                     </ul>
                     <br><strong>In-Depth Strategy and Planning:</strong>
                     <ul>
                        <li>  Long-term strategic planning based on specific positions</li>
                        <li>  Recognizing and exploiting imbalances</li>
                        <li>  Understanding prophylaxis (anticipating opponent’s plans)</li>
                     </ul>
                     <br><strong>Complex Endgames:</strong>
                     <ul>
                        <li>  Mastering endgames with multiple pieces (e.g., rook and pawn vs. rook, opposite-colored bishop endings)</li>
                        <li>  Understanding fortress positions and drawing techniques</li>
                        <li>  Advanced king and pawn endgames</li>
                     </ul>
                     <br><strong>Tournament and Game Analysis:</strong>
                     <ul>
                        <li>  Analyzing own games and classic master games for improvement</li>
                        <li>  Practical exercises in calculation and visualization</li>
                        <li>  Psychological preparation for tournaments and maintaining focus during long games</li>
                     </ul>
                     <div class="mt-3">
         <h5>Advanced Batch</h5>
        <p>
         <span class="about-time d-block mt-3">
           <span class="thm-clr"><i class="far fa-clock"></i> <b>Class Schedule:</b></span><br>
       to be announced
          </span>
        </p>
       <ul>
    <li>Trainer: IM Vishal Sareen </li>
    <li>Fees: ₹9000  </li>
    <li>Batch Size: Days to be announced</li>
  </ul>
</div>
                     @if(Auth::check())
                     <a href="{{ route('front.checkout_coching', ['title' =>'ADVANCED', 'price' =>'4000']) }}" class="register-btn">Pay Now</a>
                     @else
                     <a href="{{ url('signin') }}" class="register-btn">Pay Now</a>
                     @endif
                     
                  </div>
               </div>
               <div class="col-md-4">
               <div class="card">
                  <h3>Contact Us</h3>
                  <form class="w-100" id="email-form" method="POST">
                     
                  <div class="field-box w-100">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name"  class="brd-rd10 fname" placeholder="Enter your name" required>
                     </div>
                     <div class="field-box w-100">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"  class="brd-rd10 fname" placeholder="Enter your email" required>
                     </div>
                     <div class="field-box w-100">
                        <label for="message">Message</label>
                        <textarea id="message" name="message"  class="brd-rd10 fname" rows="3" placeholder="Enter your message" required></textarea>
                     </div>
                     <a type="submit" class="register-btn">Submit</a>
                  </form>
               </div>
               <div class="card mt-5">
                   <div class="mt-3">
  <h5>Offline Playing Session</h5>
  <p>
    <span class="about-time d-block mt-3">
      <span class="thm-clr"><i class="far fa-clock"></i> <b>Class Schedule:</b></span><br>
      4 days per month - Saturday 12:00 pm to 2:00 pm
    </span>
  </p>
  <ul>
    <li>Fees: ₹1000</li>
    <li>Total Players: Maximum 10</li>
    <li>*Prior registration mandatory</li>
  </ul>
</div>

<div class="mt-3">
  <h5>Additional Information</h5>
  <ul>
    <li>Registration Fee for all batches: ₹500 (One Time)</li>
    <li>*10% discount for Girl Child</li>
    <li>Advanced Batch Fees: ₹9000</li>
  </ul>
</div>

               </div>
               
            </div>
            </div>
        
  
</div>
<section>
    <div class="container too">
        <!-- First section: Image on the left, content on the right -->
        @if($services->isEmpty())  
            <p>No services available for this category.</p>
        @else
            @foreach($services as $service)
                <div class="row zigzag">
                    <div class="col-lg-4 image-container iie">
                        <img src="{{ $service->feature_image ?? asset('images/default.png') }}" 
                             alt="{{ $service->name }}">
                    </div>
                    <div class="col-lg-8 content-container dde">
                        <h2>{{ $service->name }}</h2>
                        <p><?= $service->description ?></p>
                        <h3 class="price">Price: {{ $service->default_price }}/-</h3>
                        <h2>{{ $service->duration_min }}</h2>
                        @if($service->isEventPassed())
                            <button class="checkout-btn" style="background-color: #d1d1d1; color: #7a7a7a; cursor: not-allowed; border: 1px solid #bfbfbf; padding: 12px; border-radius: 5px; width: 32%;" disabled>Event Passed</button>
                        @else
                            <a href="{{ route('front.checkout', ['id' => Crypt::encryptString($service->id)]) }}" class="checkout-btn">Checkout</a>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>


@endsection
