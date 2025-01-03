@extends('layout')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('home.trang-chu')}}">Trang chủ</a></li>
                    <li class="active">Giỏ hàng</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                ?>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($content as $v_content)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img
                                        src="{{ URL::to('/') }}/public/upload/product/{{ $v_content->options['image'] }}"
                                        height="auto" width="50" alt=""/></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$v_content->name}}</a></h4>
                                <p>Mã SP: {{$v_content->id}}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($v_content->price). ' ' . 'VND'}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input class="cart_quantity_input" type="text" name="cart_quantity"
                                               value="{{$v_content->qty}}">
                                        <input class="form-control" type="hidden" name="rowId_cart"
                                               value="{{$v_content->rowId}}">
                                        <input type="submit" value="Cập nhập" name="update-qty"
                                               class="btn btn-default btn-sm">
                                    </form>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                        <?php
                                        $subtotal = $v_content->price * $v_content->qty;
                                        echo number_format($subtotal) . ' ' . 'VND';
                                        ?>
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{ route('cart.delete', $v_content->rowId) }}"><i
                                        class="fa fa-times"></i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tổng <span>{{Cart::subtotal(0, ',', '.'). ' ' . 'VND'}}</span></li>
                            <li>Thuế <span>{{Cart::tax(). ' ' . 'VND'}}</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            <li>Thành tiền <span>{{Cart::total(0, ',', '.'). ' ' . 'VND'}}</span></li>
                        </ul>

                        @if (session('customer_id'))
                            <a class="btn btn-default check_out" href="{{route("checkout")}}">Thanh toán</a>
                        @else
                            <a class="btn btn-default check_out" href="{{route("checkout.login")}}">Thanh toán</a>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
