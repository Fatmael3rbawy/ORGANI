<?php

namespace App\Http\Controllers;
use App\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    
    public function index()
    {
        $products = product::paginate(8) ;
        // $products= $productss->sortBy('price');
        $product_num = product::count();
        $sall_product= product::select('*')->where('discount','!=','0')->get();
         return view('shop',['products'=>$products ,'sall_product' =>$sall_product ,'product_num'=>$product_num]);
     
    }
 public function sort($value)
{
  
}
   
    public function show($id)
    {
        //
    }

    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
}
