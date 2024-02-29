<x-admin-layaout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Productos',
        'route' => route('admin.productos.index'),
    ],
    [
        'name' => $producto->nombrepro,
    ],
]">

@livewire('admin.productos.producto-edit',['producto'=> $producto])

</x-admin-layaout>