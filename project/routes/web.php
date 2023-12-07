<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GayaleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Transaction;

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
Route::resource('cart', CartController::class)->middleware(['auth']);
Route::resource('transaction', TransactionController::class)->middleware(['auth']);

Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::get('/checkout', [TransactionController::class, 'show'])->name('transaction.show');

Route::get('/order', function(){
    $user = Auth::user();
    $products = Product::all();
    $transactions = Transaction::all();
    $groupedTransactions = $transactions->groupBy('transaction_id');
    if ($user) {
        if ($user->role_id == 1) {
            return view('gayale.order')->with([
                'user_role' => $user->role_id,
                'products' => $products,
                'groupedTransactions' => $groupedTransactions
            ]);
        } else {
            return view('gayale.main')->with([
                'user_role' => $user->role_id,
                'products' => $products
            ]);
        }
    } else {
        return view('gayale.index')->with([
            'user' => $user
        ]);
    }
});

Route::get('/history', function() {
    $user = Auth::user();
    $transactions = Transaction::with('product')->where('user_id', $user->id)->get();
    $groupedTransactions = $transactions->groupBy('transaction_id');
    return view('gayale.history')->with([
        'groupedTransactions' => $groupedTransactions
    ]);
});

Route::get('/gayale', function () {
    $user = Auth::user();
    $products = Product::all();
    if ($user->role_id == 1) {
        return view('gayale.admin')->with([
            'user_role' => $user->role_id,
            'products' => $products
        ]);
    } else {
        return view('gayale.main')->with([
            'user_role' => $user->role_id,
            'products' => $products
        ]);
    }
})->middleware(['auth', 'verified'])->name('gayale');

Route::get('category/{category}', function ($category){
    $user = Auth::user();
    if($user->role_id == '2'){
        if($category == 'clothes'){
            $products = Product::where('category', 'clothes')->get();
            return view('gayale.category')->with([
                'products' => $products
            ]);
        }
        if($category == 'foods'){
            $products = Product::where('category', 'foods')->get();
            return view('gayale.category')->with([
                'products' => $products
            ]);
        }
        if($category == 'beverages'){
            $products = Product::where('category', 'beverages')->get();
            return view('gayale.category')->with([
                'products' => $products
            ]);
        }
        if($category == 'accessories'){
            $products = Product::where('category', 'accessories')->get();
            return view('gayale.category')->with([
                'products' => $products
            ]);
        }
        if($category == 'others'){
            $products = Product::where('category', 'others')->get();
            return view('gayale.category')->with([
                'products' => $products
            ]);
        }
    }

    if($user->role_id == '1'){
        if($category == 'clothes'){
            $products = Product::where('category', 'clothes')->get();
            return view('gayale.admincategory')->with([
                'products' => $products
            ]);
        }
        if($category == 'foods'){
            $products = Product::where('category', 'foods')->get();
            return view('gayale.admincategory')->with([
                'products' => $products
            ]);
        }
        if($category == 'beverages'){
            $products = Product::where('category', 'beverages')->get();
            return view('gayale.admincategory')->with([
                'products' => $products
            ]);
        }
        if($category == 'accessories'){
            $products = Product::where('category', 'accessories')->get();
            return view('gayale.admincategory')->with([
                'products' => $products
            ]);
        }
        if($category == 'others'){
            $products = Product::where('category', 'others')->get();
            return view('gayale.admincategory')->with([
                'products' => $products
            ]);
        }
    }
});

Route::get('/index', function () {
    $user = Auth::user();
    $products = Product::all();
    if ($user) {
        if ($user->role_id == 1) {
            return view('gayale.admin')->with([
                'user_role' => $user->role_id,
                'products' => $products
            ]);
        } else {
            return view('gayale.main')->with([
                'user_role' => $user->role_id,
                'products' => $products
            ]);
        }
    } else {
        return view('gayale.index')->with([
            'user' => $user
        ]);
    }
})->name('index');

require __DIR__ . '/auth.php';
