<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function saveCart(Request $request){
        $productid = Request()->productid_hidden;
        $quantity = Request()->qly;

        $product_info = Product::where('product_id', $productid)->first();

        //Cart::add('293ad', 'Product 1', 1, 9.99);
        //Cart::destroy();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = 550;
        $data['options']['image'] = $product_info->product_image;
        $data['options']['tax'] = 0;
        Cart::add($data);
        //Cart::setGlobalTax(0);
        return Redirect::to('/show-cart');

    }
    public function showCart(){
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();

        return view('user.cart.show_cart', compact('categories', 'brands'));
    }

    public function deleteCart($rowId)
    {
        Cart::remove($rowId);
        return Redirect::to('/show-cart');
    }

    public function updateCart(Request $request){
        $rowId = Request()->rowId_cart;
        $qty = Request()->cart_quantity;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }
}
