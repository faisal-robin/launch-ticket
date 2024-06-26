@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')


<section class="abh-breadcrumb-area" style="background-image:url({{url('frontend/launchticket/assets/img/banner-testimonial.jpg')}})">
    <div class="breadcrumb-top">
        <div class="container">
            <div class="col-lg-12">
                <div class="breadcrumb-box">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout Page Area Start -->
<section class="checkout-page-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-left-box">
                    <h3>Passenger Details</h3>
                    <form id="customerForm" method="post">
                        @csrf
                        @method('POST')
                        <div class="row checkout-form">
                            <input type="hidden" id="r_id" name="r_id" value="{{$room_details->id}}">
                            <input type="hidden" id="s_id" name="s_id" value="{{$schedule_details[0]->id}}">
                            <div class="col-md-6">
                                <label for="name23">First Name</label>
                                <input type="text" name="customer_first_name" id="customer_first_name">
                            </div>
                            <div class="col-md-6">
                                <label for="name22">Last Name</label>
                                <input type="text" name="customer_last_name" id="customer_last_name">
                            </div>
                        </div>
                        <div class="row checkout-form">
                            <div class="col-md-12">
                                <label for="addr2">Address</label>
                                <input type="text" name="customer_address" id="customer_address">
                            </div>
                        </div>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="info2">Email Address *</label>
                                <input type="email" name="customer_email" id="customer_email">
                            </div>
                            <div class="col-md-6">
                                <label for="info2">Mobile Number *</label>
                                <input type="text" name="customer_phone" id="customer_phone">
                            </div>
                        </div>
                        <div class="row checkout-form">
                            <div class="col-md-12">
                                <label for="info2">Order Note *</label>
                                <textarea name="ordernote"></textarea>
                            </div>
                        </div>                         
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-summury-box color_1">
                    <h3>Journey Details</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>{{$schedule_details[0]->terminal_name}} - {{$boarding_terminal->terminal_name}}</td>
                            </tr>
                            <tr>
                                <td>{{$schedule_details[0]->launch_name}}</td>
                            </tr>
                            <tr>
                                <td>{{$schedule_details[0]->schedule_date}}, {{$schedule_details[0]->schedule_time}}</td>
                            </tr>
                            <tr>
                                <td>Cabin No(s): {{$room_details->room_no}}</td>
                            </tr>
                            <tr>
                                <td>Boarding at {{$boarding_terminal->terminal_name}}, 08:00 PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="order-summury-box color_3 mt-3">
                    <h3>Fare Details</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>Ticket Price</td>
                                <td>৳ {{$room_details->sell_price}}</td>
                            </tr>
                            <tr>
                                <td>Launch Ticket Fee</td>
                                <td>৳ 00</td>
                            </tr>
                            <tr>
                                <td>Delivery Charge</td>
                                <td>৳ 00</td>
                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td>৳ 00</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>৳ {{$room_details->sell_price}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="booking-right">
                    <div class="abh-payment clearfix">
                        <br>
                        <div class="payment">
                            <button style="width: 100%" class="your-button-class" id="sslczPayBtn"
                                    token="if you have any token validation"
                                    postdata=""
                                    order="If you already have the transaction generated for current order"
                                    endpoint="{{url('pay-via-ajax')}}"> Pay Now
                            </button>
                        </div>
                        <!-- <div class="payment">
                            <input type="radio" id="ss-option" name="selector">
                            <label for="ss-option">BKash</label>
                            <div class="check">
                                <div class="inside"></div>
                            </div>
                            <p>Your ticket(s) would be reserved and inactive for 30 minutes from the time of booking. Pay through bKash and confirm your transaction ID within 30 minutes to get the confirmed ticket.</p>
                        </div>
                        <div class="payment">
                            <input type="radio" id="s-option" name="selector">
                            <label for="s-option">Credit Card</label>
                            <div class="check">
                                <div class="inside"></div>
                            </div>
                            <img src="assets/img/master-card.jpg" alt="credit card">
                        </div> -->

                    </div>
                    <!-- <div id="successMsg" class="text-center p-2" style="color: white;height: 35px;background-color: graytext;display: none"></div>
                    <div class="action-btn">
                        <button style="cursor: grab" class="abh-btn" id="proceedToPay">Proceed to Pay</button>
                        <a class="abh-btn" id="proceedToPay">Proceed to Pay</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Checkout Page Area End -->

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<!-- <script>
    $('#proceedToPay').click(function () {
        $(".error_msg").html('');
        let data = $('#customerForm').serialize();
        $.ajax({
            url: '{{url('booking')}}',
            method: 'POST',
            data: data,
            success: function (response) {
                $('#successMsg').css("display", "block").html('Customer saved Successfully.');
                // $('#customerForm')[0].reset();
            }, error(data, textStatus, jqXHR) {
                $(window).scrollTop(300);
                var json_data = JSON.parse(data.responseText);
                $.each(json_data.errors, function (key, value) {
                    $("#" + key).after("<span class='error_msg' style='color: red;font-weigh: 600'>" + value + "</span>");
                });
            }
        });
    });
<<<<<<< HEAD
</script>
<script>
=======
</script> -->
<script>

    $("#sslczPayBtn").click(function () {
        var obj = {};
        obj.customer_first_name = $('#customer_first_name').val();
        obj.customer_last_name = $('#customer_last_name').val();
        obj.customer_address = $('#customer_address').val();
        obj.customer_email = $('#customer_email').val();
        obj.customer_phone = $('#customer_phone').val();
        obj.r_id = $('#r_id').val();
        obj.s_id = $('#s_id').val();
        $('#sslczPayBtn').prop('postdata', obj);
    });


    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };
        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
@endsection