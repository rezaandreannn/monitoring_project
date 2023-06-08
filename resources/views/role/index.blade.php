<x-app-layout title="Manage Role">
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <x-a-link-create href="{{ route('role.create')}}">Add Role</x-a-link-create>
                <div class="section-header-breadcrumb">
                    @foreach ($breadcrumbs as $title => $url)
                    <div class="breadcrumb-item"><a href="{{ $url ?? ''}}">{{ $title ?? ''}}</a></div>
                    @endforeach
                    <div class="breadcrumb-item">DataTabel</div>
                </div>
            </div>

            <div class="section-body">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Guard Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->guard_name}}</td>
                                        <td> {{ date('Y/m/d', strtotime($role->created_at)) }} </td>
                                        <td>
                                            <x-a-link-edit href="{{ route('role.edit', $role->id)}}">
                                            </x-a-link-edit>
                                            <x-button-delete action="{{ route('role.destroy', $role->id)}}">
                                            </x-button-delete>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('css-library')

    @endpush

    @push('js-library')

    @endpush

    @push('js-spesific')
    <script>
        $(document).ready(function () {
            $('.delete').submit(function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });

    </script>

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
    @endpush

</x-app-layout>
