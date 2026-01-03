<style>
   .social-media-icons {
   position: fixed;
   right: 2%;
   top: 50% !important;
   transform: translateY(-50%);
   z-index: 1000;
   }
   .social-icon {
   display: block;
   margin: 10px 0;
   background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739)  !important;
   border-radius: 50%;
   width: 35px;
   height: 35px;
   line-height: 25px; 
   text-align: center;
   color: #000;
   /* font-size: 24px; */
   transition: background-color 0.3s, transform 0.3s;
   margin-bottom: -7px !important;
   }
   .asaa i {
   font-size: 30px !important;
   }
   .social-icon {
   padding-top: 8px;
   }
 
 .view-cart{
     color: #fcd739;
    padding: 13px 7px;
    border-radius: 5px;
    position: relative;
    top: 34px;
    left: 24px;
    /*background-image: linear-gradient(to top, #ffb000, #feba13, #fec421, #fdce2d, #fcd739) !important;*/
 }
 
.yess {
    padding: 12px 13px !important;
}
   
 .yee a {
    top: 12px !important;
    left: -9px !important;
}
   
 .user-profile-container {
  
    left: 25px;
}

</style>


<div id="preloader">
            <div class="preloader-inner">
                <img src="{{asset('frontend/assets/srcamain/images/logo-black03.png')}}" alt="" style="padding: 10px;">
            </div>
        </div>
        
        <div class="social-media ">
         <div class="social-media-icons ">     
            <a href="https://www.facebook.com/profile.php?id=61559885038853" target="_blank" class="social-icon facebook tk mobile" aria-label="Facebook">
            <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://x.com/ChessShivi46473?t=T63X2qFgay2WqroAs7amsw&s=09" target="_blank" class="social-icon twitter tk mobile" aria-label="Twitter">
            <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com/srca_chessmentors/" target="_blank" class="social-icon instagram tk mobile" aria-label="Instagram">
            <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.linkedin.com/company/sr-chess-academy/" target="_blank" class="social-icon linkedin tk mobile" aria-label="LinkedIn">
            <i class="fab fa-linkedin-in"></i>
            </a>  
            <a href="https://youtu.be/39wamHswcB8" target="_blank" class="social-icon youtube tk mobile" aria-label="YouTube">
            <i class="fab fa-youtube"></i>
            </a>
            <a href="https://api.whatsapp.com/send?phone=917042854007" target="_blank" class="social-icon whatsapp tk mobile" aria-label="WhatsApp">
            <i class="fab fa-whatsapp"></i>
            </a>      
         </div>
</div>
 <!--Page Loader -->
<?php
   use Modules\Category\Models\Category;
   $categories = Category::where('status', 1)->whereNull('parent_id') ->get();
   ?>
