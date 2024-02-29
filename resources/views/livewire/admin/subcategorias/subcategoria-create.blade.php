<div>
    <form wire:submit="save">
        <div class="card">

            <x-validation-errors class="mb-4" />
            <div class="mb-4">
                <x-label class="mb-2">
                    Familias
                </x-label>
                <x-select class="w-full" wire:model.live="subcategoria.familia_id">

                    <option value="" disabled>
                        Seleccione una familia
                    </option>
                    @foreach ($familias as $familia)
                        <option value="{{ $familia->id }}">
                            {{ $familia->nombrefam }}
                        </option>
                    @endforeach
                </x-select>
            </div>


            <div class="mb-4">
                <x-label class="mb-2">
                    Categorias
                </x-label>
                <x-select name="categoria_id" wire:model.live="subcategoria.categoria_id">
                    <option value="" disabled>
                        Seleccione una categoria
                    </option>
                    @foreach ($this->categorias as $categoria)
                        <option value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id)>
                            {{ $categoria->nombrecat }}
                        </option>
                    @endforeach
                </x-select>

            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Nombre
                </x-label>
                <x-input  class="w-full" 
                placeholder="Ingrese el nombre de la Subcategoria" wire:model="subcategoria.nombresub"/>
            </div>

            <div class="flex justify-end">
                <x-button>Guardar</x-button>
            </div>


        </div>
    </form>

    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
