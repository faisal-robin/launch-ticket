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
                        <div class="col-lg-5">
                            <p class="div-header-shortnote">Maximum of 2 cabins can be booked per ticket.</p>
                            <table class="price-list">
                                <tr style="background-color: #f97250;">
                                    <td width="40%">Cabin Type</td>
                                    <td width="10%">Seats</td>
                                    <td width="30%">Cabin Fare</td>
                                    <td width="20%">Availability</td>
                                </tr>
                                <tr>
                                    <td width="40%">Single AC</td>
                                    <td width="10%">1</td>
                                    <td width="30%">1000</td>
                                    <td width="20%">12</td>
                                </tr>
                                <tr>
                                    <td width="40%">Single Non AC</td>
                                    <td width="10%">1</td>
                                    <td width="30%">900</td>
                                    <td width="20%">11</td>
                                </tr>
                                <tr>
                                    <td width="40%">Double AC</td>
                                    <td width="10%">2</td>
                                    <td width="30%">1800</td>
                                    <td width="20%">5</td>
                                </tr>
                                <tr>
                                    <td width="40%">Double Non AC</td>
                                    <td width="10%">2</td>
                                    <td width="30%">1600</td>
                                    <td width="20%">5</td>
                                </tr>
                                <tr>
                                    <td width="40%">Family AC</td>
                                    <td width="10%">3</td>
                                    <td width="30%">2700</td>
                                    <td width="20%">5</td>
                                </tr>
                                <tr>
                                    <td width="40%">Family Non AC</td>
                                    <td width="10%">3</td>
                                    <td width="30%">2400</td>
                                    <td width="20%">5</td>
                                </tr>
                                <tr>
                                    <td width="40%">VIP Single</td>
                                    <td width="10%">1</td>
                                    <td width="30%">4000</td>
                                    <td width="20%">11</td>
                                </tr>
                                <tr>
                                    <td width="40%">VIP Double</td>
                                    <td width="10%">2</td>
                                    <td width="30%">5000</td>
                                    <td width="20%">2</td>
                                </tr>
                                <tr>
                                    <td width="40%">VIP Family</td>
                                    <td width="10%">3</td>
                                    <td width="30%">5500</td>
                                    <td width="20%">4</td>
                                </tr>

                            </table>
                        </div>

                        <div class="col-lg-5 align-self-center">
                            <form>
                            <div class="cabin-details">
                                <div class="row">
                                    <div class="col">                                      
                                            <label>Cabin type</label>
                                            <select class="form-control" class="wide" name="" id="category_info"> 
                                                <option value="">Select Category</option>
                                                @foreach($all_category as $v_category)
                                                <option value="{{$v_category->id}}">{{$v_category->category_name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col">
                                        <label>Select Cabin</label>
                                        <select class="form-control"  name="" id="cabin_info">
                                            <option value="">Select Cabin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="cabin-type">Boarding Point*</label>
                                        <select class="form-control" class="wide">
                                            <option selected>Boarding Point</option>
                                            <option value="1">Sadarghat</option>
                                            <option value="2">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col">
                                        <div style="background-color:#ddd;text-align: center;width: auto; height: 60px;padding: 15px; font-weight:700; font-size:24px;">
                                            ৳1000
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col">
                                        <a href="#" type="submit" class="search-button btn transition-effect">Continue
                                        </a>
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
                console.log(response);
             $('#cabin_info').html(response);
            }
        });
    });
</script>

@endsection