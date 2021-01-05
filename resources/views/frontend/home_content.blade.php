@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')

<!-- Slider Area Start -->
<section class="abh-slider-area overlay">
    <div class="abh-slide owl-carousel">
        @foreach($all_slider as $v_slider)
        <div class="slider-container">           
            <div class="single-slider zoom" style="background: url({{asset('storage/app/'.$v_slider->slider_image)}});">
            </div>         
        </div>
        @endforeach
        <!-- <div class="slider-container slider-3">
            <div class="single-slider zoom">
            </div>
        </div>
        <div class="slider-container slider-4">
            <div class="single-slider zoom">
            </div>
        </div>
        <div class="slider-container slider-5">
            <div class="single-slider zoom">
            </div>
        </div> -->
    </div>
    <div class="banner-area">
        <div class="banner-caption">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 content-home">
                        <div class="banner-welcome">
                            <h4 class="text">travel with Luxury Room</h4>
                            <div class="caption-inner">
                                <div class="ah-headline">
                                    <span class="typed-static">Enjoy</span>
                                    <span class="ah-words-wrapper">
                                        <b class="is-visible"> Adventure</b>
                                        <b> Holiday</b>
                                        <b> Luxurious</b>
                                    </span>
                                </div>
                            </div>
                            <div class="search-section">
                                <div role="tabpanel">
                                    <!-- BEGIN: CATEGORY TAB -->
                                    <ul class="nav nav-tabs search-top" role="tablist" id="searchTab">
                                        <li role="presentation" class="text-center">
                                            <a class="active show" href="#launch" aria-controls="launch" role="tab"
                                               data-toggle="tab">
                                                <i class="fa fa-ship"></i>
                                                <span>launchS</SPAN>
                                            </a>
                                        </li>

                                    </ul>
                                    <!-- END: CATEGORY TAB -->

                                    <!-- BEGIN: TAB PANELS -->
                                    <div class="tab-content gradient-border">
                                        <!-- BEGIN: launch SEARCH -->
                                        <div role="tabpanel" class="tab-pane active" id="launch">
                                            <form action="{{url('search-schedules')}}" method="post" id="searchScheduleForm">
                                                @csrf
                                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="row">
                                                    <div class="col-lg-12 product-search-title">Book launch Room ( Vip,
                                                        Semi Vip, Normal, AC, Non AC )
                                                    </div>
                                                    <!-- <div class="col-lg-12 search-col-padding">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="inlineRadioOptions"
                                                                id="inlineRadio1" value="One Way"> One Way
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="inlineRadioOptions"
                                                                id="inlineRadio2" value="Round Trip"> Round Trip
                                                        </label>
                                                    </div> -->
                                                    <div class="clearfix"></div>

                                                    <div class="col-lg-3 col-sm-6 search-col-padding">
                                                        <label>Departure From</label><br>
                                                         <input id="search_departure" type="text" class="form-control" placeholder="Where to source...">
                                                         <input id="search_departure_id" name="search_departure_id" type="hidden" class="form-control" placeholder="Where to source...">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-3 col-sm-6 search-col-padding">
                                                        <label>Arrival At</label><br>
                                                         <input id="search_arrival" type="text" class="form-control" placeholder="Where to source...">
                                                     <input id="search_arrival_id" name="search_arrival_id" type="hidden" class="form-control" placeholder="Where to source...">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-3 col-sm-6 search-col-padding">
                                                        <label>Departure Date</label>
                                                        <div class="input-group">

                                                            <input id="departure_date" name="departure_date" autocomplete="off"
                                                                   class="form-control" placeholder="MM/DD/YY"
                                                                   type="date" style="background-color: white;background: white">
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-3 col-sm-6 search-col-padding">
                                                        <button type="submit"
                                                           class="search-button btn transition-effect" id="searchLaunch">
                                                            Search
                                                            launchs
                                                        </button>
<!--                                                        <a type="submit"
                                                           class="search-button btn transition-effect" id="searchLaunch">Search
                                                            launchs
                                                        </a>-->
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- END: launch SEARCH -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider Area End -->

<section class="hotline-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="hotline">
                    <div class="row">
                        <!-- <div class="col-lg-7 col-sm-8" style="font-size:15px;
                                                    background-color: #f7f7f7;"> -->
                        <div class="col-lg-5">
                            <div class="hotline-text">
                                <p>For Telephone booking service</p>
                                <h2>Please Call</h2>
                            </div>

                        </div>

                        <div class="col-lg-7 align-self-center">
                            <div class="hotline-number">
                                <i class="fa fa-phone"></i>+8809638336699
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END: TAB PANE -->
    </div>
