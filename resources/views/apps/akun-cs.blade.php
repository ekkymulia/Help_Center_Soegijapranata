@extends('layouts.vertical', ['page_title' => 'Email Inbox', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
@vite([
'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css',
'node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css',
'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css',
'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css',
'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css',
'node_modules/quill/dist/quill.core.css',
'node_modules/quill/dist/quill.snow.css'
])
@endsection

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('any', 'analytics') }}">Home</a></li>
                        <li class="breadcrumb-item active">CS</li>
                    </ol>
                </div>
                <h4 class="page-title">Akun CS</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0" id="total_laporan">{{ $widget[0] }}</h4>
                                <p class="text-muted text-truncate mb-0 mt-2">Total Akun</p>
                            </div>
                            <div class="avatar-sm">
                                <div class="avatar-title rounded bg-soft-primary">
                                    <i class="bi bi-files h2 mb-0 text"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0" id="laporan_selesai">0</h4>
                                <p class="text-muted text-truncate mb-0 mt-2">Laporan Selesai</p>
                            </div>
                            <div class="avatar-sm">
                                <div class="avatar-title rounded bg-soft-primary">
                                    <i class="bi bi-check-square h2 mb-0 text-"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0" id="sedang_ditangani">0</h4>
                                <p class="text-muted text-truncate mb-0 mt-2">Sedang Ditangani</p>
                            </div>
                            <div class="avatar-sm">
                                <div class="avatar-title rounded bg-soft-primary">
                                    <i class="bi bi-search h2 mb-0 text"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0" id="belum_ditangani">0</h4>
                                <p class="text-muted text-truncate mb-0 mt-2">Belum Ditangani</p>
                            </div>
                            <div class="avatar-sm">
                                <div class="avatar-title rounded bg-soft-primary">
                                    <i class="bi bi-file-earmark h2 mb-0 text"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Divisi</th>
                                    <th>Jabatan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($akun as $m)
                                <tr>
                                    <td>{{ $m->name }}</td>
                                    <td>{{ $m->email }}</td>
                                    <td>{{ $m->role->name }}</td>
                                    <td>{{ $m->level == 1 ? 'Pimpinan' : 'Karyawan' }}</td>
                                    <td><a href="{{ route('akun-mahasiswa.edit', $m->id) }}" class="btn btn-primary btn-sm">Detail</a></td>
                                </tr>
                                @endforeach                              
                            </tbody>
                        </table>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->

        <!--  successfully modal  -->
        <div id="success-btn" class="modal fade" tabindex="-1" aria-labelledby="success-btnLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="bx bx-check-circle display-1 text-success"></i>
                            <h4 class="mt-3">Laporan baru berhasil dibuat</h4>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!--  Extra Large modal example -->
        <div class="modal fade new-customer" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

</div> <!-- container -->


<!-- Compose Modal -->
<div id="compose-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="compose-header-modalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="compose-header-modalLabel">New Message</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="p-1">
                <div class="modal-body px-3 pt-3 pb-0">
                    <form>
                        <div class="mb-2">
                            <label for="msgto" class="form-label">To</label>
                            <input type="text" id="msgto" class="form-control" placeholder="Example@email.com">
                        </div>
                        <div class="mb-2">
                            <label for="mailsubject" class="form-label">Subject</label>
                            <input type="text" id="mailsubject" class="form-control" placeholder="Your subject">
                        </div>
                        <div class="write-mdg-box mb-3">
                            <label class="form-label">Message</label>
                            <div id="snow-editor" style="height: 200px;">
                                <h3>This is a simple editable area.</h3>
                                <p>
                                    End of simple area
                                </p>
                            </div><!-- end Snow-editor-->
                        </div>
                    </form>
                </div>
                <div class="px-3 pb-3">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i
                            class="ri-send-plane-2-line me-1"></i> Send Message</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('script')
@vite(['resources/js/pages/demo.inbox.js', 'resources/js/pages/demo.datatable-init.js'])
@endsection