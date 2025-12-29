@extends('frontend.layouts.app')
@section('title') {{ 'blog-detail' }} @endsection


<style>
    .featured-thumbnail img {
    display: block;
    margin: 0 auto; /* Center the image */
    max-width: 100%; /* Make the image responsive */
    height: auto;
}
.content-area {
    padding: 20px; /* Add some padding around the content */
}
.ttm-box-post-date {
    /*background-color: #f0f0f0; */
    padding: 10px;
    border-radius: 5px;
    font-weight: bold;
}
.ttm-blog-classic-content p {
    padding: 15px;
    font-size: 16px;
    line-height: 1.6;
    color: #333; /* Adjust text color for better readability */
}
.featured-thumbnail img {
   /*border-radius: 10px;*/
    width: 80% !important;
    height: 50%;
    -o-object-fit: cover;
    
    object-fit: cover; /* Ensures the image covers the specified dimensions */
    display: block;
    margin-top: 20%; /* Centers the image horizontally */
}

.ql-align-center{
    display:none !important;
}
p br{
    display:none !important;
}

.post-detail > p + p {
    margin-top:2px !important;
}

</style>

@section('content')
<section class="top-h">
            <div class="w-100 pt-100 black-layer opc5 pb-80 position-relative">
                <div class="fixed-bg" style="background-image: url(assets/images/pag-top-bg.jpg);"></div>
                <div class="container">
                    <div class="page-title-wrap text-center w-100">
                        <div class="page-title-inner d-inline-block">
                            <h1 class="mb-0">{{ $blog->name }}</h1>
                            <ol class="breadcrumb mb-0 justify-content-center">
                                <li class="breadcrumb-item"><a href="#" title="">Home</a></li>
                                <li class="breadcrumb-item active">Blog Details</li>
                            </ol>
                        </div>
                    </div><!-- Page Title Wrap -->
                </div>
            </div>

            <section>
                <div class="w-100 pt-90 pb-90 position-relative">
                    <div class="container">
                        <div class="page-wrap position-relative w-100">
                            <div class="row mrg30">
                                <div class="col-md-12 col-sm-12 col-lg-9" style="margin: auto;">
                                    <div class="post-detail w-100">
                                        <div class="post-feat-img serv-detail-img brd-rd10 position-relative overflow-hidden w-100">
                                            <img class="img-fluid w-100" src="{{ $blog->blog_image}}" alt="Service Detail Image">
                                            <span class="brd-rd10 thm-bg serv-post-date position-absolute"> {{ $blog->created_at->format('d M Y') }}</span>
                                            <span class="serv-post-authr position-absolute"><i class="fas fa-user thm-clr"></i><a href="#" title="">{{ $list->category->name ?? '' }}</a></span>
                                        </div>
                                        <div class="post-detail-meta-wrap d-flex flex-wrap justify-content-between align-items-center w-100">
                                            <ul class="meta3 mb-0 d-inline-flex flex-wrap list-unstyled">
                                                <li><i class="fas fa-tag thm-clr"></i><a href="javascript:void(0);" title=""> {{ $blog->name }}</a></li>
                                            </ul>
                                            
                                        </div>
                                        <p><?= $blog->description ?></p>
                                       
                                    </div>
                                </div>
                             
                            </div>
                        </div><!-- Page Wrap -->
                    </div>
                </div>
            </section>
</section>
@endsection