@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')


<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>collection</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">collection</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->


<!-- section start -->
<section class="section-b-space ratio_asos">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 collection-filter">
                    <!-- side-bar colleps block stat -->
                    <div class="collection-filter-block">
                        <!-- brand filter start -->
                        <div class="collection-mobile-back">
                            <span class="filter-back">
                                <i class="fa fa-angle-left" aria-hidden="true"></i> back</span>
                        </div>
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">brand</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    @foreach($all_brand as $brand)
                                    <div class="custom-control custom-checkbox collection-filter-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="zara">
                                        <label class="custom-control-label" for="zara">
                                            {{ $brand->brand_name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @foreach($products_attributes as $key => $val)
                        <!-- size filter start here -->
                        <div class="collection-collapse-block border-0 open">
                            <h3 class="collapse-block-title">
                                {{ $key }}
                            </h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">

                                    @foreach($val as $row)
                                    <div class="custom-control custom-checkbox collection-filter-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="hundred" value="{{ $row->id }}">
                                        <label class="custom-control-label" for="hundred">
                                            {{ $row->attribute_name }}
                                        </label>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- price filter start here -->
                        <div class="collection-collapse-block border-0 open">
                            <h3 class="collapse-block-title">price</h3>
                            <div class="collection-collapse-block-content">
                                <div class="wrapper mt-3">
                                    <div class="range-slider">
                                        <input type="text" class="js-range-slider" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- silde-bar colleps block end here -->
                    <!-- side-bar single product slider start -->
                    <div class="theme-card">
                        <h5 class="title-border">new product</h5>
                        <div class="offer-slider slide-1">
                            <div>
                                <div class="media">
                                    <a href="#"><img class="img-fluid blur-up lazyload" src="{{asset('public')}}/frontend_asset/images/pro/1.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        <a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a href="#"><img class="img-fluid blur-up lazyload" src="{{asset('public')}}/frontend_asset/images/pro/1.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        <a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a href="#"><img class="img-fluid blur-up lazyload" src="{{asset('public')}}/frontend_asset/images/pro/1.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        <a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="media">
                                    <a href="#"><img class="img-fluid blur-up lazyload" src="{{asset('public')}}/frontend_asset/images/pro/1.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        <a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a href="#"><img class="img-fluid blur-up lazyload" src="{{asset('public')}}/frontend_asset/images/pro/1.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        <a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <a href="#"><img class="img-fluid blur-up lazyload" src="{{asset('public')}}/frontend_asset/images/pro/1.jpg" alt=""></a>
                                    <div class="media-body align-self-center">
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        <a href="product-page(no-sidebar).html">
                                            <h6>Slim Fit Cotton Shirt</h6>
                                        </a>
                                        <h4>$500.00</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- side-bar single product slider end -->
                    <!-- side-bar banner start here -->
                    <div class="collection-sidebar-banner">
                        <a href="#"><img src="{{asset('public')}}/frontend_asset/images/side-banner.png" class="img-fluid blur-up lazyload" alt=""></a>
                    </div>
                    <!-- side-bar banner end here -->
                </div>
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top-banner-wrapper">
                                    <a href="#">
                                        <img src="{{asset('storage/app/'.$category_info->category_cover_image)}}" class="img-fluid blur-up lazyload" alt="" style="max-height: 385px;">
                                    </a>
                                    <div class="top-banner-content small-section">
                                        <h4>
                                            {{ $category_info->category_name }}
                                        </h4>

                                        <p>
                                            {{ $category_info->category_description }}
                                        </p>
                                    </div>
                                </div>
                                <div class="collection-product-wrapper">
                                    <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="filter-main-btn">
                                                    <span class="filter-btn btn btn-theme">
                                                        <i class="fa fa-filter" aria-hidden="true"></i> 
                                                        Filter
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="search-count">
                                                        <h5>Showing Products 1-24 of 10 Result</h5>
                                                    </div>
                                                    <div class="collection-view">
                                                        <ul>
                                                            <li><i class="fa fa-th grid-layout-view"></i></li>
                                                            <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="collection-grid-view">
                                                        <ul>
                                                            <li><img src="{{asset('public')}}/frontend_asset/images/icon/2.png" alt="" class="product-2-layout-view"></li>
                                                            <li><img src="{{asset('public')}}/frontend_asset/images/icon/3.png" alt="" class="product-3-layout-view"></li>
                                                            <li><img src="{{asset('public')}}/frontend_asset/images/icon/4.png" alt="" class="product-4-layout-view"></li>
                                                            <li><img src="{{asset('public')}}/frontend_asset/images/icon/6.png" alt="" class="product-6-layout-view"></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-page-per-view">
                                                        <select>
                                                            <option value="High to low">24 Products Par Page
                                                            </option>
                                                            <option value="Low to High">50 Products Par Page
                                                            </option>
                                                            <option value="Low to High">100 Products Par Page
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="product-page-filter">
                                                        <select>
                                                            <option value="High to low">Sorting items</option>
                                                            <option value="Low to High">50 Products</option>
                                                            <option value="Low to High">100 Products</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid">
                                        <div class="row margin-res">

                                            @foreach($category_products as $row)
                                            <div class="col-xl-3 col-6 col-grid-box">
                                                <div class="product-box">
                                                    <div class="img-wrapper">
                                                        <div class="front">
                                                            <a href="{{url('product/'.$row->slug)}}">
                                                                <img src="{{asset('storage/app/'.$row->product_images[0]->images_name)}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="back">
                                                            <a href="{{url('product/'.$row->slug)}}">
                                                                <img src="{{asset('storage/app/'.$row->product_images[0]->images_name)}}" class="img-fluid blur-up lazyload bg-img" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="cart-info cart-wrap">
                                                            <button onclick="addCart({{ $row->id }})" data-toggle="modal" data-target="#addtocart" title="Add to cart">
                                                                <i class="ti-shopping-cart"></i>
                                                            </button> 
                                                            <a href="javascript:void(0)" title="Add to Wishlist">
                                                                <i class="ti-heart" aria-hidden="true"></i>
                                                            </a> 
                                                            <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View">
                                                                <i class="ti-search" aria-hidden="true"></i>
                                                            </a> 
                                                            <a href="compare.html" title="Compare">
                                                                <i class="ti-reload" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="product-detail">
                                                        <div>
                                                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                                            <a href="{{url('product/'.$row->slug)}}">
                                                                <h6>
                                                                    {{ $row->name }}
                                                                </h6>
                                                            </a>
                                                            <p>
                                                                {{ $row->short_description }}
                                                            </p>
                                                            <h4>
                                                                {{ $row->price }}
                                                            </h4>
                                                            <ul class="color-variant">
                                                                <li class="bg-light0"></li>
                                                                <li class="bg-light1"></li>
                                                                <li class="bg-light2"></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="product-pagination">
                                        <div class="theme-paggination-block">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                    <nav aria-label="Page navigation">
                                                        <ul class="pagination">
                                                            <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span
                                                                        aria-hidden="true"><i
                                                                            class="fa fa-chevron-left"
                                                                            aria-hidden="true"></i></span> <span
                                                                        class="sr-only">Previous</span></a></li>
                                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i
                                                                            class="fa fa-chevron-right"
                                                                            aria-hidden="true"></i></span> <span
                                                                        class="sr-only">Next</span></a></li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                    <div class="product-search-count-bottom">
                                                        <h5>Showing Products 1-24 of 10 Result</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
<!-- section End -->

@endsection

@section('extra-scripts')
<script>
    var $range = $(".js-range-slider"),
            $inputFrom = $(".js-input-from"),
            $inputTo = $(".js-input-to"),
            instance,
            min = 0,
            max = "<?php echo $price_max_val; ?>",
            from = 0,
            to = 0;
    $range.ionRangeSlider({
    type: "double",
            min: min,
            max: max,
            from: 0,
            to: 3000,
            prefix: '$',
            onStart: updateInputs,
            onChange: updateInputs,
            step: 100,
            prettify_enabled: true,
            prettify_separator: ".",
            values_separator: " - ",
            force_edges: true


    });
    instance = $range.data("ionRangeSlider");
    function updateInputs(data) {
    from = data.from;
    to = data.to;
    $inputFrom.prop("value", from);
    $inputTo.prop("value", to);
    }

    $inputFrom.on("input", function() {
    var val = $(this).prop("value");
    // validate
    if (val < min) {
    val = min;
    } else if (val > to) {
    val = to;
    }

    instance.update({
    from: val
    });
    });
    $inputTo.on("input", function() {
    var val = $(this).prop("value");
    // validate
    if (val < from) {
    val = from;
    } else if (val > max) {
    val = max;
    }

    instance.update({
    to: val
    });
    });
</script>
@endsection