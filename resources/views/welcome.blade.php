<x-app-layout>
    
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @endpush
    <!-- Slider main container -->
    <div class="swiper mb-12">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach ($covers as $cover)
                <div class="swiper-slide">
                    <img src="{{$cover->image}}" class="w-full aspect-[3/1] object-cover object-center" alt="">
                </div>
            @endforeach

        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>
    
    
    <x-container>
        <h1 class="text-2xl font-bold text-gray-700 mb-4">
            Ultimos Productos
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($lastProducts as $producto)
                <article class="bg-white shadow rounded overflow-auto">
                    <img src="{{ $producto->image }}" class="w-full h-48 object-cover object-center">
                    <div class="p-4">
                        <h1 class="text-lg font-bold text-gray-700 line-clamp-2 min-h-[56px] mb-2">
                            {{ $producto->nombrepro }}
                        </h1>
                        <p class="text-gray-600  mb-4">
                            Bs. {{ $producto->p_unit }}
                        </p>
                        <a href="{{ route('productos.show', $producto) }}" class="btn btn-purple block w-full text-center">Ver más</a>
                    </div>
                </article>
            @endforeach
        </div>
    </x-container>

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
                // Optional parameters

                loop: true,

                autoplay: {
                    delay: 5000,
                },

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },


            });
        </script>
    @endpush

</x-app-layout>
