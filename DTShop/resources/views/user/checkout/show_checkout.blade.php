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

            <div class="register-req">
                <p>Hãy đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
            </div>

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Điền thông tin gửi hàng</p>
                            <div class="form-one">
                                <form action="{{route('checkout.save-checkout-customer')}}" method="post" >
                                    @csrf
                                    <input type="text" name="shipping_phone" placeholder="Số điện thoại người nhận">
                                    @if ($errors->has('shipping_phone'))
                                        <span class="text-danger">
                                            {{ $errors->first('shipping_phone') }}
                                        </span>
                                    @endif
                                    <input type="text" name="shipping_name" placeholder="Họ và tên">
                                    @if ($errors->has('shipping_name'))
                                        <span class="text-danger">
                                            {{ $errors->first('shipping_name') }}
                                        </span>
                                    @endif
                                    <input type="text" name="shipping_address" placeholder="Địa chỉ">
                                    @if ($errors->has('shipping_address'))
                                        <span class="text-danger">
                                            {{ $errors->first('shipping_address') }}
                                        </span>
                                    @endif
                                    <textarea name="shipping_note" placeholder="Để lại lời nhắn của bạn cho chúng tôi" rows="16"></textarea>
                                @if ($errors->has('shipping_note'))
                                        <span class="text-danger">
                                            {{ $errors->first('shipping_note') }}
                                        </span>
                                    @endif
                                    <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
