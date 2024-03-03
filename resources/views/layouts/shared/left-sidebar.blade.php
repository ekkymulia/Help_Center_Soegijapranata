<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
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

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <span class="leftbar-user-name mt-2">Tosha Minner</span>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <!-- <li class="side-nav-title">Navigation</li> -->

            <li class="side-nav-item">
                <a href="{{ route('root') }}" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-title">Menu</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="ri-mail-line"></i>
                    <span> Laporan Saya </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('pengaduan.index') }}">Semua Laporan</a>
                        </li>
                    </ul>
                </div>
            </li>

            @if(session('role') == 1 || session('role') > 2)
            <li class="side-nav-item">
                <a href="{{ route('akun-cs.index') }}" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span> Akun CS </span>
                </a>
            </li>
            @endif


            @if(session('role') == 1)
            <li class="side-nav-item">
                <a href="{{ route('akun-mahasiswa.index') }}" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span> Akun Mahasiswa </span>
                </a>
            </li> 
            @endif

            @if(session('role') == 1)
            <li class="side-nav-item">
                <a href="{{ route('konfigurasi-ai.index') }}" class="side-nav-link">
                    <i class="ri-folder-2-line"></i>
                    <span> Konfigurasi AI </span>
                </a>
            </li>
            @endif

        </ul>

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
