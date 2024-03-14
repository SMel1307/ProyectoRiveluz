<?php

namespace App\Http\Controllers;

use App\Models\Subcategoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function show(Subcategoria $subcategoria){
        return view('subcategorias.show', compact('subcategoria'));
    }
}
