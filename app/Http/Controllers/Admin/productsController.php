<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use App\department;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::orderBy('id', 'desc')->paginate(3);

        return view('Admin.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = department::all();
        return view('Admin.Products.create', compact('department'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|min:3',
            'price' => 'required',
            'desc' => 'required|string|min:5|max:200',
            'img' => 'required|image'

        ]);

        $image = $request->file('img');
        $ext = $image->getClientOriginalExtension();
        $name = "product" . uniqid() . ".$ext";
        $image->move(public_path('images/products'), $name);

        $newProduct = product::create([
            'product_name' => $request->name,
            'description' => $request->desc,
            'image' =>  $name,
            'price' => $request->price,
            'discount' => $request->discount,
            'department_id' => $request->dept

        ]);

        return redirect(route('products.index'))->with('message', 'Product has been created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $departments = department::all();
        $product = product::find($id);
        $department = department::select('*')->where('id', '=', $product->department_id)->first();

        return view('Admin.Products.edit', compact(['product', 'departments', 'department']));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|min:3',
            'desc' => 'string|min:5|max:200',
            'img' => 'image'

        ]);
        $product = product::find($id);
        $image_name = $product->image;

        if ($request->hasFile('img')) {
            if ($image_name !== '') {
                unlink(public_path('images/products/') . $image_name);
            }
            $image = $request->file('img');
            $ext = $image->getClientOriginalExtension();
            $image_name = "product" . uniqid() . ".$ext";
            $image->move(public_path('images/products'), $image_name);
        }

        $product->update([
            'product_name' => $request->name,
            'description' => $request->desc,
            'image' =>  $image_name,
            'price' => $request->price,
            'discount' => $request->discount,
            'department_id' => $request->dept
        ]);
        // if($product->isDirty()){
        //     return redirect(route('products.index'))->with('message', 'Product has been updated successfully');
        // }else
        // return redirect(route('products.edit',$id))->with('message', 'Product has not been updated successfully');
        return redirect(route('products.index'))->with('message', 'Product' . $id . ' has been updated successfully');
    }


    public function destroy($id)
    {
        $product = product::find($id);
        $image_name = $product->image;
        if ($image_name !== '') {
            unlink(public_path('images/products/') . $image_name);
        }
        $product->delete();

        return redirect(route('products.index'))->with('message', 'Product ' . $id . ' has been deleted successfully');
    }
}
