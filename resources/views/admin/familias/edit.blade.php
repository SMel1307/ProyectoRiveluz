<x-admin-layaout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Familias',
        'route' => route('admin.familias.index'),
    ],
    [
        'name' => $familia->nombrefam,
    ],
]">


    <div class="card">
        <form action="{{ route('admin.familias.update', $familia) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>
                <x-input class="w-full" placeholder="Ingrese el nombre de la Familia" name="nombrefam"
                    value="{{ old('nombrefam', $familia->nombrefam) }}" />
            </div>
            <div class="flex justify-end">

                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>

                <x-button>Actualizar</x-button>
            </div>

        </form>
    </div>

    <form action="{{ route('admin.familias.destroy', $familia) }}" method="POST" id="delete-form">
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
