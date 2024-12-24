<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function saveCart(Request $request){
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();

        $productid = Request()->productid_hidden;
        $quantity = Request()->qly;
        $data = Product::where('product_id', $productid)->get();

        return view('user.cart.show_cart', compact('categories', 'brands', 'data', 'quantity'));
    }
}
