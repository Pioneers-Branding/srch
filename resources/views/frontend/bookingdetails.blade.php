@extends('frontend.layouts.app')
@section('title') {{ 'Booking - Detail' }} @endsection
<style>
#response_span{
float: right;
    color: red;
}
.call{
    margin-left: 85%;
    margin-top: -6%;
}
    .yest{
    border: 2px solid rgba(221, 221, 221, .5);
    border-radius: 10px;
    padding: 14px;
}
.tg h1{
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 20px;
}
.yest p{
    font-weight: 600;
    font-size: 18px;
    margin-bottom: 5px;
}
.yest p span{
    float:right ;
    color: #702543;
}

.tg1 h1{
    margin-top: 3%;
}

@media(max-width:678px){
    .copyright-area .copyright-contents {
        font-size: 14px;
        color: var(--light-color);
        text-align: center;
    }
    .tt {
        border: none;
        background: linear-gradient(90deg, #fdf7f0 0%, #ffe9f7 50%, #efdff4 100%);
        color: #702543;
        border-radius: 10px;
        font-weight: 800;
        padding: 8px 0px;
        text-align: center;
        width: 30%;
    }
    .yest p span {
        float: inherit;
        color: #702543;
    }
    .tg h1 {
        font-size: 19px;
        font-weight: 600;
        margin-bottom: 15px;
    }
    .tg2 h1{
        margin-top: 3%;
    }
    .tis{
        color: #650a2e !important;
    }
    .tg1 h1 {
        margin-top: 6%;
    }
}
</style>

@section('content')
<script>
$(document).ready(function() {
    var id = "{{ $id }}"; 
    
    $.ajax({
        url: api_url + "/booking-detail?id=" + id, 
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            
            if (response.status) {
                $('.loader_html').hide();
                $('.bookig-detial-html').show();
            }
            
            
            
            if (response.data.vendor_phone) {
                $('#vendor_call').show();
                $('#vendor_call').attr('data-to-phone',response.data.vendor_phone);
            } else {
                $('#vendor_call').val('null');
            }
            
            var [bookingDate, bookingTime] = response.data.start_date_time.split(' ');
            var time = moment(bookingTime, "HH:mm:ss");
            var formattedTime = time.format("h:mmA");
            
            // Create a moment object for bookingDate
            var momentBookingDate = moment(bookingDate, "YYYY-MM-DD");
            
            // Format the bookingDate
            var formattedBookingDate = momentBookingDate.format("D MMM, YYYY ");
                                
            $('#address').html(response.data.branch_name);
            $('#phone').html(response.data.phone);
            $('#start').html(formattedBookingDate + ' '+formattedTime);
            $('#name_u').html(response.data.user_name);
            $('#st').html(response.data.status);
          
            var services = response.data.services;
            var service_total = 0;
            var html = '';
            var nameHtml = '';
            if (Array.isArray(services) && services.length > 0) {
                services.forEach(service => {
                    var service_price = service.quantity != null ? (parseInt(service.quantity) * parseInt(service.service_price)) : 0;
                    service_total += service_price;
                    html += `<p>${service.service_name} : <span>${convertAmount(service_price)}</span></p>`;
                    
                    nameHtml+=`${service.service_name} , `;
                });
            } 
        
            $('#sub_total').html(convertAmount(service_total));
            
            
            var tax_percentage = response.data.payment.tax_percentage;
            
            var calculationHtml = '';
            
            if (typeof response.data.payment.tax_percentage === 'string') {
                tax_percentage = JSON.parse(response.data.payment.tax_percentage);
            } else if (Array.isArray(response.data.payment.tax_percentage)) {
                tax_percentage = response.data.payment.tax_percentage;
            }
            // console.log(tax_percentage);
            var grand_total = parseFloat(service_total); 
            if (Array.isArray(tax_percentage) && tax_percentage.length > 0) {
                tax_percentage.forEach(function(tax) {
                    var type = tax.type == 'fixed' ? convertAmount(tax.percent) : tax.percent + '%';
                    var taxAmount = tax.type == 'fixed' ? tax.percent : ((tax.percent / 100) * service_total);
                    
                    grand_total -= parseFloat(taxAmount); 
                    
                    console.log(taxAmount);
                    
                    // calculationHtml += `<p class=""> ${tax.name} (${type}) : <span>${convertAmount(taxAmount)}</span></p>`;
                    
                });
            }
            
        
            // if (response.status) {
            //     calculationHtml += `<p> Sub Total  <span >${convertAmount(response.data.sub_total)}</span></p>`;
            //     calculationHtml += `<p> Convenience Fee (${convertAmount(response.data.convience_fee)})  <span >${convertAmount(response.data.convience_fee)}</span></p>`;
            //     calculationHtml += `<p> GST (${response.data.tax}%) <span >${convertAmount(response.data.tax_amount)}</span></p>`;
            //     calculationHtml += `<p> Additional Charge <span >${convertAmount(response.data.additional_charge)}</span></p>`;
            //     calculationHtml += `<p> Grand Total <span >${convertAmount(response.data.grand_total)}</span></p>`;
            //     grand_total = response.data.grant_total;
            // }
            // $('#booking_price_detail').html(calculationHtml);
            
                       // Additional details like sub total, convenience fee, tax, additional charge, and grand total
if (response.status) {
    var calculationHtml = '';
    calculationHtml += `<p> Sub Total  <span>${convertAmount(response.data.sub_total)}</span></p>`;
    calculationHtml += `<p> Convenience Fee (${convertAmount(response.data.convience_fee)})  <span>${convertAmount(response.data.convience_fee)}</span></p>`;
    var taxAmount = response.data.tax_amount; // Get the tax amount
    calculationHtml += ``;
    // <p> GST (${response.data.tax}%) 
    // <span>${convertAmount(taxAmount)}</span></p>
    calculationHtml += `<p> Additional Charge <span>${convertAmount(response.data.additional_charge)}</span></p>`;
    // Calculate the grand total by deducting the tax amount from the total
    var grand_total = parseFloat(response.data.grand_total) - parseFloat(taxAmount);
    calculationHtml += `<p> Grand Total <span>${convertAmount(grand_total)}</span></p>`;

    $('#booking_price_detail').html(calculationHtml);
}
            
            // $('#price_details').html(calculationHtml);
            
            $('#payment_method').html((response.data.payment!=null ? response.data.payment.transaction_type : ''));
            
            $('#payment_status').html((response.data.payment.payment_status==0 ? 'Pending' : 'Paid'));

            $('#service_html').html(html);
            
            $('#name').html(nameHtml);
        },
        error: function(xhr, status, error) {
            console.error(error);
            // Handle error
        }
    });
    // Wait for the document to be ready

    // Attach click event handler to the button
    $('#vendor_call').click(function() {
        // Make AJAX call
        var to_number = $(this).attr('data-to-phone');
        $.ajax({
            url: api_url + "/call-connect",
            method: 'GET',
            data:{
                from_number : "{{ Auth::user()->mobile }}",
                to_number : to_number,
                },
            dataType: 'json',
            success: function(response) {
                
             if (response.status) { 
              $('#response_span').text('call connected');
               setTimeout(function() {
                    $('#response_span').text('');
                }, 10000);
             }
                
            },
            error: function(xhr, status, error) {

                console.error('Error:', error);
            }
        });
    });


});

