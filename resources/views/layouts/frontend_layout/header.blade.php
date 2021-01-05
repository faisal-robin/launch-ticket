@inject('CommonTrait', 'App\Http\Controllers\UserAccountController')
<!-- Header Top Area Start -->s
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="header-top-left">
                    <p>
                        <i class="fa fa-envelope"></i>
                        @isset(company_info()->company_email){{company_info()->company_email}}@endisset
                    </p>
                    <p>
                        <i class="fa fa-phone"></i>
                        @isset(company_info()->company_phone){{company_info()->company_phone}}@endisset
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="header-top-right">
                    <div class="header-top-social">
                        <ul>
                            <li><a href="//@isset(company_info()->facebook_link){{company_info()->facebook_link}}@endisset"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="//@isset(company_info()->twitter_link){{company_info()->twitter_link}}@endisset"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="//@isset(company_info()->google_link){{company_info()->google_link}}@endisset"><i class="fa fa-google"></i></a></li>
                            <li><a href="//@isset(company_info()->instagram_link){{company_info()->instagram_link}}@endisset"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header Top Area End -->

<!-- Main Header Area Start -->
<div class="main-header-area navbar-sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="header_inn">
                    <div class="row">
                        <div class="col-lg-3 align-self-center">
                            <div class="site-logo">
                                <a href="index.php">
                                    <img src="{{asset('storage')}}/app/@isset(company_info()->company_thumbnail){{company_info()->company_thumbnail}}@endisset" alt="abh" />
                                </a>
                            </div>
                            <!-- Responsive Menu Start -->
                            <div class="abh-responsive-menu"></div>
                            <!-- Responsive Menu End -->
                        </div>
                        <div class="col-lg-7">
                            <div class="mainmenu">
                                <nav>
                                    <ul id="navigation_menu">
                                        <li class="active"><a href="index.php">Home</a></li>
                                        <li>
                                            <a href="#">RESERVATION</a>
                                        </li>
                                        <li>
                                            <a href="#">TOUR</a>
                                        </li>
                                        <li>
                                            <a href="#">RESORTS</a>
                                        </li>
                                        <li>
                                            <a href="#">BLOG</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="header_action">
                                <ul>
                                    <li class="header-search">
                                        <div class="search-box">
                                            <div class="nav-search">
                                                <span id="search">
                                                    <i class="icon icon-search1"></i>
                                                </span>
                                            </div>
                                            <!--Search End-->
                                            <div class="search-block" style="display: none;">
                                                <input class="form-control" type="text" placeholder="Search">
                                                <span class="search-close">×</span>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li><a href="#" id="sidenav-toggle"><i class="fa fa-bars"></i></a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Header Area End -->