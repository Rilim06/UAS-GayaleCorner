<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class GayaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();
        if($user->role_id == 1){
            return view('gayale.admin')->with([
                'products' => $products,     
            ]);
        }else{
            return view('gayale.main')->with([
                'products' => $products,      
            ]); 
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gayale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'description'=>'required',
            'category'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'photo'=>'required'
        ]);

        $path = $request->file('photo')->storePublicly('photos', 'public');
        $ext = $request->file('photo')->extension();

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->photo = $path;
        $product->save();
        return redirect('/gayale');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $path = Storage::url($product->photo);
        return view('gayale.edit')->with([
            'product'=>$product,
            'photo'=>$path
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->stock = $request->stock;

        if($request->hasFile('newPhoto')){
            $path = $request->file('newPhoto')->storePublicly('photos', 'public');
            $product->photo = $path;
        }

        $product->save();

        return redirect('/gayale');
    }

    public function destroy(string $id)
    {
        Product::find($id)->delete();

        return redirect('/gayale');
    }
}
