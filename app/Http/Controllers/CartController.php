<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index(){
        if(session()->has('cart')){
            $cart=new Cart(session()->get('cart'));
        }
        else
        {
            $cart= new Cart();
        }
        return view('cart',compact('cart'));
    }
    public function addToCart(Product $product)
    {
        if(session()->has('cart')){
            $cart=new Cart(session()->get('cart'));
        }
        else
        {
            $cart= new Cart();
        }
        $cart->add($product);
        //dd($cart);
        session()->put('cart',$cart);
        return redirect()->back()->with('success','The product have been added to your cart successfully');
    }
    public function updateQuantity($id, Request $request)
    {
        $request->validate([
            'qtyNumber'=>'required|min:1|max:100|numeric'
        ]);
        $cart=new Cart(session()->get('cart'));
        $cart->update($id,$request->qtyNumber);
        session()->put('cart',$cart);
        return redirect()->back()->with('success','The product quantity updated');
    }

    public function destroy($id)
    {
        $cart=new Cart(session()->get('cart'));
        $cart->remove($id);
        if($cart->totalQty <= 0)
        {
            session()->forget('cart');
        }
        else
        {
            session()->put('cart',$cart);
        }
        return redirect()->back()->with('success','The product have been deleted successfully');
    }
    public function deleteAll()
    {
        session()->forget('cart');
        return redirect()->back()->with('success','All products has been deleted successfully');


    }
}
