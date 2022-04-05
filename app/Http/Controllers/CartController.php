<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cartItems = [];

        if($cart)
        {
            $idArray = array_keys($cart->items);
            foreach($idArray as $idFromCart)
            {
                $product = Product::findOrFail($idFromCart);
                $cartItem = [
                    'product' => $product,
                    'qty' => $cart->items[$idFromCart]['qty'],
                ];
                $cartItems[] = $cartItem;
            }
        }
        return view('cart.index', ['orderItems' => $cartItems]);
    }

    public function empty(Request $request)
    {
        if($request->session()->has('cart'))
        {
            $request->session()->remove('cart');
        }

        // this gives behaviour i don't want, this means you will have to press
        // back twice to get back to the page before as well as messing with the session
        return view('cart.index', ['orderItems' => []]);
    }
}
