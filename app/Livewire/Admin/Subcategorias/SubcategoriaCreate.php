<?php

namespace App\Livewire\Admin\Subcategorias;

use App\Models\Categoria;
use App\Models\Familia;
use App\Models\Subcategoria;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SubcategoriaCreate extends Component
{

    public $familias;

    public $subcategoria = [
        'familia_id' => '',
        'categoria_id' => '',
        'nombresub' => ''
    ];
    public function mount()
    {
        $this->familias = Familia::all();
    }

    public function updatedSubcategoriaFamiliaId(){
       $this->subcategoria['categoria_id'] = '';
    }

    #[Computed()]
    public function categorias()
    {

        return Categoria::where('familia_id', $this->subcategoria['familia_id'])->get();
    }

    public function save(){
        $this->validate([
            'subcategoria.familia_id' => 'required|exists:familias,id',
            'subcategoria.categoria_id' => 'required|exists:categorias,id',
            'subcategoria.nombresub' => 'required'
        ],[],[
            'subcategoria.familia_id' => 'familia',
            'subcategoria.categoria_id' => 'categoria',
            'subcategoria.nombresub' => 'nombre'
        ]);

        Subcategoria::create($this->subcategoria);

        session()->flash('swal',[
            'icon' => 'success',
            'title' => '¡Excelente!',
            'text' => 'Subcategoria creada correctamente'
        ]);

        return redirect()->route('admin.subcategorias.index');
        
    }
    public function render()
    {
        return view('livewire.admin.subcategorias.subcategoria-create');
    }
}
