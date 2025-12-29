@extends('frontend.layouts.app')
@section('title') {{ 'forgotpassword' }} @endsection
@section('content')
 <div class="signup-area padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="signup-wrapper">
                <div class="signup-contents">
                    <h3 class="signup-title">Forgot Password</h3>
                    <form class="signup-forms" action="#" id="forgotpasswordForm">
                         @csrf
                        
                        <div class="single-signup margin-top-30">
                            <label class="signup-label"> Email* </label>
                            <input class="form--control" type="Email" name="email" placeholder="Email">
                             <span class="text-danger" id="email-error"></span>
                        </div>
                       
                        
                        <button type="submit" id="first_submit" class="mt-5">Reset Password</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  
    $(document).ready(function() {
      $('#forgotpasswordForm').submit(function(event) {
    event.preventDefault();

    // Disable submit button and display "Processing" text
    $('#first_submit').text('Processing').prop('disabled', true);

    $.ajax({
        url: "{{ url('/api/forgotPassword') }}",
        method: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            // Enable submit button and display success message
            $('#first_submit').text('Sign In').prop('disabled', false);
            $('#email-error').text(response.message).addClass('text-success');
        },
        error: function(xhr, status, error) {
            // Enable submit button and display error message
            $('#first_submit').text('Sign In').prop('disabled', false);
            $('#email-error').text('An error occurred, please try again.').addClass('text-danger');
            console.log(error);
        }
    });
});

        
   
});

</script>

     