</section>

<!-- About Page Start -->
<section class="abh-about-page" style="background-image: url({{asset('public')}}/frontend_asset/img/wave 4.png);">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 align-self-center">
                <div class="about-page-left">
                    <!-- <h3>About Us</h3> -->
                    <h2>Why buy tickets from us?</h2>
                    <ul class="list-style">
                        <li>
                            Buy launch tickets anytime from anywhere
                        </li>
                        <li>Pay by credit card, mobile banking or cash</li>
                        <li>Get tickets delivered to your doorstep</li>
                        <li>Dependable customer service 8 AM to 11 PM</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="about-page-right">
                    <span id="overlap1"><img class="img-fluid" src="{{asset('public')}}/frontend_asset/img/launch.png" alt="about page" /></span>
                </div>
            </div>
            <!-- <div class="col-lg-12">
                <div class="arnx5">
                    <span id="overlap1"><img class="img-fluid" src="{{asset('public')}}/frontend_asset/img/wave 4.png" alt="about page" /></span>
                </div>
            </div> -->

        </div>
    </div>
</section>
<!-- About Page End -->


<!-- Awesome Tour Area Start -->
<section class="abh-awesome-tour-area">

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="shape-image text-center">
                    <!-- <img class="img-fluid" src="{{asset('public')}}/frontend_asset/img/bann-img.png" alt=""> -->
                    <div class="grun-img shape-3">
                        <img class="img-fluid" src="{{asset('public')}}/frontend_asset/img/spin-bg.png" alt="">
                    </div>
                    <div class="video-btn">
                        <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="popup-youtube">
                            <i class="flaticon-play-button"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 align-self-center">
                <div class="awesome-tour-box">

                    <h2>Go Ahead & Make Awesome Tour</h2>
                    <p>Discover hidden wonders on trips With abh</p>
                    <!-- <a href="#" class="abh-btn btn-border">Explore More <i class="fa fa-angle-double-right"></i> </a> -->
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Awesome Tour Area End -->





<!-- Destination Area Start -->
<section class="abh-destination-area section_70" style="background-image: url('{{asset('public')}}/frontend_asset/img/city7.png');">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="site-heading">
                    <h2>Room Categories</h2>
                    <p>Lorem ipsum dolor sit amet, conseetuer adipiscing elit. Aenan comdo igula eget. Aenean massa cum
                        sociis Theme natoque.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="destination-slider owl-carousel">
                    <div class="single-destination">
                        <a href="hotel-details.php">
                            <div class="destination-image">
                                <img src="{{asset('public')}}/frontend_asset/img/destination-1.jpg" alt="destination" />
                                <div class="destination-title">
                                    <h3>Semi VIP</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-destination">
                        <a href="hotel-details.php">
                            <div class="destination-image">
                                <img src="{{asset('public')}}/frontend_asset/img/destination-2.jpg" alt="destination" />
                                <div class="destination-title">
                                    <h3>Family AC</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-destination">
                        <a href="hotel-details.php">
                            <div class="destination-image">
                                <img src="{{asset('public')}}/frontend_asset/img/destination-3.jpg" alt="destination" />
                                <div class="destination-title">
                                    <h3>VIP</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-destination">
                        <a href="hotel-details.php">
                            <div class="destination-image">
                                <img src="{{asset('public')}}/frontend_asset/img/destination-4.jpg" alt="destination" />
                                <div class="destination-title">
                                    <h3>Single N/AC</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-destination">
                        <a href="hotel-details.php">
                            <div class="destination-image">
                                <img src="{{asset('public')}}/frontend_asset/img/destination-5.jpg" alt="destination" />
                                <div class="destination-title">
                                    <h3>Double N/AC</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-destination">
                        <a href="hotel-details.php">
                            <div class="destination-image">
                                <img src="{{asset('public')}}/frontend_asset/img/destination-6.jpg" alt="destination" />
                                <div class="destination-title">
                                    <h3>Deluxe Cabin</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-destination">
                        <a href="hotel-details.php">
                            <div class="destination-image">
                                <img src="{{asset('public')}}/frontend_asset/img/destination-3.jpg" alt="destination" />
                                <div class="destination-title">
                                    <h3>Double AC</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="single-destination">
                        <a href="hotel-details.php">
                            <div class="destination-image">
                                <img src="{{asset('public')}}/frontend_asset/img/destination-4.jpg" alt="destination" />
                                <div class="destination-title">
                                    <h3>SOFA</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Destination Area End -->




