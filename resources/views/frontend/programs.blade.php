@extends('frontend.layouts.app')
@section('title') {{ 'Product list' }} @endsection
@section('content')
 <style>
        form {
            display: flex;
            flex-direction: column;
        }

.coll tr{
    color:#000 !important;
}

        .step-indicators {
            display: flex;
            justify-content: space-between;
            margin-bottom: 60px;
            margin-top: 45px;
            position: relative;
            padding: 40 10px;
            /* To ensure line does not overlap the container edge */
        }
        
        .tie{
      padding:25px 120px !important;
        }

        .step-btn {
            /*background-image: linear-gradient(to right, #59aa46, #fec44a) !important;*/
            color: #000 !important;
            border: none;
            border-radius: 50%;
            width: 30px;
            /* height: 30px; */
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 16px;
            position: relative;
            z-index: 2;
     
        }

        .step-btn.active {
            background-image: linear-gradient(to right, #ffac00, #ffed00) !important;
      
        }

 .form-step-active {
    display: block;
    padding-bottom: 40px;
}

        .step-indicators:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 18px;
            width: 95%;
            height: 2px;
            background-image: linear-gradient(to right, #59aa46, #fec44a) !important;
            z-index: 1;
            /* transform: translateY(-75%); */
            margin: auto;
        }

        .step-indicators>.step-btn:not(:last-child)::after {
            content: '';
            /* position: absolute; */
            top: 50%;
            right: -50%;
            width: 50px;
            /* Adjust this value to control the line length */
            height: 2px;
            background-image: linear-gradient(to right, #59aa46, #fec44a) !important;
            z-index: 1;
            transform: translateY(-50%);
        }

        .form-step {
            display: none;
        }

        .form-step-active {
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        thead {
            background-color: #f4f4f4;
        }

        td,
        th {
            padding: 15px;
            border: 1px solid #ddd;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            /*background-image: linear-gradient(to right, #59aa46, #fec44a) !important;*/
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }

        button:disabled {
            background-color: #ccc;
        }

        button.prev-btn {
            background-color: #6c757d;
        }

        button.buy-btn {
            background-color: #28a745;
            width: 96%;
        }

        button.next-btn {
            background-image: linear-gradient(to right, #59aa46, #fec44a) !important;
        }

        button.next-btn,
        button.prev-btn {
            margin-right: 10px;

        }

        #multi-step-form {
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 5px 3px 25px -1px rgb(10% 20% 0 / 10%);
            margin-bottom: 5%;
            padding: 4% 5% 3%;
        }

        .form-step h2 {
            font-size: 30px;
        }

        .neww {
            width: 93%;
        }
        
        

.trans{
margin-top: 5%; font-size:2rem;
}

@media(max-width:786px){
    .rra {

    font-size: 19px;
   
}
td ,th{
    padding: 15px !important;

}
.tie{
      padding:25px 20px !important;
        }
.trans {
    margin-top: 5%;
    font-size: 23px;
    padding: 12px;
}
.slider-image{
    margin-top:0 !important;
}
.form-step h2 {
    font-size: 30px;
    margin-left: 6%;
}
.step-indicators:before {
    content: '';
    position: absolute;
    top: 50%;
    left: 18px;
    width: 89%;}
}
.kuber tr td{
    /* font-weight:700; */
    color:#000;
}
    </style>
  <style>
      /* Slider images */
      
.slider-image {
    /*max-height: 892px;*/
    /*object-fit: cover;*/
    margin-top: 100px;
}
.carousel-indicators {
   display:none; 
}
/* Carousel caption styling */
.carousel-caption {
    background-color: rgba(255, 255, 255, 0.5);
 /* semi-transparent background */
    padding: 20px;
    border-radius: 10px;
}

/* Custom button styling */
.carousel-caption .btn {
    background-color: #28a745;
    border-color: #28a745;
}

.carousel-caption .btn:hover {
    background-color: #218838;
    border-color: #1e7e34;
}
.nhg{
    color:#000;
}
.wise{
   color:#000; 
}

  </style>
  <!-- new css -->
  <style>
        form {
            display: flex;
            flex-direction: column;
        }
        .buy-btn , .prev-btn{
            background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
        }
      

        .step-indicators {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            position: relative;
            padding: 0 10px;
            /* To ensure line does not overlap the container edge */
        }

        .step-btn {
            background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 30px;
            /* height: 30px; */
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 16px;
            position: relative;
            z-index: 2;
     
        }

        .step-btn.active {
            background-image: linear-gradient(to right, #ffac00, #ffed00) !important;
            color: #000;
            font-weight: 900;
      
        }

 

        .step-indicators:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 18px;
            width: 95%;
            height: 2px;
            background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
            z-index: 1;
            /* transform: translateY(-75%); */
            margin: auto;
        }

        .step-indicators>.step-btn:not(:last-child)::after {
            content: '';
            /* position: absolute; */
            top: 50%;
            right: -50%;
            width: 50px;
            /* Adjust this value to control the line length */
            height: 2px;
            background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
            z-index: 1;
            transform: translateY(-50%);
        }

        .form-step {
            display: none;
        }

        .form-step-active {
            display: block;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ddd;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
         
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        button{
            background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;  
        }

        button:disabled {
            background-color: #ccc;
        }

        button.prev-btn {
            background-color: #6c757d;
        }

        button.buy-btn {
            background-color: #28a745;
            width: 96%;
        }

        button.next-btn {
            background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;
        }

        button.next-btn,
        button.prev-btn {
            margin-right: 10px;

        }

        #multi-step-form {
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 5px 3px 25px -1px rgb(10% 20% 0 / 10%);
            margin-bottom: 5%;
            padding: 4% 5% 3%;
        }

        .form-step h2 {
            font-size: 30px;
        }

        .neww {
            width: 93%;
        }
        .step-btn.active {
    background-image: linear-gradient(to right, #ffac00, #ffed00) !important;
    color: #000;
    font-weight: 900;
}
button { 
    padding: 10px 21px;
}
#booking_form {
    border-radius: 15px !important;
    background-color: #fff !important;
    box-shadow: 5px 3px 25px -1px rgb(10% 20% 0 / 10%) !important;
    margin-bottom: 5% !important;
    padding: 4% 4% 4% !important;
    margin-top: 5% !important;
}
.rra {
    font-weight: 700;
    font-size: 24px;
    padding: 20px 0;
    color: #403f3f;
}
.rra span {
    color: #fcd739;
}
.dss button{
    display: inline-block;
}
    </style>
    
   <!-- new css  -->
 
   <section class="top-h">
            <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">
                <div class="fixed-bg" style="background-image: url(assets/images/pag-top-bg.jpg);"></div>
                <div class="container">
                    <div class="page-title-wrap text-center w-100">
                        <div class="page-title-inner d-inline-block">
                            <h1 class="mb-0">Coaching</h1>
                            <ol class="breadcrumb mb-0 justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html" title="">Home</a></li>
                                <li class="breadcrumb-item active">Coaching</li>
                            </ol>
                        </div>
                    </div><!-- Page Title Wrap -->
                </div>
            </div>
        </section>

            
                        
                        
                            <section class="step-form mt-130 ">
                                <div class="container">
                                    <form action="{{ route('store.booking.details') }}" method="POST" id="booking_form">
                                    @csrf
                                    <!-- Step Indicators -->
                                    <div class="step-indicators " id="upcoming-programmes">
                                        <button type="button" class="step-btn" data-step="step-1">1</button>
                                        <button type="button" class="step-btn" data-step="step-2">2</button>
                                        <button type="button" class="step-btn" data-step="step-3">3</button>
                                    </div>
                                    <!-- Step 1: Program Details -->
                        <div class="form-step form-step-active comment-reply-wrap" 
                                        id="step-1">
                                        <h3 style="position: relative;">Select Chess Coaching</h3>
                
                                        <div style="overflow-x: auto !important;overflow: auto;">
                                            <!-- Program Details Table -->
                                            <table >
                                                <thead>
                                                <tr>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Level</th>
                                                    <th>Coach Category</th>
                                                    <th>Features</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tr>
                                                </thead>
                                                <tbody class="col" style="padding: 30px !important;">
                                                <tr>
                                                    <td>1</td>
                                                    <td>Freshers</td>
                                                    <td>Below 2000</td>
                                                    <td>
                                                        <ul>
                                                            <li>Offline Classes: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                                            <li>Playing Practice: <span style="color: #fcd739; font-weight: bold; font-size:large;">X</span></li>
                                                            <li>Progress Monitoring Discussion: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                                            <li>Tournament Guidance: <span style="color: #fcd739; font-weight: bold; font-size:large">X</span></li>
                                                            <li>Nutrition Counselling: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                                            <li>Fitness Session: <span style="color: #fcd739; font-weight: bold; font-size:large;">X</span></li>
                                                            <li>Mental Strength Counselling: <span style="color: #fcd739; font-weight: bold; font-size:large;">X</span></li>
                                                        </ul>
                                                    </td>
                                                    <td><button type="button" class="next-btn neww" data-next="step-2">Next</button></td>
                                                </tr>
                                                <tr>
                            <td>2</td>
                            <td>Beginners</td>
                            <td>Below 2000</td>
                            <td>
                                <ul>
                                    <li>Offline Classes: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Playing Practice: <span style="color: #fcd739; font-weight: bold; font-size:large;">X</span></li>
                                    <li>Progress Monitoring Discussion: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Tournament Guidance: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Nutrition Counselling: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Fitness Session: <span style="color: #fcd739; font-weight: bold; font-size:large;">X</span></li>
                                    <li>Mental Strength Counselling: <span style="color: #fcd739; font-weight: bold; font-size:large;">X</span></li>
                                </ul>
                            </td>
                            <td><button type="button" class="next-btn neww" data-next="step-2">Next</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Adv Beginners</td>
                            <td>IM, Above 2000</td>
                            <td>
                                <ul>
                                    <li>Offline Classes: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Playing Practice: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Progress Monitoring Discussion: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Tournament Guidance: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Nutrition Counselling: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Fitness Session: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Mental Strength Counselling: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                </ul>
                            </td>
                            <td><button type="button" class="next-btn neww" data-next="step-2">Next</button></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Intermediate</td>
                            <td>IM, Above</td>
                            <td>
                                <ul>
                                    <li>Offline Classes: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Playing Practice: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Progress Monitoring Discussion: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Tournament Guidance: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Nutrition Counselling: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Fitness Session: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Mental Strength Counselling: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                </ul>
                            </td>
                            <td><button type="button" class="next-btn neww" data-next="step-2">Next</button></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Advanced</td>
                            <td>GM</td>
                            <td>
                                <ul>
                                    <li>Offline Classes: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Playing Practice: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Progress Monitoring Discussion: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Tournament Guidance: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Nutrition Counselling: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Fitness Session: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                    <li>Mental Strength Counselling: <span style="color: #fcd739; font-weight: bold;">Yes</span></li>
                                </ul>
                            </td>
                            <td><button type="button" class="next-btn neww" data-next="step-2">Next</button></td>
                        </tr>

                                                </tbody>
                                            </table>
                            <!-- Notes -->
                            <div class="text-muted small">
                                                <p>1. Academy – Location: South Delhi 
                                                        
                                                        
                                                    </p>
                                                <p>2. Classes thrice a week TTS,(Tue/Thur/Sat) – Playing session </p>
                                                <p>3. GM Camps – Both Indian & International Coaches  - (Coaching , Fitness Session, Playing Session,  Nutrition Session, Parents Q&A,  Mental Strength & Training Session).</p>
                                            
                                            </div>
                                        </div>
                                        <!-- Notes -->
                                         
                                        
                                    </div>
                                    <!-- Step 2: Choose Program -->
                                    <div class="form-step comment-reply-wrap" id="step-2">
                                    <h3 style="position: relative;">Choose Course Duration</h3>
                                        <div style="    overflow-x: auto !important;
                                            overflow: auto;">
                                            <table class="kuber">
                                                <thead>
                                                <tr>
                                                    <th>Features</th>
                                                    <th>1 month</th>
                                                    <th>3 months</th>
                                                    <th>6 Months</th>
                                                    <th>9 Months</th>
                                                    <th>12 Months</th>
                                                </tr>
                                                </thead>
                                                <tr>
                            <td>Number of Lessons</td>
                            <td>4</td>
                            <td>12</td>
                            <td>24</td>
                            <td>36</td>
                            <td>48</td>
                        </tr>
                        <tr>
                            <td>Access to Live Sessions</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Personalized Feedback</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Interactive Quizzes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td>Grandmaster Game Analysis</td>
                            <td>No</td>
                            <td>No</td>
                            <td>Yes</td>
                            <td>Yes</td>
                            <td>Yes</td>
                        </tr>
                        <tr class="rra">
                            <td>Rate without Taxes</td>
                            <td><span>₹</span> 4,000</td>
                            <td><span>₹</span> 10,000</td>
                            <td><span>₹</span> 18,000</td>
                            <td><span>₹</span> 25,000</td>
                            <td><span>₹</span> 30,000</td>
                        </tr>
                                                <tr>
                                                <td></td>
                                                
                                                <td><button type="button" class="buy-btn"   data-next="step-3" data-duration="1" data-amount="4000">Buy Now</button></td>
                                                <td><button type="button" class="buy-btn" data-next="step-3" data-duration="3" data-amount="10000">Buy Now</button></td>
                                                <td><button type="button" class="buy-btn" data-next="step-3" data-duration="6" data-amount="18000">Buy Now</button></td>
                                                <td><button type="button" class="buy-btn" data-next="step-3" data-duration="9" data-amount="25000">Buy Now</button></td>
                                                <td><button type="button" class="buy-btn" data-next="step-3" data-duration="12" data-amount="30000">Buy Now</button></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- Footer with notes -->
                                        <div class="text-muted small mb-20">
                                            *T&C apply <br>
                                            **Courier Cost on Actuals <br>
                                            *** Choose 1
                                        </div>
                                        <button type="button" class="prev-btn" data-prev="step-1">Previous</button>
                                    </div>
                                    <!-- Step 3: Payment -->
                                    <div class="form-step" id="step-3">
                                        <h3> Payment</h3>
                                        <div style="    overflow-x: auto !important;
                                            overflow: auto;">
                                            <p>Please enter your payment details below:</p>
                                            <p>Month: <span id="month_display"></span></p>
                                            <p>Amount: <span id="amount_display"></span></p>
                                            <!-- Hidden input fields -->
                                            <input type="hidden" id="selected-duration" name="month" value="">
                                            <input type="hidden" id="selected-amount" name="amount" value="">
                                            <input type="hidden" id="razorpay_payment_id" name="razorpay_payment_id" value="">
                                            <input type="hidden" id="razorpay_order_id" name="razorpay_order_id" value="">
                                            <table>
                                                <tr>
                                                <td><label for="first-name">First Name:</label></td>
                                                <td><input type="text" id="first-name" name="first-name" value="{{ Auth::check() ? Auth::user()->first_name : '' }}" required></td>
                                                </tr>
                                                <tr>
                                                <td><label for="last-name">Last Name:</label></td>
                                                <td><input type="text" id="last-name" name="last-name" 
                                                    value="{{ Auth::check() ? Auth::user()->last_name : '' }}"
                                                    required></td>
                                                </tr>
                                                <tr>
                                                <td><label for="street-address">Street Address:</label></td>
                                                <td><input type="text" id="street-address"   name="street-address" required></td>
                                                </tr>
                                                <tr>
                                                <td><label for="city">City:</label></td>
                                                <td><input type="text" id="city" name="city"  required></td>
                                                </tr>
                                                <tr>
                                                <td><label for="county">County:</label></td>
                                                <td><input type="text" id="county" name="county"  required></td>
                                                </tr>
                                                <tr>
                                                <td><label for="postcode">Postcode:</label></td>
                                                <td><input type="text" id="postcode"  name="postcode" required></td>
                                                </tr>
                                                <tr>
                                                <td><label for="phone">Phone:</label></td>
                                                <td><input type="text" id="phone" name="phone" value="{{ Auth::check() ? Auth::user()->mobile : '' }}"
                                                    required></td>
                                                </tr>
                                                <tr>
                                                <td><label for="email">Email:</label></td>
                                                <td><input type="email" id="email" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required></td>
                                                </tr>
                                            </table>
                                            <button type="button" class="prev-btn" data-prev="step-2">Previous</button>
                                            <button type="button" class="prev-btn" id="onlineClick">Pay Now</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </section>
                       
                        <!--service-section end-->
                        <section>
                <div class="w-100 pt-110 opc9 pb-110 position-relative">
                    <div class="fixed-bg back-blend-lighten " style="background-image: url(assets/images/parallax-bg7.html);"></div>
                    <div class="container">
                        <div class="sec-title v2 text-center w-100">
                            <div class="sec-title-inner d-inline-block">
                                <h2 class="mb-0">Mastering Chess Techniques</h2>
                                <p class="mb-0 position-relative sub-shap v2 thm-shp d-inline-block">Achieving Peak Performance with Every Move</p>
                            </div>
                        </div><!-- Sec Title -->
                        <div class="serv-wrap3 text-center position-relative w-100">
                            <div class="row mrg justify-content-center">
                                <div class="col-md-4 col-sm-6 col-lg-3">
                                    <div class="serv-box3 d-flex flex-wrap align-items-center justify-content-center position-relative overflow-hidden text-center w-100">
                                        <div class="serv-info3 d-inline-block">
                                            <i class="fas fa-star-half thm-clr d-inline-block"></i>
                                            <h3 class="mb-0"><a href="service-detail.html" title="">Walking - Level 1</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-lg-3">
                                    <div class="serv-box3 d-flex flex-wrap align-items-center justify-content-center position-relative overflow-hidden text-center w-100">
                                        <div class="serv-info3 d-inline-block">
                                            <i class="fas fa-star-half-alt thm-clr d-inline-block"></i>
                                            <h3 class="mb-0"><a href="service-detail.html" title="">Trotting - Level 2</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-lg-3">
                                    <div class="serv-box3 d-flex flex-wrap align-items-center justify-content-center position-relative overflow-hidden text-center w-100">
                                        <div class="serv-info3 d-inline-block">
                                            <i class="fas fa-star thm-clr d-inline-block"></i>
                                            <h3 class="mb-0"><a href="service-detail.html" title="">Cantering - Level 3</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-lg-3">
                                    <div class="serv-box3 d-flex flex-wrap align-items-center justify-content-center position-relative overflow-hidden text-center w-100">
                                        <div class="serv-info3 d-inline-block">
                                            <i class="fas fa-medal thm-clr d-inline-block"></i>
                                            <h3 class="mb-0"><a href="service-detail.html" title="">Galloping - Level 4</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-lg-3">
                                    <div class="serv-box3 d-flex flex-wrap align-items-center justify-content-center position-relative overflow-hidden text-center w-100">
                                        <div class="serv-info3 d-inline-block">
                                            <i class="fas fa-trophy thm-clr d-inline-block"></i>
                                            <h3 class="mb-0"><a href="service-detail.html" title="">Experienced</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-lg-3">
                                    <div class="serv-box3 d-flex flex-wrap align-items-center justify-content-center position-relative overflow-hidden text-center w-100">
                                        <div class="serv-info3 d-inline-block">
                                            <i class="fas fa-award thm-clr d-inline-block"></i>
                                            <h3 class="mb-0"><a href="service-detail.html" title="">Advanced</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Services Wrap 3 -->
                        <div class="view-more mt-70 d-inline-block text-center w-100">
                            <p class="mb-0">Want to search any other course? Explore <a class="simple-link thm-clr d-inline-block" href="services.html" title="">More Course</a> section.</p>
                        </div><!-- View More -->
                    </div>
                </div>
            </section>
                        

         
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
           <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

            <script>
            // script.js
            document.addEventListener('DOMContentLoaded', function () {
                const nextButtons = document.querySelectorAll('.next-btn');
                const prevButtons = document.querySelectorAll('.prev-btn');
                const stepButtons = document.querySelectorAll('.step-btn');
                const steps = document.querySelectorAll('.form-step');
                let currentStep = 0;

                function showStep(stepIndex) {
                    steps.forEach((step, index) => {
                        step.classList.toggle('form-step-active', index === stepIndex);
                    });
                    stepButtons.forEach((button, index) => {
                        button.classList.toggle('active', index === stepIndex);
                    });
                }

                nextButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const nextStep = this.getAttribute('data-next');
                        const nextIndex = Array.from(steps).findIndex(step => step.id === nextStep);
                        if (nextIndex !== -1) {
                            currentStep = nextIndex;
                            showStep(currentStep);
                        }
                    });
                });

                prevButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const prevStep = this.getAttribute('data-prev');
                        const prevIndex = Array.from(steps).findIndex(step => step.id === prevStep);
                        if (prevIndex !== -1) {
                            currentStep = prevIndex;
                            showStep(currentStep);
                        }
                    });
                });

                stepButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const stepId = this.getAttribute('data-step');
                        const stepIndex = Array.from(steps).findIndex(step => step.id === stepId);
                        if (stepIndex !== -1) {
                            currentStep = stepIndex;
                            showStep(currentStep);
                        }
                    });
                });

                showStep(currentStep); // Show the first step initially
            });

        </script>
        <script>
        document.addEventListener('DOMContentLoaded', () => {
    const buyButtons = document.querySelectorAll('.buy-btn');
    const isAuthenticated = @json(Auth::check());

    buyButtons.forEach(button => {
        button.addEventListener('click', function() {
            if (!isAuthenticated) {
                // Redirect to the sign-in page
                window.location.href = '{{ url('signin') }}';
            } else {
                const duration = this.getAttribute('data-duration');
                const amount = this.getAttribute('data-amount');

                // Set the duration and amount in hidden fields
                document.getElementById('selected-duration').value = duration;
                document.getElementById('selected-amount').value = amount;
                
                 // Update the displayed values
                const monthDisplay = $('#month_display').html(duration);
                const amountDisplay = $('#amount_display').html(amount);
                console.log(amount);

                // Get the currently active form step
                const currentStep = document.querySelector('.form-step.form-step-active');

                // If there's an active step, proceed to the next step
                if (currentStep) {
                    currentStep.classList.remove('form-step-active');
                    const nextStep = document.getElementById(this.getAttribute('data-next'));

                    // Check if the next step exists before trying to add the 'form-step-active' class
                    if (nextStep) {
                        nextStep.classList.add('form-step-active');
                    } else {
                        console.error('Next step element not found.');
                    }
                } else {
                    console.error('Current active step element not found.');
                }
            }
        });
    });

    // Handling Previous buttons
    const prevButtons = document.querySelectorAll('.prev-btn');

    prevButtons.forEach(button => {
        button.addEventListener('click', function() {
            const currentStep = document.querySelector('.form-step.form-step-active');
            const prevStep = document.getElementById(this.getAttribute('data-prev'));

            if (currentStep && prevStep) {
                currentStep.classList.remove('form-step-active');
                prevStep.classList.add('form-step-active');
            } else {
                console.error('Step transition error.');
            }
        });
    });
});
</script>
        <script>
        // Function to save booking information
        function saveBooking()  {
            $('#onlineClick').prop('disabled', true);
            $('#onlineClick').text('Processing...');
            
            var form = $('#booking_form');
            var formData = form.serialize(); // Corrected from "serilize" to "serialize"
        
            
                $.ajax({
                    url: form.attr('action'), // Ensures the form action attribute is used
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (res) {
                        if (res.status) {
                            callback(true);
                            // Additional actions based on the response can be added here
                        } else {
                            $('#error-msg').html(`<span style="color:red;">${res.message}</span>`);
                            callback(false);
                        }
                        $('#onlineClick').prop('disabled', false);
                        $('#onlineClick').text('Submit');
                    },
                    error: function (error) {
                        console.error('Error fetching data:', error);
                        callback(false);
                        $('#onlineClick').prop('disabled', false);
                        $('#onlineClick').text('Submit');
                    }
                });
        }

    // Function to create a Razorpay order and trigger the payment process
        function saveOnline(callback) {
            var formData = {
                '_token': csrf_token,
                // amount: 1,
                amount: $('#selected-amount').val() ,
                
            };
            $.ajax({
                url: api_url + '/razorpay-order-create',
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function (res) {
                    if (res.status) {
                        var orderId = res.data.id;
                        RazorpayCheckout(res.data.amount, res.data.currency, orderId, callback);
                    } else {
                        console.error('Error creating Razorpay order:', res.error);
                        callback(false);
                    }
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                    callback(false);
                }
            });
        }
        @if(Auth::check())
        // Razorpay checkout function
        function RazorpayCheckout(amount, currency, order_id, callback) {
            var options = {
                "key": "{{ env('RAZORPAY_API_KEY') }}",
                "amount": amount,
                "currency": currency,
                "name": "{{ app_name() }}",
                "description": "",
                "image": "{{ asset(setting('logo')) }}",
                "order_id": order_id,
                "handler": function (response) {
                    
                    $('#razorpay_payment_id').val(response.razorpay_payment_id);
                    $('#razorpay_order_id').val(response.razorpay_order_id);
                    
                     saveBooking();
                },
                "prefill": {
                    "name": "{{ Auth::user()->name }}",
                    "email": "{{ Auth::user()->email }}",
                    "contact": "{{ Auth::user()->mobile }}"
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#702543"
                }
            };

            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function (response) {
                console.error('Payment Failed:', response.error);
                callback(false);
            });

            rzp1.open();
        }
        @endif
        
        // Event listener for the 'razorpay' button click
        $('#onlineClick').on('click', function() {
            saveOnline(success => {
                if (success) {
                    console.log('Service saved successfully');
                } else {
                    console.log('Service save failed');
                }
            });
        });
</script>


<!--slider js-->

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Initialize the carousel (optional, if you want custom settings) -->
<script>
    $(document).ready(function(){
        $('#carouselExampleIndicators').carousel({
            interval: 1000, // Change slide every 3 seconds
            ride: 'carousel'
        });
    });
</script>


<!--slider js-->


@endsection

<!--scri-->
