@extends('frontend.layouts.app')
@section('title', 'Chess Consultation | Personalized Chess Guidance – SR Chess Academy')
@section('keywords', 'chess consultation, chess coaching consultation, chess training consultation')
@section('description', 'Book a personalized chess consultation with expert coaches at SR Chess Academy. Get the right guidance, assessment & training roadmap.')

@section('content')
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
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
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
            margin-top: 2%;
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
               .top-h-mobile{
        display:block !important; 
     }
     .top-h-desktop{
              display:none  !important;   
     }
        }
    </style>
   


 <section class="top-h top-h-desktop">
    <img 
        src="{{ asset('frontend/assets/srcamain/images/chess-consultent.webp') }}" 
        alt="" 
        style="width: 100%; height: auto; display: block;"
    >
</section>

                
                  <section class="top-h top-h-mobile">
                      <img 
        src="{{ asset('frontend/assets/srcamain/images/chess-consultent-mob.webp') }}" 
        alt="" 
        style="width: 100%; height: auto; display: block;"
    >
                   
                </section>



        <section>
            <div class="container too">
             <!-- First section: Image on the left, content on the right -->
                @if($services->isEmpty())
                    <p>No services available for this category.</p>
                @else
                    @foreach($services as $service)
                        <div class="row">
                            <div class="col-lg-6 image-container">
                                <img src="{{ asset($service->feature_image) }}" 
                                     alt="{{ $service->name }}">
                            </div>
                            <div class="col-lg-6 content-container">
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


