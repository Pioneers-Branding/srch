@extends('frontend.layouts.app')
@section('title', 'Career at SR Chess Academy | Join Our Team')
@section('description', 'Join SR Chess Academy! We are looking for passionate chess coaches and professionals to help us grow the chess community in Delhi.')

@section('content')

<style>
    .top-h-mobile {
        display: none;
    }
    @media (max-width: 767.98px) {
        .top-h-mobile {
            display: block !important;
        }
        .top-h-desktop {
            display: none !important;
        }
    }
</style>

<section class="top-h top-h-desktop">
    <img src="{{ asset('frontend/assets/srcamain/images/contact-desktop1.webp') }}" style="width: 100%; height: auto; display: block;">
</section>

<section class="top-h top-h-mobile">
    <img src="{{ asset('frontend/assets/srcamain/images/contact-mob.webp') }}" style="width: 100%; height: auto; display: block;">
</section>

<section>
    <div class="w-100 pb-100 opc7 position-relative">
        <div class="fixed-bg"></div>
        <div class="container">
            <div class="row mt-4">
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                </div>
            </div>
            <div class="sec-title4 text-center w-100">
                <div class="sec-title4-inner d-inline-block">
                    <h2 class="mb-0">Join Our Team:</h2>
                    <p class="mb-0">Fill out the form below and we'll reach out to you soon!</p>
                </div>
            </div>
            <div class="contact-form d-flex flex-wrap justify-content-center text-center w-100">
                <form class="w-100" method="POST" action="{{ route('front.contact.store') }}">
                    @csrf
                    <div class="response w-100"></div>
                    <div class="field-box w-100"><input class="brd-rd10 fname" type="text" name="fname" placeholder="Full Name" required></div>
                    <div class="field-box w-100"><input class="brd-rd10 number" type="number" name="number" placeholder="Number" required></div>
                    <div class="field-box w-100"><input class="brd-rd10 email" type="email" name="email" placeholder="Email" required></div>
                    <div class="field-box w-100">
                        <select class="brd-rd10 subject" name="subject" required style="width: 100%; padding: 15px; border: 1px solid #eee; margin-bottom: 20px;">
                            <option value="" disabled selected>Applied For</option>
                            <option value="Chess Coach">Chess Coach</option>
                            <option value="Administrative Assistant">Administrative Assistant</option>
                            <option value="Content Writer">Content Writer</option>
                            <option value="Social Media Manager">Social Media Manager</option>
                            <option value="Tournament Organizer">Tournament Organizer</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="field-box w-100"><textarea class="brd-rd10 contact_message" name="contact_message" placeholder="Comments" required></textarea></div>
                    <div class="btn-box w-100"><button class="thm-btn scndry-bg brd-rd10 position-relative overflow-hidden" type="submit" id="submit">Submit Now</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection