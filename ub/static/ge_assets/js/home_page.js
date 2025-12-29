function loadHomePageData(id, indexId) {
    $.ajax({
        url: "home-page-data?id=" + id,
        type: "get",
        async: !1,
        beforeSend: function(xhr) {
            $(".lazy-data").fadeIn("fast")
        },
        success: function(data) {
            let elem = $("#home_data");
            $(".lazy-data").fadeOut("fast", (function() {
                $(this).hide()
            })), $.each(data, function(index, val) {
                var cdn_url = val.cdn_url;
                if (val.option_name == '4 group large') {
                    if (val.four_group_large_dict_list) {
                        var four_group_large = four_group_large_dict_list(val.four_group_large_dict_list,cdn_url,indexId);
                        $(elem).append(four_group_large)
                        $('.lazy').Lazy({
                            scrollDirection: 'vertical',
                            effect: 'fadeIn',
                            visibleOnly: true,
                            onError: function(element) {
                                console.log('error loading ' + element.data('src'));
                            }
                        });
                    }
                }
                if (val.category_id && val.categories && val.categories.length > 0){
                    var productlist = '<div class="section py-lg-4 py-3 animated fadeIn" data-section-id="'+indexId+'"><div class="container"><div class="product-section"><div class="product--heading"><h2 class="category-title">'+val.category_name+'</h2> <a class="view-btn-rounded" href="/shop/'+val.slug+'">View All</a></div><div id="product-category-'+val.category_id+'" class="category-product product-card-slider owl-carousel owl-theme">'+producthtml(val.categories,cdn_url)+'</div></div></div></div>'
                    $(elem).append(productlist)
                    initialize_owl($('#product-category-'+val.category_id));
                }
                if(val.option_name == 'Featured/Trending Product'){
                    var featurestrending = '';
                    featurestrending += '<div class="section py-lg-4 animated fadeIn" data-section-id="'+indexId+'"><div class="container"><div class="position-relative bg-white text-center z-index-2"><ul class="nav nav-pills justify-content-center feature-treading" id="pills-tab" role="tablist"><li class="nav-item"> <a class="nav-link active" id="pills-one-Featured-tab" data-bs-toggle="pill" href="#pills-one-Featured" role="tab" aria-controls="pills-one-Featured" aria-selected="true">Featured</a></li><li class="nav-item"> <a class="nav-link " id="pills-two-Treading-tab" data-bs-toggle="pill" href="#pills-two-Treading" role="tab" aria-controls="pills-two-Treading" aria-selected="false">Trending</a></li></ul></div><div class="tab-content" id="pills-tabContent"><div class="tab-pane fade pt-2 show active" id="pills-one-Featured" role="tabpanel" aria-labelledby="pills-one-Featured-tab"><div id="Featured-slider" class="product-card-slider owl-carousel owl-theme">'
                    featurestrending += producthtml(val.featured_product_dict_list,cdn_url)
                    featurestrending += '</div></div><div class="tab-pane fade pt-2" id="pills-two-Treading" role="tabpanel" aria-labelledby="pills-two-Treading-tab"><div id="Treading-slider" class="product-card-slider owl-carousel owl-theme">'
                    featurestrending += producthtml(val.trending_product_dict_list,cdn_url)
                    featurestrending += '</div></div>'
                    $(elem).append(featurestrending)
                    initialize_owl($('#Featured-slider,#Treading-slider'));
                    let tabs = [
                        { target: '#pills-one-Featured', owl: '#Featured-slider' },
                        { target: '#pills-two-Treading', owl: '#Treading-slider' }
                    ];

                    // Setup 'bs.tab' event listeners for each tab
                    var init = 0;
                    tabs.forEach((tab) => {
                        $(`a[href="${tab.target}"]`)
                            .on('shown.bs.tab', () => refresh_owl($(tab.owl), init += 1))
                    });
                }
                if(val.option_name == 'Recently viewed'){
                    if (val.recent_product_dict_list && Object.keys(val.recent_product_dict_list).length > 0) {
                        var recentview = '';
                        recentview += '<div class="section py-lg-4 py-3 animated fadeIn" data-section-id="'+indexId+'"><div class="container"><div class="product-section"><div class="product--heading"><h2 class="category-title">Recently viewed</h2></div><div id="recentview" class="category-product product-card-slider owl-carousel owl-theme">'
                        recentview += producthtml(val.recent_product_dict_list,cdn_url)
                        recentview += '</div></div></div></div>'
                        $(elem).append(recentview)
                        initialize_owl($('#recentview'));
                    }else{
                        $(elem).append('<div data-section-id="'+indexId+'"></div>')
                    }
                }
                if(val.option_name == '4 group small'){
                    var smallbanner = fourBannerlistview(val.four_group_small_dict_list,cdn_url,indexId);
                    if (smallbanner) {
                        $(elem).append(smallbanner)
                        $('.lazy').Lazy({
                            scrollDirection: 'vertical',
                            effect: 'fadeIn',
                            visibleOnly: true,
                            onError: function(element) {
                                console.log('error loading ' + element.data('src'));
                            }
                        });
                    }
                }
                if (val.option_name == 'single full width') {
                    if (val.single_full_width_dict_list) {
                        $.each(val.single_full_width_dict_list,function (i,value) {
                            var fullWidthBanner = '<div class="section py-lg-2 py-3 animated fadeIn" data-section-id="'+indexId+'"><div class="container">'+singleFullBanner(value.image1,value.link1,cdn_url)+'</div></div>'
                            $(elem).append(fullWidthBanner)
                            $('.lazy').Lazy({
                                scrollDirection: 'vertical',
                                effect: 'fadeIn',
                                visibleOnly: true,
                                onError: function(element) {
                                    console.log('error loading ' + element.data('src'));
                                }
                            });
                        })
                    }
                }
                if (val.option_name == 'single large'){
                    if (val.single_large_dict_list){
                        $.each(val.single_large_dict_list,function (i,value) {
                            var signleBanner = singlelargeBanner(value.image1,value.link1,cdn_url,indexId)
                            $(elem).append(signleBanner)
                            $('.lazy').Lazy({
                                scrollDirection: 'vertical',
                                effect: 'fadeIn',
                                visibleOnly: true,
                                onError: function(element) {
                                    console.log('error loading ' + element.data('src'));
                                }
                            });
                        });
                    }
                }
                if (val.option_name == 'Company UPS') {
                    var uspsection = '<div class="section py-lg-4 py-3 bg-soft-light animated fadeIn" data-section-id="'+indexId+'"><div class="container">';
                    if (val.home_videos) {
                        uspsection += '<div class="product-explore-section"><div class="row"><div class="col-lg-12 col-md-12"><div class="explore-product bg-white position-relative overflow-hidden"><div id="video-gallery" class="royalSlider videoGallery rsDefault">'
                        uspsection += homeVideo(val.home_videos,cdn_url)
                        uspsection += '</div></div></div></div></div>'

                    }
                    uspsection += usp+'</div></div>'
                    $(elem).append(uspsection);$('.lazy').Lazy({
                        // your configuration goes here
                        scrollDirection: 'vertical',
                        effect: 'fadeIn',
                        visibleOnly: true,
                        onError: function(element) {
                            console.log('error loading ' + element.data('src'));
                        }
                    });
                     if ($('#video-gallery').length) {
                        $("#video-gallery").royalSlider({arrowsNav:false,fadeinLoadedSlide:true,controlNavigationSpacing:0,controlNavigation:"thumbnails",thumbs:{autoCenter:false,fitInViewport:true,orientation:"vertical",spacing:0,paddingBottom:0},keyboardNavEnabled:true,imageScaleMode:"fill",imageAlignCenter:true,slidesSpacing:0,loop:false,loopRewind:true,numImagesToPreload:3,video:{autoHideArrows:true,autoHideControlNav:false,autoHideBlocks:true},autoScaleSlider:true,autoScaleSliderWidth:960,autoScaleSliderHeight:450,imgWidth:640,imgHeight:360});
                     }
                }
                if (val.option_name == 'Top Brands' && val.top_brands_dict_list && Object.keys(val.top_brands_dict_list).length > 0){
                    var topBrand = topbrand(val.top_brands_dict_list,cdn_url,indexId);
                    $(elem).append(topBrand)
                    $(".top-brand-slide").owlCarousel({loop:!0,margin:10,nav:!0,lazyLoad:!0,dots:!1,navText:['<i class="bi bi-chevron-left"></i>','<i class="bi bi-chevron-right"></i>'],autoplay:!0,autoplaySpeed:3e3,responsiveClass:!0,responsive:{0:{items:3,nav:!1},600:{items:4,nav:!0},1000:{items:6,nav:!0,loop:!0},1600:{items:7,nav:!0,loop:!0}}});
                }
            });
        }
    })
}
get_compare_product(), get_wishlist_product();
var visited_data = []

var home_data = JSON.parse(JSON.stringify($('#home_data').data('id')));
var home_page_id = getId();

loadHomePageData(home_page_id, null)

function getId() {
    var index = "";
    let count = 0;
    for (const value of home_data) {
        if (!visited_data.includes(value.id) && count < home_data.length - 1){
            visited_data.push(value.id);
            index = home_data[count + 1].id
            return index
        }
        count += 1
    }
    return index
}
$(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - $('footer').height() &&
        visited_data.length < (home_data.length - 1)) {
        home_page_id = getId()
        loadHomePageData(home_page_id, null);
        get_compare_product();
        get_wishlist_product();
    }
});
