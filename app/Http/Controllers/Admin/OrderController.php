<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\order;
class OrderController extends Controller
{
    public function index()
    {
        $orders = order::orderBy('id', 'desc')->paginate(7);
        return view('Admin.Order.index',compact('orders'));
    }
    public function edit($id)
    {
        $order = order::find($id);
        return view('Admin.Order.edit',compact('order'));
    }
    
    public function update(Request $request ,$id)
    {
        $order = order::find($id);
        $order->update([
            'status' => $request->status
        ]);
        return redirect(route('orders.index'))->with('message','Status has been updated');
    }

    public function destroy($id)
    {
        $order = order::find($id);
        $order->delete();
        return back()->with('message','Order '.$id.' has been deleted.');
    }
}
