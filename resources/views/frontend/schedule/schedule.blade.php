@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')

<section class="abh-breadcrumb-area" style="background-image:url({{url('/')}}/frontend/launchticket/assets/img/banner-testimonial.jpg)">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2>Launch List</h2>
                    <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Launch List</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="search-body pt-5 pb-5">
    <div class="search">
        <!-- <div class="launch-filter">
            <div class="launch-filter-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="launch-filter-options">

                                <div class="row">

                                    <div class="col-lg-2">
                                        <p>Launch's</p>

                                    </div>
                                    <div class="col-lg-2">
                                        <p>Name</p>

                                    </div>
                                    <div class="col-lg-2">
                                        <p>Departure</p>
                                    </div>
                                    <div class="col-lg-2">

                                        <p>Arrival</p>

                                    </div>
                                    <div class="col-lg-2">

                                        <p>Fare</p>

                                    </div>
                                    <div class="col-lg-2">

                                        <p>Cabins / Seats</p>

                                    </div>
                                    


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="launch-list-area">
            <div class="launch-list-start">
                <div class="container">

                    @foreach($launch_schedules as $key=>$value)
                   
                    <div class="launch-list-body">
                        <div class="launch-list">
                            <div class="row justify-content-center">
                                <div class="col-lg-2">
                                <div class="launch-image">
                                    <img class="img-fluid" src="{{asset('storage/app/'.$value->launch->launch_image)}}" style="width: 120px;height: 60px" alt="">
                                        </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="launch-list-content">
                                        <h2 class="launch-name">{{$value->launch->launch_name}}</h2>
                                        
                                    </div>

                                </div>
                                <div class="col-lg-2">
                                    <div class="launch-list-content">


                                        <p> DEPARTURE TIME &nbsp;
                                              {{$value->schedule_time}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="launch-list-content">


                                        <p> ARRIVAL TIME<br>
                                            02:45 PM</p>
                                    </div>

                                </div>
                                
                                <div class="col-lg-2">
                                    <div class="launch-list-content">


                                        <p> Fare<br>
                                          Tk. {{$value->launch->launch_price_range}}<br>
                                    </div>

                                </div>
                                <div class="col-lg-2">
                                    <div class="launch-list-content border-0">


                                    <a class="abh-btn" href="{{url('cabin/'.$value->launch->id)}}">Select Cabins</a>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    @endforeach
                    
                </div>
            </div>

        </div>
    </div>
</section>

@endsection