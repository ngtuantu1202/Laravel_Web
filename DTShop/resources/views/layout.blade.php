<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | DT-Shop</title>
    <link href="{{URL::to('/') }}/public/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::to('/') }}/public/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{URL::to('/') }}/public/frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{URL::to('/') }}/public/frontend/css/price-range.css" rel="stylesheet">
    <link href="{{URL::to('/') }}/public/frontend/css/animate.css" rel="stylesheet">
    <link href="{{URL::to('/') }}/public/frontend/css/main.css" rel="stylesheet">
    <link href="{{URL::to('/') }}/public/frontend/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{('public/frontend/js/html5shiv.js')}}"></script>
    <script src="{{('public/frontend/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{('public/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{URL::to('/') }}/public/frontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{URL::to('/') }}/public/frontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{URL::to('/') }}/public/frontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
          href="{{URL::to('/') }}/public/frontend/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-sm-4">
                    <div class="logo">
                        <a href="{{route('home.trang-chu')}}">
                            <img src="{{ URL::to('/') }}/public/frontend/images/home/logodt.png" alt="" width="139" height="auto" />
                        </a>
                    </div>
                </div>
                <!-- Menu -->
                <div class="col-sm-8">
                    <div class="shop-menu">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-user"></i> Tài khoản</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Danh sách ước</a></li>
                            <li><a href="#"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            <li><a href="#"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{route('home.trang-chu')}}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Products</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                            </li>
                            <li><a href="404.html">Giỏ hàng</a></li>
                            <li><a href="contact-us.html">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Tìm kiếm..."/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>DT</span>Group</h1>
                                <h2>Yến sào hồng sâm</h2>
                                <p>Yến sào Hồng sâm Collagen DT Nest là sự kết hợp hài hòa giữa tinh hoa yến đảo
                                    và dược liệu thiên nhiên trên nền tảng khoa học công nghệ hiện đại.
                                    Yến sào Hồng Sâm Collagen DT Nest mang đến nguồn dưỡng chất dồi dào,
                                    ngăn ngừa sự lão hóa giúp trẻ hóa làn da.
                                </p>
                                <button type="button" class="btn btn-default get">Nhận ngay</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{URL::to('/') }}/public/frontend/images/home/yenhongsam.png" class="girl img-responsive"
                                     alt=""/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>DT</span>Group</h1>
                                <h2>Sửa tổ yến</h2>
                                <p>Sữa tổ yến bổ sung Canxi – Orafti DT Nest là sự kết hợp hài hòa giữa tinh hoa yến đảo,
                                    các loại vi chất và nguồn nhiên liệu sữa cao cấp được nhập khẩu từ Châu Âu.
                                    Sữa tổ yến bổ sung Canxi – Orafti DT Nest ngăn ngừa loãng xương,
                                    cải thiện hệ tiêu hóa và hỗ trợ tim mạch khỏe mạnh.
                                </p>
                                <button type="button" class="btn btn-default get">Nhận ngay</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{URL::to('/') }}/public/frontend/images/home/suayen.png" class="girl img-responsive"
                                     alt=""/>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>DT</span>Group</h1>
                                <h2>Yến đông trùng hạ thảo</h2>
                                <p>Sản phẩm yến sào đông trùng hạ thảo là một loại thực phẩm bổ sung dành
                                    cho người bị suy nhược cơ thể, được sản xuất bởi DTNEST Khánh Hòa.
                                </p>
                                <button type="button" class="btn btn-default get">Nhận ngay</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{URL::to('/') }}/public/frontend/images/home/dongtrunghathao.png" class="girl img-responsive"
                                     alt=""/>
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Loại sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                    @foreach($categories as $key => $category)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('loai-san-pham/'.$category->categories_id)}}">{{$category->categories_name}}</a></h4>
                                </div>
                            </div>
                    @endforeach
                    </div><!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Hiệu sản phẩm</h2>
                        @foreach($brands as $key => $brand)
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{URL::to('hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right">(50)</span>{{$brand->brand_name}}</a></li>
                                </ul>
                            </div>
                        @endforeach
                    </div><!--/brands_products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                @yield('content');
            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>dt</span>-Group</h2>
                        <p>Chào mừng bạn đến với shop thực phẩm rau củ sạch của chúng tôi,
                            với kinh nghiệm mua bán rau củ trong 10 năm, tận tình chăm sóc và chu đáo với khách hàng</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{URL::to('/') }}/public/frontend/images/home/iframe1.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{URL::to('/') }}/public/frontend/images/home/iframe1.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{URL::to('/') }}/public/frontend/images/home/iframe1.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{URL::to('/') }}/public/frontend/images/home/iframe1.png" alt=""/>
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="{{URL::to('/') }}/public/frontend/images/home/map.png" alt=""/>
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address"/>
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i>
                            </button>
                            <p>Get the most recent updates from <br/>our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank"
                                                           href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<script src="{{URL::to('/') }}/public/frontend/js/jquery.js"></script>
<script src="{{URL::to('/') }}/public/frontend/js/bootstrap.min.js"></script>
<script src="{{URL::to('/') }}/public/frontend/js/jquery.scrollUp.min.js"></script>
<script src="{{URL::to('/') }}/public/frontend/js/price-range.js"></script>
<script src="{{URL::to('/') }}/public/frontend/js/jquery.prettyPhoto.js"></script>
<script src="{{URL::to('/') }}/public/frontend/js/main.js"></script>
</body>
</html>
