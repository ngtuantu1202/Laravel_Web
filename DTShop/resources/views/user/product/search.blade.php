@extends('layout')

@section('content')

    <div class="features_items">
        <h2 class="title text-center">Kết quả tìm kiếm</h2>

        @foreach($search_product as $key => $product)
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
        <div class="text-center">
            {{ $search_product->links() }} <!-- Hiển thị các liên kết phân trang -->
        </div>
    </div>
@endsection
