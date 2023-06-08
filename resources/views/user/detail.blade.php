<x-admin-layout title="Detail">
    <section class="section">
        <x-breadcrumb title="Detail User">
            {{-- @foreach ($breadcrumbs as $breadcrumb => $url)
                <div class="breadcrumb-item"><a class="text-decoration-none"
                        href="{{ $url }}">{{ $breadcrumb }}</a></div>
            @endforeach --}}
        </x-breadcrumb>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                <li class="media">
                                    <div class="media-body">
                                        {{-- <div class="media-right">
                                            <div class="text-primary">Aktif</div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-5">Full Name</div>
                                                    <div class="col-7">: {{ $user->full_name }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">Username</div>
                                                    <div class="col-7">: {{ $user->name }}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">Email</div>
                                                    <div class="col-7">: {{ $user->email }}</div>
                                                </div>
                                                @if ($user->phone)
                                                <div class="row">
                                                    <div class="col-5">Phone</div>
                                                    <div class="col-7">: {{$user->phone}}</div>
                                                </div>
                                                @endif
                                                @if ($user->no_npp)
                                                <div class="row">
                                                    <div class="col-5">No NPP</div>
                                                    <div class="col-7">: {{$user->no_npp}}</div>
                                                </div>
                                                @endif
                                                @if ($user->jabatan)
                                                <div class="row">
                                                    <div class="col-5">Jabatan</div>
                                                    <div class="col-7">: {{$user->jabatan}}</div>
                                                </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-5">Created at</div>
                                                    <div class="col-7">:
                                                        {{ date('Y/m/d', strtotime($user->created_at))}}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-5">Updated at</div>
                                                    <div class="col-7">:
                                                        {{ date('Y/m/d', strtotime($user->updated_at))}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="modal-footer">
                                <x-a-link-back href="{{ route('superadmin.user.index') }}"></x-a-link-back>
                                <x-a-link-edit href="{{ route('superadmin.user.edit', $user->id) }}"></x-a-link-edit>
                                <x-button-delete action="{{ route('superadmin.user.destroy', $user->id)}}">
                                </x-button-delete>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-user-lock"></i> User Role</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>Role Name</th>
                                        <th class="text-center">Access</th>
                                    </tr>

                                    @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name}}</td>
                                        <td class="align-middle text-center p-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-roles="mygroup"
                                                    class="custom-control-input role" data-user="<?= $user->id ?>"
                                                    data-role="<?= $role->id ?>" id="role-<?= $role->id ?>"
                                                    {{$user->hasRole($role->name) ? 'checked' : ''}}>
                                                <label for="role-<?= $role->id ?>"
                                                    class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-user-lock"></i> Module Permissions</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>Permission Name</th>
                                        <th class="text-center">Access</th>
                                    </tr>

                                    @foreach ($modulePermissions as $modulePermission)
                                    <tr>
                                        <td>{{ $modulePermission->name}}</td>
                                        <td class="align-middle text-center p-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input permission" data-user="<?= $user->id ?>"
                                                    data-permission="<?= $modulePermission->id ?>"
                                                    id="checkbox-<?= $modulePermission->id ?>"
                                                    @if($user->can($modulePermission->name))
                                                checked
                                                @endif>
                                                <label for="checkbox-<?= $modulePermission->id ?>"
                                                    class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fas fa-user-lock"></i> Pabrik Permissions</h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>Permission Name</th>
                                        <th class="text-center">Access</th>
                                    </tr>

                                    @foreach ($pabrikPermissions as $pabrikPermission)
                                    <tr>
                                        <td>{{ $pabrikPermission->name}}</td>
                                        <td class="align-middle text-center p-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input permission" data-user="<?= $user->id ?>"
                                                    data-permission="<?= $pabrikPermission->id ?>"
                                                    id="checkbox-<?= $pabrikPermission->id ?>"
                                                    @if($user->can($pabrikPermission->name))
                                                checked
                                                @endif>
                                                <label for="checkbox-<?= $pabrikPermission->id ?>"
                                                    class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">

            </div>
        </div>
    </section>

    @push('css-library')

    @endpush

    @push('js-library')

    @endpush

    @push('js-spesific')
    {{-- user permission --}}
    <script>
        $(document).ready(function () {
            $(".permission").click(function () {
                var userId = $(this).data('user');
                var permissionId = $(this).data('permission');
                var status = $(this).is(':checked');
                var action = ""

                if (status) {
                    action = "insert"
                } else {
                    action = "delete"
                }

                $.ajax({
                    url: "{{ route('superadmin.user.managePermission')}}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        permissionId: permissionId,
                        userId: userId,
                        action: action
                    },
                    success: function (data) {
                        iziToast.success({
                            title: 'Success!',
                            message: data.success,
                            position: 'bottomRight'
                        });
                    }
                });
            });
        });

    </script>

    {{-- user role --}}
    <script>
        $(document).ready(function () {
            $("[data-roles]").each(function () {
                var me = $(this),
                    group = me.data('roles'),
                    userId = me.data('user'),
                    roleId = me.data('role');


                me.click(function () {
                    var status = $(this).is(':checked');
                    var action = "";

                    if (status) {
                        action = "insert"
                    } else {
                        action = "delete"
                    }

                    $.ajax({
                        url: "{{ route('superadmin.user.manageRole')}}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            roleId: roleId,
                            userId: userId,
                            action: action
                        },
                        success: function (data) {
                            iziToast.success({
                                title: 'Success!',
                                message: data.success,
                                position: 'bottomRight'
                            });
                        }
                    });

                })

            });
        });

    </script>
    @endpush
</x-admin-layout>
