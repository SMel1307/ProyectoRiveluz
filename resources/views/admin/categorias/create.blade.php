<x-admin-layaout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorias',
        'route' => route('admin.categorias.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <form action="{{ route('admin.categorias.store') }}" method="POST">
        @csrf

        <div class="card">

        <x-validation-errors class="mb-4"/>
            <div class="mb-4">
                <x-label class="mb-2">
                    Familia
                </x-label>
                    <x-select name="familia_id">

                        @foreach ($familias as $familia)
                            <option value="{{ $familia->id }}"
                                @selected(old('familia_id') == $familia->id)>
                                {{ $familia->nombrefam }}
                            </option>
                        @endforeach
                    </x-select>
                
            </div>

            <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la Categoria" name="nombrecat"
                    value="{{ old('nombrecat') }}" />
            </div>

            <div class="flex justify-end">
                <x-button>Guardar</x-button>
            </div>
        

        </div>
    </form>
</x-admin-layaout>