<header class="style3 w-100">
   <div class="logo-menu-wrap position-relative w-100">
      <div class="container">
         <div
            class="logo-menu-inner d-flex flex-wrap align-items-center justify-content-between position-relative w-100">
            <div class="logo v2 z1  position-absolute text-center">
               <h1 class="mb-0">
                  <a class="d-block" href="{{ route('front.index') }}" title="Home">
                  <img class="img-fluid logo-w" src="{{asset('frontend/assets/srcamain/images/logo-black03.png')}}" 
                     alt="Logo">
                  </a>
               </h1>
            </div>
            <!-- Logo -->
            <nav class="d-flex flex-wrap align-items-center justify-content-between w-100">
               <div class="header-left">
                  <ul class="mb-0 list-unstyled d-inline-flex ita">
                    
                     <li class="menu-item-has-children">
                        <a href="#" title="">Academy</a>
                        <ul class="mb-0 list-unstyled">
                           <li><a href="{{ route('front.about') }}" title="">About us</a></li>
                           <li><a href="{{ route('front.coaches') }}" title="">Coaches</a></li>
                           <li><a href="{{ route('front.testimonials') }}" title="">Testimonials</a></li>
                        </ul>
                     </li>
                     <li class="menu-item-has-children">
                        <a href="#" title="">Services</a>
                        <ul class="mb-0 list-unstyled">
                           <li><a href="{{ route('front.coaching') }}" title="">Coaching</a></li>
                           <li><a href="{{ route('front.chess-consultation') }}" title="">⁠Chess Consultation</a></li>
                           <li><a href="{{ route('front.workshops') }}" title="Corporate and School workshops">Corporate and School Workshops </a></li>
                           <li><a href="{{ route('front.media_management') }}" title="Social Media Management">Chess Climb Media</a></li>
                           
                        </ul>
                     </li>
                     <li><a href="{{ route('front.chess-coffee-connect') }}" title="">Chess Coffee Connect </a></li>
                     <li><a href="{{ route('front.blog') }}" title=""> Blog</a></li>
                     <li><a href="{{ route('front.gallery') }}" title=""> Gallery</a></li>
                    <li class=""><a href="{{ route('front.faq') }}" title="">FAQs </a> </li>
                     <li><a href="{{ route('front.product_list') }}" title="">Shop</a></li>
                     <li class=""><a href="{{ route('front.contact') }}" title="">Contact Us </a> </li>
                     <div class="add-to-cart-btn1">
                                                    <a href="{{ route('front.cart') }}" class="cart-icon-wrapper1 view-cart" href="javascript:void(0)">
                                                        <i class="fas fa-shopping-cart cart-icon1"></i>
                                                        <span class="cart-count1">0</span>
                                                    </a>
                                                </div>
                     
                  </ul>
               </div>
               <div class="header-right d-inline-flex flex-wrap align-items-center"
                  style="margin-left: -309px;">
                  <ul class="social-icons">
                     @if(Auth::check() && !auth()->user()->hasRole('admin'))
                     @php
                     $user = Auth::user();
                     @endphp
                     <div class="user-profile-container">
                        <div class="profile-image-container" id="profileImage_Container">
                           <img src="{{ $user->profile_image }}" alt="User Profile Image" class="profile-image">
                        </div>
                        <span class="profile-name">{{ $user->first_name }}</span>
                        <div class="profile-popup" id="profile_Popup">
                           <!--<a href="{{ route('front.user_profile') }}" class="profile-popup-link xp">View Profile</a>-->
                           <a href="#" class="thm-btn v2 tok scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden" id="logoutBtn">Logout</a>
                        </div>
                     </div>
                     @else
                     <a href="{{ url('signin') }}" class="thm-btn v2 tok scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden">LOGIN</a>
                     @endif
                  </ul>
               </div>
            </nav>
            <!-- Navigation -->
         </div>
      </div>
   </div>
   <!-- Logo & Menu Wrap -->
</header>
<!-- Header -->
<div class="header-search d-flex flex-wrap align-items-center position-fixed w-100">
   <span class="search-close-btn position-absolute"><i class="fas fa-times"></i></span>
   <form class="w-100 position-relative">
      <button type="submit"><i class="fas fa-search"></i></button>
      <input type="text" placeholder="Search">
   </form>
