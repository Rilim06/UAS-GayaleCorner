<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\transaction;

class TransactionController extends Controller
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
        $this->validate($request, [
            'address' => 'required',
            'photo' => 'required'
        ]);

        $path = $request->file('photo')->storePublicly('photos', 'public');
        $user = Auth::user();
        $carts = Cart::all();
        $transactionID = Str::uuid();

        foreach ($request->input('carts') as $cart) {
            $transaction = new Transaction();
            $transaction->transaction_id = $transactionID;
            $transaction->user_id = $user->id;
            $transaction->product_id = $cart['product_id'];
            $transaction->quantity = $cart['quantity'];
            $transaction->address = $request->address;
            $transaction->payment = $path;
            $transaction->save();
        }

        $checkedCarts = Cart::where('is_checked', 1)->get();
        $checkedCarts->each->delete();

        return redirect('/gayale');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->where('is_checked', 1)->with('transaction')->get();

        if($carts->isEmpty()){
            return redirect('/cart');
        } else {
            return view('gayale.transaction')->with([
                'carts' => $carts
            ]);
        }        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
