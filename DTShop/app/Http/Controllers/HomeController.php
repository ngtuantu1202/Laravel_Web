<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();

        $all_product = Product::where('product_status', 1)
            ->orderBy('products.product_id', 'DESC')
            ->paginate(9);


        return view("user.home", compact('categories', 'brands', 'all_product'));
    }

    public function search(Request $request)
    {
        $keywords = htmlspecialchars($request->input('keyword'));
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();

        //Tìm kiếm sp
        $search_product = Product::select('product_id', 'product_name', 'product_image', 'product_price')
            ->where('product_status', 1)
            ->where('product_name', 'LIKE', '%' . $keywords . '%')
            ->orderBy('product_id', 'DESC')
            ->paginate(9);


        return view("user.product.search", compact('categories', 'brands', 'search_product', 'keywords'));
    }
}