</div>
<!-- Header Search -->
<div class="sticky-menu">
   <div class="container">
      <div class="sticky-menu-inner d-flex flex-wrap align-items-center justify-content-between w-100">
         <div class="logo">
            <h1 class="mb-0"><a class="d-block" href="{{ route('front.index') }}" title="Home"><img class="img-fluid logo-w"
               src="{{asset('frontend/assets/srcamain/images/logo-black03.png')}}" alt="Logo"
               ></a></h1>
         </div>
         <!-- Logo -->
         <nav class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="header-left">
               <ul class="mb-0 list-unstyled d-inline-flex ita">
                 
                  <li class="menu-item-has-children">
                     <a href="#" title="">Academy</a>
                     <ul class="mb-0 list-unstyled">
                        <li><a href="{{ route('front.about') }}" title="">About us</a></li>
                        <li><a href="{{ route('front.coaches') }}" title="">Coaches</a></li>
                        <li><a href="{{ route('front.testimonials') }}" title="">Testimonials</a></li>
                     </ul>
                  </li>
                  <li class="menu-item-has-children">
                     <a href="#" title="">Services</a>
                     <ul class="mb-0 list-unstyled">
                        <li><a href="{{ route('front.coaching') }}" title="">Coaching</a></li>
                        <li><a href="{{ route('front.chess-consultation') }}" title="">⁠Chess Consultation</a></li>
                        <li><a href="{{ route('front.workshops') }}" title="Corporate and School workshops">Corporate and School workshops </a></li>
                        <li><a href="{{ route('front.media_management') }}" title="Social Media Management">Chess Climb Media</a></li>
                           
                     </ul>
                  </li>
                  <li><a href="{{ route('front.chess-coffee-connect') }}" title="">Chess Coffee Connect </a></li>
                  <li><a href="{{ route('front.blog') }}" title=""> Blog</a></li>
                  <li><a href="{{ route('front.gallery') }}" title=""> Gallery</a></li>
                  <li><a href="{{ route('front.product_list') }}" title="">Shop</a></li>
                  <li class=""><a href="{{ route('front.faq') }}" title="">FAQs </a> </li>
                  <li class=""><a href="{{ route('front.contact') }}" title="">Contact Us </a> </li>
                  <div class="add-to-cart-btn1 yee">
                                                    <a href="{{ route('front.cart') }}" class="cart-icon-wrapper1 view-cart" href="javascript:void(0)">
                                                        <i class="fas fa-shopping-cart cart-icon1"></i>
                                                        <span class="cart-count1">0</span>
                                                    </a>
                                                </div>
                  
               </ul>
            </div>
         </nav>
               <div class="header-right d-inline-flex flex-wrap align-items-center"
                  style="margin-left: -309px;">
                  <ul class="social-icons">
                     @if(Auth::check() && !auth()->user()->hasRole('admin'))
                     @php
                     $user = Auth::user();
                     @endphp
                     <div class="user-profile-container">
                        <div class="profile-image-container" id="profileImage_Container">
                           <img src="{{ $user->profile_image }}" alt="User Profile Image" class="profile-image">
                        </div>
                        <span class="profile-name">{{ $user->first_name  }}</span>
                        <div class="profile-popup" id="profile_Popup">
                           <!--<a href="{{ route('front.user_profile') }}" class="profile-popup-link xp">View Profile</a>-->
                           <a href="#" class="thm-btn v2 tok scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden yess" id="logoutBtn">Logout</a>
                        </div>
                     </div>
                     @else
                     <a href="{{ url('signin') }}" class="thm-btn v2 tok scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden yess">LOGIN</a>
                     @endif
                  </ul>
               </div>
      </div>
   </div>