<!-- Choose Area Start -->
<section class="abh-choose-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="site-heading">
                    <h2>Some Good Reason</h2>
                    <p>Lorem ipsum dolor sit amet, conseetuer adipiscing elit. Aenan comdo igula eget. Aenean massa cum
                        sociis Theme natoque.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="single-choose color_1">
                    <p>01</p>
                    <div class="choose-image">
                        <img src="{{asset('public')}}/frontend_asset/img/choose-1.png" alt="Safe Travel" />
                    </div>
                    <div class="choose-desc">
                        <h3>Safe Travel</h3>
                        <p>printing and typesetting industry has been printing the industry’s ipsum</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-choose color_2">
                    <p>02</p>
                    <div class="choose-image">
                        <img src="{{asset('public')}}/frontend_asset/img/choose-2.png" alt="Awesome Guide" />
                    </div>
                    <div class="choose-desc">
                        <h3>Awesome Guide</h3>
                        <p>printing and typesetting industry has been printing the industry’s ipsum</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-choose color_3">
                    <p>03</p>
                    <div class="choose-image">
                        <img src="{{asset('public')}}/frontend_asset/img/choose-3.png" alt="Save Money" />
                    </div>
                    <div class="choose-desc">
                        <h3>Save Money</h3>
                        <p>printing and typesetting industry has been printing the industry’s ipsum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Choose Area End -->


<!-- Reviews Area Start -->
<section class="abh-reviews-area section_70" style="background-image: url({{asset('public')}}/frontend_asset/img/banner-testimonial.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="reviews-slider owl-carousel">
                    <div class="single-reviews">
                        <div class="reviews-image">
                            <img src="{{asset('public')}}/frontend_asset/img/reviews-2.png" alt="reviews-1" />
                        </div>
                        <div class="reviews-text">
                            <div class="reviewer">
                                <h3>Luaka Smith</h3>
                            </div>
                            <p>"Launch Ticket delivered tickets to my home at the promised time slot! Now I can just go
                                to Sadarghat and board the launch."</p>
                        </div>
                    </div>
                    <div class="single-reviews">
                        <div class="reviews-image">
                            <img src="{{asset('public')}}/frontend_asset/img/reviews-1.png" alt="reviews-1" />
                        </div>
                        <div class="reviews-text">
                            <div class="reviewer">
                                <h3>joseph steve</h3>
                            </div>
                            <p>"Launch Ticket delivered tickets to my home at the promised time slot! Now I can just go
                                to Sadarghat and board the launch."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Reviews Area End -->


<!-- Blog Area Start -->
<section class="abh-blog-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="site-heading">
                    <h2>Latest Blog</h2>
                    <p>Lorem ipsum dolor sit amet, conseetuer adipiscing elit. Aenan comdo igula eget. Aenean massa cum
                        sociis Theme natoque.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="single-blog-item">
                    <div class="blog-image">
                        <a href="blog.html">
                            <img src="{{asset('public')}}/frontend_asset/img/blog-2.jpg" alt="blog" />
                        </a>
                    </div>
                    <div class="blog-desc">
                        <div class="post-meta">
                            <p class="date">20 jan, 2020</p>
                        </div>
                        <h3><a href="single-blog.html">Lorem ipsum dolor sit</a></h3>
                        <p>There are many variations of passages of lorem ipsum available but the majority have suffered
                            alteration...</p>
                        <a href="#" class="btn-link readmore">Read more <span><i
                                    class="fa fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-blog-item">
                    <div class="blog-image">
                        <a href="blog.html">
                            <img src="{{asset('public')}}/frontend_asset/img/blog-1.jpg" alt="blog" />
                        </a>
                    </div>
                    <div class="blog-desc">
                        <div class="post-meta">
                            <p class="date">20 jan, 2020</p>
                        </div>
                        <h3><a href="single-blog.html">Lorem ipsum dolor sit.</a></h3>
                        <p>There are many variations of passages of lorem ipsum available but the majority have suffered
                            alteration...</p>
                        <a href="#" class="btn-link readmore">Read more <span><i
                                    class="fa fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-blog-item">
                    <div class="blog-image">
                        <a href="blog.html">
                            <img src="{{asset('public')}}/frontend_asset/img/blog-3.jpg" alt="blog" />
                        </a>
                    </div>
                    <div class="blog-desc">
                        <div class="post-meta">
                            <p class="date">20 jan, 2020</p>
                        </div>
                        <h3><a href="single-blog.html">Lorem ipsum dolor sit</a></h3>
                        <p>There are many variations of passages of lorem ipsum available but the majority have suffered
                            alteration...</p>
                        <a href="#" class="btn-link readmore">Read more <span><i
                                    class="fa fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Area End -->



@endsection