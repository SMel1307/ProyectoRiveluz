<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
   public function show(Familia $familia){
    return view('familias.show', compact('familia'));
   }
}