</script>



<section class="About-area padding-top-100 padding-bottom-140">
        <div class="container">
            <div class="row loader_html">
                 <script> 
                   var LoaderHTML = setLoaderClasses('col-xl-12 col-lg-12 col-sm-12 col-md-12');
                   document.write(LoaderHTML.repeat(4))
                 </script>
            </div>
            <div class="row bookig-detial-html" style="display:none">
                <div class="col-lg-12 margin-top-40">
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="tg" >
                                <h1>
                                    Location Information
                                </h1>
                                <div class="yest">
                                    <p>Name  :<span id="name"></span></p>
                                    <p>Address : <span id="address"></span></p>
                                    <p>Conatact number  :<span  id="phone"></span></p>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-12">
                            <section class="tg tg1">
                                <h1 class="bookingInfo">
                                   Booking Information
                                </h1>
                                <div class="btn-wrapper">
                                <input  class="cmn-btn btn-bg-3 call" id="vendor_call" style="display:none" type="button" value="call vendor" />
                                <span id="response_span" class="text-success"></span>
                                </div>
                                <div class="yest">
                                    <p>Date & Time : <span id="start"></span></p>
                                    
                                    <p>Status  :<span id="st"></span></p>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-12">
                            <section class="tg tg1">
                                <h1>
                              Services
                                </h1>
                                <div class="yest" id="service_html">
                                   
                                   
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-12">
                            <section class="tg tg1">
                                <h1>
                                Price Details
                                </h1>
                                <div class="yest" id="booking_price_detail" >
                                    
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-12">
                            <section class="tg tg1">
                                <h1>
                                Payment Details
                                </h1>
                                <div class="yest">
                                    <p id="">Payment Method :<span id="payment_method" ></span></p>
                                    <p id="">Payment Status :<span id="payment_status" ></span></p>
                                </div>
                            </section>
                        </div>
                        
                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection



</script>
