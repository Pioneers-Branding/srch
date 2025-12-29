@extends('frontend.layouts.app')
@section('title') {{ 'signup' }} @endsection
@section('content')

 <div class="signup-container">
        <div class="signup-box">
            <h2>Sign Up</h2>
            <form id="registerForm">
                @csrf
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first_name" placeholder="First Name">
                <span class="text-danger" id="errors_first_name"></span>
                
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last_name" placeholder="Last Name">
                <span class="text-danger" id="errors_last_name"></span>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <span class="text-danger" id="errors_email"></span>
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <span class="text-danger" id="errors_password"></span>
                
                 
                <label for="gender">Gender</label>
                <div class="gender-options">
                    <input type="radio" id="male" name="gender" id="male" value="male">
                    <label for="male">Male</label>

                    <input type="radio" id="female" name="gender" id="female" value="female">
                    <label for="female">Female</label>

                    <input type="radio" id="other" name="gender" id="other" value="other">
                    <label for="other">Other</label>
                    <span class="text-danger" id="errors_gender"></span>
                </div>

                <label for="contact-number">Contact Number</label>
                <input type="text" id="mobile" name="mobile" placeholder="Contact Number" required>

                <button type="submit">Sign Up Now</button>
                <p class="register-link">Already have an account?
                    <a href="{{ route('front.signin') }}">Login Now</a></p>
            </form>
        </div>
    </div>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  
   $(document).ready(function() {
    $('#registerForm').submit(function(event) {
        event.preventDefault();
        var mobile = $('#mobile').val();
         var mobileNumber = $('#mobile').val();
         var mobileNumberRegex = /^[0-9]{10}$/;
        
        if(mobile==''){
           $('#errors_mobile').text('mobile number field required');
            
        }else if(!mobileNumberRegex.test(mobileNumber)){
            $('#errors_mobile').text('Mobile number must be 10 digits');
    }
        
        $('#submitBtn').prop('disabled', true);

        var formData = $(this).serialize();

        $('.error-message').text('');

        $.ajax({
            url: "/api/register", // Replace with actual API URL for registration
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.status) {
                    // Redirect to sign-in page on successful registration
                    window.location.href = "/signin"; // Replace with actual sign-in URL
                } else {
                    // Display error messages
                    $.each(response.errors, function(key, value) {
                        // Assuming you have error message containers with class 'error-message'
                        $('#errors_' + key ).text(value);
                    });
                }
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    var responseErrors = xhr.responseJSON.errors;
                    console.log(responseErrors);
                    $.each(responseErrors, function(key, value) {
                        // Assuming you have error message containers with class 'error-message'
                        $('#errors_' + key ).text(value);
                    });
                } else {
                   
                    console.log("AJAX request failed:", error);
                }
            },
            complete: function() {
                $('#submitBtn').prop('disabled', false);
            }
        });
    });
});


</script>

     