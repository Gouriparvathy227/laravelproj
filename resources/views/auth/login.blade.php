<x-guest-layout>
    <div class="space-y-6">
        <section class="rounded-2xl bg-gradient-to-r from-indigo-600 via-blue-600 to-sky-500 p-6 text-white shadow-lg">
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-indigo-100">Welcome Back</p>
            <h1 class="mt-2 text-2xl font-semibold leading-tight">Login to Continue</h1>
            <p class="mt-2 text-sm text-indigo-100">Students, faculty, and admin users can access the portal from here.</p>
        </section>

        <x-auth-session-status class="rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-2 text-sm text-emerald-700" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="font-medium text-slate-700" />
                <x-text-input
                    id="email"
                    class="mt-1 block w-full rounded-lg border-slate-300 bg-white px-3 py-2 text-sm"
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
                <x-input-label for="password" :value="__('Password')" class="font-medium text-slate-700" />
                <x-text-input
                    id="password"
                    class="mt-1 block w-full rounded-lg border-slate-300 bg-white px-3 py-2 text-sm"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between gap-3">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-slate-600">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm font-medium text-indigo-700 hover:text-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 rounded-md" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <x-primary-button class="w-full justify-center rounded-lg bg-indigo-600 py-2.5 text-sm normal-case tracking-normal hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800">
                {{ __('Log in') }}
            </x-primary-button>
        </form>

        <section class="rounded-2xl border border-indigo-100 bg-indigo-50 p-5">
            <h2 class="text-sm font-semibold uppercase tracking-[0.12em] text-indigo-800">Create Account</h2>
            <p class="mt-2 text-sm text-indigo-900">New to the portal? Create your account here and start accessing notices, admissions updates, and dashboard features.</p>
            <a
                href="{{ route('register') }}"
                class="mt-4 inline-flex w-full items-center justify-center rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-indigo-700 ring-1 ring-indigo-200 transition hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
            >
                {{ __('Create Account') }}
            </a>
        </section>
    </div>
</x-guest-layout>
