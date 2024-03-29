<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Familia;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id', 'desc')
        ->with('familia')
        ->paginate(10);
        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $familias = Familia::all();

        return view('admin.categorias.create', compact('familias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'familia_id' => 'required|exists:familias,id',
            'nombrecat' => 'required'
        ]);
        Categoria::create($request->all());

        session()->flash('swal',[
            'icon' => 'success',
            'title' => '¡Excelente!',
            'text' => 'Categoria creada correctamente'
        ]);

        return redirect()->route('admin.categorias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        $familias = Familia::all();
        return view('admin.categorias.edit', compact('categoria', 'familias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'familia_id' => 'required|exists:familias,id',
            'nombrecat' => 'required'
        ]);
        $categoria->update($request->all());
        session()->flash('swal',[
            'icon' => 'success',
            'title' => '¡Excelente!',
            'text' => 'Categoria Actualizada correctamente'
        ]);
        return redirect()->route('admin.categorias.edit', $categoria);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        if($categoria->subcategoria->count()>0){
            session()->flash('swal',[
                'icon' => 'error',
                'title' => '¡Ups!',
                'text' => 'No se puede eliminar la categoria porque tiene subcategorias asociadas'
            ]);
            return redirect()->route('admin.categorias.edit', $categoria);
        }

        $categoria->delete();

        session()->flash('swal',[
            'icon' => 'success',
            'title' => '¡Excelente!',
            'text' => 'Categoria Eliminada correctamente'
        ]);
        
        return redirect()->route('admin.categorias.index');
    }
}