</div>
<!-- Sticky Menu -->
<div class="rspn-hdr">
   <div class="rspn-mdbr">
      <div class="rspn-scil d-inline-flex flex-wrap">
         <a class="twitter-hvr" href="https://twitter.com/" title="Twtiiter" target="_blank"><i
            class="fab fa-twitter"></i></a>
         <a class="facebook-hvr" href="https://www.facebook.com/" title="Facebook" target="_blank"><i
            class="fab fa-facebook-f"></i></a>
         <a class="youtube-hvr" href="https://youtu.be/39wamHswcB8" title="Youtube" target="_blank"><i
            class="fab fa-youtube"></i></a>
         <a class="linkedin-hvr" href="https://www.linkedin.com/" title="Linkedin" target="_blank"><i
            class="fab fa-linkedin-in"></i></a>
      </div>
      <form class="rspn-srch">
         <input type="text" placeholder="Enter Your Keyword">
         <button type="submit"><i class="fa fa-search"></i></button>
      </form>
   </div>
   <div class="lg-mn">
      <div class="logo">
         <h1 class="mb-0 d-block"><a href="{{ route('front.index') }}" title="Home"><img
            src="{{asset('frontend/assets/srcamain/images/logo-black03.png')}}" alt="Logo" style="width: 100px;"></a></h1>
      </div>
      <div class="rspn-cnt">
         <span><i class="thm-clr far fa-envelope"></i><a href="mailto:enquiries.srca@gmail.com "
            title="">enquiries.srca@gmail.com </a></span>
         <span><i class="thm-clr fas fa-phone-alt"></i>+91 7042854007</span>
      </div>
      <span class="rspn-mnu-btn"><i class="fa fa-list-ul"></i></span>
   </div>
   <div class="rsnp-mnu">
      <span class="rspn-mnu-cls"><i class="fa fa-times"></i></span>
      <ul class="mb-0 list-unstyled w-100">
         <!-- <li class="active"><a href="javascript:void(0);" title="">Home</a>
            </li> -->
      
         <li class="menu-item-has-children">
            <a href="#" title="">Academy</a>
            <ul class="mb-0 list-unstyled">
               <li><a href="{{ route('front.about') }}" title="">About us</a></li>
               <li><a href="{{ route('front.coaches') }}" title="">Coaches</a></li>
               <li><a href="{{ route('front.testimonials') }}" title="">Testimonials</a></li>
            </ul>
         </li>
         </li>
         <li class="menu-item-has-children">
            <a href="#" title="">Services</a>
            <ul class="mb-0 list-unstyled">
               <li><a href="{{ route('front.coaching') }}" title="">Coaching</a></li>
               <li><a href="{{ route('front.chess-consultation') }}" title="">⁠Chess Consultation</a></li>
               <li><a href="{{ route('front.workshops') }}" title="Corporate and School workshops">Corporate and School workshops </a></li>
               <li><a href="{{ route('front.media_management') }}" title="Social Media Management">Chess Climb Media</a></li>
                           
            </ul>
         </li>
         <li><a href="{{ route('front.chess-coffee-connect') }}" title="">Chess Coffee Connect </a></li>
         <li><a href="{{ route('front.blog') }}" title=""> Blog</a></li>
         <li><a href="{{ route('front.gallery') }}" title=""> Gallery</a></li>
         <li><a href="{{ route('front.product_list') }}" title="">Shop</a></li>
         <li class=""><a href="{{ route('front.faq') }}" title="">FAQs </a> </li>
         <li class=""><a href="{{ route('front.contact') }}" title="">Contact Us </a> </li>
      </ul>
      <div class="add-to-cart-btn1">
        <a href="{{ route('front.cart') }}" class="cart-icon-wrapper1 view-cart" href="javascript:void(0)">
            <i class="fas fa-shopping-cart cart-icon1"></i>
            <span class="cart-count1">0</span>
        </a>
    </div>
            <div class="header-right d-inline-flex flex-wrap align-items-center" style="margin-top:40px">
                  <ul class="social-icons">
                     @if(Auth::check() && !auth()->user()->hasRole('admin'))
                     @php
                     $user = Auth::user();
                     @endphp
                     <div class="user-profile-container">
                        <div class="profile-image-container" id="profileImage_Container">
                           <img src="{{ $user->profile_image }}" alt="User Profile Image" class="profile-image">
                        </div> <br>
                        <span class="profile-name">{{ $user->first_name }}</span>
                        <div class="profile-popup" id="profile_Popup">
                           <!--<a href="{{ route('front.user_profile') }}" class="profile-popup-link xp">View Profile</a>-->
                           <a href="#" class="thm-btn v2 tok scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden" id="logoutBtn">Logout</a>
                        </div>
                     </div>
                     @else
                     <a href="{{ url('signin') }}" class="thm-btn v2 tok scndry-bg brd-rd5 d-inline-block position-relative overflow-hidden">LOGIN</a>
                     @endif
                  </ul>
            </div>
   </div>
   <!-- Responsive Menu -->
</div>
<!-- Responsive Header -->
<!--start-->


<script>
   var navItems = document.querySelectorAll(".mobile-bottom-nav__item");
   navItems.forEach(function(e, i) {
       e.addEventListener("click", function(e) {
           navItems.forEach(function(e2, i2) {
               e2.classList.remove("mobile-bottom-nav__item--active");
           })
           this.classList.add("mobile-bottom-nav__item--active");
       });
   });
