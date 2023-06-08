<x-app-layout>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <x-a-link-create> Add {{ $title}}</x-a-link-create>
                <div class="section-header-breadcrumb">
                    @foreach ($breadcrumbs as $judul => $url)
                    <div class="breadcrumb-item"><a href="{{ $url ?? ''}}">{{ $judul ?? ''}}</a></div>
                    @endforeach
                    <div class="breadcrumb-item">DataTabel</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ $title ?? config('app.name')}}</h2>
                <p class="section-lead">
                    Menampilkan semua data {{ $title ?? ''}}.
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
                                                <th>{{ ucwords('title')}}</th>
                                                <th>{{ ucwords('description')}}</th>
                                                <th>{{ ucwords('project')}}</th>
                                                <th>{{ ucwords('assign')}}</th>
                                                <th>{{ ucwords('start date')}}</th>
                                                <th>{{ ucwords('end date')}}</th>

                                                <th>{{ ucwords('aksi')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($formations as $formation) --}}
                                            <tr>
                                                <td style="width: 5%">
                                                    1
                                                </td>
                                                <td style="width: 15%">emr</td>
                                                <td style="width: 30%">menghilangkan menu pendaftaran</td>
                                                <td style="width: 10%">
                                                    <div class="badge badge-warning">software</div>
                                                </td>
                                                <td style="width: 10%">it</td>
                                                <td style="width: 10%">2023/06/17</td>
                                                <td style="width: 10%">2023/06/18</td>

                                                <td style="width: 25%">
                                                    <x-a-link-edit></x-a-link-edit>
                                                    <x-button-delete></x-button-delete>
                                                </td>
                                            </tr>
                                            {{-- @endforeach --}}
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


    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data {{ $title ?? ''}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('schedule.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Formasi <i><small class="required-label"></small></i>
                            </label>
                            <input type="text" name="name" class="form-control" required="">
                            <div class="valid-feedback">

                            </div>
                            <div class="invalid-feedback">
                                <i>Input nama formasi wajib diisi.</i>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" id="buttonAdd" class="btn btn-primary" disabled>Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    {{-- @foreach ($formations as $formation)
    <div class="modal fade" id="editModal{{ $formation->id }}" tabindex="-1" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data {{ $title ?? ''}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('formation.update', $formation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Formasi <i><small class="required-label"></small></i>
                        </label>
                        <input type="text" name="name" class="form-control" value="{{ $formation->name }}" required="">
                        <div class="valid-feedback">

                        </div>
                        <div class="invalid-feedback">
                            <i>Input nama formasi wajib diisi.</i>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="description">{{ $formation->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" id="buttonUpdate" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    @endforeach --}}

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
