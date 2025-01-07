<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

;

class CheckOutController extends Controller
{
    public function loginCheckout()
    {
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();

        return view('user.checkout.login_checkout', compact('categories', 'brands'));
    }

    public function logoutCheckout()
    {
        Session::flush();
        return Redirect::to('/');
    }

    public function addCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'customer_password' => 'required|min:8',
            'customer_phone' => 'required|max:11|unique:customers,customer_phone',
        ], [
            'customer_name.required' => 'Vui lòng nhập tên khách hàng',
            'customer_password.required' => 'Vui lòng nhập mật khẩu',
            'customer_password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
            'customer_phone.required' => 'Vui lòng nhập số điện thoại',
            'customer_phone.max' => 'Số điện thoại không được vượt quá 11 ký tự',
            'customer_phone.unique' => 'Số điện thoại đã tồn tại, vui lòng sử dụng số khác',
        ]);

        $customer = Customer::create([
            'customer_name' => $request->customer_name,
            'customer_password' => bcrypt($request->customer_password),
            'customer_phone' => $request->customer_phone,
        ]);

        Session::put('customer_id', $customer->customer_id);
        Session::put('customer_name', $customer->customer_name);

        return Redirect::route('checkout');
    }

    public function loginCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'phone_account' => 'required|max:11',
            'password_account' => 'required|min:8',
        ], [
            'phone_account.required' => 'Vui lòng nhập số điện thoại',
            'phone_account.max' => 'Số điện thoại không được vượt quá 11 ký tự',
            'password_account.required' => 'Vui lòng nhập mật khẩu',
            'password_account.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
        ]);

        $customer = Customer::where('customer_phone', $request->phone_account)->first();

        if ($customer && Hash::check($request->password_account, $customer->customer_password)) {
            Session::put('customer_id', $customer->customer_id);
            Session::put('customer_name', $customer->customer_name);
            return Redirect::route('checkout');
        } else {
            return Redirect::back()->withErrors(['phone_account' => 'Số điện thoại hoặc mật khẩu không đúng']);
        }
    }


    public function checkout()
    {
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();

        return view('user.checkout.show_checkout', compact('categories', 'brands'));
    }

    public function saveCheckoutCustomer(Request $request)
    {
        $validatedData = $request->validate([
            'shipping_name' => 'required',
            'shipping_phone' => 'required|max:11',
            'shipping_address' => 'required',
            'shipping_note' => 'nullable|max:255',
        ], [
            'shipping_name.required' => 'Vui lòng nhập tên người nhận',
            'shipping_phone.required' => 'Vui lòng nhập số điện thoại',
            'shipping_phone.max' => 'Số điện thoại không được vượt quá 11 ký tự',
            'shipping_address.required' => 'Vui lòng nhập địa chỉ giao hàng',
            'shipping_note.max' => 'Ghi chú không được vượt quá 255 ký tự'
        ]);

        $shipping = Shipping::create([
            'shipping_name' => $request->shipping_name,
            'shipping_phone' => $request->shipping_phone,
            'shipping_address' => $request->shipping_address,
            'shipping_note' => $request->shipping_note,
        ]);

        Session::put('shipping_id', $shipping->shipping_id);

        return Redirect::to('/payment');
    }

    public function payment()
    {
        $categories = Category::where('categories_status', 1)->get();
        $brands = Brand::where('brand_status', 1)->get();

        return view('user.checkout.payment', compact('categories', 'brands'));
    }

    public function orderPlace(Request $request)
    {
        // Lây thông tin thanh toán
        $payment_option = $request->input('payment-option');

        if (is_null($payment_option)) {
            return Redirect::back()->withErrors(['payment_option' => 'Vui lòng chọn hình thức thanh toán']);
        }

        // Lưu thông tin shipping
        $shipping_id = Session::get('shipping_id');
        $shipping = Shipping::find($shipping_id);
        if (!$shipping) {
            return Redirect::back()->withErrors(['shipping_error' => 'Không tìm thấy thông tin giao hàng']);
        }

        // Lưu thông tin thanh toán
        $payment = Payment::create([
            'payment_method' => $payment_option,
            'payment_status' => 'Đang chờ xử lý',
        ]);

        // Lưu thông tin đơn hàng
        $order = Order::create([
            'customer_id' => Session::get('customer_id'),
            'shipping_id' => $shipping->shipping_id,
            'payment_id' => $payment->payment_id,
            'order_total' => Cart::total(),
            'order_status' => 'Đang chờ xử lý',
        ]);

        // Lưu chi tiết đơn hàng
        $content = Cart::content();
        foreach ($content as $item) {
            OrderDetail::create([
                'order_id' => $order->order_id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'product_price' => $item->price,
                'product_quantity' => $item->qty,
            ]);
        }


        // Kiểm tra phương thức thanh toán và xử lý tương ứng
        if ($payment_option === 'TK Ngân hàng')
        {
            $categories = Category::where('categories_status', 1)->get();
            $brands = Brand::where('brand_status', 1)->get();
            Cart::destroy();
            return view('user.checkout.bank');
        }
        elseif ($payment_option === 'VISA')
        {
            $categories = Category::where('categories_status', 1)->get();
            $brands = Brand::where('brand_status', 1)->get();
            Cart::destroy();
            return view('user.checkout.visa');
        }
        elseif ($payment_option === 'Tiền mặt')
        {
            $categories = Category::where('categories_status', 1)->get();
            $brands = Brand::where('brand_status', 1)->get();
            Cart::destroy();
            return view('user.checkout.handcash', compact('categories', 'brands'));
        }
        else
        {
            return Redirect::back()->withErrors(['payment_option' => 'Phương thức thanh toán không hợp lệ']);
        }
    }

    public function manageOrder()
    {
        $all_order = Order::join('customers', 'orders.customer_id', '=', 'customers.customer_id')
            ->select('orders.*', 'customers.customer_name')
            ->orderBy('orders.order_id', 'DESC')
            ->get();
        $manager_order = view('admin.manage_order')->with('all_order', $all_order);
        return view('layout_admin')->with('admin.manage_order', $manager_order);
    }


    public function viewOrder($order_id)
    {
        $order_by_id = Order::join('customers', 'orders.customer_id', '=', 'customers.customer_id')
            ->join('shippings', 'orders.shipping_id', '=', 'shippings.shipping_id')
            ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->select('orders.*', 'customers.customer_name', 'customers.customer_phone', 'shippings.shipping_name', 'shippings.shipping_address', 'shippings.shipping_phone', 'order_details.product_name', 'order_details.product_quantity', 'order_details.product_price')
            ->where('orders.order_id', $order_id)
            ->get();

        return view('admin.view_order', compact('order_by_id'));
    }

    public function updateOrder(Request $request, $order_id) {
        $order = Order::find($order_id);
        if (!$order) {
            return Redirect::back()->withErrors(['order_not_found' => 'Không tìm thấy đơn hàng']);
        }
        $order->update([ 'order_status' => $request->order_status, ]);
        return Redirect::route('checkout.manage-order')
            ->with('success', 'Đơn hàng đã được cập nhật thành công');
    }

    public function deleteOrder($order_id) {
        $order = Order::find($order_id);
        if (!$order) {
            return Redirect::back()->withErrors(['order_not_found' => 'Không tìm thấy đơn hàng']);
        }
        $order->delete();
        return Redirect::route('checkout.manage-order')
            ->with('success', 'Đơn hàng đã được xóa thành công'); }
}


