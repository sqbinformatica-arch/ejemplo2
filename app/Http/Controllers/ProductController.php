<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    

    public function index()
{
    $products = Product::all();

    return view('shop', compact('products'));
}
public function addToCart($id)
{
    $product = Product::findOrFail($id);

    $cart = session()->get('cart', []);

    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product->name,
            "price" => $product->price,
            "quantity" => 1
        ];
    }

    session()->put('cart', $cart);

    return redirect()->back();
}
public function viewCart()
{
    $cart = session()->get('cart', []);
    return view('cart', compact('cart'));
}
public function removeFromCart($id)
{
    $cart = session()->get('cart', []);

    if(isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->back();
}
}
