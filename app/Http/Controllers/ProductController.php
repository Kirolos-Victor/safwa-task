<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('products');
    }
    public function getData()
    {
        $products=Product::paginate(4);
        return response()->json($products);
    }
    public function search(Request $request)
    {
        $products=Product::where('name','LIKE',"%$request->q%")->paginate(4);
        return response()->json($products);

    }
}
