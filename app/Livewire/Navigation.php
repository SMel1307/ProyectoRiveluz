<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Navigation extends Component
{

    public $familias;

    public $familia_id;

    public function mount()
    {
        $this->familias = \App\Models\Familia::all();
        $this->familia_id = $this->familias->first()->id;
    }
    #[Computed()]
    public function categorias(){
        return \App\Models\Categoria::where('familia_id', $this->familia_id)
        ->with('subcategoria')
        ->get();
    }

    #[Computed()]
    public function familiaNombre(){
        return \App\Models\Familia::find($this->familia_id)->nombrefam;
    }
    public function render()
    {
        return view('livewire.navigation');
    }
}
