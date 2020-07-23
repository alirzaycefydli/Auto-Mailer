<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
            <div class="sidebar-brand-text">Auto Mailer</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            İçerik Yönetimi
        </div>

        <li class="nav-item @if(Request::segment(1) == "users") active @endif">
            <a class="nav-link" href="{{route('admin.allUsers')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Tüm Kullanıcılar</span></a>
        </li>

        <li class="nav-item @if(Request::segment(1) == "categories") active @endif">
            <a class="nav-link" href="{{route('admin.categories')}}">
                <i class="fas fa-fw fa-list"></i>
                <span>Kullanıcı Kategorileri</span></a>
        </li>

        <li class="nav-item @if(Request::segment(2) == "methods"&& Request::segment(1) == "user") active @endif">
            <a class="nav-link" href="{{route('admin.userMethods')}}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Kullanıcı Ekle</span></a>
        </li>



        <li class="nav-item @if(Request::segment(2) == "e-mail" && Request::segment(1) == "group") active @endif">
            <a class="nav-link" href="{{route('admin.mailGroup')}}">
                <i class="fas fa-fw fa-users"></i>
                <span>Toplu Mail Gönder</span></a>
        </li>

    <!--   <li class="nav-item">
            <a class="nav-link" href="{{route('admin.timedMail')}}">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Zamanlanmış Mail Gönderimi</span></a>
        </li>-->



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Site Ayarları
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <!-- Nav Item - Charts -->
        <li class="nav-item @if(Request::segment(1) == "settings") active @endif">
            <a class="nav-link" href="{{route('admin.settings')}}">
                <i class="fas fa-fw fa-cog"></i>
                <span>Ayarlar</span></a>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand topbar mb-4 static-top shadow">
              <h3 style="color: #8e8a8a; font-weight: bold"  > @yield('topbar','Automailer')</h3>

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img width="25px;" height="25px;" src="{{asset('img')}}/user_bg.png">
                            <span class="mr-2 d-none d-lg-inline text-gray-700 ">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('admin.settings')}}">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ayarlar
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Çıkış Yap
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->


            <!-- Begin Page Content -->
            <div class="container-fluid">