</script>
<script>
   $(document).ready(function() {
   $('#logoutBtn').click(function(event) {
   event.preventDefault();
   // alert();
   
   $.ajax({
       url: "{{ url('api/logout') }}",
       method: 'GET',
       dataType:'json',
       success: function(response) {
           // Handle successful logout response
           console.log("Logout successful");
           
            if(response.status) {
                // Optionally, redirect to another page
           window.location.href = "{{ url('home') }}"; // Redirect to home page
            }
           
       },
       error: function(xhr, status, error) {
           // Handle error
           console.log("Logout failed:", error);
       }
   });
   });
   });
   
</script>
<script>
   $(document).ready(function() {
   $('#logoutBtnmobile').click(function(event) {
   event.preventDefault();
   // alert();
   
   $.ajax({
       url: "{{ url('api/logout') }}",
       method: 'GET',
       dataType:'json',
       success: function(response) {
           // Handle successful logout response
           console.log("Logout successful");
           
            if(response.status) {
                // Optionally, redirect to another page
           window.location.href = "{{ url('home') }}"; // Redirect to home page
            }
           
       },
       error: function(xhr, status, error) {
           // Handle error
           console.log("Logout failed:", error);
       }
   });
   });
   });
   
</script>
<script>
   $(document).ready(function(){
       $('#searchInput').on('input', function(){
           var searchText = $(this).val().toLowerCase();
           var $searchResultsDropdown = $('#searchResultsDropdown');
           $searchResultsDropdown.empty();
           if(searchText.length > 0){
               $.ajax({
                   url: api_url + '/service-list', 
                   method: 'GET',
                   data: {
                       search: searchText
                   },
                   
                   success: function(res) {
                       $searchResultsDropdown.empty();
                       if (res.data.length > 0) {
                           
                           $.each(res.data, function(index, item) {
                               $searchResultsDropdown.append(`<li class="service-detail-btn"
                            data-steps="${item.steps}" data-id="${item.id}" data-title="${item.name}"  data-service_image="${item.service_image}" data-default_price="${item.default_price}" data-description="${item.description}" data-duration_min="${item.duration_min}"><a href="#">${item.name}</a></li>`);
                           });
                           $searchResultsDropdown.show();
                       } else {
                           $searchResultsDropdown.hide();
                       }
                   },
                   error: function() {
                       console.error('Error fetching data from the server.');
                   }
               });
           } else {
               $searchResultsDropdown.hide();
           }
       });
       
       $('#searchInput').typeahead({
         source: function(query, result) {
           $.ajax({
             url: api_url + '/service-list',
             method: 'GET',
             data: { search: query },
             dataType: 'json',
             success: function(res) {
               var formattedData = res.data.map(function(item) {
                 return {
                   id: item.id,
                   name: item.name,
                   steps: item.steps,
                   service_image: item.service_image,
                   default_price: item.default_price,
                   description: item.description,
                   duration_min: item.duration_min
                 };
               });
               result(formattedData);
             }
           });
         },
         display: function(item) {
           return item.name;
         },
        
       }).on('typeahead:select', function(event, suggestion) {
         
         console.log('Selected suggestion:', suggestion);
         
       });
       $(document).on('click', function(event) {
           if (!$(event.target).closest('.search-container').length) {
               $('#searchResultsDropdown').hide();
           }
       });
   
       $('#searchResultsDropdown').on('click', function(event) {
           event.stopPropagation();
       });
   });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener('load', function() {
        var preloader = document.getElementById('preloader');
        if (preloader) {
            // Delay hiding by 1.5 seconds (1500 milliseconds)
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 3000);
        }
    });
});
</script>

<script>
   document.addEventListener('DOMContentLoaded', function() {
       var currentUrl = window.location.href;
       var menuItems = document.querySelectorAll('.menu-item a');
   
       menuItems.forEach(function(link) {
           var linkHref = link.getAttribute('href');
           var linkUrl = new URL(linkHref, window.location.origin).href;
   
           if (currentUrl === linkUrl) {
               link.parentElement.classList.add('current');
           } else {
               link.parentElement.classList.remove('current');
           }
       });
   });
</script>