<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\Books;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Cart $cart){
        return view('content.checkout', compact("cart"));
    }

    public function remove(Request $request){
        if($request->id){
            $cart = Session::get("cart");
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                Session::put('cart', $cart);
            }
            return view('content.miniCart', compact('cart'));
        }
        if($request->id_key){
            $cart = Session::get("cart");
            if(isset($cart[$request->id_key])){
                unset($cart[$request->id_key]);
                Session::put('cart', $cart);
            }
            return view('content.list-cart-checkout', compact('cart'));
        }

    }

    public function addToCart(Request $request){
        $product = Books::find($request->id);
        $cart = Session::get('cart',[]);
        if(isset($cart[$request->id])){
            $cart[$request->id]['quantity']++;
        }else{
            $cart[$request->id] = [
                'productID' => $product->id,
                'product_name' => $product->bookName,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ];
        }
        Session::put('cart', $cart);
        return view('content.miniCart', compact('cart'));
    }

    public function update(Request $request){
        if($request->id && $request->quantity){
            $cart = Session::get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            Session::put('cart', $cart);
            return response()->json(['message'=> 'Success'], 200);
        }
    }

}
