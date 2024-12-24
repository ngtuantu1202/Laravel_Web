@extends('layout')
@section('content')
    @foreach($detail_product as $value)
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{URL::to('/') }}/public/upload/product/{{ $value->product_image }}"
                         alt="" style="max-height: 300px; width: auto;"/>
                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href=""><img src="{{URL::to('/') }}/public/upload/product/{{ $value->product_image }}"
                                            height="84px" width="85px" alt=""></a>
                            <a href=""><img src="{{URL::to('/') }}/public/upload/product/{{ $value->product_image }}"
                                            height="84px" width="85px" alt=""></a>
                            <a href=""><img src="{{URL::to('/') }}/public/upload/product/{{ $value->product_image }}"
                                            height="84px" width="85px" alt=""></a>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left item-control" href="#similar-product" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#similar-product" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="{{URL::to('/') }}/public/frontend/images/product-details/new.jpg" class="newarrival"
                         alt=""/>
                    <h2>{{ $value->product_name }}</h2>
                    <p>ID Sản phẩm: {{ $value->product_id }}</p>
                    <img src="{{URL::to('/') }}/public/frontend/images/product-details/rating.png" alt=""/>
                    <span>
									<span>{{ number_format($value->product_price). 'VND' }}</span>
									<label>Số lượng:</label>
									<input type="number" min="1" max="100" value="1"/>
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ hàng
									</button>
								</span>
                    <p><b>Tình trạng:</b> Còn hàng</p>
                    <p><b>Danh mục:</b> {{ $value->categories_name }}</p>
                    <p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
                    <a href=""><img src="{{URL::to('/') }}/public/frontend/images/product-details/share.png"
                                    class="share img-responsive" alt=""/></a>
                </div><!--/product-information-->
            </div>
        </div>
        <!-- product detail -->
        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Chi tiết</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Hồ sơ công ty</a></li>
                    <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details">
                    <p>{!! nl2br(e($value->product_content)) !!}</p>
                </div>
                <div class="tab-pane fade" id="companyprofile">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{URL::to('/') }}/public/frontend/images/home/gallery1.jpg" alt=""/>
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="reviews">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>Tú</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                            <li><a href=""><i class="fa fa-calendar-o"></i>31/12/2024</a></li>
                        </ul>
                        <p>Ngon</p>
                        <p><b>Viết đánh giá của bạn</b></p>
                        <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                            <textarea name=""></textarea>
                            <b>Rating: </b> <img
                                src="{{URL::to('/') }}/public/frontend/images/product-details/rating.png"
                                alt=""/>
                            <button type="button" class="btn btn-default pull-right">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/category-tab-->
    @endforeach
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Sản phẩm liên quan</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($related_product->chunk(3) as $chunk)
                    <div class="item {{ $loop->first ? 'active' : '' }}">
                        @foreach($chunk as $splienquan)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img
                                                src="{{ URL::to('/') }}/public/upload/product/{{ $splienquan->product_image }}"
                                                height="300" width="100" alt=""/>
                                            <h2>{{ number_format($splienquan->product_price) }} VND</h2>
                                            <p>{{ $splienquan->product_name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div><!--/recommended_items-->
@endsection

