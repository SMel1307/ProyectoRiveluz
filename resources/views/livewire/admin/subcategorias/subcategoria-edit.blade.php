<div>
    <form wire:submit="save">
        <div class="card">

            <x-validation-errors class="mb-4" />
            <div class="mb-4">
                <x-label class="mb-2">
                    Familias
                </x-label>
                <x-select class="w-full" wire:model.live="subcategoriaEdit.familia_id">

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
                <x-select name="categoria_id" wire:model.live="subcategoriaEdit.categoria_id">
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
                placeholder="Ingrese el nombre de la subcategoria" wire:model="subcategoriaEdit.nombresub"/>
            </div>

            <div class="flex justify-end">

                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>
                <x-button>Actualizar</x-button>
            </div>


        </div>
    </form>


    <form action="{{ route('admin.subcategorias.destroy', $subcategoria) }}" method="POST" id="delete-form">
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
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div>
