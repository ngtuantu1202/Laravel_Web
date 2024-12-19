@extends('layout_admin')
@section('content_admin')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm hiệu sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">

                        <form role="form" action="{{URL::to('/save-brand')}}" method="post">
                            @csrf <!-- Token CSRF -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên hiệu sản phẩm</label>
                                <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập hệu sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea name="brand_desc" style="resize: none" rows="12" class="form-control"
                                          id="exampleInputPassword1" placeholder="Nhập mô tả"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select name="brand_status" style="max-width: 200px" class="form-control input-lg m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiện</option>
                                </select>
                            </div>
                            <button type="submit" name="add-brand" class="btn btn-info">Lưu</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>



@endsection
