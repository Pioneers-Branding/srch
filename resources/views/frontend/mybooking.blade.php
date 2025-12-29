@extends('frontend.layouts.app')
@section('title') {{ 'Bookings' }} @endsection
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
<style>
.no_yes{
    color: #702543;
    background: #fff;
    box-shadow: 0 1px 4px 1px rgba(0, 0, 0, .1);
    border: 2px solid #702543;
    
    
}
   .owl-carousel.version-1, .owl-carousel.version-2{
   position: relative;
   padding: 15px 35px 0;
   }
   .logo-slider-1, .logo-slider-2{
   width: 100%;
   max-width: 1000px;
   margin: 0 auto 40px;
   text-align: center;
   }
   .owl-carousel .owl-item {
   background: #fff;
   /*padding: 0 20px;*/
   }
   .owl-nav button {
   position: absolute;
   top: 0;
   bottom: 0;
   width: 30px;
   height: 30px;
   background: #fff !important;
   border-radius: 50%;
   margin: auto 0;
   box-shadow: 0px 0px 5px #00000069;
   }
   .owl-nav button.owl-next{
   right: 0;
   }
   .owl-nav button.owl-prev{
   left: 0;
   }
   .version-2 h2 {
   margin: 0px;
   font-size: 20px;
   }
   .version-2 p {
   font-size: 15px;
   }
   .version-2 .owl-item{
   text-align: center;
   padding: 10px 20px 20px;
   }
   .version-2 .owl-item img{
   width: 160px;
   margin: 0 auto;
   }
   
 
.tgg {
    max-width: 70% !important;
    margin: 1.75rem auto;}
    
    .tk{
        height: 600px;
    }

</style>
@section('content')
<script>
   BookingList();
</script>
<section class="About-area padding-top-100 padding-bottom-140">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 margin-top-40">
            <div class="dashboard-status-list">
               <ul class="tabs status-order-list margin-bottom-10">
                  <li class="active" data-tab="tab-pending"> Pending
                  </li>
                  <li data-tab="tab-confirmed"> Confirmed  </li>
                  <li data-tab="tab-check_in" style="display:none;"> Check In  </li>
                  <li data-tab="tab-checkout" style="display:none;"> Checkout  </li>
                  <li data-tab="tab-cancelled"> Cancelled  </li>
                  <li data-tab="tab-completed"> Completed  </li>
               </ul>
            </div>
            <div id="tab-pending" class="tab-content-item active">
               <div class="row">
                  <div class="col-lg-12" id="pending_list">
                     <div class="row margin-top-20">
                        <script> 
                           var LoaderHTML = setLoaderClasses('col-xl-12 col-lg-12 col-sm-12 col-md-12');
                           document.write(LoaderHTML.repeat(1))
                        </script>
                     </div>
                  </div>
               </div>
            </div>
            <div id="tab-confirmed" class="tab-content-item">
               <div class="row">
                  <div class="col-lg-12" id="confirmed_list">
                     <script> 
                        var LoaderHTML = setLoaderClasses('col-xl-12 col-lg-12 col-sm-12 col-md-12');
                        document.write(LoaderHTML.repeat(1))
                     </script>
                  </div>
               </div>
            </div>
            <!--new start-->
            
            <!-- Large modal -->

<div class="modal fade bd-example-modal-xl" id="rescheduleModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl tgg">
        <div class="modal-content tk"  style=" overflow-y: auto; padding:20px;">
            <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
            <div class="date-overview">
                <div class="single-date-overview margin-top-30 ">
                    <h4 class="date-time-title">Available on {{ \Carbon\Carbon::now()->format('M Y') }}</h4>
                    <ul class="date-time-list margin-top-20 date-container owl-carousel version-1">
                        @php
                        $currentDate = \Carbon\Carbon::now();
                        $daysInMonth = $currentDate->daysInMonth;
                        $currentDayOfWeek = $currentDate->dayOfWeek;
                        @endphp
                        @for ($i = 1; $i <= $daysInMonth; $i++)
                        @php
                        $date = $currentDate->copy()->day($i);
                        $isActive = $date->dayOfWeek === $currentDayOfWeek;
                        $isPastDate = $date->lt($currentDate); // Check if the date is in the past
                        $isActiveDate = $date->isToday(); // Check if the date is today
                        @endphp
                        <li class="list {{ $isPastDate ? 'past-date' : '' }} {{ $isActiveDate ? 'active' : '' }} date-select" data-date="{{ $date->format('Y-m-d') }}" style="{{ $isPastDate ? 'cursor: not-allowed' : '' }}">
                            <a href="javascript:void(0)" style="{{ $isPastDate ? 'cursor: not-allowed' : '' }}"> {{ $date->format('d M, Y - D') }}</a>
                        </li>
                        @endfor
                    </ul>
                </div>
                <div class="single-date-overview margin-top-30 time-container">
                    <h4 class="date-time-title"> Available schedule </h4> 
                    <div class="mt-2">
                        <p><strong>Morning</strong></p>
                        <ul class="date-time-list margin-top-15 morning-list">
                            <!-- Slots will be dynamically added here -->
                        </ul>
                    </div>
                    <div class="mt-2">
                        <p><strong>Afternoon</strong></p>
                        <ul class="date-time-list margin-top-15 afternoon-list">
                            <!-- Slots will be dynamically added here -->
                        </ul>
                    </div>
                    <div class="mt-2">
                        <p><strong>Evening</strong></p>
                        <ul class="date-time-list margin-top-15 evening-list">
                            <!-- Slots will be dynamically added here -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <div class="btn-wrapper">
                <input name="date" type="hidden" value="" name="date" id="order_date" />
                <input name="time" type="hidden" value="" name="time" id="order_time" />
                <input type="button" class="cmn-btn btn-bg-3 booking_submit change_schedule_btn" data-date-time="true" value="Save changes" id="booking" />
            </div>
            </div>
        </div>
    </div>
