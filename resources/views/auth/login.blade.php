<x-guest-layout>
    <x-auth-session-status class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-700" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-slate-700" />
            <x-text-input
                id="email"
                class="mt-1 w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" class="text-slate-700" />
            <x-text-input
                id="password"
                class="mt-1 w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between text-sm">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-blue-700 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-slate-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-blue-700 hover:text-blue-900" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <button type="submit" class="w-full bg-blue-700 text-white py-2 rounded-lg hover:bg-blue-800 focus:ring-2 focus:ring-blue-400">
            {{ __('Log in') }}
        </button>
    </form>
</x-guest-layout>
