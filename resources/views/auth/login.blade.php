<x-app-main>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-6 lg:px-8">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
            <div class="text-center mb-6">
                <img src="{{ asset('images/logo.png') }}" alt="Logo MesaYa" class="h-16 mx-auto">
                <h1 class="text-2xl font-bold text-gray-900 mt-2">Iniciar Sesión</h1>
                <p class="mt-2 text-sm text-gray-600">Accede a tu cuenta para disfrutar de nuestros servicios.</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Campo de Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('email')
                        <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Campo de Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('password')
                        <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Recordar Sesión -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                            Recordarme
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Botón de Enviar -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Iniciar Sesión
                    </button>
                </div>
            </form>

            <!-- Enlace para Registrarse -->
            <p class="mt-6 text-center text-sm text-gray-600">
                ¿No tienes una cuenta?
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Regístrate ahora
                </a>
            </p>
        </div>
    </div>
</x-app-main>
