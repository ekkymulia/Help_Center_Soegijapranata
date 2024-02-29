@extends('layouts.vertical', ['page_title' => 'File Manager', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <!-- Tambahkan CSS jika diperlukan -->
@endsection

@section('content')
    <!-- Start Content -->
    <div class="container-fluid">

        <!-- Start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Attex</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                            <li class="breadcrumb-item active">File Manager</li>
                        </ol>
                    </div>
                    <h4 class="page-title">File Manager</h4>
                </div>
            </div>
        </div>
        <!-- End page title -->

        <div class="row">

            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Left sidebar -->
                        <div class="page-aside-left">

                            <div class="btn-group d-block mb-2">
                                <button type="button" class="btn btn-success create-new" aria-haspopup="true" aria-expanded="false"><i class="ri-file-add-line"></i> Create New </button>
                            </div>
                            <div class="email-menu-list mt-3">
                                <a href="#" class="list-group-item border-0 my-files"><i class="ri-folders-line fs-18 align-middle me-2"></i>My Files</a>
                            </div>

                        </div>
                        <!-- End Left sidebar -->

                        <div class="page-aside-right" id="file-upload-section" style="display: none;">

                            <div class="d-lg-flex justify-content-between align-items-center">
                                <div class="app-search">
                                    <form>
                                        <div class="mb-2 position-relative">
                                            <input type="text" class="form-control" placeholder="Search files...">
                                            <span class="ri-search-line search-icon"></span>
                                        </div>
                                    </form>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-sm btn-light"><i class="ri-list-check"></i></button>
                                    <button type="submit" class="btn btn-sm"><i class="ri-grid-fill"></i></button>
                                </div>
                            </div>

                            <div class="mt-1">
                                <div class="container-fluid">
                                    <!-- Start page title -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="page-title-box">
                                                <h4 class="page-title">File Uploads</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End page title -->

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="header-title">Dropzone File Upload</h4>
                                                    <p class="text-muted fs-14">
                                                        DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews.
                                                    </p>

                                                    <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                                                        <div class="fallback">
                                                            <input name="file" type="file" multiple />
                                                        </div>

                                                        <div class="dz-message needsclick">
                                                            <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                                            <h3>Drop files here or click to upload.</h3>
                                                            <span class="text-muted fs-13">(This is just a demo dropzone. Selected files are
                                                                <strong>not</strong> actually uploaded.)</span>
                                                        </div>
                                                    </form>

                                                    <!-- Preview -->
                                                    <div class="dropzone-previews mt-3" id="file-previews"></div>

                                                </div>
                                                <!-- End card-body -->
                                            </div>
                                            <!-- End card -->
                                        </div>
                                        <!-- End col -->
                                    </div>
                                    <!-- End row -->
                                    
                                </div>
                                <!-- End container -->

                                <!-- File preview template -->
                                <div class="d-none" id="uploadPreviewTemplate">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                                                    <p class="mb-0" data-dz-size></p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="" class="btn btn-link btn-lg text-danger" data-dz-remove>
                                                        <i class="ri-close-line"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End .mt-1 -->

                            <div class="mt-2">
                                <p>
                                    my file test
                                </p>

                            </div>
                        </div>

                        <div class="page-aside-right" id="my-file-test-section" style="display: none;">

                            <div class="mt-2">
                                <p>
                                    my file test
                                </p>

                            </div>
                        </div>
                        <!-- End page-aside-right -->
                    </div>
                    <!-- End card-body -->
                    <div class="clearfix"></div>
                </div> <!-- End card -->
            </div> <!-- End col -->
        </div> <!-- End row -->
    </div> <!-- End container -->
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const createNewBtn = document.querySelector('.create-new');
            const myFilesLink = document.querySelector('.my-files');
            const fileUploadSection = document.getElementById('file-upload-section');
            const myFileTestSection = document.getElementById('my-file-test-section');

            createNewBtn.addEventListener('click', function () {
                fileUploadSection.style.display = 'block';
                myFileTestSection.style.display = 'none';
            });

            myFilesLink.addEventListener('click', function () {
                fileUploadSection.style.display = 'none';
                myFileTestSection.style.display = 'block';
            });
        });
    </script>
    @vite(['resources/js/pages/component.fileupload.js'])
@endsection
