<x-app-layout>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <x-a-link-create href="{{ route('planning.create')}}">Tambah</x-a-link-create>
                <div class="section-header-breadcrumb">
                    @foreach ($breadcrumbs as $title => $url)
                    <div class="breadcrumb-item"><a href="{{ $url ?? ''}}">{{ $title ?? ''}}</a></div>
                    @endforeach
                    <div class="breadcrumb-item">DataTabel</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ $title ?? config('app.name')}}</h2>
                <p class="section-lead">
                    Menampilkan semua data formasi.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">{{ ucwords('No')}}</th>
                                                <th>{{ ucwords('Nama User')}}</th>
                                                <th>{{ ucwords('Judul Project')}}</th>
                                                <th>{{ ucwords('Deskripsi')}}</th>
                                                <th>{{ ucwords('Kategori')}}</th>
                                                <th>{{ ucwords('Tanggal Mulai')}}</th>
                                                <th>{{ ucwords('Tanggal Selesai')}}</th>
                                                <th>{{ ucwords('Update By')}}</th>
                                                <th>{{ ucwords('Update At')}}</th>
                                                <th>{{ ucwords('aksi')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plannings as $planning)
                                            <tr>
                                                <td style="width: 5%">
                                                    {{ $loop->iteration}}
                                                </td>
                                                <td style="width: 20%">{{ $planning->user_id}}</td>
                                                <td style="width: 30%">{{ $planning->title}}</td>
                                                <td style="width: 15%">{{ $planning->description}}</td>
                                                <td style="width: 15%">{{ $planning->category}}</td>
                                                <td style="width: 15%">{{ $planning->start_date}}</td>
                                                <td style="width: 15%">{{ $planning->end_date}}</td>
                                                <td style="width: 15%">{{ $planning->updated_by}}</td>
                                                <td style="width: 15%">
                                                    {{ date('Y/m/d', strtotime($planning->updated_at))}}</td>
                                                <td style="width: 25%">
                                                    <x-a-link-edit href="{{ route('planning.edit', $planning->id) }}">
                                                    </x-a-link-edit>
                                                    <x-button-delete
                                                        action="{{ route('planning.destroy', $planning->id)}}">
                                                    </x-button-delete>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    {{-- css library --}}
    @push('css-libraries')
    <link rel="stylesheet"
        href="{{ asset('stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
    @endpush

    {{-- css spesific --}}
    @push('css-spesific')
    <style>
        .required-label {
            position: relative;
        }

        .required-label::before {
            content: '*required';
            position: absolute;
            top: -4px;
            color: red;
        }

    </style>
    @endpush

    @push('js-libraries')
    <script src="{{ asset('stisla/node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    @endpush

    @push('js-spesific')
    <script src="{{ asset('stisla/assets/js/page/modules-datatables.js')}}"></script>

    <script>
        $(document).ready(function () {
            // Event listener untuk input change
            $('input[name="name"]').on('input', function () {
                var nameInput = $(this);
                var name = nameInput.val();

                if (name.trim() === '') {
                    nameInput.removeClass('is-valid').addClass('is-invalid');
                    $('#buttonAdd').prop('disabled', true);
                    $('#buttonUpdate').prop('disabled', true);
                } else {
                    nameInput.removeClass('is-invalid').addClass('is-valid');
                    $('#buttonAdd').prop('disabled', false);
                    $('#buttonUpdate').prop('disabled', false);
                }
            });
        });

    </script>

    @endpush

</x-app-layout>
