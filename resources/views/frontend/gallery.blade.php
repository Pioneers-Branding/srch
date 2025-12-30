<style>
.cons img {
    width: 100%; /* Ensures the image takes the full width of its container */
    height: 350px; /* Set a fixed height for uniformity */
    object-fit: cover; /* Ensures the image scales properly without distortion */
    display: block; /* Removes gaps below images caused by inline elements */
}

</style>


@extends('frontend.layouts.app')
@section('title', 'Chess Gallery | Coaching, Events & Moments – SR Chess Academy')
@section('description', 'Browse our Chess Gallery featuring coaching sessions, tournament action, student highlights & memorable moments from SR Chess Academy.')


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
                    <img src="{{ asset('frontend/assets/srcamain/images/gallery-desk.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>

                
                <section class="top-h top-h-mobile">
                      <img src="{{ asset('frontend/assets/srcamain/images/gallery-mob.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>

            <!--<section class="top-h">-->
            <!--    <div class="w-100 pt-100 mt-20 black-layer opc5 pb-80 position-relative">-->
            <!--        <div class="fixed-bg" style="background-image: url('{{ asset('frontend/assets/srcamain/images/xx.avif') }}');"></div>-->
            <!--        <div class="container">-->
            <!--            <div class="page-title-wrap text-center w-100">-->
            <!--                <div class="page-title-inner d-inline-block">-->
            <!--                    <h1 class="mb-0">Gallery</h1>-->
            <!--                    <ol class="breadcrumb mb-0 justify-content-center">-->
            <!--                        <li class="breadcrumb-item"><a href="#" title="">Home</a></li>-->
            <!--                        <li class="breadcrumb-item active">Gallery </li>-->
            <!--                    </ol>-->
            <!--                </div>-->
            <!--            </div><!-- Page Title Wrap -->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->
            <section>
                <div class="w-100 pt-40 pb-110 position-relative">
                    <div class="container">
                        <div class="gallery-wrap text-center position-relative w-100">
                        <div class="row mrg10">
    @foreach($pages as $page)
        @if($page->feature_image) <!-- Ensure feature_image exists -->
            <div class="col-md-6 col-sm-6 col-lg-3 mt-3 {{ $loop->iteration >= 4 ? 'order-lg-1' : '' }}">
                <div class="gallery-box brd-rd10 position-relative overflow-hidden w-100">
                    <!-- Display the feature_image dynamically -->
                    <div class="cons">
                                <img class="img-fluid w-100" src="{{ $page->feature_image }}" alt="Gallery Image {{ $page->id }}">  
                    </div>
          
                    <div class="gallery-info position-absolute">
                       
                        <a class="d-inline-block" href=" {{ $page->feature_image }}" data-fancybox="gallery" title=""><i class="fas fa-plus"></i></a>
                    </div>
                     <h5 class="mt-4">{{ $page->name }}</h5>
                </div>
            </div>
        @endif
    @endforeach
</div>
                        </div><!-- Gallery Wrap -->
                        <div class="pagination-wrap mt-60 text-center w-100" style="display:none">
                            <div class="pagination-inner d-inline-block">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">01</a></li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0);" title="">02</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0);" title="">03</a></li>
                                    <li class="page-item next"><a class="page-link" href="javascript:void(0);" title="">Next Page<i class="fas fa-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div><!-- Pagination Wrap -->
                    </div>
                </div>
            </section>
    

@endsection