<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GayaleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('gayale', GayaleController::class)->middleware(['auth']);

Route::get('/gayale', function () {
    $user = Auth::user();
    $products = Product::all();
    return view('gayale.main')->with([
        'user_role' => $user->role_id,
        'products' => $products
    ]); 
})->middleware(['auth', 'verified'])->name('gayale');

Route::get('/index', function () {
    $user = Auth::user();
    if($user){
        return view('gayale.main')->with([
            'user_role' => $user->role_id
        ]);
    }else{
        return view('gayale.index')->with([
            'user' => $user
        ]); 
    }
})->name('index');

require __DIR__.'/auth.php';
