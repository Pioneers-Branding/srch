@extends('frontend.layouts.app')
@section('title') {{ 'site map' }} @endsection

@section('content')

<style>
    /* General styles for the sitemap section */
.our-post-section {
    background-color: #f9f9f9; /* Light background for the section */
    padding: 20px 0; /* Top and bottom padding */
}

.our-post-section h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 35px;
    color: #333;
}

.column {
    border-right: 1px solid #9f9999; /* Vertical line between columns */
    padding: 0 20px; /* Horizontal padding */
}

.column:last-child {
    border-right: none; /* Remove border from the last column */
}

.column ul {
    list-style-type: none;
    padding: 0;
}

.column ul li {
    margin-bottom: 10px;
}

.column ul li a {
    text-decoration: none;
    color: #007bff; /* Link color */
    font-size: 16px;
}

.column ul li a:hover {
    text-decoration: underline;
    color: #0056b3; /* Darker link color on hover */
}

.pm{
        background-image: linear-gradient(to right, #59aa46, #fec44a) !important;
    border-radius: 15px;
    padding: 15px;
}
.column ul li a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    font-weight: 700;
}

/* Adjustments for responsive design */
@media (max-width: 768px) {
    .column {
        border-right: none; /* Remove border on smaller screens */
        padding: 0; /* Remove padding on smaller screens */
    }
}

</style>
     

<!--site-main start-->
<div class="site-main">
    <!-- post-section -->
    <section class="ttm-row our-post-section clearfix">
        <div class="container" style="margin-top:10%; margin-bottom:5%;">
            <h2>Sitemap</h2>
            <div class="row pm">
                <!-- Column 1 -->
                <div class="col-md-4 column">
                    <ul>
                        <li><a href="{{ route('front.index') }}">Home</a></li>
                        <li><a href="{{ route('front.programs') }}">Solutions</a></li>
                        <!--<li><a href="#">Wellness Metrics Tools</a></li>-->
                        <li><a href="{{ route('front.nutrihealth_nourishers') }}">Nutrihealth Nourishers</a></li>
                        <li><a href="{{ route('front.product_list') }}">Shop</a></li>
                        <li><a href="{{ route('front.blog') }}">Blog</a></li>
                        <li><a href="{{ route('front.contact') }}">Contact Us</a></li>
                        <li><a href="{{ route('front.signin') }}">Login</a></li>
                    </ul>
                </div>

                <!-- Column 2 -->
                <div class="col-md-4 column">
                    <ul>
                         <li><a href="javascript:void(0)" id="goHomeButton">Wellness Solution</a></li>
                        <li><a href="#target-section">BMI Calculator</a></li>
                        <li><a href="#target-section">BMR Calculator</a></li>
                        <li><a href="#target-section">Weight Calculator</a></li>
                        <li><a href="#target-section">Water Calculator</a></li>
                        <li><a href="{{ route('front.stress_test') }}">Stress Test</a></li>
                    </ul>
                </div>
                
                <!-- Column 3 -->
               <div class="col-md-4 column">
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Shipping Policy</a></li>
                        <li><a href="#">Refund Policy</a></li>
                        <li><a href="#">Enrol Now</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <!-- post-section end -->
</div>
    <!--site-main end-->
    
    
   

@endsection