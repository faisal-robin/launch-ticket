@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')

<section class="abh-breadcrumb-area">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2>Cabin</h2>
                    <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Cabin</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="seats">
    <div class="container">
        <div class="seats-wrapper">
            <p class="div-header-content">Cabin-wise seat availability</p>
            <div class="seat-availability-starts">
                <div class="content-starts">
                    <div class="row justify-content-between">
<!--                        <div class="col-lg-5">
                            <p class="div-header-shortnote">Maximum of 2 cabins can be booked per ticket.</p>
                            <table class="price-list">
                                
                                
                                
                                <tr style="background-color: #f97250;">
                                    <td width="40%">Cabin Type</td>
                                    <td width="30%">Cabin Fare</td>
                                    <td width="20%">Availability</td>
                                </tr>
                               
                               
                            </table>
                        </div>-->

                        <div class="col-lg-8 offest-2" align-self-center">
                            <form action="{{url('checkout')}}" method="GET">

                        <div class="col-lg-5 align-self-center">
                        <form action="{{ url(checkout) }}" type="post">

                            <div class="cabin-details">
                                <div class="row">
                                    <div class="col">                                      
                                            <label>Cabin type</label>

                                            <select class="form-control" class="wide" name="category_id" id="category_info"> 

                                                <option value="">Select Category</option>
                                                @foreach($all_category as $v_category)
                                                <option value="{{$v_category->id}}">{{$v_category->category_name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col">
                                        <label>Select Cabin</label>
                                        <select class="form-control"  name="room" id="cabin_info">
                                            <option value="">Select Cabin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="cabin-type">Boarding Point*</label>

                                        <select class="form-control" class="wide" name="boarding_point">
                                            @foreach($boarding_point as $row)
                                            <option value="{{$row->id}}">{{$row->terminal_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col">
                                        <div id="price" style="background-color:#ddd;text-align: center;width: auto; height: 60px;padding: 15px; font-weight:700; font-size:24px;">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col">

                                        <button  type="submit" class="search-button btn transition-effect">Continue
                                        </button>
                                    </div>
                                </div>
                                <br>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#category_info").change(function () {
        let schedule_id = <?php echo $schedule_id?>;
        let catId = $(':selected').val();

        $.ajax({
            url: '{{url('rooms-by-schdule')}}',
            data: {schedule_id: schedule_id,category_id:catId},
            method: 'GET',
            success: function (response) {
             $('#cabin_info').html(response);
            }
        });
    });

    $("#cabin_info").change(function () {
        var room_id = $('#cabin_info').val();
        $.ajax({
            url: '{{url('room-price')}}',
            data: {room_id: room_id},
            method: 'GET',
            success: function (response) {
             $('#price').text('৳'+response);
            }
        });
    });
</script>

@endsection