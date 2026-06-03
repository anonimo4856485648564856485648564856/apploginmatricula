<x-guest-layout>
    <div style="text-align:center;margin-bottom:30px;">
        <div style="font-size:42px;margin-bottom:10px;">🎓</div>

        <h1 style="color:#7b1127;font-size:34px;font-weight:800;margin-bottom:6px;">
            Sistema Académico de Matrícula
        </h1>

        <p style="color:#6b7280;font-size:15px;">
            Plataforma institucional para la gestión de alumnos, cursos y matrículas
        </p>
    </div>

    <a href="{{ route('google.login') }}"
       style="display:flex;align-items:center;justify-content:center;gap:10px;background:#ffffff;color:#1f2937;border:1px solid #d1d5db;padding:13px;border-radius:12px;margin-bottom:20px;text-decoration:none;font-weight:700;box-shadow:0 4px 12px rgba(0,0,0,.08);">
        <span style="font-size:18px;">G</span>
        Continuar con Google
    </a>

    <div style="display:flex;align-items:center;gap:12px;margin:20px 0;color:#9ca3af;font-size:13px;">
        <div style="height:1px;background:#e5e7eb;flex:1;"></div>
        <span>Acceso con correo institucional</span>
        <div style="height:1px;background:#e5e7eb;flex:1;"></div>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" value="Correo electrónico" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email" name="email" :value="old('email')"
                          required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Contraseña" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password" name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-red-900 shadow-sm focus:ring-red-900"
                       name="remember">
                <span class="ms-2 text-sm text-gray-600">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a style="color:#7b1127;font-size:14px;font-weight:600;text-decoration:none;"
                   href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        <button type="submit"
                style="width:100%;margin-top:24px;background:#7b1127;color:white;padding:13px 20px;border-radius:12px;font-weight:800;letter-spacing:.3px;box-shadow:0 8px 18px rgba(123,17,39,.30);">
            Iniciar sesión
        </button>

        <div style="text-align:center;margin-top:22px;">
            <span style="color:#6b7280;">¿No tienes cuenta?</span>
            <a href="{{ route('register') }}"
               style="color:#7b1127;font-weight:800;text-decoration:none;">
                Crear cuenta
            </a>
        </div>
    </form>
</x-guest-layout>