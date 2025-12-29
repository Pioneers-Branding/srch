@extends('frontend.layouts.app')
@section('title') {{ 'Service Booking' }} @endsection
@section('content')
<style>
    .calendar-cell {
        transition: background-color 0.3s;
        position: relative;
    }

    .calendar-cell:hover,
    .calendar-cell.selected {
        background-color: #395815;
        color: white;
    }

    .time-select a {
        display: inline-block;
        padding: 10px 15px;
        border: 1px solid #000;
        border-radius: 5px;
        transition: background-color 0.3s;
        text-align: center;
    }

    .time-select a:hover,
    .time-select a.selected {
        background-color: #395815;
        color: white;
    }
</style>




<style>
.apply-button{
        background-color:#702543;
        color:#fff;
    }
#map {
 
  width: 100% !important;
  height: 200px !important;
  margin-top:10px;
}
.pac-container {
    background-color: #FFF;
    z-index: 20;
    position: fixed;
    display: inline-block;
    float: left;
}
.modal{
    z-index: 20;   
}
.modal-backdrop{
    z-index: 10;        
}
    .btn-edit{
        background:#702543;
        color:#fff;
        border:none;
        outline:none;
        cursor: pointer;
    padding: 10px 25px;
    
    }
    .btn_s{
               background:#702543;
        color:#fff;
        border:none;
        outline:none;
        cursor: pointer;
    padding: 10px 25px;
    
 
    }
</style>

<style>
  .hidden {
    display: none;
  }
