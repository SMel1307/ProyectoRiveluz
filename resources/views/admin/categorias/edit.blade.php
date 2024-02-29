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
        'name' => $categoria->nombrecat,
    ],
]">

    <form action="{{ route('admin.categorias.update', $categoria) }}" method="POST">
        @csrf

        @method('PUT')
        <div class="card">

        <x-validation-errors class="mb-4"/>
            <div class="mb-4">
                <x-label class="mb-2">
                    Familia
                </x-label>
                    <x-select name="familia_id">

                        @foreach ($familias as $familia)
                            <option value="{{ $familia->id }}"
                                @selected(old('familia_id', $categoria->familia_id) == $familia->id)>
                                {{ $familia->nombrefam }}
                            </option>
                        @endforeach
                    </x-select>
                
            </div>

            <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la Categoria" name="nombrecat"
                    value="{{ old('nombrecat', $categoria) }}" />
            </div>
            
            <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>

                <x-button class="ml-2">Actualizar</x-button>
            </div>
        

        </div>
    </form>

    <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
    @push('js')
        <script>
            function confirmDelete() {
                //document.getElementById('delete-form').submit();
                Swal.fire({
                    title: "Estas Seguro?",
                    text: "No Podras revertir esta acción!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sí, eliminar!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        /*Swal.fire({
                            title: "Eliminado!",
                            text: "Se ha eliminado correctamente.",
                            icon: "success"
                        });*/
                        document.getElementById('delete-form').submit();
                    }
                });
            }
        </script>
    @endpush
</x-admin-layaout>
