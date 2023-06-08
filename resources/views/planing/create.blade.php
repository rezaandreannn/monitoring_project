<x-app-layout title="{{ ucwords($title) ?? ''}}">
    <div class="main-content">
       
    <section class="section">
        <div class="section-header">
            <h1>{{ ucwords($title) ?? ''}}</h1>
        </div>

        <div class="section-body justify-center">
            <div class="col-12 col-md-7 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('planning.store')}}" method="post" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-8 col-sm-12">
                                    <div class="row">
                                        <!-- input permission name -->
                           

                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Nama User <code>*wajib diisi</code></label>
                                                <input class="form-control @error('user_id') is-invalid @enderror"
                                                    type="text" name="user_id" value="{{old('user_id')}}">
                                                @error('user_id')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Judul Project <code>*wajib diisi</code></label>
                                                <input class="form-control @error('title') is-invalid @enderror"
                                                    type="text" name="title" value="{{old('title')}}">
                                                @error('title')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Deskripsi Project <code>*wajib diisi</code></label>
                                               <textarea name="description" class="form-control @error('description') is-invalid @enderror"  value="{{old('description')}}"></textarea>
                                                @error('description')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Tanggal Mulai <code>*wajib diisi</code></label>
                                                <input class="form-control @error('start_date') is-invalid @enderror"
                                                    type="date" name="start_date" value="{{old('start_date')}}">
                                                @error('start_date')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Tanggal Selesai <code>*wajib diisi</code></label>
                                                <input class="form-control @error('end_date') is-invalid @enderror"
                                                type="date" name="end_date" value="{{old('end_date')}}">
                                                @error('end_date')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Kategori <code>*wajib diisi</code></label>
                                                <select name="category" id="category"
                                                class="select2 form-control selectric @error('category') is-invalid @enderror">

                                                <option selected disabled>-- Pilih Jenis Kategori --
                                                </option>
                                                
                                                <option value="hardware">Hardware</option>
                                                <option value="software">Software</option>
                                                    
                                            </select>
                                                @error('category')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                             
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Created By <code>*wajib diisi</code></label>
                                                <input class="form-control @error('created_by') is-invalid @enderror"
                                                    type="text" name="created_by" value="{{old('created_by')}}">
                                                @error('created_by')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Update By <code>*wajib diisi</code></label>
                                                <input class="form-control @error('updated_by') is-invalid @enderror"
                                                    type="text" name="updated_by" value="{{old('updated_by')}}">
                                                @error('updated_by')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                 
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('planning.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Kembali</a>
                                <x-button>Simpan</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    @stack('css-library')
    <link rel="stylesheet" href="{{ asset('stisla/node_modules/select2/dist/css/select2.min.css') }}">

    @push('js-library')
    <script src="{{ asset('stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>

    @endpush


</x-app-layout>
