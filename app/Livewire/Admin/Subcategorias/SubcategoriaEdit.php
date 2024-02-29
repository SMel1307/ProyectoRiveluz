<?php

namespace App\Livewire\Admin\Subcategorias;

use App\Models\Categoria;
use App\Models\Familia;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SubcategoriaEdit extends Component
{
    public $subcategoria;
    public $familias;

    public $subcategoriaEdit;

    public function mount($subcategoria)
    {
        $this->familias = Familia::all();
        $this-> subcategoriaEdit = [
            'familia_id' => $subcategoria->categoria->familia_id,
        'categoria_id' => $subcategoria->categoria_id,
        'nombresub' => $subcategoria->nombresub

        ];
    }
    public function updatedSubcategoriaEditFamiliaId(){
        $this->subcategoriaEdit['categoria_id'] = '';
     }

     #[Computed()]
    public function categorias()
    {

        return Categoria::where('familia_id', $this->subcategoriaEdit['familia_id'])->get();
    }

    public function save(){
        $this->validate([
            'subcategoriaEdit.familia_id' => 'required|exists:familias,id',
            'subcategoriaEdit.categoria_id' => 'required|exists:categorias,id',
            'subcategoriaEdit.nombresub' => 'required'
        ]);

        $this->subcategoria->update($this->subcategoriaEdit);

        $this->dispatch('swal',[
        
                'icon' => 'success',
                'title' => '¡Excelente!',
                'text' => 'Subcategoria actualizada correctamente'
            
        ]);
    }
    public function render()
    {
        return view('livewire.admin.subcategorias.subcategoria-edit');
    }
}