</style>
<script>
// this function for delete address
    
    
$(document).ready(function() {
  get_address();
});
  function deleteAddress(user_id, address_id){
        if (confirm("Are you sure you want to delete this address?")) {
            $.ajax({
            url: api_url + '/delete-address',
            method: 'POST',
            data: {'_token': csrf_token, 'user_id' : user_id, 'address_id' : address_id },
            dataType:'json',
            success: function(response) {
                if (response.status) {
                    get_address();
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
        }
    }

    $(document).on('submit', '#multiForm', function(event) {
        event.preventDefault();
        
        var formData = $(this).serialize();
        
        $.ajax({
            url: api_url + '/save-address',
            method: 'POST',
            data: formData,
            beforeSend: function() {
                $('#sub_btn').text('Processing').prop('disabled', true);
            },
            dataType:'json',
            success: function(response) {
                $('#sub_btn').text('Submit').prop('disabled', false);
                
                console.log(response.status);
                if (response.status) {
                    $('#addNewAddressModal').modal('hide');
                    $('.address_modal_close').trigger('click');
                    get_address();
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
    
    
    $(document).on('click', '.address_new_btn', function() {
     $('#multiForm')[0].reset(); 
     $('#addressId').val('');
     mapRefresh();
   });

    
    // Event listener for edit buttons
    $(document).on('click', '.btn-edit', function() {
    var addressId = $(this).data('id');
    var address = $(this).data('address');
    var address_line_1 = $(this).data('address_line_1');
    var address_line_2 = $(this).data('address_line_2');
    var city = $(this).data('city');
    var state = $(this).data('state');
    var country = $(this).data('country');
    var postal_code = $(this).data('postal_code');
    var add_type = $(this).data('add_type');
    var longitude = $(this).data('longitude');
    var latitude = $(this).data('latitude');
    
    // Call a function to handle the edit action with all the address data
    editAddress(address, addressId, address_line_1, address_line_2, city, state, country, postal_code,add_type , longitude , latitude);
});

// Function to handle edit action
function editAddress(address, addressId, address_line_1, address_line_2, city, state, country, postal_code,add_type , longitude , latitude) {
  
    $('#addressId').val(addressId);
    $('#autocomplete').val(address);
    $('#address_line_1').val(address_line_1);
    $('#address_line_2').val(address_line_2);
    $('#city').val(city);
    $('#state').val(state);
    $('#country').val(country);
    $('#postal_code').val(postal_code);
    $('#add_type').val(add_type);
    $('#add_latitude').val(latitude);
    $('#add_longitude').val(longitude);
    
    editChangeMap(latitude, longitude, address);
    
    $('#addNewAddressModal').modal('show');
}

    
 
   // this function for booking update
function get_address() {
    $.ajax({
        url: api_url + '/get-address',
        method: 'GET',
        data: { user_id: "{{ Auth::user()->id }}" },
        dataType: 'json',
        success: function(res) {
            if (res.status) {
                var html = ``;
                
                    $.each(res.data, function(index, address) {
                        html += '<tr>';
                        html += '<th scope="row">' + (index + 1) + '</th>';
                        html += '<td><input type="radio" name="address_id" value="' + address.id + '" ' + (index === 0 ? 'checked' : '') + ' /></td>';
                        html += '<td>' + (address.address != null ? address.address : '') + '</td>';
                        html += '<td>' + (address.address_line_1 != null ? address.address_line_1 : '') + '</td>';
                        html += '<td>' + (address.address_line_2 != null ? address.address_line_2 : '') + '</td>';
                        html += '<td>' + (address.city != null ? address.city : '') + '</td>';
                        html += '<td>' + (address.state != null ? address.state : '') + '</td>';
                        html += '<td>' + (address.country != null ? address.country : '') + '</td>';
                        html += '<td>' + (address.postal_code != null ? address.postal_code : '') + '</td>';
                        html += '<td>' + (address.add_type != null ? address.add_type : '') + '</td>';
                        html += '<td><button class="btn-edit" type="button" data-address="'+ address.address +'" data-id="' + address.id + '" data-address_line_1="' + (address.address_line_1 != null ? address.address_line_1 : '') + '" data-address_line_2="' + (address.address_line_2 != null ? address.address_line_2 : '') + '" data-city="' + (address.city != null ? address.city : '') + '" data-state="' + (address.state != null ? address.state : '') + '" data-country="' + (address.country != null ? address.country : '') + '" data-postal_code="' + (address.postal_code != null ? address.postal_code : '') + '" data-add_type="' + (address.add_type != null ? address.add_type : '') + '"  data-longitude="' + (address.longitude != null ? address.longitude : '') + '" data-latitude="' + (address.latitude != null ? address.latitude : '') + '">Edit</button> <button type="button" class="btn btn-danger" onclick="deleteAddress('+ address.user_id +', '+ address.id +')"><i class="fa fa-trash"></i> Delete</button></td>';
                        html += '</tr>';
                    });
                    
                    if (res.data.length==0) {
                        html+=`<td colspan="12"><p class="text-center">No Address Found</p></td>`;
                    }
                    
                // Append the generated HTML to the table body
                $('#address_list').html(html);
            } else {
                console.log(res.message);
            }
        },
        error: function(error) {
            console.error('Error fetching data:', error);
        }
    });
}


</script>
<section class="location-overview-area padding-top-140">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <form id="msform" class="msform">
               <ul class="overview-list step-list">
    <li class="list">
        <a class="list-click" href="javascript:void(0)"> <span class="list-number">1</span> Date & Time </a>
    </li>
    <li class="list">
        <a class="list-click" href="javascript:void(0)"> <span class="list-number">2</span> Confirmation </a>
    </li>
</ul>

               <!--new date time start-->
               
               <!--new date time end-->
               <!-- Button trigger modal -->
              
               <fieldset class="padding-top-50 padding-bottom-100" id="branch-configuration">
    <div class="date-overview">
        <h4 class="date-time-title">Select date time</h4>
        <div class="calendar-container" style="display: flex;">
            <div class="calendar" style="flex: 1; padding: 20px;">
                <div class="calendar-header" style="text-align: center; margin-bottom: 10px;">
                    <button id="prev-month" style="margin-right: 10px;">&#9664;</button>
                    <span id="month-name">{{ \Carbon\Carbon::now()->format('F') }}</span>
                    <span id="year-name">{{ \Carbon\Carbon::now()->year }}</span>
                    <button id="next-month" style="margin-left: 10px;">&#9654;</button>
                </div>
                <div class="calendar-grid-header" style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 5px; text-align: center;">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div id="calendar-grid" class="calendar-grid" style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 5px;">
                    <!-- Dates will be dynamically generated here -->
                </div>
            </div>
            <div class="time-container" style="flex: 1; padding: 20px;">
                <div class="time-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;">
                    <!-- Time slots will be dynamically generated here -->
                </div>
            </div>
        </div>
    </div>
    <p class="text-danger time-error text-center"></p>
    <input type="button" name="next" class="next action-button" data-date-time="true" value="Next" />
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
</fieldset>

                <fieldset class="padding-top-50 padding-bottom-100">
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="confirm-overview-left margin-top-30">
                           <div class="single-confirm-overview">
                              
                              <div class="single-confirm margin-top-30">
                                 <h3 class="titles"> Date & Time </h3>
                                 <span class="details selected-date">  </span>
                                 <span class="details selected-time">  </span>
                              </div>
                           </div>
                            <div class="single-confirm-overview mt-4">
                           <div class="single-info-input">
                                <label class="info-title">Coupon</label>
                                <div class="input-group">
                                    <input type="text" id="coupon_code" class="form-control" style="width: 100%;">
                                    
                                </div>
                                <span class="text-danger error-message"></span>
                            </div>

                            <div class="mt-2">
                                <button type="button" class="btn apply-button" id="apply-coupon-btn">Apply</button>
                            </div>
                        </div>
                           <div class="single-confirm-overview mt-4">
                              <div class="single-info-input">
                                 <label class="info-title"> Note </label>
                                 <textarea name="note" class="form-control" rows="7" cols="212"></textarea>
                                 <span class="text-danger error-message"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6 margin-top-60">
                        <div class="service-overview-summery">
                           <h4 class="title"> Booking Summery </h4>
                           
                           <div class="overview-summery-contents">
                              <div class="single-summery">
                                 <span class="summery-title"> 
                                 Appointment Service </span>
                                 <div class="summery-list-all" >
                                    <ul class="summery-list" id="appointment_service">
                                       <li class="list">
                                          <span class="rooms"> Bed Room</span>
                                          <span class="room-count">3</span>
                                          <span class="value-count">90</span>
                                       </li>
                                       <li class="list">
                                          <span class="rooms"> Bath Room</span>
                                          <span class="room-count">2</span>
                                          <span class="value-count">60</span>
                                       </li>
                                    </ul>
                                    <ul class="summery-result-list" id="calculation_checkout">
                                      
                                    </ul>
                                 </div>
                              </div>
                              
                              <div class="confirm-bottom-content">
                                 <div class="confirm-payment payment-border">
                                    <div class="single-checkbox">
                                       <div class="checkbox-inlines">
                                          <input class="check-input" type="radio" name="transaction_type" id="cashpayment" value="cash" checked>
                                         <label for="cashpayment">Cash After Service</label>
                                       </div>
                                    </div>
                                    <div class="single-checkbox">
                                       <div class="checkbox-inlines">
                                          <input class="check-input" type="radio" name="transaction_type" id="onlinepayment" value="online">
                                          <label for="onlinepayment">
                                          <img src="{{asset('frontend/assets/')}}/img/service/QIc_CCEg_400x400-removebg-preview.png" alt="razorpay" style="width:5%;">Razorpay 
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                                
                                 

                                 <div class="checkbox-inlines bottom-checkbox">
                                    <input class="check-input" type="checkbox" id="agree_check">
                                    <label class="checkbox-label" for="agree_check" > I have read and agree to
                                    the website <a href="javascript:void(0)"> terms and
                                    conditions * </a> </label>
                                 </div>
                                 
                                 <span class="text-danger terms-error" ></span>
                                 <p class="text-denger" id="error-msg"></p>
                              </div>
                              <div class="btn-wrapper">
                                 <input  name="date" type="hidden" value="" name="date" id="order_date" />
                                 <input  name="time" type="hidden" value="" name="time" id="order_time" />
                                 <input  name="latitude" type="hidden" value=""  id="latitude" />
                                 <input  name="longitude" type="hidden" value="" id="longitude" />
                                 
                                 <!--<a href="/" class="next action-button booking_submit"></a>-->
                                 
                                 <input type="button" name="submit" class="next action-button booking_submit" data-submit="true" value="Confirm" id="cashButton"/>
                                 
                                 <!--Pay & Continue-->
                                 
                                 <input type="button" name="button" class="next action-button" id="onlineClick" style="display:none"/>
                                 
                                 
                               <a href="/"class="action-button-previous" type="submit"> Add More Product</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </fieldset>
               <fieldset class="padding-top-80 padding-bottom-100">
    <div class="form-card successful-card">
        <h2 class="title-step"> SUCCESS ! </h2>
        <div class="succcess-icon">
            <i class="las la-check"></i>
        </div>
        <h5 class="purple-text text-center">Booking Successful</h5>
        
        <h5 class="grand-total-text text-center">Grand Total: <span id="grand_total"></span></h5> <!-- Placeholder for Grand Total -->

        <div class="btn-wrapper text-center margin-top-35">
            <a href="{{ url('/mybooking') }}" class="cmn-btn btn-bg-1">Go to Booking</a>
        </div>
    </div>
</fieldset>

            </form>
         </div>
      </div>
   </div>
</section>

<!-- Modal -->
<div class="modal fade" id="addNewAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Address</h5>
        <button type="button" class="close address_modal_close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding:4%">
    <form id="multiForm">
        
         @csrf
         <div class="mb-3">
            <div id="pac-container">
                <a href="javascript:void(0)" id="currentLocationBtn" class="action-button"><p class="text-right"  role="button" ><i class="las la-plus-circle"></i>Use Current Location</p> </a>
                <label class="form-label"> Address* </label>
            <input id="autocomplete" type="text" class="form-control" name="address" placeholder="Enter a address" / required>
           </div>
        
           <div id="map"></div>
          <div id="infowindow-content">
              <span id="place-name" class="title"></span><br />
              <span id="place-address"></span>
            </div> 
        </div>
          <div class="mb-3">
            <label class="form-label"> Address Line One* </label>
             <input class="form-control" type="text" id="address_line_1" name="address_line_1"
         placeholder="Address Line One" required>
            
          </div>
              <div class="mb-3">
                <label class="form-label"> Address Line Two* </label>
                 <input class="form-control" type="text" id="address_line_2" name="address_line_2"
             placeholder="Address Line Two" >
                
              </div>
  
  <div class="mb-3">
     <label class="info-title"> City* </label>
     <input class="form-control" type="text" id="city" name="city"
 placeholder="Enter Your City" required>
  </div>
  <div class="mb-3">
     <label class="info-title"> State* </label>
     <input class="form-control" type="text" id="state" name="state"
 placeholder="Enter Your State" required >
  </div>
  <div class="mb-3">
     <label class="info-title"> Pincode* </label>
     <input class="form-control" type="text" id="postal_code" name="postal_code"
 placeholder="Enter Your Pincode" required>
  </div>
  <div class="mb-3">
     <label class="info-title">Country* </label>
     <input class="form-control" type="text" id="country" name="country"
 placeholder="Enter Your country" required>
  </div>
  <div class="mb-3">
     <label class="info-title">Add Type* </label>
     <input class="form-control" type="text" id="add_type" name="add_type"
 placeholder="Enter Add Type" required>
  </div>
  <div class="mb-3">
     
     <input class="form-control" value="{{ Auth::user()->id }}" name="user_id" type="hidden" 
 placeholder="Enter Your State">
 <input class="form-control" value="" id="add_latitude" name="latitude" type="hidden" 
 placeholder="Enter Your State" >
 <input class="form-control" value="" id="add_longitude" name="longitude" type="hidden" 
 placeholder="Enter Your State" >
 
 <input class="form-control" value="" id="addressId" name="id" type="hidden" 
 placeholder="Enter Your State" >
  </div>
  
  
  <input type="submit" class="action-button btn_s" id="sub_btn" value="Submit" />
</form>
      </div>
      
    </div>
  </div>
</div>

<input type="hidden" id="total_amount" value="">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
   $(document).ready(function() {
    
    // total_amount variable is very important please do not delete it
    var total_amount = 0;
    
       function getSlotData(date) {
           $.ajax({
            url:   api_url + '/branch-configuration?branch_id=1',
            method: 'GET',
            dataType:'json',
            success: function(response) {
              if (response.status) {
                 generateTimeSlotsForDate(response, date);
              }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data from the API:', error);
            }
        });
       }
 
       function generateTimeSlotsForDate(response, date) {
            var slotDuration = moment.duration(response.data.slot_duration); // Slot duration from the API response
            var slotsData = response.data.slot;
        
            // Find the day data based on the given date
            var dayData = slotsData.find(slot => moment(date).format('dddd').toLowerCase() === slot.day.toLowerCase());
            if (!dayData) return; // If no data found for the given day, exit the function
        
            // Determine whether to use start_time or end_time for the whole day
            var useStartTime = moment(date).isSameOrBefore(moment(), 'day'); // If the date is today or before, use start_time
        
            var startTime, endTime;
        
            startTime = moment(dayData.start_time, 'HH:mm').set({ year: moment(date).year(), month: moment(date).month(), date: moment(date).date() });
            endTime = moment(dayData.end_time, 'HH:mm').set({ year: moment(date).year(), month: moment(date).month(), date: moment(date).date() });
        
            // Calculate durations for morning, afternoon, and evening
            var morningStartTime = moment('08:00 AM', 'hh:mm A');
            var morningEndTime = moment('12:00 PM', 'hh:mm A');
            var afternoonStartTime = moment('12:00 PM', 'hh:mm A');
            var afternoonEndTime = moment('03:59 PM', 'hh:mm A');
            var eveningStartTime = moment('04:00 PM', 'hh:mm A');
            var eveningEndTime = moment(dayData.end_time, 'hh:mm A');
        
            var morningDuration = morningEndTime.diff(morningStartTime, 'minutes'); // Duration in minutes
            var afternoonDuration = afternoonEndTime.diff(afternoonStartTime, 'minutes'); // Duration in minutes
            var eveningDuration = eveningEndTime.diff(eveningStartTime, 'minutes'); // Duration in minutes
        
            // Generate time slots for morning
            generateTimeSlots(startTime.clone(), morningDuration, 'morning-list', morningEndTime, date);
            
            // Generate time slots for afternoon
            generateTimeSlots(afternoonStartTime.clone(), afternoonDuration, 'afternoon-list', afternoonEndTime, date);
        
            // Generate time slots for evening
            generateTimeSlots(eveningStartTime.clone(), eveningDuration, 'evening-list', eveningEndTime, date);
        
            // Function to generate time slots
            function generateTimeSlots(startTime, duration, listClass, endTime, date) {
                var list = $('.' + listClass);
                list.html('');
        
                var slotsCount = Math.ceil(duration / slotDuration.asMinutes());
                var currentTime = moment(); // Current time
                 
                for (var i = 0; i < slotsCount; i++) {
                    var listItem = $('<li class="list time-slot"></li>');
                    var link = $('<a href="javascript:void(0)"></a>').text(startTime.format('h:mmA'));
        
                    listItem.attr('data-time', startTime.format('HH:mm'));
                     
                    // Check if the slot time is in the past for the given date or if it's a holiday
                    if ((moment(date).isSame(moment(), 'day') && startTime.isBefore(currentTime)) || isHoliday(moment(date).format('dddd').toLowerCase(), slotsData)) {
                        listItem.addClass('past-time').css('cursor', 'not-allowed');
                        link.wrapInner('<del></del>').css('cursor', 'not-allowed');
                    }
        
                    listItem.append(link);
                    list.append(listItem);
        
                    if (endTime.format('h:mm')==startTime.format('h:mm')) {
                        
                        break;
                    }
        
                    startTime.add(slotDuration); // Move to the next slot time
                }
            }
        
            // Function to check if the given day is a holiday
            function isHoliday(day, slotsData) {
                return slotsData.some(slot => slot.day.toLowerCase() === day && slot.is_holiday === 1);
            }
        }



        getSlotData("<?=date('Y-m-d')?>");

       $(document).on('click', '.date-select', function () {
           var date = $(this).attr('data-date');
           if (!$(this).hasClass('past-date')) {
               getSlotData(date);
           }
       });
    //   end
       
       var time_slot = '';
       function getDateTime() {
           var $selectedDateLi = $('.date-container li.active');
           var $selectedTimeLi = $('.time-container ul li.active');
       
           if ($selectedDateLi.length > 0) {
               var dateText = $selectedDateLi.text().trim();
               $('.selected-date').text(dateText);
               console.log('Selected Date: ' + dateText);
               var date = $selectedDateLi.attr('data-date').trim();
               $('#order_date').val(date);
           } else {
               console.log('No date selected.');
           }
       
           if ($selectedTimeLi.length > 0) {
               var timeText = $selectedTimeLi.text().trim();
               $('.selected-time').text(timeText); 
               console.log('Selected Time: ' + timeText);
               $('.time-error').text('');
               var time = $selectedTimeLi.attr('data-time');
                time_slot = time;
               $('#order_time').val(time);
               return true; // Time selected
           } else {
               console.log('No time selected.');
               $('.time-error').text('Please select a time slot');
               return false; // No time selected
           }
       }
       
        function saveBooking(callback) {
            if (!$('#agree_check').is(':checked')) {
                $('.terms-error').html('Please agree to the terms and conditions.');
                callback(false);
                return;
            } else {
                $('.terms-error').html('');
            }

        
            $('.booking_submit').prop('disabled', true);
            $('.booking_submit').text('Processing...');
        
            var formData = {
                services: services,
                user_id: user_id,
                date: $('[name="date"]').val(),
                time: $('[name="time"]').val(),
                address_id: $('[name="address_id"]:checked').val(),
                note: $('[name="note"]').val(),
                '_token': csrf_token,
                branch_id: 1,
                coupon_code : $('#coupon_code').val(),
            };
        
            $.ajax({
                url: api_url + '/save-booking',
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function (res) {
                    if (res.status) {
                          
                          if ($('[name="transaction_type"]:checked').val() == 'cash') {
                                savePayment(res.booking_id);
                                localStorage.removeItem('services');
                                callback(true);
                           }else {
                               localStorage.setItem('booking_id', res.booking_id);
                               localStorage.removeItem('services');
                                callback(true);
                           }
                    } else {
                        $('#error-msg').html(`<span style="color:red;">${res.message}</span>`);
                        callback(false);
                    }
                    $('.booking_submit').prop('disabled', false);
                    $('.booking_submit').text('Submit');
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                    callback(false);
                    $('.booking_submit').prop('disabled', false);
                    $('.booking_submit').text('Submit');
                }
            });
        }
        
        function savePayment(booking_id, razorpay_payment_id = "", razorpay_order_id = "") {
            getTax(0, function (result) {
                var tax_percentage = [];
                $.each(result.taxArray, function (index, item) {
                    tax_percentage[index] = {
                        id: item.id,
                        name: item.name,
                        percent: item.percent,
                        tax_amount: null,
                        type: item.type
                    };
                });
        
                var formData = {
                    tax_percentage: tax_percentage,
                    booking_id: booking_id,
                    transaction_type: $('[name="transaction_type"]:checked').val(),
                    '_token': csrf_token,
                    razorpay_payment_id: razorpay_payment_id,
                    razorpay_order_id: razorpay_order_id
                };
        
                $.ajax({
                    url: api_url + '/save-payment',
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (res) {
                        if (res.status) {
                            localStorage.removeItem('tax');
                        }
                    },
                    error: function (error) {
                        console.error('Error fetching data:', error);
                    }
                });
        
            });
        }
        
        function saveOnline(callback) {
            
            if (!$('#agree_check').is(':checked')) {
                $('.terms-error').html('Please agree to the terms and conditions.');
                callback(false);
                return;
            } else {
                $('.terms-error').html('');
            }
            
            var formData = {
                '_token': csrf_token,
                // amount: 1,
                amount: $('#total_amount').val(), // Assuming 1 is a placeholder, update with actual amount
            };
            $.ajax({
                url: api_url + '/razorpay-order-create',
                method: 'POST',
                data: formData,
                dataType: 'json',
                success: function (res) {
                    if (res.status) {
                        var orderId = res.data.id;
                        if (RazorpayCheckout(res.data.amount, res.data.currency, orderId));
                        { callback(true); }
                    } else {
                        console.error('Error creating Razorpay order:', res.error);
                        callback(false);
                    }
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                    callback(false);
                }
            });
        }
        function RazorpayCheckout (amount,currency,order_id){
             
             var options = {
                "key": "{{ env('RAZORPAY_API_KEY') }}", // Enter the Key ID generated from the Dashboard
                "amount": amount , // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": currency ,
                "name": "{{ app_name() }}", //your business name
                "description": "",
                "image": "{{ asset(setting('logo')) }}",
                "order_id": order_id, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function (response){
                    
                    console.log(response.razorpay_payment_id);
                    console.log(response.razorpay_order_id);
                    console.log(response.razorpay_signature)
                    
                    saveBooking(success => {
                            if (success) {
                                var booking_id = localStorage.getItem('booking_id');
                               
                                savePayment(booking_id, response.razorpay_payment_id, response.razorpay_order_id);
                                
                                localStorage.removeItem('booking_id');
                                
                                $('#onlineClick').trigger('click');
                                
                                return ;
                            }
                        });
                     
                     
                },
                "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information, especially their phone number
                    "name": "{{ Auth::user()->name }}", //your customer's name
                    "email": "{{ Auth::user()->email }}", 
                    "contact": "{{ Auth::user()->mobile }}"  //Provide the customer's phone number for better conversion rates 
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#702543"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.on('payment.failed', function (response){
                    console.log('code : ' + response.error.code);
                    console.log('description : ' + response.error.description);
                    console.log('source : ' + response.error.source);
                    console.log('step : ' + response.error.step);
                    console.log('reason : ' + response.error.reason);
                    console.log('order_id : ' + response.error.metadata.order_id);
                    console.log('payment_id : ' + response.error.metadata.payment_id);
            });
            
            rzp1.open();
             
        }
           
        //   end
     
   
    $(document).on('click', ".next, .previous", function () {
    var current_fs = $(this).closest('form').find('fieldset:visible');
    var next_fs = $(this).hasClass('next') ? current_fs.next() : current_fs.prev();
    $('#address_error').html('');

    if ($(this).hasClass('next') && $(this).attr('data-date-time') && !getDateTime()) return;

    if ($(this).hasClass('next') && $(this).attr('data-submit')) {
        if ($('[name="transaction_type"]:checked').val() == 'online') {
            if (total_amount <= 499) {
                $('#error-msg').html(`<span style="color:red;">Booking amount must be 499 greater.</span>`);
                return;
            }
            saveOnline(success => {});
            return;
        } else {
            saveBooking(success => {
                if (success) proceedNextStep(current_fs, next_fs);
            });
        }
        return;
    }

    $('#error-msg').html('');

    proceedNextStep(current_fs, next_fs);

    $('html, body').animate({
        scrollTop: $('#msform').offset().top
    }, 500);
});

function proceedNextStep(current_fs, next_fs) {
    var valid = true;

    current_fs.find('input[required]').each(function () {
        if (!$(this).val().trim()) {
            valid = false;
            $(this).next('.error-message').text($(this).attr('name') + ' is required.').show();
        } else {
            $(this).next('.error-message').hide();
        }
    });

    if (valid) {
        $(".step-list li").eq($("fieldset").index(next_fs)).addClass("active");
        next_fs.show();
        current_fs.hide().css('opacity', '0');
        next_fs.animate({ opacity: 1 }, 500);
    }
}


       var services = [];
   
       var storedServices = localStorage.getItem('services');
       if (storedServices) {
           services = JSON.parse(storedServices);
       }
   

       function serviceSummery(service) {
     
          var serviceHtml =`<li class="list">
               <span class="rooms"> ${service.service_name}</span>
               <span class="room-count">${service.service_price} * ${service.quantity}</span>
               <span class="value-count">${ convertAmount( (parseInt(service.service_price) * parseInt(service.quantity)) ) }</span>
           </li>`;   
           
           total_amount+=(parseInt(service.service_price) * parseInt(service.quantity) );
           
          $('#appointment_service').append(serviceHtml);
       }
       
       
       function renderServices() {
    $('#appointment_service').empty();

    // Loop through each service and add its element
    services.forEach(function(service) {
        serviceSummery(service);
    });

    // Ensure callback is defined correctly
    getBookingTotal(total_amount, time_slot, function(result) {
        $('#total_amount').val(result.totalAmount);
        $('#calculation_checkout').html(result.calculationHtml);
    });
}

       
       renderServices();
       
       if (services.length == 0) {
           window.location.href = '/'; // Redirect to the homepage
       }
       
      $(document).on('click', '.time-container .time-slot', function () {
    var time_slot = $(this).attr('data-time');
    var total_amount = $('#total_amount').val(); // Assuming you have total_amount defined somewhere

    // Ensure callback is defined correctly
    if (typeof handleBookingTotalResponse === 'function') {
        getBookingTotal(total_amount, time_slot, handleBookingTotalResponse);
    } else {
        console.error('Callback function handleBookingTotalResponse is not defined');
    }
});


       
    $(document).on('click', '#apply-coupon-btn', function () {
            var  coupon_code = $('#coupon_code').val();
           
           getBookingTotal(total_amount, time_slot, coupon_code , function(result) {
              
              $('#total_amount').val(result.totalAmount);
               $('#calculation_checkout').html(result.calculationHtml);
               
           })
       });
   });
</script>





<script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API_KEY') }}&callback=initMap&libraries=places&v=weekly"
   defer
   ></script>
<script src=""></script>
<script>
        let map, autocomplete, infowindow, geocoder, placesService;
        const markersArray = [];
        let latitudeC, longitudeC;
        
        function initMap() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(
                    ({ coords }) => {
                        latitudeC = coords.latitude;
                        longitudeC = coords.longitude;
                        initializeMap();
                    },
                    (error) => console.error("Error getting current location:", error.message)
                );
            } else {
                console.error("Geolocation is not supported by this browser.");
            }
        }
        
        function initializeMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: latitudeC, lng: longitudeC },
                zoom: 13,
                mapTypeControl: false,
                scrollwheel: true,
            });
        
            autocomplete = new google.maps.places.Autocomplete(
                document.getElementById("autocomplete"),
                { types: ["establishment"] }
            );
        
            autocomplete.addListener("place_changed", onPlaceChanged);
        
            infowindow = new google.maps.InfoWindow();
        
            // Initialize geocoder
            geocoder = new google.maps.Geocoder();
        
            // Initialize Places Service
            placesService = new google.maps.places.PlacesService(map);
        
            // Add mousemove event listener to the map container
            google.maps.event.addDomListener(map, 'mousemove', handleMouseMove);
        
            map.addListener("click", handleMapClick);
        }
        
        function handleMouseMove(event) {
            const latLng = event.latLng;
        
            latitudeC = latLng.lat(); // Update latitude
            longitudeC = latLng.lng(); // Update longitude
        
            // Reverse geocode the latitude and longitude to obtain place information
            geocoder.geocode({ location: latLng }, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK && results && results.length > 0) {
                    const place = results[0];
        
                    // Request place details based on place ID
                    placesService.getDetails({
                        placeId: place.place_id
                    }, function(placeDetails, status) {
                        if (status === google.maps.places.PlacesServiceStatus.OK && placeDetails) {
        
                            if (placeDetails.photos && placeDetails.photos.length > 0) {
        
                                infowindow.close();
                                let content = '<div>';
                                content += `<h4>${placeDetails.name}</h4>`;
        
                                const photoUrl = placeDetails.photos[0].getUrl({
                                    maxWidth: 500,
                                    maxHeight: 500,
                                });
                                content += `<img src="${photoUrl}" alt="${placeDetails.name}" style="max-width: 100%; height: auto;">`;
                                content += '</div>';
                                infowindow.setContent(content);
                                infowindow.setPosition(latLng);
                                infowindow.open(map);
                            }
                        } else {
                            console.error("Place details request failed:", status);
                        }
                    });
                } else {
                    console.error("Geocode request failed:", status);
                }
            });
        }
        
        function handleMapClick(mapsMouseEvent) {
            const latlng = mapsMouseEvent.latLng;
        
            latitudeC = latlng.lat(); // Update latitude
            longitudeC = latlng.lng(); // Update longitude
        
            removeMarkers();
        
            const marker = new google.maps.Marker({
                position: latlng,
                map: map
            });
        
            markersArray.push(marker);
        
            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({ location: latlng }, (results, status) => {
                if (status === "OK" && results[0]) {
                    const address = results[0].formatted_address;
                    updateInputFields(latitudeC, longitudeC, results[0].address_components, address);
                    showInfoWindow(latlng, address);
                } else {
                    console.error("Geocoder failed due to:", status);
                }
            });
        }
        
        function onPlaceChanged() {
            const place = autocomplete.getPlace();
        
            if (!place.geometry || !place.geometry.location) {
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }
        
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        
            removeMarkers();
        
            const marker = new google.maps.Marker({
                position: place.geometry.location,
                map: map,
                title: place.name
            });
            markersArray.push(marker);
        
            const address = place.formatted_address;
            updateInputFields(place.geometry.location.lat(), place.geometry.location.lng(), place.address_components, address);
            showInfoWindow(place.geometry.location, address);
        }
        
        function updateInputFields(latitude, longitude, addressComponents, fullAddress) {
            const getAddress = type => addressComponents.find(component => component.types.includes(type))?.long_name || "";
            document.getElementById("autocomplete").value = fullAddress || "";
            document.getElementById("city").value = getAddress("locality");
            document.getElementById("country").value = getAddress("country");
            document.getElementById("state").value = getAddress("administrative_area_level_1");
            document.getElementById("postal_code").value = getAddress("postal_code");
        
            $('#add_latitude').val(latitude);
            $('#add_longitude').val(longitude);
        }
        
        function showInfoWindow(latlng, address) {
            const contentString = `<div><p><b>Address:</b> ${address}</p></div>`;
            infowindow.setContent(contentString);
            infowindow.setPosition(latlng);
            infowindow.open(map);
        }
        
        function removeMarkers() {
            markersArray.forEach(marker => marker.setMap(null));
            markersArray.length = 0;
        }
        
        function mapRefresh() {
            // Clear all markers from the map
            removeMarkers();
        
            // Close all open info windows
            infowindow.close();
        
            const latlng = { lat: latitudeC, lng: longitudeC };
            getCurrentLocation();
        }
        
        function editChangeMap(latitude, longitude, address) {
        
            const latlng = { lat: latitude, lng: longitude };
        
            removeMarkers();
            // Create a marker at the clicked location
            const marker = new google.maps.Marker({
                position: latlng,
                map: map
            });
        
            // Set content for InfoWindow
            const contentString = `<div><p><b>Formatted Address:</b> ${address}</p></div>`;
            infowindow.setContent(contentString);
            infowindow.setPosition(latlng);
            infowindow.open(map);
        
            map.setCenter(latlng);
            map.setZoom(17);
        
            markersArray.push(marker);
        }
        
        let currentLocationBtn = document.getElementById("currentLocationBtn");
        currentLocationBtn.addEventListener("click", () => {
            getCurrentLocation();
        });
        
        function getCurrentLocation() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(
                    ({ coords }) => {
                        const latitude = coords.latitude;
                        const longitude = coords.longitude;
                        handleCurrentLocation(latitude, longitude);
                    },
                    (error) => console.error("Error getting current location:", error.message)
                );
            } else {
                console.error("Geolocation is not supported by this browser.");
            }
        }
        
        function handleCurrentLocation(latitude, longitude) {
            const geocoder = new google.maps.Geocoder();
        
            const latlng = { lat: latitude, lng: longitude };
        
            removeMarkers();
        
            // Create a marker at the clicked location
            const marker = new google.maps.Marker({
                position: latlng,
                map: map
            });
            markersArray.push(marker);
        
            geocoder.geocode({ location: latlng }, (results, status) => {
                if (status === "OK" && results[0]) {
                    const address = results[0].formatted_address;
                    updateInputFields(latitude, longitude, results[0].address_components, address);
                    showInfoWindow(latlng, address);
        
                } else {
                    console.error("Geocoder failed due to:", status);
                }
            });
        }


</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const defaultTimeSlots = [
        '01:00', '02:15', '03:30', '04:45', '06:00', '07:15', '08:30', '09:45',
        '11:00', '12:15', '13:30', '14:45', '16:00', '17:15', '18:30', '19:45',
        '21:00', '22:15'
    ];

    let currentDate = new Date();
    let selectedDate = null;
    let selectedTimeSlot = null;
    const calendarGrid = document.getElementById('calendar-grid');
    const monthNameSpan = document.getElementById('month-name');
    const yearNameSpan = document.getElementById('year-name');
    const timeContainer = document.querySelector('.time-container .time-grid');

    function renderCalendar(date) {
        const year = date.getFullYear();
        const month = date.getMonth();
        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();

        calendarGrid.innerHTML = '';

        // Add previous month empty slots
        for (let i = 0; i < firstDay; i++) {
            const cell = document.createElement('div');
            calendarGrid.appendChild(cell);
        }

        // Add current month dates
        for (let i = 1; i <= lastDate; i++) {
            const cell = document.createElement('div');
            cell.className = 'calendar-cell';
            cell.style.textAlign = 'center';
            cell.style.padding = '10px';
            cell.style.cursor = new Date(year, month, i) < new Date() ? 'not-allowed' : 'pointer';
            cell.dataset.date = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
            cell.textContent = i;
            cell.addEventListener('click', function () {
                if (new Date(year, month, i) >= new Date()) {
                    renderTimeSlots(cell.dataset.date);
                    selectDate(cell);
                }
            });
            calendarGrid.appendChild(cell);
        }

        monthNameSpan.textContent = monthNames[month];
        yearNameSpan.textContent = year;
    }

    function renderTimeSlots(date) {
        // Example logic to change time slots based on the selected date
        // You can customize this part based on your business logic
        let timeSlots;
        const selectedDate = new Date(date);
        const dayOfWeek = selectedDate.getDay();

        if (dayOfWeek === 0 || dayOfWeek === 6) { // Weekends
            timeSlots = [
                '09:00', '10:15', '11:30', '12:45', '14:00', '15:15', '16:30', '17:45'
            ];
        } else { // Weekdays
            timeSlots = defaultTimeSlots;
        }

        timeContainer.innerHTML = '';

        timeSlots.forEach(slot => {
            const div = document.createElement('div');
            div.className = 'time-select';
            div.style.textAlign = 'center';
            div.innerHTML = `<a href="javascript:void(0)" style="display: inline-block; padding: 10px 15px; border: 1px solid #000; border-radius: 5px;" data-time="${slot}">${slot}</a>`;
            div.addEventListener('click', function () {
                selectTimeSlot(div.querySelector('a'));
            });
            timeContainer.appendChild(div);
        });
    }

    function selectDate(cell) {
        if (selectedDate) {
            selectedDate.classList.remove('selected');
        }
        selectedDate = cell;
        selectedDate.classList.add('selected');
    }

    function selectTimeSlot(slot) {
        if (selectedTimeSlot) {
            selectedTimeSlot.classList.remove('selected');
        }
        selectedTimeSlot = slot;
        selectedTimeSlot.classList.add('selected');
    }

    document.getElementById('prev-month').addEventListener('click', function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    document.getElementById('next-month').addEventListener('click', function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });

    renderCalendar(currentDate);
    renderTimeSlots(currentDate.toISOString().split('T')[0]); // Initial time slots
});
</script>

