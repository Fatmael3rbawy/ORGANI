<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\order;
use App\product;
use Illuminate\Http\Request;
use App\User;
class dashboardController extends Controller
{
    public function index()
    {
        //users
        $users = User::count();
        $new_users = User::latest('id')->limit(8)->get();
        //products
        $sale_products = product::latest('id')->where('discount','!=',0)->limit(8)->get();
        $latest_prodcuts = product::latest('id')->limit(6)->get();
        //Orders
        $ordersNo = order::count();
        $orders = order::all();
        return view('Admin.index' ,compact('users','new_users','sale_products','latest_prodcuts','ordersNo','orders'));
    }
}
