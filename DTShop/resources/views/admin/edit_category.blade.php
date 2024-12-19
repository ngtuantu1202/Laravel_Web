@extends('layout_admin')
@section('content_admin')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa loại sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/update-category/' . $edit_category->categories_id) }}" method="post">
                            @csrf <!-- Token CSRF -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên loại sản phẩm</label>
                                <input type="text" value="{{ $edit_category->categories_name }}" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập loại sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea name="category_desc" style="resize: none" rows="12" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả">{{ $edit_category->categories_desc }}</textarea>
                            </div>
                            <button type="submit" name="edit-category" class="btn btn-info">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
