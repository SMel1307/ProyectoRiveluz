@php
    $links = [
        [
            'icon' => 'fa-solid fa-gauge',
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'name' => 'Familias',
            'icon' => 'fa-solid fa-box-open',
            'route' => route('admin.familias.index'),
            'active' => request()->routeIs('admin.familias.*'),
        ],
        [
            'name' => 'Categorias',
            'icon' => 'fa-solid fa-tags',
            'route' => route('admin.categorias.index'),
            'active' => request()->routeIs('admin.categorias.*'),
        ],
        [
            'name' => 'Subategorias',
            'icon' => 'fa-solid fa-tag',
            'route' => route('admin.subcategorias.index'),
            'active' => request()->routeIs('admin.subcategorias.*'),
        ],
        [
            'name' => 'Productos',
            'icon' => 'fa-solid fa-box',
            'route' => route('admin.productos.index'),
            'active' => request()->routeIs('admin.productos.*'),
        ],
    ];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-[100dvh] pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    :class="{
        'translate-x-0 ease-out': sidebarOpen,
        '-translate-x-0 full ease-in': !sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['route'] }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-100' : '' }}">
                        <span class="inline-flex w-6 h-6 justify-center items-center"><i
                                class="{{ $link['icon'] }} text-gray-500"></i></span>
                        <span class="ms-2">{{ $link['name'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
