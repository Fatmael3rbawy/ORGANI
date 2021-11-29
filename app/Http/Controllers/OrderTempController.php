<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orderTemp;
use Illuminate\Support\Facades\Auth;
class OrderTempController extends Controller
{
    public function index()
    {
        $orders=orderTemp::select('*')->where('user_id','=',Auth::user()->id)->orderby('id','desc')->get();
        $total=$orders->sum('total');
        return view('shopingCard',compact('orders','total'));
    }

   public function IncQuantity($product_id)
   {
    $order=orderTemp::select('*')->where('product_id','=',$product_id)->first();
    $order->update([
        'quantity'=> $order->quantity +1,
        'total' => ($order->price) * ( $order->quantity +1)
    ]);
    return back();
   }

   public function decQuantity($product_id)
   {
    $order=orderTemp::select('*')->where('product_id','=',$product_id)->first();
    if ($order->quantity == 0) {
      return back();
    }else{
    $order->update([
        'quantity'=> $order->quantity -1,
        'total' => ($order->price) * ( $order->quantity -1)
    ]); 
    return back();
    }

   }

   public function delete($product_id)
   {
       $order=orderTemp::select('*')->where('product_id','=',$product_id)->first();
       $order->delete();
       return back()->with('msg',''.$order->pname.' has been deleted successfully');
  
    }
}
