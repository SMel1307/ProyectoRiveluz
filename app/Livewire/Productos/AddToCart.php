<?php

namespace App\Livewire\Productos;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddToCart extends Component
{

    public $producto;

    public $qty = 1;
    public function add_to_cart(){
        Cart::instance('shopping');

        Cart::add([
            'id' => $this->producto->id,
            'name' => $this->producto->nombrepro,
            'qty' => $this->qty,
            'price' => $this->producto->p_unit,
            'options' => [
                'image' => $this->producto->image,
                'codigopro' => $this->producto->codigopro,
            ]
        ]);
       if(auth()->check()){
        Cart::store(auth()->id());
       }
     
       $this->dispatch('cartUpdated', Cart::count());
        $this->dispatch('swal',[
            'icon' => 'success',
            'title' => '¡Producto agregado correctamente!',
            'text' => 'El producto se ha añadido al carrito'
        ]);
    }

    public function render()
    {
        return view('livewire.productos.add-to-cart');
    }
}
