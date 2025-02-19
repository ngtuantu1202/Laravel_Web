@extends('layout')

@section('content')

    <div class="features_items"><!--features_items-->
        @foreach($brand_name as $brand)
            <h2 class="title text-center">{{ $brand->brand_name }}</h2>
        @endforeach

        @foreach($products_by_brand as $product)
            <a href="{{route('home.detail', ['product_id'=>$product->product_id])}}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">

                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ URL::to('/') }}/public/upload/product/{{ $product->product_image }}" height="300" width="100" alt=""/>
                            <h2>{{ number_format($product->product_price) }} VND</h2>
                            <p>{{ $product->product_name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            </a>
        @endforeach
    </div><!--features_items-->

    {{--    <div class="category-tab"><!--category-tab-->--}}
    {{--        <div class="col-sm-12">--}}
    {{--            <ul class="nav nav-tabs">--}}
    {{--                <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--        <div class="tab-content">--}}
    {{--            <div class="tab-pane fade active in" id="tshirt">--}}
    {{--                <div class="col-sm-3">--}}
    {{--                    <div class="product-image-wrapper">--}}
    {{--                        <div class="single-products">--}}
    {{--                            <div class="productinfo text-center">--}}
    {{--                                <img src="{{('public/frontend/images/home/gallery1.jpg')}}" alt=""/>--}}
    {{--                                <h2>$56</h2>--}}
    {{--                                <p>Easy Polo Black Edition</p>--}}
    {{--                                <a href="#" class="btn btn-default add-to-cart"><i--}}
    {{--                                        class="fa fa-shopping-cart"></i>Add to cart</a>--}}
    {{--                            </div>--}}

    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}


    {{--    </div><!--/category-tab-->--}}

    {{--    <div class="recommended_items"><!--recommended_items-->--}}
    {{--        <h2 class="title text-center">recommended item</h2>--}}

    {{--        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">--}}
    {{--            <div class="carousel-inner">--}}
    {{--                <div class="item active">--}}
    {{--                    <div class="col-sm-4">--}}
    {{--                        <div class="product-image-wrapper">--}}
    {{--                            <div class="single-products">--}}
    {{--                                <div class="productinfo text-center">--}}
    {{--                                    <img src="{{('public/frontend/images/home/recommend1.jpg')}}"--}}
    {{--                                         alt=""/>--}}
    {{--                                    <h2>$56</h2>--}}
    {{--                                    <p>Easy Polo Black Edition</p>--}}
    {{--                                    <a href="#" class="btn btn-default add-to-cart"><i
    {{--                                            class="fa fa-shopping-cart"></i>Add to cart</a>--}}
    {{--                                </div>--}}

    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-sm-4">--}}
    {{--                        <div class="product-image-wrapper">--}}
    {{--                            <div class="single-products">--}}
    {{--                                <div class="productinfo text-center">--}}
    {{--                                    <img src="{{('public/frontend/images/home/recommend1.jpg')}}"--}}
    {{--                                         alt=""/>--}}
    {{--                                    <h2>$56</h2>--}}
    {{--                                    <p>Easy Polo Black Edition</p>--}}
    {{--                                    <a href="#" class="btn btn-default add-to-cart"><i
    {{--                                            class="fa fa-shopping-cart"></i>Add to cart</a>--}}
    {{--                                </div>--}}

    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-sm-4">--}}
    {{--                        <div class="product-image-wrapper">--}}
    {{--                            <div class="single-products">--}}
    {{--                                <div class="productinfo text-center">--}}
    {{--                                    <img src="{{('public/frontend/images/home/recommend1.jpg')}}"
    {{--                                         alt=""/>--}}
    {{--                                    <h2>$56</h2>--}}
    {{--                                    <p>Easy Polo Black Edition</p>--}}
    {{--                                    <a href="#" class="btn btn-default add-to-cart"><i
    {{--                                            class="fa fa-shopping-cart"></i>Add to cart</a>--}}
    {{--                                </div>--}}

    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <a class="left recommended-item-control" href="#recommended-item-carousel"
    {{--               data-slide="prev">--}}
    {{--                <i class="fa fa-angle-left"></i>--}}
    {{--            </a>--}}
    {{--            <a class="right recommended-item-control" href="#recommended-item-carousel"
    {{--               data-slide="next">--}}
    {{--                <i class="fa fa-angle-right"></i>--}}
    {{--            </a>--}}
    {{--        </div>--}}
    {{--    </div><!--/recommended_items-->--}}

@endsection
