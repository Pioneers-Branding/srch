@extends('frontend.layouts.app')
@section('title') {{ 'signin' }} 
@endsection
@section('content')

<div class="login-container">
            <div class="login-box">
                <h2>Sign In</h2>
                <form id="loginForm">
                    @csrf
                    <label for="email">Contact Number</label>
                    <input type="text" name="mobile" id="mobile" placeholder="Contact Number">
                    <span class="text-danger" id="mobile-error"></span>
                    
                    <div class="remember-me">
                        <input type="checkbox" id="remember-me" name="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
        
                    <button type="submit" id="first_submit">Sign In Now</button>
        
                    <p class="register-link">Don't have an account?
                    <a href="{{ route('front.signup') }}">Register</a></p>
                </form>
        
                <form id="otpForm" style="display: none;">
                    @csrf
                    <div class="single-signup margin-top-30">
                    <input class="form--control" type="hidden" name="mobile" id="otp_mobile" placeholder="Contact Number">
                    </div>
                                        
                    <label for="otp">Enter OTP</label>
                    <input type="text" id="" type="number" name="otp" placeholder="Enter OTP" required>
                    <span class="text-danger" id="otp_error"></span>
                    <button type="submit" id="otp_submit">Verify OTP</button>
                </form>
            </div>
        </div>


        

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $(document).ready(function() {
             var loginForm = $('#loginForm');
             var otpForm = $('#otpForm');
             
             $('#loginForm').submit(function(event) {
                    event.preventDefault();
                
                    var mobileNumber = $('#mobile').val();
                    var mobileNumberRegex = /^[0-9]{10}$/;
                    if (!mobileNumberRegex.test(mobileNumber)) {
                        $('#mobile-error').text('Mobile number must be 10 digits');
                        return;
                    }
                
                    $.ajax({
                        url: "{{ url('api/login_otp') }}",
                        method: 'POST',
                        data: $(this).serialize(),
                        beforeSend: function() {
                            $('#first_submit').html(`Processing.. <img style="width:30px; height:30px;" src="{{ url('public/frontend/assets/img/ajax-loader.gif') }}">`).attr('disabled', true);
                        },
                        success: function(response) {
                            $('#first_submit').html('Sign In').attr('disabled', false);
                            if (response.status) {
                                $('#otp_mobile').val(mobileNumber);
                                otpForm.show();
                                loginForm.hide();
                            } else {
                                $('#mobile-error').text(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
            });

             $('#otpForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ url('api/login') }}",
                    method: 'POST',
                    data: formData,
                    beforeSend: function() {
                            $('#otp_submit').html(`Processing... <img style="width:30px; height:30px;" src="{{ url('public/frontend/assets/img/ajax-loader.gif') }}"> `).attr('disabled', true);
                        },
                    success: function(response) {
                        
                        $('#otp_submit').html('Verify').attr('disabled', false);
                        
                        if (response.status) {
                            // Redirect or show success message
                            
                            var referrer = document.referrer;
                            var url = new URL(referrer);
                            var referrerPath = url.pathname;
                            var pageName = referrerPath.split('/').pop();
                            //   console.log(pageName);
                            if (pageName=='signin' || 'signup' ) {
                                window.location.href = "{{ request('page') ? url(request('page')) : url('/home') }}";
                            } else { 
                                window.location.href = document.referrer;
                            }
                            
                            console.log(document.referrer);
                        } else {
                            // Show error message
                            $('#otp_error').text(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Show error message if request fails
                        console.log(error);
                    }
                });
            });
        });
    </script>