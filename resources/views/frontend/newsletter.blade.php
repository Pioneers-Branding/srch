@extends('frontend.layouts.app')

@section('title', 'Booking Successful')

@section('content')
<div class="container mt-5">
    <div class="alert alert-success">
    <h1>Thank you for subscribing!</h1>
    <p>Hello, {{ $email }}!</p>
    <p>We’re excited to have you on board. Stay tuned for our latest updates and offers!</p>
    </div>
</div>
@endsection
