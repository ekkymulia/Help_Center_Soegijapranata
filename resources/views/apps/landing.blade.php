<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Help Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
    <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
    <meta content="Themesdesign" name="author" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo-sm1.png') }}">

    <!-- css -->
    <link href="{{ asset('landing/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('landing/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Slider-->
    <link rel="stylesheet" href="{{ asset('landing/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('landing/css/owl.theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('landing/css/owl.transitions.css') }}" />
    <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand logo text-uppercase" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" class="logo-light" alt="" height="30">
                <img src="{{ asset('images/logo-dark.png') }}" class="logo-dark" alt="" height="30">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto navbar-center" id="mySidenav">
                    <li class="nav-item">
                        <a href="#tentang" class="nav-link">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a href="#features" class="nav-link">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a href="#kontak" class="nav-link">Kontak</a>
                    </li>
                </ul>
                <div class="navbar-button">
                    <a href="" class="btn btn-sm btn-custom btn-round">Login</a>
                </div>

            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- START HOME -->
    <section class="bg-home-2" id="home">
        <div class="home-bg"></div>
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="text-center">
                                <h1 class="home-title-2 mt-5 pt-5">Help Center</h1>
                                <div class="button mt-4">
                                    <a href="halaman-tujuan.html" class="btn btn-outline btn-round mt-3">Tanya Sekarang <i class="mdi mdi-arrow-right"></i></a>
                                </div>                                

                               <div class="home-img-2">
                                    <img src="{{ asset('images/ai.png') }}" alt="" class="img-fluid rounded">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <!-- START FEATURES -->
    <section class="section bg-light" id="tentang">
        <div class="container">
            <div class="row vertical-content">
                <div class="col-lg-6">
                    <div class="features-img mt-4">
                        <img src="{{ asset('images/features/img-2.png') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="features-content mt-4">
                        <h4 class="title-heading line-height_1_4">Soegijapranata AI Help Center</h4>
                        <p class="text-muted mt-4">Soegijapranata AI Help Center adalah sebuah inovasi yang menghadirkan solusi efisien dan cepat dalam memberikan bantuan kepada mahasiswa dan stakeholders universitas. Dengan memanfaatkan teknologi AI, help center ini dapat memberikan layanan yang personal dan responsif dalam menangani berbagai pertanyaan, masalah, dan permintaan bantuan yang berkaitan dengan administrasi akademik, layanan kampus, dan informasi umum lainnya. Dengan dukungan AI, help center ini mampu melakukan tugas-tugas rutin secara otomatis, meningkatkan efisiensi operasional, dan menyediakan pengalaman pengguna yang lebih baik bagi seluruh komunitas universitas.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- END FEATURES -->

    <section class="section bg-light" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title-heading text-center">Fitur Utama</h1>
                </div>
            </div>

            <div class="row mt-4 py-5">
                <div class="col-lg-6">
                    <div class="features-img text-center mt-5">
                        <img src="{{ asset('images/features/img-8.png') }}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="features-content mt-5">
                        <h4 class="line-height_1_4 mt-3">Konfigurasi AI</h4>
                        <p class="text-muted mt-3">Fitur konfigurasi pada RAG Helpcenter memberikan fleksibilitas  untuk menyesuaikan dan mengelola asisten virtual sesuai dengan kebutuhan spesifik Soegijapranata Catholic University. Dengan fitur ini, dapat dengan mudah menentukan bahasa, tampilan antarmuka, serta konten yang relevan dengan mudah, memastikan bahwa chatbot dapat sepenuhnya mencerminkan identitas merek dan kebijakan Soegijapranata Catholic University. Selain itu, fitur konfigurasi RAG Helpcenter juga memungkinkan penyesuaian skenario percakapan, pembelajaran mesin, dan integrasi dengan sistem lain, memastikan adaptabilitas tinggi dan kinerja optimal untuk mendukung kebutuhan unik setiap pengguna.</p>
                    </div>
                </div>
            </div>

            <div class="row vertical-content  py-5">
                <div class="col-lg-6">
                    <div class="features-content mt-5">
                        <h4 class="line-height_1_4 mt-3">ChatBot</h4>
                        <p class="text-muted mt-3">ChatBot RAG Helpcenter adalah asisten virtual yang inovatif dan responsif, dirancang untuk memberikan bantuan cepat dan efisien kepada pengguna dalam menavigasi dan memahami berbagai layanan dan informasi yang tersedia. Dengan kecerdasan buatan yang canggih, RAG Helpcenter mampu memberikan jawaban yang akurat dan solusi terkini untuk pertanyaan-pertanyaan pengguna, menciptakan pengalaman interaktif yang ramah dan efektif. Dengan fokus pada kepuasan pengguna, RAG Helpcenter berupaya memberikan layanan yang intuitif dan mudah digunakan, menjadi mitra setia dalam memenuhi kebutuhan informasi dan dukungan pengguna secara menyeluruh</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="features-img text-center mt-5">
                        <img src="{{ asset('images/features/img-9.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- START SERVICES -->
    <section class="section bg-light" id="kontak">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title-heading text-center">About</h1>
                </div>
            </div>
            <div class="row mt-5 pt-3 vertical-content">
                <div class="col-lg-4 hover-zoom">
                    <a href="https://maps.app.goo.gl/UGRsGnQtzEJhriRaA">
                        <div class="services-box bg-white p-5 btn-round mt-4 text-center">
                            <div class="services-icon text-dark">
                                <i class="bi bi-geo-alt fs-1"></i>
                            </div>
                            <h5 class="mt-2 pt-2 text-dark">Alamat</h5>
                            <p class="text-muted mt-3 mb-0">Jl. Pawiyatan Luhur IV No.1</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 hover-zoom">
                    <a href="#waktu-layanan">
                        <div class="services-box bg-white p-5 btn-round mt-4 text-center">
                            <div class="services-icon text-dark">
                                <i class="bi bi-clock fs-1"></i>
                            </div>
                            <h5 class="mt-2 pt-2 text-dark">Waktu Layanan</h5>
                            <p class="text-muted mt-3 mb-0">Senin-Jumat 08.00-16.00 WIB</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 hover-zoom">
                    <a href="unika@unika.ac.id">
                        <div class="services-box bg-white p-5 btn-round mt-4 text-center">
                            <div class="services-icon text-dark">
                                <i class="bi bi-envelope fs-1"></i>
                            </div>
                            <h5 class="mt-2 pt-2 text-dark">Email</h5>
                            <p class="text-muted mt-3 mb-0">unika@unika.ac.id</p>
                        </div>
                    </a>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-4 hover-zoom">
                        <a href="https://api.whatsapp.com/send/?phone=6281232345479&text&type=phone_number&app_absent=0">
                            <div class="services-box bg-white p-5 btn-round mt-4 text-center">
                                <div class="services-icon text-dark">
                                    <i class="bi bi-whatsapp fs-1"></i>
                                </div>
                                <h5 class="mt-2 pt-2 text-dark">Whatsapp</h5>
                                <p class="text-muted mt-3 mb-0">08123 2345 479</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 hover-zoom">
                        <a href="https://www.instagram.com/unika.soegijapranata/">
                            <div class="services-box bg-white p-5 btn-round mt-4 text-center">
                                <div class="services-icon text-dark">
                                    <i class="bi bi-instagram fs-1"></i>
                                </div>
                                <h5 class="mt-2 pt-2 text-dark">Instagram</h5>
                                <p class="text-muted mt-3 mb-0">@unika.soegijapranata</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 hover-zoom">
                        <a href="#kontak">
                            <div class="services-box bg-white p-5 btn-round mt-4 text-center">
                                <div class="services-icon text-dark">
                                    <i class="bi bi-headset fs-1"></i>
                                </div>
                                <h5 class="mt-2 pt-2 text-dark">Kontak</h5>
                                <p class="text-muted mt-3 mb-0">(024) 850 5003</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SERVICES -->

    <!-- START FOOTER -->
    <section class="footer">
        <div class="footer-bg-overlay"></div>
        <div class="container">
    
            <!-- START FOOTER -->
            <div class="row footer-content">
                <div class="col-lg-3">
                    <img src="images/logo.png" alt="Nama Logo" height="45">
                </div>
    
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-3">
                            <h5 class="f-18 text-white">Informasi Calon mahasiswa</h5>
                            <ul class="list-unstyled footer-link mt-3">
                                <li><a href="">Registration Info</a></li>
                                <li><a href="">Scholarship Info</a></li>
                                <li><a href="">Info Kos & Asrama</a></li>
                            </ul>
                        </div>
    
                        <div class="col-lg-3">
                            <h5 class="f-18 text-white">Informasi Mahasiswa Aktif</h5>
                            <ul class="list-unstyled footer-link mt-3">
                                <li><a href="">Scholarship Info</a></li>
                                <li><a href="">Library</a></li>
                                <li><a href="">Student Care</a></li>
                                <li><a href="">Sintak SCU</a></li>
                                <li><a href="">Cyber SCU</a></li>
                            </ul>
                        </div>
    
                        <div class="col-lg-3">
                            <h5 class="f-18 text-white">Faculty</h5>
                            <ul class="list-unstyled footer-link mt-3">
                                <li><a href="">Faculty of Engineering</a></li>
                                <li><a href="">Faculty of Psychology</a></li>
                                <li><a href="">Faculty of Medicine</a></li>
                                <li><a href="">Faculty of Language & Arts</a></li>
                            </ul>
                        </div>
    
                        <div class="col-lg-3">
                            <h5 class="f-18 text-white">Contact</h5>
                            <ul class="list-unstyled footer-link mt-3">
                                <li><a href="">(024) 850 5003</a></li>
                                <li><a href="">unika@unika.ac.id</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END FOOTER -->
    
            <!-- START FOOTER-AlT -->
            <div class="row mt-5">
                <div class="col-lg-12">
                    <p class="footer-alt text-center text-white-50 mb-0">Copyright © 2024 by Soegijapranata Catholic University.</p>
                </div>
            </div>
            <!-- END FOOTER-ALT -->
    
        </div>
    
    </section>

    <!-- END FOOTER -->

    <!-- JavaScript -->
    <script src="{{ asset('landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('landing/js/scrollspy.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Owl Carousel -->
    <script src="{{ asset('landing/js/owl.carousel.min.js') }}"></script>

    <!-- Swiper JS -->
    <script src="{{ asset('landing/js/swiper.min.js') }}"></script>

    <!-- Magnific Popup -->
    <script src="{{ asset('landing/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing/js/contact.js') }}"></script>
    <script src="{{ asset('landing/js/plugins-init.js') }}"></script>
    <script src="{{ asset('landing/js/app.js') }}"></script>

</body>

</html>
