<div x-data="{
    open:false,
}">
    <header class="bg-purple-600">

        <x-container class="px-4 py-4">
            <div class="flex justify-between items-center space-x-8">

                <button class="text-3xl" x-on:click="open = true">
                    <i class="fas fa-bars text-white"></i>
                </button>


                <h1 class="text-white">
                    <a href="/" class="inline-flex flex-col items-end">
                        <span class="text-2xl md:text-3xl leading-4 md:leading-6 font-semibold">
                            RIVELUZ
                        </span>
                        <span class="text-xs">
                            Importadora
                        </span>
                    </a>
                </h1>
                <div class="flex-1 hidden md:block">
                    <x-input class="w-full" placeholder="Buscar por producto" />
                </div>
                <div class=" flex items-center space-x-4 md:space-x-8">

                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-2xl md:text-3xl">
                                <i class="fas fa-user text-white"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-2">
                                <div class="flex justify-center">
                                    <a href="{{route('login')}}" class="btn btn-purple">
                                    Iniciar Sesión
                                    </a>
                                </div>
                                <p class="text-sm text-center mt-2">
                                    ¿No tienes cuenta? <a href="{{registro}}" class="text-purple-600 hover:underline">Registrate</a>
                                </p>
                            </div>
                        </x-slot>
                    </x-dropdown>

                    
                    <button class="text-2xl md:text-3xl">
                        <i class="fas fa-shopping-cart text-white"></i>
                    </button>
                </div>

            </div>

            <div class="mt-4 md:hidden">
                <x-input class="w-full" placeholder="Buscar por producto" />
            </div>
        </x-container>



    </header>

    <div x-show="open" x-on:click= "open = false" style="display: none"   class="fixed top-0 left-0 inset-0 bg-black bg-opacity-25">
        <div x-show="open" style="display: none"   class="fixed top-0 left-0 z-20">

            <div class="flex">


                <div class="w-screen md:w-80 h-screen bg-white">
                    <div class="bg-purple-600 px-4 py-3 text-white font-semibold">
                        <div class="flex justify-between items-center">

                            <span class="text-lg">
                                hola

                            </span>
                            <button x-on:click= "open = false">
                                <i class="fas fa-times">

                                </i>
                            </button>
                        </div>
                    </div>
                    <div class="h-[calc(100vh-52px)] bg-green-200 overflow-auto">
                        <ul>
                            @foreach ($familias as $familia)
                                <li wire:mouseover="$set('familia_id', {{ $familia->id }})">
                                    <a href=""
                                        class="flex items-center justify-between px-4 py-4 text-gray-700 hover:bg-purple-200">
                                        {{ $familia->nombrefam }}
                                        <i class="fa-solid fa-angle-right">

                                        </i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="w-80 xl:w-[57rem] pt-[52px] hidden md:block ">
                    <div class="bg-white h-[calc(100vh-52px)] overflow-auto px-6 py-8">

                        <div class="mb-8 flex justify-between items-center">
                            <p class="border-b-[3px] border-lime-400 uppercase text-xl font-semibold pb-1">
                                {{$this->familiaNombre}}
                            </p>
                            <a href="" class="btn btn-purple">Ver todo</a>
                        </div>
                        <ul class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                            @foreach ($this->categorias as $categoria)
                               <li >
                                <a href="" class="text-purple-600 font-semibold text-lg">
                                    {{$categoria->nombrecat}}
                                </a>
                                <ul class="mt-4 space-y-2">
                                    @foreach ($categoria->subcategoria as $subcategoria)
                                        <li>
                                            <a href="" class="text-sm text-gray-700 hover:text-purple-600">
                                                {{$subcategoria->nombresub}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                               </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
