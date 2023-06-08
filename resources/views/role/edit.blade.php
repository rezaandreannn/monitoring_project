<x-admin-layout title="Edit Role">
    <section class="section">
        <div class="section-header">
            <h1>Edit Role</h1>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-7 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('superadmin.role.update', $role->id)}}" method="post" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12 col-md-8 col-sm-12">
                                    <div class="row">
                                        <!-- input role name -->
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Role Name<span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="name"
                                                    value="{{ old('name', $role->name)}}">
                                                <div class="invalid-feedback">

                                                </div>
                                            </div>
                                        </div>
                                        <!-- input guard name -->
                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="mb-1">Guard Name<span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" name="guard_name" value="web"
                                                    readonly>
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
</x-admin-layout>
