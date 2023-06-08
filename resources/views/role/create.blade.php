<x-app-layout title="Create Role">
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

            <div class="section-body">
                <div class="col-12 col-md-7 col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('role.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-8 col-sm-12">
                                        <div class="row">
                                            <!-- input role name -->
                                            <div class="col-12">
                                                <div class="form-group mb-3">
                                                    <label class="mb-1">Role Name<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control @error('name') is-invalid @enderror"
                                                        type="text" name="name" value="">
                                                    @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>

                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- input guard name -->
                                            <div class="col-12">
                                                <div class="form-group mb-3">
                                                    <label class="mb-1">Guard Name<span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="guard_name"
                                                        value="web" readonly>
                                                </div>
                                            </div>

                                        </div>
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
</x-app-layout>
