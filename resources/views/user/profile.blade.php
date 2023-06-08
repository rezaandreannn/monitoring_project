<x-admin-layout title="Profile">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ auth()->user()->full_name}}!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    @if (session('success-profile'))
                    <div class="alert alert-warning alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session('success-profile') }}
                        </div>
                    </div>

                    @endif
                    {{-- card image --}}
                    <div class="card">
                        <form action="{{ route('change.profile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>image<span class="text-danger">*</span></label>
                                        <img class="preview img-fluid mb-2 col-sm-5">

                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('image') is-invalid @enderror"
                                                name="image" id="image" onchange="Preview()">
                                            <label class="custom-file-label" for="image">Choose
                                                file</label>
                                        </div>
                                        @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ old('email', $user->email)}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Fullname</label>
                                            <input type="text"
                                                class="form-control @error('full_name') is-invalid @enderror"
                                                name="full_name" value="{{ old('full_name', $user->full_name)}}">
                                            @error('full_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Username</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name', $user->name)}}"
                                                onkeydown="return event.key != ' '">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Jabatan</label>
                                            <input type="text" class="form-control" name="jabatan"
                                                value="{{ old('jabatan', $user->jabatan)}}" disabled>
                                            <div class="invalid-feedback">
                                                Please fill in the first name
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Domisili Pabrik</label>
                                            <input type="text" class="form-control" name="domisili_pabrik"
                                                value="{{ old('domisili_pabrik', $user->domisili_pabrik)}}" disabled>
                                            <div class="invalid-feedback">
                                                Please fill in the last name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>No NPP</label>
                                            <input type="number"
                                                class="form-control @error('no_npp') is-invalid @enderror" name="no_npp"
                                                value="{{ old('no_npp', $user->no_npp)}}"
                                                onkeydown="return event.key != ' '">
                                            @error('no_npp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>


                                        <div class="form-group col-md-6 col-12">
                                            <label>Phone Number</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        +62
                                                    </div>
                                                </div>
                                                <input type="text"
                                                    class="form-control phone-number @error('phone') is-invalid @enderror"
                                                    name="phone" value="{{old('phone', substr($user->phone, 3))}}"
                                                    placeholder="">
                                                @error('phone')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                            <small class="">phone format( <span class="text-primary">82398997890</span>
                                                )</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <x-button>Save Changes</x-button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card">
                    <form action="{{ route('change.password')}}" method="post" novalidate="">
                        @csrf
                        <div class="card-header">
                            <h4>Change Password</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group  col-12">
                                    <label>Current Password</label>
                                    <input type="password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        name="current_password">
                                    @error('current_password')
                                    <div class="invalid-feedback">
                                        {{ $message}}
                                    </div>

                                    @enderror
                                </div>
                                <div class="form-group  col-12">
                                    <label>New Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group  col-12">
                                    <label>New Password Confirmation</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    @push('js-spesific')
    @if (session('success'))
    <script>
        var success = "{{ session('success')}}";
        Swal.fire({
            title: 'Success',
            text: success,
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        });

    </script>
    @endif

    @if (session('success-profile'))
    <script>
        var success = "{{ session('success-profile')}}";
        Swal.fire({
            title: 'Success',
            text: success,
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        });

    </script>
    @endif
    @endpush
</x-admin-layout>
