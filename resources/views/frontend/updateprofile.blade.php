@extends('frontend.layouts.app')
@section('title') {{ 'User-profile' }} @endsection
@section('content')

<style>
     #profile_picture_preview{   
         width: 30%;
         height: 20%;
         border-radius: 50%;
         cursor:pointer;
         margin-left:6%;
     }
</style>
 <div class="signup-area padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="signup-wrapper">
                <div class="signup-contents">
                    <h3 class="signup-title">Update Profile</h3>
                    <form class="signup-forms" action="#" id="updatprofileForm" enctype='multipart/form-data' >
                         @csrf
                         
                         @php
                            $user = Auth::user();
                        @endphp
                        
                        <div class="single-signup margin-top-30">
                            <label class="signup-label invisible"> Profile Picture* </label>
                            <input type="file" class="form-control" name="profile_image" id="profile_picture_input" style="display:none">
                            <span class="text-danger" id="errors_profile_picture"></span>
                            <img src="{{ $user->profile_image }}" alt="Profile Picture" id="profile_picture_preview" click="docmunet.getelementById(profile_picture_input)">
                        </div>
                        <div class="single-signup margin-top-30">
                            <label class="signup-label"> First Name* </label>
                            <input class="form--control" type="text" name="first_name" placeholder=" First Name" value="{{ $user->first_name ?? '' }}">
                             <span class="text-danger" id="errors_first_name"></span>
                        </div>
                        <div class="single-signup margin-top-30">
                            <label class="signup-label"> Last Name* </label>
                            <input class="form--control" type="text" name="last_name" placeholder="Last Name" value="{{ $user->last_name ?? '' }}">
                            <span class="text-danger" id="errors_last_name"></span>
                        </div>
                        <div class="single-signup margin-top-30">
                            <label class="signup-label"> Email* </label>
                            <input class="form--control" type="Email" name="email" placeholder="Email" value="{{ $user->email ?? '' }}">
                             <span class="text-danger" id="errors_email"></span>
                        </div>
                        <div class="single-signup margin-top-30">
                            <label class="signup-label"> Gender* </label>
                            <br>

                            <fieldset>
                                <div class="some-class">
                                    <input type="radio" class="radio" name="gender" {{ $user->gender=="male" ? 'checked' : '' }} value="male" id="y" />
                                    <label for="y">Male</label>
                                    <input type="radio" class="radio" name="gender" {{ $user->gender=="female" ? 'checked' : '' }} value="female" id="z" />
                                    <label for="z">Female</label>
                                    <input type="radio" class="radio" name="gender" {{ $user->gender=="other" ? 'checked' : '' }} value="other" id="t" />
                                    <label for="t">Other</label>
                                </div>
                            </fieldset>
                            <span class="text-danger" id="errors_gender"></span>
                        </div>
                         <div class="single-signup margin-top-30">
                            <label class="signup-label"> Contact Number* </label>
                            <input class="form--control"  type="number" name="mobile" id="mobile" placeholder="Contact Number" value="{{ $user->mobile ?? '' }}">
                            <span class="text-danger" id="errors_mobile"></span>
                        </div>
                        <button type="submit" id="submitBtn" class="mt-5">Update Profile</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/bs5-toast/dist/bs5-toast.js"></script>
<script>

</script>
<script>
  
     $(document).ready(function() {
         
         $('#profile_picture_preview').click(function() {
            $('#profile_picture_input').click();
        });
         
         $('#profile_picture_input').change(function() {
            var file = this.files[0];
            
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#profile_picture_preview').attr('src', e.target.result).show().lity();
                }
                reader.readAsDataURL(file);
            }
        });


    $('#updatprofileForm').submit(function(event) {
    event.preventDefault();
    
    // Validate mobile number
    var mobile = $('#mobile').val();
    var mobileNumberRegex = /^[0-9]{10}$/;

    if (mobile == '') {
        $('#errors_mobile').text('Mobile number field is required');
    } else if (!mobileNumberRegex.test(mobile)) {
        $('#errors_mobile').text('Mobile number must be 10 digits');
    } else {
        // Clear mobile number error message
        $('#errors_mobile').text('');

        // Disable submit button
        $('#submitBtn').prop('disabled', true);

        // Create FormData object to include both form data and file data
        var formData = new FormData($(this)[0]);

        // Make AJAX request
        $.ajax({
            url: "/api/update-profile", // Replace with actual API URL for updating profile
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {

                // Color scheme: success
                new bs5.Toast({
                	body: response.message,
                	className: 'border-0 bg-success text-white',
                	btnCloseWhite: true,
                }).show()

                setTimeout(function() {
                    location.reload();
                }, 500);

                } else {
                    // Display error messages
                    $.each(response.errors, function(key, value) {
                        $('#errors_' + key).text(value);
                    });
                }
            },
            error: function(xhr, status, error) {
                if (xhr.status === 422) {
                    var responseErrors = xhr.responseJSON.errors;
                    $.each(responseErrors, function(key, value) {
                        $('#errors_' + key).text(value);
                    });
                } else {
                    console.log("AJAX request failed:", error);
                }
            },
            complete: function() {
                // Re-enable submit button
                $('#submitBtn').prop('disabled', false);
            }
        });
    }
});

});

</script>

     