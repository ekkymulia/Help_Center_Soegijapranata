@extends('layouts.vertical', ['page_title' => 'Detail Akun', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Akun</a></li>
                            <li class="breadcrumb-item active">Detail Akun</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Detail Akun</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <!-- <img src="/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image"> -->

                        <h4 class="mb-1 mt-2">{{ $akun->name }}</h4>
                        <p class="text-muted">{{ $akun->role->name }}</p>

                        <div class="text-start mt-2">
                            @if($akun->nim != null)
                            <p class="text-muted mb-2"><strong>NIM :</strong> <span class="ms-2">{{ $akun->nim }}</span></p>
                            @endif
                            @if($akun->level != null)
                            <p class="text-muted mb-2"><strong>Jabatan :</strong> <span class="ms-2">{{ $akun->level == 1 ? 'Pimpinan' : 'Karyawan' }}</span></p>
                            @endif
                        </div>

                        <form action="{{ 
                            session('role') == 2 ? 
                                route('akun-mahasiswa.destroy', $akun->id) : 
                            (session('role') > 2 ? 
                                route('akun-cs.destroy', $akun->id) : 
                                '') 
                        }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Hapus Akun</button>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->

            </div> <!-- end col-->

            <div class="col-xl-8 col-lg-7">
            <div class="card text">
                    <div class="card-body text-center">
                        @if(isset($akun))
                        <form class="mt-3 text-start" method="POST" action="{{ 
                            session('role') == 2 ? 
                                route('akun-mahasiswa.update', ['akun_mahasiswa' => $akun->id]) : 
                            (session('role') > 2 ? 
                                route('akun-cs.update', ['akun_cs' => $akun->id]) : 
                                '') 
                        }}">
                        @method('PUT')
                        @else
                        <form class="mt-3 text-start" method="POST" action="{{ 
                            session('role') == 2 ? 
                                route('akun-mahasiswa.store') : 
                            (session('role') > 2 ? 
                                route('akun-cs.store') : 
                                '') 
                        }}">
                        @endif
                            @csrf
                            <div class="mb-1">
                                <label for="full-name" class="form-label text-center">Nama Lengkap:</label>
                                <input type="text" class="form-control" name="name" id="full-name" value="{{ isset($akun) ? $akun->name : '' }}">
                            </div>
                            @if(session('role') == 1)
                            <div class="mb-1">
                                <label for="full-name" class="form-label text-center">Role:</label>
                                <select name="role" class="form-control form-select" id="">
                                    <option value="">Pilih Role</option>
                                    @foreach($role as $r)
                                    <option value="{{ $r->id }}" {{ isset($akun) && $akun->role->id == $r->id ? 'selected' : '' }}>{{ $r->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            @if($akun->role_id == 2)
                            <div class="mb-1">
                                <label for="full-name" class="form-label text-center">NIM:</label>
                                <input type="text" class="form-control" name="nim" id="full-name" value="{{ isset($akun) ? $akun->nim : '' }}">
                            </div>
                            @endif
                            @if($akun->role_id > 2)
                            <div class="mb-1">
                                <label for="full-name" class="form-label text-center">Jabatan:</label>
                                <select name="level" class="form-control form-select" id="">
                                    <option value="">Pilih Jabatan</option>
                                    <option value="1" {{ isset($akun) && $akun->level == 1 ? 'selected' : '' }}>Pimpinan</option>
                                    <option value="2" {{ isset($akun) && $akun->level == 2 ? 'selected' : '' }}>Karyawan</option>
                                </select>
                            </div>
                            @endif
                            <div class="mb-1">
                                <label for="email" class="form-label text-center">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ isset($akun) ? $akun->email : '' }}">
                            </div>
                            <div class="mb-1">
                                <label for="password" class="form-label text-center">Password:</label>
                                <input type="text" class="form-control" id="password" name="password" value="">
                            </div>
                            <!-- <div class="mb-3">
                                <label for="profile-image" class="form-label text-center">Detail Akun Image:</label>
                                <input type="file" class="form-control" id="profile-image">
                            </div> -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div> <!-- end card-body -->

                </div> <!-- end card -->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div>
    <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.profile.js'])
@endsection
