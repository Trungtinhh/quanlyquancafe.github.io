<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>QUÁN COFEE | Chất lượng - Niềm tin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('assets/css/config/saas/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('assets/css/config/saas/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('assets/css/config/saas/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="{{asset('assets/css/config/saas/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    @yield('css')

    @livewireStyles
</head>

<!-- body start -->

<body class="loading" data-layout-mode="two-column" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": false}'>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="d-none d-lg-block">
                        <form class="app-search">
                            <div class="app-search-box dropdown">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search..." id="top-search">
                                    <button class="btn input-group-text" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                                <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h5 class="text-overflow mb-2">Found 22 results</h5>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-home me-1"></i>
                                        <span>Analytics Report</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-aperture me-1"></i>
                                        <span>How can I help you?</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fe-settings me-1"></i>
                                        <span>User profile settings</span>
                                    </a>

                                    <!-- item-->
                                    <div class="dropdown-header noti-title">
                                        <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                    </div>

                                    <div class="notification-list">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle" src="{{asset('assets/images/users/user-2.jpg')}}" alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                    <span class="font-12 mb-0">UI Designer</span>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="d-flex align-items-start">
                                                <img class="d-flex me-2 rounded-circle" src="{{asset('assets/images/users/user-5.jpg')}}" alt="Generic placeholder image" height="32">
                                                <div class="w-100">
                                                    <h5 class="m-0 font-14">Jacob Deo</h5>
                                                    <span class="font-12 mb-0">Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </li>

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="text-danger">
                                {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{ route('profile_info') }}" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span> Tài khoản của tôi</span>
                            </a>

                            <!-- item-->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <i class="fe-log-out"></i>
                                    <span>Đăng xuất</span>
                                </a>
                            </form>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li>

                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="{{ route('dashboard') }}" class="logo text-center">
                        <span class="logo-sm">
                            <img src="{{asset('assets/images/logo_quancf_3.jpg')}}" alt="" height="68">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('assets/images/logo_quancf_3.jpg')}}" alt="" height="68">
                            <!-- <span class="logo-lg-text-light">U</span> -->
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="h-100">

                <div class="sidebar-content">
                    <div class="sidebar-icon-menu h-100" data-simplebar>
                        <!-- LOGO -->
                        <a href="#" class="logo">
                            <span>
                                <img src="{{asset('assets/images/logo-sm-light.png')}}" alt="" height="28">
                            </span>
                        </a>
                        @canany(['system.view.basic'])
                            <nav class="nav flex-column" id="two-col-sidenav-main">
                                <a class="nav-link" href="#home" title="Bảng điều khiển">
                                    <i data-feather="home"></i>
                                </a>
                                <a class="nav-link" href="#quanlybanvakhuvuc" title="Quản lý bàn và khu vực">
                                    <i data-feather="grid"></i>
                                </a>
                                @canany(['system.permission.management'])
                                    <a class="nav-link" href="#quanlynguoidung" title="Quản lý người dùng">
                                        <i data-feather="file-text"></i>
                                    </a>
                                @endcanany
                                <a class="nav-link" href="#quanlynhansu" title="Quản lý nhân sự">
                                    <i data-feather="layout"></i>
                                </a>
                                <a class="nav-link" href="#thucuong" title="Quản lý menu và pha chế">
                                    <i data-feather="briefcase"></i>
                                </a>
                                @canany(['system.permission.management'])
                                    <a class="nav-link" href="#kho" title="Quản lý kho">
                                        <i data-feather="package"></i>
                                    </a>
                                @endcanany
                                @canany(['system.permission.management'])
                                    <a class="nav-link" href="{{ route('management.provider') }}" title="Nhà cung cấp">
                                        <i data-feather="gift"></i>
                                    </a>
                                @endcanany
                                @canany(['system.permission.management', 'system.configuration.management'])
                                    <a class="nav-link" href="{{ route('management.statistical') }}" title="Thống kê">
                                        <i data-feather="database"></i>
                                    </a>
                                @endcanany
                            </nav>
                        @endcanany
                    </div>
                    <!--- Sidemenu -->
                    <div class="sidebar-main-menu">
                        <div id="two-col-menu" class="h-100" data-simplebar>
                            <div class="twocolumn-menu-item" id="home">
                                <h5 class="menu-title">Gọi món và Hóa đơn</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('management.order') }}">Gọi món</a>
                                    </li>
                                    @canany(['system.configuration.management', 'system.permission.management'])
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('management.invoice') }}">Hóa đơn</a>
                                        </li>
                                    @endcanany
                                </ul>
                            </div>

                            <div class="twocolumn-menu-item" id="quanlybanvakhuvuc">
                                <h5 class="menu-title">Quản lý bàn và khu vực</h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('management.list_table_empty') }}">Bàn trống</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('management.list_table') }}">Tất cả bàn</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('management.area') }}">Khu vực</a>
                                    </li>
                                </ul>
                            </div>
                            @canany(['system.permission.management'])
                                <div class="twocolumn-menu-item" id="quanlynguoidung">
                                    <div class="title-box">
                                        <h5 class="menu-title">Quản lý người dùng</h5>
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('user.confirm_user') }}">Người dùng mới</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('user.grant_permission_index') }}">Cấp quyền người dùng</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('user.role_index') }}">Nhóm quản trị</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endcanany
                            <div class="twocolumn-menu-item" id="quanlynhansu">
                                <div class="title-box">
                                    <h5 class="menu-title">Quản lý nhân sự</h5>
                                    <ul class="nav flex-column">
                                        @canany(['system.permission.management', 'system.configuration.management'])
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('management.list') }}">Danh sách nhân sự</a>
                                            </li>
                                        @endcanany
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('management.timekeeping') }}">Chấm công</a>
                                        </li>
                                        @canany(['system.permission.management'])
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('management.manager_timekeeping') }}">Quản lý chấm công</a>
                                            </li>
                                        @endcanany
                                        @canany(['system.permission.management'])
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('management.shift') }}">Quản lý ca làm</a>
                                            </li>
                                        @endcanany
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('management.calendar') }}">Lịch làm việc</a>
                                        </li>
                                        @canany(['system.permission.management'])
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('management.wage') }}">Lương</a>
                                            </li>
                                        @endcanany
                                    </ul>
                                </div>
                            </div>

                            <div class="twocolumn-menu-item" id="thucuong">
                                <div class="title-box">
                                    <h5 class="menu-title">Menu và pha chế</h5>
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('management.menu') }}">Danh sách thức uống</a>
                                        </li>                             
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('management.bartending') }}">Pha chế</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @canany(['system.permission.management'])
                                <div class="twocolumn-menu-item" id="kho">
                                    <div class="title-box">
                                        <h5 class="menu-title">Quản lý kho</h5>
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('management.store_house') }}">Tình trạng kho</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('management.import_goods') }}">Nhập hàng</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('management.export_goods') }}">Xuất kho</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endcanany
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- End Sidebar -->

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                @section('content')
                {{ !empty($slot) ? $slot : '' }}
                @show
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> &backcong; Quán coffee - <a href="">Trang chủ</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link py-2" data-bs-toggle="tab" href="#chat-tab" role="tab">
                            <i class="mdi mdi-message-text d-block font-22 my-1"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2" data-bs-toggle="tab" href="#tasks-tab" role="tab">
                            <i class="mdi mdi-format-list-checkbox d-block font-22 my-1"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-2 active" data-bs-toggle="tab" href="#settings-tab" role="tab">
                            <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content pt-0">
                    <div class="tab-pane" id="chat-tab" role="tabpanel">

                        <form class="search-bar p-3">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </form>

                        <h6 class="fw-medium px-3 mt-2 text-uppercase">Group Chats</h6>

                        <div class="p-2">
                            <a href="javascript: void(0);" class="text-reset notification-item ps-3 mb-2 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline me-1 text-success"></i>
                                <span class="mb-0 mt-1">App Development</span>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item ps-3 mb-2 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline me-1 text-warning"></i>
                                <span class="mb-0 mt-1">Office Work</span>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item ps-3 mb-2 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline me-1 text-danger"></i>
                                <span class="mb-0 mt-1">Personal Group</span>
                            </a>

                            <a href="javascript: void(0);" class="text-reset notification-item ps-3 d-block">
                                <i class="mdi mdi-checkbox-blank-circle-outline me-1"></i>
                                <span class="mb-0 mt-1">Freelance</span>
                            </a>
                        </div>

                        <h6 class="fw-medium px-3 mt-3 text-uppercase">Favourites <a href="javascript: void(0);" class="font-18 text-danger"><i class="float-end mdi mdi-plus-circle"></i></a></h6>



                        <h6 class="fw-medium px-3 mt-3 text-uppercase">Other Chats <a href="javascript: void(0);" class="font-18 text-danger"><i class="float-end mdi mdi-plus-circle"></i></a></h6>



                    </div>

                    <div class="tab-pane" id="tasks-tab" role="tabpanel">
                        <h6 class="fw-medium p-3 m-0 text-uppercase">Working Tasks</h6>
                        <div class="px-2">
                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">App Development<span class="float-end">75%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">Database Repair<span class="float-end">37%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">Backup Create<span class="float-end">52%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>
                        </div>

                        <h6 class="fw-medium px-3 mb-0 mt-4 text-uppercase">Upcoming Tasks</h6>

                        <div class="p-2">
                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">Sales Reporting<span class="float-end">12%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">Redesign Website<span class="float-end">67%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>

                            <a href="javascript: void(0);" class="text-reset item-hovered d-block p-2">
                                <p class="text-muted mb-0">New Admin Design<span class="float-end">84%</span></p>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 84%" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </a>
                        </div>

                        <div class="p-3 mt-2 d-grid">
                            <a href="javascript: void(0);" class="btn btn-success waves-effect waves-light">Create Task</a>
                        </div>

                    </div>
                    <div class="tab-pane active" id="settings-tab" role="tabpanel">
                        <h6 class="fw-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
                            <span class="d-block py-1">Theme Settings</span>
                        </h6>

                        <div class="p-3">
                            <div class="alert alert-warning" role="alert">
                                <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                            </div>

                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light" id="light-mode-check" checked />
                                <label class="form-check-label" for="light-mode-check">Light Mode</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark" id="dark-mode-check" />
                                <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                            </div>

                            <!-- Width -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="width" value="fluid" id="fluid-check" checked />
                                <label class="form-check-label" for="fluid-check">Fluid</label>
                            </div>
                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="width" value="boxed" id="boxed-check" />
                                <label class="form-check-label" for="boxed-check">Boxed</label>
                            </div>

                            <!-- Left Sidebar-->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="light" id="light-check" />
                                <label class="form-check-label" for="light-check">Light</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="dark" id="dark-check" checked />
                                <label class="form-check-label" for="dark-check">Dark</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="brand" id="brand-check" />
                                <label class="form-check-label" for="brand-check">Brand</label>
                            </div>

                            <div class="form-check form-switch mb-3">
                                <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="gradient" id="gradient-check" />
                                <label class="form-check-label" for="gradient-check">Gradient</label>
                            </div>


                            <!-- Topbar -->
                            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="topbar-color" value="dark" id="darktopbar-check" checked />
                                <label class="form-check-label" for="darktopbar-check">Dark</label>
                            </div>

                            <div class="form-check form-switch mb-1">
                                <input type="checkbox" class="form-check-input" name="topbar-color" value="light" id="lighttopbar-check" />
                                <label class="form-check-label" for="lighttopbar-check">Light</label>
                            </div>


                            <div class="d-grid mt-4">
                                <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                                <a href="https://1.envato.market/uboldadmin" class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                            </div>

                        </div>

                    </div>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>

        @yield('script')

        <script src="{{asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

        <!-- App js-->
        <script src="{{asset('assets/js/app.min.js')}}"></script>


        @livewireScripts
</body>

</html>