<x-admin-layout title="Add User">
    <section class="section">
        <x-breadcrumb title="Add User">

        </x-breadcrumb>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('superadmin.user.store')}}" method="post" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="full_name">Full Name</label>
                                    <input id="full_name" type="text"
                                        class="form-control @error('full_name') is-invalid @enderror" name="full_name"
                                        value="{{ old('full_name') }}" autofocus>
                                    @error('full_name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="name">User Name</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-8">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control  @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email')}}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label>Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                +62
                                            </div>
                                        </div>
                                        <input type="text"
                                            class="form-control phone-number @error('phone') is-invalid @enderror"
                                            name="phone">
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">Password</label>
                                    <input id="password" type="password"
                                        class="form-control  @error('password') is-invalid @enderror pwstrength"
                                        data-indicator="pwindicator" name="password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password2" class="d-block">Password Confirmation</label>
                                    <input id="password2" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-divider">
                                Your More
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label>Jabatan</label>
                                    <input id="jabatan" type="text" class="form-control" name="jabatan"
                                        value="{{ old('jabatan')}}">
                                </div>
                                <div class="form-group col-4">
                                    <label>No NPP</label>
                                    <input id="no_npp" type="number"
                                        class="form-control  @error('no_npp') is-invalid @enderror" name="no_npp"
                                        value="{{old('no_npp')}}">
                                    @error('no_npp')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label>Domisili Pabrik</label>
                                    <select class="form-control selectric" name="domisili_pabrik">
                                        <option value="">-- select --</option>
                                        @foreach (App\Models\Pabrik::all() as $item)
                                        <option value="{{ $item->unique_name }}"
                                            {{ old('domisili_pabrik') == $item->unique_name ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="form-group col-4">
                                    <label>City</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div> --}}



                            <div class="modal-footer">
                                <x-button>Submit</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/selectric/public/selectric.css') }}">
    @endpush

    @push('js-library')
    <script src="{{ asset('stisla/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
    @endpush

    @push('js-spesific')
    <script src="{{ asset('stisla/assets/js/page/forms-advanced-forms.js') }}"></script>

    @endpush
</x-admin-layout>
