@extends('layout_admin')
@section('content_admin')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa hiệu sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/update-brand/' . $edit_brand->brand_id) }}" method="post">
                            @csrf <!-- Token CSRF -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên hiệu sản phẩm</label>
                                <input type="text" value="{{ $edit_brand->brand_name }}" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập loại sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea name="brand_desc" style="resize: none" rows="12" class="form-control" id="exampleInputPassword1"
                                          placeholder="Nhập mô tả">{{ $edit_brand->brand_desc }}</textarea>
                            </div>
                            <button type="submit" name="edit-brand" class="btn btn-info">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
