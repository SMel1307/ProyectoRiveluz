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
        'name' => 'Nuevo',
    ],
]">

@livewire('admin.productos.producto-create')

</x-admin-layaout>