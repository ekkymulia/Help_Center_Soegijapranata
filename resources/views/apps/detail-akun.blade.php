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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Attex</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                            <li class="breadcrumb-item active">Chat</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Chat</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <!-- start chat users-->
            <div class="col-xl-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img src="/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                        <h4 class="mb-1 mt-2">Tosha Minner</h4>
                        <p class="text-muted">Founder</p>

                        <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
                        <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>

                        <div class="text-start mt-3">
                            <h4 class="fs-13 text-uppercase">About Me :</h4>
                            <p class="text-muted mb-3">
                                Hi I'm Tosha Minner,has been the industry's standard dummy text ever since the
                                1500s, when an unknown printer took a galley of type.
                            </p>
                            <p class="text-muted mb-2"><strong>Full Name :</strong> <span class="ms-2">Tosha K. Minner</span></p>

                            <p class="text-muted mb-2"><strong>Mobile :</strong><span class="ms-2">(123)
                                    123 1234</span></p>

                            <p class="text-muted mb-2"><strong>Email :</strong> <span class="ms-2 ">user@email.domain</span></p>

                            <p class="text-muted mb-1"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end chat users-->

            <!-- chat area -->
            <div class="col-xl-8 col-lg-8">
                <div class="card">
                    <div class="card-body py-2 px-3 border-bottom border-light">
                        <div class="row justify-content-between py-1">
                            <div class="col-sm-7">
                                <div class="d-flex align-items-start">
                                    <img src="/images/users/avatar-1.jpg" class="me-2 rounded-circle" height="36" alt="Brandon Smith">
                                    <div>
                                        <h5 class="my-0 font-15">
                                            <a href="{{ route('second', ['pages', 'profile']) }}" class="text-reset">James Zavel</a>
                                        </h5>
                                        <p class="mt-1 mb-0 text-muted fs-12">
                                            <small class="ri-checkbox-blank-circle-fill text-danger"></small> Offline
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div id="tooltips-container">
                                    <a href="javascript: void(0);" class="text-reset fs-20 p-1 d-inline-block">
                                        <i class="ri-phone-line" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Voice Call"></i>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset fs-20 p-1 d-inline-block">
                                        <i class="ri-vidicon-line" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Video Call"></i>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset fs-20 p-1 d-inline-block">
                                        <i class="ri-group-line" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Users"></i>
                                    </a>
                                    <a href="javascript: void(0);" class="text-reset fs-20 p-1 d-inline-block">
                                        <i class="ri-delete-bin-line" data-bs-container="#tooltips-container" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Chat"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="conversation-list p-3" data-simplebar style="max-height: 520px;">
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" class="rounded" alt="James Z" />
                                    <i>10:00</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>James Z</i>
                                        <p>
                                            Hello!
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" class="rounded" alt="Geneva M" />
                                    <i>10:01</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Geneva M</i>
                                        <p>
                                            Hi, How are you? What about our next meeting?
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" class="rounded" alt="James Z" />
                                    <i>10:01</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>James Z</i>
                                        <p>
                                            Yeah everything is fine
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" class="rounded" alt="Geneva M" />
                                    <i>10:02</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Geneva M</i>
                                        <p>
                                            Wow that's great
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" alt="James Z" class="rounded" />
                                    <i>10:02</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>James Z</i>
                                        <p>
                                            Let's have it today if you are free
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" alt="Geneva M" class="rounded" />
                                    <i>10:03</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Geneva M</i>
                                        <p>
                                            Sure thing! let me know if 2pm works for you
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" alt="James Z" class="rounded" />
                                    <i>10:04</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>James Z</i>
                                        <p>
                                            Sorry, I have another meeting scheduled at 2pm. Can we have it at 3pm instead?
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" alt="James Z" class="rounded" />
                                    <i>10:04</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>James Z</i>
                                        <p>
                                            We can also discuss about the presentation talk format if you have some extra mins
                                        </p>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                            <li class="clearfix odd">
                                <div class="chat-avatar">
                                    <img src="/images/users/avatar-1.jpg" alt="Geneva M" class="rounded" />
                                    <i>10:05</i>
                                </div>
                                <div class="conversation-text">
                                    <div class="ctext-wrap">
                                        <i>Geneva M</i>
                                        <p>
                                            3pm it is. Sure, let's discuss about presentation format, it would be great to finalize today. I am attaching the last year format and assets here...
                                        </p>
                                    </div>
                                    <div class="card mt-2 mb-1 shadow-none border text-start">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-primary rounded">
                                                            .ZIP
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col ps-0">
                                                    <a href="javascript:void(0);" class="text-muted fw-bold">Attex-sketch.zip</a>
                                                    <p class="mb-0 text-muted">2.3 MB</p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                                        <i class="ri-download-2-line"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="conversation-actions dropdown">
                                    <button class="btn btn-sm btn-link fs-18" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-2-fill"></i></button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Copy Message</a>
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="row">
                            <div class="col">
                                <div class="bg-light p-3 rounded">
                                    <form class="needs-validation" novalidate="" name="chat-form" id="chat-form">
                                        <div class="row">
                                            <div class="col mb-2 mb-sm-0">
                                                <input type="text" class="form-control border-0" placeholder="Enter your text" required="" />
                                                <div class="invalid-feedback">
                                                    Please enter your messsage
                                                </div>
                                            </div>
                                            <div class="col-sm-auto">
                                                <div class="btn-group">
                                                    <a href="#" class="btn btn-light"><i class="ri-attachment-2"></i></a>
                                                    <button type="submit" class="btn btn-success chat-send w-100"><i class="ri-send-plane-2-line"></i></button>
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
@endsection
