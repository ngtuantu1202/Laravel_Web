@extends('layout_admin')
@section('content_admin')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">

                        <form role="form" action="{{ route('product.save') }}" method="post" enctype="multipart/form-data">
                            @csrf <!-- Token CSRF -->
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Nhập tên sản phẩm" value="{{ old('product_name') }}">
                                @if ($errors->has('product_name'))
                                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_image">Hình ảnh sản phẩm</label>
                                <input type="file" name="product_image" class="form-control" id="product_image">
                                @if ($errors->has('product_image'))
                                    <span class="text-danger">{{ $errors->first('product_image') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_price">Giá sản phẩm</label>
                                <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Nhập giá sản phẩm" value="{{ old('product_price') }}">
                                @if ($errors->has('product_price'))
                                    <span class="text-danger">{{ $errors->first('product_price') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_desc">Mô tả</label>
                                <textarea name="product_desc" style="resize: none" rows="12" class="form-control" id="product_desc" placeholder="Nhập mô tả sản phẩm">{{ old('product_desc') }}</textarea>
                                @if ($errors->has('product_desc'))
                                    <span class="text-danger">{{ $errors->first('product_desc') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_content">Nội dung</label>
                                <textarea name="product_content" style="resize: none" rows="12" class="form-control" id="product_content" placeholder="Nhập nội dung sản phẩm">{{ old('product_content') }}</textarea>
                                @if ($errors->has('product_content'))
                                    <span class="text-danger">{{ $errors->first('product_content') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="categories_id">Loại sản phẩm</label>
                                <select name="categories_id" style="max-width: 200px" class="form-control input-lg m-bot15" id="categories_id">
                                    <option value="">Chọn loại sản phẩm</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->categories_id }}" {{ old('categories_id') == $category->categories_id ? 'selected' : '' }}>
                                            {{ $category->categories_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('categories_id'))
                                    <span class="text-danger">{{ $errors->first('categories_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="brand_id">Hiệu sản phẩm</label>
                                <select name="brand_id" style="max-width: 200px" class="form-control input-lg m-bot15" id="brand_id">
                                    <option value="">Chọn thương hiệu</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->brand_id }}" {{ old('brand_id') == $brand->brand_id ? 'selected' : '' }}>
                                            {{ $brand->brand_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('brand_id'))
                                    <span class="text-danger">{{ $errors->first('brand_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="product_status">Trạng thái</label>
                                <select name="product_status" style="max-width: 200px" class="form-control input-lg m-bot15" id="product_status">
                                    <option value="1" {{ old('product_status') == '1' ? 'selected' : '' }}>Hiện</option>
                                    <option value="0" {{ old('product_status') == '0' ? 'selected' : '' }}>Ẩn</option>
                                </select>
                                @if ($errors->has('product_status'))
                                    <span class="text-danger">{{ $errors->first('product_status') }}</span>
                                @endif
                            </div>
                            <button type="submit" name="add-product" class="btn btn-info">Lưu</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
