@extends('layout_admin')
@section('content_admin')

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin khách hàng
            </div>
            @if (session('message'))
                <div class="alert alert-info" id="message">
                    {{ session('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <!-- Lấy thông tin khách hàng từ bản ghi đầu tiên trong tập hợp -->
                        <td>{{ $order_by_id->first()->customer_name }}</td>
                        <td>{{ $order_by_id->first()->customer_phone }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin vận chuyển
            </div>
            @if (session('message'))
                <div class="alert alert-info" id="message">
                    {{ session('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th>Tên người nhận</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <!-- Lấy thông tin vận chuyển từ bản ghi đầu tiên trong tập hợp -->
                        <td>{{ $order_by_id->first()->shipping_name }}</td>
                        <td>{{ $order_by_id->first()->shipping_address }}</td>
                        <td>{{ $order_by_id->first()->shipping_phone }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết đơn hàng
            </div>
            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">
                    <select class="input-sm form-control w-sm inline v-middle">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-default">Áp dụng</button>
                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Tìm kiếm...">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Tìm!</button>
                        </span>
                    </div>
                </div>
            </div>
            @if (session('message'))
                <div class="alert alert-info" id="message">
                    {{ session('message') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_by_id as $detail)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{ $detail->product_name }}</td>
                            <td>{{ $detail->product_quantity }}</td>
                            <td>{{ $detail->product_price }}</td>
                            <td>{{ $detail->product_quantity * $detail->product_price }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-7 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script> // Tự động ẩn thông báo sau 3 giây
        setTimeout(function () {
            document.getElementById('message').style.display = 'none'
        }, 3000); // 3000ms = 3 giây
    </script>

@endsection
