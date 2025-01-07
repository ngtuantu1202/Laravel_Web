@extends('layout')
@section('content')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập vào tài khoản của bạn</h2>
                        <form action="{{ route('checkout.login-customer')}}" method="post">
                            @csrf

                            @if ($errors->has('phone_account'))
                                <span class="text-danger">
                                    {{ $errors->first('phone_account') }}
                                </span>
                            @endif
                            <input type="text" name="phone_account" placeholder="Số điện thoại" />

                            @if ($errors->has('password_account'))
                                <span class="text-danger">
                                    {{ $errors->first('password_account') }}
                                </span>
                            @endif
                            <input type="password" name="password_account" placeholder="Mật khẩu" />

                            <span>
								<input type="checkbox" class="checkbox">
								Ghi nhớ đăng nhập
							</span>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">HOẶC</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <h2>Đăng ký tài khoản mới!</h2>
                        <form action="{{ route('checkout.add-customer') }}" method="post">
                            @csrf
                            @if ($errors->has('customer_name'))
                                <span class="text-danger">
                                    {{ $errors->first('customer_name') }}
                                </span>
                            @endif
                            <input type="text" name="customer_name" placeholder="Họ và tên" required/>
                            @if ($errors->has('customer_password'))
                                <span class="text-danger">
                                    {{ $errors->first('customer_password') }}
                                </span>
                            @endif
                            <input type="password" name="customer_password" placeholder="Mật khẩu" required/>
                            @if ($errors->has('customer_phone'))
                                <span class="text-danger">
                                    {{ $errors->first('customer_phone') }}
                                </span>
                            @endif
                            <input type="text" name="customer_phone" placeholder="Số điện thoại" required/>

                            <button type="submit" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
