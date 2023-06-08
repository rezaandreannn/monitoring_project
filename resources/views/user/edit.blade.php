<x-app-layout title="Edit User">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title ?? ''}}</h1>
                <div class="section-header-breadcrumb">
                    @foreach ($breadcrumbs as $judul => $url)
                    <div class="breadcrumb-item"><a href="{{ $url ?? ''}}">{{ $judul ?? ''}}</a></div>
                    @endforeach
                    <div class="breadcrumb-item">{{ $title ?? ''}}</div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('user.update', $user->id )}}" method="post" autocomplete="off">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12 col-md-6 col-sm-12">
                                        <label for="full_name">Full Name</label>
                                        <input id="full_name" type="text"
                                            class="form-control @error('full_name') is-invalid @enderror"
                                            name="full_name" value="{{ old('full_name', $user->full_name) }}" autofocus>
                                        @error('full_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6 col-sm-12">
                                        <label for="name">User Name</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $user->name) }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="email">Email</label>
                                        <input id="email" type="email"
                                            class="form-control  @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email', $user->email)}}" disabled>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <x-button>Submit</x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('css-library')
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/selectric/public/selectric.css') }}">
    @endpush

    @push('js-library')
    <script src="{{ asset('stisla/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
    @endpush

    @push('js-spesific')
    <script src="{{ asset('stisla/assets/js/page/forms-advanced-forms.js') }}"></script>

    @endpush
</x-app-layout>
