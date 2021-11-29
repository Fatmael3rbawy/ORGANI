<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;
use App\product;
use App\orderTemp;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = product::orderBy('id', 'desc')->paginate(8);
        $departments = department::all();
        $latestProducts = product::latest('id')->limit(3)->get();
        return view('home', ['products' => $products, 'departments' => $departments, 'latestProducts' => $latestProducts]);
    }

    public function getDept_Products($id)
    {
        $dept_name = department::select('department_name')->where('id', '=', $id)->first();
        $dept_products = product::select('*')->where('department_id', '=', $id)->get();
        return view('dept_products', ['dept_products' => $dept_products, 'dept_name' => $dept_name]);
    }

    public function search(Request $request)
    {
        $text = $request->search;
        $results = product::where('product_name', 'like', '%' . $text . '%')
            ->orderBy('id')
            ->paginate(4);
        if ($results->isEmpty())
            return back()->with('result', 'There are not results');
        else
            return view('searchResult', compact('results'));
    }

    public function AddToCard($product_id, $user_id)
    {
        $product = product::find($product_id);
        $ordertemps = orderTemp::where('user_id', '=', $user_id)->get();
        if ($product->discount != 0) {
            $priceAfterDiscount = $product->price - ($product->price  * $product->discount/100);
            if ($ordertemps->contains('product_id', $product_id)) {
                $ordertemp = orderTemp::where('product_id', '=', $product_id)->first();
                $ordertemp->update([
                    'quantity' => $ordertemp->quantity + 1,
                    'price' => $priceAfterDiscount,
                    'total' => ($priceAfterDiscount) * ($ordertemp->quantity + 1)
                ]);
            } else {
                orderTemp::create([
                    'product_id' => $product_id,
                    'pname' => $product->product_name,
                    'image' => $product->image,
                    'quantity' => 1,
                    'price' => $priceAfterDiscount,
                    'total' => $priceAfterDiscount,
                    'user_id' => $user_id
                ]);
            }
        } else {
            if ($ordertemps->contains('product_id', $product_id)) {
                $ordertemp = orderTemp::where('product_id', '=', $product_id)->first();
                $ordertemp->update([
                    'quantity' => $ordertemp->quantity + 1,
                    'total' => ($ordertemp->price) * ($ordertemp->quantity + 1)
                ]);
            } else {
                orderTemp::create([
                    'product_id' => $product_id,
                    'pname' => $product->product_name,
                    'image' => $product->image,
                    'quantity' => 1,
                    'price' => $product->price,
                    'total' => $product->price,
                    'user_id' => $user_id
                ]);
            }
        }

        return back()->with('message', '' . $product->product_name . ' has been added to card successfully');
    }
}
