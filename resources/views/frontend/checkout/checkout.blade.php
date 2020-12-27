@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')


<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Check-out</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Check-out</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->


<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="checkout-page">
            <div class="checkout-form">
                <form id="myForm">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Shipping Details</h3>
                            </div>
                            <div class="row check-out">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">First Name</div>
                                    <input type="text" name="first_name" id="first_name" value="" placeholder="">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Last Name</div>
                                    <input type="text" name="last_name" id="last_name" value="" placeholder="">
                                </div>
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">Phone</div>
                                    <input type="text" name="phone" id="phone" value="" placeholder="">
                                </div>
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">Email Address</div>
                                    <input type="text" name="email" id="email" value="" placeholder="">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Country</div>
                                    <select  id="country" onchange="getStates(this.value)">
                                        <option value="">Select Country</option>
                                        @foreach($all_country as $row)
                                        <option value="{{$row->id}} | {{$row->name}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">State</div>
                                    <select id="statesoption" >

                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Address</div>
                                    <input type="text" name="address" id="address" value="" placeholder="Street address">
                                </div>

                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">Postal Code</div>
                                    <input type="text" name="postal_code" id="postal_code" value="" placeholder="">
                                </div>
                                <!--Hiden Input-->
                                <input type="hidden" name="country_name" id="country_name">
                                <input type="hidden" name="country_id" id="country_id">
                                <input type="hidden" name="state_name" id="state_name">
                                <input type="hidden" name="state_id" id="state_id">
                                <!--Hiden Input-->
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    @if(session('cart'))                                     
                                    @foreach(session('cart') as $id => $details)                                      
                                    <ul class="qty">
                                        <li>{{$details['name']}} × {{$details['quantity']}} <span>Tk. {{$details['subtotal']}}</span></li>

                                    </ul>
                                    @endforeach                       
                                    @endif
                                    <ul class="sub-total">
                                        <li>Sub total <span class="count">
                                                @if(session('order_data'))
                                                Tk.{{session('order_data')['order_sub_total']}}
                                                @endif
                                            </span></li>
                                        <li>Shipping
                                            <div class="shipping">
                                                <div class="shopping-option">
                                                    <input type="checkbox" name="free-shipping" id="free-shipping">
                                                    <label for="free-shipping">Free Shipping</label>
                                                </div>
                                                <div class="shopping-option">
                                                    <input type="checkbox" name="local-pickup" id="local-pickup">
                                                    <label for="local-pickup">Local Pickup</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="total">
                                        <li>Grand Total <span class="count"> Tk.@if(session('order_data')){{session('order_data')['order_grand_total']}}@endif</span></li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-1"
                                                               checked="checked">
                                                        <label for="payment-1">Cheque Payments<span
                                                                class="small-text">Please send a check to Store
                                                                Name, Store Street, Store Town, Store State /
                                                                County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-2">
                                                        <label for="payment-2">Cash On Delivery<span
                                                                class="small-text">Please send a check to Store
                                                                Name, Store Street, Store Town, Store State /
                                                                County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option paypal">
                                                        <input type="radio" name="payment-group" id="payment-3">
                                                        <label for="payment-3">PayPal<span class="image"><img
                                                                    src="../assets/images/paypal.png"
                                                                    alt=""></span></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @if(session('order_data'))<div class="text-right"><a  onclick="placeOrder()" class="btn-solid btn">Place Order</a></div>@endif

                                </div>
                                <div id="success_msg" style="text-align: center"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->
<script>
    function placeOrder() {
        let formData = $('#myForm').serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{url('cart/place-order')}}/",
            data: formData,
            success: function (data, textStatus, jqXHR) {

            }
        }).done(function () {
            $("#success_msg").html("Order placed Successfully");
            setTimeout(function () {
                window.location.href = '{{url('/')}}';
            }, 1500);
//                location.reload();
        }).fail(function(data, textStatus, jqXHR) {
            var json_data = JSON.parse(data.responseText);
            $.each(json_data.errors, function(key, value){
                $("#" + key).after("<span class='error_msg' style='color: red;font-weigh: 600'>" + value + "</span>");
            });
        });
    }
    ;

    function getStates(string)
    {
        var splitted = string.split('|');
        var id = splitted.shift();
        var country_name = splitted.join(',');
        $('#country_id').val(id);
        $('#country_name').val(country_name);
        $.ajax({
            url: "{{url('get-states')}}/" + id,
            success: function (response) {
                $('#statesoption').html(response);
            }
        });
    }
</script>
<script>
    $(document).on('change', '#statesoption', function() {
        let state_value = $("select#statesoption option").filter(":selected").val();
        var splitted = state_value.split('|');
        var id = splitted.shift();
        var state_name = splitted.join(',');
        
        $('#state_id').val(id);
        $('#state_name').val(state_name);
    });

</script>
@endsection