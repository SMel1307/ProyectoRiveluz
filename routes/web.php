<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\WelcomeController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::get('familias/{familia}', [FamiliaController::class, 'show'])->name('familias.show');
Route::get('categorias/{categoria}',[CategoriaController::class, 'show'])->name('categorias.show');
Route::get('subcategorias/{subcategoria}',[SubcategoriaController::class, 'show'])->name('subcategorias.show');

Route::get('productos/{producto}',[ProductoController::class, 'show'])->name('productos.show');

Route::get('cart', [CartController::class, 'index'])->name('cart.index');

Route::get('shipping', [ShippingController::class, 'index'])->name('shipping.index');

Route::get('orders/create', function (){
 
})->name('orders.create');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('prueba', function(){
    Cart::instance('shopping');
    return Cart::content();
});

