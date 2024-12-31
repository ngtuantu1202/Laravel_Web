@extends('layout')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('home.trang-chu')}}">Trang chủ</a></li>
                    <li class="active">Thanh toán</li>
                </ol>
            </div>

            <div class="review-payment">
                <h2>Xem lại giỏ hàng</h2>
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
            <h4 class="payment-title">CHỌN HÌNH THỨC THANH TOÁN</h4>
            <form action="{{ route('checkout.order') }}" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="payment-options">
                    <div class="payment-options">
                    <span>
                        <input id="atm" name="payment-option" value="TK Ngân hàng" type="radio">
                        <label for="atm">Thanh toán bằng tài khoản ngân hàng</label>
                    </span>
                        <span>
                        <input id="visa" name="payment-option" value="VISA" type="radio">
                        <label for="visa">Thanh toán bằng thẻ VISA</label>
                    </span>
                        <span>
                        <input id="cash" name="payment-option" value="Tiền mặt" type="radio">
                        <label for="cash">Thanh toán bằng tiền mặt</label>
                    </span>
                    </div>
                </div>
                <div style="text-align: center;">
                    <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-large">
                </div>
            </form>
        </div>
    </section>

@endsection
