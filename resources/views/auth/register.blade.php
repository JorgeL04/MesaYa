<x-app-main>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-6 lg:px-8">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg">
            <div class="text-center mb-6">
                <img src="{{ asset('images/logo.png') }}" alt="Logo MesaYa" class="h-16 mx-auto">
                <h1 class="text-2xl font-bold text-gray-900 mt-2">Registrarse</h1>
                <p class="mt-2 text-sm text-gray-600">Elige tu tipo de cuenta y completa tus datos para unirte a MesaYa.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Nombre -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <div class="mt-1">
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('name')
                        <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Correo Electrónico -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('email')
                        <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Teléfono (Opcional) -->
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono (Opcional)</label>
                    <div class="mt-1">
                        <input id="telefono" name="telefono" type="text" value="{{ old('telefono') }}"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <!-- Tipo de Cuenta -->
                <div>
                    <label for="tipo_usuario" class="block text-sm font-medium text-gray-700">Tipo de Cuenta</label>
                    <div class="mt-1">
                        <select id="tipo_usuario" name="tipo_usuario" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="cliente" {{ old('tipo_usuario') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                            <option value="restaurante" {{ old('tipo_usuario') == 'restaurante' ? 'selected' : '' }}>Restaurante</option>
                        </select>
                        @error('tipo_usuario')
                        <span class="text-sm text-red-500 mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Contraseña -->
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

                <!-- Confirmar Contraseña -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                    <div class="mt-1">
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <!-- Botón de Enviar -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Registrarse
                    </button>
                </div>
            </form>

            <!-- Enlace para Iniciar Sesión -->
            <p class="mt-6 text-center text-sm text-gray-600">
                ¿Ya tienes una cuenta?
                <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Inicia Sesión aquí
                </a>
            </p>
        </div>
    </div>
</x-app-main>
