


$(document).ready(function(){
    getCategory();
    getCurrency();
    getHomeCategory();
    getChildCategory();
    getSearchServiceList();
    
var currencySign = '';
var currencyCode = '';
var thousand_separator = ',';
var no_of_decimal = 2;
    
function getCurrency(){
    
    $.ajax({
        url: api_url + '/app-configuration',
        method: 'GET',
        dataType: 'json',
        success: function(res) {

         currencySign = res.currency.currency_symbol;
         currencyCode = res.currency.currency_code
         thousand_separator = res.currency.thousand_separator; 
         no_of_decimal  = res.currency.no_of_decimal;
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}

function convertAmount(amount){
    amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, thousand_separator);
    return currencySign +' ' + amount.toFixed(no_of_decimal)
}

// this function for get category 
function getCategory() {
    $.ajax({
        url: api_url + '/category-list',
        method: 'GET',
        dataType: 'json',
        success: function(res) {

            if (res.data && res.data.length > 0) { 
                 var html = ``;
               $.each(res.data, function(index, value) {
                    
                    html += `<img src="${value.category_image}" alt="">`;
                });
                $('#category').html(html);
                
            }
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}
// this function for get child category 
function getChildCategory(category_id ,sub_category_id) {
    if (category_id,sub_category_id) {
    $.ajax({
        url: api_url + '/childcategory-list-by-sub-category',
        method: 'GET',
        data:{ category_id : category_id,sub_category_id: sub_category_id},
        dataType: 'json',
        success: function(res) {

            if (res.data && res.data.length > 0) { 
                var html = `<div class="row">`;
                var child_category = '';
                
                $.each(res.data, function(index, value) {
                    html += `<div class="col-xl-3 col-md-4 col-sm-6 margin-top-30 category-child">
                              <div class="single-category style-02 wow fadeInUp" data-wow-delay=".2s">
                                <div class="icon">
                                    <img src="${value.category_image}" alt>
                                </div>
                        <div class="category-contents">
                           <h4 class="category-title"> <a href="javascript:void(0)">${value.name}</a> </h4>
                       </div>
                 </div>
               </div>`;
                });

                html += `</div>`;
                $('#child-category').html(child_category);
            }
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}
}

// this function for click on category show subcategory popup
$(document).on("click",".click_category",function(e) {
    e.preventDefault();
    
    var category_banner_img = $(this).attr('data-banner-image');
    
    var category_title = $(this).attr('data-name');
    
    var category_id = $(this).attr('data-category_id');
    
    $('#category_banner_img').attr('src' , category_banner_img);
    
    $('.category_modal_title').text(category_title);
    
    get_subcategory(category_id);
  
    $('#categoryModal').modal('show');
});

// this function for get subcategory by category 
function get_subcategory(category_id){
    
    if (category_id) {
    
      $.ajax({
        url: api_url + '/category-list',
        method: 'GET',
        data:{ category_id : category_id},
        dataType: 'json',
        success: function(res) {
               $('#modal_subcategory').html('')
            if (res.data && res.data.length > 0) { 
                var html = ``;
    
                $.each(res.data, function(index, value) {
                    
                    var service_url = web_url + '/service/'+category_id + '/' + value.id;
                    
                    html += `<div class="mod">
                              <a href="${service_url}">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="img-k">
                                            <img src="${value.category_image}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <h1>${value.name}</h1>
                                        <!-- <span class="s1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="50 " style="color: green;" fill="currentColor"
                                                class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                                <path
                                                    d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z" />
                                            </svg></span> <span>ECONOMICAL</span>
                                            <p>VLCC | RICHELON | CRAVE</p> -->
                                    </div>
                                </div>
                              </a>     
                            </div>`;
                    
                });

                $('#modal_subcategory').html(html);
            }
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
    }
}


// this function for get Featured Services
function getSearchServiceList() {
   
    $.ajax({
        url: api_url + '/service-list',
        method: 'GET',
        data:{ featured :1 },
        dataType: 'json',
        success: function(res) {

            if (res.data && res.data.length > 0) { 
                var html = `<div class="row margin-top-20">`;
                var services = '';
                
                $.each(res.data, function(service_list, value) {
                     var service_url = web_url + '/service/'+category_id + '/' + value.id;
                     var multistep_url = web_url + '/multistep/'+category_id + '/' + value.id;
                     
                    html += `<div class="col-lg-4 col-md-6 margin-top-30">
                    <div class="single-service no-margin wow fadeInUp" data-wow-delay=".2s">
                        <a href="${service_url}" class="service-thumb">
                            <img src="${value.category_image}" alt>
                            <div class="award-icons">
                                <i class="las la-award"></i>
                            </div>
                        </a>
                        <div class="services-contents">
                            <ul class="author-tag">
                                <li class="tag-list">
                                    <a href="javascript:void(0)">
                                        <div class="authors">
                                            <div class="thumb">
                                                <img src="{{asset('frontend/assets/')}}/img/service/author.jpg" alt>
                                                <span class="notification-dot"></span>
                                            </div>
                                            <span class="author-title"> Rajia Akter </span>
                                        </div>
                                    </a>
                                </li>
                                <li class="tag-list">
                                    <a href="javascript:void(0)">
                                        <span class="icon"> <i class="las la-star"></i> </span>
                                        <span class="reviews"> 4.8 (443) </span>
                                    </a>
                                </li>
                            </ul>
                            <h4 class="common-title-two"> <a href="${service_url}">${value.name}</a> </h4>
                            
                            <div class="service-price mt-3">
                                <span class="starting"> Starting at </span>
                                <span class="prices color-3">${value.category_image}</span>
                            </div>
                            <div class="btn-wrapper mt-4">
                                <a href="${multistep_url}" class="cmn-btn btn-appoinment btn-outline-1"> Book
                                    Appoinment </a>
                            </div>
                        </div>
                    </div>
                </div>`;
                });

                html += `</div>`;

                $('#services').html(html);
            }
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
    
}
// this function for servicelist 

});

// this function for servicelist 
function getSearchServiceList(category_id ,sub_category_id) {
     if (category_id ,sub_category_id) {
     $.ajax({
        url: api_url + '/service-list',
        method: 'POST',
        data:{ category_id:category_id ,sub_category_id:sub_category_id ,'_token' : csrf_token,},
        dataType: 'json',
        success: function(res) {

            if (res.data && res.data.length > 0) { 
                var html = `<div class="row margin-top-20">`;
                var services = '';
                
                $.each(res.data, function(service_list, value) {
                     var service_url = web_url + '/service/'+category_id + '/' + value.id;
                     var multistep_url = web_url + '/multistep/'+category_id + '/' + value.id;
                     
                    html += `<div class="col-lg-4 col-md-6 margin-top-30">
                    <div class="single-service no-margin wow fadeInUp" data-wow-delay=".2s">
                        <a href="${service_url}" class="service-thumb">
                            <img src="${value.category_image}" alt>
                            <div class="award-icons">
                                <i class="las la-award"></i>
                            </div>
                        </a>
                        <div class="services-contents">
                            <ul class="author-tag">
                                <li class="tag-list">
                                    <a href="javascript:void(0)">
                                        <div class="authors">
                                            <div class="thumb">
                                                <img src="{{asset('frontend/assets/')}}/img/service/author.jpg" alt>
                                                <span class="notification-dot"></span>
                                            </div>
                                            <span class="author-title"> Rajia Akter </span>
                                        </div>
                                    </a>
                                </li>
                                <li class="tag-list">
                                    <a href="javascript:void(0)">
                                        <span class="icon"> <i class="las la-star"></i> </span>
                                        <span class="reviews"> 4.8 (443) </span>
                                    </a>
                                </li>
                            </ul>
                            <h4 class="common-title-two"> <a href="${service_url}">${value.name}</a> </h4>
                            
                            <div class="service-price mt-3">
                                <span class="starting"> Starting at </span>
                                <span class="prices color-3">${value.category_image}</span>
                            </div>
                            <div class="btn-wrapper mt-4">
                                <a href="${multistep_url}" class="cmn-btn btn-appoinment btn-outline-1"> Book
                                    Appoinment </a>
                            </div>
                        </div>
                    </div>
                </div>`;
                });

                html += `</div>`;

                $('#SearchServiceList').html(html);
            }
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
     }
}

    // Example AJAX request
function BookingList(bookingId, booking_id) {
    $.ajax({
        url: api_url + '/booking-list',
        method: 'POST',
        data: { 
            booking_id: bookingId,
            '_token': csrf_token 
        },
        dataType: 'json',
        success: function(res) {
            var html = `` ; 
            if (res.data && res.data.length > 0) { 
                html += `<div class="service-details-wrapper">`;
                $.each(res.data, function(index, value) {
                    var booking_url = web_url + '/booking-list/' + value.id;

                    html += `<div class="dashboard-order-single margin-top-40">
                                    <div class="dashboard-thumb-flex">
                                        <div class="thumb inn">
                                            <img src="${value.category_image}" alt>
                                        </div>
                                        <div class="contents">
                                            <h4 class="title"> <a href="javascript:void(0)"> Emergency Electrical Support
                                                </a> </h4>
                                            <span class="orders"> Order #200124 </span>
                                            <div class="btn-wrapper margin-top-30" id="btnStatus">
                                                <a href="javascript:void(0)" class="cmn-btn completed"> Active Orders </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-oreder-request">
                                        <h2 class="title color-three"> 250.00 </h2>
                                        <span class="orders"> 25 Feb, 2022- 011:00pm </span>
                                        <div class="checkbox-inlines margin-top-20">
                                            <input class="check-input" type="checkbox" id="check16">
                                            <label class="checkbox-label" for="check16"> Paypal </label>
                                        </div>
                                    </div>
                                    <div class="dashboard-request-cancel">
                                        <div class="btn-wrapper">
                                            <a href="javascript:void(0)" class="cmn-btn btn-bg-3" data-toggle="modal"
                                                data-target="#exampleModal"> Change Status </a>
                                        </div>
                                        <div class="dashboard-icons margin-top-30">
                                            <a href="javascript:void(0)"> <span class="icon eye-icon"><i
                                                        class="las la-eye"></i></span> </a>
                                            <a href="javascript:void(0)"> <span class="icon delete-icon"><i
                                                        class="las la-trash"></i></span> </a>
                                            <a href="javascript:void(0)"> <span class="icon print-icon"> <i
                                                        class="las la-print"></i> </span> </a>
                                        </div>
                                    </div>
                                </div>`;
                });

                html += `</div>`;

            $('#bookinglist').html(html);
        }
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}
 // example  booking list
//  function BookingList(bookingId, csrfToken) {
//     $.ajax({
//         url: api_url + '/booking-list',
//         method: 'POST',
//         data: { 
//             booking_id: bookingId,
//             '_token': csrfToken 
//         },
//         dataType: 'json',
//         success: function(res) {
//             let html = ``; 
//             if (res.data && res.data.length > 0) { 
//                 html += `<div class="service-details-wrapper">`;
                
//                 $.each(res.data, function(index, value) {
//                     const bookingUrl = web_url + '/booking-list/' + value.id;

//                     html += `<div class="service-details-inner">
//                                 <!-- ... (existing code) ... -->
//                             </div>`;
//                 });

//                 html += `</div>`;
//             } else {
//                 html = `<div class="text-center">No Service Found</div>`;
//             }

//             $('#bookinglist').html(html);
//         },
//         error: function(xhr, status, error) {
//             // Handle errors (e.g., display a user-friendly message or log the error)
//             console.error("Error fetching booking list:", error);
//         }
//     });
// }
