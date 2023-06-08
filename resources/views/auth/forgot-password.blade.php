<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="d-flex justify-content-center mb-4">
                <x-application-logo width=64 height=64 />
            </a>
        </x-slot>

        <div class="text-muted">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <div class="mb-4 mt-1 d-flex">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="cekforgot" id="email" value="email">
                <label class="form-check-label" for="email">
                    With Email
                </label>
            </div>
            <div class="form-check ml-3">
                <input class="form-check-input" type="radio" name="cekforgot" id="phone" value="phone">
                <label class="form-check-label" for="phone">
                    With No HP
                </label>
            </div>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div id="tampil-email" class="tampil-email">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="" type="email" name="email" :value="old('email')" required
                        autofocus />
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <x-button>
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </div>

        <div id="tampil-phone" class="tampil-phone">
            
            <form method="POST" action="{{ route('password.otp') }}" id="phone">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="phone" :value="__('Phone')" />

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+62</div>
                        </div>
                        <input type="text" name="phone" class="form-control currency">
                    </div>
                </div>


                <div class="d-flex justify-content-end mt-4">
                    <x-button>
                        {{ __('Phone Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-auth-card>

    @push('js-guest')
        <script>
            $("#tampil-phone").css("display", "none");
            $("#tampil-email").css("display", "none");

            $("#phone").click(function() {
                $(".tampil-phone").slideDown("fast");
                $("#tampil-email").css("display", "none");
            });

            $("#email").click(function() {
                $(".tampil-email").slideDown("fast");
                $("#tampil-phone").css("display", "none");
            });
        </script>
    @endpush
</x-guest-layout>
