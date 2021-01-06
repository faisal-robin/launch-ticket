@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')


<!-- Breadcrumb Area Start -->
<section class="abh-breadcrumb-area" style="background-image: {{url('/frontend/launchticket/assets/img/hotel-banner.jpg')}};">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2>Room Details</h2>
                    <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Room Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<div class="hotel-details-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="hotel-heading">
                    <h3 class="hotel-name">{{$ctg_info[0]->category_name}}</h3>
                    <!--<h3 class="hotel-address"><i class="fa fa-ship"></i>MV Manami</h3>-->
                </div>
                <div class="hotel-image-inner">
                    <div class="details-slider owl-carousel">                       
                        @foreach($category_rooms as $key=>$value)
                        <div class="single-destination">
                            <a href="#">
                                <div class="destination-image">
                                    <img class="img-fluid" src="@if(isset($value->room_images[0])) {{url('storage/app/'.$value->room_images[0]->image_source)}} @endif" style="height: 360px;" alt="destination" />
                                </div>
                            </a>
                        </div>
                        @if($key == 5)
                        @break;
                        @endif
                        @endforeach
                    </div>                    
                </div>
                <div class="hotel-details-tab-inner">
                    <section class="abh-tab-menu-area">
                        <div class="row">
                            <div class="col d-flex">
                                <ul class="nav nav-menu-tabs" role="tablist">

                                    <li>
                                        <a class="active show" data-toggle="tab" href="#hotel-description" role="tab"
                                           aria-controls="hotel-description" aria-selected="false">
                                            Description</a>
                                    </li>

<!--
                                    <li>
                                        <a class="" data-toggle="tab" href="#facilities" role="tab"
                                           aria-controls="facilities" aria-selected="false"> Facilities</a>
                                    </li>-->


                                    <!-- <li>
                                        <a class="" data-toggle="tab" href="#hotel-itinerary" role="tab"
                                            aria-controls="hotel-itinerary" aria-selected="true">Itinerary</a>
                                    </li> -->


                                    <!-- <li>
                                        <a class="" data-toggle="tab" href="#map" role="tab" aria-controls="map"
                                            aria-selected="true">Map</a>
                                    </li> -->

                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div id="hotel-description" class="tab-pane show active">

                                <div class="tab-details-inner">
                                  {!!$ctg_info[0]->category_description!!}
                                </div>

                            </div>
<!--                            <div id="facilities" class="tab-pane">

                                <div class="tab-details-inner">
                                    <p>Food not included with package price for Makkah / Madinah (where not
                                        specified), but
                                        available at hotel or restaurant (approx. SR10/per lunch or dinner and
                                        SR5/per breakfast).
                                        Food Menu - Breakfast: Paratha / Ruti, Dall / Eggs / Vegetable, Lunch &
                                        Diner: Chicken /
                                        Fish, Vegetable / Vorta / Shak, Dall, Plain Rice.

                                        Any kinds of personal cost or others which are not mentioned above.</p>
                                </div>

                            </div>-->
                            <!-- <div id="hotel-itinerary" class="tab-pane">

                                <div class="tab-details-inner">
                                    <p>Air ticket with all taxes on Kuwait / Air Arabia / Gulf or other Airlines:
                                        Dhaka – Jeddah –
                                        Dhaka / Dhaka – Madinah – Jeddah – Dhaka (economy class). / Dhaka – Jeddah –
                                        Madinah – Dhaka

                                        04 Nights hotel accommodation in Makkah / Madinah.

                                        Transportation Service: Jeddah/Madinah airport – Madinah Hotel – Makkah
                                        Hotel – Jeddah
                                        Airport.

                                        Visa fee with service charge.

                                        Health Insurance (Umrah).

                                        Meet & Assist at Jeddah / Madinah Airport.

                                        Room Service as per hotel rules.

                                        Umrah Hajj guide.

                                        Moyallem / Guide Servicem @ Umrah Period

                                        Ziyarah / Sightseeing tour in Makkah: Mina, Arafat, Muzdalifa, Jabal-e-Noor,
                                        Jabal-e-soor,
                                        Jannatul Mualla etc.

                                        Ziyarah / Sightseeing tour in Madinah: Masjid al-Nabawi , Jannatul Baqi ,
                                        Masjid Quba , Imam
                                        Ali [a]'s house, Masjid-e-Jummah etc.</p>
                                </div>

                            </div> -->
                            <!-- <div id="map" class="tab-pane">

                                <div class="tab-details-inner">

                                </div>

                            </div> -->



                        </div>


                    </section>
                </div>
                <div class="hotel-room-area">
                    <div class="row">
<!--                        <div class="col-lg-5 pad-right-0">
                            <div class="hotel-img-inner hotel-room-img-style-1">
                                <div class="price">
                                    <span class="price-num"> ৳ 9000 </span>
                                     <span class="price-night-text"> / night </span> 
                                </div>
                                <a href="assets/img/hotel-room1.jpg" class="popup-img">
                                    <img class="img-fluid" src="assets/img/hotel-room1.jpg" alt="Hotel Room" />
                                </a>
                                <div class="room-name">
                                    <h3>VIP Room- (Sakura)</h3>
                                </div>
                            </div>
                        </div>-->
                        <div class="col-lg-7">
                            <div class="hotel-four-room-inner">
                                <div class="row">
                                      @foreach($category_rooms as $key=>$value)
                                      @if($key>5)
                                    <div class="col-lg-6">
                                        <div class="hotel-img-inner">
                                            <div class="price">
                                                <span class="price-num"> ৳ {{$value->sell_price}}  </span>
                                                <!-- <span class="price-night-text"> / night </span> -->
                                            </div>
                                             @if(isset($value->room_images[0]))
                                            <a href="{{url('storage/app/'.$value->room_images[0]->image_source)}}" class="popup-img">
                                               
                                                <img class="img-fluid" src=" {{url('storage/app/'.$value->room_images[0]->image_source)}}"
                                                     alt="Hotel Room" />
                                                
                                            </a>
                                              @endif
                                            <div class="room-name">
                                                <h3>{{$ctg_info[0]->category_name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                      @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="sidebar-widget" id="sidebar">

                    <div class="single-sidebar">
                        <div class="quick_contact">
                            <h4>For Telephone booking service</h4>
                            <p>
                                <i class="fa fa-phone"></i>
                                 @isset(company_info()->company_phone){{company_info()->company_phone}}@endisset
                            </p>
                            <p>
                                <i class="fa fa-envelope"></i>
                               @isset(company_info()->company_email){{company_info()->company_email}}@endisset
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>






@endsection