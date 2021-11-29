<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\product;
class ProductController extends Controller
{
    public function index()
    {
        $products = product::all();
        return ProductResource::collection($products);
    }
}
