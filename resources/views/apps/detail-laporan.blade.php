@extends('layouts.vertical', ['page_title' => 'Chat', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaduan</a></li>
                            <li class="breadcrumb-item active">Detail akun</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Detail Pengaduan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <!-- start chat users-->
            <div class="col-xl-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <!-- <img src="/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image"> -->

                        @if(isset($laporan))
                        <h4 class="mb-1 mt-2">{{ isset($laporan) ? $laporan->judul : '' }}</h4>
                        <p class="text-muted">Status: {{ isset($laporan) ? ucfirst($laporan->status_layanan) : '' }}</p>
                        @else
                        <h4 class="mb-1 mt-2">Pengaduan Baru</h4>
                        <input type="text" class="form-control" name="judul" placeholder="Masukan Pengaduanmu" id="newpeng">
                        @endif

                        @if(session('role') != 2)
                            @if(isset($laporan) && $laporan->takeover_id == null)
                                <button type="button" id="takeover" onclick="takeover('{{ isset($laporan) ? $laporan->id : '' }}')" class="btn btn-success btn-sm mb-2">Takeover</button>
                            @endif
                            @if(isset($laporan) && $laporan->is_active == 1)
                                <button type="button" id="akhiripeng" onclick="akhiripeng('{{ isset($laporan) ? $laporan->id : '' }}')" class="btn btn-danger btn-sm mb-2">Akhiri Pengaduan</button>
                            @elseif(isset($laporan) && $laporan->is_active == 0)
                                <button type="button"  id="akhiripeng" onclick="akhiripeng('{{ isset($laporan) ? $laporan->id : '' }}')" class="btn btn-success btn-sm mb-2">Buka Konversasi</button>
                            @endif
                        @endif

                        <div class="text-start mt-3">
                            <h4 class="fs-13 text-uppercase">Deskripsi Pengaduan :</h4>
                            @if(isset($laporan))
                            <p class="text-muted mb-3">
                                {{ isset($laporan) ? $laporan->deskripsi : '' }}
                            </p>
                            <p class="text-muted mb-2"><strong>Topik :</strong> <span class="ms-2">{{ isset($laporan) ? $laporan->topik->nama : '' }}</span></p>
                            @else
                            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Masukan Deskripsi Pengaduanmu"></textarea>
                            
                            <p class="text-muted mt-3 mb-2"><strong>Topik :</strong></p>
                            <select name="topik" class="form-control form-select" id="topik">
                                <option value="1">Pilih Topik</option>
                                @foreach($topik as $t)
                                <option value="{{ $t->id }}">{{ $t->nama }}</option>
                                @endforeach
                            </select>

                            <button type="button" id="submitpeng" class="btn btn-primary btn-sm mt-2  float-end">Submit</button>
                            @endif


                            @if(isset($laporan))
                            <p class="text-muted mb-2"><strong>Sedang ditangani oleh :</strong><span class="ms-2">{{ isset($laporan) && isset($laporan->takeover) ? ucfirst($laporan->takeover->name) : "Chatbot" }}</span></p>
                            @endif
                             <!--  <p class="text-muted mb-2"><strong>Email :</strong> <span class="ms-2 ">user@email.domain</span></p>

                            <p class="text-muted mb-1"><strong>Location :</strong> <span class="ms-2">USA</span></p> -->
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end chat users-->

            <!-- chat area -->
            <div class="col-xl-8 col-lg-8" id="chatarea">
                <div class="card">
                    <div class="card-body py-2 px-3 border-bottom border-light">
                        <div class="row justify-content-between py-1">
                            <div class="col-sm-7">
                                <div class="d-flex align-items-start">
                                    <img src="/images/users/avatar-1.jpg" class="me-2 rounded-circle" height="36" alt="Brandon Smith">
                                    <div>
                                        <h5 class="my-0 font-15">
                                            <a href="{{ route('second', ['pages', 'profile']) }}" class="text-reset">{{ isset($laporan) ? ucfirst( $laporan->user->name) : '' }}</a>
                                        </h5>
                                        <p class="mt-1 mb-0 text-muted fs-12">
                                            Diajukan: {{ isset($laporan) ? $laporan->created_at : '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul id="chatList" class="conversation-list p-3" data-simplebar  data-simplebar-auto-hide="false" style="max-height: 520px; overflow: scroll">


                        </ul>

                        <div class="row">
                            <div class="col">
                                <div class="bg-light p-3 rounded">
                                    <form class="needs-validation" method="POST" action="{{ route('message-history.store') }}" novalidate="" name="chat-form" id="chat-form">
                                        @csrf
                                        <input type="hidden" name="tiket_id" value="{{ isset($laporan) ? $laporan->id : 'new' }}">
                                        <div class="row">
                                            <div class="col mb-2 mb-sm-0">
                                                <input type="text" name="message" {{ isset($laporan) && $laporan->is_active == 0 ? 'disabled' : '' }} class="form-control border-0" placeholder="Enter your text" required="" />
                                                <div class="invalid-feedback">
                                                    Masukkan Pesan Anda
                                                </div>
                                            </div>
                                            <div class="col-sm-auto">
                                                <div class="btn-group"> 
                                                    <button type="submit" {{ isset($laporan) && $laporan->is_active == 0 ? 'disabled' : '' }} class="btn btn-success chat-send w-100"><i class="ri-send-plane-2-line"></i></button>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row-->
                                    </form>
                                </div>
                            </div>
                            <!-- end col-->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-body -->
                </div> <!-- end card -->
            </div>
            <!-- end chat area-->

        </div> <!-- end row-->

    </div> <!-- container -->
@endsection

@section('script')
    @vite(['resources/js/pages/demo.profile.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.5/simplebar.min.js" type="javascript"></script>
    <script>
        var chatList = new SimpleBar(document.getElementById('chatList'));
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    function takeover(id) {
        $.ajax({
            url: "{{ route('takeover', ['id' => ':id']) }}".replace(':id', id),
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "takeover_id": "{{session('role')}}"
            },
            dataType: 'json', // Specify the expected data type
            success: function(response) {
                alert("Takeover success!");
                $('#training').html('<i class="ri-file-settings-line"></i> Mulai Training');
                $('#training').prop('disabled', false);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Gagal Takeover, harap coba lagi.");
                $('#training').prop('disabled', false);
                $('#training').html('<i class="ri-file-settings-line"></i> Mulai Training');
            }
        });
    }

    function akhiripeng(id) {
        $.ajax({
            url: "{{ route('akhiripeng', ['id' => ':id']) }}".replace(':id', id),
            method: 'GET',
            dataType: 'json', // Specify the expected data type
            success: function(response) {
                alert("Status berubah!");
                $('#training').html('<i class="ri-file-settings-line"></i> Mulai Training');
                $('#training').prop('disabled', false);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Gagal mengganti status, harap coba lagi.");
                $('#training').prop('disabled', false);
                $('#training').html('<i class="ri-file-settings-line"></i> Mulai Training');
            }
        });
    }
</script>

@if(!isset($laporan))
<script>
    $('#chatarea').hide();

    $('#submitpeng').click(function(){
        var judul = $('#newpeng').val();
        var deskripsi = $('#deskripsi').val();
        var topik = $('#topik').val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: "{{ route('pengaduan.store') }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                judul: judul,
                deskripsi: deskripsi,
                topik: topik,
            },
            dataType: 'json', // Specify the expected data type
            success: function(response) {
                if(response.status == 'success'){
                    $('#chatarea').show()
                    var chatList = $('#chatList');
                    chatList.empty();

                    $('#submitpeng').hide();
                    $('#newpeng').replaceWith('<span class="form-control">' + judul + '</span>');
                    $('#deskripsi').replaceWith('<span class="form-control">' + deskripsi + '</span>');
                    $('#topik').replaceWith('<span class="form-control">' + $('#topik option:selected').text() + '</span>');
                    $('#chatDetails').append('<p class="text-muted mb-2"><strong>Sedang ditangani oleh :</strong><span class="ms-2">{{ isset($laporan) && isset($laporan->takeover) ? $laporan->takeover->name : "Chatbot" }}</span></p>');

                    
                    // chatList.append(messageHtml);
                    window.location.href = `{{ route('pengaduan.edit', ':id') }}`.replace(':id', response.tiket_id);

                }
               
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>
@endif

<script>
        // Function to fetch chat data
        function fetchChatData() {
            let lapid = "{{ isset($laporan) ? $laporan->id : '' }}";

            if (lapid != '') {
                $.ajax({
                    url: `{{ route("message-history.show", ":id") }}`.replace(':id', lapid), 
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        // Assuming data is an array of chat messages
                        updateChatUI(data);
                    },
                    error: function (error) {
                        console.error('Error fetching chat data:', error);
                    }
                });
            }else{
                // var chatList = $('#chatList');
                // chatList.empty();
                // var messageHtml = `
                //     <li class="clearfix">
                //         <div class="conversation-text">
                //             <div class="ctext-wrap">
                //                 <i>Chatbot - Chatbot</i>
                //                 <p>Halo, Salam Cinta Kasih {{ ucfirst(session('user_name')) }}. Terima Kasih karena sudah melapor, Laporan kamu tentang ${judul} sudah kami terima, sementara itu biarkan saya bantu kamu dulu ya!</p>
                //             </div>
                //         </div>
                //     </li>
                //     <li class="clearfix">
                //         <div class="conversation-text">
                //             <div class="ctext-wrap">
                //                 <i>Chatbot - Chatbot</i>
                //                 <p>Apakah boleh diceritakan lebih lanjut tentang permasalahan yang kamu hadapi?</p>
                //             </div>
                //         </div>
                //     </li>
                // `;
                // chatList.append(messageHtml);
            }
            
        }

        var rendered = 0;

        // Function to update the chat UI with new messages
        function updateChatUI(messages) {
            if(rendered === 1){
                return;
            }
            rendered++
            var chatList = $('#chatList');
            let session = "{{ session('user_id') }}";
            var intromsg = 0;
            var messageHtmlArray = [];

            if(messages.length === 0){
                chatList.append((`
                    <li class="clearfix">
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Chatbot - Chatbot</i>
                                <p>Halo, Salam Cinta Kasih {{ ucfirst(session('user_name')) }}. Terima Kasih karena sudah melapor, Laporan kamu tentang {{ isset($laporan) ? $laporan->judul : ''}} sudah kami terima, sementara itu biarkan saya bantu kamu dulu ya!</p>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Chatbot - Chatbot</i>
                                <p>Apakah boleh diceritakan lebih lanjut tentang permasalahan yang kamu hadapi?</p>
                            </div>
                        </div>
                    </li>
                `));
                intromsg++;
                return;
            }


            // Append new messages
            $.each(messages, function (index, message) {
                var liClass = message.sender_id == session ? 'clearfix odd' : 'clearfix';

                if (intromsg === 0) {
                    intromsg++;
                    messageHtmlArray.push(`
                        <li class="clearfix">
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Chatbot - Chatbot</i>
                                    <p>Halo, Salam Cinta Kasih {{ ucfirst(session('user_name')) }}. Terima Kasih karena sudah melapor, Laporan kamu tentang {{ isset($laporan) ? $laporan->judul : ''}} sudah kami terima, sementara itu biarkan saya bantu kamu dulu ya!</p>
                                </div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="conversation-text">
                                <div class="ctext-wrap">
                                    <i>Chatbot - Chatbot</i>
                                    <p>Apakah boleh diceritakan lebih lanjut tentang permasalahan yang kamu hadapi?</p>
                                </div>
                            </div>
                        </li>
                    `);
                }

                messageHtmlArray.push(`
                    <li class="${liClass}">
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>${message.sender.name} - ${message.sender.role.name}</i>
                                <p>${message.chat}</p>
                            </div>
                        </div>
                    </li>
                `);
            });

            // Join the array and append to chatList

            chatList.append(messageHtmlArray.join(''));
        }


        // Fetch chat data on document ready
        $(document).ready(function () {
            fetchChatData();
        });
    </script>

       
@endsection
