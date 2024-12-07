<x-app-main>
    <header class="bg-gray-900 text-white p-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('images/logo.png') }}" alt="Logo MesaYa" class="h-10">
            <h1 class="text-2xl font-bold">MesaYa</h1>
        </div>
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Registrarse</a>
        </div>
    </header>

    <main class="py-12 grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-7xl mx-auto">
        <!-- Sección Izquierda -->
        <div class="space-y-8">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">¿Qué es MesaYa?</h2>
                <p>
                    MesaYa es una plataforma que te permite reservar mesas en los mejores restaurantes
                    de tu ciudad de manera rápida y sencilla. Explora restaurantes, revisa menús, y reserva tu mesa en minutos.
                </p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                <div class="flex flex-col space-y-4">
                    <div id="ventaja-cliente" class="bg-blue-100 p-4 rounded-lg shadow-sm">
                        <h3 class="font-bold text-lg">Ventajas para Clientes</h3>
                        <p>
                            Como cliente, podrás explorar cientos de restaurantes, ver reseñas, reservar al instante
                            y recibir notificaciones para confirmar tu reserva.
                        </p>
                    </div>
                    <div id="ventaja-restaurante" class="bg-green-100 p-4 rounded-lg shadow-sm">
                        <h3 class="font-bold text-lg">Ventajas para Restaurantes</h3>
                        <p>
                            Registra tu restaurante y aumenta la visibilidad en la plataforma. Gestiona tus reservas
                            y obtén estadísticas valiosas sobre tus clientes.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección Derecha con Carrusel -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Explora Restaurantes</h2>
            <div id="carouselExampleIndicators" class="relative" data-carousel="static">
                <div class="relative h-56 overflow-hidden rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                    <!-- Carrusel Items -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://via.placeholder.com/800x400?text=Restaurante+1" alt="Restaurante 1" class="absolute block w-full">
                        <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-black p-4">
                            <h3>Restaurante 1</h3>
                            <p>Comida Mexicana</p>
                        </div>
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://via.placeholder.com/800x400?text=Restaurante+2" alt="Restaurante 2" class="absolute block w-full">
                        <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-black p-4">
                            <h3>Restaurante 2</h3>
                            <p>Comida Italiana</p>
                        </div>
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://via.placeholder.com/800x400?text=Restaurante+3" alt="Restaurante 3" class="absolute block w-full">
                        <div class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-black p-4">
                            <h3>Restaurante 3</h3>
                            <p>Comida Japonesa</p>
                        </div>
                    </div>
                </div>
                <!-- Controles -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
                        <svg aria-hidden="true" class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
                        <svg aria-hidden="true" class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-white text-center py-4">
        <p>&copy; 2024 MesaYa. Todos los derechos reservados.</p>
    </footer>

    <script src="{{ asset('flowbite/flowbite.min.js') }}"></script>
</x-app-main>
