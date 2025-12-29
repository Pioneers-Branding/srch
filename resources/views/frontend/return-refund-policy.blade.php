@extends('frontend.layouts.app')
@section('title') {{ 'Product list' }} @endsection
@section('content')
   
    <section class="top-h">
            <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">
                <div class="fixed-bg" style="background-image: url(assets/images/pag-top-bg.jpg);"></div>
                <div class="container">
                    <div class="page-title-wrap text-center w-100">
                        <div class="page-title-inner d-inline-block">
                            <h1 class="mb-0">Return & Refund Policy</h1>
                            <ol class="breadcrumb mb-0 justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('front.index') }}" title="">Home</a></li>
                                <li class="breadcrumb-item active">Return & Refund Policy</li>
                            </ol>
                        </div>
                    </div><!-- Page Title Wrap -->
                </div>
            </div>
        </section>
 <!--<section>-->
 <!--            <div class="container prt mt-5 mb-5">-->
        <!-- <h1>Returns and Refunds Policy</h1> -->
        <!--<p>Last updated: <strong>September 26, 2024</strong></p>-->
        
 <!--       <h2>1. Overview</h2>-->
 <!--       <p>At Chess Academy, we strive to provide the best experience for our students. If you are not satisfied with your purchase, please review our return and refund policy below.</p>-->
        
 <!--       <h2>2. Eligibility for Refunds</h2>-->
 <!--       <p>Refunds are available for:</p>-->
 <!--       <ul>-->
 <!--           <li>Classes that are canceled at least 48 hours in advance.</li>-->
 <!--           <li>Materials purchased that are defective or damaged upon arrival.</li>-->
 <!--       </ul>-->
        
 <!--       <h2>3. Non-Refundable Items</h2>-->
 <!--       <p>The following items are non-refundable:</p>-->
 <!--       <ul>-->
 <!--           <li>Online classes that have already taken place.</li>-->
 <!--           <li>Membership fees for ongoing courses.</li>-->
 <!--           <li>Merchandise that has been opened or used.</li>-->
 <!--       </ul>-->
        
 <!--       <h2>4. Requesting a Refund</h2>-->
 <!--       <p>To request a refund, please follow these steps:</p>-->
 <!--       <ul>-->
 <!--           <li>Contact us within 14 days of the purchase date.</li>-->
 <!--           <li>Provide your order number and details about the item(s) you wish to return.</li>-->
 <!--           <li>Follow any instructions we provide to complete your return.</li>-->
 <!--       </ul>-->
        
 <!--       <h2>5. Processing Refunds</h2>-->
 <!--       <p>Once your return is received and inspected, we will notify you of the approval or rejection of your refund. If approved, your refund will be processed, and a credit will automatically be applied to your original payment method within a certain amount of days.</p>-->
        
 <!--       <h2>6. Contact Us</h2>-->
 <!--       <p>If you have any questions or concerns regarding our Returns and Refunds Policy, please reach out to us.</p>-->
 <!--   </div>-->
 <!--       </section>-->
       
     <section style="padding: 20px; background-color: #f9f9f9;">
  <div class="container prt mt-5 mb-5"
       style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

    <h2 style="margin-top: 20px; margin-bottom: 10px;">1. Overview</h2>
    <p style="line-height: 1.6;">
      At SR Chess Academy (SRCA), we are committed to delivering high-quality chess education,
      offline chess classes, and community-driven chess events. Please review our return and
      refund policy below related to chess classes, Chess Coffee Connect (CCC) events, and merchandise.
    </p>

    <h2 style="margin-top: 20px; margin-bottom: 10px;">2. Chess Classes</h2>
    <ul style="padding-left: 20px; line-height: 1.6;">
      <li>All chess class fees are non-refundable.</li>
      <li>Missed chess classes may be rescheduled or adjusted after discussion with your respective chess coach.</li>
    </ul>

    <h2 style="margin-top: 20px; margin-bottom: 10px;">3. Chess Coffee Connect (CCC) Events</h2>
    <ul style="padding-left: 20px; line-height: 1.6;">
      <li>Fees for weekend café chess events may be adjusted if a valid reason is provided.</li>
      <li>Participants must contact us in advance to discuss any adjustments.</li>
      <li>Bigger Rapid Chess Tournaments with 50 or more participants are non-refundable and non-adjustable.</li>
    </ul>

    <h2 style="margin-top: 20px; margin-bottom: 10px;">4. Merchandise</h2>
    <ul style="padding-left: 20px; line-height: 1.6;">
      <li>Refunds are not available for chess merchandise unless items are defective or damaged upon delivery.</li>
      <li>Exchanges are permitted for chess boards, chess clocks, and related accessories.</li>
    </ul>

    <h2 style="margin-top: 20px; margin-bottom: 10px;">5. Requesting Adjustments or Returns</h2>
    <ul style="padding-left: 20px; line-height: 1.6;">
      <li>Contact us within 14 days of purchase with your order or registration details.</li>
      <li>Provide relevant information about the chess class, event, or merchandise.</li>
      <li>Follow the instructions provided by our team to complete the adjustment or exchange process.</li>
    </ul>

    <h2 style="margin-top: 20px; margin-bottom: 10px;">6. Processing Adjustments and Refunds</h2>
    <p style="line-height: 1.6;">
      Once your request is reviewed, we will notify you of approval or rejection.
      If approved, adjustments will be made or refunds processed to the original
      payment method within a reasonable period.
    </p>

    <h2 style="margin-top: 20px; margin-bottom: 10px;">7. Contact Us</h2>
    <p style="line-height: 1.6;">
      For any questions or concerns regarding our return and refund policy, please
      contact us at <strong><a href="tel:9599692366">9599692366</a></strong> or through our official communication channels.
    </p>

  </div>
</section>



       
@endsection