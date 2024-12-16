<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index(){
        return view("login_admin");
    }
    public function show_dashboard(){
        return view("admin.dashboard");
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')
            ->where('admin_email',$admin_email)
            ->where('admin_password',$admin_password)->first();
        if($result)
        {
            session()->put('admin_name',$result->admin_name);
            session()->put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
            //return view("admin.dashboard");
        }
        else
        {
            return redirect()->back()->with('error','Email hoặc mật khẩu không đúng!');
        }
    }
    public function logout(Request $request){
        session()->put('admin_name',null);
        session()->put('admin_id',null);
        return Redirect::to('/admin');
    }
}
