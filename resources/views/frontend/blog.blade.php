@extends('frontend.layouts.app')
@section('title', 'Chess Blog | Chess Tips & Strategies – SR Chess Academy')
@section('keywords', 'Chess Blogs')
@section('description', 'Explore chess tips, strategies, training insights & stories in our Chess Blog. Helpful articles for beginners to advanced players.')


@section('content')

<style>
.ttm-row.our-post-section{
    margin-top:12%;
}

       /* Adjust the container to ensure proper alignment */
.ttm-row.our-post-section .container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Adjust the featured-imagebox to ensure proper spacing */
.featured-imagebox-post {
    margin-bottom: 30px;
    border: 1px solid #ddd;
    padding: 15px;
    background-color: #fff;
    transition: box-shadow 0.3s ease;
}

.featured-imagebox-post:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Ensure the image is fully responsive and centered */
.featured-thumbnail img {
    width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
}

/* Style the post title */
.featured-title h5 {
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
    margin-bottom: 10px;
    color: #333;
}

/* Adjust the date display styling */
.ttm-box-post-date {
    background-color: #57aa46;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    position: absolute;
    top: 10px;
    left: 10px;
}

.tik{
     height: 210px;
}
.tik2{
        font-size: 1.375rem;
    font-weight: 700;
    line-height: 1.875rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100%;
    margin-top: 10%;
}
.noww{
        margin-top: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.news-box {
    margin-bottom: 5px;
}

.news-box-inner {
    box-shadow: 0px 2px 18px 0px rgba(0, 0, 0, 0.3);
    padding: 25px;
    height: 385px !important;
}

/* Ensures the spacing between columns is correct */
@media (max-width: 768px) {
    .col-md-6.col-lg-4 {
        padding-left: 15px;
        padding-right: 15px;
    }
    
    .news-box-inner {
    box-shadow: 0px 2px 18px 0px rgba(0, 0, 0, 0.3);
    padding: 25px;
    height: auto !important;
}
   
}

/* Additional styling for hover effects */
.featured-title h5 a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.featured-title h5 a:hover {
    color: #57aa46;
}
@media (max-width: 576px) {
    .news-box-inner > span {
        left: 50%;
        margin-left: -4px !important;
    }
}



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
                    <img src="{{ asset('frontend/assets/srcamain/images/blog-desktop.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>

                
                <section class="top-h top-h-mobile">
                      <img src="{{ asset('frontend/assets/srcamain/images/blog-mob.webp') }}" style="width: 100%; height: auto; display: block;">
                </section>
     
     <section>
        <div class="w-100 pt-40 pb-110 position-relative">
                    <div class="container">
                        <div class="news-wrap position-relative w-100">
                            <div class="row mrg30">
                            @foreach($blogs as $list)
                                <div class="col-md-6 col-sm-6 col-lg-4">
                                    <div class="news-box w-100">
                                        <div class="news-box-inner brd-rd10 bg-color6 position-relative w-100">
                                            <span class="brd-rd5"><img class="img-fluid tik w-100 brd-rd5" src="{{ $list->blog_image }}" alt="Author Image 1"></span>
                                            <h3 class="mb-0 tik2"><a href="{{ route('front.blog.detail' , [$list->id]) }}" title="">{{ $list->name }}</a></h3>
                                            <ul class="meta mb-0 list-unstyled d-flex flex-wrap w-100">
                                                <li class="thm-clr"><a href="{{ route('front.blog.detail' , [$list->id]) }}" title="">{{ $list->created_at->format('d M Y') }}</a></li>
                                                <li><a href="{{ route('front.blog.detail' , [$list->id]) }}" title="">{{ $list->category->name ?? '' }}</a></li>
                                            </ul>
                                            <!--<p class="mb-0 noww"><?= $list->description ?></p>-->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                
                            </div>
                        </div>
                        <!-- News Wrap -->
                    </div>
        </div>

</section>
    
    

    <script>
            $(document).ready(function() {
                
                $('.show-more-btn').click(function() {
                    var $postContent = $(this).prev('.post-content');
                    $postContent.toggleClass('expanded');
                    $(this).text($postContent.hasClass('expanded') ? 'Show Less' : 'Show More');
                });
        });
    </script>

@endsection