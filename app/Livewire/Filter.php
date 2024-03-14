<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;

class Filter extends Component
{
    use WithoutUrlPagination;
    public $familia_id;
    public $categoria_id;
    public $subcategoria_id;
    public $orderBy = 1;

    public $search;

    #[On('search')]
    public function search($search)
    {
        $this->search = $search;
    }


    public function render()
    {
        $productos = Producto::verifyFamilia($this->familia_id)
            ->verifyCategoria($this->categoria_id)
            ->verifySubcategoria($this->subcategoria_id)
            ->customOrder($this->orderBy)
            ->when($this->search, function ($query) {
                $query->where('nombrepro', 'like', '%' . $this->search . '%');
            })
            ->paginate(12);

        return view('livewire.filter', compact('productos'));
    }
}