</div>
            <!--new end-->
            <!-- second start Modal -->
            <div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
               <div class="modal-dialog  modal-lg" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="date-overview">
                           <div class="single-date-overview margin-top-30 ">
                              <h4 class="date-time-title">Available on {{ \Carbon\Carbon::now()->format('M Y') }}</h4>
                              <ul class="date-time-list margin-top-20 date-container owl-carousel version-1">
                                 @php
                                 $currentDate = \Carbon\Carbon::now();
                                 $daysInMonth = $currentDate->daysInMonth;
                                 $currentDayOfWeek = $currentDate->dayOfWeek;
                                 @endphp
                                 @for ($i = 1; $i <= $daysInMonth; $i++)
                                 @php
                                 $date = $currentDate->copy()->day($i);
                                 $isActive = $date->dayOfWeek === $currentDayOfWeek;
                                 $isPastDate = $date->lt($currentDate); // Check if the date is in the past
                                 $isActiveDate = $date->isToday(); // Check if the date is today
                                 @endphp
                                 <li class="list {{ $isPastDate ? 'past-date' : '' }} {{ $isActiveDate ? 'active' : '' }} date-select" data-date="{{ $date->format('Y-m-d') }}" style="{{ $isPastDate ? 'cursor: not-allowed' : '' }}" >
                                    <a href="javascript:void(0)" style="{{ $isPastDate ? 'cursor: not-allowed' : '' }}"> {{ $date->format('d M, Y - D') }}</a>
                                 </li>
                                 @endfor
                              </ul>
                           </div>
                           <div class="single-date-overview margin-top-30 time-container">
                              <h4 class="date-time-title"> Available schedule on 
                              
                               <?php echo date('d M, Y'); ?></h4>
                               
                              <div class="mt-2">
                                 <p ><strong>Morning</strong></p>
                                 <ul class="date-time-list margin-top-15 morning-list ">
                                    <!-- Slots will be dynamically added here -->
                                 </ul>
                              </div>
                              <div class="mt-2">
                                 <p><strong>Afternoon</strong></p>
                                 <ul class="date-time-list margin-top-15 afternoon-list ">
                                    <!-- Slots will be dynamically added here -->
                                 </ul>
                              </div>
                              <div class="mt-2">
                                 <p><strong>Evening</strong></p>
                                 <ul class="date-time-list margin-top-15 evening-list ">
                                    <!-- Slots will be dynamically added here -->
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <div class="btn-wrapper">
                           <input  name="date" type="hidden" value="" name="date" id="order_date" />
                           <input  name="time" type="hidden" value="" name="time" id="order_time" />
                           <input type="button" class="cmn-btn btn-bg-3 booking_submit change_schedule_btn" data-date-time="true" value="Save changes" id="booking" />
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--second start-->
            
            <!-- First Modal -->
            <div class="modal fade" id="bookingStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-scrollable bd1" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <h6 style="text-align:center">Do You Want to cancle this booking</h6>
                     </div>
                     <div class="modal-footer">
                        <div class="btn-wrapper">
                           <a type="button" class="cmn-btn btn-bg-3 resude_btn" style="cursor:pointer;">Reschedule Appointment</a>
                           <a type="button" class="cmn-btn no_yes" style="cursor:pointer;" id="cancleyes">Yes</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--end-->
            <!--first popup-->
            <div id="tab-check_in" class="tab-content-item">
               <div class="row">
                  <div class="col-lg-12" id="check_in_list">
                     <script> 
                        var LoaderHTML = setLoaderClasses('col-xl-12 col-lg-12 col-sm-12 col-md-12');
                        document.write(LoaderHTML.repeat(1))
                     </script>
                  </div>
               </div>
            </div>
            <div id="tab-checkout" class="tab-content-item">
               <div class="row">
                  <div class="col-lg-12" id="checkout_list">
                     <script> 
                        var LoaderHTML = setLoaderClasses('col-xl-12 col-lg-12 col-sm-12 col-md-12');
                        document.write(LoaderHTML.repeat(1))
                     </script>
                  </div>
               </div>
            </div>
            <div id="tab-cancelled" class="tab-content-item">
               <div class="row">
                  <div class="col-lg-12" id="cancelled_list">
                     <script> 
                        var LoaderHTML = setLoaderClasses('col-xl-12 col-lg-12 col-sm-12 col-md-12');
                        document.write(LoaderHTML.repeat(1))
                     </script>
                  </div>
               </div>
            </div>
            <div id="tab-completed" class="tab-content-item">
               <div class="row">
                  <div class="col-lg-12" id="completed_list">
                     <script> 
                        var LoaderHTML = setLoaderClasses('col-xl-12 col-lg-12 col-sm-12 col-md-12');
                        document.write(LoaderHTML.repeat(1))
                     </script>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
   // Slider version 1
   $('.owl-carousel.version-1').owlCarousel({
   loop:true,
   margin:15,
   responsiveClass:true,
   responsive:{
       0:{
           items:2,
           nav:true
       },
       600:{
           items:3,
           nav:false
       },
       1000:{
           items:4,
           nav:true
       }
   }
   });
   // Slider version 2
