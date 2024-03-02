@extends('layouts.vertical', ['page_title' => 'Konfigurasi AI ', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <!-- Tambahkan CSS jika diperlukan -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css"/>
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
                            <li class="breadcrumb-item"><a href="{{ route('any', 'analytics') }}">Home</a></li>
                            <li class="breadcrumb-item active">Konfigurasi AI</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Konfigurasi AI</h4>
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
                                <button type="button" class="btn btn-primary training_mode" aria-haspopup="true" aria-expanded="false"><i class="ri-brain-line"></i> Training Mode </button>
                            </div>

                            <div class="btn-group d-block mb-2">
                                <button type="button" class="btn btn-primary create-new" aria-haspopup="true" aria-expanded="false"><i class="ri-thunderstorms-line"></i> Add File </button>
                            </div>

                    

                            <div class="email-menu-list mt-3">
                                <a href="#" class="list-group-item border-0 my-files"><i class="ri-folders-line fs-18 align-middle me-2"></i>File Saya</a>
                            </div>

                        </div>
                        <!-- End Left sidebar -->

                        <div class="page-aside-right" id="file-upload-section" style="display: none;">
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
                                    <form action="{{ env('AI_API_LINK', null) }}/add-parameter"  method="post" class="dropzone" id="submitFileTraining" data-plugin="dropzone" data-previews-container="#file-previews" enctype="multipart/form-data" data-upload-preview-template="#uploadPreviewTemplate">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title">Upload File Training</h4>
                                                <p class="text-muted fs-14">
                                                    Tambahkan File baru untuk di training
                                                </p>

                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>

                                                    <div class="dz-message needsclick">
                                                        <i class="h1 text-muted ri-upload-cloud-2-line"></i>
                                                        <h3>Drop files here or click to upload.</h3>
                                                        <span class="text-muted fs-13">(This is just a demo dropzone. Selected files are
                                                            <strong>not</strong> actually uploaded.)</span>
                                                    </div>

                                                <!-- Preview -->
                                                <div class="dropzone-previews mt-3" id="file-previews"></div>

                                            </div>
                                            <!-- End card-body -->
                                        </div>

                                        <div class="btn-group d-block mb-2">
                                            <button type="submit" id="submitNewButton" class="btn btn-primary create-new" aria-haspopup="true" aria-expanded="false"><i class="ri-thunderstorms-line"></i> Submit File </button>
                                        </div>
                                        </form>

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
                        </div>

                        <div class="page-aside-right" id="my-file-test-section"  style="display: none;">

                            <div class="container-fluid">
                                    <!-- Start page title -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box">
                                            <h4 class="page-title">File Saya</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End page title -->

                                <table id="file-saya-asli" class="table table-striped  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Digunakan Testing</th>
                                            <th>Terakhir Dipakai</th>
                                            <th>Nama File Asli</th>
                                            <th>Ukuran</th>
                                        </tr>
                                    </thead>
                                    <tbody id="fsa-tbody">
                                        <tr>
                                            <td colspan="5">Loading, sedang menghubungkan koneksi ke server...</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="page-aside-right" id="training-mode-sectional">

                            <div class="container-fluid">
                                <!-- Start page title -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box">
                                            <h4 class="page-title">Training Mode</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- End page title -->

                                
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="header-title">Lakukan Training</h4>
                                        <p class="text-muted fs-14">
                                            Lakukan Tuning Chatbot
                                        </p>

                                        <div>
                                            <div class="">
                                                <button type="button" id="training" onclick="trainingstart()" class="btn btn-primary" aria-haspopup="true" aria-expanded="false"> <i class="ri-file-settings-line"></i> Mulai Training </button>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End col -->
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="header-title">Parameter Training</h4>
                                        <p class="text-muted fs-14">
                                            Bahan Latih Chatbot
                                        </p>

                                        <div>
                                            <table id="training-baru" class="table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Gunakan</th>
                                                        <th>Nama File</th>
                                                        <th>Ukuran File</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4">Loading, sedang menghubungkan koneksi ke server...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <!-- End col -->
                                </div>
                                <!-- End row -->

                                <br><br>

                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="header-title">Riwayat Training</h4>
                                        <p class="text-muted fs-14">
                                            Riwayat Training Tuning Chatbot Model
                                        </p>

                                        <div>
                                            <table id="riwayat-training" class="table table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Status</th>
                                                        <th>Waktu Training</th>
                                                        <th>File Yang Digunakan</th>
                                                        <th>Total Token</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="5">Loading, sedang menghubungkan koneksi ke server...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script> -->

<script>
    var apiLink_parameters = `{{ env('AI_API_LINK', null) }}` + '/parameters';
    var apiLink_training_history = `{{ env('AI_API_LINK', null) }}` + '/training-history';
    var apiLink_add_parameter = `{{ env('AI_API_LINK', null) }}` + '/add-parameter';
    var apiLink_delete_file = `{{ env('AI_API_LINK', null) }}` + '/delete-file';
    var apiLink_activate_param = `{{ env('AI_API_LINK', null) }}` + '/activate-parameter';
    var apiLink_training_start = `{{ env('AI_API_LINK', null) }}` + '/train-model';
</script>
<script>
    $(document).ready(function () {

        // $('#file-saya-asli').DataTable({
        //     ajax: {
        //         url: apiLink,
        //         type: "GET",
        //     },
            
        //     columns: [
        //         { data: 'id' },
        //         { data: 'size' },
        //         { data: 'original_filename' },
        //         { data: 'unique_filename' },
        //         { data: 'is_trained' },
        //         { data: 'trained_at' }
        //     ],
        // });
        

        $('.create-new').click(function () {
            $('#file-upload-section').show();
            $('#my-file-test-section').hide();
            $('#training-mode-sectional').hide();
        });

        $('.my-files').click(function () {
            $('#file-upload-section').hide();
            $('#my-file-test-section').show();
            $('#training-mode-sectional').hide();
        });

        $('.training_mode').click(function () {
            $('#file-upload-section').hide();
            $('#my-file-test-section').hide();
            $('#training-mode-sectional').show();
        });
    });
</script>
<script>
    $.ajax({
        url: apiLink_parameters,
        type: 'GET',
        success: function(data) {
            $('#file-saya-asli tbody').empty();
            $('#training-baru tbody').empty();
            $.each(data, function(index, item) {
                var trainedStatus = item.is_trained ? 'Trained' : 'Not Trained';
                var trainedStatus2 = item.is_trained ? 'checked' : '';

                var trainedTime = item.trained_at ? new Date(item.trained_at).toLocaleString() : 'N/A';

                $('#file-saya-asli tbody').append('<tr>' +
                    '<td>' + (index + 1) + '</td>' +
                    '<td>' + trainedStatus + '</td>' +
                    '<td>' + trainedTime + '</td>' +
                    '<td>' + item.original_filename + '</td>' +
                    '<td>' + item.size + '</td>' +
                    '<td><button class="delete-btn btn btn-sm btn-danger" onclick="deleteFile(' + "'" + item.id + "'" + ')" data-file-id="' + item.id + '">Delete</button></td>' +
                    '</tr>');

                $('#training-baru tbody').append('<tr>' +
                    '<td>' + (index + 1) + '</td>' +
                    '<td id="tb-' + item.id + '"><button class="btn btn-sm ' + (item.is_trained ? 'btn-success' : 'btn-primary') + '" onclick="toggleUsage(' + "'" + item.id + "'" + ',' + "'" + item.is_trained + "'" + ')">' + (item.is_trained ? 'Dipakai' : 'Aktifkan') + '</button></td>' +
                    '<td>' + item.original_filename + '</td>' +
                    '<td>' + item.size + '</td>' +
                    '</tr>');
            });
        },
        error: function(error) {
            console.log(error);
        }
    });


    $.ajax({
        url: apiLink_training_history,
        type: 'GET',
        success: function(data) {
            $('#riwayat-training tbody').empty();
            $.each(data, function(index, item) {
                var trainedTime = item.trained_at ? new Date(item.trained_at).toLocaleString() : 'N/A';
                var files = item.files.split(',').join('<br>')

                $('#riwayat-training tbody').append('<tr>' +
                '<td>' + (index + 1) + '</td>' +
                '<td><span class="' + (item.is_success == 1 ? 'badge bg-success' : 'badge bg-danger') + '">' + (item.is_success == 1 ? 'Berhasil' : 'Kendala') + '</span></td>' +
                '<td>' + trainedTime + '</td>' +
                '<td>' + files + '</td>' +
                '<td>' + item.total_token + '</td>' +
            '</tr>');
            });
        },
        error: function(error) {
            console.log(error);
        }
    });

    var submitHandlerExecuted = false;

    $('#submitFileTraining').submit(function(e) {
        e.preventDefault();

        if (!submitHandlerExecuted) {
            submitHandlerExecuted = true;

            var formData = new FormData(this);

            $.ajax({
                url: apiLink_add_parameter,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    alert("Berhasil menambahkan file parameter!");
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert("Gagal mengupload file, harap coba lagi.");
                },
                complete: function() {
                    submitHandlerExecuted = false; // Reset the flag after the request is complete
                }
            });
        }
    });

    function deleteFile(id){
        // Get the file ID from the data attribute
        var fileId = id;

        // Call your delete endpoint here using fileId
        $.ajax({
            url: apiLink_delete_file + '/' + fileId,
            type: 'GET',
            success: function(response) {
                // Remove the table row if deletion is successful
                $(this).closest('tr').remove();
                window.location.reload();
                alert(response.message);
                
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                alert("Gagal menghapus file, harap coba lagi.");
            }
        });
    };

    function toggleUsage(id, status){
        var fileId = id;
        var status = status
        console.log(fileId, status)

        $.ajax({
            url: apiLink_activate_param,
            method: 'POST',
            data: JSON.stringify({
                fileId: fileId,
                mode: status == 'true' ? 'untrain' : 'train'
            }),
            contentType: 'application/json',  // Specify the content type as JSON
            success: function(response) {
                console.log(response);
                $(`#tb-${fileId} button`).removeClass().addClass(`btn btn-sm ${ status == 'false' ? 'btn-success' : 'btn-primary' }`).text(`${ status == 'false' ? 'Dipakai' : 'Aktifkan' }`);
                alert("Parameter Berhasil diubah!");
            },
            error: function(xhr, status, error) {
                $(`#tb-${fileId} button`).removeClass().addClass(`btn btn-sm ${ status == 'false' ? 'btn-success' : 'btn-primary' }`).text(`${ status == 'false' ? 'Dipakai' : 'Aktifkan' }`);
                console.error(xhr.responseText);
                alert("Gagal merubah parameter, harap coba lagi.");
            }
        });
    }

    function trainingstart(){

        $('#training').prop('disabled', true);
        $('#training').html(`<div class="spinner-border" role="status">
                </div>Memproses Training`);
        $.ajax({
            url: apiLink_training_start,
            method: 'GET',
          
            success: function(response) {
                alert("Training success!");
               
                $('#training').html(' <i class="ri-file-settings-line"></i> Mulai Training ');
                $('#training').prop('disabled', false);

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Gagal melatih model, harap coba lagi.");
                $('#training').prop('disabled', false);
                $('#training').html(' <i class="ri-file-settings-line"></i> Mulai Training ');


            }
        });
        
    }
</script>
@vite(['resources/js/pages/demo.datatable-init.js'])
@endsection
