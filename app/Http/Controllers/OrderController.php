<?php

namespace App\Http\Controllers;

use App\order;
use App\product;
use App\orderTemp;
use App\order_product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $ordersTemp = orderTemp::where('user_id', '=', Auth::user()->id)->get();
        $order = order::create([
            'status' => 'Pending',
            'user_id' => Auth::user()->id
        ]);
        $order_id = order::select('id')->where('user_id', '=', Auth::user()->id)->first();
        $max_id = $order_id->max('id');
        $orders = [];
        foreach ($ordersTemp as $ordertemp) {
            $orders[] = [
                'price' => $ordertemp->price,
                'quantity' => $ordertemp->quantity,
                'total' => $ordertemp->total,
                'product_id' => $ordertemp->product_id,
                'order_id' => $max_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        order_product::insert($orders);
        
        $total = $ordersTemp->sum('total');
        foreach ($ordersTemp as $ordertemp) {
         $ordertemp->delete();
        }
        return view('checkout',compact('ordersTemp','total'));
    }

}
