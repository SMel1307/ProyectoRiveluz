<x-admin-layaout :breadcrumbs="[
    [
        'name'=> 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name'=> 'Familias',
        'route' => route('admin.familias.index'),
],
[
    'name'=> 'Nuevo ',
]

]">  

<div class="card">

    <form action="{{route('admin.familias.store')}}" method="POST">
        @csrf
        <x-validation-errors class="mb-4"/>
        <div class="mb-4">
            <x-label class="mb-2">Nombre</x-label>
            <x-input class="w-full" placeholder="Ingrese el nombre de la Familia" name="nombrefam" value="{{old('nombrefam')}}"/>
        </div>
        <div class="flex justify-end">
            <x-button>Guardar</x-button>
        </div>
    </form>
</div>

  </x-admin-layaout>    