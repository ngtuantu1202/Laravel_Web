<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class BrandController extends Controller
{
    public function add_brand()
    {
        return view("admin.add_brand");
    }

    public function all_brand()
    {
        $all_brand = brand::orderBy('brand_id', 'DESC')->get();
        return view("admin.all_brand")->with('all_brand', $all_brand);
    }

    public function save_brand(Request $request)
    {
        $data = $request->all();
        Brand::create([
            'brand_name' => $data['brand_name'],
            'brand_desc' => $data['brand_desc'],
            'brand_status' => $data['brand_status']
        ]);

        Session::flash('message', 'Thêm hiệu sản phẩm thành công');
        return Redirect::to('/all-brand');
    }

    public function active_brand($brand_id)
    {
        Brand::where('brand_id', $brand_id)->update(['brand_status' => 0]);
        Session::flash('message', 'Ẩn hiệu sản phẩm thành công');
        return Redirect::to('/all-brand');
    }

    public function unactive_brand($brand_id)
    {
        Brand::where('brand_id', $brand_id)->update(['brand_status' => 1]);
        Session::flash('message', 'Hiển thị hiệu sản phẩm thành công');
        return Redirect::to('/all-brand');
    }

    public function edit_brand($brand_id)
    {
        $edit_brand = Brand::find($brand_id);
        return view("admin.edit_brand")->with('edit_brand', $edit_brand);
    }

    public function update_brand(Request $request, $brand_id)
    {
        $data = $request->all();
        $brand = Brand::find($brand_id);
        $brand->update([
            'brand_name' => $data['brand_name'],
            'brand_desc' => $data['brand_desc']
        ]);

        Session::flash('message', 'Cập nhật thành công');
        return Redirect::to('/all-brand');
    }

    public function delete_brand($brand_id)
    {
        $brand = Brand::find($brand_id);

        if ($brand) {
            $brand->delete();
            Session::flash('message', 'Xóa hiệu sản phẩm thành công');
        } else {
            Session::flash('message', 'Không tìm thấy hiệu sản phẩm');
        }

        return Redirect::to('/all-brand');
    }
    //END


    public function showBrandHome($brand_id)
    {
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();

        $products_by_brand = Product::join('brand', 'products.brand_id', '=', 'brand.brand_id')
            ->where('brand.brand_id', $brand_id)
            ->get(['products.*', 'brand.brand_name']);
        $brand_name = Brand::where('brand_id', $brand_id)->first()->get();
        return view("user.brand.show_brand", compact('categories', 'brands',
            'products_by_brand', 'brand_name'));
    }

}
