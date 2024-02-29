<x-admin-layaout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Subcategorias',
        'route' => route('admin.subcategorias.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    {{-- <form action="{{ route('admin.subcategorias.store') }}" method="POST">
        @csrf

        <div class="card">

        <x-validation-errors class="mb-4"/>
            <div class="mb-4">
                <x-label class="mb-2">
                    Categorias
                </x-label>
                    <x-select name="categoria_id">

                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                @selected(old('categoria_id') == $categoria->id)>
                                {{ $categoria->nombrecat }}
                            </option>
                        @endforeach
                    </x-select>
                
            </div>

            <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la Subcategoria" name="nombresub"
                    value="{{ old('nombresub') }}" />
            </div>

            <div class="flex justify-end">
                <x-button>Guardar</x-button>
            </div>
        

        </div>
    </form> --}}

    @livewire('admin.subcategorias.subcategoria-create')
</x-admin-layaout>
