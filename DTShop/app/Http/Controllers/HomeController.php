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

//        $all_product = Product::join('categories', 'products.categories_id', '=', 'categories.categories_id')
//            ->join('brand', 'products.brand_id', '=', 'brand.brand_id')
//            ->orderBy('products.product_id', 'DESC')
//            ->get(['products.*', 'categories.categories_name', 'brand.brand_name']);
        $all_product = Product::where('product_status', 1)
            ->orderBy('products.product_id', 'DESC')
            ->limit(9)
            ->get();


        return view("user.home", compact('categories', 'brands', 'all_product'));
    }
}
