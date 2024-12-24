<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function add_product()
    {
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();

        return view("admin.add_product", compact('categories', 'brands'));
        //return view("admin.add_product")->with('categories', $categories)->with('brands', $brands);
    }

    public function all_product()
    {
        // Sử dụng tên bảng và cột chính xác từ file SQL
        $all_product = Product::join('categories', 'products.categories_id', '=', 'categories.categories_id')
            ->join('brand', 'products.brand_id', '=', 'brand.brand_id')
            ->orderBy('products.product_id', 'DESC')
            ->get(['products.*', 'categories.categories_name', 'brand.brand_name']);

        return view("admin.all_product")->with('all_product', $all_product);
    }

    public function save_product(Request $request)
    {
        // Validate dữ liệu đầu vào, bao gồm cả ảnh sản phẩm
        $request->validate([
            'product_name' => 'required|max:255',
            'product_price' => 'required|numeric',
            'product_desc' => 'required',
            'product_content' => 'required',
            'categories_id' => 'required',
            'brand_id' => 'required',
            'product_status' => 'required|boolean',
            'product_image' => 'required|image|mimes:jpg,jpeg,png|max:5000' // Yêu cầu ảnh và các quy định khác
        ], [
            'product_name.required' => 'Bạn phải nhập tên sản phẩm',
            'product_price.required' => 'Bạn phải nhập giá sản phẩm',
            'product_price.numeric' => 'Giá sản phẩm phải là số',
            'product_desc.required' => 'Bạn phải nhập mô tả sản phẩm',
            'product_content.required' => 'Bạn phải nhập nội dung sản phẩm',
            'categories_id.required' => 'Bạn phải chọn loại sản phẩm',
            'brand_id.required' => 'Bạn phải chọn thương hiệu',
            'product_status.required' => 'Bạn phải chọn trạng thái sản phẩm',
            'product_image.required' => 'Bạn phải nhập ảnh cho sản phẩm',
            'product_image.image' => 'Ảnh phải có định dạng jpg, jpeg, png',
            'product_image.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png',
            'product_image.max' => 'Dung lượng ảnh không được vượt quá 5MB',
        ]);

        $data = $request->all();

        // Kiểm tra và xử lý ảnh sản phẩm
        $get_image = $request->file('product_image');
        $product_image = null;

        if ($get_image) {
            // Tạo tên file duy nhất cho ảnh
            $imageName = pathinfo($get_image->getClientOriginalName(), PATHINFO_FILENAME)
                . rand(0, 99)
                . time() . '.'
                . $get_image->getClientOriginalExtension();
            // Di chuyển ảnh vào thư mục public/upload
            $get_image->move('public/upload/product', $imageName);

            // Lưu tên ảnh
            $product_image = $imageName;
        }

        // Lưu sản phẩm vào cơ sở dữ liệu
        $product = Product::create([
            'product_name' => $data['product_name'],
            'product_price' => $data['product_price'],
            'product_desc' => $data['product_desc'],
            'product_content' => $data['product_content'],
            'categories_id' => $data['categories_id'],
            'brand_id' => $data['brand_id'],
            'product_status' => $data['product_status'],
            'product_image' => $product_image // Lưu tên ảnh nếu có
        ]);

        Session::flash('message', 'Thêm sản phẩm thành công');
        return Redirect::to('/all-product');
    }


    public function active_product($product_id)
    {
        Product::where('product_id', $product_id)->update(['product_status' => 0]);
        Session::flash('message', 'Ẩn sản phẩm thành công');
        return Redirect::to('/all-product');
    }

    public function unactive_product($product_id)
    {
        Product::where('product_id', $product_id)->update(['product_status' => 1]);
        Session::flash('message', 'Hiển thị sản phẩm thành công');
        return Redirect::to('/all-product');
    }

    public function edit_product($product_id)
    {
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();
        $edit_product = Product::find($product_id);

        return view("admin.edit_product")->with([
            'edit_product' => $edit_product,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    public function update_product(Request $request, $product_id)
    {
        $request->validate([
            'product_name' => 'required|max:255',
            'product_desc' => 'required',
            'product_price' => 'required|numeric',
            'product_image' => 'image|mimes:jpg,jpeg,png|max:5000'
        ]);

        $product = Product::find($product_id);
        $data = $request->all();

        if (empty($data['categories_id'])) {
            $data['categories_id'] = $product->categories_id;
        }
        if (empty($data['brand_id'])) {
            $data['brand_id'] = $product->brand_id;
        }

        $get_image = $request->file('product_image');
        if ($get_image) {
            $imageName = pathinfo($get_image->getClientOriginalName(), PATHINFO_FILENAME)
                . rand(0, 99)
                . time() . '.'
                . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $imageName);
            $data['product_image'] = $imageName;
        }

        $product->update($data);

        Session::flash('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('/all-product');
    }


    public function delete_product($product_id)
    {
        $product = Product::find($product_id);

        if ($product) {
            $product->delete();
            Session::flash('message', 'Xóa sản phẩm thành công');
        } else {
            Session::flash('message', 'Không thấy hiệu sản phẩm');
        }

        return Redirect::to('/all-product');
    }//END

    function detailProduct($product_id)
    {
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();
        $detail_product = Product::join('categories', 'products.categories_id', '=', 'categories.categories_id')
            ->join('brand', 'products.brand_id', '=', 'brand.brand_id')
            ->where('products.product_id', $product_id)
            ->get(['products.*', 'categories.categories_name', 'brand.brand_name']);

        if ($detail_product->isNotEmpty()) {
            $categories_id = $detail_product->first()->categories_id; }
        else {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        $related_product = Product::join('categories', 'products.categories_id', '=', 'categories.categories_id')
            ->join('brand', 'products.brand_id', '=', 'brand.brand_id')
            ->where('categories.categories_id', $categories_id)
            ->whereNotIn('products.product_id', [$product_id])
            ->get(['products.*', 'categories.categories_name', 'brand.brand_name']);

        return view('user.product.show_details', compact('categories', 'brands',
            'detail_product', 'related_product'));

    }
}
