<x-guest-layout title="Login">

    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{ session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
    @endif
    @if (session('invalid'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{ session('invalid')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>   
    @endif
    <x-auth-card>

        <!-- Session Status -->
        {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email')}}" autofocus>
                {{-- <x-input id="email" class="@error('email') is-invalid @enderror" type="email" name="email" :value="old('email')" autofocus /> --}}
                @error('email')
                <div class="invalid-feedback">
                    {{ $message ?? ''}}
                </div>
                @enderror
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
                {{-- <x-input id="password" class="" type="password" name="password" 
                    autocomplete="current-password" /> --}}
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message ?? ''}}
                    </div>
                    @enderror
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
