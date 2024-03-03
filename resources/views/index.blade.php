@extends('layouts.vertical', ['page_title' => 'Analytics Dashboard', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
@vite(['node_modules/daterangepicker/daterangepicker.css',
'node_modules/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css'])
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
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container-fluid">
        <div class="row">
        <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body text-center">
                            <h4 class="card-title">Selamat Datang!</h4>
                            <div>
                                <a href="" class="logo logo-light">
                                    <span class="logo-lg">
                                        <img src="/images/logo.png" alt="logo" width="140" height="125">
                                    </span>
                                    <span class="logo-sm">
                                        <img src="/images/logo-sm1.png" alt="small logo">
                                    </span>
                                </a>

                                <!-- Brand Logo Dark -->
                                <a href="" class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="/images/logo-dark.png" alt="logo" width="140" height="125">
                                    </span>
                                    <span class="logo-sm">
                                        <img src="/images/logo-sm.png" alt="small logo">
                                    </span>
                                </a>
                            </div>
                            <h4>Di Help Center Soegijapranata Catholic University</h4>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-12 col-md-12">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">Total Data Pelaporan</h4>
                                <h4 class="mb-0" id="total_laporan">{{ $widget[0] }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">Total Sedang Dikerjakan</h4>
                                <h4 class="mb-0" id="total_laporan">{{ $widget[1] }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">Total Telah Dikerjakan</h4>
                                <h4 class="mb-0" id="total_laporan">{{ $widget[2] }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">Total Ditangani AI</h4>
                                <h4 class="mb-0" id="total_laporan">{{ $widget[3] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          
        </div>
        <!-- end row -->

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

@endsection

@section('script')
@vite(['resources/js/pages/demo.dashboard-analytics.js'])
@endsection
