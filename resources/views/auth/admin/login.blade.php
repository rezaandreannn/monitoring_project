<x-guest-layout title="Login">
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />


                <x-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <div class="float-right">
                    @if (Route::has('password.request'))
                    <a href="{{ route('admin.password.request') }}" class="text-small">
                        forgot Password?
                    </a>
                    @endif
                </div>
                <x-input id="password" class="" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="mt-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label text-sm">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Sign In
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
