<x-guest-layout>
    <div class="containerRegistro">
        <section>
            <h2><b>INGRESA UN NUEVO USUARIO</b></h2>
        </section>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Correo Electronico')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="numero_documento" :value="__('Numero Documento')" />
                <x-text-input id="numero_documento" class="block mt-1 w-full" type="number" name="numero_documento" :value="old('numero_documento')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('numero_documento')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Contraseña')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirme su Contraseña')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-4" >
                <label for="user_type">Tipo de Usuario</label>
                <select name="user_type" id="user_type" class="form-control" required style="border-radius: 20px">
                    <option value="admin">Admin</option>
                    <option value="superuser">Superusuario</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Agregar Usuario') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <style>
            form{
                padding: 10px;
                border-radius: 10px;
                background-color: #dbdcdd;
            }
/*             .containerInicio {
                padding: 10px;
                background-color: #2a6f97;
                border-radius: 10px;
                box-shadow: 0 5px 8px rgba(0, 0, 1, 0.8);
            } */
            .containerRegistro {
                padding: 10px;
                background-color: #a9aaaa;
                border-radius: 10px;
                box-shadow: 0 5px 8px rgba(0, 0, 1, 0.8);
            }

            h2 {
                display: flex;
                justify-content: center;
            }
    </style>
</x-guest-layout>
