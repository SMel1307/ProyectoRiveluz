<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\CoverController;
use App\Http\Controllers\Admin\FamiliaController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\SubcategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('familias', FamiliaController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('subcategorias', SubcategoriaController::class);
Route::resource('productos', ProductoController::class);
Route::resource('covers', CoverController::class);