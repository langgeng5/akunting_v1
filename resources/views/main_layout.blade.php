@extends('base_html') @section('layout')

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul
            class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
            id="accordionSidebar"
        >
            <!-- Sidebar - Brand -->
            <a
                class="sidebar-brand d-flex align-items-center justify-content-center"
                href="#"
            >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <h6>SISTEM INFORMASI AKUNTANSI</h6>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            @if(Auth::check())
                <!-- Nav Item - Dashboard -->
                {{-- <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a
                    >
                </li> --}}

                <!-- Divider -->
                <hr class="sidebar-divider" />
            @endif

            @if (isset(Auth::user()->level) && Auth::user()->level == 'admin')

                 <!-- Heading -->
                <div class="sidebar-heading">Master</div>

                <li class="nav-item {{ (request()->is('user')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('user') }}">
                        <i class="fa fa-user"></i>
                        <span>Data User</span></a
                    >
                </li>

                <li class="nav-item {{ (request()->is('akun')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('akun') }}">
                        <i class="fa fa-credit-card"></i>
                        <span>Data Akun</span></a
                    >
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider" />

                <!-- Heading -->
                <div class="sidebar-heading">Transaksi</div>

                <li class="nav-item {{ (request()->is('kas-masuk')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('kas-masuk') }}">
                        <i class="fas fa-money-bill"></i>
                        <span>Data Kas Masuk</span></a
                    >
                </li>
                <li class="nav-item {{ (request()->is('kas-keluar')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('kas-keluar') }}">
                        <i class="fas fa-money-bill"></i>
                        <span>Data Kas Keluar</span></a
                    >
                </li>
                <li class="nav-item {{ (request()->is('jurnal')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('jurnal') }}">
                        <i class="fas fa-money-bill"></i>
                        <span>Data Jurnal</span></a
                    >
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider" />

            @endif


            @if (isset(Auth::user()->level) && Auth::user()->level == 'pemilik')
            <!-- Heading -->
            <div class="sidebar-heading">Laporan</div>

            <li class="nav-item {{ (request()->is('buku-besar')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('buku-besar') }}">
                    <i class="fa fa-credit-card"></i>
                    <span>Buku Besar</span></a
                >
            </li>

            <li class="nav-item {{ (request()->is('laba-rugi')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('laba-rugi') }}">
                    <i class="fa fa-credit-card"></i>
                    <span>Laba Rugi</span></a
                >
            </li>

            <li class="nav-item {{ (request()->is('neraca')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('neraca') }}">
                    <i class="fa fa-credit-card"></i>
                    <span>Neraca</span></a
                >
            </li>

            <li class="nav-item {{ (request()->is('neraca-saldo')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('neraca-saldo') }}">
                    <i class="fa fa-credit-card"></i>
                    <span>Neraca Saldo</span></a
                >
            </li>

            <li class="nav-item {{ (request()->is('perubahan-modal')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('perubahan-modal') }}">
                    <i class="fa fa-credit-card"></i>
                    <span>Perubahan Modal</span></a
                >
            </li>

            <li class="nav-item {{ (request()->is('arus-kas')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('arus-kas') }}">
                    <i class="fa fa-credit-card"></i>
                    <span>Arus Kas</span></a
                >
            </li>

            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button
                    class="rounded-circle border-0"
                    id="sidebarToggle"
                ></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav
                    class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
                >
                    <!-- Sidebar Toggle (Topbar) -->
                    <button
                        id="sidebarToggleTop"
                        class="btn btn-link d-md-none rounded-circle mr-3"
                    >
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="userDropdown"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"
                                    >{{ Auth::user() ? Auth::user()->nama_pengguna : "Guess" }}</span
                                >
                                <img
                                    class="img-profile rounded-circle"
                                    src="{{
                                        url(
                                            'startbootstrap-sb-admin-2-templates'
                                        )
                                    }}/img/undraw_profile.svg"
                                />
                            </a>
                            <!-- Dropdown - User Information -->
                            <div
                                class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown"
                            >
                                <a
                                    class="dropdown-item"
                                    href="#"
                                    data-toggle="modal"
                                    data-target="#logoutModal"
                                >
                                    <i
                                        class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"
                                    ></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div
                        class="d-sm-flex align-items-center justify-content-between mb-4"
                    >
                        <h1 class="h3 mb-0 text-gray-800">
                            @yield('page_header', '')
                        </h1>
                    </div>

                    @yield('content', 'this is for content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div
        class="modal fade"
        id="logoutModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Ready to Leave?
                    </h5>
                    <button
                        class="close"
                        type="button"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current
                    session.
                </div>
                <div class="modal-footer">
                    <button
                        class="btn btn-secondary"
                        type="button"
                        data-dismiss="modal"
                    >
                        Cancel
                    </button>
                    <a class="btn btn-primary" href="{{ url('auth/logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
