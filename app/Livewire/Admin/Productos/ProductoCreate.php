<?php

namespace App\Livewire\Admin\Productos;

use App\Models\Categoria;
use App\Models\Familia;
use App\Models\Producto;
use App\Models\Subcategoria;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductoCreate extends Component
{

    use WithFileUploads;

    public $familias;
    public $familia_id = '';
    public $categoria_id = '';

    public $image;


    public $producto = [
        'codigopro' => '',
        'nombrepro' => '',
        'descripcion' => '',
        'imagen' => '',
        'p_unit' => '',
        'subcategoria_id' => '',
    ];

    public function mount()
    {
        $this->familias = Familia::all();
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
        $this->producto['subcategoria_id'] = '';
    }

    public function updatedCategoriaId($value)
    {
        $this->producto['subcategoria_id'] = '';
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
        'image' => 'required|image|max:1024',
        'producto.codigopro' => 'required|unique:productos,codigopro',
        'producto.nombrepro' => 'required|max:255',
        'producto.descripcion' => 'required',
        'producto.p_unit' => 'required|numeric|min:0',
        'producto.subcategoria_id' => 'required|exists:subcategorias,id',
        ]);

        $this->producto['imagen']= $this->image->store('productos');
       $producto = Producto::create($this->producto);

       session()->flash('swal',[
        'icon' => 'success',
        'title' => '¡Excelente!',
        'text' => 'Producto creado correctamente'
    ]);

       return redirect()-> route ('admin.productos.edit', $producto);
    }

    public function render()
    {
        return view('livewire.admin.productos.producto-create');
    }
}
