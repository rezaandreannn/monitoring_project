<x-guest-layout title="Login Admin">
    <x-auth-card>
        {{-- <x-slot name="logo">
            <a href="/" class="d-flex justify-content-center mb-4">
                <x-application-logo width=64 height=64 />
            </a>
        </x-slot> --}}

        {{-- <img alt="image" src="{{ asset('stisla/assets/img/asita.png') }}" class="rounded-circle mr-1" width="70px"> --}}

        {{-- <div class="card-header justify-content-center">
            <h4>Login</h4>
        </div> --}}


        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login.admin') }}">
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
                        <a href="{{ route('password.request') }}" class="text-small">
                            forgot Password?
                        </a>
                    @endif
                </div>
                <x-input id="password" class="" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
