<div>
    <form wire:submit="store">
        <figure class="mb-4  relative">

            <div class="absolute top-8 right-8">
                <label class="flex items-center px-4 py-2 rounded-lg bg-white cursor-pointer text-gray-700">
                    <i class="fas fa-camera mr-2"></i>
                    Actualizar Imagen

                    <input type="file" class="hidden" accept="image/*" wire:model="image">
                </label>
            </div>
            <img class="aspect-[1/1] object-cover object-center w-full"
                src="{{ $image ? $image->temporaryUrl() : Storage::url($productoEdit['imagen']) }}" alt="">
        </figure>

        <x-validation-errors class="mb-4" />

        <div class="card">
            <div class="mb-4">
                <x-label class="mb-1">
                    Codigo
                </x-label>
                <x-input wire:model="productoEdit.codigopro" class="w-full"
                    placeholder="Por favor ingrese el codigo del producto" />
            </div>

            <div class="mb-4">
                <x-label class="mb-1">
                    Nombre
                </x-label>
                <x-input wire:model="productoEdit.nombrepro" class="w-full"
                    placeholder="Por favor ingrese el nombre del producto" />
            </div>
            <div class="mb-4">
                <x-label class="mb-1">
                    Descripcion
                </x-label>
                <x-textarea wire:model="productoEdit.descripcion" class="w-full"
                    placeholder="Por favor ingrese la descripcion del producto"></x-textarea>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Familias
                </x-label>
                <x-select class="w-full" wire:model.live="familia_id">

                    <option value="" disabled>
                        Seleccione una Familia
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
                <x-select class="w-full" wire:model.live="categoria_id">

                    <option value="" disabled>
                        Seleccione una Categoria
                    </option>


                    @foreach ($this->categorias as $categoria)
                        <option value="{{ $categoria->id }}">
                            {{ $categoria->nombrecat }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label class="mb-2">
                    Subcategorias
                </x-label>
                <x-select class="w-full" wire:model.live="productoEdit.subcategoria_id">

                    <option value="" disabled>
                        Seleccione una subcategoria
                    </option>


                    @foreach ($this->subcategorias as $subcategoria)
                        <option value="{{ $subcategoria->id }}">
                            {{ $subcategoria->nombresub }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-label class="mb-2">
                    Precio Unitario
                </x-label>
                <x-input type="number" step="0.01" wire:model="productoEdit.p_unit" class="w-full"
                    placeholder="Por favor ingrese el precio del producto" />

            </div>
            <div class="flex justify-end">
                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>

                <x-button>
                    Actualizar Producto
                </x-button>
            </div>

        </div>

    </form>

    <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST" id="delete-form">
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
</div>
