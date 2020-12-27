@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')





<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>cart</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<!--section start-->
<section class="cart-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    @if(session('cart')) 
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">total price</th>
                        </tr>
                    </thead>                                               
                    @foreach(session('cart') as $details)  
                    <tbody>
                        <tr>
                            <td>
                                <a href="{{url('product/'.$details['slug'])}}"><img src="{{url('storage/app/'.$details['image'])}}" width="140" alt=""></a>
                            </td>
                            <td><a href="{{url('product/'.$details['slug'])}}">{{ $details['name'] }}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col-xs-3">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" name="quantity" class="form-control input-number"
                                                       value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">TK.{{ $details['price'] }}</h2>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>TK.{{ $details['price'] }}</h5>
                            </td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input onchange="updateCart(this,{{ $details['product_id'] }})" type="number" name="quantity" class="form-control input-number"
                                               value="{{ $details['quantity'] }}">
                                    </div>
                                </div>
                            </td>
                            <td><a style="cursor: pointer" onclick="deleteCart({{ $details['product_id'] }})" class="icon"><i class="ti-close"></i></a></td>

                            <td>
                                <h4 class="td-color">TK.{{ $details['subtotal'] }}</h4>
                            </td>
                        </tr>
                    </tbody>
                  
                    @endforeach
                    @else
                    <thead>
                        <tr class="table-head">
                            <th scope="col">Your cart is empty</th>

                        </tr>
                    </thead>
                    @endif
                </table>
                @if(session('order_data'))
                <table class="table cart-table table-responsive-md">
                    <tfoot>
                        <tr>
                            <td>Sub total :</td>
                            <td>
                                <h5 id="order_total">TK.{{session('order_data')['order_total']}}</h5>
                            </td>

                        </tr>
                        <tr>
                            <td>Shipping Cost :</td>
                            <td>
                                <h5 id="shipping">TK.{{session('order_data')['shipping_cost']}}</h5>
                            </td>

                        </tr>
                        <tr>
                            <td>Vat/Tax Cost :</td>
                            <td>
                                <h5 id="tax">TK.{{session('order_data')['order_tax_amount']}}</h5>
                            </td>

                        </tr>
                        <tr>
                            <td>Grand Total :</td>
                            <td>

                                <h4 id="grand_total">TK.{{session('order_data')['order_grand_total']}}</h4>
                            </td>

                        </tr>
                    </tfoot>
                </table>
                @endif
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-6"><a href="#" class="btn btn-solid">continue shopping</a></div>
            <div class="col-6"><a style="cursor: pointer;color: white" onclick="goToCheckout()" class="btn btn-solid">check out</a></div>
        </div>
        <div id="success_msg" style="text-align: center"></div>
    </div>
</section>
<!--section end-->
<script>
    function updateCart(string, id){
       
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: "{{url('cart/update-to-cart')}}/",
            data:{product_id:id, quantity:string.value, attribute_id:''},
            success: function (data, textStatus, jqXHR) {

            }
    }).done(function () {
    $("#success_msg").html("Data Save Successfully");
    getCart();
    setTimeout(function(){
    location.reload();
    }, 500);
    })
    };
    function updateCartAttribute(string, id){
       
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: "{{url('cart/update-to-cart')}}",
            data:{product_id:id, quantity:'', attribute_id:string.value},
            success: function (data, textStatus, jqXHR) {

            }
    }).done(function () {
    $("#success_msg").html("Data Save Successfully");
    getCart();
    setTimeout(function(){
//    location.reload();
    }, 500);
    })
    };
    function deleteCart(id){
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: "{{url('cart/delete-to-cart')}}/",
            data:{product_id:id, quantity:'', attribute_id:''},
            success: function (data, textStatus, jqXHR) {

            }
    }).done(function () {
    $("#success_msg").html("Data Save Successfully");
    getCart();
    setTimeout(function(){
    location.reload();
    }, 500);
    })
    };
    function goToCheckout(){
//    let shipping_cost = $('#shipping').text().split(".")[1];
//    let tax_cost = $('#tax').text().split(".")[1];
//    let grand_total = $('#grand_total').text().split(".")[1];
    let order_total = $('#order_total').text().split(".")[1];
    if (order_total != null)
    {
    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            url: "{{url('cart/go-to-checkout')}}/",
//            data:{shipping_cost:shipping_cost, tax_cost:tax_cost, grand_total:grand_total, order_total:order_total},
            success: function (data, textStatus, jqXHR) {

            }
    }).done(function () {
    $("#success_msg").html("Redirecting to checkout page");
    setTimeout(function(){
    window.location.href = '{{url('cart/checkout')}}';
    }, 1000);
    })
    } else{
    alert('please add products to cart to go for checkout');
    }
    };

</script>
@endsection
