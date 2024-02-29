<?php

namespace App\Livewire\Admin\Productos;

use App\Models\Categoria;
use App\Models\Familia;
use App\Models\Subcategoria;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductoEdit extends Component
{
    use WithFileUploads;
    
    public $producto;
    public $productoEdit;

    public $familias;
    public $familia_id = '';
    public $categoria_id = '';

    public $image;

    public function mount($producto){
       $this->productoEdit = $producto->only('codigopro', 'nombrepro', 'descripcion', 'imagen', 'p_unit', 'subcategoria_id');

       $this-> familias =Familia::all();

       $this-> categoria_id = $producto->subcategoria->categoria->id;
       $this -> familia_id = $producto->subcategoria->categoria->familia_id;

    }
    public function boot(){
        $this->withValidator(function ($validator){
            if($validator->fails())
            {
                $this->dispatch('swal',[
                    'icon' => 'error',
                    'title' => '¡Error!',
                    'text' => 'El formulario contiene errores'
                    
                ]);
            }

        });
    }


    public function updatedFamiliaId($value)
    {
        $this->categoria_id = '';
        $this->productoEdit['subcategoria_id'] = '';
    }

    public function updatedCategoriaId($value)
    {
        $this->productoEdit['subcategoria_id'] = '';
    }

    #[Computed()]
    public function categorias()
    {
        return Categoria::where('familia_id', $this->familia_id)->get();
    }

    #[Computed()]
    public function subcategorias()
    {
        return Subcategoria::where('categoria_id', $this->categoria_id)->get();
    }

    public function store()
        {
            $this->validate([
            'image' => 'nullable|image|max:1024',
            'productoEdit.codigopro' => 'required|unique:productos,codigopro,' . $this->producto->id,
            'productoEdit.nombrepro' => 'required|max:255',
            'productoEdit.descripcion' => 'required',
            'productoEdit.p_unit' => 'required|numeric|min:0',
            'productoEdit.subcategoria_id' => 'required|exists:subcategorias,id',
            ]);

            if($this->image){
                Storage::delete('public/ '.$this->productoEdit['imagen']);

                $this->productoEdit['imagen'] = $this->image->store('productos');
            }
    
          $this->producto->update($this->productoEdit);
    
          session()->flash('swal',[
            'icon' => 'success',
            'title' => '¡Excelente!',
            'text' => 'Producto actualizado correctamente'
        ]);
    
           return redirect()-> route ('admin.productos.edit', $this->producto);
        }
    



    public function render()
    {
        return view('livewire.admin.productos.producto-edit');
    }
}
