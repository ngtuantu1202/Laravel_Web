@extends('layout_admin')
@section('content_admin')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">

                        <form role="form" action="{{route('product.update', ['product_id' => $edit_product->product_id]) }}" method="post" enctype="multipart/form-data">
                            @csrf <!-- Token CSRF -->
                            <!-- Hiển thị lỗi nếu có -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input type="text" value="{{ $edit_product->product_name }}"
                                       name="product_name" class="form-control" id="product_name"
                                       placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="product_image">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" class="form-control" id="product_image">
                                @if ($edit_product->product_image)
                                    <img src="{{URL::to('/') }}/public/upload/product/{{ $edit_product->product_image }}" height="100" width="100">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_price">Giá sản phẩm</label>
                                <input type="text" value="{{ $edit_product->product_price }}"
                                       name="product_price" class="form-control" id="product_price"
                                       placeholder="Nhập giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="product_desc">Mô tả</label>
                                <textarea name="product_desc"
                                          style="resize: none" rows="12" class="form-control"
                                          id="product_desc" placeholder="Nhập mô tả sản phẩm">{{ $edit_product->product_desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="product_content">Nội dung</label>
                                <textarea name="product_content"
                                          style="resize: none" rows="12" class="form-control"
                                          id="product_content" placeholder="Nhập nội dung sản phẩm">{{ $edit_product->product_content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories_id">Loại sản phẩm</label>
                                <select name="categories_id" style="max-width: 200px" class="form-control input-lg m-bot15" id="categories_id">
                                    <option value="">Chọn loại sản phẩm</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->categories_id }}">{{ $category->categories_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brand_id">Hiệu sản phẩm</label>
                                <select name="brand_id" style="max-width: 200px" class="form-control input-lg m-bot15" id="brand_id">
                                    <option value="">Chọn thương hiệu</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="product_status">Trạng thái</label>
                                <select name="product_status" style="max-width: 200px" class="form-control input-lg m-bot15" id="product_status">
                                    <option value="1">Hiện</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <button type="submit" name="add-product" class="btn btn-info">Lưu</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
