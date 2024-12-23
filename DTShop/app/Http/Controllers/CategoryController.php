<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function add_category()
    {
        return view("admin.add_category");
    }

    public function all_category()
    {
        //$all_category = Category::all();
        //$all_category = Category::orderBy('categories_id', 'DESC')->paginate(3);
        $all_category = Category::orderBy('categories_id', 'DESC')->get();
        return view("admin.all_category")->with('all_category', $all_category);
    }

    public function save_category(Request $request)
    {
        $data = $request->all();
        Category::create([
            'categories_name' => $data['category_name'],
            'categories_desc' => $data['category_desc'],
            'categories_status' => $data['category_status']
        ]);

        Session::flash('message', 'Thêm loại sản phẩm thành công');
        return Redirect::to('/all-category');
    }

    public function active_category($category_id)
    {
        Category::where('categories_id', $category_id)->update(['categories_status' => 0]);
        Session::flash('message', 'Ẩn loại sản phẩm thành công');
        return Redirect::to('/all-category');
    }

    public function unactive_category($category_id)
    {
        Category::where('categories_id', $category_id)->update(['categories_status' => 1]);
        Session::flash('message', 'Hiển thị loại sản phẩm thành công');
        return Redirect::to('/all-category');
    }

    public function edit_category($category_id)
    {
        $edit_category = Category::find($category_id);
        return view("admin.edit_category")->with('edit_category', $edit_category);
    }

    public function update_category(Request $request, $category_id)
    {
        $data = $request->all();
        $category = Category::find($category_id);
        $category->update([
            'categories_name' => $data['category_name'],
            'categories_desc' => $data['category_desc']
        ]);

        Session::flash('message', 'Cập nhật thành công');
        return Redirect::to('/all-category');
    }

    public function delete_category($category_id)
    {
        $category = Category::find($category_id);

        if ($category) {
            $category->delete();
            Session::flash('message', 'Xóa loại sản phẩm thành công');
        } else {
            Session::flash('message', 'Không tìm thấy loại sản phẩm');
        }

        return Redirect::to('/all-category');
    }
    //END

    public function showCategoryHome($categories_id)
    {
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();

        $categories_by_id = Product::join('categories', 'products.categories_id', '=', 'categories.categories_id')
            ->where('categories.categories_id', $categories_id)
            ->get(['products.*', 'categories.categories_name']);

        $category_name = Category::where('categories_id', $categories_id)->limit(1)->get();

        return view("user.category.show_category", compact('categories', 'brands', 'categories_by_id', 'category_name'));
    }

}
