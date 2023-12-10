<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $productId = $request->productId;
        $quantity = $request->quantity;

        $product = Product::findOrFail($productId);

        if ($quantity <= $product->stock) {


            $existingCartItem = Cart::where('user_id', $user->id)->where('product_id', $productId)->first();

            if ($existingCartItem) {
                $existingCartItem->quantity += $quantity;
                $existingCartItem->save();
            } else {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->product_id = $productId;
                $cart->quantity = $quantity;
                $cart->save();
            }

            return redirect('/gayale');
        } else {
            return redirect('/gayale')->with('error', 'Requested quantity is not available in stock.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->with('product')->get();

        foreach($carts as $cart){
            $cart->is_checked = 0;
            $cart->save();
        }

        return view('gayale.cart')->with([
            'carts' => $carts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->is_checked = $request->input('is_checked');
        $cartItem->quantity = $request->input('y');
        $cartItem->save();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Cart item updated successfully.']);
        }

        return redirect('/cart')->with('success', 'Cart item updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartItem = Cart::findOrFail($id);
        $productId = $cartItem->product_id;
        $quantity = $cartItem->quantity;

        $product = Product::findOrFail($productId);
        $product->stock += $quantity;
        $product->save();

        $cartItem->delete();

        return redirect('/cart')->with('success', 'Item removed from cart.');
    }

}
