@extends('layout_admin')
@section('content_admin')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê loại sản phẩm
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
        <!-- Hiển thị thông báo -->
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
                    <th>Tên loại sản phẩm</th>
                    <th>Trạng thái</th>
                    <th>Ngày thêm</th>
                    <th style="width:30px;"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_category as $key => $category)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{ $category->categories_name }}</td>
                        <td>
                            <span class="text-ellipsis">
                                @if($category->categories_status == 1)
                                    <a href="{{route('category.active' , ['categories_id' =>$category->categories_id])}}"><span class="fa-solid fa-eye"></span></a>
                                @else
                                    <a href="{{ route('category.unactive', ['categories_id' => $category->categories_id]) }}"><span class="fa-solid fa-eye-slash"></span></a>
                                @endif
                            </span>
                        </td>
                        <td><span class="text-ellipsis">{{ $category->created_at }}</span></td>
                        <td>
                            <a href="{{ route('category.edit', ['categories_id' => $category->categories_id]) }}" class="active" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i>
                            </a>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                               href="{{ route('category.delete', ['categories_id' => $category->categories_id]) }}" class="active" ui-toggle-class="">
                                <i class="fa fa-trash-o text-danger text"></i>
                            </a>
                        </td>
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
    setTimeout(function() { document.getElementById('message').style.display = 'none'
    }, 3000); // 3000ms = 3 giây
</script>
@endsection
