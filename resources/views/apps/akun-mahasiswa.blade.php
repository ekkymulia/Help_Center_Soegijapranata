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
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Mahasiswa</li>
                    </ol>
                </div>
                <h4 class="page-title">Manajemen Mahasiswa</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="mb-0" id="total_laporan">{{ $widget[0] }}</h4>
                                <p class="text-muted text-truncate mb-0 mt-2">Total Mahasiswa</p>
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


        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('akun-mahasiswa.create') }}" class="btn btn-primary btn-sm mb-3">Tambah Akun</a>
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>NIM</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mahasiswa as $m)
                                <tr>
                                    <th>{{ $m->name }}</th>
                                    <th>{{ $m->email }}</th>
                                    <th>{{ $m->nim }}</th>
                                    <td><a href="{{ route('akun-mahasiswa.edit', $m->id) }}" class="btn btn-primary btn-sm">Detail</a></td>
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

@endsection

@section('script')
@vite(['resources/js/pages/demo.inbox.js', 'resources/js/pages/demo.datatable-init.js'])
@endsection