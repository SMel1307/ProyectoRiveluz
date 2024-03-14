<x-container>
    <div class="card">
        <div class="grid md:grid-cols-2 gap-6">
            <div class="col-span-1">
                <figure>
                    <img src="{{ $producto->image }}" class="aspect-[1/1] w-full object-cover object-center"
                        alt="">
                </figure>
            </div>
            <div class="col-span-1">
                <h1 class="text-xl text-gray-600">
                    {{ $producto->nombrepro }}
                </h1>
                <div class="flex items-center space-x-2 mb-4">
                    <ul class="flex space-x--1 text-sm">
                        <li>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                        </li>
                    </ul>
                    <p class="text-sm">4.7(55)</p>
                </div>
                <p class="font-semibold text-2xl text-gray-600 mb-4">
                    Bs. {{ $producto->p_unit }}
                </p>
                <div class="flex items-center space-x-6 mb-6" 
                    x-data="{
                    qty: @entangle('qty')
                }">
                    <button class="btn btn-gray" 
                        x-on:click="qty = qty-1"
                        x-bind:disabled = "qty == 1 ">
                        -
                    </button>
                    <span x-text="qty" class="inline-block w-2 text-center"></span>
                    <button class="btn btn-gray" x-on:click="qty = qty+1">
                        +
                    </button>

                </div>
                <button class="btn btn-purple w-full mb-6"
                    wire:click="add_to_cart"
                    wire:loading.attr="disabled">
                    <i class="fas fa-shopping-cart text-white"></i>
                    Agregar al carrito
                </button>
               
                <div class="text-sm mb-4">
                    {{ $producto->descripcion }}

                </div>
                <div class="text-gray-700 flex items-center space-x-4">
                    <i class="fa-solid fa-truck-fast text-2xl">
                    </i>
                    <p>
                        Despacho a Laboratorio o Domicilio
                    </p>
                </div>
            </div>
        </div>

    </div>
</x-container>
