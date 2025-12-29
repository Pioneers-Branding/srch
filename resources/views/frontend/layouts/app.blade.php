<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/srcamain/images/logo-black03.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/assets/srcamain/images/logo-black03.png') }}">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/srcamain/css/all.min.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('frontend/assets/srcamain/css/animate.css') }}">-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/srcamain/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/srcamain/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/srcamain/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/srcamain/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/srcamain/css/style.css') }}?v=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/assets/srcamain/css/responsive.css') }}?v=1.0">
    <link rel="stylesheet" href="{{ asset('frontend/assets/srcamain/css/color3.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/srcamain/css/owl.css') }}">
   
    <!-- Plugin CSS -->
    
    <meta property="og:title" content="SR Chess Academy" />
<meta property="og:description" content="Boost focus, team-building, and creativity with our professional chess workshops for corporate teams." />
<meta property="og:image" content="{{ asset('frontend/assets/srcamain/images/logo-black03.png') }}" />
<!--<meta property="og:url" content="https://www.srchessacademy.com/service/corporate-and-school-workshops/corporate-workshop" />-->
<meta property="og:type" content="website" />

    
    <style>
    .custom-toast {
      max-width: 300px;
    font-size: 14px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    top: 10% !important;
    
    
}
  
</style>

   
    
    

    @stack('styles')

    <!-- Facebook Pixel -->
    <!--<script>-->
    <!--    !function(f,b,e,v,n,t,s)-->
    <!--    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?-->
    <!--    n.callMethod.apply(n,arguments):n.queue.push(arguments)};-->
    <!--    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';-->
    <!--    n.queue=[];t=b.createElement(e);t.async=!0;-->
    <!--    t.src=v;s=b.getElementsByTagName(e)[0];-->
    <!--    s.parentNode.insertBefore(t,s)}(window, document,'script',-->
    <!--    'https://connect.facebook.net/en_US/fbevents.js');-->
    <!--    fbq('init', '477379835111948');-->
    <!--    fbq('track', 'PageView');-->
    <!--</script>-->
    <!--<noscript><img height="1" width="1" style="display:none"-->
    <!--    src="https://www.facebook.com/tr?id=477379835111948&ev=PageView&noscript=1"-->
    <!--/></noscript>-->
    
 

<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '477379835111948');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=477379835111948&ev=PageView&noscript=1"
/></noscript>


    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T9BL6TMJ51"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){ dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-T9BL6TMJ51');
    </script>

    <!-- Global JS Vars -->
    <script>
        var api_url  = "{{ url('api') }}";
        var web_url  = "{{ url('/') }}";
        var csrf_token = "{{ csrf_token() }}";
        var user_id = "{{ auth()->check() ? auth()->user()->id : '' }}" ;

        var ajax_loader = `<div class="col-xl-2 col-lg-3 col-sm-6 col-md-4 margin-top-30 ">
                                <div class="animated-background">
                                    <div class="background-masker "></div>
                                </div>
                            </div>`;

        function setLoaderClasses(colClasses) {
            var $ajax_loader = $(ajax_loader);
            $ajax_loader.removeClass('col-xl-2 col-lg-3 col-sm-6 col-md-4').addClass(colClasses);
            return $ajax_loader.prop('outerHTML');
        }
    </script>

    <!-- Core JS -->
    <script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/bs5-toast/dist/bs5-toast.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('frontend/assets/js/script.js') }}?v=1.0"></script>
    <script src="{{ asset('frontend/assets/js/booking.js') }}"></script>

    <script>
        getShopCategory();
        get_banner('top');
        get_banner('bottom');
        get_banner('offer');
        getFeaturedServiceList();
        getReelsServiceList();

        $(document).ready(function () {
            @if(Session::has('cart_modal') && request()->segment(1) != 'signin')
                $('#cart_modal').modal('show');
                <?php Session::forget('cart_modal'); ?>
            @endif
        });
    </script>
</head>


<body>
    <main>
        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-54N42ZKD"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->

        @include('frontend.includes.header')
        <div class="overlays"></div>
        @yield('content')

        @include('frontend.includes.footer')

        <!-- Cloudflare Email Decode -->
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

        @stack('scripts')

        <!-- JS Scripts -->
        <script src="{{ asset('frontend/assets/srcamain/js/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/srcamain/js/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/srcamain/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/srcamain/js/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/srcamain/js/counterup.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/srcamain/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/srcamain/js/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/srcamain/js/slick.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/srcamain/js/owl.js') }}"></script>
        <script src="{{ asset('frontend/assets/srcamain/js/custom-scripts.js') }}"></script>

        <!-- Typeahead -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"></script>

        <!-- Revolution Slider (if needed) -->
        {{-- Add Revolution Slider JS here if applicable --}}
    </main>
</body>
</html>
