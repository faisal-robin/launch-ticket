@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')


<section class="abh-breadcrumb-area" style="background-image:url({{url('frontend/launchticket/assets/img/banner-testimonial.jpg')}})">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2>Launch Ticket</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout Page Area Start -->
<section class="checkout-page-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="color: green;text-align: center;">Booking Sucessfull</h1>
                <h3 style="text-align: center;">Email will be sent within 5 to 10 minutes</h3>
            </div>
        </div>
    </div>
</section>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>
@endsection