</script>
<script>
   $(document).ready(function() {
    function getSlotData(date , formattedTime="") {
           $.ajax({
            url:   api_url + '/branch-configuration?branch_id=1',
            method: 'GET',
            dataType:'json',
            success: function(response) {
              if (response.status) {
                 generateTimeSlotsForDate(response, date , formattedTime);
              }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data from the API:', error);
            }
        });
       }
 
       function generateTimeSlotsForDate(response, date , formattedTime="") {
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
                    
                    if (formattedTime==startTime.format('h:mm')) {
                        listItem.addClass('active');
                    }
                     
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
       
       $(document).on("click",".resude_btn",function(e) {
            e.preventDefault();
            
            var desiredDate = $(this).attr('data-date'); 
            
            var [bookingDate, bookingTime] = desiredDate.split(' ');
           
            $('.date-container .list').removeClass('active');
            $('.time-container .list').removeClass('active');
        
            $('.date-container .list').each(function() {
                
                var date = $(this).data('date');
                
                if (date === bookingDate) {
                    
                    $(this).addClass('active');
                    $(this).parent().parent().removeClass('active');
                    $(this).parent().addClass('active');
                }
            });
            
            var time = moment(bookingTime, "HH:mm:ss");
            var formattedTime = time.format("h:mm");
            
            getSlotData(bookingDate , formattedTime);
            
       });
   
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
            console.log(time);
            $('#order_time').val(time);
            return true; // Time selected
        } else {
            console.log('No time selected.');
            $('.time-error').text('Please select a time slot');
            return false; // No time selected
        }
    }
    
    function saveBooking(booking_id , callback) {
               
                
    $('.booking_submit').prop('disabled', true);
    $('.booking_submit').text('Processing...');
   
    var formData = {
        
        id: booking_id,
        date: $('[name=date]').val(),
        time: $('[name=time]').val(),
        '_token' : csrf_token,
        'status' : 'pending',
        
    };
   
    $.ajax({
        url: api_url + '/booking-update',
        
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function (res) {
    
            if (res.status) {
                BookingList();
                $('#rescheduleModal').modal('hide');
                window.location.reload();
            }
         
            $('.booking_submit').prop('disabled', false); 
            $('.booking_submit').text('Submit'); 
        },
        error: function (error) {
            console.error('Error fetching data:', error);
        
            $('.booking_submit').prop('disabled', false); 
            $('.booking_submit').text('Submit');
        }
    });
   }  
        
    $(document).on('click', ".change_schedule_btn", function () {
        
            if (!getDateTime()) {
                return; // Stop if no time selected
            }
            
            var booking_id = $(this).data('booking_id');
        
            saveBooking(booking_id);
    });
        
   
   });
   
   //   this function for booking submit 
        
        
</script>
@endsection